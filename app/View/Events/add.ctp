<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
<<<<<<< HEAD
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

=======

<?php
        echo $this->Form->input('event_title',array('placeholder'=>'入力してください(英訳)'));

        //イベントの時間。月、日、年、時間、分、午前午後の個別入力フォーム
        echo '<div class="input text required">';
        echo $this->Form->label('Event Date');
        echo $this->Form->select('month', $monthRangeArray, array('empty' => "month",'label')).' / ';
        echo $this->Form->select('day', $dateRangeArray, array('empty' => "day")).' / ';
        echo $this->Form->select('year', $yearRangeArray, array('empty' => "Year")).'<br/><br/>';
        echo $this->Form->select('hour',range(0,12), array('empty' => "hour")).' : ';
        echo $this->Form->select('min', $minuteRange, array('empty' => "min")).' ';
        echo $this->Form->select('meridian', array('am'=>'AM','pm'=>'PM'), array('empty' => "AM/PM"));
        echo '</div>';

        echo $this->Form->input('area_id');
        echo $this->Form->input('event_place', array('placeholder' => 'イベントのお店など場所を入力してくだしあ'));
		echo $this->Form->input('event_address', array('placeholder' => '開催地の住所を入力してくだしあ'));
        echo $this->Form->input('event_price', array('type' => 'text', 'placeholder' => '0php〜800php'));
        echo $this->Form->input('category_id');
        echo $this->Form->input('event_detail', array('rows' => 5, 'placeholder' => 'イベント詳細を入力してくだしてください(英訳)'));
        echo $this->Form->input('question_1', array('placeholder' => '質問1を入力してください。'));
		echo $this->Form->input('question_2', array('placeholder' => '質問2を入力してください。'));
		echo $this->Form->input('question_3', array('placeholder' => '質問3を入力してください。'));
>>>>>>> fa629de9759bbec7d2763401f4cede9d845dd0bc
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
