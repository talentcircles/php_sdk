<?php
namespace TalentCircles;
/**
 * updateCircle.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$circle_id = 384;

$update_data = array(
    'circle_name' => 'Wild Test Circle',
);

$obj_circle = $tc->updateCircle($circle_id, $update_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Update Circle</title>
    </head>
    <body>
        <h2><?php echo $obj_circle->circle_name ?></h2>
        <div>
            <pre><?php echo json_encode($obj_circle, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>