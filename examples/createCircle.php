<?php
namespace TalentCircles;
/**
 * createCircle.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$circle_data = array(
    'circle_name' => 'An Okay Test Circle',
    'owner_id' => 10961800
);

$obj_circle = $tc->createCircle($circle_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Create Circle</title>
    </head>
    <body>
        <h2>Created circle: <?php echo $obj_circle->circle_name ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($obj_circle, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>