<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
        echo $this->Form->input('name',array('value' => $editSignUp['User']['name']));
		echo $this->Form->input('password',array('value' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
</div>


