<?php

class Collection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        
        $this->load->model('collection_model');
        $this->load->model('user_model');

        $this->load->helper('url');
        $this->load->helper('header');

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
        $identifiant = $this->session->identifiant;
        
        $data['title'] = 'Liste des jeux possédés';


        $var=$this->user_model->log_user($identifiant);
        
        if (($this->session->role)=='admin'){
            $data['delete'] = "";
        } else {
            $data['delete'] = "<a href='".base_url()."user/delete/".$identifiant."'><button>Supprimer mon compte</button></a>";
        }
       

        $data ['identifiant']=$identifiant;
        $data ['nom']= $var['nom'];
        $data ['prenom']= $var['prenom'];


        $data['content'] = 'collection/collection_list';
        $identifiant = $this->session->identifiant;
        $data['collectionlist'] = $this->collection_model->get_collection($identifiant);
        $data['count'] = $this->collection_model->count_collection($identifiant);
        set_template($data, $this->session->role);

        $this->load->vars($data);
        $this->load->view('templates/template');
        
    }

    public function add($id)
    {
        
        //TODO: handle l'erreur
        //TODO: verifier le maximum de 5 jeux et gérer le cas


        if (isset($this->session->identifiant)){
            $identifiant = $this->session->identifiant;
        } else {
            redirect('jeux/game/'.$id);
        }
        if ($this->collection_model->count_collection($identifiant)>=5){
            $this->collection_model->rm_most_recent($identifiant);
        }

        if ($this->collection_model->add_to_collection($identifiant, $id)){
            redirect('collection');
        } else {
            redirect('jeux/game/'.$id);
        }     
    }

    public function delete($id)
    {
        $identifiant = $this->session->identifiant;
        $this->collection_model->rm_from_collection($identifiant, $id);
        redirect('/collection');


    }

    public function collection($identifiant)
    {
        
        if (!isset($this->session->role) && !($this->session->role=='admin')){
            redirect('/jeux');
        };

        $var=$this->user_model->log_user($identifiant);
        

        $data ['identifiant']=$identifiant;
        $data ['nom']= $var['nom'];
        $data ['prenom']= $var['prenom'];

        $data['content'] = 'collection/collection_list';
        $data['title']='Collectionneur';
        $data['collectionlist'] = $this->collection_model->get_collection($identifiant);
        set_template($data, $this->session->role);

        $this->load->vars($data);
        $this->load->view('templates/template');
    }
}
