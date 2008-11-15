<?php
/*
*
* Upgrade file format x.x.x.sql
* eg: 4.0.0.sql
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

$wrm_config_file = "../config.php";
$upgrade_file_name = "upgrade.php";

/**
 * show current version
 * and install version
 */

if ($step==0)
{
	include($wrm_config_file);
	include("../version.php");
	
	$versions_nr_install = $version;
	$versions_nr_current_wrm = "";

	$link = @mysql_connect($phpraid_config['db_host'], $phpraid_config['db_user'], $phpraid_config['db_pass']);
	@mysql_select_db($phpraid_config['db_name'],$link);
	
	//get the last (max) version nr, from wrm db
	$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
	$result = @mysql_query($sql) or die(mysql_error());
	$data = @mysql_fetch_assoc($result);
	
	$versions_nr_current_wrm = $data['version_number'];

	/*if ((str_replace(".","",$versions_nr_current_wrm)) < "400")
	{
		//"your wrm version is to old, for upgrade"
		header("Location: .". $upgrade_file_name."?step=100");
	}*/
	if ($versions_nr_current_wrm == $versions_nr_install)
	{
		// "your wrm is up to date";
		header("Location: ". $upgrade_file_name."?step=101");
	}
	else if ((str_replace(".","",$versions_nr_current_wrm)) > (str_replace(".","",$versions_nr_install)))
	{
		// "your wrm version is newer as this installation file";
		header("Location: ". $upgrade_file_name."?step=102");
	}
	else
	{
		/*
		 * load all filenname, from dir 'database_schema/upgrade', in array $files
		 */
		//array with all filename from the upgrade dir.
		$files = array();
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

		while ((str_replace(".","",$versions_nr_current_wrm)) > (str_replace(".","",$versions_nr_install)))
		{
			$file_array_index = 0;
			for ($i=0; $i < count($files)-1; $i++)
			{
				if($files[$i] == $versions_nr_current_wrm)
				{
					$file_array_index = ((int)$i) + 1;
				}
			}

			if(!$fd = fopen('database_schema/upgrade/'.$files[$file_array_index].'.sql', 'r'))
				die('<font color=red>'.$localstr['step3errorschema'].'.</font>');
			
			if ($fd) {
				$sql = '';
				while (!feof($fd)) {
					$line = fgetc($fd);
					$sql .= $line;
		
					if($line == ';')
					{
						$sql = substr(str_replace('`wrm_','`' . $phpraid_config['db_prefix'], $sql), 0, -1);
						echo "<br>".$sql;
						@mysql_query($sql) or die($localstr['step3errorsql'].' ' . mysql_error());
						$sql = '';
					}
				}
				fclose($fd);
			}		
			//----
			$sql = "SELECT version_number FROM ".$phpraid_config['db_prefix']."version ORDER BY version_number DESC LIMIT 0,1";
			$result = @mysql_query($sql) or die(mysql_error());
			$data = @mysql_fetch_assoc($result);
			$versions_nr_current_wrm = $data['version_number'];
		}
	}	
}

/*---------error's--------------------*/
if ($step==100)
{
/*
	include ("includes/page_header.php");
	$smarty->assign("error_msg_headtitle", " install error");
	$smarty->assign("error_msg", "your wrm version is to old, for upgrade");
	$smarty->display("error_msg.html");
	include ("includes/page_footer.php");
 */
	echo "your wrm version is to old, for upgrade";
}

if ($step==101)
{
/*		
	include ("includes/page_header.php");
	$smarty->assign("headtitle", $localstr['headtitle']);
	$smarty->assign("versions_nr_current_wrm", $versions_nr_current_wrm);
	$smarty->assign("versions_nr_install", $versions_nr_install);
	$smarty->display("update_show_vnr.tpl.html");
	include ("includes/page_footer.php");
*/
	echo "your wrm is up to date";
}

if ($step==102)
{
/*
	$smarty->assign("error_msg_headtitle", " install error");
	$smarty->assign("error_msg", "your installation file is to old");
	$smarty->display("error_msg.html");
	include ("includes/page_footer.php");
*/		
	echo "your wrm version is newer as this installation file";
}

?>
