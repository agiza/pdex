<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    
    public function index()
    {
        $term = 'Romney ?';
        
        $this->load->library(array('layout','twitter_handler','sentiment'));
        
        // $tweets = $this->twitter_handler->searchLoop();
        
        $sentence = 'Obama/ Romney... I despise politics. Make Betty White president and I\'ll be happy - at least she looks good.';
        $target = 'Romney';
        
        $test = $this->sentiment->getSentiment($sentence,$target);
        
        $this->layout->view('search', array('test' => $test));
        
    }
    
}