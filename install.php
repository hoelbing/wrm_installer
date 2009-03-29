<?php

/*-------------------------------*/
//lang strg
$wrm_install_lang['create_db'] = "Create Database?";
$wrm_install_lang['default'] = "default";
$wrm_install_lang['php_variables'] = "PHP Variables";
$wrm_install_lang['error_found_table_titel'] = "already, existing tables were found";
$wrm_install_lang['error_found_table_bd_back'] = "Botton Back : change Table Prefix or Database";
$wrm_install_lang['error_found_table_bd_cont'] = "Botton Continue : deletes all existing tables, before the new tables are installed";

/*-------------------------------*/

/*
 * todo
 * update: übersichtsseite
 * 			lösung finden für x.x.x.x.x evtl mit schleifens

 * sprache 
 * 			ändern der Sprache
 * 			files anpassen /löschen und so
 * phpbb 2 und 3 problem
 * 		lsg: $bridge_major_version
 * 
 * überlegung
 * 		install step5: wenn eine datenbank gefunden wurde evtl . updaten?
 * 
 * bride:
 * 			import der user vom bridesystem
 * 
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

include_once('language/locale-'.$lang.'.php');


include_once ("includes/db/db.php");
include_once ("includes/function.php");


/**
 * This is the path to the WRM Config File
 */
$wrm_config_file = "../config.php";


/**
 * --------------------
 * Step 0
 *
 * check: if config.php file available
 * yes -> test database connection -> open upgrade.php 
 * no -> jump to step1 (installation)
 * ---------------------
 * */

if ($step == "0")
{
	if(is_file($wrm_config_file))
	{
		include($wrm_config_file);
			
		$FOUNDERROR = FALSE;
		
		// database connection
		$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
		
		if($wrm_install->db_connect_id)
		{
			$FOUNDERROR = TRUE;
		}

		$wrm_install->sql_close();
		
		if ($FOUNDERROR == FALSE)
		{
			//upgrade now
			header("Location: upgrade.php");
			exit;
		}
	}
	header("Location: install.php?step=1");
}

/**
 * --------------------
 * Step 1
 * ---------------------
 * */

else if($step == 1) {
$phpversion = (int)(str_replace(".", "", phpversion()));

	if(!isset($_POST['submit']))
	{
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

		// NOTE: BE CAREFUL WITH IS__WRITEABLE, that is NOT the built in is_writeable function. (See Double Underscore)
		if (is_file($wrm_config_file))
		{
			if(!is__writeable($wrm_config_file))
			{
				$writeable_config_bgcolor = "red";
				$writeable_config_value = $wrm_install_lang['no'];
			}
			else
			{
				$writeable_config_bgcolor = "green";
				$writeable_config_value = $wrm_install_lang['yes'];
			}
		}
		
		include ("includes/page_header.php");
		$smarty->assign(
			array(
					"form_action" => "install.php?step=1",
					//table
					"headtitle" => $wrm_install_lang['headtitle'],
					"property" => $wrm_install_lang['step0_property'],
					"required" => $wrm_install_lang['step0_required'],
					"exist" => $wrm_install_lang['step0_exist'],
					"system_requirements" => $wrm_install_lang['step0_system_requirements'],
					"phpversion_text" => $wrm_install_lang['step0_phpversion_text'],
					"phpversion_value" => phpversion(),
					"phpversion_bgcolor" => $phpversion_bgcolor,
					"mysqlversion_text" => $wrm_install_lang['step0_mysqlversion'],
					"mysqlversion_value" => $gd,
					"mysqlversion_bgcolor" => $mysqlversion_bgcolor,
					"nonactive" => $wrm_install_lang['step0_nonactive'],
			
					"writeable_config_text" => $wrm_install_lang['step0_writeable_config'],
					"writeable_config_value" => $writeable_config_value,
					"yes" => $wrm_install_lang['yes'],
					"writeable_config_bgcolor" => $writeable_config_bgcolor,
			
					"php_variables_text" => $wrm_install_lang['php_variables'],
					"SERVER_SERVER_SOFTWARE_text" => '_SERVER["SERVER_SOFTWARE"]',
					"SERVER_SERVER_SOFTWARE_value" => $_SERVER["SERVER_SOFTWARE"],
					"SERVER_DOCUMENT_ROOT_text" => '_SERVER["DOCUMENT_ROOT"]',
					"SERVER_DOCUMENT_ROOT_value" => $_SERVER["DOCUMENT_ROOT"],
					"SERVER_SERVER_NAME_text" => '_SERVER["SERVER_NAME"]',
					"SERVER_SERVER_NAME_value" => $_SERVER["SERVER_NAME"],
					"SERVER_HTTP_ACCEPT_CHARSET_text" => '_SERVER["HTTP_ACCEPT_CHARSET"]',
					"SERVER_HTTP_ACCEPT_CHARSET_value" => $_SERVER["HTTP_ACCEPT_CHARSET"],
			
					"bd_submit" => $wrm_install_lang['bd_submit'],
			)
		);
		
		$smarty->display("step1.tpl.html");
		include ("includes/page_footer.php");
	}
	if(isset($_POST['submit']))
	{
		header("Location: install.php?step=2");
	}
}

/**
 * --------------------
 * Step 2
 *
 * show/set db settings (server_hostname, db_username, db_password)
 * ---------------------
 * */
else if($step == 2) {
	$error_msg = "";

	if ( isset($_GET['erro_con']) )
	{
		$error_msg .= '<div class="errorHeader">Error connecting to Server (Servername or Username or Password incorrect) <br/>';
		$error_msg .= $wrm_install_lang['step3errordbcon'];
		$error_msg .= "<br/>".$wrm_install_lang['hittingsubmit']."</div><br/>"."<br/>";
	}

	if (isset($_POST['wrm_db_server_hostname']))
		$wrm_db_server_hostname_value = $_POST['wrm_db_server_hostname'];
	else
		$wrm_db_server_hostname_value = "localhost";			

	if (isset($_POST['wrm_db_username']))
		$wrm_db_username_value = $_POST['wrm_db_username'];
	else
		$wrm_db_username_value = "";
			
	if (isset($_POST['wrm_db_password']))
		$wrm_db_password_value = $_POST['wrm_db_password'];
	else
		$wrm_db_password_value = "";			


	if(is_file($wrm_config_file) and !isset($_POST['wrm_db_server_hostname']))
	{
		include($wrm_config_file);
		
		if (isset($phpraid_config['db_name']))
		{
			$wrm_db_server_hostname_value = $phpraid_config['db_host'];
			$wrm_db_username_value = $phpraid_config['db_user'];
			$wrm_db_password_value = $phpraid_config['db_pass'];
		}
	}
	 
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "install.php?step=3",
			"headtitle" => $wrm_install_lang['headtitle'],
			"wrm_db_server_hostname_text" => $wrm_install_lang['step2dbserverhostname'],
			"wrm_db_server_hostname_value" => $wrm_db_server_hostname_value,
			"wrm_db_username_text" => $wrm_install_lang['step2dbserverusername'],
			"wrm_db_username_value" => $wrm_db_username_value,
			"wrm_db_password_text" => $wrm_install_lang['step2dbserverpwd'],
			"wrm_db_password_value" => $wrm_db_password_value,
			"wrm_db_create_name" => $_POST['wrm_db_create_name'],
			"wrm_db_tableprefix" => $_POST['wrm_db_tableprefix'],
			"error_msg" => $error_msg,
		
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("step2.tpl.html");
	include ("includes/page_footer.php");
}

/**
 * --------------------
 * Step 3
 *
 * show/set db settings (db_name and db_tableprefix) 
 * ---------------------
 * */
else if($step == 3) {

	$wrm_db_server_hostname = $_POST['wrm_db_server_hostname'];
	$wrm_db_username = $_POST['wrm_db_username'];
	$wrm_db_password = $_POST['wrm_db_password'];
	
	$wrm_db_name = $_POST['wrm_db_name'];
	$wrm_create_db_value = $_POST['wrm_db_create_name'];
	$wrm_db_tableprefix = $_POST['wrm_db_tableprefix'];
	$sql_db_name_selected = $_POST['list_sql_db_name'];
	
	$wrm_config_writeable = FALSE;
	$FOUNDERROR_Connection = FALSE;
	
	if(is_file($wrm_config_file) and !isset($_POST['wrm_db_server_hostname']))
	{
		include($wrm_config_file);
		
		if (isset($phpraid_config['db_name']))
		{
			$wrm_db_server_hostname = $phpraid_config['db_host'];
			$wrm_db_username = $phpraid_config['db_user'];
			$wrm_db_password = $phpraid_config['db_pass'];
			$wrm_db_name = $phpraid_config['db_name'];
			$wrm_db_tableprefix = $phpraid_config['db_prefix'];	
		}
	}
	
	//check/test connection
	$wrm_install = &new sql_db($wrm_db_server_hostname, $wrm_db_username, $wrm_db_password, "");
	
	if(!$wrm_install->db_connect_id)
	{
		$FOUNDERROR_Connection = TRUE;
		header("Location: install.php?step=2&erro_con=1");
	}
	
	$error_msg = "";

	if ( isset($_GET['erro_con']) /*and ( $_POST['erro_con'] == 1 )*/ )
		$error_msg .= "Error connecting to Server (Servername or Username or Password incorrect) <br/>";//. ;

	if ( isset($_GET['error_db']) /*and ($_POST['error_db'] == 1 )*/ )
		$error_msg .= $wrm_install_lang['step3errordbcon'];

	if ($error_msg != "")
	{
		$error_msg .= "<br/>".$wrm_install_lang['hittingsubmit'];
	}
			
	if (isset($_POST['wrm_db_tableprefix'])and $_POST['wrm_db_tableprefix'] != "")
		$wrm_db_tableprefix_value = $_POST['wrm_db_tableprefix'];
	else
		$wrm_db_tableprefix_value = "wrm_";


	//load all DATABASES name in a array ($sql_all_dbname)
	$sql_db_name_values = array();
	$sql_db_all = "SHOW DATABASES";

	$result_db_all = $wrm_install->sql_query($sql_db_all) or print_error($sql_db_all, mysql_error(), 1);
	while ($data_db_all = $wrm_install->sql_fetchrow($result_db_all,true))
	{
		//show all TABLES
		$sql_db_name_values[] = $data_db_all['Database'];
	}
	
	//add create db
	$sql_db_name_values[] = " - ".$wrm_install_lang['create_db']." - ";
	$wrm_install->sql_close();
	
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "install.php?step=4",
			"headtitle" => $wrm_install_lang['headtitle'],
			"wrm_db_name_text" => $wrm_install_lang['step2dbname'],
			"wrm_create_db_text" => $wrm_install_lang['step2_create_db'],
			"wrm_create_db_value" => $wrm_create_db_value,
			"wrm_db_tableprefix_text" => $wrm_install_lang['step2WRMtableprefix'],
			"wrm_db_tableprefix_value" => $wrm_db_tableprefix_value,
			"wrm_db_tableprefix_default_text" => "(".$wrm_install_lang['default'].":".' "wrm_" )',
			"sql_db_name_values" => $sql_db_name_values,
			"sql_db_name_selected" => $sql_db_name_selected,
			"wrm_db_create_name" => $wrm_install_lang['none'],
			"wrm_db_server_hostname" => $wrm_db_server_hostname,
			"wrm_db_username" => $wrm_db_username,
			"wrm_db_password" => $wrm_db_password,		
			"error_msg" => $error_msg,
		
			"bd_submit" => $wrm_install_lang['bd_submit'],
		)
	);

	$smarty->display("step3.tpl.html");
	include ("includes/page_footer.php");
}

/**
 * --------------------
 * Step 4
 *  create datebase
 *	write wrm configfile
 * ---------------------
 * */
else if($step == 4)
{
	$wrm_db_server_hostname = $_POST['wrm_db_server_hostname'];
	$wrm_db_username = $_POST['wrm_db_username'];
	$wrm_db_password = $_POST['wrm_db_password'];
	
	$wrm_db_name = $_POST['wrm_db_create_name'];

	$wrm_db_tableprefix = $_POST['wrm_db_tableprefix'];
	
	$wrm_config_writeable = FALSE;
	$FOUNDERROR_Database = FALSE;
	
	if ( $_POST['sql_db_list_name'] != " - ".$wrm_install_lang['create_db']." - ")
	{
		$wrm_db_name = $_POST['sql_db_list_name'];
		$wrm_install = &new sql_db($wrm_db_server_hostname, $wrm_db_username, $wrm_db_password, $wrm_db_name);
	}
	else
	{
		//load all DATABASES name in a array ($sql_all_dbname)
		$sql_db_name_values = array();
		$Database_Exist = FALSE;
		$sql_db_all = "SHOW DATABASES";
	
		$result_db_all = $wrm_install->sql_query($sql_db_all) or print_error($sql_db_all, mysql_error(), 1);
		while ($data_db_all = $wrm_install->sql_fetchrow($result_db_all,true))
		{
			//cmp if select db ($wrm_db_name) in/on Server exist
			if ($wrm_db_name == $data_db_all['Database'])
			{
				$Database_Exist = TRUE;
			}
		}
		
		if ($Database_Exist != TRUE)
		{
			$wrm_install = &new sql_db($wrm_db_server_hostname, $wrm_db_username, $wrm_db_password, "");
			$sql = "CREATE DATABASE ".$wrm_db_name;
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error() ,1);
			//echo ;
		}
		else
		{
			$wrm_install->sql_close();
			header("Location: install.php?step=3&db_exist=1");
		}
	}
	
	if(!$wrm_install->db_connect_id)
	{
		$FOUNDERROR_Database = TRUE;
	}

	$wrm_install->sql_close();

	if ($FOUNDERROR_Database == FALSE) 
	{
		$wrm_config_writeable = write_wrm_configfile($wrm_db_name, $wrm_db_server_hostname, $wrm_db_username, $wrm_db_password, $wrm_db_tableprefix);
	
		//writeable 
		if ($wrm_config_writeable == TRUE)
		{
			//go to next step
			header("Location: install.php?step=5");
		}
		//config FILE ist NOT writeable
		else
		{
			header("Location: install.php?step=1");
		}
	}

	if ($FOUNDERROR_Database == TRUE)
	{
		header("Location: install.php?step=3&error_db=1");
	}
}
/**
 * --------------------
 * Step 5
 *
 * test: if selected db, are wrm table include/exist
 * ---------------------
 * */
else if($step == 5)
{

	include_once($wrm_config_file);
	include_once("install_settings.php");

	$wrm_install = &new sql_db($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass'], $phpraid_config['db_name']);
	
	$foundtable = FALSE;
	
	//load all DATABASES name in a array ($sql_all_dbname)
	$result_list_tables = array();
	$sql_tables = "SHOW TABLES FROM ".$phpraid_config['db_name'];
	//echo $sql_tables;
	$result_db_all = $wrm_install->sql_query($sql_tables) or print_error($sql_tables, mysql_error(), 1);
	while ($db_table_name = $wrm_install->sql_fetchrow($result_db_all,true))
	{
		//show all TABLES
		$result_list_tables[] = $db_table_name['Database'];
	}
	
	for($x=0; $x < count($result_list_tables)-1; $x++)
	{
			for($i=0; $i < count($result_list_tables)-1; $i++)
			{
				if( $result_list_tables[$x] == $wrm_tables[$i] )
				{
					$foundtable = TRUE;
				}
			}
	}
	
	$wrm_install->sql_close();

	if($foundtable == TRUE)
	{
		include ("includes/page_header.php");
		$smarty->assign(
			array(
				"form_action_bd_next" => "install.php?step=6",
				"form_action_bd_back" => "install.php?step=3",
	
				"error_found_table_titel" => $wrm_install_lang['error_found_table_titel'],
				"error_found_table_bd_back_text" => $wrm_install_lang['error_found_table_bd_back'],
				"error_found_table_bd_cont_text" => $wrm_install_lang['error_found_table_bd_cont'],
			
				"bd_back" => $wrm_install_lang['bd_back'],
				"bd_submit" => $wrm_install_lang['bd_submit'],
			)
		);
	
		$smarty->display("step5.tpl.html");
		include ("includes/page_footer.php");

	}
	else
	{
		header("Location: install.php?step=6");
	}
}

/**
 * --------------------
 * Step 6
 *
 * insert schema(=tables), in wrm db
 * ---------------------
 * */
else if($step == 6)
{
	include($wrm_config_file);
	include("install_settings.php");


	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);

	//install schema
	if(!$fd = fopen('database_schema/install/install_schema.sql', 'r'))
	die('<font color=red>'.$wrm_install_lang['step3errorschema'].'.</font>');

	if ($fd) {
		while (!feof($fd)) {
			$line = fgetc($fd);
			$sql .= $line;

			if($line == ';')
			{
				$sql = substr(str_replace('`wrm_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
				$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	$wrm_install->sql_close();
	header("Location: install.php?step=7");
}

/**
 * --------------------
 * Step 7
 *
 * fill, wrm db, with default values
 * ---------------------
 * */
else if($step == 7)
{
	include($wrm_config_file);
	include("install_settings.php");

	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	//insert (default) values
	if(!$fd = fopen('database_schema/install/insert_values.sql', 'r'))
	die('<font color=red>'.$wrm_install_lang['step3errorschema'].'.</font>');

	if ($fd) {
		while (!feof($fd)) {
			$line = fgetc($fd);
			$sql .= $line;

			if($line == ';')
			{
				$sql = substr(str_replace('`wrm_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
				$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	$wrm_install->sql_close();
	header("Location: install.php?step=8");
	exit();

}

/**
 * --------------------
 * Step 8
 *
 * install Collation on wrm tablle @ MySQL
 * Run the alter_tables.sql for setting Character Set and Collation if MySQL version > 4.1.0
 * ---------------------
 * */
else if($step == 8)
{
	include($wrm_config_file);
	include("install_settings.php");

	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$gd = get_mysql_version_from_phpinfo();
	if ($gd >= "4.1.0")
	{
		include("install_settings.php");

		for ($i=0; $i <count($wrm_tables); $i++)
		{
			$sql = "ALTER TABLE `".$phpraid_config['db_prefix'].$wrm_tables[$i]."` DEFAULT CHARACTER SET 'UTF8' COLLATE=utf8_bin";
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		}
	}

	$wrm_install->sql_close();
	header("Location: install.php?step=9");
	exit();
}



/**
 * --------------------
 * Step 9
 *
 * jump 2 bridge installion at/in "install_bridges.php"
 * ---------------------
 * */
else if($step == 9)
{
	header("Location: install_bridges.php?step=0");
}

/**
 * --------------------
 * Step 10
 *
 * ---------------------
 * */
else if($step == 10)
{

}

/**
 * --------------------
 * Step done
 * 
 * only for dynamic default values
 * ---------------------
 * */
else if($step === "done")
{
	include ($wrm_config_file);
	
	//insert default values
	$wrmserver = 'http://'.$_SERVER['SERVER_NAME'];
	$wrmserverfile = str_replace("/install/install.php","",$wrmserver. $_SERVER['PHP_SELF']);
	
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$sql = "SELECT * FROM " . $phpraid_config['db_prefix']. "config WHERE config_name = 'header_link'";
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	if($wrm_install->sql_numrows($result) == 0)
	{
		$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('header_link','$wrmserver')";
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('rss_site_url', '$wrmserverfile')";
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('rss_export_url', '$wrmserverfile')";
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	else{
		$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserver' WHERE config_name='header_link'";
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserverfile' WHERE config_name='rss_site_url'";
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserverfile' WHERE config_name='rss_export_url'";
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);

	}
	$wrm_install->sql_close();
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			//"form_action" => "install.php?step=".$step,
			"headtitle" => $wrm_install_lang['stepdonefinished'],
			"donesetupcomplete_text" => $wrm_install_lang['stepdonesetupcomplete'],
			"doneremovedir_text" => $wrm_install_lang['stepdoneremovedir'],
		
		)
	);

	$smarty->display("done.tpl.html");
	include ("includes/page_footer.php");
}

?>
