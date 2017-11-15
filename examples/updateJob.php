<?php
namespace TalentCircles;
/**
 * updateJob.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$job_id = 8698590;

$update_data = array(
    'available_on' => 'November 11, 2017',
    'commitment_level' => 'Part-Time',
);

$ar_job = $tc->updateJob($job_id, $update_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Update Job</title>
    </head>
    <body>
        <h2><?php echo $ar_job->job_title ?></h2>
        <div>
            <pre><?php echo json_encode($ar_job, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>