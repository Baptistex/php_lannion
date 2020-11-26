<?php
class Jeux_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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


    /**
     * Retourne un tableau contenant les 5 jeux les plus récents.
     *
     * @return array 
     */
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

    /**
     * Retourne un tableau contenant tous les jeux qui matchent la recherche, dans l'ordonné selon $tri
     *
     * @param string    $tri ="none"    peut prendre les valeurs "none", "az", "za", "old" et "new" selon l'ordre voulu
     * @param string    $text = ""      Le texte de la recherche
     * 
     * @return array 
     */

    public function get_jeux($tri = "none", $text = "")
    {
        switch ($tri) {
            case "none":
                $query = $this->db
                    ->like('LOWER(titre)', strtolower($text), 'both')
                    ->get('_jeu');
                break;
            case "az":
                $query = $this->db
                    ->select("*")
                    ->from("_jeu")
                    ->like('LOWER(titre)', strtolower($text), 'both')
                    ->order_by("titre", "ASC")
                    ->get();
                break;
            case "za":
                $query = $this->db
                    ->select("*")
                    ->from("_jeu")
                    ->like('LOWER(titre)', strtolower($text), 'both')
                    ->order_by("titre", "DESC")
                    ->get();
                break;
            case "old":
                $query = $this->db
                    ->select("*")
                    ->from("_jeu")
                    ->like('LOWER(titre)', strtolower($text), 'both')
                    ->order_by("sortie", "ASC")
                    ->get();
                break;
            case "new":
                $query = $this->db
                    ->select("*")
                    ->from("_jeu")
                    ->like('LOWER(titre)', strtolower($text), 'both')
                    ->order_by("sortie", "DESC")
                    ->get();
                break;
            default:
                $query = $this->db->get('_jeu');
        }
        return $query->result_array();
    }
}