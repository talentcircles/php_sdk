<?php
/**
 * updateCircle.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

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