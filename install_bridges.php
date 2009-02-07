<?php

/*-------------------------------*/
//lang strg
//$localstr['bd_scan'] = "scan";
//$localstr['bridge_expert_mode'] = "expert mode";
$localstr['bridge_step0_titel'] = "welcome to the bridge Mode";
/*-------------------------------*/

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

function scan_dbserver()
{
//load all auth briges settings
	$bridge = array();
	//$array_confname = array();
	$found_bridge = array();
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

	include ($wrm_config_file);
	//$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	
	$sql_db_all = "SHOW DATABASES";

	//$result_db_all = @mysql_query($sql_db_all) or die("Error" . mysql_error()."<br>SQL: ". $sql_db_all);
	$result_db_all = $wrm_install->sql_query($sql_db_all) or print_error($sql_db_all, mysql_error(), 1);
	//while ($data_db_all = @mysql_fetch_array($result_db_all,true))
	while ($data_db_all = $wrm_install->sql_fetchrow($result_db_all,true))
	{
		$count_user = 0;
		
		//show all , from the (selected) DATABASES, all TABLES
		$sql_tables = "SHOW TABLES FROM ".$data_db_all['Database'];
		$result_tables = $wrm_install->sql_query($sql_tables) or print_error($sql_tables, mysql_error(), 1);
		//$result_tables = @mysql_query($sql_tables) or die("Error" . mysql_error()."<br>SQL: ". $sql_tables);
		while ($data_tables = $wrm_install->sql_fetchrow($result_db_all,true))
		//while ($data_tables = @mysql_fetch_array($result_tables,true))
		{

			$db_table_name = $data_tables["Tables_in_".$data_db_all['Database']];
			
			//check line: with all bridges
			for ($i=0; $i < count($bridge); $i++)
			{
				$tmp_user_name = substr($db_table_name, strlen($db_table_name) - strlen($bridge[$i]['db_table_user_name']));
				
				if ( strcmp( $tmp_user_name ,$bridge[$i]['db_table_user_name']) == 0)
				{
					//set table prefix
					$db_temp_prefix = substr($db_table_name, 0 ,strlen($db_table_name) - strlen($bridge[$i]['db_table_user_name']));
					
					
					//-----------------------------------------------------------------------//
					// check table : db_table_user_name
					$sql_columns = "SHOW COLUMNS FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_user_name'];
					//$result_columns = @mysql_query($sql_columns) or die("Error" . mysql_error()."<br>SQL: ". $sql_columns."  Prefix:".$db_temp_prefix);
					$result_columns = $wrm_install->sql_query($sql_columns) or print_error($sql_columns, mysql_error(), 1);
					$counter_valid_column = 0;
					
					while ($data_columns = $wrm_install->sql_fetchrow($result_columns,true))
					//while ($data_columns = @mysql_fetch_array($result_columns,true))
					{
						if (strcmp($data_columns['Field'],$bridge[$i]['db_user_id']) == 0 )
						{
							$counter_valid_column++;
						}

						if (strcmp($data_columns['Field'],$bridge[$i]['db_user_name']) == 0 )
						{
							$counter_valid_column++;
						}
						if (strcmp($data_columns['Field'],$bridge[$i]['db_user_email']) == 0 )
						{
							$counter_valid_column++;
						}
						if (strcmp($data_columns['Field'],$bridge[$i]['db_user_password']) == 0 )
						{
							$counter_valid_column++;
						}
					}

					if ($counter_valid_column == 4)
					{
						//count: avilable user in the bridge system
						$sql_count_user = "SELECT ".$bridge[$i]['db_user_id']." FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_user_name'];
						$result_count_user = $wrm_install->sql_query($sql_count_user) or print_error($sql_count_user, mysql_error(), 1);
						//$result_count_user = @mysql_query($sql_count_user) or die("Error" . mysql_error()."<br>SQL: ". $sql_count_user); 
						//$count_user = @mysql_num_rows($result_count_user);
						$count_user = $wrm_install->sql_numrows($result_count_user);
						//-----------------------------------------------------------------------//
						// check table : db_table_group_name
						$sql_columns = "SHOW COLUMNS FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_group_name'];
						$result_columns = @mysql_query($sql_columns) or die("Error" . mysql_error()."<br>SQL: ". $sql_columns);
						while ($data_columns = $wrm_install->sql_fetchrow($result_columns,true))
						//while ($data_columns = @mysql_fetch_array($result_columns,true))
						{
							if (strcmp($data_columns['Field'],$bridge[$i]['db_group_id']) == 0 )
							{
								$counter_valid_column++;
							}
						}

						//-----------------------------------------------------------------------//
						// check table : db_table_allgroups
						$sql_columns = "SHOW COLUMNS FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_allgroups'];
						//$result_columns = @mysql_query($sql_columns) or die("Error" . mysql_error()."<br>SQL: ". $sql_columns);
						$result_columns = $wrm_install->sql_query($sql_columns) or print_error($sql_columns, mysql_error(), 1);
						while ($data_columns = $wrm_install->sql_fetchrow($result_columns,true))
						//while ($data_columns = @mysql_fetch_array($result_columns,true))
						{
							if (strcmp($data_columns['Field'],$bridge[$i]['db_allgroups_id']) == 0 )
							{
								$counter_valid_column++;
							}
							if (strcmp($data_columns['Field'],$bridge[$i]['db_allgroups_name']) == 0 )
							{
								$counter_valid_column++;
							}
						}		
						if ($counter_valid_column == 7)
						{
								array_push($found_bridge,
									array(
										'bridge_name'=>$bridge[$i]['auth_type_name'],
										'bridge_database'=>$data_db_all['Database'],
										'bridge_table_prefix'=>$db_temp_prefix,
										'bridge_founduser'=>$count_user,
									)
								);
						}						
					}
					
				}
			}
		}
	}
	
	$wrm_install->sql_close();
	return $found_bridge;
}

if ($step == 0)
{
	if ( !isset($_POST['submit']))
	{
		$array_bridge_db = array();
		$array_bridge_db = scan_dbserver();
		$bridge_type_output = array();
		$bridge_type_values = array();
		
		for ($i=0;$i<count($array_bridge_db);$i++)
		{

			$bridge_type_output[]=" Name: ". $array_bridge_db[$i]["bridge_name"]."; Datenbankname: ". $array_bridge_db[$i]["bridge_database"]."; Table Prefix: ".$array_bridge_db[$i]["bridge_table_prefix"]."; Found User: ".$array_bridge_db[$i]["bridge_founduser"];
			$bridge_type_values[]=$array_bridge_db[$i]["bridge_name"].":".$array_bridge_db[$i]["bridge_database"].":".$array_bridge_db[$i]["bridge_table_prefix"].":";
			//$bridge_type_values[]=array ($array_bridge_db[$i]["bridge_name"],$array_bridge_db[$i]["bridge_databbase"],$array_bridge_db[$i]["bridge_table_prefix"]);
		}

		$bridge_type_output[]=" Name: iums ;Datenbankname: ".$phpraid_config['db_name']." dbsuffix: ".$phpraid_config['db_prefix']."; Found User: "."0";
		$bridge_type_values[]="iums:".$phpraid_config['db_name'].":".$phpraid_config['db_prefix'].":0:";
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

}

//get all username's from the bridge
//set password for selected user
if ($step == 1)
{
	//if unselect jump back
	if (!$_POST['allfoundbridges'])
		header("Location: ".$filename_bridge."?step=0");


	$string = $_POST['allfoundbridges'];
	$pos = 0 ;
	$pos_new = 0;
	
	$pos_new = strpos($string, ':', 0); 
	$bridge_name = substr($string, 0, $pos_new); 
	//echo $bridge_name." ".$pos."  ".$pos_new."<br>";
	$pos = $pos_new + 1;
		
	$pos_new = strpos($string, ':', $pos);
	$bridge_database_name = substr($string, $pos , $pos_new - $pos);
	//echo $bridge_database_name." ".$pos."  ".$pos_new."<br>";
	$pos = $pos_new + 1;
			
	$pos_new = strpos($string, ':', $pos);
	$bridge_prefix = substr($string, $pos, $pos_new - $pos);
	
	include("auth/install_".$bridge_name.".php");
	
	$bridge_setting = $bridge_setting_value;

	$bridge_admin_id_output = array();
	$bridge_admin_id_values = array();
	
	include ($wrm_config_file);
	
	//$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	//@mysql_select_db($phpraid_config['db_name'], $linkWRM);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$sql = 	"SELECT " . $bridge_setting['db_user_name'] . " , ". $bridge_setting['db_user_email'] ." , ". $bridge_setting['db_user_id'].
			" FROM " . 	$bridge_database_name  ."." . $bridge_prefix . $bridge_setting['db_table_user_name'] .
			" " . $bridge_setting['db_user_name_filter'];
	
	$result_admin = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	while ($data_admin = $wrm_install->sql_fetchrow($result_admin,true))
	
	//$result_admin = @mysql_query($sql) or die("Error verifying :" . mysql_error()."<br>SQL: ".$sql);
	//while ($data_admin = @mysql_fetch_array($result_admin,true))
	{
		$bridge_admin_id_output[] = $localstr['txtusername'].": ".utf8_encode($data_admin[$bridge_setting['db_user_name']]).";  ".$localstr['txtemail'].": ".$data_admin[$bridge_setting['db_user_email']];
		$bridge_admin_id_values[] = $data_admin[$bridge_setting['db_user_id']];
	}
	
	$wrm_install->sql_close();
//	@mysql_close($linkWRM);

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
			"bridge_database_name" => $bridge_database_name,
		
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
	$bridge_database_name = $_POST['bridge_database_name'];
	
	include("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;

	$user_group_output = array();
	$user_group_values = array();

	include ($wrm_config_file);
//	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
//	@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$sql = 	"SELECT " . $bridge_setting['db_allgroups_id'] . " , " . $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_database_name . "." . $bridge_prefix . $bridge_setting['db_table_allgroups'] .
			" ORDER BY ". $bridge_setting['db_allgroups_id'];
	$result_group = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	//$result_group = @mysql_query($sql) or die("Error verifying :" . mysql_error()."<br>SQL: ".$sql);
	//while ($data_group = @mysql_fetch_array($result_group,true))
	while ($data_group = $wrm_install->sql_fetchrow($result, true))
	{
		$user_group_output[] = $data_group[$bridge_setting['db_allgroups_name']];
		$user_group_values[] = $data_group[$bridge_setting['db_allgroups_id']];
	}
	//@mysql_close($linkWRM);
	$wrm_install->sql_close();

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
	
	if ($bridge_auth_user_group == "")
		$bridge_auth_user_group = "0";
	if ($bridge_auth_user_alt_group == "")
		$bridge_auth_user_alt_group = "0";	

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

if($step === "bridge_done")
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
	
//	$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
//	@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$sql = sprintf(	"SELECT " . $bridge_setting['db_user_id']. " , ". $bridge_setting['db_user_name'] . " , " .	$bridge_setting['db_user_email'] . " , " .$bridge_setting['db_user_password'] .
					" FROM " . $bridge_prefix . $bridge_setting['db_table_user_name'] . 
					" WHERE " . $bridge_setting['db_user_id'] . " = %s", quote_smart($bridge_admin_id)//utf8_decode()
			);
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$data = $wrm_install->sql_fetchrow($result, true);
	
	//Now we need to create the users
	//profile in the WRM database if it does not already exist.
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "profile " .
					" (`profile_id`, `email`, `password`,`priv`,`username`, `last_login_time`) " .
					" VALUES (%s, %s, %s, %s, %s, %s)",
					quote_smart($data[$db_user_id]),quote_smart($data[$db_user_email]),
					quote_smart($newpassword),	quote_smart($user_priv), 
					quote_smart(strtolower($data[$db_user_name])), quote_smart(time())
		);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);

	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)",quote_smart("auth_type"), quote_smart($bridge_name)
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);

	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_table_prefix"), quote_smart($bridge_prefix)
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_auth_user_group"), quote_smart($bridge_auth_user_group)
				);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);

	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_auth_user_alt_group"), quote_smart($bridge_auth_user_alt_group)
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	
	//close connection
	//@mysql_close($linkWRM);
	$wrm_install->sql_close();
	header("Location: install.php?step=done");
}



?>