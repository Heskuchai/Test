-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Хост: 10.0.0.59:3306
-- Время создания: Мар 06 2019 г., 20:40
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `nionly-quantum_wft`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `main` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `cases`
--

INSERT INTO `cases` (`id`, `name`, `price`, `status`, `main`, `type`) VALUES
(1, 'Кейс №1', 49, 2, 0, 1),
(2, 'Кейс №2', 99, 2, 0, 1),
(3, 'Кейс №3', 149, 2, 0, 1),
(4, 'Кейс №4', 249, 2, 0, 2),
(5, 'Кейс №5', 349, 2, 0, 1),
(6, 'Кейс №6', 599, 2, 0, 1),
(7, 'Кейс №7', 999, 2, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `price_main` int(11) NOT NULL,
  `f_id` varchar(255) NOT NULL,
  `f_key_1` varchar(500) NOT NULL,
  `f_key_2` varchar(500) NOT NULL,
  `logo_url` text NOT NULL,
  `fav_url` text NOT NULL,
  `min_bet` int(11) NOT NULL,
  `e_mail` text NOT NULL,
  `vk_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `config`
--

INSERT INTO `config` (`id`, `site_name`, `price_main`, `f_id`, `f_key_1`, `f_key_2`, `logo_url`, `fav_url`, `min_bet`, `e_mail`, `vk_url`) VALUES
(1, 'Title site', 100, '113360', 'sbjcq09e', 'sbjcq09e', 'http://smallkeys.ru/assets/images/logo.png', 'http://smallkeys.ru/assets/images/favicon.ico', 1, 'test@mail.ru', 'http://vk.com');

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `title`, `body`) VALUES
(3, 'Что это?', '<p>Хуй знает!</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) NOT NULL,
  `award` int(11) NOT NULL DEFAULT '0',
  `color` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `case_id`, `award`, `color`, `image`, `name`) VALUES
(1, 2, 100, 1, 'https://cheapkeys.ru/images/games/artifact.jpg', 'artifact'),
(2, 2, 999, 7, ' https://cheapkeys.ru/images/cheapkey/Overwatch.jpg', 'Overwatch'),
(3, 2, 777, 4, 'https://cheapkeys.ru/images/games/fifa-19.jpg', 'fifa'),
(4, 1, 100, 3, 'http://smallkeys.ru/assets/images/ico-21.png', '100'),
(5, 1, 999, 1, 'http://smallkeys.ru/assets/images/ico-21.png', ''),
(6, 1, 777, 2, 'http://smallkeys.ru/assets/images/ico-21.png', ''),
(7, 1, 888, 4, 'http://smallkeys.ru/assets/images/ico-21.png', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `show` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `show`) VALUES
(1, '', '', 1),
(2, '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `network_id` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `group` int(1) NOT NULL DEFAULT '1',
  `network` varchar(255) NOT NULL,
  `wf_coint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `network_id`, `avatar`, `money`, `group`, `network`, `wf_coint`) VALUES
(3, 'nionly_quantum', '476147307', 'https://pp.userapi.com/c849524/v849524003/8629b/YOh0ADI9qBU.jpg?ava=1', 999601, 2, 'vkontakte', 7726);

-- --------------------------------------------------------

--
-- Структура таблицы `win`
--

CREATE TABLE IF NOT EXISTS `win` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `award` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `win`
--

INSERT INTO `win` (`id`, `user_id`, `case_id`, `award`, `color`, `date`) VALUES
(1, 3, 2, 999, 7, '2019-03-04 13:53:40'),
(2, 3, 0, 100, 1, '2019-03-04 13:54:16'),
(3, 3, 0, 100, 1, '2019-03-04 13:54:23'),
(4, 3, 2, 999, 7, '2019-03-04 13:57:20'),
(5, 5, 2, 999, 7, '2019-03-04 14:13:36'),
(6, 5, 2, 111, 3, '2019-03-04 14:16:16'),
(7, 5, 2, 777, 4, '2019-03-04 14:16:27'),
(8, 5, 2, 999, 7, '2019-03-04 14:16:43'),
(9, 5, 2, 999, 7, '2019-03-04 14:16:54'),
(10, 5, 2, 777, 4, '2019-03-04 14:17:04'),
(11, 5, 2, 100, 1, '2019-03-04 14:17:14'),
(12, 5, 2, 777, 4, '2019-03-04 14:17:24'),
(13, 5, 2, 777, 4, '2019-03-04 14:17:34'),
(14, 5, 2, 999, 7, '2019-03-04 14:17:44'),
(15, 5, 0, 777, 2, '2019-03-04 14:18:16'),
(16, 5, 0, 0, 3, '2019-03-04 14:18:23'),
(17, 5, 0, 0, 3, '2019-03-04 14:50:14'),
(18, 5, 0, 100, 1, '2019-03-04 14:50:17'),
(19, 5, 2, 0, 3, '2019-03-04 14:50:29'),
(20, 3, 0, 0, 3, '2019-03-05 11:13:21'),
(21, 3, 0, 888, 4, '2019-03-05 11:53:00'),
(22, 3, 0, 999, 7, '2019-03-05 11:58:56'),
(23, 3, 0, 999, 7, '2019-03-05 11:59:08'),
(24, 3, 0, 100, 1, '2019-03-05 12:00:06'),
(25, 3, 0, 888, 4, '2019-03-05 15:16:00'),
(26, 3, 0, 100, 1, '2019-03-05 15:23:40'),
(27, 3, 0, 999, 7, '2019-03-05 15:31:39'),
(28, 3, 0, 0, 3, '2019-03-06 02:33:18'),
(29, 3, 0, 0, 3, '2019-03-06 02:33:22'),
(30, 3, 0, 100, 1, '2019-03-06 02:33:23'),
(31, 3, 0, 100, 1, '2019-03-06 02:33:45'),
(32, 3, 2, 999, 7, '2019-03-06 02:56:21'),
(33, 3, 2, 777, 4, '2019-03-06 02:56:36'),
(34, 3, 2, 777, 4, '2019-03-06 03:24:37'),
(35, 3, 2, 100, 1, '2019-03-06 03:29:49'),
(36, 3, 2, 100, 1, '2019-03-06 03:29:51'),
(37, 3, 2, 100, 1, '2019-03-06 03:29:54'),
(38, 3, 2, 999, 2, '2019-03-06 03:29:55'),
(39, 3, 2, 999, 2, '2019-03-06 03:29:57'),
(40, 3, 2, 777, 4, '2019-03-06 03:31:08'),
(41, 3, 2, 999, 3, '2019-03-06 03:31:27'),
(42, 3, 2, 100, 1, '2019-03-06 03:31:30'),
(43, 3, 1, 999, 1, '2019-03-06 03:54:50'),
(44, 3, 0, 999, 7, '2019-03-06 05:15:57'),
(45, 3, 1, 777, 2, '2019-03-06 07:13:22');

-- --------------------------------------------------------

--
-- Структура таблицы `withdraw`
--

CREATE TABLE IF NOT EXISTS `withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `withdraw`
--

INSERT INTO `withdraw` (`id`, `user_id`, `money`, `email`, `status`, `date`) VALUES
(1, 3, 7948, 'NiOnlu@mail.ru', 1, '2019-03-06 03:07:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
