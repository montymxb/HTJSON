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

if(isset($_GET['url']) && $_GET['url'] != '') {
    // use this url instead
    $url = $_GET['url'];

} else {
    // default
    $url = 'http://example.com';
}

// Perform cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return transfer result, do NOT output directly to the screen
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$contents = curl_exec($ch);
curl_close($ch);

if(!$contents) {
    $url = 'http://example.com';
}

// get encoded site data
$data = HTJSON::encodeHTML($contents);

// encode
$encoded = htmlentities(json_encode($data, JSON_PRETTY_PRINT));

// decode
$decoded = htmlentities(HTJSON::decodeHTML($data));

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTJSON Test</title>
    <style>
        #htjson-main {
            background: #fff;
            margin: 8px auto;
            padding: 8px;
            border-radius: 8px;
        }
        .htjson-h1 {
            font-weight: 300;
        }
        .htjson-descrip {
            color: #a0a0a0;
            text-align: center;
        }
        .htjson-textarea {
            min-width: 550px;
            margin: 8px auto;
            padding: 8px;
            min-height: 300px;
            display: block;
            text-align: left;
        }
        .htjson-form {
            display: block;
            margin: 8px auto;
        }
        .htjson-input {
            padding: 8px;
            margin: 2px auto;
            text-align: center;
            display: block;
            width: 250px;
            background: #fff;
            border: 2px #a0a0a0;
            border-style: none none solid none;
        }
        .htjson-submit-button {
            border: 2px solid #a0a0a0;
        }
        .htjson-submit-button:hover {
            background: #505050;
            color: #fff;
            transition: 0.3s;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="htjson-main">
    <h1 class="htjson-h1" style="text-align:center">HTJSON Test</h1>
    <h2 style="text-align:center">(<?php echo $url ?>)</h2>
    <form method="GET">
        <input class="htjson-input" type="text" name="url" value="<?php echo $url; ?>"><br/>
        <input class="htjson-input htjson-submit-button" type="submit" value="Run.">
    </form>
    <p class="htjson-descrip">Encoded HTML</p>

    <?php
    // echo out our encoded data in a textarea
    echo "<textarea class='htjson-textarea'>{$encoded}</textarea>";
    ?>

    <p class="htjson-descrip">Decoded HTML</p>

    <?php
    // echo out the decoded site
    echo "<textarea class='htjson-textarea'>$decoded</textarea>";
    ?>

</div>
</body>
</html>