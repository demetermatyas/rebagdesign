-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2024. Feb 18. 22:43
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
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `odate`, `uid`, `olist`, `total`) VALUES
(43, '2024-02-18 22:06:54', 9, 'ydfasdfva tjzku 3200;Vivi Virág 500;Köténykék Kutyus 5330;', 9030),
(44, '2024-02-18 22:23:34', 9, 'Kötény - Farmer Kutyus 5990;Kötény - Fodros L-XL Cica 5000;', 10990);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pbrand` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `pimage` blob DEFAULT NULL,
  `ptype` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `pprice` int(11) DEFAULT NULL,
  `item` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `pbrand`, `pimage`, `ptype`, `pprice`, `item`) VALUES
(1, 'Kis vivi', '', 'rózsa', 6990, 1),
(2, 'Kis vivi', 0x62656d7574766976692e6a7067, 'Virág', 6900, 1),
(4, 'Kötény - Farmer', '', 'Kutyus', 5990, 1),
(80, 'Kötény - Fodros L-XL', NULL, 'Cica', 5000, 1),
(81, 'Nagy vivi', '', 'Piros-kék', 10990, 1),
(82, 'Közepes vivi', '', 'zöld', 9990, 1);

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
(1, 'dema95', '$2y$10$7PpmBw/7ilAUWDuzDv1grusRFuFSZ2yyqnR3a4Eze2xDFahhJC0Zm', 'dema95@gmail.hu', 'Demeter Mátyás', 9, b'0', '2024-02-16 21:57:17', '2024-02-18 22:24:19'),
(9, 'vasarló1', '$2y$10$efE6qdDt3AswLxtzUGK7xutTnyx6l3j14ILgojsem4I6OIr0ZFB3G', 'proba1@gmaill.com', 'A. Béla', 0, b'0', '2024-02-17 02:36:23', '2024-02-18 21:49:31'),
(10, 'vasarló23', '$2y$10$O5r0ZW8kOjW8jy0wN61/VOVTXr3G45pcFgBwwbgabKjYBOv3igSFS', 'ezisemailcim@gmail.igen', 'C. d.', 0, b'0', '2024-02-17 02:36:57', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
