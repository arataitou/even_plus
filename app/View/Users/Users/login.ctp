<div class="users form">
<?php echo $this->Session->flash('Auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('password');
        debug($auth);
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>