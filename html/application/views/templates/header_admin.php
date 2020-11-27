<div id="pseudo" class="d-none d-lg-block">
    <?php echo $pseudonyme ?>
</div>

<div class="row">
    <img alt="Logo du site" class="d-none d-lg-block headerimage" src="<?php echo base_url(); ?>public/images/fusee.png" height="50" width="50">
    <div class="d-none d-lg-block row">
        <h1>LANNION GAME</h1>
    </div>
    <div>
        <nav>
            <div class="button d-none d-lg-block">
                <a href="<?php echo site_url("/jeux/index"); ?>">
                    <div class="raise headerbtn">Catalogue</div>
                </a>
                <a href="<?php echo site_url("/collection/index"); ?>">
                    <div class="raise headerbtn">Ma Collection</div>
                </a>
                <a href="<?php echo site_url("/user/list"); ?>">
                    <div class="raise headerbtn">Collectionneur</div>
                </a>
                <a href="<?php echo site_url("/user/disconnect"); ?>">
                    <div class="raise headerbtn">Déconnexion</div>
                </a>
            </div>

        </nav>
    </div>
    <nav class="d-block d-lg-none">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <div id="menu">
                <?php echo $pseudonyme ?>
                <ul>
                    <li>
                        <a href="<?php echo site_url("/jeux/index"); ?>">Catalogue</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("/collection/index"); ?>">Ma Collection</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("/user/list"); ?>">Collectionneur</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("/user/disconnect"); ?>">Déconnexion</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("/user/newadmin"); ?>">Administration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<img alt="Logo du site" class="d-block d-lg-none headerimage" src="<?php echo base_url(); ?>public/images/fusee.png" height="50" width="50">
<div class="d-block d-lg-none">
    <h1>LANNION GAME</h1>
</div>
</div>