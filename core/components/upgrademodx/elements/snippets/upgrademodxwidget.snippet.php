<?php
/**
 * UpgradeMODXWidget snippet for UpgradeMODX extra
 *
 * Copyright 2015-2018 Bob Ray <https://bobsguides.com>
 * Created on 08-16-2015
 *
 * UpgradeMODX is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * UpgradeMODX is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * UpgradeMODX; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package upgrademodx
 */

/**
 * Description
 * -----------
 * UpgradeMODX Dashboard widget
 * This package was inspired by the work of a number of people and I have borrowed some of their code.
 * Dmytro Lukianenko (dmi3yy) is the original author of the MODX install script. Susan Sottwell, Sharapov,
 * Bumkaka, Inreti, Zaigham Rana, frischnetz, and AgelxNash, also contributed and I'd like to thank all
 * of them for laying the groundwork.
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package upgrademodx
 **/

/* Properties

 * @property &groups textfield -- group, or commma-separated list of groups, who will see the widget; Default: (empty)..
 * @property &hideWhenNoUpgrade combo-boolean -- Hide widget when no upgrade is available; Default: No.
 * @property &interval textfield -- Interval between checks -- Examples: 1 week, 3 days, 6 hours; Default: 1 week.
 * @property &language textfield -- Two-letter code of language to user; Default: en.
 * @property &lastCheck textfield -- Date and time of last check -- set automatically; Default: (empty)..
 * @property &latestVersion textfield -- Latest version (at last check) -- set automatically; Default: (empty)..
 * @property &plOnly combo-boolean -- Show only pl (stable) versions; Default: yes.
 * @property &versionsToShow textfield -- Number of versions to show in upgrade form (not widget); Default: 5.

 */

/** recursive remove dir function.
 *  Removes a directory and all its children */

if (! function_exists('rrmdir')) {
    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir") {
                        $prefix = substr($object, 0, 4);
                        $this->rrmdir($dir . "/" . $object);
                    } else {
                        $prefix = substr($object, 0, 4);
                        if ($prefix != '.git' && $prefix != '.svn') {
                            @unlink($dir . "/" . $object);
                        }
                    }
                }
            }
            reset($objects);
            $success = @rmdir($dir);
        }
    }
}

function render() {
    // xxx
}

if (php_sapi_name() === 'cli') {
    /* This section for debugging during development. It won't execute in MODX */
/*    include 'C:\xampp\htdocs\addons\assets\mycomponents\instantiatemodx\instantiatemodx.php';
    $snippet =
    $scriptProperties = array(
        'versionsToShow' => 5,
        'hideWhenNoUpgrade' => false,
        'lastCheck' => '',
        'interval' => '+60 seconds',
        'plOnly' => false,
        'language' => 'en',
        'forcePclZip' => false,
        'forceFopen' => false,
        'currentVersion' => $modx->getOption('settings_version'),
        'latestVersion' => '2.4.3-pl',
        'githubTimeout' => 6,
        'modxTimeout' => 6,
        'tries' => 2,
    );*/

}

/* Initialize */
/* This will execute when in MODX */
$language = $modx->getOption('language', $scriptProperties, 'en', true);
$props = $scriptProperties;
$modx->lexicon->load($language . ':upgrademodx:default');
/* Return empty string if user shouldn't see widget */
$devMode = $modx->getOption('ugm.devMode',  null, false, true);
$groups = $modx->getOption('groups', $scriptProperties, 'Administrator', true);
if (strpos($groups, ',') !== false) {
    $groups = explode(',', $groups);
}
if (! $modx->user->isMember($groups)) {
    return '';
}

$corePath = $modx->getOption('ugm.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/upgrademodx/');
$assetsUrl = $modx->getOption('ugm.assets_url', null, $modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/upgrademodx/');
//$modx->log(modx::LOG_LEVEL_ERROR, "Assets URL: " . $assetsUrl);
require_once($corePath . 'model/upgrademodx/upgrademodx.class.php');
$upgrade = new UpgradeMODX($modx);
$upgrade->init($props);
$modx->regClientStartupScript('<script>var ugmConnectorUrl = "' . $assetsUrl . 'connector.php";</script>');
$modx->regClientCSS($assetsUrl . 'css/progress.css');
$modx->regClientStartupScript("//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js");
$modx->regClientStartupScript($assetsUrl . 'js/modernizr.custom.js');
/* Set the method */

$method = $upgrade->getMethod();
if ($method === null) {
    $upgrade->setError($modx->lexicon('ugm_no_curl_no_fopen'));
}

$lastCheck = $modx->getOption('lastCheck', $props, '2015-08-17 00:00:004', true);
$interval = $modx->getOption('interval', $props, '+1 day', true);
$hideWhenNoUpgrade = $modx->getOption('hideWhenNoUpgrade', $props, false, true);
$plOnly = $modx->getOption('plOnly', $props);
$versionsToShow = $modx->getOption('versionsToShow', $props, 5);
$currentVersion = $modx->getOption('settings_version');
$latestVersion = $modx->getOption('latestVersion', $props, '', true);

/* Set Placeholders */
$placeholders = array();
$placeholders['[[+ugm_assets_url]]'] = $assetsUrl;
$placeholders['[[+ugm_current_version]]'] = $currentVersion;
$placeholders['[[+ugm_latest_version]]'] = $latestVersion;
$placeholders['[[+ugm_current_version_caption]]'] = $modx->lexicon('ugm_current_version_caption');
$placeholders['[[+ugm_latest_version_caption]]'] = $modx->lexicon('ugm_latest_version_caption');

$versionListExists = true; // ToDo: remove this later


/* ToDo: Move this to prepare setup processor */
    /* Log out all users before launching the setup */
    if (false) { //(if (! $devModx)) {
        $sessionTable = $modx->getTableName('modSession');
        if ($modx->query("TRUNCATE TABLE {$sessionTable}") == false) {
            $flushed = false;
        } else {
            // $modx->user->endSession();
        }
    }

$fullVersionList = array();
$timeToCheck = $upgrade->timeToCheck($lastCheck, $interval);

/* Perform check if no latestVersion, or if it's time to check */
if ((!$versionListExists ) || $timeToCheck || empty($latestVersion) || true) {
    $upgradeAvailable = $upgrade->upgradeAvailable($currentVersion, $plOnly, $versionsToShow, $method);
    $latestVersion = $upgrade->getLatestVersion();
    $fullVersionList = $upgrade->versionArray;
} else {
    $upgradeAvailable = version_compare($currentVersion, $latestVersion) < 0;;
}

if ($devMode) {
    $upgradeAvailable = true;
}

$errors = $upgrade->getErrors();

if (!empty($errors)) {
    $msg = '';
    foreach ($errors as $error) {
        $msg .= '<br/><span style="color:red">' . $modx->lexicon('ugm_error') .
            ': ' . $error . '</span>';
    }

    /* ToDo: Move this to prepare setup processor */
    /* attempt to delete any files created */
    rrmdir(MODX_BASE_PATH . 'ugmtemp');

    if (file_exists(MODX_BASE_PATH . 'modx.zip')) {
        @unlink(MODX_BASE_PATH . 'modx.zip');
    }
    if (file_exists(MODX_BASE_PATH . 'upgrade.php')) {
        @unlink(MODX_BASE_PATH . 'upgrade.php');
    }

    return $msg;
}

/* Process */

/* See if there's a new version and if it's downloadable */
if ($upgradeAvailable) {
    $placeholders['[[+ugm_notice]]'] = $modx->lexicon('ugm_upgrade_available');
    $placeholders['[[+ugm_notice_color]]'] = 'green';
    $placeholders['[[+ugm_version_form]]'] = $upgrade->createVersionForm($modx, $corePath, $method);
} else {
    if ($hideWhenNoUpgrade) {
        return '';
    } else {
        $placeholders['[[+ugm_notice]]'] = $modx->lexicon('ugm_modx_up_to_date');
        $placeholders['[[+ugm_notice_color]]'] = 'gray';
    }
}
/* Get Tpl */
$tpl = $modx->getChunk('UpgradeMODXTpl');

/* Do the replacements */
$tpl = str_replace(array_keys($placeholders), array_values($placeholders), $tpl);

/*if (php_sapi_name() === 'cli') {
    echo $tpl;
}*/

return $tpl;