<?php

if (!isset($_GET['step']))
$step = 0;
else
$step = $_GET['step'];


include($wrm_config_file);

include 'includes/page_header.php';

$wrm_config_file = "../config.php";

if ($step=0)
{
	
	
	$localstr['easy']='easy';
	$localstr['normal']='normal';
	$localstr['expert']='expert';

	//$smarty->assign("bridge_install_mode_option_output", array($localstr['easy'],$localstr['normal'],$localstr['expert']));
	$smarty->assign("bridge_install_mode_option_output", array($localstr['normal'],$localstr['expert']));
	//$smarty->assign("bridge_install_mode_option_values", array(0,1,2));
	$smarty->assign("bridge_install_mode_option_values", array(1,2));
	$smarty->assign("bridge_install_mode_option_selected", $localstr['easy']);

	$smarty->assign("bd_submit", $localstr['bd_submit']);

	$smarty->assign("form_action", "install.php?step=6");
	$smarty->display('step6.tpl.html');

	if(isset($_POST['submit']))
	{
		$bridge_install_mode = $_POST['bridge_install_mode'];
		header("Location: install.php?step=8&mode=$mode&bim=".$bridge_install_mode);
	}
	include 'includes/page_footer.php';
	
}

?>
