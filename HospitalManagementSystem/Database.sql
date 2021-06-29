-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2021, 23:01:14
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hospital`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `adminTRID` bigint(20) NOT NULL,
  `clinicName` varchar(30) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `adminSurname` varchar(30) NOT NULL,
  `adminEmail` varchar(30) NOT NULL,
  `adminPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`adminTRID`, `clinicName`, `adminName`, `adminSurname`, `adminEmail`, `adminPassword`) VALUES
(11111111111, 'Ophthalmology', 'Ceyda', 'Elmas', 'cey@gmail.com', '123456'),
(12345678912, 'Otorhinolaryngology', 'Levent', 'Atahanlı', 'levent@gmail.com', '654321'),
(99999999999, 'Plastic Surgery', 'Joseph', 'Ledet ', 'joseph@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` time NOT NULL,
  `appointmentStatus` varchar(30) DEFAULT NULL,
  `prescriptionSerialNo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `appointmentDate`, `appointmentTime`, `appointmentStatus`, `prescriptionSerialNo`) VALUES
(55251, '2020-07-17', '04:00:00', 'Approved', 'ABCD'),
(15133848, '2021-05-18', '09:00:00', 'Approved', 'Not Entered'),
(18146367, '2021-05-17', '08:00:00', 'Approved', 'Not Entered'),
(20758975, '2021-05-12', '07:30:00', 'Approved', 'ABCDEFGHDF'),
(30381793, '2021-06-27', '07:20:00', 'Approved', 'Not Entered'),
(34260603, '2021-06-18', '07:20:00', 'Approved', 'Not Entered'),
(42208341, '2021-07-04', '11:20:00', 'Waiting...', 'Not Entered'),
(45089983, '2021-05-19', '12:00:00', 'Approved', 'Not Entered'),
(49330915, '2021-06-26', '14:00:00', 'Not Approved', 'Not Entered'),
(62724515, '2021-06-26', '09:00:00', 'Approved', 'Not Entered'),
(62989346, '2021-05-11', '14:00:00', 'Approved', 'ABCDEF'),
(75797299, '2021-06-30', '11:40:00', 'Waiting...', 'Not Entered'),
(76740472, '2021-05-21', '10:00:00', 'Approved', 'Not Entered'),
(77846640, '2021-05-21', '09:00:00', 'Approved', 'Not Entered'),
(78338049, '2021-06-28', '06:30:00', 'Approved', 'Not Entered'),
(80958467, '2021-05-21', '08:00:00', 'Approved', 'Not Entered'),
(83878569, '2021-05-20', '07:00:00', 'Approved', 'Not Entered'),
(91078579, '2020-07-22', '10:00:00', 'Approved', 'Not Entered'),
(92997818, '2020-02-21', '16:00:00', 'Approved', 'Not Entered'),
(95906906, '2021-05-20', '06:00:00', 'Approved', 'Not Entered'),
(98249047, '2021-07-04', '06:00:00', 'Waiting...', 'Not Entered');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosisID` int(11) NOT NULL,
  `diagnosisName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosisID`, `diagnosisName`) VALUES
(0, NULL),
(49419811, 'Anemia'),
(57909060, 'Anemia'),
(89406643, 'Anemia');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctor`
--

CREATE TABLE `doctor` (
  `doctorTRID` bigint(11) NOT NULL,
  `clinicName` varchar(30) NOT NULL,
  `doctorName` varchar(20) NOT NULL,
  `doctorSurname` varchar(30) NOT NULL,
  `doctorEmail` varchar(30) NOT NULL,
  `doctorGender` varchar(10) NOT NULL,
  `doctorBranch` varchar(30) NOT NULL,
  `doctorPosition` varchar(30) NOT NULL,
  `doctorPhone` bigint(20) NOT NULL,
  `doctorPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `doctor`
--

INSERT INTO `doctor` (`doctorTRID`, `clinicName`, `doctorName`, `doctorSurname`, `doctorEmail`, `doctorGender`, `doctorBranch`, `doctorPosition`, `doctorPhone`, `doctorPassword`) VALUES
(22222222222, 'Ophthalmology', 'Aslı', 'Türkoğlu', 'asli@gmail.com', 'Female', 'Anterior Segment Surgery', 'Specialist Doctor', 5121212121, '123456'),
(33333333333, 'Ophthalmology', 'Melike', 'Tekin', 'melike@gmail.com', 'Female', 'Eye tumors', 'Chief Physician', 5454545454, '123456'),
(44444444444, 'Otorhinolaryngology', 'Hümeyra', 'Köseoğlu', 'humeyra@gmail.com', 'Female', 'Otology ', 'Deputy Chief Physician', 5353535353, '123456'),
(55555555555, 'Ophthalmology', 'Arzu', 'Dabanıyastı', 'arzu@gmail.com', 'Female', 'Pathologist', 'specialist doctor', 1111111111, '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hospitalrelation`
--

CREATE TABLE `hospitalrelation` (
  `doctorTRID` bigint(20) NOT NULL,
  `patientTRID` bigint(20) NOT NULL,
  `appointmentID` int(11) NOT NULL,
  `testID` int(11) NOT NULL,
  `diagnosisID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `hospitalrelation`
--

INSERT INTO `hospitalrelation` (`doctorTRID`, `patientTRID`, `appointmentID`, `testID`, `diagnosisID`) VALUES
(22222222222, 6666, 18146367, 0, 0),
(33333333333, 6666, 15133848, 0, 0),
(55555555555, 6666, 45089983, 0, 0),
(22222222222, 7777, 80958467, 0, 0),
(33333333333, 7777, 83878569, 114669, 0),
(55555555555, 7777, 76740472, 0, 0),
(22222222222, 8888, 62724515, 0, 0),
(33333333333, 8888, 78338049, 0, 0),
(55555555555, 8888, 77846640, 0, 0),
(22222222222, 9999, 49330915, 0, 0),
(33333333333, 9999, 75797299, 0, 0),
(22222222222, 8888, 92997818, 0, 0),
(33333333333, 5555, 55251, 78951507, 89406643),
(33333333333, 5555, 98249047, 0, 0),
(55555555555, 5555, 62989346, 62676924, 49419811),
(22222222222, 8888, 95906906, 0, 0),
(22222222222, 8888, 91078579, 0, 0),
(33333333333, 9999, 20758975, 76732365, 57909060),
(33333333333, 8888, 34260603, 0, 0),
(55555555555, 8888, 30381793, 0, 0),
(55555555555, 8888, 42208341, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `new_table`
--

CREATE TABLE `new_table` (
  `clinicName` varchar(30) NOT NULL,
  `adminTRID` bigint(20) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `adminSurname` varchar(30) NOT NULL,
  `adminEmail` varchar(30) NOT NULL,
  `adminPassword` varchar(20) NOT NULL,
  `doctorTRID` bigint(20) NOT NULL,
  `doctorName` varchar(20) NOT NULL,
  `doctorSurname` varchar(30) NOT NULL,
  `doctorEmail` varchar(30) NOT NULL,
  `doctorGender` varchar(10) NOT NULL,
  `doctorBranch` varchar(30) NOT NULL,
  `doctorPosition` varchar(30) NOT NULL,
  `doctorPhone` bigint(20) NOT NULL,
  `doctorPassword` varchar(20) NOT NULL,
  `patientTRID` bigint(20) NOT NULL,
  `patientName` varchar(20) NOT NULL,
  `patientSurname` varchar(30) NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientDOB` date NOT NULL,
  `patientEmail` varchar(30) NOT NULL,
  `patientPhone` bigint(20) NOT NULL,
  `patientAddress` varchar(255) NOT NULL,
  `patientPassword` varchar(20) NOT NULL,
  `appointmentID` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` time NOT NULL,
  `appointmentStatus` varchar(30) DEFAULT NULL,
  `prescriptionSerialNo` varchar(10) DEFAULT NULL,
  `testID` int(11) NOT NULL,
  `testName` varchar(30) DEFAULT NULL,
  `testDate` date DEFAULT NULL,
  `testResult` varchar(30) DEFAULT NULL,
  `diagnosisID` int(11) NOT NULL,
  `diagnosisName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `new_table`
--

INSERT INTO `new_table` (`clinicName`, `adminTRID`, `adminName`, `adminSurname`, `adminEmail`, `adminPassword`, `doctorTRID`, `doctorName`, `doctorSurname`, `doctorEmail`, `doctorGender`, `doctorBranch`, `doctorPosition`, `doctorPhone`, `doctorPassword`, `patientTRID`, `patientName`, `patientSurname`, `patientGender`, `patientDOB`, `patientEmail`, `patientPhone`, `patientAddress`, `patientPassword`, `appointmentID`, `appointmentDate`, `appointmentTime`, `appointmentStatus`, `prescriptionSerialNo`, `testID`, `testName`, `testDate`, `testResult`, `diagnosisID`, `diagnosisName`) VALUES
('Ophthalmology', 11111111111, 'Ceyda', 'Elmas', 'cey@gmail.com', '123456', 22222222222, 'Aslı', 'Türkoğlu', 'asli@gmail.com', 'Female', 'Anterior Segment Surgery', 'Specialist Doctor', 5121212121, '123456', 12345678902, 'Hüseyin', 'Kaya', 'Male', '2003-04-15', 'huseyin@gmail.com', 5898989898, 'Sultanahmet', '123456', 1, '2021-04-17', '08:30:00', 'Approved by Admin', 'ABC12D', 1, 'Blood Test', '2020-04-18', 'Blood pressure value is low', 1, 'Astigmatism'),
('Ophthalmology', 11111111111, 'Ceyda', 'Elmas', 'cey@gmail.com', '123456', 22222222222, 'Aslı', 'Türkoğlu', 'asli@gmail.com', 'Female', 'Anterior Segment Surgery', 'Specialist Doctor', 5121212121, '123456', 12345678902, 'Hüseyin', 'Kaya', 'Male', '2003-04-15', 'huseyin@gmail.com', 5898989898, 'Sultanahmet', '123456', 1, '2021-04-17', '08:30:00', 'Approved by Admin', 'ABC12D', 2, 'Eye Test', '2020-04-17', 'Degre of astigmatism is 1.5', 1, 'Astigmatism'),
('Ophthalmology', 11111111111, 'Ceyda', 'Elmas', 'cey@gmail.com', '123456', 22222222222, 'Aslı', 'Türkoğlu', 'asli@gmail.com', 'Female', 'Anterior Segment Surgery', 'Specialist Doctor', 5121212121, '123456', 12345678902, 'Hüseyin', 'Kaya', 'Male', '2003-04-15', 'huseyin@gmail.com', 5898989898, 'Sultanahmet', '123456', 2, '2021-04-19', '10:30:00', 'Approved by Admin', NULL, 3, 'Blood Test', '2021-04-19', 'Blood pressure value is high', 2, 'Jaundice'),
('Ophthalmology', 11111111111, 'Ceyda', 'Elmas', 'cey@gmail.com', '123456', 22222222222, 'Aslı', 'Türkoğlu', 'asli@gmail.com', 'Female', 'Anterior Segment Surgery', 'Specialist Doctor', 5121212121, '123456', 12345678902, 'Hüseyin', 'Kaya', 'Male', '2003-04-15', 'huseyin@gmail.com', 5898989898, 'Sultanahmet', '123456', 2, '2021-04-19', '10:30:00', 'Approved by Admin', NULL, 3, 'Blood Test', '2021-04-19', 'Blood pressure value is high', 3, 'Tumor'),
('Ophthalmology', 11111111111, 'Ceyda', 'Elmas', 'cey@gmail.com', '123456', 33333333333, 'Melike', 'Tekin', 'melike@gmail.com', 'Female', 'Eye tumors', 'Chief Physician', 5454545454, '123456', 12345252252, 'Doğa', 'Altıntop', 'Female', '2001-04-11', 'doga@gmail.com', 5324646433, 'Assos', 'banana1*', 4, '2021-04-25', '13:00:00', 'Approved by Admin', NULL, 0, NULL, NULL, NULL, 0, NULL),
('Ophthalmology', 11111111111, 'Ceyda', 'Elmas', 'cey@gmail.com', '123456', 33333333333, 'Melike', 'Tekin', 'melike@gmail.com', 'Female', 'Eye tumors', 'Chief Physician', 5454545454, '123456', 12345678903, 'Mehmet', 'Doğan', 'Male', '1990-03-21', 'mehmet@gmail.com', 5073336252, 'Bağcılar', 'mehmet1990', 3, '2021-04-20', '11:30:00', 'Cancelled by Patient', NULL, 0, NULL, NULL, NULL, 0, NULL),
('Otorhinolaryngology', 12345678912, 'Levent', 'Atahanlı', 'levent@gmail.com', '654321', 44444444444, 'Hümeyra', 'Köseoğlu', 'humeyra@gmail.com', 'Female', 'Otology ', 'Deputy Chief Physician', 5353535353, '123456', 12345678902, 'Hüseyin', 'Kaya', 'Male', '2003-04-15', 'huseyin@gmail.com', 5898989898, 'Sultanahmet', '123456', 6, '2021-04-17', '09:30:00', 'Approved by Admin', NULL, 4, 'Blood Test', '2021-04-17', 'Blood pressure value is normal', 0, NULL),
('Otorhinolaryngology', 12345678912, 'Levent', 'Atahanlı', 'levent@gmail.com', '654321', 44444444444, 'Hümeyra', 'Köseoğlu', 'humeyra@gmail.com', 'Female', 'Otology ', 'Deputy Chief Physician', 5353535353, '123456', 45678912345, 'Can', 'Öztürk', 'Male', '1996-06-23', 'can@hotmail.com', 5556544501, 'Yenimahalle', 'can123+', 5, '2021-04-18', '10:30:00', 'Not Approved by Admin', NULL, 0, NULL, NULL, NULL, 0, NULL),
('Otorhinolaryngology', 12345678912, 'Levent', 'Atahanlı', 'levent@gmail.com', '654321', 44444444444, 'Hümeyra', 'Köseoğlu', 'humeyra@gmail.com', 'Female', 'Otology ', 'Deputy Chief Physician', 5353535353, '123456', 45678965478, 'Kıvanç ', 'Tatlıtuğ', 'Male', '1983-10-27', 'kıvanc@tatlitug.com', 5551234578, 'Zekeriyaköy', '123456', 7, '2021-05-13', '13:30:00', 'Approved by Admin', NULL, 0, NULL, NULL, NULL, 4, 'Pneumonia'),
('Otorhinolaryngology', 12345678912, 'Levent', 'Atahanlı', 'levent@gmail.com', '654321', 55555555555, 'Arzu', 'Dabanıyastı', 'arzu@gmail.com', 'Female', 'Head and neck surgery', 'Specialist Doctor', 5656565656, '123456', 45678965478, 'Kıvanç ', 'Tatlıtuğ', 'Male', '1983-10-27', 'kıvanc@tatlitug.com', 5551234578, 'Zekeriyaköy', '123456', 8, '2021-04-28', '11:00:00', 'Approved by Admin', 'FD463823', 0, NULL, NULL, NULL, 5, 'Pneumonia');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patient`
--

CREATE TABLE `patient` (
  `patientTRID` bigint(20) NOT NULL,
  `patientName` varchar(20) NOT NULL,
  `patientSurname` varchar(30) NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientDOB` date NOT NULL,
  `patientEmail` varchar(30) NOT NULL,
  `patientPhone` bigint(20) NOT NULL,
  `patientAddress` varchar(255) NOT NULL,
  `patientPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `patient`
--

INSERT INTO `patient` (`patientTRID`, `patientName`, `patientSurname`, `patientGender`, `patientDOB`, `patientEmail`, `patientPhone`, `patientAddress`, `patientPassword`) VALUES
(5555, 'Mehmet', 'Doğan', 'Male', '1990-03-21', 'mehmet@gmail.com', 5073336252, 'Bağcılar', '123456'),
(6666, 'Can', 'Öztürk', 'Male', '1996-06-23', 'can@hotmail.com', 5556544501, 'Yenimahalle', '123456'),
(7777, 'Doğa', 'Altıntop', 'Female', '2001-04-11', 'doga@gmail.com', 5324646433, 'Assos', '123456'),
(8888, 'Hüseyin', 'Kaya', 'Male', '2003-04-15', 'huseyin@gmail.com', 5898989898, 'Sultanahmet', '123456'),
(9999, 'Kıvanç ', 'Tatlıtuğ', 'Male', '1983-10-27', 'kıvanc@tatlitug.com', 5551234578, 'Zekeriyaköy', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `test`
--

CREATE TABLE `test` (
  `testID` int(11) NOT NULL,
  `testName` varchar(30) DEFAULT NULL,
  `testDate` date DEFAULT NULL,
  `testResult` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `test`
--

INSERT INTO `test` (`testID`, `testName`, `testDate`, `testResult`) VALUES
(0, NULL, NULL, NULL),
(114669, 'PCR TEST', '2021-05-22', 'Negative'),
(62676924, 'Blood Test', '2021-05-21', 'Blood pressure value is low'),
(76732365, 'Blood Test', '2021-05-21', 'Blood pressure value is low'),
(78951507, 'Blood Test', '2021-05-21', 'Blood pressure value is low');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminTRID`);

--
-- Tablo için indeksler `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Tablo için indeksler `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosisID`);

--
-- Tablo için indeksler `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorTRID`);

--
-- Tablo için indeksler `hospitalrelation`
--
ALTER TABLE `hospitalrelation`
  ADD KEY `FK_adminDoctorTRID` (`doctorTRID`),
  ADD KEY `FK_patientAppointmentID` (`appointmentID`);

--
-- Tablo için indeksler `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientTRID`);

--
-- Tablo için indeksler `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `hospitalrelation`
--
ALTER TABLE `hospitalrelation`
  ADD CONSTRAINT `FK_adminDoctorTRID` FOREIGN KEY (`doctorTRID`) REFERENCES `doctor` (`doctorTRID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_patientAppointmentID` FOREIGN KEY (`appointmentID`) REFERENCES `appointment` (`appointmentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
