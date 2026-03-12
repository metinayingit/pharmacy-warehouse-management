-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2026 at 07:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `critical_stock` int(11) NOT NULL DEFAULT 10,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `image`, `name`, `serial_number`, `stock`, `critical_stock`, `price`, `description`, `expiry_date`) VALUES
(1, 'bottle.png', 'Amoxicillin', '102938', 45, 10, 12.50, 'Antibiotic used to treat bacterial infections.', '2027-08-15'),
(2, 'blister.png', 'Ibuprofen', '485729', 120, 10, 8.99, 'Pain reliever and fever reducer (NSAID) tablet.', '2028-11-20'),
(3, 'bottle.png', 'Omeprazole', '837465', 8, 10, 15.75, 'Reduces stomach acid, used for acid reflux and ulcers.', '2026-10-05'),
(4, 'blister.png', 'Cetirizine', '394857', 65, 10, 11.20, 'Antihistamine used to relieve allergy symptoms.', '2027-03-12'),
(5, 'bottle.png', 'Metformin', '928374', 210, 10, 9.50, 'Regulates blood sugar levels in type 2 diabetes patients.', '2029-01-30'),
(6, 'blister.png', 'Amlodipine', '574839', 150, 10, 14.30, 'Calcium channel blocker for high blood pressure.', '2028-06-18'),
(7, 'bottle.png', 'Albuterol', '293847', 4, 10, 22.00, 'Inhaler used to open airways for asthma relief.', '2026-09-01'),
(8, 'bottle.png', 'Sertraline', '657483', 42, 10, 18.45, 'Antidepressant (SSRI) for depression and anxiety.', '2027-12-10'),
(9, 'blister.png', 'Azithromycin', '182736', 85, 10, 25.60, 'Strong antibiotic for respiratory and skin infections.', '2028-04-22'),
(10, 'blister.png', 'Losartan', '746583', 110, 10, 13.80, 'Lowers blood pressure by keeping blood vessels from narrowing.', '2029-02-14'),
(11, 'blister.png', 'Pantoprazole', '564738', 55, 10, 16.90, 'Proton pump inhibitor that decreases stomach acid.', '2027-07-08'),
(12, 'bottle.png', 'Gabapentin', '384756', 90, 10, 21.15, 'Used to treat nerve pain and prevent seizures.', '2028-09-25'),
(13, 'blister.png', 'Paracetamol', '847563', 350, 10, 5.50, 'Common pain reliever and fever reducer.', '2029-05-11'),
(14, 'blister.png', 'Atorvastatin', '273645', 7, 10, 28.00, 'Statin medication used to lower bad cholesterol.', '2026-11-30'),
(15, 'blister.png', 'Meloxicam', '938475', 48, 10, 17.25, 'Anti-inflammatory used to treat joint pain and arthritis.', '2028-02-28'),
(16, 'blister.png', 'Clopidogrel', '162534', 180, 10, 19.99, 'Blood thinner that helps prevent stroke and heart attack.', '2029-08-16'),
(17, 'blister.png', 'Loratadine', '675849', 250, 10, 7.50, 'Non-drowsy allergy medication for seasonal allergies.', '2027-05-20'),
(18, 'blister.png', 'Ciprofloxacin', '453627', 60, 10, 14.80, 'Antibiotic for severe urinary tract and intestinal infections.', '2028-10-12'),
(19, 'syrup.png', 'Cough Syrup', '827364', 35, 10, 12.50, 'Suppresses dry cough and soothes throat irritation.', '2027-01-15'),
(20, 'cream.png', 'Hydrocortisone', '596847', 2, 10, 14.75, 'Topical cream for skin inflammation, redness, and itching.', '2026-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pharmacist','technician') NOT NULL DEFAULT 'technician'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'metin', '123', 'pharmacist'),
(3, 'tech', '123', 'technician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
