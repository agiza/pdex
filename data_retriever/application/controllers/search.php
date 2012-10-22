<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    public $layout = 'default';
    
    public function index()
    {
        
        $this->load->library(array('twitter_handler'));
        
        $tweets = $this->twitter_handler->searchLoop();

        
    }
    
}