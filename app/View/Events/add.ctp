<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('area_id');
		echo $this->Form->input('event_title');
		echo $this->Form->input('event_img');
		echo $this->Form->input('event_date');
		echo $this->Form->input('event_place');
		echo $this->Form->input('event_address');
		echo $this->Form->input('event_price');
		echo $this->Form->input('event_detail');
		echo $this->Form->input('question_1');
		echo $this->Form->input('question_2');
		echo $this->Form->input('question_3');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
	</ul>
</div>
