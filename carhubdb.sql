-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 08:08 PM
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
-- Database: `carhubdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrativestaff`
--

CREATE TABLE `administrativestaff` (
  `CIN` varchar(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `HireDate` date NOT NULL,
  `Salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrativestaff`
--

INSERT INTO `administrativestaff` (`CIN`, `Qualification`, `HireDate`, `Salary`) VALUES
('12345678', 'Owner', '0000-00-00', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `ExpiryDate` date NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `Views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Title`, `Description`, `ExpiryDate`, `CIN`, `Views`) VALUES
('test', 'test', '3212-12-21', '12345678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CarPlate` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `ModelName` varchar(255) NOT NULL,
  `ModelID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `isNew` tinyint(1) NOT NULL,
  `SaleorRent` int(1) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarPlate`, `CIN`, `ModelName`, `ModelID`, `Address`, `Price`, `isNew`, `SaleorRent`, `opt1`, `opt2`, `opt3`, `opt4`) VALUES
('1337TU1234', '123456789', 'Golf 7', 1, 'Ariana', 300, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `IDServ` int(11) NOT NULL,
  `CarPlate` varchar(255) NOT NULL,
  `isPaid` tinyint(1) NOT NULL DEFAULT 0,
  `DatePaid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `IDServ`, `CarPlate`, `isPaid`, `DatePaid`) VALUES
(1, 1, '69TU69', 0, '0000-00-00'),
(1, 4, '69TU69', 0, '0000-00-00'),
(6, 3, '1337TU1234', 1, '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Title` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `IsPending` tinyint(1) NOT NULL DEFAULT 1,
  `IsRejected` tinyint(1) NOT NULL DEFAULT 0,
  `CIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CIN` varchar(255) NOT NULL,
  `AmountPaid` float NOT NULL,
  `RegisterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CIN`, `AmountPaid`, `RegisterDate`) VALUES
('123456789', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `CarPlate` varchar(255) NOT NULL,
  `FeatureName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `GalleryID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`GalleryID`, `nom`, `description`) VALUES
(33, 'mohamed', 'cgaa'),
(88, 'mohamed', 'meed'),
(117, 'med', 'yassine'),
(123, 'hgarfgwg', 'qwfqfqfq'),
(145, 'bhkjnlk;l', 'kjjnbknl;m'),
(148, 'kjbhgvjhkbjl', 'kjhbj'),
(1238, 'League test', 'op stuff'),
(978465, 'guhbvijnokm', 'uhbijn');

-- --------------------------------------------------------

--
-- Table structure for table `galleryimage`
--

CREATE TABLE `galleryimage` (
  `GalleryID` int(11) NOT NULL,
  `URLImage` varchar(255) NOT NULL,
  `ModelID` int(11) NOT NULL,
  `dimension` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleryimage`
--

INSERT INTO `galleryimage` (`GalleryID`, `URLImage`, `ModelID`, `dimension`) VALUES
(33, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/640px-Image_created_with_a_mobile_phone.png', 1, '669'),
(88, 'https://upload.wikimedia.org/wikipedia/commons/3/3c/IMG_logo_%282017%29.svg', 1, '047'),
(145, 'https://emojipedia.org/search/?q=pencil', 1, '1345'),
(978465, 'https://github.com/2A-22-23/project2223_2a15-ninjahub/tree/bouzouita/adminArea/service', 1, 'ygvubhinjk');

-- --------------------------------------------------------

--
-- Table structure for table `galleryvideo`
--

CREATE TABLE `galleryvideo` (
  `GalleryID` int(11) NOT NULL,
  `URLVideo` varchar(255) NOT NULL,
  `ModelID` int(11) NOT NULL,
  `duree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleryvideo`
--

INSERT INTO `galleryvideo` (`GalleryID`, `URLVideo`, `ModelID`, `duree`) VALUES
(123, 'https://youtu.be/y881t8ilMyc', 1, '854'),
(1238, 'https://www.youtube.com/embed/m7L2aOSjkmE', 1, '312');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `ModelID` int(11) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `HP` int(11) NOT NULL,
  `kW` int(11) NOT NULL,
  `Acceleration` float NOT NULL,
  `MaxSpeed` float NOT NULL,
  `InGearAccel` float NOT NULL,
  `Flex5Gear` float NOT NULL,
  `EngineLayout` varchar(255) NOT NULL,
  `NumberOfCyl` int(11) NOT NULL,
  `Displacement` float NOT NULL,
  `FuelConsumptUrb` float NOT NULL,
  `FuelConsumptNonUrb` float NOT NULL,
  `FuelConsumptComb` float NOT NULL,
  `CO2Emissions` float NOT NULL,
  `BodyLength` float NOT NULL,
  `BodyWidth` float NOT NULL,
  `BodyHeight` float NOT NULL,
  `UnladenWeightDin` float NOT NULL,
  `UnladenWeightEU` float NOT NULL,
  `DragCoefficientCd` float NOT NULL,
  `Overview` text NOT NULL,
  `TechSpecs` text NOT NULL,
  `TypeCar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`ModelID`, `Manufacturer`, `HP`, `kW`, `Acceleration`, `MaxSpeed`, `InGearAccel`, `Flex5Gear`, `EngineLayout`, `NumberOfCyl`, `Displacement`, `FuelConsumptUrb`, `FuelConsumptNonUrb`, `FuelConsumptComb`, `CO2Emissions`, `BodyLength`, `BodyWidth`, `BodyHeight`, `UnladenWeightDin`, `UnladenWeightEU`, `DragCoefficientCd`, `Overview`, `TechSpecs`, `TypeCar`) VALUES
(1, 'Volkwagen', 120, 123, 12, 300, 5, 5, 'Good Layout', 5, 4, 2, 3, 4, 1, 2, 3, 4, 5, 6, 7, 'This car is very fast.', 'It\'s really good.', '');

-- --------------------------------------------------------

--
-- Table structure for table `onlinepay`
--

CREATE TABLE `onlinepay` (
  `TransactionID` int(11) NOT NULL,
  `PayPalTransactionID` varchar(255) NOT NULL,
  `PayPalUserID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `onlinepay`
--

INSERT INTO `onlinepay` (`TransactionID`, `PayPalTransactionID`, `PayPalUserID`) VALUES
(64, '10C61353A8943011R', 'NVCQLXS6UTDKS');

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `CIN` varchar(255) NOT NULL,
  `authcode` varchar(255) NOT NULL,
  `ExpiryDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwordreset`
--

INSERT INTO `passwordreset` (`CIN`, `authcode`, `ExpiryDate`) VALUES
('123456789', 'EMx3TWhIVmtY7VsDIcibuUTwir9Tltfj2ukAXuh7GiWtck3IiaSrKdtnMwAZ8E3Ox9DWymPVnT9Li7pVrX7IwArTRPwnHy8vJtkDdWU3KRxcF0Qn17HwMUB6fE0oEho9', '2022-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `IDServ` int(11) NOT NULL,
  `PriceServ` float NOT NULL,
  `DescServ` varchar(255) NOT NULL,
  `DurationServ` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`IDServ`, `PriceServ`, `DescServ`, `DurationServ`) VALUES
(1, 10, 'Create New Car for Sale', '720:00:00'),
(2, 100, 'Buy car from our site', '00:00:00'),
(3, 10, 'Manual Car Wash Code', '00:20:00'),
(4, 12.5, 'Auto Car Wash Code', '00:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `CartID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `CartID`, `Status`) VALUES
(64, 6, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `CIN` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`CIN`, `Email`, `Password`, `ContactNumber`, `FullName`, `Address`) VALUES
('12345678', 'malekamir34@gmail.com', '$2y$10$rtVSAWVpYzK2ANvAV57za.4aSg.CeFmgfa9Ow8RrI4SbL3xxzHRXK', '1234567', 'Malek Amir', 'Rue de l\'himalaya'),
('123456789', 'malekamir56@gmail.com', '$2y$11$vVpQD3IkdZkARqlNPXIfjO2fhxLOoXxq6Tah0Rp3rZMulkzPgP64a', '52920276', 'Malek Amir', 'Rue de l\'himalaya');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashed_validator` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `selector`, `hashed_validator`, `CIN`, `expiry`) VALUES
(0, '864449ac977a92ab184980f816012e5c', '$2y$10$6sZGqpnGh/RENOUfhtKp3ejwjddAFO3q9C1NQeHxXgYorZNRpbhGy', '123456789', '2023-01-13 19:26:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrativestaff`
--
ALTER TABLE `administrativestaff`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `CIN` (`CIN`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Title`),
  ADD KEY `CIN` (`CIN`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarPlate`),
  ADD KEY `CIN` (`CIN`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`,`IDServ`),
  ADD KEY `IDServ` (`IDServ`),
  ADD KEY `CarPlate` (`CarPlate`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Title`,`CIN`),
  ADD KEY `Title` (`Title`,`CIN`),
  ADD KEY `FK_CIN_COMM` (`CIN`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CIN` (`CIN`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `CIN` (`CIN`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`CarPlate`,`FeatureName`),
  ADD KEY `CarPlate` (`CarPlate`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`GalleryID`);

--
-- Indexes for table `galleryimage`
--
ALTER TABLE `galleryimage`
  ADD PRIMARY KEY (`GalleryID`),
  ADD KEY `ModelID` (`ModelID`),
  ADD KEY `GalleryID` (`GalleryID`);

--
-- Indexes for table `galleryvideo`
--
ALTER TABLE `galleryvideo`
  ADD PRIMARY KEY (`GalleryID`),
  ADD KEY `ModelID` (`ModelID`),
  ADD KEY `GalleryID` (`GalleryID`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`ModelID`);

--
-- Indexes for table `onlinepay`
--
ALTER TABLE `onlinepay`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `TransactionID` (`TransactionID`);

--
-- Indexes for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `CIN` (`CIN`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IDServ`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `CartID` (`CartID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`CIN`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_cin` (`CIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `ModelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrativestaff`
--
ALTER TABLE `administrativestaff`
  ADD CONSTRAINT `FK_CIN_ADMIN` FOREIGN KEY (`CIN`) REFERENCES `user` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_CIN_ARTICLE` FOREIGN KEY (`CIN`) REFERENCES `administrativestaff` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_CIN_CAR` FOREIGN KEY (`CIN`) REFERENCES `user` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_IDSERV_CART` FOREIGN KEY (`IDServ`) REFERENCES `service` (`IDServ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `FK_CIN_COMPLAINTS` FOREIGN KEY (`CIN`) REFERENCES `customer` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_CIN_CUSTOMER` FOREIGN KEY (`CIN`) REFERENCES `user` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `FK_CARPLATE_FEATURES` FOREIGN KEY (`CarPlate`) REFERENCES `car` (`CarPlate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleryimage`
--
ALTER TABLE `galleryimage`
  ADD CONSTRAINT `galleryimage_ibfk_2` FOREIGN KEY (`GalleryID`) REFERENCES `gallery` (`GalleryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galleryimage_ibfk_3` FOREIGN KEY (`ModelID`) REFERENCES `model` (`ModelID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleryvideo`
--
ALTER TABLE `galleryvideo`
  ADD CONSTRAINT `galleryvideo_ibfk_1` FOREIGN KEY (`GalleryID`) REFERENCES `gallery` (`GalleryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galleryvideo_ibfk_2` FOREIGN KEY (`ModelID`) REFERENCES `model` (`ModelID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onlinepay`
--
ALTER TABLE `onlinepay`
  ADD CONSTRAINT `FK_TRID_ONLINEPAY` FOREIGN KEY (`TransactionID`) REFERENCES `transaction` (`TransactionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD CONSTRAINT `passwordreset_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `user` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`CartID`) REFERENCES `cart` (`CartID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `user` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
