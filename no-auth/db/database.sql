
CREATE DATABASE IF NOT EXISTS `test_wdmj`;
USE `test_wdmj`;


CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `nis` varchar(250) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `jurusan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

