-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 08:31 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financeassistant`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `idExpenses` smallint(6) NOT NULL,
  `idUser` smallint(6) NOT NULL,
  `idExpensesCat` smallint(6) NOT NULL,
  `userPayMethId` int(6) NOT NULL,
  `expenseDate` date NOT NULL,
  `expenseAmount` decimal(8,2) NOT NULL,
  `expenseDescr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`idExpenses`, `idUser`, `idExpensesCat`, `userPayMethId`, `expenseDate`, `expenseAmount`, `expenseDescr`) VALUES
(2, 7, 18, 2, '2019-06-01', '1.00', '11111'),
(3, 7, 15, 1, '2019-06-13', '45.56', 'fsdfsdfd'),
(4, 1, 17, 2, '2019-06-01', '12.00', '2121'),
(5, 1, 18, 1, '2019-06-01', '34.00', '34343'),
(6, 7, 31, 31, '2019-06-13', '45.56', 'tetststststst');

-- --------------------------------------------------------

--
-- Table structure for table `ex_cat`
--

CREATE TABLE `ex_cat` (
  `idCatE` smallint(4) NOT NULL,
  `nameCatE` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_cat`
--

INSERT INTO `ex_cat` (`idCatE`, `nameCatE`) VALUES
(1, 'Food'),
(2, 'Transport'),
(3, 'Home'),
(4, 'Phone & Internet'),
(5, 'Clothes'),
(6, 'Health care'),
(7, 'Clothes'),
(8, 'Kids'),
(9, 'Entertainment'),
(10, 'Travel'),
(11, 'Holiday'),
(12, 'Education'),
(13, 'Books'),
(14, 'Savings'),
(15, 'Pension'),
(16, 'Mortgage'),
(17, 'Loans'),
(18, 'Gift'),
(19, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `idIncome` smallint(6) NOT NULL,
  `idUser` smallint(6) NOT NULL,
  `idIncomeCat` smallint(6) NOT NULL,
  `incomeDate` date NOT NULL,
  `incomeAmount` decimal(8,2) NOT NULL,
  `incomeDescr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`idIncome`, `idUser`, `idIncomeCat`, `incomeDate`, `incomeAmount`, `incomeDescr`) VALUES
(3, 7, 1, '2019-05-01', '123.00', 'some description'),
(4, 7, 4, '2019-06-06', '13.13', 'test'),
(6, 7, 31, '2019-06-20', '12.56', 'kjhjkkj'),
(7, 7, 2, '2019-07-15', '15.00', '15'),
(8, 7, 3, '2019-06-30', '131313.13', 'ebay'),
(9, 7, 3, '2019-06-01', '1.10', 'ebay'),
(12, 7, 31, '2019-06-01', '12.12', 'vgyyyyyyyy'),
(17, 1, 1, '2019-06-30', '12.00', 'fsfdsd'),
(18, 1, 2, '2019-06-30', '2.00', '32323'),
(19, 1, 3, '2019-06-01', '34.00', 'fsdfdfsd'),
(20, 1, 1, '2019-06-05', '121.00', '21212');

-- --------------------------------------------------------

--
-- Table structure for table `in_cat`
--

CREATE TABLE `in_cat` (
  `idCatI` smallint(4) NOT NULL,
  `nameCatI` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cat`
--

INSERT INTO `in_cat` (`idCatI`, `nameCatI`) VALUES
(1, 'Salary'),
(2, 'Interests'),
(3, 'Ebay sales'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `pay_cat`
--

CREATE TABLE `pay_cat` (
  `idCatPay` smallint(4) NOT NULL,
  `nameCatPay` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pay_cat`
--

INSERT INTO `pay_cat` (`idCatPay`, `nameCatPay`) VALUES
(1, 'Cash'),
(2, 'Debit Card'),
(3, 'Credit Card'),
(4, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` smallint(6) NOT NULL,
  `Nick` char(20) NOT NULL,
  `Email` char(60) NOT NULL,
  `Password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `Nick`, `Email`, `Password`) VALUES
(1, 'ADMIN-DON''T TOUCH', 'admin@admin.pl', '$2y$10$4H4QjRm8GYs5TAA4S2TCFO404zAmIP03ohOgO8T6/zayrLKdXWP0m'),
(7, 'PZON', 'pzon@pzon.eu', '$2y$10$ula/9A040lRhxI8quLRFPu1vw4797fzZcDSP0H3bxebp5Q3y.x0KO');

-- --------------------------------------------------------

--
-- Table structure for table `user_ex_cat`
--

CREATE TABLE `user_ex_cat` (
  `idUserCatEx` smallint(4) NOT NULL,
  `idUser` smallint(6) NOT NULL,
  `nameUserCatEx` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_ex_cat`
--

INSERT INTO `user_ex_cat` (`idUserCatEx`, `idUser`, `nameUserCatEx`) VALUES
(30, 1, 'ADMIN-DON''T TOUCH'),
(31, 7, 'ex_testowa');

-- --------------------------------------------------------

--
-- Table structure for table `user_in_cat`
--

CREATE TABLE `user_in_cat` (
  `idUserCatIn` smallint(4) NOT NULL,
  `idUser` smallint(6) NOT NULL,
  `nameUserCatIn` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_in_cat`
--

INSERT INTO `user_in_cat` (`idUserCatIn`, `idUser`, `nameUserCatIn`) VALUES
(30, 1, 'ADMIN-DON''T TOUCH'),
(31, 7, 'income_testowa');

-- --------------------------------------------------------

--
-- Table structure for table `user_pay_cat`
--

CREATE TABLE `user_pay_cat` (
  `idUserCatPay` smallint(4) NOT NULL,
  `idUser` smallint(6) NOT NULL,
  `nameUserCatPay` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_pay_cat`
--

INSERT INTO `user_pay_cat` (`idUserCatPay`, `idUser`, `nameUserCatPay`) VALUES
(30, 1, 'ADMIN-DON''T TOUCH'),
(31, 7, 'pay_testowa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`idExpenses`);

--
-- Indexes for table `ex_cat`
--
ALTER TABLE `ex_cat`
  ADD PRIMARY KEY (`idCatE`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`idIncome`);

--
-- Indexes for table `in_cat`
--
ALTER TABLE `in_cat`
  ADD PRIMARY KEY (`idCatI`);

--
-- Indexes for table `pay_cat`
--
ALTER TABLE `pay_cat`
  ADD PRIMARY KEY (`idCatPay`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `user_ex_cat`
--
ALTER TABLE `user_ex_cat`
  ADD PRIMARY KEY (`idUserCatEx`);

--
-- Indexes for table `user_in_cat`
--
ALTER TABLE `user_in_cat`
  ADD PRIMARY KEY (`idUserCatIn`);

--
-- Indexes for table `user_pay_cat`
--
ALTER TABLE `user_pay_cat`
  ADD PRIMARY KEY (`idUserCatPay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `idExpenses` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ex_cat`
--
ALTER TABLE `ex_cat`
  MODIFY `idCatE` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `idIncome` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `in_cat`
--
ALTER TABLE `in_cat`
  MODIFY `idCatI` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pay_cat`
--
ALTER TABLE `pay_cat`
  MODIFY `idCatPay` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_ex_cat`
--
ALTER TABLE `user_ex_cat`
  MODIFY `idUserCatEx` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_in_cat`
--
ALTER TABLE `user_in_cat`
  MODIFY `idUserCatIn` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_pay_cat`
--
ALTER TABLE `user_pay_cat`
  MODIFY `idUserCatPay` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
