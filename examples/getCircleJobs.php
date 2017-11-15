<?php
namespace TalentCircles;
/**
 * getCircleJobs.php
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

$result_offset = 0;
$result_limit = 2;

$ar_jobs = $tc->getCircleJobs($circle_id, $result_offset, $result_limit);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Circle Jobs</title>
    </head>
    <body>
        <h1>Jobs Posted to Circle: <?php echo $obj_circle->circle_name ?></h1>
        <?php foreach ($ar_jobs as $job): ?>
            <h2><?php echo $job->job_title ?></h2>
            <div>
                <pre id="json"><?php echo json_encode($job, JSON_PRETTY_PRINT) ?></pre>
            </div>
        <?php endforeach; ?>
    </body>
</html>