<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('area_id');
		echo $this->Form->input('event_title');
		echo $this->Form->input('event_date');
		echo $this->Form->input('event_place');
		echo $this->Form->input('event_address');
		echo $this->Form->input('event_price');
		echo $this->Form->input('event_detail');
		echo $this->Form->input('question_1');
		echo $this->Form->input('question_2');
		echo $this->Form->input('question_3');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete'), array(), __('Are you sure you want to delete ?')); ?>
</div>
