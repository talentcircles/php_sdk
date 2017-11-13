<?php
/**
 * searchJobs.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

$search_params = array(
    'tenants' => 570
);

$page = 1;
$results_per_page = 10;

$ar_jobs = $tc->searchJobs($search_params, $page, $results_per_page);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Search Jobs</title>
    </head>
    <body>
    <?php foreach ($ar_jobs as $job): ?>
        <h2><?php echo $job->job_title ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($job, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>