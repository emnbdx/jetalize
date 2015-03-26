<?php
function Item($page,$page_active) {
	if ($page==$page_active) { $class = 'item_active'; }
	else { $class = 'item'; }
	echo $class;

}
?>