

<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <?php echo "<link rel='stylesheet' " ."href='". base_url().'public/css/style.css'."'"  ?>
</head>


<body>
    <div id="global">
        <!--# entete -->
        <div id="entete">
            <h1> Tests CI3 pour Jeux-- </h1>
        </div>
       


        
        <!--# contenu -->
        <div id="contenu"><?php $this->load->view($content); ?></div>

        <!--#pied-->
        <div id="pied"><strong>&copy;2020</strong></div>
        
    </div>
    <!--#global-->
</body>

</html>