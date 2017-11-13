<?php
/**
 * index.php
 *
 * @author tom@talentcircles.com
 * @copyright Copyright (c) 2017 TalentCircles Inc.
 */

$directory = './examples';
$examples = array_diff(scandir($directory), array('..', '.'));
$example_links = array();
foreach ($examples as $example) {
    $names = explode('.php', $example);
    $upper = ucwords($names[0]);
    $pass1 = preg_replace("/([a-z])([A-Z])/","\\1 \\2",$upper);
    $pass2 = preg_replace("/([A-Z])([A-Z][a-z])/","\\1 \\2",$pass1);
    $example_links[$pass2] = $example;
}
?>

<html>
    <head>
        <title>TalentCircles SDK Examples</title>
    </head>
    <body>
    <h1>SDK Usage Example Code</h1>
    <ul id="examples">
        <?php foreach($example_links as $name => $link): ?>
            <li>
                <a href="examples/<?php echo $link; ?>"><?php echo $name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>