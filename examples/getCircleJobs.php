<?php
/**
 * getCircleJobs.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

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