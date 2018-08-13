<?php
/**
 * en default topic lexicon file for UpgradeMODX extra
 *
 * Copyright 2015-2018 Bob Ray <https://bobsguides.com>
 * Created on 08-13-2015
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
 * en default topic lexicon strings
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package upgrademodx
 **/

$_lang['package'] = 'UpgradeModx';

/* Used in upgrademodxwidget.snippet.php */
$_lang['ugm_current_version_caption'] = 'Current Version';
$_lang['ugm_latest_version_caption'] = 'Latest Version';
$_lang['ugm_no_version_list'] = 'Could not get version list';
$_lang['ugm_could_not_open'] = 'Could not open';
$_lang['ugm_for_writing'] = 'for writing';
$_lang['ugm_upgrade_available'] = 'Upgrade Available';
$_lang['ugm_modx_up_to_date'] = 'MODX is up to date';
$_lang['ugm_error'] = 'Error';
$_lang['ugm_logout_note'] = 'Note: All users will be logged out';
$_lang['ugm_upgrade_modx'] = 'Upgrade MODX';
$_lang['ugm_json_decode_failed'] = 'Failed JSON decode for version data from GitHub in upgradeAvailable()';
$_lang['ugm_no_curl_no_fopen'] = 'Neither allow_url_fopen nor cURL can be used to check for upgrades';

$_lang['ugm_no_version_list_from_github'] = 'Could not get version list from GitHub';
$_lang['ugm_no_such_version'] = 'Requested version does not exist';



/* Used in upgrademodx.class.php */

$_lang['failed'] = 'failed';

$_lang['ugm_missing_versionlist'] = "Missing 'versionlist' file; try reloading the dashboard page";
$_lang['ugm_cannot_read_directory'] = 'Unable to read directory contents or directory is empty';
$_lang['ugm_unknown_error_reading_temp'] = 'Unknown error reading /temp directory';
$_lang['no_method_enabled'] = 'Cannot download the files - neither cURL nor allow_url_fopen is enabled on this server.';
$_lang['ugm_cannot_read_config_core_php'] = 'Could not read config.core.php';
$_lang['ugm_cannot_read_main_config'] = 'Cannot Read main config file';
$_lang['ugm_could_not_find_cacert'] = 'Could not find cacert.pem';
$_lang['ugm_could_not_write_progress'] = 'Could not write to ugmprogress file';
$_lang['ugm_file'] = 'File';
$_lang['ugm_is_empty_download_failed'] = 'is empty -- download failed';
$_lang['ugm_unable_to_create_directory'] = 'Unable to create directory';
$_lang['ugm_unable_to_read_ugmtemp'] = 'Unable to read from /ugmtemp directory';
$_lang['ugm_file_copy_failed'] = 'File Copy Failed';
$_lang['ugm_begin_upgrade'] = 'Begin Upgrade';
$_lang['ugm_starting_upgrade'] = 'Starting Upgrade';
$_lang['ugm_downloading_files'] = 'Downloading Files';
$_lang['ugm_unzipping_files'] = 'Unzipping files';
$_lang['ugm_copying_files'] = 'Copying Files';
$_lang['ugm_preparing_setup'] = 'Preparing Setup';
$_lang['ugm_launching_setup'] = 'Launching Setup';
$_lang['ugm_finished'] = 'Finished';
$_lang['ugm_get_major_versions'] = '<b>Important:</b> It is <i>strongly</i> recommended that you install all of the versions ending in .0 between your version and the current version of MODX.';
$_lang['ugm_current_version_indicator'] = 'current version';
$_lang['ugm_using'] = 'Using';
$_lang['ugm_choose_version'] = 'Choose MODX Version for Upgrade';
$_lang['ugm_updating_modx_files'] = 'Updating MODX Files';
$_lang['ugm_originally_created_by'] = 'Originally created by';
$_lang['ugm_modified_for_revolution_by'] = 'Modified for Revolution only by';
$_lang['ugm_modified_for_upgrade_by'] = 'Modified for upgrade-only with dashboard widget by';
$_lang['ugm_original_design_by'] = 'Original design By';
$_lang['ugm_back_to_manager'] = 'Back to Manager';

/* Used in unzipfiles.class.php */
$_lang['ugm_files_to_extract'] = 'objects to extract';
$_lang['ugm_destination'] = 'Destination';
$_lang['ugm_source'] = 'Source';
$_lang['ugm_unzipped'] = 'Unzipped';
$_lang['ugm_no_downloaded_file'] = 'Could not find downloaded file';
$_lang['ugm_could_not_create_directory'] = 'Could not create directory';
$_lang['ugm_directory_not_writable'] = 'Directory is not writable';



/* Used in transport.settings.php */
$_lang['setting_ugm_temp_dir'] = 'UpgradeMODX Temp Directory';
$_lang['setting_ugm_temp_dir_desc'] = 'Path to the directory used for temporary storage for downloading and unzipping files; Must be writable; default:{base_path}ugmtemp/';
$_lang['setting_ugm.VersionListApiURL'] = 'Version List API URL';
$_lang['setting_ugm.VersionListApiURL_desc'] = 'URL of API to get version list from';
$_lang['setting_ugm.versionListPath'] = 'versionListPath';
$_lang['setting_ugm.versionListPath_desc'] = 'Path to versionlist file (minus the filename -- should end in a slash); Default: {core_path}cache/upgrademodx/';
$_lang['setting_ugm.lastCheck'] = 'lastCheck';
$_lang['setting_ugm.lastCheck_desc'] = 'Date and time of last check -- set automatically';
$_lang['setting_ugm.latestVersion'] = 'latestVersion';
$_lang['setting_ugm.latestVersion_desc'] = 'Latest version (at last check) -- set automatically';
$_lang['setting_ugm.hideWhenNoUpgrade'] = 'hideWhenNoUpgrade';
$_lang['setting_ugm.hideWhenNoUpgrade_desc'] = 'Hide widget when no upgrade is available: default: No';
$_lang['setting_ugm.interval'] = 'interval';
$_lang['setting_ugm.interval_desc'] = 'Interval between checks -- Examples: 1 week, 3 days, 6 hours; default: 1 day';
$_lang['setting_ugm.groups'] = 'groups';
$_lang['setting_ugm.groups_desc'] = 'group, or comma-separated list of groups, who will see the widget';
$_lang['setting_ugm.versionsToShow'] = 'versionsToShow';
$_lang['setting_ugm.versionsToShow_desc'] = 'Number of versions to show in upgrade form; default: 5';
$_lang['setting_ugm.githubTimeout'] = 'githubTimeout';
$_lang['setting_ugm.githubTimeout_desc'] = 'Timeout in seconds for checking Github; default: 6';
$_lang['setting_ugm.github_token'] = 'github_token';
$_lang['setting_ugm.github_token_desc'] = 'Github token - available from your GitHub profile';
$_lang['setting_ugm.github_username'] = 'github_username';
$_lang['setting_ugm.github_username_desc'] = 'Your username at GitHub';
$_lang['setting_ugm.plOnly'] = 'plOnly';
$_lang['setting_ugm.plOnly_desc'] = 'Show only pl (stable) versions; default: yes';
$_lang['setting_ugm.language'] = 'language';
$_lang['setting_ugm.language_desc'] = 'Two-letter language code for language to use; default: en';
$_lang['setting_ugm.ssl_verify_peer'] = 'ssl_verify_peer';
$_lang['setting_ugm.ssl_verify_peer_desc'] = 'For security, have cURL verify the identity of the server';
$_lang['setting_ugm.modxTimeout'] = 'modxTimeout';
$_lang['setting_ugm.modxTimeout_desc'] = 'Timeout in seconds for checking download status from MODX; default: 6';
$_lang['setting_ugm.forcePclZip'] = 'forcePclZip';
$_lang['setting_ugm.forcePclZip_desc'] = 'Force the use of PclZip instead of ZipArchive';
$_lang['setting_ugm.attempts'] = 'attempts';
$_lang['setting_ugm.attempts_desc'] = 'Number of tries to get data from GitHub or MODX; default: 2';
$_lang['setting_ugm.forceFopen'] = 'forceFopen';
$_lang['setting_ugm.forceFopen_desc'] = 'Force the use of fopen instead of cURL for the download';


/* Used in copyfiles.class.php */
$_lang['ugm_copied'] = 'Copied';
$_lang['ugm_to'] = 'to';
$_lang['ugm_files_copied'] = 'Objects copied';

/* Used in downloadfiles.class.php */
$_lang['ugm_downloaded'] = 'Downloaded';

/* Used in preparesetup.class.php */
$_lang['ugm_no_root_config_core'] = 'Could not find root config.core.php';
$_lang['ugm_setup_prepared'] = 'Setup prepared';
$_lang['ugm_could_not_write'] = 'Could not write';