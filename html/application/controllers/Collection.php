<?php

class Collection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('collection_model');
        $this->load->helper('url');
    }

    
    public function index()
    {

        
        $data['title'] = 'Liste des jeux';
        
        

        $data['content'] = 'collection/main_collection';
        $data['collectionlist'] = $this->collection_model->get_collection('Michel1');

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
