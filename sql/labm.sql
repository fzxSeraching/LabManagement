/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : labm

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 12/11/2020 18:07:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lab_notice
-- ----------------------------
DROP TABLE IF EXISTS `lab_notice`;
CREATE TABLE `lab_notice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `notice_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `notice_editor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `notice_starttime` datetime(0) NULL DEFAULT NULL,
  `notice_edittime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_notice
-- ----------------------------
INSERT INTO `lab_notice` VALUES (1, '震惊！开天辟地第一公告', '第一篇公告', '16000', '2020-11-12 09:28:36', '2020-11-12 09:28:40');

-- ----------------------------
-- Table structure for lab_role
-- ----------------------------
DROP TABLE IF EXISTS `lab_role`;
CREATE TABLE `lab_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色表',
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_role
-- ----------------------------
INSERT INTO `lab_role` VALUES (1, '学生', 'R001');
INSERT INTO `lab_role` VALUES (2, '教师', 'R002');
INSERT INTO `lab_role` VALUES (3, '管理员', 'R003');
INSERT INTO `lab_role` VALUES (4, '维修人员', 'R004');
INSERT INTO `lab_role` VALUES (5, '主任', 'R005');

-- ----------------------------
-- Table structure for lab_role_rule
-- ----------------------------
DROP TABLE IF EXISTS `lab_role_rule`;
CREATE TABLE `lab_role_rule`  (
  `id` int(11) NOT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `rule_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for lab_role_user
-- ----------------------------
DROP TABLE IF EXISTS `lab_role_user`;
CREATE TABLE `lab_role_user`  (
  `id` int(11) NOT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for lab_rule
-- ----------------------------
DROP TABLE IF EXISTS `lab_rule`;
CREATE TABLE `lab_rule`  (
  `id` int(255) NOT NULL COMMENT '权限表',
  `rule_id` int(11) NULL DEFAULT NULL,
  `rule_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for lab_user
-- ----------------------------
DROP TABLE IF EXISTS `lab_user`;
CREATE TABLE `lab_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生名',
  `user_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学号',
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `user_des` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `user_pws` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码，后续使用md5加密',
  `user_role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_user
-- ----------------------------
INSERT INTO `lab_user` VALUES (1, '懿', '16000', '000@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (2, '甲', '16001', '001@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (3, '乙', '16002', '002@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (4, '丙', '16003', '003@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (5, '丁', '16004', '004@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (6, '戊', '16005', '005@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (7, '己', '16006', '006@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (8, '庚', '16007', '007@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (9, '辛', '16008', '008@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (10, '壬', '16009', '009@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (11, '癸', '16010', '010@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (12, '子', '16011', '011@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (13, '丑', '16012', '012@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (14, '寅', '16013', '013@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (15, '卯', '16014', '014@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (16, '辰', '16015', '015@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (17, '巳', '1', '016@lab.com', NULL, '123465', 'R001');
INSERT INTO `lab_user` VALUES (18, '午', '2', '017@lab.com', NULL, '123465', 'R002');
INSERT INTO `lab_user` VALUES (19, '未', '3', '018@lab.com', NULL, '123465', 'R002');
INSERT INTO `lab_user` VALUES (20, '申', '4', '019@lab.com', NULL, '123465', 'R002');
INSERT INTO `lab_user` VALUES (21, '酉', '5', '020@lab.com', NULL, '123465', 'R002');
INSERT INTO `lab_user` VALUES (22, '戌', '6', '021@lab.com', NULL, '123465', 'R002');
INSERT INTO `lab_user` VALUES (23, '亥', '7', '022@lab.com', NULL, '123465', 'R002');
INSERT INTO `lab_user` VALUES (26, '测试大哥', '00000', '000@test.com', NULL, NULL, 'R000');
INSERT INTO `lab_user` VALUES (27, 'excel测试大哥', '1', '0000@test.com', NULL, NULL, 'R000');

SET FOREIGN_KEY_CHECKS = 1;
