/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : myhfm

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-12-12 18:03:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fm_log`
-- ----------------------------
DROP TABLE IF EXISTS `fm_log`;
CREATE TABLE `fm_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `connent` varchar(255) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fm_log
-- ----------------------------
INSERT INTO `fm_log` VALUES ('11', '[admin],登录成功。', '116.22.165.213', '2017-12-07 22:53:42');
INSERT INTO `fm_log` VALUES ('12', '[maduzao],登录成功。', '116.22.165.213', '2017-12-07 22:54:19');
INSERT INTO `fm_log` VALUES ('13', '[28],（ss00.myh100.cn,sls01.myh100.net,sls01.myh100.com,sgjs02.yqwyx.net.cn）修改授权网址。', '116.22.165.213', '2017-12-07 22:55:15');
INSERT INTO `fm_log` VALUES ('14', '[admin],登录成功。', '183.6.130.188', '2017-12-08 09:43:15');
INSERT INTO `fm_log` VALUES ('15', '[maduzao],登录成功。', '183.6.130.188', '2017-12-08 09:44:29');
INSERT INTO `fm_log` VALUES ('16', '[maduzao],登录成功。', '113.108.195.92', '2017-12-08 09:56:05');
INSERT INTO `fm_log` VALUES ('17', '[maduzao],登录成功。', '183.6.130.188', '2017-12-08 09:58:56');
INSERT INTO `fm_log` VALUES ('18', '[maduzao],登录成功。', '113.108.195.92', '2017-12-08 10:05:24');
INSERT INTO `fm_log` VALUES ('19', '[maduzao],登录成功。', '113.65.205.191', '2017-12-08 10:18:00');
INSERT INTO `fm_log` VALUES ('20', '[maduzao],登录成功。', '121.8.242.187', '2017-12-08 10:18:59');
INSERT INTO `fm_log` VALUES ('21', '[maduzao],登录成功。', '183.6.130.188', '2017-12-08 10:21:45');
INSERT INTO `fm_log` VALUES ('22', '[maduzao],登录成功。', '183.6.130.188', '2017-12-08 10:30:19');
INSERT INTO `fm_log` VALUES ('23', '[maduzao],登录成功。', '121.8.242.187', '2017-12-08 10:54:11');
INSERT INTO `fm_log` VALUES ('24', '[wotai],登录成功。', '113.108.195.92', '2017-12-08 11:09:00');
INSERT INTO `fm_log` VALUES ('25', '[maduzao],登录成功。', '113.108.195.92', '2017-12-08 11:11:50');
INSERT INTO `fm_log` VALUES ('26', '[wotai],登录成功。', '113.108.195.92', '2017-12-08 11:14:10');
INSERT INTO `fm_log` VALUES ('27', '[maduzao],登录成功。', '113.108.195.92', '2017-12-08 11:16:44');
INSERT INTO `fm_log` VALUES ('28', '[wotai],登录成功。', '183.6.166.114', '2017-12-08 11:20:15');
INSERT INTO `fm_log` VALUES ('29', '[wotai],登录成功。', '183.6.166.114', '2017-12-08 11:22:43');
INSERT INTO `fm_log` VALUES ('30', '[wotai],登录成功。', '183.6.166.114', '2017-12-08 11:23:10');
INSERT INTO `fm_log` VALUES ('31', '[wotai],登录成功。', '183.6.166.114', '2017-12-08 11:23:28');
INSERT INTO `fm_log` VALUES ('32', '[maduzao],登录成功。', '113.65.205.191', '2017-12-08 11:25:25');
INSERT INTO `fm_log` VALUES ('33', '[wotai],登录成功。', '113.108.195.92', '2017-12-08 11:38:10');
INSERT INTO `fm_log` VALUES ('34', '[29],（bd.tairtyw.net）修改授权网址。', '219.137.189.101', '2017-12-08 11:38:49');
INSERT INTO `fm_log` VALUES ('35', '[maduzao],登录成功。', '113.108.195.92', '2017-12-08 11:40:21');
INSERT INTO `fm_log` VALUES ('36', '[wotai],登录成功。', '219.137.189.101', '2017-12-08 11:40:21');
INSERT INTO `fm_log` VALUES ('37', '[wotai],登录成功。', '183.6.130.188', '2017-12-08 13:59:33');
INSERT INTO `fm_log` VALUES ('38', '[zml],登录成功。', '61.140.127.101', '2017-12-08 14:04:51');
INSERT INTO `fm_log` VALUES ('39', '[zml],登录成功。', '183.6.130.188', '2017-12-08 14:05:38');
INSERT INTO `fm_log` VALUES ('40', '[wotai],登录成功。', '183.6.130.188', '2017-12-08 14:15:10');
INSERT INTO `fm_log` VALUES ('41', '[maduzao],登录成功。', '183.6.130.188', '2017-12-08 14:15:39');
INSERT INTO `fm_log` VALUES ('42', '[zml],登录成功。', '61.140.127.101', '2017-12-08 14:31:03');
INSERT INTO `fm_log` VALUES ('43', '[zml],登录成功。', '61.140.127.101', '2017-12-08 14:33:35');
INSERT INTO `fm_log` VALUES ('44', '[30],（e.zimilan.cn/bdqz/01,）修改授权网址。', '61.140.127.101', '2017-12-08 14:36:19');
INSERT INTO `fm_log` VALUES ('45', '[30],（e.zimilan.cn）修改授权网址。', '61.140.127.101', '2017-12-08 14:39:03');
INSERT INTO `fm_log` VALUES ('46', '[zml],登录成功。', '61.140.127.101', '2017-12-08 17:30:58');
INSERT INTO `fm_log` VALUES ('47', '[zml],登录成功。', '61.140.127.101', '2017-12-08 17:35:43');
INSERT INTO `fm_log` VALUES ('48', '[maduzao],登录成功。', '113.108.195.92', '2017-12-08 17:39:55');
INSERT INTO `fm_log` VALUES ('49', '[30],（e.zimilan.cn）修改授权网址。', '61.140.127.101', '2017-12-08 17:47:35');
INSERT INTO `fm_log` VALUES ('50', '[wotai],登录成功。', '116.22.165.228', '2017-12-09 15:23:47');
INSERT INTO `fm_log` VALUES ('51', '[maduzao],登录成功。', '116.22.165.228', '2017-12-09 15:25:48');
INSERT INTO `fm_log` VALUES ('52', '[wotai],登录成功。', '183.6.166.114', '2017-12-09 16:33:17');
INSERT INTO `fm_log` VALUES ('53', '[29],（bd.tairtyw.net\r\ncc.cjrmqit.com）修改授权网址。', '219.137.189.101', '2017-12-09 16:34:01');
INSERT INTO `fm_log` VALUES ('54', '[29],（bd.tairtyw.net\r\ncc.cjrmqit.com）修改授权网址。', '219.137.189.101', '2017-12-09 17:17:41');
INSERT INTO `fm_log` VALUES ('55', '[admin],登录成功。', '116.22.165.228', '2017-12-09 21:04:11');
INSERT INTO `fm_log` VALUES ('56', '[admin2017],登录成功。', '116.22.165.228', '2017-12-09 21:05:59');
INSERT INTO `fm_log` VALUES ('57', '[zml],登录成功。', '223.73.64.151', '2017-12-10 13:21:07');
INSERT INTO `fm_log` VALUES ('58', '[zml],登录成功。', '210.21.68.7', '2017-12-10 23:14:14');
INSERT INTO `fm_log` VALUES ('59', '[zml],登录成功。', '61.140.127.55', '2017-12-11 09:19:33');
INSERT INTO `fm_log` VALUES ('60', '[maduzao],登录成功。', '183.6.130.188', '2017-12-11 11:53:41');
INSERT INTO `fm_log` VALUES ('61', '[maduzao],登录成功。', '113.108.195.92', '2017-12-11 12:00:49');
INSERT INTO `fm_log` VALUES ('62', '[maduzao],登录成功。', '183.6.130.188', '2017-12-11 15:12:48');
INSERT INTO `fm_log` VALUES ('63', '[zml],登录成功。', '61.140.127.55', '2017-12-11 16:23:08');
INSERT INTO `fm_log` VALUES ('64', '[zml],登录成功。', '61.140.125.237', '2017-12-12 09:23:00');
INSERT INTO `fm_log` VALUES ('65', '[30],（e.zimilan.cn,e.zimilan.com）修改授权网址。', '61.140.125.237', '2017-12-12 10:11:08');
INSERT INTO `fm_log` VALUES ('66', '[30],（e.zimilan.cn,e.zimilan.com,）修改授权网址。', '61.140.125.237', '2017-12-12 10:11:56');
INSERT INTO `fm_log` VALUES ('67', '[wotai],登录成功。', '219.137.190.93', '2017-12-12 11:44:48');
INSERT INTO `fm_log` VALUES ('68', '[zml],登录成功。', '61.140.125.237', '2017-12-12 13:52:41');
INSERT INTO `fm_log` VALUES ('69', '[maduzao],登录成功。', '183.6.130.188', '2017-12-12 15:48:27');
INSERT INTO `fm_log` VALUES ('70', '[wotai],登录成功。', '116.22.165.155', '2017-12-12 21:47:09');
INSERT INTO `fm_log` VALUES ('71', '[maduzao],登录成功。', '113.111.10.208', '2017-12-14 09:57:12');
INSERT INTO `fm_log` VALUES ('72', '[wotai],登录成功。', '183.6.130.188', '2017-12-15 11:04:35');
INSERT INTO `fm_log` VALUES ('73', '[maduzao],登录成功。', '183.6.130.188', '2017-12-15 14:58:21');
INSERT INTO `fm_log` VALUES ('74', '[maduzao],登录成功。', '183.6.130.188', '2017-12-20 10:04:15');
INSERT INTO `fm_log` VALUES ('75', '[admin2017],登录成功。', '113.108.195.92', '2017-12-21 11:26:43');
INSERT INTO `fm_log` VALUES ('76', '[zml],登录成功。', '113.108.195.92', '2017-12-21 11:28:23');
INSERT INTO `fm_log` VALUES ('77', '[30],（e.zimilan.cn,e.zimilan.com）修改授权网址。', '113.108.195.92', '2017-12-21 11:29:38');
INSERT INTO `fm_log` VALUES ('78', '[wotai],登录成功。', '113.108.195.92', '2017-12-21 11:30:17');
INSERT INTO `fm_log` VALUES ('79', '[29],（bd.tairtyw.net,cc.cjrmqit.com）修改授权网址。', '113.108.195.92', '2017-12-21 11:30:25');
INSERT INTO `fm_log` VALUES ('80', '[maduzao],登录成功。', '183.6.130.188', '2017-12-21 16:52:23');
INSERT INTO `fm_log` VALUES ('81', '[maduzao],登录成功。', '183.6.130.188', '2017-12-21 16:53:11');
INSERT INTO `fm_log` VALUES ('82', '[maduzao],登录成功。', '183.6.130.188', '2017-12-25 14:14:37');
INSERT INTO `fm_log` VALUES ('83', '[maduzao],登录成功。', '113.108.195.92', '2017-12-25 15:37:49');
INSERT INTO `fm_log` VALUES ('84', '[maduzao],登录成功。', '183.6.130.188', '2017-12-25 15:38:09');
INSERT INTO `fm_log` VALUES ('85', '[maduzao],登录成功。', '183.6.130.188', '2017-12-25 16:44:21');
INSERT INTO `fm_log` VALUES ('86', '[admin2017],登录成功。', '113.108.195.92', '2017-12-25 17:01:20');
INSERT INTO `fm_log` VALUES ('87', '[wotai],登录成功。', '113.108.195.92', '2017-12-25 17:11:11');
INSERT INTO `fm_log` VALUES ('88', '[maduzao],登录成功。', '113.108.195.92', '2017-12-25 17:15:58');
INSERT INTO `fm_log` VALUES ('89', '[maduzao],登录成功。', '183.6.130.188', '2017-12-26 12:03:37');
INSERT INTO `fm_log` VALUES ('90', '[maduzao],登录成功。', '183.6.130.188', '2017-12-27 16:45:15');
INSERT INTO `fm_log` VALUES ('91', '[maduzao],登录成功。', '183.6.130.188', '2017-12-28 09:31:30');
INSERT INTO `fm_log` VALUES ('92', '[maduzao],登录成功。', '183.6.130.188', '2017-12-28 17:21:01');
INSERT INTO `fm_log` VALUES ('93', '[wotai],登录成功。', '183.6.166.114', '2018-01-06 15:33:29');
INSERT INTO `fm_log` VALUES ('94', '[maduzao],登录成功。', '113.108.195.92', '2018-01-08 17:07:21');
INSERT INTO `fm_log` VALUES ('95', '[maduzao],登录成功。', '183.6.130.188', '2018-01-08 17:48:09');
INSERT INTO `fm_log` VALUES ('96', '[admin2017],登录成功。', '183.6.130.188', '2018-01-08 17:49:34');
INSERT INTO `fm_log` VALUES ('97', '[maduzao],登录成功。', '113.108.195.92', '2018-01-09 14:21:58');
INSERT INTO `fm_log` VALUES ('98', '[maduzao],登录成功。', '183.6.130.188', '2018-01-11 11:42:46');
INSERT INTO `fm_log` VALUES ('99', '[28],（ss00.myh100.cn,sls01.myh100.net,sls01.myh100.com,sgjs02.yqwyx.net.cn,bd1.tthjgh.com）修改授权网址。', '183.6.130.188', '2018-01-11 11:42:53');
INSERT INTO `fm_log` VALUES ('100', '[admin2017],登录成功。', '113.108.195.92', '2018-01-25 10:10:19');
INSERT INTO `fm_log` VALUES ('101', '[zml],登录成功。', '61.140.127.57', '2018-01-25 10:24:47');
INSERT INTO `fm_log` VALUES ('102', '[zml],登录成功。', '61.140.127.57', '2018-01-25 10:28:28');
INSERT INTO `fm_log` VALUES ('103', '[zml],登录成功。', '113.108.195.92', '2018-01-25 15:04:34');
INSERT INTO `fm_log` VALUES ('104', '[admin2017],登录成功。', '183.6.130.188', '2018-01-26 11:47:23');
INSERT INTO `fm_log` VALUES ('105', '[zml],登录成功。', '61.140.126.155', '2018-01-30 09:49:04');
INSERT INTO `fm_log` VALUES ('106', '[zml],登录成功。', '61.140.127.107', '2018-02-24 16:12:07');
INSERT INTO `fm_log` VALUES ('107', '[maduzao],登录成功。', '183.6.130.188', '2018-03-13 16:38:30');
INSERT INTO `fm_log` VALUES ('108', '[maduzao],登录成功。', '183.6.130.188', '2018-03-13 16:41:18');
INSERT INTO `fm_log` VALUES ('109', '[maduzao],登录成功。', '183.6.130.188', '2018-03-13 18:22:34');
INSERT INTO `fm_log` VALUES ('110', '[maduzao],登录成功。', '116.21.203.152', '2018-03-14 01:44:13');
INSERT INTO `fm_log` VALUES ('111', '[maduzao],登录成功。', '116.21.203.209', '2018-03-15 23:41:03');
INSERT INTO `fm_log` VALUES ('112', '[maduzao],登录成功。', '183.6.130.188', '2018-03-28 16:52:56');
INSERT INTO `fm_log` VALUES ('113', '[maduzao],登录成功。', '113.108.195.92', '2018-04-25 15:41:31');
INSERT INTO `fm_log` VALUES ('114', '[maduzao],登录成功。', '113.108.195.92', '2018-04-26 17:48:34');
INSERT INTO `fm_log` VALUES ('115', '[28],（ss00.myh100.cn,sls01.myh100.net,sls01.myh100.com,sgjs02.yqwyx.net.cn,bd1.tthjgh,sls02.myh100.cn）修改授权网址。', '113.108.195.92', '2018-04-26 17:49:17');
INSERT INTO `fm_log` VALUES ('116', '[28],（ss00.myh100.cn,sls01.myh100.net,sls01.myh100.com,sgjs02.yqwyx.net.cn,bd1.tthjgh.cn,sls02.myh100.cn）修改授权网址。', '113.108.195.92', '2018-04-26 17:49:29');
INSERT INTO `fm_log` VALUES ('117', '[maduzao],登录成功。', '183.6.130.188', '2018-05-16 12:04:45');
INSERT INTO `fm_log` VALUES ('118', '[maduzao],登录成功。', '61.140.62.43', '2018-05-16 12:14:27');
INSERT INTO `fm_log` VALUES ('119', '[28],（ss00.myh100.cn,sls01.myh100.net,sls01.myh100.com,sgjs02.yqwyx.net.cn,bd1.tthjgh.cn,sls02.myh100.cn,bd2.laiweishang.vip）修改授权网址。', '61.140.62.43', '2018-05-16 18:07:34');
INSERT INTO `fm_log` VALUES ('120', '[maduzao],登录成功。', '113.111.9.250', '2018-05-17 09:49:18');
INSERT INTO `fm_log` VALUES ('121', '[28],（ss00.myh100.cn,sls01.myh100.net,sls01.myh100.com,sgjs02.yqwyx.net.cn,bd1.tthjgh.cn,sls02.myh100.cn,bd2.laiweishang.vip,sls02.myh100.com）修改授权网址。', '113.111.9.250', '2018-05-17 16:34:33');
INSERT INTO `fm_log` VALUES ('122', '[maduzao],登录成功。', '113.111.9.250', '2018-05-17 17:03:14');
INSERT INTO `fm_log` VALUES ('123', '[maduzao],登录成功。', '113.111.9.250', '2018-05-17 17:05:27');
INSERT INTO `fm_log` VALUES ('124', '[28],（sls02.myh100.com）修改授权网址。', '113.111.9.250', '2018-05-17 17:57:54');
INSERT INTO `fm_log` VALUES ('125', '[maduzao],登录成功。', '223.104.63.75', '2018-05-17 18:04:19');
INSERT INTO `fm_log` VALUES ('126', '[maduzao],登录成功。', '223.104.63.75', '2018-05-17 18:07:05');
INSERT INTO `fm_log` VALUES ('127', '[maduzao],登录成功。', '118.197.63.214', '2018-05-17 23:47:59');
INSERT INTO `fm_log` VALUES ('128', '[maduzao],登录成功。', '113.111.9.250', '2018-05-18 09:28:00');
INSERT INTO `fm_log` VALUES ('129', '[maduzao],登录成功。', '183.6.130.188', '2018-05-18 10:14:40');
INSERT INTO `fm_log` VALUES ('130', '[maduzao],登录成功。', '113.111.9.250', '2018-05-18 18:02:46');
INSERT INTO `fm_log` VALUES ('131', '[maduzao],登录成功。', '118.197.63.214', '2018-05-21 22:31:56');
INSERT INTO `fm_log` VALUES ('132', '[28],（sls02.myh100.com,bd1.ndbsm1.com）修改授权网址。', '118.197.63.214', '2018-05-21 22:41:23');
INSERT INTO `fm_log` VALUES ('133', '[28],（sls02.myh100.com,bd1.ndbsm1.com,ss00.360myh.me）修改授权网址。', '118.197.63.214', '2018-05-21 22:53:39');
INSERT INTO `fm_log` VALUES ('134', '[28],（sls02.myh100.com,bd1.ndbsm1.com）修改授权网址。', '118.197.63.214', '2018-05-21 22:57:42');
INSERT INTO `fm_log` VALUES ('135', '[28],（bd1.ndbsm1.com）修改授权网址。', '118.197.63.214', '2018-05-21 22:58:01');
INSERT INTO `fm_log` VALUES ('136', '[maduzao],登录成功。', '116.23.16.166', '2018-05-21 23:08:17');
INSERT INTO `fm_log` VALUES ('137', '[maduzao],登录成功。', '113.65.205.145', '2018-05-22 09:18:23');
INSERT INTO `fm_log` VALUES ('138', '[maduzao],登录成功。', '183.6.130.188', '2018-05-22 17:38:48');
INSERT INTO `fm_log` VALUES ('139', '[maduzao],登录成功。', '113.65.207.128', '2018-05-23 09:37:29');
INSERT INTO `fm_log` VALUES ('140', '[admin2017],登录成功。', '113.65.207.128', '2018-05-23 15:29:43');
INSERT INTO `fm_log` VALUES ('141', '[huangrujie],登录成功。', '113.65.207.128', '2018-05-23 15:31:43');
INSERT INTO `fm_log` VALUES ('142', '[31],（bd1.ndbsm1.com）修改授权网址。', '113.65.207.128', '2018-05-23 15:32:00');
INSERT INTO `fm_log` VALUES ('143', '[31],（bd1.ndbsm1.com）修改授权网址。', '113.65.207.128', '2018-05-23 15:45:10');
INSERT INTO `fm_log` VALUES ('144', '[maduzao],登录成功。', '113.65.207.128', '2018-05-23 15:46:04');
INSERT INTO `fm_log` VALUES ('145', '[admin2017],登录成功。', '183.6.130.188', '2018-05-24 09:31:39');
INSERT INTO `fm_log` VALUES ('146', '[laoyu],登录成功。', '113.108.195.92', '2018-05-24 09:53:03');
INSERT INTO `fm_log` VALUES ('147', '[32],（lpnx.nbbaixing.com）修改授权网址。', '113.108.195.92', '2018-05-24 17:20:38');
INSERT INTO `fm_log` VALUES ('148', '[32],（lpnx.nbbaixing.com）修改授权网址。', '183.6.130.188', '2018-05-24 17:31:44');
INSERT INTO `fm_log` VALUES ('149', '[laoyu],登录成功。', '113.108.195.92', '2018-05-25 14:13:56');
INSERT INTO `fm_log` VALUES ('150', '[laoyu],登录成功。', '183.6.130.188', '2018-05-25 15:25:57');
INSERT INTO `fm_log` VALUES ('151', '[32],（nxvip.dzzbaixing.com）修改授权网址。', '183.6.130.188', '2018-05-25 15:26:09');
INSERT INTO `fm_log` VALUES ('152', '[32],（nxvip.dzzbaixing.com）修改授权网址。', '113.108.195.92', '2018-05-25 15:28:47');
INSERT INTO `fm_log` VALUES ('153', '[maduzao],登录成功。', '113.108.195.92', '2018-05-25 15:40:42');
INSERT INTO `fm_log` VALUES ('154', '[huangrujie],登录成功。', '183.6.130.188', '2018-05-25 15:41:14');
INSERT INTO `fm_log` VALUES ('155', '[huangrujie],登录成功。', '113.111.11.87', '2018-05-29 11:09:26');
INSERT INTO `fm_log` VALUES ('156', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com）修改授权网址。', '113.111.11.87', '2018-05-29 11:09:52');
INSERT INTO `fm_log` VALUES ('157', '[huangrujie],登录成功。', '183.6.130.188', '2018-05-29 11:29:31');
INSERT INTO `fm_log` VALUES ('158', '[huangrujie],登录成功。', '113.108.195.92', '2018-05-30 15:58:50');
INSERT INTO `fm_log` VALUES ('159', '[maduzao],登录成功。', '118.197.63.214', '2018-05-30 23:26:42');
INSERT INTO `fm_log` VALUES ('160', '[huangrujie],登录成功。', '118.197.63.214', '2018-05-30 23:27:03');
INSERT INTO `fm_log` VALUES ('161', '[huangrujie],登录成功。', '118.197.63.214', '2018-05-31 00:20:16');
INSERT INTO `fm_log` VALUES ('162', '[huangrujie],登录成功。', '113.111.9.50', '2018-05-31 10:24:42');
INSERT INTO `fm_log` VALUES ('163', '[maduzao],登录成功。', '116.22.164.240', '2018-05-31 15:01:58');
INSERT INTO `fm_log` VALUES ('164', '[huangrujie],登录成功。', '113.111.10.85', '2018-06-01 10:54:44');
INSERT INTO `fm_log` VALUES ('165', '[huangrujie],登录成功。', '113.65.204.56', '2018-06-14 10:59:45');
INSERT INTO `fm_log` VALUES ('166', '[huangrujie],登录成功。', '113.111.10.237', '2018-06-15 10:36:51');
INSERT INTO `fm_log` VALUES ('167', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-19 10:27:59');
INSERT INTO `fm_log` VALUES ('168', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com）修改授权网址。', '113.65.207.232', '2018-06-19 10:28:47');
INSERT INTO `fm_log` VALUES ('169', '[huangrujie],登录成功。', '113.108.195.92', '2018-06-19 11:00:03');
INSERT INTO `fm_log` VALUES ('170', '[huangrujie],登录成功。', '113.108.195.92', '2018-06-19 15:18:37');
INSERT INTO `fm_log` VALUES ('171', '[maduzao],登录成功。', '113.65.207.232', '2018-06-19 15:36:10');
INSERT INTO `fm_log` VALUES ('172', '[28],（bd1.ndbsm1.com,ss01.myh100.net）修改授权网址。', '113.65.207.232', '2018-06-19 15:36:18');
INSERT INTO `fm_log` VALUES ('173', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-19 15:50:25');
INSERT INTO `fm_log` VALUES ('174', '[maduzao],登录成功。', '113.65.207.232', '2018-06-19 16:25:12');
INSERT INTO `fm_log` VALUES ('175', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-19 16:32:35');
INSERT INTO `fm_log` VALUES ('176', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn）修改授权网址。', '113.65.207.232', '2018-06-19 16:33:40');
INSERT INTO `fm_log` VALUES ('177', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn）修改授权网址。', '113.108.195.92', '2018-06-19 16:37:30');
INSERT INTO `fm_log` VALUES ('178', '[maduzao],登录成功。', '113.65.207.232', '2018-06-19 16:40:26');
INSERT INTO `fm_log` VALUES ('179', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-19 18:11:51');
INSERT INTO `fm_log` VALUES ('180', '[huangrujie],登录成功。', '223.192.190.195', '2018-06-19 23:15:57');
INSERT INTO `fm_log` VALUES ('181', '[huangrujie],登录成功。', '223.192.190.195', '2018-06-19 23:15:57');
INSERT INTO `fm_log` VALUES ('182', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-20 09:49:31');
INSERT INTO `fm_log` VALUES ('183', '[maduzao],登录成功。', '113.65.207.232', '2018-06-20 14:25:37');
INSERT INTO `fm_log` VALUES ('184', '[huangrujie],登录成功。', '183.6.130.188', '2018-06-20 15:39:18');
INSERT INTO `fm_log` VALUES ('185', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn）修改授权网址。', '183.6.130.188', '2018-06-20 15:48:17');
INSERT INTO `fm_log` VALUES ('186', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn）修改授权网址。', '183.6.130.188', '2018-06-20 15:48:20');
INSERT INTO `fm_log` VALUES ('187', '[huangrujie],登录成功。', '183.6.130.188', '2018-06-20 16:12:47');
INSERT INTO `fm_log` VALUES ('188', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-20 18:43:54');
INSERT INTO `fm_log` VALUES ('189', '[huangrujie],登录成功。', '113.65.207.232', '2018-06-21 10:03:54');
INSERT INTO `fm_log` VALUES ('190', '[huangrujie],登录成功。', '183.237.185.54', '2018-06-21 17:45:56');
INSERT INTO `fm_log` VALUES ('191', '[huangrujie],登录成功。', '223.192.190.195', '2018-06-22 00:17:16');
INSERT INTO `fm_log` VALUES ('192', '[maduzao],登录成功。', '113.65.206.239', '2018-06-22 15:13:18');
INSERT INTO `fm_log` VALUES ('193', '[huangrujie],登录成功。', '113.65.206.239', '2018-06-22 15:20:39');
INSERT INTO `fm_log` VALUES ('194', '[maduzao],登录成功。', '113.65.206.239', '2018-06-22 16:23:00');
INSERT INTO `fm_log` VALUES ('195', '[28],（bd1.ndbsm1.com,ss01.myh100.net,sls.bb300.cn）修改授权网址。', '113.65.206.239', '2018-06-22 16:23:46');
INSERT INTO `fm_log` VALUES ('196', '[bingham],登录成功。', '113.65.206.239', '2018-06-22 16:38:32');
INSERT INTO `fm_log` VALUES ('197', '[maduzao],登录成功。', '113.65.206.239', '2018-06-22 16:39:20');
INSERT INTO `fm_log` VALUES ('198', '[huangrujie],登录成功。', '113.65.206.239', '2018-06-22 17:01:17');
INSERT INTO `fm_log` VALUES ('199', '[bingham],登录成功。', '113.65.206.239', '2018-06-22 17:32:47');
INSERT INTO `fm_log` VALUES ('200', '[chenhui],登录成功。', '113.65.206.239', '2018-06-22 17:34:22');
INSERT INTO `fm_log` VALUES ('201', '[huangrujie],登录成功。', '113.65.206.239', '2018-06-22 17:48:39');
INSERT INTO `fm_log` VALUES ('202', '[maduzao],登录成功。', '113.65.206.239', '2018-06-22 20:41:55');
INSERT INTO `fm_log` VALUES ('203', '[maduzao],登录成功。', '113.65.206.239', '2018-06-22 20:44:29');
INSERT INTO `fm_log` VALUES ('204', '[huangrujie],登录成功。', '113.65.206.239', '2018-06-22 20:45:25');
INSERT INTO `fm_log` VALUES ('205', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn,dko3.limeiyuan178.com）修改授权网址。', '113.65.206.239', '2018-06-22 20:45:30');
INSERT INTO `fm_log` VALUES ('206', '[31],（bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn,dko3.limeiyuan178.com）修改授权网址。', '113.65.206.239', '2018-06-22 20:49:53');
INSERT INTO `fm_log` VALUES ('207', '[maduzao],登录成功。', '113.111.9.95', '2018-06-25 09:34:46');
INSERT INTO `fm_log` VALUES ('208', '[maduzao],登录成功。', '113.108.195.92', '2018-06-25 15:07:41');
INSERT INTO `fm_log` VALUES ('209', '[chenhui],登录成功。', '113.108.195.92', '2018-06-26 11:26:51');
INSERT INTO `fm_log` VALUES ('210', '[33],（sls01.mingyaohui.com）修改授权网址。', '113.108.195.92', '2018-06-26 11:27:56');
INSERT INTO `fm_log` VALUES ('211', '[maduzao],登录成功。', '61.140.62.30', '2018-06-27 09:53:53');
INSERT INTO `fm_log` VALUES ('212', '[maduzao],登录成功。', '61.140.62.30', '2018-06-27 11:27:25');
INSERT INTO `fm_log` VALUES ('213', '[maduzao],登录成功。', '61.140.62.30', '2018-06-28 09:41:41');
INSERT INTO `fm_log` VALUES ('214', '[maduzao],登录成功。', '113.65.204.198', '2018-06-29 10:09:11');
INSERT INTO `fm_log` VALUES ('215', '[maduzao],登录成功。', '113.65.204.198', '2018-06-29 14:17:56');
INSERT INTO `fm_log` VALUES ('216', '[huangrujie],登录成功。', '113.108.195.92', '2018-07-02 17:08:21');
INSERT INTO `fm_log` VALUES ('217', '[maduzao],登录成功。', '183.6.130.188', '2018-07-02 17:11:22');
INSERT INTO `fm_log` VALUES ('218', '[maduzao],登录成功。', '113.65.205.30', '2018-07-04 10:26:44');
INSERT INTO `fm_log` VALUES ('219', '[bingham],登录成功。', '113.65.205.30', '2018-07-04 14:55:34');
INSERT INTO `fm_log` VALUES ('220', '[zhengqiongzhen],登录成功。', '113.65.205.30', '2018-07-04 14:59:04');
INSERT INTO `fm_log` VALUES ('221', '[zhengqiongzhen],登录成功。', '183.6.130.188', '2018-07-04 15:01:58');
INSERT INTO `fm_log` VALUES ('222', '[34],（sls.bb600.cn）修改授权网址。', '113.65.205.30', '2018-07-04 15:10:05');
INSERT INTO `fm_log` VALUES ('223', '[huangrujie],登录成功。', '113.65.205.30', '2018-07-04 15:12:37');
INSERT INTO `fm_log` VALUES ('224', '[maduzao],登录成功。', '113.65.205.30', '2018-07-04 15:12:53');
INSERT INTO `fm_log` VALUES ('225', '[chenhui],登录成功。', '113.65.205.30', '2018-07-04 15:13:14');
INSERT INTO `fm_log` VALUES ('226', '[zhengqiongzhen],登录成功。', '113.65.205.30', '2018-07-04 15:14:30');
INSERT INTO `fm_log` VALUES ('227', '[zhengqiongzhen],登录成功。', '113.65.205.30', '2018-07-04 15:52:38');
INSERT INTO `fm_log` VALUES ('228', '[zhengqiongzhen],登录成功。', '113.65.205.30', '2018-07-05 12:24:37');
INSERT INTO `fm_log` VALUES ('229', '[zhengqiongzhen],登录成功。', '113.65.205.30', '2018-07-05 14:27:58');
INSERT INTO `fm_log` VALUES ('230', '[bingham],登录成功。', '113.65.205.30', '2018-07-05 16:44:55');
INSERT INTO `fm_log` VALUES ('231', '[bingham],登录成功。', '223.192.190.195', '2018-07-08 01:02:42');
INSERT INTO `fm_log` VALUES ('232', '[bingham],登录成功。', '113.111.8.56', '2018-07-09 09:36:26');
INSERT INTO `fm_log` VALUES ('233', '[maduzao],登录成功。', '113.111.9.239', '2018-07-11 15:08:09');
INSERT INTO `fm_log` VALUES ('234', '[zhengqiongzhen],登录成功。', '113.111.9.239', '2018-07-11 16:30:35');
INSERT INTO `fm_log` VALUES ('235', '[34],（sls.bb600.cn,zqz1.mingyaohui.com）修改授权网址。', '113.111.9.239', '2018-07-11 16:30:54');
INSERT INTO `fm_log` VALUES ('236', '[maduzao],登录成功。', '113.111.9.239', '2018-07-11 16:39:46');
INSERT INTO `fm_log` VALUES ('237', '[maduzao],登录成功。', '113.111.9.127', '2018-07-12 10:39:56');
INSERT INTO `fm_log` VALUES ('238', '[bingham],登录成功。', '113.111.9.127', '2018-07-12 11:29:39');
INSERT INTO `fm_log` VALUES ('239', '[tianye],登录成功。', '113.111.9.127', '2018-07-12 11:32:02');
INSERT INTO `fm_log` VALUES ('240', '[35],（sls01.mingyaohui.com）修改授权网址。', '113.111.9.127', '2018-07-12 11:32:29');
INSERT INTO `fm_log` VALUES ('241', '[tianye],登录成功。', '113.108.195.92', '2018-07-12 11:34:54');
INSERT INTO `fm_log` VALUES ('242', '[tianye],登录成功。', '113.108.195.92', '2018-07-12 11:54:26');
INSERT INTO `fm_log` VALUES ('243', '[tianye],登录成功。', '113.108.195.92', '2018-07-12 11:55:15');
INSERT INTO `fm_log` VALUES ('244', '[maduzao],登录成功。', '113.111.9.127', '2018-07-12 13:59:02');
INSERT INTO `fm_log` VALUES ('245', '[maduzao],登录成功。', '113.111.9.127', '2018-07-12 14:17:57');
INSERT INTO `fm_log` VALUES ('246', '[zhengqiongzhen],登录成功。', '183.6.130.188', '2018-07-12 15:51:50');
INSERT INTO `fm_log` VALUES ('247', '[tianye],登录成功。', '113.108.195.92', '2018-07-12 17:25:15');
INSERT INTO `fm_log` VALUES ('248', '[35],（sls01.mingyaohui.com）修改授权网址。', '183.6.130.188', '2018-07-13 12:13:30');
INSERT INTO `fm_log` VALUES ('249', '[maduzao],登录成功。', '113.111.9.127', '2018-07-13 14:25:47');
INSERT INTO `fm_log` VALUES ('250', '[tianye],登录成功。', '113.108.195.92', '2018-07-16 09:16:34');
INSERT INTO `fm_log` VALUES ('251', '[35],（sls01.mingyaohui.com）修改授权网址。', '183.6.130.188', '2018-07-16 11:55:50');
INSERT INTO `fm_log` VALUES ('252', '[maduzao],登录成功。', '113.108.195.92', '2018-07-16 18:11:48');
INSERT INTO `fm_log` VALUES ('253', '[maduzao],登录成功。', '183.6.130.188', '2018-07-17 09:45:50');
INSERT INTO `fm_log` VALUES ('254', '[maduzao],登录成功。', '183.6.130.188', '2018-07-17 09:46:15');
INSERT INTO `fm_log` VALUES ('255', '[maduzao],登录成功。', '127.0.0.1', '2018-07-17 14:29:48');
INSERT INTO `fm_log` VALUES ('256', '[maduzao],登录成功。', '127.0.0.1', '2018-07-18 09:26:50');
INSERT INTO `fm_log` VALUES ('257', '[bingham],登录成功。', '127.0.0.1', '2018-07-18 09:36:49');
INSERT INTO `fm_log` VALUES ('258', '[maduzao],登录成功。', '127.0.0.1', '2018-07-18 09:46:11');
INSERT INTO `fm_log` VALUES ('259', '[fang135],登录成功。', '127.0.0.1', '2018-07-18 09:59:46');
INSERT INTO `fm_log` VALUES ('260', '[maduzao],登录成功。', '127.0.0.1', '2018-07-25 17:46:34');
INSERT INTO `fm_log` VALUES ('261', '[maduzao],登录成功。', '127.0.0.1', '2018-08-10 10:13:29');
INSERT INTO `fm_log` VALUES ('262', '[maduzao],登录成功。', '127.0.0.1', '2018-08-28 14:45:43');
INSERT INTO `fm_log` VALUES ('263', '[maduzao],登录成功。', '127.0.0.1', '2018-08-30 10:43:01');
INSERT INTO `fm_log` VALUES ('264', '[bingham],登录成功。', '127.0.0.1', '2018-08-30 14:08:27');
INSERT INTO `fm_log` VALUES ('265', '[maduzao],登录成功。', '127.0.0.1', '2018-09-25 10:37:14');
INSERT INTO `fm_log` VALUES ('266', '[maduzao],登录成功。', '127.0.0.1', '2018-09-29 14:26:55');
INSERT INTO `fm_log` VALUES ('267', '[maduzao],登录成功。', '127.0.0.1', '2018-10-08 11:22:27');

-- ----------------------------
-- Table structure for `fm_staff`
-- ----------------------------
DROP TABLE IF EXISTS `fm_staff`;
CREATE TABLE `fm_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT '姓名',
  `sex` int(2) NOT NULL COMMENT '0未知，1男，2女，性别',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `wechat` varchar(50) DEFAULT '1' COMMENT '微信',
  `qq` varchar(50) DEFAULT NULL COMMENT 'qq',
  `job` varchar(64) DEFAULT NULL COMMENT '职位',
  `remark` varchar(255) DEFAULT NULL COMMENT '备',
  `hiredate` datetime DEFAULT NULL COMMENT '入职时间',
  `create_time` datetime DEFAULT NULL COMMENT '生成时间',
  `team` varchar(100) DEFAULT NULL COMMENT '所属团队',
  `card` varchar(30) DEFAULT NULL COMMENT '身份证',
  `leave_time` datetime DEFAULT NULL COMMENT '离职时间',
  `department` varchar(20) DEFAULT NULL COMMENT '所属部门',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fm_staff
-- ----------------------------
INSERT INTO `fm_staff` VALUES ('31', '张三', '1', '15521187671', 'myhfm', '57458251699', '程序员', '技术部7898797', '2018-12-06 00:12:00', '2018-12-04 16:19:44', null, null, '2018-12-12 16:18:16', null);
INSERT INTO `fm_staff` VALUES ('32', '李四', '1', '15521187672', 'myhfm', '57458251688', '程序员', '技术部7898797', '2018-12-07 00:12:00', '2018-12-04 16:19:44', 'SKT', '441522199502182739', null, '技术部');
INSERT INTO `fm_staff` VALUES ('34', '流量', '2', '张三', 'dc90707发的说法是', '98745', '采访稿', '9019', '2018-12-26 00:00:00', '2018-12-04 17:20:22', 'SKT', '152734199412036428', '2020-01-29 00:00:00', '技术部');
INSERT INTO `fm_staff` VALUES ('58', '刘丹', '2', '15521187671', '1', null, null, '销售部', '2018-12-06 00:00:00', '2018-12-12 17:59:15', '赛康国际', '370322198701071923', '2019-10-21 00:00:00', null);
INSERT INTO `fm_staff` VALUES ('59', '明海', '1', '15521187672', '1', null, null, '销售部', '2018-12-07 00:00:00', '2018-12-12 17:59:15', '赛康国际', '441522199502182739', null, null);
INSERT INTO `fm_staff` VALUES ('60', '黄元芳', '2', '15975893059', '1', null, null, '销售部', '2018-12-26 00:00:00', '2018-12-12 17:59:15', '赛康国际', '152734199412036428', null, null);

-- ----------------------------
-- Table structure for `fm_user`
-- ----------------------------
DROP TABLE IF EXISTS `fm_user`;
CREATE TABLE `fm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL COMMENT '登录名',
  `password` varchar(256) NOT NULL COMMENT '密码',
  `salt` varchar(8) DEFAULT NULL COMMENT '识别码',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态 1在用 0停用',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `sign` varchar(64) DEFAULT NULL COMMENT 'sign',
  `last_time` date DEFAULT NULL COMMENT '授权时间',
  `domain` text COMMENT '域名',
  `is_temp` int(1) DEFAULT NULL COMMENT '是否需要缓存：1是，0否;',
  `beizhu` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fm_user
-- ----------------------------
INSERT INTO `fm_user` VALUES ('1', 'admin', 'e6fcd605103815db97864e8d454c96bf', 'Wjwlp', '1', '2017-09-01 01:17:10', 'eaf7d1e360f634a865f61067e79a6464', '2019-12-07', '', '0', '');
INSERT INTO `fm_user` VALUES ('41', 'myh2018', '285df50141de6671b1c7ce94b55a5cae', 'ZwGsJ', '1', '2018-12-04 11:49:31', '9a27f1e0823cb2279fc38a76d9f153f1', '2018-12-30', null, '1', '管理员');

-- ----------------------------
-- Table structure for `fm_user_temp`
-- ----------------------------
DROP TABLE IF EXISTS `fm_user_temp`;
CREATE TABLE `fm_user_temp` (
  `domain` text COMMENT '授权域名',
  `sign` varchar(64) DEFAULT NULL COMMENT 'sign',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fm_user_temp
-- ----------------------------
INSERT INTO `fm_user_temp` VALUES ('', 'eaf7d1e360f634a865f61067e79a6464', '1');
INSERT INTO `fm_user_temp` VALUES ('bd1.ndbsm1.com,ss01.myh100.net,sls.bb300.cn', '1d373354ec25c127ec7e6d4c95a8ae8e', '28');
INSERT INTO `fm_user_temp` VALUES ('bd.tairtyw.net,cc.cjrmqit.com', 'ee6c66c1457634d07dc267252e0c475b', '29');
INSERT INTO `fm_user_temp` VALUES ('e.zimilan.cn,e.zimilan.com', 'f6657e6cf3a46e5d0e9fe8b7e3356caf', '30');
INSERT INTO `fm_user_temp` VALUES ('bd1.ndbsm1.com,cp1.zpybfn.com,sls01.mingyaohui.com,ss00.myh100.cn,dko3.limeiyuan178.com', '1d373354ec25c127ec7e6d4c95a8ae99', '31');
INSERT INTO `fm_user_temp` VALUES ('nxvip.dzzbaixing.com', '643dbac5dee579268bbf02e77feda3cb', '32');
INSERT INTO `fm_user_temp` VALUES ('sls01.mingyaohui.com', '70c9e38975803f316d6da707d7193910', '33');
INSERT INTO `fm_user_temp` VALUES ('sls.bb600.cn,zqz1.mingyaohui.com', '9b6a813cd43c7755fbc0a9340bf2bd67', '34');
INSERT INTO `fm_user_temp` VALUES ('sls01.mingyaohui.com', 'c86a21c235ff6eea0e27dbc050a6c11b', '35');
