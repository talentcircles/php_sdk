<?php
namespace TalentCircles;
/**
 * updateStories.php
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
    201,
    200
);

$story_data = array(
    'story' => 'Several test Stories are being edited at once.',
);

$ar_stories = $tc->updateStories($story_ids, $story_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Update Stories</title>
    </head>
    <body>
        <?php foreach ($ar_stories as $story): ?>
            <h2>Updated story #<?php echo $story->story_id . " " . $story->title ?></h2>
            <div>
                <pre id="json"><?php echo json_encode($story, JSON_PRETTY_PRINT) ?></pre>
            </div>
        <?php endforeach; ?>
    </body>
</html>