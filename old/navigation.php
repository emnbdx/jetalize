<?php
if ((!isset($_GET['p'])) or (empty($_GET['p']))) { $page = 1; } else { $page = $_GET['p']; } ?>
<ul>
	<li class="<?php Item($page, 1); ?>"><a href="index.php?p=1">Accueil</a></li>
    <li class="<?php Item($page, 2); ?>"><a href="index.php?p=2">Randonnées</a></li>
    <li class="<?php Item($page, 3); ?>"><a href="index.php?p=3">Locations</a></li>
    <li class="<?php Item($page, 4); ?>"><a href="index.php?p=4">Séminaires</a></li>
    <li class="<?php Item($page, 5); ?>"><a href="index.php?p=5">Insolites</a></li>
    <li  class="<?php Item($page, 6); ?>" style="width:17.5%;"><a href="index.php?p=6">Contact</a></li>
</ul>
<div style="clear:both;"></div>
