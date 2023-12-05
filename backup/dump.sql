-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 05 2023 г., 17:05
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Kyrsovik_Gostinica`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bronirovanie`
--

CREATE TABLE `bronirovanie` (
  `zaezd` date NOT NULL,
  `viezd` date NOT NULL,
  `klient_id` int NOT NULL,
  `nomer_id` int NOT NULL,
  `stoimost` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `bronirovanie`
--

INSERT INTO `bronirovanie` (`zaezd`, `viezd`, `klient_id`, `nomer_id`, `stoimost`) VALUES
('2023-11-27', '2023-11-30', 1, 8, '10200.00'),
('2023-12-13', '2023-12-15', 2, 11, '10000.00'),
('2023-12-14', '2023-12-15', 6, 14, '1000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
--

CREATE TABLE `klient` (
  `id` int NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `patronymic` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `klient`
--

INSERT INTO `klient` (`id`, `first_name`, `last_name`, `patronymic`, `phone`, `login`, `password`) VALUES
(1, 'fdsf', 'dsfsdf', 'fsdf', '3535', '11', '11'),
(2, 'ываы', 'ыва', 'ыва', 'ыва', 'ыва', 'ыва'),
(3, 'sdfsd', 'dsfsdf', 'sdf', 'sdf', 'sdf', 'sdf'),
(4, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(5, 'Проверка', 'Проверка', 'Проверка', '23423', 'pr', 'pr'),
(6, 'влодпл', 'рвлдаопв', 'валопдв', '23432', 'er', 'er');

-- --------------------------------------------------------

--
-- Структура таблицы `nomer`
--

CREATE TABLE `nomer` (
  `id` int NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `nomer` varchar(45) NOT NULL,
  `etagh` int NOT NULL,
  `nomer_summa` decimal(9,2) NOT NULL,
  `img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `nomer`
--

INSERT INTO `nomer` (`id`, `name`, `nomer`, `etagh`, `nomer_summa`, `img`) VALUES
(8, 'Люкс', '3', 2, '3400.00', '../img/lux.jpg'),
(11, 'Тест', '3232', 3, '5000.00', '../img/Тестовый номер.jpg'),
(14, 'тест', '3', 2, '1000.00', '../img/Тестовый номер.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bronirovanie`
--
ALTER TABLE `bronirovanie`
  ADD PRIMARY KEY (`klient_id`,`nomer_id`),
  ADD KEY `fk_g_bronirovanie_klient_idx` (`klient_id`),
  ADD KEY `fk_g_bronirovanie_g_nomer1_idx` (`nomer_id`);

--
-- Индексы таблицы `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nomer`
--
ALTER TABLE `nomer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `klient`
--
ALTER TABLE `klient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `nomer`
--
ALTER TABLE `nomer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bronirovanie`
--
ALTER TABLE `bronirovanie`
  ADD CONSTRAINT `fk_g_bronirovanie_g_nomer1` FOREIGN KEY (`nomer_id`) REFERENCES `nomer` (`id`),
  ADD CONSTRAINT `fk_g_bronirovanie_klient` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
