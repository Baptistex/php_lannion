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
        $request = "SELECT * FROM jeux._jeu RIGHT JOIN jeux._collection ON jeux._jeu.id = _collection.id  WHERE identifiant =" . $this->db->escape($identifiant).";";
        $query = $this->db->query($request);
        return $query->result_array();
    }

    public function add_to_collection($identifiant, $id)
    {

        //TODO: verifier le maximum de 5 jeux et gérer le cas

        $verification = $this->get_collection($identifiant);

        foreach ($verification as $row){
            if ($row["id"]==$id){
                return false;
            }
        }
        $request = "INSERT INTO jeux._collection VALUES (".$this->db->escape($identifiant).",". $this->db->escape($id).");";
        $this->db->simple_query($request);
        return true;

        
   
       
        
    }

    public function rm_from_collection($identifiant, $id)
    {
        $request = "DELETE FROM jeux._collection WHERE identifiant =".$this->db->escape($identifiant)." AND id=". $this->db->escape($id).";";
        $query = $this->db->query($request);
    }


    public function count_collection($identifiant){
        $sql = "SELECT COUNT(*) FROM jeux._collection WHERE identifiant = ?";
        $query = $this->db->query($sql, $identifiant);
        return $query->result_array()[0]["count"];
    }


}
