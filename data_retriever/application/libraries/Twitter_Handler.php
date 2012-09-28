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
	}
	
	public function searchLoop() {
	    
	    // get compareTerms
	    $this->CI->load->model(array('compare_term_model'));
	    $terms = $this->CI->compare_term_model->get_all();
	    var_dump($terms);
	    exit;
	    // loop
	    
	    $query = urlencode($query);
	    
	    // query
	    
	    $result = $this->query($query);
	    
	    // need to convert xml?
	    
	    // update compare term date
	    
	    // store tweet
	    $this->storeTweets($result);
	    
	    
	}
	
	public function query($query,$sinceId=null) {

	    $url = 'search.json?q=' . urlencode($query) . '&lang=en';
	    if (!empty($sinceId)) {
	        $url .= '$since_id=' . $sinceId;
	    }
	    
	    var_dump($url);
	    exit;
	    
	    // Load the rest client spark
	    $this->CI->load->spark('restclient/2.1.0');
	    // Run some setup
	    $this->CI->rest->initialize(array('server' => 'http://twitter.com/'));
	    $tweets = $this->CI->rest->get($url);
	    
	    return $tweets;
	}
	
	private function storeTweets($tweets) {
	    
	}
	
}