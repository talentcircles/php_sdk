<?php
namespace TalentCircles;
/**
 * getUserMatchingJobs.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$user_id = 12770260;
$ar_user = $tc->getUser($user_id);

$ar_jobs = $tc->getUserMatchingJobs($user_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - User Matching Jobs</title>
    </head>
    <body>
    <h1>Matching Jobs for <?php echo $ar_user->formatted_name ?></h1>
    <?php foreach($ar_jobs as $job): ?>
        <h3><?php echo $job->job->job_title ?> -- <span style="color:blue">Score: <?php echo $job->score ?></span></h3>
        <div>
            <pre id="json"><?php echo json_encode($job->job, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>