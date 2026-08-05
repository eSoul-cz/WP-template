# ************************************************************
# Sequel Ace SQL dump
# Verze 20104
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: sanitized WordPress template export
# Databáze: wordpress_template
# Čas vytvoření: sanitized
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Výpis tabulky wp_actionscheduler_actions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_actionscheduler_actions`;

CREATE TABLE `wp_actionscheduler_actions` (
  `action_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hook` varchar(191) NOT NULL,
  `status` varchar(20) NOT NULL,
  `scheduled_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime DEFAULT '0000-00-00 00:00:00',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT 10,
  `args` varchar(191) DEFAULT NULL,
  `schedule` longtext DEFAULT NULL,
  `group_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `extended_args` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`action_id`),
  KEY `hook_status_scheduled_date_gmt` (`hook`(163),`status`,`scheduled_date_gmt`),
  KEY `status_scheduled_date_gmt` (`status`,`scheduled_date_gmt`),
  KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  KEY `args` (`args`),
  KEY `group_id` (`group_id`),
  KEY `last_attempt_gmt` (`last_attempt_gmt`),
  KEY `claim_id_status_priority_scheduled_date_gmt` (`claim_id`,`status`,`priority`,`scheduled_date_gmt`),
  KEY `status_last_attempt_gmt` (`status`,`last_attempt_gmt`),
  KEY `status_claim_id` (`status`,`claim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_actionscheduler_actions`.


# Výpis tabulky wp_actionscheduler_claims
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_actionscheduler_claims`;

CREATE TABLE `wp_actionscheduler_claims` (
  `claim_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_created_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`claim_id`),
  KEY `date_created_gmt` (`date_created_gmt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_actionscheduler_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_actionscheduler_groups`;

CREATE TABLE `wp_actionscheduler_groups` (
  `group_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `slug` (`slug`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_actionscheduler_groups`.


# Výpis tabulky wp_actionscheduler_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_actionscheduler_logs`;

CREATE TABLE `wp_actionscheduler_logs` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` bigint(20) unsigned NOT NULL,
  `message` text NOT NULL,
  `log_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`log_id`),
  KEY `action_id` (`action_id`),
  KEY `log_date_gmt` (`log_date_gmt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_actionscheduler_logs`.


# Výpis tabulky wp_asenha_email_delivery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_asenha_email_delivery`;

CREATE TABLE `wp_asenha_email_delivery` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('successful','failed','unknown') NOT NULL DEFAULT 'unknown',
  `error` varchar(250) NOT NULL DEFAULT '',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `message` longtext NOT NULL DEFAULT '',
  `send_to` varchar(256) NOT NULL DEFAULT '',
  `sender` varchar(256) NOT NULL DEFAULT '',
  `reply_to` varchar(256) NOT NULL DEFAULT '',
  `headers` text NOT NULL DEFAULT '',
  `content_type` text NOT NULL DEFAULT '',
  `attachments` text NOT NULL DEFAULT '',
  `backtrace` text NOT NULL DEFAULT '',
  `processor` text NOT NULL DEFAULT '',
  `sent_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sent_on_unixtime` int(10) NOT NULL DEFAULT 0,
  `extra` longtext NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_asenha_failed_logins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_asenha_failed_logins`;

CREATE TABLE `wp_asenha_failed_logins` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL DEFAULT '',
  `username` varchar(24) NOT NULL DEFAULT '',
  `fail_count` int(10) NOT NULL DEFAULT 0,
  `lockout_count` int(10) NOT NULL DEFAULT 0,
  `request_uri` varchar(24) NOT NULL DEFAULT '',
  `unixtime` int(10) NOT NULL DEFAULT 0,
  `datetime_wp` varchar(36) NOT NULL DEFAULT '',
  `info` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_address` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_asenha_formbuilder_entries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_asenha_formbuilder_entries`;

CREATE TABLE `wp_asenha_formbuilder_entries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` text DEFAULT NULL,
  `form_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `delivery_status` tinyint(1) DEFAULT 0,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_asenha_formbuilder_entry_meta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_asenha_formbuilder_entry_meta`;

CREATE TABLE `wp_asenha_formbuilder_entry_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `meta_value` longtext DEFAULT NULL,
  `field_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_asenha_formbuilder_fields
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_asenha_formbuilder_fields`;

CREATE TABLE `wp_asenha_formbuilder_fields` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `field_key` varchar(100) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `type` text DEFAULT NULL,
  `default_value` longtext DEFAULT NULL,
  `options` longtext DEFAULT NULL,
  `field_order` int(11) DEFAULT 0,
  `required` int(1) DEFAULT NULL,
  `field_options` longtext DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `field_key` (`field_key`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_asenha_formbuilder_forms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_asenha_formbuilder_forms`;

CREATE TABLE `wp_asenha_formbuilder_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_key` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `options` longtext DEFAULT NULL,
  `settings` longtext DEFAULT NULL,
  `styles` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_commentmeta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_commentmeta`;

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_comments`;

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_links`;

CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_options`;

CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`),
  KEY `autoload` (`autoload`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`)
VALUES
	(2,'siteurl','http://wp-template.local','on'),
	(3,'home','http://wp-template.local','on'),
	(4,'blogname','WP template','on'),
	(5,'blogdescription','','on'),
	(6,'users_can_register','0','on'),
	(7,'admin_email','admin@example.invalid','on'),
	(8,'start_of_week','1','on'),
	(9,'use_balanceTags','0','on'),
	(10,'use_smilies','1','on'),
	(11,'require_name_email','1','on'),
	(12,'comments_notify','1','on'),
	(13,'posts_per_rss','10','on'),
	(14,'rss_use_excerpt','0','on'),
	(15,'mailserver_url','mail.example.com','on'),
	(16,'mailserver_login','login@example.invalid','on'),
	(17,'mailserver_pass','','on'),
	(18,'mailserver_port','110','on'),
	(19,'default_category','1','on'),
	(20,'default_comment_status','open','on'),
	(21,'default_ping_status','open','on'),
	(22,'default_pingback_flag','1','on'),
	(23,'posts_per_page','10','on'),
	(24,'date_format','j. n. Y','on'),
	(25,'time_format','G:i','on'),
	(26,'links_updated_date_format','j. n. Y, G:i','on'),
	(27,'comment_moderation','0','on'),
	(28,'moderation_notify','1','on'),
	(29,'permalink_structure','/%year%/%monthnum%/%day%/%postname%/','on'),
	(31,'hack_file','0','on'),
	(32,'blog_charset','UTF-8','on'),
	(33,'moderation_keys','','off'),
	(34,'active_plugins','a:5:{i:0;s:55:\"admin-site-enhancements-pro/admin-site-enhancements.php\";i:1;s:35:\"code-snippets-pro/code-snippets.php\";i:2;s:30:\"seo-by-rank-math/rank-math.php\";i:3;s:53:\"webp-converter-for-media/webp-converter-for-media.php\";i:4;s:43:\"wp-sheet-editor-premium/wp-sheet-editor.php\";}','on'),
	(35,'category_base','','on'),
	(36,'ping_sites','https://rpc.pingomatic.com/','on'),
	(37,'comment_max_links','2','on'),
	(38,'gmt_offset','0','on'),
	(39,'default_email_category','1','on'),
	(41,'template','twentytwentyfive','on'),
	(42,'stylesheet','twentytwentyfive','on'),
	(43,'comment_registration','0','on'),
	(44,'html_type','text/html','on'),
	(45,'use_trackback','0','on'),
	(46,'default_role','subscriber','on'),
	(47,'db_version','61833','on'),
	(48,'uploads_use_yearmonth_folders','1','on'),
	(49,'upload_path','','on'),
	(50,'blog_public','1','on'),
	(51,'default_link_category','2','on'),
	(52,'show_on_front','posts','on'),
	(53,'tag_base','','on'),
	(54,'show_avatars','1','on'),
	(55,'avatar_rating','G','on'),
	(56,'upload_url_path','','on'),
	(57,'thumbnail_size_w','150','on'),
	(58,'thumbnail_size_h','150','on'),
	(59,'thumbnail_crop','1','on'),
	(60,'medium_size_w','300','on'),
	(61,'medium_size_h','300','on'),
	(62,'avatar_default','mystery','on'),
	(63,'large_size_w','1024','on'),
	(64,'large_size_h','1024','on'),
	(65,'image_default_link_type','none','on'),
	(66,'image_default_size','','on'),
	(67,'image_default_align','','on'),
	(68,'close_comments_for_old_posts','0','on'),
	(69,'close_comments_days_old','14','on'),
	(70,'thread_comments','1','on'),
	(71,'thread_comments_depth','5','on'),
	(72,'page_comments','0','on'),
	(73,'comments_per_page','50','on'),
	(74,'default_comments_page','newest','on'),
	(75,'comment_order','asc','on'),
	(76,'sticky_posts','a:0:{}','on'),
	(77,'widget_categories','a:0:{}','on'),
	(78,'widget_text','a:0:{}','on'),
	(79,'widget_rss','a:0:{}','on'),
	(81,'timezone_string','Europe/Prague','on'),
	(82,'page_for_posts','0','on'),
	(83,'page_on_front','0','on'),
	(84,'default_post_format','0','on'),
	(85,'link_manager_enabled','0','on'),
	(86,'finished_splitting_shared_terms','1','on'),
	(87,'site_icon','0','on'),
	(88,'medium_large_size_w','768','on'),
	(89,'medium_large_size_h','0','on'),
	(90,'wp_page_for_privacy_policy','3','on'),
	(91,'show_comments_cookies_opt_in','1','on'),
	(93,'disallowed_keys','','off'),
	(94,'comment_previously_approved','1','on'),
	(95,'auto_plugin_theme_update_emails','a:0:{}','off'),
	(96,'auto_update_core_dev','enabled','on'),
	(97,'auto_update_core_minor','enabled','on'),
	(98,'auto_update_core_major','enabled','on'),
	(99,'wp_force_deactivated_plugins','a:0:{}','on'),
	(100,'wp_attachment_pages_enabled','0','on'),
	(101,'wp_notes_notify','1','on'),
	(102,'initial_db_version','60717','on'),
	(103,'wp_user_roles','a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:78:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:23:\"rank_math_edit_htaccess\";b:1;s:16:\"rank_math_titles\";b:1;s:17:\"rank_math_general\";b:1;s:17:\"rank_math_sitemap\";b:1;s:21:\"rank_math_404_monitor\";b:1;s:22:\"rank_math_link_builder\";b:1;s:22:\"rank_math_redirections\";b:1;s:22:\"rank_math_role_manager\";b:1;s:19:\"rank_math_analytics\";b:1;s:23:\"rank_math_site_analysis\";b:1;s:25:\"rank_math_onpage_analysis\";b:1;s:24:\"rank_math_onpage_general\";b:1;s:25:\"rank_math_onpage_advanced\";b:1;s:24:\"rank_math_onpage_snippet\";b:1;s:23:\"rank_math_onpage_social\";b:1;s:20:\"rank_math_content_ai\";b:1;s:19:\"rank_math_admin_bar\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:39:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:23:\"rank_math_site_analysis\";b:1;s:25:\"rank_math_onpage_analysis\";b:1;s:24:\"rank_math_onpage_general\";b:1;s:24:\"rank_math_onpage_snippet\";b:1;s:23:\"rank_math_onpage_social\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:14:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:25:\"rank_math_onpage_analysis\";b:1;s:24:\"rank_math_onpage_general\";b:1;s:24:\"rank_math_onpage_snippet\";b:1;s:23:\"rank_math_onpage_social\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}','on'),
	(104,'fresh_site','1','off'),
	(105,'WPLANG','cs_CZ','auto'),
	(107,'widget_block','a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:168:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Nejnovější příspěvky</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:237:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Nejnovější komentáře</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:145:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archivy</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:147:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Rubriky</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}','auto'),
	(108,'sidebars_widgets','a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:13:\"array_version\";i:3;}','auto'),
	(109,'widget_pages','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(110,'widget_calendar','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(111,'widget_archives','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(112,'widget_media_audio','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(113,'widget_media_image','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(114,'widget_media_gallery','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(115,'widget_media_video','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(116,'widget_meta','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(117,'widget_search','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(118,'widget_recent-posts','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(119,'widget_recent-comments','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(120,'widget_tag_cloud','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(121,'widget_nav_menu','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(122,'widget_custom_html','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),
	(132,'theme_mods_twentytwentyfive','a:1:{s:18:\"custom_css_post_id\";i:-1;}','auto'),
	(154,'finished_updating_comment_type','1','auto'),
	(182,'admin_site_enhancements','a:0:{}','auto'),
	(184,'admin_site_enhancements_extra','a:3:{s:21:\"cfgroup_next_field_id\";i:1;s:10:\"admin_menu\";a:6:{s:17:\"custom_menu_order\";s:0:\"\";s:18:\"custom_menu_titles\";s:0:\"\";s:25:\"custom_menu_always_hidden\";s:0:\"\";s:21:\"custom_submenus_order\";s:0:\"\";s:28:\"custom_submenu_always_hidden\";s:0:\"\";s:26:\"custom_menu_new_separators\";s:0:\"\";}s:17:\"dashboard_widgets\";a:5:{s:18:\"dashboard_activity\";a:4:{s:2:\"id\";s:18:\"dashboard_activity\";s:5:\"title\";s:8:\"Aktivity\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:19:\"dashboard_right_now\";a:4:{s:2:\"id\";s:19:\"dashboard_right_now\";s:5:\"title\";s:19:\"Aktuální přehled\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:21:\"dashboard_quick_press\";a:4:{s:2:\"id\";s:21:\"dashboard_quick_press\";s:5:\"title\";s:15:\"Rychlý koncept\";s:7:\"context\";s:4:\"side\";s:8:\"priority\";s:4:\"core\";}s:21:\"dashboard_site_health\";a:4:{s:2:\"id\";s:21:\"dashboard_site_health\";s:5:\"title\";s:9:\"Stav webu\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:17:\"dashboard_primary\";a:4:{s:2:\"id\";s:17:\"dashboard_primary\";s:5:\"title\";s:24:\"WordPress akce a novinky\";s:7:\"context\";s:4:\"side\";s:8:\"priority\";s:4:\"core\";}}}','on'),
	(188,'vg_sheet_editor','a:8:{s:8:\"last_tab\";N;s:13:\"be_post_types\";a:1:{i:0;s:4:\"post\";}s:17:\"be_posts_per_page\";i:40;s:23:\"be_load_items_on_scroll\";i:1;s:19:\"be_fix_columns_left\";i:2;s:22:\"be_posts_per_page_save\";i:8;s:26:\"be_timeout_between_batches\";i:6;s:23:\"be_disable_post_actions\";i:0;}','auto'),
	(190,'vgse_columns_visibility','a:0:{}','auto'),
	(191,'vgse_columns_visibility_migrated','1','auto'),
	(195,'vgse_disable_quick_setup','1','auto'),
	(204,'code_snippets_version','3.6.9','auto'),
	(208,'code_snippets_settings','a:2:{s:7:\"general\";a:9:{s:19:\"activate_by_default\";b:1;s:11:\"enable_tags\";b:1;s:18:\"enable_description\";b:1;s:18:\"visual_editor_rows\";i:5;s:10:\"list_order\";s:12:\"priority-asc\";s:13:\"disable_prism\";b:0;s:13:\"minify_output\";a:2:{i:0;s:3:\"css\";i:1;s:2:\"js\";}s:17:\"hide_upgrade_menu\";b:0;s:18:\"complete_uninstall\";b:0;}s:6:\"editor\";a:11:{s:16:\"indent_with_tabs\";b:1;s:8:\"tab_size\";i:4;s:11:\"indent_unit\";i:4;s:10:\"wrap_lines\";b:1;s:12:\"code_folding\";b:1;s:12:\"line_numbers\";b:1;s:19:\"auto_close_brackets\";b:1;s:27:\"highlight_selection_matches\";b:1;s:21:\"highlight_active_line\";b:1;s:6:\"keymap\";s:7:\"default\";s:5:\"theme\";s:7:\"default\";}}','auto'),
	(219,'action_scheduler_hybrid_store_demarkation','6','auto'),
	(220,'schema-ActionScheduler_StoreSchema','8.0.1765901828','auto'),
	(221,'schema-ActionScheduler_LoggerSchema','3.0.1765901828','auto'),
	(222,'rank_math_known_post_types','a:3:{s:4:\"post\";s:4:\"post\";s:4:\"page\";s:4:\"page\";s:10:\"attachment\";s:10:\"attachment\";}','auto'),
	(223,'rank_math_modules','a:12:{i:0;s:12:\"link-counter\";i:1;s:9:\"analytics\";i:2;s:12:\"seo-analysis\";i:3;s:7:\"sitemap\";i:4;s:12:\"rich-snippet\";i:5;s:11:\"woocommerce\";i:6;s:10:\"buddypress\";i:7;s:7:\"bbpress\";i:8;s:3:\"acf\";i:9;s:11:\"web-stories\";i:10;s:10:\"content-ai\";i:11;s:16:\"instant-indexing\";}','auto'),
	(225,'rank-math-options-titles','a:114:{s:24:\"noindex_empty_taxonomies\";s:2:\"on\";s:15:\"title_separator\";s:1:\"-\";s:17:\"capitalize_titles\";s:3:\"off\";s:17:\"twitter_card_type\";s:19:\"summary_large_image\";s:19:\"knowledgegraph_type\";s:6:\"person\";s:19:\"knowledgegraph_name\";s:11:\"WP template\";s:12:\"website_name\";s:11:\"WP template\";s:19:\"local_business_type\";s:12:\"Organization\";s:20:\"local_address_format\";s:43:\"{address} {locality}, {region} {postalcode}\";s:13:\"opening_hours\";a:7:{i:0;a:2:{s:3:\"day\";s:6:\"Monday\";s:4:\"time\";s:11:\"09:00-17:00\";}i:1;a:2:{s:3:\"day\";s:7:\"Tuesday\";s:4:\"time\";s:11:\"09:00-17:00\";}i:2;a:2:{s:3:\"day\";s:9:\"Wednesday\";s:4:\"time\";s:11:\"09:00-17:00\";}i:3;a:2:{s:3:\"day\";s:8:\"Thursday\";s:4:\"time\";s:11:\"09:00-17:00\";}i:4;a:2:{s:3:\"day\";s:6:\"Friday\";s:4:\"time\";s:11:\"09:00-17:00\";}i:5;a:2:{s:3:\"day\";s:8:\"Saturday\";s:4:\"time\";s:11:\"09:00-17:00\";}i:6;a:2:{s:3:\"day\";s:6:\"Sunday\";s:4:\"time\";s:11:\"09:00-17:00\";}}s:20:\"opening_hours_format\";s:3:\"off\";s:14:\"homepage_title\";s:34:\"%sitename% %page% %sep% %sitedesc%\";s:20:\"homepage_description\";s:0:\"\";s:22:\"homepage_custom_robots\";s:3:\"off\";s:23:\"disable_author_archives\";s:3:\"off\";s:15:\"url_author_base\";s:6:\"author\";s:20:\"author_custom_robots\";s:2:\"on\";s:13:\"author_robots\";a:1:{i:0;s:7:\"noindex\";}s:20:\"author_archive_title\";s:30:\"%name% %sep% %sitename% %page%\";s:19:\"author_add_meta_box\";s:2:\"on\";s:21:\"disable_date_archives\";s:2:\"on\";s:18:\"date_archive_title\";s:30:\"%date% %page% %sep% %sitename%\";s:12:\"search_title\";s:38:\"%search_query% %page% %sep% %sitename%\";s:9:\"404_title\";s:31:\"Page Not Found %sep% %sitename%\";s:19:\"date_archive_robots\";a:1:{i:0;s:7:\"noindex\";}s:14:\"noindex_search\";s:2:\"on\";s:24:\"noindex_archive_subpages\";s:3:\"off\";s:26:\"noindex_password_protected\";s:3:\"off\";s:32:\"pt_download_default_rich_snippet\";s:7:\"product\";s:29:\"author_slack_enhanced_sharing\";s:2:\"on\";s:13:\"pt_post_title\";s:24:\"%title% %sep% %sitename%\";s:19:\"pt_post_description\";s:9:\"%excerpt%\";s:14:\"pt_post_robots\";a:1:{i:0;s:5:\"index\";}s:21:\"pt_post_custom_robots\";s:3:\"off\";s:28:\"pt_post_default_rich_snippet\";s:7:\"article\";s:28:\"pt_post_default_article_type\";s:11:\"BlogPosting\";s:28:\"pt_post_default_snippet_name\";s:11:\"%seo_title%\";s:28:\"pt_post_default_snippet_desc\";s:17:\"%seo_description%\";s:30:\"pt_post_slack_enhanced_sharing\";s:2:\"on\";s:17:\"pt_post_ls_use_fk\";s:6:\"titles\";s:20:\"pt_post_add_meta_box\";s:2:\"on\";s:20:\"pt_post_bulk_editing\";s:7:\"editing\";s:24:\"pt_post_link_suggestions\";s:2:\"on\";s:24:\"pt_post_primary_taxonomy\";s:8:\"category\";s:13:\"pt_page_title\";s:24:\"%title% %sep% %sitename%\";s:19:\"pt_page_description\";s:9:\"%excerpt%\";s:14:\"pt_page_robots\";a:1:{i:0;s:5:\"index\";}s:21:\"pt_page_custom_robots\";s:3:\"off\";s:28:\"pt_page_default_rich_snippet\";s:7:\"article\";s:28:\"pt_page_default_article_type\";s:7:\"Article\";s:28:\"pt_page_default_snippet_name\";s:11:\"%seo_title%\";s:28:\"pt_page_default_snippet_desc\";s:17:\"%seo_description%\";s:30:\"pt_page_slack_enhanced_sharing\";s:2:\"on\";s:17:\"pt_page_ls_use_fk\";s:6:\"titles\";s:20:\"pt_page_add_meta_box\";s:2:\"on\";s:20:\"pt_page_bulk_editing\";s:7:\"editing\";s:24:\"pt_page_link_suggestions\";s:2:\"on\";s:19:\"pt_attachment_title\";s:24:\"%title% %sep% %sitename%\";s:25:\"pt_attachment_description\";s:9:\"%excerpt%\";s:20:\"pt_attachment_robots\";a:1:{i:0;s:7:\"noindex\";}s:27:\"pt_attachment_custom_robots\";s:2:\"on\";s:34:\"pt_attachment_default_rich_snippet\";s:3:\"off\";s:34:\"pt_attachment_default_article_type\";s:7:\"Article\";s:34:\"pt_attachment_default_snippet_name\";s:11:\"%seo_title%\";s:34:\"pt_attachment_default_snippet_desc\";s:17:\"%seo_description%\";s:36:\"pt_attachment_slack_enhanced_sharing\";s:3:\"off\";s:26:\"pt_attachment_add_meta_box\";s:3:\"off\";s:16:\"pt_product_title\";s:24:\"%title% %sep% %sitename%\";s:22:\"pt_product_description\";s:9:\"%excerpt%\";s:17:\"pt_product_robots\";a:1:{i:0;s:5:\"index\";}s:24:\"pt_product_custom_robots\";s:3:\"off\";s:31:\"pt_product_default_rich_snippet\";s:7:\"product\";s:31:\"pt_product_default_article_type\";s:7:\"Article\";s:31:\"pt_product_default_snippet_name\";s:11:\"%seo_title%\";s:31:\"pt_product_default_snippet_desc\";s:17:\"%seo_description%\";s:33:\"pt_product_slack_enhanced_sharing\";s:2:\"on\";s:20:\"pt_product_ls_use_fk\";s:6:\"titles\";s:23:\"pt_product_add_meta_box\";s:2:\"on\";s:23:\"pt_product_bulk_editing\";s:7:\"editing\";s:27:\"pt_product_link_suggestions\";s:2:\"on\";s:27:\"pt_product_primary_taxonomy\";s:11:\"product_cat\";s:18:\"pt_web-story_title\";s:24:\"%title% %sep% %sitename%\";s:24:\"pt_web-story_description\";s:9:\"%excerpt%\";s:19:\"pt_web-story_robots\";a:1:{i:0;s:5:\"index\";}s:26:\"pt_web-story_custom_robots\";s:3:\"off\";s:33:\"pt_web-story_default_rich_snippet\";s:7:\"article\";s:33:\"pt_web-story_default_article_type\";s:7:\"Article\";s:33:\"pt_web-story_default_snippet_name\";s:11:\"%seo_title%\";s:33:\"pt_web-story_default_snippet_desc\";s:17:\"%seo_description%\";s:35:\"pt_web-story_slack_enhanced_sharing\";s:3:\"off\";s:25:\"pt_web-story_add_meta_box\";s:3:\"off\";s:18:\"tax_category_title\";s:23:\"%term% %sep% %sitename%\";s:19:\"tax_category_robots\";a:1:{i:0;s:5:\"index\";}s:25:\"tax_category_add_meta_box\";s:2:\"on\";s:26:\"tax_category_custom_robots\";s:3:\"off\";s:24:\"tax_category_description\";s:18:\"%term_description%\";s:35:\"tax_category_slack_enhanced_sharing\";s:2:\"on\";s:25:\"tax_category_bulk_editing\";i:0;s:18:\"tax_post_tag_title\";s:23:\"%term% %sep% %sitename%\";s:19:\"tax_post_tag_robots\";a:1:{i:0;s:7:\"noindex\";}s:25:\"tax_post_tag_add_meta_box\";s:3:\"off\";s:26:\"tax_post_tag_custom_robots\";s:2:\"on\";s:24:\"tax_post_tag_description\";s:18:\"%term_description%\";s:35:\"tax_post_tag_slack_enhanced_sharing\";s:2:\"on\";s:25:\"tax_post_tag_bulk_editing\";i:0;s:21:\"tax_post_format_title\";s:23:\"%term% %sep% %sitename%\";s:22:\"tax_post_format_robots\";a:1:{i:0;s:7:\"noindex\";}s:28:\"tax_post_format_add_meta_box\";s:3:\"off\";s:29:\"tax_post_format_custom_robots\";s:2:\"on\";s:27:\"tax_post_format_description\";s:18:\"%term_description%\";s:38:\"tax_post_format_slack_enhanced_sharing\";s:2:\"on\";s:28:\"tax_post_format_bulk_editing\";i:0;s:31:\"remove_product_cat_snippet_data\";s:2:\"on\";s:31:\"remove_product_tag_snippet_data\";s:2:\"on\";}','auto'),
	(226,'rank-math-options-sitemap','a:17:{s:14:\"items_per_page\";i:200;s:14:\"include_images\";s:2:\"on\";s:22:\"include_featured_image\";s:3:\"off\";s:13:\"exclude_roles\";a:2:{i:0;s:11:\"contributor\";i:1;s:10:\"subscriber\";}s:12:\"html_sitemap\";s:2:\"on\";s:20:\"html_sitemap_display\";s:9:\"shortcode\";s:17:\"html_sitemap_sort\";s:9:\"published\";s:23:\"html_sitemap_seo_titles\";s:6:\"titles\";s:15:\"authors_sitemap\";s:2:\"on\";s:15:\"pt_post_sitemap\";s:2:\"on\";s:15:\"pt_page_sitemap\";s:2:\"on\";s:21:\"pt_attachment_sitemap\";s:3:\"off\";s:18:\"pt_product_sitemap\";s:2:\"on\";s:20:\"pt_web-story_sitemap\";s:3:\"off\";s:20:\"tax_category_sitemap\";s:2:\"on\";s:20:\"tax_post_tag_sitemap\";s:3:\"off\";s:23:\"tax_post_format_sitemap\";s:3:\"off\";}','auto'),
	(230,'rank_math_version','1.0.259.1','auto'),
	(231,'rank_math_db_version','1','auto'),
	(244,'webpc_is_new_installation','0','auto'),
	(255,'action_scheduler_migration_status','complete','auto'),
	(256,'as_has_wp_comment_logs','no','on');



/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;


# Výpis tabulky wp_postmeta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_postmeta`;

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_postmeta`.


# Výpis tabulky wp_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_posts`;

CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `type_status_author` (`post_type`,`post_status`,`post_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_posts`.


# Výpis tabulky wp_rank_math_internal_links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_rank_math_internal_links`;

CREATE TABLE `wp_rank_math_internal_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `target_post_id` bigint(20) unsigned NOT NULL,
  `type` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_direction` (`post_id`,`type`),
  KEY `target_post_id` (`target_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_rank_math_internal_meta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_rank_math_internal_meta`;

CREATE TABLE `wp_rank_math_internal_meta` (
  `object_id` bigint(20) unsigned NOT NULL,
  `internal_link_count` int(10) unsigned DEFAULT 0,
  `external_link_count` int(10) unsigned DEFAULT 0,
  `incoming_link_count` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_snippets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_snippets`;

CREATE TABLE `wp_snippets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `code` longtext NOT NULL,
  `tags` longtext NOT NULL,
  `scope` varchar(15) NOT NULL DEFAULT 'global',
  `priority` smallint(6) NOT NULL DEFAULT 10,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `revision` bigint(20) NOT NULL DEFAULT 1,
  `cloud_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scope` (`scope`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_term_relationships
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_term_relationships`;

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_term_relationships`.


# Výpis tabulky wp_term_taxonomy
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_term_taxonomy`;

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_term_taxonomy`.


# Výpis tabulky wp_termmeta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_termmeta`;

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_terms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_terms`;

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;



# Výpis tabulky wp_usermeta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_usermeta`;

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_usermeta`.


# Výpis tabulky wp_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_users`;

CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Baseline intentionally contains no data for `wp_users`.




-- Sanitized default taxonomy data.
LOCK TABLES `wp_terms` WRITE, `wp_term_taxonomy` WRITE;
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`)
VALUES (1,'Nezařazené','nezarazene',0);
INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`)
VALUES (1,1,'category','',0,0);
UNLOCK TABLES;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
