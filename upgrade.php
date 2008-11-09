<?php

/*if (!isset($_GET['step']))
$step = 0;
else
$step = $_GET['step'];
*/

$step = 1;

include 'includes/page_header.php';

$wrm_config_file = "../config.php";

/**
 * show current version
 * and install version
 */

if ($step=0)
{
	include($wrm_config_file);
	include("../version.php");
	
	$versions_nr_install = (int) $version;
	$versions_nr_current_wrm = "";
	
	$link = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_prefix'].$phpraid_config['db_name'],$link);
	
	$sql = "SELECT version_number ".$phpraid_config['db_prefix']."version";
	$result = @mysql_query($sql) or die(mysql_error());
	$data = @mysql_fetch_assoc($result);
	

	$versions_nr_current_wrm = (int) $data['max[version_number]'];
	
	if ($versions_nr_current_wrm < "400")
	{
		echo "pls upgrade to wrm 3.6.1 befor you repeat this installation";
	}
	if ($versions_nr_current_wrm == $versions_nr_install)
	{
/*		$smarty->assign("headtitle", $localstr['headtitle']);
		$smarty->assign("versions_nr_current_wrm", $versions_nr_current_wrm);
		$smarty->assign("versions_nr_install", $versions_nr_install);
		$smarty->display("update_show_vnr.tpl.html");
*/		echo "your wrm is up to date";
	}
	else if($versions_nr_current_wrm > $versions_nr_install)
	{
/*		$smarty->assign("error_msg_headtitle", " installation error");
 * 		$smarty->assign("error_msg", "your installation file is to old");
 * 		$smarty->display("error_msg.html");
*/		echo "your installation file is to old";
	}
	else
	{
		/**
		 * load all filenname, from dir 'database_schema/upgrade', in array $files
		 */
		$upgrade_dir = 'database_schema/upgrade';
		$dh = opendir($upgrade_dir);
		while(false != ($filename = readdir($dh)))
		{
			$filename = str_replace('.sql','',$filename);
			$files[] = $filename;
		}
		
		sort($files);
		array_shift($files);
		array_shift($files);

		mysql_select_db($phpraid_config['db_name']);
	}
	
	while ($versions_nr_current_wrm < $versions_nr_install)
	{
		$file_array_index = 0;
		for ($i=0; $i<count($files)-1;$i++)
		{
			if($files[$i]==$versions_nr_current_wrm)
			{
				$file_array_index=(int)$files[$i+1];
			}
		}
		
		//
		if(!$fd = fopen('database_schema/upgrade/'.$files[$file_array_index].'.sql', 'r'))
			die('<font color=red>'.$localstr['step3errorschema'].'.</font>');
	
		if ($fd) {
			while (!feof($fd)) {
				$line = fgetc($fd);
				$sql .= $line;
	
				if($line == ';')
				{
					$sql = substr(str_replace('`wrm_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
					mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
					$sql = '';
				}
			}
			fclose($fd);
		}		
		//----
		$sql = "SELECT version_number ".$phpraid_config['db_prefix']."version";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_assoc($result);
		$versions_nr_current_wrm = (int) $data['max[version_number]'];
	}

	include 'includes/page_footer.php';
	
}

?>
