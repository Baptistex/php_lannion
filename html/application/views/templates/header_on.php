<div id="pseudo" class="d-none d-lg-block">
    <?php echo $pseudonyme?>
</div>

<div class="row">
    <div class="d-none d-lg-block">
        <h1>LANNION GAME</h1>
    </div>
    <div>
        <nav>
            <div class="button d-none d-lg-block">
                <a href="<?php echo base_url();?>jeux/index"><button class="raise">Catalogue</button></a>
                <a href="<?php echo base_url();?>collection/index"><button class="raise">Ma Collection</button></a>
                <a href="<?php echo base_url();?>user/disconnect"><button class="raise">Déconnexion</button></a>
                
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
                    <a href="<?php echo base_url();?>jeux/index">
                        <li>Catalogue</li>
                    </a>
                    <a href="<?php echo base_url();?>collection/index">
                        <li>Ma Collection</li>
                    </a>
                    <a href="<?php echo base_url();?>user/disconnect">
                        <li>Déconnexion</li>
                    </a>
                </ul>
            </div>
        </nav>
        <div class="d-block d-lg-none">
<h1>LANNION GAME</h1>
</div>
</div>
