<?php
namespace TalentCircles;
/**
 * searchUsers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$search_params = array(
    'circles' => 376
);

$page = 1;
$results_per_page = 10;

$ar_users = $tc->searchUsers($search_params, $page, $results_per_page);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Search Users</title>
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