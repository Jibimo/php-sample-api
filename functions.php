<?php
/**
 * Created by IntelliJ IDEA.
 * User: jtag
 * Date: 2/25/19
 * Time: 1:24 PM
 */

/**
 * This function will be used for sending POST requests to Jibimo API.
 * @param $url
 * @param array $data
 * @param array $headers
 * @return bool|string
 */
function post($url, array $data, array $headers)
{
    $curlHandler = curl_init();
    curl_setopt($curlHandler, CURLOPT_URL, $url);

    // This snippet will convert array key values to a string that will be ready for CURL POST data
    $concatenatedData = concatDataArray($data);

    curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $concatenatedData);
    curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($curlHandler);
    curl_close($curlHandler);

    return $res;
}

/**
 * This function will be used for sending GET requests to Jibimo API.
 * @param $url
 * @param array $headers
 * @return bool|string
 */
function get($url, array $headers)
{
    $curlHandler = curl_init($url);
    curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($curlHandler);
    curl_close($curlHandler);

    return $res;
}

/**
 * This function will get a key-value pair and concatenate it for query part of URL.
 * @param array $data
 * @return string
 */
function concatDataArray(array $data)
{
    // This snippet will convert array key values to a string that will be ready for CURL POST data
    $concatenatedData = implode('&', array_map(
        function ($value, $key) {
            return sprintf("%s=%s", $key, urlencode($value));
        },
        $data,
        array_keys($data)
    ));
    return $concatenatedData;
}