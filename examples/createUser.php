<?php
/**
 * createUser.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

require_once("../TalentCirclesSDK.php");

$tc = new TalentCircles();

$user_data = array(
    'firstname' => 'Gerald',
    'lastname' => 'de Jager',
    'email' => 'gedj@austincity.gov',
    'zipcode' => 78704
);

$ar_user = $tc->createUser($user_data);
?>

<html>
    <head>
        <title>TalentCircles SDK Test - Create User</title>
    </head>
    <body>
        <h2>Created user: <?php echo $ar_user->formatted_name ?></h2>
        <div>
            <pre id="json"><?php echo json_encode($ar_user, JSON_PRETTY_PRINT) ?></pre>
        </div>
    </body>
</html>