<?php

/**
 * write the WRM Config File "../config.php"
 *
 * @param var $wrm_db_name
 * @param var $wrm_db_server_hostname
 * @param var $wrm_db_username
 * @param var $wrm_db_password
 * @param var $wrm_db_tableprefix
 * @param var $eqdkp_db_name
 * @param var $eqdkp_db_host
 * @param var $eqdkp_db_user
 * @param var $eqdkp_db_pass
 * @param var $eqdkp_db_prefix
 * @return boolean 
 */
function write_wrm_configfile($wrm_db_name,$wrm_db_server_hostname,$wrm_db_username,$wrm_db_password,$wrm_db_tableprefix,$eqdkp_db_name = "",$eqdkp_db_host = "",$eqdkp_db_user = "",$eqdkp_db_pass = "",$eqdkp_db_prefix = "")
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

?>