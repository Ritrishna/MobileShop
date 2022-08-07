-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 01:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_master_tb`
--

CREATE TABLE `company_master_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `company_master_tb`
--

INSERT INTO `company_master_tb` (`id`, `name`) VALUES
(1, 'Oppo'),
(2, 'Vivo'),
(3, 'Samsung'),
(4, 'Dell'),
(5, 'Hp'),
(6, 'RealMe'),
(7, 'RedMi');

-- --------------------------------------------------------

--
-- Table structure for table `group_master_tb`
--

CREATE TABLE `group_master_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `group_master_tb`
--

INSERT INTO `group_master_tb` (`id`, `name`) VALUES
(1, 'Electronics'),
(3, 'Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `item_master_tb`
--

CREATE TABLE `item_master_tb` (
  `item_id` int(11) NOT NULL,
  `group_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `sub_group` varchar(100) COLLATE utf8_bin NOT NULL,
  `company_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `imei_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `model_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `ram` varchar(100) COLLATE utf8_bin NOT NULL,
  `storage` varchar(100) COLLATE utf8_bin NOT NULL,
  `color` varchar(100) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `item_master_tb`
--

INSERT INTO `item_master_tb` (`item_id`, `group_name`, `sub_group`, `company_name`, `imei_no`, `model_no`, `ram`, `storage`, `color`, `price`) VALUES
(1, '1', '1', '1', '12222222222', 'A57', '1', '1', 'Golden', 15500),
(2, '1', '1', '3', '20202027275647', 'M35', '1', '1', 'Blue', 21000),
(3, '3', '3', '4', '11117779877', 'Inspiron 3000', '1', '1', 'Black', 40000),
(4, '1', '1', '6', '565758977889398', 'Note 8', '1', '2', 'LightBlue', 18500),
(5, '1', '1', '1', '54647382887287', 'F1', '1', '2', 'Golden', 25000),
(6, '1', '1', '3', '12222222e73838822', 'M31', '1', '1', 'Golden', 21000);

-- --------------------------------------------------------

--
-- Table structure for table `ram_master`
--

CREATE TABLE `ram_master` (
  `id` int(11) NOT NULL,
  `ram` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ram_master`
--

INSERT INTO `ram_master` (`id`, `ram`) VALUES
(1, '6GB '),
(2, '3GB'),
(3, '12GB');

-- --------------------------------------------------------

--
-- Table structure for table `sell_voucher_tb`
--

CREATE TABLE `sell_voucher_tb` (
  `sell_id` int(11) NOT NULL,
  `cust_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `company_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `imei_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `model_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `ram` varchar(100) COLLATE utf8_bin NOT NULL,
  `storage` varchar(100) COLLATE utf8_bin NOT NULL,
  `color` varchar(100) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `gross_amt` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `gst_amt` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `bill_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sell_voucher_tb`
--

INSERT INTO `sell_voucher_tb` (`sell_id`, `cust_name`, `product_name`, `company_name`, `imei_no`, `model_no`, `ram`, `storage`, `color`, `price`, `discount`, `gross_amt`, `gst`, `gst_amt`, `total_amt`, `bill_no`, `date`) VALUES
(1, 'Dipashree Sarkar', 'Mobile', 'Oppo', '12222222222', 'A57', '6GB ', '64GB ', 'Golden', 15500, 2500, 13000, 18, 2340, 15340, 'RIT/2020/00001', '2020-09-26'),
(2, 'Ritrishna Dey Chowdhury ', 'Mobile', 'Samsung', '20202027275647', 'M35', '6GB ', '64GB ', 'Blue', 21000, 2000, 19000, 18, 3420, 22420, 'RIT/2020/00002', '2020-09-26'),
(3, 'Tarun Kumbhakar', 'Mobile', 'Samsung', '20202027275647', 'M35', '6GB ', '64GB ', 'Blue', 21000, 2000, 19000, 18, 3420, 22420, 'RIT/2020/00003', '2020-09-26'),
(4, 'Diya Chatterjee', 'Mobile', 'Oppo', '12222222222', 'A57', '6GB ', '64GB ', 'Golden', 15500, 2500, 13000, 18, 2340, 15340, 'RIT/2020/00004', '2020-09-26'),
(5, 'Soumoshree', 'Laptop', 'Dell', '11117779877', 'Inspiron 3000', '6GB ', '64GB ', 'Black', 40000, 2100, 37900, 18, 6822, 44722, 'RIT/2020/00005', '2020-09-26'),
(6, 'Riku Chatterjee', 'Mobile', 'Samsung', '12222222e73838822', 'M31', '6GB ', '64GB ', 'Golden', 21000, 2100, 18900, 18, 3402, 22302, 'RIT/2020/00006', '2020-09-26'),
(7, 'Deep Sarkar', 'Mobile', 'Oppo', '54647382887287', 'F1', '6GB ', '128GB', 'Golden', 25000, 1000, 24000, 18, 4320, 28320, 'RIT/2020/00007', '2020-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `storage_master_tb`
--

CREATE TABLE `storage_master_tb` (
  `id` int(11) NOT NULL,
  `storage` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `storage_master_tb`
--

INSERT INTO `storage_master_tb` (`id`, `storage`) VALUES
(1, '64GB '),
(2, '128GB'),
(3, '32GB');

-- --------------------------------------------------------

--
-- Table structure for table `subgroup_master_tb`
--

CREATE TABLE `subgroup_master_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subgroup_master_tb`
--

INSERT INTO `subgroup_master_tb` (`id`, `name`) VALUES
(1, 'Mobile'),
(2, 'Freeze'),
(3, 'Laptop'),
(4, 'Keyboard'),
(5, 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_main`
--

CREATE TABLE `voucher_main` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `mode` varchar(255) COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `cheque_no` varchar(255) COLLATE utf8_bin NOT NULL,
  `card_no` varchar(255) COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `voucher_main`
--

INSERT INTO `voucher_main` (`id`, `bill_no`, `mode`, `amount`, `cheque_no`, `card_no`, `bank_name`, `date`) VALUES
(1, 'RIT/2020/00001', 'cash', 15340, '', '', '', '2020-09-26'),
(2, 'RIT/2020/00002', 'cheque', 22420, '12345377236', '', 'CBI', '2020-09-26'),
(3, 'RIT/2020/00003', 'card', 22420, '', '1111 2222 3333 4444', '', '2020-09-26'),
(4, 'RIT/2020/00004', 'cash', 15340, '', '', '', '2020-09-26'),
(5, 'RIT/2020/00005', 'cheque', 44722, '1234534236', '', 'SBI', '2020-09-26'),
(6, 'RIT/2020/00006', 'card', 22302, '', '6666 4647 5656 7878', '', '2020-09-26'),
(7, 'RIT/2020/00007', 'cheque', 28320, '35527722617', '', 'UBI', '2020-09-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_master_tb`
--
ALTER TABLE `company_master_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_master_tb`
--
ALTER TABLE `group_master_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_master_tb`
--
ALTER TABLE `item_master_tb`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `ram_master`
--
ALTER TABLE `ram_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_voucher_tb`
--
ALTER TABLE `sell_voucher_tb`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `storage_master_tb`
--
ALTER TABLE `storage_master_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subgroup_master_tb`
--
ALTER TABLE `subgroup_master_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_main`
--
ALTER TABLE `voucher_main`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_master_tb`
--
ALTER TABLE `company_master_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_master_tb`
--
ALTER TABLE `group_master_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_master_tb`
--
ALTER TABLE `item_master_tb`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ram_master`
--
ALTER TABLE `ram_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell_voucher_tb`
--
ALTER TABLE `sell_voucher_tb`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storage_master_tb`
--
ALTER TABLE `storage_master_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subgroup_master_tb`
--
ALTER TABLE `subgroup_master_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voucher_main`
--
ALTER TABLE `voucher_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
