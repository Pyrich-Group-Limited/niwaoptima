

INSERT INTO `product_service_categories` (`id`, `name`, `type`, `chart_account_id`, `color`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Travel', 'product & service', 0, 'BLUE', 1, '2023-10-23 12:45:47', '2023-10-23 12:45:47'),
(2, 'Bank', 'liability', 1, 'BLUE', 1, '2023-10-23 12:52:37', '2023-10-23 12:52:37'),
(3, 'Maintenance Sales', 'income', 2, 'RED', 1, '2023-10-23 13:18:28', '2023-10-23 13:18:28'),
(4, 'Rent Or Lease', 'expense', 3, 'Gold', 1, '2023-10-23 13:50:47', '2023-10-23 13:52:32');



INSERT INTO `product_service_units` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'KG', 1, '2023-10-23 12:59:08', '2023-10-23 12:59:08'),
(2, 'Meter', 1, '2023-10-23 12:59:17', '2023-10-23 12:59:17'),
(3, 'Inch', 1, '2023-10-23 12:59:28', '2023-10-23 12:59:28');


INSERT INTO `taxes` (`id`, `name`, `rate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Generator', '2', 1, '2023-10-23 12:36:18', '2023-10-23 12:36:18'),
(2, 'Food', '5', 1, '2023-10-23 12:36:52', '2023-10-23 12:36:52');

