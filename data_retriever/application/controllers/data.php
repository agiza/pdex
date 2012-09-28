<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

    
    public function index()
    {
        $this->load->library('layout');
        // Load the rest client spark
        $this->load->spark('redis/0.3.0');
        
        $data = $this->redis->hmget('foohash', array('key1', 'key2'));
        
        $this->layout->view('data', array('data' => $data));
        
    }
    
}