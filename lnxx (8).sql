-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 02:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lnxx`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `iban_no` varchar(255) NOT NULL,
  `standing_instru_detail` varchar(255) NOT NULL,
  `5_marked` int(1) NOT NULL DEFAULT 0,
  `cm_billing_date` int(11) NOT NULL,
  `e_statement_subscription` int(1) NOT NULL DEFAULT 0,
  `paper_statement_subscription` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `permanent_address_home_country_line_1` varchar(255) DEFAULT NULL,
  `permanent_address_home_country_line_2` varchar(255) DEFAULT NULL,
  `permanent_address_home_country_line_3` varchar(255) DEFAULT NULL,
  `permanent_address_zipcode` varchar(8) DEFAULT NULL,
  `permanent_home_country_emirates` varchar(255) DEFAULT NULL,
  `permanent_home_country_po_box` varchar(25) DEFAULT NULL,
  `permanent_address_country` int(11) DEFAULT NULL,
  `permanent_address_city` varchar(100) DEFAULT NULL,
  `permanent_addresstel_with_idd_code` varchar(25) DEFAULT NULL,
  `residential_address_line_1` varchar(255) DEFAULT NULL,
  `residential_address_line_2` varchar(255) DEFAULT NULL,
  `residential_address_line_3` varchar(255) DEFAULT NULL,
  `	residential_address_buliding_name` varchar(255) DEFAULT NULL,
  `	residential_address_street_name` varchar(255) DEFAULT NULL,
  `residential_address_nearest_landmark` varchar(255) DEFAULT NULL,
  `residential_emirate` varchar(255) DEFAULT NULL,
  `residential_po_box` varchar(25) DEFAULT NULL,
  `office_address_office_address_building_name` varchar(255) DEFAULT NULL,
  `office_address_street_name` varchar(255) DEFAULT NULL,
  `office_address_office_address_nearest` varchar(255) DEFAULT NULL,
  `office_emirate` varchar(255) DEFAULT NULL,
  `office_po_box` varchar(25) DEFAULT NULL,
  `mailing_address_line_1` varchar(255) DEFAULT NULL,
  `annual_rent` varchar(11) DEFAULT NULL,
  `mailing_po_box` varchar(25) DEFAULT NULL,
  `mailing_emirate` varchar(255) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `duration_at_current_address` varchar(30) DEFAULT NULL,
  `company_address_line_1` varchar(255) DEFAULT NULL,
  `company_address_line_2` varchar(255) DEFAULT NULL,
  `company_address_line_3` varchar(255) DEFAULT NULL,
  `company_po_box` varchar(25) DEFAULT NULL,
  `company_phone_no` varchar(15) DEFAULT NULL,
  `company_emirate` varchar(255) DEFAULT NULL,
  `resdence_type` varchar(50) DEFAULT NULL,
  `preferred_mailing_address` varchar(25) DEFAULT NULL,
  `preferred_statement_mode` int(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `permanent_address_home_country_line_1`, `permanent_address_home_country_line_2`, `permanent_address_home_country_line_3`, `permanent_address_zipcode`, `permanent_home_country_emirates`, `permanent_home_country_po_box`, `permanent_address_country`, `permanent_address_city`, `permanent_addresstel_with_idd_code`, `residential_address_line_1`, `residential_address_line_2`, `residential_address_line_3`, `	residential_address_buliding_name`, `	residential_address_street_name`, `residential_address_nearest_landmark`, `residential_emirate`, `residential_po_box`, `office_address_office_address_building_name`, `office_address_street_name`, `office_address_office_address_nearest`, `office_emirate`, `office_po_box`, `mailing_address_line_1`, `annual_rent`, `mailing_po_box`, `mailing_emirate`, `company_name`, `duration_at_current_address`, `company_address_line_1`, `company_address_line_2`, `company_address_line_3`, `company_po_box`, `company_phone_no`, `company_emirate`, `resdence_type`, `preferred_mailing_address`, `preferred_statement_mode`, `created_at`, `updated_at`) VALUES
(1, 6, 'G 65', NULL, NULL, '201301', NULL, NULL, 101, 'Noida', NULL, 'Abu Dhabi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50000', NULL, NULL, 'Reliance Digital', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rented', NULL, NULL, '2022-11-09 06:43:48', '2022-11-09 06:43:48'),
(2, 9, NULL, NULL, NULL, NULL, NULL, NULL, 101, NULL, NULL, 'Noida sector 63', 'Noida sector 63', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Living With Parents', NULL, NULL, '2022-11-11 09:18:53', '2022-11-11 09:18:53'),
(3, 16, 'DSIDC', NULL, NULL, NULL, NULL, NULL, 101, 'Delhi', NULL, 'G-165', 'Sector 45', 'Opp Park', NULL, NULL, 'Post Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Samtech Infonet Ltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shared', NULL, NULL, '2022-11-14 08:56:41', '2022-11-14 08:56:41'),
(4, 18, 'Smarat colony', 'giaspura', 'ludhiana', '141010', NULL, NULL, 101, 'punjab', NULL, 'baurdeeh', 'jungle kaudhia', 'gorakhpur ,UP', NULL, NULL, 'Dahria Bazzar', 'No', '2730007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shailersolutions', NULL, 'G-65', 'sector 63,', 'Noida', '134040', '7905957641', 'Yes', NULL, NULL, NULL, '2022-11-16 12:31:55', '2022-11-16 12:31:55'),
(5, 19, 'qqqqq', 'wwwww', 'eeeee', 'rrrr', NULL, NULL, 9, 'Dubai', NULL, 'tttt', 'yyyy', 'uuu', NULL, NULL, 'iii', 'uuuu', '22344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaa', NULL, 'ssssss', 'ddddd', 'ffffff', '2233', '7905957641', 'bbbbb', NULL, NULL, NULL, '2022-11-16 12:42:40', '2022-11-16 12:42:40'),
(6, 20, 'rfft', 'gggdf', 'tff', '273007', NULL, NULL, 10, 'dddddd', NULL, 'djjd', 'djdj', 'fjjdjf', NULL, NULL, 'ejdjd', 'fjfjd', 'rhdj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'djdjjd', NULL, 'dbbdnhe', 'ehdhe', 'rhrbrh', 'djdjjd', '7905957641', 'dbrbdhr', NULL, NULL, NULL, '2022-11-17 05:44:41', '2022-11-17 05:44:41'),
(7, 21, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, 'Sector 63', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09856767822', NULL, 'Shared', NULL, NULL, '2022-11-21 01:04:37', '2022-11-21 01:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `aecb_consent_form`
--

CREATE TABLE `aecb_consent_form` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cm_name` varchar(255) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `cm_date` datetime NOT NULL,
  `cm_name_pass` varchar(255) NOT NULL,
  `eid_no` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `old_passport_no` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  `cm_s_name` varchar(255) NOT NULL,
  `cm_signature` varchar(255) NOT NULL,
  `various_takefull_insaurance_details` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agent_onboarding`
--

CREATE TABLE `agent_onboarding` (
  `id` int(11) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 0,
  `name_as_per_passport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `embossing_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_maiden_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` int(255) NOT NULL,
  `have_passport` int(1) NOT NULL DEFAULT 0,
  `passport_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `have_visa` int(1) NOT NULL DEFAULT 0,
  `visa_sponsor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa_expiry_date` date DEFAULT NULL,
  `years_in_uae` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `Idbarah_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country_of_origin` int(11) NOT NULL,
  `duration_at_current_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `permanent_address_city` int(11) NOT NULL DEFAULT 0,
  `education_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_lead`
--

CREATE TABLE `assign_lead` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `lead_status` varchar(121) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_lead`
--

INSERT INTO `assign_lead` (`id`, `emp_id`, `cus_id`, `lead_status`, `updated_at`, `created_at`) VALUES
(1, 5, 24, 'New', NULL, NULL),
(2, 26, 25, 'New', NULL, NULL),
(3, 31, 1345, 'New', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balance_transfer_request`
--

CREATE TABLE `balance_transfer_request` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `benifical_name` varchar(255) NOT NULL,
  `balance_transfer_amt` float NOT NULL,
  `balance_transfer_rate` varchar(255) NOT NULL,
  `transfer_req_date` datetime NOT NULL,
  `credit_shield_plus` int(1) NOT NULL DEFAULT 0,
  `master_credit_issuance` int(1) NOT NULL DEFAULT 0,
  `signature` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `url`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ADCB', 'adcb', '/uploads/banks/312801logo1.jpg', 1, '2022-11-21 10:03:41', '2022-11-21 10:03:41', NULL),
(2, 'Ajman Bank', 'ajman-bank', '/uploads/banks/532870logo2.jpg', 1, '2022-11-21 10:05:02', '2022-11-21 10:05:02', NULL),
(3, 'Emirates NBD', 'emirates-nbd', '/uploads/banks/388624logo3.jpg', 1, '2022-11-21 10:05:53', '2022-11-21 10:05:53', NULL),
(4, 'Commercial Bank Of Dubai', 'commercial-bank-of-dubai', '/uploads/banks/557182logo4.jpg', 1, '2022-11-21 10:06:55', '2022-11-21 10:06:55', NULL),
(5, 'Emirates Islamic', 'emirates-islamic', '/uploads/banks/478301logo5.jpg', 1, '2022-11-21 10:09:35', '2022-11-21 10:09:35', NULL),
(6, 'Dubai Islamic Bank', 'dubai-islamic-bank', '/uploads/banks/965741logo6.jpg', 1, '2022-11-21 10:10:30', '2022-11-21 10:10:30', NULL),
(7, 'Bank Of Baroda', 'bank-of-baroda', '/uploads/banks/143855logo7.jpg', 1, '2022-11-21 10:11:17', '2022-11-21 10:11:17', NULL),
(8, 'National Bank of Fujairah', 'national-bank-of-fujairah', '/uploads/banks/727836Untitled-1.1.jpg', 1, '2022-11-21 10:21:38', '2022-11-21 10:21:38', NULL),
(9, 'test', 'test', '/uploads/banks/561350demo-computer-key-to-download-version-software-trial-64543995.jpg', 1, '2022-12-01 09:43:11', '2022-12-01 09:43:11', NULL),
(10, 'Jhon Wick', 'jhon-wick', '/uploads/banks/362487demo-computer-key-to-download-version-software-trial-64543995.jpg', 1, '2022-12-01 09:45:44', '2022-12-01 09:45:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_policy`
--

CREATE TABLE `bank_policy` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `policy_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Noida', '2023-01-10 11:05:03', '0000-00-00 00:00:00'),
(2, 'sdfhsdifhvbs', '2023-01-10 11:06:40', '0000-00-00 00:00:00');

--
-- Triggers `city`
--
DELIMITER $$
CREATE TRIGGER `Update Leads` AFTER INSERT ON `city` FOR EACH ROW UPDATE `leads` SET `dob`='2023-01-10'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cm_salaried_details`
--

CREATE TABLE `cm_salaried_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `date_of_joining` varchar(20) DEFAULT NULL,
  `last_three_salary_credits` varchar(255) DEFAULT NULL,
  `monthly_salary` float DEFAULT NULL,
  `staff_id_no` int(11) DEFAULT NULL,
  `name_previous_emp` varchar(255) DEFAULT NULL,
  `no_year_previous_emp` int(11) DEFAULT NULL,
  `monthly_add_income` varchar(10) DEFAULT NULL,
  `monthly_deductions` varchar(11) DEFAULT NULL,
  `salary_pay_date` varchar(20) DEFAULT NULL,
  `confirm_emp` int(2) DEFAULT NULL,
  `work_exp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_salaried_details`
--

INSERT INTO `cm_salaried_details` (`id`, `customer_id`, `company_name`, `date_of_joining`, `last_three_salary_credits`, `monthly_salary`, `staff_id_no`, `name_previous_emp`, `no_year_previous_emp`, `monthly_add_income`, `monthly_deductions`, `salary_pay_date`, `confirm_emp`, `work_exp`, `created_at`, `updated_at`) VALUES
(1, 6, 'Manager', '2022-11-11', 'HR', 546, 646456, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-11-09 10:48:36', '2022-11-09 05:18:36'),
(2, 9, 'S/W', '2026-12-04', 'IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-11-11 09:16:48', '2022-11-11 09:16:48'),
(3, 16, 'Project Manager', '2022-01-01', 'IT Department', 150000, 5466, NULL, NULL, NULL, NULL, NULL, 1, '14', '2022-11-14 08:54:49', '2022-11-14 08:54:49'),
(4, 10, 'Flutter Developer', '2022-03-01', 'IT Sector', 1200000, 96666, 'Prem singh', 2, '10000', '12000', '2022-11-15', 1, '2.2', '2022-11-15 06:57:41', '2022-11-15 06:57:41'),
(5, 8, 'Test', '2022-02-17', '50y6t', 50000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 06:52:21', '2022-11-24 01:22:21'),
(6, 2, 'Reliance Digital', '2021-07-24', NULL, 500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 06:35:40', '2022-11-24 06:35:40'),
(7, 22, 'Reliance Digital', '2021-06-22', NULL, 20000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 00:20:31', '2022-11-29 00:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abu Dhabi National Oil Company (ADNOC)', 1, '2022-11-29 11:21:05', '2022-11-29 11:21:05', NULL),
(2, 'Abu Dhabi Oil Refining Company (TAKREER)', 1, '2022-11-29 11:21:49', '2022-11-29 11:23:25', NULL),
(3, 'Al Fardan Exchange', 1, '2022-11-29 11:21:58', '2022-11-29 11:21:58', NULL),
(4, 'Apparel Group', 1, '2022-11-29 11:22:05', '2022-11-29 11:22:05', NULL),
(5, 'Cleveland Clinic Abu Dhabi', 1, '2022-11-29 11:22:13', '2022-11-29 11:22:13', NULL),
(6, 'DAMAC Properties', 1, '2022-11-29 11:22:42', '2022-11-29 11:22:42', NULL),
(7, 'DU', 1, '2022-11-29 11:22:49', '2022-11-29 11:22:49', NULL),
(8, 'Dubai Airports', 1, '2022-11-29 11:22:56', '2022-11-29 11:22:56', NULL),
(9, 'Dubai Electricity and Water Authority (DEWA)', 1, '2022-11-29 11:24:00', '2022-11-29 11:24:00', NULL),
(10, 'Dubai Islamic Bank (DIB)', 1, '2022-11-29 11:24:11', '2022-11-29 11:24:11', NULL),
(11, 'Emirates Group', 1, '2022-11-29 11:24:33', '2022-11-29 11:24:33', NULL),
(12, 'Emirates NBD', 1, '2022-11-29 11:24:40', '2022-11-29 11:24:40', NULL),
(13, 'Emirates National Oil Company (ENOC)', 1, '2022-11-29 11:25:07', '2022-11-29 11:25:07', NULL),
(14, 'Etihad Airways', 1, '2022-11-29 11:25:37', '2022-11-29 11:25:37', NULL),
(15, 'Etisalat', 1, '2022-11-29 11:25:44', '2022-11-29 11:25:44', NULL),
(16, 'Jumeirah Group', 1, '2022-11-29 11:25:55', '2022-11-29 11:25:55', NULL),
(17, 'Mashreq Bank', 1, '2022-11-29 11:26:09', '2022-11-29 11:26:09', NULL),
(18, 'National Bank of Abu Dhabi - NBAD', 1, '2022-11-29 11:26:21', '2022-11-29 11:26:21', NULL),
(19, 'Rotana', 1, '2022-11-29 11:26:29', '2022-11-29 11:26:29', NULL),
(20, 'UAE Exchange', 1, '2022-11-29 11:26:36', '2022-11-29 11:26:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `preferred_contact_home` varchar(255) NOT NULL,
  `preferred_contact_business` varchar(255) NOT NULL,
  `preferred_contact_mobile` varchar(255) NOT NULL,
  `reference_mobile_no` varchar(255) NOT NULL,
  `contact_office_tel_no` varchar(255) NOT NULL,
  `contact_extn_no` varchar(255) NOT NULL,
  `contact_mobile_no` varchar(255) NOT NULL,
  `contact_email_id` varchar(255) NOT NULL,
  `contact_official_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `salutation` varchar(30) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `created_at` varchar(30) NOT NULL,
  `updated_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_enquiry`
--

INSERT INTO `contact_enquiry` (`id`, `salutation`, `first_name`, `last_name`, `email`, `phone`, `subject`, `message`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'Navjot', 'Singh', 'warmachine1907@gmail.com', '2545215', 'test', 'test', NULL, '2022-11-28 13:01:29', '2022-11-28 13:01:29'),
(2, 'Mr.', 'Navjot', 'Thakur', 'warmachine1907@gmail.com', '09856767822', 'Test', 'test', NULL, '2022-11-28 13:03:54', '2022-11-28 13:03:54'),
(3, 'Mr.', 'Navjot', 'Thakur', 'warmachine1907@gmail.com', '9856767822', 'test', 'test', '127.0.0.1', '2022-11-28 13:08:53', '2022-11-28 13:08:53'),
(4, 'Mr.', 'Ankit', 'Sharma', 'ankit@shailersoluitions.com', '9415918134', 'Testing Moduls', 'Testing Modiuls', '::1', '2022-12-05 12:57:55', '2022-12-05 12:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `country_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_onboardings`
--

CREATE TABLE `customer_onboardings` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name_as_per_passport` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_expiry_date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `officer_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `have_visa` int(1) NOT NULL DEFAULT 0,
  `visa_sponsor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `years_in_uae` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `reference_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `have_children_in_uae` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salutation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eid_number` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_dependents` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_of_origin` int(11) DEFAULT NULL,
  `consent_form` int(1) NOT NULL DEFAULT 0,
  `cm_type` int(1) DEFAULT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_onboardings`
--

INSERT INTO `customer_onboardings` (`id`, `ref_id`, `user_id`, `first_name_as_per_passport`, `middle_name`, `last_name`, `nationality`, `date_of_birth`, `passport_number`, `passport_expiry_date`, `gender`, `officer_email`, `have_visa`, `visa_sponsor`, `visa_number`, `marital_status`, `years_in_uae`, `reference_number`, `passport_photo`, `nationality_name`, `have_children_in_uae`, `video`, `salutation`, `eid_number`, `no_of_dependents`, `country_of_origin`, `consent_form`, `cm_type`, `created_at`, `updated_at`) VALUES
(2, '13002', 6, 'Navjot', 'Singh', 'Thakur', '229', '0', 'GVSP23e', '2029-11-11', NULL, NULL, 0, NULL, NULL, 'Single', '3', NULL, '0', NULL, NULL, NULL, 'Mr.', '654gg6', NULL, NULL, 0, 1, '2022-11-11 07:49:18', '2022-11-14 04:43:27'),
(3, '13003', 9, 'Supriya', NULL, 'Srivastava', '229', '0', '3543534565757', '2026-05-16', NULL, NULL, 0, 'UK', '7269842424864', 'Single', '2', NULL, '0', 'Inida', NULL, NULL, 'Mr.', '344534534556', NULL, NULL, 0, 3, '2022-11-11 09:15:07', '2022-11-11 09:56:25'),
(4, '13004', 10, 'Prem AAA', 'sjsjdjdj', 'djdjdjdjd', '101', '0', '48585955959k', '2022-11-29', NULL, NULL, 0, 'Ajay pratap', '129089087', 'Single', '2022', NULL, '0', 'India', NULL, NULL, 'Mr', '111111', NULL, NULL, 0, 1, '2022-11-11 11:23:04', '2022-11-15 10:01:48'),
(5, NULL, 13, 'Demo', 'singh', 'www', '101', '0', '123456', '2022-11-29', NULL, NULL, 0, 'premkkkk', '12qwaaws', 'Single', '8', NULL, '0', 'aiakskskew', NULL, NULL, 'Mr', 'djdkjdjr', NULL, NULL, 0, NULL, '2022-11-14 07:27:59', '2022-11-14 07:33:29'),
(6, NULL, 14, 'Priya', 'aaa', 'Sri', '14', '0', '35687546', '2022-11-16', NULL, NULL, 0, 'Teny 2', '346887788', 'Single', '2022', NULL, '0', 'In', NULL, NULL, 'Ms.', '35775677', NULL, NULL, 0, 2, '2022-11-14 07:29:27', '2022-11-14 07:49:30'),
(7, NULL, 15, 'Tina', 'S', 'Sir', '5', '0', '34578865567', '2024-01-31', NULL, NULL, 0, 'Den', '35676456', 'Single', '2023', NULL, '0', 'In', NULL, NULL, 'Ms.', '346766', NULL, NULL, 0, 2, '2022-11-14 07:59:15', '2022-11-14 08:00:51'),
(8, '13008', 16, 'Himanshu', NULL, 'Verma', '229', '0', 'aAFSSS', '2022-11-15', NULL, NULL, 0, 'Some Name', '654444', 'Single', '3', NULL, '0', 'Some Name', NULL, NULL, 'Mr.', 'AFT67776', NULL, NULL, 0, 1, '2022-11-14 08:53:41', '2022-11-14 09:03:00'),
(9, NULL, 17, 'Mansi', 'k', 'kanojiya', '42', '0', '12456', '2022-11-30', NULL, NULL, 0, 'fjfjd', '777777', 'Single', '3', NULL, '0', 'gghggv', NULL, NULL, 'Mrs', '2', NULL, NULL, 0, 3, '2022-11-15 12:43:23', '2022-11-15 12:43:23'),
(10, NULL, 18, 'Prem', 'K', 'Kk', '101', '0', '123455', '2022-11-30', NULL, NULL, 0, 'ejejejej', '11222', 'Married', '2', NULL, '0', 'dkdkkdkd', NULL, NULL, 'Mr', '22', NULL, NULL, 0, 2, '2022-11-15 12:59:03', '2022-11-16 12:32:03'),
(11, '130011', 19, 'prem', 'demo', 'again', '9', '0', '122233', '2022-11-24', NULL, NULL, 0, 'qwwwee', '2838383', 'Single', '2', NULL, '0', 'eoeoe', NULL, NULL, 'Mr', '1233', NULL, NULL, 0, 3, '2022-11-16 12:40:40', '2022-11-17 13:36:06'),
(12, NULL, 20, 'Demo', 'demo', 'demo', '10', '0', '122333', '2022-11-25', NULL, NULL, 0, 'ejjejrjr', '22222', 'Single', '2', NULL, '0', 'ejririr', NULL, NULL, 'Mr', '172727', NULL, NULL, 0, 1, '2022-11-17 05:40:36', '2022-11-17 05:50:29'),
(13, '130013', 21, 'Navjot', NULL, 'Singh', '101', '0', 'GVSP23e', '2028-07-21', NULL, NULL, 0, NULL, NULL, 'Single', '1', NULL, '0', NULL, NULL, NULL, 'Mr.', '654gg6', NULL, NULL, 0, NULL, '2022-11-21 06:31:15', '2022-11-21 06:34:37'),
(14, '130014', 8, 'Navjot', NULL, 'Thakur', 'Indian', '1996-11-23', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Single', '3', NULL, '/uploads/passport_images/481826lnxx.png', NULL, NULL, '/uploads/video/354467blob.mp4', 'Mr.', '4524525444654214', '3', NULL, 1, 1, '2022-11-23 08:38:04', '2022-11-30 13:04:38'),
(15, '130015', 2, 'Super', NULL, 'Admin', 'Indian', '2021-08-24', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Single', '5', NULL, '/uploads/passport_images/47019314015207814-ProtectionLuckEyeNecklaces.jpg', NULL, NULL, '/uploads/video/754630blob', 'Dr.', '4343434433244343', '5', NULL, 1, 1, '2022-11-24 08:17:06', '2022-11-30 06:47:55'),
(16, '130016', 22, 'Navjot', NULL, 'Thakur', 'Indian', '1996-11-23', NULL, NULL, NULL, NULL, 0, NULL, '4155', 'Single', '3', 'test01', '/uploads/passport_images/661235lnxx.png', NULL, NULL, '/uploads/video/146972blob', 'Mr.', '5421542145421542', '4', NULL, 1, 1, '2022-11-29 05:49:28', '2022-11-29 05:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `degination_master`
--

CREATE TABLE `degination_master` (
  `id` int(11) NOT NULL,
  `degination_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education_master`
--

CREATE TABLE `education_master` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent_id` int(11) NOT NULL,
  `is_agent_customer` int(11) NOT NULL DEFAULT 0 COMMENT '0=>customer,1=>agent	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `for_bank_use`
--

CREATE TABLE `for_bank_use` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cif_no` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `source_code` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `primary_card` varchar(255) NOT NULL,
  `supplementary_card` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fts_consent_form`
--

CREATE TABLE `fts_consent_form` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `document_select` int(11) NOT NULL,
  `name_per_document` varchar(255) NOT NULL,
  `no_identity_doc` int(11) NOT NULL,
  `iban_no` int(11) NOT NULL,
  `statement_period` datetime NOT NULL,
  `cm_signature` varchar(255) NOT NULL,
  `cm_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kyc_doc`
--

CREATE TABLE `kyc_doc` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `is_agent_customer` int(1) NOT NULL DEFAULT 0 COMMENT '0=>customer,1=>agent',
  `passport` varchar(255) NOT NULL,
  `visa` varchar(255) NOT NULL,
  `emirates_id` varchar(255) NOT NULL,
  `income_document` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `language_master`
--

CREATE TABLE `language_master` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent_id` int(11) NOT NULL,
  `is_agent_customer` int(11) NOT NULL DEFAULT 0 COMMENT '0=>customer,1=>agent	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `saturation` varchar(11) DEFAULT NULL,
  `name` varchar(121) DEFAULT NULL,
  `email` varchar(121) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `product` varchar(121) DEFAULT NULL,
  `aecb_score` varchar(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `lang_name` varchar(121) DEFAULT NULL,
  `reference` varchar(121) DEFAULT NULL,
  `source` varchar(121) DEFAULT NULL,
  `f_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `alloted_to` int(11) DEFAULT NULL,
  `lead_status` varchar(121) NOT NULL DEFAULT 'OPEN',
  `email_verified` varchar(121) DEFAULT NULL,
  `mobile_verified` varchar(121) DEFAULT NULL,
  `client_ip` varchar(121) DEFAULT NULL,
  `seen_time` timestamp NULL DEFAULT NULL,
  `close_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `saturation`, `name`, `email`, `number`, `product`, `aecb_score`, `dob`, `lang_name`, `reference`, `source`, `f_date`, `note`, `uploaded_by`, `alloted_to`, `lead_status`, `email_verified`, `mobile_verified`, `client_ip`, `seen_time`, `close_time`, `created_at`, `updated_at`) VALUES
(1, 'Ms.', 'Mohammed bin Ali Al Abbar', 'mohammedbinalia@gmail.com', '9710140045', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, 5, 'CLOSE', NULL, NULL, NULL, NULL, '2023-01-03 02:11:29', '2022-12-21 02:42:13', '2022-12-21 03:01:58'),
(2, 'Mr.', 'Ahmad Mohammad Hasher Al Maktoum', 'ahmadmohammad@gmail.com', '9715147785', 'Personal Loan', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, NULL, 'OPEN', NULL, NULL, NULL, NULL, '2022-12-31 02:06:43', '2022-12-21 02:42:13', '2022-12-21 03:01:58'),
(3, 'Mr.', 'Juma al Majid', 'jumaalmajid@gmail.com', '9717146578', 'Mortage Loan', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, NULL, 'OPEN', NULL, NULL, NULL, NULL, '2022-12-31 02:08:39', '2022-12-21 02:42:13', '2022-12-21 03:01:58'),
(4, 'Mr.', 'Ahmed bin Saeed Al Maktoum', 'ahmedbinsaeedal@gmail.com', '9718574188', 'Personal Loan', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, NULL, 'OPEN', NULL, NULL, NULL, NULL, '2022-12-31 02:08:44', '2022-12-21 02:42:13', '2023-01-03 00:55:15'),
(5, 'Mr.', 'Nujoom AlGhanem', 'nujoomalGhanem@gmail.com', '9718545874', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, 32, 'INPROCESS', NULL, NULL, NULL, '2023-01-03 02:00:43', '2022-12-31 02:08:54', '2022-12-21 02:42:13', '2022-12-21 03:01:58'),
(6, 'Mr.', 'Hamdan bin Rashid Al Maktoum', 'hamdanbinrashidal@gmail.com', '9719974874', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, 5, 'OPEN', NULL, NULL, NULL, NULL, '2022-12-31 02:18:43', '2022-12-21 02:42:13', '2022-12-21 03:01:58'),
(23, 'Miss', 'Moinica', 'm@gmail.com', '9415918134', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX12345', 'Socail', NULL, 'NA', 2, 32, 'OPEN', NULL, NULL, NULL, NULL, '2023-01-03 00:03:27', '2022-12-31 05:20:13', '2022-12-31 05:20:13'),
(24, 'Mr.', 'Demo Singh', 'demo@gmail.com', '999999999', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, 5, 'OPEN', NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:40:48', '2023-01-03 01:40:48'),
(25, 'Miss.', 'Demo Sharma', 'demo2@gmail.com', '9999999999', 'Personal Loan', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, NULL, 'OPEN', NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:40:49', '2023-01-03 01:40:49'),
(26, 'Dr.', 'Demo Arora', 'demo2@gmail.com', '999999999', 'House Loan', NULL, '2023-01-10', NULL, 'LNXX1234', 'Social Media', NULL, 'NA', 2, 5, 'OPEN', NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:40:49', '2023-01-03 07:39:11'),
(27, 'Mr.', 'testtest', 'test@gmail.om', '9415918134', 'Credit Card', '652', '2023-01-10', 'Arabic', '32', 'Social Media', NULL, NULL, 32, 32, 'OPEN', NULL, NULL, '::1', NULL, NULL, '2023-01-07 06:10:25', '2023-01-11 06:10:36'),
(28, 'Mr.', 'test test', 'test@gmailc.om', '9415918134', 'Credit Card', '666', '2023-01-10', 'Arabic', '32', 'Social Media', NULL, NULL, 32, 32, 'OPEN', NULL, NULL, '::1', NULL, NULL, '2023-01-07 06:10:31', '2023-01-11 06:10:44'),
(29, NULL, 'asudhush hsuihuisdhq', 'uhiu@hfksdj.dsfh', '+971 9415918134', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX12345', 'FACEBOOK', NULL, 'NA', 2, NULL, 'OPEN', NULL, NULL, NULL, NULL, NULL, '2023-01-06 23:22:07', '2023-01-06 23:22:07'),
(30, 'Mr.', 'sadas asdas', 'sad@dasd.sad', '+971 9451918134', 'Credit Card', NULL, '2023-01-10', NULL, 'LNXX1234', 'FACEBOOK', NULL, 'NA', 2, 5, 'INPROCESS', NULL, NULL, NULL, NULL, NULL, '2023-01-06 23:24:27', '2023-01-06 23:24:27'),
(31, 'Mr.', 'Ankit Kumar Sharma', 'akkilko29@gmail.com', '+971 9415918134', 'Select', NULL, '2023-01-10', NULL, 'LNXX123456', 'FACEBOOK', NULL, 'NA', 2, NULL, 'OPEN', NULL, NULL, NULL, NULL, NULL, '2023-01-10 00:06:48', '2023-01-10 00:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `lead_assign_auto`
--

CREATE TABLE `lead_assign_auto` (
  `id` int(11) NOT NULL,
  `assign_to_id` int(11) DEFAULT NULL,
  `assigned_lead_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_assign_auto`
--

INSERT INTO `lead_assign_auto` (`id`, `assign_to_id`, `assigned_lead_id`) VALUES
(1, 32, 1),
(2, 32, 2),
(3, 32, 3),
(4, 32, 4),
(5, 32, 5),
(6, 32, 6),
(7, 32, 8),
(8, 32, 9),
(9, 32, 10),
(10, 32, 11),
(11, 32, 12),
(12, 32, 13),
(13, 32, 14),
(14, 32, 15),
(15, 32, 16),
(16, 32, 17),
(17, 32, 18),
(18, 32, 19),
(19, 32, 20),
(20, 5, 1),
(21, 32, 2),
(22, 5, 3),
(23, 32, 4),
(24, 5, 5),
(25, 32, 1),
(26, 5, 2),
(27, 32, 3),
(28, 5, 4),
(29, 32, 5),
(30, 5, 6),
(31, 32, 23),
(32, 5, 1),
(33, 32, 5),
(34, 5, 6),
(35, 32, 23),
(36, 5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `lead_auto_distribution_category`
--

CREATE TABLE `lead_auto_distribution_category` (
  `id` int(11) NOT NULL,
  `category` varchar(121) DEFAULT NULL,
  `active_deactive` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_auto_distribution_category`
--

INSERT INTO `lead_auto_distribution_category` (`id`, `category`, `active_deactive`) VALUES
(1, 'By Geographic', 0),
(2, 'By Product Category', 1),
(3, 'By Agent Prefrence', 0),
(4, 'By Language', 0),
(5, 'By Nationality', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_cases`
--

CREATE TABLE `lead_cases` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reason_for_follow_up` varchar(121) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_cases`
--

INSERT INTO `lead_cases` (`id`, `lead_id`, `user_id`, `reason_for_follow_up`, `note`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'Reason 1', 'NA', '2022-12-01', '19:18:00', '2022-12-23 08:18:51', '2022-12-23 08:18:51'),
(2, 5, 2, 'Reason 1', 'Note Test', '2022-12-01', '19:18:00', '2022-12-26 08:18:51', '2022-12-26 08:18:51'),
(3, 5, 2, 'Reason 1', 'Note Test', '2022-12-01', '19:18:00', '2022-12-26 15:18:51', '2022-12-26 15:18:51'),
(4, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:21', '2022-12-31 04:01:21'),
(5, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:24', '2022-12-31 04:01:24'),
(6, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:24', '2022-12-31 04:01:24'),
(7, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:25', '2022-12-31 04:01:25'),
(8, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:26', '2022-12-31 04:01:26'),
(9, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:26', '2022-12-31 04:01:26'),
(10, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:26', '2022-12-31 04:01:26'),
(11, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:26', '2022-12-31 04:01:26'),
(12, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:27', '2022-12-31 04:01:27'),
(13, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:27', '2022-12-31 04:01:27'),
(14, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:27', '2022-12-31 04:01:27'),
(15, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:27', '2022-12-31 04:01:27'),
(16, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:28', '2022-12-31 04:01:28'),
(17, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:28', '2022-12-31 04:01:28'),
(18, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:28', '2022-12-31 04:01:28'),
(19, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:28', '2022-12-31 04:01:28'),
(20, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:01:44', '2022-12-31 04:01:44'),
(21, 11, 2, 'Reason 1', 'Teting', '2022-12-28', '15:05:00', '2022-12-31 04:02:08', '2022-12-31 04:02:08'),
(22, 21, 30, 'Reason 1', 'NA', '2022-12-07', '16:26:00', '2022-12-31 05:25:10', '2022-12-31 05:25:10'),
(23, 21, 30, 'Reason 2', 'Pay slip is required', '2023-01-31', '19:35:00', '2022-12-31 05:33:29', '2022-12-31 05:33:29'),
(24, 21, 30, 'Reason 1', 'I tried to connect with customer on his mobile number but he did\'t responed. How ever when i communcated on email i got response', NULL, NULL, '2022-12-31 05:35:10', '2022-12-31 05:35:10'),
(25, 11, 2, 'Please Select', 'testing', '2023-01-02', '16:22:00', '2023-01-02 05:21:57', '2023-01-02 05:21:57'),
(26, 11, 2, 'Please Select', 'testing', '2023-01-02', '16:22:00', '2023-01-02 05:22:11', '2023-01-02 05:22:11'),
(27, 11, 2, 'Please Select', 'testing', '2023-01-02', '16:22:00', '2023-01-02 05:22:31', '2023-01-02 05:22:31'),
(28, 11, 2, 'Please Select', 'mjm;lkm', '2023-01-02', '16:28:00', '2023-01-02 05:27:35', '2023-01-02 05:27:35'),
(29, 11, 2, 'Please Select', 'dfsdfsdf', '2023-01-02', '16:30:00', '2023-01-02 05:28:22', '2023-01-02 05:28:22'),
(30, 21, 2, 'Please Select', 'Testing', '2023-01-04', '16:30:00', '2023-01-02 05:29:54', '2023-01-02 05:29:54'),
(31, 11, 2, 'Please Select', 'Testing', '2023-01-03', '16:47:00', '2023-01-02 05:45:17', '2023-01-02 05:45:17'),
(32, 1, 2, 'BUSY SOMEWARE', 'Call not picked', '2023-01-04', '15:06:00', '2023-01-03 02:04:06', '2023-01-03 02:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `lead_email_otp`
--

CREATE TABLE `lead_email_otp` (
  `id` int(11) NOT NULL,
  `email` varchar(151) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_email_otp`
--

INSERT INTO `lead_email_otp` (`id`, `email`, `otp`) VALUES
(1, 'akkilko29@gamil.c', 858612),
(2, 'akkilko29@gamil.com', 552329),
(3, 'akkilko29@gamil.co', 139242),
(4, 'akkilko29@gmail.c', 306116),
(5, 'akkilko29@gmail.co', 606557),
(6, 'akkilko29@gmail.com', 529770),
(7, NULL, 712473);

-- --------------------------------------------------------

--
-- Table structure for table `lead_language_master`
--

CREATE TABLE `lead_language_master` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(121) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_language_master`
--

INSERT INTO `lead_language_master` (`id`, `lang_name`, `created_at`, `updated_at`) VALUES
(1, 'Arabic', NULL, NULL),
(2, 'English', NULL, NULL),
(3, 'Hindi', NULL, NULL),
(4, 'All', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_mails`
--

CREATE TABLE `lead_mails` (
  `id` int(11) NOT NULL,
  `to_mail_id` int(11) DEFAULT NULL,
  `mail_to` varchar(351) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `mail` text DEFAULT NULL,
  `send_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_mails`
--

INSERT INTO `lead_mails` (`id`, `to_mail_id`, `mail_to`, `subject`, `mail`, `send_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'akkilko29@gmail.com', NULL, '<p>testing&nbsp;</p>', 2, '2022-12-19 08:13:57', '2022-12-19 08:13:57'),
(2, 11, 'ankit@shailersolutions.com', 'Test Mail', '<p>Testing mail</p>', 2, '2022-12-20 01:29:46', '2022-12-20 01:29:46'),
(3, 1, 'akkilko29@gmail.com', NULL, '<p>tesing</p>', 2, '2022-12-21 02:06:14', '2022-12-21 02:06:14'),
(4, 18, 'akkilko29@gmail.com', NULL, '<p>Testing Mail</p>', 2, '2023-01-02 05:56:44', '2023-01-02 05:56:44'),
(5, NULL, 'rajdeep@facechk.com', NULL, '<p>Dear Rajdeep Sir,&nbsp;</p>\n\n<p>Please read all line properly after that rply me on whatsapp....</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>Why do we use it?</h2>\n\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n\n<p>&nbsp;</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where can I get some?</h2>\n\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, '2023-01-02 06:25:40', '2023-01-02 06:25:40'),
(6, 11, 'test@g.com', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>Why do we use it?</h2>\n\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n\n<p>&nbsp;</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where can I get some?</h2>\n\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, '2023-01-02 06:27:09', '2023-01-02 06:27:09'),
(7, 11, 'test@g.com', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>Why do we use it?</h2>\n\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n\n<p>&nbsp;</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where can I get some?</h2>\n\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, '2023-01-02 06:28:38', '2023-01-02 06:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `lead_mobile_otp`
--

CREATE TABLE `lead_mobile_otp` (
  `id` int(11) NOT NULL,
  `number` varchar(121) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_mobile_otp`
--

INSERT INTO `lead_mobile_otp` (`id`, `number`, `otp`) VALUES
(1, '9415918134', 675538);

-- --------------------------------------------------------

--
-- Table structure for table `lead_regions`
--

CREATE TABLE `lead_regions` (
  `id` int(11) NOT NULL,
  `name` varchar(121) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_regions`
--

INSERT INTO `lead_regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BUSY SOMEWARE', NULL, NULL),
(2, 'NOT RESPONDING', NULL, NULL),
(3, 'NOT REACHABLE', NULL, NULL),
(4, 'SWITCH OFF', NULL, NULL),
(5, 'SCHEDULE A FUTURE APPOINTMENT', NULL, NULL),
(6, 'WORKING', NULL, NULL),
(7, 'MEETING SET', NULL, NULL),
(8, 'OPPORTUNITY CREATED', NULL, NULL),
(9, 'OPPORTUNITY LOST', NULL, NULL),
(10, 'NOT A TARGET', NULL, NULL),
(11, 'NURTURE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_social_form_setting`
--

CREATE TABLE `lead_social_form_setting` (
  `id` int(11) NOT NULL,
  `m_otp` int(11) DEFAULT 0,
  `e_otp` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_social_form_setting`
--

INSERT INTO `lead_social_form_setting` (`id`, `m_otp`, `e_otp`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_source`
--

CREATE TABLE `lead_source` (
  `id` int(11) NOT NULL,
  `name` varchar(121) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_source`
--

INSERT INTO `lead_source` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'FACEBOOK', NULL, NULL),
(2, 'INSTAGRAM', NULL, NULL),
(3, 'LINKEDIN', NULL, NULL),
(4, 'WEB CRM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lnxx_loan_tell_us_business`
--

CREATE TABLE `lnxx_loan_tell_us_business` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `type_of_incorporation` varchar(255) NOT NULL,
  `education_details_id` int(11) NOT NULL,
  `prefer_language_id` int(11) NOT NULL,
  `proprientorship_with_atoroney` varchar(255) NOT NULL,
  `proprientorship_without_atoroney` varchar(255) NOT NULL,
  `free_zone_entity` varchar(255) NOT NULL,
  `partnership` varchar(255) NOT NULL,
  `limited_liability_company` varchar(255) NOT NULL,
  `other_specify` varchar(255) NOT NULL,
  `years_in_businesss` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `owner_details_id` varchar(255) NOT NULL,
  `type_of_business_id` int(11) NOT NULL,
  `partner_details_id` int(11) NOT NULL,
  `number_of_dependents` int(11) NOT NULL,
  `are_confirm_employee` int(1) NOT NULL DEFAULT 0,
  `total_work_exp` varchar(255) NOT NULL,
  `office_contact_company_name` varchar(255) NOT NULL,
  `office_contact_position` varchar(255) NOT NULL,
  `office_contact_doj` datetime NOT NULL,
  `office_contact_salary` float NOT NULL,
  `approx_end_of_service` varchar(255) NOT NULL,
  `amnt_of_other_incm` float NOT NULL,
  `source_of_other_income` float NOT NULL,
  `reference_person_full_name` varchar(255) NOT NULL,
  `reference_person_relation` varchar(255) NOT NULL,
  `reference_person_mobile_no` varchar(255) NOT NULL,
  `reference_person_home_mobile` varchar(255) NOT NULL,
  `reference_person_address` varchar(255) NOT NULL,
  `reference_person_po_box` varchar(25) NOT NULL,
  `business_reference_comp_name` varchar(255) NOT NULL,
  `business_reference_name` varchar(255) NOT NULL,
  `business_reference_designation` varchar(255) NOT NULL,
  `business_reference_relation` varchar(255) NOT NULL,
  `business_reference_contact_no` varchar(255) NOT NULL,
  `business_reference_emirate` varchar(255) NOT NULL,
  `frnd_relative_full_name` varchar(255) NOT NULL,
  `frnd_relative_mobile_no` varchar(255) NOT NULL,
  `frnd_relative_email` varchar(255) NOT NULL,
  `salaried_emp_name` varchar(255) NOT NULL,
  `salaried_doj` datetime NOT NULL,
  `salaried_income` float NOT NULL,
  `salaried_allowance_income` float NOT NULL,
  `salaried_variable_income` float NOT NULL,
  `salaried_total_income` float NOT NULL,
  `self_emp_business_name` varchar(255) NOT NULL,
  `self_emp_date_inception` date NOT NULL,
  `self_emp_owneship` varchar(255) NOT NULL,
  `self_emp_monthly_cash` varchar(255) NOT NULL,
  `self_emp_add_income` float NOT NULL,
  `self_emp_total` float NOT NULL,
  `other_income_specify` varchar(255) NOT NULL,
  `if_have_co-borrow` int(1) NOT NULL DEFAULT 0,
  `requst_finance_amnt` float NOT NULL,
  `duration_at_current_address` varchar(255) NOT NULL,
  `salary_pay_date` date NOT NULL,
  `various_income_detail_id` int(11) NOT NULL,
  `name_contact_uae_id` int(11) NOT NULL,
  `other_income_id` int(11) NOT NULL,
  `if_you_have_coborrower` int(1) NOT NULL DEFAULT 0,
  `financial_details_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `murabaha_account_no` varchar(255) NOT NULL,
  `murabaha_dfm_account_no` varchar(255) NOT NULL,
  `murabaha_adx_account_no` varchar(255) NOT NULL,
  `murabaha_enbds_account_no` varchar(255) NOT NULL,
  `murabaha_current_saving_account` varchar(255) NOT NULL,
  `murabaha_ei_stock_account_number` varchar(255) NOT NULL,
  `certification_murabaha` varchar(255) NOT NULL,
  `request_finance_details_id` int(11) NOT NULL,
  `repayment_detail` varchar(255) NOT NULL,
  `customer_segment_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `type_new_account_id` int(11) NOT NULL,
  `deatils_bank_Account_id` int(11) NOT NULL,
  `details_card_id` int(11) NOT NULL,
  `liabilites_bank_name` varchar(255) NOT NULL,
  `liabilites_facility_type` varchar(255) NOT NULL,
  `liabilites_monthly_amnt` float NOT NULL,
  `liabilites_outstanding_amnt` float NOT NULL,
  `cus_liab_bank_name` varchar(255) NOT NULL,
  `cus_liab_fac_type` varchar(255) NOT NULL,
  `cus_liab_monthly_amnt` float NOT NULL,
  `cus_liab_oustanding_amnt` float NOT NULL,
  `proposed_d_sign` date NOT NULL,
  `proposed_sign` varchar(255) NOT NULL,
  `public_fig_infrm` int(1) NOT NULL DEFAULT 0,
  `individual_tax_res_certificate_id` int(11) NOT NULL,
  `promise_purcahse_schedule_id` int(11) NOT NULL,
  `above_inform_reviewed` int(1) NOT NULL DEFAULT 0,
  `contact_point_cpv_status` int(11) NOT NULL,
  `decline_called_at_residence` varchar(255) NOT NULL,
  `decline_called_at_mobile` varchar(255) NOT NULL,
  `time_of_call` time NOT NULL,
  `submit_name` varchar(255) NOT NULL,
  `submit_signature` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_category`
--

CREATE TABLE `loan_category` (
  `id` int(11) NOT NULL,
  `purpose_of_loan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_master`
--

CREATE TABLE `loan_master` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `interest_rate` float NOT NULL DEFAULT 0,
  `number_of_installments` int(11) NOT NULL,
  `monthly_installment_amount_aed` float NOT NULL DEFAULT 0,
  `processing_fee_aed` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `is_login` int(10) NOT NULL DEFAULT 0,
  `ip` varchar(100) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL,
  `deleted_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `username`, `is_login`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'developers@ccsu.com', 0, '127.0.0.1', '2022-07-15 11:50:18', '2022-07-15 11:50:18', NULL),
(2, NULL, 'developers@ccsu.com', 0, '127.0.0.1', '2022-07-15 11:56:40', '2022-07-15 11:56:40', NULL),
(3, NULL, 'developers@ccsu.com', 0, '127.0.0.1', '2022-07-15 11:56:42', '2022-07-15 11:56:42', NULL),
(4, NULL, 'admin@ez-jobs.co', 0, '127.0.0.1', '2022-07-15 11:58:46', '2022-07-15 11:58:46', NULL),
(5, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-15 11:59:12', '2022-07-15 11:59:12', NULL),
(6, 1, 'admin@ez-job.co', 1, '::1', '2022-07-15 13:17:17', '2022-07-15 13:17:17', NULL),
(7, 1, 'admin@ez-job.co', 1, '::1', '2022-07-15 13:45:55', '2022-07-15 13:45:55', NULL),
(8, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-16 04:40:23', '2022-07-16 04:40:23', NULL),
(9, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-16 11:50:36', '2022-07-16 11:50:36', NULL),
(10, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-16 12:34:24', '2022-07-16 12:34:24', NULL),
(11, 6, NULL, 1, '127.0.0.1', '2022-07-16 12:34:45', '2022-07-16 12:34:45', NULL),
(12, 6, 'navjot@shailersolutions.com', 1, '127.0.0.1', '2022-07-16 12:37:11', '2022-07-16 12:37:11', NULL),
(13, 6, 'navjot@shailersolutions.com', 1, '127.0.0.1', '2022-07-16 12:37:15', '2022-07-16 12:37:15', NULL),
(14, 6, 'navjot@shailersolutions.com', 1, '127.0.0.1', '2022-07-16 12:37:21', '2022-07-16 12:37:21', NULL),
(15, 6, 'navjot@shailersolutions.com', 1, '127.0.0.1', '2022-07-16 12:37:35', '2022-07-16 12:37:35', NULL),
(16, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-16 12:38:34', '2022-07-16 12:38:34', NULL),
(17, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-16 12:58:33', '2022-07-16 12:58:33', NULL),
(18, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-07-16 12:59:18', '2022-07-16 12:59:18', NULL),
(19, NULL, 'warmachine1907@gmail.com', 0, '127.0.0.1', '2022-07-16 12:59:22', '2022-07-16 12:59:22', NULL),
(20, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-16 12:59:24', '2022-07-16 12:59:24', NULL),
(21, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-18 04:39:57', '2022-07-18 04:39:57', NULL),
(22, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-19 12:50:36', '2022-07-19 12:50:36', NULL),
(23, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-20 04:18:07', '2022-07-20 04:18:07', NULL),
(24, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-20 07:48:45', '2022-07-20 07:48:45', NULL),
(25, 1, NULL, 1, '127.0.0.1', '2022-07-20 10:39:02', '2022-07-20 10:39:02', NULL),
(26, 1, NULL, 1, '127.0.0.1', '2022-07-20 10:39:40', '2022-07-20 10:39:40', NULL),
(27, NULL, NULL, 0, '127.0.0.1', '2022-07-20 11:03:34', '2022-07-20 11:03:34', NULL),
(28, 7, NULL, 1, '127.0.0.1', '2022-07-20 11:03:45', '2022-07-20 11:03:45', NULL),
(29, 7, NULL, 1, '127.0.0.1', '2022-07-20 11:14:22', '2022-07-20 11:14:22', NULL),
(30, 7, NULL, 1, '127.0.0.1', '2022-07-20 11:14:51', '2022-07-20 11:14:51', NULL),
(31, NULL, 'warmachine1907@gmail.com', 0, '127.0.0.1', '2022-07-20 13:18:33', '2022-07-20 13:18:33', NULL),
(32, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-20 13:18:44', '2022-07-20 13:18:44', NULL),
(33, 1, NULL, 1, '127.0.0.1', '2022-07-22 04:56:09', '2022-07-22 04:56:09', NULL),
(34, 7, NULL, 1, '127.0.0.1', '2022-07-22 04:56:21', '2022-07-22 04:56:21', NULL),
(35, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-22 05:47:30', '2022-07-22 05:47:30', NULL),
(36, 7, NULL, 1, '127.0.0.1', '2022-07-22 05:49:06', '2022-07-22 05:49:06', NULL),
(37, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-22 05:51:08', '2022-07-22 05:51:08', NULL),
(38, 7, NULL, 1, '127.0.0.1', '2022-07-22 06:00:27', '2022-07-22 06:00:27', NULL),
(39, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-26 05:24:51', '2022-07-26 05:24:51', NULL),
(40, NULL, NULL, 0, '127.0.0.1', '2022-07-26 05:26:00', '2022-07-26 05:26:00', NULL),
(41, NULL, NULL, 0, '127.0.0.1', '2022-07-26 05:26:10', '2022-07-26 05:26:10', NULL),
(42, 8, NULL, 1, '127.0.0.1', '2022-07-26 05:26:23', '2022-07-26 05:26:23', NULL),
(43, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-26 05:42:34', '2022-07-26 05:42:34', NULL),
(44, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-26 07:48:46', '2022-07-26 07:48:46', NULL),
(45, 7, NULL, 1, '127.0.0.1', '2022-07-26 09:42:23', '2022-07-26 09:42:23', NULL),
(46, 8, NULL, 1, '127.0.0.1', '2022-07-27 04:19:18', '2022-07-27 04:19:18', NULL),
(47, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-28 11:42:10', '2022-07-28 11:42:10', NULL),
(48, NULL, 'suppanda@test.com', 0, '127.0.0.1', '2022-07-29 04:24:04', '2022-07-29 04:24:04', NULL),
(49, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-29 04:24:19', '2022-07-29 04:24:19', NULL),
(50, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-29 08:11:22', '2022-07-29 08:11:22', NULL),
(51, 8, NULL, 1, '127.0.0.1', '2022-07-29 09:40:06', '2022-07-29 09:40:06', NULL),
(52, 7, NULL, 1, '127.0.0.1', '2022-07-30 04:57:50', '2022-07-30 04:57:50', NULL),
(53, 8, NULL, 1, '127.0.0.1', '2022-07-30 05:00:08', '2022-07-30 05:00:08', NULL),
(54, NULL, 'suppanda@test.com', 0, '127.0.0.1', '2022-07-30 05:05:47', '2022-07-30 05:05:47', NULL),
(55, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-30 05:05:51', '2022-07-30 05:05:51', NULL),
(56, 8, NULL, 1, '127.0.0.1', '2022-07-30 06:14:06', '2022-07-30 06:14:06', NULL),
(57, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-07-30 07:47:53', '2022-07-30 07:47:53', NULL),
(58, 1, NULL, 1, '127.0.0.1', '2022-07-30 09:38:58', '2022-07-30 09:38:58', NULL),
(59, 7, NULL, 1, '127.0.0.1', '2022-07-30 09:39:37', '2022-07-30 09:39:37', NULL),
(60, 8, NULL, 1, '127.0.0.1', '2022-07-30 09:40:07', '2022-07-30 09:40:07', NULL),
(61, 8, NULL, 1, '127.0.0.1', '2022-08-01 05:15:35', '2022-08-01 05:15:35', NULL),
(62, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-08-01 05:18:27', '2022-08-01 05:18:27', NULL),
(63, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-08-01 11:01:49', '2022-08-01 11:01:49', NULL),
(64, 7, NULL, 1, '127.0.0.1', '2022-08-01 12:29:45', '2022-08-01 12:29:45', NULL),
(65, NULL, NULL, 0, '127.0.0.1', '2022-08-02 07:56:09', '2022-08-02 07:56:09', NULL),
(66, NULL, NULL, 0, '127.0.0.1', '2022-08-02 07:56:20', '2022-08-02 07:56:20', NULL),
(67, 23, NULL, 1, '127.0.0.1', '2022-08-02 07:56:49', '2022-08-02 07:56:49', NULL),
(68, 7, NULL, 1, '127.0.0.1', '2022-08-02 07:57:02', '2022-08-02 07:57:02', NULL),
(69, 7, NULL, 1, '127.0.0.1', '2022-08-02 09:41:34', '2022-08-02 09:41:34', NULL),
(70, 7, NULL, 1, '127.0.0.1', '2022-08-02 12:11:17', '2022-08-02 12:11:17', NULL),
(71, 8, NULL, 1, '127.0.0.1', '2022-08-02 12:11:29', '2022-08-02 12:11:29', NULL),
(72, 8, NULL, 1, '127.0.0.1', '2022-08-02 12:14:26', '2022-08-02 12:14:26', NULL),
(73, 7, NULL, 1, '127.0.0.1', '2022-08-02 12:17:42', '2022-08-02 12:17:42', NULL),
(74, 8, NULL, 1, '127.0.0.1', '2022-08-02 12:24:27', '2022-08-02 12:24:27', NULL),
(75, 7, NULL, 1, '127.0.0.1', '2022-08-02 12:25:27', '2022-08-02 12:25:27', NULL),
(76, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-08-02 12:26:42', '2022-08-02 12:26:42', NULL),
(77, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-08-02 12:35:12', '2022-08-02 12:35:12', NULL),
(78, 1, NULL, 1, '127.0.0.1', '2022-08-03 05:42:17', '2022-08-03 05:42:17', NULL),
(79, 7, NULL, 1, '127.0.0.1', '2022-08-03 05:43:12', '2022-08-03 05:43:12', NULL),
(80, 8, NULL, 1, '127.0.0.1', '2022-08-03 05:43:28', '2022-08-03 05:43:28', NULL),
(81, 8, NULL, 1, '127.0.0.1', '2022-08-03 06:52:31', '2022-08-03 06:52:31', NULL),
(82, 23, NULL, 1, '127.0.0.1', '2022-08-03 07:04:20', '2022-08-03 07:04:20', NULL),
(83, 23, NULL, 1, '127.0.0.1', '2022-08-03 07:04:47', '2022-08-03 07:04:47', NULL),
(84, 23, NULL, 1, '127.0.0.1', '2022-08-03 07:09:04', '2022-08-03 07:09:04', NULL),
(85, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-08-03 07:31:49', '2022-08-03 07:31:49', NULL),
(86, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-08-03 09:36:35', '2022-08-03 09:36:35', NULL),
(87, 7, NULL, 1, '127.0.0.1', '2022-08-03 11:46:22', '2022-08-03 11:46:22', NULL),
(88, 8, NULL, 1, '127.0.0.1', '2022-08-03 11:52:42', '2022-08-03 11:52:42', NULL),
(89, 24, NULL, 1, '159.89.165.84', '2022-08-03 12:58:28', '2022-08-03 12:58:28', NULL),
(90, 26, NULL, 1, '159.89.165.84', '2022-08-03 13:02:08', '2022-08-03 13:02:08', NULL),
(91, 7, NULL, 1, '159.89.165.84', '2022-08-03 13:02:26', '2022-08-03 13:02:26', NULL),
(92, 7, NULL, 1, '159.89.165.84', '2022-08-03 13:04:51', '2022-08-03 13:04:51', NULL),
(93, 7, NULL, 1, '159.89.165.84', '2022-08-03 13:05:05', '2022-08-03 13:05:05', NULL),
(94, 7, NULL, 1, '159.89.165.84', '2022-08-03 13:05:15', '2022-08-03 13:05:15', NULL),
(95, 8, NULL, 1, '159.89.165.84', '2022-08-03 13:05:32', '2022-08-03 13:05:32', NULL),
(96, 8, NULL, 1, '159.89.165.84', '2022-08-04 05:18:32', '2022-08-04 05:18:32', NULL),
(97, 1, 'admin@ez-job.co', 1, '159.89.165.84', '2022-08-04 07:25:30', '2022-08-04 07:25:30', NULL),
(98, 26, NULL, 1, '159.89.165.84', '2022-08-04 07:34:42', '2022-08-04 07:34:42', NULL),
(99, 1, 'admin@ez-job.co', 1, '159.89.165.84', '2022-08-04 07:39:13', '2022-08-04 07:39:13', NULL),
(100, 24, NULL, 1, '159.89.165.84', '2022-08-04 07:41:36', '2022-08-04 07:41:36', NULL),
(101, NULL, 'admin@ez-job.co', 0, '159.89.165.84', '2022-08-04 07:43:18', '2022-08-04 07:43:18', NULL),
(102, 1, 'admin@ez-job.co', 1, '159.89.165.84', '2022-08-04 07:43:49', '2022-08-04 07:43:49', NULL),
(103, 26, NULL, 1, '159.89.165.84', '2022-08-04 07:54:24', '2022-08-04 07:54:24', NULL),
(104, 26, NULL, 1, '159.89.165.84', '2022-08-04 07:54:39', '2022-08-04 07:54:39', NULL),
(105, 1, 'admin@ez-job.co', 1, '159.89.165.84', '2022-08-04 08:24:22', '2022-08-04 08:24:22', NULL),
(106, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-02 13:58:12', '2022-09-02 13:58:12', NULL),
(107, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-03 05:12:56', '2022-09-03 05:12:56', NULL),
(108, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-03 05:14:48', '2022-09-03 05:14:48', NULL),
(109, 7, NULL, 1, '127.0.0.1', '2022-09-03 06:56:18', '2022-09-03 06:56:18', NULL),
(110, 8, NULL, 1, '127.0.0.1', '2022-09-03 06:56:42', '2022-09-03 06:56:42', NULL),
(111, 8, NULL, 1, '127.0.0.1', '2022-09-05 11:34:22', '2022-09-05 11:34:22', NULL),
(112, 8, NULL, 1, '127.0.0.1', '2022-09-06 04:11:06', '2022-09-06 04:11:06', NULL),
(113, 8, NULL, 1, '127.0.0.1', '2022-09-06 11:09:16', '2022-09-06 11:09:16', NULL),
(114, 7, NULL, 1, '127.0.0.1', '2022-09-07 07:36:06', '2022-09-07 07:36:06', NULL),
(115, 7, NULL, 1, '127.0.0.1', '2022-09-07 07:36:13', '2022-09-07 07:36:13', NULL),
(116, 7, NULL, 1, '127.0.0.1', '2022-09-07 12:04:31', '2022-09-07 12:04:31', NULL),
(117, 7, NULL, 1, '127.0.0.1', '2022-09-19 04:58:27', '2022-09-19 04:58:27', NULL),
(118, 8, NULL, 1, '127.0.0.1', '2022-09-19 05:21:20', '2022-09-19 05:21:20', NULL),
(119, 8, NULL, 1, '127.0.0.1', '2022-09-19 05:21:32', '2022-09-19 05:21:32', NULL),
(120, NULL, NULL, 0, '127.0.0.1', '2022-09-19 05:21:36', '2022-09-19 05:21:36', NULL),
(121, 7, NULL, 1, '127.0.0.1', '2022-09-19 05:21:40', '2022-09-19 05:21:40', NULL),
(122, 8, NULL, 1, '127.0.0.1', '2022-09-19 05:21:49', '2022-09-19 05:21:49', NULL),
(123, 7, NULL, 1, '127.0.0.1', '2022-09-19 10:38:10', '2022-09-19 10:38:10', NULL),
(124, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-19 12:57:03', '2022-09-19 12:57:03', NULL),
(125, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-20 07:02:56', '2022-09-20 07:02:56', NULL),
(126, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-20 09:19:45', '2022-09-20 09:19:45', NULL),
(127, 7, NULL, 1, '127.0.0.1', '2022-09-20 10:50:48', '2022-09-20 10:50:48', NULL),
(128, 8, NULL, 1, '127.0.0.1', '2022-09-20 10:50:53', '2022-09-20 10:50:53', NULL),
(129, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-20 12:08:04', '2022-09-20 12:08:04', NULL),
(130, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-20 12:12:48', '2022-09-20 12:12:48', NULL),
(131, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-20 12:18:20', '2022-09-20 12:18:20', NULL),
(132, 1, NULL, 1, '127.0.0.1', '2022-09-21 10:08:48', '2022-09-21 10:08:48', NULL),
(133, 7, NULL, 1, '127.0.0.1', '2022-09-21 10:08:59', '2022-09-21 10:08:59', NULL),
(134, 8, NULL, 1, '127.0.0.1', '2022-09-21 11:46:52', '2022-09-21 11:46:52', NULL),
(135, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-22 05:07:23', '2022-09-22 05:07:23', NULL),
(136, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-26 04:52:44', '2022-09-26 04:52:44', NULL),
(137, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-26 06:02:49', '2022-09-26 06:02:49', NULL),
(138, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-09-26 07:12:53', '2022-09-26 07:12:53', NULL),
(139, 27, NULL, 1, '127.0.0.1', '2022-09-27 09:37:25', '2022-09-27 09:37:25', NULL),
(140, 27, NULL, 1, '127.0.0.1', '2022-10-06 05:37:33', '2022-10-06 05:37:33', NULL),
(141, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-10-06 06:48:18', '2022-10-06 06:48:18', NULL),
(142, 8, NULL, 1, '127.0.0.1', '2022-10-06 07:20:13', '2022-10-06 07:20:13', NULL),
(143, 7, NULL, 1, '127.0.0.1', '2022-10-06 08:17:10', '2022-10-06 08:17:10', NULL),
(144, 7, NULL, 1, '127.0.0.1', '2022-10-06 08:19:07', '2022-10-06 08:19:07', NULL),
(145, 8, NULL, 1, '127.0.0.1', '2022-10-06 11:29:47', '2022-10-06 11:29:47', NULL),
(146, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-10-06 12:23:08', '2022-10-06 12:23:08', NULL),
(147, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-10-10 06:36:33', '2022-10-10 06:36:33', NULL),
(148, 23, NULL, 1, '127.0.0.1', '2022-10-10 12:11:46', '2022-10-10 12:11:46', NULL),
(149, 23, NULL, 1, '127.0.0.1', '2022-10-10 12:14:52', '2022-10-10 12:14:52', NULL),
(150, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-10-11 05:43:50', '2022-10-11 05:43:50', NULL),
(151, 23, NULL, 1, '127.0.0.1', '2022-10-11 06:01:07', '2022-10-11 06:01:07', NULL),
(152, 23, NULL, 1, '127.0.0.1', '2022-10-11 08:07:42', '2022-10-11 08:07:42', NULL),
(153, 1, 'admin@ez-job.co', 1, '127.0.0.1', '2022-10-11 11:52:04', '2022-10-11 11:52:04', NULL),
(154, 7, NULL, 1, '127.0.0.1', '2022-10-17 06:39:10', '2022-10-17 06:39:10', NULL),
(155, 7, NULL, 1, '127.0.0.1', '2022-10-17 06:39:23', '2022-10-17 06:39:23', NULL),
(156, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:00:29', '2022-10-20 07:00:29', NULL),
(157, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:04:39', '2022-10-20 07:04:39', NULL),
(158, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:07:32', '2022-10-20 07:07:32', NULL),
(159, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:09:01', '2022-10-20 07:09:01', NULL),
(160, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:11:30', '2022-10-20 07:11:30', NULL),
(161, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:13:20', '2022-10-20 07:13:20', NULL),
(162, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:21:45', '2022-10-20 07:21:45', NULL),
(163, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:22:46', '2022-10-20 07:22:46', NULL),
(164, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:24:19', '2022-10-20 07:24:19', NULL),
(165, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:24:23', '2022-10-20 07:24:23', NULL),
(166, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:24:26', '2022-10-20 07:24:26', NULL),
(167, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:25:36', '2022-10-20 07:25:36', NULL),
(168, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:25:53', '2022-10-20 07:25:53', NULL),
(169, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:26:00', '2022-10-20 07:26:00', NULL),
(170, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:44:31', '2022-10-20 07:44:31', NULL),
(171, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:44:33', '2022-10-20 07:44:33', NULL),
(172, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 07:44:37', '2022-10-20 07:44:37', NULL),
(173, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 07:47:48', '2022-10-20 07:47:48', NULL),
(174, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 08:08:56', '2022-10-20 08:08:56', NULL),
(175, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 08:09:09', '2022-10-20 08:09:09', NULL),
(176, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 08:09:19', '2022-10-20 08:09:19', NULL),
(177, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 08:09:30', '2022-10-20 08:09:30', NULL),
(178, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 08:29:07', '2022-10-20 08:29:07', NULL),
(179, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 10:39:57', '2022-10-20 10:39:57', NULL),
(180, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-20 11:00:22', '2022-10-20 11:00:22', NULL),
(181, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 11:00:48', '2022-10-20 11:00:48', NULL),
(182, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-10-20 12:51:26', '2022-10-20 12:51:26', NULL),
(183, NULL, 'navjot@shailersolutions.com', 0, '127.0.0.1', '2022-10-27 06:32:11', '2022-10-27 06:32:11', NULL),
(184, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-01 06:24:36', '2022-11-01 06:24:36', NULL),
(185, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-04 04:48:04', '2022-11-04 04:48:04', NULL),
(186, NULL, 'admin@myfamilylocker.com', 0, '127.0.0.1', '2022-11-04 06:26:17', '2022-11-04 06:26:17', NULL),
(187, NULL, 'admin@myfamilylocker.com', 0, '127.0.0.1', '2022-11-04 06:26:27', '2022-11-04 06:26:27', NULL),
(188, NULL, 'admin@myfamilylocker.com', 0, '127.0.0.1', '2022-11-04 06:29:19', '2022-11-04 06:29:19', NULL),
(189, NULL, 'admin@lnxx.com', 0, '127.0.0.1', '2022-11-04 06:29:34', '2022-11-04 06:29:34', NULL),
(190, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-04 06:29:49', '2022-11-04 06:29:49', NULL),
(191, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-04 13:19:24', '2022-11-04 13:19:24', NULL),
(192, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-05 10:26:35', '2022-11-05 10:26:35', NULL),
(193, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-05 10:43:08', '2022-11-05 10:43:08', NULL),
(194, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-05 11:30:35', '2022-11-05 11:30:35', NULL),
(195, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-07 10:52:20', '2022-11-07 10:52:20', NULL),
(196, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-08 05:23:20', '2022-11-08 05:23:20', NULL),
(197, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-08 05:32:08', '2022-11-08 05:32:08', NULL),
(198, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-08 12:04:42', '2022-11-08 12:04:42', NULL),
(199, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-09 12:40:18', '2022-11-09 12:40:18', NULL),
(200, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-10 05:55:55', '2022-11-10 05:55:55', NULL),
(201, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-10 06:29:56', '2022-11-10 06:29:56', NULL),
(202, NULL, 'admin@lnxx.com', 0, '127.0.0.1', '2022-11-11 04:53:34', '2022-11-11 04:53:34', NULL),
(203, NULL, 'admin@lnxx.com', 0, '127.0.0.1', '2022-11-11 04:53:39', '2022-11-11 04:53:39', NULL),
(204, NULL, 'admin@lnxx.com', 0, '127.0.0.1', '2022-11-11 04:54:00', '2022-11-11 04:54:00', NULL),
(205, NULL, 'admin@lnxx.com', 0, '127.0.0.1', '2022-11-11 05:22:24', '2022-11-11 05:22:24', NULL),
(206, NULL, 'admin@lnxx.com', 0, '127.0.0.1', '2022-11-11 05:22:38', '2022-11-11 05:22:38', NULL),
(207, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-11 05:23:07', '2022-11-11 05:23:07', NULL),
(208, 2, 'admin@lnxx.com', 1, '122.161.52.125', '2022-11-11 08:23:11', '2022-11-11 08:23:11', NULL),
(209, 2, 'admin@lnxx.com', 1, '122.161.52.125', '2022-11-11 08:27:35', '2022-11-11 08:27:35', NULL),
(210, 2, 'admin@lnxx.com', 1, '122.161.49.94', '2022-11-14 04:44:53', '2022-11-14 04:44:53', NULL),
(211, 2, 'admin@lnxx.com', 1, '122.161.49.94', '2022-11-14 09:04:04', '2022-11-14 09:04:04', NULL),
(212, NULL, 'admin@gmail.com', 0, '122.161.53.245', '2022-11-19 10:02:35', '2022-11-19 10:02:35', NULL),
(213, NULL, 'admin@lnxx.com', 0, '122.161.53.245', '2022-11-19 10:02:42', '2022-11-19 10:02:42', NULL),
(214, 2, 'admin@lnxx.com', 1, '122.161.53.245', '2022-11-19 10:02:47', '2022-11-19 10:02:47', NULL),
(215, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-21 06:06:25', '2022-11-21 06:06:25', NULL),
(216, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-21 09:59:11', '2022-11-21 09:59:11', NULL),
(217, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-21 12:29:44', '2022-11-21 12:29:44', NULL),
(218, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-22 05:04:52', '2022-11-22 05:04:52', NULL),
(219, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-22 07:40:35', '2022-11-22 07:40:35', NULL),
(220, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-22 08:16:23', '2022-11-22 08:16:23', NULL),
(221, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-22 08:17:24', '2022-11-22 08:17:24', NULL),
(222, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-22 11:22:54', '2022-11-22 11:22:54', NULL),
(223, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-22 13:08:56', '2022-11-22 13:08:56', NULL),
(224, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-23 12:53:35', '2022-11-23 12:53:35', NULL),
(225, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-24 08:14:51', '2022-11-24 08:14:51', NULL),
(226, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-28 04:48:26', '2022-11-28 04:48:26', NULL),
(227, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-29 05:25:09', '2022-11-29 05:25:09', NULL),
(228, 2, 'admin@lnxx.com', 1, '127.0.0.1', '2022-11-29 11:02:28', '2022-11-29 11:02:28', NULL),
(229, 2, 'admin@lnxx.com', 1, '::1', '2022-12-01 06:02:56', '2022-12-01 06:02:56', NULL),
(230, 2, 'admin@lnxx.com', 1, '::1', '2022-12-01 06:13:55', '2022-12-01 06:13:55', NULL),
(231, NULL, 'admin@myfamilylocker.com', 0, '::1', '2022-12-01 06:14:06', '2022-12-01 06:14:06', NULL),
(232, 2, 'admin@lnxx.com', 1, '::1', '2022-12-01 06:18:58', '2022-12-01 06:18:58', NULL),
(233, 2, 'admin@lnxx.com', 1, '::1', '2022-12-01 12:56:19', '2022-12-01 12:56:19', NULL),
(234, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 12:58:28', '2022-12-01 12:58:28', NULL),
(235, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 12:58:57', '2022-12-01 12:58:57', NULL),
(236, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 13:03:24', '2022-12-01 13:03:24', NULL),
(237, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 13:03:34', '2022-12-01 13:03:34', NULL),
(238, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 13:06:22', '2022-12-01 13:06:22', NULL),
(239, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 13:07:08', '2022-12-01 13:07:08', NULL),
(240, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-01 13:08:08', '2022-12-01 13:08:08', NULL),
(241, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-01 13:26:10', '2022-12-01 13:26:10', NULL),
(242, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-01 13:26:30', '2022-12-01 13:26:30', NULL),
(243, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-02 05:14:08', '2022-12-02 05:14:08', NULL),
(244, NULL, 'admin@lnxx.com', 0, '::1', '2022-12-02 05:14:24', '2022-12-02 05:14:24', NULL),
(245, NULL, 'admin@lnxx.com', 0, '::1', '2022-12-02 05:14:36', '2022-12-02 05:14:36', NULL),
(246, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 05:14:50', '2022-12-02 05:14:50', NULL),
(247, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-02 05:41:41', '2022-12-02 05:41:41', NULL),
(248, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 05:42:00', '2022-12-02 05:42:00', NULL),
(249, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 06:15:11', '2022-12-02 06:15:11', NULL),
(250, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 06:18:38', '2022-12-02 06:18:38', NULL),
(251, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 07:07:57', '2022-12-02 07:07:57', NULL),
(252, 2, 'admin@lnxx.com', 1, '::1', '2022-12-02 07:36:12', '2022-12-02 07:36:12', NULL),
(253, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 11:47:56', '2022-12-02 11:47:56', NULL),
(254, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 11:56:38', '2022-12-02 11:56:38', NULL),
(255, 2, 'admin@lnxx.com', 1, '::1', '2022-12-02 13:02:28', '2022-12-02 13:02:28', NULL),
(256, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-02 13:05:16', '2022-12-02 13:05:16', NULL),
(257, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-02 13:05:25', '2022-12-02 13:05:25', NULL),
(258, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-02 13:06:12', '2022-12-02 13:06:12', NULL),
(259, 2, 'admin@lnxx.com', 1, '::1', '2022-12-03 05:09:22', '2022-12-03 05:09:22', NULL),
(260, 2, 'admin@lnxx.com', 1, '::1', '2022-12-05 12:58:28', '2022-12-05 12:58:28', NULL),
(261, 2, 'admin@lnxx.com', 1, '::1', '2022-12-06 05:11:06', '2022-12-06 05:11:06', NULL),
(262, 2, 'admin@lnxx.com', 1, '::1', '2022-12-06 07:10:29', '2022-12-06 07:10:29', NULL),
(263, NULL, 'ankit@shailersolutios.com', 0, '::1', '2022-12-06 08:16:33', '2022-12-06 08:16:33', NULL),
(264, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-06 08:17:07', '2022-12-06 08:17:07', NULL),
(265, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-06 08:18:39', '2022-12-06 08:18:39', NULL),
(266, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-06 09:37:25', '2022-12-06 09:37:25', NULL),
(267, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-06 11:44:28', '2022-12-06 11:44:28', NULL),
(268, NULL, 'ankit@shailersolution.com', 0, '::1', '2022-12-06 13:22:47', '2022-12-06 13:22:47', NULL),
(269, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-06 13:23:00', '2022-12-06 13:23:00', NULL),
(270, 2, 'admin@lnxx.com', 1, '::1', '2022-12-07 05:09:19', '2022-12-07 05:09:19', NULL),
(271, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-07 05:09:37', '2022-12-07 05:09:37', NULL),
(272, 2, 'admin@lnxx.com', 1, '::1', '2022-12-08 05:05:20', '2022-12-08 05:05:20', NULL),
(273, 2, 'admin@lnxx.com', 1, '::1', '2022-12-09 04:58:51', '2022-12-09 04:58:51', NULL),
(274, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-09 05:40:53', '2022-12-09 05:40:53', NULL),
(275, 2, 'admin@lnxx.com', 1, '::1', '2022-12-09 10:31:34', '2022-12-09 10:31:34', NULL),
(276, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 06:37:40', '2022-12-14 06:37:40', NULL),
(277, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 06:38:37', '2022-12-14 06:38:37', NULL),
(278, NULL, 'agent@gmnail.com', 0, '::1', '2022-12-14 06:38:53', '2022-12-14 06:38:53', NULL),
(279, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 06:42:31', '2022-12-14 06:42:31', NULL),
(280, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 06:44:10', '2022-12-14 06:44:10', NULL),
(281, NULL, 'jgahsd@HJQhghjgs.kasuhdiuas', 0, '::1', '2022-12-14 07:08:21', '2022-12-14 07:08:21', NULL),
(282, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 07:08:44', '2022-12-14 07:08:44', NULL),
(283, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-14 07:17:28', '2022-12-14 07:17:28', NULL),
(284, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-14 07:30:01', '2022-12-14 07:30:01', NULL),
(285, 2, 'admin@lnxx.com', 1, '::1', '2022-12-14 11:17:29', '2022-12-14 11:17:29', NULL),
(286, 2, 'admin@lnxx.com', 1, '::1', '2022-12-14 11:18:05', '2022-12-14 11:18:05', NULL),
(287, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-14 11:22:25', '2022-12-14 11:22:25', NULL),
(288, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 11:22:59', '2022-12-14 11:22:59', NULL),
(289, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-14 11:23:29', '2022-12-14 11:23:29', NULL),
(290, NULL, 'admin@lnxx.com', 0, '::1', '2022-12-14 11:59:44', '2022-12-14 11:59:44', NULL),
(291, 2, 'admin@lnxx.com', 1, '::1', '2022-12-14 12:00:01', '2022-12-14 12:00:01', NULL),
(292, NULL, 'ankit@shaliersolutions.com', 0, '::1', '2022-12-14 12:27:31', '2022-12-14 12:27:31', NULL),
(293, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-14 12:27:51', '2022-12-14 12:27:51', NULL),
(294, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-14 12:28:10', '2022-12-14 12:28:10', NULL),
(295, 2, 'admin@lnxx.com', 1, '::1', '2022-12-15 04:56:24', '2022-12-15 04:56:24', NULL),
(296, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-15 07:17:22', '2022-12-15 07:17:22', NULL),
(297, 2, 'admin@lnxx.com', 1, '::1', '2022-12-15 11:51:06', '2022-12-15 11:51:06', NULL),
(298, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-15 12:00:59', '2022-12-15 12:00:59', NULL),
(299, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-15 12:01:15', '2022-12-15 12:01:15', NULL),
(300, 2, 'admin@lnxx.com', 1, '::1', '2022-12-15 12:06:27', '2022-12-15 12:06:27', NULL),
(301, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-15 12:48:57', '2022-12-15 12:48:57', NULL),
(302, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-15 13:43:57', '2022-12-15 13:43:57', NULL),
(303, 2, 'admin@lnxx.com', 1, '::1', '2022-12-16 05:25:20', '2022-12-16 05:25:20', NULL),
(304, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-16 09:29:44', '2022-12-16 09:29:44', NULL),
(305, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-16 09:30:29', '2022-12-16 09:30:29', NULL),
(306, 31, 'ankit@shailersolutions.com', 1, '::1', '2022-12-16 09:31:11', '2022-12-16 09:31:11', NULL),
(307, 31, 'ankit@samtech.com', 1, '::1', '2022-12-16 09:55:40', '2022-12-16 09:55:40', NULL),
(308, 2, 'admin@lnxx.com', 1, '::1', '2022-12-16 10:10:11', '2022-12-16 10:10:11', NULL),
(309, 2, 'admin@lnxx.com', 1, '::1', '2022-12-17 05:08:09', '2022-12-17 05:08:09', NULL),
(310, NULL, 'ankit@samtech.com', 0, '::1', '2022-12-17 05:27:18', '2022-12-17 05:27:18', NULL),
(311, 31, 'ankit@samtech.com', 1, '::1', '2022-12-17 05:27:39', '2022-12-17 05:27:39', NULL),
(312, NULL, 'ankit@samtech.com', 0, '::1', '2022-12-17 08:10:49', '2022-12-17 08:10:49', NULL),
(313, 31, 'ankit@samtech.com', 1, '::1', '2022-12-17 08:11:10', '2022-12-17 08:11:10', NULL),
(314, 31, 'ankit@samtech.com', 1, '::1', '2022-12-17 08:28:45', '2022-12-17 08:28:45', NULL),
(315, 2, 'admin@lnxx.com', 1, '::1', '2022-12-19 04:51:23', '2022-12-19 04:51:23', NULL),
(316, 2, 'admin@lnxx.com', 1, '::1', '2022-12-20 05:15:35', '2022-12-20 05:15:35', NULL),
(317, NULL, 'ankit@samtech.com', 0, '::1', '2022-12-20 06:55:42', '2022-12-20 06:55:42', NULL),
(318, 2, 'admin@lnxx.com', 1, '::1', '2022-12-21 04:14:13', '2022-12-21 04:14:13', NULL),
(319, 31, 'ankit@samtech.com', 1, '::1', '2022-12-21 10:13:01', '2022-12-21 10:13:01', NULL),
(320, NULL, 'ankit@samtech.com', 0, '::1', '2022-12-21 10:13:23', '2022-12-21 10:13:23', NULL),
(321, 31, 'ankit@samtech.com', 1, '::1', '2022-12-21 10:13:38', '2022-12-21 10:13:38', NULL),
(322, NULL, 'admin@lnxx.com', 0, '::1', '2022-12-22 05:43:55', '2022-12-22 05:43:55', NULL),
(323, 2, 'admin@lnxx.com', 1, '::1', '2022-12-22 05:44:12', '2022-12-22 05:44:12', NULL),
(324, 31, 'ankit@samtech.com', 1, '::1', '2022-12-22 05:58:29', '2022-12-22 05:58:29', NULL),
(325, 32, 'agent@lnxx.com', 1, '::1', '2022-12-22 12:16:57', '2022-12-22 12:16:57', NULL),
(326, NULL, 'agent@lnxx.com', 0, '::1', '2022-12-22 12:17:57', '2022-12-22 12:17:57', NULL),
(327, NULL, 'agnet@lnxx.com', 0, '::1', '2022-12-22 12:18:11', '2022-12-22 12:18:11', NULL),
(328, 32, 'agent@lnxx.com', 1, '::1', '2022-12-22 12:18:26', '2022-12-22 12:18:26', NULL),
(329, 31, 'ankit@samtech.com', 1, '::1', '2022-12-22 13:32:27', '2022-12-22 13:32:27', NULL),
(330, 32, 'agent@lnxx.com', 1, '::1', '2022-12-22 13:36:11', '2022-12-22 13:36:11', NULL),
(331, 2, 'admin@lnxx.com', 1, '::1', '2022-12-23 08:05:47', '2022-12-23 08:05:47', NULL),
(332, 2, 'admin@lnxx.com', 1, '::1', '2022-12-23 08:16:08', '2022-12-23 08:16:08', NULL),
(333, 2, 'admin@lnxx.com', 1, '::1', '2022-12-23 11:40:38', '2022-12-23 11:40:38', NULL),
(334, 2, 'admin@lnxx.com', 1, '::1', '2022-12-26 04:31:13', '2022-12-26 04:31:13', NULL),
(335, 2, 'admin@lnxx.com', 1, '::1', '2022-12-26 09:35:32', '2022-12-26 09:35:32', NULL),
(336, NULL, 'employee@lnxx.com', 0, '::1', '2022-12-26 12:49:06', '2022-12-26 12:49:06', NULL),
(337, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-26 12:49:23', '2022-12-26 12:49:23', NULL),
(338, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-26 12:49:37', '2022-12-26 12:49:37', NULL),
(339, 32, 'agent@lnxx.com', 1, '::1', '2022-12-26 12:49:58', '2022-12-26 12:49:58', NULL),
(340, 2, 'admin@lnxx.com', 1, '::1', '2022-12-27 04:22:39', '2022-12-27 04:22:39', NULL),
(341, NULL, 'ankit@shailersolutions.com', 0, '::1', '2022-12-27 04:29:21', '2022-12-27 04:29:21', NULL),
(342, 31, 'ankit@samtech.com', 1, '::1', '2022-12-27 04:29:37', '2022-12-27 04:29:37', NULL),
(343, 2, 'admin@lnxx.com', 1, '::1', '2022-12-27 13:36:37', '2022-12-27 13:36:37', NULL),
(344, NULL, 'admin@gmail.com', 0, '::1', '2022-12-28 04:15:44', '2022-12-28 04:15:44', NULL),
(345, 2, 'admin@lnxx.com', 1, '::1', '2022-12-28 04:18:23', '2022-12-28 04:18:23', NULL),
(346, 32, 'agent@lnxx.com', 1, '::1', '2022-12-28 05:08:11', '2022-12-28 05:08:11', NULL),
(347, 2, 'admin@lnxx.com', 1, '::1', '2022-12-28 05:29:36', '2022-12-28 05:29:36', NULL),
(348, 2, 'admin@lnxx.com', 1, '::1', '2022-12-29 04:19:27', '2022-12-29 04:19:27', NULL),
(349, 31, 'ankit@samtech.com', 1, '::1', '2022-12-29 11:17:32', '2022-12-29 11:17:32', NULL),
(350, 2, 'admin@lnxx.com', 1, '::1', '2022-12-30 04:32:43', '2022-12-30 04:32:43', NULL),
(351, NULL, 'manager@lnxx.com', 0, '::1', '2022-12-30 10:08:13', '2022-12-30 10:08:13', NULL),
(352, 35, 'manager@lnxx.com', 1, '::1', '2022-12-30 10:09:31', '2022-12-30 10:09:31', NULL),
(353, 35, 'manager@lnxx.com', 1, '::1', '2022-12-30 10:12:54', '2022-12-30 10:12:54', NULL),
(354, 35, 'manager@lnxx.com', 1, '::1', '2022-12-30 10:17:24', '2022-12-30 10:17:24', NULL),
(355, 32, 'agent@lnxx.com', 1, '::1', '2022-12-30 11:13:05', '2022-12-30 11:13:05', NULL),
(356, 2, 'admin@lnxx.com', 1, '::1', '2022-12-30 11:50:04', '2022-12-30 11:50:04', NULL),
(357, 35, 'manager@lnxx.com', 1, '::1', '2022-12-30 12:22:20', '2022-12-30 12:22:20', NULL),
(358, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 04:54:36', '2022-12-31 04:54:36', NULL),
(359, 32, 'agent@lnxx.com', 1, '::1', '2022-12-31 05:04:59', '2022-12-31 05:04:59', NULL),
(360, 35, 'manager@lnxx.com', 1, '::1', '2022-12-31 05:07:45', '2022-12-31 05:07:45', NULL),
(361, 32, 'agent@lnxx.com', 1, '::1', '2022-12-31 05:52:37', '2022-12-31 05:52:37', NULL),
(362, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 06:51:57', '2022-12-31 06:51:57', NULL),
(363, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 09:44:23', '2022-12-31 09:44:23', NULL),
(364, NULL, 'manger@lnxx.com', 0, '::1', '2022-12-31 09:45:59', '2022-12-31 09:45:59', NULL),
(365, NULL, 'manager@lnxx.com', 0, '::1', '2022-12-31 09:46:12', '2022-12-31 09:46:12', NULL),
(366, 35, 'manager@lnxx.com', 1, '::1', '2022-12-31 09:46:33', '2022-12-31 09:46:33', NULL),
(367, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 10:16:23', '2022-12-31 10:16:23', NULL),
(368, NULL, 'employee@lnxx.com', 0, '::1', '2022-12-31 10:37:39', '2022-12-31 10:37:39', NULL),
(369, NULL, 'ankit@smtech.com', 0, '::1', '2022-12-31 10:37:55', '2022-12-31 10:37:55', NULL),
(370, NULL, 'employee@lnxx.com', 0, '::1', '2022-12-31 10:38:15', '2022-12-31 10:38:15', NULL),
(371, NULL, 'employee@lnxx.com', 0, '::1', '2022-12-31 10:38:49', '2022-12-31 10:38:49', NULL),
(372, NULL, 'employee@lnxx.com', 0, '::1', '2022-12-31 10:39:37', '2022-12-31 10:39:37', NULL),
(373, 30, 'employee@lnxx.com', 1, '::1', '2022-12-31 10:40:32', '2022-12-31 10:40:32', NULL),
(374, 35, 'manager@lnxx.com', 1, '::1', '2022-12-31 10:41:22', '2022-12-31 10:41:22', NULL),
(375, 32, 'agent@lnxx.com', 1, '::1', '2022-12-31 10:42:11', '2022-12-31 10:42:11', NULL),
(376, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 10:45:08', '2022-12-31 10:45:08', NULL),
(377, NULL, 'employee@lnxx.com', 0, '::1', '2022-12-31 10:53:20', '2022-12-31 10:53:20', NULL),
(378, 30, 'employee@lnxx.com', 1, '::1', '2022-12-31 10:53:50', '2022-12-31 10:53:50', NULL),
(379, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 11:10:24', '2022-12-31 11:10:24', NULL),
(380, 2, 'admin@lnxx.com', 1, '::1', '2022-12-31 11:45:50', '2022-12-31 11:45:50', NULL),
(381, 2, 'admin@lnxx.com', 1, '::1', '2023-01-02 04:40:57', '2023-01-02 04:40:57', NULL),
(382, 2, 'admin@lnxx.com', 1, '::1', '2023-01-02 04:46:27', '2023-01-02 04:46:27', NULL),
(383, NULL, 'admin@lnxx.com', 0, '::1', '2023-01-03 04:33:06', '2023-01-03 04:33:06', NULL),
(384, NULL, 'admin@lnxx.com', 0, '::1', '2023-01-03 04:33:22', '2023-01-03 04:33:22', NULL),
(385, 2, 'admin@lnxx.com', 1, '::1', '2023-01-03 04:33:40', '2023-01-03 04:33:40', NULL),
(386, 2, 'admin@lnxx.com', 1, '::1', '2023-01-03 04:35:25', '2023-01-03 04:35:25', NULL),
(387, 32, 'agent@lnxx.com', 1, '::1', '2023-01-03 06:14:43', '2023-01-03 06:14:43', NULL),
(388, 2, 'admin@lnxx.com', 1, '::1', '2023-01-03 12:49:57', '2023-01-03 12:49:57', NULL),
(389, NULL, 'admin@lnxx.com', 0, '::1', '2023-01-04 05:10:10', '2023-01-04 05:10:10', NULL),
(390, 2, 'admin@lnxx.com', 1, '::1', '2023-01-04 05:10:27', '2023-01-04 05:10:27', NULL),
(391, 2, 'admin@lnxx.com', 1, '::1', '2023-01-04 09:54:16', '2023-01-04 09:54:16', NULL),
(392, 2, 'admin@lnxx.com', 1, '::1', '2023-01-05 04:44:20', '2023-01-05 04:44:20', NULL),
(393, 2, 'admin@lnxx.com', 1, '::1', '2023-01-05 10:53:32', '2023-01-05 10:53:32', NULL),
(394, 2, 'admin@lnxx.com', 1, '::1', '2023-01-06 06:16:51', '2023-01-06 06:16:51', NULL),
(395, 2, 'admin@lnxx.com', 1, '::1', '2023-01-06 08:02:21', '2023-01-06 08:02:21', NULL),
(396, NULL, 'agent@lnxx.com', 0, '::1', '2023-01-06 13:36:56', '2023-01-06 13:36:56', NULL),
(397, 32, 'agent@lnxx.com', 1, '::1', '2023-01-06 13:37:10', '2023-01-06 13:37:10', NULL),
(398, 2, 'admin@lnxx.com', 1, '::1', '2023-01-06 13:49:28', '2023-01-06 13:49:28', NULL),
(399, 2, 'admin@lnxx.com', 1, '::1', '2023-01-06 14:19:32', '2023-01-06 14:19:32', NULL),
(400, 2, 'admin@lnxx.com', 1, '::1', '2023-01-07 04:36:13', '2023-01-07 04:36:13', NULL),
(401, 2, 'admin@lnxx.com', 1, '::1', '2023-01-09 07:03:30', '2023-01-09 07:03:30', NULL),
(402, 2, 'admin@lnxx.com', 1, '::1', '2023-01-09 12:07:28', '2023-01-09 12:07:28', NULL),
(403, NULL, 'admin@lnxx.com', 0, '::1', '2023-01-10 05:08:53', '2023-01-10 05:08:53', NULL),
(404, 2, 'admin@lnxx.com', 1, '::1', '2023-01-10 05:09:13', '2023-01-10 05:09:13', NULL),
(405, 2, 'admin@lnxx.com', 1, '::1', '2023-01-10 05:25:43', '2023-01-10 05:25:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_nationality_holder`
--

CREATE TABLE `multiple_nationality_holder` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_cm_details`
--

CREATE TABLE `other_cm_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `monthly_pension` varchar(255) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_cm_details`
--

INSERT INTO `other_cm_details` (`id`, `customer_id`, `monthly_pension`, `created_at`, `updated_at`) VALUES
(1, 6, 'IT', '2022-11-08 11:55:42', '2022-11-09 07:41:27'),
(2, 10, 'IT Industry', '2022-11-14 04:33:41', '2022-11-14 05:15:05'),
(3, 17, 'aaaa', '2022-11-15 12:43:52', '2022-11-15 12:43:52'),
(4, 18, 'ppppp', '2022-11-16 09:51:53', '2022-11-16 09:51:53'),
(5, 19, 'Prem Freelancer', '2022-11-16 12:41:05', '2022-11-16 12:41:05'),
(6, 20, 'wiwiwiei', '2022-11-17 05:40:58', '2022-11-17 05:42:30'),
(7, 8, '50000', '2022-11-23 12:16:17', '2022-11-23 12:16:17'),
(8, 2, '500000', '2022-11-24 08:17:13', '2022-11-24 08:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `partner_details`
--

CREATE TABLE `partner_details` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `passport_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_registers`
--

CREATE TABLE `pre_registers` (
  `id` int(11) NOT NULL,
  `salutation` varchar(30) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `mobile` varchar(14) NOT NULL,
  `mobile_otp` int(6) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `email_otp` int(6) DEFAULT NULL,
  `mobile_status` int(1) NOT NULL DEFAULT 0,
  `email_status` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL,
  `deleted_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pre_registers`
--

INSERT INTO `pre_registers` (`id`, `salutation`, `name`, `mobile`, `mobile_otp`, `email`, `email_otp`, `mobile_status`, `email_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, NULL, NULL, '9815330449', 823365, 'navjot@shailersolutions.com', 556721, 1, 1, '2022-10-28 10:53:21', '2022-10-28 12:47:35', NULL),
(4, NULL, NULL, '8765654323', 899220, NULL, NULL, 1, 0, '2022-10-28 13:19:04', '2022-10-28 13:19:37', NULL),
(5, NULL, NULL, '7905957', 814213, 'prem@gmail.com', 461793, 1, 1, '2022-11-11 11:21:17', '2022-11-11 11:22:05', NULL),
(6, NULL, NULL, '9876545', 500020, 'sup16@gmail.com', 929765, 1, 1, '2022-11-14 06:30:03', '2022-11-14 06:30:44', NULL),
(7, NULL, NULL, '9898989', 553611, NULL, NULL, 0, 0, '2022-11-14 06:35:37', '2022-11-14 06:35:37', NULL),
(8, NULL, NULL, '9898989', 388001, 'p@gmail.com', 216805, 1, 1, '2022-11-14 06:35:46', '2022-11-14 06:36:10', NULL),
(9, NULL, NULL, '9873324', 305046, 'priya12@gmil.com', 603063, 1, 0, '2022-11-14 07:15:26', '2022-11-14 07:16:00', NULL),
(10, NULL, NULL, '9875552', 409801, 'priya12@gmail.com', 219114, 1, 1, '2022-11-14 07:17:49', '2022-11-14 07:18:24', NULL),
(11, NULL, NULL, '9875243', 462457, 'tina@gmail.com', 152663, 1, 1, '2022-11-14 07:56:48', '2022-11-14 07:57:19', NULL),
(12, NULL, NULL, '9845623', 124117, 'preetixc@gmail.com', 408015, 1, 1, '2022-11-14 08:32:05', '2022-11-14 08:34:39', NULL),
(13, NULL, NULL, '7418529', 774808, 'prem1@gmail.com', 337293, 1, 1, '2022-11-15 12:34:26', '2022-11-15 12:34:53', NULL),
(14, NULL, NULL, '7905950', 829525, 'ppp@gmail.com', 225220, 1, 1, '2022-11-15 12:56:28', '2022-11-15 12:56:48', NULL),
(15, NULL, NULL, '1111111', 979706, 'p1@gmail.com', 908213, 1, 1, '2022-11-16 12:34:50', '2022-11-16 12:35:16', NULL),
(16, NULL, NULL, '2222222', 259258, 'p2@gmail.com', 201031, 1, 1, '2022-11-17 05:37:26', '2022-11-17 05:37:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_requests`
--

CREATE TABLE `product_requests` (
  `id` int(11) NOT NULL,
  `credit_card_limit` varchar(11) DEFAULT NULL,
  `details_of_cards` varchar(100) DEFAULT NULL,
  `credit_bank_name` varchar(100) DEFAULT NULL,
  `card_limit` varchar(11) DEFAULT NULL,
  `loan_amount` varchar(11) DEFAULT NULL,
  `loan_bank_name` varchar(60) DEFAULT NULL,
  `original_loan_amount` varchar(11) DEFAULT NULL,
  `business_loan_amount` varchar(11) DEFAULT NULL,
  `mortgage_loan_amount` varchar(11) DEFAULT NULL,
  `purchase_price` varchar(11) DEFAULT NULL,
  `type_of_loan` varchar(100) DEFAULT NULL,
  `term_of_loan` varchar(100) DEFAULT NULL,
  `end_use_of_property` varchar(60) DEFAULT NULL,
  `interest_rate` varchar(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_requests`
--

INSERT INTO `product_requests` (`id`, `credit_card_limit`, `details_of_cards`, `credit_bank_name`, `card_limit`, `loan_amount`, `loan_bank_name`, `original_loan_amount`, `business_loan_amount`, `mortgage_loan_amount`, `purchase_price`, `type_of_loan`, `term_of_loan`, `end_use_of_property`, `interest_rate`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '50000', 'Credit Card', 'Yes Bank', '30000', '100000', NULL, NULL, NULL, NULL, NULL, 'Primary Sale', NULL, 'Self use', NULL, 8, '2022-11-24 05:57:16', '2022-11-24 05:57:16'),
(2, '50000', 'Credit Card', 'Yes Bank', '30000', '100000', NULL, NULL, '50000', NULL, NULL, 'Primary Sale', NULL, 'Self use', NULL, 2, '2022-11-24 08:16:04', '2022-11-24 12:06:24'),
(3, '50000', 'Credit Card', 'Yes Bank', '30000', NULL, NULL, NULL, '500000', NULL, NULL, NULL, NULL, NULL, NULL, 22, '2022-11-29 05:53:46', '2022-11-29 05:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `reference_in_use`
--

CREATE TABLE `reference_in_use` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reference_name` varchar(255) NOT NULL,
  `reference_company_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `relation_manager_employee`
--

CREATE TABLE `relation_manager_employee` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relation_manager_employee`
--

INSERT INTO `relation_manager_employee` (`id`, `manager_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 35, 31, NULL, NULL),
(2, 35, 30, NULL, NULL),
(3, 31, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `residency_self_certificate`
--

CREATE TABLE `residency_self_certificate` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `is_agent_customer` int(11) NOT NULL COMMENT '0=>customer,1=>agent',
  `is_us_citizen` int(1) NOT NULL DEFAULT 0,
  `city_of_birth` varchar(255) NOT NULL,
  `country_of_birth` varchar(255) NOT NULL,
  `cm_signature` varchar(255) NOT NULL,
  `cm_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `security_cheque`
--

CREATE TABLE `security_cheque` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `security_amt` float NOT NULL,
  `signature` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `self_emp_details`
--

CREATE TABLE `self_emp_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `self_company_name` varchar(255) NOT NULL,
  `percentage_ownership` varchar(255) DEFAULT NULL,
  `profession_business` varchar(255) DEFAULT NULL,
  `annual_business_income` varchar(20) DEFAULT NULL,
  `annual_gross_expenses` varchar(20) DEFAULT NULL,
  `trade_licence_no` varchar(255) DEFAULT NULL,
  `insurance_date` varchar(20) DEFAULT NULL,
  `exp_date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `self_emp_details`
--

INSERT INTO `self_emp_details` (`id`, `customer_id`, `self_company_name`, `percentage_ownership`, `profession_business`, `annual_business_income`, `annual_gross_expenses`, `trade_licence_no`, `insurance_date`, `exp_date`, `created_at`, `updated_at`) VALUES
(1, 6, 'ABC', 'IT', '4', '454543', '3433', '23322', '2022-11-24', '2022-11-24', '2022-11-09 08:03:25', '2022-11-09 02:33:25'),
(2, 10, 'Shailersolutions', 'app development', '4', '120000', '12002022020', 'jedjr', '2022-11-29', '2022-11-14', '2022-11-14 05:59:30', '2022-11-14 05:59:30'),
(3, 14, 'asdhsj', 'ahshsh', '4', '2313130', '4695988', 'znxnxbdndu', '2022-11-16', '2022-11-14', '2022-11-14 07:40:41', '2022-11-14 07:40:41'),
(4, 13, 'Shailers', 'qwwew', '4', '12000', '120099', 'etsffgedd', '2022-11-29', '2022-11-14', '2022-11-14 07:32:50', '2022-11-14 07:32:50'),
(5, 15, 'SDM', 'Health', '5', '25', '28', '46', '2024-01-31', '2022-11-14', '2022-11-14 07:59:58', '2022-11-14 07:59:58'),
(6, 18, 'shailer', 'ekejeje', '2', '132323000', '166116000', '222000', '2022-11-30', '2022-11-15', '2022-11-16 10:17:49', '2022-11-16 10:17:49'),
(7, 21, 'ABC', 'IT', '4', NULL, NULL, NULL, NULL, NULL, '2022-11-21 01:01:23', '2022-11-21 01:01:23'),
(8, 8, 'Test', '50', 'Event Planning', '30983', NULL, NULL, NULL, NULL, '2022-11-24 04:59:27', '2022-11-23 23:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `url` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `blue_icon` varchar(100) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `status`, `url`, `image`, `blue_icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Credit Card', 1, 'credit-card', '/uploads/services/126904credit_card.png', '/uploads/services/276610Frame.png', '2022-11-10 07:30:14', '2022-11-21 12:34:49', NULL),
(2, 'Personal Loan', 0, 'home-loan', '/uploads/services/790774Loan.png', NULL, '2022-11-10 07:25:24', '2022-11-21 06:08:44', NULL),
(3, 'Business Loan', 1, 'business-loan', '/uploads/services/252093business.png', '/uploads/services/881374404435busin123.png', '2022-11-10 07:30:52', '2022-11-29 05:27:39', NULL),
(4, 'Mortgage Loan', 1, 'property-loan', '/uploads/services/492668790774Loan.png', '/uploads/services/688669Loan.png', '2022-11-10 07:31:33', '2022-11-21 12:34:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_applies`
--

CREATE TABLE `service_applies` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 => Pending',
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_applies`
--

INSERT INTO `service_applies` (`id`, `service_id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 0, '2022-11-29 08:17:17', '2022-11-29 08:17:17'),
(3, 3, 8, 0, '2022-11-29 08:17:17', '2022-11-29 08:17:17'),
(6, 3, 2, 0, '2022-11-29 10:02:50', '2022-11-29 10:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `link`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Slider One', '/uploads/sliders/186262slider_1.png', NULL, 1, '2022-11-22 07:59:39', '2022-11-22 08:02:12', NULL),
(2, 'Slider Two', '/uploads/sliders/198645slider_2.png', '/home', 1, '2022-11-22 08:00:30', '2022-11-22 08:05:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `small_sliders`
--

CREATE TABLE `small_sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `small_sliders`
--

INSERT INTO `small_sliders` (`id`, `title`, `image`, `link`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'First Slider', '/uploads/sliders/831959lnxx_home_images.png', '#', 1, '2022-11-22 11:36:56', '2022-11-22 11:36:56', NULL),
(2, 'Second Slider', '/uploads/sliders/575792demo_images.png', '#', 1, '2022-11-22 11:38:41', '2022-11-22 11:38:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_master`
--

CREATE TABLE `status_master` (
  `id` int(11) NOT NULL,
  `name` varchar(121) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_master`
--

INSERT INTO `status_master` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'OPEN', NULL, NULL),
(2, 'INPROCESS', NULL, NULL),
(3, 'REMINDER', NULL, NULL),
(4, 'CLOSE', NULL, NULL),
(5, 'DISQUALIFIED', NULL, NULL),
(6, 'INACTIVE CUSTOMER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `image`, `comment`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A happy Lnxx customer', '/uploads/testimonials/482094profile.png', 'Lnxx helped me consolidate all my outstanding balances in a single loan at the right interest rate. I want to thank Lnxx for making my finances more manageable as well as more affordable.', 1, '2022-11-22 05:13:49', '2022-11-22 05:14:55', NULL),
(2, 'A Lnxx repeat customer from Dubai', '/uploads/testimonials/922610profile.png', 'I have been a Lnxx customer for over 2 years now. Both my credit cards and my personal loan have been so ably facilitated by Lnxx that now I love referring my friends to them for seeking help with their financial needs!', 1, '2022-11-22 05:15:31', '2022-11-22 05:15:31', NULL),
(3, 'Lnxx customer in Abu Dhabi', '/uploads/testimonials/804617profile.png', 'The services provided by Lnxx were very useful in helping me make the right choice of credit card to best suit my needs!', 1, '2022-11-22 05:15:56', '2022-11-22 05:15:56', NULL),
(4, 'A satisfied Lnxx customer', '/uploads/testimonials/547385profile.png', 'I was very impressed by the Lnxx representative’s knowledge of the various credit cards available in the market. It was a pleasure that unlike other sales companies, she did not push me unnecessarily and yet provided me with all the information required for me to make a good decision!', 1, '2022-11-22 05:16:15', '2022-11-22 05:16:15', NULL),
(5, 'Lnxx customer in Sharjah', '/uploads/testimonials/103508profile.png', 'The representative from Lnxx was not only very professional but also made the documentation and process for my loan extremely simple!', 1, '2022-11-22 05:16:35', '2022-11-22 05:16:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_business`
--

CREATE TABLE `type_of_business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_of_card_applied`
--

CREATE TABLE `type_of_card_applied` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `card_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_limit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_of_personal_finance`
--

CREATE TABLE `type_of_personal_finance` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `institutation_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `finance_amount` float NOT NULL,
  `monthly_installment` float NOT NULL,
  `outstanding_balance` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(1) NOT NULL COMMENT '1 => Admin, 2 => Customer, 3 => Agent, 4 => Employees, 5 => Manager',
  `login_otp` int(6) DEFAULT NULL,
  `api_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirates_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirates_id_back` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eid_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eid_status` int(1) NOT NULL DEFAULT 0,
  `mobile` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salutation`, `name`, `middle_name`, `last_name`, `email`, `user_type`, `login_otp`, `api_key`, `gender`, `date_of_birth`, `profile_image`, `emirates_id`, `emirates_id_back`, `eid_number`, `eid_status`, `mobile`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Dr.', 'Super', NULL, 'Admin', 'admin@lnxx.com', 1, 147169, NULL, 'Male', '2021-08-24', NULL, '/uploads/emirates_id/366271emiratesId.jpg', '/uploads/emirates_id/366271emiratesId.jpg', NULL, 0, NULL, 1, NULL, '$2y$10$AadbIh/Maw47PTuuL6J1eOZr.mehmL/cjXVaxNS/20/tIftKRp8Ga', NULL, NULL, '2022-11-30 02:08:35', NULL),
(4, NULL, 'Rohit', NULL, NULL, 'warmachine19073@gmail.com', 2, 226428, NULL, 'Male', '11/23/1996', NULL, NULL, NULL, NULL, 0, '9856767822', 1, NULL, NULL, NULL, '2022-11-02 05:40:35', '2022-11-22 07:48:47', NULL),
(5, NULL, 'Navjot Thakur', NULL, NULL, 'admin@myfamilylocker.com', 3, 368012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '9856767826', 1, NULL, NULL, NULL, '2022-11-02 23:26:24', '2022-11-04 00:55:23', NULL),
(6, NULL, 'Navjot Thakur', NULL, NULL, 'navjot@gmail.com', 2, 912597, 'hdhtestbdjdjk', NULL, NULL, NULL, NULL, NULL, NULL, 0, '9815330', 1, NULL, NULL, NULL, '2022-11-05 04:48:01', '2022-11-16 11:32:01', NULL),
(7, NULL, 'Navjot Thakur', NULL, NULL, 'navjot@yahoo.com', 2, 312826, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '8765432456', 1, NULL, NULL, NULL, '2022-11-05 04:54:00', '2022-11-08 07:08:32', NULL),
(8, 'Mr.', 'Navjot', NULL, 'Thakur', 'warmachine1907@gmail.com', 4, 901885, 'dwsdwsdws3443rfedf', 'Male', '1996-11-23', '/uploads/user_images/452629fffwlruzhynpvdpigvfguznnxtyrnvnkzvhyjjgebswxnmmhyogquajzghjk.jpg', '/uploads/emirates_id/674019emiratesId.jpg', '/uploads/emirates_id/603508download.jfif', '4524525444654214', 1, '8765456543', 1, NULL, NULL, NULL, '2022-11-05 05:12:47', '2022-11-30 07:04:53', NULL),
(9, NULL, 'Supriya', NULL, NULL, 'priyasri@gmail.com', 2, 718246, NULL, 'Female', '2000-02-16', '/uploads/user_images/982961dumy.jpg', NULL, NULL, NULL, 0, '971793', 1, NULL, NULL, NULL, '2022-11-11 08:26:26', '2022-11-11 11:18:25', NULL),
(10, NULL, 'Prem Chaudhary', NULL, NULL, 'prem@gmail.com', 2, 673523, 'ecb63137ad07d76c8db432b0a4a2967b', NULL, NULL, NULL, NULL, NULL, NULL, 0, '7905957', 1, NULL, NULL, NULL, '2022-11-11 11:22:21', '2022-11-15 06:09:46', NULL),
(11, NULL, 'Supriya Srivastava', NULL, NULL, 'sup@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '9876543', 1, NULL, NULL, NULL, '2022-11-14 06:00:31', '2022-11-14 06:00:31', NULL),
(12, NULL, 'Priya Sri', NULL, NULL, 'sup16@gmail.com', 2, 725336, 'a59af77485f27832ba99f561801b9666', NULL, NULL, NULL, NULL, NULL, NULL, 0, '9876545', 1, NULL, NULL, NULL, '2022-11-14 06:32:30', '2022-11-14 06:33:23', NULL),
(13, NULL, 'Demo Prem', NULL, NULL, 'p@gmail.com', 2, 758637, '439859c20271edff48b1b290c7131feb', NULL, NULL, NULL, NULL, NULL, NULL, 0, '9898989', 1, NULL, NULL, NULL, '2022-11-14 06:36:54', '2022-11-14 07:10:38', NULL),
(14, NULL, 'Priya Sri', NULL, NULL, 'priya12@gmail.com', 2, 196925, 'ef6df364473e2267b8fa316388a928f0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '9875552', 1, NULL, NULL, NULL, '2022-11-14 07:18:35', '2022-11-14 08:14:01', NULL),
(15, NULL, 'Tina Sri', NULL, NULL, 'tina@gmail.com', 2, 353809, 'c92c233161e7bb0df1982c11d4552112', NULL, NULL, NULL, NULL, NULL, NULL, 0, '9875243', 1, NULL, NULL, NULL, '2022-11-14 07:57:29', '2022-11-14 07:57:51', NULL),
(16, NULL, 'Himanshu Verma', NULL, NULL, 'preetixc@gmail.com', 2, 118274, 'fdcd184c2dcee727720901e3a67eb731', NULL, NULL, NULL, NULL, NULL, NULL, 0, '9845623', 1, NULL, NULL, NULL, '2022-11-14 08:35:30', '2022-11-14 08:52:08', NULL),
(17, NULL, 'Prem KKK', NULL, NULL, 'prem1@gmail.com', 2, 135458, 'f115beb926973fafe91b786b09939435', NULL, NULL, NULL, NULL, NULL, NULL, 0, '7418529', 1, NULL, NULL, NULL, '2022-11-15 12:35:03', '2022-11-15 12:35:13', NULL),
(18, NULL, 'PremKK', NULL, NULL, 'ppp@gmail.com', 2, 843459, '2a11ab0face7e1d74ed62c051fde236b', NULL, NULL, NULL, NULL, NULL, NULL, 0, '7905950', 1, NULL, NULL, NULL, '2022-11-15 12:56:56', '2022-11-15 12:57:12', NULL),
(19, NULL, 'Prem Demo', NULL, NULL, 'p1@gmail.com', 2, 929982, 'a25ca5ea9788d905a3a7ffe621268f3c', NULL, NULL, NULL, NULL, NULL, NULL, 0, '1111111', 1, NULL, NULL, NULL, '2022-11-16 12:35:25', '2022-11-17 05:52:46', NULL),
(20, NULL, 'Prem Kanojiya', NULL, NULL, 'p2@gmail.com', 2, 544509, '4664fbea147bf122109d1af80f81f51e', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2222222', 1, NULL, NULL, NULL, '2022-11-17 05:37:57', '2022-11-17 05:38:01', NULL),
(21, 'Mr.', 'Navjot Thakur', NULL, NULL, 'adsqsqmin@lnxx.com', 2, NULL, NULL, 'Male', '28 Apr, 2004', '/uploads/user_images/688053fffwlruzhynpvdpigvfguznnxtyrnvnkzvhyjjgebswxnmmhyogquajzghjk.jpg', '/uploads/emirates_id/492870emirates-id.jpg', '/uploads/emirates_id/615783Digital-locker-lock-banner.jpg', NULL, 0, '4524521', 1, NULL, NULL, NULL, '2022-11-21 00:07:38', '2022-11-24 03:57:02', NULL),
(22, 'Mr.', 'Navjot', NULL, NULL, 'test123@gmail.com', 2, NULL, NULL, 'Male', '1996-11-23', '/uploads/user_images/301329fffwlruzhynpvdpigvfguznnxtyrnvnkzvhyjjgebswxnmmhyogquajzghjk.jpg', '/uploads/emirates_id/342984about_usimg123.jpg', '/uploads/emirates_id/178395477-700x600.jpg', NULL, 0, '5214521', 1, NULL, NULL, NULL, '2022-11-29 00:12:47', '2022-11-29 00:19:28', NULL),
(23, 'Mr.', 'Navjot', NULL, NULL, 'adwdwddmin@lnxx.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '65214521', 1, NULL, NULL, NULL, '2022-11-29 04:45:06', '2022-11-29 04:45:06', NULL),
(24, 'Mr.', 'Navjot', NULL, 'Thakur', 'ad455min@lnxx.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2541254', 1, NULL, NULL, NULL, '2022-11-29 04:47:26', '2022-11-29 04:47:26', NULL),
(25, 'Mr.', 'Navjot', 'Singh', 'Thakur', 'a4545dmin@lnxx.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4512451', 1, NULL, NULL, NULL, '2022-11-29 04:56:26', '2022-12-03 05:32:35', NULL),
(26, NULL, 'dasdsjadhu', NULL, NULL, 'sdhihiu@kjsadjk.asdjh', 4, NULL, NULL, 'Male', '1548-02-09', NULL, NULL, NULL, NULL, 0, '65665564654', 0, NULL, NULL, NULL, '2022-12-01 04:47:59', '2022-12-01 04:47:59', NULL),
(27, NULL, 'jkdsajkdkj', NULL, NULL, 'kjasdhajksh@kjassahdkjash.askjdh', 4, NULL, NULL, 'Male', '1997-02-09', NULL, NULL, NULL, NULL, 0, '999999999', 0, NULL, NULL, NULL, '2022-12-01 04:56:52', '2022-12-01 04:56:52', NULL),
(28, NULL, 'jhsadashg', NULL, NULL, 'oiusdkj@KJSHD.ASKLDJ', 4, NULL, NULL, 'Male', '2022-12-01', '/uploads/user_images/', NULL, NULL, NULL, 0, '556465465456', 0, NULL, NULL, NULL, '2022-12-01 04:59:38', '2022-12-01 04:59:38', NULL),
(29, NULL, 'DASD', NULL, NULL, 'ASD@SFA.SAF', 4, NULL, NULL, 'Male', '81997-02-09', '/uploads/user_images/444333demo-computer-key-to-download-version-software-trial-64543995.jpg', NULL, NULL, NULL, 0, '5654564654', 0, NULL, '$2y$10$vl8KBil9gYOSmylMChhlie5DzdvMHXZir607EoG.NO4dIKeWqi7W.', NULL, '2022-12-01 05:06:50', '2022-12-01 05:58:31', NULL),
(30, NULL, 'Employee', NULL, NULL, 'employee@lnxx.com', 4, NULL, NULL, 'Male', '0465-04-05', NULL, NULL, NULL, NULL, 0, '545654', 1, NULL, '$2y$10$AadbIh/Maw47PTuuL6J1eOZr.mehmL/cjXVaxNS/20/tIftKRp8Ga', NULL, '2022-12-01 05:42:13', '2022-12-01 06:02:40', NULL),
(31, NULL, 'Ankit Sharma', NULL, NULL, 'ankit@samtech.com', 4, NULL, NULL, 'Male', '1997-02-09', '/uploads/user_images/983168demo-computer-key-to-download-version-software-trial-64543995.jpg', NULL, NULL, NULL, 0, '9415918134', 1, NULL, '$2y$10$AadbIh/Maw47PTuuL6J1eOZr.mehmL/cjXVaxNS/20/tIftKRp8Ga', NULL, '2022-12-01 07:27:07', '2022-12-01 07:27:07', NULL),
(32, NULL, 'Agent LNXX', NULL, NULL, 'agent@lnxx.com', 3, NULL, NULL, 'Male', '1997-02-09', '/uploads/user_images/983168demo-computer-key-to-download-version-software-trial-64543995.jpg', NULL, NULL, NULL, 0, '9415918134', 1, NULL, '$2y$10$AadbIh/Maw47PTuuL6J1eOZr.mehmL/cjXVaxNS/20/tIftKRp8Ga', NULL, '2022-12-01 07:27:07', '2022-12-01 07:27:07', NULL),
(35, NULL, 'Manager LNXX', NULL, NULL, 'manager@lnxx.com', 5, NULL, NULL, 'Male', '1997-02-09', '/uploads/user_images/983168demo-computer-key-to-download-version-software-trial-64543995.jpg', NULL, NULL, NULL, 0, '9415918134', 1, NULL, '$2y$10$AadbIh/Maw47PTuuL6J1eOZr.mehmL/cjXVaxNS/20/tIftKRp8Ga', NULL, '2022-12-01 07:27:07', '2022-12-01 07:27:07', NULL),
(36, NULL, 'test', NULL, NULL, 'akkilko29@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '9415918134', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, 'Mohammed bin Ali Al Abbar', NULL, NULL, 'mohammedbinalia@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '9710140045', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `primary_school` varchar(255) DEFAULT NULL,
  `high_school` varchar(255) DEFAULT NULL,
  `graduate` varchar(255) DEFAULT NULL,
  `postgraduate` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`id`, `user_id`, `education`, `primary_school`, `high_school`, `graduate`, `postgraduate`, `others`, `created_at`, `updated_at`) VALUES
(1, 6, 'MCA', 'DAV', 'GAV', NULL, NULL, 'test', '2022-11-09 08:25:53', '2022-11-09 09:31:04'),
(2, 9, 'BCA', 'CA', 'CA', 'BCA', NULL, NULL, '2022-11-11 09:17:38', '2022-11-11 09:17:38'),
(3, 16, 'Master', 'Lilawati Convent', NULL, NULL, NULL, NULL, '2022-11-14 08:55:37', '2022-11-14 08:55:37'),
(4, 10, 'Blank', 'Government high school', 'SGD grammar', 'Budhha Institute of technology', 'AKTU', 'MBA persueing', '2022-11-15 11:07:27', '2022-11-15 11:16:28'),
(5, 18, 'Blank', 'sarkari school 23456', 'RS Sajwaan sen. sec. school', 'bit', 'BIT AKTU', 'MBA', '2022-11-15 13:01:04', '2022-11-16 10:18:09'),
(6, 19, 'Blank', 'SDG Grammer Sen. Sec. School', 'Gian Vidyalaya', 'BIT', 'AKTU', 'MBA AKTU', '2022-11-16 12:42:00', '2022-11-16 12:42:00'),
(7, 20, 'Blank', 'wkwkekke', 'eisiisdi', 'sjsekkee', 'sjdjdusujdjduddidiidiiiri', 'ejejejejejiddjdijjidididiriri', '2022-11-17 05:42:50', '2022-11-17 05:42:50'),
(8, 21, 'MCA', 'DAV', 'GAV', NULL, NULL, NULL, '2022-11-21 06:31:29', '2022-11-21 06:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_email_otps`
--

CREATE TABLE `user_email_otps` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(6) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_email_otps`
--

INSERT INTO `user_email_otps` (`id`, `email`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'warmachine1907@gmail.com', 916969, 1, '2022-11-02 08:17:23', '2022-11-02 11:05:54'),
(2, 'warmachine1907@gmail.com', 731785, 1, '2022-11-02 08:18:46', '2022-11-02 11:05:54'),
(3, 'warmachine1907@gmail.com', 783616, 1, '2022-11-02 08:19:19', '2022-11-02 11:05:54'),
(4, 'warmachine1907@gmail.com', 521668, 1, '2022-11-02 08:20:49', '2022-11-02 11:05:54'),
(5, 'warmachine1907@gmail.com', 885510, 1, '2022-11-02 08:23:36', '2022-11-02 11:05:54'),
(6, 'warmachine1907@gmail.com', 925438, 1, '2022-11-02 08:28:11', '2022-11-02 11:05:54'),
(7, 'warmachine1907@gmail.com', 265642, 1, '2022-11-02 09:52:36', '2022-11-02 11:05:54'),
(8, 'warmachine1907@gmail.com', 735625, 1, '2022-11-02 09:54:31', '2022-11-02 11:05:54'),
(9, 'warmachine1907@gmail.com', 569610, 1, '2022-11-02 09:59:05', '2022-11-02 11:05:54'),
(10, 'warmachine1907@gmail.com', 809453, 1, '2022-11-02 09:59:46', '2022-11-02 11:05:54'),
(11, 'warmachine1907@gmail.com', 224046, 1, '2022-11-02 09:59:50', '2022-11-02 11:05:54'),
(12, 'warmachine1907@gmail.com', 947916, 1, '2022-11-02 10:02:31', '2022-11-02 11:05:54'),
(13, 'warmachine1907@gmail.com', 337829, 1, '2022-11-02 10:04:41', '2022-11-02 11:05:54'),
(14, 'warmachine1907@gmail.com', 182696, 1, '2022-11-02 11:02:48', '2022-11-02 11:05:54'),
(15, 'warmachine1907@gmail.com', 792976, 1, '2022-11-02 11:03:17', '2022-11-02 11:05:54'),
(16, 'warmachine1907@gmail.com', 165926, 1, '2022-11-02 11:04:20', '2022-11-02 11:05:54'),
(17, 'admin@myfamilylocker.com', 491318, 1, '2022-11-03 04:56:09', '2022-11-03 04:56:20'),
(18, 'navjot@shailersolutions.com', 451020, 1, '2022-11-05 10:17:35', '2022-11-05 10:17:56'),
(19, 'navjot@shailersolutions.com', 245901, 1, '2022-11-05 10:23:30', '2022-11-05 10:23:51'),
(20, 'warmachine1907@gmail.com', 934362, 0, '2022-11-05 10:31:03', '2022-11-05 10:31:03'),
(21, 'warmachine1907@gmail.com', 617464, 1, '2022-11-05 10:42:24', '2022-11-05 10:42:42'),
(22, 'priyasri@gmail.com', 170953, 1, '2022-11-11 08:25:47', '2022-11-11 08:26:19'),
(23, 'sup@gmail.com', 336342, 1, '2022-11-14 05:58:12', '2022-11-14 05:58:39'),
(24, 'adsqsqmin@lnxx.com', 643803, 1, '2022-11-21 05:32:12', '2022-11-21 05:37:38'),
(25, 'test123@gmail.com', 841071, 1, '2022-11-29 05:42:33', '2022-11-29 05:42:47'),
(26, 'ad454min@lnxx.com', 634452, 0, '2022-11-29 10:13:27', '2022-11-29 10:13:27'),
(27, 'adwdwddmin@lnxx.com', 126274, 1, '2022-11-29 10:14:46', '2022-11-29 10:15:06'),
(28, 'ad455min@lnxx.com', 370352, 1, '2022-11-29 10:17:13', '2022-11-29 10:17:26'),
(29, 'a4545dmin@lnxx.com', 574326, 1, '2022-11-29 10:25:25', '2022-11-29 10:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` int(11) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '0=Pending,1=Verify',
  `resend_count` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `mobile`, `otp`, `status`, `resend_count`, `created_at`, `updated_at`) VALUES
(1, '9815330440', 442747, '0', NULL, '2022-11-02 06:22:18', '2022-11-02 00:52:18'),
(2, '8753987634', 752753, '0', NULL, '2022-11-02 06:28:10', '2022-11-02 00:58:10'),
(3, '8934543456', 681705, '0', NULL, '2022-11-02 06:45:18', '2022-11-02 01:15:18'),
(4, '9856767822', 309177, '1', NULL, '2022-11-02 06:46:24', '2022-11-02 05:34:14'),
(5, '9856767822', 589631, '1', NULL, '2022-11-02 06:47:59', '2022-11-02 05:34:14'),
(6, '9856767822', 107527, '1', NULL, '2022-11-02 07:00:04', '2022-11-02 05:34:14'),
(7, '9856767822', 343699, '1', NULL, '2022-11-02 07:08:03', '2022-11-02 05:34:14'),
(8, '5634567865', 678905, '1', NULL, '2022-11-02 07:33:23', '2022-11-02 02:03:30'),
(9, '9815330446', 874516, '1', NULL, '2022-11-02 07:38:52', '2022-11-02 02:08:58'),
(10, '8762345675', 285112, '1', NULL, '2022-11-02 07:41:12', '2022-11-02 02:11:19'),
(11, '8756895678', 860311, '1', NULL, '2022-11-02 08:13:34', '2022-11-02 02:44:00'),
(12, '9856767822', 691313, '1', NULL, '2022-11-02 08:15:47', '2022-11-02 05:34:14'),
(13, '9856767822', 914540, '1', NULL, '2022-11-02 08:15:49', '2022-11-02 05:34:14'),
(14, '9856767822', 516910, '1', NULL, '2022-11-02 08:18:31', '2022-11-02 05:34:14'),
(15, '9856767823', 808711, '1', NULL, '2022-11-02 08:18:33', '2022-11-02 02:48:41'),
(16, '7654327845', 879261, '1', NULL, '2022-11-02 08:19:08', '2022-11-02 02:49:14'),
(17, '8763439874', 196061, '1', NULL, '2022-11-02 08:20:22', '2022-11-02 02:50:37'),
(18, '7673675436', 837232, '1', NULL, '2022-11-02 08:28:00', '2022-11-02 02:58:07'),
(19, '9856767822', 667188, '1', NULL, '2022-11-02 09:52:15', '2022-11-02 05:34:14'),
(20, '3456543456', 340448, '1', NULL, '2022-11-02 09:54:13', '2022-11-02 04:24:22'),
(21, '8765098721', 858514, '1', NULL, '2022-11-02 09:59:20', '2022-11-02 04:29:27'),
(22, '8723459876', 545917, '1', NULL, '2022-11-02 10:04:14', '2022-11-02 04:34:25'),
(23, '7834983245', 423418, '1', NULL, '2022-11-02 11:01:24', '2022-11-02 05:31:30'),
(24, '9856767822', 223907, '1', NULL, '2022-11-02 11:03:04', '2022-11-02 05:34:14'),
(25, '9856767822', 988373, '1', NULL, '2022-11-02 11:04:09', '2022-11-02 05:34:14'),
(26, '9856767826', 406775, '1', NULL, '2022-11-03 04:56:01', '2022-11-02 23:26:06'),
(27, '9815330449', 391383, '1', NULL, '2022-11-05 10:17:18', '2022-11-05 04:47:25'),
(28, '8765432456', 857611, '1', NULL, '2022-11-05 10:22:58', '2022-11-05 04:53:04'),
(29, '8745634568', 868647, '1', NULL, '2022-11-05 10:30:14', '2022-11-05 05:00:19'),
(30, '9856767442', 834468, '1', NULL, '2022-11-05 10:30:30', '2022-11-05 05:00:38'),
(31, '8765456543', 761607, '1', NULL, '2022-11-05 10:42:09', '2022-11-05 05:12:17'),
(32, '9876544', 370623, '0', NULL, '2022-11-11 08:30:47', '2022-11-11 08:30:47'),
(33, '9876544', 160112, '0', NULL, '2022-11-11 08:31:00', '2022-11-11 08:31:00'),
(34, '9876322', 339559, '0', NULL, '2022-11-11 08:31:25', '2022-11-11 08:31:25'),
(35, '8978234', 146493, '0', NULL, '2022-11-14 04:48:21', '2022-11-14 04:48:21'),
(36, '9823409', 891128, '0', NULL, '2022-11-14 05:08:38', '2022-11-14 05:08:38'),
(37, '9823409', 994987, '0', NULL, '2022-11-14 05:08:51', '2022-11-14 05:08:51'),
(38, '9823403', 940716, '0', NULL, '2022-11-14 05:09:06', '2022-11-14 05:09:06'),
(39, '8934522', 666958, '0', NULL, '2022-11-14 05:10:53', '2022-11-14 05:10:53'),
(40, '9876543', 546543, '1', NULL, '2022-11-14 05:35:24', '2022-11-14 05:56:05'),
(41, '9876543', 828182, '1', NULL, '2022-11-14 05:36:42', '2022-11-14 05:56:05'),
(42, '9876543', 429299, '1', NULL, '2022-11-14 05:42:57', '2022-11-14 05:56:05'),
(43, '9876543', 841527, '1', NULL, '2022-11-14 05:45:55', '2022-11-14 05:56:05'),
(44, '9876543', 513058, '1', NULL, '2022-11-14 05:46:16', '2022-11-14 05:56:05'),
(45, '9876543', 206233, '1', NULL, '2022-11-14 05:54:06', '2022-11-14 05:56:05'),
(46, '9876543', 367618, '1', NULL, '2022-11-14 05:55:48', '2022-11-14 05:56:05'),
(47, '4512524', 774136, '0', NULL, '2022-11-21 05:28:04', '2022-11-20 23:58:04'),
(48, '4512524', 101852, '0', NULL, '2022-11-21 05:28:08', '2022-11-20 23:58:08'),
(49, '4512545', 238183, '0', NULL, '2022-11-21 05:28:14', '2022-11-20 23:58:14'),
(50, '4512545', 276458, '0', NULL, '2022-11-21 05:28:26', '2022-11-20 23:58:26'),
(51, '4512545', 376083, '0', NULL, '2022-11-21 05:28:27', '2022-11-20 23:58:27'),
(52, '4521524', 575440, '0', NULL, '2022-11-21 05:28:43', '2022-11-20 23:58:43'),
(53, '4521524', 596942, '0', NULL, '2022-11-21 05:28:50', '2022-11-20 23:58:50'),
(54, '4524521', 275835, '1', NULL, '2022-11-21 05:28:54', '2022-11-20 23:59:08'),
(55, '5214521', 175061, '1', NULL, '2022-11-29 05:42:12', '2022-11-29 00:12:22'),
(56, '5421521', 765740, '1', NULL, '2022-11-29 09:58:24', '2022-11-29 04:28:38'),
(57, '5421524', 635586, '1', NULL, '2022-11-29 10:13:16', '2022-11-29 04:43:21'),
(58, '6521452', 849293, '0', NULL, '2022-11-29 10:14:37', '2022-11-29 04:44:37'),
(59, '2541254', 812282, '1', NULL, '2022-11-29 10:17:01', '2022-11-29 04:47:09'),
(60, '4512452', 758592, '0', NULL, '2022-11-29 10:24:57', '2022-11-29 04:54:57'),
(61, '4512451', 345545, '1', NULL, '2022-11-29 10:25:02', '2022-11-29 04:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `various_income_details`
--

CREATE TABLE `various_income_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `annaul_bonus` float NOT NULL,
  `avg_month_comm` float NOT NULL,
  `avg_month_overtime` float NOT NULL,
  `fix_month_income` float NOT NULL,
  `if_spouse_co_borrower` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_details_fk0` (`customer_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `aecb_consent_form`
--
ALTER TABLE `aecb_consent_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aecb_consent_form_fk0` (`nationality_id`),
  ADD KEY `aecb_consent_form_fk1` (`customer_id`);

--
-- Indexes for table `agent_onboarding`
--
ALTER TABLE `agent_onboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_lead`
--
ALTER TABLE `assign_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance_transfer_request`
--
ALTER TABLE `balance_transfer_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_transfer_request_fk0` (`customer_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_policy`
--
ALTER TABLE `bank_policy`
  ADD PRIMARY KEY (`id`),
  ADD KEY ` bank_policy_fk0` (`customer_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_salaried_details`
--
ALTER TABLE `cm_salaried_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cm_salaried_details_fk0` (`customer_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_fk0` (`customer_id`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_onboardings`
--
ALTER TABLE `customer_onboardings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_onboarding_fk0` (`nationality`),
  ADD KEY `customer_onboarding_fk4` (`country_of_origin`);

--
-- Indexes for table `degination_master`
--
ALTER TABLE `degination_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_master`
--
ALTER TABLE `education_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `for_bank_use`
--
ALTER TABLE `for_bank_use`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_bank_use_fk0` (`customer_id`);

--
-- Indexes for table `fts_consent_form`
--
ALTER TABLE `fts_consent_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fts_consent_form_fk0` (`customer_id`);

--
-- Indexes for table `kyc_doc`
--
ALTER TABLE `kyc_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY ` kyc_doc_fk0` (`customer_id`),
  ADD KEY `kyc_doc_fk0` (`agent_id`);

--
-- Indexes for table `language_master`
--
ALTER TABLE `language_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_master_fk0` (`agent_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_assign_auto`
--
ALTER TABLE `lead_assign_auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_auto_distribution_category`
--
ALTER TABLE `lead_auto_distribution_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_cases`
--
ALTER TABLE `lead_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_email_otp`
--
ALTER TABLE `lead_email_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_language_master`
--
ALTER TABLE `lead_language_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_mails`
--
ALTER TABLE `lead_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_mobile_otp`
--
ALTER TABLE `lead_mobile_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_regions`
--
ALTER TABLE `lead_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_social_form_setting`
--
ALTER TABLE `lead_social_form_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_source`
--
ALTER TABLE `lead_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lnxx_loan_tell_us_business`
--
ALTER TABLE `lnxx_loan_tell_us_business`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnxx_loan_tell_us_business_fk0` (`education_details_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk1` (`prefer_language_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk2` (`designation_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk4` (`type_of_business_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk5` (`various_income_detail_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk6` (`personal_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk7` (`details_card_id`),
  ADD KEY `lnxx_loan_tell_us_business_fk8` (`other_income_id`);

--
-- Indexes for table `loan_category`
--
ALTER TABLE `loan_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_master`
--
ALTER TABLE `loan_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_master_fk0` (`loan_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_nationality_holder`
--
ALTER TABLE `multiple_nationality_holder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_cm_details`
--
ALTER TABLE `other_cm_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_cm_details_fk0` (`customer_id`);

--
-- Indexes for table `partner_details`
--
ALTER TABLE `partner_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pre_registers`
--
ALTER TABLE `pre_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_requests`
--
ALTER TABLE `product_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_in_use`
--
ALTER TABLE `reference_in_use`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_in_use_fk0` (`customer_id`);

--
-- Indexes for table `relation_manager_employee`
--
ALTER TABLE `relation_manager_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residency_self_certificate`
--
ALTER TABLE `residency_self_certificate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residency_self_certificate_fk0` (`customer_id`);

--
-- Indexes for table `security_cheque`
--
ALTER TABLE `security_cheque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `security_cheque_fk0` (`customer_id`);

--
-- Indexes for table `self_emp_details`
--
ALTER TABLE `self_emp_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `self_emp_details_fk0` (`customer_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_applies`
--
ALTER TABLE `service_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_sliders`
--
ALTER TABLE `small_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_master`
--
ALTER TABLE `status_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_business`
--
ALTER TABLE `type_of_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_card_applied`
--
ALTER TABLE `type_of_card_applied`
  ADD PRIMARY KEY (`id`),
  ADD KEY ` type_of_card_applied_fk0` (`customer_id`);

--
-- Indexes for table `type_of_personal_finance`
--
ALTER TABLE `type_of_personal_finance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_of_personal_finance_fk0` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_email_otps`
--
ALTER TABLE `user_email_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `various_income_details`
--
ALTER TABLE `various_income_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY ` various_income_details_fk0` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aecb_consent_form`
--
ALTER TABLE `aecb_consent_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_onboarding`
--
ALTER TABLE `agent_onboarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_lead`
--
ALTER TABLE `assign_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `balance_transfer_request`
--
ALTER TABLE `balance_transfer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bank_policy`
--
ALTER TABLE `bank_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cm_salaried_details`
--
ALTER TABLE `cm_salaried_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_onboardings`
--
ALTER TABLE `customer_onboardings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `degination_master`
--
ALTER TABLE `degination_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_master`
--
ALTER TABLE `education_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `for_bank_use`
--
ALTER TABLE `for_bank_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fts_consent_form`
--
ALTER TABLE `fts_consent_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kyc_doc`
--
ALTER TABLE `kyc_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_master`
--
ALTER TABLE `language_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lead_assign_auto`
--
ALTER TABLE `lead_assign_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lead_auto_distribution_category`
--
ALTER TABLE `lead_auto_distribution_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lead_cases`
--
ALTER TABLE `lead_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lead_email_otp`
--
ALTER TABLE `lead_email_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lead_language_master`
--
ALTER TABLE `lead_language_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lead_mails`
--
ALTER TABLE `lead_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lead_mobile_otp`
--
ALTER TABLE `lead_mobile_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_regions`
--
ALTER TABLE `lead_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lead_social_form_setting`
--
ALTER TABLE `lead_social_form_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_source`
--
ALTER TABLE `lead_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lnxx_loan_tell_us_business`
--
ALTER TABLE `lnxx_loan_tell_us_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_category`
--
ALTER TABLE `loan_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_master`
--
ALTER TABLE `loan_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `multiple_nationality_holder`
--
ALTER TABLE `multiple_nationality_holder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_cm_details`
--
ALTER TABLE `other_cm_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `partner_details`
--
ALTER TABLE `partner_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_registers`
--
ALTER TABLE `pre_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_requests`
--
ALTER TABLE `product_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reference_in_use`
--
ALTER TABLE `reference_in_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relation_manager_employee`
--
ALTER TABLE `relation_manager_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `residency_self_certificate`
--
ALTER TABLE `residency_self_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security_cheque`
--
ALTER TABLE `security_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `self_emp_details`
--
ALTER TABLE `self_emp_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service_applies`
--
ALTER TABLE `service_applies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `small_sliders`
--
ALTER TABLE `small_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_master`
--
ALTER TABLE `status_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_of_business`
--
ALTER TABLE `type_of_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_of_card_applied`
--
ALTER TABLE `type_of_card_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_of_personal_finance`
--
ALTER TABLE `type_of_personal_finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_email_otps`
--
ALTER TABLE `user_email_otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `various_income_details`
--
ALTER TABLE `various_income_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_details`
--
ALTER TABLE `account_details`
  ADD CONSTRAINT `account_details_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customer_onboardings` (`id`);

--
-- Constraints for table `aecb_consent_form`
--
ALTER TABLE `aecb_consent_form`
  ADD CONSTRAINT `aecb_consent_form_fk0` FOREIGN KEY (`nationality_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `aecb_consent_form_fk1` FOREIGN KEY (`customer_id`) REFERENCES `customer_onboardings` (`id`);

--
-- Constraints for table `balance_transfer_request`
--
ALTER TABLE `balance_transfer_request`
  ADD CONSTRAINT `balance_transfer_request_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customer_onboardings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
