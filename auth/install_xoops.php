<?php

//(short)Name from the BB/CMS
$bridge_type_name = "xoops";

$bridge_setting_value = array(

	'auth_type_name' => $bridge_type_name,
	
	/*********************************************** 
	 * Table and Column Names - change per CMS.
	 ***********************************************/
	// Column Name for the ID field for the User.
	'db_user_id' => 'uid',
	// Column Name for the ID field for the Group the User belongs to.
	'db_group_id' => "groupid",
	// Column Name for the UserName field.
	'db_user_name' => "uname",
	//filter: for empty name, bots
	'db_user_name_filter' => " ORDER BY uname",
	// Column Name for the User's E-Mail Address
	'db_user_email' => "email",
	// Column Name for the User's Password
	'db_user_password' => "pass",
	
	'db_table_user_name' => "users",
	'db_table_group_name' => "groups_users_link", //only for cross table
				
	'auth_user_group_text' => $bridge_type_name . '_auth_user_group',
	'auth_alt_user_group_text' => $bridge_type_name. '_alt_auth_user_group',
	
	// Table Name were save all  Groups/Class Infos
	'db_table_allgroups' => "groups",
	// Column Name for the ID field for the Group/Class.
	'db_allgroups_id' => "groupid",
	// Column Name for the Groups/Class Name field.
	'db_allgroups_name' => "name",

	//Name from the Config File
	'DB_configfile_name' => "mainfile.php",
);

/**
 * read the config file and load in array with
 * all values
 */
if ($bridge_configload == true)
{
	include ($filepos);

	$bridge_configload_value =
		array(
			'DB_host' => XOOPS_DB_HOST,
			'DB_name' => XOOPS_DB_NAME,
			'DB_table_prefix' => XOOPS_DB_PREFIX,
			'DB_admin_user_name' => XOOPS_DB_USER,
			'DB_admin_user_password' => XOOPS_DB_PASS,
		);
}
?>