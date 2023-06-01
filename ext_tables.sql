#
# Table structure for table 'backend_layout'
#

CREATE TABLE tt_content (
	tx_vimeovideo_assets int(1) DEFAULT '0' NOT NULL,
	tx_vimeovideo_colcount int(1) DEFAULT '0' NOT NULL,
	tx_vimeovideo_titles int(1) DEFAULT '0' NOT NULL,
	tx_vimeovideo_descriptions int(1) DEFAULT '0' NOT NULL,
);

CREATE TABLE sys_file_reference (
	tx_vimeovideo_starttime varchar(10),
	tx_vimeovideo_endtime varchar(10),
	tx_vimeovideo_ratio varchar(10),
	tx_vimeovideo_loop tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_vimeovideo_mute tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_vimeovideo_coverimage int(1) DEFAULT '0' NOT NULL,
);