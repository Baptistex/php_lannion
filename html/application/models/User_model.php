<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /**
     * Retourne un tableau contenant tous les utilisateurs (et administrateurs).
     *
     * @return array 
     */
    public function get_user()
    {
        $query = $this->db->get('_user');
        return $query->result_array();
    }

    /**
     * Retourne le rôle de l'utilisateur.
     *
     * @param string $identifiant L'identifiant de l'utilisateur.
     *
     * @return string "admin" ou "user" selon le rang.
     */
    public function get_role($identifiant)
    {
        $query = $this->db
            ->select("role")
            ->from("_role")
            ->where('identifiant', $identifiant)
            ->get();
        return $query->result_array()[0]['role'];
    }

    /**
     * Ajoute un utilisateur à la base de donnée.
     *
     * @param string $identifiant L'identifiant de l'utilisateur.
     * @param string $nom Le nom de l'utilisateur.
     * @param string $prenom Le prénom de l'utilisateur.
     * @param string $mot_de_passe Le mot de passe de l'utilisateur.
     * @param string $role Le role de l'utilisateur.  
     */
    public function add_user($identifiant, $nom, $prenom, $mot_de_passe, $role)
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
            'role' => $role
        );
        $this->db->insert('_role', $roledata);
    }



    /**
     * Supprime un utilisateur.
     *
     * @param string $identifiant L'identifiant de l'utilisateur.
     */
    public function delete_user($identifiant)
    {
        $data = array('identifiant' => $identifiant);
        $this->db->delete('_user', $data);
    }

    /**
     * Donne les informations sur un utilisateur.
     *
     * @param string $identifiant L'identifiant de l'utilisateur.
     */
    public function log_user($identifiant)
    {
        $query = $this->db
            ->select("*")
            ->from("_user")
            ->where('identifiant', $identifiant)
            ->get();
        return $query->result_array();
    }

    /**
     * Retourne un tableau avec tous les utilisateurs et leur rang.
     *
     * @param string $identifiant L'identifiant de l'utilisateur.
     * 
     * @return array
     */
    public function get_user_role()
    {
        $query = $this->db
            ->select('*')
            ->from('_user')
            ->join('_role', '_role.identifiant = _user.identifiant')
            ->get();
        return $query->result_array();
    }
}