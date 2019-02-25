<?php
/**
 * Created by IntelliJ IDEA.
 * User: jtag
 * Date: 2/25/19
 * Time: 3:31 PM
 */

require_once "./functions.php";

/**
 * This function will be used to charge a user which may or may not be registered in Jibimo.
 * @param $mobileNumber string Mobile number of a person whom you want to charge.
 * @param $amount int Amount of request in Toomaans.
 * @param $privacy string Privacy scope which can be one of `Public`, `Friend` or `Personal`.
 * @param $description string Transaction description which will be appear in feed.
 * @param $trackerId string A UUID which will be used as factor id.
 * @param $returnUrl string URL to return back after payment.
 * @return bool|string
 */
function request($mobileNumber, $amount, $privacy, $description, $trackerId, $returnUrl)
{

    $headers = [
        // You can generate your own token in Jibimo panel at: https://jibimo.com/login
        'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMyMDhhNmMzMzE3YzljMjMxMDhkZDMwODZjZjE3ZDU0YmVkODNkMTc2MWU3MDZjYjE4MWJlY2Q5MjdhNDM3YzYwOTAwYmE2YjcyMWM5OGI0In0.eyJhdWQiOiI5IiwianRpIjoiYzIwOGE2YzMzMTdjOWMyMzEwOGRkMzA4NmNmMTdkNTRiZWQ4M2QxNzYxZTcwNmNiMTgxYmVjZDkyN2E0MzdjNjA5MDBiYTZiNzIxYzk4YjQiLCJpYXQiOjE1NTEwOTI4NTUsIm5iZiI6MTU1MTA5Mjg1NSwiZXhwIjoxNTgyNjI4ODU1LCJzdWIiOiI4MzAiLCJzY29wZXMiOlsibWFrZS1yZXF1ZXN0LXRyYW5zYWN0aW9uIiwibWFrZS1wYXktdHJhbnNhY3Rpb24iXX0.fNb4T-YAVMZuykVnEUUG9YY_mDp_K8mc9Pd3Tuj60AWwIIMT8OTdHbpUM1V2qR1Osz6JY54ES6aU436B3VnkbI4IsFTtJ6QZrSbU3PgYD1rShby8guwGyyc43uKpNhzhNF_WctTFHyg4mrFphuUpOvXWF4uzdbF1dvQp61X8yp0OTvCWpEjJZGegbPZ9Td5uuxo0iTFEY-G4FmpsYe06alansz0-J8Abk1jKpdWiHDwhMOw_BcIarJkFHNktKhqBPYhXD56xSZxnrL4Zyc5fvLqBXXi06IuKc_8NuD33wgaaG-zbN8o_2ODW1WLNZrWC1suM-QwqkoLEBijRCrwtqdmPHoOO2Ff0psigIUXT5ovAobQ07YnUsnXSdOTqgk4WMl8jdgtNmg0r-6ylolizZsWKUfqo_WBcn5QVg5vilB9H73XNqTlwNJwKezeMLE-dc0ui80OU9t1UbLp-BcOrpAhcAj-u0hRwn11HQkz45MSYEdMvHS7gQqPO_yZ18M2OzMp8_J14tTUblG6sJxCwrKadXw1lOWwt5-H3fRtPj0yeHUY2cuh-9ZQRKrin7-DUTgnwNzLEKsRn_VAXUL7E-wWE5vQaY7_8I-GHjZEXogUedK0QtFEPiahAbdY7-rbJB1GffJF8UvubHuQjDy_NMb6MqVeR5ANfI7IKPoxt7Yk',

        'Accept: application/json',
    ];

    $data = [
        'mobile_number' => $mobileNumber,
        'amount' => $amount, // ***NOTE*** This amount is in Toomaans
        'privacy' => $privacy,
        'description' => $description,
        'tracker_id' => $trackerId,
        'return_url' => $returnUrl,
    ];

    // Remove `sandbox` from URL if you want to call the main API in production server
    return post("https://jibimo.com/sandbox/api/business/request_transaction", $data, $headers);
}

$result = request(
    '+989121271063',
    8500,
    'Public',
    'ممنون که از سرویس ما خرید کردید!',
    '33298f08-d1e2-85fa-8585-6bd510acca38',
    'http://localhost4/my_return_callback'
);

var_dump($result);