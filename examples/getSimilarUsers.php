<?php
namespace TalentCircles;
/**
 * getSimilarUsers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCirclesSDK();

$user_id = 12770260;
$obj_user = $tc->getUser($user_id);

$ar_users = $tc->getSimilarUsers($user_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Similar Users</title>
    </head>
    <body>
    <h1>Users Similar to <?php echo $obj_user->formatted_name ?></h1>
    <?php foreach($ar_users as $one_user): ?>
        <h3><?php echo $one_user->user->formatted_name ?> -- <span style="color:blue">Score: <?php echo $one_user->score ?></span></h3>
        <div>
            <pre id="json"><?php echo json_encode($one_user->user, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>