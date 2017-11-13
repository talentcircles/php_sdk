<?php
/**
 * getStories.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

$story_ids = array(
        196,
        197
    );
$ar_stories = $tc->getStories($story_ids);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Stories</title>
    </head>
    <body>
    <?php foreach ($ar_stories as $story): ?>
        <h2><?php echo $story->title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($story, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>