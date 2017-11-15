<?php
namespace TalentCircles;
/**
 * getUserStories.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$user_id = 10961800;
$obj_user = $tc->getUser($user_id);

$ar_stories = $tc->getUserStories($user_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - User Stories</title>
    </head>
    <body>
    <h1>Stories Posted by <?php echo $obj_user->formatted_name ?></h1>
    <?php foreach($ar_stories as $story): ?>
        <h3><?php echo $story->title ?></h3>
        <div>
            <pre id="json"><?php echo json_encode($story, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>