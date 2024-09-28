/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : smart_voting

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-09-28 11:19:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `common_login`
-- ----------------------------
DROP TABLE IF EXISTS `common_login`;
CREATE TABLE `common_login` (
  `common_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(15) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`common_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of common_login
-- ----------------------------
INSERT INTO `common_login` VALUES ('2', '947100562V', 'pamoda94@gmail.com', '128093ee2ccd3d7e2e88caf48bef466d', null);
INSERT INTO `common_login` VALUES ('3', '882345678V', 'trtdddda94@gmail.com', '4d07cd0157cb9c3e5b6edb850337d493', 'teraaaa');
INSERT INTO `common_login` VALUES ('6', '947100562V', 'pamo@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'Pamoda');
INSERT INTO `common_login` VALUES ('7', '324242412312v', 'kamila@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'Kamila');
INSERT INTO `common_login` VALUES ('8', '971005341V', 'deshani@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'Deshani Wathsala');
INSERT INTO `common_login` VALUES ('9', '957100562V', 'kumudu@gmail.com', '4d07cd0157cb9c3e5b6edb850337d493', 'Kumudu');
INSERT INTO `common_login` VALUES ('10', '882400182v', 'nuwani@gmail.com', '4d07cd0157cb9c3e5b6edb850337d493', 'Nuwani');

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('1', 'Sri Lanka');
INSERT INTO `country` VALUES ('2', 'Australia');
INSERT INTO `country` VALUES ('3', 'Canada');

-- ----------------------------
-- Table structure for `elections`
-- ----------------------------
DROP TABLE IF EXISTS `elections`;
CREATE TABLE `elections` (
  `election_main_id` int(11) NOT NULL AUTO_INCREMENT,
  `election_name` varchar(100) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `elect_year` int(11) DEFAULT NULL,
  `elect_month` int(11) DEFAULT NULL,
  `election_start` datetime DEFAULT NULL,
  `election_end` datetime DEFAULT NULL,
  `election_active_stts` int(11) DEFAULT NULL,
  `election_end_status` int(11) DEFAULT NULL COMMENT 'if 0 complete,if 1 pending',
  PRIMARY KEY (`election_main_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of elections
-- ----------------------------
INSERT INTO `elections` VALUES ('1', 'Presidential Election', '2', '2023', '0', '2023-09-04 00:00:00', '2023-09-09 00:00:00', '1', '1');
INSERT INTO `elections` VALUES ('2', 'General election 2023', '2', '2023', '10', '2023-09-03 00:00:00', '2023-09-20 00:00:00', '1', '1');
INSERT INTO `elections` VALUES ('3', 'ff General election 2023', '1', '2023', '10', '2023-09-03 00:00:00', '2023-09-20 00:00:00', '1', '1');
INSERT INTO `elections` VALUES ('4', 'RTC Test Election', '2', '2024', '2', '2024-02-29 00:00:00', '2024-03-01 00:00:00', '1', '1');
INSERT INTO `elections` VALUES ('6', 'RTC Test NK election', '2', '2024', '0', '2024-02-12 08:00:00', '2024-03-09 10:40:00', '1', '0');
INSERT INTO `elections` VALUES ('7', 'RTC LSC election', '2', '2024', '0', '2024-02-15 08:30:00', '2024-02-15 16:30:00', '1', '1');
INSERT INTO `elections` VALUES ('8', 'RTC UCSC election 1', '2', '2024', '0', '2024-02-16 08:00:00', '2024-02-15 16:00:00', '1', '1');
INSERT INTO `elections` VALUES ('9', 'RTC UCSC election 2', '2', '2024', '0', '2024-02-17 19:35:00', '2024-02-18 19:35:00', '1', '1');
INSERT INTO `elections` VALUES ('10', 'RTC dwfweew', '2', '2024', '0', '2024-02-23 19:41:00', '2024-02-29 19:41:00', '0', '1');
INSERT INTO `elections` VALUES ('11', 'RTC DVP election', '2', '2024', '0', '2024-02-17 19:47:00', '2024-02-18 19:47:00', '0', '1');
INSERT INTO `elections` VALUES ('12', 'RTC SPM', '2', '2024', '0', '2024-02-18 19:59:00', '2024-02-19 19:59:00', '0', '1');
INSERT INTO `elections` VALUES ('13', 'RTC DS general election', '2', '2024', '0', '2024-02-17 20:02:00', '2024-02-19 20:02:00', '1', '1');
INSERT INTO `elections` VALUES ('14', 'RTC VBV election', '2', '2024', '0', '2024-02-18 20:15:00', '2024-02-20 20:15:00', '0', '1');
INSERT INTO `elections` VALUES ('15', 'RTC UCSC election 3', '2', '2024', '0', '2024-02-20 07:19:00', '2024-02-20 16:19:00', '1', '1');
INSERT INTO `elections` VALUES ('16', 'LEO Election NK 1', '1', '2024', '0', '2024-02-24 10:48:00', '2024-02-25 10:48:00', '1', '1');
INSERT INTO `elections` VALUES ('17', 'CDG General Election', '17', '2024', '0', '2024-03-28 08:00:00', '2024-03-29 08:00:00', '1', '0');
INSERT INTO `elections` VALUES ('18', 'CDG Test Election', '17', '2024', '0', '2024-03-23 02:00:00', '2024-05-04 02:00:00', '1', '1');
INSERT INTO `elections` VALUES ('19', 'CDG Test NK election', '17', '2024', '0', '2024-03-26 02:05:00', '2024-03-30 02:06:00', '1', '1');

-- ----------------------------
-- Table structure for `election_candidates`
-- ----------------------------
DROP TABLE IF EXISTS `election_candidates`;
CREATE TABLE `election_candidates` (
  `election_candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) DEFAULT NULL,
  `election_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `winner_stts` int(11) DEFAULT NULL,
  `vote_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`election_candidate_id`),
  KEY `candidate_id` (`candidate_id`),
  CONSTRAINT `election_candidates_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `org_member_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of election_candidates
-- ----------------------------
INSERT INTO `election_candidates` VALUES ('25', '9', '1', null, null, null);
INSERT INTO `election_candidates` VALUES ('26', '13', '1', null, null, null);
INSERT INTO `election_candidates` VALUES ('27', '15', '1', null, '1', null);
INSERT INTO `election_candidates` VALUES ('28', '30', '1', null, null, null);
INSERT INTO `election_candidates` VALUES ('29', '9', '3', null, null, null);
INSERT INTO `election_candidates` VALUES ('30', '15', '3', null, null, null);
INSERT INTO `election_candidates` VALUES ('31', '9', '2', null, null, null);
INSERT INTO `election_candidates` VALUES ('32', '15', '2', null, null, null);
INSERT INTO `election_candidates` VALUES ('33', '30', '2', null, null, null);
INSERT INTO `election_candidates` VALUES ('34', '29', '4', null, null, null);
INSERT INTO `election_candidates` VALUES ('35', '31', '4', null, null, null);
INSERT INTO `election_candidates` VALUES ('36', '40', '4', null, null, null);
INSERT INTO `election_candidates` VALUES ('37', '13', '6', '1', '1', '2');
INSERT INTO `election_candidates` VALUES ('38', '29', '6', '1', null, null);
INSERT INTO `election_candidates` VALUES ('39', '31', '6', '1', '1', '2');
INSERT INTO `election_candidates` VALUES ('42', '39', '6', '1', null, null);
INSERT INTO `election_candidates` VALUES ('46', '9', '6', '2', '1', '2');
INSERT INTO `election_candidates` VALUES ('47', '15', '6', '2', null, null);
INSERT INTO `election_candidates` VALUES ('48', '9', '7', '6', null, null);
INSERT INTO `election_candidates` VALUES ('49', '13', '7', '7', null, null);
INSERT INTO `election_candidates` VALUES ('50', '31', '7', '7', null, null);
INSERT INTO `election_candidates` VALUES ('51', '9', null, '19', null, null);
INSERT INTO `election_candidates` VALUES ('52', '29', null, '19', null, null);
INSERT INTO `election_candidates` VALUES ('53', '6', '14', '19', null, null);
INSERT INTO `election_candidates` VALUES ('54', '15', '14', '19', null, null);
INSERT INTO `election_candidates` VALUES ('55', '14', null, '19', null, null);
INSERT INTO `election_candidates` VALUES ('56', '29', '14', '19', null, null);
INSERT INTO `election_candidates` VALUES ('57', '13', '14', '20', null, null);
INSERT INTO `election_candidates` VALUES ('58', '30', '14', '20', null, null);
INSERT INTO `election_candidates` VALUES ('59', '32', '14', '20', null, null);
INSERT INTO `election_candidates` VALUES ('60', '31', '14', '21', null, null);
INSERT INTO `election_candidates` VALUES ('61', '40', '14', '21', null, null);
INSERT INTO `election_candidates` VALUES ('65', '14', '15', '23', null, null);
INSERT INTO `election_candidates` VALUES ('66', '39', '15', '23', null, null);
INSERT INTO `election_candidates` VALUES ('67', '30', '15', '24', null, null);
INSERT INTO `election_candidates` VALUES ('68', '40', '15', '24', null, null);
INSERT INTO `election_candidates` VALUES ('70', '13', '15', '22', null, null);
INSERT INTO `election_candidates` VALUES ('71', '29', '15', '22', null, null);
INSERT INTO `election_candidates` VALUES ('72', '31', '15', '22', null, null);
INSERT INTO `election_candidates` VALUES ('73', '19', '16', '25', null, null);
INSERT INTO `election_candidates` VALUES ('74', '35', '16', '25', null, null);
INSERT INTO `election_candidates` VALUES ('82', '57', '17', '28', null, null);
INSERT INTO `election_candidates` VALUES ('83', '63', '17', '28', '1', '1');
INSERT INTO `election_candidates` VALUES ('84', '65', '17', '28', null, null);
INSERT INTO `election_candidates` VALUES ('96', '58', '17', '27', null, null);
INSERT INTO `election_candidates` VALUES ('97', '61', '17', '27', '1', '1');

-- ----------------------------
-- Table structure for `election_positions`
-- ----------------------------
DROP TABLE IF EXISTS `election_positions`;
CREATE TABLE `election_positions` (
  `ep_id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of election_positions
-- ----------------------------
INSERT INTO `election_positions` VALUES ('1', '6', 'President');
INSERT INTO `election_positions` VALUES ('2', '6', 'Sub President');
INSERT INTO `election_positions` VALUES ('3', '6', 'Secretary');
INSERT INTO `election_positions` VALUES ('4', '6', 'Tresure 1');
INSERT INTO `election_positions` VALUES ('5', '6', 'Tresure 2');
INSERT INTO `election_positions` VALUES ('6', '7', 'LSC King');
INSERT INTO `election_positions` VALUES ('7', '7', 'LSC Queen');
INSERT INTO `election_positions` VALUES ('8', '8', 'President');
INSERT INTO `election_positions` VALUES ('9', '8', 'President');
INSERT INTO `election_positions` VALUES ('10', '7', 'LSC King 1');
INSERT INTO `election_positions` VALUES ('11', '7', 'LSC King 12');
INSERT INTO `election_positions` VALUES ('12', '8', 'President 2');
INSERT INTO `election_positions` VALUES ('13', '11', 'President');
INSERT INTO `election_positions` VALUES ('14', '11', 'Secretory');
INSERT INTO `election_positions` VALUES ('15', '12', 'President 1');
INSERT INTO `election_positions` VALUES ('16', '12', 'President 2');
INSERT INTO `election_positions` VALUES ('17', '13', 'Secretory 1 ');
INSERT INTO `election_positions` VALUES ('18', '13', 'Secretory 2');
INSERT INTO `election_positions` VALUES ('19', '14', 'President');
INSERT INTO `election_positions` VALUES ('20', '14', 'Secretory');
INSERT INTO `election_positions` VALUES ('21', '14', 'Treasurer');
INSERT INTO `election_positions` VALUES ('22', '15', 'President');
INSERT INTO `election_positions` VALUES ('23', '15', 'Secretory 1');
INSERT INTO `election_positions` VALUES ('24', '15', 'Secretory 2');
INSERT INTO `election_positions` VALUES ('25', '16', 'President');
INSERT INTO `election_positions` VALUES ('26', '16', 'Secretory');
INSERT INTO `election_positions` VALUES ('27', '17', 'President');
INSERT INTO `election_positions` VALUES ('28', '17', 'Secretory');
INSERT INTO `election_positions` VALUES ('29', '19', 'Test 1');

-- ----------------------------
-- Table structure for `election_votes`
-- ----------------------------
DROP TABLE IF EXISTS `election_votes`;
CREATE TABLE `election_votes` (
  `election_vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `elelction_id` int(11) DEFAULT NULL,
  `nic_no` varchar(100) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`election_vote_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `election_votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `org_member_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of election_votes
-- ----------------------------
INSERT INTO `election_votes` VALUES ('1', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('2', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('3', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('4', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('5', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('6', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('7', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('8', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('9', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('10', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('11', null, '9', '1', null, null);
INSERT INTO `election_votes` VALUES ('12', null, '13', '1', null, null);
INSERT INTO `election_votes` VALUES ('13', null, '13', '1', null, null);
INSERT INTO `election_votes` VALUES ('14', null, '13', '1', null, null);
INSERT INTO `election_votes` VALUES ('15', null, '13', '1', null, null);
INSERT INTO `election_votes` VALUES ('16', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('17', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('18', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('19', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('20', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('21', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('22', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('23', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('24', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('25', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('26', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('27', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('28', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('29', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('30', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('31', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('32', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('33', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('34', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('35', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('36', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('37', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('38', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('39', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('40', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('41', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('42', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('43', null, '15', '1', null, null);
INSERT INTO `election_votes` VALUES ('44', null, '30', '1', null, null);
INSERT INTO `election_votes` VALUES ('45', null, '30', '1', null, null);
INSERT INTO `election_votes` VALUES ('46', '13', '9', '3', null, null);
INSERT INTO `election_votes` VALUES ('47', null, '9', '2', '947100562V', null);
INSERT INTO `election_votes` VALUES ('48', null, '9', '3', '947100562V', null);
INSERT INTO `election_votes` VALUES ('49', null, '29', '4', '947100562V', null);
INSERT INTO `election_votes` VALUES ('51', null, '15', '6', '947100562V', '2');
INSERT INTO `election_votes` VALUES ('52', null, '31', '6', '947100562V', '1');
INSERT INTO `election_votes` VALUES ('55', null, '19', '16', '128093ee2ccd3d7e2e88caf48bef466d', '25');
INSERT INTO `election_votes` VALUES ('56', null, '30', '15', '128093ee2ccd3d7e2e88caf48bef466d', '24');
INSERT INTO `election_votes` VALUES ('57', null, '13', '6', null, '1');
INSERT INTO `election_votes` VALUES ('59', null, '31', '6', null, '1');
INSERT INTO `election_votes` VALUES ('60', null, '39', '6', null, '1');
INSERT INTO `election_votes` VALUES ('61', null, '9', '6', null, '2');
INSERT INTO `election_votes` VALUES ('63', null, '9', '6', '', '2');
INSERT INTO `election_votes` VALUES ('64', null, '13', '15', '128093ee2ccd3d7e2e88caf48bef466d', '22');
INSERT INTO `election_votes` VALUES ('65', null, '13', '6', '', '1');
INSERT INTO `election_votes` VALUES ('66', null, '9', '7', '8424993a6b9ab69c4c9b1efb0231b5fc', '6');
INSERT INTO `election_votes` VALUES ('67', null, '61', '17', '8569e2cc29ccbc45e8429553175ca874', '27');
INSERT INTO `election_votes` VALUES ('68', null, '63', '17', '8569e2cc29ccbc45e8429553175ca874', '28');
INSERT INTO `election_votes` VALUES ('69', null, '13', '15', '2f48beb87669d435681d04a5933c25a2', '22');

-- ----------------------------
-- Table structure for `organization`
-- ----------------------------
DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(200) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `active_stts` int(11) DEFAULT NULL,
  `org_code` varchar(5) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of organization
-- ----------------------------
INSERT INTO `organization` VALUES ('1', 'Leo club', '0112456789', '571/5, Arawwala,colombo', 'leo@gmail.com', '0', '2023-08-10', '1', 'LEO', null);
INSERT INTO `organization` VALUES ('2', 'Rotract club', '0112456789', '571/5, Arawwala,colombo', 'leo@gmail.com', '0', '2023-08-10', '1', 'RTC', null);
INSERT INTO `organization` VALUES ('3', 'zxcv', '23423423', 'sa', 'sad@vggg.lk', '1', '2023-12-14', '1', 'TNB', null);
INSERT INTO `organization` VALUES ('4', '123', '123', '123', '123@gmail.com', '1', '2023-12-30', '0', '123', null);
INSERT INTO `organization` VALUES ('6', 'Rotract club', '0112456789', '571/5, Arawwala,', 'ucsc@gmail.com', '1', '2023-12-30', '0', 'UCSC', null);
INSERT INTO `organization` VALUES ('7', 'sdsdf', '234234132', 'sdfd', 'sad@vggg.lk', '1', '2023-12-30', '1', 'ew', null);
INSERT INTO `organization` VALUES ('8', 'addasddqed', '+9477898565', 'das', 'aiesec@gmail.com', '1', '2023-12-30', '1', 'sd', null);
INSERT INTO `organization` VALUES ('9', 'Leo club', '0112456789', '571/5, Arawwala,', 'little@gmail.com', '1', '2023-12-30', '1', 'LEOC', null);
INSERT INTO `organization` VALUES ('10', 'UCSC Union', '0112456789', '571/5, Arawwala,', 'ucsc@gmail.com', '1', '2024-02-10', '1', 'UCSCU', null);
INSERT INTO `organization` VALUES ('11', 'VBV OGA', '0112456789', '571/5, Arawwala,', 'vbvoga@gmail.com', '1', '2024-03-07', '1', 'VBV', null);
INSERT INTO `organization` VALUES ('12', 'DVP OBA', '0112456789', '571/5, Arawwala,', 'dvp@gmail.com', '1', '2024-03-07', '1', 'DVP', null);
INSERT INTO `organization` VALUES ('13', 'xfgfsfsdfd', '2322345678', 'dsgsdf', 'sad@vggg.lk', '1', '2024-03-21', '1', 'TFDD', null);
INSERT INTO `organization` VALUES ('14', 'sdsfsdf asdasd', '0777213266', '571/5, Arawwala,', 'rct@gmail.com', '1', '2024-03-21', '1', 'LEOES', null);
INSERT INTO `organization` VALUES ('15', 'zxdsfzfds', '0112456789', '571/5, Arawwala,', 'sad@vggg.lk', '1', '2024-03-21', '1', 'TYHB', null);
INSERT INTO `organization` VALUES ('16', 'Sysco', '1234567781', 'Maharagama', 'nk@gmail.com', '1', '2024-03-22', '1', 'RCT', null);
INSERT INTO `organization` VALUES ('17', 'CodeGen', '0777213266', 'Colombo 3', 'codegen@gmail.com', '1', '2024-03-23', '1', 'CDG', null);
INSERT INTO `organization` VALUES ('18', 'Infor Nexus', '1234567890', 'Maharagama', 'infor@gmail.com', '1', '2024-03-23', '1', 'IN', null);

-- ----------------------------
-- Table structure for `org_member_users`
-- ----------------------------
DROP TABLE IF EXISTS `org_member_users`;
CREATE TABLE `org_member_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) DEFAULT NULL,
  `user_full_name` varchar(200) DEFAULT NULL,
  `u_address` varchar(250) DEFAULT NULL,
  `u_contact_no` varchar(15) DEFAULT NULL,
  `u_email_address` varchar(100) DEFAULT NULL,
  `u_username` varchar(100) DEFAULT NULL,
  `u_password` varchar(200) DEFAULT NULL,
  `u_active_stts` int(11) DEFAULT NULL,
  `u_created_on` date DEFAULT NULL,
  `u_created_by` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT 'if 1 admin,if 2 normal member',
  `admin_nic` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `org_id` (`org_id`),
  CONSTRAINT `org_member_users_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organization` (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of org_member_users
-- ----------------------------
INSERT INTO `org_member_users` VALUES ('6', '2', 'andrew east', 'dsvxfgd', '3424324324', 'fsdf@ggg.lk', 'RTCadmin1', '4d07cd0157cb9c3e5b6edb850337d493', '1', '0000-00-00', '0', '1', '882400182v');
INSERT INTO `org_member_users` VALUES ('9', '2', 'Nuwani Kokila', 'pannipitiya', '0112456789', 'thissa@gmail.com', 'GSH', 'b9f6bc67466b741e985513245b044952', '1', '2023-08-17', '6', '1', '19855896521');
INSERT INTO `org_member_users` VALUES ('13', '2', 'Pamoda', '571/1, Arawwala, Pannipitiya', '777213266', 'pamoda@gmail.com', 'RTCMEM1', '128093ee2ccd3d7e2e88caf48bef466d', '1', '2023-09-06', '6', '2', '947100562V');
INSERT INTO `org_member_users` VALUES ('14', '2', 'Supun', '32/1, Temple road, Piliyandala', '716813770', 'supun@gmail.com', 'RTCMEM2', '52b3bb792021292510a95409684e696a', '1', '2023-09-06', '6', '2', '961276522V');
INSERT INTO `org_member_users` VALUES ('15', '2', 'Kusal mendis bindusara', '38/1, Maharagama', '714272318', 'kusal@gmail.com', 'RTCMEM3', 'c1cfadadb5ba806499a7806413786622', '1', '2023-09-06', '6', '2', '916533728V');
INSERT INTO `org_member_users` VALUES ('19', '1', 'Kokila', '32/1A, Navinna, Maharagama', '0712010125', 'kokila@gmail.com', 'LEOadmin1', '2bbd0b96abaf8052e7de4f92d8696b50', '1', '2023-09-22', '1', '1', '1234567890v');
INSERT INTO `org_member_users` VALUES ('29', '2', 'Chathura De Silva', '32/3, Suwarapola, Piliyandala', '716813770', 'chathura@gmail.com', null, null, '1', '2023-09-29', '6', '2', '882345678V');
INSERT INTO `org_member_users` VALUES ('30', '2', 'Dineth Kumara', '82/1, Pansala Rd, Kaduwela', '716813880', 'dineth@gmial.com', null, null, '1', '2023-09-29', '6', '2', '987654321V');
INSERT INTO `org_member_users` VALUES ('31', '2', 'Senuri Vidanage', '42/5, Temple road, Nikawaratiya', '716819970', 'senuri@gmail.com', null, null, '1', '2023-09-29', '6', '2', '207654321V');
INSERT INTO `org_member_users` VALUES ('32', '2', 'edew wfewe', 'pannipitiya', '12312321312', null, null, null, '1', '2023-09-29', '6', null, '5688555642V');
INSERT INTO `org_member_users` VALUES ('33', '2', 'dwdd', 'sdfdsf', '131231', null, null, null, '1', '2023-09-29', '6', null, '1312313123');
INSERT INTO `org_member_users` VALUES ('34', '2', 'dasdad', 'sdfdsf', '2343242343', null, null, null, '1', '2023-09-29', '6', '2', '3838376264V');
INSERT INTO `org_member_users` VALUES ('35', '1', 'Pamoda 222', '571/1, Arawwala, Pannipitiya', '777213266', 'pamoda@gmail.com', 'LEOMEM1', '128093ee2ccd3d7e2e88caf48bef466d', '1', '2023-09-06', '6', '2', '947100562V');
INSERT INTO `org_member_users` VALUES ('39', '2', 'kamila', 'pannipitiya', '3123123123', 'kamila@gmail.com', 'RTCadmin3', '014f5061aa035270f1b47fbf59a0a7e0', '1', '2023-12-30', '6', '1', '324242412312v');
INSERT INTO `org_member_users` VALUES ('40', '2', 'Deshani Wathsala', '571/8, Temple Rd, Maharagama', '0777213266', 'deshaniwathsala@gmail.com', null, '1679b0c5824f02dd561473a62f445680', '1', '2024-01-27', '6', '2', '971005341V');
INSERT INTO `org_member_users` VALUES ('41', '10', 'Kinuri Hasinika', '32/1A, Navinna, Maharagama', '0712010125', 'aaa@gamil.com', 'UCSCUadmin1', 'a860b72b0f090d2407bde0b612e0f7b7', '1', '2024-02-10', '1', '1', '1111111111v');
INSERT INTO `org_member_users` VALUES ('42', '10', 'Chathura De Silva', '32/3, Suwarapola, Piliyandala', '716813770', 'chathura@gmail.com', null, null, '1', '2024-02-10', '41', '2', '882345678V');
INSERT INTO `org_member_users` VALUES ('43', '10', 'Dineth Kumara', '82/1, Pansala Rd, Kaduwela', '716813880', 'dineth@gmial.com', null, null, '1', '2024-02-10', '41', '2', '987654321V');
INSERT INTO `org_member_users` VALUES ('44', '10', 'Senuri Vidanage', '42/5, Temple road, Nikawaratiya', '716819970', 'senuri@gmail.com', null, null, '1', '2024-02-10', '41', '2', '207654321V');
INSERT INTO `org_member_users` VALUES ('45', '10', 'Pamoda', '571/1, Arawwala, Pannipitiya', '777213266', 'pamoda@gmail.com', 'RTCMEM1', '128093ee2ccd3d7e2e88caf48bef466d', '1', '2023-09-06', '6', '2', '947100562V');
INSERT INTO `org_member_users` VALUES ('46', '2', 'kamila', 'sdfdsf', 'wrsdfsdfdswer2r', 'deshaniwathsala@gmail.com', null, null, '1', '2024-03-21', '6', '2', '32423423423');
INSERT INTO `org_member_users` VALUES ('47', '2', 'Deshani Wathsala', 'sdfdsf', 'dsaasdfasd', 'kamila@gmail.com', null, null, '1', '2024-03-21', '6', '2', '31231232');
INSERT INTO `org_member_users` VALUES ('48', '2', 'dfsfsfs', 'fdgddfg', 'dfsfsaasd', 'thissa@gmail.com', null, null, '1', '2024-03-21', '6', '2', '2342423423');
INSERT INTO `org_member_users` VALUES ('49', '2', 'cvxvcx', 'fdgddfg', '1234234567', 'thissa@gmail.com', null, null, '1', '2024-03-21', '6', '2', '3123123123123');
INSERT INTO `org_member_users` VALUES ('50', '16', 'Sarani', 'Galle', '1234567890', 'qaz@gmail.com', 'RCTadmin1', 'f360f65e9fd8ada0718522d5aa229203', '1', '2024-03-22', '1', '1', '1234987653V');
INSERT INTO `org_member_users` VALUES ('51', '2', 'ssss', 'tttt', '1234567890', 'kamila@gmail.com', null, null, '1', '2024-03-22', '6', '2', '2345678904');
INSERT INTO `org_member_users` VALUES ('52', '17', 'Kumudu Adithya', 'Pannipitiya', '0716813770', 'kumudu@gmail.com', 'CDGadmin1', '8569e2cc29ccbc45e8429553175ca874', '1', '2024-03-23', '1', '1', '957100562V');
INSERT INTO `org_member_users` VALUES ('53', '17', 'Ernesto Anderson', 'B15,Pallekotuwa,Kandy District,Sri Lanka ', '712245966', 'stecoop@yahoo.ca', null, null, '1', '2024-03-23', '52', '2', '994560035V');
INSERT INTO `org_member_users` VALUES ('54', '17', 'Kyleigh Daniel', 'B68,Periyapullumalai,Batticaloa District,Sri Lanka ', '774489613', 'cfhsoft@yahoo.ca', null, null, '1', '2024-03-23', '52', '2', '794859886V');
INSERT INTO `org_member_users` VALUES ('55', '17', 'Toby Tyler', 'B2,Maswela,Nuwara Eliya District,Sri Lanka ', '704489612', 'leslie@att.net', null, null, '1', '2024-03-23', '52', '2', '100868448V');
INSERT INTO `org_member_users` VALUES ('56', '17', 'Jovany Morrison', 'B107,Parasangahawewa,Anuradhapura District,Sri Lanka ', '712245969', 'gbacon@msn.com', null, null, '1', '2024-03-23', '52', '2', '269840815V');
INSERT INTO `org_member_users` VALUES ('57', '17', 'Conor Moon', 'B8,Bopitiya,Kurunegala District,Sri Lanka ', '704489615', 'raines@mac.com', null, null, '1', '2024-03-23', '52', '2', '779495052V');
INSERT INTO `org_member_users` VALUES ('58', '17', 'Travis Preston', 'B95,Galmuruwa,Puttalam District,Sri Lanka ', '704489614', 'duncand@att.net', null, null, '1', '2024-03-23', '52', '2', '234287593V');
INSERT INTO `org_member_users` VALUES ('59', '17', 'Axel Schwartz', 'B28,Putuhapuwa,Kandy District,Sri Lanka ', '712245972', 'wildfire@att.net', null, null, '1', '2024-03-23', '52', '2', '113606214V');
INSERT INTO `org_member_users` VALUES ('60', '17', 'Genevieve Meza', 'B10,Pahalagiribawa,Kurunegala District,Sri Lanka ', '704489618', 'klaudon@yahoo.com', null, null, '1', '2024-03-23', '52', '2', '219675592V');
INSERT INTO `org_member_users` VALUES ('61', '17', 'Belinda Weiss', 'B73,Wadumunnegedara,Kurunegala District,Sri Lanka ', '704569619', 'brainless@verizon.net', null, null, '1', '2024-03-23', '52', '2', '778109825V');
INSERT INTO `org_member_users` VALUES ('62', '17', 'Davin Livingston', 'B64,Ihala Gomugomuwa,Kurunegala District,Sri Lanka ', '712245967', 'frederic@live.com', null, null, '1', '2024-03-23', '52', '2', '578893164V');
INSERT INTO `org_member_users` VALUES ('63', '17', 'Cade Gilbert', 'B127,Etawatunuwewa,Anuradhapura District,Sri Lanka ', '704489617', 'esasaki@icloud.com', null, null, '1', '2024-03-23', '52', '2', '593309706V');
INSERT INTO `org_member_users` VALUES ('64', '17', 'Sariah Salas', 'B147,Mahauswewa,Puttalam District,Sri Lanka ', '703259618', 'jfinke@gmail.com', null, null, '1', '2024-03-23', '52', '2', '837978157V');
INSERT INTO `org_member_users` VALUES ('65', '17', 'Paloma Wolf', 'B37,Central Camp,Ampara District,Sri Lanka ', '774489616', 'calin@outlook.com', null, null, '1', '2024-03-23', '52', '2', '834357097V');
INSERT INTO `org_member_users` VALUES ('66', '17', 'George Schwartz', 'B152,Ulpotha Pallekele,Kurunegala District,Sri Lanka ', '712245970', 'wortmanj@hotmail.com', null, null, '1', '2024-03-23', '52', '2', '201894399V');
INSERT INTO `org_member_users` VALUES ('67', '17', 'Elaine Whitaker', 'B70,Galkiriyagama,Anuradhapura District,Sri Lanka ', '774489619', 'mnemonic@yahoo.ca', null, null, '1', '2024-03-23', '52', '2', '230999813V');
INSERT INTO `org_member_users` VALUES ('68', '17', 'Davis Levine', 'B66,Angunawila,Puttalam District,Sri Lanka ', '704489620', 'storerm@aol.com', null, null, '1', '2024-03-23', '52', '2', '812949173V');
INSERT INTO `org_member_users` VALUES ('69', '17', 'Emelia Johnston', 'B109,Dankanda,Matale District,Sri Lanka ', '712245971', 'ahmad@icloud.com', null, null, '1', '2024-03-23', '52', '2', '643166411V');
INSERT INTO `org_member_users` VALUES ('70', '17', 'Kristian Solis', 'B134,Chinabay,Trincomalee District,Sri Lanka ', '704489622', 'smallpaul@yahoo.ca', null, null, '1', '2024-03-23', '52', '2', '350072454V');
INSERT INTO `org_member_users` VALUES ('71', '17', 'Jamie Eaton', 'B30,Velamboda,Kandy District,Sri Lanka ', '704959623', 'ideguy@comcast.net', null, null, '1', '2024-03-23', '52', '2', '132745431V');
INSERT INTO `org_member_users` VALUES ('72', '17', 'Jairo Joyce', 'B80,KantalaiSugarFactory,Trincomalee District,Sri Lanka ', '704489621', 'sinkou@att.net', null, null, '1', '2024-03-23', '52', '2', '159012740V');
INSERT INTO `org_member_users` VALUES ('73', '17', 'Emmett Burnett', 'B168,Batagolladeniya,Kandy District,Sri Lanka ', '703605622', 'peoplesr@yahoo.com', null, null, '1', '2024-03-23', '52', '2', '244747005V');
INSERT INTO `org_member_users` VALUES ('74', '17', 'Angie Ortiz', 'B21,Dewahuwa,Matale District,Sri Lanka ', '712245968', 'frosal@icloud.com', null, null, '1', '2024-03-23', '52', '2', '409880428V');
INSERT INTO `org_member_users` VALUES ('75', '17', 'Caleb Ochoa', 'B145,Dewagala,Polonnaruwa District,Sri Lanka ', '712245969', 'oneiros@comcast.net', null, null, '1', '2024-03-23', '52', '2', '81969182V');
INSERT INTO `org_member_users` VALUES ('76', '17', 'Alison Cummings', 'B35,Maspotha,Kurunegala District,Sri Lanka ', '712953970', 'shang@att.net', null, null, '1', '2024-03-23', '52', '2', '384399677V');
INSERT INTO `org_member_users` VALUES ('77', '17', 'Rene Galloway', 'B169,Mandur,Batticaloa District,Sri Lanka ', '713658971', 'pthomsen@icloud.com', null, null, '1', '2024-03-23', '52', '2', '729209763V');
INSERT INTO `org_member_users` VALUES ('78', '2', 'Kumudu Adithya', '571/8, Temple Rd, Maharagama', '0112456789', 'deshaniwathsala@gmail.com', null, null, '1', '2024-03-23', '6', '2', '957100562V');
INSERT INTO `org_member_users` VALUES ('79', '18', 'Gihan 1', 'Pannipitiya', '0716813770', 'gihan@gmail.com', 'INadmin1', '8569e2cc29ccbc45e8429553175ca874', '1', '2024-03-23', '1', '1', '957100562V');

-- ----------------------------
-- Table structure for `org_registration_payment`
-- ----------------------------
DROP TABLE IF EXISTS `org_registration_payment`;
CREATE TABLE `org_registration_payment` (
  `org_registration_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) DEFAULT NULL,
  `register_from` date DEFAULT NULL,
  `register_to` date DEFAULT NULL,
  `payment_stts` int(11) DEFAULT NULL,
  `price_id` decimal(10,0) DEFAULT NULL,
  `week_remainder_date` date DEFAULT NULL,
  PRIMARY KEY (`org_registration_id`),
  KEY `org_id` (`org_id`),
  CONSTRAINT `org_registration_payment_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organization` (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of org_registration_payment
-- ----------------------------
INSERT INTO `org_registration_payment` VALUES ('1', '1', '2023-08-10', '2024-08-09', '1', '1', '2024-08-02');
INSERT INTO `org_registration_payment` VALUES ('2', '3', '2023-12-14', '2024-12-13', '1', '1', '2024-12-06');
INSERT INTO `org_registration_payment` VALUES ('3', '4', '2023-12-30', '2024-12-29', '1', '1', '2024-12-22');
INSERT INTO `org_registration_payment` VALUES ('5', '6', '2023-12-30', '2024-03-09', '1', '1', '2024-12-22');
INSERT INTO `org_registration_payment` VALUES ('6', '7', '2023-12-30', '2024-12-29', '1', '2', '2024-12-22');
INSERT INTO `org_registration_payment` VALUES ('7', '8', '2023-12-30', '2024-12-29', '1', '2', '2024-12-22');
INSERT INTO `org_registration_payment` VALUES ('8', '9', '2023-12-30', '2024-12-29', '1', '2', '2024-12-22');
INSERT INTO `org_registration_payment` VALUES ('9', '10', '2024-02-10', '2025-02-09', '1', '2', '2025-02-02');
INSERT INTO `org_registration_payment` VALUES ('10', '11', '2024-03-07', '2025-03-07', '1', '2', '2025-02-28');
INSERT INTO `org_registration_payment` VALUES ('11', '12', '2024-03-07', '2025-03-07', '1', '2', '2025-02-28');
INSERT INTO `org_registration_payment` VALUES ('12', '2', '2023-12-14', '2024-03-13', '1', '2', '2024-03-07');
INSERT INTO `org_registration_payment` VALUES ('13', '2', '2024-03-12', '2024-03-13', '1', '2', '2024-03-07');
INSERT INTO `org_registration_payment` VALUES ('14', '13', '2024-03-21', '2025-03-21', '1', '4', '2025-03-14');
INSERT INTO `org_registration_payment` VALUES ('15', '14', '2024-03-21', '2025-03-21', '1', '4', '2025-03-14');
INSERT INTO `org_registration_payment` VALUES ('16', '15', '2024-03-21', '2025-03-21', '1', '4', '2025-03-14');
INSERT INTO `org_registration_payment` VALUES ('17', '16', '2024-03-22', '2025-03-22', '1', '4', '2025-03-15');
INSERT INTO `org_registration_payment` VALUES ('18', '17', '2024-03-23', '2025-03-23', '1', '4', '2025-03-16');
INSERT INTO `org_registration_payment` VALUES ('19', '18', '2024-03-23', '2025-03-23', '1', '5', '2025-03-16');

-- ----------------------------
-- Table structure for `payment_config`
-- ----------------------------
DROP TABLE IF EXISTS `payment_config`;
CREATE TABLE `payment_config` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment_config
-- ----------------------------
INSERT INTO `payment_config` VALUES ('1', '5000', '2023-08-10', '1', '2023-08-10');
INSERT INTO `payment_config` VALUES ('2', '5500', '2023-08-10', '1', '2023-08-10');
INSERT INTO `payment_config` VALUES ('4', '6500', '2024-03-12', '1', '2024-03-12');
INSERT INTO `payment_config` VALUES ('5', '7000', '2024-03-22', '1', '2024-03-22');

-- ----------------------------
-- Table structure for `site_admin`
-- ----------------------------
DROP TABLE IF EXISTS `site_admin`;
CREATE TABLE `site_admin` (
  `main_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `main_username` varchar(100) DEFAULT NULL,
  `main_password` varchar(200) DEFAULT NULL,
  `main_active_stts` int(11) DEFAULT NULL,
  PRIMARY KEY (`main_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of site_admin
-- ----------------------------
INSERT INTO `site_admin` VALUES ('1', 'Nuwani Kokila', '1', 'nuwani', '4d07cd0157cb9c3e5b6edb850337d493', '1');
INSERT INTO `site_admin` VALUES ('2', 'mervin perera', '1', 'mervin', '700c8b805a3e2a265b01c77614cd8b21', '1');
INSERT INTO `site_admin` VALUES ('3', 'ttrewrtetrrt', '1', '2020mit051', 'fd26bae7725d24e8e5ed9de08e5b6de6', '1');
INSERT INTO `site_admin` VALUES ('4', 'sadfs', '1', 'as', '6116afedcb0bc31083935c1c262ff4c9', '1');
INSERT INTO `site_admin` VALUES ('5', '12345', '1', '12345', 'b714337aa8007c433329ef43c7b8252c', '0');
INSERT INTO `site_admin` VALUES ('7', 'nuwani kokila', '1', '2222', 'e86965026b03eae4a36ba827f5301636', '1');
INSERT INTO `site_admin` VALUES ('8', 'nuwani kokila', '1', 'nuwani2', '4d07cd0157cb9c3e5b6edb850337d493', '1');
INSERT INTO `site_admin` VALUES ('9', 'dsfw', '1', 'fggsdf', '6dae4bfb417f1d2b45cb9e96ed387232', '1');
INSERT INTO `site_admin` VALUES ('10', 'dscsd', '1', 'sv', '96c1c91d06b0a977bde463d1acbf4ac5', '1');
INSERT INTO `site_admin` VALUES ('11', 'Kinuri Yahampath', '1', 'kinuri', '4d07cd0157cb9c3e5b6edb850337d493', '1');
INSERT INTO `site_admin` VALUES ('12', 'qqqq', '1', 'aaaa', '1d294078df3c9f2a171e11c4ac2c934c', '1');
