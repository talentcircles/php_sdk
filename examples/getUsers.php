<?php
namespace TalentCircles;
/**
 * getUsers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$user_ids = array(
        12770260,
        12769405
    );
$ar_users = $tc->getUsers($user_ids);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Users</title>
    </head>
    <body>
    <?php foreach ($ar_users as $user): ?>
        <h2><?php echo $user->formatted_name ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($user, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>