<div class="row">
<img id="headerimage" class="d-none d-lg-block" src="<?php echo base_url(); ?>public/images/fusee.png" height="50" width="50">
    <div  class="d-none d-lg-block row">
        <h1>LANNION GAME</h1>
    </div>
    <div>
        <nav>
            <div class="button d-none d-lg-block">
                <a href="<?php echo site_url();?>jeux/index"><button class="raise">Catalogue</button></a>
                <a href="<?php echo site_url();?>user/login"><button class="raise">Connexion</button></a>
                <a href="<?php echo site_url();?>user/signup"><button class="raise">S'inscrire</button></a>
                <?php echo $pseudonyme?>
            </div>
        </nav>
        <nav role="navigation" class="d-block d-lg-none">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <?php echo $pseudonyme?>
                    <a href="<?php echo site_url();?>jeux/index">
                        <li>Catalogue</li>
                    </a>
                    <a href="<?php echo site_url();?>user/login">
                        <li>Connexion</li>
                    </a>
                    <a href="<?php echo site_url();?>user/signup">
                        <li>S'inscrire</li>
                    </a>
                </ul>
            </div>
        </nav>
        </div>
    <img id="headerimage" class="d-block d-lg-none" src="<?php echo base_url(); ?>public/images/fusee.png" height="50" width="50">
    <div class="d-block d-lg-none">
            <h1>LANNION GAME</h1>
        </div>
</div>