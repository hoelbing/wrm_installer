<?php
/***************************************************************************
 *                             install_bridges.php
 *                            -------------------
 *   begin                : Dec 12, 2008
 *	 Dev                  : Carsten H�lbing
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
$step = "0";
else
$step = $_GET['step'];

//set Lang. Format
if (!isset($_GET['lang']))
	$lang = "english";
else
	$lang = $_GET['lang'];

/*----------------------------------------------------------------*/

//default user_priv for normal user
$default_user_Priv = 0;

//default user_priv for the admin
$default_admin_Priv = 1;

$filename_bridge = "install_bridges.php?lang=".$lang."&";

$wrm_config_file = "../config.php";

/*----------------------------------------------------------------*/

include_once('language/locale-'.$lang.'.php');
include_once ($wrm_config_file);
include_once ("includes/db/db.php");
include_once ("includes/function.php");

/*----------------------------------------------------------------*/
	
if (($step == "0"))
{

	$array_bridge_db = array();
	$array_bridge_db = scan_dbserver();
	$bridge_type_output = array();
	$bridge_type_values = array();
	
	for ($i = 0; $i < count($array_bridge_db); $i++)
	{

		$bridge_type_output[]=$wrm_install_lang['bridge_name_text'].": '". $array_bridge_db[$i]["bridge_name"]."' ; ".$wrm_install_lang['step2dbname'].": '". $array_bridge_db[$i]["bridge_database"]."' ; ".$wrm_install_lang['table_prefix_text'].": '".$array_bridge_db[$i]["bridge_table_prefix"]."' ; ".$wrm_install_lang['bridge_users_found_text'].": '".$array_bridge_db[$i]["bridge_founduser"]."'";
		$bridge_type_values[]=$array_bridge_db[$i]["bridge_name"].":".$array_bridge_db[$i]["bridge_database"].":".$array_bridge_db[$i]["bridge_table_prefix"].":";
	}
	
	$bridge_type_output[]=$wrm_install_lang['bridge_name_text'].": 'iums' ; ".$wrm_install_lang['step2dbname'].": '". $phpraid_config['db_name']."' ; ".$wrm_install_lang['table_prefix_text'].": '".$phpraid_config['db_prefix']."' ; ".$wrm_install_lang['bridge_users_found_text'].": '0'";
	$bridge_type_values[]="iums:".$phpraid_config['db_name'].":".$phpraid_config['db_prefix']."; ".$wrm_install_lang['bridge_users_found_text'].":0";

	include_once ("includes/page_header.php");
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
			"expertmodus_link" => '<a href="'.$filename_bridge.'step=epbrgstep1">'.$wrm_install_lang['expert_modus'].'</a>',
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);
	
	$smarty->display('bridges.s0.tpl.html');
	include_once ("includes/page_footer.php");
}

//expert mode bridge step1
else if ($step === "epbrgstep1")
{
	//$_POST
	if (isset($_POST['bridge_type']))
	{
			$bridge_name = $_POST['bridge_type'];
	}
	else
	{
		$bridge_name = "iums";
	}
	if (isset($_POST['bridge_db_table_prefix']))
	{
		$bridge_db_table_prefix = $_POST['bridge_db_table_prefix'];
	}
	else
	{
		$bridge_db_table_prefix = "";
	}
	if (isset($_POST['bridge_database_name']))
	{
		$bridge_database_name = $_POST['bridge_database_name'];
	}
	else
	{
		$bridge_database_name = "";
	}
	
	//$_GET
	if (isset($_GET['connection']))
	{
		
	}
	if (isset($_GET['bridge']))
	{
		
	}
	//load all auth bridges names
	$files = array();
	
	$dir_brige = "auth";
	//load all available files, from "auth" dir in a array
	$dh = opendir($dir_brige);
	while(false != ($filename = readdir($dh)))
	{
		$filename = substr($filename, 8);//cut from position 7 to filename.lenght end
		$files[] = str_replace('.php','',$filename);
	}
	
	//sort and cut/del "." and ".." from array
	sort($files);
	array_shift($files);
	array_shift($files);
	
	include_once ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."step=epbrgstep2" ,
			"headtitle" => $wrm_install_lang['expert_modus'],
			"bridge_type_text" => $wrm_install_lang['bridge_step0_choose_auth'],
			"bridge_database_name_text" => $wrm_install_lang['db_name_text'],
			"bridge_database_name_value" => $bridge_database_name,
			"bridge_db_table_prefix_text" => $wrm_install_lang['table_prefix_text'],
			"bridge_db_table_prefix_value" => $bridge_db_table_prefix,
			"bridge_type_output" => $files,
			"bridge_type_values" => $files,
			"bridge_type_selected" => $bridge_name,
		
			"bridge_ep01_info_text" => $wrm_install_lang['hittingsubmit'],
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("bridges.ep01.tpl.html");
	include_once ("includes/page_footer.php");
}

//check values from epbrgstep1
//expert mode bridge step2
else if ($step === "epbrgstep2")
{
	$bridge_name = $_POST['bridge_type'];
	
	if ($bridge_name != "iums")
	{
		$bridge_db_table_prefix = $_POST['bridge_db_table_prefix'];
		$bridge_database_name = $_POST['bridge_database_name'];
		
		if ( ($bridge_database_name != "") and ($bridge_db_table_prefix != "") )
		{
			$ret_value = test_bridge_connection($bridge_name, $bridge_database_name, $bridge_db_table_prefix);
		}
		else 
		{
			header("Location: ".$filename_bridge."step=epbrgstep1&values=0");
			exit;
		}
	
		//all ok
		if ($ret_value == 0)
		{
			$step = 1;
			$tmp_value = 1;
		}
	
		//problem: connection fail
		if ($ret_value == 1)
		{
			header("Location: ".$filename_bridge."step=epbrgstep1&connection=error");
			exit;
		}
		
		//problem: wrong bridge type
		if ($ret_value == 2)
		{
			header("Location: ".$filename_bridge."step=epbrgstep1&bridge=wrong_bridge_type");
			exit;
		}
	}
	else
	{
		$step = 1;
		$tmp_value = 1;	
	}
}

//get all username's from the bridge
//set password for selected user
if ($step == 1)
{
	//if unselect jump back
	if ((!$_POST['allfoundbridges'])and !isset($tmp_value))
		header("Location: ".$filename_bridge."step=0");

	if ($bridge_name != "iums")
	{
		//echo "step1".$bridge_name;
		if (isset($_POST['allfoundbridges']))
		{
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
			$bridge_db_table_prefix = substr($string, $pos, $pos_new - $pos);
		}
		
		include("auth/install_".$bridge_name.".php");
	
		$bridge_admin_id_output = array();
		$bridge_admin_id_values = array();
		
		include_once ($wrm_config_file);
		
		$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
		
		$sql = 	"SELECT " . $bridge_setting_value['db_user_name'] . " , ". $bridge_setting_value['db_user_email'] ." , ". $bridge_setting_value['db_user_id'].
				" FROM " . 	$bridge_database_name  ."." . $bridge_db_table_prefix . $bridge_setting_value['db_table_user_name'] .
				" " . $bridge_setting_value['db_user_name_filter'];
		$result_admin = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		while ($data_admin = $wrm_install->sql_fetchrow($result_admin,true))
		{
			$bridge_admin_id_output[] = $wrm_install_lang['txtusername'].": ".utf8_encode($data_admin[$bridge_setting_value['db_user_name']]).";  ".$wrm_install_lang['txtemail'].": ".$data_admin[$bridge_setting_value['db_user_email']];
			$bridge_admin_id_values[] = $data_admin[$bridge_setting_value['db_user_id']];
		}
		
		$wrm_install->sql_close();
	
		if (isset($_POST['bridge_admin_id']))
			$bridge_admin_id_selected = $_POST['bridge_admin_id'];
		else
			$bridge_admin_id_selected = $bridge_admin_id_output[count($bridge_admin_id_output)-1];
		
		$form_action_link = "step=2";
	
		include_once ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action" => $filename_bridge.$form_action_link ,
				"headtitle" => $wrm_install_lang['headtitle'],
				"user_admin_01_text" => $wrm_install_lang['step5sub2usernamefullperm'],
	
				"bridge_admin_id_output" => $bridge_admin_id_output,
				"bridge_admin_id_values" => $bridge_admin_id_values,
				"bridge_admin_id_selected" => $bridge_admin_id_selected,
			
				"bridge_name" => $bridge_name,
				"bridge_db_table_prefix" => $bridge_db_table_prefix,
				"bridge_admin_id" => $bridge_admin_id,
				"bridge_database_name" => $bridge_database_name,
				"bd_submit" => $wrm_install_lang['bd_submit'],
			)
		);
		$smarty->display("bridges.s1.tpl.html");	
	}
	else
	{
		$form_action_link = "step=bridge_done";
		
		include_once ("includes/page_header.php");
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
				"bridge_db_table_prefix" => $bridge_db_table_prefix,
				"bridge_admin_id" => $bridge_admin_id,
				"bridge_database_name" => $bridge_database_name,
				"bridge_auth_user_group" => "0",
				"bridge_auth_user_alt_group" => "0",
				"bd_submit" => $wrm_install_lang['bd_submit'],
			)
		);
		$smarty->display("bridges.s1_iums.tpl.html");
	}

	include_once ("includes/page_footer.php");
}

//set group and alternative group
//witch have full acces to wrm
else if ($step == 2)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_db_table_prefix = $_POST['bridge_db_table_prefix'];
	$bridge_database_name = $_POST['bridge_database_name'];

	$bridge_admin_id = $_POST['bridge_admin_id'];

	include_once("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;

	$user_group_output = array();
	$user_group_values = array();
	$user_alt_group_output = array();
	$user_alt_group_values = array();
		
	$user_group_output[] = $wrm_install_lang['step5sub3norest'];
	$user_group_values[] = "0";
	$user_alt_group_output[] = $wrm_install_lang['step5sub3noaddus'];
	$user_alt_group_values[] = "0";
	
	include_once ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	$sql = 	"SELECT " . $bridge_setting['db_allgroups_id'] . " , " . $bridge_setting['db_allgroups_name'] .
			" FROM " . 	$bridge_database_name . "." . $bridge_db_table_prefix . $bridge_setting['db_table_allgroups'] .
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
	
	include_once ("includes/page_header.php");
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
			"bridge_db_table_prefix" => $bridge_db_table_prefix,
			"bridge_admin_id" => $bridge_admin_id,
			"bridge_database_name" => $bridge_database_name,

			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("bridges.s2.tpl.html");
	include_once ("includes/page_footer.php");
}

//import user from the bridge system
else if($step == 3)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_db_table_prefix = $_POST['bridge_db_table_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_database_name = $_POST['bridge_database_name'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];
	
	include_once("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;
	
	include_once ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);

	$sql = 	"SELECT " .	$bridge_setting['db_user_name'] . 
			" FROM " . 	$bridge_database_name . "." . $bridge_db_table_prefix . $bridge_setting['db_table_user_name']. " " . $bridge_setting['db_user_name_filter'];
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$found_user = $wrm_install->sql_numrows($result);

	include_once ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."step=4" ,
			"headtitle" => $wrm_install_lang['headtitle'],
			"import_user_text" => $wrm_install_lang['question_wantimport'],
			"text_yes" => $wrm_install_lang['yes'],
			"text_no" => $wrm_install_lang['no'],
			"found_user_from_bridge_text" => $wrm_install_lang['found_user_from_bridge'],
			"found_user_from_bridge_value" => $found_user,
		
			"bridge_name" => $bridge_name,
			"bridge_db_table_prefix" => $bridge_db_table_prefix,
			"bridge_admin_id" => $bridge_admin_id,
			"bridge_database_name" => $bridge_database_name,
			"bridge_auth_user_group" => $bridge_auth_user_group,
			"bridge_auth_user_alt_group" => $bridge_auth_user_alt_group,
		
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("bridges.s3.tpl.html");
	include_once ("includes/page_footer.php");	
}

//import user from bridge system and
//show result from install_bridges (overview)
else if($step == 4)
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_db_table_prefix = $_POST['bridge_db_table_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_database_name = $_POST['bridge_database_name'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];

	include_once("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;
	
	include_once ($wrm_config_file);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	if ($_POST['importUser'] == "yes")
	{
		$sql = 	"SELECT " . $bridge_setting['db_user_id'] . ", " . $bridge_setting['db_user_email'] . ", " . $bridge_setting['db_user_name'] . " , " . $bridge_setting['db_user_password'] .
				"  FROM " . $bridge_db_table_prefix . $bridge_setting['db_table_user_name'] . " " . $bridge_setting['db_user_name_filter'];
		$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	
		if($wrm_install->sql_numrows($result) != 0)
		{
			while ($data_bridge = $wrm_install->sql_fetchrow($result, true))
			{
				if (!$data_bridge[$bridge_setting['db_allgroups_name']])
				{
					$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "profile (`profile_id`, `email`, `password`,`priv`,`username`) " .
						 			"VALUES(%s,%s,%s,%s,%s)",
										quote_smart($data_bridge[$bridge_setting['db_user_id']]),
										quote_smart($data_bridge[$bridge_setting['db_user_email']]),
										quote_smart($data_bridge[$bridge_setting['db_user_password']]),
										quote_smart($default_user_Priv),
										quote_smart($data_bridge[$bridge_setting['db_user_name']])
							);
					$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
				}		
			}
		}
	}
	if ($bridge_auth_user_group != 0)
	{
		$sql = 	"SELECT " . $bridge_setting['db_allgroups_name'] .
				" FROM " . 	$bridge_database_name . "." . $bridge_db_table_prefix . $bridge_setting['db_table_allgroups'] .
				" WHERE  " . $bridge_setting['db_allgroups_id'] . "='" . $bridge_auth_user_group . "'";
		$result_user_group = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		while ($data_user_group = $wrm_install->sql_fetchrow($result_user_group, true))
		{
			$bridge_auth_user_group_value = $data_user_group[$bridge_setting['db_allgroups_name']];
		}		
	}
	else
	{
		$bridge_auth_user_group_value = $wrm_install_lang['step5sub3norest'];
	}

	if ($bridge_auth_user_alt_group != 0)
	{
		$sql = 	"SELECT " . $bridge_setting['db_allgroups_name'] .
				" FROM " . 	$bridge_database_name . "." . $bridge_db_table_prefix . $bridge_setting['db_table_allgroups'] .
				" WHERE  " . $bridge_setting['db_allgroups_id'] . "='" . $bridge_auth_user_alt_group . "'";
		
		$result_user_alt_group = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		while ($data_user_group = $wrm_install->sql_fetchrow($result_user_alt_group, true))
		{
			$bridge_auth_user_alt_group_value = $data_user_group[$bridge_setting['db_allgroups_name']];
		}		
	}
	else
	{
		$bridge_auth_user_alt_group_value = $wrm_install_lang['step5sub3noaddus'];
	}

	$sql = sprintf(	"SELECT " . $bridge_setting['db_user_name'].
					" FROM " . 	$bridge_database_name  ."." . $bridge_db_table_prefix . $bridge_setting['db_table_user_name'] .
					" WHERE `".$bridge_setting['db_user_id']."` = %s",quote_smart($bridge_admin_id)
			);
	$result_admin = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$data_admin = $wrm_install->sql_fetchrow($result_admin,true);
	$bridge_admin_name = $data_admin[$bridge_setting['db_user_name']];

	
	$wrm_install->sql_close();

	include_once ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => $filename_bridge."step=bridge_done" ,
			"headtitle" => $wrm_install_lang['headtitle'],
				
			"bridge_name_text" => "bridge name",
			"bridge_name_value" => $bridge_name,
			"bridge_db_table_prefix_text" => $wrm_install_lang['step2WRMtableprefix'],
			"bridge_db_table_prefix_value" => $bridge_db_table_prefix,
			"bridge_database_name_value" => $bridge_database_name,
			"bridge_database_name_text" => $wrm_install_lang['database_text'],
			"bridge_admin_id_text" => $wrm_install_lang['txt_admin_username'],
			"bridge_admin_id_value" => $bridge_admin_name,
			"bridge_auth_user_text" => $wrm_install_lang['txt_group'],
			"bridge_auth_user_group_value" => $bridge_auth_user_group_value,
			"bridge_auth_user_alt_text" => $wrm_install_lang['txt_alt_group'],
			"bridge_auth_user_alt_group_value" => $bridge_auth_user_alt_group_value,
			"bd_submit" => $wrm_install_lang['bd_submit'],
		
			"bridge_name" => $bridge_name,
			"bridge_db_table_prefix" => $bridge_db_table_prefix,
			"bridge_admin_id" => $bridge_admin_id,
			"bridge_database_name" => $bridge_database_name,
			"bridge_auth_user_group" => $bridge_auth_user_group,
			"bridge_auth_user_alt_group" => $bridge_auth_user_alt_group,
		)
	);

	$smarty->display("bridges.s4.tpl.html");
	include_once ("includes/page_footer.php");
}

else if($step === "bridge_done")
{
	$bridge_name = $_POST['bridge_name'];
	$bridge_db_table_prefix = $_POST['bridge_db_table_prefix'];
	$bridge_admin_id = $_POST['bridge_admin_id'];
	$bridge_auth_user_group = $_POST['bridge_auth_user_group'];
	$bridge_auth_user_alt_group = $_POST['bridge_auth_user_alt_group'];
	$bridge_database_name = $_POST['bridge_database_name'];
	
	include_once ($wrm_config_file);
	include_once ("auth/install_".$bridge_name.".php");
	$bridge_setting = $bridge_setting_value;

	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name'], $phpraid_config['db_name']);
	
	if ($bridge_name != "iums")
	{
		//get all data's from bridge system
		$sql = sprintf(	"SELECT " . $bridge_setting['db_user_id']. " , ". $bridge_setting['db_user_name'] . " , " .	$bridge_setting['db_user_email'] . " , " .$bridge_setting['db_user_password'] .
						" FROM " . 	$bridge_database_name . "." . $bridge_db_table_prefix . $bridge_setting['db_table_user_name'] . 
						" WHERE " . $bridge_setting['db_user_id'] . " = %s", quote_smart($bridge_admin_id)
				);
		$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$data_bridge = $wrm_install->sql_fetchrow($result, true);

		//check if user exist in wrm db
		$sql = sprintf(	"SELECT * " .
						" FROM " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "profile " . 
						" WHERE profile_id = %s", quote_smart($bridge_admin_id)
		);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		if ($wrm_install->sql_numrows() == 0 )
		{
			//Now we need to create the users
			//profile in the WRM database if it does not already exist.
			$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "profile " .
							" (`profile_id`, `email`, `password`,`priv`,`username`, `last_login_time`) " .
							" VALUES (%s, %s, %s, %s, %s, %s)",
							quote_smart($data_bridge[$bridge_setting['db_user_id']]),quote_smart($data_bridge[$bridge_setting['db_user_email']]),
							quote_smart($data_bridge[$bridge_setting['db_user_password']]),	quote_smart($default_admin_Priv), 
							quote_smart(strtolower($data_bridge[$bridge_setting['db_user_name']])), quote_smart(time())
					);
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		}
		else
		{
			$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "profile" .
							" SET `email` = %s, `priv` = %s, `username` = %s, `last_login_time` = %s WHERE %s = `profile_id`",
							 quote_smart($data_bridge[$bridge_setting['db_user_email']]),quote_smart($default_admin_Priv), quote_smart(strtolower($data_bridge[$bridge_setting['db_user_name']])),
							 quote_smart(time()), quote_smart($data_bridge[$bridge_setting['db_user_id']])
					);
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		}
	}

	//only for -- iums auth --
	else
	{
		$user_admin_username = $_POST['user_admin_username'];
		$user_admin_password = $_POST['user_admin_password'];
		$user_admin_email = $_POST['user_admin_email'];
		
		$sql = sprintf(	"SELECT username " .
						" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "profile " . 
						" WHERE `username` = %s", quote_smart($user_admin_username)
				);
		$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$data = $wrm_install->sql_fetchrow($result, true);
		
		if ($wrm_install->sql_numrows() == 0 )
		{	
			$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "profile " .
							" (`email`, `password`,`priv`,`username`, `last_login_time`) " .
							" VALUES ( %s, %s, %s, %s, %s)",
							quote_smart($user_admin_email),
							quote_smart($data[$db_user_password]),	quote_smart($default_admin_Priv), 
							quote_smart(strtolower($user_admin_username)), quote_smart(time())
				);
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		}
		else
		{
			$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "profile" .
							" SET `email` = %s, `priv` = %s, `username` = %s, `last_login_time` = %s, WHERE %s = `profile_id`",
							 quote_smart($user_admin_email),quote_smart($default_admin_Priv),quote_smart(strtolower($user_admin_username)),
							 quote_smart(time()), quote_smart($bridge_setting['db_user_id'])
					);
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		}		
	}

	/*
	 * $bridge_name . auth_type
	 */
	$sql = 	sprintf("SELECT * "  .
					" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
					" WHERE  `%s` = %s", "config_name", quote_smart("auth_type")
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	if ($wrm_install->sql_numrows() != 0 )
	{
		$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
						" SET `config_value` = %s WHERE %s = `config_name`", quote_smart($bridge_name), quote_smart("auth_type"));
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}		
	else
	{	
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
						" VALUES(%s,%s)", quote_smart("auth_type"), quote_smart($bridge_name)
				);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	
	/*
	 * $bridge_name . _table_prefix
	 */
	$sql = 	sprintf("SELECT * "  .
					" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
					" WHERE  `%s` = %s", "config_name", quote_smart($bridge_name . "_table_prefix")
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	if ($wrm_install->sql_numrows() != 0 )
	{
		$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
						" SET `config_value` = %s WHERE %s = `config_name`", quote_smart($bridge_db_table_prefix), quote_smart($bridge_name . "_table_prefix"));
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}		
	else
	{	
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
						" VALUES(%s,%s)", quote_smart($bridge_name . "_table_prefix"), quote_smart($bridge_db_table_prefix)
				);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
		
	/*
	 * $bridge_name . _db_name
	 */
	$sql = 	sprintf("SELECT * "  .
					" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
					" WHERE  `%s` = %s", "config_name", quote_smart($bridge_name . "_db_name")
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$data = $wrm_install->sql_fetchrow($result, true);
	if ($wrm_install->sql_numrows() != 0 )
	{
		$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
						" SET `config_value` = %s WHERE %s = `config_name`", quote_smart($bridge_database_name), quote_smart($bridge_name . "_db_name"));
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	else
	{
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
						" VALUES(%s,%s)", quote_smart($bridge_name . "_db_name"), quote_smart($bridge_database_name)
				);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);	
	}
	
	/*
	 * $bridge_name . _auth_user_group
	 */
	$sql = 	sprintf("SELECT * "  .
					" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
					" WHERE  `%s` = %s", ("config_name"), quote_smart($bridge_name."_auth_user_group")
			);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	if ($wrm_install->sql_numrows() != 0)
	{
		$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
						" SET `config_value` = %s WHERE %s = `config_name`", quote_smart($bridge_auth_user_group), quote_smart($bridge_name . "_auth_user_group"));
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	else
	{
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
						" VALUES(%s,%s)", quote_smart($bridge_name . "_auth_user_group"), quote_smart($bridge_auth_user_group)
				);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	
	/*
	 * $bridge_name . _auth_user_alt_group
	 */
	$sql = 	sprintf("SELECT * "  .
				" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
				" WHERE  `%s` = %s", ("config_name"), quote_smart($bridge_name."_auth_user_alt_group")
		);
	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	if ($wrm_install->sql_numrows() != 0)
	{
		$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
						" SET `config_value` = %s WHERE %s = `config_name`", quote_smart($bridge_auth_user_alt_group), quote_smart($bridge_name . "_auth_user_alt_group"));
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	else
	{	
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
						" VALUES(%s,%s)", quote_smart($bridge_name . "_auth_user_alt_group"), quote_smart($bridge_auth_user_alt_group)
				);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	
	/*
	 * $bridge_name . _utf8_support
	 */
	$sql = 	sprintf("SELECT * "  .
					" FROM " . 	$phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
					" WHERE  `%s` = %s", "config_name", quote_smart($bridge_name . "_utf8_support")
			);

	$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	if ($wrm_install->sql_numrows() != 0)
	{
		$sql = 	sprintf("UPDATE " . $phpraid_config['db_name'] . "." . $phpraid_config['db_prefix'] . "config" .
						" SET `config_value` = %s WHERE %s = `config_name`", quote_smart($bridge_setting['bridge_utf8_support']), quote_smart($bridge_name . "_utf8_support"));
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	else
	{
		$sql = sprintf(	"INSERT INTO " . $phpraid_config['db_prefix'] . "config".
						" VALUES(%s,%s)", quote_smart($bridge_name . "_utf8_support"), quote_smart($bridge_setting['bridge_utf8_support'])
				);
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
		
	//close connection
	$wrm_install->sql_close();
	
	header("Location: install.php?lang=".$lang."&step=done");
}
?>