<?php
//
//Svenska installations str�ngar
//
global $localstr;
$localstr['headtitle'] = 'Välkommen till installationen av WRM 4.x.x.';
//$localstr['headbodyinfo'] = 'Vänligen notera att databasen du installerar till redan måste existera.';
$localstr['select_lang'] = 'Select Language';//new

$localstr['step0_system_requirements'] = 'System Requirements';//new
$localstr['step0_property'] = 'property';//new
$localstr['step0_required'] = 'required';//new
$localstr['step0_exist'] = 'exist';//new
$localstr['step0_phpversion_text'] = 'PHP Version';//new
$localstr['step0_mysqlversion'] = "MySQL Version";//new
$localstr['step0_active'] = "active";//new
$localstr['step0_nonactive'] = "non active";//new
$localstr['step0_writeable_config'] = "config.php writeable?";
$localstr['step7sub1inputdir'] = 'Input the path to your CMS directory (including trailing slash!)';

$localstr['yes'] = "yes";
$localstr['no'] = "no";
$localstr['upgrade'] = 'Upgrade';//new
$localstr['freshinstall'] = 'Ny Installation';

//menu
$localstr['InstallationProgress'] = 'Installations Status';
$localstr['menustep1init'] = '1. Initialiserar';
$localstr['menustep2conf'] = '2. Konfiguration';
$localstr['menustep3instab'] = '3. Installerar Tabeller';
$localstr['menustep4auth'] = '4. Autentisering';
$localstr['menustep5confauth'] = '5. Konf. Autentisering';
$localstr['menustep6final'] = '6. Avslutande';

//botton
$localstr['bd_submit'] = 'Fortsätt';
$localstr['bd_reset'] = 'Återställ';

//stuff
$localstr['hittingsubmit'] = 'Vänligen verifiera all information innan du fortsätter vidare!';
$localstr['pressbrowserpack'] ='Tryck på webbläsarens TILLBAKA knapp för att försöka igen.';
$localstr['problem'] ='Problem';
$localstr['txtusername'] = 'Användarnamn';
$localstr['txtpassword'] = 'Lösenord';
$localstr['txtemail'] = 'E-post';
$localstr['txtconfig'] = 'Konfiguration';

//step 2
$localstr['step2upgradefrom'] = 'Uppgradera till';
$localstr['step2dbname'] = 'MySQL Databas';
$localstr['step2dbserverhostname'] = 'MySQL Värdnamn';
$localstr['step2dbserverusername'] = 'MySQL Server Användarnamn';
$localstr['step2dbserverpwd'] = 'MySQL Server Lösenord';
$localstr['step2WRMtableprefix'] = 'WRM Tabell Prefix';
$localstr['step2installtype'] = 'Installations Typ';
$localstr['step2error01'] = 'Misslyckande att göra så, kan leda till oförutseddaproblem och hjälp kommer inte att ges!';

//step 3
$localstr['step3errordbcon'] = 'Fel vid försök att kontakta databasen.'; 
$localstr['step3errorschema'] = 'Fel vid öppnandet av uppgraderings schemat';
$localstr['step3errorsql'] = 'Fel vid installation <br>Förfrågan: $sql<br>Rapporterade: ';
$localstr['step3installinfo'] = 'Om du ser detta så skedde där inga fel under installationen av tabeller!';
$localstr['step3errorversion'] = 'Mjukvarans version i version.php matchar inte databasens version i versions tabellen.';

//step 4
$localstr['step4auttype'] = 'Autentisering sätt';
$localstr['step4desc'] = 'Beskrivning';
$localstr['step4desc_e107'] = 'e107 CMS System';
$localstr['step4desc_phpBB'] = 'phpBB2 eller phpBB3';
$localstr['step4desc_iums'] = 'Inbyggt Användar Hanterings System';
$localstr['step4desc_smf'] = 'Simple Machines Forum 1.x';
$localstr['step4desc_smf2'] = 'Simple Machines Forum 2.x';
$localstr['step4desc_wbb'] = 'WoltLab Burning Board Lite 1.x.x';
$localstr['step4desc_xoops'] = 'XOOPS';
$localstr['step4unkownauth'] = '(om du är osäker, vänligen välj "IAHS")';
$localstr['step4chooseauth'] = 'Vänligen välj ett autentisering sätt.';

// errors
$phprlang['connect_socked_error'] = 'Failed to connect to socket with error %s';
$phprlang['invalid_group_title'] = 'Group exists';
$phprlang['invalid_group_message'] = 'The group selected is already part of this set. Press your browsers BACK button to try again.';
$phprlang['invalid_option_title'] = 'Invalid input for page';
$phprlang['invalid_option_msg'] = 'You have tried to access this page using invalid input.';
$phprlang['no_user_msg'] = 'The user you are trying to view does not exist or has been deleted.';
$phprlang['no_user_title'] = 'User does not exist';
$phprlang['print_error_critical'] = 'a critical error!';
$phprlang['print_error_details'] = 'Details';
$phprlang['print_error_minor'] = 'a minor error!';
$phprlang['print_error_msg_begin'] = 'Sorry, WRM has encountered ';
$phprlang['print_error_msg_end'] = 'If this error persists, please make a post 
									with this message <br>on the <a href="http://www.wowraidmanager.net/">wowraidmanager.net Forums</a> and
									we will do our best to get it corrected. Thanks!';
$phprlang['print_error_page'] = 'Page';
$phprlang['print_error_query'] = 'Query';
$phprlang['print_error_title'] = 'Uh oh! You hit a boo boo';

//--------------------------
// Auth.
//--------------------------
$wrm_install_lang['step5failconWRM'] = 'Uppkoppling till WRM DB misslyckades';
$wrm_install_lang['step5selctusername'] = 'Sätt fulla rättigheter till det valda Användarnamnet';
$wrm_install_lang['step5sub1follval'] = 'Vänligen fyll i följande värden för att kunna fullfölja installationen';
$wrm_install_lang['step5done'] = 'klart';
$wrm_install_lang['step5sub2usernamefullperm'] = 'Välj det användarnamn som kommer att få full rättigheter till wowRaidManager';
$wrm_install_lang['step5sub3norest'] = 'Inga Restriktioner';
$wrm_install_lang['step5sub3noaddus'] = 'Inga Ytterliggare Användargrupper';
$wrm_install_lang['step5sub2failfindfile'] = 'Misslyckades med att hitta konfigurationsfilen:';
$wrm_install_lang['step5sub2checkdir'] = 'verifiera foldern/sökvägen igen';
$wrm_install_lang['step5sub3group01'] = 'Välj grund gruppen/klassen som har tillgång attnyttja WRM';
$wrm_install_lang['step5sub3group02'] = 'Alla användare utan denna grupp kommer inte atttillåtas logga in';
$wrm_install_lang['step5sub3group03'] = 'Vänligen völj "Inga Restriktioner" här om du vill att alla användare oavsett grupp/klass skall kunna logga in och nyttja WRM';
$wrm_install_lang['step5sub3altgroup01'] = 'Välj en alternativ grupp/klass som kan nyttja WRM';
$wrm_install_lang['step5sub3altgroup02'] = 'Alla användare i denna grupp kommer att tillåtas att logga in, oavsett om de är i ovanstående grupp/klass eller inte';

// phpBB
$wrm_install_lang['step5phpBBdesc'] = 'phpBB';
$wrm_install_lang['step5phpBBsub1desc'] = 'Du har valt phpBB autentisering';
$wrm_install_lang['step5phpBBsub1inputdir'] = 'Skriv in den relativa sökvägen till din phpBB folder (inkluderat det efterföljande snedstrecket!)';
$wrm_install_lang['step5phpBBsub2failincdir'] = 'din phpBB folder är felaktig';
$wrm_install_lang['step5phpBBsub2failfindautfile'] = 'Misslyckades med att hitta "../auth/auth_phpbb3.php" konfiguationsfilen';
$wrm_install_lang['step5phpBBsub2faildownautfile'] = 'vänligen ladda ner (från WRM-hemsidan) och kopiera till "/auth".';
$wrm_install_lang['step5phpBBsub2founddb'] = 'phpBB DB funnen';
$wrm_install_lang['step5phpBBsub2readconffile'] = 'phpBB konfigurationsfil läst';
$wrm_install_lang['step5phpBBsub3errorretusergroup'] = 'Fel vid hämtning av användargrupp från phpBB3';
$wrm_install_lang['step5phpBBsub3errorretusername'] = 'Fel vid hämtning av användarnamn från phpBB3';
$wrm_install_lang['step5phpBBsub4wantimport'] = 'vill du importera alla användare från phpBB Forumet';
$wrm_install_lang['step5phpBBsub4srynotsupport'] = 'FÖRLÅT import från phpBB Forumet: inget stöd för phpBB2';
$wrm_install_lang['step5phpBBsub5import'] = 'Importera';
$wrm_install_lang['step5phpBBfailconphpBB'] = 'Uppkoppling till phpBB DB misslyckades';

// e107
$wrm_install_lang['step5e107desc'] = 'e107';
$wrm_install_lang['step5e107sub1desc'] = 'Du har valt e107 autentisering';
$wrm_install_lang['step5e107sub1inputdir'] = 'Skriv in den relativa sökvägen till din e107 folder (inkluderat det efterföljande snedstrecket!)';
$wrm_install_lang['step5e107sub2failincdir'] = 'din e107 folder är felaktig';
$wrm_install_lang['step5e107sub2readconffile'] = 'e107 konfigurationsfil läst';
$wrm_install_lang['step5e107sub3errorretusername'] = 'Fel vid hämtning av användarnamn från e107';
$wrm_install_lang['step5e107sub3errorretuserclass'] = 'Fel vid hämtning av användarklassfrån e107';
$wrm_install_lang['step5e107failcone107'] = 'Uppkoppling till e107 DB misslyckades';

// iums = integrated User Management System
$wrm_install_lang['step5iumsdesc'] = 'Inbyggt Användar Hanterings System';
$wrm_install_lang['step5iumssub1desc'] = 'Du har valt "Inbyggt Användar Hanterings System" autentisering';
$wrm_install_lang['step5sub1iumsfilladmindesc'] = 'Allt som kvarstår är att fylla i din information för Super Administratör nedan.';

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
$wrm_install_lang['step5smfsub1desc'] = 'Du har valt SMF autentisering';
$wrm_install_lang['step5smfsub1inputdir'] = 'Skriv in den relativa sökvägen till din SMFfolder (inkluderat det efterföljande snedstrecket!)';
$wrm_install_lang['step5smfsub2failincdir'] = 'din SMF folder är felaktig';
$wrm_install_lang['step5smfsub2readconffile'] = 'SMF konfigurationsfil läst';
$wrm_install_lang['step5smfsub3errorretusername'] = 'Fel vid hämtning av användarnamn från SMF';
$wrm_install_lang['step5smfsub3errorretuserclass'] = 'Fel vid hämtning av användarklass från SMF';
$wrm_install_lang['step5smffailconesmf'] = 'Uppkoppling till SMF DB misslyckades';

// WoltLab Burning Board Lite 1.x.x = wbb
$wrm_install_lang['step5wbbdesc'] = 'WoltLab Burning Board';
$wrm_install_lang['step5wbbsub1desc'] = 'Du har valt WBB autentisering';
$wrm_install_lang['step5wbbsub1inputdir'] = 'Skriv in den relativa sökvägen till din wbbfolder (inkluderat det efterföljande snedstrecket!)';
$wrm_install_lang['step5wbbsub2failincdir'] = 'din WBB folder är felaktig';
$wrm_install_lang['step5wbbsub2readconffile'] = 'WBB konfigurationsfil läst';
$wrm_install_lang['step5wbbsub3errorretusername'] = 'Fel vid hämtning av användarnamn från WBB';
$wrm_install_lang['step5wbbsub3errorretuserclass'] = 'Fel vid hämtning av användarklass från WBB';
$wrm_install_lang['step5wbbfailconesmf'] = 'Uppkoppling till WBB DB misslyckades';

// XOOPS
$wrm_install_lang['step5xoopsdesc'] = 'XOOPS';
$wrm_install_lang['step5xoopssub1desc'] = 'Du har valt XOOPS autentisering';
$wrm_install_lang['step5xoopssub1inputdir'] = 'Skriv in den relativa sökvägen till din XOOPS folder (inkluderat det efterföljande snedstrecket!)';
$wrm_install_lang['step5xoopssub2failincdir'] = 'din XOOPS folder är felaktig';
$wrm_install_lang['step5xoopssub2readconffile'] = 'XOOPS konfigurationsfil läst';
$wrm_install_lang['step5xoopssub3errorretusername'] = 'Fel vid hämtning av användarnamn från XOOPS';
$wrm_install_lang['step5xoopssub3errorretuserclass'] = 'Fel vid hämtning av användarklass från from XOOPS';
$wrm_install_lang['step5xoopsfailconesmf'] = 'Uppkoppling till XOOPS DB misslyckades';

//----------------------------------------------
//step 6
$wrm_install_lang['stepdonefinished'] = 'Färdigt';
$wrm_install_lang['stepdonesetupcomplete'] = 'Installationen är nu klar.';
$wrm_install_lang['stepdoneremovedir'] = 'Se till att ta bort "install/" foldern och klicka sedan <a href="../index.php">här</a> när du har gjort det.';
?>
