-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2023 г., 08:52
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
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rack` int NOT NULL,
  `shelf` int NOT NULL,
  `row` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_available` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `image`, `author`, `genre`, `rack`, `shelf`, `row`, `description`, `is_available`) VALUES
(1, 'Ангелы и демоны', 'books/s7HEqlmJkuRiy8zoOvZ1IzuYhJKIJyrn1V5r5GYe.jpg', 'Дэн Браун', 'боевик', 2, 1, 4, '«Ангелы и демоны» - смесь стремительных приключений, научных интриг и напряженного триллера. Начало приключений профессора Роберта Лэнгдона, в которых битва между наукой и религией перерастает в полномасштабную войну.', 1),
(2, 'Доктор фаустус', 'books/FburObg1os20t7WGplTCGuYJxJsJwfr11f4UHgfe.jpg', 'Томас Манн', 'Роман', 1, 3, 2, '«Доктор Фаустус». Значительнейшее и масштабнейшее произведение Томаса Манна. Классическая история гения, продавшего душу дьяволу, вписанная в историю Германии переломной эпохи — первой четверти минувшего века.', 1),
(3, 'Психология народов и масс', 'books/KalHdQlFeB0i4gtFb69DrHjm1GDvDtUCJo2g2TYB.jpg', 'Гюстав Лебон', 'Трактат', 1, 3, 2, 'Бессмертная книга, впервые опубликованная еще в 1895 году – и до сих пор остающаяся актуальной. Книга, на основе которой создавались, создаются и будут создаваться все новые и новые рекламные, политические и медийные технологии.', 1),
(4, 'Дело совести', 'books/cfo6zodN65W5v02aHHonBrBplEWos0nNS7vzgdYD.jpg', 'Джеймс Блиш', 'Роман', 5, 1, 2, 'Перед иезуитом Руисом-Санчесом и, по совместительству, биологом экспедиции на планету Лития, где живут ящероподобные существа, встаёт дилемма. Планета предстаёт в виде Эдема, но его не отпускает мысль, что Лития — творение Дьявола. Тем самым он впадает в манихейство (в этой концепции Зло может также творить, в отличие от христианства) и задаётся вопросами в адрес своей веры, параллельно ожидая вердикта от Папы за ересь.', 1),
(5, 'Чувство и чувствительность', 'books/bBBSBCRe30k42Po2qIdyIKZqeOuP5HigiKGsE9vC.jpg', 'Джейн Остен', 'Роман', 5, 3, 1, 'Роман «Разум и чувство» - чудесная развлекательная сказка флирта и наивности, которая вращается вокруг двух совершенно разных сестер, Элинор и Марианны Дэшвуд. Если Элинор задумчива, внимательна, рассудительна и спокойна, ее младшая сестра слишком эмоциональна и чрезмерно романтична. Обе девушки на выданье, но, ни разум Элинор, ни страстность Марианны не приводят к желанному счастью. Марианна влюбляется в беспринципного негодяя, а Элинор испытывает привязанность к человеку, который не может ей принадлежать.', 1),
(6, 'Шерли', 'books/JmMGAMUMBW0jfETIFBBz373ckuLetD6CybCGbLjH.jpg', 'Шарлотта Бронте', 'Роман', 6, 4, 2, 'Роман «Шерли» английской писательницы Ш. Бронте (1816–1855) получил на родине широкую известность — он много раз переиздавался, его экранизировали в кино и на телевидении, по нему готовили радиопередачи.Вот уже полтора столетия читателей волнует история любви двух героинь романа к одному мужчине, их трагическая судьба', 1),
(7, 'На западном фронте без перемен', 'books/Qn28QJ0yhAznsGgqFGkSLB2uZdqYQHMW5gGKCJg5.jpg', 'Мария Ремарк', 'История', 4, 1, 2, 'Перед вами своеобразное завещание солдата Первой мировой войны, Пауля Боймера. Вместе со своими одноклассниками он был призван в армию. Молодые и полные энтузиазма, они рвутся в бой, чтобы принести быструю победу своей стране.', 1),
(8, 'Машина пространства', 'books/tLyCtUz20h5mEeUQTVEBWCLRYp60v4lQ1rLIF2VM.jpg', 'Машина пространства', 'Роман', 6, 3, 2, 'Коммивояжер Тернбулл однажды остановился в гостинице города Скиптон и узнал, что в этой же гостинице остановилась мисс Фицгиббон, секретарь известного моториста и изобретателя сэра Уильяма Рейнольдса. У Тернбулла же есть особый товар для мотористов под названием «маска для защиты зрения». В то время торговец ещё и не подозревал, как глубоко эта маска изменит его собственную жизнь…', 1),
(9, 'Большие надежды', 'books/wLjeuvLfHTjfKVXFjTQYo8J0GIdtDbV2sCviJkmn.jpg', 'Чарльз Диккенс', 'Роман', 8, 5, 2, 'История Пипа, мальчика-сироты из бедной семьи, которому выпадает шанс стать «настоящим джентельменом». История о том, как случайная встреча на болотах может изменить всю жизнь. История любви и дружбы на фоне нравов буржуазного английского общества.', 1),
(10, 'Лавка древностей', 'books/f5YFWHopxXXx1vZMuRy1tKb9HwPDfILXOLPcfTH2.jpg', 'Чарльз Диккенс', 'Роман', 8, 2, 5, 'Нелл Трент живёт с дедушкой в его антикварной лавке и не знает особых бед. До тех пор, пока из-за чрезмерного пристрастия к азартным играм дедушка не влезает в долги к злобному и хитрому ростовщику Квилпу. Старик и внучка вынуждены покинуть свой дом — впереди их ждёт множество увлекательных, интересных, а зачастую и страшных и опасных приключений.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `codes`
--

CREATE TABLE `codes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `score` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2014_10_12_000000_create_users_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2022_11_21_111825_create_books_table', 1),
(28, '2022_11_22_220542_create_reservations_table', 1),
(29, '2022_11_23_164113_create_feedback_table', 1),
(30, '2022_11_24_130457_create_codes_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received_time` date NOT NULL,
  `status` enum('Забронировано','Выдано','Возвращено') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Забронировано'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `book_id`, `created_at`, `received_time`, `status`) VALUES
(1, 1, 2, '2023-04-21 18:23:47', '2023-05-03', 'Возвращено'),
(2, 1, 1, '2023-04-21 18:24:25', '2023-04-27', 'Возвращено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin','librarian') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `surname`, `email`, `phone`, `password`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'qwerty321', 'Эльвина', 'Хабирова', 'mail@mail.ru', '+ 7 (927) 426-24-66', '$2y$10$Tw2aWDId5UgEhS25foVHvuPAjUzr4Q6M9zyGIqMA5.zpWNJkz7eRW', 'avatars/XAv44hoNA2K1zRwA31uDO17K8uhYOBqyn8SXfLFb.jpg', 'admin', NULL, '2023-04-21 15:11:31', '2023-04-21 15:11:31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_image_unique` (`image`);

--
-- Индексы таблицы `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codes_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`),
  ADD KEY `feedback_book_id_foreign` (`book_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_book_id_foreign` (`book_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `codes`
--
ALTER TABLE `codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
