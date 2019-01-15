#
# Table structure for table 'backend_layout'
#
CREATE TABLE tt_content (
	tx_vimeovideo_url tinytext,
	tx_vimeovideo_caption tinytext,
	tx_vimeovideo_autoplay tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_vimeovideo_loop tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_vimeovideo_title tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_vimeovideo_ratio tinyint(1) unsigned DEFAULT '0' NOT NULL
);