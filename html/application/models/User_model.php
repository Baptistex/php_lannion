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
        return $query->result_array()[0]['role'];
    }
    
   
    public function add_user($identifiant, $nom, $prenom, $mot_de_passe)
    {

        $userdata = array(
            'identifiant' => $identifiant,
            'nom' => $nom,
            'prenom' => $prenom,
            'mot_de_passe' => $mot_de_passe
        );
        $this->db->insert('_user', $userdata);

        $roledata = array(
            'identifiant' => $identifiant,
            'role' => 'user'
        );
        $this->db->insert('_role', $roledata);
    }

    public function add_admin($identifiant, $nom, $prenom, $mot_de_passe)
    {
        $userdata = array(
            'identifiant' => $identifiant,
            'nom' => $nom,
            'prenom' => $prenom,
            'mot_de_passe' => $mot_de_passe
        );
        $this->db->insert('_user', $userdata);

        $roledata = array(
            'identifiant' => $identifiant,
            'role' => 'admin'
        );
        $this->db->insert('_role', $roledata);
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
        return $query->result_array()[0];
    }

}
