-- Структура таблицы `products`--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(15,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `image` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Данные таблицы `products`--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `disc`, `image`) VALUES
(1, 2, 'Монитор', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1200.00', 5, 10, 'Монитор.jpg'),
(2, 2, 'Компьютер', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '4200.00', 7, 10, 'Компьютер.jpg'),
(3, 2, 'Ноутбук', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '7700.00', 2, 10, 'Ноутбук.jpg'),
(4, 2, 'Принтер', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1800.00', 1, 10, 'Принтер.jpg'),
(5, 1, 'Стол', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1100.00', 0, 20, ''),
(6, 1, 'Стул', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '2200.00', 0, 20, ''),
(7, 1, 'Шкаф', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1260.00', 8, 20, 'Шкаф.jpg'),
(8, 1, 'Кресло', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '4250.00', 9, 20, 'Кресло.jpg'),
(9, 1, 'Диван', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '9800.00', 1, 30, ''),
(10, 2, 'Телефон', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '5500.00', 3, 20, 'Телефон.jpg'),
(11, 2, 'Планшет', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '6500.00', 1, 0, 'Планшет.jpg');

-- Индексы таблицы `products`--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

-- AUTO_INCREMENT для таблицы `products`--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-----------------------------------------------------------------------------------------------------------------------------------------------------------------

-- Структура таблицы `users`--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Дамп данных таблицы `users`--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`, `avatar`) VALUES
(1, 'mistrall@gmail.com', 'Goldast', 'b07790754eb3627d6eec92ae0927b86a', 'admin', 'c81e728d9d4c2f636f067f89cc14862c.gif'),
(2, 'dvdsvsd@mail.ru', 'dsfdsf', '93279e3308bdbbeed946fc965017f67a', 'user', '');

-- Индексы таблицы `users`--

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

  -- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
----------------------------------------------------------------------------------------------------------------------------------------------------------------

-- Структура таблицы `cart`--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы `cart`--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `count`, `price`) VALUES
(1, 2, 13, 1, 4400);

-- Индексы таблицы `cart`--

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT для таблицы `cart`--

ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-----------------------------------------------------------------------------------------------------------------------------------------------------------------

-- Структура таблицы `category`--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы `category`--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Мебель'),
(2, 'Техника');

-- Индексы таблицы `category`--

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT для таблицы `category`--

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-----------------------------------------------------------------------------------------------------------------------------------------------------------------
-- Структура таблицы `images`--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Индексы таблицы `images`--

ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

-- AUTO_INCREMENT для таблицы `images`--

ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--------------------------------------------------------------------------------------------------------------------------------------------------------------------

