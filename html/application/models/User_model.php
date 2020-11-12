<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_user()
    {
        $query = $this->db->get('_user');
        return $query->result_array();
    }

    public function get_role($identifiant)
    {
        $query = $this->db
        ->select("role")
        ->from("_role")
        ->where('identifiant', $identifiant)
        ->get();
        return $query->result_array();
    }
    
   
    public function add_user($identifiant, $nom, $prenom, $mot_de_passe)
    {
        $data = array(
            'identifiant' => $identifiant,
            'nom' => $nom,
            'prenom' => $prenom,
            'mot_de_passe' => $mot_de_passe
        );
        return $this->db->insert('_user', $data);
    }
    
    public function delete_user($identifiant)
    {
        $data = array('identifiant' => $identifiant);
        $this->db->delete('_user', $data);
    }


    public function log_user($identifiant){
        $query = $this->db
        ->select("*")
        ->from("_user")
        ->where('identifiant', $identifiant)
        ->get();
        return $query->result_array();
    }

}
