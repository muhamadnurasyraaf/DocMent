-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table docment.admin: ~4 rows (approximately)
INSERT INTO `admin` (`username`, `email`, `password`, `user_id`, `age`, `image`) VALUES
	('muhamadurasyraaf', 'masyraaf14@gmail.com', '$2y$10$eHh9jOh2D1GM4VGMDOs8E.PucutQP2bwTXRUEOTB0WoMICUbk7g3a', 1, 20, 'asy.jpg'),
	('muhamadsaeeb', 'saeeb12@gmail.com', '$2y$10$TLVH3x0zVt4Wu8bVALyia.TaltbUU5CrYizDAJ1bHwkRjHe751vo.', 2, 20, 'saeeb.jpg'),
	('asy', 'masyraaf022@gmail.com', '$2y$10$TLVH3x0zVt4Wu8bVALyia.TaltbUU5CrYizDAJ1bHwkRjHe751vo.', 4, 20, 'asy.jpg'),
	('Eireena', 'eireena12@gmail.com', '$2y$10$Sr/krHMZVJyiAQAlm.N96uJ/LigMqXb9O6AzsrpkQONasT/D6sKze', 5, 19, NULL);

-- Dumping data for table docment.appoinment: ~2 rows (approximately)
INSERT INTO `appoinment` (`id`, `fullname`, `date`, `patientId`, `clinicId`, `doctorId`, `email`, `status`, `doctor_name`, `description`) VALUES
	(1, 'Eireena Hanania Jasmine', '2023-07-12', 3, 2, 3, 'eireena12@gmail.com', 'Approved', 'Asyraaf', NULL),
	(2, 'Acerap', '2023-07-12', 3, 2, 2, 'masyraaf022@gmail.com', 'Rejected', 'Eireena', NULL);

-- Dumping data for table docment.bookingreq: ~5 rows (approximately)
INSERT INTO `bookingreq` (`id`, `fullname`, `date`, `patientId`, `clinicId`, `doctorId`, `email`, `status`, `doctor_name`, `description`) VALUES
	(1, 'Muhamad Nur Asyraaf', '2023-07-19', 3, 1, 1, 'masyraaf14@gmail.com', 'Pending', 'ikhmal', NULL),
	(6, 'Asyraaf', '2023-07-22', 1, 1, 1, 'masyraaf14@gmail.com', 'Pending', 'ikhmal', NULL),
	(7, 'Haziq Hasnul', '2023-07-14', 1, 2, 3, 'haziqgg@gmail.com', 'Pending', 'Asyraaf', NULL),
	(8, 'Oishy', '2023-07-27', 1, 1, 1, 'oishyhaz@gmail.com', NULL, 'ikhmal', 'I have mental health issues'),
	(9, 'Asyraaf', '2023-07-20', 2, 2, 2, 'masyraaf14@gmail.com', NULL, 'Asyraaf', 'I got tonsil');

-- Dumping data for table docment.clinic: ~2 rows (approximately)
INSERT INTO `clinic` (`id`, `name`, `state`, `area`, `head_doctor_id`, `qualification_code`) VALUES
	(1, 'Klinik Syifa', 'Pahang', 'Rompin', 2, '1'),
	(2, 'Klinik Kesihatan Endau', 'Johor', 'Endau', 1, '');

-- Dumping data for table docment.clinictemp: ~0 rows (approximately)

-- Dumping data for table docment.doctor: ~4 rows (approximately)
INSERT INTO `doctor` (`user_id`, `username`, `email`, `age`, `password`, `clinic_id`) VALUES
	(1, 'ikhmal', 'ikhmal12@gmail.com', 20, '$2y$10$wMKNt/87IAcirEKbnrQbp.zi2tFH90gvzAMYwMc1J/afNXzOeyteW', 1),
	(2, 'Eireena', 'eireenaJasmine03@gmail.com', 19, '$2y$10$JFTph2uo7Lh3XRVDczEbBOaJL.fsB3UGJCKg4bWp2UweXLcq/fh82', 2),
	(3, 'Asyraaf', 'masyraaf14@gmail.com', 20, '$2y$10$2zUzjkzFhFD24G2s7H9ADufu7p2ry2HgDz3V52sbZNBSa.S/hcm6y', 2),
	(4, 'mamat03', 'mamat03@gmail.com', 25, '$2y$10$m0I/WVZvQoMcU6g5gXvtzOV2K1vBa6QJHAtUjbGoOEHunSTB4TBUm', NULL);

-- Dumping data for table docment.doctortemp: ~0 rows (approximately)

-- Dumping data for table docment.patient: ~2 rows (approximately)
INSERT INTO `patient` (`user_id`, `username`, `password`, `email`, `age`) VALUES
	(1, 'Haziq', '$2y$10$kLIVL82aIRQUSulMRqgQqO9Hh3enDTs19dx/lo/oibZ5M74gdijru', 'haziqgg@gmail.com', 17),
	(2, 'Asyraaf', '$2y$10$mryeTpRxzmDmc6NTvNcSIew4Jh/KeHTqdJ/js5AnnS1T4lymK6K8q', 'masyraaf14@gmail.com', 20);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
