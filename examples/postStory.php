<?php
/**
 * postStory.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCircles();

$circle_id = 375;

$story_data = array(
    'title' => 'A new test story ' . date("U"),
    'story' => 'This test story is really new.',
    'circle_id' => $circle_id
);

$obj_story = $tc->postStory($story_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Post Story</title>
    </head>
    <body>
        <h2>Posted story: <?php echo $obj_story->title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($obj_story, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>