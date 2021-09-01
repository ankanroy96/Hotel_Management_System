-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 12:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_admin`
--

CREATE TABLE `about_admin` (
  `id` int(10) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_admin`
--

INSERT INTO `about_admin` (`id`, `description`) VALUES
(1, 'Be inspired by the vibrancy surrounding our exquisite accommodation in Dhaka. Located at the heart of the City Center, our luxurious retreat offers a calming respite from hustle and bustle of downtown Dhaka, where contemporary comfort will refresh your senses. We welcome you with our plush rooms, modern amenities and a promise of peace in the heart at Pan Pacific Sonargaon Dhaka.');

-- --------------------------------------------------------

--
-- Table structure for table `all_checkin`
--

CREATE TABLE `all_checkin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `cindate` varchar(50) NOT NULL,
  `coutdate` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_no` int(11) NOT NULL,
  `size_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_checkin`
--

INSERT INTO `all_checkin` (`id`, `name`, `email`, `mobile`, `cindate`, `coutdate`, `room_type`, `room_no`, `size_type`) VALUES
(31, 'Oishy Roy', 'oishyroy07@gmail.com', 1556328739, '06/08/2021', '06/11/2021', 'Junior Suite', 1003, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `all_guest`
--

CREATE TABLE `all_guest` (
  `id` int(11) NOT NULL,
  `stay_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `AorC` varchar(10) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_num` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_guest`
--

INSERT INTO `all_guest` (`id`, `stay_id`, `name`, `AorC`, `id_type`, `id_num`, `mobile`) VALUES
(27, 31, 'Kamal Islam', 'a', 'Passport', 'gshe6464j', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_room`
--

CREATE TABLE `book_room` (
  `id` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `cindate` varchar(50) NOT NULL,
  `coutdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_room`
--

INSERT INTO `book_room` (`id`, `room`, `cindate`, `coutdate`) VALUES
(77, 2006, '06/11/2021', '06/22/2021'),
(78, 2005, '06/11/2021', '06/22/2021');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `room` int(11) NOT NULL,
  `price` double NOT NULL,
  `cindate` varchar(100) NOT NULL,
  `coutdate` varchar(100) NOT NULL,
  `etime` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `confirm_food`
--

CREATE TABLE `confirm_food` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_food`
--

INSERT INTO `confirm_food` (`id`, `order_id`, `food_name`, `category`, `quantity`, `price`, `total_price`) VALUES
(21, 31, 'Shiitake crackling sushi', 'Signature Sushi', 2, 1125, 2250),
(22, 31, 'Arrabiatta', 'Pasta', 2, 855, 1710),
(23, 31, 'Kamal kakdi kebab', 'Indian', 2, 540, 1080);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `google` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `mobile`, `email`, `facebook`, `twitter`, `google`, `address`) VALUES
(1, '01787654321', 'info@sunrise.com', 'https://www.facebook.com/', 'https://www.google.com/', 'https://twitter.com/', '55/6 K.K. road, Motijheel, Dhaka ');

-- --------------------------------------------------------

--
-- Table structure for table `context_admin`
--

CREATE TABLE `context_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `context_admin`
--

INSERT INTO `context_admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `current_checkin`
--

CREATE TABLE `current_checkin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `cindate` varchar(50) NOT NULL,
  `coutdate` varchar(50) NOT NULL,
  `total_days` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_no` int(11) NOT NULL,
  `size_type` varchar(50) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `rent` double NOT NULL,
  `advance` double NOT NULL,
  `pay_mathod` varchar(50) NOT NULL,
  `mail_status` int(11) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_checkin`
--

INSERT INTO `current_checkin` (`id`, `name`, `email`, `mobile`, `cindate`, `coutdate`, `total_days`, `room_type`, `room_no`, `size_type`, `adult`, `child`, `rent`, `advance`, `pay_mathod`, `mail_status`, `code`) VALUES
(30, 'Ankan Roy', 'topu@gmail.com', '015213253787', '06/07/2021', '06/09/2021', 2, 'Junior Suite', 3003, 'Tripple', 3, 2, 13500, 7087.5, 'reception', 0, '22ff0fb361c676');

-- --------------------------------------------------------

--
-- Table structure for table `current_guest`
--

CREATE TABLE `current_guest` (
  `id` int(11) NOT NULL,
  `stay_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `AorC` varchar(10) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_num` varchar(100) NOT NULL,
  `mobile` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_guest`
--

INSERT INTO `current_guest` (`id`, `stay_id`, `name`, `AorC`, `id_type`, `id_num`, `mobile`) VALUES
(22, 30, 'a1', 'a', 'Passport', 'uuuuuuuu', 0),
(23, 30, 'yuy', 'a', 'National ID', '2222222222222222', 0),
(24, 30, 'none', 'a', 'none', 'none', 0),
(25, 30, 'none', 'c', 'none', 'none', 0),
(26, 30, 'none', 'c', 'none', 'none', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_expence`
--

CREATE TABLE `customer_expence` (
  `id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `expence_type` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_expence`
--

INSERT INTO `customer_expence` (`id`, `room_no`, `expence_type`, `amount`) VALUES
(8, 3003, 'food', 4752);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dp_id` int(11) NOT NULL,
  `dp_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dp_id`, `dp_name`) VALUES
(34, 'Food'),
(33, 'HR'),
(36, 'IT'),
(37, 'Reception'),
(35, 'Room');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `basalary` double NOT NULL,
  `brithdate` varchar(20) NOT NULL,
  `deparment` varchar(15) NOT NULL,
  `role` varchar(15) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `fullname`, `email`, `address`, `gender`, `country`, `mobile`, `basalary`, `brithdate`, `deparment`, `role`, `photo`) VALUES
(10013, 'Tupu', 'Roy', 'Tupu Roy', 'topu@gmail.com', '25kb road, Narayanganj', 'Male', 'Bangladesh', '01713345678', 22000, '1993-12-05', 'Food', 'Chef', '1933385245.jpg'),
(10014, 'Tappu', 'Gadda', 'Tappu Gadda', 'tappu@gmail.com', '25 kc road, Narayanganj', 'Male', 'India', '01612345678', 18000, '1999-05-07', 'Food', 'Sous-chef', '1933385245909.png'),
(10015, 'Tonu', 'Saha', 'Tonu Saha', 'sahatt@gmail.com', '56 tt road, dhaka', 'Male', 'Bangladesh', '01612345679', 18000, '2003-06-01', 'Food', 'Sous-chef', '1933385245909.png'),
(10016, 'Tupur', 'Saha', 'Tupur Saha', 'tupu@gmail.com', '65 kb road, Narayanganj', 'Female', 'Bangladesh', '01713345876', 18000, '2003-01-07', 'Food', 'Sous-chef', 'download.png'),
(10017, 'Md.', 'Salauddin', 'Md. Salauddin', 'ex1@gmail.com', '25 kc road, Narayanganj', 'Male', 'Bangladesh', '01813345678', 14000, '2002-12-08', 'Food', 'Server', '1933385245909.png'),
(10018, 'Tamal', ' Roy', 'Tamal  Roy', 'tamal@gmail.com', '58 tt road, dhaka', 'Male', 'Bangladesh', '01813345646', 14000, '2000-02-07', 'Food', 'Server', '1933385245909.png'),
(10019, 'Tumpa', 'Saha', 'Tumpa Saha', 'Tumpa77@gmail.com', '58 tt road, dhaka', 'Female', 'Bangladesh', '01912345678', 14000, '1996-12-28', 'Food', 'Server', 'dummy-profile-image-female.jpg'),
(10020, 'Harun', 'Islam', 'Harun Islam', 'tt345@gmail.com', '25 kc road, Narayanganj', 'Male', 'Bangladesh', '01813343425', 25000, '1994-12-17', 'HR', 'Manager', 'dummy-profile.jpg'),
(10021, 'Tonu', 'Roy', 'Tonu Roy', 'ex4@gmail.com', '30, ab road, Dhaka', 'Male', 'Bangladesh', '01712345098', 17000, '2003-01-12', 'HR', 'Worker', '1933385245.jpg'),
(10022, 'Suma', 'Roy', 'Suma Roy', 'suma@gmail.com', '56 tt road, dhaka', 'Female', 'Bangladesh', '01713345456', 17000, '1997-05-04', 'HR', 'Worker', 'dummy-profile-image-female.jpg'),
(10023, 'Sompa', 'islam', 'Sompa islam', 'ex@gmail.com', '58 tt road, dhaka', 'Male', 'Bangladesh', '01813345675', 25000, '2002-12-08', 'IT', 'Manager', '123456789.jpg'),
(10024, 'Ahad', 'Hossain', 'Ahad Hossain', 'kabbo@gmail.com', '25kb road, Narayanganj', 'Male', 'Bangladesh', '01616545678', 20000, '1994-10-17', 'IT', 'Web Developer', 'head-659652_960_720.png'),
(10025, 'Md', 'Tomal', 'Md Tomal', 'ex@gmail.com', '65 kb road, Narayanganj', 'Male', 'Bangladesh', '01813365678', 25000, '1989-12-30', 'Reception', 'Manager', 'head-659652_960_720.png'),
(10026, 'Sristy', 'Roy', 'Sristy Roy', 'ex@gmail.com', '30, ab road, Dhaka', 'Female', 'Bangladesh', '01612368079', 20000, '1995-06-05', 'Reception', 'Receptionist', '123456789.jpg'),
(10027, 'Joni', 'Bhoumik', 'Joni Bhoumik', 'ex@gmail.com', '58 tt road, dhaka', 'Male', 'India', '01713345876', 20000, '1994-11-16', 'Reception', 'Receptionist', 'dummy-profile.jpg'),
(10028, 'Uttam', 'Dev', 'Uttam Dev', 'ex@gmail.com', '25 kb road, Narayanganj', 'Male', 'Bangladesh', '01813346078', 25000, '1992-10-12', 'Room', 'Manager', 'head-659652_960_720.png'),
(10029, 'Kamal ', 'Islam', 'Kamal  Islam', 'ex@gmail.com', '65 kb road, Narayanganj', 'Male', 'Bangladesh', '01713340978', 18000, '1987-05-08', 'Room', 'Worker', '1933385245909.png'),
(10030, 'Sojib', 'Roy', 'Sojib Roy', 'ex@gmail.com', '56 tt road, dhaka', 'Male', 'Bangladesh', '01712345678', 18000, '1990-06-03', 'Room', 'Worker', '1933385245.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `final_foods`
--

CREATE TABLE `final_foods` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_foods`
--

INSERT INTO `final_foods` (`id`, `order_id`, `food_name`, `category`, `quantity`, `price`, `total_price`) VALUES
(21, 30, 'Tao hoo yang', 'Thai', 3, 810, 2430),
(22, 30, 'Som tam', 'Thai', 3, 630, 1890);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(6) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `role`) VALUES
(2, 'Chef'),
(1, 'Manager'),
(4, 'Server'),
(3, 'Sous-chef');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `food_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `food_category`, `description`, `quantity`, `price`, `status`) VALUES
(20, 'Tao hoo yang', 59, 'Grilled tofu, tamarind- chili', 2, 900, 1),
(21, 'Yam woon sen', 59, 'Thai glass noodle salad\r\n', 2, 700, 1),
(22, 'Som tam', 59, 'Thai young papya salad\r\n', 2, 700, 1),
(23, 'Satay', 59, 'Skewered meat\r\n', 2, 1000, 1),
(24, 'Kamal kakdi kebab', 60, 'minced lotus stem, mint, cumin', 2, 600, 1),
(25, 'Vegetable kebab platter', 60, '3 pieces each of paneer tikka, kamal kakdi kebab and hara kebab', 3, 1500, 1),
(26, 'Tandoori salmon', 60, 'Scottish salmon, yoghurt, kashmiri chilli\r\n', 3, 1800, 1),
(27, 'Murgh methi tikka', 60, 'boneless chicken, chilli, yoghurt, dried fenugreek\r\n', 2, 850, 1),
(28, 'Lamb galouti', 60, 'spring lamb, saffron, cinnamon, screwpine\r\n', 2, 900, 1),
(29, 'Meat and seafood kebab platter', 60, '3 pieces each of kadipatta jhinga, murgh methi tikka and lamb galouti', 3, 2350, 1),
(30, 'Takuan maki roll', 61, 'pickled radish\r\n', 2, 800, 1),
(31, 'Shiitake crackling sushi', 61, 'shiitake mushroom, cream cheese, togarashi mayonnaise', 2, 1250, 1),
(32, 'Dynamite', 61, 'prawn tempura, cucumber, togarashi mayonnaise\r\n', 2, 1500, 1),
(33, 'Samurai', 61, 'Scottish salmon, avocado, jalapeno, spicy sauce\r\n', 2, 1450, 1),
(34, 'Tamasine', 61, 'combination of spicy tuna and salmon, tempura flakes', 2, 1400, 1),
(35, 'Steamed dimsum', 61, '6 pieces of your choice of steamed dimsum', 2, 700, 1),
(36, 'Bao', 61, '3 pieces of your choice of bao\r\n', 1, 600, 1),
(37, 'Phad phak krathium', 63, 'wok tossed vegetable, garlic pepper sauce\r\n', 2, 1250, 1),
(38, 'Phak horappa', 63, 'stir fried vegetables, green peppercorn\r\n', 2, 1400, 1),
(39, 'Tao hoo ning kling ', 63, 'steamed tofu, soy-ginger sauce', 2, 1000, 1),
(40, 'Phad kai mamuang', 63, 'Stir fried chicken, bell peppers, cashewnuts, onion\r\n', 2, 1450, 1),
(41, 'Nuea horapa', 63, 'stir fried tenderloin, green peppercorn\r\n', 2, 1400, 1),
(42, 'Kaeng Kiew Wan', 63, 'Thai green curry\r\n', 2, 1500, 1),
(43, 'Baan Thai kaeng luang', 63, 'Chef klae\'s signature yellow curry', 2, 1400, 1),
(44, 'Massaman', 63, 'Thick curry of peanuts, from Southern Thailand', 2, 1300, 1),
(45, 'Khao hom mali', 64, 'Thai jasmine rice\r\n', 2, 800, 1),
(46, 'Choice of fried rice', 64, 'Choice of fried rice\r\n', 2, 900, 1),
(47, 'Choice of noodles', 65, '', 2, 800, 1),
(48, 'Al funghi', 66, 'wild mushroom, scallion, mozzarella\r\n', 2, 1000, 1),
(49, 'Buffalo mozzarella, cream cheese, arugula, red onion', 66, '', 2, 1000, 1),
(50, 'Classic pepperoni', 66, '', 2, 1100, 1),
(51, 'Chicken tikka', 66, 'onion, bellpeppers, green chilli\r\n', 2, 1100, 1),
(52, 'Aglio-e-olio pepperoncino', 67, 'confit garlic, red peppers, extra virgin olive oil', 2, 1050, 1),
(53, 'Arrabiatta', 67, 'tomato, garlic, basil and chili\r\n', 2, 950, 1),
(54, 'Wild mushroom agnolotti with truffle cream', 67, 'stuffed pasta with button, porcini and shiitake mushroom', 2, 1450, 1),
(55, 'La Terrasse rösti', 68, 'wild mushroom\r\n', 2, 950, 1),
(56, 'Pan seared Bay of Bengal Bekti', 68, 'puy lentil ratatouille, pea emulsion, lemon butter velouté', 2, 2050, 1),
(57, 'Grilled Salmon', 68, 'potato – corn hash, asparagus, parsley sauce', 2, 1250, 1),
(58, 'Stroganoff of chicken with mushrooms, sour cream and gherkins', 68, 'buttered rice\r\n', 2, 1450, 1),
(59, 'New Zealand lamb rack', 68, 'polenta, roast vegetables\r\n', 2, 2450, 1),
(60, 'Malabar prawn curry', 69, 'freshwater prawn, coconut, kodampulli\r\n', 2, 1550, 1),
(61, 'Mughlai saag', 69, '', 2, 850, 1),
(62, 'Hyderabadi subz haleem', 69, '', 2, 950, 1),
(63, 'Sorshe ilish', 69, 'boneless hilsa, mustard-coconut gravy\r\n', 2, 1850, 1),
(64, 'Choice of chicken preparation', 69, '', 3, 1150, 1),
(65, 'Rasmalai', 70, '', 2, 900, 1),
(66, 'Gulab jamun', 70, '', 2, 600, 1),
(67, 'Apple crumble tart', 70, '', 2, 600, 1),
(68, 'Belgian chocolate and walnut brownie', 70, '', 2, 900, 1),
(69, 'Coconut and pineapple mousse', 70, '', 2, 650, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_admin`
--

CREATE TABLE `food_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_admin`
--

INSERT INTO `food_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `food_cart`
--

CREATE TABLE `food_cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `category`, `position`, `status`) VALUES
(59, 'Thai', 1, 1),
(60, 'Indian', 2, 0),
(61, 'Signature Sushi', 3, 1),
(62, 'Signature Dimsum', 4, 1),
(63, 'Thai stir fries and curries', 5, 1),
(64, 'Fried rice', 6, 1),
(65, 'Noodles', 7, 1),
(66, 'Pizza', 8, 1),
(67, 'Pasta', 9, 1),
(68, 'Western main courses\r\n', 10, 1),
(69, 'Indian main courses', 11, 1),
(70, 'Desserts\r\n', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `order_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `notify` int(11) NOT NULL DEFAULT 0,
  `order_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`order_id`, `room_no`, `order_no`, `final_price`, `status`, `notify`, `order_time`) VALUES
(30, 3003, 1, 4752, 2, 1, '06/07/2021 10:35pm'),
(31, 3003, 2, 5544, 1, 1, '06/08/2021 02:15am'),
(32, 3003, 3, 8910, 0, 0, '06/08/2021 03:01am');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `img_id` int(10) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`img_id`, `image`) VALUES
(6, '1.JPG'),
(7, '2.jpg'),
(8, '3.jpg'),
(9, '4.jpg'),
(11, '5.jpg'),
(12, '6.jpg'),
(13, '7.jpg'),
(14, '8.jpg'),
(15, '9.jpg'),
(16, '10.jpg'),
(17, '11.jpg'),
(18, '12.jpg'),
(19, '13.jpg'),
(20, '14.jpg'),
(21, '15.jpg'),
(22, '16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` int(6) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`id`, `role`) VALUES
(1, 'Manager'),
(2, 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin`
--

CREATE TABLE `hr_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_admin`
--

INSERT INTO `hr_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `id` int(6) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`id`, `role`) VALUES
(1, 'Manager'),
(2, 'Web Developer');

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `id` int(6) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`id`, `role`) VALUES
(1, 'Manager'),
(2, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `reception_admin`
--

CREATE TABLE `reception_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reception_admin`
--

INSERT INTO `reception_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `request_food`
--

CREATE TABLE `request_food` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_food`
--

INSERT INTO `request_food` (`id`, `order_id`, `food_name`, `category`, `quantity`, `price`, `total_price`) VALUES
(38, 32, 'Yam woon sen', 'Thai', 9, 630, 5670),
(39, 32, 'Tao hoo yang', 'Thai', 3, 810, 2430);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(6) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `role`) VALUES
(1, 'Manager'),
(2, 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `size_type` varchar(100) NOT NULL,
  `flooor` int(11) NOT NULL,
  `floor_room_no` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `price` double NOT NULL,
  `fprice` double NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `photo2` varchar(100) DEFAULT NULL,
  `photo3` varchar(100) DEFAULT NULL,
  `photo4` varchar(100) DEFAULT NULL,
  `photo5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `size_type`, `flooor`, `floor_room_no`, `adult`, `child`, `price`, `fprice`, `photo`, `status`, `photo2`, `photo3`, `photo4`, `photo5`) VALUES
(1001, 'Deluxe', 'Single', 1, 1, 1, 0, 5000, 4000, 'deluxe1.jpg', 1, '7.jpg', 'deluxe4.jpg', 'deluxe3.jpg', 'deluxe2.jpg'),
(1002, 'Deluxe', 'Single', 1, 2, 1, 0, 5000, 4000, 'deluxe1.jpg', 1, 'deluxe2.jpg', 'deluxe3.jpg', 'deluxe4.jpg', 'deluxe5.jpg'),
(1003, 'Junior Suite', 'Single', 1, 3, 1, 0, 7000, 5600, 'junsuit1.jpg', 1, 'junsuit2.jpg', 'junsuit3.jpg', 'junsuit4.jpg', 'junsuit5.jpg'),
(1004, 'Deluxe', 'Double', 1, 4, 2, 1, 8000, 6400, 'deluxe1.jpg', 1, 'deluxe2.jpg', 'deluxe4.jpg', 'deluxe3.jpg', 'deluxe5.jpg'),
(1005, 'Superior', 'Double', 1, 5, 2, 1, 9000, 7200, 'superior1.jpg', 1, 'superior2.jpg', 'junsuit2.jpg', 'Standard3.jpg', 'deluxe1.jpg'),
(1006, 'Rooms with Lounge', 'Family', 1, 6, 4, 2, 18000, 14400, 'RoomWithLounge.jpg', 0, 'RoomWithLounge2.jpg', 'junsuit2.jpg', 'junsuit4.jpg', 'psuit5.jpg'),
(1007, 'Deluxe', 'Single', 1, 7, 1, 0, 5000, 4000, 'deluxe2.jpg', 1, 'deluxe4.jpg', 'deluxe1.jpg', 'deluxe5.jpg', 'deluxe3.jpg'),
(1008, 'Deluxe', 'Tripple', 1, 8, 3, 2, 10000, 8000, 'deluxe1.jpg', 1, 'deluxe3.jpg', 'deluxe2.jpg', 'deluxe5.jpg', 'deluxe4.jpg'),
(1009, 'Deluxe', 'Double', 1, 9, 2, 1, 8000, 6400, 'deluxe1.jpg', 1, 'deluxe2.jpg', 'deluxe3.jpg', 'deluxe4.jpg', 'deluxe5.jpg'),
(1010, 'Deluxe', 'Family', 1, 10, 4, 2, 12000, 9600, 'deluxe2.jpg', 1, 'deluxe5.jpg', 'deluxe4.jpg', 'deluxe1.jpg', 'deluxe3.jpg'),
(2001, 'Presidential Suite', 'Double', 2, 1, 2, 1, 22000, 17600, 'psuit1.jpg', 1, 'psuit2.jpg', 'psuit3.jpg', 'psuit4.jpg', 'psuit5.jpg'),
(2002, 'Suite', 'Family', 2, 2, 4, 2, 22000, 17600, 'suit.jpg', 1, 'junsuit1.jpg', 'suit2.jpg', 'junsuit3.jpg', 'junsuit5.jpg'),
(2003, 'Rooms with Lounge', 'Double', 2, 3, 2, 1, 12000, 9600, 'RoomWithLounge.jpg', 1, 'psuit1.jpg', 'RoomWithLounge2.jpg', 'Standard4.jpg', 'junsuit3.jpg'),
(2004, 'Superior', 'Single', 2, 4, 1, 0, 6000, 4800, 'superior1.jpg', 1, 'Standard3.jpg', 'superior2.jpg', 'deluxe2.jpg', 'junsuit4.jpg'),
(2005, 'Standard', 'Single', 2, 5, 1, 0, 6000, 4800, 'Standard1.jpg', 1, 'Standard2.jpg', 'Standard3.jpg', 'Standard4.jpg', 'Standard5.jpg'),
(2006, 'Standard', 'Single', 2, 6, 1, 0, 6000, 4800, 'Standard1.jpg', 1, 'Standard2.jpg', 'Standard3.jpg', 'Standard4.jpg', 'Standard5.jpg'),
(2007, 'Standard', 'Double', 2, 7, 2, 1, 8000, 6400, 'Standard1.jpg', 1, 'Standard2.jpg', 'Standard3.jpg', 'Standard5.jpg', 'Standard4.jpg'),
(2008, 'Superior', 'Single', 2, 8, 1, 0, 6000, 4800, 'superior1.jpg', 1, 'superior2.jpg', 'RoomWithLounge.jpg', 'Standard3.jpg', 'Standard2.jpg'),
(3001, 'Junior Suite', 'Double', 3, 1, 2, 1, 10000, 8000, 'junsuit1.jpg', 1, 'junsuit2.jpg', 'junsuit3.jpg', 'junsuit4.jpg', 'junsuit5.jpg'),
(3002, 'Suite', 'Double', 3, 2, 2, 1, 12000, 9600, 'suit.jpg', 1, 'Standard4.jpg', 'junsuit5.jpg', 'Standard2.jpg', 'deluxe2.jpg'),
(3003, 'Junior Suite', 'Tripple', 3, 3, 3, 2, 15000, 12000, 'junsuit2.jpg', 1, 'junsuit5.jpg', 'junsuit3.jpg', 'junsuit1.jpg', 'junsuit4.jpg'),
(3004, 'Standard', 'Tripple', 3, 4, 3, 2, 11000, 8800, 'Standard1.jpg', 1, 'Standard2.jpg', 'Standard3.jpg', 'Standard4.jpg', 'Standard5.jpg'),
(3005, 'Deluxe', 'Family', 3, 5, 4, 2, 12000, 9600, 'deluxe1.jpg', 1, 'deluxe3.jpg', 'deluxe5.jpg', 'deluxe4.jpg', 'deluxe2.jpg'),
(3006, 'Standard', 'Double', 3, 6, 2, 1, 9000, 7200, 'Standard1.jpg', 1, 'Standard4.jpg', 'Standard5.jpg', 'Standard2.jpg', 'Standard3.jpg'),
(3007, 'Superior', 'Double', 3, 7, 2, 1, 10000, 8000, 'superior2.jpg', 1, 'superior1.jpg', 'suit.jpg', 'deluxe2.jpg', 'RoomWithLounge.jpg'),
(4001, 'Presidential Suite', 'Family', 4, 1, 4, 2, 40000, 32000, 'psuit1.jpg', 1, 'psuit4.jpg', 'psuit5.jpg', 'junsuit3.jpg', 'psuit2.jpg'),
(4002, 'Presidential Suite', 'Family', 4, 2, 4, 2, 40000, 32000, 'psuit1.jpg', 1, 'psuit4.jpg', 'psuit5.jpg', 'junsuit3.jpg', 'psuit2.jpg'),
(4003, 'Presidential Suite', 'Double', 4, 3, 2, 1, 25000, 20000, 'psuit1.jpg', 1, 'psuit5.jpg', 'psuit4.jpg', 'psuit2.jpg', 'psuit3.jpg'),
(4004, 'Suite', 'Double', 4, 4, 2, 1, 12000, 9600, 'suit.jpg', 1, 'suit2.jpg', 'junsuit4.jpg', 'deluxe5.jpg', 'Standard1.jpg'),
(4005, 'Rooms with Lounge', 'Double', 4, 5, 2, 1, 20000, 16000, 'RoomWithLounge.jpg', 1, 'Standard1.jpg', 'RoomWithLounge2.jpg', 'psuit2.jpg', 'psuit5.jpg'),
(5001, 'Deluxe', 'Single', 5, 1, 1, 0, 4000, 3200, 'psuit1.jpg', 1, 'junsuit1.jpg', 'junsuit1.jpg', 'psuit2.jpg', 'junsuit5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_admin`
--

CREATE TABLE `room_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_admin`
--

INSERT INTO `room_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `room_book_info`
--

CREATE TABLE `room_book_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `cindate` varchar(100) NOT NULL,
  `coutdate` varchar(100) NOT NULL,
  `total_days` int(11) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `room_no` int(11) NOT NULL,
  `size_type` varchar(100) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `rent` double NOT NULL,
  `advance` double NOT NULL,
  `pay_mathod` varchar(100) NOT NULL,
  `mail_status` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_book_info`
--

INSERT INTO `room_book_info` (`id`, `name`, `email`, `mobile`, `cindate`, `coutdate`, `total_days`, `room_type`, `room_no`, `size_type`, `adult`, `child`, `rent`, `advance`, `pay_mathod`, `mail_status`, `code`) VALUES
(73, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/10/2021', '06/17/2021', 7, 'Superior', 1005, 'Double', 2, 1, 8100, 14883.75, 'BKASH-BKash', 1, 'bb64896ce1e32'),
(74, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/10/2021', '06/17/2021', 7, 'Superior', 2008, 'Single', 1, 0, 5400, 9922.5, 'BKASH-BKash', 1, '176699b1c49459'),
(76, 'Oishy Roy', 'oishyroy07@gmail.com', '01556328739', '06/08/2021', '06/11/2021', 3, 'Junior Suite', 3001, 'Double', 2, 1, 9000, 7087.5, 'VISA-City Bank', 1, '22f9177f0cfede'),
(79, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/10/2021', '06/18/2021', 8, 'Standard', 2007, 'Double', 2, 1, 7200, 15120, 'MASTER-City Bank', 1, '1763acf3cdaa35'),
(80, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/10/2021', '06/18/2021', 8, 'Standard', 3004, 'Tripple', 3, 2, 9900, 20790, 'MASTER-City Bank', 1, '23021f0ec7eb71'),
(81, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/10/2021', '06/18/2021', 8, 'Standard', 2006, 'Single', 1, 0, 5400, 11340, 'MASTER-City Bank', 1, '1760b133f809a9'),
(82, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/11/2021', '06/22/2021', 11, 'Superior', 2006, 'Single', 1, 0, 5400, 15592.5, 'BKASH-BKash', 1, '1760b3de9d8388'),
(83, 'Ankan Roy', 'ankan.roy31@gmail.com', '01611325387', '06/11/2021', '06/22/2021', 11, 'Superior', 2005, 'Single', 1, 0, 5400, 15592.5, 'BKASH-BKash', 1, '175db81e70c4ef');

-- --------------------------------------------------------

--
-- Table structure for table `room_expense`
--

CREATE TABLE `room_expense` (
  `id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `expense_type` varchar(100) NOT NULL,
  `expense_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_login`
--

CREATE TABLE `room_login` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_login`
--

INSERT INTO `room_login` (`id`, `username`, `password`, `order_no`) VALUES
(24, 3003, '22ff1014200e48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `room_type`, `photo`, `description`) VALUES
(12, 'Deluxe', 'deluxe1.jpg', 'Deluxe rooms, are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV, room cleaning touch system and private hydromassage bathtub.'),
(13, 'Superior', 'superior1.jpg', 'Decorated in a modern style, our Superior Rooms offer free WiFi, 32-inch LCD TVs, DVD players, writing desks and in-room tea and coffee making facilities. Our bathroom features walk-in rain showers and hairdryers.'),
(14, 'Standard', 'Standard1.jpg', 'Standard rooms, are modern decorated that can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV and room cleaning touch system.'),
(15, 'Rooms with Lounge', 'RoomWithLounge.jpg', 'This rooms are modern decorated that can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV and room cleaning touch system. You get access to the hotel’s lounge that offers free breakfast, evening tea/coffee, snacks, cocktails and access to business services like xerox, printouts etc.'),
(17, 'Junior Suite', 'junsuit.jpg', 'Junior suites are smaller than a regular suite but more importantly, typically don\'t have a solid separation between the bedrooms and living area. These suites have small living areas that are an extension of the bedroom space and don\'t come with dining areas.'),
(18, 'Suite', 'suit.jpg', 'You get a single room with one or more king, queen, full, or twin beds, a work desk, a bathroom, and maybe a closet, a TV, and a dresser. A suite is a much larger accommodation. It usually has an attached bathroom, a living area, and most times, includes a dining area as well.'),
(19, 'Presidential Suite', 'psuit.jpg', 'You get a single room with one or more king, queen, full, or twin beds, a work desk, a bathroom, and maybe a closet, a TV, and a dresser. A suite is a much larger accommodation. It usually has an attached bathroom, a living area, and most times, includes a dining area as well.'),
(20, 'super delex', 'deluxe1.jpg', 'Very spacious ');

-- --------------------------------------------------------

--
-- Table structure for table `size_type`
--

CREATE TABLE `size_type` (
  `id` int(11) NOT NULL,
  `size_type` varchar(100) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size_type`
--

INSERT INTO `size_type` (`id`, `size_type`, `adult`, `child`) VALUES
(7, 'Single', 1, 0),
(8, 'Double', 2, 1),
(9, 'Tripple', 3, 2),
(10, 'Family', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tax_offer`
--

CREATE TABLE `tax_offer` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax_offer`
--

INSERT INTO `tax_offer` (`id`, `type`, `tax`, `discount`) VALUES
(1, 'food', 10, 30),
(2, 'room', 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `fristname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `brithdate` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `passportno` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `fristname`, `lastname`, `fullname`, `country`, `gender`, `brithdate`, `nid`, `passportno`, `address`, `email`, `mobile`, `password`, `photo`) VALUES
(10, 'Ankan', 'Roy', 'Ankan Roy', 'Bangladesh', 'Male', '1996-09-04', '1933385245909', '', '109 B.B. raod, Narayanganj.', 'ankan.roy31@gmail.com', '01611325387', '12345678', '1933385245909.png'),
(11, 'Rahul', 'Saha', 'Rahul Saha', 'Bangladesh', 'Male', '2001-09-04', '1933385245', '', '109 B.B. raod, Narayanganj.', 'ankanrrr31@gmail.com', '01601335535', '12345678', '1933385245.jpg'),
(12, 'Oishy', 'Roy', 'Oishy Roy', 'Bangladesh', 'Male', '2000-09-26', '', '123456789', '109 B.B. raod, Narayanganj.', 'oishyroy07@gmail.com', '01556328739', '12345678', '123456789.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_admin`
--
ALTER TABLE `about_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_checkin`
--
ALTER TABLE `all_checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_guest`
--
ALTER TABLE `all_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_room`
--
ALTER TABLE `book_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_food`
--
ALTER TABLE `confirm_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `confirm_food_ibfk_1` (`order_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `context_admin`
--
ALTER TABLE `context_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`username`);

--
-- Indexes for table `current_checkin`
--
ALTER TABLE `current_checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_guest`
--
ALTER TABLE `current_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_expence`
--
ALTER TABLE `customer_expence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dp_id`),
  ADD UNIQUE KEY `dp_name_un` (`dp_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_foods`
--
ALTER TABLE `final_foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `final_foods_ibfk_1` (`order_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_ibfk_1` (`food_category`);

--
-- Indexes for table `food_admin`
--
ALTER TABLE `food_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_cart`
--
ALTER TABLE `food_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `hr_admin`
--
ALTER TABLE `hr_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `reception_admin`
--
ALTER TABLE `reception_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_food`
--
ALTER TABLE `request_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_food_ibfk_1` (`order_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_admin`
--
ALTER TABLE `room_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_book_info`
--
ALTER TABLE `room_book_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_expense`
--
ALTER TABLE `room_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_login`
--
ALTER TABLE `room_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_type` (`room_type`),
  ADD UNIQUE KEY `room_type_2` (`room_type`);

--
-- Indexes for table `size_type`
--
ALTER TABLE `size_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size_type` (`size_type`);

--
-- Indexes for table `tax_offer`
--
ALTER TABLE `tax_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_admin`
--
ALTER TABLE `about_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `all_checkin`
--
ALTER TABLE `all_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `all_guest`
--
ALTER TABLE `all_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `book_room`
--
ALTER TABLE `book_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `confirm_food`
--
ALTER TABLE `confirm_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `context_admin`
--
ALTER TABLE `context_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `current_checkin`
--
ALTER TABLE `current_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `current_guest`
--
ALTER TABLE `current_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer_expence`
--
ALTER TABLE `customer_expence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10031;

--
-- AUTO_INCREMENT for table `final_foods`
--
ALTER TABLE `final_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `food_admin`
--
ALTER TABLE `food_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_cart`
--
ALTER TABLE `food_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr_admin`
--
ALTER TABLE `hr_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reception_admin`
--
ALTER TABLE `reception_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_food`
--
ALTER TABLE `request_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;

--
-- AUTO_INCREMENT for table `room_admin`
--
ALTER TABLE `room_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_book_info`
--
ALTER TABLE `room_book_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `room_expense`
--
ALTER TABLE `room_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_login`
--
ALTER TABLE `room_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `size_type`
--
ALTER TABLE `size_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tax_offer`
--
ALTER TABLE `tax_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirm_food`
--
ALTER TABLE `confirm_food`
  ADD CONSTRAINT `confirm_food_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `food_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_foods`
--
ALTER TABLE `final_foods`
  ADD CONSTRAINT `final_foods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `food_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`food_category`) REFERENCES `food_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_food`
--
ALTER TABLE `request_food`
  ADD CONSTRAINT `request_food_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `food_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
