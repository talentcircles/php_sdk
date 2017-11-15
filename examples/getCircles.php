<?php
namespace TalentCircles;
/**
 * getCircles.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$circle_ids = array(
        372,
        375
    );
$ar_circles = $tc->getCircles($circle_ids);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Circles</title>
    </head>
    <body>
    <?php foreach ($ar_circles as $circle): ?>
        <h2><?php echo $circle->circle_name ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($circle, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>