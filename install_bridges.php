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
//load all auth briges settings
	$bridge = array();
	$array_confname = array();
	global $wrm_config_file;
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
		array_push($bridge, $bridge_setting_value);
	}
	
	$bridge_counter = array();

/*
	//load from the bridges ONLY the/all (configfile)name in the array $array_confname
	for ($i=0;$i<count($bridge);$i++)
	{
		//$array_confname[] = $bridge[$i]['DB_configfile_name'];
	}
	
	print_r($bridge);
	*/
	include ($wrm_config_file);
	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	//@mysql_select_db($phpraid_config['db_name'],$linkWRM);

	$sql_db_all = "SHOW DATABASES";

	$result_db_all = @mysql_query($sql_db_all) or die("Error" . mysql_error());
	while ($data_db_all = @mysql_fetch_array($result_db_all,true))
	{
		echo "<br><br>Database:".$data_db_all['Database']."<br>";
		
		for ($i=0;$i<count($bridge);$i++)
		{
			$bridge_counter[$i]=0;
		}
		
		$sql_tables = "SHOW TABLES FROM ".$data_db_all['Database'];
		$result_tables = @mysql_query($sql_tables) or die("Error" . mysql_error());
		while ($data_tables = @mysql_fetch_array($result_tables,true))
		{

			$db_table_name = $data_tables["Tables_in_".$data_db_all['Database']];
			
			//check line: with all bridges
			for ($i=0;$i<count($bridge);$i++)
			{
				//phpbb_acl_users
				//$bridge[$i]['db_table_user_name'] == users
				//$tmp_prefix = phpbb_acl_
				//none
				
				$db_temp_prefix = substr($db_table_name, 0 ,strlen($db_table_name) - strlen($bridge[$i]['db_table_user_name']));
				$sql_test_tables = 
						'SHOW TABLES '.
						' FROM '.$data_db_all['Database'].
						' WHERE Tables_in_'.$data_db_all['Database'].' LIKE "'.$db_temp_prefix.'%"';
				$result_test_tables = @mysql_query($sql_test_tables) or die("Error" . mysql_error());

				//echo "<br>sql:".$sql_test_tables."<br>prefix:".$tmp_prefix; 
				$tmp_counter_test_tables = 0;
				while ($data_test_tables = @mysql_fetch_array($result_test_tables,true))
				{
					if (strcmp($data_test_tables["Tables_in_".$data_db_all['Database']],$db_temp_prefix.$bridge[$i]['db_table_group_name'])==0 and ($bridge[$i]['db_table_group_name'] != ""))
					{
						$tmp_counter_test_tables ++;
						echo "<br>sql:".$sql_test_tables."<br>"."bridgename: ".$bridge[$i]['auth_type_name']." :prefix:".$db_temp_prefix." ;tmp_counter_test_tables:".$tmp_counter_test_tables." ;bridge_counter[i]:".$bridge_counter[$i];
						echo "<br>(1)".$data_test_tables["Tables_in_".$data_db_all['Database']]."==".$db_temp_prefix.$bridge[$i]['db_table_group_name'];
					}
					if (strcmp($data_test_tables["Tables_in_".$data_db_all['Database']],$db_temp_prefix.$bridge[$i]['db_table_allgroups'])==0 and ($bridge[$i]['db_table_allgroups'] != ""))
					{
						$tmp_counter_test_tables ++;
						echo "<br>sql:".$sql_test_tables."<br>"."bridgename: ".$bridge[$i]['auth_type_name']." :prefix:".$db_temp_prefix." ;tmp_counter_test_tables:".$tmp_counter_test_tables." ;bridge_counter[i]:".$bridge_counter[$i];
						echo "<br>(2)".$data_test_tables["Tables_in_".$data_db_all['Database']]."==".$db_temp_prefix.$bridge[$i]['db_table_allgroups'];
					}
				}		

				if ($tmp_counter_test_tables == 2)
				{
					$bridge_counter[$i] ++;
					echo "<br>(3)bridgename: ".$bridge[$i]['auth_type_name']." :prefix: ".$db_temp_prefix; 
				}
			}
			//echo "<br>";
			/*if (1!=1)
			{
				// SHOW TABLES FROM usr_web_2 WHERE Tables_in_usr_web_2 = 'phpbb_acl_users' 
				$sql_columns = "SHOW COLUMNS FROM ".$data_db_all['Database'].".".$data_tables["Tables_in_".$data_db_all['Database']];
				$result_columns = @mysql_query($sql_columns) or die("Error" . mysql_error());
				while ($data_columns = @mysql_fetch_array($result_columns,true))
				{
					//print_r($data_columns);
					//echo $data_columns['Field']."<br>";
				}
			}*/
		}
		echo "<br>Tables: ".$data_test_tables["Tables_in_".$data_db_all['Database']]."   :<br>";
		for ($i=0;$i<count($bridge);$i++)
		{
			echo "<br>bridgename: ".$bridge[$i]['auth_type_name'].": ".$bridge_counter[$i];
		}
	}
	
	@mysql_close($linkWRM);
	
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
	if ( !isset($_POST['submit']))
	{
		$array_bridge_db = array();
		$array_bridge_db = get_bridge_pos_from_dbserver();
		$bridge_type_output = array();
		$bridge_type_values = array();
		
		for ($i=0;$i<count($array_bridge_db);$i++)
		{
			$bridge_type_output[]="name: ". $array_bridge_db[$i]["bridge_name"]."; dbname: ". $array_bridge_db[$i]["bridge_databbase"]."; dbsuffix: ".$array_bridge_db[$i]["bridge_table_suffix"];
			$bridge_type_values[]=$array_bridge_db[$i]["bridge_name"].":".$array_bridge_db[$i]["bridge_databbase"].".".$array_bridge_db[$i]["bridge_table_suffix"];
		}
		
		//insert iums
		$bridge_type_output[]="name: iums dbname: ".$phpraid_config['db_name']." dbsuffix: ".$phpraid_config['db_prefix'];
		$bridge_type_values[]="iums:".$phpraid_config['db_name'].":".$phpraid_config['db_prefix'];
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

//set admin
if ($step == 1)
{
	$bridge_name = $_POST['bridge_db_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	
	$bridge_name = "phpbb3";
	$bridge_prefix = "usr_web_2.phpbb_";
	
	include("auth/install_".$bridge_name.".php");
	
	$bridge_setting = $bridge_setting_value;

	$bridge_admin_id_output = array();
	$bridge_admin_id_values = array();
	
	include ($wrm_config_file);
	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name'],$linkWRM);

	$sql = 	"SELECT " . $bridge_setting['db_user_name'] . " , ". $bridge_setting['db_user_email'] ." , ". $bridge_setting['db_user_id'].
			" FROM " . 	$bridge_prefix . $bridge_setting['db_table_user_name'] .
			" " . $bridge_setting['db_user_name_filter'];

	$result_admin = @mysql_query($sql) or die("Error verifying " . mysql_error());
	while ($data_admin = @mysql_fetch_array($result_admin,true))
	{
		$bridge_admin_id_output[] = $localstr['txtusername'].": ".utf8_encode($data_admin[$bridge_setting['db_user_name']]).";  ".$localstr['txtemail'].": ".$data_admin[$bridge_setting['db_user_email']];
		$bridge_admin_id_values[] = $data_admin[$bridge_setting['db_user_id']];
	}
	
	@mysql_close($linkWRM);

	if (isset($_POST['bridge_admin_id']))
		$bridge_admin_id_selected = $_POST['bridge_admin_id'];
	else
		$bridge_admin_id_selected = $bridge_admin_id_output[count($bridge_admin_id_output)-1];
		
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."?step=2" ,
			"headtitle" => $localstr['headtitle'],
			"user_admin_01_text" => $localstr['step5sub2usernamefullperm'],

			"bridge_admin_id_output" => $bridge_admin_id_output,
			"bridge_admin_id_values" => $bridge_admin_id_values,
			"bridge_admin_id_selected" => $bridge_admin_id_selected,
		
			"user_admin_password_text" => $localstr['txtpassword'],
		
			"bridge_name" => $bridge_name,
			"bridge_prefix" => $bridge_prefix,
			"bridge_admin_id" => $bridge_admin_id,
		
			"bd_submit" => $localstr['bd_submit'],
		)
	);

	$smarty->display("bridges.s1.tpl.html");
	include ("includes/page_footer.php");

}

//set group
if ($step == 2)
{
//	echo $_POST['allfoundbridges']."<br>";
	$bridge_name = $_POST['bridge_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_admin_password = $_POST['user_admin_password'];
	
	include("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;

	$user_group_output = array();
	$user_group_values = array();

	include ($wrm_config_file);
	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	
	$sql = 	"SELECT " . $bridge_setting['db_allgroups_id'] . " , ". $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_prefix . $bridge_setting['db_table_allgroups'] .
			" ORDER BY ". $bridge_setting['db_allgroups_id'];

	$result_group = @mysql_query($sql) or die("Error verifying " . mysql_error());
	while ($data_group = @mysql_fetch_array($result_group,true))
	{
		$user_group_output[] = $data_group[$bridge_setting['db_allgroups_name']];
		$user_group_values[] = $data_group[$bridge_setting['db_allgroups_id']];
	}
	@mysql_close($linkWRM);
	
	//add 'No Restrictions', and 'No Additional UserGroup' to cmb_box
	$user_group_values[] = 0;
	$user_alt_group_output = $user_group_output;
	$user_alt_group_values = $user_group_values;
	$user_group_output[] = $localstr['step5sub3norest'];
	$user_alt_group_output[] = $localstr['step5sub3noaddus'];

	if (isset($_POST['user_group']))
		$user_group_selected = $_POST['user_group'];
	else
		$user_group_selected = $user_group_output[count($user_group_output)-1];
	
	if (isset($_POST['user_alt_group']))
		$user_alt_group_selected = $_POST['user_alt_group'];
	else
		$user_alt_group_selected = $user_alt_group_output[count($user_alt_group_output)-1];
	
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."?step=3" ,
			"headtitle" => $localstr['headtitle'],
			"user_group_01_text" => $localstr['step5sub3group01'],
			"user_group_02_text" => $localstr['step5sub3group02'],
			"user_group_03_text" => $localstr['step5sub3group03'],
			"user_group_alt_01_text" => $localstr['step5sub3altgroup01'],
			"user_group_alt_02_text" => $localstr['step5sub3altgroup02'],

			"user_group_output" => $user_group_output,
			"user_group_values" => $user_group_values,
			"user_group_selected" => $user_group_selected,
			"user_alt_group_output" => $user_alt_group_output,
			"user_alt_group_values" => $user_alt_group_values,
			"user_alt_group_selected" => $user_alt_group_selected,
				
			"bridge_name" => $bridge_name,
			"bridge_prefix" => $bridge_prefix,
			"bridge_admin_id" => $bridge_admin_id,
			"bridge_admin_password" => $bridge_admin_password,
		
			"bd_submit" => $localstr['bd_submit'],
		)
	);

	$smarty->display("bridges.s2.tpl.html");
	include ("includes/page_footer.php");
		
	//header("Location: ".$filename_bridge."?step=0");
}

if($step == 3)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_admin_password = $_POST['bridge_admin_password'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];
	
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."?step=bridge_done" ,
			"headtitle" => $localstr['headtitle'],
				
			"bridge_name_text" => "bridge name",
			"bridge_name_value" => $bridge_name,
			"bridge_prefix_text" => $localstr['step2WRMtableprefix'],
			"bridge_prefix_value" => $bridge_prefix,
			"bridge_admin_id_text" => $localstr['txtusername'],
			"bridge_admin_id_value" => $bridge_admin_id,
			"bridge_admin_password_text" => $localstr['txtpassword'],
			"bridge_admin_password_value" => $bridge_admin_password,
			"bridge_auth_user_text" => "group",
			"bridge_auth_user_group_value" => $bridge_auth_user_group,
			"bridge_auth_user_alt_text" => " alt group",
			"bridge_auth_user_alt_group_value" => $bridge_auth_user_alt_group,
		
			"bd_submit" => $localstr['bd_submit'],
		)
	);

	$smarty->display("bridges.s3.tpl.html");
	include ("includes/page_footer.php");
}

if($step == "bridge_done")
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_admin_password = $_POST['bridge_admin_password'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];

	include ($wrm_config_file);
	include ("includes/function.php");
	include ("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;
	
	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	$sql = sprintf(	"SELECT " . $bridge_setting['db_user_id']. " , ". $bridge_setting['db_user_name'] . " , " .	$bridge_setting['db_user_email'] . " , " .$bridge_setting['db_user_password'] .
					" FROM " . $bridge_prefix . $bridge_setting['db_table_user_name'] . 
					" WHERE " . $bridge_setting['db_user_id'] . " = %s", quote_smart($bridge_admin_id)//utf8_decode()
			);

	$result = @mysql_query($sql) or die("Error verifying " . mysql_error()."<br>".$sql);
	$data = @mysql_fetch_array($result, true);
	
	//Now we need to create the users
	//profile in the WRM database if it does not already exist.
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "profile " .
					" (`profile_id`, `email`, `password`,`priv`,`username`, `last_login_time`) " .
					" VALUES (%s, %s, %s, %s, %s, %s)",
					quote_smart($data[$db_user_id]),quote_smart($data[$db_user_email]),
					quote_smart($newpassword),	quote_smart($user_priv), 
					quote_smart(strtolower($data[$db_user_name])), quote_smart(time())
		);
	@mysql_query($sql) or die("Error verifying " . mysql_error()."<br>".$sql);

	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)",quote_smart("auth_type"), quote_smart($bridge_name)
			);
	@mysql_query($sql) or die("Error @ insert " . mysql_error());
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_table_prefix"), quote_smart($bridge_prefix)
			);
	@mysql_query($sql) or die("Error @ insert " . mysql_error());
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_auth_user_group"), quote_smart($bridge_auth_user_group)
				);
	@mysql_query($sql) or die("Error @ insert " . mysql_error());
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_auth_user_alt_group"), quote_smart($bridge_auth_user_alt_group)
			);
	@mysql_query($sql) or die("Error @ insert " . mysql_error());
	@mysql_close($linkWRM);
	
	header("Location: install.php?step=done");
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

if ($step == 1002)
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



?>