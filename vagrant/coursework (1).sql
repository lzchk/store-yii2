-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 24 2023 г., 22:38
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coursework`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_user`, `id_product`, `counts`) VALUES
(44, 1, 9, 1),
(57, 3, 11, 1),
(69, 2, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`id`, `id_user`, `number`) VALUES
(1, 3, 1111111111),
(2, 3, 3565);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `id_parent`, `name`, `img`) VALUES
(1, NULL, 'Овощной прилавок', 'https://yastatic.net/avatars/get-grocery-goods/2750890/9e5b5c3d91a7469a852c3163dfef5e3c/80x80-webp'),
(2, 1, 'Овощи, грибы и зелень', NULL),
(3, 1, 'Фрукты и ягоды', NULL),
(4, NULL, 'Молочный прилавок', 'https://yastatic.net/avatars/get-grocery-goods/2750890/7e196d537e5b46d79062a2ed5dfc4ccd/80x80-webp'),
(5, 4, 'Молоко, масло и яйца', NULL),
(6, 4, 'Сыры', NULL),
(7, 4, 'Кефир, сметана, творог', NULL),
(8, 4, 'Йогурты и десерты', NULL),
(9, NULL, 'Мясо, птица и рыба', 'https://yastatic.net/avatars/get-grocery-goods/2750890/3201a7d60b5642acafe22e44174815ea/80x80-webp'),
(10, NULL, 'Бакалея', 'https://yastatic.net/avatars/get-grocery-goods/2750890/b002614ff95b41b499a4112860785e49/80x80-webp'),
(11, 9, 'Мясо и птица', NULL),
(12, 9, 'Рыба и морепродукты', NULL),
(13, 10, 'Макароны, крупы и мука', NULL),
(14, 10, 'Чай', NULL),
(15, NULL, 'Булочная', 'https://yastatic.net/avatars/get-grocery-goods/2750890/8bb1188be474444eba935dc81ed58da3/80x80-webp'),
(16, NULL, 'Вода и напитки', 'https://yastatic.net/avatars/get-grocery-goods/2750890/4f6a267fd6db40bc9ca316f035b976f2/80x80-webp');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `raitung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'ООО «РоссАгроКомплекс»'),
(2, 'ООО «Гринфилдс-Логистика»'),
(3, 'ООО «Аква Стар»');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `house` int(11) NOT NULL,
  `apartment` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `intercom` int(11) DEFAULT NULL,
  `comment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like`
--

INSERT INTO `like` (`id`, `id_user`, `id_product`) VALUES
(2, 3, 13),
(4, 3, 3),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1680454429),
('m140506_102106_rbac_init', 1680455948),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1680455948),
('m180523_151638_rbac_updates_indexes_without_prefix', 1680455948),
('m200409_110543_rbac_update_mssql_trigger', 1680455948);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` varchar(10) NOT NULL,
  `id_category` int(11) NOT NULL,
  `expiration_date` int(11) NOT NULL COMMENT 'срок годности',
  `id_company` int(11) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `availability` int(11) NOT NULL,
  `sale_flag` int(11) DEFAULT '0',
  `new_flag` int(11) DEFAULT '0',
  `sale_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `id_category`, `expiration_date`, `id_company`, `weight`, `img`, `availability`, `sale_flag`, `new_flag`, `sale_price`) VALUES
(1, 'Помидоры круглые', NULL, '189', 2, 28, 2, 600, 'https://yastatic.net/avatars/get-grocery-goods/2783132/3aa9396a-a90a-4e26-b72e-8851da4b5529/928x928-webp', 100, 0, 0, NULL),
(2, 'Молоко отборное 3,4-4,5% «Домик в деревне» пастеризованное', 'Молоко цельное.', '99', 5, 21, 1, 930, 'https://yastatic.net/avatars/get-grocery-goods/2805921/7766b65d-2539-4f2c-98f3-dd61e0e332fb/928x928-webp', 299, 0, 0, NULL),
(3, 'Ананас', 'Вес от 1,2 кг.', '399', 3, 28, 1, 1200, 'https://yastatic.net/avatars/get-grocery-goods/2998515/a162b981-bad3-4b9b-aa94-031874e8ebda/928x928-webp', 99, 1, 1, 299),
(4, 'Стейк из индейки По-мексикански «Индилайт» охлажденный', 'Филе грудки индейки, вода, соль, глюкоза, пряности (паприка, перец черный, горчица, кориандр), овощи сушеные (лук, перец), масло подсолнечное.', '329', 11, 14, 1, 600, 'https://yastatic.net/avatars/get-grocery-goods/2783132/0aa8b5ea-e2a2-4f52-91e1-421a162199cb/928x928-webp', 15, 0, 1, NULL),
(5, 'Форель слабосолёная «Меридиан» филе-кусок', 'Форель радужная пресноводная (Salmo irideus), соль.', '459', 12, 45, 1, 150, 'https://yastatic.net/avatars/get-grocery-goods/2791769/f99bfd2b-34c1-4440-bc77-6110d162cda6/928x928-webp', 26, 1, 0, 329),
(6, 'Крупа гречневая «Агро-Альянс»', 'Крупа гречневая ядрица быстроразваривающаяся (пропаренная).', '129', 13, 600, 2, 900, 'https://yastatic.net/avatars/get-grocery-goods/2791769/1692f73a-993a-4fdb-a320-deb460f99ea5/928x928-webp', 297, 1, 0, 89),
(7, 'Чай чёрный Earl Grey Greenfield в пирамидках', 'Чай черный байховый, цедра цитрусовых, натуральный ароматизатор бергамот.', '179', 14, 730, 2, 100, 'https://yastatic.net/avatars/get-grocery-goods/2756334/2002845a-693e-4029-acb7-c81fc12f3b06/928x928-webp', 298, 0, 0, NULL),
(8, 'Стрипсы карри в овсяной панировке «Ломоносовские продукты» из филе цыплёнка-бройлера', 'Филе грудки цыпленка-бройлера охлажденное, маринад карри (сметана, соевый соус, специя карри острая, чеснок свежий, соль поваренная, перец чёрный), мука пшеничная, льезон (меланж жидкий, вода питьевая, соль поваренная), хлопья овсяные.', '149', 11, 7, 1, 300, 'https://yastatic.net/avatars/get-grocery-goods/2783132/ecb245ff-3f0c-4cd9-b296-53fa27c6b099/928x928-webp', 100, 0, 0, NULL),
(9, 'Печень цыплёнка-бройлера «ПФ Северная»', 'Печень цыплёнка-бройлера.', '149', 11, 9, 1, 650, 'https://yastatic.net/avatars/get-grocery-goods/2756334/1d2e5226-118f-4e0d-8a17-c2ed7bd5d108/928x928-webp', 198, 0, 0, NULL),
(10, 'Огурцы Бакинские Азербайджан', NULL, '249', 2, 21, 2, 300, 'https://yastatic.net/avatars/get-grocery-goods/2998515/4f509ee4-0e56-41a6-b468-b1d7b5414a89/928x928-webp', 100, 1, 0, 199),
(11, 'Перец микс', NULL, '299', 2, 28, 2, 500, 'https://yastatic.net/avatars/get-grocery-goods/2756334/6fb6aede-43bd-4acd-9055-dd67674903e9/928x928-webp', 400, 0, 0, NULL),
(12, 'Редис', NULL, '249', 2, 90, 2, 500, 'https://yastatic.net/avatars/get-grocery-goods/2805921/7b1eb41a-190d-44d3-9a69-3ff1aeaf6c44/928x928-webp', 20, 0, 0, NULL),
(13, 'Молоко 1,5% Viola ультрапастеризованное', 'Обезжиренное молоко, цельное молоко.', '149', 5, 120, 3, 1000, 'https://yastatic.net/avatars/get-grocery-goods/2750890/18d94b60-0ab7-4b47-b97a-9d644da636a0/928x928-webp', 192, 0, 1, NULL),
(14, 'Сыр Лёгкий Laplandia 17% без лактозы', 'Молоко нормализованное пастеризованное, соль, консерванты (нитрат натрия, Е235), закваски мезо-фильных и термофильных молочнокислых микроорганизмов, молокосвертывающий ферментный препарат микробного происхождения.', '299', 6, 90, 1, 180, 'https://yastatic.net/avatars/get-grocery-goods/2791769/df4f63bd-9a90-444c-b58f-2a0537dab9c0/928x928-webp', 95, 0, 1, NULL),
(15, 'Биойогурт питьевой Черника-злаки «Bio Баланс» 1%', 'Нормализованное молоко, наполнитель (вода, черника, сахар, хлопья пшеницы, ржаные отруби, крупа пшеницы, крахмал кукурузный, овсяные отруби, ароматизаторы, концентрированный сок лимона), сахар, закваска йогуртовых культур и пробиотических культур (бифидобактерий).', '69', 8, 35, 2, 270, 'https://yastatic.net/avatars/get-grocery-goods/2998515/2b34ccd2-c67d-43c4-9d78-49a24c19883d/928x928-webp', 196, 1, 1, 59),
(16, 'Мандарины мини', NULL, '299', 3, 28, 2, 500, 'https://yastatic.net/avatars/get-grocery-goods/2805921/1a4191ce-a065-4afb-af5c-74f9dbc7e4e7/928x928-webp', 100, 0, 0, NULL),
(17, 'Виноград зелёный без косточки', NULL, '299', 3, 90, 2, 500, 'https://yastatic.net/avatars/get-grocery-goods/2783132/cf37a26f-3758-409e-942d-2c11d5b1623d/928x928-webp', 100, 0, 0, NULL),
(18, 'Апельсины красные', NULL, '149', 3, 60, 2, 500, 'https://yastatic.net/avatars/get-grocery-goods/2998515/40f50801-ab83-472f-a1ba-d39bf415b377/928x928-webp', 100, 0, 0, NULL),
(19, 'Киви', NULL, '129', 3, 28, 2, 500, 'https://yastatic.net/avatars/get-grocery-goods/2805921/9aba5b6f-558f-46d2-95d0-da5c9a53ae7b/928x928-webp', 20, 0, 0, NULL),
(20, 'Зелёный лук', NULL, '59', 2, 10, 2, 50, 'https://yastatic.net/avatars/get-grocery-goods/2805921/6954f4d4-3dca-4371-b5b0-54bf5b615309/928x928-webp', 300, 0, 0, NULL),
(21, 'Сливки 33% «Белый Город» для взбивания стерилизованные', 'Нормализованные сливки с использованием эмульгатора кремодана и стабилизатора каррагинана.', '159', 5, 180, 3, 200, 'https://yastatic.net/avatars/get-grocery-goods/2805921/808f036b-b0f2-46e5-ae80-c30b56f6bb05/928x928-webp', 100, 0, 0, NULL),
(22, 'Коктейль молочный «Экомилк» Solo Сочная клубника 2%', 'Нормализованное молоко, сахар, клубничное пюре, ароматизатор, краситель – кармины, стабилизатор – каррагинан.', '129', 5, 21, 1, 900, 'https://yastatic.net/avatars/get-grocery-goods/2805921/a8e53e3b-3102-410e-b224-e4a3ca4eed02/928x928-webp', 200, 0, 0, NULL),
(23, 'Масло сливочное 82,5% «Экомилк» высший сорт', 'Высокожирные пастеризованные сливки.', '189', 5, 60, 2, 180, 'https://yastatic.net/avatars/get-grocery-goods/2750890/8b0ee787-155b-477e-a1ca-d4c7177a1f87/928x928-webp', 199, 1, 0, 149),
(24, 'Кефир 2,5% «Простоквашино»', 'Буквенный состав смотреть на крышке: Р-нормализованное молоко, закваска на кефирных грибках, У-нормализованное молоко, восстановленное из сухого молока, закваска на кефирных грибках.', '99', 7, 16, 2, 930, 'https://yastatic.net/avatars/get-grocery-goods/2750890/de16b746-4881-4e16-8ea3-4b0883f63643/928x928-webp', 100, 0, 0, 89),
(25, 'Батон Домашний «Хлебный дом» в нарезке', 'Мука пшеничная хлебопекарная высшего сорта, вода питьевая, сахар, дрожки хлебопекарные, масло подсолнечное нерафинированное, соль, добавка комплексная пищевая (мука пшеничная, фермент микробного происхождения, антиокислитель - кислота аскорбиновая), стабилизатор - ацетат кальция. Продукт может содержать следы семян кунжута, сои, молочных и яичных продуктов.', '59', 15, 5, 2, 230, 'https://yastatic.net/avatars/get-grocery-goods/2756334/a0a87dd9-4c2f-4f5c-a87b-ce6294ee63a9/928x928-webp', 100, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_delivery` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `full_price` varchar(100) NOT NULL,
  `full_weight` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'В обработке'),
(2, 'Собираем'),
(3, 'В пути'),
(4, 'Завершён');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0 - юзер, 1 - админ',
  `date_of_birth` date DEFAULT NULL,
  `sex` enum('муж','жен','не укажу') NOT NULL,
  `avatar` varchar(300) DEFAULT NULL,
  `id_card` int(11) DEFAULT NULL COMMENT 'основная карта',
  `id_delivery` int(11) DEFAULT NULL COMMENT 'основной адрес'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `phone`, `name`, `password`, `role`, `date_of_birth`, `sex`, `avatar`, `id_card`, `id_delivery`) VALUES
(1, '79999999999', 'admin', 'admin', 1, '2023-04-01', 'не укажу', NULL, NULL, NULL),
(2, '77777777777', 'user', 'user', 0, '2023-04-01', 'муж', NULL, NULL, NULL),
(3, '79119921426', 'Елизавета Коротина А', '1234', 0, '2017-01-20', 'жен', 'avatar.jpeg', NULL, NULL),
(4, '79899009090', 'игорь', '123', 0, '2017-01-20', 'муж', '', NULL, NULL),
(5, '79119921422', 'Коротина Елизавета Евгеньевна', '1234', 0, '2017-01-20', 'жен', '', NULL, NULL),
(6, '76783536346', 'Коротина Елизавета Евгеньевна', '1234', 0, '2017-01-20', 'жен', '', NULL, NULL),
(7, '76783536355', 'Коротина Елизавета Евгеньевна', '1234', 0, '2017-01-20', 'жен', '', NULL, NULL),
(8, '76783536350', 'Коротина Елизавета Евгеньевна', '1234', 0, '2017-01-20', 'жен', '', NULL, NULL),
(9, '76783536359', 'Коротина Елизавета Евгеньевна', '1234', 0, '2017-01-20', 'жен', '', NULL, NULL),
(10, '76783536354', 'Коротина Елизавета Евгеньевна', '1234', 0, '2017-01-20', 'жен', '', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `id_img` (`img`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_card` (`id_card`),
  ADD KEY `id_delivery` (`id_delivery`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_card` (`id_card`),
  ADD KEY `id_delivery` (`id_delivery`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`);

--
-- Ограничения внешнего ключа таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`id_delivery`) REFERENCES `delivery` (`id`),
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `purchase_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `purchase_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_delivery`) REFERENCES `delivery` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
