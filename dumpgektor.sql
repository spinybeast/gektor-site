-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 07 2016 г., 13:27
-- Версия сервера: 5.5.39
-- Версия PHP: 5.4.31
use gektor;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tdgektor_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
`id` int(11) NOT NULL,
  `position_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `page_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `position_id`, `image`, `enabled`, `page_id`) VALUES
(5, 'slider', '562d39364dda4.jpg', 1, ''),
(9, 'left', '55b510735a8a4.jpg', 1, 'index'),
(10, 'left', '559c1ae34e558.jpg', 1, 'delivery'),
(11, 'left', '559c1b63c4028.jpg', 1, 'index'),
(13, 'left', '55c773797891e.jpg', 1, 'suppliers'),
(14, 'left', '55c773244a2e8.jpg', 1, 'partners');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `enabled`, `image`, `description`) VALUES
(9, 0, 'Напольные котлы', 1, '5595263169ad8.jpg', 'Напольные котлы отечественного производства'),
(11, 0, 'Настенные котлы', 0, NULL, 'Настенные котлы импортных производителей'),
(12, 0, 'Водонагреватели	', 0, NULL, 'Настенные газовые и электрические водонагреватели'),
(16, 0, 'Запчасти', 0, NULL, 'Запасные части'),
(14, 9, 'Ангара-Люкс', 1, '562d13376a2c6.jpg', 'Газовые напольные энергоНЕзависимые котлы Ангара-Люкс – это котлы высокого класса по доступной цене. Толщина теплообенника 3-мм. (на мод.17,4-35 кВт), дополнительные ребра жесткости и стяжки позволяет использовать данный агрегат в закрытых системах отопления. Рекомендуемое рабочее давление 2 атм. Подключение к системе отопления возможно с  3-х сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла (на мод.17,4 и 23,2 кВт).');

-- --------------------------------------------------------

--
-- Структура таблицы `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
`id` int(11) NOT NULL,
  `staticpage_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `without_url` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `main_menu`
--

INSERT INTO `main_menu` (`id`, `staticpage_id`, `category_id`, `enabled`, `name`, `parent_id`, `url`, `without_url`) VALUES
(2, 2, NULL, 1, 'Главная', NULL, NULL, 0),
(3, NULL, NULL, 1, 'Продукция ', NULL, '/catalog', 0),
(4, 4, NULL, 1, 'О компании', NULL, '', 0),
(5, NULL, NULL, 1, 'Условия  &lt;br&gt;сотрудничества', NULL, '', 1),
(6, NULL, NULL, 1, 'Сервис и &lt;br&gt; гарантия', NULL, '/', 0),
(7, 3, NULL, 1, 'Контакты', NULL, '', 0),
(8, NULL, NULL, 1, 'Цены', 5, '/prices', 0),
(9, 5, NULL, 1, 'Доставка и оплата', 5, '', 1),
(10, 6, NULL, 0, 'Поставщикам', 5, '', 0),
(11, 7, NULL, 1, 'Партнерам', 5, '', 0),
(12, 8, NULL, 1, 'Условия гарантии', 6, '', 1),
(13, NULL, 9, 1, 'Запчасти', 6, '', 0),
(14, 9, NULL, 1, 'Сервисное обслуживание', 6, '', 0),
(15, NULL, NULL, 1, 'Сертификаты и документация', 6, '', 0),
(16, NULL, NULL, 1, 'Задать вопрос', NULL, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product_properties`
--

CREATE TABLE IF NOT EXISTS `product_properties` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `value` text
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=225 ;

--
-- Дамп данных таблицы `product_properties`
--

INSERT INTO `product_properties` (`id`, `product_id`, `property_id`, `value`) VALUES
(68, 3, 10, '17,4'),
(62, 1, 11, '125'),
(61, 1, 10, '11,6'),
(60, 1, 12, '60'),
(67, 3, 11, '200'),
(66, 3, 12, '86'),
(63, 2, 14, '20 кВт'),
(64, 2, 15, 'до 200 м2'),
(65, 2, 13, '«ATMO» (НАСТЕННЫЙ ГАЗОВЫЙ АТМОСФЕРНЫЙ)'),
(71, 4, 13, '«ATMO» (НАСТЕННЫЙ ГАЗОВЫЙ АТМОСФЕРНЫЙ)'),
(69, 4, 14, '20 кВт'),
(70, 4, 15, 'до 200 м2'),
(223, 8, 36, '2,9'),
(222, 8, 27, '29'),
(221, 8, 35, '1,96'),
(138, 5, 16, '11,6'),
(137, 5, 17, '25 - 125'),
(188, 10, 24, '92'),
(187, 10, 23, '2.32'),
(186, 10, 28, '3.5'),
(185, 10, 29, '12'),
(184, 10, 30, '150-340 '),
(183, 10, 31, '2"'),
(182, 10, 27, '35'),
(220, 8, 34, '92'),
(224, 8, 25, '2');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `trade_price` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `price`, `trade_price`, `name`, `description`, `image`) VALUES
(8, 14, 24590, NULL, 'Angara Lux 29', 'Газовый напольный энергонезависимый котел Ангара-Люкс – это котлы высокого класса по доступной цене. Отопительные аппараты надежные и долговечные. Теплообменник в данной серии изготавливается из трехмиллиметровой стали, имеет дополнительные ребра жесткости и стяжки, а это говорит о том, что срок службы теплообменника увеличивается на 15 лет. Толщина 3-мм позволяет использовать данный агрегат в закрытых системах отопления, рекомендуемое рабочее давление 2 атм. Газовые котлы Ангара-Люкс имеют компактные размеры и небольшой вес, что позволяет комфортно их транспортировать и устанавливать в любых помещениях. Присоединительные патрубки расположены с трех сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла. Преимущества газового котла: газовые котлы Ангара-Люкс оснащены цифровыми датчиками температуры; усовершенствованная конструкция дымохода предохраняет от задуваний, а это сказывается на экономичности. котлы экономичны и эффективны – КПД котлов Ангара-Люкс достигает 92% можно применять как в открытых таки и в закрытых системах отопления. срок службы газового котла не менее 15 лет. В газовом котле Ангара-Люкс используется блок итальянской автоматики Sit. Автоматика Sit делает котел простым в эксплуатации, практически бесшумным и высоконадежным. Также использование автоматики Sit позволяет использовать данный котел под баллонный сжиженный газ. Газовые напольные котлы Ангара-Люкс могут использоваться вместо устаревших или вышедших из строя моделей АОГВ, КСГ и КЧМ. Это прописано в паспорте изделия.', '562e55fb4be64.jpg'),
(9, 14, 26450, NULL, 'Angara Lux 35', 'Номинальная                                                                                 \r\nтеплопроизводительность.................................................................35 кВт                \r\n                                                                                                               \r\nРасход газа:                                                                                                \r\n- природного, не более.......................................................................3.5 м³\\час              \r\n- сжиженного, не более.....................................................................32 кг\\час            \r\n                                                                                                               \r\nКПД, не менее...........................................................................................92 %                  \r\n                                                                                                               \r\nРабочее давление в                                                                               \r\nсистеме отопления не более............................................................2 кг\\см²             \r\n                                                                                                               \r\nОтапливаемая площадь.......................................................................150-340 м²            \r\n                                                                                                               \r\nПрисоеденительные размеры                                                                     \r\n- ОВ....................................................................................................................2"                         \r\n- ГВС..................................................................................................................½"                        \r\n- Газ..................................................................................................................½"                         \r\n                                                                                                               \r\nДиаметр дымохода.................................................................................130 мм                  \r\n                                                                                                               \r\nГабаритные размеры (ГхШхВ)..........................................................515х425х1075', '562d07684aadd.jpg'),
(7, 14, 20380, NULL, 'Angara Lux 23,2', 'Газовый напольный энергонезависимый котел Ангара-Люкс – это котлы высокого класса по доступной цене. Отопительные аппараты надежные и долговечные. Теплообменник в данной серии изготавливается из трехмиллиметровой стали, имеет дополнительные ребра жесткости и стяжки, а это говорит о том, что срок службы теплообменника увеличивается на 15 лет. Толщина 3-мм позволяет использовать данный агрегат в закрытых системах отопления, рекомендуемое рабочее давление 2 атм. Газовые котлы Ангара-Люкс имеют компактные размеры и небольшой вес, что позволяет комфортно их транспортировать и устанавливать в любых помещениях. Присоединительные патрубки расположены с трех сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла. Преимущества газового котла: газовые котлы Ангара-Люкс оснащены цифровыми датчиками температуры; усовершенствованная конструкция дымохода предохраняет от задуваний, а это сказывается на экономичности. котлы экономичны и эффективны – КПД котлов Ангара-Люкс достигает 92% можно применять как в открытых таки и в закрытых системах отопления. срок службы газового котла не менее 15 лет. В газовом котле Ангара-Люкс используется блок итальянской автоматики Sit. Автоматика Sit делает котел простым в эксплуатации, практически бесшумным и высоконадежным. Также использование автоматики Sit позволяет использовать данный котел под баллонный сжиженный газ. Газовые напольные котлы Ангара-Люкс могут использоваться вместо устаревших или вышедших из строя моделей АОГВ, КСГ и КЧМ. Это прописано в паспорте изделия.', '562e4fd14a311.jpg'),
(6, 14, 18250, NULL, 'Angara Lux 17,4', 'Газовый напольный энергонезависимый котел Ангара-Люкс – это котлы высокого класса по доступной цене. Отопительные аппараты надежные и долговечные. Теплообменник в данной серии изготавливается из трехмиллиметровой стали, имеет дополнительные ребра жесткости и стяжки, а это говорит о том, что срок службы теплообменника увеличивается на 15 лет. Толщина 3-мм позволяет использовать данный агрегат в закрытых системах отопления, рекомендуемое рабочее давление 2 атм. Газовые котлы Ангара-Люкс имеют компактные размеры и небольшой вес, что позволяет комфортно их транспортировать и устанавливать в любых помещениях. Присоединительные патрубки расположены с трех сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла. Преимущества газового котла: газовые котлы Ангара-Люкс оснащены цифровыми датчиками температуры; усовершенствованная конструкция дымохода предохраняет от задуваний, а это сказывается на экономичности. котлы экономичны и эффективны – КПД котлов Ангара-Люкс достигает 92% можно применять как в открытых таки и в закрытых системах отопления. срок службы газового котла не менее 15 лет. В газовом котле Ангара-Люкс используется блок итальянской автоматики Sit. Автоматика Sit делает котел простым в эксплуатации, практически бесшумным и высоконадежным. Также использование автоматики Sit позволяет использовать данный котел под баллонный сжиженный газ. Газовые напольные котлы Ангара-Люкс могут использоваться вместо устаревших или вышедших из строя моделей АОГВ, КСГ и КЧМ. Это прописано в паспорте изделия.', '562d0315ad4fd.jpg'),
(5, 14, 15880, NULL, 'Angara Lux 11,6', 'Номинальная                                                                                 \r\nтеплопроизводительность.................................................................11,6 кВт               \r\n                                                                                                               \r\nРасход газа:                                                                                                \r\n- природного, не более.......................................................................1.2 м³\\час              \r\n- сжиженного, не более.....................................................................1.06 кг\\час            \r\n                                                                                                               \r\nКПД, не менее...........................................................................................92 %                  \r\n                                                                                                               \r\nРабочее давление в                                                                               \r\nсистеме отопления не более............................................................2 кг\\см²             \r\n                                                                                                               \r\nОтапливаемая площадь.......................................................................25-125 м²            \r\n                                                                                                               \r\nПрисоеденительные размеры                                                                     \r\n- ОВ....................................................................................................................1½"                                            \r\n- Газ..................................................................................................................½"                         \r\n                                                                                                               \r\nДиаметр дымохода.................................................................................130 мм                  \r\n                                                                                                               \r\nГабаритные размеры (ГхШхВ)..........................................................460х330х600', '562d089a3bc95.jpg'),
(10, 14, 26750, NULL, 'Angara Lux 35 ГВС', 'Номинальная                                                                                 \r\nтеплопроизводительность.................................................................35 кВт                \r\n                                                                                                               \r\nРасход газа:                                                                                                \r\n- природного, не более.......................................................................3.5 м³\\час              \r\n- сжиженного, не более.....................................................................32 кг\\час            \r\n                                                                                                               \r\nКПД, не менее...........................................................................................92 %                  \r\n                                                                                                               \r\nРабочее давление в                                                                               \r\nсистеме отопления не более............................................................2 кг\\см²            \r\n                                                                                                               \r\nМаксимальный расход воды                                                                      \r\nв режиме ГВС Δ25С°...............................................................................   -                        \r\n                                                                                                               \r\nОтапливаемая площадь.......................................................................150-340 м²            \r\n                                                                                                               \r\nПрисоеденительные размеры                                                                     \r\n- ОВ....................................................................................................................2"                         \r\n- ГВС..................................................................................................................½"                        \r\n- Газ..................................................................................................................½"                         \r\n                                                                                                               \r\nДиаметр дымохода.................................................................................130 мм                  \r\n                                                                                                               \r\nГабаритные размеры (ГхШхВ)..........................................................515х425х1075', '562d078f8295f.jpg'),
(11, 14, 25190, NULL, 'Angara Lux 29 ГВС', 'Газовый напольный стальной котел. Опаиваемая площадь до 290 м2', '562e5625070d4.jpg'),
(12, 14, 22420, NULL, 'Angara Lux 23,2 ГВС', 'Газовый напольный энергонезависимый котел Ангара-Люкс – это котлы высокого класса по доступной цене. Отопительные аппараты надежные и долговечные. Теплообменник в данной серии изготавливается из трехмиллиметровой стали, имеет дополнительные ребра жесткости и стяжки, а это говорит о том, что срок службы теплообменника увеличивается на 15 лет. Толщина 3-мм позволяет использовать данный агрегат в закрытых системах отопления, рекомендуемое рабочее давление 2 атм. Газовые котлы Ангара-Люкс имеют компактные размеры и небольшой вес, что позволяет комфортно их транспортировать и устанавливать в любых помещениях. Присоединительные патрубки расположены с трех сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла. Преимущества газового котла: газовые котлы Ангара-Люкс оснащены цифровыми датчиками температуры; усовершенствованная конструкция дымохода предохраняет от задуваний, а это сказывается на экономичности. котлы экономичны и эффективны – КПД котлов Ангара-Люкс достигает 92% можно применять как в открытых таки и в закрытых системах отопления. срок службы газового котла не менее 15 лет. В газовом котле Ангара-Люкс используется блок итальянской автоматики Sit. Автоматика Sit делает котел простым в эксплуатации, практически бесшумным и высоконадежным. Также использование автоматики Sit позволяет использовать данный котел под баллонный сжиженный газ. Газовые напольные котлы Ангара-Люкс могут использоваться вместо устаревших или вышедших из строя моделей АОГВ, КСГ и КЧМ. Это прописано в паспорте изделия.', '562e4fa1d8097.jpg'),
(13, 14, 20300, NULL, 'Angara Lux 17,4 ГВС', 'Газовый напольный энергонезависимый котел Ангара-Люкс – это котлы высокого класса по доступной цене. Отопительные аппараты надежные и долговечные. Теплообменник в данной серии изготавливается из трехмиллиметровой стали, имеет дополнительные ребра жесткости и стяжки, а это говорит о том, что срок службы теплообменника увеличивается на 15 лет. Толщина 3-мм позволяет использовать данный агрегат в закрытых системах отопления, рекомендуемое рабочее давление 2 атм. Газовые котлы Ангара-Люкс имеют компактные размеры и небольшой вес, что позволяет комфортно их транспортировать и устанавливать в любых помещениях. Присоединительные патрубки расположены с трех сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла. Преимущества газового котла: газовые котлы Ангара-Люкс оснащены цифровыми датчиками температуры; усовершенствованная конструкция дымохода предохраняет от задуваний, а это сказывается на экономичности. котлы экономичны и эффективны – КПД котлов Ангара-Люкс достигает 92% можно применять как в открытых таки и в закрытых системах отопления. срок службы газового котла не менее 15 лет. В газовом котле Ангара-Люкс используется блок итальянской автоматики Sit. Автоматика Sit делает котел простым в эксплуатации, практически бесшумным и высоконадежным. Также использование автоматики Sit позволяет использовать данный котел под баллонный сжиженный газ. Газовые напольные котлы Ангара-Люкс могут использоваться вместо устаревших или вышедших из строя моделей АОГВ, КСГ и КЧМ. Это прописано в паспорте изделия.', '562d035c1b508.jpg'),
(14, 14, 16970, NULL, 'Angara Lux 11,6 ГВС', 'Газовый напольный энергонезависимый котел Ангара-Люкс – это котлы высокого класса по доступной цене. Отопительные аппараты надежные и долговечные. Теплообменник в данной серии изготавливается из трехмиллиметровой стали, имеет дополнительные ребра жесткости и стяжки, а это говорит о том, что срок службы теплообменника увеличивается на 15 лет. Толщина 3-мм позволяет использовать данный агрегат в закрытых системах отопления, рекомендуемое рабочее давление 2 атм. Газовые котлы Ангара-Люкс имеют компактные размеры и небольшой вес, что позволяет комфортно их транспортировать и устанавливать в любых помещениях. Присоединительные патрубки расположены с трех сторон – благодаря этому обвязку можно сделать слева, справа и сзади котла. Преимущества газового котла: газовые котлы Ангара-Люкс оснащены цифровыми датчиками температуры; усовершенствованная конструкция дымохода предохраняет от задуваний, а это сказывается на экономичности. котлы экономичны и эффективны – КПД котлов Ангара-Люкс достигает 92% можно применять как в открытых таки и в закрытых системах отопления. срок службы газового котла не менее 15 лет. В газовом котле Ангара-Люкс используется блок итальянской автоматики Sit. Автоматика Sit делает котел простым в эксплуатации, практически бесшумным и высоконадежным. Также использование автоматики Sit позволяет использовать данный котел под баллонный сжиженный газ. Газовые напольные котлы Ангара-Люкс могут использоваться вместо устаревших или вышедших из строя моделей АОГВ, КСГ и КЧМ. Это прописано в паспорте изделия.', '562d08f2389d0.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
`id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `properties`
--

INSERT INTO `properties` (`id`, `name`) VALUES
(3, 'бубушка'),
(5, 'Ввв'),
(7, 'Ввво'),
(6, 'Ввворл'),
(4, 'Высота'),
(2, 'Длина'),
(8, 'опа'),
(1, 'Ширина'),
(9, 'ыы'),
(10, 'Номинальная теплопроизводительность'),
(11, 'Отапливаемая площадь, м2'),
(12, 'Масса, кг'),
(13, 'Серия'),
(14, 'Номинальная тепловая мощность'),
(15, 'Ориентировочная площадь отопления'),
(16, 'Номинальная тепловая мощность, кВт'),
(17, 'Ориентировочная площадь отопления, м2'),
(18, 'КПД по отходящим газам, не менее, %'),
(19, 'Расход воды в режиме ГВ. при нагреве на Δt=35°C, л/мин	'),
(20, 'Габаритные размеры ГхВхШ, мм'),
(21, 'Номинальная теплопроизводительность,кВт'),
(22, 'Расход природного, не более, м³\\час   '),
(23, 'Расход сжиженного газа, не более, кг\\час      '),
(24, 'КПД, не менее,%'),
(25, 'Рабочее давление в системе отопления не более, кг\\см²    '),
(26, 'Максимальный расход воды в режиме ГВС Δ25С°'),
(27, 'Номинальная теплопроизводительность, кВт'),
(28, 'Расход природного газа, не более, м³\\час   '),
(29, 'Максимальный расход воды в режиме ГВС Δ25С°(л\\мин)'),
(30, 'Отапливаемая площадь,м²     '),
(31, 'Присоеденительные размеры ОВ         '),
(32, 'Присоеденительные размеры ГВС'),
(33, 'Присоеденительные размеры газ'),
(34, 'КПД, не менее, %'),
(35, 'Расход сжиженного газа, не более, кг\\час'),
(36, 'Расход природного газа, не более, м³\\час');

-- --------------------------------------------------------

--
-- Структура таблицы `staticpages`
--

CREATE TABLE IF NOT EXISTS `staticpages` (
`id` int(11) NOT NULL,
  `text` text,
  `pagekey` varchar(200) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `staticpages`
--

INSERT INTO `staticpages` (`id`, `text`, `pagekey`, `title`, `enabled`) VALUES
(2, '&lt;p&gt;&lt;strong&gt;&lt;/strong&gt;&lt;strong&gt;&lt;/strong&gt;Газовые напольные котлы ™«Angara Lux» разработаны по программе импортозамещения, имеют широкий модельный ряд  мощностью &lt;strong&gt;от 11,6 до 35 кВт&lt;/strong&gt;, как одноконтурные так и с функцией подачи горячей воды. &lt;/p&gt;&lt;p&gt;Завод-изготовитель использует для производства теплообменника сталь российского производства, толщина которой 3мм. и дает на него гарантию &lt;strong&gt; 5 лет!&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Аппараты сертифицированы в Системе ГОСТ Р. &lt;/p&gt;&lt;p&gt;Газовые котлы ™«Angara Lux» возможно устанавливать в закрытой системе отопления с применением циркуляционного насоса. Удобство монтажа котла обеспечивает возможность трехстороннего подключения к системе отопления.&lt;/p&gt;', 'index', 'Котлы ™«Angara Lux»', 1),
(3, '&lt;table class=&quot;table &quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n	&lt;td&gt;Название компании\r\n	&lt;/td&gt;\r\n	&lt;td&gt;Торговый Дом &quot;Гектор&quot;\r\n	&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n	&lt;td&gt;Телефон:\r\n	&lt;/td&gt;\r\n	&lt;td&gt;&lt;gisphone class=&quot;_gis-phone-highlight-wrap js_gis-phone-highlight-wrap-714e2d9830e6f7e4bc2a3ce3c3a4b110 _gis-phone-highlight-phone-wrap&quot; data-ph-parsed=&quot;true&quot;&gt;+7(8633)111-280&lt;/gisphone&gt;\r\n	&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n	&lt;td&gt;&lt;br&gt;\r\n	&lt;/td&gt;\r\n	&lt;td&gt;&lt;gisphone class=&quot;_gis-phone-highlight-wrap js_gis-phone-highlight-wrap-89d202364d2d161bcb7ccbfeb258bb21 _gis-phone-highlight-phone-wrap&quot; data-ph-parsed=&quot;true&quot;&gt;+7(8633)111-290&lt;/gisphone&gt;&lt;br&gt;\r\n	&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n	&lt;td&gt;Режим работы:\r\n	&lt;/td&gt;\r\n	&lt;td&gt;Пн.-Пт. 9:00 - 18:00\r\n	&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n	&lt;td&gt;&lt;br&gt;&lt;/td&gt;\r\n	&lt;td&gt;Сб.-Вс. Выходной&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n	&lt;td&gt;E-mail:\r\n	&lt;/td&gt;\r\n	&lt;td&gt;111280@td-gektor.ru\r\n	&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;&lt;p id=&quot;exampleContactsMap&quot;&gt;\r\n	&lt;iframe src=&quot;https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2710.048618077565!2d38.934239!3d47.215631!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e3fd37efeb5f81%3A0x66cf07c6b7d6fb85!2z0L_QtdGALiDQkdC40YDQttC10LLQvtC5INCh0L_Rg9GB0LosIDgsINCi0LDQs9Cw0L3RgNC-0LMsINCg0L7RgdGC0L7QstGB0LrQsNGPINC-0LHQuy4sIDM0NzkwMA!5e0!3m2!1sru!2sru!4v1435826113964&quot; width=&quot;100%&quot; height=&quot;500&quot; frameborder=&quot;0&quot; style=&quot;border:0&quot; allowfullscreen=&quot;&quot;&gt;\r\n	&lt;/iframe&gt;\r\n&lt;/p&gt;', 'contact', 'Контакты', 1),
(4, '&lt;p&gt;&lt;strong&gt;  ТД «Гектор» &lt;/strong&gt;это современная и динамично развивающаяся компания, которая сформировалась на основе нескольких организаций из разных регионов России, имеющих большой опыт работы в сфере оптовых продаж отопительного и водонагревательного оборудования.&lt;/p&gt;&lt;p&gt;Наша компания является официальным представительством котлов &lt;strong&gt;™ &quot;Ангара-Люкс&quot;&lt;/strong&gt;, которые производятся по программе импортозамещения в г. Таганроге.&lt;/p&gt;&lt;p&gt;Создаем взаимовыгодный бизнес с нашими партнерами по принципу честности и прозрачности. &lt;/p&gt;&lt;p&gt;&lt;strong&gt;Этому способствует следующие факторы:&lt;/strong&gt; &lt;/p&gt;&lt;ul&gt;&lt;li&gt;Уверенность партнеров в качестве нашей продукции и стабильный рост реализации поставляемого им товара. &lt;/li&gt;&lt;li&gt;&lt;strong&gt;ТД &quot;Гектор&quot;&lt;/strong&gt; постоянно расширяет территориальную область поставок, развивая собственную дилерскую сеть за счет продуманной маркетинговой политики и четкого контроля соблюдения рекомендуемой розничной цены на нашу продукцию.&lt;/li&gt;&lt;li&gt;Мы осуществляем оперативную и своевременную доставку товара, что обеспечивает наличие постоянного ассортимента у наших клиентов в независимости от сезона торговли.&lt;/li&gt;&lt;li&gt;Гарантийные и сервисные вопросы решаются в кротчайшие сроки без лишней бюрократии.&lt;/li&gt;&lt;li&gt;Весь ассортимент нашей продукции имеет все необходимые сертификаты и разрешительные документы&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;em&gt;&lt;strong&gt;_________________________________________________________________________________________________________________________________________&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;&lt;p style=&quot;margin-left: 20px;&quot;&gt;&lt;em&gt;Наши менеджеры всегда готовы ответить на Ваши вопросы&lt;br&gt;&lt;/em&gt;&lt;em&gt;по телефонам: +7&lt;gisphone&gt;(8633)111-280      +7&lt;/gisphone&gt;&lt;gisphone&gt;(8633)111-290&lt;/gisphone&gt;&lt;/em&gt;&lt;em&gt;&lt;br&gt;по эл. почте: info@td-gektor.ru&lt;br&gt;&lt;/em&gt;&lt;/p&gt;', 'about', 'О компании', 1),
(5, '&lt;p&gt;Мы внимательно и ответственно работаем с нашими клиентами, всегда рады новым партнерам и готовы к взаимовыгодному сотрудничеству!&lt;br&gt;&lt;/p&gt;&lt;p&gt;Доставка по Ростовской области бесплатная, в другие регионы -  по договоренности с нашими менеджерами. &lt;/p&gt;&lt;p&gt;Оплата за товар производится наличным и безналичным расчетом на банковский счет фирмы.&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Список сканов документов для заключения договора на оптовые поставки:&lt;/strong&gt;&lt;/p&gt;&lt;p&gt; &lt;u&gt;Юридические лица:&lt;/u&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;свидетельство о государственной регистрации юридического лица (ОГРН);&lt;/li&gt;&lt;li&gt;свидетельство о постановке на учет в налоговом органе (ИНН, КПП);&lt;/li&gt;&lt;li&gt;банковские реквизиты;&lt;/li&gt;&lt;li&gt;контактную информацию (адрес юридический и фактический, телефон, факс, e-mail, адрес сайта, розничного магазина, оптового склада).&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;u&gt;Индивидуальные предприниматели:&lt;/u&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;свидетельство о государственной регистрации индивидуального предпринимателя (ОГРН);&lt;/li&gt;&lt;li&gt;свидетельство о постановке на учет в налоговом органе (ИНН);&lt;/li&gt;&lt;li&gt;банковские реквизиты;&lt;/li&gt;&lt;li&gt;паспорт (первая страница и прописка);&lt;/li&gt;&lt;li&gt;контактную информацию (адрес юридический и фактический, телефон, факс, e-mail, адрес сайта, розничного магазина, оптового склада).&lt;/li&gt;&lt;/ul&gt;', 'delivery', 'Доставка и оплата', 1),
(6, '&lt;p&gt;&lt;strong&gt;Торговый Дом &quot;Гектор&quot;&lt;/strong&gt; заинтересован в расширении ассортимента, поэтому мы готовы рассмотреть Ваши предложения по сотрудничеству, но в связи со спецификой работы компании, предпочтение отдается компаниям-поставщикам которые готовы предложить:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Высокое качество поставляемого товара&lt;/li&gt;&lt;li&gt;Гибкую ценовую политику&lt;/li&gt;&lt;li&gt;Постоянное наличие товара на складе или оперативное производств&lt;/li&gt;&lt;li&gt;Минимальные сроки поставки&lt;/li&gt;&lt;li&gt;Эксклюзивность поставок по регионам России&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Присылайте Ваши предложения на эл.почту &lt;a href=&quot;mailto:111280@td-gektor.ru&quot;&gt;111280@td-gektor.ru&lt;/a&gt; и мы внимательно ознакомимся с ним. &lt;/p&gt;', 'suppliers', 'Поставщикам', 1),
(7, '&lt;p&gt;&lt;strong&gt;&lt;/strong&gt;\r\n&lt;/p&gt;&lt;strong&gt;ТД «Гектор»&lt;/strong&gt;, как надежный и проверенный поставщик, всегда нацелен на продуктивное развитие, поэтому для нас важен каждый клиент. &lt;br&gt;Мы сотрудничаем с розничными и оптовыми организациями. У нас большой опыт в продвижении новых брендов на российский рынок отопительной техники, и этим опытом мы делимся с нашими партнерами.А сейчас это стало наиболее актуальным в связи со сложившейся экономической ситуацией.\r\n&lt;p&gt;&lt;br&gt;&lt;br&gt;А так же нашим партнерам мы всегда готовы предоставить: &lt;br&gt;\r\n&lt;/p&gt;\r\n&lt;ul&gt;\r\n	&lt;li&gt;Индивидуальные условия сотрудничества; &lt;/li&gt;\r\n	&lt;li&gt;Оперативную доставку в любой регион России; &lt;/li&gt;\r\n	&lt;li&gt;Рекламную поддержку; &lt;/li&gt;\r\n	&lt;li&gt;Быстрое решение гарантийных и сервисных вопросов; &lt;/li&gt;\r\n	&lt;li&gt;Бесплатное обучение Ваших продавцов по нашему ассортименту.&lt;/li&gt;\r\n&lt;/ul&gt;', 'partners', 'Партнерам', 1),
(8, '&lt;p&gt;Условия гарантииУсловия гарантии&lt;span class=&quot;redactor-invisible-space&quot;&gt;Условия гарантии&lt;span class=&quot;redactor-invisible-space&quot;&gt;Условия гарантии&lt;span class=&quot;redactor-invisible-space&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 'guarantee', 'Условия гарантии', 1),
(9, '&lt;p&gt;Сервисное обслуживаниеСервисное обслуживание&lt;span class=&quot;redactor-invisible-space&quot;&gt;Сервисное обслуживание&lt;span class=&quot;redactor-invisible-space&quot;&gt;Сервисное обслуживание&lt;span class=&quot;redactor-invisible-space&quot;&gt;Сервисное обслуживание&lt;span class=&quot;redactor-invisible-space&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 'service', 'Сервисное обслуживание', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_properties`
--
ALTER TABLE `product_properties`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product_properties`
--
ALTER TABLE `product_properties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;