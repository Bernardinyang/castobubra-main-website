-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2022 at 12:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conmsit`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_boards`
--

CREATE TABLE `academic_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `board_of_trustees`
--

CREATE TABLE `board_of_trustees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board_of_trustees`
--

INSERT INTO `board_of_trustees` (`id`, `order`, `names`, `position`, `image`, `email`, `facebook_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Prof Benedict Ayade', 'Executive Governor Cross River State - Visitor', 'castobubra-prof-benedict-ayade.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:34:58', '2021-11-13 15:11:24'),
(2, 2, 'Dr. Betta Edu', 'Hon. Commissioner for Health Cross River State', 'castobubra-dr-betta-edu.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:35:17', '2021-11-13 14:35:17'),
(3, 3, 'Assoc. Prof Margaret M. Opiah', 'Chairman Governing Council', 'castobubra-assoc-prof-margaret-m-opiah.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:35:42', '2021-11-13 14:35:42'),
(4, 4, 'Mrs. Ruth Ita Ebong', 'Provost', 'castobubra-mrs-ruth-ita-ebong.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:36:04', '2021-11-13 14:36:04'),
(5, 5, 'Mr Aji Eko Esq.', 'Registrar', 'castobubra-mr-aji-eko-esq.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:36:27', '2021-11-13 14:36:27'),
(6, 6, 'Mr. Patrick Ejom', 'Bursar', 'castobubra-mr-patrick-ejom.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:36:48', '2021-11-13 14:36:48'),
(7, 7, 'Mr. Monday Enoh', 'College Librarian', 'castobubra-mr-monday-enoh.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-13 14:37:11', '2021-11-13 14:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'event', 'Event', '2021-11-20 05:41:07', '2021-11-20 05:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `coming_soon_slider_images`
--

CREATE TABLE `coming_soon_slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coming_soon_slider_images`
--

INSERT INTO `coming_soon_slider_images` (`id`, `title`, `img`, `created_at`, `updated_at`) VALUES
(2, 'Conmsit student family', 'castobubra-student-family.jpg', '2021-11-20 08:37:46', '2021-11-20 08:37:46'),
(3, 'Sporting Activities', 'castobubra-sporting-activities.jpg', '2021-11-20 08:38:21', '2021-11-20 08:38:21'),
(4, 'academics @ conmsit', 'castobubra-academics-at-castobubra.jpg', '2021-11-20 08:39:09', '2021-11-20 08:39:09'),
(5, 'Cultural Day', 'castobubra-cultural-day.jpg', '2021-11-20 08:39:53', '2021-11-20 08:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by` bigint(20) UNSIGNED DEFAULT NULL,
  `is_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `unique_id`, `names`, `email`, `mobile_no`, `message`, `read_by`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'MDUJJUCPUS', 'Cynthia Kokoete George', 'kosgeorges18@gmail.com', '08032294644', '29th Nov. 2021\r\nGood day Sir/Madam\r\n\r\nThanks for being there for us. \r\n\r\nI am a newly admitted student of CONMSIT 2021/2022 Section, expected to report on 1 Dec. 2021 for documentation and 6th Dec. 2021 for orientation. \r\n\r\nPlease do me a favour, send a copy of the prospectus to me, to enable me get the requirements and come with all of them, at once on 6th Dec. 2021 due to my long distance. \r\n\r\nThis prospectus is very important to me. Please help. \r\n\r\nThanks for your cooperation and assistance. \r\n\r\nGod bless,\r\n\r\nI am,\r\n\r\nCynthia Kokoete George. \r\nNo: 119 on the Admission List.', NULL, NULL, '2021-11-29 19:59:05', '2021-11-29 19:59:05'),
(2, 'O782GBR81G', 'Isaac nora', 'madamtrecy@gmail.com', '07060427456', 'Are admissions still ongoing', NULL, NULL, '2022-01-12 10:39:45', '2022-01-12 10:39:45'),
(3, 'GBJV8JPU5U', 'Isaac nora', 'madamtrecy@gmail.com', '07060427456', 'Can I use last year jamb for this year entry cos it\'s 2021/2022', NULL, NULL, '2022-01-17 11:29:50', '2022-01-17 11:29:50'),
(4, '5QWOUOAE1Z', 'Nwamarah favour Ijeoma', 'favournwamarah2004@gmail.com', '07042807786', 'Good evening, Please I am writing to find out if the entrance form for 2022 is out and how much cost', NULL, NULL, '2022-01-27 20:04:25', '2022-01-27 20:04:25'),
(5, 'FOXX2ZMDOE', 'Confidence Anthony', 'mmeyene123@yahoo.com', '08133844862', 'When am filling the jamb form which institution am I suppose to put as the first choice', NULL, NULL, '2022-02-04 03:22:01', '2022-02-04 03:22:01'),
(6, 'G5DTMX0DN5', 'Confidence Anthony', 'mmeyene123@yahoo.com', '08133844862', 'When am filling the jamb form which institution am I suppose to put as the first choice', NULL, NULL, '2022-02-04 03:22:01', '2022-02-04 03:22:01'),
(7, '6EGI5Z7LTL', 'Sinjeganji Serah', 'serahsinjeganji@gmail.com', '09036862929', 'When will 2022/2023 school form be available?\r\nDoes the school admission include accomodations? \r\nI really wish to be admitted this year 😔', NULL, NULL, '2022-03-30 12:08:15', '2022-03-30 12:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `c_t_a_s`
--

CREATE TABLE `c_t_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_t_a_s`
--

INSERT INTO `c_t_a_s` (`id`, `unique_id`, `sup_text`, `title`, `content`, `url`, `url_text`, `created_at`, `updated_at`) VALUES
(1, 'f520OQgjac', 'NEED TO KNOW', 'ABOUT NURSING & MIDWIFERY', 'NURSING is a health-care profession that focuses on the care of individuals, families, and communities in order for them to achieve, maintain, or recover optimal health and quality of life.\r\nMIDWIFERY is the health science and health profession concerned with pregnancy, childbirth, and the postpartum period (including newborn care), as well as women\'s sexual and reproductive health throughout their lives.', 'https://conmsit.ng/contact-us', 'Contact Us Today', '2021-11-20 05:19:00', '2021-11-21 04:15:13');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gridnox_contacts`
--

CREATE TABLE `gridnox_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by` bigint(20) UNSIGNED DEFAULT NULL,
  `is_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_06_08_140557_create_sug_settings_table', 1),
(6, '2021_06_08_140557_create_system_settings_table', 1),
(7, '2021_06_08_141428_create_user_login_info_table', 1),
(8, '2021_08_03_131416_create_contacts_table', 1),
(9, '2021_08_03_131416_create_sug_contacts_table', 1),
(10, '2021_08_06_121026_create_categories_table', 1),
(11, '2021_08_06_122325_create_posts_table', 1),
(12, '2021_08_07_120705_create_tags_table', 1),
(13, '2021_08_29_162920_create_f_a_q_s_table', 1),
(14, '2021_09_12_235823_create_role_user_table', 1),
(15, '2021_09_23_103854_create_board_of_trustees_table', 1),
(16, '2021_09_23_103854_create_sug_excos_table', 1),
(17, '2021_09_24_003608_create_subscriber_lists_table', 1),
(18, '2021_09_26_121801_create_gridnox_contacts_table', 1),
(19, '2021_10_13_213908_create_wise_talks_table', 1),
(20, '2021_11_11_215949_create_coming_soon_slider_images_table', 1),
(21, '2021_11_11_220204_create_slider_images_table', 1),
(22, '2021_11_11_222617_create_welcome_sections_table', 1),
(23, '2021_11_11_235523_create_media_table', 1),
(24, '2021_11_12_070943_create_website_news_bars_table', 1),
(25, '2021_11_12_074548_create_student_news_bars_table', 1),
(26, '2021_11_12_081051_create_student_slides_table', 1),
(27, '2021_11_12_103912_create_student_communities_table', 1),
(28, '2021_11_12_112624_create_c_t_a_s_table', 1),
(29, '2022_04_23_180041_create_news_alerts_table', 2),
(30, '2022_04_23_231513_create_academic_boards_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_alerts`
--

CREATE TABLE `news_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_alerts`
--

INSERT INTO `news_alerts` (`id`, `unique_id`, `title`, `details`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '9V1EFJMVhB', 'Sales of 2022/2023 Admission form is ongoing', '<p>Application forms for admission into <strong>Cross River State College of Health Technology for the 2022/2023 session</strong> are currently on sale.</p><p>For information on how to access the form and entry requirements, <a href=\"google.com\"><strong>Click Here ...</strong></a></p>', 1, '2022-04-23 17:39:52', '2022-04-23 18:28:39');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `date_of_event` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `slug`, `title`, `tags`, `banner_img`, `summary`, `post`, `published_at`, `date_of_event`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'school-of-nursing-calabar-breaks-record-matriculates-100-students-for-the-first-time-in-many-decades', 'SCHOOL OF NURSING CALABAR BREAKS RECORD, MATRICULATES 100 STUDENTS FOR THE FIRST TIME IN MANY DECADES', 'Academics', 'castobubra-school-of-nursing-calabar-breaks-record-matriculates-100-students-for-the-first-time-in-many-decades.jpg', 'There were shouts of joy, dancing and jubilation as young students got matriculated into the new Cross River State College of Nursing and Midwifery Science, Itigidi Abi local government area. In the words of a matriculant “It feels like a dream, that I will graduate with a degree from this institution and go for NYSC, God bless super Governor and visionary Health Commissioner.”......', '<p>There were shouts of joy, dancing and jubilation as young students got matriculated into the new Cross River State College of Nursing and Midwifery Science, Itigidi Abi local government area. In the words of a matriculant “It feels like a dream, that I will graduate with a degree from this institution and go for NYSC, God bless super Governor and visionary Health Commissioner.” Following hard work, Governor of Cross River State Sen Ben Ayade working through the Commissioner for Health in collaboration with the legislative arm were able to gain accreditation for the first College of Nursing Sciences in South-South Zone of Nigeria, where graduates will now be awarded a degree and are eligible for NYSC, an unprecedented height the health sector has recorded amongst other mind-blowing achievements in the last 12 months. The College held her first matriculation and capping exercise. The event that had the wife of the Governor Dr. Linda Ayade as the Special Guest of Honour, also had the Speaker of the CRSHA Rt. Hon. Eteng Williams as chairman of the occasion, the Honorable Commissioner for Health Dr. Betta Edu as chief host, the Commissioner for Lands Prof. John Inyang, the member representing the good people of Boki 2 Constituency Hon. Hilary Bissong, the Chairman of Abi LGA and Yakurr LGA Hon. Ofem Eno, the DG of the CRSPHCDA Dr. Janet Ekpenyong, the Paramount Ruler of Abi LGA Eval Solomon Edward and other Chiefs, NANNM Chairman Comrade Josephine, Chairman Governing Council Dr. Margaret Opia,</p><p>&nbsp;Dec Abasi Offiong, Principals of various schools, and a host of other very important dignitaries. Speaking at the event, the wife of the Governor Dr. Linda Ayade charged the matriculating students to take their academic pursuits seriously to make the state government and their parents who have sacrificed so much, proud. “I’m standing here filled with positive emotions, I am so proud to be a part of this success story. Knowing the details of what the school went through to become a college today I’ll say the team under the leadership of Dr. Betta Edu has done great. As students, you must reciprocate the efforts of the government by studying hard knowing very well that the lives of thousands will be dependent on you during practice.” The Speaker of the State House of Assembly in his speech congratulated the Governor and the leadership of the health sector under Dr. Betta Edu for the giant strides recorded so far and for achieving tremendous successes in many areas. “We faced severe battles to get to this point. At some point, accreditation was taken away from all Cross River state schools of Nursing and Midwifery for over 4 years, but today under the leadership of Sen. Prof. Ben Ayade, we’ve gained it back and gone further to upgrade to a college. We’ll continue to support the growth and development of the health sector through budget appropriation, we look forward to having more colleges as requested by the Health Commissioner.” Dr. Betta Edu in her speech thanked the State Governor Sen. Prof. Ben Ayade and his dear wife for the tremendous changes that have come to the college while providing the best to ensure the college achieve its current status. “The government of Sen. Prof. Ben Ayade has fulfilled its part in giving you a college and making this environment more comfortable for learning it is now left for you to reciprocate and make us proud. We’ve come this far due to the hard work and consistent efforts of both the executive and legislative arm of government. I strongly appreciate the efforts of Dr. Linda Ayade, Honorable Speaker Rt. Hon. Eteng Williams and Assembly Members, NBTE, Nursing and Midwifery Council of Nigeria, as well as all the health team who made this dream come true. I charge you all to study hard, avoid distractions while challenging staff to invest more in students without victimizing them. The best graduating students will be awarded half a million as part of Dr. Linda Ayade’s scholarship. “The member Rep Boki 2, the Commissioner for Lands, and DG primary Health Care in their goodwill messages all congratulated students for being successful following a rigorous selection process while charging them to study hard and become world-class nurses. Highlights of the events included a welcome speech from the Provost Mrs. Ruth Ebong; goodwill message from Dr. Margaret Opiah,&nbsp; Handing over of 150 matriculating students to the Provost and Health Commissioner, capping and students declaration, presentation of awards of excellence to Dr. Linda Ayade, Dr. Betta Edu and Dr. Magaret Opia for their excellent support and immense contribution to the growth of the College, matriculation lecture by Dr. Theresa A. Osaji and other goodwill messages from dignitaries.</p>', '2021-11-20 06:00:03', '2021-11-20', '2021-11-20 05:59:40', '2021-11-20 06:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'developer', '2021-11-20 05:18:57', '2021-11-20 05:18:57'),
(2, 'admin', 'admin', '2021-11-20 05:18:57', '2021-11-20 05:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `title`, `img`, `caption`, `sup_text`, `link`, `link_text`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Cross River State College of Nursing and Midwifery Sciences, Itigidi', 'castobubra-welcome-to-cross-river-state-college-of-nursing-and-midwifery-sciences-itigidi.jpg', 'Quality Education for quality text.', 'CONMSIT', 'https://conmsit.ng/about-us', 'Learn More', '2021-11-13 16:12:01', '2021-11-20 04:01:30'),
(2, 'Academic Blush and Bliss', 'castobubra-academic-blush-and-bliss.jpg', 'Serene Environment for a fulfilled academic experience', 'CONMSIT', 'https://conmsit.ng/sug', 'Join Us', '2021-11-13 16:31:27', '2021-11-20 04:02:29'),
(3, 'We equip for the right skills', 'castobubra-we-equip-for-the-right-skills.jpg', 'At CONMSIT, we train the student for better patient health management', 'Learn & Achieve', 'https://conmsit.ng/sug', 'Join Us', '2021-11-13 16:23:45', '2021-11-20 04:01:58'),
(4, 'Student Community', 'castobubra-student-community.jpg', 'Equipping tomorrow\'s leaders through student union government', 'SUG', 'https://conmsit.ng/sug', 'Learn More', '2021-11-13 16:41:04', '2021-11-20 04:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_communities`
--

CREATE TABLE `student_communities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_communities`
--

INSERT INTO `student_communities` (`id`, `unique_id`, `title`, `content`, `img`, `created_at`, `updated_at`) VALUES
(1, 'VyfMUfn4CG', 'FACE OF CONMSIT 2021', 'I welcome us all back from the short break. Let us remember to take our studies serious as this is the main reason we\'re here. Wish you the best. Nurse Chidima', 'castobubra-img.jpg', '2021-11-20 05:19:00', '2021-11-20 09:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `student_news_bars`
--

CREATE TABLE `student_news_bars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_news_bars`
--

INSERT INTO `student_news_bars` (`id`, `unique_id`, `news`, `created_at`, `updated_at`) VALUES
(1, 'DoTTECs88JZSesXC5KOh', 'Welcome back to campus. Aluta Continua, Victoria Ascerta', '2021-11-13 17:02:02', '2021-11-13 17:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_slides`
--

CREATE TABLE `student_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_slides`
--

INSERT INTO `student_slides` (`id`, `unique_id`, `content`, `names`, `role`, `location`, `img`, `created_at`, `updated_at`) VALUES
(1, 'aDgQO5WkcRHMeTlKQ9kJ', '<p>&nbsp;welcome &nbsp;back from the short break,<br>Stay tuned for updates.</p><p>&nbsp;<i><strong>Aluta Continua, Victoria Ascerta</strong></i></p>', 'Shedrach', 'SUG President', 'CONMSIT', 'castobubra-adgqo5wkcrhmetlkq9kj.jpg', '2021-11-13 17:15:02', '2021-11-20 09:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_lists`
--

CREATE TABLE `subscriber_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriber_lists`
--

INSERT INTO `subscriber_lists` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'victoridu2019@gmail.com', '2021-11-21 19:26:15', '2021-11-21 19:26:15', NULL),
(2, 'praiseobasse@gmail.com', '2021-12-01 11:40:14', '2021-12-01 11:40:14', NULL),
(3, 'edwinanthony001@gmail.com', '2022-02-04 03:02:07', '2022-02-04 03:02:07', NULL),
(4, 'irinamdavid@gmail.com', '2022-03-07 03:30:50', '2022-03-07 03:30:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sug_contacts`
--

CREATE TABLE `sug_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by` bigint(20) UNSIGNED DEFAULT NULL,
  `is_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sug_excos`
--

CREATE TABLE `sug_excos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sug_excos`
--

INSERT INTO `sug_excos` (`id`, `order`, `names`, `position`, `image`, `email`, `facebook_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comr.Egu Shadrach Kingsley', 'CONMSIT SUG PRESIDENT', 'castobubra-comr-shadrack.png', NULL, NULL, NULL, NULL, NULL, '2021-11-20 07:42:27', '2021-11-20 08:15:25'),
(2, 2, 'RT.Comr.Victor Abang Idu', 'NATIONAL PRESIDENT NANSNM', 'castobubra-rtcomrvictor-abang-idu.png', NULL, NULL, NULL, NULL, NULL, '2021-11-20 07:52:24', '2021-11-20 07:52:24'),
(3, 3, 'Demben Irene Mnabg', 'ASS.SECRETARY GENERAL', 'castobubra-demben-irene-mnabg.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-20 07:56:06', '2021-11-20 07:56:06'),
(4, 4, 'Bassey Favour Sunday', 'FINANCIAL SECRETARY', 'castobubra-bassey-favour-sunday.png', NULL, NULL, NULL, NULL, NULL, '2021-11-20 07:58:38', '2021-11-20 07:58:38'),
(5, 5, 'Mercy Itoro Eno', 'DIRECTOR OF WELFARE 1', 'castobubra-mercy-itoro-eno.png', NULL, NULL, NULL, NULL, NULL, '2021-11-20 08:01:41', '2021-11-24 15:12:11'),
(7, 6, 'Winifred Emmanuel', 'AUDITOR GENERAL', 'castobubra-winifred-emmanuel.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-20 08:17:56', '2021-11-20 08:17:56'),
(8, 7, 'Esther Edet Ukpung', 'DIRECTOR OF SPORTS 2', 'castobubra-esther-edet-ukpung.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-20 08:25:34', '2021-11-20 08:25:34'),
(9, 8, 'Hyacintha Ikpi Ibiang', 'DIRECTOR OF WELFARE 2', 'castobubra-hyacintha-ikpi-ibiang.png', NULL, NULL, NULL, NULL, NULL, '2021-11-20 08:26:59', '2021-11-20 08:26:59'),
(10, 9, 'Enya Samuel Elemi', 'SECRETARY GENERAL', 'castobubra-enya-samuel-elemi.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-24 15:14:52', '2021-11-24 15:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `sug_settings`
--

CREATE TABLE `sug_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sug@conmsit.ng',
  `mobile_no_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+2348142209083',
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sug_settings`
--

INSERT INTO `sug_settings` (`id`, `email`, `mobile_no_1`, `facebook_url`, `twitter_url`, `instagram_url`, `youtube_url`, `created_at`, `updated_at`) VALUES
(1, 'sug@conmsit.ng', '+2348142209083', NULL, NULL, NULL, NULL, '2021-11-20 05:19:00', '2021-11-20 05:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fiat_base_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NGN',
  `registration_amount` decimal(10,2) NOT NULL DEFAULT 15000.00,
  `app_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://conmsit.ng',
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cross River State College of Nursing and Midwifery Sciences',
  `app_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info@conmsit.ng',
  `app_mobile_no_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+2348142209083',
  `app_mobile_no_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'College Of Nursing ITIGIDI, ABI LGA, Cross River State, Nigeria',
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Africa/Lagos',
  `app_debug` tinyint(1) NOT NULL DEFAULT 0,
  `mail_mailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'smtp',
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nl1-sr11.supercp.com',
  `mail_port` int(11) NOT NULL DEFAULT 2525,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mediatr2',
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'a2password@2021',
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tls',
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_live` tinyint(1) NOT NULL DEFAULT 0,
  `is_registration_on` tinyint(1) NOT NULL DEFAULT 0,
  `is_website_locked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `fiat_base_currency`, `registration_amount`, `app_url`, `app_name`, `app_email`, `app_mobile_no_1`, `app_mobile_no_2`, `app_location`, `timezone`, `app_debug`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `facebook_url`, `twitter_url`, `instagram_url`, `youtube_url`, `is_live`, `is_registration_on`, `is_website_locked`, `created_at`, `updated_at`) VALUES
(1, 'NGN', '15000.00', 'https://conmsit.ng', 'Cross River State College of Nursing and Midwifery Sciences', 'info@conmsit.ng', '+2348142209083', '+2348138671145', 'College Of Nursing ITIGIDI, ABI LGA, Cross River State, Nigeria', 'Africa/Lagos', 0, 'smtp', 'nl1-sr11.supercp.com', 2525, 'mediatr2', 'a2password@2021', 'tls', NULL, NULL, NULL, NULL, 0, 1, 0, '2021-11-20 05:19:00', '2022-04-23 18:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'academics', 'Academics', '2021-11-20 05:59:40', '2021-11-20 05:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'CONMSIT Admin', 'admin@conmsit.ng', '2021-11-20 05:18:59', '$2y$10$3DQAHkuGbgIi2ErH07fyGO0kN8C1i8qWfmXSwXZocdNVqMSTUdpS2', NULL, '2021-11-20 05:18:59', '2021-11-20 05:18:59'),
(2, 1, 'Isaac Ekabua', 'izyekabs@gmail.com', '2021-11-20 05:18:59', '$2y$10$Ks/Ah9pLkaL0CC.SwbRIsuPHpS7m5QMUcQqGsVFxMi/CrNc7L19B6', 'NXguUYEu5iiVwWtJ44m4bpNeD2EbYiU4unWBjFE78ucnC1StT6VYGjGfE6iX', '2021-11-20 05:18:59', '2021-11-20 05:18:59'),
(3, 1, 'Bernode Limited', 'bernodelimited@gmail.com', '2021-11-20 05:18:59', '$2y$10$1EygHBhXL2l7.P6Pz8SREekPsP1ANK2FIUJ7eZUnWiQYXGB5naVTe', NULL, '2021-11-20 05:18:59', '2021-11-20 05:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_info`
--

CREATE TABLE `user_login_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login_info`
--

INSERT INTO `user_login_info` (`id`, `user_id`, `ip_address`, `system`, `browser`, `created_at`, `updated_at`) VALUES
(1, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 05:34:51', '2021-11-20 05:34:51'),
(2, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 05:40:34', '2021-11-20 05:40:34'),
(3, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 05:55:55', '2021-11-20 05:55:55'),
(4, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 06:47:12', '2021-11-20 06:47:12'),
(5, 3, '129.205.113.22', 'Linux', 'Chrome', '2021-11-20 06:51:14', '2021-11-20 06:51:14'),
(6, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 07:07:53', '2021-11-20 07:07:53'),
(7, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 07:40:32', '2021-11-20 07:40:32'),
(8, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 07:46:44', '2021-11-20 07:46:44'),
(9, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 08:12:46', '2021-11-20 08:12:46'),
(10, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 08:34:35', '2021-11-20 08:34:35'),
(11, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 08:35:20', '2021-11-20 08:35:20'),
(12, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 09:07:16', '2021-11-20 09:07:16'),
(13, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 09:27:32', '2021-11-20 09:27:32'),
(14, 2, '105.112.50.9', 'Windows 10', 'Chrome', '2021-11-20 09:28:20', '2021-11-20 09:28:20'),
(15, 3, '129.205.113.24', 'Linux', 'Chrome', '2021-11-21 04:14:56', '2021-11-21 04:14:56'),
(16, 2, '197.210.226.72', 'Windows 10', 'Chrome', '2021-11-24 14:57:23', '2021-11-24 14:57:23'),
(17, 2, '197.210.79.84', 'Windows 10', 'Chrome', '2021-12-14 08:12:20', '2021-12-14 08:12:20'),
(18, 3, '197.210.227.203', 'Linux', 'Chrome', '2022-04-23 08:54:59', '2022-04-23 08:54:59'),
(19, 2, '197.211.58.182', 'Windows 10', 'Chrome', '2022-04-23 13:41:29', '2022-04-23 13:41:29'),
(20, 3, '127.0.0.1', 'Linux', 'Chrome', '2022-04-23 17:05:17', '2022-04-23 17:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `website_news_bars`
--

CREATE TABLE `website_news_bars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_news_bars`
--

INSERT INTO `website_news_bars` (`id`, `unique_id`, `news`, `created_at`, `updated_at`) VALUES
(1, 'msCNFxtzPfSMV4xfFM1u', 'Welcome from the short break, Activities resume on Monday, 15th November 2021', '2021-11-13 16:04:34', '2021-11-13 16:04:34'),
(2, 'oauzyoJY5XhAbB51NQTh', 'Admission is currently closed', '2021-11-13 16:05:17', '2021-11-13 16:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `welcome_sections`
--

CREATE TABLE `welcome_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welcome_sections`
--

INSERT INTO `welcome_sections` (`id`, `slug`, `main_image`, `sub_image`, `title`, `sup_text`, `description`, `url`, `created_at`, `updated_at`) VALUES
(1, 'hello-from-provost', 'castobubra-from-the-provost-desk-main-image.jpg', 'castobubra-from-the-provost-desk-sub-image.jpg', 'From the Provost desk', 'Hello from the Provost', '<p>I welcome you all to the 2020/2021 academic session on behalf of the council and management of&nbsp;the College of Nursing and Midwifery Sciences Itigidi. The current administration will continue to make conscious efforts&nbsp;to ensure a conducive learning environment and make your work enjoyable while integrating information&nbsp;technology for effective teaching and learning. Our mission and vision are to produce value-driven and&nbsp;purposeful nurses who are recognized for their character and practice as we build a community&nbsp;based on the harmonious co-existence of staff and students. If we work together, we can make our college the envy of all other&nbsp;colleges in the state, and thus the entire country. While we wish you a fruitful and rewarding stay at the college, we are confident that your academic goals will be met. On behalf of the Management, I cordially invite you all to a fruitful session.</p><p><strong>Mrs Ruth Ebong</strong><br><strong>Provost</strong><br><strong>College of Nursing and Midwifery Sciences Itigidi.</strong></p>', NULL, '2021-11-13 14:17:45', '2021-11-20 06:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `wise_talks`
--

CREATE TABLE `wise_talks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wise_talks`
--

INSERT INTO `wise_talks` (`id`, `author`, `source`, `quote`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lewis Carroll', 'Alice in Wonderland', 'My dear, here we must run as fast as we can, just to stay in place. And if you wish to go anywhere you must run twice as fast as that.', '2021-11-20 05:19:00', '2021-11-20 05:19:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_boards`
--
ALTER TABLE `academic_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_of_trustees`
--
ALTER TABLE `board_of_trustees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `coming_soon_slider_images`
--
ALTER TABLE `coming_soon_slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_unique_id_unique` (`unique_id`),
  ADD KEY `contacts_read_by_foreign` (`read_by`);

--
-- Indexes for table `c_t_a_s`
--
ALTER TABLE `c_t_a_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_t_a_s_unique_id_unique` (`unique_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_user_id_foreign` (`user_id`);

--
-- Indexes for table `gridnox_contacts`
--
ALTER TABLE `gridnox_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gridnox_contacts_unique_id_unique` (`unique_id`),
  ADD KEY `gridnox_contacts_read_by_foreign` (`read_by`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_alerts`
--
ALTER TABLE `news_alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_alerts_unique_id_unique` (`unique_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_communities`
--
ALTER TABLE `student_communities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_communities_unique_id_unique` (`unique_id`);

--
-- Indexes for table `student_news_bars`
--
ALTER TABLE `student_news_bars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_news_bars_unique_id_unique` (`unique_id`);

--
-- Indexes for table `student_slides`
--
ALTER TABLE `student_slides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_slides_unique_id_unique` (`unique_id`);

--
-- Indexes for table `subscriber_lists`
--
ALTER TABLE `subscriber_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriber_lists_email_unique` (`email`);

--
-- Indexes for table `sug_contacts`
--
ALTER TABLE `sug_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sug_contacts_unique_id_unique` (`unique_id`),
  ADD KEY `sug_contacts_read_by_foreign` (`read_by`);

--
-- Indexes for table `sug_excos`
--
ALTER TABLE `sug_excos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sug_settings`
--
ALTER TABLE `sug_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_post_id_foreign` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_login_info`
--
ALTER TABLE `user_login_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_login_info_user_id_foreign` (`user_id`);

--
-- Indexes for table `website_news_bars`
--
ALTER TABLE `website_news_bars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `website_news_bars_unique_id_unique` (`unique_id`);

--
-- Indexes for table `welcome_sections`
--
ALTER TABLE `welcome_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `welcome_sections_slug_unique` (`slug`);

--
-- Indexes for table `wise_talks`
--
ALTER TABLE `wise_talks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_boards`
--
ALTER TABLE `academic_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board_of_trustees`
--
ALTER TABLE `board_of_trustees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coming_soon_slider_images`
--
ALTER TABLE `coming_soon_slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `c_t_a_s`
--
ALTER TABLE `c_t_a_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gridnox_contacts`
--
ALTER TABLE `gridnox_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news_alerts`
--
ALTER TABLE `news_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_communities`
--
ALTER TABLE `student_communities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_news_bars`
--
ALTER TABLE `student_news_bars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_slides`
--
ALTER TABLE `student_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriber_lists`
--
ALTER TABLE `subscriber_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sug_contacts`
--
ALTER TABLE `sug_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sug_excos`
--
ALTER TABLE `sug_excos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sug_settings`
--
ALTER TABLE `sug_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login_info`
--
ALTER TABLE `user_login_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `website_news_bars`
--
ALTER TABLE `website_news_bars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `welcome_sections`
--
ALTER TABLE `welcome_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wise_talks`
--
ALTER TABLE `wise_talks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_read_by_foreign` FOREIGN KEY (`read_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gridnox_contacts`
--
ALTER TABLE `gridnox_contacts`
  ADD CONSTRAINT `gridnox_contacts_read_by_foreign` FOREIGN KEY (`read_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sug_contacts`
--
ALTER TABLE `sug_contacts`
  ADD CONSTRAINT `sug_contacts_read_by_foreign` FOREIGN KEY (`read_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_login_info`
--
ALTER TABLE `user_login_info`
  ADD CONSTRAINT `user_login_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
