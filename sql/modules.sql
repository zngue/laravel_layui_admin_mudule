

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for field
-- ----------------------------
DROP TABLE IF EXISTS `field`;
CREATE TABLE `field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mod_id` int(10) unsigned DEFAULT '0' COMMENT '模型id',
  `name` varchar(255) DEFAULT '',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '1 正常 0 禁用',
  `type` varchar(255) DEFAULT '',
  `name_alias` varchar(255) DEFAULT '',
  `nullable` tinyint(4) DEFAULT '0',
  `default` varchar(255) DEFAULT '',
  `is_show_list` tinyint(1) unsigned DEFAULT '0' COMMENT '列表是否显示',
  `index` tinyint(255) unsigned DEFAULT '0',
  `name_length` int(10) unsigned DEFAULT '0',
  `places` int(10) unsigned DEFAULT '0',
  `verify` varchar(255) DEFAULT '' COMMENT '数据验证',
  `temp_id` int(10) unsigned DEFAULT '0',
  `sort` int(10) unsigned DEFAULT '0',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verify_from` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of field
-- ----------------------------
INSERT INTO `field` VALUES ('1', '40', 'name', '1', 'string', '平台名称', '1', null, '0', '0', null, '0', '', '0', '0', '2020-03-07 04:34:52', '2020-03-07 12:34:52', '');
INSERT INTO `field` VALUES ('2', '40', 'status', '1', 'tinyInteger', '状态', '1', '0', '0', '0', '1', '0', '', '0', '0', '2020-03-07 04:34:53', '2020-03-07 12:34:53', '');
INSERT INTO `field` VALUES ('3', '40', 'title', '1', 'string', '描述', '1', null, '0', '0', null, '0', '', '0', '0', '2020-03-07 14:03:35', '2020-03-07 22:03:35', '');
INSERT INTO `field` VALUES ('9', '41', 'name', '1', 'string', '配置名称', '1', null, '0', '0', null, '0', '', '0', '0', '2020-03-07 14:45:52', '2020-03-07 22:45:52', '');
INSERT INTO `field` VALUES ('10', '41', 'con_value', '1', 'string', '配置值', '0', null, '0', '0', null, '0', '', '0', '0', '2020-03-07 14:38:20', '2020-03-07 14:38:20', '');
INSERT INTO `field` VALUES ('13', '41', 'platform_id', '1', 'string', '平台id', '0', '0', '0', '1', null, '0', '', '0', '0', '2020-03-07 14:45:54', '2020-03-07 22:45:54', '');
INSERT INTO `field` VALUES ('14', '41', 'notes', '1', 'string', '注释', '0', null, '0', '0', null, '0', '', '0', '0', '2020-03-07 14:45:11', '2020-03-07 14:45:11', '');
INSERT INTO `field` VALUES ('15', '40', 'host_url', '1', 'string', '平台地址', '0', null, '0', '0', null, '0', '', '0', '0', '2020-03-07 15:02:47', '2020-03-07 15:02:47', '');
INSERT INTO `field` VALUES ('16', '41', 'status', '1', 'tinyInteger', '状态', '0', '0', '0', '0', null, '0', '', '0', '0', '2020-03-07 15:30:15', '2020-03-07 15:30:15', '');
INSERT INTO `field` VALUES ('17', '40', 'client_key', '1', 'string', '配置key', '0', null, '0', '0', null, '0', '', '0', '0', '2020-03-08 04:49:56', '2020-03-08 04:49:56', '');
INSERT INTO `field` VALUES ('18', '42', 'name', '1', 'string', '名称', '0', null, '0', '0', null, '0', '', '3', '0', '2020-03-17 05:50:31', '2020-03-17 13:50:31', '');
INSERT INTO `field` VALUES ('19', '42', 'edit_content', '1', 'text', '模板内容', '0', null, '0', '0', null, '0', '', '0', '0', '2020-03-17 04:53:54', '2020-03-17 12:53:54', '');
INSERT INTO `field` VALUES ('28', '42', 'index_content', '1', 'text', '列表模板', '0', null, '0', '0', '1000', '0', '', '0', '0', '2020-03-10 10:20:26', '2020-03-10 18:20:26', '');
INSERT INTO `field` VALUES ('29', '42', 'js_content', '1', 'text', 'js模板', '0', null, '0', '0', null, '0', '', '4', '0', '2020-03-17 05:49:00', '2020-03-17 13:49:00', '');
INSERT INTO `field` VALUES ('30', '42', 'status', '1', 'tinyInteger', '状态', '0', '0', '0', '0', null, '0', '', '4', '0', '2020-03-17 05:50:16', '2020-03-17 13:50:16', '');
INSERT INTO `field` VALUES ('36', '45', 'name', '1', 'string', '名称', '0', null, '1', '0', null, '0', 'required', '3', '0', '2020-03-20 13:05:04', '2020-03-20 13:05:04', '');
INSERT INTO `field` VALUES ('42', '47', 'name', '1', 'string', '名称', '0', null, '1', '0', null, '0', 'required', '3', '0', '2020-03-31 02:54:25', '2020-03-31 02:54:25', '');
INSERT INTO `field` VALUES ('43', '47', 'status', '1', 'tinyInteger', '状态', '0', '0', '1', '0', null, '0', 'required', '11', '0', '2020-03-31 02:55:02', '2020-03-31 02:55:02', '');
INSERT INTO `field` VALUES ('53', '45', 'desc', '1', 'string', '描述', '0', null, '1', '0', null, '0', '', '4', '0', '2020-04-03 13:26:39', '2020-04-03 13:26:39', '');
INSERT INTO `field` VALUES ('54', '45', 'pid', '1', 'string', '父级分类id', '0', '0', '0', '0', null, '0', '', '16', '0', '2020-04-03 13:28:35', '2020-04-03 13:28:35', '');
INSERT INTO `field` VALUES ('55', '45', 'status', '1', 'tinyInteger', '状态', '0', '0', '1', '0', null, '0', 'required', '11', '0', '2020-04-03 13:28:31', '2020-04-03 13:28:31', '');
INSERT INTO `field` VALUES ('56', '49', 'name', '1', 'string', '名称', '0', '1', '1', '0', null, '0', 'required', '17', '0', '2020-04-03 19:09:46', '2020-04-03 19:09:46', 'required');
INSERT INTO `field` VALUES ('57', '49', 'age', '1', 'integer', '年龄', '0', null, '1', '0', null, '0', 'required|number', '4', '0', '2020-04-03 19:11:12', '2020-04-03 19:11:12', 'required|integer');



DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名称',
  `edit_content` text COLLATE utf8mb4_unicode_ci COMMENT '模板内容',
  `index_content` text COLLATE utf8mb4_unicode_ci COMMENT 'index_content',
  `ex_js_content` text COLLATE utf8mb4_unicode_ci,
  `js_content` text COLLATE utf8mb4_unicode_ci COMMENT 'js模板',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='模板管理';

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('3', null, '2020-03-31 06:31:16', '单行文本框', '<div class=\"layui-form-item\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	<div class=\"layui-input-block\">\n		<input type=\"text\" name=\"{{name}}\" value=\"{{value}}\" lay-verify=\"{{verify}}\" placeholder=\"请输入{{name_alias}}\" autocomplete=\"off\" class=\"layui-input\">\n	</div>\n</div>', null, null, '{field: \'{{name}}\', title: \'{{name_alias}}\', width:120},', '1');
INSERT INTO `template` VALUES ('4', null, '2020-03-31 06:31:52', '多行文本框', '<div class=\"layui-form-item layui-form-text\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	<div class=\"layui-input-block\">\n		<textarea name=\"{{name}}\"  lay-verify=\"{{verify}}\"   placeholder=\"请输入{{name_alias}}\" class=\"layui-textarea\">{{value}}</textarea>\n	</div>\n</div>', null, null, '{field: \'{{name}}\', title: \'{{name_alias}}\', width:120},', '1');
INSERT INTO `template` VALUES ('11', '2020-03-20 05:42:48', '2020-03-31 06:30:52', '单选按钮', '<div class=\"layui-form-item\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	<div class=\"layui-input-block\">\n		<input type=\"radio\" name=\"{{name}}\" {{ (isset($data)&&$data[\'{{name}}\']==1)?\'checked\': \'\' }}   value=\"1\"  title=\"正常\" >\n		<input type=\"radio\" name=\"{{name}}\" {{ (isset($data)&&$data[\'{{name}}\']==0)?\'checked\': \'\' }}   value=\"0\"  title=\"禁用\" >\n	</div>\n</div>', null, null, '{field: \'{{name}}\', title: \'{{name_alias}}\', width:100,templet:function (d) {\n                        var checked=\'\';\n                        if (d.{{name}}==1){checked=\'checked\'}\n                        return \'<input type=\"checkbox\" name=\"{{name}}\" value=\"\'+d.id+\'\" lay-filter=\"{{name}}\" lay-skin=\"switch\" lay-text=\"是|否\" \'+checked+\'>\'\n                    }},', '1');
INSERT INTO `template` VALUES ('12', '2020-03-26 03:43:52', '2020-04-01 16:20:44', '多图上传', '<div class=\"layui-form-item  {{name}}_prevew\" style=\"display:none;\" >\n    <label class=\"layui-form-label\">预览图</label>\n    <div class=\"layui-input-block;\">\n            <div class=\"layui-upload-list {{name}}\" style=\"margin-left: 110px\"></div>\n    </div>\n</div>\n<div class=\"layui-form-item\">\n    <label class=\"layui-form-label\">{{name_alias}}</label>\n    <div class=\"layui-input-block\">\n        <input type=\"hidden\"  class=\"{{name}}_input\" name=\"{{name}}\" value=\"{{value}}\">\n        <script>$(function () {previwImg(\'{{value}}\',\'{{name}}\')})  </script>\n        <button type=\"button\" class=\"layui-btn\" onclick=\"uploadImg(\'{{name}}\',0);\">上传</button>\n    </div>\n</div>', null, null, '{field: \'{{name}}\', title: \'{{name_alias}}\', width:100,templet:function (d) {\n	var str = \'\'\n	if(d.{{name}}){\n		d_arr=d.{{name}}.split(\'|\')	\n		if( d_arr &&d_arr.length>0){\n			for(j in d_arr){\n				str+=\'<img src=\"\'+d_arr[j]+\'\" style=\"width: 100px;height: 100px;object-fit: contain\" >\'\n			}\n		}\n	}\n	return str\n}},', '1');
INSERT INTO `template` VALUES ('13', '2020-03-26 03:55:25', '2020-04-01 15:56:49', '单图上传', '<div class=\"layui-form-item  {{name}}_prevew\" style=\"display:none;\" >\n    <label class=\"layui-form-label\">预览图</label>\n    <div class=\"layui-input-block;\">\n            <div class=\"layui-upload-list {{name}}\" style=\"margin-left: 110px\"></div>\n    </div>\n</div>\n<div class=\"layui-form-item\">\n    <label class=\"layui-form-label\">{{name_alias}}</label>\n    <div class=\"layui-input-block\">\n        <input type=\"hidden\"  class=\"{{name}}_input\" name=\"{{name}}\" value=\"{{value}}\">\n        <script>$(function () {previwImg(\'{{value}}\',\'{{name}}\')})  </script>\n        <button type=\"button\" class=\"layui-btn\" onclick=\"uploadImg(\'{{name}}\',1);\">单图上传</button>\n    </div>\n</div>', null, null, '{field: \'{{name}}\', title: \'{{name_alias}}\', width:100,templet:function (d) {\n	return \'<img src=\"\'+d.{{name}}+\'\" style=\"width: 100px;height: 100px;object-fit: contain\" >\'\n}},', '1');
INSERT INTO `template` VALUES ('14', '2020-03-26 05:26:46', '2020-03-26 05:57:32', 'ue富文本', '<div class=\"layui-form-item layui-form-text\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	<div class=\"layui-input-block\">\n		<textarea name=\"{{name}}\"  lay-verify=\"{{verify}}\" style=\"width:80%;min-height:600px;\"  id=\"ue_{{name}}\"  placeholder=\"请输入{{name_alias}}\" >{{value}}</textarea>\n	</div>\n</div>\n<script>var ue_{{name}} = UE.getEditor(\'ue_{{name}}\');</script>', null, null, null, '1');
INSERT INTO `template` VALUES ('15', '2020-04-01 15:12:28', '2020-04-01 15:45:22', '下拉多选', '<div class=\"layui-form-item\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	 <div class=\"layui-input-block\" id=\"{{name}}\">\n     </div>\n</div>', null, 'var temp_{{name}} =selectM({elem: \'#{{name}}\',name:\'{{name}}\',data:[{id:1,name:\"请自行更换分类接口\"}],verify:\'{{verify}}\',selected:[{{(isset($data)&& !empty($data[\'{{name}}\']))?$data[\'{{name}}\']:0 }}]})', null, '1');
INSERT INTO `template` VALUES ('16', '2020-04-01 15:13:51', '2020-04-01 15:45:01', '下拉单选', '<div class=\"layui-form-item\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	<div id=\"{{name}}\">\n	</div>\n</div>', null, 'var temp_{{name}} =selectN({elem: \'#{{name}}\',name:\'{{name}}\',data:[{id:1,name:\"请自行更换分类接口\"}],verify:\'{{verify}}\',selected:[{{(isset($data)&& !empty($data[\'{{name}}\']))?$data[\'{{name}}\']:0 }}]})', null, '1');
INSERT INTO `template` VALUES ('17', '2020-04-03 18:59:19', '2020-04-03 19:21:12', '分类', '<div class=\"layui-form-item\">\n	<label class=\"layui-form-label\">{{name_alias}}</label>\n	<div id=\"{{name}}\">\n	</div>\n</div>', null, 'var temp_{{name}} =selectN({elem: \'#{{name}}\',name:\'{{name}}\',data:\"{{route(\'cate.ajaxList\')}}?pid={{default}}\",verify:\'{{verify}}\',selected:[{{(isset($data)&& !empty($data[\'{{name}}\']))?$data[\'{{name}}\']:{{default}} }}]})', null, '1');

CREATE TABLE  IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(10) unsigned DEFAULT '0',
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '权限跳转地址',
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '权限名称',
  `cate_pid_arr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '父级权限ids',
  `is_menu` tinyint(1) unsigned DEFAULT '0' COMMENT '是否菜单栏显示',
  `status` tinyint(1) DEFAULT '1' COMMENT '0 禁用 1 正常',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '图标',
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '权限描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` VALUES (25, '模型管理', 0, 'module.index', 'module.index', NULL, 1, 1, NULL, 'web', '2020-2-24 02:57:15', '2020-2-24 02:57:15', NULL);
INSERT INTO `permissions` VALUES (26, '模型列表', 25, 'module.index', 'module.index', '25', 1, 1, NULL, 'web', '2020-2-24 02:57:37', '2020-2-24 02:57:37', NULL);
INSERT INTO `permissions` VALUES (27, '添加模型', 26, 'module.add', 'module.add|module.doAdd', '25,26,', 0, 1, NULL, 'web', '2020-2-26 10:22:37', '2020-2-26 10:25:09', NULL);
INSERT INTO `permissions` VALUES (28, '修改模型', 26, 'module.save', 'module.save|module.doSave|module.status', '25,26,', 0, 1, NULL, 'web', '2020-2-26 10:25:00', '2020-2-27 04:51:09', NULL);
INSERT INTO `permissions` VALUES (29, '字段列表', 25, 'field.index', 'field.index', '25,', 0, 1, NULL, 'web', '2020-2-26 10:26:09', '2020-2-26 10:26:09', NULL);
INSERT INTO `permissions` VALUES (30, '删除模型', 26, 'module.del', 'module.del', '25,26,', 0, 1, NULL, 'web', '2020-2-26 10:26:55', '2020-2-26 10:28:10', NULL);
INSERT INTO `permissions` VALUES (31, '添加字段', 29, 'field.add', 'field.add|field.doAdd', '25,29', 0, 1, NULL, 'web', '2020-2-26 10:27:54', '2020-2-26 10:27:54', NULL);
INSERT INTO `permissions` VALUES (32, '修改字段', 29, 'field.save', 'field.save|field.doSave|field.status', '25,29,', 0, 1, NULL, 'web', '2020-2-26 10:29:31', '2020-2-26 10:29:56', NULL);
INSERT INTO `permissions` VALUES (51, '模板列表', 25, 'template.index', 'template.index', '25,', 1, 1, NULL, 'web', '2020-3-9 09:31:49', '2020-3-9 09:31:49', NULL);
INSERT INTO `permissions` VALUES (52, '添加模板', 51, 'template.add', 'template.add|template.doAdd', '25,51,', 0, 1, NULL, 'web', '2020-3-9 09:32:54', '2020-3-9 09:33:53', NULL);
INSERT INTO `permissions` VALUES (53, '修改模板', 51, 'template.save', 'template.save|template.doSave|template.status', '25,51,', 0, 1, NULL, 'web', '2020-3-9 09:33:48', '2020-3-9 09:34:12', NULL);
INSERT INTO `permissions` VALUES (54, '删除模板', 51, 'template.del', 'template.del', '25,51,', 0, 1, NULL, 'web', '2020-3-9 09:35:04', '2020-3-9 09:35:09', NULL);
