<?php
/**
 * getCircleMembers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCircles();

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