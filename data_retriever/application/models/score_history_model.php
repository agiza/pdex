<?php

class Score_history_model extends MY_Model {

    protected $table = "score_history";
    protected $primary_key = "sh_id";
    protected $fields = array("sh_id", "sh_ct_id", "sh_date", "sh_pos", "sh_neg", "sh_ntl", "sh_score");

	
}

?>