-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.38 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных takewithme
CREATE DATABASE IF NOT EXISTS `takewithme` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `takewithme`;

-- Дамп структуры для таблица takewithme.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUser` int(11) NOT NULL DEFAULT '0',
  `IDSet` int(11) NOT NULL DEFAULT '0',
  `CDate` date NOT NULL,
  `CText` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы takewithme.comments: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`ID`, `IDUser`, `IDSet`, `CDate`, `CText`) VALUES
        (1, 1, 4, '2025-09-22', 'Очень пригодился данный набор вещей');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица takewithme.goods
CREATE TABLE IF NOT EXISTS `goods` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GTitle` varchar(50) NOT NULL DEFAULT '0',
  `GCategory` varchar(50) NOT NULL DEFAULT '0',
  `GCatName` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы takewithme.goods: ~53 rows (приблизительно)
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` (`ID`, `GTitle`, `GCategory`, `GCatName`) VALUES
	(1, 'Билеты самолет/поезд/автобус', 'Документы', 'Documents'),
	(2, 'Командировочное', 'Документы', 'Documents'),
	(3, 'Ксерокопия паспорта', 'Документы', 'Documents'),
	(4, 'Паспорт / Загран.паспорт', 'Документы', 'Documents'),
	(5, 'Страховка(и)', 'Документы', 'Documents'),
	(6, 'Водительское удостоверение', 'Документы', 'Documents'),
	(7, 'Берушки', 'Всяко для путешествий', 'Anything'),
	(8, 'Наличные, мелочь / Кредитки', 'Всяко для путешествий', 'Anything'),
	(9, 'Плед', 'Всяко для путешествий', 'Anything'),
	(10, 'Поесть / Попить с собой', 'Всяко для путешествий', 'Anything'),
        (11, 'Полотенце', 'Всякое для путешествий', 'Anything'),
	(12, 'Постельное белье', 'Всяко для путешествий', 'Anything'),
	(13, 'Транспортные карты / Priority Pass', 'Всяко для путешествий', 'Anything'),
	(14, 'Антигистаминные', 'Здоровье', 'Health'),
	(15, 'Витамины', 'Здоровье', 'Health'),
	(16, 'Жевательная резинка', 'Здоровье', 'Health'),
	(17, 'Сердечные / От давления', 'Здоровье', 'Health'),
	(18, 'Таблетки от укачивания, леденцы', 'Здоровье', 'Health'),
	(19, 'Ботинки', 'Обувь', 'Footwear'),
	(20, 'Кроссовки, кеды', 'Обувь', 'Footwear'),
	(21, 'Тапочки / Сланцы', 'Обувь', 'Footwear'),
	(22, 'Туфли', 'Обувь', 'Footwear'),
	(23, 'Бритва', 'Косметика', 'Cosmetics'),
	(24, 'Влажные салфетки / сухие', 'Косметика', 'Cosmetics'),
	(25, 'Духи / Одеколон', 'Косметика', 'Cosmetics'),
	(26, 'Зубная щетка / Паста / Нить', 'Косметика', 'Cosmetics'),
	(27, 'Средства гигиены / Ватные диски', 'Косметика', 'Cosmetics'),
	(28, 'Брюки', 'Одежда', 'Clothing'),
	(29, 'Крем защитный / Для рук', 'Косметика', 'Cosmetics'),
	(30, 'Галстук(и)', 'Одежда', 'Clothing'),
	(31, 'Майки', 'Одежда', 'Clothing'),
	(32, 'Нижнее белье', 'Одежда', 'Clothing'),
	(33, 'Носки', 'Одежда', 'Clothing'),
	(34, 'Перчатки, варежки', 'Одежда', 'Clothing'),
	(35, 'Пиджак', 'Одежда', 'Clothing'),
	(36, 'Рубашки, блузки', 'Одежда', 'Clothing'),
	(37, 'Свитер', 'Одежда', 'Clothing'),
	(38, 'Шапка / Шляпа', 'Одежда', 'Clothing'),
	(39, 'Шарф', 'Одежда', 'Clothing'),
	(40, 'Визитки', 'Реквизит', 'Props'),
	(41, 'Ежедневник / Блокнот', 'Реквизит', 'Props'),
	(42, 'Зонт(ы)', 'Реквизит', 'Props'),
	(43, 'Обувная щетка', 'Реквизит', 'Props'),
	(44, 'Очки / Линзы, раствор', 'Реквизит', 'Props'),
	(45, 'Расчёска', 'Реквизит', 'Props'),
	(46, 'Часы / Украшения', 'Реквизит', 'Props'),
	(47, 'Зарядное к ноуту /планшету /камере', 'Электроника', 'Electronics'),
	(48, 'Камера / Объективы', 'Электроника', 'Electronics'),
	(49, 'Мобильный телефон(ы) / Зарядное', 'Электроника', 'Electronics'),
	(50, 'Ноутбук / Планшет', 'Электроника', 'Electronics'),
	(51, 'Плеер / Наушники, hands-free', 'Электроника', 'Electronics'),
	(52, 'ТravelSIM / SIM-карты', 'Электроника', 'Electronics'),
	(53, 'Электронная книга', 'Электроника', 'Electronics');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;

-- Дамп структуры для таблица takewithme.parametrs
CREATE TABLE IF NOT EXISTS `parametrs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(50) NOT NULL,
  `PurposeOfTravel` varchar(50) NOT NULL,
  `TravelDuration` varchar(50) NOT NULL,
  `FellowTravelers` varchar(50) NOT NULL,
  `Transport` varchar(50) NOT NULL,
  `PlaceOfResidence` varchar(50) NOT NULL,
  `Weather` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы takewithme.parametrs: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `parametrs` DISABLE KEYS */;
INSERT INTO `parametrs` (`ID`, `Country`, `PurposeOfTravel`, `TravelDuration`, `FellowTravelers`, `Transport`, `PlaceOfResidence`, `Weather`) VALUES
	(4, 'RU', 'Tourism', 'weekend', 'Alone', 'train', 'HotelHostel', 'Heat'),
	(5, 'GL', 'BeachDiving', '2week', 'Alone', 'Aircraft', 'FriendsApartments', 'Cool');
/*!40000 ALTER TABLE `parametrs` ENABLE KEYS */;

-- Дамп структуры для таблица takewithme.setofthings
CREATE TABLE IF NOT EXISTS `setofthings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDSet` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDGood` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы takewithme.setofthings: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `setofthings` DISABLE KEYS */;
INSERT INTO `setofthings` (`ID`, `IDSet`, `IDUser`, `IDGood`) VALUES
	(1, 4, 0, 10),
	(2, 4, 0, 11),
	(3, 4, 0, 2),
	(4, 4, 0, 4),
	(5, 4, 0, 5),
	(6, 4, 0, 27),
	(7, 4, 0, 20),
	(8, 4, 0, 21),
	(9, 4, 0, 42),
	(10, 4, 0, 39);
/*!40000 ALTER TABLE `setofthings` ENABLE KEYS */;

-- Дамп структуры для таблица takewithme.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `NameClass` varchar(50) NOT NULL,
  `Place` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NameClass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы takewithme.settings: ~39 rows (приблизительно)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`NameClass`, `Place`, `Category`) VALUES
	('2week', 'На 2 недели', 'AreYouGoingForALongTime'),
	('Aircraft', 'Самолет', 'WhatAreWeGetting'),
	('Alone', 'В одиночестве', 'WithWhom'),
	('animals', 'С животными', 'WithWhom'),
	('BeachDiving', 'Пляж / Дайвинг', 'PurposeOfTheTrip'),
	('Bicycle', 'Велосипед', 'WhatAreWeGetting'),
	('Bus', 'Автобус', 'WhatAreWeGetting'),
	('Business', 'Дела', 'PurposeOfTheTrip'),
	('CarCamper', 'Автомобиль / Кемпер', 'WhatAreWeGetting'),
	('childrenfamily', 'С детьми / Cемьей', 'WithWhom'),
	('Cool', 'Прохладно', 'WhatIsTheWeatherLike'),
	('day', 'На день', 'AreYouGoingForALongTime'),
	('friends', 'С друзьями', 'WithWhom'),
	('FriendsApartments', 'У друзей / Апартаменты', 'WhereWillWeLive'),
	('Heat', 'Тепло', 'WhatIsTheWeatherLike'),
	('Hitch-hiking', 'Автостоп', 'WhatAreWeGetting'),
	('Hot', 'Жарко', 'WhatIsTheWeatherLike'),
	('HotelHostel', 'Отель / Хостел', 'WhereWillWeLive'),
	('Hunting', 'Охота', 'PurposeOfTheTrip'),
	('month', 'На месяц и более', 'AreYouGoingForALongTime'),
	('Motorcycle', 'Мотоцикл', 'WhatAreWeGetting'),
	('MountainTourism', 'Горный туризм', 'PurposeOfTheTrip'),
	('NatureFishing', 'Природа / Рыбалка', 'PurposeOfTheTrip'),
	('Rainy', 'Дождливо', 'WhatIsTheWeatherLike'),
	('Romance', 'Романтика', 'PurposeOfTheTrip'),
	('Sanatorium', 'Санаторий', 'WhereWillWeLive'),
	('secondhalf', 'Со второй половиной', 'WithWhom'),
	('Shopping', 'Шопинг', 'PurposeOfTheTrip'),
	('Snowy', 'Снежно', 'WhatIsTheWeatherLike'),
	('Tent', 'Палатка', 'WhereWillWeLive'),
	('Tourism', 'Туризм', 'PurposeOfTheTrip'),
	('TrailerCar', 'Трейлер / Автомобиль', 'WhereWillWeLive'),
	('train', 'Поезд', 'WhatAreWeGetting'),
	('TreatmentRecuperation', 'Лечение / Оздоровление', 'PurposeOfTheTrip'),
	('WaterTransport', 'Водный транспорт', 'WhatAreWeGetting'),
	('week', 'На неделю', 'AreYouGoingForALongTime'),
	('weekend', 'На выходные', 'AreYouGoingForALongTime'),
	('Windy', 'Ветрено', 'WhatIsTheWeatherLike'),
	('WinterHolidays', 'Зимний отдых', 'PurposeOfTheTrip');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Дамп структуры для таблица takewithme.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIO` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы takewithme.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `FIO`, `Email`, `Password`, `Photo`) VALUES
	(1, 'Иванов Иван Иванович', 'ivanov@mail.ru', 'c46675b56dd3e9f71284fc49ff88d830', 'images/2019-02-09-10-28-03myAvatar15.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
