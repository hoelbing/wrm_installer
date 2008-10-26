<?php

$auth_type_name = 'Xoops';
array_push($bridge,
	array(
	
		'auth_type_name' => $auth_type_name,
		
		/*********************************************** 
		 * Table and Column Names - change per CMS.
		 ***********************************************/
		// Column Name for the ID field for the User.
		'db_user_id' => 'uid',
		// Column Name for the ID field for the Group the User belongs to.
		'db_group_id' => "groupid",
		// Column Name for the UserName field.
		'db_user_name' => "uname",
		// Column Name for the User's E-Mail Address
		'db_user_email' => "email",
		// Column Name for the User's Password
		'db_user_password' => "pass",
		
		'db_table_user_name' => "users",
		'db_table_group_name' => "groups_users_link", //only for cross table
					
		'auth_user_class_text' => $auth_type_name . '_auth_user_class',
		'auth_alt_user_class_text' => $auth_type_name. '_alt_auth_user_class',
		
		// Table Name were save all  Groups/Class Infos
		'db_table_allgroups' => "groups",
		// Column Name for the ID field for the Group/Class.
		'db_allgroups_id' => "groupid",
		// Column Name for the Groups/Class Name field.
		'db_allgroups_name' => "name",

		/*********************************************** 
		 * CMS Config values - change per CMS.
		 ***********************************************/
		'DB_configfile_name' => "mainfile.php",
		'DB_host' => 'XOOPS_DB_HOST',
		'DB_name' => 'XOOPS_DB_NAME',
		'DB_table_prefix' => 'XOOPS_DB_PREFIX',
		'DB_admin_user_name' => 'XOOPS_DB_USER',
		'DB_admin_user_password' => 'XOOPS_DB_PASS',
	)
);

?>