<?php
namespace TalentCircles;
/**
 * getStory.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCirclesSDK();

$story_id = 196;
$obj_story = $tc->getStory($story_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Story</title>
    </head>
    <body>
    <h2><?php echo $obj_story->title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($obj_story, JSON_PRETTY_PRINT) ?></pre>
    </body>
</html>