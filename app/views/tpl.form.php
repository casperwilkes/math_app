<?php
/**
 * This is the default form template.
 */
?>
<form action="<?php echo $this->data['form_action']; ?>" method="POST">
    <?php
    foreach ($this->data['fields'] as $key => $value) {
        echo '<label for="' . $key . '">' . ucwords($value) . ':</label>';
        echo '<input type="text" id="' . $key . ' "name="' . $key . '" value="">';
    }
    ?>
    <br>
    <input type="submit" name="submit" value="submit">
</form>