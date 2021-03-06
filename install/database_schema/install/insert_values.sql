
-- Class Data
INSERT INTO `wrm_classes` VALUES ('Death Knight', 'dk', 'deathknight', 'images/classes/deathknight_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Druid', 'dr', 'druid', 'images/classes/druid_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Hunter', 'hu', 'hunter', 'images/classes/hunter_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Mage', 'ma', 'mage', 'images/classes/mage_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Paladin', 'pa', 'paladin', 'images/classes/paladin_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Priest', 'pr', 'priest', 'images/classes/priest_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Rogue', 'ro', 'rogue', 'images/classes/rogue_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Shaman', 'sh', 'shaman', 'images/classes/shaman_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Warlock', 'wk', 'warlock', 'images/classes/warlock_icon.gif');
INSERT INTO `wrm_classes` VALUES ('Warrior', 'wa', 'warrior', 'images/classes/warrior_icon.gif');


-- Race/Class Linking Data
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Mage');
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Shaman');
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Paladin');
INSERT INTO `wrm_class_race` VALUES ('Draenei', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Dwarf', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Dwarf', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Dwarf', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Dwarf', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Dwarf', 'Paladin');
INSERT INTO `wrm_class_race` VALUES ('Dwarf', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Mage');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Warlock');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Paladin');
INSERT INTO `wrm_class_race` VALUES ('Human', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Gnome', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Gnome', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Gnome', 'Mage');
INSERT INTO `wrm_class_race` VALUES ('Gnome', 'Warlock');
INSERT INTO `wrm_class_race` VALUES ('Gnome', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Night Elf', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Night Elf', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Night Elf', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Night Elf', 'Druid');
INSERT INTO `wrm_class_race` VALUES ('Night Elf', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Night Elf', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Mage');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Warlock');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Paladin');
INSERT INTO `wrm_class_race` VALUES ('Blood Elf', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Orc', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Orc', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Orc', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Orc', 'Warlock');
INSERT INTO `wrm_class_race` VALUES ('Orc', 'Shaman');
INSERT INTO `wrm_class_race` VALUES ('Orc', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Tauren', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Tauren', 'Druid');
INSERT INTO `wrm_class_race` VALUES ('Tauren', 'Shaman');
INSERT INTO `wrm_class_race` VALUES ('Tauren', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Tauren', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Mage');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Hunter');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Shaman');
INSERT INTO `wrm_class_race` VALUES ('Troll', 'Death Knight');
INSERT INTO `wrm_class_race` VALUES ('Undead', 'Priest');
INSERT INTO `wrm_class_race` VALUES ('Undead', 'Rogue');
INSERT INTO `wrm_class_race` VALUES ('Undead', 'Warrior');
INSERT INTO `wrm_class_race` VALUES ('Undead', 'Mage');
INSERT INTO `wrm_class_race` VALUES ('Undead', 'Warlock');
INSERT INTO `wrm_class_race` VALUES ('Undead', 'Death Knight');


-- Class and Role Link Data
INSERT INTO `wrm_class_role` VALUES ('Priest', 'Discipline', 'disc', 'role3');
INSERT INTO `wrm_class_role` VALUES ('Priest', 'Holy', 'holy', 'role3');
INSERT INTO `wrm_class_role` VALUES ('Priest', 'Shadow', 'shadow', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Rogue', 'Assassination', 'assassination', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Rogue', 'Combat', 'combat', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Rogue', 'Subtlety', 'subtlety', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Warrior', 'Arms', 'arms', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Warrior', 'Fury', 'fury', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Warrior', 'Protection', 'prot', 'role1');
INSERT INTO `wrm_class_role` VALUES ('Mage', 'Arcane', 'arcane', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Mage', 'Fire', 'fire', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Mage', 'Frost', 'frost', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Druid', 'Balance', 'balance', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Druid', 'Feral (Cat)', 'cat', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Druid', 'Feral (Bear)', 'bear', 'role1');
INSERT INTO `wrm_class_role` VALUES ('Druid', 'Restoration', 'resto', 'role3');
INSERT INTO `wrm_class_role` VALUES ('Hunter', 'Beast Mastery', 'bm', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Hunter', 'Marksmanship', 'marks', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Hunter', 'Survival', 'survival', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Warlock', 'Affliction', 'affliction', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Warlock', 'Demonology', 'demon', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Warlock', 'Destruction', 'destro', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Shaman', 'Elemental', 'elemental', 'role4');
INSERT INTO `wrm_class_role` VALUES ('Shaman', 'Enhancement', 'enhance', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Shaman', 'Restoration', 'resto', 'role3');
INSERT INTO `wrm_class_role` VALUES ('Paladin', 'Holy', 'holy', 'role3');
INSERT INTO `wrm_class_role` VALUES ('Paladin', 'Protection', 'prot', 'role1');
INSERT INTO `wrm_class_role` VALUES ('Paladin', 'Retribution', 'ret', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Death Knight', 'Blood (Tank)', 'blood_tank', 'role1');
INSERT INTO `wrm_class_role` VALUES ('Death Knight', 'Blood (Melee)', 'blood_melee', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Death Knight', 'Frost (Tank)', 'frost_tank', 'role1');
INSERT INTO `wrm_class_role` VALUES ('Death Knight', 'Frost (Melee)', 'frost_melee', 'role2');
INSERT INTO `wrm_class_role` VALUES ('Death Knight', 'Unholy (Tank)', 'unholy_tank', 'role1');
INSERT INTO `wrm_class_role` VALUES ('Death Knight', 'Unholy (Melee)', 'unholy_melee', 'role2');


-- Column Header Data - Raids1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Date', '1', '2', NULL, 'date', 'wrmdate');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Dungeon', '1', '3', NULL, 'raids_dungeon', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Invite Time', '1', '4', NULL, 'invite_time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Start Time', '1', '5', NULL, 'start_time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Creator', '1', '6', NULL, 'officer', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', '@class', '1', '7', NULL, NULL, NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', '@role', '1', '17', NULL, NULL, NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Totals', '1', '23', NULL, 'totals', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raids1', 'Buttons', '1', '24', NULL, 'buttons', NULL);
-- Column Header Data - Index1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Signup', '1', '1', NULL, 'signup', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'ID', '1', '2', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Date', '1', '3', NULL, 'date', 'wrmdate');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Dungeon', '1', '4', NULL, 'raids_dungeon', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Invite Time', '1', '5', NULL, 'invite_time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Start Time', '1', '6', NULL, 'start_time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Creator', '1', '7', NULL, 'officer', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', '@class', '1', '8', NULL, NULL, NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', '@role', '1', '18', NULL, NULL, NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'index1', 'Totals', '1', '24', NULL, 'totals', NULL);
-- Column Header Data - Announcements1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'Title', '1', '2', NULL, 'title', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'Message', '1', '3', NULL, 'message', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'Posted By', '1', '4', NULL, 'posted_by', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'Create Date', '1', '5', NULL, 'create_date', 'wrmdate');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'Create Time', '1', '6', NULL, 'create_time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'announcements1', 'Buttons', '1', '7', NULL, 'buttons', NULL);
-- Column Header Data - DKP1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'Class', '1', '3', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'Earned', '1', '4', NULL, 'earned', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'Spent', '1', '5', NULL, 'spent', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'Adjustment', '1', '6', NULL, 'adjustment', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'dkp1', 'DKP', '1', '7', NULL, 'dkp', NULL);
-- Column Header Data - Team1 View (Remove)
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'Class', '1', '3', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'Guild', '1', '4', NULL, 'guild', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'Level', '1', '5', NULL, 'level', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'Team Name', '1', '6', NULL, 'team_name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team1', 'Buttons', '1', '7', NULL, 'buttons', NULL);
-- Column Header Data - Team2 View (Add)
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team2', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team2', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team2', 'Class', '1', '3', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team2', 'Guild', '1', '4', NULL, 'guild', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team2', 'Level', '1', '5', NULL, 'level', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'team2', 'Add To Team', '1', '7', NULL, 'add_to_team', NULL);
-- Column Header Data - Guild1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'guild1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'guild1', 'Guild Name', '1', '2', NULL, 'guild_name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'guild1', 'Guild Tag', '1', '3', NULL, 'guild_tag', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'guild1', 'Guild Master', '1', '4', NULL, 'guild_master', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'guild1', 'Buttons', '1', '5', NULL, 'buttons', NULL);
-- Column Header Data - Location1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Dungeon', '1', '3', NULL, 'raids_dungeon', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Event Type', '1', '4', NULL, 'raids_eventtype_text', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Min Level', '1', '5', NULL, 'min_lvl', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Max Level', '1', '6', NULL, 'max_lvl', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', '@class', '1', '7', NULL, NULL, NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', '@role', '1', '17', NULL, NULL, NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Raid Max', '1', '23', NULL, 'max_raiders', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Locked', '1', '24', NULL, 'locked_header', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'location1', 'Buttons', '1', '25', NULL, 'buttons', NULL);
-- Column Header Data - Char1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Guild', '1', '3', NULL, 'guild', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Level', '1', '4', NULL, 'level', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Race', '1', '5', NULL, 'race', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Class', '1', '6', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Arcane', '1', '7', '/images/resistances/arcane_resistance.gif', 'arcane', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Fire', '1', '8', '/images/resistances/fire_resistance.gif', 'fire', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Frost', '1', '9', '/images/resistances/frost_resistance.gif', 'frost', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Nature', '1', '10', '/images/resistances/nature_resistance.gif', 'nature', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Shadow', '1', '11', '/images/resistances/shadow_resistance.gif', 'shadow', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Pri_Spec', '1', '12', NULL, 'pri_spec', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Sec_Spec', '1', '13', NULL , 'sec_spec', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'char1', 'Buttons', '1', '14', NULL, 'buttons', NULL);
-- Column Header Data - Users1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'Username', '1', '2', NULL, 'username', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'E-Mail', '1', '3', NULL, 'email', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'Privileges', '1', '4', NULL, 'priv', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'Last Login Date', '1', '5', NULL, 'last_login_date', 'wrmdate');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'Last Login Time', '1', '6', NULL, 'last_login_time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'users1', 'Buttons', '1', '7', NULL, 'buttons', NULL);
-- Column Header Data - roster1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Guild', '1', '3', NULL, 'guild', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Level', '1', '4', NULL, 'level', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Race', '1', '5', NULL, 'race', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Class', '1', '6', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Arcane', '1', '7', '/images/resistances/arcane_resistance.gif', 'arcane', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Fire', '1', '8', '/images/resistances/fire_resistance.gif', 'fire', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Frost', '1', '9', '/images/resistances/frost_resistance.gif', 'frost', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Nature', '1', '10', '/images/resistances/nature_resistance.gif', 'nature', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Shadow', '1', '11', '/images/resistances/shadow_resistance.gif', 'shadow', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Role', '1', '12', NULL, 'role', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'roster1', 'Profile', '1', '13', NULL, 'profile', NULL);
-- Column Header Data - Permissions1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Description', '1', '3', NULL, 'Description', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'An', '1', '4', NULL, 'announcements', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Co', '1', '5', NULL, 'configuration', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Gu', '1', '6', NULL, 'guilds', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Lo', '1', '7', NULL, 'locations', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Lg', '1', '8', NULL, 'logs', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Pe', '1', '9', NULL, 'permissions', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Pr', '1', '10', NULL, 'profile', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Us', '1', '11', NULL, 'users', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Ra', '1', '12', NULL, 'raids', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions1', 'Buttons', '1', '13', NULL, 'buttons', NULL);
-- Column Header Data - Permissions2 View - User Details
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions2', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions2', 'Username', '1', '2', NULL, 'username', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions2', 'E-Mail', '1', '3', NULL, 'email', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'permissions2', 'Buttons', '1', '4', NULL, 'buttons', NULL);
-- Column Header Data - raidview1 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Guild', '1', '3', NULL, 'guild', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Comments', '1', '4', NULL, 'comments', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Team Name', '1', '5', NULL, 'team_name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Level', '1', '6', NULL, 'level', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Race', '1', '7', NULL, 'race', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Class', '1', '8', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Pri_Spec', '1', '9', NULL, 'pri_spec', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Sec_Spec', '1', '10', NULL, 'sec_spec', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Arcane', '1', '11', '/images/resistances/arcane_resistance.gif', 'arcane', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Fire', '1', '12', '/images/resistances/fire_resistance.gif', 'fire', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Nature', '1', '13', '/images/resistances/nature_resistance.gif', 'nature', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Frost', '1', '14', '/images/resistances/frost_resistance.gif', 'frost', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Shadow', '1', '15', '/images/resistances/shadow_resistance.gif', 'shadow', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Date', '1', '16', NULL, 'date', 'wrmdate');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Time', '1', '17', NULL, 'time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview1', 'Buttons', '1', '18', NULL, 'buttons', NULL);
-- Column Header Data - raidview2 View
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'ID', '1', '1', NULL, 'id', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Name', '1', '2', NULL, 'name', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Guild', '1', '3', NULL, 'guild', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Comments', '1', '4', NULL, 'comments', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Level', '1', '6', NULL, 'level', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Race', '1', '7', NULL, 'race', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Class', '1', '8', NULL, 'class', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Date', '1', '9', NULL, 'date', 'wrmdate');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Time', '1', '10', NULL, 'time', 'wrmtime');
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Role', '1', '11', NULL, 'role', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Signup_Spec', '1', '12', NULL, 'signup_spec', NULL);
INSERT INTO `wrm_column_headers` ( `ID` , `view_name` , `column_name` , `visible` , `position`, `img_url`, `lang_idx_hdr`, `format_code`)
VALUES (NULL , 'raidview2', 'Buttons', '1', '13', NULL, 'buttons', NULL);
-- So as not to have to add a 0 or 1 on to the end of everything above, we'll do this separately.
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='raids1' AND `column_name` = 'Date' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='index1' AND `column_name` = 'Date' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='announcements1' AND `column_name` = 'ID' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='dkp1' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='team1' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='team2' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='guild1' AND `column_name` = 'Guild Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='location1' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='char1' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='users1' AND `column_name` = 'Username' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='roster1' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='permissions1' AND `column_name` = 'ID' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='permissions2' AND `column_name` = 'Username' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='raidview1' AND `column_name` = 'Name' LIMIT 1 ;
UPDATE `wrm_column_headers` SET `default_sort` = '1' WHERE `view_name`='raidview2' AND `column_name` = 'Name' LIMIT 1 ;


-- Config Table Data
INSERT INTO `wrm_config` VALUES ('admin_email','webmaster@yourdomain.com');
INSERT INTO `wrm_config` VALUES ('anon_view', '1');
INSERT INTO `wrm_config` VALUES ('auto_queue','0');
INSERT INTO `wrm_config` VALUES ('date_format','m/d/Y');
INSERT INTO `wrm_config` VALUES ('debug','0');
INSERT INTO `wrm_config` VALUES ('default_group','2');
INSERT INTO `wrm_config` VALUES ('disable','0');
INSERT INTO `wrm_config` VALUES ('disable_freeze','0');
INSERT INTO `wrm_config` VALUES ('dst','0');
INSERT INTO `wrm_config` VALUES ('email_signature','Thanks');
INSERT INTO `wrm_config` VALUES ('faction','alliance');
INSERT INTO `wrm_config` VALUES ('guild_description','raid management made easy');
INSERT INTO `wrm_config` VALUES ('guild_name','WoW Raid Manager');
INSERT INTO `wrm_config` VALUES ('guild_server','Illidan');
INSERT INTO `wrm_config` VALUES ('header_link','http://www.yourdomain.com/');
INSERT INTO `wrm_config` VALUES ('header_logo','templates/default/images/logo_phpRaid.jpg');
INSERT INTO `wrm_config` VALUES ('language','english');
INSERT INTO `wrm_config` VALUES ('multiple_signups','0');
INSERT INTO `wrm_config` VALUES ('phpraid_addon_link','http://www.wowraidmanager.net');
INSERT INTO `wrm_config` VALUES ('armory_link','http://www.wowarmory.com');
INSERT INTO `wrm_config` VALUES ('armory_language','us');
INSERT INTO `wrm_config` VALUES ('register_url','register.php');
INSERT INTO `wrm_config` VALUES ('roster_integration','0');
INSERT INTO `wrm_config` VALUES ('show_id','0');
INSERT INTO `wrm_config` VALUES ('showphpraid_addon','1');
INSERT INTO `wrm_config` VALUES ('template','default');
INSERT INTO `wrm_config` VALUES ('time_format','h:i a');
INSERT INTO `wrm_config` VALUES ('timezone','-0600');
INSERT INTO `wrm_config` VALUES ('resop', '0');
INSERT INTO `wrm_config` VALUES ('enable_five_man', '1');
INSERT INTO `wrm_config` VALUES ('user_queue_promote', '0');
INSERT INTO `wrm_config` VALUES ('user_queue_comments', '1');
INSERT INTO `wrm_config` VALUES ('user_queue_cancel', '1');
INSERT INTO `wrm_config` VALUES ('user_queue_delete', '1');
INSERT INTO `wrm_config` VALUES ('user_cancel_queue', '1');
INSERT INTO `wrm_config` VALUES ('user_cancel_promote', '0');
INSERT INTO `wrm_config` VALUES ('user_cancel_comments', '1');
INSERT INTO `wrm_config` VALUES ('user_cancel_delete', '0');
INSERT INTO `wrm_config` VALUES ('user_drafted_queue', '1');
INSERT INTO `wrm_config` VALUES ('user_drafted_comments', '1');
INSERT INTO `wrm_config` VALUES ('user_drafted_cancel', '1');
INSERT INTO `wrm_config` VALUES ('user_drafted_delete', '0');
INSERT INTO `wrm_config` VALUES ('rl_queue_promote', '1');
INSERT INTO `wrm_config` VALUES ('rl_queue_comments', '1');
INSERT INTO `wrm_config` VALUES ('rl_queue_cancel', '0');
INSERT INTO `wrm_config` VALUES ('rl_queue_delete', '0');
INSERT INTO `wrm_config` VALUES ('rl_cancel_queue', '0');
INSERT INTO `wrm_config` VALUES ('rl_cancel_promote', '0');
INSERT INTO `wrm_config` VALUES ('rl_cancel_comments', '1');
INSERT INTO `wrm_config` VALUES ('rl_cancel_delete', '1');
INSERT INTO `wrm_config` VALUES ('rl_drafted_queue', '1');
INSERT INTO `wrm_config` VALUES ('rl_drafted_comments', '1');
INSERT INTO `wrm_config` VALUES ('rl_drafted_cancel', '0');
INSERT INTO `wrm_config` VALUES ('rl_drafted_delete', '0');
INSERT INTO `wrm_config` VALUES ('admin_queue_promote', '1');
INSERT INTO `wrm_config` VALUES ('admin_queue_comments', '1');
INSERT INTO `wrm_config` VALUES ('admin_queue_cancel', '0');
INSERT INTO `wrm_config` VALUES ('admin_queue_delete', '0');
INSERT INTO `wrm_config` VALUES ('admin_cancel_queue', '0');
INSERT INTO `wrm_config` VALUES ('admin_cancel_promote', '0');
INSERT INTO `wrm_config` VALUES ('admin_cancel_comments', '1');
INSERT INTO `wrm_config` VALUES ('admin_cancel_delete', '1');
INSERT INTO `wrm_config` VALUES ('admin_drafted_queue', '1');
INSERT INTO `wrm_config` VALUES ('admin_drafted_comments', '1');
INSERT INTO `wrm_config` VALUES ('admin_drafted_cancel', '0');
INSERT INTO `wrm_config` VALUES ('admin_drafted_delete', '0');
INSERT INTO `wrm_config` VALUES ('rss_site_url', 'http://localhost/phpraid');
INSERT INTO `wrm_config` VALUES ('rss_export_url', 'http://localhost/phpraid');
INSERT INTO `wrm_config` VALUES ('rss_feed_amt', '5');
INSERT INTO `wrm_config` VALUES ('armory_link','http://www.wowarmory.com');
INSERT INTO `wrm_config` VALUES ('armory_language','en');
INSERT INTO `wrm_config` VALUES ('enforce_role_limits', '1');
INSERT INTO `wrm_config` VALUES ('enforce_class_limits', '0');
INSERT INTO `wrm_config` VALUES ('class_as_min', '1');
INSERT INTO `wrm_config` VALUES ('enable_armory', '1');
INSERT INTO `wrm_config` VALUES ('enable_eqdkp', '0');
INSERT INTO `wrm_config` VALUES ('eqdkp_url', 'http://localhost/eqdkp');
INSERT INTO `wrm_config` VALUES ('ampm', '12');
INSERT INTO `wrm_config` VALUES ('raid_view_type','by_class');
INSERT INTO `wrm_config` VALUES ('records_per_page','25');
INSERT INTO `wrm_config` VALUES ('armory_cache_setting', 'none');


-- Event Table Data
INSERT INTO `wrm_events` (`event_id`, `zone_desc`, `max`, `exp_id`, `event_type_id`, `wow_name`, `icon_path`) VALUES
(1, 'Stormwind', 99, 1, 0, '', 'images/instances/Misc_Icons/LOC-Stormwind.jpg'),
(2, 'Thunder Bluff', 99, 1, 0, '', 'images/instances/Misc_Icons/LOC-Thunder-Bluff.jpg'),
(3, 'Silvermoon', 99, 2, 0, '', 'images/instances/Misc_Icons/LOC-Silvermoon.jpg'),
(4, 'Orgrimmar', 99, 1, 0, '', 'images/instances/Misc_Icons/LOC-Orgrimmar.jpg'),
(5, 'World Boss', 40, 0, 1, '', 'images/instances/Misc_Icons/40-World.jpg'),
(6, 'Undercity', 99, 1, 0, '', 'images/instances/Misc_Icons/LOC-Undercity.jpg'),
(7, 'Darnassus', 99, 1, 0, '', 'images/instances/Misc_Icons/LOC-Darnassus.jpg'),
(8, 'Ironforge', 99, 1, 0, '', 'images/instances/Misc_Icons/LOC-Ironforge.jpg'),
(9, 'Exodar', 99, 2, 0, '', 'images/instances/Misc_Icons/LOC-Exodar.jpg'),
(10, 'Dalaran', 99, 3, 0, '', 'images/instances/Misc_Icons/LOC-Dalaran.jpg'),
(11, 'Shattrath', 99, 2, 0, '', 'images/instances/Misc_Icons/LOC-Shattrath.jpg'),
(12, 'Halls of Stone', 5, 3, 2, 'Ulduar: Halls of Stone', 'images/instances/WotLK_Icons/5-Halls-Of-Stone.jpg'),
(13, 'Naxxramas', 10, 3, 1, 'Naxxramas', 'images/instances/WotLK_Icons/10-Naxxramas.jpg'),
(14, 'Nexus', 5, 3, 2, 'The Nexus', 'images/instances/WotLK_Icons/5-Nexus.jpg'),
(15, 'Oculus', 5, 3, 2, 'The Oculus', 'images/instances/WotLK_Icons/5-Oculus.jpg'),
(16, 'Utgarde Keep', 5, 3, 2, 'Utgarde Keep', 'images/instances/WotLK_Icons/5-Utgarde-Keep.jpg'),
(17, 'Eye of Eternity', 10, 3, 1, 'The Eye of Eternity', 'images/instances/WotLK_Icons/10-Eye-of-Eternity.jpg'),
(18, 'Ahn''Kahet', 5, 3, 2, 'Ahn''Kahet: The Old Kingdom', 'images/instances/WotLK_Icons/5-Ahn''Kahet.jpg'),
(19, 'Ahn''Kahet - Heroic', 5, 3, 2, 'Ahn''Kahet: The Old Kingdom', 'images/instances/WotLK_Icons/5-Ahn''Kahet-Heroic.jpg'),
(20, 'Azjol-Nerub - Heroic', 5, 3, 2, 'Azjol-Nerub', 'images/instances/WotLK_Icons/5-Azjol-Nerub-Heroic.jpg'),
(22, 'Eye of Eternity - Heroic', 25, 3, 1, 'The Eye of Eternity (Heroic)', 'images/instances/WotLK_Icons/25-Eye-of-Eternity.jpg'),
(24, 'Obsidian Sanctum', 10, 3, 1, 'The Obsidian Sanctum', 'images/instances/WotLK_Icons/10-Obsidian-Sanctum.jpg'),
(45, 'Mana Tombs - Heroic', 5, 2, 2, 'Auchindoun - Mana Tombs', 'images/instances/BC_Icons/5-Mana-Tombs-Heroic.jpg'),
(26, 'Oculus - Heroic', 5, 3, 2, 'The Oculus', 'images/instances/WotLK_Icons/5-Oculus-Heroic.jpg'),
(27, 'Violet Hold - Heroic', 5, 3, 2, 'Violet Hold', 'images/instances/WotLK_Icons/5-Violet-Hold-Heroic.jpg'),
(28, 'Obsidian Sanctum - Heroic', 25, 3, 1, 'The Obsidian Sanctum (Heroic)', 'images/instances/WotLK_Icons/25-Obsidian-Sanctum.jpg'),
(29, 'Halls Of Lightning - Heroic', 5, 3, 2, 'Ulduar: Halls of Lightning', 'images/instances/WotLK_Icons/5-Halls-Of-Lightning-Heroic.jpg'),
(30, 'Utgarde Keep - Heroic', 5, 3, 2, 'Utgarde Keep', 'images/instances/WotLK_Icons/5-Utgarde-Keep-Heroic.jpg'),
(31, 'Gundrak - Heroic', 5, 3, 2, 'Gun''Drak', 'images/instances/WotLK_Icons/5-Gundrak-Heroic.jpg'),
(32, 'Halls of Stone - Heroic', 5, 3, 2, 'Ulduar: Halls of Stone', 'images/instances/WotLK_Icons/5-Halls-Of-Stone-Heroic.jpg'),
(33, 'CoT: Culling of Stratholme', 5, 3, 2, 'Caverns of Time - The Culling of Stratholme', 'images/instances/WotLK_Icons/5-CoT-Strat.jpg'),
(34, 'Utgarde Pinnacle - Heroic', 5, 3, 2, 'Utgarde Pinnacle', 'images/instances/WotLK_Icons/5-Utgarde-Pinnacle-Heroic.jpg'),
(35, 'Azjol-Nerub', 5, 3, 2, 'Azjol-Nerub', 'images/instances/WotLK_Icons/5-Azjol-Nerub.jpg'),
(36, 'Gun''drak', 5, 3, 2, 'Gun''Drak', 'images/instances/WotLK_Icons/5-Gundrak.jpg'),
(37, 'Drak''Tharon Keep - Heroic', 5, 3, 2, 'Drak''Tharon Keep', 'images/instances/WotLK_Icons/5-Drak''Tharon-Keep-Heroic.jpg'),
(38, 'Naxxramas - Heroic', 25, 3, 1, 'Naxxramas (Heroic)', 'images/instances/WotLK_Icons/25-Naxxramas.jpg'),
(39, 'Drak''Tharon Keep', 5, 3, 2, 'Drak''Tharon Keep', 'images/instances/WotLK_Icons/5-Drak''Tharon-Keep.jpg'),
(40, 'Halls Of Lightning', 5, 3, 2, 'Ulduar: Halls of Lightning', 'images/instances/WotLK_Icons/5-Halls-Of-Lightning.jpg'),
(41, 'Violet Hold', 5, 3, 2, 'Violet Hold', 'images/instances/WotLK_Icons/5-Violet-Hold.jpg'),
(42, 'Utgarde Pinnacle', 5, 3, 2, 'Utgarde Pinnacle', 'images/instances/WotLK_Icons/5-Utgarde-Pinnacle.jpg'),
(43, 'CoT: Culling of Stratholm - Heroic', 5, 3, 2, 'Caverns of Time - The Culling of Stratholme', 'images/instances/WotLK_Icons/5-CoT-Strat-Heroic.jpg'),
(44, 'Nexus - Heroic', 5, 3, 2, 'The Nexus', 'images/instances/WotLK_Icons/5-Nexus-Heroic.jpg'),
(46, 'CoT: Durnholde Keep', 5, 2, 2, 'Caverns of Time - Durnholde', 'images/instances/BC_Icons/5-CoT-Durnholde-Keep.jpg'),
(47, 'Steamvaults', 5, 2, 2, 'Coilfang - Steam Vaults', 'images/instances/BC_Icons/5-Steamvault.jpg'),
(48, 'Black Temple', 25, 2, 1, 'Black Temple', 'images/instances/BC_Icons/25-Black-Temple.jpg'),
(49, 'Shadow Labyrinth', 5, 2, 2, 'Auchindoun - Shadow Labyrinth', 'images/instances/BC_Icons/5-Shadow-Labyrinth.jpg'),
(50, 'Mechanar - Heroic', 5, 2, 2, 'Tempest Keep - The Mechanar', 'images/instances/BC_Icons/5-Mechanar-Heroic.jpg'),
(51, 'Sunwell', 25, 2, 1, 'The Sunwell', 'images/instances/BC_Icons/25-Sunwell.jpg'),
(52, 'Botanica', 5, 2, 2, 'Tempest Keep - The Botanica', 'images/instances/BC_Icons/5-Botanica.jpg'),
(53, 'Magister''s Terrace', 5, 2, 2, 'Magister''s Terrace', 'images/instances/BC_Icons/5-Mag-Terr.jpg'),
(54, 'Underbog - Heroic', 5, 2, 2, 'Coilfang - Underbog', 'images/instances/BC_Icons/5-Underbog-Heroic.jpg'),
(55, 'Sethekk Halls - Heroic', 5, 2, 2, 'Auchindoun - Sethekk Halls', 'images/instances/BC_Icons/5-Sethekk-Halls-Heroic.jpg'),
(56, 'Auchenai Crypts - Heroic', 5, 2, 2, 'Auchindoun - Auchenai Crypts', 'images/instances/BC_Icons/5-Auchenai-Crypts-Heroic.jpg'),
(57, 'Arcatraz - Heroic', 5, 2, 2, 'Tempest Keep - The Arcatraz', 'images/instances/BC_Icons/5-Arcatraz-Heroic.jpg'),
(58, 'Sethekk Halls', 5, 2, 2, 'Auchindoun - Sethekk Halls\r\n', 'images/instances/BC_Icons/5-Sethekk-Halls.jpg'),
(59, 'Ramparts - Heroic', 5, 2, 2, 'Hellfire Citadel - Hellfire Ramparts', 'images/instances/BC_Icons/5-Ramparts-Heroic.jpg'),
(60, 'Steamvaults - Heroic', 5, 2, 2, 'Coilfang - Steam Vaults', 'images/instances/BC_Icons/5-Steamvault-Heroic.jpg'),
(61, 'Arcatraz', 5, 2, 2, 'Tempest Keep - The Arcatraz', 'images/instances/BC_Icons/5-Arcatraz.jpg'),
(62, 'Blood Furnace - Heroic', 5, 2, 2, 'Hellfire Citadel - Blood Furnace', 'images/instances/BC_Icons/5-Blood-Furnace-Heroic.jpg'),
(63, 'Shattered Halls', 5, 2, 2, 'Hellfire Citadel - Shattered Halls', 'images/instances/BC_Icons/5-Shattered-Halls.jpg'),
(64, 'Karazhan', 10, 2, 1, 'Karazhan', 'images/instances/BC_Icons/10-Kara.jpg'),
(65, 'CoT: Black Morass - Heroic', 5, 2, 2, 'Caverns of Time - Dark Portal', 'images/instances/BC_Icons/5-CoT-Black-Morass-Heroic.jpg'),
(66, 'Botanica - Heroic', 5, 2, 2, 'Tempest Keep - The Botanica', 'images/instances/BC_Icons/5-Botanica-Heroic.jpg'),
(67, 'Gruul''s Lair', 25, 2, 1, 'Gruul''s Lair', 'images/instances/BC_Icons/25-Gruul.jpg'),
(68, 'Slave Pens', 5, 2, 2, 'Coilfang - Slave Pens', 'images/instances/BC_Icons/5-Slave-Pens.jpg'),
(69, 'Mana Tombs', 5, 2, 2, 'Auchindoun - Mana Tombs', 'images/instances/BC_Icons/5-Mana-Tombs.jpg'),
(70, 'CoT: Durnholde Keep - Heroic', 5, 2, 2, 'Caverns of Time - Durnholde', 'images/instances/BC_Icons/5-CoT-Durnholde-Keep-Heroic.jpg'),
(71, 'Blood Furnace', 5, 2, 2, 'Hellfire Citadel - Blood Furnace', 'images/instances/BC_Icons/5-Blood-Furnace.jpg'),
(72, 'CoT: Black Morass', 5, 2, 2, 'Caverns of Time - Dark Portal', 'images/instances/BC_Icons/5-CoT-Black-Morass.jpg'),
(73, 'Magister''s Terrace - Heroic', 5, 2, 2, 'Magister''s Terrace', 'images/instances/BC_Icons/5-Mag-Terr-Heroic.jpg'),
(74, 'CoT: Mt. Hyjal', 25, 2, 1, 'Hyjal Past', 'images/instances/BC_Icons/25-CoT-Hyjal.jpg'),
(75, 'Underbog', 5, 2, 2, 'Coilfang - Underbog', 'images/instances/BC_Icons/5-Underbog.jpg'),
(76, 'Mechanar', 5, 2, 2, 'Tempest Keep - The Mechanar', 'images/instances/BC_Icons/5-Mechanar.jpg'),
(77, 'Shattered Halls - Heroic', 5, 2, 2, 'Hellfire Citadel - Shattered Halls', 'images/instances/BC_Icons/5-Shattered-Halls-Heroic.jpg'),
(78, 'Serpentshrine Cavern', 25, 2, 1, 'Serpentshrine Cavern', 'images/instances/BC_Icons/25-Serpentshrine-Cavern.jpg'),
(79, 'Tempest Keep', 25, 2, 1, 'Tempest Keep', 'images/instances/BC_Icons/25-Tempest-Keep.jpg'),
(80, 'Magtheridon''s Lair', 25, 2, 1, 'Magtheridon''s Lair', 'images/instances/BC_Icons/25-Mags-Lair.jpg'),
(81, 'Shadow Labyrinth - Heroic', 5, 2, 2, 'Auchindoun - Shadow Labyrinth', 'images/instances/BC_Icons/5-Shadow-Labyrinth-Heroic.jpg'),
(82, 'Slave Pens - Heroic', 5, 2, 2, 'Coilfang - Slave Pens', 'images/instances/BC_Icons/5-Slave-Pens-Heroic.jpg'),
(83, 'Zul''Aman', 10, 2, 1, 'Zul''Aman', 'images/instances/BC_Icons/10-ZulAman.jpg'),
(84, 'Auchenai Crypts', 5, 2, 2, 'Auchindoun - Auchenai Crypts', 'images/instances/BC_Icons/5-Auchenai-Crypts.jpg'),
(85, 'Ramparts', 5, 2, 2, 'Hellfire Citadel - Hellfire Ramparts', 'images/instances/BC_Icons/5-Ramparts.jpg'),
(86, 'Stratholme', 5, 1, 2, 'Stratholme', 'images/instances/Classic_Icons/5-Stratholme.jpg'),
(87, 'Scarlet Monestary - Armory', 10, 1, 2, 'Scarlet Monastery - Armory', 'images/instances/Classic_Icons/10-Scarlet-Monestary-Armory.jpg'),
(88, 'Shadowfang Keep', 10, 1, 2, 'Shadowfang Keep', 'images/instances/Classic_Icons/10-Shadowfang-Keep.jpg'),
(89, 'Scholomance', 5, 1, 2, 'Scholomance', 'images/instances/Classic_Icons/5-Scholomance.jpg'),
(90, 'Onyxia''s Lair', 40, 1, 1, 'Onyxia''s Lair', 'images/instances/Classic_Icons/40-Onyxias-Lair.jpg'),
(91, 'Blackwing Lair', 40, 1, 1, 'Blackwing Lair', 'images/instances/Classic_Icons/40-Blackwing-Lair.jpg'),
(92, 'Blackfathom Deeps', 10, 1, 2, 'Blackfathom Deeps', 'images/instances/Classic_Icons/10-Blackfathom-Deeps.jpg'),
(93, 'Stockades', 10, 1, 2, 'Stormwind Stockades', 'images/instances/Classic_Icons/10-Stockade.jpg'),
(94, 'Uldaman', 10, 1, 2, 'Uldaman', 'images/instances/Classic_Icons/10-Uldaman.jpg'),
(95, 'Zul''Gurub', 10, 1, 1, 'Zul''Gurub', 'images/instances/Classic_Icons/10-Zul-Gurub.jpg'),
(96, 'Molten Core', 40, 1, 1, 'Molten Core', 'images/instances/Classic_Icons/40-Molten-Core.jpg'),
(97, 'Wailing Caverns', 10, 1, 2, 'Wailing Caverns', 'images/instances/Classic_Icons/10-Wailing-Caverns.jpg'),
(98, 'Scarlet Monestary - Graveyard', 10, 1, 2, 'Scarlet Monastery - Graveyard', 'images/instances/Classic_Icons/10-Scarlet-Monestary-Graveyard.jpg'),
(99, 'Deadmines', 10, 1, 2, 'Deadmines', 'images/instances/Classic_Icons/10-Deadmines.jpg'),
(100, 'Lower Blackrock Spire', 10, 1, 2, 'Lower Blackrock Spire', 'images/instances/Classic_Icons/10-Lower-Blackrock-Spire.jpg'),
(101, 'Zul''Farak', 10, 1, 2, 'Zul''Farrak', 'images/instances/Classic_Icons/10-Zul-Farak.jpg'),
(102, 'Blackrock Depths', 5, 1, 2, 'Blackrock Depths', 'images/instances/Classic_Icons/5-Blackrock Depths.jpg'),
(103, 'Dire Maul - West', 5, 1, 2, 'Dire Maul - West', 'images/instances/Classic_Icons/5-Dire-Maul-West.jpg'),
(104, 'Upper Blackrock Spire', 10, 1, 1, 'Upper Blackrock Spire', 'images/instances/Classic_Icons/10-Upper-Blackrock-Spire.jpg'),
(105, 'Gnomeregan', 10, 1, 2, 'Gnomeregan', 'images/instances/Classic_Icons/10-Gnomeregan.jpg'),
(106, 'Temple Of Ahn''Qiraj', 40, 1, 1, 'Ahn''Qiraj Temple', 'images/instances/Classic_Icons/40-Temple-Of-AhnQiraj.jpg'),
(107, 'Scarlet Monestary - Library', 10, 1, 2, 'Scarlet Monastery - Library', 'images/instances/Classic_Icons/10-Scarlet-Monestary-Library.jpg'),
(108, 'Scarlet Monestary - Cathedral', 10, 1, 2, 'Scarlet Monastery - Cathedral', 'images/instances/Classic_Icons/10-Scarlet-Monestary-Cathedral.jpg'),
(109, 'Sunken Temple', 10, 1, 2, 'Sunken Temple', 'images/instances/Classic_Icons/10-Sunken-Temple.jpg'),
(110, 'Maraudon', 10, 1, 2, 'Maraudon', 'images/instances/Classic_Icons/10-Maraudon.jpg'),
(111, 'Ragefire Chasm', 10, 1, 2, 'Ragefire Chasm', 'images/instances/Classic_Icons/10-Ragefire-Chasm.jpg'),
(112, 'Dire Maul - East', 5, 1, 2, 'Dire Maul - East', 'images/instances/Classic_Icons/5-Dire-Maul-East.jpg'),
(113, 'Dire Maul - North', 5, 1, 2, 'Dire Maul - North', 'images/instances/Classic_Icons/5-Dire-Maul-North.jpg'),
(114, 'Ruins Of Ahn''Qiraj', 20, 1, 1, 'Ahn''Qiraj Ruins', 'images/instances/Classic_Icons/20-Ruins-Of-AhnQiraj.jpg'),
(115, 'Razorfen Downs', 10, 1, 2, 'Razorfen Downs', 'images/instances/Classic_Icons/10-Razorfen-Downs.jpg'),
(116, 'Razorfen Kraul', 10, 1, 2, 'Razorfen Kraul', 'images/instances/Classic_Icons/10-Razorfen-Kraul.jpg'),
(117, 'Vault of Archavon', 10, 3, 1, 'Vault of Archavon', 'images/instances/WotLK_Icons/10-Vault-of-Archavon.jpg'),
(118, 'Vault of Archavon - Heroic', 25, 3, 1, 'Vault of Archavon (Heroic)', 'images/instances/WotLK_Icons/25-Vault-of-Archavon.jpg'),
(119, 'Generic Event', 99, 0, 5, '', 'images/instances/Misc_Icons/GEN-Event.jpg'),
(120, 'PvP Event', 40, 0, 3, '', 'images/instances/Misc_Icons/GEN-PvP.jpg'),
(121, 'Meeting', 99, 0, 4, '', 'images/instances/Misc_Icons/GEN-Meeting.jpg'),
(122, 'Ulduar', 10, 3, 1, 'Ulduar', 'images/instances/WotLK_Icons/10-Ulduar.jpg'),
(123, 'Ulduar - Heroic', 25, 3, 1, 'Ulduar (Heroic)', 'images/instances/WotLK_Icons/25-Ulduar.jpg');


-- Event Type Table Data
INSERT INTO `wrm_event_type` (`event_type_id`, `event_type_name`, `event_type_lang_id`, `def`) VALUES
(1, 'Raid', 'event_type_raid', 1),
(2, 'Dungeon', 'event_type_dungeon', 0),
(3, 'PvP Event', 'event_type_pvp', 0),
(4, 'Meeting', 'event_type_meeting', 0),
(5, 'Other', 'event_type_other', 0);


-- Expansion Table Data
INSERT INTO `wrm_expansion` (`exp_id`, `exp_name`, `exp_lang_id`, `def`) VALUES
(1, 'Generic', 'exp_generic_wow', 0),
(2, 'BC', 'exp_burning_crusade', 0),
(3, 'WotLK', 'exp_wrath_lich_king', 1);


-- Gender Table Data
INSERT INTO `wrm_gender` VALUES ('Male', 'male');
INSERT INTO `wrm_gender` VALUES ('Female', 'female');


-- Permissions Data
INSERT INTO `wrm_permissions` (`permission_id`, `name`,`description`,`announcements`,`configuration`,`guilds`,`locations`,`permissions`,`profile`,`raids`,`logs`,`users`) VALUES ('1','WRM Superadmin','Full Access','1','1','1','1','1','1','1','1','1');
INSERT INTO `wrm_permissions` (`permission_id`, `name`,`description`,`announcements`,`configuration`,`guilds`,`locations`,`permissions`,`profile`,`raids`,`logs`,`users`) VALUES ('2','WRM Users','Generic Access','0','0','0','0','0','1','0','0','0');


-- Race Data
INSERT INTO `wrm_races` VALUES ('Draenei', 'Alliance', 'draenei');
INSERT INTO `wrm_races` VALUES ('Dwarf', 'Alliance', 'dwarf');
INSERT INTO `wrm_races` VALUES ('Human', 'Alliance', 'human');
INSERT INTO `wrm_races` VALUES ('Gnome', 'Alliance', 'gnome');
INSERT INTO `wrm_races` VALUES ('Night Elf', 'Alliance', 'night_elf');
INSERT INTO `wrm_races` VALUES ('Blood Elf', 'Horde', 'blood_elf');
INSERT INTO `wrm_races` VALUES ('Orc', 'Horde', 'orc');
INSERT INTO `wrm_races` VALUES ('Tauren', 'Horde', 'tauren');
INSERT INTO `wrm_races` VALUES ('Troll', 'Horde', 'troll');
INSERT INTO `wrm_races` VALUES ('Undead', 'Horde', 'undead');


-- Race/Gender Link Table Data
INSERT INTO `wrm_race_gender` VALUES ('Draenei', 'Male', '/images/faces/dr_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Draenei', 'Female', '/images/faces/dr_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Dwarf', 'Male', '/images/faces/dw_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Dwarf', 'Female', '/images/faces/dw_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Human', 'Male', '/images/faces/hu_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Human', 'Female', '/images/faces/hu_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Gnome', 'Male', '/images/faces/gn_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Gnome', 'Female', '/images/faces/gn_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Night Elf', 'Male', '/images/faces/ne_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Night Elf', 'Female', '/images/faces/ne_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Blood Elf', 'Male', '/images/faces/be_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Blood Elf', 'Female', '/images/faces/be_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Orc', 'Male', '/images/faces/or_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Orc', 'Female', '/images/faces/or_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Tauren', 'Male', '/images/faces/ta_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Tauren', 'Female', '/images/faces/ta_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Troll', 'Male', '/images/faces/tr_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Troll', 'Female', '/images/faces/tr_female.gif');
INSERT INTO `wrm_race_gender` VALUES ('Undead', 'Male', '/images/faces/un_male.gif');
INSERT INTO `wrm_race_gender` VALUES ('Undead', 'Female', '/images/faces/un_female.gif');


-- Role Table Data
INSERT INTO `wrm_roles` VALUES ('role1', 'Tank', 'configuration_role1_text','');
INSERT INTO `wrm_roles` VALUES ('role2', 'Melee', 'configuration_role2_text','');
INSERT INTO `wrm_roles` VALUES ('role3', 'Healing', 'configuration_role3_text','');
INSERT INTO `wrm_roles` VALUES ('role4', 'Ranged', 'configuration_role4_text','');
INSERT INTO `wrm_roles` VALUES ('role5', 'misc1', 'configuration_role5_text','');
INSERT INTO `wrm_roles` VALUES ('role6', 'misc2', 'configuration_role6_text','');


-- Version Data
INSERT INTO `wrm_version` VALUES ('4.0.0','Version 4.0.0 of WoW Raid Manager');
INSERT INTO `wrm_version` VALUES ('4.0.1','Version 4.0.1 of WoW Raid Manager');
INSERT INTO `wrm_version` VALUES ('4.0.2','Version 4.0.2 of WoW Raid Manager');
