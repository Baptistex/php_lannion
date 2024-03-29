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
        //fichier helper custom se trouvant dans application/helpers/
        $this->load->helper('header');
    }

    /**
     * Affiche la collection d'un utilisateur.
     * 
     * Si l'utilisateur n'est pas connecté, redirige vers sa page précédente, ou vers l'accueil
     */
    public function index()
    {
        user_exists();
        //Si l'utilisateur n'est pas connecté, il ne peut pas accéder à sa collection
        if (!isset($this->session->identifiant)) {
            if ($this->agent->is_referral()) {
                //redirige vers la page précédente s'il avait été redirigé sur cette page
                redirect($this->agent->referrer());
            }
            //redirige sur jeux par défaut
            redirect('jeux');
        }
        $identifiant = $this->session->identifiant;
        $var = $this->user_model->log_user($identifiant)[0];

        if (($this->session->role) == 'admin') {
            $data['delete'] = "";
        } else {
            $data['delete'] = "<button class='btn btn-light'><a href='" . site_url("user/delete/") . $identifiant . "'>Supprimer mon compte</a></button>";
        }

        //Paramètres de la page
        $data['title'] = 'Liste des jeux possédés';
        $data['identifiant']    =   $identifiant;
        $data['nom']            =   $var['nom'];
        $data['prenom']         =   $var['prenom'];
        $data['isadmin']        =   FALSE;
        $data['content']        =   'collection/collection_list';
        $data['collectionlist'] =   $this->collection_model->get_collection($identifiant);
        $data['count']          =   $this->collection_model->count_collection($identifiant);
        set_template($data, $this->session->role, $this->session->identifiant);
        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    public function add($id)
    {
        user_exists();

        //Vérification que l'utilisateur est connecté.
        if (isset($this->session->identifiant)) {
            $identifiant = $this->session->identifiant;
        } else {
            $this->session->set_flashdata('add_attempt', '<div class="alert alert-danger" role="alert">Connectez vous avant de pouvoir ajouter un jeu !</div>');
            redirect('jeux/game/' . $id);
        }
        if ($this->collection_model->count_collection($identifiant) >= 5) {
            $this->collection_model->rm_most_recent($identifiant);
        }

        if ($this->collection_model->add_to_collection($identifiant, $id)) {
            redirect('collection');
        } else {
            $this->session->set_flashdata('add_attempt', '<div class="alert alert-danger" role="alert">Le jeu est déjà présent dans votre collection !</div>');

            redirect('jeux/game/' . $id);
        }
    }

    /**
     * Supprime un jeu de l'utilisateur
     * @param int   $id L'id du jeu à supprimer.
     */
    public function delete($id)
    {
        user_exists();
        $identifiant = $this->session->identifiant;
        $this->collection_model->rm_from_collection($identifiant, $id);
        redirect('/collection');
    }

    /**
     * Affiche la collection d'un utilisateur autre que soi. Seuls les administrateurs y ont accès.
     * @param int   $identifiant de l'utilisateur.
     */
    public function collection($identifiant)
    {
        user_exists();
        //redirection si l'utilisateur n'est pas connecté ou n'est pas admin
        if (!isset($this->session->role) || !($this->session->role == 'admin')) {
            redirect('/jeux');
        };

        $var = $this->user_model->log_user($identifiant)[0];


        if (($this->session->identifiant) == $identifiant) {
            $data['delete'] = "";
        } else {
            $data['delete'] =  "<a href='" . site_url("/user/delete/") . $identifiant . "'><button>Supprimer le compte</button></a>";
        }

        $data['identifiant'] = $identifiant;
        $data['nom'] = $var['nom'];
        $data['prenom'] = $var['prenom'];
        $data['isadmin'] = TRUE;
        $data['content'] = 'collection/collection_list';
        $data['title'] = 'Collectionneur';
        $data['collectionlist'] = $this->collection_model->get_collection($identifiant);
        set_template($data, $this->session->role, $this->session->identifiant);

        $this->load->vars($data);
        $this->load->view('templates/template');
    }
}
