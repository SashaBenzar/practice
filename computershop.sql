-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 13 2022 г., 19:42
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `computershop`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `view_tov` (IN `tovar` INT(19))  IF (tovar="1") THEN 
    BEGIN
        SELECT * FROM basic WHERE access_id = tovar;
    END;
ELSEIF (tovar="2") THEN 
     BEGIN
        SELECT * FROM basic WHERE access_id = tovar;
    END;
ELSEIF (tovar="3") THEN 
     BEGIN
        SELECT * FROM basic WHERE access_id = tovar;
    END;
ELSE SELECT "Некоректно задані дати";
END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `accessories`
--

CREATE TABLE `accessories` (
  `id` int UNSIGNED NOT NULL,
  `access` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `accessories`
--

INSERT INTO `accessories` (`id`, `access`) VALUES
(1, 'Відеокарта'),
(2, 'Материнська плата'),
(3, 'Процесор');

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int UNSIGNED NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `role`, `name`, `surname`, `phone`, `email`, `password`) VALUES
(1, 'ADMIN', 'Олександр', 'Бензар', '0990290910', 'sahabenzar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'USER', 'Іван', 'Остапів', '0983383727', 'ivan170@ukr.net', '202cb962ac59075b964b07152d234b70'),
(11, 'USER', 'Петро', 'Штефуник', '0954086317', 'petia@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Структура таблицы `basic`
--

CREATE TABLE `basic` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `mark` float DEFAULT NULL,
  `price` int DEFAULT NULL,
  `photo` text,
  `access_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `basic`
--

INSERT INTO `basic` (`id`, `name`, `mark`, `price`, `photo`, `access_id`) VALUES
(1, 'Inno3D GeForce RTX 3060 Twin X2 OC 12288MB', 4.7, 728, 'uploads/1652209470inno3d-geforce-rtx-3060-twin-x2-oc-12288mb-n30602-12d6x-11902120h-hlr.png', 1),
(2, 'Asus GeForce RTX 2080 Dual Evo OC 8192MB', 0.5, 700, 'uploads/1652210447asus-geforce-rtx-2080-dual-evo-oc-8192mb-dual-rtx2080-o8g-evo-fr-factory-recertified.png', 1),
(3, 'AsRock Radeon RX 5600 Challenger D 6144MB', 4.4, 600, 'uploads/1652210653asrock-radeon-rx-5600-challenger-d-oc-6144mb-rx5600xt-cld-6g.png', 1),
(4, 'Asus PRIME B560-PLUS', 4.6, 130, 'uploads/1652210742asus-prime-b560-plus-s1200-intel-b560.png', 2),
(5, 'Gigabyte H410M S2H V3', 2.9, 75, 'uploads/1652210827gigabyte-h410m-s2h-v3-s1200-intel-h510.png', 2),
(6, 'Intel Core i5-10400F 2.9(4.3)GHz s1200 Box', 4.8, 150, 'uploads/1652210922intel-core-i5-10400f-2943ghz-s1200-box.png', 3),
(7, 'AMD Ryzen 5 5600X 3.7(4.6)GHz 32MB sAM4 Box', 4.4, 300, 'uploads/1652210991amd-ryzen-5-5600x-3746ghz-32mb-sam4-box-100-100000065box.png', 3),
(8, 'Gigabyte GA-A320M-S2H', 4.7, 50, 'uploads/1652433769gigabyte-ga-a320m-s2h-sam4-amd-a320.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `graphics_card`
--

CREATE TABLE `graphics_card` (
  `type_id` int UNSIGNED NOT NULL,
  `chip` varchar(100) DEFAULT NULL,
  `amount_of_memory` varchar(100) DEFAULT NULL,
  `memory_type` varchar(100) DEFAULT NULL,
  `memory_bus` varchar(100) DEFAULT NULL,
  `graphics_core_frequency` varchar(100) DEFAULT NULL,
  `video_memory_frequency` varchar(100) DEFAULT NULL,
  `productivity` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `graphics_card`
--

INSERT INTO `graphics_card` (`type_id`, `chip`, `amount_of_memory`, `memory_type`, `memory_bus`, `graphics_core_frequency`, `video_memory_frequency`, `productivity`) VALUES
(1, 'GeForce RTX 3060', '12288 Мб', 'GDDR6', '192 бит', 'Boost: 1792 МГц', '15000 МГц', '16645'),
(2, 'GeForce RTX 2080', '8192 Мб', 'GDDR6', '256 бит', '1830 МГц', '14000 МГц', '19412'),
(3, 'Radeon RX 5600', '6144 Мб', 'GDDR6', '192 бит', 'Boost: 1560 МГц', '14000 МГц', '13307');

-- --------------------------------------------------------

--
-- Структура таблицы `motherboard`
--

CREATE TABLE `motherboard` (
  `type_id` int UNSIGNED NOT NULL,
  `form_factor` varchar(100) DEFAULT NULL,
  `socket` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `compatible_RAM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `motherboard`
--

INSERT INTO `motherboard` (`type_id`, `form_factor`, `socket`, `type`, `compatible_RAM`) VALUES
(4, 'ATX', 'LGA1200', 'Материнские платы Intel', 'DDR4 для ПК'),
(5, 'microATX', 'LGA1200', 'Материнские платы Intel', 'DDR4 для ПК'),
(8, 'microATX', 'AM4', 'Материнские платы AMD', 'DDR4 для ПК');

-- --------------------------------------------------------

--
-- Структура таблицы `processor`
--

CREATE TABLE `processor` (
  `type_id` int UNSIGNED NOT NULL,
  `line` varchar(100) DEFAULT NULL,
  `socket` varchar(100) DEFAULT NULL,
  `number_of_cores` varchar(100) DEFAULT NULL,
  `integrated_graphics` varchar(100) DEFAULT NULL,
  `compatibility` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `processor`
--

INSERT INTO `processor` (`type_id`, `line`, `socket`, `number_of_cores`, `integrated_graphics`, `compatibility`) VALUES
(6, 'Intel Core i5', 'LGA1200', '6 ядер', 'Без встроенной графики', 'Материнские платы LGA1200'),
(7, 'AMD Ryzen 5', 'AM4', '6 ядер', 'Без встроенной графики', 'Материнские платы Socket AM4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basic`
--
ALTER TABLE `basic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ` (`id`),
  ADD KEY `UQ2` (`access_id`) USING BTREE;

--
-- Индексы таблицы `graphics_card`
--
ALTER TABLE `graphics_card`
  ADD PRIMARY KEY (`type_id`);

--
-- Индексы таблицы `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`type_id`);

--
-- Индексы таблицы `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `basic`
--
ALTER TABLE `basic`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basic`
--
ALTER TABLE `basic`
  ADD CONSTRAINT `basic_accessories` FOREIGN KEY (`access_id`) REFERENCES `accessories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `graphics_card`
--
ALTER TABLE `graphics_card`
  ADD CONSTRAINT `graphics_card_basic` FOREIGN KEY (`type_id`) REFERENCES `basic` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_basic` FOREIGN KEY (`type_id`) REFERENCES `basic` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `processor`
--
ALTER TABLE `processor`
  ADD CONSTRAINT `processor_basic` FOREIGN KEY (`type_id`) REFERENCES `basic` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
