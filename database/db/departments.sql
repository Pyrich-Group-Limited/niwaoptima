--
-- Table structure for table `departments`
--

/* CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; */

--
-- Dumping data for table `departments`
--
-- from me atp, if you are looking for department seeder go to staff.sql
-- INSERT INTO `departments` (`id`, `department_unit`, `name`, `status`, `description`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
-- (1, NULL, 'Survey', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (2, NULL, 'Adminstration,Corporate Services and Human Resource ', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (3, NULL, 'ICT', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (4, NULL, 'Legal', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (5, NULL, 'Investment & Treasury Management', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (6, NULL, 'Finance & Accounts', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (7, NULL, 'Procurement', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (8, NULL, 'Servicom', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (9, NULL, 'Marine', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (10, NULL, 'Informal Sector', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (11, NULL, 'Risk Management', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (12, NULL, 'Co-ordination', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (13, NULL, 'Estate & Maintenance', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (14, NULL, 'Social Security Development', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (15, NULL, 'Inspections', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (16, NULL, 'Engineering', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (17, NULL, 'Health Safety & Environment', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (18, NULL, 'Corporate Affairs', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
-- (19, NULL, 'General', 1, NULL, 2, '2023-05-18 10:08:10', '2023-05-18 10:07:54', NULL),
-- (20, NULL, 'ED Directorate', 1, NULL, 2, '2023-05-24 11:53:24', '2023-05-24 11:51:33', NULL),
-- (21, NULL, 'MD Directorate', 1, NULL, 2, '2023-05-24 11:53:24', '2023-05-24 11:51:33', NULL);

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'storage_setting', 'local', 1, '2023-10-24 06:42:04', '2023-10-23 21:00:00'),
(2, 'company_name', 'National Inland Waterways Authority', 1, '2023-10-25 11:58:39', '2023-10-25 11:58:39'),
(3, 'company_email', 'admin@niwa.gov.ng', 1, '2023-10-25 11:59:27', '2023-10-25 11:59:27'),
(4, 'company_address', 'Aliyu Obaje rd. off Hydro Junction, Adankolo New Layout,', 1, '2023-10-25 12:02:09', '2023-10-24 21:00:00'),
(6, 'company_city', 'Lokoja,', 1, '2023-10-25 12:06:36', '2023-10-25 12:06:36'),
(7, 'company_state', 'Kogi State,', 1, '2023-10-25 12:06:36', '2023-10-25 12:06:36'),
(8, 'company_zipcode', '54545', 1, '2023-10-25 12:08:40', '2023-10-25 12:08:40'),
(9, 'company_country', 'Nigeria', 1, '2023-10-25 12:09:08', '2023-10-25 12:09:08'),
(10, 'company_telephone', '0908 008 7168', 1, '2023-10-25 12:09:44', '2023-10-25 12:09:44'),
(11, 'registration_number', 'CAC434545445', 1, '2023-10-25 12:11:13', '2023-10-25 12:11:13'),
(12, 'disable_langed', 'true', 1, '2023-10-30 01:22:44', '2023-10-30 01:22:44'),
(13, 'default_language', 'en', 1, '2023-10-30 01:27:25', '2023-10-30 01:27:25'),
(14, 'company_logo_light', 'logo-light.png', 1, NULL, NULL),
(15, 'company_favicon', 'favicon.png', 1, NULL, NULL),
(16, 'title_text', 'NSITF EBS', 1, NULL, NULL),
(17, 'footer_text', 'NSITF Portal', 1, NULL, NULL),
(19, 'display_landing_page', 'on', 1, NULL, NULL),
(20, 'cust_theme_bg', 'on', 1, NULL, NULL),
(21, 'SITE_RTL', 'off', 1, NULL, NULL),
(22, 'gdpr_cookie', 'off', 1, NULL, NULL),
(23, 'cust_darklayout', 'off', 1, NULL, NULL),
(32, 'site_currency', 'NGN', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(33, 'site_currency_symbol', '₦', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(34, 'site_currency_symbol_position', 'pre', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(35, 'decimal_number', '2', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(36, 'site_date_format', 'M j, Y', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(37, 'site_time_format', 'g:i A', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(38, 'customer_prefix', '#CUST', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(39, 'vender_prefix', '#VEND', 1, '2023-10-30 05:22:22', '2023-10-30 05:22:22'),
(40, 'proposal_prefix', '#PROP', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(41, 'invoice_prefix', '#INVO', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(42, 'bill_prefix', '#BILL', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(43, 'purchase_prefix', '#PUR', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(44, 'pos_prefix', '#POS', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(45, 'journal_prefix', '#JUR', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(46, 'expense_prefix', '#EXP', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(47, 'shipping_display', 'on', 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(48, 'footer_title', NULL, 1, '2023-10-30 05:22:23', '2023-10-30 05:22:23'),
(49, 'company_logo_dark', 'logo-dark.png', 1, NULL, NULL);

/* --
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;
  COMMIT; */
