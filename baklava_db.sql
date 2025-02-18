/*
 Navicat Premium Data Transfer

 Source Server         : Proje
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : baklava_db

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 28/05/2023 11:16:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for baklavalar
-- ----------------------------
DROP TABLE IF EXISTS `baklavalar`;
CREATE TABLE `baklavalar`  (
  `Baklava_ID` int NOT NULL AUTO_INCREMENT,
  `Baklava_Isim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `Baklava_Aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `Baklava_Fiyat` int NULL DEFAULT NULL,
  `Baklava_Resim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Baklava_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of baklavalar
-- ----------------------------
INSERT INTO `baklavalar` VALUES (1, 'Fıstıklı Dürüm', 'Gaziantep yöresinde yetişen yeşil fıstık kullanılır. 140 yıllık tecrübeyle belirlenen sıcaklıkta pişirilir ve özel şerbetiyle şerbetlenir.\r\nSade yağ, Antep fıstığı, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 506, 'fistiklidurum.jpg');
INSERT INTO `baklavalar` VALUES (2, 'Fıstıklı Havuç Dilim Baklava', 'Fıstıklı havuç dilimi, 30 kat yufkadan yapılır. Bol miktarda, iri fıstık kullanılır. biraz daha fazla sadeyağ içerir , şekeri daha azdır.\r\nSade yağ, Antep fıstığı, süt, irmik, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 396, 'fistiklihavucdilimbaklava.jpg');
INSERT INTO `baklavalar` VALUES (3, 'Soğuk Baklava', 'Baklava Hamuru, Baklava Şerbeti, Sade Yağ, Sütlü Çikolata, Süt Kreması, Süt, İri Antep Fıstığı, Yumurta', 308, 'sogukbaklava.jpg');
INSERT INTO `baklavalar` VALUES (4, 'Fıstıklı Baklava', 'Ortalama 40 kat yufka kullanılarak hazırlanır. İçeriğinde, Gaziantep yöresinde yetişen yeşil fıstık kullanılır. 140 yıllık tecrübeyle belirlenen sıcaklıkta pişirilir ve özel şerbetiyle şerbetlenir.\r\nSade yağ, Antep fıstığı, süt, irmik, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 347, 'fistiklibaklava.jpg');
INSERT INTO `baklavalar` VALUES (5, 'Fıstıklı Midye Baklava', 'Ortalama 40 kat yufka kullanılarak hazırlanır. İçeriğinde, Gaziantep yöresinde yetişen yeşil fıstık kullanılır. 140 yıllık tecrübeyle belirlenen sıcaklıkta pişirilir ve özel şerbetiyle şerbetlenir.\r\nSade yağ, Antep fıstığı, süt, irmik, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 545, 'fistiklimidyebaklava.jpg');
INSERT INTO `baklavalar` VALUES (6, 'Fıstıklı Şöbiyet', 'Eşsiz lezzete sahip Antep fıstığı ve kaymakla yapılan şöbiyet, 140 yıllık tecrübeyle belirlenen sıcaklıkta pişirilir ve özel şerbetiyle şerbetlenir.\r\nSade yağ, Antep fıstığı, süt, irmik, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 500, 'fistiklisobiyet.jpg');
INSERT INTO `baklavalar` VALUES (7, 'Fıstıklı Kuru Baklava', 'Fıstıklı baklavadan farklı olarak daha koyu şerbet kıvamına sahip olmasına rağmen daha az şerbet oranına sahiptir.\r\nSade yağ, Antep fıstığı, yumurta, buğday unu,buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 418, 'fistiklikurubaklava.jpg');
INSERT INTO `baklavalar` VALUES (8, 'Cevizli Baklava', 'Cevizli Baklava, ortalama 40 kat yufka kullanılarak hazırlanır. Lezzetiyle ünlü süt beyaz ceviz konulur.\r\nSade yağ, Ceviz, süt, irmik, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 320, 'cevizlibaklava.jpg');
INSERT INTO `baklavalar` VALUES (10, 'Sütlü Nuriye', 'Ortalama 40 kat yufka kullanılarak hazırlanır. İçeriğinde, Gaziantep yöresinde yetişen yeşil fıstık kullanılır. 140 yıllık tecrübeyle belirlenen sıcaklıkta pişirilir ve özel şerbetiyle şerbetlenir.\r\nSade yağ, Antep fıstığı, süt, irmik, yumurta, buğday unu, buğday nişastası, mısır nişastası, tuz, su, şeker, limon suyu', 292, 'sutlunuriye.jpg');

-- ----------------------------
-- Table structure for hakkinda
-- ----------------------------
DROP TABLE IF EXISTS `hakkinda`;
CREATE TABLE `hakkinda`  (
  `hakkinda_ID` int NOT NULL AUTO_INCREMENT,
  `hakkinda` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  PRIMARY KEY (`hakkinda_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hakkinda
-- ----------------------------
INSERT INTO `hakkinda` VALUES (1, '<p><b><i><u>Bir marka, bir firma ismi olmaktan öte adı baklava ile özdeş Güllüoğlu 1871 yılından bugüne 5 kuşaktır baklavacılık ile uğraşan Gaziantepli bir ailenin ismidir. 1871 yılında büyük dede Güllü Çelebi, Hac yolundaki Halep’te gördüğü bu işi yapmaya karar vermiştir. Aklında orada öğrendiği muhteşem tatlıyı kendi topraklarında yeni baştan yapmak vardı.</u></i></b> O güne kadar baklava, Osmanlı sarayında yenilen ancak bunun için farklı vilayetlerden özel usta getirtilip yapılan ve saray dışına çıkmayan, halkın bilmediği bir tatlıyken onu ilk defa halkla buluşturan Güllü Çelebi’dir.</p><p><br></p>\r\n<p>Güllü Çelebi, 40 kat incecik açtığı hamurları mis gibi tereyağı ve şerbetle birleştirdi, Antep fıstığı ile bezedi. Harran Ovası’nın buğdayı ile tül gibi ince kat kat hamuru, dünyaca ünlü Antep fıstığı, saf Urfa tereyağı ve kıvamlı şerbetiyle altın renkli lezzet hazinesi baklava işte böyle doğdu. Baklava, tatlı yiyip tatlı konuşan bir milletin en değerli tatlısını üreten Güllüoğlu ailesinin Türk mutfağına bir armağanı oldu.</p><p><br></p>\r\n<p><b><i><u>Ailenin bu işe gönül vermesiyle birlikte baklavacılık kuşaktan kuşağa aktarılmaya başlamıştır. Güllü Çelebi torunlarından olan 4. kuşak temsilcisi Mustafa Güllü bu tatlının sadece Gaziantep ve civar illerde olmasından ziyade İstanbul’a da açılması gerektiğine karar vermiştir. Aldığı bu karar ile 1949 yılında İstanbul’a gelmiş ve baklavayı önce buraya sonra dünyaya tanıtma amacı ile adımlarını atmaya başlamıştır.Güllüoğlu markasını perakende sektörüne sokan Mustafa Güllü’nün izini takip eden aile fertleri 140 yılı aşkın süredir babadan oğula aktarılan bilgi, deneyim, işe duyulan saygı ve titizlikle devraldığı baklavacılık işini halen devam ettirm</u></i></b>ektedir. Asırlık Güllüoğlu deneyimi ve geleneksel değerleriyle üretilen ürünlerimizi tüm Türkiye ve sınırlarımız ötesine taşımak vizyonuyla, müşterilerimizin ürünlerimizi tüketmek istedikleri her yerde ulaşılabilir olmak ve ilk tercihleri haline gelmek misyonuyla markamız her geçen gün güçlenerek büyümekte ve İstanbul’da 43 Türkiye genelinde ise 84 şubeye ulaşarak geleceğe doğru emin adımlarla yürümeye devam etmektedir.</p>');

-- ----------------------------
-- Table structure for musteri_turu
-- ----------------------------
DROP TABLE IF EXISTS `musteri_turu`;
CREATE TABLE `musteri_turu`  (
  `Musteri_Turu_ID` int NOT NULL AUTO_INCREMENT,
  `Musteri_Turu` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Musteri_Turu_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of musteri_turu
-- ----------------------------
INSERT INTO `musteri_turu` VALUES (1, 'Yönetici');
INSERT INTO `musteri_turu` VALUES (2, 'Müşteri');

-- ----------------------------
-- Table structure for musteriler
-- ----------------------------
DROP TABLE IF EXISTS `musteriler`;
CREATE TABLE `musteriler`  (
  `Musteri_ID` int NOT NULL AUTO_INCREMENT,
  `Musteri_Isim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `Eposta` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `SifreSifirlamaIstek` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT '0',
  `Musteri_Sifre` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT '0',
  `Musteri_Turu` int NULL DEFAULT NULL,
  `Musteri_Adres` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  PRIMARY KEY (`Musteri_ID`) USING BTREE,
  INDEX `Musteri_Turu`(`Musteri_Turu`) USING BTREE,
  CONSTRAINT `Musteri_Turu` FOREIGN KEY (`Musteri_Turu`) REFERENCES `musteri_turu` (`Musteri_Turu_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of musteriler
-- ----------------------------
INSERT INTO `musteriler` VALUES (23, 'Kaan', 'kaan_ali_2000@hotmail.com', '0', 'asd', 1, 'Büyükdere');
INSERT INTO `musteriler` VALUES (24, 'Talha', 'talhayildiz11@hotmail.com', '1', '123', 2, 'Çarşı');
INSERT INTO `musteriler` VALUES (25, 'Onur', 'onur@hotmail.com', '0', '456', 2, 'Bağlar');
INSERT INTO `musteriler` VALUES (29, 'asd', 'asd@hotmail.com', '0', 'asd', 2, 'asdasd');

-- ----------------------------
-- Table structure for sepet
-- ----------------------------
DROP TABLE IF EXISTS `sepet`;
CREATE TABLE `sepet`  (
  `Sepet_ID` int NOT NULL AUTO_INCREMENT,
  `Musteri_ID` int NULL DEFAULT NULL,
  `Baklava_ID` int NULL DEFAULT NULL,
  `Siparis_Gecerliligi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `SiprisDurumu_ID` int NULL DEFAULT NULL,
  `Fiyatlar` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Sepet_ID`) USING BTREE,
  INDEX `Baklava_ID`(`Baklava_ID`) USING BTREE,
  INDEX `Mustri_ID`(`Musteri_ID`) USING BTREE,
  INDEX `SiprisDurumu_ID`(`SiprisDurumu_ID`) USING BTREE,
  CONSTRAINT `Baklava_ID` FOREIGN KEY (`Baklava_ID`) REFERENCES `baklavalar` (`Baklava_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `Mustri_ID` FOREIGN KEY (`Musteri_ID`) REFERENCES `musteriler` (`Musteri_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `SiprisDurumu_ID` FOREIGN KEY (`SiprisDurumu_ID`) REFERENCES `siparisdurumu` (`SiparisDurumu_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 828 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sepet
-- ----------------------------
INSERT INTO `sepet` VALUES (822, 23, 1, 'Teslim Edildi', 3, '506');
INSERT INTO `sepet` VALUES (823, 23, 3, 'Teslim Edildi', 3, '308');
INSERT INTO `sepet` VALUES (824, 23, 6, 'Teslim Edildi', 3, '500');
INSERT INTO `sepet` VALUES (825, 23, 2, 'Hazırlanıyor', 2, '396');
INSERT INTO `sepet` VALUES (826, 23, 2, 'gecerli', 5, '396');
INSERT INTO `sepet` VALUES (827, 23, 5, 'gecerli', 5, '545');

-- ----------------------------
-- Table structure for siparis
-- ----------------------------
DROP TABLE IF EXISTS `siparis`;
CREATE TABLE `siparis`  (
  `Siparis_ID` int NOT NULL AUTO_INCREMENT,
  `Musteri_ID` int NULL DEFAULT NULL,
  `SiparisDurumu_ID` int NULL DEFAULT NULL,
  `ToplamTutar` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Siparis_ID`) USING BTREE,
  INDEX `Musteri_ID`(`Musteri_ID`) USING BTREE,
  INDEX `SiparisDurumu_ID`(`SiparisDurumu_ID`) USING BTREE,
  CONSTRAINT `Musteri_ID` FOREIGN KEY (`Musteri_ID`) REFERENCES `musteriler` (`Musteri_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `SiparisDurumu_ID` FOREIGN KEY (`SiparisDurumu_ID`) REFERENCES `siparisdurumu` (`SiparisDurumu_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 177 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siparis
-- ----------------------------

-- ----------------------------
-- Table structure for siparisdurumu
-- ----------------------------
DROP TABLE IF EXISTS `siparisdurumu`;
CREATE TABLE `siparisdurumu`  (
  `SiparisDurumu_ID` int NOT NULL AUTO_INCREMENT,
  `Siparis_Durumu` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`SiparisDurumu_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siparisdurumu
-- ----------------------------
INSERT INTO `siparisdurumu` VALUES (1, 'Bekliyor');
INSERT INTO `siparisdurumu` VALUES (2, 'Hazırlanıyor');
INSERT INTO `siparisdurumu` VALUES (3, 'Teslim Edildi');
INSERT INTO `siparisdurumu` VALUES (4, 'İptal Edildi');
INSERT INTO `siparisdurumu` VALUES (5, 'Dur');

-- ----------------------------
-- Table structure for subeler
-- ----------------------------
DROP TABLE IF EXISTS `subeler`;
CREATE TABLE `subeler`  (
  `Sube_ID` int NOT NULL AUTO_INCREMENT,
  `Sube_il` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `Sube_Adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `Sube_Telefon` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Sube_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subeler
-- ----------------------------
INSERT INTO `subeler` VALUES (1, 'Antalya', 'Büyükdere Mah. Tunalıhilmi cad. Kaysı Han. Apt\r\n', '12312312');
INSERT INTO `subeler` VALUES (2, 'Ankara', 'çinçin / Ankara', NULL);
INSERT INTO `subeler` VALUES (3, 'Ankara', 'Yıldızevler Mah. Turan Güneş Blv. No:48 Çankaya / Ankara', NULL);
INSERT INTO `subeler` VALUES (4, 'Ankara', 'Emek, Bişkek Cd. 135/A, 06490 Çankaya/Ankara', NULL);
INSERT INTO `subeler` VALUES (5, 'Antalya', 'mıdıtenyo', NULL);
INSERT INTO `subeler` VALUES (6, 'Antalya', 'asd', NULL);
INSERT INTO `subeler` VALUES (7, 'Antalya', 'Altınova Sinan Mah. Serik Cad. Airport İş Merkezi No:27/E Kepez / Antalya', NULL);
INSERT INTO `subeler` VALUES (8, 'Antalya', 'Ari Mah. Atatürk Bul. No:52 Konyaaltı / Antalya', NULL);
INSERT INTO `subeler` VALUES (9, 'İstanbul Anadolu', 'Atatürk Mahallesi, Ataşehir Blv. No:17, 34758 Ataşehir / İstanbul', NULL);
INSERT INTO `subeler` VALUES (10, 'İstanbul Anadolu', 'Feneryolu Mah.Fahrettin Kerim Gökay Cad. No:84/C Kuyubaşı Kadıköy / İstanbul', NULL);
INSERT INTO `subeler` VALUES (11, 'İstanbul Anadolu', 'Mustafa Kemal Cad. No:56 A-B Blok Cevizli Kartal / İstanbul', NULL);
INSERT INTO `subeler` VALUES (12, 'İstanbul Anadolu', 'Feyzullah mahallesi bağdat caddesi 346/A Maltepe / İstanbul', NULL);
INSERT INTO `subeler` VALUES (13, 'İstanbul Avrupa', 'Tahtakale Mh. Ispartakule Bulvarı Bizim evler 6T1 çarşı 6G No:7 Avcılar / İstanbul', NULL);
INSERT INTO `subeler` VALUES (14, 'İstanbul Avrupa', 'Yeşilkent, Bahçeşehir Esenyurt Yan Yolu No:18, 34325 Avcılar / İstanbul', NULL);
INSERT INTO `subeler` VALUES (15, 'İstanbul Avrupa', 'Göztepe mah. Batışehir cad.  Batışehir K1 Blok 2  1B5 Bağcılar / İstanbul', NULL);
INSERT INTO `subeler` VALUES (16, 'İstanbul Avrupa', 'Zafer Mah. Dumlupınar cad. No:40 (E5 Yanyol) 34197 Bahçelievler / İstanbul', NULL);
INSERT INTO `subeler` VALUES (17, 'ADANA', 'merkez', NULL);
INSERT INTO `subeler` VALUES (18, 'Kırklareli', 'merkez cami', NULL);
INSERT INTO `subeler` VALUES (22, 'Şanlıurfa', 'asdas', NULL);
INSERT INTO `subeler` VALUES (23, 'Denizli', 'talha yıldız apt', NULL);
INSERT INTO `subeler` VALUES (24, 'Kırıkkale', 'asd', NULL);

SET FOREIGN_KEY_CHECKS = 1;
