<?php
/**
 * This is the template used for displaying the list of availiable functions. It 
 * is also used as the default page when users input unavailable functions, or
 * classes cannot be found. 
 */
$math = array();
$xml_path = APP_ROOT . DS . 'includes' . DS . 'math.xml';
$sx = simplexml_load_file($xml_path);

foreach ($sx->program as $key) {
    $math[(string) $key->name] = (string) $key->description;
}
// Sort the math selections by name //
ksort($math, SORT_STRING);
?>

<table border="1" id="math_table">
    <tbody>
        <?php
        foreach ($math as $key => $value):
            $key_name = ucwords(str_replace('_', ' ', $key));
            $key_anch = strtolower(str_replace('_', '', $key));
            ?>
            <tr>
                <td><?php echo "<a href=\"index.php?{$key_anch}\">{$key_name}</a>" ?></td>
            </tr>
            <tr>
                <td><p><?php echo $value ?></p></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
