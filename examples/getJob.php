<?php
namespace TalentCircles;
/**
 * getJob.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);

$obj_job = $tc->getJob(6579620);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get User</title>
    </head>
    <body>
    <h2><?php echo $obj_job->job_title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($obj_job, JSON_PRETTY_PRINT) ?></pre>
    </body>
</html>