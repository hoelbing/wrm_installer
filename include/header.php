<?php
if (!isset($_POST['classlang_type']))
	$lang = "english";
else
	$lang = $_POST['classlang_type'];

require_once('language/locale-'.$lang.'.php');

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


$smarty->assign("classlang_type_values", $files);
$smarty->assign("classlang_type_selected", $lang);
$smarty->assign("select_lang", $localstr['select_lang']);

?>