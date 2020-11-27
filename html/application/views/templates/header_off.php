<div class="row">
    <img alt="Logo du site" class="d-none d-lg-block headerimage" src="<?php echo base_url(); ?>public/images/fusee.png"
        height="50" width="50">
    <div class="d-none d-lg-block row">
        <h1>LANNION GAME</h1>
    </div>
    <div>
        <nav>
            <div class="button d-none d-lg-block">
                <a href="<?php echo site_url("/jeux/index"); ?>">
                    <div class="raise headerbtn">Catalogue</div>
                </a>
                <a href="<?php echo site_url("/user/login"); ?>">
                    <div class="raise headerbtn">Connexion</div>
                </a>
                <a href="<?php echo site_url("/user/signup"); ?>">
                    <div class="raise headerbtn">S'inscrire</div>
                </a>
            </div>
        </nav>
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
                            <a href="<?php echo site_url("/user/login"); ?>">Connexion</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("/user/signup"); ?>">S'inscrire</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <img alt="Logo du site" class="d-block d-lg-none headerimage" src="<?php echo base_url(); ?>public/images/fusee.png"
        height="50" width="50">
    <div class="d-block d-lg-none">
        <h1>LANNION GAME</h1>
    </div>
</div>