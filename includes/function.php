<?php

/**
 * write the WRM Config File "../config.php"
 *
 * @param var $wrm_db_name
 * @param var $wrm_db_server_hostname
 * @param var $wrm_db_username
 * @param var $wrm_db_password
 * @param var $wrm_db_tableprefix
 * @param var $wrm_db_type
 * @param var $eqdkp_db_name
 * @param var $eqdkp_db_host
 * @param var $eqdkp_db_user
 * @param var $eqdkp_db_pass
 * @param var $eqdkp_db_prefix
 * @return boolean 
 */
function write_wrm_configfile($wrm_db_name,$wrm_db_server_hostname,$wrm_db_username,$wrm_db_password,$wrm_db_tableprefix,$wrm_db_type="mysql",$eqdkp_db_name = "",$eqdkp_db_host = "",$eqdkp_db_user = "",$eqdkp_db_pass = "",$eqdkp_db_prefix = "")
{
	global $wrm_config_file;
	include("../version.php");
	/**
	 * write config file (config.php)
	 */
	$output  = "<?php\n";
	$output .= "/*\n";
	$output .= "#**********************************************#\n";
	$output .= "#                                              #\n";
	$output .= "#     auto-generated configuration file        #\n";
	$output .= "#     WoW Raid Manager ".$version."                   #\n";
	$output .= "#     date: ".date("Y-m-d - H:i:s")."              #\n";
	$output .= "#   Do not change anything in this file!       #\n";
	$output .= "#                                              #\n";
	$output .= "#**********************************************#\n";
 	$output .= "*/\n\n";
	$output .= "global ".'$phpraid_config'.";\n";
	$output .= '$phpraid_config[\'db_name\']'." = '$wrm_db_name';\n";
	$output .= '$phpraid_config[\'db_host\']'." = '$wrm_db_server_hostname';\n";
	$output .= '$phpraid_config[\'db_user\']'." = '$wrm_db_username';\n";
	$output .= '$phpraid_config[\'db_pass\']'." = '$wrm_db_password';\n";
	$output .= '$phpraid_config[\'db_prefix\']'." = '$wrm_db_tableprefix';\n";
	$output .= '$phpraid_config[\'db_type\']'." = '$wrm_db_type';\n";
	$output .= '$phpraid_config[\'eqdkp_db_name\']'." = '$eqdkp_db_name';\n";
	$output .= '$phpraid_config[\'eqdkp_db_host\']'." = '$eqdkp_db_host';\n";
	$output .= '$phpraid_config[\'eqdkp_db_user\']'." = '$eqdkp_db_user';\n";
	$output .= '$phpraid_config[\'eqdkp_db_pass\']'." = '$eqdkp_db_pass';\n";
	$output .= '$phpraid_config[\'eqdkp_db_prefix\']'." = '$eqdkp_db_prefix';\n";
	$output .= "?>\n";
	
	$fd = fopen($wrm_config_file,'w+');
	if (!$fd)
	{
		echo "can not write this file: ". $wrm_config_file."<br>";
		fclose($fd);
		return (FALSE);
	}
	else
	{
		fwrite($fd, $output);
		fclose($fd);

		@chmod($wrm_config_file,0777);
		
		return (TRUE);
	}
}

/**
 * this is a copy from the function in includes/functions.php
 *
 * @param unknown_type $value
 * @param unknown_type $nullify
 * @param unknown_type $conn
 * @return unknown
 */
function quote_smart($value = "", $nullify = false, $conn = null)
{
	//reset default if second parameter is skipped
	$nullify = ($nullify === null) ? (false) : ($nullify);
	//undo slashes for poorly configured servers
	$value = (get_magic_quotes_gpc()) ? (stripslashes($value)) : ($value);
	//check for null/unset/empty strings (takes advantage of short-circuit evals to avoid a warning)
	if ((!isset($value)) || (is_null($value)) || ($value === ""))
	{
		$value = ($nullify) ? ("NULL") : ("''");
	}
	else
	{
		if (is_string($value))
		{
			//value is a string and should be quoted; determine best method based on available extensions
			if (function_exists('mysql_real_escape_string'))
			{
				$value = "'" . (((isset($conn)) && (is_resource($conn))) ? (mysql_real_escape_string($value, $conn)) : (mysql_real_escape_string($value))) . "'";
			}
			else
			{
				$value = "'" . mysql_escape_string($value) . "'";
			}
		}
		else
		{
			//value is not a string; if not numeric, bail with error
			$value = (is_numeric($value)) ? ($value) : ("'ERROR: unhandled datatype in quote_smart'");
		}
	}
	return $value;
}

function print_error($type, $error, $die) {
	global $wrm_install_lang, $phpraid_config;

	$errorMsg = '<html><link rel="stylesheet" type="text/css" href="templates/style/stylesheet.css"><body>';
	$errorMsg .= '<div align="center">'.$wrm_install_lang['print_error_msg_begin'];

	if($die == 1)
		$errorMsg .= $wrm_install_lang['print_error_critical'];
	else
		$errorMsg .= $wrm_install_lang['print_error_minor'];

	$errorMsg .= '<br><br><b>'.$wrm_install_lang['print_error_page'].':</b> ' . $_SERVER['PHP_SELF'];
	$errorMsg .= '<br><br><b>'.$wrm_install_lang['print_error_query'].':</b> ' . $type;
	$errorMsg .= '<br><br><b>'.$wrm_install_lang['print_error_details'].':</b> ' . $error;
	$errorMsg .= '<br><br><b>'.$wrm_install_lang['print_error_msg_end'].'</b></div></body></html>';
	$errorTitle = $wrm_install_lang['print_error_title'];

	echo '<div align="center"><div class="errorHeader" style="width:600px">'.$errorTitle .'</div>';
	echo '<div class="errorBody" style="width:600px">'.$errorMsg.'</div>';

	if($die == 1)
		exit;
}

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

//copy from \includes\functions.php
// Reverses database sanitization by removing escape backslashes
// and decoding html entities.
function desanitize($array) {
  $retarr_keys = array_keys($array);
  $retarr_values = array_values($array);
  
  for ($i = 0; $i < count($retarr_keys) - 1; $i++)
  {
  	if (is_string($retarr_values[$i]))
  	{
		$retarr_values[$i] = stripslashes($retarr_values[$i]);
		$retarr_values[$i] = htmlspecialchars_decode($retarr_values[$i]);
  	}

  	$array[$retarr_keys[$i]] = $retarr_values[$i];
  }

  return $array;
}

/***
 *  Get Array with all Langfiles
 *  * @param BOOL $Suffix
 */
function get_language_filename($Suffix = FALSE)
{
	$lang_dir = 'language';
	$dh = opendir($lang_dir);
	while($filename = readdir($dh))
	{
		$filename = substr($filename, 7);//cut from position 7 to filename.lenght end
		$files[] = str_replace('.php','',$filename);
	}

	sort($files);
	array_shift($files);
	array_shift($files);
	return ($files);
}

?>