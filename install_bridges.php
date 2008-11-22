<?php

/*-------------------------------*/
//lang strg
$localstr['bd_scan'] = "scan";
$localstr['bridge_expert_mode'] = "expert mode";
$localstr['bridge_step0_titel'] = "welcome to the bridge Mode";
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
* 
* ------
* SHOW DATABASES
* SHOW TABLES  
* SHOW Columns from TABLE -> return a array with all columnsname
* 
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


function get_bridge_pos_from_dbserver()
{
	/**
	 *  * ------
		* SHOW DATABASES
		* SHOW TABLES  
		* SHOW Columns from TABLE -> return a array with all columnsname
		* 
	 */
	return (
		array(
			array (
				"bridge_name" => "phpbb3",
				"bridge_databbase" => "usr_web_2",
				"bridge_table_suffix" => "phpbb_"
			),
			array (
				"bridge_name" => "e107",
				"bridge_databbase" => "usr_web_4",
				"bridge_table_suffix" => "e107_"
			)
		)
	);
}

if ($step == 0)
{
	if ( !isset($_POST['scan']) and !isset($_POST['submit']))
	{
		$array_bridge_db = array();
		$array_bridge_db = get_bridge_pos_from_dbserver();
		$bridge_type_output = array();
		$bridge_type_values = array();
		
		for ($i=0;$i<count($array_bridge_db);$i++)
		{
			$bridge_type_output[]="name: ". $array_bridge_db[$i]["bridge_name"]."; dbname: ". $array_bridge_db[$i]["bridge_databbase"]."; dbsuffix: ".$array_bridge_db[$i]["bridge_table_suffix"];
			$bridge_type_values[]=$array_bridge_db[$i]["bridge_name"].":".$array_bridge_db[$i]["bridge_databbase"].".".$array_bridge_db[$i]["bridge_table_suffix"];
			//$bridge_type_values[]=array ($array_bridge_db[$i]["bridge_name"],$array_bridge_db[$i]["bridge_databbase"],$array_bridge_db[$i]["bridge_table_suffix"]);
		}
		
		//insert iums
		$bridge_type_output[]="name: iUMS dbname: ".$phpraid_config['db_name']." dbsuffix: ".$phpraid_config['db_prefix'];
		$bridge_type_values[]="iUMS:".$phpraid_config['db_name'].":".$phpraid_config['db_prefix'];
		//$bridge_type_values[]=array ("iUMS",$phpraid_config['db_name'],$phpraid_config['db_prefix']);
		include ("includes/page_header.php");
		
		$smarty->assign(
			array(
				"form_action" => $filename_bridge."?step=1" ,
				"headtitle" => $localstr['bridge_step0_titel'],
				"bridge_type_output" => $bridge_type_output,
				"bridge_type_values" => $bridge_type_values,
				//last entry are selected (iums)
				"bridge_type_selected" => $bridge_type_output[(count($bridge_type_output))-1],
				"bd_submit" => $localstr['bd_submit'],
			)
		);
		
		$smarty->display('bridges.s0.tpl.html');
		include ("includes/page_footer.php");
	}
	
/*	if(isset($_POST['submit']))
	{
		//echo $_POST['allfoundbridges']."<br>";
		print_r($_POST['allfoundbridges']);
	}
*/
}

if ($step == 1)
{
//	echo $_POST['allfoundbridges']."<br>";
	include ("includes/page_header.php");
	
	
	$bridge_name = "phpbb3";
	$bridge_suffix = "usr_web_2.phpbb_";
	
	include("auth/install_".$bridge_name.".php");
	
	$bridge_setting = get_bridge_setting();

	$group_array = array();
	include ($wrm_config_file);
	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	$sql = 	"SELECT " . $bridge_setting['db_allgroups_id'] . " , ". $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_suffix . $bridge_setting['db_table_allgroups'] .
			" ORDER BY ". $bridge_setting['db_allgroups_id'];

	$result_group = @mysql_query($sql) or die("Error verifying " . mysql_error());
	while ($data_group = @mysql_fetch_array($result_group,true))
	{
		array_push($group_array,
			array(
				'group_name'=>$data_group[$bridge_setting['db_allgroups_name']],
				'group_id'=>$data_group[$bridge_setting['db_allgroups_id']]
			)
		);

	}
	@mysql_close($linkWRM);
	
	echo $sql;
	print_r($group_array);
	$smarty->assign(
		array(
			"form_action" => "install.php?step=".$step,
			"headtitle" => $localstr['headtitle'],
			"user_group_01_text" => $localstr['step5sub3group01'],
			"user_group_02_text" => $localstr['step5sub3group02'],
			"user_group_03_text" => $localstr['step5sub3group03'],
			"user_group_alt_01_text" => $localstr['step5sub3altgroup01'],
			"user_group_alt_02_text" => $localstr['step5sub3altgroup02'],

			"user_group_output" => $array_bridge_name,
			"user_group_values" => $array_bridge_name,
			"user_group_selected" => $bridge_type_selected,
			"user_alt_group_output" => $array_bridge_name,
			"user_alt_group_values" => $array_bridge_name,
			"user_alt_group_selected" => $bridge_type_selected,
				
			"error_msg" => $error_msg,
			"bridge_name" => $bridge_name,
			"bridge_suffix" => $bridge_suffix,
			"bd_submit" => $localstr['bd_submit'],
		)
	);

	$smarty->display("bridges.s1.tpl.html");
	include ("includes/page_footer.php");
		

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
		$bridge_db_name = $_POST['bridge_db_name'];
		$bridge_db_server_hostname = $_POST['bridge_db_server_hostname'];
		$bridge_db_username = $_POST['bridge_db_username'];
		$bridge_db_password = $_POST['bridge_db_password'];
			
		include ("includes/page_header.php");

		$smarty->assign(
			array(
				"form_action" => $filename_bridge."?step=".$step ,
				"headtitle" => "INFO: you have select the EXPERT MODE",
	
				"bridge_db_name_text" => $localstr['step2dbname'],
				"bridge_db_name_value" => $bridge_db_name,
				"bridge_db_server_hostname_text" => $localstr['step2dbserverhostname'],
				"bridge_db_server_hostname_value" => $bridge_db_server_hostname,
				"bridge_db_username_text" => $localstr['step2dbserverusername'],
				"bridge_db_username_value" => $bridge_db_username,
				"bridge_db_password_text" => $localstr['step2dbserverpwd'],
				"bridge_db_password_value" => $bridge_db_password,
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
		if ($FOUNDERROR == FALSE)
		{
			header("Location: ".$filename_bridge."?step=101");
		}
	}
}

/**
 * get prefix and bridge type
 */
if ($step == 101)
{
	if(!isset($_POST['submit']))
	{
		$bridge_db_name = $_POST['bridge_db_name'];
		$bridge_db_server_hostname = $_POST['bridge_db_server_hostname'];
		$bridge_db_username = $_POST['bridge_db_username'];
		$bridge_db_password = $_POST['bridge_db_password'];
		$bridge_db_prefix = $_POST['bridge_db_prefix'];
		if (isset($_POST['bridge_type']))
		{
			$bridge_type_selected = $_POST['bridge_type'];
		}
		else
		{
			$bridge_type_selected = $array_bridge_name[0];
		}
			
		include ("includes/page_header.php");
		// array with all bridge name
		$array_bridge_name = array();
		
		
		$array_bridge_name[] = "phpBB3";//only for testting
		$array_bridge_name[] = "e107";//only for testting
		$smarty->assign(
			array(
				"form_action" => $filename_bridge."?step=".$step ,
				"headtitle" => "INFO: you have select the EXPERT MODE",

				"bridge_db_prefix_text" => "Table Prefix",
				"bridge_db_password_value" => $bridge_db_prefix,
			
				"bridge_type_text" => "select your bridge type",
				"bridge_type_output" => $array_bridge_name,
				"bridge_type_values" => $array_bridge_name,
				"bridge_type_selected" => $bridge_type_selected,
	
				"bd_submit" => $localstr['bd_submit'],
			)
		);

		$smarty->display('bridges_expertmode_2.tpl.html');
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
if ($step == 102)
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