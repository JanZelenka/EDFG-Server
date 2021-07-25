<?php
/**
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 * @return string
 */
if ( ! function_exists('resources_id')) {
	function resources_id () {
		return '?id=' . ( CI_DEBUG ? time() : CACHED_RESOURCE_ID );
	};
}
