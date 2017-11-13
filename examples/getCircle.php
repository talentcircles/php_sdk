<?php
/**
 * getCircle.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

$circle_id = 375;
$obj_circle = $tc->getCircle($circle_id);
?>

<html>
<head>
    <title>TalentCircles SDK Test - Get Circle</title>

</head>
<body>
    <h2><?php echo $obj_circle->circle_name ?></h2>
    <div>
        <pre id="json"><?php echo json_encode($obj_circle, JSON_PRETTY_PRINT) ?></pre>
    </div>
</body>
</html>