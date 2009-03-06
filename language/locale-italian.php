<?php
//
//italian install strings
//
global $localstr;
$localstr['headtitle'] = 'Installazione di WRM 4.x.x.';
//$localstr['headbodyinfo'] = 'Attenzione: il database sul quale verrà effettuata l\'installazione dev\'essere già esistente.';
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
$localstr['freshinstall'] = 'Nuova installazione';

//menu
$localstr['InstallationProgress'] = 'Avanzamento dell\'installazione';
$localstr['menustep1init'] = '1. Inizializzazione';
$localstr['menustep2conf'] = '2. Configurazione';
$localstr['menustep3instab'] = '3. Creazione tabelle';
$localstr['menustep4auth'] = '4. Utenti';
$localstr['menustep5confauth'] = '5. Config. Utenti';
$localstr['menustep6final'] = '6. Completamento dell\'installazione';

//botton
$localstr['bd_submit'] = 'Continua';
$localstr['bd_reset'] = 'Reset';
$wrm_install_lang['bd_back'] = 'Back';

//stuff
$localstr['hittingsubmit'] = 'Verifica la correttezza di tutte le informazioni inserite prima di proseguire!';
$localstr['pressbrowserpack'] = 'Utilizza il pulsante INDIETRO del browser per riprovare.';
$localstr['problem'] ='Problema';
$localstr['txtusername'] = 'Username';
$localstr['txtpassword'] = 'Password';
$localstr['txtemail'] = 'E-mail';
$localstr['txtconfig'] = 'Configurazione';

//step 2
$localstr['step2upgradefrom'] = 'Aggiornamento di';
$localstr['step2dbname'] = 'Database MySQL';
$localstr['step2dbserverhostname'] = 'Indirizzo del server MySQL';
$localstr['step2dbserverusername'] = 'Username del server MySQL';
$localstr['step2dbserverpwd'] = 'Password del server MySQL';
$localstr['step2WRMtableprefix'] = 'Prefisso delle tabelle di WRM';
$localstr['step2installtype'] = 'Tipo di installazione';
$localstr['step2error01'] = 'Informazioni errate potrebbero causare errori non prevedibili per i quali non verrà fornita assistenza!';

//step 3
$localstr['step3errordbcon'] = 'Errore di connessione al database.'; 
$localstr['step3errorschema'] = 'Errore durante l\'aggiornamento';
$localstr['step3errorsql'] = 'Errore d\'installazione<br>Query: $sql<br>Riportato: ';
$localstr['step3installinfo'] = 'Tabelle create correttamente!';
$localstr['step3errorversion'] = 'La versione del software in version.php non combacia con la versione del database nella tabella delle versioni.';

//step 4
$localstr['step4auttype'] = 'Tipo di autenticazione';
$localstr['step4desc'] = 'Descrizione';
$localstr['step4desc_e107'] = 'Portale e107';
$localstr['step4desc_phpBB'] = 'phpBB2/phpBB3';
$localstr['step4desc_iums'] = 'Sistema di gestione Utenti integrato';
$localstr['step4desc_smf'] = 'Simple Machines Forum 1.x';
$localstr['step4desc_smf2'] = 'Simple Machines Forum 2.x';
$localstr['step4desc_wbb'] = 'WoltLab Burning Board Lite 1.x.x';
$localstr['step4desc_xoops'] = 'XOOPS';
$localstr['step4unkownauth'] = '(in caso di incertezza, selezionare il sistema di gestione Utenti integrato)';
$localstr['step4chooseauth'] = 'Seleziona uno dei tipi di autenticazione.';

// errors
$phprlang['connect_socked_error'] = 'Errore di connessione: %s';
$phprlang['invalid_group_title'] = 'Team gi presente';
$phprlang['invalid_group_message'] = 'Il Team selezionato  gi stato inserito. Torna indietro e riprova.';
$phprlang['invalid_option_title'] = 'Dati non validi';
$phprlang['invalid_option_msg'] = 'Sono stati forniti dati non validi per questa pagina.';
$phprlang['no_user_msg'] = 'L\'Utente richiesto non esiste o  stato cancellato.';
$phprlang['no_user_title'] = 'Utente non valido';
$phprlang['print_error_critical'] = 'un errore critico!';
$phprlang['print_error_details'] = 'Dettagli';
$phprlang['print_error_minor'] = 'un errore!';
$phprlang['print_error_msg_begin'] = 'Spiacente, WowRaidManager ha riscontrato ';
$phprlang['print_error_msg_end'] = 'Se l\'errore persiste, segnalalo ad un Amministratore, grazie!';
$phprlang['print_error_page'] = 'Pagina';
$phprlang['print_error_query'] = 'Richiesta';
$phprlang['print_error_title'] = 'Oh oh! Errore!';

//--------------------------
// Auth.
//--------------------------
$wrm_install_lang['step5failconWRM'] = 'Impossibile connettersi al database di WRM';
$wrm_install_lang['step5selctusername'] = 'Assegna pieni permessi allo username selezionato';
$wrm_install_lang['step5sub1follval'] = 'Per completare l\'installazione, compila i seguenti campi';
$wrm_install_lang['step5done'] = 'fatto';
$wrm_install_lang['step5sub2usernamefullperm'] = 'Seleziona a quale username verranno garantiti pieni permessi in WowRaidManager';
$wrm_install_lang['step5sub3norest'] = 'Nessuna restrizione';
$wrm_install_lang['step5sub3noaddus'] = 'Nessun altro gruppo';
$wrm_install_lang['step5sub2failfindfile'] = 'File di configurazione non trovato:';
$wrm_install_lang['step5sub2checkdir'] = 'controlla nuovamente la cartella';
$wrm_install_lang['step5sub3group01'] = 'Seleziona il gruppo base di Utenti ai quali consentire l\'accesso a WRM';
$wrm_install_lang['step5sub3group02'] = 'Gli Utenti al di fuori di questo gruppo non avranno accesso a WRM';
$wrm_install_lang['step5sub3group03'] = 'Seleziona "Nessuna restrizione" per consentire l\'accesso a WRM a tutti gli Utenti indipendentemente dai gruppi di appartenenza';
$wrm_install_lang['step5sub3altgroup01'] = 'Seleziona un ulteriore gruppo di Utenti ai quali consentire l\'accesso a WRM';
$wrm_install_lang['step5sub3altgroup02'] = 'Agli Utenti appartenenti a questo gruppo sarà consentito l\'accesso a WRM indipendentemente dall\'appartenenza anche all\'altro gruppo specificato';

// phpBB
$wrm_install_lang['step5phpBBdesc'] = 'phpBB';
$wrm_install_lang['step5phpBBsub1desc'] = 'Hai selezionato l\'autenticazione phpBB';
$wrm_install_lang['step5phpBBsub1inputdir'] = 'Percorso della cartella base di phpBB (relativo alla cartella di WRM, inclusa la barra finale!)';
$wrm_install_lang['step5phpBBsub2failincdir'] = 'il percorso della cartella di phpBB è arrato';
$wrm_install_lang['step5phpBBsub2failfindautfile'] = 'Impossibile trovare il file di configurazione "../auth/auth_phpbb3.php"';
$wrm_install_lang['step5phpBBsub2faildownautfile'] = 'scaricalo (dal sito ufficiale di WRM) e copialo in "/auth".';
$wrm_install_lang['step5phpBBsub2founddb'] = 'Trovato il database di phpBB';
$wrm_install_lang['step5phpBBsub2readconffile'] = 'Lettura del file di configurazione di phpBB';
$wrm_install_lang['step5phpBBsub3errorretusergroup'] = 'Errore durante la lettura dei gruppi Utenti di phpBB3';
$wrm_install_lang['step5phpBBsub3errorretusername'] = 'Errore durante la lettura degli username di phpBB3';
$wrm_install_lang['step5phpBBsub4wantimport'] = 'Vuoi importare tutti gli Utenti di phpBB?';
$wrm_install_lang['step5phpBBsub4srynotsupport'] = 'Importazione da phpBB2 non supportata';
$wrm_install_lang['step5phpBBsub5import'] = 'Importa';
$wrm_install_lang['step5phpBBfailconphpBB'] = 'Impossibile connettersi al database di phpBB';

// e107
$wrm_install_lang['step5e107desc'] = 'e107';
$wrm_install_lang['step5e107sub1desc'] = 'Hai selezionato l\'autenticazione e107';
$wrm_install_lang['step5e107sub1inputdir'] = 'Percorso della cartella base di e107 (relativo alla cartella di WRM, inclusa la barra finale!)';;
$wrm_install_lang['step5e107sub2failincdir'] = 'il percorso della cartella di e107 è arrato';
$wrm_install_lang['step5e107sub2readconffile'] = 'Lettura del file di configurazione di e107';
$wrm_install_lang['step5e107sub3errorretusername'] = 'Errore durante la lettura degli username di e107';
$wrm_install_lang['step5e107sub3errorretuserclass'] = 'Errore durante la lettura dei gruppi Utenti di e107';
$wrm_install_lang['step5e107failcone107'] = 'Impossibile connettersi al database di e107';

// iums = integrated User Management System
$wrm_install_lang['step5iumsdesc'] = 'Sistema di gestione Utenti integrato';
$wrm_install_lang['step5iumssub1desc'] = 'Hai selezionato l\'autenticazione attraverso il sistema di gestione Utenti integrato';
$wrm_install_lang['step5sub1iumsfilladmindesc'] = 'Inserisci i dati per il profilo di Super Admin.';

// Joomla
$wrm_install_lang['step5joomladesc'] = 'Joomla';
$wrm_install_lang['step5joomlasub1desc'] = 'Hai selezionato l\'autenticazione Joomla';
$wrm_install_lang['step5joomlasub1inputdir'] = 'Percorso della cartella base di Joomla (relativo alla cartella di WRM, inclusa la barra finale!)';
$wrm_install_lang['step5joomlasub2failincdir'] = 'il percorso della cartella di Joomla è arrato';
$wrm_install_lang['step5joomlasub2readconffile'] = 'Lettura del file di configurazione di Joomla';
$wrm_install_lang['step5joomlasub3errorretusername'] = 'Errore durante la lettura degli username di Joomla';
$wrm_install_lang['step5joomlasub3errorretuserclass'] = 'Errore durante la lettura dei gruppi Utenti di Joomla';
$wrm_install_lang['step5joomlafailconejoomla'] = 'Impossibile connettersi al database di Joomla';

// SMF = Simple Machines Forum
$wrm_install_lang['step5smfdesc'] = 'Simple Machines Forum (SMF)';
$wrm_install_lang['step5smfsub1desc'] = 'Hai selezionato l\'autenticazione SMF';
$wrm_install_lang['step5smfsub1inputdir'] = 'Percorso della cartella base di SMF (relativo alla cartella di WRM, inclusa la barra finale!)';
$wrm_install_lang['step5smfsub2failincdir'] = 'il percorso della cartella di SMF è arrato';
$wrm_install_lang['step5smfsub2readconffile'] = 'Lettura del file di configurazione di SMF';
$wrm_install_lang['step5smfsub3errorretusername'] = 'Errore durante la lettura degli username di SMF';
$wrm_install_lang['step5smfsub3errorretuserclass'] = 'Errore durante la lettura dei gruppi Utenti di SMF';
$wrm_install_lang['step5smffailconesmf'] = 'Impossibile connettersi al database di SMF';

// WoltLab Burning Board Lite 1.x.x = wbb
$wrm_install_lang['step5wbbdesc'] = 'WoltLab Burning Board';
$wrm_install_lang['step5wbbsub1desc'] = 'Hai selezionato l\'autenticazione WBB';
$wrm_install_lang['step5wbbsub1inputdir'] = 'Percorso della cartella base di WBB (relativo alla cartella di WRM, inclusa la barra finale!)';
$wrm_install_lang['step5wbbsub2failincdir'] = 'il percorso della cartella di WBB è arrato';
$wrm_install_lang['step5wbbsub2readconffile'] = 'Lettura del file di configurazione di WBB';
$wrm_install_lang['step5wbbsub3errorretusername'] = 'Errore durante la lettura degli username di WBB';
$wrm_install_lang['step5wbbsub3errorretuserclass'] = 'Errore durante la lettura dei gruppi Utenti di WBB';
$wrm_install_lang['step5wbbfailconesmf'] = 'Impossibile connettersi al database di WBB';

// XOOPS
$wrm_install_lang['step5xoopsdesc'] = 'XOOPS';
$wrm_install_lang['step5xoopssub1desc'] = 'Hai selezionato l\'autenticazione XOOPS';
$wrm_install_lang['step5xoopssub1inputdir'] = 'Percorso della cartella base di XOOPS (relativo alla cartella di WRM, inclusa la barra finale!)';
$wrm_install_lang['step5xoopssub2failincdir'] = 'il percorso della cartella di XOOPS è arrato';
$wrm_install_lang['step5xoopssub2readconffile'] = 'Lettura del file di configurazione di XOOPS';
$wrm_install_lang['step5xoopssub3errorretusername'] = 'Errore durante la lettura degli username di XOOPS';
$wrm_install_lang['step5xoopssub3errorretuserclass'] = 'Errore durante la lettura dei gruppi Utenti di XOOPS';
$wrm_install_lang['step5xoopsfailconesmf'] = 'Impossibile connettersi al database di XOOPS';

//----------------------------------------------
//step 6
$wrm_install_lang['stepdonefinished'] = 'Finito';
$wrm_install_lang['stepdonesetupcomplete'] = 'Installazione completata.';
$wrm_install_lang['stepdoneremovedir'] = 'Rimuovi la cartella "install/" e clicka <a href="../index.php">qui</a> dopo averlo fatto.';
?>
