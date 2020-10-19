-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2020 г., 16:55
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `padmin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `user`, `title`, `text`, `photo`) VALUES
(6, 6, 'Яблоко Гренни Смит', 'Гренни Смит (Granny Smith – с английского – бабуля Смит) или Гренни – один из самых распространённых и востребованных сортов яблок. Яблоко Гренни Смит было получено в конце XIX столетия в Австралии при скрещивании австралийской яблони с дичкой, которую завезли из Франции. Якобы селекцией данного сорта занималась Анна Мария Смит, немолодая женщина, в честь которой яблоки и получили своё уютное название.\r\n\r\nЯблоко Гренни Смит имеет крупные плоды, нередко достигающие в весе 300 грамм, округлой формы, с глянцевой кожурой ярко-зелёного цвета. Иногда половина яблока может быть окрашена в жёлто-зелёный или красноватый цвет, в зависимости от яркости солнца. У яблока Гренни Смит твёрдая и сочная мякоть бело-зелёного цвета, с кисло-сладким вкусом. Отличительные особенности данного сорта – отсутствие аромата и сохранение цвета мякоти при разрезании, она не темнеет.\r\n\r\nКалорийность яблока Гренни Смит\r\nКалорийность яблока Гренни Смит составляет 48 ккал на 100 грамм продукта.\r\n\r\nСостав и полезные свойства яблока Гренни Смит\r\nВ составе яблока Гренни Смит имеются: пектин, витамины группы В (В1, В2, В5, В6, В9), С, Н и РР, а также минеральные вещества: калий, кальций, магний, цинк, железо, фосфор и натрий. Благодаря тому, что яблоко больше, чем на половину состоит из воды, содержит мало сахара и практически не содержит жиров, его рекомендуют включать в рацион всем, кто следит за весом (calorizator). Яблоко Гренни Смит – отличное профилактическое средство от возникновения запоров, помогает наладить перистальтику кишечника, выводит токсины и соли тяжёлых металлов. Яблоко Гренни Смит практически не вызывает аллергических реакций, поэтому его можно предлагать деткам с раннего возраста.', 'grensmit.png'),
(7, 7, 'Яблоко Айдаред', 'Яблоня данного сорта объемная и достаточно высокая (до 6 м), обладает крупным стволом и мощными, хорошо разветвленными основными ветками, отходящими от ствола под острым (примерно 45 градусов) углом. Крона шаровидная, облиственность веток высокая. Кора ствола и основных веток имеет серо-коричневый цвет, молодые ветви обладают серым окрасом. Листва темно-зеленая, пластины продолговатые, на вершине заостренные. Это внешнее описание свойственно взрослому 5–8 летнему дереву. Цветет яблоня на 3–5 году жизни ранней весной (конец апреля – начало мая). Цветы крупные, белые, с интенсивным розоватым оттенком по краям, собранные в объемные щитковидные соцветия. Плоды яблони Айдаред крупные (150–190 г), широкой, немного приплющенной формы. Окрас яблок зеленовато-желтый с ярким малиновым румянцем, иногда покрывающим плод полностью. Тонкая, но довольно прочная кожура покрыта легким налетом. Мякоть яблок кремовая, сочная, немного хрустящая, кисло-сладкая на вкус. Съемной зрелости плоды достигают к концу сентября, но снимать их в это время вовсе не обязательно, так как они не опадают до самых морозов. В надлежащих условиях, в прохладном и темном месте, яблоки без проблем сохраняются в течение всей зимы и даже весной еще остаются сочными и ароматными', 'aidared.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Не указано'),
(3, 'Овощи'),
(4, 'Мясо'),
(5, 'Рыба');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `art`, `user`, `text`) VALUES
(1, 1, 6, 'Здравия желаю');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `text`, `price`, `photo`, `cat`) VALUES
(2, 'Гренни Смит', 'Яблоко Гренни Смит имеет крупные плоды, нередко достигающие в весе 300 грамм, округлой формы, с глянцевой кожурой ярко-зелёного цвета. Иногда половина яблока может быть окрашена в жёлто-зелёный или красноватый цвет, в зависимости от яркости солнца.', '149', 'grensmit.png', 1),
(7, 'Яблоко Айдаред', 'Окрас яблок зеленовато-желтый с ярким малиновым румянцем, иногда покрывающим плод полностью. Тонкая, но довольно прочная кожура покрыта легким налетом. Мякоть яблок кремовая, сочная, немного хрустящая, кисло-сладкая на вкус.', '93', 'aidared.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `login`, `name`, `phone`, `password`) VALUES
(5, 1, 'user', 'User', '999999', 'ee11cbb19052e40b07aac0ca060c23ee'),
(6, 2, 'admin', 'Админ Одменович', '8999999999', '21232f297a57a5a743894a0e4a801fc3'),
(7, 1, 'and', 'Андрей', '+7999999999', 'be5d5d37542d75f93a87094459f76678');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
