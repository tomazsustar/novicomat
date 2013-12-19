-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 19. dec 2013 ob 13.09
-- Različica strežnika: 5.6.12
-- Različica PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Struktura tabele `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_izvoz`
--

CREATE TABLE IF NOT EXISTS `vs_izvoz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `je_clanek` tinyint(1) NOT NULL,
  `je_dogodek` tinyint(1) NOT NULL,
  `id_clanka_izvoz` int(11) DEFAULT NULL,
  `id_dogodka_izvoz` int(11) DEFAULT NULL,
  `id_vsebine` int(11) NOT NULL,
  `cilj` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_koledar`
--

CREATE TABLE IF NOT EXISTS `vs_koledar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` text NOT NULL,
  `id_vsebine` int(11) NOT NULL,
  `zacetek` datetime DEFAULT NULL,
  `konec` datetime DEFAULT NULL,
  `lokacija` text NOT NULL,
  `id_lokacija` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=272 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_lokacije`
--

CREATE TABLE IF NOT EXISTS `vs_lokacije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(256) NOT NULL,
  `ulica` varchar(256) NOT NULL,
  `h_st` varchar(8) NOT NULL,
  `postna_st` varchar(8) NOT NULL,
  `posta` varchar(256) NOT NULL,
  `dod_naslov` text NOT NULL,
  `drzava` varchar(265) NOT NULL,
  `id_vsebine` int(11) DEFAULT NULL,
  `kontakt` text NOT NULL,
  `location` point DEFAULT NULL,
  `id_stars` int(11) NOT NULL,
  `rezervacije` tinyint(1) NOT NULL,
  `izbira` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vsebine` (`id_vsebine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_portali`
--

CREATE TABLE IF NOT EXISTS `vs_portali` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domena` varchar(128) NOT NULL,
  `tag` varchar(128) NOT NULL,
  `tip` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_portali_vsebine`
--

CREATE TABLE IF NOT EXISTS `vs_portali_vsebine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_portala` int(11) NOT NULL,
  `id_vsebine` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=164 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_slike`
--

CREATE TABLE IF NOT EXISTS `vs_slike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `url2` text NOT NULL,
  `opis` text NOT NULL,
  `title` varchar(256) NOT NULL,
  `avtor` varchar(256) NOT NULL,
  `datum` datetime DEFAULT NULL,
  `tags` text NOT NULL,
  `pot` text NOT NULL,
  `ime_slike` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=380 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_slike_vsebine`
--

CREATE TABLE IF NOT EXISTS `vs_slike_vsebine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_slike` int(11) NOT NULL,
  `id_vsebine` int(11) NOT NULL,
  `mesto_prikaza` int(11) NOT NULL,
  `zp_st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=768 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_strani`
--

CREATE TABLE IF NOT EXISTS `vs_strani` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` tinytext NOT NULL,
  `state` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `urnik` int(11) NOT NULL,
  `porocilo` tinytext NOT NULL,
  `naslov` text NOT NULL,
  `vir_text` text NOT NULL,
  `author_alias` varchar(256) DEFAULT NULL,
  `tags` text,
  `sectionid` int(11) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `event_cat` int(11) DEFAULT NULL,
  `parser` varchar(32) NOT NULL,
  `home_url` varchar(64) NOT NULL,
  `last_update_hash` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Odloži podatke za tabelo `vs_strani`
--

INSERT INTO `vs_strani` (`id`, `url`, `state`, `last_update`, `urnik`, `porocilo`, `naslov`, `vir_text`, `author_alias`, `tags`, `sectionid`, `catid`, `event_cat`, `parser`, `home_url`, `last_update_hash`) VALUES

(1, 'http://www.trubarjevi-kraji.si/index.php/component/content/category/1-novice.html?format=feed', 1, '2013-12-05 10:02:22', 0, '10 pregledanih\n10 ze obstojecih\n0 uvozenih\n0 napak\n\n', 'Trubarjevi kraji', 'Trubarjevi kraji', '', 'Turjak, prireditve', 1, 1, 34, 'TrubKrajiParser.php', 'http://www.trubarjevi-kraji.si', ''),
(2, 'http://www.dobrepolje.si/aktualno/prireditve-in-dogodki?format=feed', 0, '2012-01-24 17:22:53', 0, '10 pregledanih\n0 ze obstojecih\n10 uvozenih\n0 napak\n\n', 'Občina Dobrepolje', 'Občina Dobrepolje', '', '', NULL, NULL, NULL, 'RssParser.php', 'http://www.dobrepolje.si', ''),
(3, 'http://www.drevored.si/feed/', 1, '2013-12-05 10:02:23', 0, '0 pregledanih\n0 ze obstojecih\n0 uvozenih\n0 napak\nStran se ni spremenila\n', 'drevored.si', 'drevored.si', '', '', NULL, NULL, NULL, 'RssParser.php', 'http://www.drevored.si', 'a3ff36bf9051eed3239c36a4bca31170'),
(4, 'http://www.zelenival.com/index.php?option=com_content&view=category&layout=blog&id=2&Itemid=7&format=feed', 0, '2013-06-08 00:52:19', 0, '10 pregledanih\n10 ze obstojecih\n0 uvozenih\n0 napak\n\n', 'Zeleni val', 'Radio Zeleni val', '', '', NULL, NULL, NULL, 'ZeleniValParser.php', 'http://www.zelenival.com', '86a982aa1effe9b5b52525bc3f486ada'),
(5, 'http://zavod-parnas.org', 1, '2013-12-05 10:02:34', 0, '11 pregledanih\n11 ze obstojecih\n0 uvozenih\n0 napak\n\n', 'Parnas', 'Parnas', '', '', NULL, NULL, NULL, 'ParnasParser.php', 'http://zavod-parnas.org', 'fd94d9d12ee3211d83083218fd89e3ad'),
(6, 'http://www.sd-kompolje.si/', 0, '2012-12-17 20:47:20', 0, '12 pregledanih\n0 ze obstojecih\n11 uvozenih\n0 napak\n\n', 'ŠD Kompolje', 'ŠD Kompolje', '', 'šport, Kompolje', NULL, NULL, NULL, 'SDKompoljeParser.php', 'http://www.sd-kompolje.si/', '42b4eb780d8c5a5df978f63012cda4e3'),
(7, 'http://www.sd-dobrepolje.si/', 1, '2013-12-05 10:02:35', 0, '0 pregledanih\n0 ze obstojecih\n0 uvozenih\n0 napak\nStran se ni spremenila\n', 'ŠD Dobrepolje', 'ŠD Dobrepolje', '', '', NULL, NULL, NULL, 'SDDobrepoljeParser.php', 'http://www.sd-dobrepolje.si/', 'f40ef407dd15981a4a9d4cecda34e82e'),
(8, 'http://www.kultura-ustvarjanje.si/domov.html', 0, '2012-02-01 00:27:40', 0, '7 pregledanih\n6 ze obstojecih\n1 uvozenih\n0 napak\n\n', 'JSKD', 'JSKD Ivančna Gorica', '', '', NULL, NULL, NULL, 'JSKDParser.php', 'http://www.kultura-ustvarjanje.si', ''),
(9, 'http://www.pgd-zdenskavas.si/', 1, '2013-12-05 10:02:38', 0, '0 pregledanih\n0 ze obstojecih\n0 uvozenih\n0 napak\nStran se ni spremenila\n', 'PGD Zdenska vas', 'PGD Zdenska vas', '', '', NULL, NULL, NULL, 'PGDZdenskaVasParser.php', 'http://www.pgd-zdenskavas.si', '51c2a22b3a15bcf71eb032f4ade8b168'),
(10, 'http://www.osdobrepolje.si/?format=feed', 0, '2012-03-01 22:05:24', 0, '10 pregledanih\n0 ze obstojecih\n10 uvozenih\n0 napak\n\n', 'OŠ Dobrepolje', 'OŠ Dobrepolje', '', '', 1, 1, NULL, 'OSDobrepoljeParser.php', 'http://www.osdobrepolje.si/', 'fabfe4d8655a04b0c90585b3162a39df'),
(11, 'http://www.silcportal.si/feed/', 0, '2013-05-20 20:38:43', 0, '30 pregledanih\n0 ze obstojecih\n30 uvozenih\n0 napak\n\n', 'Šilc', 'Šilc portal', '', '', NULL, NULL, NULL, 'SilcRssParser.php', 'http://www.silcportal.si/', '951350cb8dd8b16382d4831100117925'),
(12, 'http://www.google.com/calendar/ical/jaklicev.dom%40gmail.com/public/basic.ics', 1, '2013-12-05 10:02:43', 0, '237 pregledanih\n237 ze obstojecih\n0 uvozenih\n0 napak\n\n', 'Jakličev - dom', 'Jakličev dom', '', '', NULL, NULL, NULL, 'ICalParser.php', 'http://www.google.com/calendar/ical/jaklicev.dom%40gmail.com/pub', ''),
(13, 'http://www.trubarjevi-kraji.si/index.php/component/eventlist/eventlist.ical', 1, '2013-12-05 10:02:43', 0, '0 pregledanih\n0 ze obstojecih\n0 uvozenih\n0 napak\n\n', 'Dogodki - Trubarjevi kraji', 'Trubarjevi Kraji', '', 'Velike Lašče', NULL, NULL, NULL, 'TrubarjeviKrajiICalParser.php', 'http://www.trubarjevi-kraji.si/', '');

-- --------------------------------------------------------

--
-- Struktura tabele `vs_tags`
--

CREATE TABLE IF NOT EXISTS `vs_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `tag` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_tags_vsebina`
--

CREATE TABLE IF NOT EXISTS `vs_tags_vsebina` (
  `id_tag` int(11) NOT NULL,
  `id_vsebine` int(11) NOT NULL,
  `tip_vsebine` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_tipi_strani`
--

CREATE TABLE IF NOT EXISTS `vs_tipi_strani` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opis` text NOT NULL,
  `parser` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_vsebine`
--

CREATE TABLE IF NOT EXISTS `vs_vsebine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `title_url` text NOT NULL,
  `introtext` text NOT NULL,
  `fulltext` text NOT NULL,
  `state` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `author` varchar(256) NOT NULL,
  `author_alias` varchar(265) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `imported` datetime NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `edited_by` int(11) NOT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `tags` text NOT NULL,
  `site_id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `import_checksum` varchar(32) NOT NULL,
  `original_changed` int(11) NOT NULL,
  `export_checksum` int(32) NOT NULL,
  `global_id` text NOT NULL,
  `params` text NOT NULL,
  `vir_url` text NOT NULL,
  `event_cat` int(11) NOT NULL,
  `frontpage` tinyint(1) NOT NULL,
  `lokacija` text NOT NULL,
  `koledar` tinyint(1) NOT NULL,
  `koledar_naslov` text,
  `slika` text NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=579 ;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omejitve za tabelo `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Dodano polje na portale 18.12.2012

ALTER TABLE `vs_portali` ADD `mejli` VARCHAR( 127 ) NOT NULL AFTER `tip` ;
