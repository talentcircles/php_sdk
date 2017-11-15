<?php
namespace TalentCircles;
/**
 * getStories.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

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