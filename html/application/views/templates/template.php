

<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <link rel = "stylesheet"href = "<?php echo base_url(); ?>public/css/style.css">
    <link rel = "stylesheet"href = "<?php echo base_url(); ?>public/css/bootstrap.css">
</head>


<body>
    <header>
        <nav>
          <a href="<?php echo base_url();?>jeux/index"><button>Catalogue</button></a>
          <a href="<?php echo base_url();?>collection/index"><button>Ma Collection</button></a>
          <a href="<?php echo base_url();?>user/login"><button>Connexion</button></a>
          <a href="<?php echo base_url();?>user/signup"><button>S'inscrire</button></a>
          <a href="<?php echo base_url();?>user/disconnect"><button>Déconnexion</button></a>
      </nav>
      <nav>
            <a href="<?php echo base_url();?>jeux/index"><button>Catalogue</button></a>
            <a href="<?php echo base_url();?>user/list"><button>Collectionneur</button></a>
        </nav>
    </header>
    <div id="global">
        <!--# entete -->
        <div id="entete">
            <h1> Entete</h1>
            <?php echo "<h2><a href='". base_url().'collection'."'>Collection</a>"  ?>
        </div>
       


        
        <!--# contenu -->
        <div id="contenu"><?php $this->load->view($content); ?></div>

        <!--#pied-->
        <div id="pied">Pied</div>
        
    </div>
    <!--#global-->
</body>

</html>