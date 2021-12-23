-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 23 2021 г., 03:23
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `eventall`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_beg` date NOT NULL,
  `time_beg` time NOT NULL,
  `date_end` date NOT NULL,
  `time_end` time NOT NULL,
  `id_king` int(255) NOT NULL,
  `id_org` int(255) NOT NULL,
  `id_place` int(255) NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photo` int(1) NOT NULL DEFAULT '0',
  `video` int(1) NOT NULL DEFAULT '0',
  `design` int(1) NOT NULL DEFAULT '0',
  `partner` int(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `date_beg`, `time_beg`, `date_end`, `time_end`, `id_king`, `id_org`, `id_place`, `link`, `photo`, `video`, `design`, `partner`, `description`) VALUES
(1, 'День здоровья', '2021-12-15', '13:00:00', '2021-12-15', '19:00:00', 1, 2, 1, '0', 1, 1, 0, 0, 'День здоровья Института математики и информационных технологий'),
(2, 'Олимпиада Эрудит', '2022-01-10', '13:00:00', '2022-01-10', '19:00:00', 1, 1, 1, 'https://vk.com/sno_isu?w=wall-91188284_1020', 1, 0, 1, 0, 'Трататата тратататата ратататататата nhfnfhfnfhfnfhfndgfshgsbzvfgawigkzbdjkdhsjfnbaehfbk hwjfbawkf khtoga;oeb vkoaehtbgoawhgb ewgw4thawubg too4uhtbgj w4uggb e4ub t4ew3yhgiuaebr gkjhyuawbg j44hbtje kgier viiagbf eliswsui gw3pies hq3iuga roqvga v'),
(3, 'Выпускной вечер ИМИТ', '2021-06-28', '13:00:00', '2021-06-28', '19:00:00', 1, 2, 1, 'https://vk.com/sno_isu?w=wall-91188284_102033', 0, 0, 0, 0, 'рауцпщкрпгшуыкпцфрщй3рушрка'),
(4, 'Собрание СНО', '2021-12-18', '13:00:00', '2021-12-18', '19:00:00', 1, 1, 1, 'https://vk.com/sno_isu?w=wall-91188284_10234', 0, 0, 0, 0, 'упйгушыкпдуытпгфузжат'),
(6, 'Новый год', '2021-12-30', '17:00:00', '2021-12-30', '21:00:00', 3, 3, 3, 'https://vk.com/art_otdel_isu', 1, 1, 1, 1, 'АРТ-отдел - структурное подразделение ППОС (Первичной Профсоюзной Организации студентов) ИГУ.'),
(45, 'Хакатон', '2021-12-20', '10:00:00', '2021-12-25', '20:00:00', 1, 1, 2, 'https://vk.com/im?peers=171572415&sel=295892567', 1, 1, 1, 1, 'Прошёл сотни игр, и каждая из них похожа на предыдущую? Пора создать свою! Чтобы ты не тратил время впустую, сделали для тебя максимально эффективный марафон — хакатон "GameCreate".\r\n\r\n8 часов лекций, 4 человека в команде и всего 40 часов на разработку. По итогу — готовая игра на платформе Unity своими руками. Для участия тебе нужно знать лишь основы программирования на базе любого языка. Всему научим с нуля и дадим необходимые материалы.');

-- --------------------------------------------------------

--
-- Структура таблицы `king`
--

CREATE TABLE IF NOT EXISTS `king` (
  `id` int(255) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_org` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`,`link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `king`
--

INSERT INTO `king` (`id`, `first_name`, `last_name`, `phone`, `link`, `id_org`) VALUES
(1, 'Елизавета', 'Доровская', '89247074829', 'https://vk.com/lisaveta2001', 1),
(2, 'Анастасия', 'Ботороева', '89123456789', 'https://vk.com/nbotoroeva', 2),
(3, 'Диана', 'Радионова', '89675544332', 'https://vk.com/cccynep', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `organizationisu`
--

CREATE TABLE IF NOT EXISTS `organizationisu` (
  `id` int(255) NOT NULL,
  `org_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`org_name`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `organizationisu`
--

INSERT INTO `organizationisu` (`id`, `org_name`, `password`) VALUES
(1, 'СНО', 'sno123'),
(2, 'ПОС ИМИТ', 'imit123'),
(3, 'Арт-отдел', 'art123');

-- --------------------------------------------------------

--
-- Структура таблицы `placeirk`
--

CREATE TABLE IF NOT EXISTS `placeirk` (
  `id` int(255) NOT NULL,
  `place_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `placeirk`
--

INSERT INTO `placeirk` (`id`, `place_name`, `address`) VALUES
(1, 'Точка кипения', '5-й Армии, д.121а'),
(2, 'Белый дом', 'бул. Гагарина, 24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
