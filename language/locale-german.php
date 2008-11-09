<?php
//
//germany install strings
//
global $localstr;
$localstr['headtitle'] = 'Willkommen zu der WRM 4.x.x Installation.';
//$localstr['headbodyinfo'] = 'Bitte beachte das die Datenbank, auf welche du sie installieren willst, auch existiert.';
$localstr['select_lang'] = 'Sprache wählen';

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
$localstr['menustep6final'] = '6. Abschließen';

//botton
$localstr['bd_submit'] = 'weiter';
$localstr['bd_reset'] = 'zurücksetzen';

//stuff
$localstr['hittingsubmit'] = 'Bitte kontrolliere deine Eingabe bevor du auf "weiter" drückst.';
$localstr['pressbrowserpack'] ='Bitte benutze, in deinem Browsers, die "zurück" Taste und gebe die Daten erneut ein.';
$localstr['problem'] ='Problem';
$localstr['txtusername'] = 'Benutzername';
$localstr['txtpassword'] = 'Password';
$localstr['txtemail'] = 'E-mail';
$localstr['txtconfig'] = 'Konfiguration';

//step 2
$localstr['step2upgradefrom'] = 'Upgrade zur';
$localstr['step2dbname'] = 'MySQL Datenbank';
$localstr['step2dbserverhostname'] = 'MySQL Hostname';
$localstr['step2dbserverusername'] = 'MySQL Server Benutzername';
$localstr['step2dbserverpwd'] = 'MySQL Server Passwort';
$localstr['step2WRMtableprefix'] = 'WRM Table Prefix';
$localstr['step2installtype'] = 'Art der Installation';
$localstr['step2error01'] = 'Bei falschen Eingaben könnte es zu unvorhersehbaren Auswirkungen kommen, eine Hilfe wird nicht angeboten!';

//step 3
$localstr['step3errordbcon'] = 'Fehler: konnte keine Verbindung zur angegeben Datenbank herstellen.<br>';
$localstr['step3errorschema'] = 'Fehler: das Upgrade Schema konnte nicht geöffnet werden';
$localstr['step3errorsql'] = 'Fehler bei der Installation :<br> SQL String: $sql<br> Bericht: ';
$localstr['step3installinfo'] = 'Wenn du dies hier lesen kannst, sind keine Fehler bei der Installation der SQL-Tabellen aufgetreten!';
$localstr['step3errorversion'] = 'Die Software-Version in version.php entsprich nicht der Version der Datenbank in der Version-Tabelle.';

//step 4
$localstr['step4auttype'] = 'Berechtigungsschema';
$localstr['step4desc'] = 'Beschreibung';
$localstr['step4desc_e107'] = 'e107 CMS System';
$localstr['step4desc_phpBB'] = 'phpBB2 oder phpBB3';
$localstr['step4desc_iums'] = 'integrierte Benutzer Management-System';
$localstr['step4desc_smf'] = 'Simple Machines Forum 1.x';
$localstr['step4desc_smf2'] = 'Simple Machines Forum 2.x';
$localstr['step4desc_wbb'] = 'WoltLab Burning Board Lite 1.x.x';
$localstr['step4desc_xoops'] = 'XOOPS';
$localstr['step4unkownauth'] = '(wenn sie sich nicht sicher sind, wähle bitte "iUMS")';
$localstr['step4chooseauth'] = 'Bitte wähle deine Berechtigungsschema aus.';

//--------------------------
// Auth.
//--------------------------
$localstr['step5failconWRM'] = 'Verbindung zur WRM Datenbank nicht möglich';
$localstr['step5selctusername'] = 'dieser Benutzer bekommt vollen Zugriff auf das WRM';
$localstr['step5sub1follval'] = 'Um die Installation abzuschließen füllen Sie bitte die folgenden Werte aus';
$localstr['step5done'] = 'fertig';
$localstr['step5sub2usernamefullperm'] = 'wählen bitte den Benutzer aus, der vollen Zugriff auf das WRM bekommt';
$localstr['step5sub3norest'] = 'Keine Einschränkung';
$localstr['step5sub3noaddus'] = 'Keine zusätzlichen Benutzergruppe';
$localstr['step5sub2failfindfile'] = 'konnte die Konfigurationsdatei nich finden:';
$localstr['step5sub2checkdir'] = 'überprüfe das Verzeichnis noch mal';
$localstr['step5sub3group01'] = 'Wählen die Benutzergruppe aus, welche Zugang zur Nutzung von WRM hat';
$localstr['step5sub3group02'] = 'Benutzter die nicht in dieser Benutzergruppe sind, ist es nicht möglich, sich anzumelden';
$localstr['step5sub3group03'] = 'Wenn du willst, dass alle Benutzer unabhängig von der Benutzergruppe sich im WRM anmelden können, wähle "Keine Einschränkung" aus.';
$localstr['step5sub3altgroup01'] = 'Wählen eine alternative Benutzergruppe aus, welcher den Zugang zu WRM auch erlaubt ist';
$localstr['step5sub3altgroup02'] = 'mit dieser alternativen Gruppe ist es dem Benutzer möglich, sich unabhngig davon anzumelden, ob sie in der oben genannten Benutzergruppe sind oder nicht ';

// phpBB
$localstr['step5phpBBdesc'] = 'phpBB';
$localstr['step5phpBBsub1desc'] = 'Du hast phpBB-Authentifizierung ausgewählt';
$localstr['step5phpBBsub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem phpBB-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$localstr['step5phpBBsub2failincdir'] = 'Ihre Angegebenes phpBB-Verzeichnis ist falsch';
$localstr['step5phpBBsub2failfindautfile'] = 'konnte die Konfigurationsdatei "../auth/auth_phpbb3.php" nicht finden';
$localstr['step5phpBBsub2faildownautfile'] = 'bitte lade sie dir herunter (von der WRM-Homepage) und kopiere sie nach "/auth".';
$localstr['step5phpBBsub2founddb'] = 'gefunden phpBB Datebank';
$localstr['step5phpBBsub2readconffile'] = 'lese phpBB Konfigurationsdatei';
$localstr['step5phpBBsub3errorretusergroup'] = 'Fehler beim Abrufen der Benutzergruppe aus der phpBB3 Datebank';
$localstr['step5phpBBsub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der phpBB3 Datebank';
$localstr['step5phpBBsub4wantimport'] = 'möchten sie alle Benutzter aus dem phpBB Forum/Board importieren';
$localstr['step5phpBBsub4srynotsupport'] = 'Endschuldigung: der Import, der Benutzer aus dem phpBB Forum/Board: wird mit phpBB2 nicht unterstützt';
$localstr['step5phpBBsub5import'] = 'Import';
$localstr['step5phpBBfailconphpBB'] = 'Verbindung zur phpBB Datenbank nicht möglich';

// e107
$localstr['step5e107desc'] = 'e107';
$localstr['step5e107sub1desc'] = 'Du hast e107-Authentifizierung ausgewählt';
$localstr['step5e107sub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem e107-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$localstr['step5e107sub2failincdir'] = 'Ihre Angegebenes e107-Verzeichnis ist falsch';
$localstr['step5e107sub2readconffile'] = 'lese e107 Konfigurationsdatei';
$localstr['step5e107sub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der e107 Datebank';
$localstr['step5e107sub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der e107 Datebank';
$localstr['step5e107failcone107'] = 'Verbindung zur e107 Datenbank nicht möglich';

// iums = integrated User Management System
$localstr['step5iumsdesc'] = 'integrierte Benutzer Management-System';
$localstr['step5iumssub1desc'] = 'Du hast "integrierte Benutzer Management-System"-Authentifizierung ausgewählt';
$localstr['step5sub1iumsfilladmindesc'] = 'füllen sie alle Werte für denn Benutzter des Super Administrator aus.';

// Joomla germany
$localstr['step5joomladesc'] = 'Joomla';
$localstr['step5joomlasub1desc'] = 'Du hast Joomla-Authentifizierung ausgewählt';
$localstr['step5joomlasub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem Joomla-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$localstr['step5joomlasub2failincdir'] = 'Ihre Angegebenes Joomla-Verzeichnis ist falsch';
$localstr['step5joomlasub2readconffile'] = 'lese Joomla Konfigurationsdatei';
$localstr['step5joomlasub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der Joomla Datebank';
$localstr['step5joomlasub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der Joomla Datebank';
$localstr['step5joomlafailconejoomla'] = 'Verbindung zur Joomla Datenbank nicht möglich';

// SMF = Simple Machines Forum
$localstr['step5smfdesc'] = 'SMF';
$localstr['step5smfsub1desc'] = 'Du hast SMF-Authentifizierung ausgewählt';
$localstr['step5smfsub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem SMF-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$localstr['step5smfsub2failincdir'] = 'Ihre Angegebenes SMF-Verzeichnis ist falsch';
$localstr['step5smfsub2readconffile'] = 'lese SMF Konfigurationsdatei';
$localstr['step5smfsub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der SMF Datebank';
$localstr['step5smfsub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der SMF Datebank';
$localstr['step5smffailconesmf'] = 'Verbindung zur SMF Datenbank nicht möglich';

// WoltLab Burning Board Lite 1.x.x = wbb
$localstr['step5wbbdesc'] = 'WoltLab Burning Board';
$localstr['step5wbbsub1desc'] = 'Du hast WBB-Authentifizierung ausgewählt';
$localstr['step5wbbsub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem WBB-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$localstr['step5wbbsub2failincdir'] = 'Ihre Angegebenes WBB-Verzeichnis ist falsch';
$localstr['step5wbbsub2readconffile'] = 'lese WBB Konfigurationsdatei';
$localstr['step5wbbsub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der WBB Datebank';
$localstr['step5wbbsub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der WBB Datebank';
$localstr['step5wbbfailconesmf'] = 'Verbindung zur WoltLab Burning Board Datenbank nicht möglich';

// XOOPS
$localstr['step5xoopsdesc'] = 'XOOPS';
$localstr['step5xoopssub1desc'] = 'Du hast XOOPS-Authentifizierung ausgewählt';
$localstr['step5xoopssub1inputdir'] = 'Geben Sie den relativen Pfad zu Ihrem XOOPS-Verzeichnis ein (einschließlich des abschließenden Schrägstriches!)';
$localstr['step5xoopssub2failincdir'] = 'Ihre Angegebenes XOOPS-Verzeichnis ist falsch';
$localstr['step5xoopssub2readconffile'] = 'lese XOOPS Konfigurationsdatei';
$localstr['step5xoopssub3errorretusername'] = 'Fehler beim Abrufen des Benutzernamen aus der XOOPS Datebank';
$localstr['step5xoopssub3errorretuserclass'] = 'Fehler beim Abrufen der Benutzergruppe aus der XOOPS Datebank';
$localstr['step5xoopsfailconesmf'] = 'Verbindung zur XOOPS Datenbank nicht möglich';

//----------------------------------------------
//step done
$localstr['stepdonefinished'] = 'Fertig';
$localstr['stepdonesetupcomplete'] = 'Das Setup ist nun komplett.';
$localstr['stepdoneremovedir'] = 'Löschen Sie bitte das "install/" Verzeichnis und klicken sie anschliessend <a href="../index.php">hier</a> drauf wenn sie fertig sind.';

?>