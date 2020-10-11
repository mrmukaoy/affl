<?php
/**
 * Template part for displaying links to social media
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afflectomm
 */

?>

<?php
$fb = get_theme_mod( 'social_facebook' );
$tw = get_theme_mod( 'social_twitter' );
$ig = get_theme_mod( 'social_instagram' );
$li = get_theme_mod( 'social_linkedin' );

if ( ! empty( $fb ) || ! empty( $tw ) || ! empty( $ig ) || ! empty( $li ) ) {
	echo '<ul class="social">';

	if ( ! empty( $fb ) ) {
		echo '<li><a href="' . $fb . '" class="social__link" target="_blank" rel="noopener" title="Like us on Facebook"><svg viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><g fill="none" fill-rule="evenodd"><ellipse class="social__default" cx="14" cy="14" rx="14" ry="14"/><ellipse class="social__active" fill="#3B5998" cx="14" cy="14" rx="14" ry="14"/><path class="social__main" d="M15.257 21.297h-3.103v-7.502h-1.551v-2.586h1.55V9.657c0-2.108.877-3.364 3.363-3.364h2.072v2.586h-1.294c-.969 0-1.033.361-1.033 1.036l-.004 1.294h2.346l-.275 2.586h-2.07v7.502"/></g></svg></a></li>';
	}
	if ( ! empty( $tw ) ) {
		echo '<li><a href="' . $tw . '" class="social__link" target="_blank" rel="noopener" title="Follow us on Twitter"><svg viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><g fill="none" fill-rule="evenodd"><ellipse class="social__default" cx="14" cy="14" rx="14" ry="14"/><ellipse class="social__active" fill="#1DA1F2" cx="14" cy="14" rx="14" ry="14"/><path class="social__main" d="M20.363 11.238c.005.141.009.283.009.426 0 4.338-3.302 9.339-9.34 9.339A9.297 9.297 0 0 1 6 19.529c.257.03.518.045.784.045a6.585 6.585 0 0 0 4.076-1.405 3.285 3.285 0 0 1-3.066-2.28 3.303 3.303 0 0 0 1.482-.056 3.284 3.284 0 0 1-2.633-3.218v-.042c.443.246.949.393 1.487.41a3.282 3.282 0 0 1-1.016-4.382 9.32 9.32 0 0 0 6.766 3.43 3.282 3.282 0 0 1 5.594-2.994 6.574 6.574 0 0 0 2.084-.797 3.29 3.29 0 0 1-1.443 1.816A6.54 6.54 0 0 0 22 9.54a6.674 6.674 0 0 1-1.637 1.698"/></g></svg></a></li>';
	}
	if ( ! empty( $ig ) ) {
		echo '<li><a href="' . $ig . '" class="social__link" target="_blank" rel="noopener" title="Follow us on Instagram"><svg viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="a"><stop stop-color="#405DE6" offset="0%"/><stop stop-color="#5851DB" offset="16.006%"/><stop stop-color="#833AB4" offset="31.409%"/><stop stop-color="#C13584" offset="46.722%"/><stop stop-color="#FD1D1D" offset="60.252%"/><stop stop-color="#F56040" offset="73.455%"/><stop stop-color="#F77737" offset="86.687%"/><stop stop-color="#FFDC80" offset="100%"/></linearGradient></defs><g fill="none" fill-rule="evenodd"><ellipse class="social__default" cx="14" cy="14" rx="14" ry="14"/><ellipse class="social__active" fill="url(#a)" cx="14" cy="14" rx="14" ry="14"/><g class="social__main"><path d="M14 7.444c2.135 0 2.388.008 3.232.046.78.036 1.203.166 1.485.275.373.146.64.319.92.599.28.28.452.546.597.92.11.281.24.705.276 1.484.038.844.046 1.097.046 3.232 0 2.135-.008 2.388-.046 3.232-.036.78-.166 1.203-.276 1.485-.145.373-.318.64-.598.92-.28.28-.546.452-.92.597-.281.11-.705.24-1.484.276-.844.038-1.096.046-3.232.046s-2.388-.008-3.232-.046c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.478 2.478 0 0 1-.597-.92c-.11-.281-.24-.705-.276-1.484-.038-.844-.046-1.097-.046-3.232 0-2.135.008-2.388.046-3.232.036-.78.166-1.203.276-1.485.145-.373.318-.64.598-.92.28-.28.546-.452.92-.598.281-.109.705-.24 1.484-.275.844-.038 1.097-.046 3.232-.046m0-1.441c-2.172 0-2.444.009-3.297.048-.852.038-1.433.174-1.942.371a3.92 3.92 0 0 0-1.416.923 3.92 3.92 0 0 0-.923 1.416c-.197.51-.333 1.09-.371 1.942-.04.853-.048 1.125-.048 3.297s.009 2.444.048 3.297c.038.852.174 1.433.371 1.942.205.526.478.972.923 1.416.444.445.89.718 1.416.923.51.197 1.09.333 1.942.371.853.04 1.125.048 3.297.048s2.444-.009 3.297-.048c.852-.038 1.433-.174 1.942-.371a3.92 3.92 0 0 0 1.416-.923 3.92 3.92 0 0 0 .923-1.416c.197-.51.333-1.09.371-1.942.04-.853.048-1.125.048-3.297s-.009-2.444-.048-3.297c-.038-.852-.174-1.433-.371-1.942a3.92 3.92 0 0 0-.923-1.416 3.92 3.92 0 0 0-1.416-.923c-.51-.197-1.09-.333-1.942-.371-.853-.04-1.125-.048-3.297-.048"/><path d="M14 9.893a4.107 4.107 0 1 0 0 8.214 4.107 4.107 0 0 0 0-8.214zm0 6.773a2.666 2.666 0 1 1 0-5.332 2.666 2.666 0 0 1 0 5.332zM19.229 9.73a.96.96 0 1 1-1.92.001.96.96 0 0 1 1.92 0"/></g></g></svg></a></li>';
	}
	if ( ! empty( $li ) ) {
		echo '<li><a href="' . $li . '" class="social__link" target="_blank" rel="noopener" title="Follow us on LinkedIn"><svg viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><g fill="none" fill-rule="evenodd"><ellipse class="social__default" cx="14" cy="14" rx="14" ry="14"/><ellipse class="social__active" cx="14" cy="14" rx="14" ry="14" fill="#0077B5"/><path class="social__main" d="M7.182 20.745h3.081v-9.274H7.182v9.274zm1.54-10.54c1.076 0 1.744-.712 1.744-1.602C10.447 7.693 9.798 7 8.743 7 7.688 7 7 7.693 7 8.603c0 .89.668 1.602 1.702 1.602h.02zm3.248 10.54s.04-8.404 0-9.273h3.083v1.343h-.02c.405-.632 1.135-1.561 2.797-1.561 2.028 0 3.55 1.324 3.55 4.174v5.317h-3.083v-4.961c0-1.247-.447-2.097-1.562-2.097-.851 0-1.358.573-1.58 1.127-.084.198-.102.475-.102.753v5.178H11.97z"/></g></svg></a></li>';
	}
	echo '</ul>';
}
?>
