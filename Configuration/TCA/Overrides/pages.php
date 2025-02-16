<?php

defined('TYPO3') or die();

$typo3Version = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class)->getMajorVersion();

// Override news icon
$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = $typo3Version < 12 ? [
    0 => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:news-folder',
    1 => 'news',
    2 => 'apps-pagetree-folder-contains-news',
] : [
    'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:news-folder',
    'value' => 'news',
    'icon' => 'apps-pagetree-folder-contains-news',
];
$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = $typo3Version < 12 ? [
    0 => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:news-page',
    1 => 'newsplugins',
    2 => 'apps-pagetree-page-contains-news',
] : [
    'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:news-page',
    'value' => 'newsplugins',
    'icon' => 'apps-pagetree-page-contains-news',
];
$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes']['contains-newsplugins'] = 'apps-pagetree-page-contains-news';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'news',
    'Configuration/TSconfig/Page/news_only.tsconfig',
    'EXT:news :: Restrict pages to news records'
);
