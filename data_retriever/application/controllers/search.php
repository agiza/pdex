<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    
    public function index()
    {
        
        $this->load->library(array('layout','twitter_handler','sentiment'));
        
        $tweets = $this->twitter_handler->searchLoop();
        
        $this->layout->view('search', array('tweets' => $tweets));
        
    }
    
}