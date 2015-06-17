-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.0.19-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for nogab
DROP DATABASE IF EXISTS `nogab`;
CREATE DATABASE IF NOT EXISTS `nogab` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nogab`;


-- Dumping structure for table nogab.dictionary
DROP TABLE IF EXISTS `dictionary`;
CREATE TABLE IF NOT EXISTS `dictionary` (
  `id` int(11) NOT NULL,
  `word` varchar(255) NOT NULL,
  `lang` varchar(3) NOT NULL,
  `theme_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `word` (`word`),
  KEY `lang` (`lang`),
  KEY `theme_id` (`theme_id`),
  CONSTRAINT `dictionary_lang_fk` FOREIGN KEY (`lang`) REFERENCES `langs` (`iso`),
  CONSTRAINT `dictionary_word_theme_id_fk` FOREIGN KEY (`theme_id`) REFERENCES `dictionary_themes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nogab.dictionary: ~0 rows (approximately)
DELETE FROM `dictionary`;
/*!40000 ALTER TABLE `dictionary` DISABLE KEYS */;
/*!40000 ALTER TABLE `dictionary` ENABLE KEYS */;


-- Dumping structure for table nogab.dictionary_themes
DROP TABLE IF EXISTS `dictionary_themes`;
CREATE TABLE IF NOT EXISTS `dictionary_themes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nogab.dictionary_themes: ~0 rows (approximately)
DELETE FROM `dictionary_themes`;
/*!40000 ALTER TABLE `dictionary_themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `dictionary_themes` ENABLE KEYS */;


-- Dumping structure for table nogab.langs
DROP TABLE IF EXISTS `langs`;
CREATE TABLE IF NOT EXISTS `langs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `iso` (`iso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table nogab.langs: ~3 rows (approximately)
DELETE FROM `langs`;
/*!40000 ALTER TABLE `langs` DISABLE KEYS */;
INSERT INTO `langs` (`id`, `name`, `iso`) VALUES
	(1, 'Russian', 'ru');
INSERT INTO `langs` (`id`, `name`, `iso`) VALUES
	(2, 'English', 'en');
INSERT INTO `langs` (`id`, `name`, `iso`) VALUES
	(3, 'French', 'fr');
/*!40000 ALTER TABLE `langs` ENABLE KEYS */;


-- Dumping structure for table nogab.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `lang` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_name_idx` (`name`),
  KEY `page_title_idx` (`title`),
  KEY `page_lang_idx` (`lang`) USING BTREE,
  CONSTRAINT `pages_langs_fk` FOREIGN KEY (`lang`) REFERENCES `langs` (`iso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table nogab.pages: ~0 rows (approximately)
DELETE FROM `pages`;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `name`, `title`, `content`, `is_main`, `lang`) VALUES
	(1, 'main', 'Know Gabon', '<!-- Three columns of text below the carousel -->\r\n<div class="row">\r\n    <div class="col-md-3 text-center">\r\n        <img class="img-circle" src="/assets/img/1.png" width="140" height="140">\r\n        <h4>Что мы знаем о Габоне?</h4>\r\n        <p><a class="btn btn-default" href="#what-we-know">Читать далее »</a></p>\r\n    </div>\r\n    <div class="col-md-3 text-center">\r\n        <img class="img-circle" src="/assets/img/gabon.gif" width="140" height="140">\r\n        <h4>Гавань мира.</h4>\r\n        <p><a class="btn btn-default" href="#eldorado">Читать далее »</a></p>\r\n    </div>\r\n    <div class="col-md-3 text-center">\r\n        <img class="img-circle" src="/assets/img/bongo.jpg" width="140" height="140">\r\n        <h4>Президент и его партия.</h4>\r\n        <p><a class="btn btn-default" href="#president">Читать далее »</a></p>\r\n    </div>\r\n    <div class="col-md-3 text-center">\r\n        <img class="img-circle" src="/assets/img/flag.png" width="140" height="140">\r\n        <h4>Экономика</span>.</h4>\r\n        <p><a class="btn btn-default" href="#oil-and-money">Читать далее »</a></p>\r\n    </div>\r\n</div><!-- /.row -->\r\n\r\n\r\n<!-- START THE FEATURETTES -->\r\n\r\n<hr class="featurette-divider">\r\n\r\n<div class="featurette" id="what-we-know">\r\n    <img class="featurette-image img-circle pull-right" src="/assets/img/1.png">\r\n    <h2 class="featurette-heading">Что мы <span class="text-muted">знаем о Габоне?</span></h2>\r\n    <p class="lead">О Габоне мы знаем, пожалуй, меньше, чем о любой другой африканской стране. А то, что знаем, не всегда достоверно. Известно, к примеру, что население в Габоне -- самое малочисленное в Тропической Африке. Но точная цифра остается загадкой даже для скрупулезных экспертов ООН. Она колеблется в значительных пределах -- от 800 000 до 1 400 000 жителей.</p>\r\n    <p class="lead">Такой разброс связан с двумя причинами. Во-первых, в Габоне работает много иностранцев -- до одной пятой всего населения. Одни из них находятся здесь официально -- преподаватели, врачи, квалифицированные рабочие. Но много больше нелегалов, от которых, как считают местные жители, все беды. "Конечно, габонцы тоже не такие белые, как снег, -- самокритично признают они. -- Но кража автомобилей, разбой, терроризм -- дело рук пришлого люда". Во-вторых, в непроходимых лесах Габона, занимающих три четверти территории, обитают пигмеи и другие племена, которые не терпят чужаков и никогда не позволят себя пересчитывать.</p>\r\n    <p class="lead">Помню как-то, находясь на севере, мы заехали в лес. И вдруг маленькие люди, ростом не выше 130 сантиметров, обступили меня и моего спутника-габонца, удивляясь виду белой женщины. Впрочем, их любопытство было вполне дружелюбно, кто-то предложил мне какие-то неведомые плоды. Замечу, что пигмеи, живущие охотой и собирательством, считаются искусными врачевателями, поскольку рецепты заимствуют у природы. Но стоило зашуметь двигателю сопровождавшей нас машины, как вся эта шустрая компания немедленно испарилась. Больше мне с пигмеями за два года работы в Габоне встречаться не доводилось.</p>\r\n</div>\r\n\r\n<hr class="featurette-divider">\r\n\r\n<div class="featurette" id="eldorado">\r\n    <img class="featurette-image img-circle pull-left" src="/assets/img/gabon.gif">\r\n    <h2 class="featurette-heading">"Эльдорадо", <span class="text-muted">"эмират Центральной Африки"</span>, "гавань мира".</h2>\r\n    <p class="lead">На фоне соседей -- Республики Конго, Камеруна и Экваториальной Гвинеи -- Габон, обретший независимость в 1960 году, до последнего времени считался страной преуспевающей, европеизированной. Его долго именовали не иначе как "Эльдорадо", "эмират Центральной Африки", "гавань мира". В этом немалая заслуга 67-летнего президента Эль Хаджа Омара Бонго, который год назад побывал в нашей стране с официальным визитом. 34 года, проведенных на высоком посту, сделали его старейшиной среди лидеров африканских стран.</p>\r\n    <p class="lead">Когда ходишь по улицам габонской столицы Либревиля (в переводе -- "свободный город"), не верится, что находишься в Африке. Ультрасовременные здания банков, отелей, магазинов с приветливым названием "Мболо" ("Здравствйте" на языке фанг), дорогие автомобили словно вырвали пятачок земли у девственного леса и поставили его в один ряд с европейскими столицами. Кстати, Либревиль считается одним из самых дорогих городов мира -- сразу после Токио, Осака-Кобе и Гонконга.</p>\r\n</div>\r\n\r\n<hr class="featurette-divider">\r\n\r\n<div class="featurette" id="president">\r\n    <img class="featurette-image img-circle pull-right" src="/assets/img/bongo.jpg">\r\n    <h2 class="featurette-heading">Президент и его партия. <span class="text-muted">Идиллия с африканской спецификой.</span></h2>\r\n\r\n    <p class="lead">Президент и его партия прдолжали уверенно побеждать соперников и после введения в стране в 1990\r\n        году многопартийности. Одно из слагаемых успеха -- то, что Бонго никогда не подвергал Габон социалистическим\r\n        экспериментам, захлестнувшим в свое время Африку. Власть остается предсказуемой, что делает страну\r\n        привлекательной для бизнеса. Уровень доходов на душу населения по официальной статистике превышает 4000 долларов\r\n        -- вчетверо больше, чем в большинстве африканских стран.</p>\r\n\r\n    <p class="lead">В общем, идиллия с африканской спецификой! Однако многие экономисты считают, что ныне страна\r\n        переживает социальный и экономический кризис. Как ни парадоксально, во многом это объясняется сверхприбылями от\r\n        продажа нефти, которая у габонцев в буквальном смысле под ногами. Еще до Второй мировой войны в прибрежной зоне\r\n        стали замечать маслянистые разводы, просачивание битума, отложения асфальта. Но поиски нефти велись робко,\r\n        поскольку в это чудо никто по-настоящему не верил.</p>\r\n</div>\r\n\r\n<hr class="featurette-divider">\r\n\r\n\r\n<div class="featurette" id="oil-and-money">\r\n    <img class="featurette-image img-circle pull-left" src="/assets/img/flag.png">\r\n    <h2 class="featurette-heading">Глубокие <span class="text-muted">экономическим преобразования</span>.</h2>\r\n\r\n    <p class="lead">Перелом наступил в 1956 году, когда на шельфе неподалеку от города Порт-Жантиль забил первый\r\n        нефтяной фонтан. Вскоре фирма "Сосьете де петроль д\'Африк Экваториаль" установила уже десятки платформ на\r\n        шельфовых месторождениях с экзотическими названиями: Электрический Скат, Северо-восточный Угорь, Морская\r\n        Тригла.</p>\r\n\r\n    <p class="lead">До независимости Габон мало пользовался своими природными ресурсами и не был готов к глубоким\r\n        экономическим преобразованиям.</p>\r\n\r\n    <p class="lead">Возможно, страна слишком широко распахнула двери для иностранных компаний. Нефтяные монстры типа\r\n        "Эльф" или "Шелл" заняли ключевые позиции в ее экономике. Условия вроде бы были выгодными, но со временем стало\r\n        очевидно, что западные фирмы превратили страну в "дойную корову". Однако менять экономический курс было сложно\r\n        чисто психологически: в государственный бюджет стекались значительные поступления от экспорта нефти, и это\r\n        породило эйфорию.</p>\r\n\r\n    <p class="lead">Сегодня Габон добывает 18 миллионов тонн нефти в год. Однако запасы известных месторождений подходят к концу, а новые пока не найдены. Геологи утверждают, что, если не будут открыты новые крупные месторождения, нефть иссякнет уже во втором десятилетии XXI века. Исчезают и другие полезные ископаемые. Последнее эксплуатируемое месторождение урана в районе Минкулугу уже закрыто, а уранодобывающая фирма "Комюф" прекратила свою деятельность. Иностранные инвесторы, сознавая тяжесть положения, уже "не толпятся у изголовья больного", как прежде. Финансовая помощь Габону, как и другим африканским странам, значительно сокращена.</p>\r\n    <p class="lead">Сегодня под агрокомплексом занят всего 1 процент габонской земли, а потребности города в сельхозпродуктах удовлетворяются лишь на 10--15 процентов. Десятая часть площадей отведена под маниоку, главную продовольственную культуру. Корнеплод весом под 4 килограмма сушат и толкут, а из полученной муки варят густую кашу, пекут хлеб. Но избалованным габонцам уже недостаточно этой примитивной пищи. Значительная часть продуктов импортируется, в основном -- из Франции.</p>\r\n</div>\r\n\r\n<hr class="featurette-divider">\r\n\r\n<!-- /END THE FEATURETTES -->', 1, 'ru');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table nogab.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table nogab.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `password`) VALUES
	(1, 'administrator', 'dd942e3b9a3e111deeecdacf21dfc3eb');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table nogab.word_relations
DROP TABLE IF EXISTS `word_relations`;
CREATE TABLE IF NOT EXISTS `word_relations` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `translation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `translation_id` (`translation_id`),
  KEY `word_id` (`word_id`),
  CONSTRAINT `dictionary_translation_id_fk` FOREIGN KEY (`translation_id`) REFERENCES `dictionary` (`id`),
  CONSTRAINT `dictionary_word_id_fk` FOREIGN KEY (`word_id`) REFERENCES `dictionary` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nogab.word_relations: ~0 rows (approximately)
DELETE FROM `word_relations`;
/*!40000 ALTER TABLE `word_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `word_relations` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
