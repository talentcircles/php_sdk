<?php
namespace TalentCircles;
/**
 * getUser.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCirclesSDK();

$user_id = 12770260;
$ar_user = $tc->getUser($user_id);
?>

<html>
<head>
    <title>TalentCircles SDK Test - User Update</title>

</head>
<body>
    <h2><?php echo $ar_user->formatted_name ?></h2>
    <div>
        <pre id="json"><?php echo json_encode($ar_user, JSON_PRETTY_PRINT) ?></pre>
    </div>
</body>
</html>