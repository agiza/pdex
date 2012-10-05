<?php

class Tweet_model extends MY_Model {

    protected $table = "tweet";
    protected $primary_key = "t_id";
    protected $fields = array("t_id", "t_date", "t_user", "t_user_id", "t_user_name", "t_geo", "t_id_str", "t_profile_img_url", "t_text", "t_sentiment", "t_term", "t_processed");

	
}

?>