<?php
namespace TalentCircles;
/**
 * updateUser.php
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

$update_data = array(
    'objective' => 'To improve my career a great deal.',
);

$obj_user = $tc->updateUser($user_id, $update_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Update User</title>
    </head>
    <body>
        <h2><?php echo $obj_user->formatted_name ?></h2>
        <div>
            <pre><?php echo json_encode($obj_user, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>