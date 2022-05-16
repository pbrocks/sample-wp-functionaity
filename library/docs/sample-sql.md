Here is a query I am using in researching this:

SELECT `wp_posts`.post_name, `wp_postmeta`.* FROM `wp_postmeta` LEFT JOIN `wp_posts` ON `wp_postmeta`.`post_id` = `wp_posts`.`id` WHERE `meta_key` LIKE '%org_id%' ORDER BY `wp_postmeta`.`meta_value` DESC