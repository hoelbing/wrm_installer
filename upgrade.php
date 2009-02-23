<?php
/*
*
* Upgrade file format x.x.x.sql
* eg: database_schema/upgrade/4.0.0.sql
*/


if (!isset($_GET['step']))
$step = 0;
else
$step = $_GET['step'];

//set Lang. Format
if (!isset($_POST['classlang_type']))
	$lang = "english";
else
	$lang = $_POST['classlang_type'];

include_once ('language/locale-'.$lang.'.php');
include_once ("includes/db/db.php");
include_once ("includes/function.php");

/**
 * Name from the wrm Config File
 */
$wrm_config_file = "../config.php";

/**
 * Name from this File
 */
$filename_upgrade = "upgrade.php";

/**
 *  VersionNR, from this wrm Install
 */
$versions_nr_install = $version;

/**
 * Version from your wrm Database
 */
$versions_nr_current_wrm = "";

/**
 * default wrm Table prefix
 * used: database_schema/upgrade/x.x.x.sql
 */
$default_wrmtable_prefix = "wrm_";

/**
 * check version nr
 * repeat loop
 * -init. array with all upgrade file
 * -1. compare wrm db version with this array (upgrade files (x.x.x = version nr))
 * -2. sql command
 * -3. compare wrm db version and install file version 1. equal -> upgrade finish 2. not equal jump to step1 (now is the version +1)
 */
if ($step==0)
{
	include($wrm_config_file);
	include("../version.php");
	
	//$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	//@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	
	//get the last (max) version nr, from wrm db
	$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	//$result = @mysql_query($sql) or die(mysql_error());
	$data = $wrm_install->sql_fetchrow($result_db_all, true);
	//$data = @mysql_fetch_assoc($result);
	
	$versions_nr_current_wrm = $data['version_number'];

	/*if ((str_replace(".","",$versions_nr_current_wrm)) < "400")
	{
		@mysql_close($linkWRM);
		//"your wrm version is to old, for upgrade"
		header("Location: .". $filename_upgrade."?step=100");
	}*/
	if ($versions_nr_current_wrm == $versions_nr_install)
	{
		//@mysql_close($linkWRM);
		$wrm_install->sql_close();
		// "your wrm is up to date";
		header("Location: ". $filename_upgrade."?step=101");
	}
	else if ((str_replace(".","",$versions_nr_current_wrm)) > (str_replace(".","",$versions_nr_install)))
	{
		//@mysql_close($linkWRM);
		$wrm_install->sql_close();
		// "your wrm version is newer as this installation file";
		header("Location: ". $filename_upgrade."?step=102");
	}
	else
	{
		/*
		 * load all filenname, from dir 'database_schema/upgrade', in array $files
		 */
		//array with all filename from the upgrade dir.
		$files = array();
		$dir_upgrade = 'database_schema/upgrade';
		$dh = opendir($dir_upgrade);
		while(false != ($filename = readdir($dh)))
		{
			$filename = str_replace('.sql','',$filename);
			$files[] = $filename;
		}
		
		sort($files);
		array_shift($files);
		array_shift($files);

		//version nr without point eg: 400 and not 4.0.0
		while ((str_replace(".","",$versions_nr_current_wrm)) > (str_replace(".","",$versions_nr_install)))
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
						//echo "<br>".$sql;
						//@mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
						$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
						$sql = '';
					}
				}
				fclose($fd);
			}
			//----
			$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
			//$result = @mysql_query($sql) or die(mysql_error());
			$result= $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
			//$data = @mysql_fetch_assoc($result);
			$data = $wrm_install->sql_fetchrow($result_db_all);
			$versions_nr_current_wrm = $data['version_number'];
		}
	}
	
	//@mysql_close($linkWRM);	
	$wrm_install->sql_close();
}

/*---------error's--------------------*/
if ($step==100)
{
/*
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "",
			"error_msg_headtitle" => " install error",
			"error_msg" => "your wrm version is to old, for upgrade",
		)
	);
	$smarty->display("error.html");
	include ("includes/page_footer.php");
*/
	echo "your wrm version is to old, for upgrade";
}

if ($step==101)
{
/*		
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "",
			"error_msg_headtitle" => $wrm_install_lang['headtitle'],
			"versions_nr_current_wrm" => $versions_nr_current_wrm,
			"versions_nr_install" => $versions_nr_install,
		)
	);
	$smarty->display("update_show_vnr.html");
	include ("includes/page_footer.php");*/
	echo "your wrm is up to date";
}

if ($step==102)
{
/*
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "",
			"error_msg_headtitle" => " install error",
			"error_msg" => "your wrm version is newer as this installation file",
		)
	);
	$smarty->display("error.html");
	include ("includes/page_footer.php");
*/
	echo "your wrm version is newer as this installation file";
}

?>
