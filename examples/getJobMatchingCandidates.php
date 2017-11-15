<?php
namespace TalentCircles;
/**
 * getJobMatchingCandidates.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$job_id = 6579620;

$obj_job = $tc->getJob($job_id);

$ar_users = $tc->getJobMatchingCandidates($job_id);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Matching Candidates for Job</title>
    </head>
    <body>
        <h1>Matching Candidates for Job: <?php echo $obj_job->job_title ?></h1>
        <?php foreach ($ar_users as $user): ?>
            <h2><?php echo $user->user->formatted_name ?> - Score: <?php echo $user->score ?></h2>
            <div>
                <pre id="json"><?php echo json_encode($user->user, JSON_PRETTY_PRINT) ?></pre>
            </div>
        <?php endforeach; ?>
    </body>
</html>