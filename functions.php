<?php
/**
 * Created by IntelliJ IDEA.
 * User: jtag
 * Date: 2/25/19
 * Time: 1:24 PM
 */

/**
 * This function will be used for sending requests to Jibimo API.
 * @param $url
 * @param $data
 * @return bool|string
 */
function request($url, array $data, array $headers)
{
    $curlHandler = curl_init();
    curl_setopt($curlHandler, CURLOPT_URL, $url);

    // This snippet will convert array key values to a string that will be ready for CURL POST data
    $concatenatedData = implode('&', array_map(
        function ($value, $key) {
            return sprintf("%s=%s", $key, urlencode($value));
        },
        $data,
        array_keys($data)
    ));

    curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $concatenatedData);
    curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($curlHandler);
    curl_close($curlHandler);

    return $res;
}