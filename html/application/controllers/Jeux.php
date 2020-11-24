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
        user_exists();
        $this->load->library('form_validation');
        $search = $this->input->post('searchtext');


        $data['title']      =   'Liste des jeux';
        if (!isset($search)) {
            $data['jeuxlist'] = $this->jeux_model->get_jeux();
            $data['recent'] = $this->jeux_model->get_recent_games();
            $data['recent_title']      =   '<h3>Jeux récents</h3>';
            $data['content']    =   'jeux/jeux_list';
            set_template($data, $this->session->role, $this->session->identifiant);
            $this->load->vars($data);
            $this->load->view('templates/template');
        } else {
            if ($search == "") {
                $data['recent'] = $this->jeux_model->get_recent_games();
                $data['recent_title']      =   '<h3>Jeux récents</h3>';
            } else {
                $data['recent'] = array();
                $data['recent_title']      =   '';
            }
            $data['jeuxlist'] = $this->jeux_model->get_search($search);
            $this->load->vars($data);
            $this->load->view('jeux/jeux_list_ajax');
        }



        //$data['jeuxlist']   =   $this->jeux_model->get_jeux();
        //$data['recent']     =   $this->jeux_model->get_recent_games();



    }


    public function game($id)
    {
        user_exists();
        $gamedata = $this->jeux_model->get_gamedata($id);

        if (empty($gamedata)) {
            redirect('/jeux');
        }
        $data['content']    =    'jeux/jeux_game';
        $data['gamedata']   =    $gamedata[0];
        set_template($data, $this->session->role, $this->session->identifiant);
        $this->load->vars($data);
        $this->load->view('templates/template');
    }
}