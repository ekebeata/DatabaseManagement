-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 28. 23:28
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szalloda`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ar`
--

CREATE TABLE `ar` (
  `arkod` int(1) NOT NULL,
  `megnevezes` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `dij` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ar`
--

INSERT INTO `ar` (`arkod`, `megnevezes`, `dij`) VALUES
(1, 'kisbaba', 250),
(2, 'gyerek', 5000),
(3, 'felnőtt', 8000),
(4, 'nyugdíjas', 6000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felszerelt`
--

CREATE TABLE `felszerelt` (
  `szobaszam` int(2) NOT NULL,
  `tv` varchar(3) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `minibar` varchar(3) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `legkondi` varchar(3) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felszerelt`
--

INSERT INTO `felszerelt` (`szobaszam`, `tv`, `minibar`, `legkondi`) VALUES
(1, 'van', 'van', 'van'),
(2, NULL, NULL, NULL),
(3, NULL, NULL, NULL),
(4, 'van', 'van', 'van'),
(5, 'van', 'van', NULL),
(6, 'van', NULL, 'van'),
(7, NULL, NULL, NULL),
(8, NULL, NULL, NULL),
(9, 'van', NULL, 'van'),
(10, 'van', NULL, NULL),
(11, 'van', NULL, NULL),
(12, NULL, NULL, 'van'),
(13, NULL, NULL, 'van'),
(14, 'van', 'van', 'van'),
(15, 'van', 'van', 'van');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglal`
--

CREATE TABLE `foglal` (
  `szemelyiszam` varchar(8) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `szobaszam` int(2) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `foglal`
--

INSERT INTO `foglal` (`szemelyiszam`, `szobaszam`, `mettol`, `meddig`) VALUES
('123456PA', 4, '2021-12-19', '2021-12-21'),
('123654PL', 3, '2021-11-27', '2021-11-30'),
('152345CD', 1, '2021-11-28', '2021-11-30'),
('321654DF', 17, '2021-11-28', '2021-11-30'),
('345678AA', 15, '2021-12-12', '2021-12-14'),
('369258PU', 3, '2021-11-27', '2021-11-30'),
('532498DA', 13, '2021-12-05', '2021-12-08'),
('759846PT', 17, '2021-12-06', '2021-12-08');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szoba`
--

CREATE TABLE `szoba` (
  `szobaszam` int(2) NOT NULL,
  `szobatipus` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `fo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `szoba`
--

INSERT INTO `szoba` (`szobaszam`, `szobatipus`, `fo`) VALUES
(1, 'francia', 2),
(2, 'csaladi', 3),
(3, 'francia', 2),
(4, 'csaladi', 3),
(5, 'kulonagyas', 2),
(6, 'kulonagyas', 2),
(7, 'csaladi', 4),
(8, 'francia', 2),
(9, 'kulonagyas', 3),
(10, 'francia', 2),
(11, 'csaladi', 4),
(12, 'csaladi', 3),
(13, 'francia', 2),
(14, 'kulonagyas', 3),
(15, 'kulonagyas', 4),
(16, 'fracia', 2),
(17, 'kulonagyas', 2),
(18, 'kulonagyas', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vendegek`
--

CREATE TABLE `vendegek` (
  `szemelyiszam` varchar(8) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nev` varchar(60) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `lakcim` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `szulido` date NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `telszam` int(9) DEFAULT NULL,
  `arkod` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `vendegek`
--

INSERT INTO `vendegek` (`szemelyiszam`, `nev`, `lakcim`, `szulido`, `email`, `telszam`, `arkod`) VALUES
('123456PA', 'Eke Beáta', '6722 Szeged, Ady tér 10', '1998-07-30', 'h856231@stud.u-szeged.hu', 201345678, 3),
('123654PL', 'Eszes Tamás', '9400 Sopron Ibolya út 57', '1980-05-14', 'setamas@gmail.com', 301865654, 3),
('147258TA', 'Puszta Bálint', '4030 Debrecen Kopja utca 23', '2008-11-11', 'pusztab77@gmail.com', 307531645, 2),
('152345CD', 'Tóth Kristóf', '4030 Debrecen Esze Tamás utca 20', '1998-08-14', 'thotkris100@gmail.com', 702654987, 3),
('234567AP', 'Kiss Ödön', '6065 Lakitelek, Bánk bán utca 15', '2020-11-11', NULL, NULL, 1),
('269435PA', 'Takács Tibor', '9024 Győr Pápai út 23', '1964-06-04', '', 206597123, 4),
('321654DE', 'Lakatos Márk', '6000 Kecskemét Korona utca 2', '1994-03-25', 'lmark@gmail.com', 2065934892, 3),
('321654DF', 'Krizsán Noémi', '6724 Szeged József Attila sugárút 2', '2010-12-07', '', 0, 2),
('321678AT', 'Kiss Marcell', '6760 Kiselek ', '1999-02-26', 'marcika55@gmail.com', 308967453, 3),
('345678AA', 'Nagy Tamás', '7624 Pécs, Nyár köz 5.', '1950-03-12', 'tamasnagy2@gmail.com', 703549765, 4),
('356942PI', 'Nagy Virág', '8360 Keszthely Kisfaludy utca 43', '1989-04-07', 'nagyviri@citromail.hu', 209458321, 3),
('369258PU', 'Kajakos Mercédesz', '3525 Miskolc Estike utca 6', '2000-02-01', 'kajakmerci@gmail.com', 304985687, 3),
('458789PL', 'Gergely Rita', '8621 Zamárdi Fecske utca 12', '2018-12-13', '', 0, 2),
('532497ER', 'Meredek Elek', 'Híd alatt', '1982-09-20', NULL, NULL, 3),
('532498DA', 'Varga Petra', '4030 Debrecen Túzok utca 10', '1997-03-05', 'petravarga55@freemail.hu', 708564987, 3),
('547589PL', 'Makara Ivett', '5540 Szarvas Alkotmány utca 21', '1999-02-05', '', 705683216, 3),
('567892SE', 'Palotás Attila', '6760 Kiselek Virág utca 5', '1985-08-17', 'pallatt@freemail.hu', 302689457, 3),
('632659KL', 'Makó Lászkó', '5900 Orosháza Búzavirág utca 36', '2013-08-04', '', 0, 2),
('759846PT', 'Gábor Dénes', '8600 Siófok Gyufa utca 5 ', '2019-07-10', '', 0, 1),
('846578PK', 'Vidám Piroska', '5540 Szarvas Március 15 utca 40', '2020-03-31', '', 0, 1),
('849237AT', 'Tóth Kinga', '6724 Árpád tér 25', '1995-07-02', 'kinga@freemail.hu', 705964835, 3),
('945874PO', 'Lengyen Mária', '4405 Nyíregyháza Csemete köz 14', '1949-09-15', '', 0, 4),
('994826EO', 'Nagy Marcell', '6724 Szeged József Attila sugárút 2', '1965-09-09', 'nmarell@gmail.com', 704567415, 4);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ar`
--
ALTER TABLE `ar`
  ADD PRIMARY KEY (`arkod`);

--
-- A tábla indexei `felszerelt`
--
ALTER TABLE `felszerelt`
  ADD PRIMARY KEY (`szobaszam`),
  ADD UNIQUE KEY `szobaszam` (`szobaszam`);

--
-- A tábla indexei `foglal`
--
ALTER TABLE `foglal`
  ADD PRIMARY KEY (`szemelyiszam`),
  ADD UNIQUE KEY `szemelyiszam` (`szemelyiszam`,`szobaszam`),
  ADD KEY `szobaszam` (`szobaszam`);

--
-- A tábla indexei `szoba`
--
ALTER TABLE `szoba`
  ADD PRIMARY KEY (`szobaszam`);

--
-- A tábla indexei `vendegek`
--
ALTER TABLE `vendegek`
  ADD PRIMARY KEY (`szemelyiszam`),
  ADD KEY `arkod` (`arkod`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `felszerelt`
--
ALTER TABLE `felszerelt`
  ADD CONSTRAINT `felszerelt_ibfk_1` FOREIGN KEY (`szobaszam`) REFERENCES `szoba` (`szobaszam`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `foglal`
--
ALTER TABLE `foglal`
  ADD CONSTRAINT `foglal_ibfk_1` FOREIGN KEY (`szemelyiszam`) REFERENCES `vendegek` (`szemelyiszam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foglal_ibfk_2` FOREIGN KEY (`szobaszam`) REFERENCES `szoba` (`szobaszam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `vendegek`
--
ALTER TABLE `vendegek`
  ADD CONSTRAINT `vendegek_ibfk_1` FOREIGN KEY (`arkod`) REFERENCES `ar` (`arkod`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
