/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : acl_role

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-04-29 11:40:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acl_resource
-- ----------------------------
DROP TABLE IF EXISTS `acl_resource`;
CREATE TABLE `acl_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL COMMENT 'is moduleName-controllerName; example: backend-user',
  `action` varchar(50) NOT NULL COMMENT 'is actionName; example: view or create or update',
  `title` varchar(100) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acl_resource
-- ----------------------------
INSERT INTO `acl_resource` VALUES ('1', null, 'backend-cmscategory', 'index', 'backend cmscategory index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('2', null, 'backend-cmscategory', 'view', 'backend cmscategory view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('3', null, 'backend-cmscategory', 'create', 'backend cmscategory create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('4', null, 'backend-cmscategory', 'update', 'backend cmscategory update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('5', null, 'backend-cmscategory', 'delete', 'backend cmscategory delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('6', null, 'backend-cmsmenu', 'index', 'backend cmsmenu index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('7', null, 'backend-cmsmenu', 'view', 'backend cmsmenu view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('8', null, 'backend-cmsmenu', 'create', 'backend cmsmenu create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('9', null, 'backend-cmsmenu', 'update', 'backend cmsmenu update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('10', null, 'backend-cmsmenu', 'delete', 'backend cmsmenu delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('11', null, 'backend-cmspost', 'index', 'backend cmspost index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('12', null, 'backend-cmspost', 'view', 'backend cmspost view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('13', null, 'backend-cmspost', 'create', 'backend cmspost create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('14', null, 'backend-cmspost', 'update', 'backend cmspost update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('15', null, 'backend-cmspost', 'delete', 'backend cmspost delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('16', null, 'backend-config', 'index', 'backend config index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('17', null, 'backend-config', 'view', 'backend config view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('18', null, 'backend-config', 'create', 'backend config create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('19', null, 'backend-config', 'update', 'backend config update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('20', null, 'backend-config', 'delete', 'backend config delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('21', null, 'backend-errors', 'show404', 'backend errors show404', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('22', null, 'backend-errors', 'show401', 'backend errors show401', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('23', null, 'backend-errors', 'show500', 'backend errors show500', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('24', null, 'backend-index', 'index', 'backend index index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('25', null, 'backend-index', 'changeLanguage', 'backend index changeLanguage', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('26', null, 'backend-index', 'setLeftbarCollapse', 'backend index setLeftbarCollapse', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('27', null, 'system-aclresource', 'index', 'system aclresource index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('28', null, 'system-aclresource', 'view', 'system aclresource view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('29', null, 'system-aclresource', 'create', 'system aclresource create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('30', null, 'system-aclresource', 'update', 'system aclresource update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('31', null, 'system-aclresource', 'delete', 'system aclresource delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('32', null, 'system-aclresource', 'updateResource', 'system aclresource updateResource', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('33', null, 'system-aclrole', 'index', 'system aclrole index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('34', null, 'system-aclrole', 'view', 'system aclrole view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('35', null, 'system-aclrole', 'create', 'system aclrole create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('36', null, 'system-aclrole', 'update', 'system aclrole update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('37', null, 'system-aclrole', 'delete', 'system aclrole delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('38', null, 'system-aclrole', 'viewResource', 'system aclrole viewResource', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('39', null, 'system-aclrole', 'addResource', 'system aclrole addResource', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('40', null, 'system-aclrole', 'saveResource', 'system aclrole saveResource', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('41', null, 'system-aclrole', 'removeResource', 'system aclrole removeResource', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('42', null, 'system-aclroleresource', 'index', 'system aclroleresource index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('43', null, 'system-aclroleresource', 'view', 'system aclroleresource view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('44', null, 'system-aclroleresource', 'create', 'system aclroleresource create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('45', null, 'system-aclroleresource', 'update', 'system aclroleresource update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('46', null, 'system-aclroleresource', 'delete', 'system aclroleresource delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('47', null, 'system-acluser', 'index', 'system acluser index', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('48', null, 'system-acluser', 'view', 'system acluser view', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('49', null, 'system-acluser', 'create', 'system acluser create', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('50', null, 'system-acluser', 'update', 'system acluser update', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('51', null, 'system-acluser', 'delete', 'system acluser delete', null, '1', '1458194395', null);
INSERT INTO `acl_resource` VALUES ('52', '0', 'backend-website', 'add', 'backend-website-add', '', '1', null, null);
INSERT INTO `acl_resource` VALUES ('53', '0', 'backend-website', 'index', 'backend-website-index', '', '1', null, null);
INSERT INTO `acl_resource` VALUES ('54', null, 'backend-faq', 'index', 'backend faq index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('55', null, 'backend-faq', 'update', 'backend faq update', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('56', null, 'backend-mapcate', 'index', 'backend mapcate index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('57', null, 'backend-mapcate', 'view', 'backend mapcate view', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('58', null, 'backend-mapcate', 'add', 'backend mapcate add', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('59', null, 'backend-mapcate', 'update', 'backend mapcate update', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('60', null, 'backend-mapcate', 'delete', 'backend mapcate delete', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('61', null, 'backend-product', 'index', 'backend product index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('62', null, 'backend-product', 'ajax', 'backend product ajax', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('63', null, 'backend-product', 'add', 'backend product add', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('64', null, 'backend-product', 'update', 'backend product update', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('65', null, 'backend-productclone', 'index', 'backend productclone index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('66', null, 'backend-productclone', 'ajax', 'backend productclone ajax', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('67', null, 'backend-slider', 'index', 'backend slider index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('68', null, 'backend-slider', 'add', 'backend slider add', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('69', null, 'backend-slider', 'update', 'backend slider update', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('70', null, 'backend-slider', 'view', 'backend slider view', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('71', null, 'backend-slider', 'delete', 'backend slider delete', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('72', null, 'backend-upload', 'index', 'backend upload index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('73', '0', 'backend-website', 'update', 'backend website update', '', '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('74', '0', 'backend-website', 'delete', 'backend website delete', '', '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('75', null, 'fontend-category', 'index', 'fontend category index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('76', null, 'fontend-category', 'shop', 'fontend category shop', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('77', null, 'fontend-category', 'product', 'fontend category product', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('78', null, 'fontend-detail', 'index', 'fontend detail index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('79', null, 'fontend-detail', 'user', 'fontend detail user', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('80', null, 'fontend-index', 'index', 'fontend index index', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('81', null, 'fontend-index', 'about', 'fontend index about', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('82', null, 'fontend-index', 'faq', 'fontend index faq', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('83', null, 'fontend-user', 'login', 'fontend user login', null, '1', '1461572539', null);
INSERT INTO `acl_resource` VALUES ('84', null, 'fontend-user', 'logout', 'fontend user logout', null, '1', '1461572540', null);
INSERT INTO `acl_resource` VALUES ('85', null, 'fontend-user', 'register', 'fontend user register', null, '1', '1461572540', null);
INSERT INTO `acl_resource` VALUES ('86', null, 'fontend-user', 'success', 'fontend user success', null, '1', '1461572540', null);

-- ----------------------------
-- Table structure for acl_role
-- ----------------------------
DROP TABLE IF EXISTS `acl_role`;
CREATE TABLE `acl_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL COMMENT 'the first link(resource) access',
  `status` tinyint(2) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acl_role
-- ----------------------------
INSERT INTO `acl_role` VALUES ('1', 'Superadmin', 'superadmin', null, '1', null, null);
INSERT INTO `acl_role` VALUES ('2', 'Admin', 'admin', null, '1', null, null);
INSERT INTO `acl_role` VALUES ('3', 'normal', '', '', '1', null, null);

-- ----------------------------
-- Table structure for acl_role_resource
-- ----------------------------
DROP TABLE IF EXISTS `acl_role_resource`;
CREATE TABLE `acl_role_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acl_role` int(11) DEFAULT NULL,
  `id_acl_resource` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acl_role` (`id_acl_role`),
  KEY `acl_resource` (`id_acl_resource`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acl_role_resource
-- ----------------------------
INSERT INTO `acl_role_resource` VALUES ('1', '1', '1', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('2', '1', '2', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('3', '1', '3', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('4', '1', '4', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('5', '1', '5', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('6', '1', '6', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('7', '1', '7', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('8', '1', '8', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('9', '1', '9', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('10', '1', '10', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('11', '1', '11', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('12', '1', '12', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('13', '1', '13', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('14', '1', '14', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('15', '1', '15', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('16', '1', '16', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('17', '1', '17', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('18', '1', '18', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('19', '1', '19', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('20', '1', '20', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('21', '1', '21', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('22', '1', '22', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('23', '1', '23', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('24', '1', '24', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('25', '1', '25', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('26', '1', '26', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('27', '1', '27', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('28', '1', '28', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('29', '1', '29', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('30', '1', '30', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('31', '1', '31', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('32', '1', '32', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('33', '1', '33', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('34', '1', '34', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('35', '1', '35', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('36', '1', '36', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('37', '1', '37', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('38', '1', '38', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('39', '1', '39', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('40', '1', '40', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('41', '1', '41', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('42', '1', '42', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('43', '1', '43', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('44', '1', '44', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('45', '1', '45', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('46', '1', '46', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('47', '1', '47', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('48', '1', '48', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('49', '1', '49', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('50', '1', '50', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('51', '1', '51', '1', '1458194395', null);
INSERT INTO `acl_role_resource` VALUES ('52', '2', '1', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('53', '2', '2', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('54', '2', '3', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('55', '2', '4', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('56', '2', '5', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('57', '2', '6', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('58', '2', '7', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('59', '2', '8', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('60', '2', '9', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('61', '2', '10', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('62', '2', '11', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('63', '2', '12', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('64', '2', '13', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('65', '2', '14', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('66', '2', '15', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('67', '2', '16', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('68', '2', '17', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('69', '2', '18', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('70', '2', '19', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('71', '2', '20', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('72', '2', '21', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('73', '2', '22', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('74', '2', '23', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('75', '2', '24', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('76', '2', '25', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('77', '2', '26', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('78', '2', '27', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('79', '2', '28', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('80', '2', '29', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('81', '2', '30', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('82', '2', '31', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('83', '2', '32', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('84', '2', '33', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('85', '2', '34', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('86', '2', '35', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('87', '2', '36', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('88', '2', '37', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('89', '2', '38', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('90', '2', '39', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('91', '2', '40', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('92', '2', '41', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('93', '2', '42', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('94', '2', '43', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('95', '2', '44', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('96', '2', '45', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('97', '2', '46', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('98', '2', '47', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('99', '2', '48', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('100', '2', '49', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('101', '2', '50', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('102', '2', '51', '1', '1458197773', null);
INSERT INTO `acl_role_resource` VALUES ('103', '2', '52', '1', '1458635271', null);
INSERT INTO `acl_role_resource` VALUES ('104', '3', '52', '1', '1458872478', null);
INSERT INTO `acl_role_resource` VALUES ('105', '3', '53', '1', '1458872478', null);
INSERT INTO `acl_role_resource` VALUES ('106', '3', '24', '1', '1461311277', null);
INSERT INTO `acl_role_resource` VALUES ('107', '1', '54', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('108', '1', '55', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('109', '1', '56', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('110', '1', '57', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('111', '1', '58', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('112', '1', '59', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('113', '1', '60', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('114', '1', '61', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('115', '1', '62', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('116', '1', '63', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('117', '1', '64', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('118', '1', '65', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('119', '1', '66', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('120', '1', '67', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('121', '1', '68', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('122', '1', '69', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('123', '1', '70', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('124', '1', '71', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('125', '1', '72', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('126', '1', '73', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('127', '1', '74', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('128', '1', '75', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('129', '1', '76', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('130', '1', '77', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('131', '1', '78', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('132', '1', '79', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('133', '1', '80', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('134', '1', '81', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('135', '1', '82', '1', '1461572539', null);
INSERT INTO `acl_role_resource` VALUES ('136', '1', '83', '1', '1461572540', null);
INSERT INTO `acl_role_resource` VALUES ('137', '1', '84', '1', '1461572540', null);
INSERT INTO `acl_role_resource` VALUES ('138', '1', '85', '1', '1461572540', null);
INSERT INTO `acl_role_resource` VALUES ('139', '1', '86', '1', '1461572540', null);

-- ----------------------------
-- Table structure for acl_user
-- ----------------------------
DROP TABLE IF EXISTS `acl_user`;
CREATE TABLE `acl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acl_role` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acl_role` (`id_acl_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acl_user
-- ----------------------------
INSERT INTO `acl_user` VALUES ('1', '1', 'superadmin', '389684696e2ac18d97da7d181ff1bcb9', 'Admin', null, null, null, null, '1', null, null);
INSERT INTO `acl_user` VALUES ('2', '2', 'admin', '389684696e2ac18d97da7d181ff1bcb9', 'Admin', null, null, null, null, '1', null, null);
INSERT INTO `acl_user` VALUES ('3', '3', 'thamhut', '389684696e2ac18d97da7d181ff1bcb9', '', '', '', '', '', '1', null, null);
INSERT INTO `acl_user` VALUES ('4', '3', 'superadmin1', '389684696e2ac18d97da7d181ff1bcb9', '', '', null, null, null, '1', null, null);
INSERT INTO `acl_user` VALUES ('5', '3', 'superadmin22', '389684696e2ac18d97da7d181ff1bcb9', '', '', null, null, null, '1', null, null);

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acl_role` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acl_role` (`id_acl_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', 'superadmin', '389684696e2ac18d97da7d181ff1bcb9', 'Admin', '1', null, null);
INSERT INTO `admin` VALUES ('2', '2', 'admin', '389684696e2ac18d97da7d181ff1bcb9', 'Admin', '1', null, null);

-- ----------------------------
-- Table structure for cms_category
-- ----------------------------
DROP TABLE IF EXISTS `cms_category`;
CREATE TABLE `cms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `quote` varchar(500) DEFAULT NULL,
  `decscription` varchar(500) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_category
-- ----------------------------
INSERT INTO `cms_category` VALUES ('1', '0', 'Ã¡dsa', 'sad', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '1');
INSERT INTO `cms_category` VALUES ('2', '0', 'Shoes', 'shoes', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '1');
INSERT INTO `cms_category` VALUES ('3', '2', 'Sandal', 'shoes-sandal', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '1');
INSERT INTO `cms_category` VALUES ('4', '0', 'Women', 'women', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '1');
INSERT INTO `cms_category` VALUES ('5', '4', 'Dresses', 'women-dresses', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '1');
INSERT INTO `cms_category` VALUES ('6', '5', 'Bodycon', 'women-dresses-bodycon', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '1');

-- ----------------------------
-- Table structure for cms_menu
-- ----------------------------
DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `uri` varchar(100) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_menu
-- ----------------------------

-- ----------------------------
-- Table structure for cms_post
-- ----------------------------
DROP TABLE IF EXISTS `cms_post`;
CREATE TABLE `cms_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `quote` varchar(500) DEFAULT NULL,
  `content` text,
  `thumbnail` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `position` int(11) DEFAULT NULL COMMENT 'order by position',
  `decscription` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_post
-- ----------------------------

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------

-- ----------------------------
-- Table structure for mapcate
-- ----------------------------
DROP TABLE IF EXISTS `mapcate`;
CREATE TABLE `mapcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcate` int(11) DEFAULT NULL,
  `link` int(11) DEFAULT NULL,
  `idweb` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mapcate
-- ----------------------------

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(355) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('1', '/uploads/images/2016/04/20fd8a612e74174d0ec95645926d736f.jpeg', '1');

-- ----------------------------
-- Table structure for website
-- ----------------------------
DROP TABLE IF EXISTS `website`;
CREATE TABLE `website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `domain` varchar(355) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `logo` varchar(355) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of website
-- ----------------------------
INSERT INTO `website` VALUES ('1', 'http://chotam.info', 'http://chotam.info', '1', '0', 'http://chotam.info/favicon.ico');
INSERT INTO `website` VALUES ('2', 'Forever21', 'http://www.forever21.com/', '1', '0', 'http://www.forever21.com/images/en/common/favicon.ico');
