-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 05:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cfood`
--

CREATE TABLE `cfood` (
  `item_id` int(11) NOT NULL,
  `foodname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varbinary(1) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cfood`
--

INSERT INTO `cfood` (`item_id`, `foodname`, `quantity`, `price`, `status`, `email`) VALUES
(11, 'Kiwi', 10, '260.00', 0x52, 'ram123@gmail.com'),
(12, 'Kiwi', 12, '312.00', 0x41, 'ram123@gmail.com'),
(13, 'Potato', 50, '2157.50', 0x41, 'ram123@gmail.com'),
(14, 'Potato', 10, '431.50', 0x52, 'ram123@gmail.com'),
(15, 'Apple', 55, '2200.00', 0x4e, 'ram123@gmail.com'),
(16, 'strawberry', 1, '67.00', 0x4e, 'ram123@gmail.com'),
(17, 'Pea', 12, '561.00', 0x4e, 'ram123@gmail.com'),
(18, 'Kiwi', 6, '156.00', 0x4e, 'ram123@gmail.com'),
(19, 'Onion', 3, '46.32', 0x4e, 'ram123@gmail.com'),
(20, 'Grapes', 5, '210.00', 0x4e, 'ram123@gmail.com'),
(21, 'Apple', 10, '400.00', 0x4e, 'ram123@gmail.com'),
(22, 'Strawberry', 10, '408.70', 0x41, 'ram123@gmail.com'),
(23, 'Onion', 5, '77.20', 0x4e, 'ram123@gmail.com'),
(24, 'Apple', 50, '2000.00', 0x41, 'rohit123@gmail.com'),
(25, 'Pea', 20, '935.00', 0x4e, 'rohit123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(4, 'Vaibhav Mishra', 'vm1986734@gmail.com', 'Hello Mishra ji.', '2024-10-05 17:34:24'),
(5, 'Vartika', 'vartika.2226it1208@kiet.edu', 'Awesome, working flow module.', '2024-10-10 17:52:59'),
(6, 'John Doe', 'john@example.com', 'Hello!', '2024-10-10 19:52:32'),
(7, 'Jane Smith', 'jane@example.com', 'Hi there!', '2024-10-10 19:52:32'),
(8, 'Alice Brown', 'alice@example.com', 'Good day!', '2024-10-10 19:52:32'),
(9, 'Bob Johnson', 'bob@example.com', 'How are you?', '2024-10-10 19:52:32'),
(10, 'Charlie Davis', 'charlie@example.com', 'Greetings!', '2024-10-10 19:52:32'),
(11, 'Diana Prince', 'diana@example.com', 'Nice to meet you!', '2024-10-10 19:52:32'),
(12, 'Eve Adams', 'eve@example.com', 'Just checking in!', '2024-10-10 19:52:32'),
(13, 'Frank Castle', 'frank@example.com', 'What’s up?', '2024-10-10 19:52:32'),
(14, 'Grace Lee', 'grace@example.com', 'Hope all is well!', '2024-10-10 19:52:32'),
(15, 'Hank Pym', 'hank@example.com', 'Looking forward to your reply!', '2024-10-10 19:52:32'),
(16, 'Ivy Wilson', 'ivy@example.com', 'How’s it going?', '2024-10-10 19:52:32'),
(17, 'Jack Daniels', 'jack@example.com', 'Let’s catch up!', '2024-10-10 19:52:32'),
(18, 'Kelly Green', 'kelly@example.com', 'Have a question!', '2024-10-10 19:52:32'),
(19, 'Leo White', 'leo@example.com', 'Need some help!', '2024-10-10 19:52:32'),
(20, 'Mia Black', 'mia@example.com', 'Just a quick note!', '2024-10-10 19:52:32'),
(21, 'Nina Blue', 'nina@example.com', 'Thanks for your support!', '2024-10-10 19:52:32'),
(22, 'Oscar Gold', 'oscar@example.com', 'Looking forward to hearing from you!', '2024-10-10 19:52:32'),
(23, 'Paula Red', 'paula@example.com', 'Sending good vibes!', '2024-10-10 19:52:32'),
(24, 'Quincy Silver', 'quincy@example.com', 'Here’s my message!', '2024-10-10 19:52:32'),
(25, 'Rachel Pink', 'rachel@example.com', 'Excited to connect!', '2024-10-10 19:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `food_quality` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `food_quality`, `comments`, `submission_date`) VALUES
(1, 'Vaibhav Mishra', 'vaibhav.2226it1218@kiet.edu', 1, 'Hello!...', '2024-10-14 15:41:08'),
(2, 'Arnav', 'arna23@gmail.com', 2, 'jvjvvjvjcvjhcvdc', '2024-10-14 15:42:21'),
(6, 'Vartika', 'vartika.2226it1208@kiet.edu', 5, 'bjsbcbsdcsjc b sdbcbdcsdjbcsdbcs', '2024-10-14 18:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `foodrates`
--

CREATE TABLE `foodrates` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `amount` decimal(5,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `water_used` decimal(10,2) DEFAULT NULL,
  `energy_used` decimal(10,2) DEFAULT NULL,
  `distance` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodrates`
--

INSERT INTO `foodrates` (`item_id`, `item_name`, `amount`, `rate`, `water_used`, `energy_used`, `distance`) VALUES
(33, 'Kiwi', '2.00', '26.00', '50.00', '60.00', '90.00'),
(34, 'Apple', '200.00', '40.00', '200.00', '200.00', '50.00'),
(35, 'Potato', '150.00', '43.15', '31.50', '200.00', '150.00'),
(36, 'Pea', '23.00', '46.75', '67.50', '200.00', '150.00'),
(37, 'Onion', '50.00', '15.44', '47.40', '54.00', '40.00'),
(38, 'Guava', '10.00', '43.09', '121.90', '2.00', '154.00'),
(39, 'Grapes', '75.00', '420.00', '0.00', '400.00', '2000.00'),
(40, 'Strawberry', '10.00', '40.87', '175.20', '67.00', '100.00'),
(41, 'Carrot', '50.00', '18.45', '24.50', '120.00', '50.00'),
(42, 'Sweet Potato', '50.00', '18.45', '24.50', '120.00', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `distance_traveled` decimal(10,2) DEFAULT NULL,
  `energy_consumed` decimal(10,2) DEFAULT NULL,
  `waste_generated` decimal(5,2) DEFAULT NULL,
  `carbon_emission` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`item_id`, `item_name`, `distance_traveled`, `energy_consumed`, `waste_generated`, `carbon_emission`) VALUES
(1, 'Apples', '50.00', '12.50', '5.00', '1.50'),
(2, 'Bananas', '1000.00', '25.00', '7.00', '20.00'),
(3, 'Carrots', '30.00', '8.00', '3.00', '0.80'),
(4, 'Tomatoes', '200.00', '15.50', '2.00', '5.40'),
(5, 'Potatoes', '20.00', '5.50', '6.00', '0.50'),
(6, 'Oranges', '1500.00', '30.00', '8.00', '30.00'),
(7, 'Broccoli', '60.00', '10.00', '2.50', '1.20'),
(8, 'Lettuce', '40.00', '7.00', '1.50', '0.60'),
(9, 'Strawberries', '1200.00', '20.00', '9.00', '25.00'),
(10, 'Grapes', '80.00', '13.00', '4.00', '2.80');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` enum('admin','farmer','supplier','consumer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `contact`, `email`, `address`, `role`) VALUES
(1, 'Vaibhav Mishra', '$2y$10$/aiQRwlTMTibTLx22BJLTOuKSj.eN.FsNQ14iovoxQz/lZH5H6AZi', '6393026050', 'vm1986734@gmail.com', '123,Sultanpur', 'admin'),
(2, 'Shubham Prajapati', '$2y$10$/aiQRwlTMTibTLx22BJLTOuKSj.eN.FsNQ14iovoxQz/lZH5H6AZi', '1234567890', 'shubham.2226it1213@gmail.com', '234, Barabanki', 'farmer'),
(4, 'Raja', '$2y$10$/aiQRwlTMTibTLx22BJLTOuKSj.eN.FsNQ14iovoxQz/lZH5H6AZi', '4567890123', 'raja123@gmail.com', '890, m.p.', 'consumer'),
(9, 'Ram Kumar', '$2y$10$/aiQRwlTMTibTLx22BJLTOuKSj.eN.FsNQ14iovoxQz/lZH5H6AZi', '1234567890', 'ram123@gmail.com', 'Narahi, Bhanti, Sultanpur', 'consumer'),
(12, 'Raju', '$2y$10$/aiQRwlTMTibTLx22BJLTOuKSj.eN.FsNQ14iovoxQz/lZH5H6AZi', '1234567890', 'raju@gmail.com', 'MS Tyagi Hostel, Shivam Vihar Colony', 'farmer'),
(13, 'rohit', '$2y$10$/aiQRwlTMTibTLx22BJLTOuKSj.eN.FsNQ14iovoxQz/lZH5H6AZi', '1234567890', 'rohit123@gmail.com', 'MS Tyagi Hostel, Shivam Vihar Colony', 'consumer');

-- password in hashcode format //---  "123" password for all user
-- Indexes for dumped tables
--

--
-- Indexes for table `cfood`
--
ALTER TABLE `cfood`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodrates`
--
ALTER TABLE `foodrates`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`item_id`);

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
-- AUTO_INCREMENT for table `cfood`
--
ALTER TABLE `cfood`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foodrates`
--
ALTER TABLE `foodrates`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
