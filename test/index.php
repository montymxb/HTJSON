<?php
/**
 * Created by PhpStorm.
 * User: Bfriedman
 * Date: 3/3/17
 * Time: 8:01 PM
 *
 * Test File. Will attempt to parse any site and load itself up
 */

require "../src/HTJSON.php";

$url = 'http://ggssoulfood.com';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return transfer result, do NOT output directly to the screen
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$contents = curl_exec($ch);
curl_close($ch);

$parser = new HTJSON();
$data = $parser->parseHTML($contents);

$string = htmlentities(json_encode($data, JSON_PRETTY_PRINT));
$string = preg_replace("/\n/", "<br/>", $string);
$string = preg_replace("/\s/", "&nbsp;", $string);

die($string);