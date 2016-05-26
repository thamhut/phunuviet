
-- ----------------------------
-- Table structure for `acl_role`
-- ----------------------------
DROP TABLE IF EXISTS `acl_role`;
CREATE TABLE `acl_role` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(32) not null,
	`note` varchar(100),
	`link` varchar(100) COMMENT "the first link(resource) access",
	`status` tinyint(2)	default 1,
	`created_at` int(11),
	`updated_at` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `acl_resource`
-- ----------------------------
DROP TABLE IF EXISTS `acl_resource`;
CREATE TABLE `acl_resource` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_parent` int(11),
	`name` varchar(200) not null COMMENT "is moduleName-controllerName; example: backend-user",
	`action` varchar(50) not null COMMENT "is actionName; example: view or create or update", 
	`title` varchar(100),
	`note` varchar(100),
	`status` tinyint(2)	default 1,
	`created_at` int(11),
	`updated_at` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `acl_role_resource`
-- ----------------------------
DROP TABLE IF EXISTS `acl_role_resource`;
CREATE TABLE `acl_role_resource` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_acl_role` int(11),
	`id_acl_resource` int(11),
	`status` tinyint(2)	default 1,
	`created_at` int(11),
	`updated_at` int(11),
	KEY `acl_role` (`id_acl_role`),
	KEY `acl_resource` (`id_acl_resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `acl_user`
-- ----------------------------
DROP TABLE IF EXISTS `acl_user`;
CREATE TABLE `acl_user` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_acl_role` int(11) NOT NULL,
	`username` varchar(32) not null,
	`password` varchar(32) not null,
	`fullname` varchar(50),
	`email` varchar(50),
	`phone` varchar(50),
	`address` varchar(50),
	`note` varchar(200),
	`status` tinyint(2)	default 1,
	`created_at` int(11),
	`updated_at` int(11),
	KEY `acl_role` (`id_acl_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `cms_menu`
-- ----------------------------
DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_parent` int(11),
	`title` varchar(100) not null,
	`slug` varchar(100),
	`uri` varchar(100),
	`position` int(11),
	`status` tinyint(2)	default 1,
	`created_at` int(11),
	`updated_at` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `cms_category`
-- ----------------------------
DROP TABLE IF EXISTS `cms_category`;
CREATE TABLE IF NOT EXISTS `cms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11),
  `title` varchar(100) NOT NULL,
  `slug` varchar(200),
  `thumbnail` varchar(200),
  `quote` varchar(500),
  `decscription` varchar(500),
  `created_date` datetime,
  `updated_date` datetime,
  `meta_title` varchar(255),
  `meta_description` varchar(255),
  `meta_keyword` varchar(255),
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `cms_post`
-- ----------------------------
DROP TABLE IF EXISTS `cms_post`;
CREATE TABLE IF NOT EXISTS `cms_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11),
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `quote` varchar(500),
  `content` text,
  `thumbnail` varchar(200),
  `uri` varchar(200),
  `position` int(11) COMMENT "order by position",
  `decscription` varchar(200),
  `created_date` datetime,
  `updated_date` datetime,
  `meta_title` varchar(255),
  `meta_description` varchar(255),
  `meta_keywords` varchar(255),
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO acl_role(id, name, note, status) VALUES(1, 'Superadmin', 'superadmin', 1);
INSERT INTO acl_role(id, name, note, status) VALUES(2, 'Admin', 'admin', 1);
INSERT INTO acl_user(id, id_acl_role, username, password, full_name, status) VALUES(1, 1, 'superadmin', md5('superadminoephalconcms2015'), 'Admin', 1);
INSERT INTO acl_user(id, id_acl_role, username, password, full_name, status) VALUES(2, 2, 'admin', md5('admin@123oephalconcms2015'), 'Admin', 1);