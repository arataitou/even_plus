<div class="users index">
    <h2><?php echo __('ようこそ'.$status['name'].'さん'); ?></h2>
	<thead>
	<table>
    <h1><?php echo __('Entry Events'); ?></h1>
    <tr>
        <td>Event Title</td>
        <td>Event Date</td>
        <td>Event Place</td>
    </tr>
    <?php $eventCount = 0; ?>
    <?php $more = 0;?>


	<?php foreach ($entryEvent as $entryEvents): ?>
    <tr>
        <td><?php echo $this->Html->link($entryEvents['Event']['event_title'],array('controller' => 'events', 'action' => 'view', $entryEvents['Event']['id'])); ?>&nbsp;</td>
        <td><?php echo $entryEvents['Event']['event_date']; ?>&nbsp;</td>
        <td><?php echo $entryEvents['Event']['event_place']; ?>&nbsp;</td>
            
            <?php  $eventCount++; ?>
            <?php if($eventCount==3){break;}?>
	</tr>
    <?php endforeach; ?>
    </table>
        <?php if($eventCount == 0){echo __('Notting Event');} ?>
        <?php if($paginateBranch == 'recent'){
                echo $this->Paginator->prev('< 前へ', array(),null,array('class' => 'disabled'));
                echo $this->Paginator->numbers();
                echo $this->Paginator->next('次へ >', array(),null,array('class' => 'disabled'));
                echo $this->Paginator->counter(array('format' => '全%count%件'));
                echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));
            }else{
                echo $this->Html->link('more', array('action' => 'index','?'=>array('paginate'=> 'recent')));
            }?>


    <table>
    <h1><?php echo __('Particioated Events'); ?></h1>
    <tr>
        <td>Event Title</td>
        <td>Event Date</td>
        <td>Event Place</td>
    </tr>
    <?php $eventCount = 0; ?>
	<?php foreach ($entryEventPast as $entryEventPasts): ?>
    <tr>
        <td><?php echo $this->Html->link($entryEventPasts['Event']['event_title'],array('controller' => 'events', 'action' => 'view', $entryEventPasts['Event']['id'])); ?>&nbsp;</td>
        <td><?php echo $entryEventPasts['Event']['event_date']; ?>&nbsp;</td>
        <td><?php echo $entryEventPasts['Event']['event_place']; ?>&nbsp;</td>
            <?php  $eventCount++; ?>
            <?php if($eventCount==3){break;}?>
	</tr>
    <?php endforeach; ?>
	</table>
    <?php if($eventCount == 0){echo __('Notting Event');} ?>
    <?php if($paginateBranch == 'past'){
                echo $this->Paginator->prev('< 前へ', array(),null,array('class' => 'disabled'));
                echo $this->Paginator->numbers();
                echo $this->Paginator->next('次へ >', array(),null,array('class' => 'disabled'));
                echo $this->Paginator->counter(array('format' => '全%count%件'));
                echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));
            }else{
                echo $this->Html->link('more', array('action' => 'index','?'=>array('paginate'=> 'past')));
            }?>

    <tbody>
    	<tr>
            <td class="actions">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $status['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $status['id']), array(), __('Are you sure you want to delete # %s?', $status['id'])); ?>
            </td>
        </tr>
    </tbody>
</div>
<div class="actions">
	<h3><?php echo __('User Information'); ?></h3>
	<ul>

		<li><?php echo 'User_id  '.($status['id']); ?>&nbsp;</li>
		<li><?php echo 'User_name '.($status['name']); ?>&nbsp;</li>

	</ul>
</div>
