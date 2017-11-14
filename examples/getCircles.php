<?php
namespace TalentCircles;
/**
 * getCircles.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCirclesSDK();

$circle_ids = array(
        372,
        375
    );
$ar_circles = $tc->getCircles($circle_ids);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Circles</title>
    </head>
    <body>
    <?php foreach ($ar_circles as $circle): ?>
        <h2><?php echo $circle->circle_name ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($circle, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>