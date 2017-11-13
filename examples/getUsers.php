<?php
/**
 * getUsers.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../src/TalentCirclesSDK.php");

$tc = new TalentCircles();

$user_ids = array(
        12770260,
        12769405
    );
$ar_users = $tc->getUsers($user_ids);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Get Users</title>
    </head>
    <body>
    <?php foreach ($ar_users as $user): ?>
        <h2><?php echo $user->formatted_name ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($user, JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endforeach; ?>
    </body>
</html>