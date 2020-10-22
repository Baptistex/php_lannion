<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $content; ?> -Tests CI3 pour Jeux </title>
</head>

<body>
    <div id="global">
        <div id="entete">
            <h1> Tests CI3 pour Jeux-- </h1>
        </div>
        <!--# entete -->
        <div id="contenu"><?php $this->load->view($content); ?></div>
        <!--# contenu -->
        <div id="pied"><strong>&copy;2020</strong></div>
        <!--#pied-->
    </div>
    <!--#global-->
</body>

</html>