/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100420 (10.4.20-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : sisfokampus

 Target Server Type    : MariaDB
 Target Server Version : 100420 (10.4.20-MariaDB)
 File Encoding         : 65001

 Date: 04/07/2023 21:15:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_dosen
-- ----------------------------
DROP TABLE IF EXISTS `data_dosen`;
CREATE TABLE `data_dosen` (
  `id_dosen` varchar(100) NOT NULL,
  `nidn` varchar(30) DEFAULT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `id_agama` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `npwp` varchar(25) DEFAULT NULL,
  `no_sk_pengangkatan` varchar(30) DEFAULT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `lembaga_pengangkat` varchar(30) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(2) DEFAULT NULL,
  `rw` varchar(2) DEFAULT NULL,
  `dusun` varchar(30) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `hp` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_wilayah` char(8) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of data_dosen
-- ----------------------------
BEGIN;
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('02d5f430fca3e50e5b70b542accb430f', '0808088601', 'MARDI', '', 'L', '1', '', '1986-08-08', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('0b1032898e3f81e50602c925f1f3229b', '0831058801', 'SALMAN ALIAJI', '', 'L', '1', '', '1988-05-31', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('12d6b1c1c6d54da4a00dbe2c12c7a7f8', '0813108602', 'ICHWAN PURWATA, S.S.,MA', '', 'L', '1', '', '1986-10-13', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('258bcf2db5d318d4c788709777bfb85c', '0801018603', 'WIRE BAGYE', '', 'L', '1', '', '1986-01-01', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('27a63351c758370b1b892722d495e185', '0805078901', 'LALU MUTAWALLI', '', 'L', '1', '', '1989-07-05', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('27b5f8fa5068c1293bbc6cb24130a78a', '0819028402', 'MUHAMMAD FAUZI ZULKARNAEN', '', 'L', '1', '', '1984-02-19', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('3b1333274e896d54e5a1b30a5bbf5dc1', '0831129101', 'AHMAD TANTONI', '', 'L', '1', '', '1991-12-31', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('63fd03237c34e3ae0084f225c91d2b60', '9908419990', 'MAEMUN SALEH', '', 'L', '1', '', '1987-09-16', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('674807ca02dc470cfbc9e85ab0ac984d', '0812118402', 'AHMAD SUSAN PARDIANSYAH', '', 'L', '1', '', '1984-11-12', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('6bc7f90d2f226f994fbab98afffde1b3', '0829079003', 'SOFIANSYAH FADLI', '', 'L', '1', '', '1990-07-29', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('734ed20e5728eff1ba365eaca51b6d64', '0815128201', 'HAIRUL FAHMI', '', 'L', '1', '', '1982-12-15', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('76a9d04acd813a0f9d0954637db25c95', '0808058801', 'MAULANA ASHARI', '', 'P', '1', '', '1988-05-08', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('90a806d9c19e100cfd9f3787afb79c0d', '0812038502', 'HASYIM ASYARI', '', 'L', '1', '', '1985-03-12', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('9ed3fcd51359f1190eb04c30bc5092af', '0831128326', 'WAFIAH MURNIATI', '', 'L', '1', '', '1983-12-31', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('ac9ba8549569ca219407e469b3176d1c', '0827036202', 'AMBARA', '', 'L', '1', '', '1962-03-27', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('afc86e454a1b72f7171e1a59456ba7d1', '0812038403', 'SAIKIN', '', 'L', '1', '', '1984-03-12', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('b57eeb4e12d21ef051d6abd61fd6dcdf', '0826098702', 'SAEFUL HAMDI', '', 'L', '1', '', '1987-09-26', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('b8955f036777157d894ec53534c043d6', '0826098701', 'KHAIRUL IMTIHAN', '', 'L', '1', '', '1987-09-26', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('de1d8ba47c4d09a4045f208addc5fdd7', '7700012857', 'JIHADUL AKBAR', '', 'L', '1', '', '1991-01-08', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('e12956654bb7d2968cd5de1b5bddc22d', '0818018202', 'MOHAMMAD TAUFAN ASRI ZAEN', '', 'L', '1', '', '1982-01-18', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 1, NULL);
INSERT INTO `data_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `nik`, `jenis_kelamin`, `id_agama`, `tempat_lahir`, `tanggal_lahir`, `npwp`, `no_sk_pengangkatan`, `tanggal_sk`, `lembaga_pengangkat`, `jalan`, `rt`, `rw`, `dusun`, `kode_pos`, `kelurahan`, `hp`, `email`, `id_wilayah`, `status`, `foto`) VALUES ('f780a6639bc286a0ec21686007fbda88', '8844433420', 'BAIQ SRI DAMAYANTI WIRADARMA', '', 'L', '1', '', '1971-04-05', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', NULL, 0, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
