<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['category_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['area_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Title'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Img'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Date'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Place'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Address'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Price'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Detail'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 1'); ?></dt>
		<dd>
			<?php echo h($event['Event']['question_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 2'); ?></dt>
		<dd>
			<?php echo h($event['Event']['question_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 3'); ?></dt>
		<dd>
			<?php echo h($event['Event']['question_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), array(), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
	</ul>
</div>
