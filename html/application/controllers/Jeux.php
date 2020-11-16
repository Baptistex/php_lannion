<?php

class Jeux extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('jeux_model');
        $this->load->helper('url');
        $this->load->helper('header');
    }

    //TODO: dans le header: afficher le pseudo echo $this->session->identifiant;
    public function index()
    {
        $this->load->library('form_validation');
        $search = $this->input->post('searchtext');

        
        $data['title'] = 'Liste des jeux';
        $data['content'] = 'jeux/jeux_list';

        if ($search==""){
            $data['jeuxlist'] = $this->jeux_model->get_jeux();
        } else {
            $data['jeuxlist'] = $this->jeux_model->get_search($search);
        }
       

        set_template($data, $this->session->role);
        $this->load->vars($data);
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
        set_template($data, $this->session->role);
        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    public function search(){
        
    }


    

}
