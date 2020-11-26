<h2><?php echo $title ?></h2>

<div class="recherche">
    <?php echo form_open('jeux/index') ?>
    <input id="searchbar" type="text" name="searchtext" placeholder="Rechercher un jeu"
        onkeyup="ajaxSearch(this.value)">
    <div class="search"></div>
    </form>
</div>
<form method="post">
<select name="liste">
    <option value="1" Selected> </option>
    <option value="2">A-Z</option>
    <option value="3">Z-A</option>
    <option value="4">Date</option>
</select>
<input type="submit" value="ok">
</form>
<div id="catalogue">
    <div class="jeux_recents">
        <?php echo $recent_title ?>
        <div class="row col-lg-10 offset-lg-1 d-none d-lg-block">
            <?php foreach ($recent as $jeu) : ?>
            <div class="example-1 card ">
                <div class="wrapper">
                    <img src=<?php echo $jeu['couverture'] ?> width="272.95">
                    <div class="date">
                        <span class="day"><?php echo $jeu['sortie'] ?></span>
                    </div>
                    <div class="data">
                        <div class="content">
                            <h1 class="title"> <a href="<?php echo site_url() . "jeux/game/" . $jeu["id"] ?>"
                                    class="inner"><?php echo $jeu['titre'] ?></a></h1>
                            <p class="text"><?php echo $jeu["description"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div id="listejeu" class="col-lg-10 offset-lg-1">
        <?php foreach ($jeuxlist as $jeu) : ?>
        <div id="pattern" class="pattern">
            <ul class="list img-list">
                <li>
                    <a href="<?php echo site_url() . "jeux/game/" . $jeu["id"] ?>" class="inner">
                        <div class="li-img">
                            <img src="<?php echo $jeu['couverture'] ?>" width="200" height="240">
                        </div>
                        <div class="li-text">
                            <h4 class="li-head"><?php echo $jeu['titre'] ?></h4>
                            <p class="li-sub d-none d-lg-block">
                                <?php echo substr($jeu['description'], 0, 150);
                                    if (strlen($jeu['description']) > 150) {
                                        echo '...';
                                    } ?>
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!--End Pattern HTML-->
        <?php endforeach ?>
    </div>
</div>
<script>
function ajaxSearch(str) {
    $.ajax({
        method: "post",
        url: "<?php echo site_url(); ?>jeux/index",
        data: {
            "searchtext": str
        },
        success: function(response) {
            $("#catalogue").html(response);
        }
    });
}


$(document).keypress(
    function(event) {
        if (event.which == '13') {
            event.preventDefault();
        }
    });
</script>