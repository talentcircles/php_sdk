<?php
namespace TalentCircles;
/**
 * createJob.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$jobTitle = "Advanced Front-end Developer";
$jobDescription = "We need somone really good at developing";

$jobDetails = array(
    'available_on' => 'November 14, 2017',
    'category_id' => 17,
    'commitment_level' => 'Full-Time',
    'apply_behavior' => 'url redirect',
    'urlRedirect' => 'https://talentcircles.com'
);

$ar_job = $tc->createJob($jobTitle, $jobDescription, $jobDetails);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Create Job</title>
    </head>
    <body>
        <h2><?php echo $ar_job->job_title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($ar_job, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>