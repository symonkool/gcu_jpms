-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 10:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `skills` text NOT NULL,
  `perks` text NOT NULL,
  `salary_min` int(11) NOT NULL,
  `salary_max` int(11) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `duration` enum('Full time','Part time') NOT NULL,
  `expires` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted` enum('no','yes') NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `company`, `location`, `description`, `responsibilities`, `skills`, `perks`, `salary_min`, `salary_max`, `contact_email`, `duration`, `expires`, `created_by`, `deleted`, `date_created`, `date_modified`) VALUES
(1, 'Project Officer or Software developer ', 'Growth Care Uganda ', 'Lira', 'The Project Officer/ Software developer overall goal will be to build, monitor efficient programs and systems that serve user needs through ensuring the initiation and integration of digital innovations with in the project; Support the development, expansion and implementation of digital interventions through training young people in Software development and incubation, Supporting young people develop innovative ideas and digital solutions with a focus on Youth Economic Empowerment interventions.  ', '<ul class=\'bullets\'><li>• Provide leadership and take lead in the implementation of the innovation hub.• Mobilize and support young people come up with innovation and digital solutions.• Training and mentorship of young people in digital technology and ICT• Develop innovative ideas for improvement of the hub and the project at large.• Produce/ Develop clean, efficient code based on specifications.• Support in servicing and maintenance of the project computers as well as Software installation and recommending required software with consultation from the technical lead. • Create technical documentation for reference and reporting• Develop and submit periodic activity work plans, monthly reports, budgets and related reports, to the supervisor as and when required.• Ensure high quality collaboration and coordination is maintained for effective and efficient implementation of Project interventions including non-digital enterprise</li></ul>', '<ul class=\'bullets\'><li>Bachelor’s degree in Information Technology or Computer science majoring in Programming, Business computing majoring in Programming, Software Engineering or a related field.</li><li>Proven experience as a Software Developer. At least two years of progressively professional work experience in design, implementation and evaluation of digital Innovations.</li><li>Proficiency with database management systems: SQL, MySQL.</li><li>Proficiency with code control using Git, Github, Gitlab, etc</li><li>Demonstratable skills in programming.</li><li>Familiarity with Agile development methodologies</li><li>Knowledge of coding languages (Php, C#, Java, JavaScript, Python) and frameworks (e.g. Git)</li><li>Ability to learn new languages and technologies</li><li>Experience in working with databases</li><li>Graphics design skills is added advantage.</li><li>Excellent coordination and organization skills with demonstrated experience working in an organization is an added advantage.</li><li>Demonstrated skills and experience in report writing and budget management.</li><li>Ability to Identify and synthesis best practices and lessons learned to promote knowledge management and sustainability.</li><li>Experience in working with youths.• Excellent communication (verbal and written) and interpersonal skills, with ability to work with people from diverse cultures• Strong computer skills and knowledge of Microsoft software including MS Word processing, Power point presentation, Excel spreadsheets, e-mail and web-based research. • Engages and works well with others outside the organization to build a better world for girls and all children.</li></ul>', '<ul class=\'bullets\'><li>Health Insurance</li></ul>', 5500000, 12000000, 'info@growthcareuganda.org', 'Full time', '2022-07-20', 13, 'yes', '2022-07-18 06:07:01', '2022-07-18 06:08:42'),
(2, 'DREAMS Data Entry Clerk', 'TASO UGANDA', 'Fort Portal', 'To ensure timely and correct entry of all DREAMS data into UDTS databases. The DREAMS Data Entry Clerk will carry out other duties relating to updating and validating DREAMS registers, provide support to peers on data entry using tablets, hard copy data archiving, alert teams on report submission guidelines and completeness and work closely with the M&E Specialist to ensure effective and efficient data entry into electronic data management systems.', '<ul class=\'bullets\'><li><ul class=\'bullets\'><li>• Verify completeness and accuracy of DREAMS data forms brought for entry• Carry out prompt and accurate data entry of all project data for DREAMS from static and outreach sites into the Uganda DREAMS tracking system</li></ul></li></ul>', '<ul class=\'bullets\'><li><ul class=\'bullets\'><li>• Computer knowledge in database management, spreadsheet, email, e• Skills in report writing• Familiar with public health facilities and willing in serve in such sett- 10 1• Ability to maintain confidentiality• Good communication skills• Good records management skills</li></ul></li></ul>', '<ul class=\'bullets\'><li><ul class=\'bullets\'><li>Gain Experience</li></ul></li></ul>', 50000, 500000, 'symonkool2@gmail.com', 'Full time', '2022-08-10', 14, 'no', '2022-07-18 15:52:20', '2022-07-18 15:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(3, 'Arua'),
(7, 'Bundibugyo'),
(11, 'Entebe'),
(4, 'Fort Portal'),
(2, 'Gulu'),
(12, 'Jinja'),
(1, 'Kampala'),
(6, 'Lira'),
(10, 'Masaka'),
(8, 'Mbale'),
(5, 'Mbarara'),
(13, 'Mukono'),
(9, 'Wakiso');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `role`, `date_created`, `date_modified`) VALUES
(13, 'rbrtmusabe@gmail.com', '45eaf5f1fc933819671555becebc6724', 'Bright Musa', 'User', '2022-07-18 04:43:36', '0000-00-00 00:00:00'),
(14, 'symonkool2@gmail.com', 'd29fae495247a51a2ad726d46619b4a7', 'Niwamanya Simon', 'User', '2022-07-18 12:56:41', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location` (`location`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
