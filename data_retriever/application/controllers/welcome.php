<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public $layout = 'default';
    
	public function index()
	{
		$this->load->model('compare_term_model');
		$this->load->model('tweet_model');
		
		$terms = $this->compare_term_model->get_all();
		$jsonTerms = json_encode($terms);
		
		$tweets = $this->tweet_model->get_recent(20);
		
		$this->load->view('welcome_message', array(
					'tweets' => $tweets,
					'terms' => $terms,
					'jsonTerms' => $jsonTerms
				
				)); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */