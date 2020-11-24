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

    public function get_gamedata($id)
    {
        $query = $this->db
            ->select("*")
            ->from("_jeu")
            ->where('id', $id)
            ->get();
        return $query->result_array();
    }

    public function get_search($text)
    {
        $query = $this->db
            ->select("*")
            ->from("_jeu")
            // Produit: WHERE `titre` LIKE '%text%' ESCAPE '!'
            ->like('LOWER(titre)', strtolower($text), 'both')
            ->get();
        return $query->result_array();
    }

    public function get_recent_games()
    {
        $query = $this->db
            ->select("*")
            ->from("_jeu")
            ->where("sortie !=", "null")
            ->order_by("sortie", "DESC")
            ->limit(5)
            ->get();
        return $query->result_array();
    }
}