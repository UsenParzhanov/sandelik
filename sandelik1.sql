-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 29 2016 г., 21:29
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sandelik1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `image_path` varchar(50) NOT NULL,
  `user_sex` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_surname`, `image_path`, `user_sex`) VALUES
(1, 'Usen', 'sandelik', 'Parzhanov', 'K0vtgREyhno.jpg', 'Мужчина');

-- --------------------------------------------------------

--
-- Структура таблицы `zapisi`
--

CREATE TABLE IF NOT EXISTS `zapisi` (
  `id` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `text` text NOT NULL,
  `tag` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zapisi`
--

INSERT INTO `zapisi` (`id`, `user_id`, `text`, `tag`, `date`) VALUES
(1, 1, 'Моя первая и последняя запись. Мой первый сайт на PHP закончен. ', 'Тег', '2016-07-29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zapisi`
--
ALTER TABLE `zapisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `zapisi`
--
ALTER TABLE `zapisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
