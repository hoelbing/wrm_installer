<?php
/**********************************************************
 * Load Template System Here (Smarty/phpLib)
 **********************************************************/

//Load Smarty Library
define('SMARTY_DIR', dirname(__FILE__).'/smarty/libs/');
require('smarty/libs/Smarty.class.php');

$smarty = new Smarty();
// Turning on Caching will cause many pages not to display dynamic changes properly.
$smarty->caching = false;
$smarty->compile_check = true;

/* Turn on/off Smarty Template Debugging by commenting/uncommenting the lines below. */
$smarty->debugging = false;
//$smarty->debugging = true;

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'cache/templates_c';
$smarty->config_dir = 'includes/smarty/configs/';
$smarty->cache_dir = 'cache/smarty_cache';

// Set Page content type header:
header('Content-Type: text/html; charset=utf-8');

//body header stuff
$lang_dir = 'language';
$dh = opendir($lang_dir);
while(false != ($filename = readdir($dh))) {
	$filename = substr($filename, 7);
	$filename = str_replace('.php','',$filename);
	$files[] = $filename;
}
sort($files);
array_shift($files);
array_shift($files);

//set Lang. Format
if (!isset($_POST['classlang_type']))
	$lang = "english";
else
	$lang = $_POST['classlang_type'];

$smarty->assign(
	array(
		"headtitle" =>  $wrm_install_lang['headtitle'],
		"install_title" =>  $wrm_install_lang['headtitle'],
		"form_action" =>  'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"],
		"classlang_type_values" => $files,
		"classlang_type_selected" => $lang,
		"select_lang" => $wrm_install_lang['select_lang'],
	)
);

$smarty->display('header.tpl.html');
?>