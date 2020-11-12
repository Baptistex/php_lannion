<?php

class Jeux extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('jeux_model');
        $this->load->helper('url');
    }

    
    public function index()
    {
        $data['title'] = 'Liste des jeux';
        $data['content'] = 'jeux/jeux_list';
        $data['jeuxlist'] = $this->jeux_model->get_jeux();

        $this->load->vars($data);
        echo $this->session->identifiant;
        $this->load->view('templates/template');
    }


    public function game($id)
    {
        $gamedata=$this->jeux_model->get_gamedata($id);
        
        if (empty($gamedata)){
            redirect('/jeux');
        }

        $data['title'] = '';
        $data['content'] = 'jeux/jeux_game';
        $data['gamedata'] = $gamedata[0];

        $this->load->vars($data);
        $this->load->view('templates/template');
    }

}
