<?php

// @codingStandardsIgnoreFile

/**
 * Filter HTTP requests to external URLs (WordPress, third-party plugins).
 *
 * @wp-hook pre_http_request
 * @param boolean $preempt
 * @param array  $args
 * @param string $url
 * @return boolean
 */
function filterPreHttpRequest($preempt, $args, $url)
{
    $result = false;

    // Prevent requests to api.wordpress.org.
    // (includes core/version-check, plugins/update-check, themes/update-check)
    if (strpos($url, 'api.wordpress.org') !== false) {
        $result = true;
    }

    return $result;
}
add_filter('pre_http_request', 'filterPreHttpRequest', 1, 3);
