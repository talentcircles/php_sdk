<?php
namespace TalentCircles;
/**
 * getCircleStories.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCirclesSDK();

$circle_id = 375;

$obj_circle = $tc->getCircle($circle_id);

$ar_stories = $tc->getCircleStories($circle_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Stories Posted to Circle</title>
    </head>
    <body>
        <h1>Stories Posted to: <?php echo $obj_circle->circle_name ?></h1>
        <?php foreach ($ar_stories as $story): ?>
            <h2><?php echo $story->title ?></h2>
            <h3>Link: <a href="<?php echo $story->link ?>"><?php echo $story->link ?></a></h3>
            <div>
                <pre id="json"><?php echo json_encode($story, JSON_PRETTY_PRINT) ?></pre>
            </div>
        <?php endforeach; ?>
    </body>
</html>