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

RENAME TABLE `firms` TO `branches`;


ALTER TABLE `format`
  CHANGE `id` `format_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoice_types`
  CHANGE `id` `invoice_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `name` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL,
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `name_ar`;

UPDATE `invoice_types` SET `name_en` = 'A4 Invoice' WHERE `invoice_type_id` = '1';
UPDATE `invoice_types` SET `name_en` = 'Dot Matrix' WHERE `invoice_type_id` = '3';
UPDATE `invoice_types` SET `name_en` = 'User Defined' WHERE `invoice_type_id` = '4';
UPDATE `invoice_types` SET `name_en` = 'Heat Invoices' WHERE `invoice_type_id` = '2';


ALTER TABLE `invoices`
  CHANGE `id` `invoice_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NOT NULL,
  CHANGE `mysql_timestamp` `mysql_timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP   NOT NULL  AFTER `invoice_status_id`;


ALTER TABLE `languages`
  CHANGE `id` `language_id` VARCHAR(50) CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
  CHANGE `title` `name` VARCHAR(50) CHARSET utf8 COLLATE utf8_general_ci NOT NULL;


ALTER TABLE `marks`
  CHANGE `id` `mark_id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `mark_id`,
  CHANGE `title` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NOT NULL  AFTER `name_en`;

ALTER TABLE `messages`
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `client_id`,
  CHANGE `title` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL,
  ADD COLUMN `content_en` TEXT NULL AFTER `name_ar`,
  CHANGE `content` `content_ar` TEXT CHARSET utf8 COLLATE utf8_general_ci NULL;


ALTER TABLE `pending_orders`
  CHANGE `id` `pending_order_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `title` `name` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL,
  CHANGE `user_id` `user_id` INT(11) NOT NULL,
  CHANGE `client_id` `client_id` INT(11) NOT NULL,
  CHANGE `firm_id` `branch_id` INT(11) NOT NULL;

ALTER TABLE `pending_products`
  DROP COLUMN `firm_id`,
  DROP COLUMN `user_id`,
  DROP COLUMN `price`,
  DROP COLUMN `timestamp`,
  CHANGE `id` `ipending_order_product_d` INT(11) NOT NULL AUTO_INCREMENT;

RENAME TABLE `pending_products` TO `pending_order_products`;

CREATE TABLE `product_inventory`(
  `product_inventory_id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT,
  `branch_id` INT,
  `operation` ENUM('+','-'),
  `qty` INT,
  PRIMARY KEY (`product_inventory_id`)
);



ALTER TABLE `products`
  CHANGE `id` `product_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `title` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `name_ar`,
  ADD COLUMN `desc_en` TEXT NULL AFTER `amount`,
  CHANGE `desc` `desc_ar` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `reports`
  CHANGE `id` `report_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NULL;

ALTER TABLE `scratch_cards`
  CHANGE `date` `created_at` DATETIME NULL;

ALTER TABLE `services`
  CHANGE `id` `service_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NOT NULL,
  ADD COLUMN `created_at` DATETIME NULL AFTER `timestamp`;


ALTER TABLE `services`
  CHANGE `service_id` `service_order_id` INT(11) NOT NULL AUTO_INCREMENT;

RENAME TABLE `services` TO `service_orders`;


ALTER TABLE `service_stocks`
  CHANGE `id` `service_id` INT(11) NOT NULL AUTO_INCREMENT;

RENAME TABLE `service_stocks` TO `services`;

create TABLE service_inventory (
    service_inventory_id int(11) not null,
    service_id int(11),
    branch_id int(11),
    operation enum('+', '-'),
    qty int(11),
    PRIMARY KEY (service_inventory_id)
);


ALTER TABLE `sim_types`
  CHANGE `id` `sim_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `title` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL,
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `name_ar`;


ALTER TABLE `sms_templates`
  CHANGE `id` `sms_template_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `title` `name_ar` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
  ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `name_ar`,
  CHANGE `content` `content_ar` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
  ADD COLUMN `content_en` TEXT NULL AFTER `content_ar`,
  ADD COLUMN `created_at` DATETIME NULL AFTER `timestamp`;

ALTER TABLE `sold_products`
  CHANGE `id` `sale_product_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NOT NULL,
  ADD COLUMN `created_at` DATETIME NULL AFTER `timestamp`;

RENAME TABLE `sold_products` TO `sale_products`;


ALTER TABLE `prepaid_cards`
  CHANGE `prepaid_card_id` `prepaid_card_type_id` INT(10) NOT NULL AUTO_INCREMENT;

RENAME TABLE `prepaid_cards` TO `prepaid_card_types`;

ALTER TABLE `scratch_cards`
  CHANGE `scratch_card_id` `prepaid_card_id` INT(10) NOT NULL AUTO_INCREMENT,
  CHANGE `prepaid_card_id` `prepaid_card_type_id` INT(10) NULL;

RENAME TABLE `scratch_cards` TO `prepaid_cards`;

DROP TABLE `admins`; 
DROP TABLE `admin_usergroups`; 
DROP TABLE `admin_usergroup_zones`;
 
 
ALTER TABLE `transactions`
  CHANGE `id` `transaction_id` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `branches`
  CHANGE `timestamp` `created_at` DATETIME NULL;

ALTER TABLE `branches`
  CHANGE `transactions` `accept_cc` BOOLEAN DEFAULT 0  NOT NULL;

ALTER TABLE `categories`
  CHANGE `timestamp` `created_at` DATETIME NOT NULL;



/************************/
ALTER TABLE `credit_cards`
  CHANGE `timestamp` `created_at` DATETIME NULL;

ALTER TABLE `device_orders`
  CHANGE `timestamp` `created_at` DATETIME NULL;

ALTER TABLE `fee_types`
  DROP COLUMN `timestamp`;

ALTER TABLE `fees`
  CHANGE `month` `month` TINYINT(2) NOT NULL,
  CHANGE `year` `year` YEAR NOT NULL,
  CHANGE `timestamp` `created_at` DATETIME NOT NULL;

ALTER TABLE `format`
  CHANGE `firm_id` `branch_id` INT NULL,
  CHANGE `timestamp` `created_at` DATETIME NOT NULL;

RENAME TABLE `format` TO `format_orders`;

ALTER TABLE `format_orders`
  CHANGE `format_id` `format_order_id` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `invoices`
  DROP COLUMN `timestamp`,
  CHANGE `mysql_timestamp` `created_at` DATETIME NOT NULL;

ALTER TABLE `marks`
  DROP COLUMN `timestamp`;

ALTER TABLE `messages`
  CHANGE `datetime` `created_at` DATETIME NULL;

ALTER TABLE `pending_orders`
  DROP COLUMN `timestamp`,
  CHANGE `mysql_timestamp` `created_at` DATETIME NOT NULL;

ALTER TABLE `products`
  DROP COLUMN `timestamp`,
  DROP COLUMN `stock_3`,
  DROP COLUMN `stock_2`;


ALTER TABLE `reports`
  DROP COLUMN `membership`,
  CHANGE `timestamp` `created_at` DATETIME NULL;




ALTER TABLE `sales`.`users`
  CHANGE `id` `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE `firm_id` `branch_id` INT(11) NOT NULL,
  CHANGE `id_expiredate` `id_expire_date` INT(11) NOT NULL,
  CHANGE `timestamp` `created_at` DATETIME NOT NULL;


