ALTER TABLE `cash_types`
  CHANGE `name` `name_ar` VARCHAR(50) CHARSET utf8 COLLATE utf8_general_ci NULL,
  ADD COLUMN `name_en` VARCHAR(50) NULL AFTER `name_ar`;

UPDATE `cash_types` SET `name_en` = 'Cash' WHERE `cash_type_id` = '1';
UPDATE `cash_types` SET `name_en` = 'Network' WHERE `cash_type_id` = '2';

ALTER TABLE`categories`
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `parent_id`,
  CHANGE `title` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `categories`
  ADD COLUMN `desc_en` TEXT NULL AFTER `name_ar`,
  CHANGE `desc` `desc_ar` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL;

ALTER TABLE `categories`
  CHANGE `id` `category_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `clients`
  CHANGE `id` `client_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NULL;

ALTER TABLE `departments`
  CHANGE `nae_en` `name_en` VARCHAR(50) CHARSET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `device_orders`
  CHANGE `firm_id` `branch_id` INT(11) NULL;

ALTER TABLE `devices`
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `device_type_id`,
  CHANGE `name` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL;

ALTER TABLE `emails`
  ADD COLUMN `name_en` VARCHAR(200) NULL AFTER `email_id`,
  CHANGE `title` `name_ar` VARCHAR(200) CHARSET utf8 COLLATE utf8_general_ci NULL,
  CHANGE `en_subject` `subject_en` VARCHAR(200) CHARSET utf8 COLLATE utf8_general_ci NULL,
  CHANGE `ar_subject` `subject_ar` VARCHAR(200) CHARSET utf8 COLLATE utf8_general_ci NULL,
  CHANGE `ar_content` `content_ar` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL,
  CHANGE `en_content` `content_en` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL;

ALTER TABLE `fee_types`
  CHANGE `id` `fee_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD COLUMN `name_en` VARCHAR(150) NULL AFTER `fee_type_id`,
  CHANGE `title` `name_ar` VARCHAR(150) CHARSET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `fees`
  CHANGE `id` `fee_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NOT NULL;

ALTER TABLE `firms`
  CHANGE `id` `branch_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `title` `name` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL;

RENAME TABLE `firms` TO `sales`.`branches`;


ALTER TABLE `format`
  CHANGE `id` `format_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoice_types`
  CHANGE `id` `invoice_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `name` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL,
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `name_ar`;

UPDATE `sales`.`invoice_types` SET `name_en` = 'A4 Invoice' WHERE `invoice_type_id` = '1';
UPDATE `invoice_types` SET `name_en` = 'Dot Matrix' WHERE `invoice_type_id` = '3';
UPDATE `invoice_types` SET `name_en` = 'User Defined' WHERE `invoice_type_id` = '4';
UPDATE `invoice_types` SET `name_en` = 'Heat Invoices' WHERE `invoice_type_id` = '2';


