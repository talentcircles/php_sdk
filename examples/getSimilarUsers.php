<?php
namespace TalentCircles;
/**
 * getSimilarUsers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

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