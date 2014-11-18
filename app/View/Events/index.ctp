<div class="events index">
	<h2><?php echo __('Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_title'); ?></th>
			<th><?php echo $this->Paginator->sort('event_img'); ?></th>
			<th><?php echo $this->Paginator->sort('event_date'); ?></th>
			<th><?php echo $this->Paginator->sort('event_place'); ?></th>
			<th><?php echo $this->Paginator->sort('event_address'); ?></th>
			<th><?php echo $this->Paginator->sort('event_price'); ?></th>
			<th><?php echo $this->Paginator->sort('event_detail'); ?></th>
			<th><?php echo $this->Paginator->sort('question_1'); ?></th>
			<th><?php echo $this->Paginator->sort('question_2'); ?></th>
			<th><?php echo $this->Paginator->sort('question_3'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
        <td><?php echo h($event['Event']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['category_id']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['area_id']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_title']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_img']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_date']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_place']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_address']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_price']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_detail']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['question_1']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['question_2']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['question_3']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['modified']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit',$event['Event']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), array(), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
	</ul>
</div>
