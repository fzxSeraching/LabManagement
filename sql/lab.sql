/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : lab

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 08/10/2020 14:22:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lab_role
-- ----------------------------
DROP TABLE IF EXISTS `lab_role`;
CREATE TABLE `lab_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role_unique_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_role
-- ----------------------------
INSERT INTO `lab_role` VALUES (1, '学生', '001');
INSERT INTO `lab_role` VALUES (2, '教师', '002');
INSERT INTO `lab_role` VALUES (3, '管理员', '003');
INSERT INTO `lab_role` VALUES (4, '维修人员', '004');
INSERT INTO `lab_role` VALUES (5, '主任', '005');

-- ----------------------------
-- Table structure for lab_student
-- ----------------------------
DROP TABLE IF EXISTS `lab_student`;
CREATE TABLE `lab_student`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生名',
  `stu_id` int(11) NOT NULL COMMENT '学号',
  `stu_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `stu_gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `stu_des` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
