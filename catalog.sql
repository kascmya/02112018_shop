-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 29 2019 г., 19:38
-- Версия сервера: 10.1.35-MariaDB
-- Версия PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `parent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Женщинам', 0),
(2, 'Верхняя одежда', 1),
(3, 'Нижняя одежда', 1),
(4, 'Штаны', 1),
(5, 'Обувь', 1),
(6, 'Мужчинам', 0),
(7, 'Резиновые сапоги', 6),
(8, 'Штаны', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img_src` varchar(500) NOT NULL,
  `cost` int(11) NOT NULL,
  `category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `img_src`, `cost`, `category`) VALUES
(1, 'Куртка синяя', '/images/catalog/1.jpg', 5400, 2),
(2, 'Кожаная куртка', '/images/catalog/4.jpg', 22500, 2),
(3, 'Куртка с карманами', '/images/catalog/3.jpg', 9200, 2),
(4, 'Куртка с капюшоном', '/images/catalog/2.jpg', 6100, 2),
(5, 'Куртка casual', '/images/catalog/5.jpg', 8800, 2),
(6, 'Стильная кожаная куртка', '/images/catalog/6.jpg', 12800, 2),
(7, 'Кеды серые', '/images/catalog/7.jpg', 2900, 5),
(8, 'Кеды чёрные', '/images/catalog/8.jpg', 4500, 5),
(9, 'Кеды Casual', '/images/catalog/9.jpg', 5900, 5),
(10, 'Кеды всепогодные', '/images/catalog/10.jpg', 9200, 5),
(11, 'Джинсы', '/images/catalog/11.jpg', 4800, 4),
(12, 'Джинсы голубые', '/images/catalog/12.jpg', 4200, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
