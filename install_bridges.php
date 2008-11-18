<?php

/*-------------------------------*/
//lang strg
$localstr['bd_scan'] = "scan";
$localstr['bridge_expert_mode'] = "expert mode";
$localstr['bridge_scan_titel'] = "pls press the button SCAN for scanning after config files @ your web server";

/*-------------------------------*/

/*
* todo:
* find bb/cms config file fkt->get_all_configfileposition_onwebserver()
* (
* 	1.array ($array_confname) with all configefilename;
* 	2. search the webserver and compare with array ($array_confname);
* )
* -> result in a array
* -> array in combobox
* user can select: a config file 
* 
* expert mode
* */

if (!isset($_GET['step']))
$step = 0;
else
$step = $_GET['step'];

//set Lang. Format
if (!isset($_POST['classlang_type']))
	$lang = "english";
else
	$lang = $_POST['classlang_type'];

include('language/locale-'.$lang.'.php');


//include ("includes/page_header.php");

$filename_bridge = "install_bridges.php";
$wrm_config_file = "../config.php";
include($wrm_config_file);

/**
 * get a array with all available, cms/bb configfile, position
 *
 * @return array()
 */
function get_all_configfileposition_onwebserver()
{
	$array_all_conf_pos = array();
	return $array_all_conf_pos;
}

if ($step == 0)
{
	if ( !isset($_POST['scan']) and !isset($_POST['submit']))
	{
		$array_all_conf_pos = array("","");
		include ("includes/page_header.php");
		
		$smarty->assign(
			array(
				"form_action" => $filename_bridge."?step=".$step ,
				"headtitle" => $localstr['bridge_scan_titel'],
				"bridge_type_output" => $localstr['bridge_expert_mode'],
				"bridge_type_values" => $localstr['bridge_expert_mode'],
				"bridge_type_selected" => $localstr['bridge_expert_mode'],
				"bd_scan" => $localstr['bd_scan'],
				"bd_submit" => $localstr['bd_submit'],
			)
		);
		
		$smarty->display('bridges.s0.tpl.html');
		include ("includes/page_footer.php");
	}

	if(isset($_POST['scan']))
	{
		$array_all_conf_pos = get_all_configfileposition_onwebserver();
		$array_all_conf_pos[] = $localstr['bridge_expert_mode'];
		include ("includes/page_header.php");
		
		$smarty->assign(
			array(
				"form_action" => $filename_bridge."?step=".$step ,
				"headtitle" => $localstr['headtitle'],
				"bridge_type_output" => $array_all_conf_pos,
				"bridge_type_values" => $array_all_conf_pos,
				"bridge_type_selected" => $array_all_conf_pos[0],
				"bd_scan" => $localstr['bd_scan'],
				"bd_submit" => $localstr['bd_submit'],
			)
		);
		
		$smarty->display('bridges.s0.tpl.html');
		include ("includes/page_footer.php");		
	}
	
	if(isset($_POST['submit']))
	{
		if ($_POST['allfoundbridges'] == $localstr['bridge_expert_mode'])
		{
			//goto ep_mode_1
			header("Location: ".$filename_bridge."?step=100");
			exit;
		}
		else
			header("Location: ".$filename_bridge."?step=1");
	}
}

if ($step == 1)
{

	//header("Location: ".$filename_bridge."?step=0");
}


/**
 * --------------- EXPERT MODE ---------------
 * 
 * user -> get bridge settings 
*/

if ($step == 100)
{
	if(!isset($_POST['submit']))
	{
		include ("includes/page_header.php");
		// array with all bridge name
		$array_bridge_name = array();
		
		
		$array_bridge_name[] = "phpBB3";//only for testting
		$array_bridge_name[] = "e107";//only for testting
		$smarty->assign(
			array(
				"form_action" => $filename_bridge."?step=".$step ,
				"headtitle" => "INFO: you have select the EXPERT MODE",
	
				"bridge_db_name_text" => $localstr['step2dbname'],
				"bridge_db_name_value" => $db_name_value,
				"bridge_db_server_hostname_text" => $localstr['step2dbserverhostname'],
				"bridge_db_server_hostname_value" => $db_server_hostname_value,
				"bridge_db_username_text" => $localstr['step2dbserverusername'],
				"bridge_db_username_value" => $db_username_value,
				"bridge_db_password_text" => $localstr['step2dbserverpwd'],
				"bridge_db_password_value" => $db_password_value,
				"bridge_type_text" => "select your bridge type",
				"bridge_type_output" => $array_bridge_name,
				"bridge_type_values" => $array_bridge_name,
				"bridge_type_selected" => $array_bridge_name[0],
	
				"bd_submit" => $localstr['bd_submit'],
			)
		);
		
		$smarty->display('bridges_expertmode_1.tpl.html');
		include ("includes/page_footer.php");
	}
	if(isset($_POST['submit']))
	{
		$bridge_db_name = $_POST['bridge_db_name'];
		$bridge_db_server_hostname = $_POST['bridge_db_server_hostname'];
		$bridge_db_username = $_POST['bridge_db_username'];
		$bridge_db_password = $_POST['bridge_db_password'];

		$FOUNDERROR = FALSE;
		//test: database connection
		$link = @mysql_connect($bridge_db_server_hostname, $bridge_db_username, $bridge_db_password);
		if(!$link)
		{
			$FOUNDERROR = TRUE;
		}
		else 
		{
			if(!@mysql_select_db($bridge_db_name,$link))
			{
				$FOUNDERROR = TRUE;
			}
		}
	}
}

//set user, from cms/bb system, they have full/all rights in wrm
if ($step == "ep_mode_2")
{
	
}

if ($step == 2)
{
	/*
}
//load all auth briges settings
	$bridge = array();
	$array_confname = array();
	
	$dir_brige = "auth";
	//load all available files, from "auth" dir in a array
	$dh = opendir($dir_brige);
	while(false != ($filename = readdir($dh)))
	{
		$files[] = $filename;
	}
	
	//sort and cut/del "." and ".." from array
	sort($files);
	array_shift($files);
	array_shift($files);
	
	//include and load ALL briges settings
	for ($i=0;$i<count($files);$i++)
	{
		include ($dir_brige."/".$files[$i]);
	}

	//load from the bridges ONLY the/all (configfile)name in the array $array_confname
	for ($i=0;$i<count($bridge);$i++)
	{
		$array_confname[] = $bridge[$i]['DB_configfile_name'];
	}
	


	if(isset($_POST['submit']))
	{
		header("Location: install_briges.php?step=1");
	}
	//include 'includes/page_footer.php';
*/
}

if($step == "bridge_done")
{
/*	
	// verified user, might as well throw him in profile now if they don't already exist
		$sql = "SELECT username FROM " . $phpraid_config['db_prefix']. "profile WHERE username = '$wbb_useradmin_name'";
		
		$result = mysql_query($sql) or die("Error verifying " . mysql_error());
		//$sqlresultdata = mysql_fetch_assoc($result);
		
		if((mysql_num_rows($result) == 0))
		{
			$sql = "INSERT INTO " . $phpraid_config['db_prefix'] . "profile (`profile_id`,`username`,`email`,`password`,`priv`) ";
			$sql.= "VALUES('$wbb_useradmin_id','$wbb_useradmin_name','$wbb_useradmin_email','$wbb_useradmin_password','1')";
			$result = mysql_query($sql) or die("Error inserting " . mysql_error());
		}
		else
		{
			$sql = "UPDATE " . $phpraid_config['db_prefix'] . "profile SET priv='1' WHERE username='$wbb_useradmin_name'";
			mysql_query($sql)or die("Error updating " . mysql_error());
		}

// install
	$sql = "INSERT INTO " . $phpraid_config['db_prefix'] . "config VALUES('auth_type','wbb')";
	mysql_query($sql);
	$sql = "INSERT INTO " . $phpraid_config['db_prefix'] . "config VALUES('wbb_base_path','$wbb_base_path')";
	mysql_query($sql) or die("BOO5");
	$sql = "INSERT INTO " . $phpraid_config['db_prefix'] . "config VALUES('wbb_table_prefix','$wbb_prefix')";
	mysql_query($sql) or die("Error inserting wbb_table_prefix in config table. " . mysql_error());
	// Insert the wbb_auth_user_class
	$sql = "INSERT INTO " . $phpraid_config['db_prefix'] . "config VALUES('wbb_auth_user_class', '" . $wbb_auth_user_class . "')";
	mysql_query($sql) or die("Error inserting wbb_auth_user_class in config table. " . mysql_error());

	// Insert the wbb_auth_user_class
	$sql = "INSERT INTO " . $phpraid_config['db_prefix'] . "config VALUES('wbb_alt_auth_user_class', '" . $wbb_alt_auth_user_class . "')";
	mysql_query($sql) or die("Error inserting wbb_alt_auth_user_class in config table. " . mysql_error());
*/
}

?>