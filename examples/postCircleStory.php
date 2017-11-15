<?php
namespace TalentCircles;
/**
 * postCircleStory.php
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

$story_details = array(
        'title' => 'A New Test Story ' . date("U"),
        'story' => 'This story is really, really new.'
);

$obj_story = $tc->postCircleStory($circle_id, $story_details);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Post a Story to Circle</title>
    </head>
    <body>
        <h1>Story Just Posted to: <?php echo $obj_circle->circle_name ?></h1>
        <h2><?php echo $obj_story->title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($obj_story, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>