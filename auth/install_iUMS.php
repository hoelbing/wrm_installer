<?php


function get_bridge_setting()
{
	//(short)Name from the BB/CMS
	$auth_type_name = "iUMS";

	return array(
	
		'auth_type_name' => $auth_type_name,
		
		/*********************************************** 
		 * Table and Column Names - change per CMS.
		 ***********************************************/
		// Column Name for the ID field for the User.
		'db_user_id' => 'profile_id',
		// Column Name for the ID field for the Group the User belongs to.
		'db_group_id' => "",
		// Column Name for the UserName field.
		'db_user_name' => "username",
		// Column Name for the User's E-Mail Address
		'db_user_email' => "email",
		// Column Name for the User's Password
		'db_user_password' => "password",
		
		'db_table_user_name' => "",
		'db_table_group_name' => "", //only for cross table
					
		'auth_user_class_text' => "",//$auth_type_name . '_auth_user_class',
		'auth_alt_user_class_text' => "",// $auth_type_name. '_alt_auth_user_class',
		
		// Table Name were save all  Groups/Class Infos
		'db_table_allgroups' => "",
		// Column Name for the ID field for the Group/Class.
		'db_allgroups_id' => "",
		// Column Name for the Groups/Class Name field.
		'db_allgroups_name' => "",

		//Name from the Config File
		'DB_configfile_name' => "",
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
			'DB_host' => "",
			'DB_name' => "",
			'DB_table_prefix' => "",
			'DB_admin_user_name' => "",
			'DB_admin_user_password' => "",
		)
	);
}

?>