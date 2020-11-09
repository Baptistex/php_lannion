

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