-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 24 maj 2013 ob 20.17
-- Različica strežnika: 5.5.16
-- Različica PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `nize01_zelnik`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=167 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Struktura tabele `vs_tags`
--

CREATE TABLE IF NOT EXISTS `vs_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `tag` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

ALTER TABLE  `vs_vsebine` ADD  `created_by` INT NOT NULL AFTER  `created`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
