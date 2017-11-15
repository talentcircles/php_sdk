<?php
namespace TalentCircles;
/**
 * getCircleMembers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$circle_id = 375;

$obj_circle = $tc->getCircle($circle_id);

$ar_members = $tc->getCircleMembers($circle_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Circle Members</title>
    </head>
    <body>
        <h1>Members of Circle: <?php echo $obj_circle->circle_name ?></h1>
        <?php foreach ($ar_members as $user): ?>
            <h2><?php echo $user->formatted_name ?></h2>
            <div>
                <pre id="json"><?php echo json_encode($user, JSON_PRETTY_PRINT) ?></pre>
            </div>
        <?php endforeach; ?>
    </body>
</html>