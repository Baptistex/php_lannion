


<nav>
            <nav>
            <div class="button d-none d-lg-block">
                <a href="<?php echo base_url();?>jeux/index"><button class="raise">Catalogue</button></a>
                <a href="<?php echo base_url();?>collection/index"><button class="raise">Ma Collection</button></a>
                <a href="<?php echo base_url();?>user/disconnect"><button class="raise">Déconnexion</button></a>
                <a href="<?php echo base_url();?>user/newadmin"><button class="raise">Administration</button></a>
                <a href="<?php echo base_url();?>user/list"><button class="raise">Collectionneur</button></a>
            </div>
            
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
                    <a href="<?php echo base_url();?>user/list"><li>Collectionneur</li></a>
                    
                    <a href="<?php echo base_url();?>user/disconnect">
                        <li>Déconnexion</li>
                    </a>
                    <a href="<?php echo base_url();?>user/newadmin">
                        <li>Administration</li>
                    </a>
                </ul>
            </div>
        </nav>
</nav>
