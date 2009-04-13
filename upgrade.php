<?php
/*
*
* Upgrade file format x.x.x.sql
* eg: database_schema/upgrade/4.0.0.sql
*/

/*-------------------------------*/
//lang strg
$wrm_install_lang['wrm_versions_nr_current_text'] = "WRM (@Server) Version Nr";
$wrm_install_lang['wrm_versions_nr_from_install_text'] = "Install Version Nr";
/*-------------------------------*/

if (!isset($_GET['step']))
$step = 0;
else
$step = $_GET['step'];

/*----------------------------------------------------------------*/
/*
 * include Files
 */

//set Lang. Format
if (!isset($_GET['lang']))
	$lang = "english";
else
	$lang = $_GET['lang'];
include_once('language/locale-'.$lang.'.php');

include_once ("includes/db/db.php");
include_once ("includes/function.php");

include_once("../version.php");
include_once("../config.php");
/*----------------------------------------------------------------*/


/**
 * Name from this File
 */
$filename_upgrade = "upgrade.php?lang=".$lang."&";

/**
 *  VersionNR, from this wrm Install File
 */
$versions_nr_install = $version;

/**
 * default wrm Table prefix
 * used: database_schema/upgrade/x.x.x.sql
 */
$default_wrmtable_prefix = "phpraid_";


$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);

/*----------------------------------------------------------------*/
/**
 * Version from your wrm (Server) Database
 */
//get the last (max) version nr, from wrm db
$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
$data = $wrm_install->sql_fetchrow($result, true);

$wrm_versions_nr_current_value = $data['version_number'];
$wrm_install->sql_close();
/*----------------------------------------------------------------*/

/* 
 * * check version nr
 *
*/
if ($step == 0)
{	
	/*if ((str_replace(".","",$versions_nr_current_wrm)) < "400")
	{
		//"your wrm version is to old, for upgrade"
		header("Location: .". $filename_upgrade."?step=100");
	}*/
	if ($wrm_versions_nr_current_value == $versions_nr_install)
	{
		// "your wrm is up to date";		
		include ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action" => "install.php?lang=".$lang."&step=done",
				"upgrade_headtitle" => $wrm_install_lang['upgrade_headtitle'],
				"wrm_versions_nr_current_value" => $wrm_versions_nr_current_value,
				"wrm_versions_nr_current_text" => $wrm_install_lang['wrm_versions_nr_current_text'],
				"wrm_versions_nr_from_install_value" => $versions_nr_install, 
				"wrm_versions_nr_from_install_text" => $wrm_install_lang['wrm_versions_nr_from_install_text'],
				"bd_start" => $wrm_install_lang['bd_submit'],	
			)
		);
		$smarty->display("update.tpl.html");
		include ("includes/page_footer.php");
	}
	else if ((str_replace(".", "", $wrm_versions_nr_current_value)) > (str_replace(".","",$versions_nr_install)))
	{
		// "your wrm version is newer as this installation file";
		include ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action" => $filename_upgrade,//"?step=1",
				"upgrade_headtitle" => $wrm_install_lang['upgrade_headtitle'],
				"wrm_versions_nr_current_value" => $wrm_versions_nr_current_value,
				"wrm_versions_nr_current_text" => $wrm_install_lang['wrm_versions_nr_current_text'],
				"wrm_versions_nr_from_install_value" => $versions_nr_install, 
				"wrm_versions_nr_from_install_text" => $wrm_install_lang['wrm_versions_nr_from_install_text'],
				"bd_start" => $wrm_install_lang['bd_start'],	
			)
		);
		$smarty->display("update.tpl.html");
		include ("includes/page_footer.php");
		
	}
	else
	{
		//upgrade
		include ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action" => $filename_upgrade."step=1",
				"upgrade_headtitle" => $wrm_install_lang['upgrade_headtitle'],
				"wrm_versions_nr_current_value" => $wrm_versions_nr_current_value,
				"wrm_versions_nr_current_text" => $wrm_install_lang['wrm_versions_nr_current_text'],
				"wrm_versions_nr_from_install_value" => $versions_nr_install, 
				"wrm_versions_nr_from_install_text" => $wrm_install_lang['wrm_versions_nr_from_install_text'],
				"bd_start" => $wrm_install_lang['upgrade'],	
			)
		);
		$smarty->display("update.tpl.html");
		include ("includes/page_footer.php");
	}
}

/**
 * repeat loop
 * -init. array with all upgrade file
 * -1. compare wrm db version with this array (upgrade files (x.x.x = version nr))
 * -2. sql command
 * -3. compare wrm db version and install file version 1. equal -> upgrade finish 2. not equal jump to step1 (now is the version +1)
 */
if ($step == 1)
{
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	/*
	 * load all filenname, from dir 'database_schema/upgrade', in array $files
	 */
	//array with all filename from the upgrade dir.
	$files = array();
	$dir_upgrade = 'database_schema/upgrade';
	$dh = opendir($dir_upgrade);

	while(($filename = readdir($dh)))
	{
		$files[] = str_replace('.sql','',$filename);
	}
		
	sort($files);
	array_shift($files);
	array_shift($files);

	//print_r($files);
	//version nr without point eg: 400 and not 4.0.0
	$versions_nr_current_wrm_wpoint = str_replace(".","",$wrm_versions_nr_current_value);
	$versions_nr_install_wpoint = str_replace(".","",$versions_nr_install);
//	echo $versions_nr_current_wrm_wpoint.">".$versions_nr_install_wpoint."<br>";
/*
	//---------------------------------------------------
	//this is for the problem: if the filename or the install version 4.x.x.x.x.x.x.x and the other 4.x.x.x 
	$count01 = 0;
	$count02 = 0;
	$tmppos = 0;
	while ($tmppos = strpos($versions_nr_current_wrm, ".", $tmppos))
		$count01++;
		
	$tmppos = 0;
	
	while ($tmppos = strpos($versions_nr_install, ".", $tmppos))
		$count02++;

	if ($count01>$count02)
	{
		while ($count01=$count02)
		{
			$versions_nr_current_wrm_wpoint = $versions_nr_current_wrm_wpoint*10;
		}
	}
	if ($count02>$count01)
	{
		while ($count01=$count02)
		{
			$versions_nr_install_wpoint = $versions_nr_install_wpoint*10;
		}
	}
	//---------------------------------------------------
*/
	while ($versions_nr_current_wrm_wpoint > $versions_nr_install_wpoint)
	//while (str_replace(".","",$wrm_versions_nr_current_value) > str_replace(".","",$versions_nr_install))	
	{
		$file_array_index = 0;
		for ($i=0; $i < count($files)-1; $i++)
		{
			if($files[$i] == $versions_nr_current_wrm)
			{
				$file_array_index = ((int)$i) + 1;
			}
		}

		if(!$fd = fopen('database_schema/upgrade/'.$files[$file_array_index].'.sql', 'r'))
			die('<font color=red>'.$localstr['step3errorschema'].'.</font>');
		
		if ($fd) {
			$sql = '';
			while (!feof($fd)) {
				$line = fgetc($fd);
				$sql .= $line;
	
				if($line == ';')
				{
					$sql = substr(str_replace('`'.$default_wrmtable_prefix,'`' . $phpraid_config['db_prefix'], $sql), 0, -1);
					$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
					$sql = '';
				}
			}
			fclose($fd);
		}
		//----
		$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
		echo $sql."<br>";
		$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$data = $wrm_install->sql_fetchrow($result);
		$versions_nr_current_wrm = $data['version_number'];
		echo $versions_nr_current_wrm."<br>";
		
	}
	
	$wrm_install->sql_close();
//echo $sql."<br>";
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "install.php?lang=".$lang."&step=done",
			"upgrade_headtitle" => $wrm_install_lang['upgrade_headtitle'],
			"wrm_versions_nr_current_value" => $wrm_versions_nr_current_value,
			"wrm_versions_nr_current_text" => $wrm_install_lang['wrm_versions_nr_current_text'],
			"wrm_versions_nr_from_install_value" => $versions_nr_install, 
			"wrm_versions_nr_from_install_text" => $wrm_install_lang['wrm_versions_nr_from_install_text'],
			"bd_start" => $wrm_install_lang['bd_submit'],	
		)
	);
	$smarty->display("update.tpl.html");
	include ("includes/page_footer.php");

}

?>
