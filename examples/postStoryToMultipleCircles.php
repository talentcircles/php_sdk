<?php
namespace TalentCircles;
/**
 * postStory.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$circle_ids = array(
        375,
        376
);

$story_data = array(
    'title' => 'Multiple Circle Test Story',
    'story' => 'This test story is being posted to two different circles.',
    'circle_id' => $circle_ids
);

$ar_stories = $tc->postStory($story_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Post Story</title>
    </head>
    <body>
        <?php foreach ($ar_stories as $story): ?>
            <h2>Posted story: <?php echo $story->title ?> to Circle # <?php echo $story->circle_id ?></h2>
            <div>
                <pre id="json"><?php echo json_encode($story, JSON_PRETTY_PRINT) ?></pre>
            </div>
        <?php endforeach; ?>
    </body>
</html>