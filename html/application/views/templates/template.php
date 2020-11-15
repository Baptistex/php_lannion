<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>public/js/jquery-1.11.3.min.js"></script>
</head>


<body>
    <header>
        <nav>
            <div class="button">
                <a href="<?php echo base_url();?>jeux/index"><button class="raise">Catalogue</button></a>
                <a href="<?php echo base_url();?>collection/index"><button class="raise">Ma Collection</button></a>
                <a href="<?php echo base_url();?>user/login"><button class="raise">Connexion</button></a>
                <a href="<?php echo base_url();?>user/signup"><button class="raise">S'inscrire</button></a>
                <a href="<?php echo base_url();?>user/disconnect"><button class="raise">Déconnexion</button></a>
                <a href="<?php echo base_url();?>user/newadmin"><button class="raise">Administration</button></a>
            </div>

        </nav>
        <nav>
            <a href="<?php echo base_url();?>jeux/index"><button class="raise">Catalogue</button></a>
            <a href="<?php echo base_url();?>user/list"><button class="raise">Collectionneur</button></a>
        </nav>

        <nav role="navigation" class="d-block d-lg-none">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="<?php echo base_url();?>jeux/index">
                        <li>Catalogue</li>
                    </a>
                    <a href="<?php echo base_url();?>collection/index">
                        <li>Ma Collection</li>
                    </a>
                    <a href="<?php echo base_url();?>user/login">
                        <li>Connexion</li>
                    </a>
                    <a href="<?php echo base_url();?>user/signup">
                        <li>S'inscrire</li>
                    </a>
                    <a href="<?php echo base_url();?>user/disconnect">
                        <li>Déconnexion</li>
                    </a>
                    <a href="<?php echo base_url();?>user/newadmin">
                        <li>Administration</li>
                    </a>
                </ul>
            </div>
        </nav>

    </header>
    <div id="global">
        <!--# entete -->
        <div id="entete">
            <?php echo "<h2><a href='". base_url().'collection'."'>Collection</a>"  ?>
        </div>




        <!--# contenu -->
        <div id="contenu"><?php $this->load->view($content); ?></div>

        <!--#pied-->


    </div>
    <!--#global-->
    <div class="d-none d-lg-block">
        <a class="scrollup">Scroll</a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var scrollbtn = false;

            //detect scroll
            $(window).scroll(function() {
                if (scrollbtn == false) {
                    var scrollTop = $(window).scrollTop();
                    var docHeight = $(document).height();
                    var winHeight = $(window).height();

                    var scrollPercent = (scrollTop) / (docHeight - winHeight);
                    var scrollPercentRounded = Math.round(scrollPercent * 100);

                    if (scrollPercentRounded > 10) {
                        $('.scrollup').css({
                            'bottom': 20
                        }).fadeIn();
                    } else {
                        $('.scrollup').fadeOut();
                    }
                }

            });

            //scroll-to-top
            $('.scrollup').click(function() {
                scrollbtn = true;
                var docheight = $(window).height();
                $('.scrollup').stop().animate({
                    'bottom': docheight
                }, 2000).fadeOut(function() {
                    scrollbtn = false;
                });

                $("html, body").animate({
                    scrollTop: 0
                }, 1200);

                return false;
            });
        });

    </script>

</body>

</html>
