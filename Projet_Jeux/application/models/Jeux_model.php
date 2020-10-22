<?php
class Jeux_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_jeux()
    {
        $query = $this->db->get('_jeu');
        return $query->result_array();
    }


}
