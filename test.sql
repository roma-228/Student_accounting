-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2022 г., 14:42
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `certification`
--

CREATE TABLE `certification` (
  `id_certification` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `id_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `evaluation`
--

CREATE TABLE `evaluation` (
  `id_Evaluation` int(11) NOT NULL,
  `id_semestr` tinyint(4) DEFAULT NULL,
  `id_Students` int(11) DEFAULT NULL,
  `id_Subjects` smallint(6) DEFAULT NULL,
  `Evaluation` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `evaluation`
--

INSERT INTO `evaluation` (`id_Evaluation`, `id_semestr`, `id_Students`, `id_Subjects`, `Evaluation`, `data`) VALUES
(1, 1, 13, 1, '10', '2022');

-- --------------------------------------------------------

--
-- Структура таблицы `graduates`
--

CREATE TABLE `graduates` (
  `id_graduates` int(11) NOT NULL,
  `id_Students` int(11) NOT NULL,
  `groups` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_ group` tinyint(4) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Identifier` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kurse` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_ group`, `name`, `Identifier`, `id_kurse`) VALUES
(1, '101-x', 'Інженери', 1),
(2, '102-x', 'Інженери', 1),
(3, '201-x', 'Інженери', 2),
(4, '202-x', 'Інженери', 2),
(5, '301-x', 'Інженери', 3),
(6, '302-x', 'Інженери', 3),
(7, '401-x', 'Інженери', 4),
(8, '402-x', 'Інженери', 4),
(9, '410-і', '122 Компютерні науки', 4),
(12, 'Не переведенні', '', 5),
(13, 'Випускники', '', 6),
(14, '411-і', 'Компютерні науки', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `kurse`
--

CREATE TABLE `kurse` (
  `id_kurse` tinyint(4) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kurse`
--

INSERT INTO `kurse` (`id_kurse`, `name`, `Color`) VALUES
(1, '1 Курс', '#0088cc'),
(2, '2 Курс', '#e36159'),
(3, '3 Курс', '#2baab1'),
(4, '4 Курс', '#734ba9'),
(5, 'Не переведенні', '#FA8072'),
(6, 'Випускники', '#48D1CC');

-- --------------------------------------------------------

--
-- Структура таблицы `not_translated`
--

CREATE TABLE `not_translated` (
  `id_not_translated` tinyint(4) NOT NULL,
  `id_kurse` tinyint(4) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Students` int(11) NOT NULL,
  `id_ group` tinyint(4) NOT NULL,
  `groups` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_Orders` int(11) NOT NULL,
  `kurse` tinyint(4) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `id_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_Orders`, `kurse`, `name`, `text`, `id_Students`) VALUES
(1, 1, '157 25.05.202333 ', 'Переведено на 4 курс', 2),
(2, 2, '158 25.05.2023 ', 'Переведено на 4 курс', 2),
(3, 5, '654', '65', 5),
(4, 4, '5536', '6353', 3),
(5, 5, 'Yfpdfhjkhjk ', 'jhkhjkhjkhj', 10),
(6, 1, '№1 12 травня 1988', 'Переведененя', 12),
(7, 2, '№2 15 травня 1899', 'Переведенно', 12),
(8, 2, 'ghjghj', 'ghjghjgh', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `practice`
--

CREATE TABLE `practice` (
  `id_practice` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `id_kurse` tinyint(4) DEFAULT NULL,
  `id_semestr` tinyint(6) DEFAULT NULL,
  `beginning` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameteacher` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` enum('Добре','Задовільно','Відмінно','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `practice`
--

INSERT INTO `practice` (`id_practice`, `name`, `id_kurse`, `id_semestr`, `beginning`, `end`, `hour`, `nameteacher`, `rating`, `date`, `id_Students`) VALUES
(3, 'Навчальна', 4, 7, '12', '13', '45', 'Давидов', '5', '12.05', 12),
(4, 'Виробнича', 1, 6, '15', '13', '455', 'Давидов', '12', '05,06', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `semestr`
--

CREATE TABLE `semestr` (
  `id_semestr` tinyint(6) NOT NULL,
  `name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kurse` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `semestr`
--

INSERT INTO `semestr` (`id_semestr`, `name`, `id_kurse`) VALUES
(1, '1 Семестр', 1),
(2, '2 Семестр', 1),
(3, '3 Семестр', 2),
(4, '4 Семестр', 2),
(5, '5 Семестр', 3),
(6, '6 Семестр', 3),
(7, '7 Семестр', 4),
(8, '8 Семестр', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_Students` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ group` tinyint(4) DEFAULT NULL,
  `birthdata` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `adress` text COLLATE utf8mb4_unicode_ci,
  `reckoned` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groups` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Start_learning` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Form_of_study` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Department` text COLLATE utf8mb4_unicode_ci,
  `Degree` text COLLATE utf8mb4_unicode_ci,
  `Branch_of_knowledge` text COLLATE utf8mb4_unicode_ci,
  `Specialty` text COLLATE utf8mb4_unicode_ci,
  `program` text COLLATE utf8mb4_unicode_ci,
  `ratingall` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RatingExcellent` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RatingGood` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RatingSatisfactory` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiplomTopic` text COLLATE utf8mb4_unicode_ci,
  `DiplomGrade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Qualification` text COLLATE utf8mb4_unicode_ci,
  `Qualificationdata` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_Students`, `fullname`, `id_ group`, `birthdata`, `place_of_birth`, `adress`, `reckoned`, `groups`, `Start_learning`, `graduation`, `Form_of_study`, `Department`, `Degree`, `Branch_of_knowledge`, `Specialty`, `program`, `ratingall`, `RatingExcellent`, `RatingGood`, `RatingSatisfactory`, `DiplomTopic`, `DiplomGrade`, `Qualification`, `Qualificationdata`) VALUES
(12, 'Ващенко Ольга', 9, 'орпопроп', '12пропропропр', '2 пропропр    ', '3пропроп', '410-і     ', '4рапрапрап', '5парапр', '5апрапр', '5парап', '6рапра', '4прапрап', '4рпара', '5прапрапрапр', '5апрап', '5апрапр', '5апрпарап', '5рапрапрппа', '5парапрап', '5рапрапрап', 'Спеціаліст889', '12 травня 2022 №897'),
(13, 'Ворошов Євгеній', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Давидов Роман', 9, NULL, NULL, NULL, NULL, '410-і', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Пінчук Андрій', 6, '', '', '', '', '302-x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id_Subjects` smallint(6) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ group` tinyint(4) DEFAULT NULL,
  `hour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ESTS` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Teacher` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_semestr` tinyint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id_Subjects`, `name`, `id_ group`, `hour`, `ESTS`, `Teacher`, `id_semestr`) VALUES
(1, 'Математика', 1, '48', '50', 'Вороніна Н К', 1),
(2, 'Українська мова', 9, '48', '50', 'Наливайко К О', 8),
(8, 'Штучний інтелект', 9, '48', '58', 'Ровна', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `SuperAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `SuperAdmin`) VALUES
(2, 'Иванов Иван Иванович', 'test', 'DavidovcRoma@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(10, 'Давидов Роман', 'Давидов228', '58student@mksumdu.info', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(11, 'Ващенко Ольга', 'Ващенко', '58student@mksumdu.info', '123', 0),
(13, 'Давидова Соломія', 'Соломія', 'DavidovcRoma@gmail.com', '4fb845c67d91bcb3178498fc6fe1fedc', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id_certification`),
  ADD KEY `certification_ibfk_1` (`id_Students`);

--
-- Индексы таблицы `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id_Evaluation`),
  ADD KEY `evaluation_ibfk_1` (`id_semestr`),
  ADD KEY `evaluation_ibfk_2` (`id_Students`),
  ADD KEY `evaluation_ibfk_3` (`id_Subjects`);

--
-- Индексы таблицы `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`id_graduates`),
  ADD KEY `graduates_ibfk_1` (`id_Students`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_ group`),
  ADD KEY `groups_ibfk_1` (`id_kurse`);

--
-- Индексы таблицы `kurse`
--
ALTER TABLE `kurse`
  ADD PRIMARY KEY (`id_kurse`);

--
-- Индексы таблицы `not_translated`
--
ALTER TABLE `not_translated`
  ADD PRIMARY KEY (`id_not_translated`),
  ADD KEY `not_translated_ibfk_1` (`id_kurse`),
  ADD KEY `not_translated_ibfk_2` (`id_Students`),
  ADD KEY `not_translated_ibfk_3` (`id_ group`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_Orders`);

--
-- Индексы таблицы `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id_practice`),
  ADD KEY `practice_ibfk_1` (`id_kurse`),
  ADD KEY `practice_ibfk_2` (`id_semestr`),
  ADD KEY `practice_ibfk_3` (`id_Students`);

--
-- Индексы таблицы `semestr`
--
ALTER TABLE `semestr`
  ADD PRIMARY KEY (`id_semestr`),
  ADD KEY `id_kurse` (`id_kurse`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_Students`),
  ADD KEY `id_ group` (`id_ group`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_Subjects`),
  ADD KEY `id_ group` (`id_ group`),
  ADD KEY `id_semestr` (`id_semestr`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `certification`
--
ALTER TABLE `certification`
  MODIFY `id_certification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id_Evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `graduates`
--
ALTER TABLE `graduates`
  MODIFY `id_graduates` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id_ group` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `kurse`
--
ALTER TABLE `kurse`
  MODIFY `id_kurse` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `not_translated`
--
ALTER TABLE `not_translated`
  MODIFY `id_not_translated` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_Orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `practice`
--
ALTER TABLE `practice`
  MODIFY `id_practice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `semestr`
--
ALTER TABLE `semestr`
  MODIFY `id_semestr` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_Students` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_Subjects` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `certification`
--
ALTER TABLE `certification`
  ADD CONSTRAINT `certification_ibfk_1` FOREIGN KEY (`id_Students`) REFERENCES `students` (`id_Students`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`id_semestr`) REFERENCES `semestr` (`id_semestr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`id_Students`) REFERENCES `students` (`id_Students`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_ibfk_3` FOREIGN KEY (`id_Subjects`) REFERENCES `subjects` (`id_Subjects`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `graduates`
--
ALTER TABLE `graduates`
  ADD CONSTRAINT `graduates_ibfk_1` FOREIGN KEY (`id_Students`) REFERENCES `students` (`id_Students`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`id_kurse`) REFERENCES `kurse` (`id_kurse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `not_translated`
--
ALTER TABLE `not_translated`
  ADD CONSTRAINT `not_translated_ibfk_1` FOREIGN KEY (`id_kurse`) REFERENCES `kurse` (`id_kurse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `not_translated_ibfk_2` FOREIGN KEY (`id_Students`) REFERENCES `students` (`id_Students`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `not_translated_ibfk_3` FOREIGN KEY (`id_ group`) REFERENCES `groups` (`id_ group`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `practice`
--
ALTER TABLE `practice`
  ADD CONSTRAINT `practice_ibfk_1` FOREIGN KEY (`id_kurse`) REFERENCES `kurse` (`id_kurse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `practice_ibfk_2` FOREIGN KEY (`id_semestr`) REFERENCES `semestr` (`id_semestr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `practice_ibfk_3` FOREIGN KEY (`id_Students`) REFERENCES `students` (`id_Students`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `semestr`
--
ALTER TABLE `semestr`
  ADD CONSTRAINT `semestr_ibfk_1` FOREIGN KEY (`id_kurse`) REFERENCES `kurse` (`id_kurse`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_ group`) REFERENCES `groups` (`id_ group`);

--
-- Ограничения внешнего ключа таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_ group`) REFERENCES `groups` (`id_ group`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`id_semestr`) REFERENCES `semestr` (`id_semestr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
