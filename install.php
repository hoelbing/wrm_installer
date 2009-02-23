<?php

/*-------------------------------*/
//lang strg
$wrm_install_lang['step2_create_db'] = "Create Database?";
/*-------------------------------*/

/*
 * todo
 * sql layer
 * step 4: mysql_list_tables, mysql_tablename
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

include('language/locale-'.$lang.'.php');


include_once ("includes/db/db.php");
include_once ("includes/function.php");
/**
 * This is the path to the WRM Config File
 */
$wrm_config_file = "../config.php";

$phpversion = (int)(str_replace(".", "", phpversion()));


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
		if (get_cfg_var("upload_max_filesize") <= 0)
		{
			$upload_max_filesize_bgcolor = "red";
		}
		else
		{
			$upload_max_filesize_bgcolor = "green";
		}
		if (get_cfg_var("magic_quotes_sybase"))
		{
			$magic_quotes_sybase_bgcolor = "red";
			$magic_quotes_sybase_value = $wrm_install_lang['step0_nonactive'];
		}
		else
		{
			$magic_quotes_sybase_bgcolor = "green";
			$magic_quotes_sybase_value = $wrm_install_lang['step0_active'];
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
					"upload_max_filesize_value" => get_cfg_var("upload_max_filesize"),
					"upload_max_filesize_bgcolor" => $upload_max_filesize_bgcolor,
					"magic_quotes_sybase_value" => $magic_quotes_sybase_value,
					"magic_quotes_sybase_bgcolor" => $magic_quotes_sybase_bgcolor,
					"nonactive" => $wrm_install_lang['step0_nonactive'],
			
					"writeable_config_text" => $wrm_install_lang['step0_writeable_config'],
					"writeable_config_value" => $writeable_config_value,
					"yes" => $wrm_install_lang['yes'],
					"writeable_config_bgcolor" => $writeable_config_bgcolor,
			
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
 * show/set db settings
 * ---------------------
 * */
else if($step == 2) {
	$error_msg = "";

	if ( isset($_POST['erro_con']) /*and ( $_POST['erro_con'] == 1 )*/ )
		$error_msg .= "Error connecting to Server (Servername or Username or Password incorrect) <br/>";//. ;

	if ( isset($_POST['error_db']) /*and ($_POST['error_db'] == 1 )*/ )
		$error_msg .= $wrm_install_lang['step3errordbcon'];

	if ($error_msg != "")
	{
		$error_msg .= "<br/>".$wrm_install_lang['hittingsubmit'];
		//echo $error_msg;
	}

	if (isset($_POST['wrm_db_name']))
		$wrm_db_name_value = $_POST['wrm_db_name'];
	else
		$wrm_db_name_value_value = "";
		
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
		
	if (isset($_POST['wrm_db_tableprefix']))
		$wrm_db_tableprefix_value = $_POST['wrm_db_tableprefix'];
	else
		$wrm_db_tableprefix_value = "wrm_";

	if (isset($_POST['wrm_create_db']))
		$wrm_create_db_value = $_POST['wrm_create_db'];
	else
		$wrm_create_db_value = false;

	if(is_file($wrm_config_file))
	{
		include($wrm_config_file);
		
		if (isset($phpraid_config['db_name']))
		{
			$wrm_db_name_value = $phpraid_config['db_name'];
			$wrm_db_server_hostname_value = $phpraid_config['db_host'];
			$wrm_db_username_value = $phpraid_config['db_user'];
			$wrm_db_password_value = $phpraid_config['db_pass'];
			$wrm_db_tableprefix_value = $phpraid_config['db_prefix'];				
		}
	}
	 
	include ("includes/page_header.php");
	$smarty->assign(
		array(
			"form_action" => "install.php?step=3",
			"headtitle" => $wrm_install_lang['headtitle'],
			"wrm_db_name_text" => $wrm_install_lang['step2dbname'],
			"wrm_db_name_value" => $wrm_db_name_value,
			"wrm_create_db_text" => $wrm_install_lang['step2_create_db'],
			"wrm_create_db_value" => $wrm_create_db_value,
			"wrm_db_server_hostname_text" => $wrm_install_lang['step2dbserverhostname'],
			"wrm_db_server_hostname_value" => $wrm_db_server_hostname_value,
			"wrm_db_username_text" => $wrm_install_lang['step2dbserverusername'],
			"wrm_db_username_value" => $wrm_db_username_value,
			"wrm_db_password_text" => $wrm_install_lang['step2dbserverpwd'],
			"wrm_db_password_value" => $wrm_db_password_value,
			"wrm_db_tableprefix_text" => $wrm_install_lang['step2WRMtableprefix'],
			"wrm_db_tableprefix_value" => $wrm_db_tableprefix_value,
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
 * ---------------------
 * */
else if($step == 3)
{
	$wrm_db_name = $_POST['wrm_db_name'];
	$wrm_create_db = $_POST['wrm_create_db'];
	$wrm_db_server_hostname = $_POST['wrm_db_server_hostname'];
	$wrm_db_username = $_POST['wrm_db_username'];
	$wrm_db_password = $_POST['wrm_db_password'];
	$wrm_db_tableprefix = $_POST['wrm_db_tableprefix'];
	
	$wrm_config_writeable = FALSE;
	$FOUNDERROR_Connection = FALSE;
	$FOUNDERROR_Database = FALSE;
	
	$wrm_install = &new sql_db($wrm_db_server_hostname, $wrm_db_username, $wrm_db_password, $wrm_db_name);
	
	if(!$wrm_install->db_connect_id)
	{
		$FOUNDERROR_Database = TRUE;
		$FOUNDERROR_Connection = TRUE;
	}

	else
	{
		$wrm_install->sql_db($wrm_db_server_hostname,$wrm_db_username,$wrm_db_password,"");
		
		if(!$wrm_install->db_connect_id)
		{
			$FOUNDERROR_Database = TRUE;
			$FOUNDERROR_Connection = FALSE;
			
			if ($wrm_create_db == TRUE)
			{
				$sql = "Create Database ".$wrm_db_name;
				//@mysql_query($sql) or die($wrm_install_lang['step3errorsql'].' ' . mysql_error());
				$wrm_install->sql_query($sql) or print_error($sql, mysql_error(),1);
				$FOUNDERROR_Database = FALSE;
			}
		}
	}

	$wrm_install->sql_close();

	if ( ($FOUNDERROR_Database == FALSE) and ($FOUNDERROR_Connection == FALSE))
	{
		$wrm_config_writeable = write_wrm_configfile($wrm_db_name, $wrm_db_server_hostname, $wrm_db_username, $wrm_db_password, $wrm_db_tableprefix);
	
		//writeable 
		if ($wrm_config_writeable == TRUE)
		{
			//go to next step
			header("Location: install.php?step=4");
		}
		//config FILE ist NOT writeable
		else
		{
			header("Location: install.php?step=1");
		}
	}

	if (($FOUNDERROR_Connection == TRUE) and ($FOUNDERROR_Database == TRUE))
	{
		header("Location: install.php?step=2&erro_con=1&error_db=1");
	}
	if ($FOUNDERROR_Connection == TRUE)
	{
		header("Location: install.php?step=2&erro_con=1");
	}
	if ($FOUNDERROR_Database == TRUE)
	{
		header("Location: install.php?step=2&error_db=1");
	}
}
/**
 * --------------------
 * Step 4
 *
 * test: if selected db, are wrm table include
 * ---------------------
 * */
else if($step == 4)
{

	include($wrm_config_file);
	include("install_settings.php");

	//$db_raid = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);

	$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name'],$linkWRM);

	$foundtable = FALSE;
	$result = @mysql_list_tables($phpraid_config['db_name']);

	for($i=0; $i < @mysql_num_rows($result); $i++) {
		if(in_array(@mysql_tablename($result,$i),$wrm_tables)) {
			$foundtable = TRUE;
			break;
		}
	}

	if($foundtable == TRUE)
	{
		echo "found exist table";
		exit;
	}
	
	@mysql_close($linkWRM);
	//$db_raid->sql_close();
	header("Location: install.php?step=5");
}

/**
 * --------------------
 * Step 5
 *
 * insert schema(=tables), in wrm db
 * ---------------------
 * */
else if($step == 5)
{
	include($wrm_config_file);
	include("install_settings.php");

//	$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
//	@mysql_select_db($phpraid_config['db_name'],$linkWRM);

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
		//		@mysql_query($sql) or die($wrm_install_lang['step3errorsql'].' ' . mysql_error()."<br/>sql:".$sql);
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	$wrm_install->sql_close();
	//@mysql_close($linkWRM);
	header("Location: install.php?step=6");
}

/**
 * --------------------
 * Step 6
 *
 * fill, wrm db, with default values
 * ---------------------
 * */
else if($step == 6)
{
	include($wrm_config_file);
	include("install_settings.php");

	//$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	//@mysql_select_db($phpraid_config['db_name'],$linkWRM);
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
//				@mysql_query($sql) or die($wrm_install_lang['step3errorsql'].' ' . mysql_error()."<br/>sql:".$sql);
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	$wrm_install->sql_close();
	//@mysql_close($linkWRM);
	header("Location: install.php?step=7");
	exit();

}

/**
 * --------------------
 * Step 7
 *
 * install Collation on wrm tablle @ MySQL
 * Run the alter_tables.sql for setting Character Set and Collation if MySQL version > 4.1.0
 * ---------------------
 * */
else if($step == 7)
{
	include($wrm_config_file);
	include("install_settings.php");

	//$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	//@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$gd = get_mysql_version_from_phpinfo();
	if ($gd >= "4.1.0")
	{
		include("install_settings.php");

		for ($i=0; $i <count($wrm_tables); $i++)
		{
			$sql = "ALTER TABLE `".$phpraid_config['db_prefix'].$wrm_tables[$i]."` DEFAULT CHARACTER SET 'UTF8' COLLATE=utf8_bin";
			//@mysql_query($sql) or die($wrm_install_lang['step3errorsql'].' ' . mysql_error()."<br/>sql:".$sql);
			$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		}
	}

	$wrm_install->sql_close();
//	@mysql_close($linkWRM);
	header("Location: install.php?step=8");
	exit();
}



/**
 * --------------------
 * Step 8
 *
 * jump 2 bridge installion at/in "install_bridges.php"
 * ---------------------
 * */
else if($step == 8)
{
	header("Location: install_bridges.php?step=0");
}

/**
 * --------------------
 * Step 9
 *
 * ---------------------
 * */
else if($step == 9)
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
	
	//$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
	//@mysql_select_db($phpraid_config['db_name'],$linkWRM);
	$wrm_install = &new sql_db($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass'],$phpraid_config['db_name']);
	
	$sql = "SELECT * FROM " . $phpraid_config['db_prefix']. "config WHERE config_name = 'header_link'";
	$result = $wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	//$result =  @mysql_query($sql) or die("Error verifying " . mysql_error());
	//if((@mysql_num_rows($result) == 0))
	if($wrm_install->sql_numrows($result) == 0)
	{
		$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('header_link','$wrmserver')";
		//@mysql_query($sql) or die("Error inserting " . mysql_error());
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('rss_site_url', '$wrmserverfile')";
		//@mysql_query($sql) or die("Error inserting " . mysql_error());
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('rss_export_url', '$wrmserverfile')";
		//@mysql_query($sql) or die("Error inserting " . mysql_error());
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	else{
		$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserver' WHERE config_name='header_link'";
		//@mysql_query($sql) or die("Error updating header_link in config table. " . mysql_error());
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserverfile' WHERE config_name='rss_site_url'";
		//@mysql_query($sql) or die("Error updating header_link in config table. " . mysql_error());
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
		$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserverfile' WHERE config_name='rss_export_url'";
		//@mysql_query($sql) or die("Error updating header_link in config table. " . mysql_error());
		$wrm_install->sql_query($sql) or print_error($sql, mysql_error(), 1);
	}
	//@mysql_close($linkWRM);
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
