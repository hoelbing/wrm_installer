<?php


function get_bridge_setting()
{
	//(short)Name from the BB/CMS
	$auth_type_name = "SMF";

	return array(
	
		'auth_type_name' => $auth_type_name,
		
		/*********************************************** 
		 * Table and Column Names - change per CMS.
		 ***********************************************/
		// Column Name for the ID field for the User.
		'db_user_id' => 'ID_MEMBER',
		// Column Name for the ID field for the Group the User belongs to.
		'db_group_id' => "ID_GROUP",
		// Column Name for the UserName field.
		'db_user_name' => "memberName",
		// Column Name for the User's E-Mail Address
		'db_user_email' => "emailAddress",
		// Column Name for the User's Password
		'db_user_password' => "passwd",
		
		'db_table_user_name' => "members",
		'db_table_group_name' => "members", //only for cross table
					
		'auth_user_class_text' => $auth_type_name . '_auth_user_class',
		'auth_alt_user_class_text' => $auth_type_name. '_alt_auth_user_class',
		
		// Table Name were save all  Groups/Class Infos
		'db_table_allgroups' => "membergroups",
		// Column Name for the ID field for the Group/Class.
		'db_allgroups_id' => "ID_GROUP",
		// Column Name for the Groups/Class Name field.
		'db_allgroups_name' => "groupName",

		//Name from the Config File
		'DB_configfile_name' => "Settings.php",
	);
}

/**
 * read the config file and return array with
 * all values
 *
 * @param string $filepos
 * @return array()
 */
function get_bridge_config_value($filepos)
{
	include ($filepos);

	return
	(
		array(
			'DB_host' => $db_server,
			'DB_name' => $db_name,
			'DB_table_prefix' => $db_prefix,
			'DB_admin_user_name' => $db_user,
			'DB_admin_user_password' => $db_passwd,
		)
	);
}

?>