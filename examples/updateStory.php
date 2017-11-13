<?php
/**
 * updateStory.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

$story_id = 240;

$story_data = array(
    'story' => 'This test story is really, amazingly new.',
);

$obj_story = $tc->updateStory($story_id, $story_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Update Story</title>
    </head>
    <body>
        <h2>Updated story: <?php echo $obj_story->title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($obj_story, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>