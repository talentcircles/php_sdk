<?php
namespace TalentCircles;
/**
 * getJobs.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$job_ids = array(
        4551686,
        7480159
    );
$ar_jobs = $tc->getJobs($job_ids);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Jobs</title>
    </head>
    <body>
    <?php foreach ($ar_jobs as $job): ?>
        <h2><?php echo $job->job_title ?></h2>
        <pre id="json"><?php echo json_encode($job, JSON_PRETTY_PRINT) ?></pre>
    <?php endforeach; ?>
    </body>
</html>