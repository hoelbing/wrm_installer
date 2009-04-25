<?php
/***************************************************************************
 *                             install_bridges.php
 *                            -------------------
 *   begin                : Dec 12, 2008
 *	 Dev                  : Carsten Hölbing
 *	 email                : hoelbin@gmx.de
 *
 *   -- WoW Raid Manager --
 *   copyright            : (C) 2007-2009 Douglas Wagner
 *   email                : douglasw0@yahoo.com
 *   www				  : http://www.wowraidmanager.net
 *
 ***************************************************************************/

/***************************************************************************
*
*    WoW Raid Manager - Raid Management Software for World of Warcraft
*    Copyright (C) 2007-2009 Douglas Wagner
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
****************************************************************************/

		
if (!isset($_GET['step']))
$step = 0;
else
$step = $_GET['step'];

//set Lang. Format
if (!isset($_GET['lang']))
	$lang = "english";
else
	$lang = $_GET['lang'];

$filename_bridge = "install_bridges.php?lang=".$lang."&";

include_once('language/locale-'.$lang.'.php');

$wrm_config_file = "../config.php";
include_once($wrm_config_file);
include_once ("includes/db/db.php");
include_once ("includes/function.php");

function scan_dbserver()
{
//load all auth briges settings
	$bridge = array();
	$found_bridge = array();
	
	global $wrm_config_file;
	global $lang;
	
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
	for ($i=0; $i<count($files); $i++)
	{
		include ($dir_brige."/".$files[$i]);
		array_push($bridge, $bridge_setting_value);
	}

	include ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass'], $phpraid_config['db_name']);
	
	$sql_db_all = "SHOW DATABASES";

	$result_db_all = $wrm_install->sql_query($sql_db_all) or print_error($sql_db_all, mysql_error(), 1);
	while ($data_db_all = $wrm_install->sql_fetchrow($result_db_all,true))
	{
		$count_user = 0;
		
		//show all , from the (selected) DATABASES, all TABLES
		$sql_tables = "SHOW TABLES FROM ".$data_db_all['Database'];
		$result_tables = $wrm_install->sql_query($sql_tables) or print_error($sql_tables, mysql_error(), 1);
		while ($data_tables = $wrm_install->sql_fetchrow($result_tables,true))
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
					$result_columns = $wrm_install->sql_query($sql_columns) or print_error($sql_columns, mysql_error(), 1);
					$counter_valid_column = 0;
					
					while ($data_columns = $wrm_install->sql_fetchrow($result_columns,true))
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
						$sql_count_user = 	"SELECT ".$bridge[$i]['db_user_id'].
											" FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_user_name']. 
											" " . $bridge[$i]['db_user_name_filter'];
						$result_count_user = $wrm_install->sql_query($sql_count_user) or print_error($sql_count_user, mysql_error(), 1);
						$count_user = $wrm_install->sql_numrows($result_count_user);

						//-----------------------------------------------------------------------//
						// check table : db_table_group_name
						$sql_columns = "SHOW COLUMNS FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_group_name'];
						$result_columns = @mysql_query($sql_columns) or die("Error" . mysql_error()."<br>SQL: ". $sql_columns);
						while ($data_columns = $wrm_install->sql_fetchrow($result_columns,true))
						{
							if (strcmp($data_columns['Field'],$bridge[$i]['db_group_id']) == 0 )
							{
								$counter_valid_column++;
							}
						}

						//-----------------------------------------------------------------------//
						// check table : db_table_allgroups
						$sql_columns = "SHOW COLUMNS FROM ".$data_db_all['Database'].".".$db_temp_prefix.$bridge[$i]['db_table_allgroups'];
						$result_columns = $wrm_install->sql_query($sql_columns) or print_error($sql_columns, mysql_error(), 1);
						while ($data_columns = $wrm_install->sql_fetchrow($result_columns,true))
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
					}
				}
				
				//-----------------------------------------------------------------------//
				//add bridge to array
				//-----------------------------------------------------------------------//
				if ($counter_valid_column == 7)
				{
					//add new bridge to array
					array_push($found_bridge,
						array(
							'bridge_name' => $bridge[$i]['auth_type_name'],
							'bridge_database' => $data_db_all['Database'],
							'bridge_table_prefix' => $db_temp_prefix,
							'bridge_founduser' => $count_user,
						)
					);
					
					$counter_valid_column = 0;
				}
			}
		}
	}
	
	$wrm_install->sql_close();
	
	//-----------------------------------------------------------------------//
	//problem: with bridge phpbb2 and phpbb3
	//if on the server phpbb3 install, than have this function, after scan: found phpbb2 and phpbb3
	//-> del phpbb2 in the array
	$found_double = -1;
	for ($y=0; $y<count($found_bridge); $y++)
	{
		//scan after phpbb3
		if ($found_bridge[$y]['bridge_name'] == "phpbb3")
		{
			//scan after phpbb2
			for ($x=0;$x<count($found_bridge); $x++)
			{
				//white the same database and table_prefix
				if 	(
						($found_bridge[$x]['bridge_name'] == "phpbb") and
						($found_bridge[$x]['bridge_database'] == $found_bridge[$y]['bridge_database']) and 
						($found_bridge[$x]['bridge_table_prefix'] == $found_bridge[$y]['bridge_table_prefix'])
					)
				{
					$found_double = $x;
				}
				
			}
			
			//del the found entry
			if ($found_double != -1)
			{
				array_splice($found_bridge, $found_double, 1);
				$found_double = -1;
			}
		}
	}
	//-----------------------------------------------------------------------//
		
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

			$bridge_type_output[]=" Name: ". $array_bridge_db[$i]["bridge_name"]." ; ".$wrm_install_lang['step2dbname'].": ". $array_bridge_db[$i]["bridge_database"]."; ".$wrm_install_lang['step2WRMtableprefix'].": ".$array_bridge_db[$i]["bridge_table_prefix"]."; Found User: ".$array_bridge_db[$i]["bridge_founduser"];
			$bridge_type_values[]=$array_bridge_db[$i]["bridge_name"].":".$array_bridge_db[$i]["bridge_database"].":".$array_bridge_db[$i]["bridge_table_prefix"].":";
			//$bridge_type_values[]=array ($array_bridge_db[$i]["bridge_name"],$array_bridge_db[$i]["bridge_databbase"],$array_bridge_db[$i]["bridge_table_prefix"]);
		}
		
		$bridge_type_output[]=" Name: iums ; ".$wrm_install_lang['step2dbname'].": ". $array_bridge_db[$i]["bridge_database"]."; ".$wrm_install_lang['step2WRMtableprefix'].": ".$array_bridge_db[$i]["bridge_table_prefix"]."; Found User: 0";
		$bridge_type_output[]=" Name: iums ; ". $array_bridge_db[$i]["bridge_name"].": ".$phpraid_config['db_name']." dbsuffix: ".$phpraid_config['db_prefix']."; Found User: "."0";
		$bridge_type_values[]="iums:".$phpraid_config['db_name'].":".$phpraid_config['db_prefix'].":0:";
		include ("includes/page_header.php");
		
		$smarty->assign(
			array(
				"form_action" => $filename_bridge."step=1" ,
				"headtitle" => $wrm_install_lang['bridge_step0_titel'],
				"bridge_step0_choose_auth" => $wrm_install_lang['bridge_step0_choose_auth'],
				"bridge_type_output" => $bridge_type_output,
				"bridge_type_values" => $bridge_type_values,
				//last entry are selected (iums)
				"bridge_type_selected" => $bridge_type_output[(count($bridge_type_output))-1],
				"bridge_step0_unknown_auth" => $wrm_install_lang['bridge_step0_unknown_auth'],
				"bd_submit" => $wrm_install_lang['bd_submit'],
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
		header("Location: ".$filename_bridge."step=0");


	$string = $_POST['allfoundbridges'];
	$pos = 0 ;
	$pos_new = 0;
	
	$pos_new = strpos($string, ':', 0); 
	$bridge_name = substr($string, 0, $pos_new); 
	$pos = $pos_new + 1;
		
	$pos_new = strpos($string, ':', $pos);
	$bridge_database_name = substr($string, $pos , $pos_new - $pos);
	$pos = $pos_new + 1;
			
	$pos_new = strpos($string, ':', $pos);
	$bridge_prefix = substr($string, $pos, $pos_new - $pos);
	
	include("auth/install_".$bridge_name.".php");
	
	$bridge_setting = $bridge_setting_value;

	$bridge_admin_id_output = array();
	$bridge_admin_id_values = array();
	
	include ($wrm_config_file);
	
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	$sql = 	"SELECT " . $bridge_setting['db_user_name'] . " , ". $bridge_setting['db_user_email'] ." , ". $bridge_setting['db_user_id'].
			" FROM " . 	$bridge_database_name  ."." . $bridge_prefix . $bridge_setting['db_table_user_name'] .
			" " . $bridge_setting['db_user_name_filter'];
	
	$result_admin = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	while ($data_admin = $wrm_install->sql_fetchrow($result_admin,true))
	{
		$bridge_admin_id_output[] = $wrm_install_lang['txtusername'].": ".utf8_encode($data_admin[$bridge_setting['db_user_name']]).";  ".$wrm_install_lang['txtemail'].": ".$data_admin[$bridge_setting['db_user_email']];
		$bridge_admin_id_values[] = $data_admin[$bridge_setting['db_user_id']];
	}
	
	$wrm_install->sql_close();

	if (isset($_POST['bridge_admin_id']))
		$bridge_admin_id_selected = $_POST['bridge_admin_id'];
	else
		$bridge_admin_id_selected = $bridge_admin_id_output[count($bridge_admin_id_output)-1];
	
	$form_action_link = "step=2";
	
	if ($bridge_name == "iums")
	{
		$form_action_link = "step=bridge_done";
		
		include ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action" => $filename_bridge.$form_action_link ,
				"headtitle" => $wrm_install_lang['headtitle'],
				"bridge_step1_iumssub1desc" => $wrm_install_lang['bridge_step1_iumssub1desc'],
				"bridge_step1_iumsfilladmindesc" => $wrm_install_lang['bridge_step1_iumsfilladmindesc'],	
			
				"user_admin_username_text" => $wrm_install_lang['txtusername'],
				"user_admin_username" => "",
				"user_admin_password_text" => $wrm_install_lang['txtpassword'],
				"bridge_admin_password" => "",
				"user_admin_email_text" => $wrm_install_lang['txtemail'],
				"bridge_admin_email" => "",
				"bridge_name" => $bridge_name,
				"bridge_prefix" => $bridge_prefix,
				"bridge_admin_id" => $bridge_admin_id,
				"bridge_database_name" => $bridge_database_name,
				"bridge_auth_user_group" => "0",
				"bridge_auth_user_alt_group" => "0",
				"bd_submit" => $wrm_install_lang['bd_submit'],

			//<input type="hidden" name="bridge_admin_id" value="{$bridge_admin_id}" />
			//<input type="hidden" name="bridge_admin_password" value="{$bridge_admin_password}" />
			)
		);
		$smarty->display("bridges.s1_iums.tpl.html");
	}
	else{
		include ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action" => $filename_bridge.$form_action_link ,
				"headtitle" => $wrm_install_lang['headtitle'],
				"user_admin_01_text" => $wrm_install_lang['step5sub2usernamefullperm'],
	
				"bridge_admin_id_output" => $bridge_admin_id_output,
				"bridge_admin_id_values" => $bridge_admin_id_values,
				"bridge_admin_id_selected" => $bridge_admin_id_selected,
			
				"user_admin_password_text" => $wrm_install_lang['txtpassword'],
			
				"bridge_name" => $bridge_name,
				"bridge_prefix" => $bridge_prefix,
				"bridge_admin_id" => $bridge_admin_id,
				"bridge_database_name" => $bridge_database_name,
			
				"bd_submit" => $wrm_install_lang['bd_submit'],
			)
		);
		$smarty->display("bridges.s1.tpl.html");
	}

	include ("includes/page_footer.php");
}

//set group
if ($step == 2)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_admin_password = $_POST['bridge_admin_password'];
	$bridge_database_name = $_POST['bridge_database_name'];
	
	include("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;

	$user_group_output = array();
	$user_group_values = array();
	$user_alt_group_output = array();
	$user_alt_group_values = array();
		
	$user_group_output[] = $wrm_install_lang['step5sub3norest'];
	$user_group_values[] = "0";
	$user_alt_group_output[] = $wrm_install_lang['step5sub3noaddus'];
	$user_alt_group_values[] = "0";
	
	include ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	$sql = 	"SELECT " . $bridge_setting['db_allgroups_id'] . " , " . $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_database_name . "." . $bridge_prefix . $bridge_setting['db_table_allgroups'] .
			" ORDER BY ". $bridge_setting['db_allgroups_id'];
	$result_group = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	while ($data_group = $wrm_install->sql_fetchrow($result, true))
	{
		$user_group_output[] = $user_alt_group_output[] = $data_group[$bridge_setting['db_allgroups_name']];
		$user_group_values[] = $user_alt_group_values[] = $data_group[$bridge_setting['db_allgroups_id']];
	}
	$wrm_install->sql_close();

	if (isset($_POST['user_group']))
		$user_group_selected = $_POST['user_group'];
	else
		$user_group_selected = $wrm_install_lang['step5sub3norest'];
	
	if (isset($_POST['user_alt_group']))
		$user_alt_group_selected = $_POST['user_alt_group'];
	else
		$user_alt_group_selected = $wrm_install_lang['step5sub3noaddus'];
	
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."step=3" ,
			"headtitle" => $wrm_install_lang['headtitle'],
			"user_group_01_text" => $wrm_install_lang['step5sub3group01'],
			"user_group_02_text" => $wrm_install_lang['step5sub3group02'],
			"user_group_03_text" => $wrm_install_lang['step5sub3group03'],
			"user_group_alt_01_text" => $wrm_install_lang['step5sub3altgroup01'],
			"user_group_alt_02_text" => $wrm_install_lang['step5sub3altgroup02'],

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
			"bridge_database_name" => $bridge_database_name,
		
		
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("bridges.s2.tpl.html");
	include ("includes/page_footer.php");
		
}

$wrm_install_lang['found_user_from_bridge']= "found user from bridge system";

//import user from the bridge system
if($step == 3)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_admin_password = $_POST['bridge_admin_password'];
	$bridge_database_name = $_POST['bridge_database_name'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];
	
	include("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;
	
	include ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);

	$sql = 	"SELECT " .	$bridge_setting['db_user_name'] . 
			" FROM " . 	$bridge_database_name . "." . $bridge_prefix . $bridge_setting['db_table_user_name']. " " . $bridge_setting['db_user_name_filter'];
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$found_user = $wrm_install->sql_numrows($result);

	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."step=4" ,
			"headtitle" => $wrm_install_lang['headtitle'],
			"import_user_text" => $wrm_install_lang['question_wantimport'],
			"yes" => $wrm_install_lang['yes'],
			"no" => $wrm_install_lang['no'],
			"found_user_from_bridge_text" => $wrm_install_lang['found_user_from_bridge'],
			"found_user_from_bridge_value" => $found_user,
		
			"bridge_name" => $bridge_name,
			"bridge_prefix" => $bridge_prefix,
			"bridge_admin_id" => $bridge_admin_id,
			"bridge_admin_password" => $bridge_admin_password,
			"bridge_database_name" => $bridge_database_name,
			"bridge_auth_user_group" => $bridge_auth_user_group,
			"bridge_auth_user_alt_group" => $bridge_auth_user_alt_group,
		
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("bridges.s3.tpl.html");
	include ("includes/page_footer.php");	
}

//import user from bridge system and
//show result from install_bridges (overview)
if($step == 4)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_prefix = $_POST['bridge_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_database_name = $_POST['bridge_database_name'];
	$bridge_admin_password = $_POST['bridge_admin_password'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];

	include("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;
	
	include ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	if ($_POST['importUser'] == "yes")
	{
		
		//$sql = "SELECT user_id, user_email, username  FROM " . $phpbb_prefix . "users ORDER BY user_id";
		$sql = 	"SELECT " . $bridge_setting['db_user_id'] . ", " . 
					$bridge_setting['db_user_email'] . ", " . 
					$bridge_setting['db_user_name'] . 
				"  FROM " . $bridge_prefix . $bridge_setting['db_table_user_name'] . " " . $bridge_setting['db_user_name_filter'];
		$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	
		if($wrm_install->sql_numrows($result) != 0)
		{

			$defaultuserPriv = 0;
			while ($rows = $wrm_install->sql_fetchrow($result_user_group, true))
			{
				if (!$rows[$bridge_setting['db_allgroups_name']])
				{
					$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "profile (`profile_id`, `email`, `password`,`priv`,`username`) " .
						 			"VALUES(%s,%s,%s,%s,%s)",
										quote_smart($bridge_setting['db_user_id']),
										quote_smart($bridge_setting['db_user_email']),
										quote_smart(""), //password
										quote_smart($defaultuserPriv),
										quote_smart($bridge_setting['db_user_name'])
							);
					$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
				}		
			}
		}
	}
		
	$sql = 	"SELECT " . $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_database_name . "." . $bridge_prefix . $bridge_setting['db_table_allgroups'] .
			" WHERE  " . $bridge_setting['db_allgroups_id'] . "='" . $bridge_auth_user_group . "'";
	$result_user_group = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	while ($data_user_group = $wrm_install->sql_fetchrow($result_user_group, true))
	{
		$bridge_auth_user_group = $data_user_group[$bridge_setting['db_allgroups_name']];
	}

	$sql = 	"SELECT " . $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_database_name . "." . $bridge_prefix . $bridge_setting['db_table_allgroups'] .
			" WHERE  " . $bridge_setting['db_allgroups_id'] . "='" . $bridge_auth_user_alt_group . "'";
	
	$result_user_alt_group = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	while ($data_user_group = $wrm_install->sql_fetchrow($result_user_alt_group, true))
	{
		$bridge_auth_user_alt_group = $data_user_group[$bridge_setting['db_allgroups_name']];
	}

	$wrm_install->sql_close();

	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."step=bridge_done" ,
			"headtitle" => $wrm_install_lang['headtitle'],
				
			"bridge_name_text" => "bridge name",
			"bridge_name_value" => $bridge_name,
			"bridge_prefix_text" => $wrm_install_lang['step2WRMtableprefix'],
			"bridge_prefix_value" => $bridge_prefix,
			"bridge_database_name_value" => $bridge_database_name,
			"bridge_database_name_text" => $wrm_install_lang['database_text'],
			"bridge_admin_id_text" => $wrm_install_lang['txtusername'],
			"bridge_admin_id_value" => $bridge_admin_id,
			"bridge_admin_password_text" => $wrm_install_lang['txtpassword'],
			"bridge_admin_password_value" => $bridge_admin_password,
			"bridge_auth_user_text" => $wrm_install_lang['txt_group'],
			"bridge_auth_user_group_value" => $bridge_auth_user_group,
			"bridge_auth_user_alt_text" => $wrm_install_lang['txt_alt_group'],
			"bridge_auth_user_alt_group_value" => $bridge_auth_user_alt_group,
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("bridges.s4.tpl.html");
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
	$bridge_database_name = $_POST['bridge_database_name'];
	
	include ($wrm_config_file);
	//include ("includes/function.php");
	include ("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;
	
	$bridge_utf8_support = $bridge_setting['bridge_utf8_support'];
	
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	if ($bridge_name != "iums")
	{
		$sql = sprintf(	"SELECT " . $bridge_setting['db_user_id']. " , ". $bridge_setting['db_user_name'] . " , " .	$bridge_setting['db_user_email'] . " , " .$bridge_setting['db_user_password'] .
						" FROM " . 	$bridge_database_name . "." . $bridge_prefix . $bridge_setting['db_table_user_name'] . 
						" WHERE " . $bridge_setting['db_user_id'] . " = %s", quote_smart($bridge_admin_id)
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
	}

	//only for -- iums auth --
	else
	{
		$user_admin_username = $_POST['user_admin_username'];
		$user_admin_password = $_POST['user_admin_password'];
		$user_admin_email = $_POST['user_admin_email'];
		$user_priv = 1;
		
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "profile " .
						" (`email`, `password`,`priv`,`username`, `last_login_time`) " .
						" VALUES ( %s, %s, %s, %s, %s)",
						quote_smart($user_admin_email),
						quote_smart($user_admin_password),	quote_smart($user_priv), 
						quote_smart(strtolower($user_admin_username)), quote_smart(time())
			);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);		
	}
	
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
	
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_utf8_support"), quote_smart($bridge_utf8_support)
			);

	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
					" VALUES(%s,%s)", quote_smart($bridge_name . "_database_name"), quote_smart(bridge_database_name)
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		
	//close connection
	$wrm_install->sql_close();
	header("Location: install.php?lang=".$lang."&step=done");
}



?>