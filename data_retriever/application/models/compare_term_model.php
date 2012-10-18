<?php

class Compare_term_model extends MY_Model {

    protected $table = "compare_term";
    protected $primary_key = "ct_id";
    protected $fields = array(
    		"ct_id",
            "ct_query",
            "ct_name",
            "ct_racer",
            "ct_negative",
            "ct_last_query_date",
            "ct_max_id",
            "ct_cnt_pos",
            "ct_cnt_ntl",
            "ct_cnt_neg",
            "ct_score"
        );

	
}

?>