<?php


include("../../../wp-load.php");

if (!current_user_can('manage_options')) {
	wp_die(__('You do not have sufficient permissions to access this page.'));	
}
/* Array
(
    [_wpnonce] => c368a4fd68
    [_wp_http_referer] => /wp-admin/admin.php?page=ywa-settings
    [videoid] => 2
    [youtubeid_2] => 7gwJ7g5DPlo
    [ytvheight_2] => 320
    [ytvwidth_2] => 180
    [ytmodbrand_2] => true
    [ytrel_2] => 1
    [yttheme_2] => light
)
*/

$video_id = strip_tags($_POST['videoid']);
if (check_admin_referer("update_video_" . $video_id)) {
	global $wpdb;
	$vars['ytvid'] = strip_tags($_POST['youtubeid_'.$video_id]);
	$vars['ytvheight'] = strip_tags($_POST['ytvheight_'.$video_id]);
	$vars['ytvwidth'] = strip_tags($_POST['ytvwidth_'.$video_id]);
	$vars['ytmodbrand'] = strip_tags($_POST['ytmodbrand_'.$video_id]);
	$vars['ytrel'] = strip_tags($_POST['ytrel_'.$video_id]);
	$vars['yttheme'] = strip_tags($_POST['yttheme_'.$video_id]);
	
	$updateValues = array(
						'youtubeid' => $vars['ytvid'],
						'videovariables' => serialize($vars),
						);
	$updateTypes = array(
						'%s',
						'%s',
						);

	if ( $wpdb->update(YTVTABLE, $updateValues, array( 'id' => $video_id ), $updateTypes, array('%d') )) {
		echo "true";
	} else {
		echo "false1";
	}
	
} else {
	echo "false2";
}



?>