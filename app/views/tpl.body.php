<?php
/**
 * This is the template that is used for displaying the main problem to the user.
 */
?>
<h2><?php echo $this->page; ?></h2>

<div id="program_body">
    <a href="index.php">&lt;&lt;Back to Index</a>
    <p class="bold">
        Example:
    </p>
    <p class="indent">
        <?php echo $this->data['example']; ?>
    </p>
    <?php
    if (!empty($this->data['fields'])) {
        include('tpl.form.php');
    }
    ?>
    <?php if(isset($this->data['answer'])):?>
    <p class="bold">
        Your answer is:
    </p>
    <p class="indent">
        <?php echo $this->data['answer'];?>
    </p>
    <?php endif; ?>
</div>