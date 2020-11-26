<?php
class Collection_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Retourne un tableau contenant les jeux d'un utilisateur
     *
     * @param int   $identifiant L'identifiant de l'utilisateur.
     *              
     * @return array 
     */
    public function get_collection($identifiant)
    {
        $query = $this->db
            ->select("*")
            ->from("_jeu")
            ->join('_collection', '_jeu.id = _collection.id', 'right')
            ->where('identifiant', $identifiant)
            ->order_by('sortie')
            ->get();
        return $query->result_array();
    }

    /**
     * Ajoute un jeu à la collection d'un utilisateur.
     *
     * @param int   $identifiant L'identifiant de l'utilisateur.
     *              $id L'id du jeu dont on cherche les informations.
     *
     * @return bool Faux si le jeux est déjà présent dans la liste, faux sinon .
     */
    public function add_to_collection($identifiant, $id)
    {
        //Vérification que l'utilisateur ne possède pas déjà le jeu.
        $querycheck = $this->db
            ->select("*")
            ->from("_collection")
            ->where('identifiant', $identifiant)
            ->where('id', $id)
            ->get();
        if ($querycheck->num_rows() > 0) {
            return false;
        }
        $data = array(
            'identifiant'   => $identifiant,
            'id'            => $id
        );
        $this->db->insert('_collection', $data);
        return true;
    }

    /**
     * Supprime de la collection d'un utilisateur le jeu le plus récent.
     *
     * @param int   $identifiant L'identifiant de l'utilisateur.
     *
     * @return void 
     */
    public function rm_most_recent($identifiant)
    {
        $most_recent = $this->db
            ->select("_jeu.id")
            ->from("_jeu")
            ->join('_collection', '_jeu.id = _collection.id', 'right')
            ->where('identifiant', $identifiant)
            ->order_by('sortie', 'DESC')
            ->limit(1)
            ->get();
        $most_recent = $most_recent->result_array()[0]['id'];
        $this->db
            ->where('identifiant', $identifiant)
            ->where('id', $most_recent)
            ->delete('_collection');
    }


    /**
     * Supprime un jeu de la collection d'un utilisateur.
     *
     * @param int   $identifiant L'identifiant de l'utilisateur.
     *              $id L'id du jeu.
     *
     * @return void 
     */
    public function rm_from_collection($identifiant, $id)
    {
        $this->db
            ->where('identifiant', $identifiant)
            ->where('id', $id)
            ->delete('_collection');
    }

    /**
     * Compte le nombre de jeux dans la collection d'un utilsateur.
     *
     * @param int   $identifiant L'identifiant de l'utilisateur.
     *
     * @return int  Le nombre de jeux dans la collection de l'utilisateur.
     */
    public function count_collection($identifiant)
    {
        $query = $this->db
            ->select('*')
            ->from('_collection')
            ->where('identifiant', $identifiant)
            ->get();
        return $query->num_rows();
    }
}