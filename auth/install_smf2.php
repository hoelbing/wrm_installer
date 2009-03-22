<?php

//(short)Name from the BB/CMS
$bridge_type_name = "smf2";

$bridge_setting_value = array(

	'auth_type_name' => $bridge_type_name,
	
	/*********************************************** 
	 * Table and Column Names - change per CMS.
	 ***********************************************/
	// Column Name for the ID field for the User.
	'db_user_id' => 'id_member',
	// Column Name for the ID field for the Group the User belongs to.
	'db_group_id' => "id_group",
	// Column Name for the UserName field.
	'db_user_name' => "member_name",
	//filter: for empty name, bots
	'db_user_name_filter' => " ORDER BY member_name",
	// Column Name for the User's E-Mail Address
	'db_user_email' => "email_address",
	// Column Name for the User's Password
	'db_user_password' => "passwd",
	
	'db_table_user_name' => "members",
	'db_table_group_name' => "members", //only for cross table
				
	'auth_user_group_text' => $bridge_type_name . '_auth_user_group',
	'auth_alt_user_group_text' => $bridge_type_name. '_alt_auth_user_group',
	
	// Table Name were save all  Groups/Class Infos
	'db_table_allgroups' => "membergroups",
	// Column Name for the ID field for the Group/Class.
	'db_allgroups_id' => "id_group",
	// Column Name for the Groups/Class Name field.
	'db_allgroups_name' => "group_name",

	//Name from the Config File
	'DB_configfile_name' => "Settings.php",

	// ------------- Optional -------------

	//bridge Major Version
	$bridge_major_version => 2, //only the first nr; 
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
			'DB_host' => $db_server,
			'DB_name' => $db_name,
			'DB_table_prefix' => $db_prefix,
			'DB_admin_user_name' => $db_user,
			'DB_admin_user_password' => $db_passwd,
		);
}

?>