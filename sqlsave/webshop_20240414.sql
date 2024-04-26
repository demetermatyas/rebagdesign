-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2024. Ápr 14. 14:38
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `odate` datetime DEFAULT current_timestamp(),
  `uid` int(11) DEFAULT NULL,
  `olist` text COLLATE utf8_hungarian_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `ocondition` text COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `odate`, `uid`, `olist`, `total`, `ocondition`) VALUES
(72, '2024-04-06 17:29:43', 9, 'Kis Vivi ; cica : 6900 | Kis Vivi ; csiga : 10000 | ', 16900, 'WIP'),
(73, '2024-04-06 17:29:49', 9, 'Kötény - Farmer ; Mintás : 6.400 | ', 6400, 'LOCAL'),
(74, '2024-04-08 07:23:48', 9, 'Kötény - Farmer ; proba : 10000 | Sprot táska ; Nagy : 7.600 | ', 17600, 'WIP'),
(75, '2024-04-14 14:34:17', 9, 'Sprot táska ; Rock : 8.000 | Kötény - Farmer ; Pitypang : 4500 | ', 12500, 'WIP');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pbrand` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `pimage` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ptype` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `pprice` int(11) DEFAULT NULL,
  `item` int(11) DEFAULT 1,
  `time` datetime DEFAULT current_timestamp(),
  `discount` tinyint(1) DEFAULT 0,
  `imagelocation` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `pbrand`, `pimage`, `ptype`, `pprice`, `item`, `time`, `discount`, `imagelocation`) VALUES
(92, 'Kis Vivi', '', 'cica', 6900, 0, '2024-04-06 05:28:31', 0, ''),
(93, 'Kis Vivi', '', 'csiga', 10000, 0, '2024-04-06 05:28:47', 0, ''),
(94, 'Kötény - Farmer', '', 'Mintás', 8000, 0, '2024-04-06 05:29:21', 1, ''),
(95, 'Kötény - Farmer', '', 'proba', 10000, 0, '2024-04-06 05:48:17', 0, ''),
(96, 'Sprot táska', '', 'Nagy', 9500, 0, '2024-04-06 06:11:21', 1, ''),
(97, 'Kötény - Farmer', '', 'Kutyus', 7500, 1, '2024-04-06 06:16:12', 0, './img/koteny0002.jpg'),
(98, 'Kötény - Farmer', '', 'Pitypang', 4500, 0, '2024-04-06 06:16:47', 0, 'img/koteny0001.jpg'),
(99, 'Sprot táska', '', 'Rock', 10000, 0, '2024-04-14 09:41:51', 1, './img/vivi0001.jpeg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pupload`
--

CREATE TABLE `pupload` (
  `uid` int(11) DEFAULT NULL,
  `uband` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `uimage` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `utype` int(30) DEFAULT NULL,
  `upricre` int(11) DEFAULT NULL,
  `item` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sales`
--

CREATE TABLE `sales` (
  `orderid` int(11) NOT NULL,
  `ocondition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `ototal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `upass` text COLLATE utf8_hungarian_ci DEFAULT NULL,
  `umail` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `ufullname` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `rank` int(2) DEFAULT 0,
  `ban` bit(1) DEFAULT b'0',
  `regtime` datetime DEFAULT current_timestamp(),
  `logtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `uname`, `upass`, `umail`, `ufullname`, `rank`, `ban`, `regtime`, `logtime`) VALUES
(1, 'dema95', '$2y$10$7PpmBw/7ilAUWDuzDv1grusRFuFSZ2yyqnR3a4Eze2xDFahhJC0Zm', 'dema95@gmail.hu', 'Demeter Mátyás', 9, b'0', '2024-02-16 21:57:17', '2024-04-14 14:34:30'),
(9, 'vasarlo1', '$2y$10$efE6qdDt3AswLxtzUGK7xutTnyx6l3j14ILgojsem4I6OIr0ZFB3G', 'proba1@gmaill.com', 'A. Béla', 0, b'0', '2024-02-17 02:36:23', '2024-04-14 13:39:39'),
(10, 'vasarlo3', '$2y$10$O5r0ZW8kOjW8jy0wN61/VOVTXr3G45pcFgBwwbgabKjYBOv3igSFS', 'ezisemailcim@gmail.igen', 'C. d.', 0, b'0', '2024-02-17 02:36:57', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`orderid`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
