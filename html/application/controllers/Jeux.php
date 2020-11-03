<?php

class Jeux extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jeux_model');
        $this->load->helper('url');
    }

    
    public function index()
    {

        
        $data['title'] = 'Liste des jeux';
        
        

        $data['content'] = 'jeux/main_jeux';
        $data['jeuxlist'] = $this->jeux_model->get_jeux();

        $this->load->vars($data);

        $this->load->view('templates/template');
        
    }

    public function create()
    {
        
    }

    public function delete($id)
    {
       
    }
}
