-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 12:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'user.png',
  `blood_group` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adminname`, `password`, `firstname`, `lastname`, `gender`, `birthday`, `email`, `contact`, `address`, `city`, `zip`, `image`, `blood_group`) VALUES
(1, 'rezwana', '123456', 'Rezwana', 'Karim', 'Female', '1998-12-01', 'rezwana123@gmail.com', '12121212121', 'mohammadpur', 'dhaka', '1207', '12.jpg', 'B+(ve)');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_name` varchar(250) NOT NULL,
  `reply_img` varchar(250) NOT NULL,
  `reply_message` varchar(500) NOT NULL,
  `reply_date` varchar(250) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fosters`
--

CREATE TABLE `fosters` (
  `foster_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'user.png',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `fostername` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `fee` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `about` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fosters`
--

INSERT INTO `fosters` (`foster_id`, `image`, `firstname`, `lastname`, `fostername`, `email`, `password`, `gender`, `birthday`, `blood_group`, `contact`, `address`, `city`, `zip`, `nid`, `fee`, `status`, `about`) VALUES
(10001, 'test2.jpg', 'Afsana', 'Begum', 'afsana6', 'afsana6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '1998-06-19', 'A+ (ve)', '2345678911', 'Dhanmondi', 'Dhaka', '1209', '654321', 400, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `foster_appointment`
--

CREATE TABLE `foster_appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `foster_id` int(11) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `foster_image` varchar(250) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `foster_name` varchar(50) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foster_appointment`
--

INSERT INTO `foster_appointment` (`appointment_id`, `user_id`, `foster_id`, `user_image`, `foster_image`, `user_name`, `foster_name`, `pet_name`, `date`, `time`, `contact`, `email`, `message`, `status`) VALUES
(2, 9, 10001, 'test2.jpg', 'test2.jpg', 'afsana', 'Afsana Begum', 'sam', '2022-09-30', '12:17', '01994034918', 'rezwana12@gmail.com', 'take care of my pet.', 0),
(3, 8, 10001, '12.jpg', 'test2.jpg', 'rezwana', 'Afsana Begum', 'saif sunny', '2022-09-29', '23:46', '01624034918', 'saifsunny56@gmail.com', 'sa', 0),
(4, 8, 10001, '12.jpg', 'test2.jpg', 'rezwana', 'Afsana Begum', 'saif sunnyaa', '2022-10-20', '23:50', '01624034918', 'saifsunny56@gmail.com', 'aa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_user_name` varchar(250) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `post_category` varchar(250) NOT NULL,
  `post_img` varchar(250) NOT NULL,
  `post_details` varchar(250) NOT NULL,
  `pet_age` varchar(250) DEFAULT NULL,
  `disabilities` varchar(20) DEFAULT NULL,
  `is_trained` varchar(20) DEFAULT NULL,
  `vaccinated` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_user_name`, `post_title`, `post_date`, `post_category`, `post_img`, `post_details`, `pet_age`, `disabilities`, `is_trained`, `vaccinated`) VALUES
(12, 8, 'rezwana', 'Dog for Adoption', '2022-09-29', 'Adoption', '33.jpg', 'I found this dog and want some one to adopt it. I live in Mohammadpur', '2 month', 'No', 'No', 'No'),
(14, 8, 'rezwana', 'For Adoption', '2022-09-30', 'Adoption', '13.jpg', 'my cat gave birth to this adorable kitten i want somebody to adopt it.', '2 week', 'No', 'No', 'No'),
(15, 10001, 'afsana6', 'f', '2022-10-01', 'Petcare', 'maxresdefault.jpg', 'f', '', '', '', ''),
(16, 10001, 'afsana6', 'f', '2022-10-02', 'Adoption', '33.jpg', 'd', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commenter_img` varchar(250) NOT NULL,
  `commenter_name` varchar(250) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `comment_date` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `stat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`comment_id`, `post_id`, `user_id`, `commenter_img`, `commenter_name`, `comment`, `comment_date`, `role`, `stat`) VALUES
(33, 14, 8, '12.jpg', 'rezwana', 'gga', '2022-10-01 02:13:00pm', 0, 0),
(34, 14, 8, '12.jpg', 'rezwana', 'gga', '2022-10-01 02:45:08pm', 0, 0),
(35, 14, 8, '12.jpg', 'rezwana', 'gga', '2022-10-01 02:48:33pm', 0, 0),
(36, 14, 8, '12.jpg', 'rezwana', 'gga', '2022-10-01 02:48:44pm', 0, 0),
(41, 12, 8, '12.jpg', 'rezwana', 'I want to adopt', '2022-10-10 10:51:03pm', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `sl` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`sl`, `image`, `name`, `role`) VALUES
(25, '12.jpg', 'rezwana', 'Admin'),
(26, '12.jpg', 'rezwana', 'Admin'),
(27, '12.jpg', 'rezwana', 'User'),
(28, '4.jpg', 'joynul', 'Vet'),
(29, '12.jpg', 'rezwana', 'User'),
(30, 'test2.jpg', 'afsana6', 'Foster'),
(31, '12.jpg', 'rezwana', 'User'),
(32, '4.jpg', 'joynul', 'Vet'),
(33, 'test2.jpg', 'afsana', 'User'),
(34, '12.jpg', 'rezwana', 'User'),
(35, 'test2.jpg', 'afsana', 'User'),
(36, '12.jpg', 'rezwana', 'User'),
(37, 'test2.jpg', 'afsana', 'User'),
(38, '12.jpg', 'rezwana', 'User'),
(39, 'test2.jpg', 'afsana6', 'Foster'),
(40, '4.jpg', 'joynul', 'Vet'),
(41, '12.jpg', 'rezwana', 'Admin'),
(42, '12.jpg', 'rezwana', 'Admin'),
(43, '2.jpg', 'sunny56', 'Vet'),
(44, '12.jpg', 'rezwana', 'Admin'),
(45, '12.jpg', 'rezwana', 'Admin'),
(46, '12.jpg', 'rezwana', 'User'),
(47, 'test2.jpg', 'afsana6', 'Foster'),
(48, '12.jpg', 'rezwana', 'Admin'),
(49, 'test2.jpg', 'afsana6', 'Foster'),
(50, '12.jpg', 'rezwana', 'User'),
(51, 'test2.jpg', 'afsana6', 'Foster'),
(52, '4.jpg', 'joynul', 'Vet'),
(53, '3.jpg', 'nizim', 'Vet'),
(54, '12.jpg', 'rezwana', 'User'),
(55, '3.jpg', 'nizim', 'Vet'),
(56, 'test2.jpg', 'afsana6', 'Foster'),
(57, 'test2.jpg', 'afsana6', 'Foster'),
(58, '3.jpg', 'nizim', 'Vet'),
(59, '12.jpg', 'rezwana', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'user.png',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `image`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`, `birthday`, `blood_group`, `contact`, `address`, `city`, `zip`) VALUES
(8, '12.jpg', 'Rezwana', 'Karim', 'rezwana', 'rezwana12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '1998-07-08', 'A+ (ve)', '01924034918', 'Mirpur', 'Dhaka', '1205'),
(9, 'test2.jpg', 'Afsana', 'Begum', 'afsana', 'afsanabegum@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '1989-11-07', 'B+(ve)', '1234567890', 'Dhanmondi', 'Dhaka', '1209'),
(10, 'user.png', '', '', 'sunny56', 'saifsunny56@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vets`
--

CREATE TABLE `vets` (
  `vet_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `reg_id` varchar(50) NOT NULL,
  `education1` varchar(50) NOT NULL,
  `education2` varchar(50) NOT NULL,
  `year1` varchar(50) NOT NULL,
  `year2` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `about` varchar(250) NOT NULL,
  `clinic_name` varchar(250) NOT NULL,
  `clinic_address` varchar(100) NOT NULL,
  `clinic_city` varchar(50) NOT NULL,
  `clinic_zip` varchar(50) NOT NULL,
  `vetname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join_date` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'user.png',
  `fee` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `blood_group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vets`
--

INSERT INTO `vets` (`vet_id`, `firstname`, `lastname`, `reg_id`, `education1`, `education2`, `year1`, `year2`, `gender`, `contact`, `about`, `clinic_name`, `clinic_address`, `clinic_city`, `clinic_zip`, `vetname`, `email`, `password`, `join_date`, `image`, `fee`, `status`, `blood_group`) VALUES
(20000, 'Tangin', 'Aeyasha', '1234567', 'M.B.B.S', 'M.D. Veterinary', '2014-01', '2017-11', 'Female', '1234567890', 'we love pets', 'Tangin pet clinic', 'Mohammadpur', 'Dhaka', '1207', 'tangin', 'tangin123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-09-29', '1.jpg', 400, 1, ''),
(20001, 'Nazim', 'Uddin', '321456', 'M.B.B.S', 'M.D. Veterinary', '2014-01', '2020-05', 'Male', ' 2345678911 ', 'we love pets', 'Nazim Pet COenter', 'Mirpur', 'Dhaka', '1205', 'nizim', 'nazimuddin123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-09-29', '3.jpg', 500, 1, 'O+ ve'),
(20002, 'Jounul', 'Abedin', '8765432', 'M.B.B.S', 'M.D. Veterinary', '2010-01', '2013-05', 'Male', '2345678911', 'A place to take care of all your pets.', '', 'Dhanmondi', 'Dhaka', '1209', 'joynul', 'joynul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-09-29', '4.jpg', 500, 1, 'O+ (ve)');

-- --------------------------------------------------------

--
-- Table structure for table `vet_appointment`
--

CREATE TABLE `vet_appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `vet_image` varchar(250) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `vet_name` varchar(50) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet_appointment`
--

INSERT INTO `vet_appointment` (`appointment_id`, `user_id`, `vet_id`, `user_image`, `vet_image`, `user_name`, `vet_name`, `pet_name`, `date`, `time`, `contact`, `email`, `message`, `status`) VALUES
(6, 9, 20000, 'test2.jpg', '1.jpg', 'afsana', 'Tangin Aeyasha', 'Sam', '2022-09-30', '16:00', '01994034918', 'rezwana12@gmail.com', 'My pet is Sick for few days', 0),
(7, 8, 20002, 'test1.jpg', '4.jpg', 'rezwana', 'Jounul Abedin', 'sam', '2022-10-01', '21:00', '01772034918', 'rezwana12@gmail.com', 'i need vaccine for my pet.', 1),
(8, 10001, 20001, 'test2.jpg', '3.jpg', 'afsana6', 'Nazim Uddin', 'eee', '2022-10-18', '13:41', '01624034918', 'saifsunny56@gmail.com', 'sdd', 0),
(9, 10001, 20001, 'test2.jpg', '3.jpg', 'afsana6', 'Nazim Uddin', 'saif sunny', '2022-11-04', '22:44', '01624034918', 'saifsunny56@gmail.com', 'gg', 0),
(10, 8, 20001, '12.jpg', '3.jpg', 'rezwana', 'Nazim Uddin', 'qa', '2022-10-19', '22:53', 'a', 'afsana.sharmin.cse@ulab.edu.bd', 'aa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `fosters`
--
ALTER TABLE `fosters`
  ADD PRIMARY KEY (`foster_id`);

--
-- Indexes for table `foster_appointment`
--
ALTER TABLE `foster_appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `foster_id` (`foster_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vets`
--
ALTER TABLE `vets`
  ADD PRIMARY KEY (`vet_id`);

--
-- Indexes for table `vet_appointment`
--
ALTER TABLE `vet_appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `vet_id` (`vet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_reply`
--
ALTER TABLE `comment_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `fosters`
--
ALTER TABLE `fosters`
  MODIFY `foster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `foster_appointment`
--
ALTER TABLE `foster_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vets`
--
ALTER TABLE `vets`
  MODIFY `vet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20005;

--
-- AUTO_INCREMENT for table `vet_appointment`
--
ALTER TABLE `vet_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD CONSTRAINT `comment_reply_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `post_comments` (`comment_id`);

--
-- Constraints for table `foster_appointment`
--
ALTER TABLE `foster_appointment`
  ADD CONSTRAINT `foster_appointment_ibfk_1` FOREIGN KEY (`foster_id`) REFERENCES `fosters` (`foster_id`),
  ADD CONSTRAINT `foster_appointment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `vet_appointment`
--
ALTER TABLE `vet_appointment`
  ADD CONSTRAINT `vet_appointment_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `vets` (`vet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
