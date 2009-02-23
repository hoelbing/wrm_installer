<?php
//
//germany install strings
//
global $localstr;
$localstr['headtitle'] = 'Willkommen zu der WRM 4.x.x Installation.';
//$localstr['headbodyinfo'] = 'Bitte beachte das die Datenbank, auf welche du sie installieren willst, auch existiert.';
$localstr['select_lang'] = 'Sprache w�hlen';

$localstr['step0_system_requirements'] = 'Systemvoraussetzungen';
$localstr['step0_property'] = 'Eigenschaft';
$localstr['step0_required'] = 'erforderlich';
$localstr['step0_exist'] = 'vorhanden';
$localstr['step0_phpversion_text'] = 'PHP Version';
$localstr['step0_mysqlversion'] = "MySQL Version";
$localstr['step0_active'] = "aktiviert";
$localstr['step0_nonactive'] = "deaktiviert";
$localstr['step0_writeable_config'] = "config.php schreibbar?";
$localstr['step7sub1inputdir'] = 'Input the path to your CMS directory (including trailing slash!)';

$localstr['yes'] = "ja";
$localstr['no'] = "nein";
$localstr['upgrade'] = 'Upgrade';
$localstr['freshinstall'] = 'Neue Installation';

//menu
$localstr['InstallationProgress'] = 'Fortschritt der Installation';
$localstr['menustep1init'] = '1. Initialisierung';
$localstr['menustep2conf'] = '2. Konfiguration';
$localstr['menustep3instab'] = '3. Tabellen installieren';
$localstr['menustep4auth'] = '4. Berechtigungsschema';
$localstr['menustep5confauth'] = '5. Konf. Berechtigungsschema';
$localstr['menustep6final'] = '6. Abschliessen';

//botton
$localstr['bd_submit'] = 'weiter';
$localstr['bd_reset'] = 'zur�cksetzen';

//stuff
$wrm_install_lang['hittingsubmit'] = 'Bitte kontrolliere deine Eingabe bevor du auf "weiter" dr�ckst.';
$wrm_install_lang['pressbrowserpack'] ='Bitte benutze, in deinem Browsers, die "zur�ck" Taste und gebe die Daten erneut ein.';
$wrm_install_lang['problem'] ='Problem';
$wrm_install_lang['txtusername'] = 'Benutzername';
$wrm_install_lang['txtpassword'] = 'Password';
$wrm_install_lang['txtemail'] = 'E-mail';
$wrm_install_lang['txtconfig'] = 'Konfiguration';

//step 2
$wrm_install_lang['step2upgradefrom'] = 'Upgrade zur';
$wrm_install_lang['step2dbname'] = 'SQL Datenbank';
$wrm_install_lang['step2dbserverhostname'] = 'SQL Hostname';
$wrm_install_lang['step2dbserverusername'] = 'SQL Server Benutzername';
$wrm_install_lang['step2dbserverpwd'] = 'SQL Server Passwort';
$wrm_install_lang['step2WRMtableprefix'] = 'WRM Table Prefix';
$wrm_install_lang['step2installtype'] = 'Art der Installation';
$wrm_install_lang['step2error01'] = 'Bei falschen Eingaben k�nnte es zu unvorhersehbaren Auswirkungen kommen, eine Hilfe wird nicht angeboten!';

//step 3
$wrm_install_lang['step3errordbcon'] = 'Fehler: konnte keine Verbindung zur angegeben Datenbank herstellen.<br>';
$wrm_install_lang['step3errorschema'] = 'Fehler: das Upgrade Schema konnte nicht ge�ffnet werden';
$wrm_install_lang['step3errorsql'] = 'Fehler bei der Installation :<br> SQL String: $sql<br> Bericht: ';
$wrm_install_lang['step3installinfo'] = 'Wenn du dies hier lesen kannst, sind keine Fehler bei der Installation der SQL-Tabellen aufgetreten!';
$wrm_install_lang['step3errorversion'] = 'Die Software-Version in version.php entsprich nicht der Version der Datenbank in der Version-Tabelle.';

//step 4
$wrm_install_lang['step4auttype'] = 'Berechtigungsschema';
$wrm_install_lang['step4desc'] = 'Beschreibung';
$wrm_install_lang['step4desc_e107'] = 'e107 CMS System';
$wrm_install_lang['step4desc_phpBB'] = 'phpBB2 oder phpBB3';
$wrm_install_lang['step4desc_iums'] = 'integrierte Benutzer Management-System';
$wrm_install_lang['step4desc_smf'] = 'Simple Machines Forum 1.x';
$wrm_install_lang['step4desc_smf2'] = 'Simple Machines Forum 2.x';
$wrm_install_lang['step4desc_wbb'] = 'WoltLab Burning Board Lite 1.x.x';
$wrm_install_lang['step4desc_xoops'] = 'XOOPS';
$wrm_install_lang['step4unkownauth'] = '(wenn sie sich nicht sicher sind, wähle bitte "iUMS")';
$wrm_install_lang['step4chooseauth'] = 'Bitte wähle deine Berechtigungsschema aus.';

//errors
$phprlang['no_user_msg'] = 'Der Benutzer, den du dir ansehen m�chtest, existiert nicht oder wurde gel�scht.';
$phprlang['no_user_title'] = 'Benutzer existiert nicht';
$phprlang['print_error_critical'] = 'kritischen Fehler entdeckt!';
$phprlang['print_error_details'] = 'Details';
$phprlang['print_error_minor'] = 'kleinen Fehler entdeckt!';
$phprlang['print_error_msg_begin'] = 'Entschuldigung, WRM hat einen ';
$phprlang['print_error_msg_end'] = 'Wenn der Fehler weiter auftritt, erzeuge bitte ein Posting
									mit dieser Nachricht <br>in den <a href="http://www.wowraidmanager.net/">wowraidmanager.net-Forums</a> und
									wir werden unser Bestes geben, um ihn zu beheben. Danke!';
$phprlang['print_error_page'] = 'Seite';
$phprlang['print_error_query'] = 'Anfrage';
$phprlang['print_error_title'] = 'Oh-oh! Da ist ein Fehler passiert';

//--------------------------
// Auth.
//--------------------------
$wrm_install_lang['step5failconWRM'] = 'Verbindung zur WRM Datenbank nicht möglich';
$wrm_install_lang['step5selctusername'] = 'dieser Benutzer bekommt vollen Zugriff auf das WRM';
$wrm_install_lang['step5sub1follval'] = 'Um die Installation abzuschließen füllen Sie bitte die folgenden Werte aus';
$wrm_install_lang['step5done'] = 'fertig';
$wrm_install_lang['step5sub2usernamefullperm'] = 'wählen bitte den Benutzer aus, der vollen Zugriff auf das WRM bekommt';
$wrm_install_lang['step5sub3norest'] = 'Keine Einschränkung';
$wrm_install_lang['step5sub3noaddus'] = 'Keine zusätzlichen Benutzergruppe';
$wrm_install_lang['step5sub2failfindfile'] = 'konnte die Konfigurationsdatei nich finden:';
$wrm_install_lang['step5sub2checkdir'] = 'überprüfe das Verzeichnis noch mal';
$wrm_install_lang['step5sub3group01'] = 'Wählen die Benutzergruppe aus, welche Zugang zur Nutzung von WRM hat';
$wrm_install_lang['step5sub3group02'] = 'Benutzter die nicht in dieser Benutzergruppe sind, ist es nicht möglich, sich anzumelden';
$wrm_install_lang['step5sub3group03'] = 'Wenn du willst, dass alle Benutzer unabhängig von der Benutzergruppe sich im WRM anmelden können, wähle "Keine Einschränkung" aus.';
$wrm_install_lang['step5sub3altgroup01'] = 'Wählen eine alternative Benutzergruppe aus, welcher den Zugang zu WRM auch erlaubt ist';
$wrm_install_lang['step5sub3altgroup02'] = 'mit dieser alternativen Gruppe ist es dem Benutzer möglich, sich unabhngig davon anzumelden, ob sie in der oben genannten Benutzergruppe sind oder nicht ';

// phpBB
$wrm_install_lang['step5phpBBdesc'] = 'phpBB';
$wrm_install_lang['step5phpBBsub1desc'] = 'Du hast phpBB-Authentifizierung ausgewählt';
$wrm_install_lang['step5phpBBsub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem phpBB-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$wrm_install_lang['step5phpBBsub2failincdir'] = 'Ihre Angegebenes phpBB-Verzeichnis ist falsch';
$wrm_install_lang['step5phpBBsub2failfindautfile'] = 'konnte die Konfigurationsdatei "../auth/auth_phpbb3.php" nicht finden';
$wrm_install_lang['step5phpBBsub2faildownautfile'] = 'bitte lade sie dir herunter (von der WRM-Homepage) und kopiere sie nach "/auth".';
$wrm_install_lang['step5phpBBsub2founddb'] = 'gefunden phpBB Datebank';
$wrm_install_lang['step5phpBBsub2readconffile'] = 'lese phpBB Konfigurationsdatei';
$wrm_install_lang['step5phpBBsub3errorretusergroup'] = 'Fehler beim Abrufen der Benutzergruppe aus der phpBB3 Datebank';
$wrm_install_lang['step5phpBBsub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der phpBB3 Datebank';
$wrm_install_lang['step5phpBBsub4wantimport'] = 'möchten sie alle Benutzter aus dem phpBB Forum/Board importieren';
$wrm_install_lang['step5phpBBsub4srynotsupport'] = 'Endschuldigung: der Import, der Benutzer aus dem phpBB Forum/Board: wird mit phpBB2 nicht unterstützt';
$wrm_install_lang['step5phpBBsub5import'] = 'Import';
$wrm_install_lang['step5phpBBfailconphpBB'] = 'Verbindung zur phpBB Datenbank nicht möglich';

// e107
$wrm_install_lang['step5e107desc'] = 'e107';
$wrm_install_lang['step5e107sub1desc'] = 'Du hast e107-Authentifizierung ausgewählt';
$wrm_install_lang['step5e107sub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem e107-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$wrm_install_lang['step5e107sub2failincdir'] = 'Ihre Angegebenes e107-Verzeichnis ist falsch';
$wrm_install_lang['step5e107sub2readconffile'] = 'lese e107 Konfigurationsdatei';
$wrm_install_lang['step5e107sub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der e107 Datebank';
$wrm_install_lang['step5e107sub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der e107 Datebank';
$wrm_install_lang['step5e107failcone107'] = 'Verbindung zur e107 Datenbank nicht möglich';

// iums = integrated User Management System
$wrm_install_lang['step5iumsdesc'] = 'integrierte Benutzer Management-System';
$wrm_install_lang['step5iumssub1desc'] = 'Du hast "integrierte Benutzer Management-System"-Authentifizierung ausgewählt';
$wrm_install_lang['step5sub1iumsfilladmindesc'] = 'füllen sie alle Werte für denn Benutzter des Super Administrator aus.';

// Joomla germany
$wrm_install_lang['step5joomladesc'] = 'Joomla';
$wrm_install_lang['step5joomlasub1desc'] = 'Du hast Joomla-Authentifizierung ausgewählt';
$wrm_install_lang['step5joomlasub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem Joomla-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$wrm_install_lang['step5joomlasub2failincdir'] = 'Ihre Angegebenes Joomla-Verzeichnis ist falsch';
$wrm_install_lang['step5joomlasub2readconffile'] = 'lese Joomla Konfigurationsdatei';
$wrm_install_lang['step5joomlasub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der Joomla Datebank';
$wrm_install_lang['step5joomlasub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der Joomla Datebank';
$wrm_install_lang['step5joomlafailconejoomla'] = 'Verbindung zur Joomla Datenbank nicht möglich';

// SMF = Simple Machines Forum
$wrm_install_lang['step5smfdesc'] = 'SMF';
$wrm_install_lang['step5smfsub1desc'] = 'Du hast SMF-Authentifizierung ausgewählt';
$wrm_install_lang['step5smfsub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem SMF-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$wrm_install_lang['step5smfsub2failincdir'] = 'Ihre Angegebenes SMF-Verzeichnis ist falsch';
$wrm_install_lang['step5smfsub2readconffile'] = 'lese SMF Konfigurationsdatei';
$wrm_install_lang['step5smfsub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der SMF Datebank';
$wrm_install_lang['step5smfsub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der SMF Datebank';
$wrm_install_lang['step5smffailconesmf'] = 'Verbindung zur SMF Datenbank nicht möglich';

// WoltLab Burning Board Lite 1.x.x = wbb
$wrm_install_lang['step5wbbdesc'] = 'WoltLab Burning Board';
$wrm_install_lang['step5wbbsub1desc'] = 'Du hast WBB-Authentifizierung ausgewählt';
$wrm_install_lang['step5wbbsub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem WBB-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$wrm_install_lang['step5wbbsub2failincdir'] = 'Ihre Angegebenes WBB-Verzeichnis ist falsch';
$wrm_install_lang['step5wbbsub2readconffile'] = 'lese WBB Konfigurationsdatei';
$wrm_install_lang['step5wbbsub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der WBB Datebank';
$wrm_install_lang['step5wbbsub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der WBB Datebank';
$wrm_install_lang['step5wbbfailconesmf'] = 'Verbindung zur WoltLab Burning Board Datenbank nicht möglich';

// XOOPS
$wrm_install_lang['step5xoopsdesc'] = 'XOOPS';
$wrm_install_lang['step5xoopssub1desc'] = 'Du hast XOOPS-Authentifizierung ausgewählt';
$wrm_install_lang['step5xoopssub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem XOOPS-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$wrm_install_lang['step5xoopssub2failincdir'] = 'Ihre Angegebenes XOOPS-Verzeichnis ist falsch';
$wrm_install_lang['step5xoopssub2readconffile'] = 'lese XOOPS Konfigurationsdatei';
$wrm_install_lang['step5xoopssub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der XOOPS Datebank';
$wrm_install_lang['step5xoopssub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der XOOPS Datebank';
$wrm_install_lang['step5xoopsfailconesmf'] = 'Verbindung zur XOOPS Datenbank nicht möglich';

//----------------------------------------------
//step done
$wrm_install_lang['stepdonefinished'] = 'Fertig';
$wrm_install_lang['stepdonesetupcomplete'] = 'Das Setup ist nun komplett.';
$wrm_install_lang['stepdoneremovedir'] = 'L�schen Sie bitte das "install/" Verzeichnis und klicken sie anschliessend <a href="../index.php">hier</a> drauf wenn sie fertig sind.';

?>