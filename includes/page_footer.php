<?php
include_once("../version.php");
$smarty->assign("wrm_version", $version);
$smarty->display('footer.tpl.html');
?>