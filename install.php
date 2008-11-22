<?php

/*-------------------------------*/
//lang strg
$localstr['step2_create_db'] = "Create Database?";
/*-------------------------------*/

/**
 * note @ me
 * sql: show columns from TABLE -> return a array with all columnsname
 */

/**
 * todo
 * step 3 (found table): insert link,question @ user (overwrite or other prefix)
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

include('language/locale-'.$lang.'.php');

/**
 * This is the path to the WRM Config File
 */
$wrm_config_file = "../config.php";

$phpversion=(int)(str_replace(".","",phpversion()));

/**
 * Check for a directory, if the passed path is a directory create a temp file as path
 *  and try to open, otherwise just try to open that file for writing.
 * Is Writeable function is bugged beyond belief, it has issues with ACL and Group accesses, use this instead.
 * will work in despite of Windows ACLs bug.
 * NOTE: use a trailing slash for folders!!!
 * see http://bugs.php.net/bug.php?id=27609
 * see http://bugs.php.net/bug.php?id=30931
 *
 * @param string $path
 * @return boolean
 */
function is__writeable($path)
{
	$checkpath = $path;

	if ($path{strlen($path)-1}=='/')
	$checkpath = $path.uniqid(mt_rand()).'.tmp';

	if (!($f = @fopen($checkpath, 'a+')))
	return false;

	fclose($f);
	if ($checkpath != $path)
	unlink($checkpath);
	return true;
}

/**
 * get mysql version from phpinfo()
 *
 * @return boolean
 */
function get_mysql_version_from_phpinfo()
{
	ob_start();
	phpinfo(INFO_MODULES);
	$info = ob_get_contents();
	ob_end_clean();
	$info = stristr($info, 'Client API version');
	preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $info, $match);
	$gd = $match[0];

	return $gd;
}


/**
 * --------------------
 * Step 0
 *
 * check: if config.php file available
 * yes -> test database connection -> open upgrade.php 
 * no -> jump to step1 (installation)
 * ---------------------
 * */

if($step == 0)
{
	if(is_file($wrm_config_file))
	{
		include($wrm_config_file);
			
		$FOUNDERROR = FALSE;

		// database connection
		$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
		if(!$linkWRM)
		{
			$FOUNDERROR = TRUE;
		}
		else {
			if(!@mysql_select_db($phpraid_config['db_name'],$linkWRM))
			{
				$FOUNDERROR = TRUE;
			}
		}
		
		@mysql_close($linkWRM);
		
		if ($FOUNDERROR == FALSE)
		{
			//upgrade now
			header("Location: upgrade.php");
			exit;
		}
	}
	//echo $phpraid_config['db_host'].$FOUNDERROR;
	header("Location: install.php?step=1");
}

/**
 * --------------------
 * Step 1
 * ---------------------
 * */

if($step == 1) {
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
			$magic_quotes_sybase_value = $localstr['step0_nonactive'];
		}
		else
		{
			$magic_quotes_sybase_bgcolor = "green";
			$magic_quotes_sybase_value = $localstr['step0_active'];
		}

		// NOTE: BE CAREFUL WITH IS__WRITEABLE, that is NOT the built in is_writeable function. (See Double Underscore)
		if (is_file($wrm_config_file))
		{
			if(!is__writeable($wrm_config_file))
			{
				$writeable_config_bgcolor = "red";
				$writeable_config_value = $localstr['no'];
			}
			else
			{
				$writeable_config_bgcolor = "green";
				$writeable_config_value = $localstr['yes'];
			}
		}
		
		include ("includes/page_header.php");
		$smarty->assign(
			array(
					"form_action" => "install.php?step=1",
					//table
					"headtitle" => $localstr['headtitle'],
					"property" => $localstr['step0_property'],
					"required" => $localstr['step0_required'],
					"exist" => $localstr['step0_exist'],
					"system_requirements" => $localstr['step0_system_requirements'],
					"phpversion_text" => $localstr['step0_phpversion_text'],
					"phpversion_value" => phpversion(),
					"phpversion_bgcolor" => $phpversion_bgcolor,
					"mysqlversion_text" => $localstr['step0_mysqlversion'],
					"mysqlversion_value" => $gd,
					"mysqlversion_bgcolor" => $mysqlversion_bgcolor,
					"upload_max_filesize_value" => get_cfg_var("upload_max_filesize"),
					"upload_max_filesize_bgcolor" => $upload_max_filesize_bgcolor,
					"magic_quotes_sybase_value" => $magic_quotes_sybase_value,
					"magic_quotes_sybase_bgcolor" => $magic_quotes_sybase_bgcolor,
					"nonactive" => $localstr['step0_nonactive'],
			
					"writeable_config_text" => $localstr['step0_writeable_config'],
					"writeable_config_value" => $writeable_config_value,
					"yes" => $localstr['yes'],
					"writeable_config_bgcolor" => $writeable_config_bgcolor,
			
					"bd_submit" => $localstr['bd_submit'],
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
if($step == 2) {

	// If the config file already exists and has something in it, we'll use it.
	if(!isset($_POST['submit']))
	{

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

/**
 * show errors
 * &erro_con=1&error_db=1
 */
		$error_msg = "";

		if ( isset($_POST['erro_con']) /*and ( $_POST['erro_con'] == 1 )*/ )
			$error_msg .= "Error connecting to Server (Servername or Username or Password incorrect) <br/>";//. ;

		if ( isset($_POST['error_db']) /*and ($_POST['error_db'] == 1 )*/ )
			$error_msg .= $localstr['step3errordbcon'];

		if ($error_msg != "")
		{
			$error_msg .= "<br/>".$localstr['hittingsubmit'];
			echo $error_msg;
		}
		else
		{
			echo $error_msg;
		}
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
				"form_action" => "install.php?step=".$step,
				"headtitle" => $localstr['headtitle'],
				"wrm_db_name_text" => $localstr['step2dbname'],
				"wrm_db_name_value" => $wrm_db_name_value,
				"wrm_create_db_text" => $localstr['step2_create_db'],
				"wrm_create_db_value" => $wrm_create_db_value,
				"wrm_db_server_hostname_text" => $localstr['step2dbserverhostname'],
				"wrm_db_server_hostname_value" => $wrm_db_server_hostname_value,
				"wrm_db_username_text" => $localstr['step2dbserverusername'],
				"wrm_db_username_value" => $wrm_db_username_value,
				"wrm_db_password_text" => $localstr['step2dbserverpwd'],
				"wrm_db_password_value" => $wrm_db_password_value,
				"wrm_db_tableprefix_text" => $localstr['step2WRMtableprefix'],
				"wrm_db_tableprefix_value" => $wrm_db_tableprefix_value,
				"error_msg" => $error_msg,
			
				"bd_submit" => $localstr['bd_submit'],
			)
		);
	
		$smarty->display("step2.tpl.html");
		include ("includes/page_footer.php");
		
	}
	if(isset($_POST['submit']))
	{
		$wrm_db_name = $_POST['wrm_db_name'];
		$wrm_create_db = $_POST['wrm_create_db'];
		$wrm_db_server_hostname = $_POST['wrm_db_server_hostname'];
		$wrm_db_username = $_POST['wrm_db_username'];
		$wrm_db_password = $_POST['wrm_db_password'];
		$wrm_db_tableprefix = $_POST['wrm_db_tableprefix'];

	/*	echo '<form  method="POST">';
		echo '<input type="hidden" name="wrm_db_name" value="'.$wrm_db_name.'" class="post">';
		echo '<input type="hidden" name="wrm_create_db" value="'.$wrm_create_db.'" class="post">';
		echo '<input type="hidden" name="wrm_db_server_hostname" value="'.$wrm_db_server_hostname.'" class="post">';
		echo '<input type="hidden" name="wrm_db_username" value="'.$wrm_db_username.'" class="post">';
		echo '<input type="hidden" name="wrm_db_password" value="'.$wrm_db_password.'" class="post">';
		echo '<input type="hidden" name="wrm_db_tableprefix" value="'.$wrm_db_tableprefix.'" class="post">';
		echo '</form>';
		*/
		
		$wrm_config_writeable = FALSE;
		$FOUNDERROR_Connection = FALSE;
		$FOUNDERROR_Database = FALSE;
		
		// database connection
		$linkWRM = @mysql_connect($wrm_db_server_hostname, $wrm_db_username, $wrm_db_password);
		if(!$linkWRM)
		{
			$FOUNDERROR_Connection = TRUE;
		}
		else {
			if(!@mysql_select_db($wrm_db_name,$linkWRM))
			{
				if ($wrm_create_db == true)
				{
					//test, creating
					//$dblist=@mysql_list_dbs($linkWRM);
					$sql = "Create Database ".$wrm_db_name;
					@mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
				}
				else
				$FOUNDERROR_Database = TRUE;
			}
			
			@mysql_close($linkWRM);
			
			if (($FOUNDERROR_Connection == FALSE) and ($FOUNDERROR_Database == FALSE))
			{
				include("includes/function.php");
				
				//check: if you can write the wrm config file
				$wrm_config_writeable = write_wrm_configfile($wrm_db_name,$wrm_db_server_hostname,$wrm_db_username,$wrm_db_password,$wrm_db_tableprefix);
				
				//writeable 
				if ($wrm_config_writeable == TRUE)
				{
					//go to next step
					header("Location: install.php?step=3");
				}
				//config FILE ist NOT writeable
				else
				{
					header("Location: install.php?step=1");
				}
			}
			//found error
			else
			{
				if (($FOUNDERROR_Connection == TRUE) and ($FOUNDERROR_Database == TRUE))
				{
					header("Location: install.php?step=2&erro_con&error_db");
				}
				if ($FOUNDERROR_Connection == TRUE)
				{
					header("Location: install.php?step=2&erro_con");
				}
				if ($FOUNDERROR_Database == TRUE)
				{
					header("Location: install.php?step=2&error_db");
				}
			}
		}
	}
}

/**
 * --------------------
 * Step 3
 *
 * test: if selected db, are wrm table include
 * ---------------------
 * */
if($step == 3)
{

	include($wrm_config_file);
	include("install_settings.php");

	$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name']);

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
	header("Location: install.php?step=4");
}

/**
 * --------------------
 * Step 4
 *
 * insert schema(=tables), in wrm db
 * ---------------------
 * */
if($step == 4)
{
	include($wrm_config_file);
	include("install_settings.php");

	$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name']);

	//install schema
	if(!$fd = fopen('database_schema/install/install_schema.sql', 'r'))
	die('<font color=red>'.$localstr['step3errorschema'].'.</font>');

	if ($fd) {
		while (!feof($fd)) {
			$line = fgetc($fd);
			$sql .= $line;

			if($line == ';')
			{
				$sql = substr(str_replace('`wrm_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
				@mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error()."<br/>sql:".$sql);
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	@mysql_close($linkWRM);
	header("Location: install.php?step=5");
}

/**
 * --------------------
 * Step 5
 *
 * fill, wrm db, with default values
 * ---------------------
 * */
if($step == 5)
{
	include($wrm_config_file);
	include("install_settings.php");

	$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name']);
	
	//insert (default) values
	if(!$fd = fopen('database_schema/install/insert_values.sql', 'r'))
	die('<font color=red>'.$localstr['step3errorschema'].'.</font>');

	if ($fd) {
		while (!feof($fd)) {
			$line = fgetc($fd);
			$sql .= $line;

			if($line == ';')
			{
				$sql = substr(str_replace('`wrm_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
				@mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error()."<br/>sql:".$sql);
				$sql = '';
			}
		}
		fclose($fd);
	}
	
	@mysql_close($linkWRM);
	header("Location: install.php?step=6");
	exit();

}

/**
 * --------------------
 * Step 6
 *
 * install Collation on wrm tablle @ MySQL
 * Run the alter_tables.sql for setting Character Set and Collation if MySQL version > 4.1.0
 * ---------------------
 * */
if($step == 6)
{
	include($wrm_config_file);
	include("install_settings.php");

	$linkWRM = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name']);
	
	$gd = get_mysql_version_from_phpinfo();
	if ($gd >= "4.1.0")
	{
		include("install_settings.php");

		for ($i=0; $i <count($wrm_tables); $i++)
		{
			$sql="ALTER TABLE `".$phpraid_config['db_prefix'].$wrm_tables[$i]."` DEFAULT CHARACTER SET 'UTF8' COLLATE=utf8_bin";
			@mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error()."<br/>sql:".$sql);
		}
	}

	@mysql_close($linkWRM);
	header("Location: install.php?step=7");
	exit();
}



/**
 * --------------------
 * Step 7
 *
 * jump 2 bridge installion at/in "install_bridges.php"
 * ---------------------
 * */
if($step == 7)
{
	header("Location: install_bridges.php?step=0");
}

/**
 * --------------------
 * Step 8
 *
 * ---------------------
 * */
if($step == 8)
{

}

/**
 * --------------------
 * Step done
 * 
 * only for dynamic default values
 * ---------------------
 * */
if($step == 'done')
{
		include ($wrm_config_file);
		
		//insert default values
		$wrmserver = 'http://'.$_SERVER['SERVER_NAME'];
		$wrmserverfile = str_replace("/install/install.php","",$wrmserver. $_SERVER['PHP_SELF']);
		
		$linkWRM = @mysql_connect($phpraid_config['db_host'],$phpraid_config['db_user'],$phpraid_config['db_pass']);
		@mysql_select_db($phpraid_config['db_name']);
		$sql = "SELECT * FROM " . $phpraid_config['db_prefix']. "config WHERE config_name = 'header_link'";
		$result =  @mysql_query($sql) or die("Error verifying " . mysql_error());
		if((@mysql_num_rows($result) == 0))
		{
			$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('header_link','$wrmserver')";
			@mysql_query($sql) or die("Error inserting " . mysql_error());
			$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('rss_site_url', '$wrmserverfile')";
			@mysql_query($sql) or die("Error inserting " . mysql_error());
			$sql = "INSERT INTO " .$phpraid_config['db_prefix'] ."config VALUES ('rss_export_url', '$wrmserverfile')";
			@mysql_query($sql) or die("Error inserting " . mysql_error());
		}
		else{
			$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserver' WHERE config_name='header_link'";
			@mysql_query($sql) or die("Error updating header_link in config table. " . mysql_error());
			$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserverfile' WHERE config_name='rss_site_url'";
			@mysql_query($sql) or die("Error updating header_link in config table. " . mysql_error());
			$sql = "UPDATE " .$phpraid_config['db_prefix'] ."config SET config_value='$wrmserverfile' WHERE config_name='rss_export_url'";
			@mysql_query($sql) or die("Error updating header_link in config table. " . mysql_error());
		}
		@mysql_close($linkWRM);
}

?>
