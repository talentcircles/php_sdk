<?php
namespace TalentCircles;
/**
 * getJobs.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCirclesSDK();

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