<?php
/**
 * Created by IntelliJ IDEA.
 * User: jtag
 * Date: 2/25/19
 * Time: 4:00 PM
 */

require_once "./functions.php";

/**
 * This function will be used to validate an extended pay transaction in Jibimo.
 * @param $transactionId int The ID of an extended pay transaction that you made before.
 * @return bool|string
 */
function validateExtendedPay($transactionId)
{

    $headers = [
        // You can generate your own token in Jibimo panel at: https://jibimo.com/login
        'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMyMDhhNmMzMzE3YzljMjMxMDhkZDMwODZjZjE3ZDU0YmVkODNkMTc2MWU3MDZjYjE4MWJlY2Q5MjdhNDM3YzYwOTAwYmE2YjcyMWM5OGI0In0.eyJhdWQiOiI5IiwianRpIjoiYzIwOGE2YzMzMTdjOWMyMzEwOGRkMzA4NmNmMTdkNTRiZWQ4M2QxNzYxZTcwNmNiMTgxYmVjZDkyN2E0MzdjNjA5MDBiYTZiNzIxYzk4YjQiLCJpYXQiOjE1NTEwOTI4NTUsIm5iZiI6MTU1MTA5Mjg1NSwiZXhwIjoxNTgyNjI4ODU1LCJzdWIiOiI4MzAiLCJzY29wZXMiOlsibWFrZS1yZXF1ZXN0LXRyYW5zYWN0aW9uIiwibWFrZS1wYXktdHJhbnNhY3Rpb24iXX0.fNb4T-YAVMZuykVnEUUG9YY_mDp_K8mc9Pd3Tuj60AWwIIMT8OTdHbpUM1V2qR1Osz6JY54ES6aU436B3VnkbI4IsFTtJ6QZrSbU3PgYD1rShby8guwGyyc43uKpNhzhNF_WctTFHyg4mrFphuUpOvXWF4uzdbF1dvQp61X8yp0OTvCWpEjJZGegbPZ9Td5uuxo0iTFEY-G4FmpsYe06alansz0-J8Abk1jKpdWiHDwhMOw_BcIarJkFHNktKhqBPYhXD56xSZxnrL4Zyc5fvLqBXXi06IuKc_8NuD33wgaaG-zbN8o_2ODW1WLNZrWC1suM-QwqkoLEBijRCrwtqdmPHoOO2Ff0psigIUXT5ovAobQ07YnUsnXSdOTqgk4WMl8jdgtNmg0r-6ylolizZsWKUfqo_WBcn5QVg5vilB9H73XNqTlwNJwKezeMLE-dc0ui80OU9t1UbLp-BcOrpAhcAj-u0hRwn11HQkz45MSYEdMvHS7gQqPO_yZ18M2OzMp8_J14tTUblG6sJxCwrKadXw1lOWwt5-H3fRtPj0yeHUY2cuh-9ZQRKrin7-DUTgnwNzLEKsRn_VAXUL7E-wWE5vQaY7_8I-GHjZEXogUedK0QtFEPiahAbdY7-rbJB1GffJF8UvubHuQjDy_NMb6MqVeR5ANfI7IKPoxt7Yk',

        'Accept: application/json',
    ];

    // Remove `sandbox` from URL if you want to call the main API in production server
    return get("https://jibimo.com/sandbox/api/business/extended-pay/$transactionId", $headers);
}

$result = validateExtendedPay(2314);

var_dump($result);