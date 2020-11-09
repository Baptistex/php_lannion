<?php

class Collection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        
        $this->load->model('collection_model');

        $this->load->helper('url');
    }


    public function index()
    {
        //Si l'utilisateur n'est pas connecté, il ne peut pas accéder à sa collection
        if (!isset($this->session->identifiant)){
            if ( $this->agent->is_referral()){
                //redirige vers la page précédente s'il avait été redirigé sur cette page
                redirect($this->agent->referrer());
            }
            //redirige sur jeux par défaut
            redirect('jeux');
        }

        
        $data['title'] = 'Liste des jeux possédés';
        
        

        $data['content'] = 'collection/collection_list';
        $identifiant = $this->session->identifiant;
        $data['collectionlist'] = $this->collection_model->get_collection($identifiant);
        $data['count'] = $this->collection_model->count_collection($identifiant);

        $this->load->vars($data);

        $this->load->view('templates/template');
        
    }


    //TODO: mettre l'identifiant en paramètre
    public function add($id)
    {
        $identifiant = $this->session->identifiant;
        //TODO: handle l'erreur
        if ($this->collection_model->add_to_collection($identifiant, $id)){
            redirect('jeux');

        } else {
            redirect('jeux');
        }     
    }

    


    public function delete($id)
    {
        $identifiant = $this->session->identifiant;
        $this->collection_model->rm_from_collection($identifiant, $id);
        redirect('/collection');


    }
}
