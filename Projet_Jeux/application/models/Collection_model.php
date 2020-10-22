<?php
class Collection_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_collection($identifiant)
    {
        $request = "SELECT * FROM jeux._jeu RIGHT JOIN jeux._collection ON jeux._jeu.id = _collection.id  WHERE identifiant = '$identifiant' ;";
        $query = $this->db->query($request);
        return $query->result_array();
    }


}
