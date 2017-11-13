<?php
/**
 * postStory.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

$circle_ids = array(
        375,
        376
);

$str_circle_ids = implode(',', $circle_ids);

$story_data = array(
    'title' => 'Multiple Circle Test Story',
    'story' => 'This test story is being posted to two different circles.',
    'circle_id' => $str_circle_ids
);

$stories = $tc->postStory($story_data);

$ar_stories = json_decode($stories)->stories;
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