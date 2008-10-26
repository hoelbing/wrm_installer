<?php

$auth_type_name = 'e107';
array_push($bridge,
	array(
	
		'auth_type_name' => $auth_type_name,
		
		/*********************************************** 
		 * Table and Column Names - change per CMS.
		 ***********************************************/
		// Column Name for the ID field for the User.
		'db_user_id' => 'user_id',
		// Column Name for the ID field for the Group the User belongs to.
		'db_group_id' => "user_class",
		// Column Name for the UserName field.
		'db_user_name' => "user_loginname",
		// Column Name for the User's E-Mail Address
		'db_user_email' => "user_email",
		// Column Name for the User's Password
		'db_user_password' => "user_password",
		
		'db_table_user_name' => "user",
		'db_table_group_name' => "user", //only for cross table
					
		'auth_user_class_text' => $auth_type_name . '_auth_user_class',
		'auth_alt_user_class_text' => $auth_type_name. '_alt_auth_user_class',
		
		// Table Name were save all  Groups/Class Infos
		'db_table_allgroups' => "userclass_classes",
		// Column Name for the ID field for the Group/Class.
		'db_allgroups_id' => "userclass_id",
		// Column Name for the Groups/Class Name field.
		'db_allgroups_name' => "userclass_name",

		/*********************************************** 
		 * CMS Config values - change per CMS.
		 ***********************************************/
		'DB_configfile_name' => "e107_config.php",
		'DB_host' => '$mySQLserver',
		'DB_name' => '$mySQLdefaultdb',
		'DB_table_prefix' => '$mySQLprefix',
		'DB_admin_user_name' => '$mySQLuser',
		'DB_admin_user_password' => '$mySQLpassword',
	)
);

?>