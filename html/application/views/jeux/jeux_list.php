<h2><?php echo $title ?></h2>

<div class="recherche">
    <?php echo form_open('jeux/index') ?>
    <input type="text" name="searchtext" placeholder="Rechercher un jeu">
    <div class="search"></div>
    </form>
</div>

<div class="row col-lg-12 d-none d-lg-block">

    <div class="example-1 card ">
        <div class="wrapper">
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cnetfrance.fr%2Fnews%2Fa-15h-la-premiere-image-d-un-trou-noir-pourrait-changer-notre-perception-de-l-univers-39883293.htm&psig=AOvVaw3OYKuwlROZrtgHf0CJhkGb&ust=1605881846645000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIiPyJnmju0CFQAAAAAdAAAAABAD" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="#" class="inner">jeu</a></h1>
                    <p class="text">jeu</p>
                </div>
            </div>
        </div>
    </div>


    <div class="example-1 card ">
        <div class="wrapper">
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cnetfrance.fr%2Fnews%2Fa-15h-la-premiere-image-d-un-trou-noir-pourrait-changer-notre-perception-de-l-univers-39883293.htm&psig=AOvVaw3OYKuwlROZrtgHf0CJhkGb&ust=1605881846645000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIiPyJnmju0CFQAAAAAdAAAAABAD" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="#" class="inner">jeu</a></h1>
                    <p class="text">jeu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="example-1 card ">
        <div class="wrapper">
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cnetfrance.fr%2Fnews%2Fa-15h-la-premiere-image-d-un-trou-noir-pourrait-changer-notre-perception-de-l-univers-39883293.htm&psig=AOvVaw3OYKuwlROZrtgHf0CJhkGb&ust=1605881846645000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIiPyJnmju0CFQAAAAAdAAAAABAD" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="#" class="inner">jeu</a></h1>
                    <p class="text">jeu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="example-1 card ">
        <div class="wrapper">
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cnetfrance.fr%2Fnews%2Fa-15h-la-premiere-image-d-un-trou-noir-pourrait-changer-notre-perception-de-l-univers-39883293.htm&psig=AOvVaw3OYKuwlROZrtgHf0CJhkGb&ust=1605881846645000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIiPyJnmju0CFQAAAAAdAAAAABAD" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="#" class="inner">jeu</a></h1>
                    <p class="text">jeu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="example-1 card ">
        <div class="wrapper">
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cnetfrance.fr%2Fnews%2Fa-15h-la-premiere-image-d-un-trou-noir-pourrait-changer-notre-perception-de-l-univers-39883293.htm&psig=AOvVaw3OYKuwlROZrtgHf0CJhkGb&ust=1605881846645000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIiPyJnmju0CFQAAAAAdAAAAABAD" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="#" class="inner">jeu</a></h1>
                    <p class="text">jeu</p>
                </div>
            </div>
        </div>
    </div>

</div>
                    

<div id="listejeu" class="col-lg-10 offset-lg-1">
    <?php foreach($jeuxlist as $jeu):?>
    <div id="pattern" class="pattern">
        <ul class="list img-list">
            <li>
                <a href="<?php echo base_url()."jeux/game/".$jeu["id"]?>" class="inner">
                    <div class="li-img">
                        <img src="<?php echo $jeu['couverture']?>" width="200" height="240">
                    </div>
                    <div class="li-text">
                        <h4 class="li-head"><?php echo $jeu['titre']?></h4>
                        <p class="li-sub d-none d-lg-block"><?php echo substr($jeu['description'],0,150); if (strlen($jeu['description'])>150){echo '...';}?></p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!--End Pattern HTML-->

    <?php endforeach ?>
