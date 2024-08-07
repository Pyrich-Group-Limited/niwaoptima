-- INSERT INTO `branches` (`id`, `branch_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
-- (1, 'LAGOS', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (2, 'PORT HARCOURT', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (3, 'WARRI', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (4, 'ONITSHA A/O', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (5, 'YENAGOA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (6, 'EKET', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (7, 'ABEOKUTA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (8, 'LOKOJA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (9, 'CALABAR', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (10, 'KADUNA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (11, 'JALINGO', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (12, 'HADEJIA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (13, 'MINNA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (14, 'SOKOTO', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (15, 'ABUJA L/O', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (16, 'MAIDUGURI', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (17, 'YOLA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (18, 'OGUTA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (19, 'IGBOKODA', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (20, 'ONITSHA R/P', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (21, 'YALEWA/YAURI', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (22, 'BARO PORT', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (23, 'JAHI', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL);

INSERT INTO `services` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'use of right of ways', 1, NULL, NULL, NULL),
(2, 'dredging', 1, NULL, NULL, NULL),
(3, 'reclamation', 1, NULL, NULL, NULL),
(4, 'canalization/dredging of slots', 1, NULL, NULL, NULL),
(5, 'hydroelectric power dams and power generating station/plants on water and its right of  ways', 1, NULL, NULL, NULL),
(6, 'advertising withing right of ways', 1, NULL, NULL, NULL),
(7, 'pipeline layings/crossing', 1, NULL, NULL, NULL),
(8, 'utility lines', 1, NULL, NULL, NULL),
(9, 'survey under water engineering works and removal of wrecks', 1, NULL, NULL, NULL),
(10, 'hydrological information', 1, NULL, NULL, NULL),
(11, 'chatrs and maps', 1, NULL, NULL, NULL),
(12, 'wharfage and berthing', 1, NULL, NULL, NULL),
(13, 'warehouse', 1, NULL, NULL, NULL),
(14, 'examination fees for proficiency', 1, NULL, NULL, NULL),
(15, 'craft and vessels', 1, NULL, NULL, NULL),
(16, 'vessel recertification feees', 1, NULL, NULL, NULL),
(17, 'utility within dockyards/river ports', 1, NULL, NULL, NULL),
(18, 'river guide pilotage', 1, NULL, NULL, NULL),
(19, 'Passage and tolls', 1, NULL, NULL, NULL),
(20, 'Permit fees for river crafts per anum', 1, NULL, NULL, NULL),
(21, 'Slipway and dockyards services', 1, NULL, NULL, NULL),
(22, 'Ferry services', 1, NULL, NULL, NULL),
(23, 'Ferry vehiclrs', 1, NULL, NULL, NULL),
(24, 'Equipments and property leasing', 1, NULL, NULL, NULL),
(25, 'Landed properties', 1, NULL, NULL, NULL),
(26, 'Design and construction of inland craft', 1, NULL, NULL, NULL),
(27, 'testing123', 1, '2024-01-11 03:03:29', '2024-01-11 03:04:33', NULL),
(28, 'demo data', 1, '2024-01-17 11:50:12', '2024-01-17 11:50:12', NULL);

INSERT INTO `sub_services` (`id`, `name`, `status`, `service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pleasure(A)', 1, 1, '2024-01-09 12:00:49', '2024-01-09 12:44:11', NULL),
(2, 'domestic(B)', 1, 1, '2024-01-09 12:44:30', '2024-01-09 12:44:30', NULL),
(3, 'community(C)', 1, 1, '2024-01-09 12:44:47', '2024-01-09 12:44:47', NULL),
(4, 'commercial services(D)', 1, 1, '2024-01-09 12:45:04', '2024-01-09 12:45:20', NULL);
