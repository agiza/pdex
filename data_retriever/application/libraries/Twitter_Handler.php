<?php

class Twitter_handler  {

	/**
	 * @access private
	 * @var    CodeIgniter
	 */
	private $CI = NULL;
	
	/**
	 * @access public
	 * @param  void
	 * @return void
	 */
	public function __construct() {
		$this->CI = &get_instance();
		$this->CI->load->model(array('compare_term_model'));
	}
	
	public function searchLoop() {
	    
	    // get compareTerms
	    $results = array();
	    
	    $terms = $this->CI->compare_term_model->get_all();

	    foreach ($terms as $term) {
	        $query = urlencode($term['ct_query']);
	        $result = $this->query($query,$term['ct_id']);
	        if ($result == false) {
	            log_message('error','Failed on ' . $term);
	            continue;
	        }
	        $results = array_merge($results,$result);

	    }
	    	    
	    return $results;   
	    
	}
	
	public function query($query,$termId,$sinceId=null) {
	    $this->CI->load->library(array('sentiment'));
	    $this->CI->load->model(array('tweet_model'));
	    $today = new DateTime();
	    $fDate = date_format($today, 'Y-m-d H:i:s');
	    $twitterResults = array();
	    $posC = 0; // positive
	    $negC = 0; // negative
	    $ntlC = 0; // neutral
	    
	    $url = 'search.json?q=' . urlencode($query) . '&lang=en';
	    if (!empty($sinceId)) {
	        $url .= '$since_id=' . $sinceId;
	    }
	    
	    // Load the rest client spark
	    $this->CI->load->spark('restclient/2.1.0');
	    
	    // Run some setup
	    $this->CI->rest->initialize(array('server' => 'http://search.twitter.com/'));
	    $tweetObj = $this->CI->rest->get($url);
	    
	    // update compare term date
	    $data = array(
	        'ct_last_query_date' => $fDate
	        );
	    if (!empty($tweetObj->max_id_str)) {
	        $data['ct_max_id'] = $tweetObj->max_id_str;
	        $this->CI->compare_term_model->update($termId, $data);
	        
	        foreach ($tweetObj->results as $tweet) {

	            try {
    	            $dasText = $this->spaceTarget($query,$tweet->text);
	            
                    $sentimentData = $this->CI->sentiment->getSentiment($dasText,$query);
        
                    $datetime = new DateTime($tweet->created_at);
                    $datetime->setTimezone(new DateTimeZone('America/New_York'));
                    $cDate = $datetime->format('Y-m-d H:i:s');
                
                    $data = array(
                            't_date'	        => $cDate,
                            't_user'	        => $tweet->from_user,
                            't_user_id'		    => $tweet->from_user_id,
                            't_user_name'	    => empty($tweet->from_user_name) ? '' : $tweet->from_user_name,
                            't_geo'			    => empty($tweet->geo) ? '' : $tweet->geo,
                            't_id_str'		    => $tweet->id_str,
                            't_profile_img_url' => empty($tweet->profile_image_url) ? '' : $tweet->profile_image_url,
                            't_text'			=> empty($tweet->text) ? '' : $tweet->text,      
                    		't_term'			=> $termId,
                        );
                    $sentObj = json_decode($sentimentData);

                    if ($sentObj->status == 'OK') {
                        if (in_array($sentObj->docSentiment->type, array('positive','negative','neutral'))) {
                            $data['t_sentiment'] = $sentObj->docSentiment->type;
                            $this->CI->tweet_model->insert($data);
                            switch($data['t_sentiment']) {
                                case "positive":
                                    $posC++;
                                    break;
                                case "negative":
                                    $negC++;
                                    break;
                                case "neutral":
                                    $ntlC++;
                                    break;
                            }
                            
                        }
                    }
                
	            } catch (Exception $e) {
	                log_message('error',$e->getMessage());
	            }
                
	        } // end loop
	        
	        // update counts and score 
	        $this->updateScores($termId, $posC, $negC, $ntlC);
	        
	        return $tweetObj->results;
	    }
	    
	    return false;
	}
	
	private function updateScores($termId,$p,$ng,$nu) {
	    $this->CI->load->model(array('compare_term_model','score_history_model'));
	    $today = new DateTime();
	    $fDate = date_format($today, 'Y-m-d');
	    $score = $this->calcScore($p, $ng, $nu);
	    	    
	    // get current counts
	    $term = $this->CI->compare_term_model->get(array('ct_id' => $termId));

	    $pos         = $p  + $term['ct_cnt_pos'];
	    $neg         = $ng + $term['ct_cnt_neg'];
	    $ntl         = $nu + $term['ct_cnt_ntl'];
	    $totalScore  = $score + $term['ct_score'];
	    
	    $compareData = array(
                'ct_cnt_pos'        => $pos,
        	    'ct_cnt_neg'        => $neg,
	    		'ct_cnt_ntl'        => $ntl,
	    		'ct_score'			=> $totalScore
	        );
	    
	    $historyData = array(
	    		'sh_ct_id'        => $termId,
	            'sh_date'         => $fDate,
	    	    'sh_pos'          => $p,
	    	    'sh_neg'		  => $ng,
	    	    'sh_ntl'	      => $nu,
	    	    'sh_score'	      => $score      
	        );
	    
	    $this->CI->compare_term_model->update($termId, $compareData);
	    
	    $this->CI->score_history_model->insert($historyData);
	}
	
	private function calcScore($p,$ng,$nu) {
	    // weight counts
	    $sP  = $p  * SCORE_POS_WEIGHT;
	    $sNg = $ng * SCORE_NEG_WEIGHT;
	    $sNu = $nu * SCORE_NTL_WEIGHT;
	    
	    return $sP + $sNg + $sNu;
	    
	}
	
	public function spaceTarget($target,$phrase) {
	   
        // no space before
	    $pattern = "/(^[\S]*)($target)/";
        $phrase = preg_replace($pattern, '$1 $2', $phrase);
        // special char after        
	    $pattern = "/($target)([^\w\*])/";
	    $phrase = preg_replace($pattern, '$1 $2', $phrase);

	    return $phrase;
	     
	} 
}