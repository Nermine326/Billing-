-- phpMyAdmin SQL Dump
-- version 4.8.3-pl4
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 25, 20018 at 08:02 AM
-- Server version: 4.1.22
-- PHP Version: 7.2.12
-- 
-- Database: `nermine-facture`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `client`
-- 

CREATE TABLE `client` (
  `ID` int(11) NOT NULL auto_increment,
  `TVA-C` varchar(60) default NULL,
  `nom` varchar(60) NOT NULL default '',
  `adresse1` varchar(60) NOT NULL default '',
  `adresse2` varchar(60) NOT NULL default '',
  `telephone` varchar(60) NOT NULL default '',
  `mail` varchar(60) default NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=5 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `fournisseur`
-- 

CREATE TABLE `fournisseur` (
  `ID` int(11) NOT NULL auto_increment,
  `fournisseur` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=4 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `fromage`
-- 

CREATE TABLE `fromage` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(60) NOT NULL default '',
  `prix` decimal(5,2) NOT NULL default '0.00',
  `TVA` tinyint(4) NOT NULL default '0',
  `fournisseur` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=10 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `historique`
-- 

CREATE TABLE `historique` (
  `ID` int(11) NOT NULL auto_increment,
  `numero` varchar(60) NOT NULL default '',
  `montant` varchar(60) NOT NULL default '',
  `client` int(11) NOT NULL default '0',
  `paye` smallint(6) NOT NULL default '0',
  `type` varchar(60) NOT NULL default '',
  `date` varchar(60) NOT NULL default '',
  `annee` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=36 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ventes`
-- 

CREATE TABLE `ventes` (
  `ID` int(20) NOT NULL auto_increment,
  `date` varchar(60) NOT NULL default '',
  `montant6` decimal(5,2) NOT NULL default '0.00',
  `montant21` decimal(5,2) NOT NULL default '0.00',
  `trimestre` tinyint(4) NOT NULL default '0',
  `annee` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
