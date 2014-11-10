<div class="events view">
     <?php debug($event); ?>
		
	<h2><?php echo h($event['Event']['event_title']); ?></h2>
	&nbsp;
    <h3><?php echo __('Event Plan'); ?></h3>
	<dl>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($event['Area']['area_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($event['Category']['category_title']); ?>
			&nbsp;
		</dd>
    </dl>
&nbsp;
    <h3><?php echo __('Event Detail'); ?></h3>
    <h4><?php echo h($event['Event']['event_detail']); ?></h4>
    <h3><?php echo __('Q1 ').$event['Event']['question_1']; ?></h3>
&nbsp;
    <h3><?php echo __('Q2 ').$event['Event']['question_2']; ?></h3>
&nbsp;
    <h3><?php echo __('Q3 ').$event['Event']['question_3']; ?></h3>
&nbsp;
    <h3><?php echo __('Participants List') ?></h3>
    <!--ここにparticipantsテーブルからlistを表示するなり⇒つまりモデルから-->
&nbsp;
&nbsp;
&nbsp;
&nbsp;

    <dl>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['user_id']); ?>
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
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</dd>
    </dl>
&nbsp;
&nbsp;
&nbsp;
&nbsp;

    <ul>
<!--ログイン済みのユーザーのみ参加ボタン表示-->
        <?php if ($userId){ 
            echo '<li>'.$this->Html->link(__('Join Event'), array('action' => 'join')).'</li>'; 
            }
        ?>
<!--管理者とイベント作成者のみ以下の処理が表示-->
        <?php if ($flagUd){
            echo '<li>'.$this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])).'</li>';
            echo '<li>'.$this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), array(), __('Are you sure you want to delete # %s?', $event['Event']['id'])).'</li>';
            }
        ?>
	</ul>
</div>
