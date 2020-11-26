<div id="pseudo" class="d-none d-lg-block">
    <?php echo $pseudonyme?>
</div>

<div class="row">
<img id="headerimage" class="d-none d-lg-block" src="<?php echo base_url(); ?>public/images/fusee.png" height="50" width="50">
    <div  class="d-none d-lg-block row">
        <h1>LANNION GAME</h1>
    </div>
    <div>
        <nav>
            <div class="button d-none d-lg-block">
                <a href="<?php echo site_url();?>jeux/index"><button class="raise">Catalogue</button></a>
                <a href="<?php echo site_url();?>collection/index"><button class="raise">Ma Collection</button></a>
                <a href="<?php echo site_url();?>user/list"><button class="raise">Collectionneur</button></a>
                <a href="<?php echo site_url();?>user/disconnect"><button class="raise">Déconnexion</button></a>
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
                    <a href="<?php echo site_url();?>collection/index">
                        <li>Ma Collection</li>
                    </a>
                    <a href="<?php echo site_url();?>user/list">
                        <li>Collectionneur</li>
                    </a>
                    <a href="<?php echo site_url();?>user/disconnect">
                        <li>Déconnexion</li>
                    </a>
                    <a href="<?php echo site_url();?>user/newadmin">
                        <li>Administration</li>
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