

<h2><?php echo $title ?></h2>

    <?php foreach($jeuxlist as $jeu):?>
        <div id="pattern" class="pattern">
            <ul class="list img-list">
                  <li>
                      <a href="#" class="inner">
                          <div class="li-img">
                              <img src="<?php echo $jeu['couverture']?>" width="100" height="200">
                          </div>
                          <div class="li-text">
                              <h4 class="li-head"><?php echo $jeu['titre']?></h4>
                              <p class="li-sub d-none d-lg-block"><?php echo substr($jeu['description'],0,200); if (strlen($jeu['description'])>200){echo '...';}?></p>
                          </div>
                      </a>
                  </li>
            </ul>
                  
          <!--End Pattern HTML-->

<?php endforeach ?>
