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


    /**
     * Retourne un tableau contenant 1 ligne avec les informations d'un jeu.
     *
     * @param int $id L'id du jeu dont on cherche les informations.
     *
     * @return array 
     */
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

    public function sort($tri, $text)
    {
        if($tri==2){
            $query = $this->db
                ->select("*")
                ->from("_jeu")
                ->like('LOWER(titre)', strtolower($text), 'both')
                ->order_by("titre", "ASC")
                ->get();
        }
        elseif($tri==3)
        {
            $query = $this->db
                ->select("*")
                ->from("_jeu")
                ->like('LOWER(titre)', strtolower($text), 'both')
                ->order_by("titre", "DSC")
                ->get();
        }
         elseif($tri==4)
         {
            $query = $this->db
                ->select("*")
                ->from("_jeu")
                ->like('LOWER(titre)', strtolower($text), 'both')
                ->order_by("sortie", "ASC")
                ->get();
        }
         elseif($tri==5)
         {
            $query = $this->db
                ->select("*")
                ->from("_jeu")
                ->like('LOWER(titre)', strtolower($text), 'both')
                ->order_by("sortie", "DESC")
                ->get();
        }
        return $query->result_array();
    }
}