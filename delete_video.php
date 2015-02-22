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

//echo print_r($_POST);
$vidid = $_POST['videoid'];
$verifyId = base64_decode($_POST['hashtag']);

if ($vidid == $verifyId) {
	global $wpdb;
	if ( $wpdb->delete(YTVTABLE, array('id' => $vidid) ) ) {
		echo "true";
	} else {
		echo "false";
	}
} else {
	echo "false";
}

?>