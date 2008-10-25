<?php
class phpbb
{

	var $db_user_id,$db_group_id,$db_user_name,$db_user_password,$db_table_user_name,$db_table_group_name;
	var $auth_user_class_text,$auth_alt_user_class_text;
	var $db_table_allgroups,$db_allgroups_id,$db_allgroups_name;
	var $configfile_name; 

	var $table_prefix,$DB_host,$DB_name,$DB_admin_user_name,$DB_admin_user_password;

	var $authshortname = "phpbb"; //for langfile

	function phpbb()
	{
		$this->table_prefix = "";
		$this->DB_host = "";
		$this->DB_name = "";
		$this->DB_admin_user_name = "";
		$this->DB_admin_user_password = "";
	}
	
	function init($table_prefix, $version = 3)
	{
		$this->configfile_name = "config.php";
		$this->table_prefix = $table_prefix;
		
		//phpbb2
		if ($version == 2)
		{
			/*********************************************** 
			 * Table and Column Names - change per CMS.
			 ***********************************************/
			// Column Name for the ID field for the User.
			$db_user_id = "user_id";
			// Column Name for the ID field for the Group the User belongs to.
			$db_group_id = "group_id";
			// Column Name for the UserName field.
			$db_user_name = "username";
			// Column Name for the User's E-Mail Address
			$db_user_email = "user_email";
			// Column Name for the User's Password
			$db_user_password = "user_password";
			
			$db_table_user_name = "users";
			$db_table_group_name = "user_group"; //only for cross table
		
			$this->auth_user_class_text ='phpBB_auth_user_class';
			$this->auth_alt_user_class_text ='phpBB_alt_auth_user_class';
			
			// Table Name were save all  Groups/Class Infos
			$db_table_allgroups = "groups";
			// Column Name for the ID field for the Group/Class.
			$db_allgroups_id = "group_id";
			// Column Name for the Groups/Class Name field.
			$db_allgroups_name = "group_name";
		}
		
		//phpbb3
		else if ($version == 3)
		{
			/*********************************************** 
			 * Table and Column Names - change per CMS.
			 ***********************************************/
			// Column Name for the ID field for the User.
			$this->db_user_id = "user_id";
			// Column Name for the ID field for the Group the User belongs to.
			$this->db_group_id = "group_id";
			// Column Name for the UserName field.
			$this->db_user_name = "username_clean";
			// Column Name for the User's E-Mail Address
			$this->db_user_email = "user_email";
			// Column Name for the User's Password
			$this->db_user_password = "user_password";
			
			$this->db_table_user_name = "users";
			$this->db_table_group_name = "user_group"; //only for cross table
						
			$this->auth_user_class_text ='phpBB_auth_user_class';
			$this->auth_alt_user_class_text ='phpBB_alt_auth_user_class';
			
			// Table Name were save all  Groups/Class Infos
			$this->db_table_allgroups = "groups";
			// Column Name for the ID field for the Group/Class.
			$this->db_allgroups_id = "group_id";
			// Column Name for the Groups/Class Name field.
			$this->db_allgroups_name = "group_name";
		}
	}

	function get_version_nr($root_path)
	{
		if(is_file($root_path.'extension.inc'))
		{
			return (2);
		}
		else {
			if(!is_file('../auth/auth_phpbb3.php'))
			{
				echo '<font color=red>'.$localstr['step5phpBBsub2failfindautfile'].'<br>';
				echo $localstr['step5phpBBsub2faildownautfile'].'</font>';
				die();
			}
			return (3);
		}
		
		return (-1);
	}
	
	function load_configfile($root_path)
	{
		if(is_file($root_path.$this->configfile_name))
		{

			require($root_path.$this->configfile_name);
	
			$this->table_prefix = $table_prefix;
			$this->DB_host = $dbhost;
			$this->DB_name = $dbname;
			
			$this->DB_admin_user_name = $dbuser;
			$this->DB_admin_user_password = $dbpasswd;
			
			return 1;
		}
		else
			//file not exist
			return -1;
	}	

/***********************************************************************************************/
	function set_table_prefix($new_table_prefix)
	{
		$this->table_prefix = $new_table_prefix;
	}

	function get_array_users($orderby = "name", $where = "email", $username = "")
	{
		$array_user = array();
		
		$linkDB = mysql_connect($this->DB_host, $this->DB_admin_user_name, $this->DB_admin_user_password);

		if (!$linkDB) {
			echo $localstr['step5'.$this->authshortname.'failcon'.$this->authshortname].'<br/>';
			exit;
		}
		mysql_select_db($this->DB_name);
		
		$sql = 	"SELECT " . $this->db_user_name . " , ". $this->db_user_email . " , " . $this->db_user_id .
				" FROM " . 	$this->table_prefix . $this->db_table_user_name ;
				" WHERE ";

		if ($where == "email")
			$sql .= $this->db_user_email . " <> ''";
		else
			$sql .= $this->db_user_name ." ='".$username."'";
		
		$sql .=	" ORDER BY ";

		if ($orderby == "name")
			$sql .= $this->db_user_name;
		else
			$sql .= $this->db_user_id;
			
	
		$result = mysql_query($sql) or die($localstr['step5'.$this->authshortname.'sub3errorretusername'] . mysql_error());
		while ($data = mysql_fetch_assoc($result))
		{
			array_push($array_user,
				array(
					'user_name'=>$data[$this->db_user_name],
					'user_email'=>$data[$this->db_user_email],
					'user_id'=>$data[$this->db_user_id]
				)
			);
	
		}
		mysql_close($linkDB);
		
		return $array_user;
	}
	
	function get_array_groups()
	{
		$array_groups = array();
		
		$linkDB = mysql_connect($this->DB_host, $this->DB_admin_user_name, $this->DB_admin_user_password);

		if (!$linkDB) {
			echo $localstr['step5'.$this->authshortname.'failcon'.$this->authshortname].'<br/>';
			exit;
		}
		mysql_select_db($this->DB_name);
		
		$sql = 	"SELECT " . $this->db_allgroups_id . " , ". $this->db_allgroups_name .
				" FROM " . 	$this->table_prefix . $this->db_table_allgroups .
				" ORDER BY " . $this->db_allgroups_id;
	
		$result = mysql_query($sql) or die($localstr['step5'.$this->authshortname.'sub3errorretusergroup'] . mysql_error());
		while ($data = mysql_fetch_assoc($result))
		{
			array_push($array_groups,
				array(
					'groups_id'=>$data[$this->db_allgroups_id],
					'groups_name'=>$data[$this->db_allgroups_name]
				)
			);
	
		}
		mysql_close($linkDB);
		
		return $array_groups;
	}
}
?>