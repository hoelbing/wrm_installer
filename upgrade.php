<?php
/***************************************************************************
 *                             upgrade.php
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

/*
*
* load file "database_schema/upgrade/update_files_conf.php"
* which include a array with "filename", and (new)"versionsnr"
* then start the automatic update Process
*/

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
$default_wrmtable_prefix = "wrm_";



/*----------------------------------------------------------------*/
/**
 * Version from your wrm (Server) Database
 */

//connect 2 wrm server
$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
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
 * update from version ($wrm_update_array[ "current version"])
 * to the last version ($wrm_update_array[ "max" ]) from the array $wrm_update_array
 */
if ($step == 1)
{
	//load update infos
	include_once("database_schema/upgrade/update_files_conf.php");
	
	//connect to wrm server
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);

	$wrm_update_array_y = 0;

	for ($i = 0; $i < count($wrm_update_array);$i++)
	{
		if ($wrm_update_array[$i]["update_to_version"] == $wrm_versions_nr_current_value)
		{
			$wrm_update_array_y = $i;
		}
	}
	
	//+1
	$wrm_update_array_y++;
	
	//update from version ($wrm_update_array[ "current version"])
	//to the last version ($wrm_update_array[ "max" ]) from the array $wrm_update_array
	//open sql file; do sql; close file;
	for ($wrm_update_array_y; $wrm_update_array_y < count($wrm_update_array); $wrm_update_array_y++)
	{
		if(!$fd = fopen('database_schema/upgrade/' . $wrm_update_array[$wrm_update_array_y]["file_name"], 'r'))
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
	}
	
	//read new install version from wrm server
	$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	$data = $wrm_install->sql_fetchrow($result, true);
	$wrm_versions_nr_current_value = $data['version_number'];

	$wrm_install->sql_close();

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
	
	// write/replace the "../config.php" file
	write_wrm_configfile($phpraid_config['db_name'], $phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass'], $phpraid_config['db_prefix'],$phpraid_config['db_type']);
	
}
?>
