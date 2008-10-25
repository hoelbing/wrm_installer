<?php

if (!isset($_GET['step']))
	$step = 0;
else
	$step = $_GET['step'];

//mode = install type; 0 fresh , 1 upgrade
if (!isset($_GET['mode']))
	$mode = 0;
else
	$mode = $_GET['mode'];

if (!isset($_GET['bim']))
	$bridge_install_mode = 0;
else
	$bridge_install_mode = $_GET['bim'];

require 'include/libs/Smarty.class.php';

$phpversion=(int)(str_replace(".","",phpversion()));

$smarty = new Smarty();
$smarty->compile_check = true;
$smarty->debugging = false;
//$smarty->caching = false;
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'include/libs/Smarty/templates_c';
$smarty->config_dir = 'include/libs/Smarty/configs';
//$smarty->cache_dir = 'include/libs/Smarty/cache';

$file_config = "../config.php";

include 'include/header.php';

// Is Writeable function is bugged beyond belief, it has issues with ACL and Group accesses, use this instead.
//    will work in despite of Windows ACLs bug.
//NOTE: use a trailing slash for folders!!!
//see http://bugs.php.net/bug.php?id=27609
//see http://bugs.php.net/bug.php?id=30931
function is__writeable($path)
{
	// Check for a directory, if the passed path is a directory create a temp file as path
	//    and try to open, otherwise just try to open that file for writing.
	$checkpath = $path;

	if ($path{strlen($path)-1}=='/')
			$checkpath = $path.uniqid(mt_rand()).'.tmp';

	if (!($f = @fopen($checkpath, 'a+')))
			return false;

	fclose($f);
	if ($checkpath != $path)
			unlink($checkpath);
	return true;
}

function get_mysql_version_from_phpinfo()
{
	ob_start();
	phpinfo(INFO_MODULES);
	$info = ob_get_contents();
	ob_end_clean();
	$info = stristr($info, 'Client API version');
	preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $info, $match);
	$gd = $match[0];
	
	return $gd; 
}

/*************************/
if($step == 0) {
	if(!isset($_POST['submit']))
	{
		@chmod($file_config,0777);
		@chmod("./wowarmory_tooltip/",0775);
		
		if($phpversion<401)
		{
			$phpversion_bgcolor = "red";
		}
		else
		{
			$phpversion_bgcolor = "green"; 
		}
		
		$gd = get_mysql_version_from_phpinfo();
		if ($gd < "4.1.0")
		{
			$mysqlversion_bgcolor = "red";
		}
		else
		{
			$mysqlversion_bgcolor = "green"; 
		}
		if (get_cfg_var("upload_max_filesize") <= 0)
		{
			$upload_max_filesize_bgcolor = "red";
		}
		else
		{
			$upload_max_filesize_bgcolor = "green"; 
		}
		if (get_cfg_var("magic_quotes_sybase"))
		{
			$magic_quotes_sybase_bgcolor = "red";
			$magic_quotes_sybase_value = $localstr['step0_nonactive'];
		}
		else
		{
			$magic_quotes_sybase_bgcolor = "green"; 
			$magic_quotes_sybase_value = $localstr['step0_active'];
		}
		
		// NOTE: BE CAREFUL WITH IS__WRITEABLE, that is NOT the built in is_writeable function. (See Double Underscore)
		if(!is__writeable($file_config))
		{
			$writeable_config_bgcolor = "red";
			$writeable_config_value = $localstr['no'];
		}
		else
		{
			$writeable_config_bgcolor = "green"; 
			$writeable_config_value = $localstr['yes'];
		}
		
		//table
		$smarty->assign("headtitle", $localstr['headtitle']);
		$smarty->assign("property", $localstr['step0_property']);
		$smarty->assign("required", $localstr['step0_required']);
		$smarty->assign("exist", $localstr['step0_exist']);
		$smarty->assign("system_requirements", $localstr['step0_system_requirements']);
		$smarty->assign("phpversion_text", $localstr['step0_phpversion_text']);
		$smarty->assign("phpversion_value", phpversion());
		$smarty->assign("phpversion_bgcolor", $phpversion_bgcolor);
		$smarty->assign("mysqlversion_text", $localstr['step0_mysqlversion']);
		$smarty->assign("mysqlversion_value", $gd);
		$smarty->assign("mysqlversion_bgcolor", $mysqlversion_bgcolor);
		$smarty->assign("upload_max_filesize_value", get_cfg_var("upload_max_filesize"));
		$smarty->assign("upload_max_filesize_bgcolor", $upload_max_filesize_bgcolor);
		$smarty->assign("magic_quotes_sybase_value", $magic_quotes_sybase_value);
		$smarty->assign("magic_quotes_sybase_bgcolor", $magic_quotes_sybase_bgcolor);
		$smarty->assign("nonactive", $localstr['step0_nonactive']);
		
		$smarty->assign("writeable_config_text", $localstr['step0_writeable_config']);
		$smarty->assign("writeable_config_value", $writeable_config_value);
		$smarty->assign("yes", $localstr['yes']);
		$smarty->assign("writeable_config_bgcolor", $writeable_config_bgcolor);
	
		$smarty->assign("mode_option_output", array($localstr['freshinstall'],$localstr['upgrade'],"Bridge Config"));
		$smarty->assign("mode_option_values", array(0,1,2));
		$smarty->assign("mode_option_selected", $localstr['freshinstall']);
		
		$smarty->assign("bd_submit", $localstr['bd_submit']);
	
	//	$smarty->assign("form_action", "install.php?step=1");
		$smarty->assign("form_action", "install.php");
		$smarty->display('step0.tpl');
	}
	if(isset($_POST['submit']))
	{
		$mode = $_POST['mode'];
		header("Location: install.php?step=1&mode=$mode");
		exit();
	
	}
}
if($step == 1) {

	if ($_GET['mode'] == 2)
	{
		header("Location: install.php?step=6&mode=$mode");
		exit();
	}
	// If the config file already exists and has something in it, we'll use it.
	if(!isset($_POST['submit']))
	{
		if(is_file($file_config))
		{
			include($file_config);
	
			$db_name_value = $phpraid_config['db_name'];
			$db_server_hostname_value = $phpraid_config['db_host'];
			$db_username_value = $phpraid_config['db_user'];
			$db_password_value = $phpraid_config['db_pass'];
			$db_tableprefix_value = $phpraid_config['db_prefix'];
		}
		else
		{
			$db_name_value = "";
			$db_server_hostname_value = "localhost";
			$db_username_value = "";
			$db_password_value = "";
			$db_tableprefix_value = "wrm_";
		}

		$smarty->assign("form_action", "install.php?step=1");
		//table
		$smarty->assign("headtitle", $localstr['headtitle']);
		$smarty->assign("db_name_text", $localstr['step2dbname']);
		$smarty->assign("db_name_value", $db_name_value);
		$smarty->assign("db_server_hostname_text", $localstr['step2dbserverhostname']);
		$smarty->assign("db_server_hostname_value", $db_server_hostname_value);
		$smarty->assign("db_username_text", $localstr['step2dbserverusername']);
		$smarty->assign("db_username_value", $db_username_value);
		$smarty->assign("db_password_text", $localstr['step2dbserverpwd']);
		$smarty->assign("db_password_value", $db_password_value);
		
		$smarty->assign("db_tableprefix_text", $localstr['step2WRMtableprefix']);
		$smarty->assign("db_tableprefix_value", $db_tableprefix_value);
		
		$smarty->assign("bd_submit", $localstr['bd_submit']);
	
		$smarty->display('step1.tpl');
	}
	if(isset($_POST['submit']))
	{
		$name = $_POST['db_name'];
		$hostname = $_POST['db_server_hostname'];
		$username = $_POST['db_username'];
		$password = $_POST['db_password'];
		$prefix = $_POST['db_tableprefix'];

		include($file_config);
		
		if (isset($phpraid_config['eqdkp_db_name']))
		{
			$eqdkp_name = $phpraid_config['eqdkp_db_name'];
			$eqdkp_host = $phpraid_config['eqdkp_db_host'];
			$eqdkp_user = $phpraid_config['eqdkp_db_user'];
			$eqdkp_pass = $phpraid_config['eqdkp_db_pass'];
			$eqdkp_prefix = $phpraid_config['eqdkp_db_prefix'];		
		}
		else
		{
			$eqdkp_name = "";
			$eqdkp_host = "";
			$eqdkp_user = "";
			$eqdkp_pass = "";
			$eqdkp_prefix = "";	
		}
		
		$FOUNDERROR = FALSE;
		
		// database connection
		$link = mysql_connect($hostname, $username, $password);
		if(!$link)
		{ 
			$FOUNDERROR = TRUE;
		}
		else {
			if(!@mysql_select_db($name,$link))
			{ 
				$FOUNDERROR = TRUE;
			}
		}
		
		if ($FOUNDERROR == FALSE)
		{

			include('../version.php');
			// write config file (config.php)
			$output  = "<?php\n";
			$output .= "/*\n";
			$output .= "#**********************************************#\n";
			$output .= "#                                              #\n";
			$output .= "#     auto-generated configuration file        #\n";
			$output .= "#     WoW Raid Manager ".$version."                   #\n";
			$output .= "#     date: ".date("Y-m-d - H:i:s")."              #\n";
			$output .= "#   Do not change anything in this file!       #\n";
			$output .= "#                                              #\n";
			$output .= "#**********************************************#\n";
			$output .= "*/\n\n";
			$output .= "global ".'$phpraid_config'.";\n";
			$output .='$phpraid_config[\'db_name\']'." = '$name';\n".'$phpraid_config[\'db_host\']'." = '$hostname';\n";
			$output .='$phpraid_config[\'db_user\']'." = '$username';\n".'$phpraid_config[\'db_pass\']'." = '$password';\n";
			$output .='$phpraid_config[\'db_prefix\']'." = '$prefix';\n".'$phpraid_config[\'eqdkp_db_name\']'." = '$eqdkp_name';\n";
			$output .='$phpraid_config[\'eqdkp_db_host\']'." = '$eqdkp_host';\n".'$phpraid_config[\'eqdkp_db_user\']'." = '$eqdkp_user';\n";
			$output .='$phpraid_config[\'eqdkp_db_pass\']'." = '$eqdkp_pass';\n".'$phpraid_config[\'eqdkp_db_prefix\']'." = '$eqdkp_prefix';\n";
			$output .= "?>\n";
	
			$fd = fopen($file_config,'w+');
			fwrite($fd, $output);
			fclose($fd);
			header("Location: install.php?step=2&mode=".$mode);
			exit();
		}
		
	}
}

if($step == 2)
{	
/*	if($mode==1)
	{
		header("Location: update.php");
		exit();
	}
*/
	include($file_config);
	include(install_settings.php);
	
	$foundtable=0;
	$result = mysql_list_tables($phpraid_config['db_name']);
 
	for($i=0; $i<$db->num_rows($result); $i++) {
	  if(in_array(mysql_tablename($result,$i),$wrm_tables)) {
	   $foundtable=1;
	   break;
	  }
	}

	if($foundtable==1)
	{
	}
}

if($step == 3)
{	
	include($file_config);
	include("install_settings.php");

	mysql_select_db($phpraid_config['db_name']);
	
	//install schema
	if(!$fd = fopen('database_schema/install_schema.sql', 'r'))
		die('<font color=red>'.$localstr['step3errorschema'].'.</font>');

	if ($fd) {
		while (!feof($fd)) {
			$line = fgetc($fd);
			$sql .= $line;

			if($line == ';')
			{
				$sql = substr(str_replace('`phpraid_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
				mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	header("Location: install.php?step=4&mode=".$mode);
	exit();
}

if($step == 4)
{
	
	//insert (default) values
	if(!$fd = fopen('database_schema/insert_values.sql', 'r'))
		die('<font color=red>'.$localstr['step3errorschema'].'.</font>');

	if ($fd) {
		while (!feof($fd)) {
			$line = fgetc($fd);
			$sql .= $line;

			if($line == ';')
			{
				$sql = substr(str_replace('`phpraid_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
				mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	header("Location: install.php?step=5&mode=".$mode);
	exit();

}

//install Collation on wrm MySQL
if($step == 5)
{
	// Run the alter_tables.sql for setting Character Set and Collation if MySQL version > 4.1.0
	$gd = get_mysql_version_from_phpinfo();
	if ($gd >= "4.1.0")
	{
		include("install_settings.php");

		for ($i=0; $i <count($wrm_tables); $i++)
		{
			$sql="ALTER TABLE `".$phpraid_config['db_prefix']."_".$wrm_tables[i]."` DEFAULT CHARACTER SET 'UTF8' COLLATE=utf8_bin";
			mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
		}
	}

	header("Location: install.php?step=6&mode=".$mode);
	exit();
}

//bridges
/*
array laden
config file ort bestimmen
load_configfile
test: if all tables available

all user , load in a array  -> set admin

in wrm db eintragen und fertig
*/
if($step == 6)
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

	$smarty->assign("form_action", "install.php");
	$smarty->display('step6.tpl');

	if(isset($_POST['submit']))
	{
		$bridge_install_mode = $_POST['bridge_install_mode'];
		header("Location: install.php?step=7&mode=$mode&bim=".$bridge_install_mode);
		exit();
	}
}

//find cms config file position
if($step == 7)
{
	//scan complet dir
	if($bridge_install_mode == 0)
	{
	}
	//set root dir
	elseif($bridge_install_mode == 1)
	{
		$bridge = array();
		$dir = 'auth';
		$dh = opendir($dir);
		while(false != ($filename = readdir($dh))) {
			include($filename);
		}
		printf($bridge);
	}
	elseif($bridge_install_mode == 2)
	{
		header("Location: install.php?step=8&mode=$mode&bim=".$bridge_install_mode);
		exit();
	}

	if(isset($_POST['submit']))
	{
		$bridge_install_mode = $_POST['bridge_install_mode'];
		header("Location: install.php?step=7&mode=$mode&bim=".$bridge_install_mode);
		exit();
	}

}

if($step == 8)
{

}
?>
