<?php
//
//english install strings
//
global $wrm_install_lang;
$wrm_install_lang['headtitle'] = 'Welcome to the WRM 4.x.x Installation.';
//$wrm_install_lang['headbodyinfo'] = 'Please note that the database you install into should already exist.';
$wrm_install_lang['select_lang'] = 'Select Language';

$wrm_install_lang['step0_system_requirements'] = 'System Requirements';
$wrm_install_lang['step0_property'] = 'Property';
$wrm_install_lang['step0_required'] = 'Required';
$wrm_install_lang['step0_exist'] = 'Exist';
$wrm_install_lang['step0_phpversion_text'] = 'PHP Version';
$wrm_install_lang['step0_mysqlversion'] = "MySQL Version";
$wrm_install_lang['step0_active'] = "active";
$wrm_install_lang['step0_nonactive'] = "non active";
$wrm_install_lang['step0_writeable_config'] = "config.php writeable?";
//$wrm_install_lang['step7sub1inputdir'] = 'Input the path to your CMS directory (including trailing slash!)';

$wrm_install_lang['yes'] = "yes";
$wrm_install_lang['no'] = "no";
$wrm_install_lang['upgrade'] = 'Upgrade';
$wrm_install_lang['freshinstall'] = 'Fresh Install';
$wrm_install_lang['change'] = "change";

//botton
$wrm_install_lang['bd_submit'] = 'Continue';
$wrm_install_lang['bd_reset'] = 'Reset';
$wrm_install_lang['bd_back'] = 'Back';

//step 2
$wrm_install_lang['step2upgradefrom'] = 'Upgrade to';
$wrm_install_lang['step2dbname'] = 'SQL Database';
$wrm_install_lang['step2dbserverhostname'] = 'SQL Hostname';
$wrm_install_lang['step2dbserverusername'] = 'SQL Server Username';
$wrm_install_lang['step2dbserverpwd'] = 'SQL Server Password';
$wrm_install_lang['step2WRMtableprefix'] = 'WRM Table Prefix';
$wrm_install_lang['step2installtype'] = 'Install Type';
$wrm_install_lang['step2error01'] = 'Failure to do so could cause unforeseen failure and support will not be given!';

//step 3
$wrm_install_lang['step3errordbcon'] = 'Error connecting to database.'; 
$wrm_install_lang['step3errorschema'] = 'Error opening upgrade schema';
$wrm_install_lang['step3errorsql'] = 'Error installing<br>Query: $sql<br>Reported: ';
$wrm_install_lang['step3installinfo'] = 'If you are seeing this then no errors occurred during table installation!';
$wrm_install_lang['step3errorversion'] = 'The software version in version.php doesn\'t match database version in version table.';

$wrm_install_lang['stepdonefinished'] = 'Finished';
$wrm_install_lang['stepdonesetupcomplete'] = 'Setup is now complete.';
$wrm_install_lang['stepdoneremovedir'] = 'Be sure to remove the "install/" directory and click <a href="../index.php">here</a> when you have done so.';

//stuff
$wrm_install_lang['hittingsubmit'] = 'Please verify all information before hitting submit!';
$wrm_install_lang['pressbrowserpack'] ='Press your browsers BACK button to try again.';
$wrm_install_lang['problem'] ='Problem';
$wrm_install_lang['txtusername'] = 'Username';
$wrm_install_lang['txtpassword'] = 'Password';
$wrm_install_lang['txtemail'] = 'E-mail';
$wrm_install_lang['txtconfig'] = 'config';

// errors
$wrm_install_lang['connect_socked_error'] = 'Failed to connect to socket with error %s';
$wrm_install_lang['invalid_group_title'] = 'Group exists';
$wrm_install_lang['invalid_group_message'] = 'The group selected is already part of this set. Press your browsers BACK button to try again.';
$wrm_install_lang['invalid_option_title'] = 'Invalid input for page';
$wrm_install_lang['invalid_option_msg'] = 'You have tried to access this page using invalid input.';
$wrm_install_lang['no_user_msg'] = 'The user you are trying to view does not exist or has been deleted.';
$wrm_install_lang['no_user_title'] = 'User does not exist';
$wrm_install_lang['print_error_critical'] = 'a critical error!';
$wrm_install_lang['print_error_details'] = 'Details';
$wrm_install_lang['print_error_minor'] = 'a minor error!';
$wrm_install_lang['print_error_msg_begin'] = 'Sorry, WRM has encountered ';
$wrm_install_lang['print_error_msg_end'] = 'If this error persists, please make a post 
									with this message <br>on the <a href="http://www.wowraidmanager.net/">wowraidmanager.net Forums</a> and
									we will do our best to get it corrected. Thanks!';
$wrm_install_lang['print_error_page'] = 'Page';
$wrm_install_lang['print_error_query'] = 'Query';
$wrm_install_lang['print_error_title'] = 'Uh oh! You hit a boo boo';

//--------------------------
// Auth.
//--------------------------
$wrm_install_lang['step5failconWRM'] = 'Unable to connect to WRM DB';
$wrm_install_lang['step5selctusername'] = 'set full permissions to selected Username';
$wrm_install_lang['step5sub1follval'] = 'In order to complete the installation please fill in the following values';
$wrm_install_lang['step5done'] = 'done';
$wrm_install_lang['step5sub2usernamefullperm'] = 'Select the username will be given full wowRaidManager permissions';
$wrm_install_lang['step5sub3norest'] = 'No Restrictions';
$wrm_install_lang['step5sub3noaddus'] = 'No Additional UserGroup';
$wrm_install_lang['step5sub2failfindfile'] = 'Failed to find config file:';
$wrm_install_lang['step5sub2checkdir'] = 'check the directory again';
$wrm_install_lang['step5sub3group01'] = 'Select the base user group/class that has access to use WRM';
$wrm_install_lang['step5sub3group02'] = 'Any user without this group set will not be allowed to log in';
$wrm_install_lang['step5sub3group03'] = 'Please select "No Restrictios" here if you want all users regardless of group/class to be able to login to WRM';
$wrm_install_lang['step5sub3altgroup01'] = 'Select an alternate user group/class that can access WRM';
$wrm_install_lang['step5sub3altgroup02'] = 'Any user tagged with this group will be allowed to log in regardless of whether they are in the above user group/class or not';

//----------------
//menu
$wrm_install_lang['InstallationProgress'] = 'Installation Progress';
$wrm_install_lang['menustep1init'] = '1. Initialization';
$wrm_install_lang['menustep2conf'] = '2. Configuration';
$wrm_install_lang['menustep3instab'] = '3. Install Tables';
$wrm_install_lang['menustep4auth'] = '4. Authorization';
$wrm_install_lang['menustep5confauth'] = '5. conf. Authorization';
$wrm_install_lang['menustep6final'] = '6. Finalize';

//step 4
$wrm_install_lang['step4auttype'] = 'authorization type';
$wrm_install_lang['step4desc'] = 'Description';
$wrm_install_lang['step4desc_e107'] = 'e107 CMS System';
$wrm_install_lang['step4desc_phpBB'] = 'phpBB2 or phpBB3';
$wrm_install_lang['step4desc_iums'] = 'integrated User Management System';
$wrm_install_lang['step4desc_smf'] = 'Simple Machines Forum 1.x';
$wrm_install_lang['step4desc_smf2'] = 'Simple Machines Forum 2.x';
$wrm_install_lang['step4desc_wbb'] = 'WoltLab Burning Board Lite 1.x.x';
$wrm_install_lang['step4desc_xoops'] = 'XOOPS';
$wrm_install_lang['step4unkownauth'] = '(if you are not sure, please select "iUMS")';
$wrm_install_lang['step4chooseauth'] = 'Please choose an authorization type.';


// phpBB
$wrm_install_lang['step5phpBBdesc'] = 'phpBB';
$wrm_install_lang['step5phpBBsub1desc'] = 'You have selected phpBB authentication';
$wrm_install_lang['step5phpBBsub1inputdir'] = 'Input the path to your phpBB directory (including trailing slash!)';
$wrm_install_lang['step5phpBBsub2failincdir'] = 'your phpBB directory is incorect';
$wrm_install_lang['step5phpBBsub2failfindautfile'] = 'Failed to find "../auth/auth_phpbb3.php" config file';
$wrm_install_lang['step5phpBBsub2faildownautfile'] = 'please download (from WRM-Homepage) and copy to "/auth".';
$wrm_install_lang['step5phpBBsub2founddb'] = 'found phpBB DB';
$wrm_install_lang['step5phpBBsub2readconffile'] = 'read phpBB config file';
$wrm_install_lang['step5phpBBsub3errorretusergroup'] = 'Error retrieving usergroup from phpBB3';
$wrm_install_lang['step5phpBBsub3errorretusername'] = 'Error retrieving username from phpBB3';
$wrm_install_lang['step5phpBBsub4wantimport'] = 'Do you want to import all users from your phpBB Forum?';
$wrm_install_lang['step5phpBBsub4srynotsupport'] = 'Import from phpBB Forum/Board: not supported with phpBB2';
$wrm_install_lang['step5phpBBsub5import'] = 'Import';
$wrm_install_lang['step5phpBBfailconphpBB'] = 'Unable to connect to phpBB DB';

// e107
$wrm_install_lang['step5e107desc'] = 'e107';
$wrm_install_lang['step5e107sub1desc'] = 'You have selected e107 authentication';
$wrm_install_lang['step5e107sub1inputdir'] = 'Input the relative path to your e107 directory (including trailing slash!)';
$wrm_install_lang['step5e107sub2failincdir'] = 'your e107 directory is incorect';
$wrm_install_lang['step5e107sub2readconffile'] = 'read e107 config file';
$wrm_install_lang['step5e107sub3errorretusername'] = 'Error retrieving username from e107';
$wrm_install_lang['step5e107sub3errorretuserclass'] = 'Error retrieving userclass from e107';
$wrm_install_lang['step5e107failcone107'] = 'Unable to connect to e107 DB';

// iums = integrated User Management System
$wrm_install_lang['step5iumsdesc'] = 'integrated User Management System';
$wrm_install_lang['step5iumssub1desc'] = 'You have selected "integrated User Management System" authentication';
$wrm_install_lang['step5sub1iumsfilladmindesc'] = 'All that is left is to enter your Super Administrator information by filling out the information below.';

// Joomla
$wrm_install_lang['step5joomladesc'] = 'Joomla';
$wrm_install_lang['step5joomlasub1desc'] = 'You have selected Joomla authentication';
$wrm_install_lang['step5joomlasub1inputdir'] = 'Input the relative path to your Joomla directory (including trailing slash!)';
$wrm_install_lang['step5joomlasub2failincdir'] = 'your Joomla directory is incorect';
$wrm_install_lang['step5joomlasub2readconffile'] = 'read Joomla config file';
$wrm_install_lang['step5joomlasub3errorretusername'] = 'Error retrieving username from Joomla';
$wrm_install_lang['step5joomlasub3errorretuserclass'] = 'Error retrieving userclass from Joomla';
$wrm_install_lang['step5joomlafailconejoomla'] = 'Unable to connect to Joomla DB';

// SMF = Simple Machines Forum
$wrm_install_lang['step5smfdesc'] = 'SMF';
$wrm_install_lang['step5smfsub1desc'] = 'You have selected SMF authentication';
$wrm_install_lang['step5smfsub1inputdir'] = 'Input the relative path to your SMF directory (including trailing slash!)';
$wrm_install_lang['step5smfsub2failincdir'] = 'your SMF directory is incorect';
$wrm_install_lang['step5smfsub2readconffile'] = 'read SMF config file';
$wrm_install_lang['step5smfsub3errorretusername'] = 'Error retrieving username from SMF';
$wrm_install_lang['step5smfsub3errorretuserclass'] = 'Error retrieving userclass from SMF';
$wrm_install_lang['step5smffailconesmf'] = 'Unable to connect to SMF DB';

// WoltLab Burning Board Lite 1.x.x = wbb
$wrm_install_lang['step5wbbdesc'] = 'WoltLab Burning Board';
$wrm_install_lang['step5wbbsub1desc'] = 'You have selected wbb authentication';
$wrm_install_lang['step5wbbsub1inputdir'] = 'Input the relative path to your wbb directory (including trailing slash!)';
$wrm_install_lang['step5wbbsub2failincdir'] = 'your wbb directory is incorect';
$wrm_install_lang['step5wbbsub2readconffile'] = 'read wbb config file';
$wrm_install_lang['step5wbbsub3errorretusername'] = 'Error retrieving username from wbb';
$wrm_install_lang['step5wbbsub3errorretuserclass'] = 'Error retrieving userclass from wbb';
$wrm_install_lang['step5wbbfailconesmf'] = 'Unable to connect to wbb DB';

// XOOPS
$wrm_install_lang['step5xoopsdesc'] = 'XOOPS';
$wrm_install_lang['step5xoopssub1desc'] = 'You have selected XOOPS authentication';
$wrm_install_lang['step5xoopssub1inputdir'] = 'Input the relative path to your XOOPS directory (including trailing slash!)';
$wrm_install_lang['step5xoopssub2failincdir'] = 'your XOOPS directory is incorect';
$wrm_install_lang['step5xoopssub2readconffile'] = 'read XOOPS config file';
$wrm_install_lang['step5xoopssub3errorretusername'] = 'Error retrieving username from XOOPS';
$wrm_install_lang['step5xoopssub3errorretuserclass'] = 'Error retrieving userclass from XOOPS';
$wrm_install_lang['step5xoopsfailconesmf'] = 'Unable to connect to XOOPS DB';

//----------------------------------------------
//step 6
?>
