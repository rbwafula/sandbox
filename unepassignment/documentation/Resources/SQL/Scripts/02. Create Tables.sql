/* DROP ALL Constraints */
/* These only need to be dropped after initial creation. Uncomment if it is after 2nd run */
/*ALTER TABLE `ProjectLocation` DROP FOREIGN KEY `CNSTR_ProjectLocation_Projects_FK`;
ALTER TABLE `ProjectLocation` DROP FOREIGN KEY `CNSTR_ProjectLocation_Countries_FK`;*/



/* DROP ALL Tables */
DROP TABLE IF EXISTS `unepassignment`.`Projects`;
DROP TABLE IF EXISTS `unepassignment`.`Countries`;
DROP TABLE IF EXISTS `unepassignment`.`ProjectLocation`;
DROP TABLE IF EXISTS `unepassignment`.`Office`;
DROP TABLE IF EXISTS `unepassignment`.`NAPStatus`;
DROP TABLE IF EXISTS `unepassignment`.`NAPType`;
DROP TABLE IF EXISTS `unepassignment`.`ProjectStatus`;


/* Projects Table */
CREATE TABLE IF NOT EXISTS `unepassignment`.`Projects` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `reference` varchar(100) NOT NULL,
    `implementingoffice` int(11) UNSIGNED  NOT NULL,
    `title` varchar (500) DEFAULT 'Untitled',
    `grantamount` decimal (13,2) NOT NULL,
    `firstdisbursement` decimal (13,2) NOT NULL,
    `gcfdate` date NOT NULL,
    `startdate` date NOT NULL,
    `enddate` date NOT NULL,
    `napstatus` int(5) UNSIGNED NOT NULL,
    `naptype` int(5) UNSIGNED  NOT NULL,
    `status` int(5) UNSIGNED  NOT NULL,
    `createuser` int(11) UNSIGNED DEFAULT 0 NOT NULL,
    `createdate` int(10) UNSIGNED DEFAULT 0 NOT NULL,
    `createipaddr`varchar(45) DEFAULT '127.0.0.1' NOT NULL,
    `lastmodifyuser` int(11) UNSIGNED DEFAULT 0 NOT NULL,
    `lastmodifydate` int(10) UNSIGNED DEFAULT 0 NOT NULL,
    `lastmodifyipaddr`varchar(45) DEFAULT '127.0.0.1' NOT NULL,
    `deleted` tinyint(1) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Countries Table */
CREATE TABLE IF NOT EXISTS `unepassignment`.`Countries` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`code` varchar(2) NOT NULL default '',
	`name` varchar(100) NOT NULL default '',
	PRIMARY KEY (`id`)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Project Location Table */
CREATE TABLE IF NOT EXISTS `unepassignment`.`ProjectLocation` (
	`projectid` int(11) UNSIGNED DEFAULT 0 NOT NULL,
	`countryid` int(11) UNSIGNED DEFAULT 0 NOT NULL,
	PRIMARY KEY (`projectid`, `countryid`),
	CONSTRAINT `CNSTR_ProjectLocation_Projects_FK`
        FOREIGN KEY `Projects_fk` (`projectid`) REFERENCES `unepassignment`.`Projects` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `CNSTR_ProjectLocation_Countries_FK`
        FOREIGN KEY `Countries_fk` (`countryid`) REFERENCES `unepassignment`.`Countries` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE = INNODB CHARACTER SET ascii COLLATE ascii_general_ci;

/* Implementing Office Table */
CREATE TABLE IF NOT EXISTS `unepassignment`.`Office` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(250) NOT NULL default '',
	`abbreviation` varchar(100) NOT NULL default '',
	PRIMARY KEY (`id`)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Readiness or NAP Status */
CREATE TABLE IF NOT EXISTS `unepassignment`.`NAPStatus` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL default '',
	`description` varchar(100) NOT NULL default '',
	PRIMARY KEY (`id`)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Type of readiness */
CREATE TABLE IF NOT EXISTS `unepassignment`.`NAPType` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL default '',
	`description` varchar(100) NOT NULL default '',
	PRIMARY KEY (`id`)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Project Status */
CREATE TABLE IF NOT EXISTS `unepassignment`.`ProjectStatus` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL default '',
	`description` varchar(100) NOT NULL default '',
	PRIMARY KEY (`id`)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;


/* CREATE Foreign Indexes */
ALTER TABLE `unepassignment`.`Projects`
ADD CONSTRAINT FK_Projects_Office FOREIGN KEY (`implementingoffice`) REFERENCES `Office`(`id`),
ADD CONSTRAINT FK_Projects_NAPStatus FOREIGN KEY (`napstatus`) REFERENCES `NAPStatus`(`id`),
ADD CONSTRAINT FK_Projects_NAPType FOREIGN KEY (`naptype`) REFERENCES `NAPType`(`id`),
ADD CONSTRAINT FK_Projects_ProjectStatus FOREIGN KEY (`status`) REFERENCES `ProjectStatus`(`id`); 