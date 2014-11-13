<div>
	<h2><?php echo $this->Html->link('Events',
        array('controller' => 'events','action' => 'index')); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
	
			<th>日時</th>
	</tr>
	</thead>
	<tbody>
        <tr><td><?php echo $this->Html->link('Today', 
        array('controller' => 'events', 'action' =>'index', 'type' => 'today')); ?> 
        </td></tr>
        <tr><td><?php echo $this->Html->link('Tomorrow', 
        array('controller' => 'events', 'action' =>'index', 'type' => 'tomorrow')); ?> </td></tr>
        <tr><td><?php echo $this->Html->link('1 week',
        array('controller' => 'events', 'action' =>'index', 'type' => 'oneweek')); ?> </td></tr>
        <tr><td><?php echo $this->Html->link('2 weeks',
        array('controller' => 'events', 'action' =>'index', 'type' => 'twoweeks')); ?> </td></tr>
    </tbody> 
    </table>


    <?php $event_signal = $types;

      switch ($event_signal) {
      //TODAY     
        case 'today': ?>
 
     <h2>Today's Events</h2>
      <?php  foreach ($today as $today): ?>
    <thead>
    <tr><th>Event</th></tr>
    </thead>
    <dl>
        <dt><?php echo __('Event Title'); ?></dt>
        <dd>
            <?php echo h($today['Event']['event_title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Img'); ?></dt>
        <dd>
            <?php echo h($today['Event']['event_img']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Date'); ?></dt>
        <dd>
            <?php echo h($today['Event']['event_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Place'); ?></dt>
        <dd>
            <?php echo h($today['Event']['event_place']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Address'); ?></dt>
        <dd>
            <?php echo h($today['Event']['event_address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Price'); ?></dt>
        <dd>
            <?php echo h($today['Event']['event_price']); ?>
            &nbsp;
        </dd>
        </dl>
    <?php endforeach; ?>
    <?php break; ?>
    <!--TOMORROW -->
    <?php case 'tomorrow': ?>
      <?php  foreach ($tomorrow as $tomorrow): ?>

    <br />    
    <h2>Tomorrow's Events</h2>
    <dl>
        <dt><?php echo __('Event Title'); ?></dt>
        <dd>
            <?php echo h($tomorrow['Event']['event_title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Img'); ?></dt>
        <dd>
            <?php echo h($tomorrow['Event']['event_img']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Date'); ?></dt>
        <dd>
            <?php echo h($tomorrow['Event']['event_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Place'); ?></dt>
        <dd>
            <?php echo h($tomorrow['Event']['event_place']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Address'); ?></dt>
        <dd>
            <?php echo h($tomorrow['Event']['event_address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Price'); ?></dt>
        <dd>
            <?php echo h($tomorrow['Event']['event_price']); ?>
            &nbsp;
        </dd>
        </dl>
    <?php endforeach; ?>
    <?php break; ?>

    <!--1 WEEK -->  
    <?php case 'oneweek': ?>
    <h2>Events within 1 week </h2>
      <?php  foreach ($oneweek as $oneweek): ?>

    <br />    
    <dl>
        <dt><?php echo __('Event Title'); ?></dt>
        <dd>
            <?php echo h($oneweek['Event']['event_title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Img'); ?></dt>
        <dd>
            <?php echo h($oneweek['Event']['event_img']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Date'); ?></dt>
        <dd>
            <?php echo h($oneweek['Event']['event_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Place'); ?></dt>
        <dd>
            <?php echo h($oneweek['Event']['event_place']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Address'); ?></dt>
        <dd>
            <?php echo h($oneweek['Event']['event_address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Price'); ?></dt>
        <dd>
            <?php echo h($oneweek['Event']['event_price']); ?>
            &nbsp;
        </dd>
        </dl>
    <?php endforeach; ?>
    <?php break; ?>

    <!--2 WEEKS -->
     <?php case 'twoweeks': ?>
    <h2>Events within 2 weeks </h2>
      <?php  foreach ($twoweeks as $twoweeks): ?>

    <br />    
    <dl>
        <dt><?php echo __('Event Title'); ?></dt>
        <dd>
            <?php echo h($twoweeks['Event']['event_title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Img'); ?></dt>
        <dd>
            <?php echo h($twoweeks['Event']['event_img']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Date'); ?></dt>
        <dd>
            <?php echo h($twoweeks['Event']['event_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Place'); ?></dt>
        <dd>
            <?php echo h($twoweeks['Event']['event_place']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Address'); ?></dt>
        <dd>
            <?php echo h($twoweeks['Event']['event_address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Price'); ?></dt>
        <dd>
            <?php echo h($twoweeks['Event']['event_price']); ?>
            &nbsp;
        </dd>
        </dl>
    <?php endforeach; ?>
    <?php break; ?>
     <?php default: ?>
    </tbody>
    </table>
    </div>

    <div>
    <h2>Recent Event</h2>
    <?php foreach ($data as $data): ?>
    <table>
    <thead>
    <tr><th>Event</th></tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $this->Html->link($data['Event']['event_title'],
         array('controller' => 'events','action' => 'view')); ?></td>
    </tr>
    <tr>
        <td><?php echo $data['Event']['event_img']; ?><td>
    </tr>
    <tr>
        <td>日付：<?php echo $data['Event']['event_date']; ?></td>
    </tr>
    <tr>
        <td>エリア：<?php echo $data['Area']['area_name']; ?></td>
    </tr>
    <tr>
        <td>予算：<?php echo $data['Event']['event_price']; ?> PHP</td>
    </tr>
    <tr>
        <td>カテゴリ：<?php echo $data['Category']['category_title']; ?></td>
    </tr>
    </tbody>
    </table>
    <?php endforeach; ?>
    <?php echo $this->Paginator->prev('< 前へ', array(),null,array('class' => 'disabled')); ?>
    <?php echo $this->Paginator->numbers(); ?>
    <?php echo $this->Paginator->next('次へ >', array(),null,array('class' => 'disabled')); ?>
    <?php 
       echo $this->Paginator->counter(array('format' => '全%count%件  ' ));
       echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));   ?>
    <?php break;} ?>



