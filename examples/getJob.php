<?php
/**
 * getJob.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

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