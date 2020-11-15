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
        <?php $this->load->view($header); ?>
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
