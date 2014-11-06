<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>

<?php
        //イベントの時間を制限するために
        //max_dateの時間とmin_dateの時間を現在時刻より指定
        $m_max_date = date('m',strtotime("+ 14 day"));
        $d_max_date = date('d',strtotime("+ 14 day"));
        $Y_max_date = date('Y',strtotime("+ 14 day"));

        $m_min_date =  date('m',strtotime("+ 3 day"));
        $d_min_date =  date('d',strtotime("+ 3 day"));
        $Y_min_date =  date('Y',strtotime("+ 3 day"));

        //max_dateとmin_dateの範囲を指定
        $m_range = range($m_min_date, $m_max_date);
        $d_range = range($d_min_date, $d_max_date);
        $Y_range = range($Y_min_date, $Y_max_date);
        
        //分の入力を15分おきに限定
        $minute_range = array();
        $minute_range = array('0' => '0','15' => '15', '30' => '30', '45' => '45');

        $m_range_array = array_combine($m_range, $m_range);
        $d_range_array = array_combine($d_range, $d_range);
        $Y_range_array = array_combine($Y_range, $Y_range);



        echo $this->Form->input('event_title',array('placeholder'=>'入力してください(英訳)'));  
        
        //イベントの時間。月、日、年、時間、分、午前午後の個別入力フォーム  
        echo '<div class="input text required">';
        echo $this->Form->label('Event Date');
        echo $this->Form->select('month', $m_range_array, array('empty' => "month",'label')).' / ';
        echo $this->Form->select('day', $d_range_array, array('empty' => "day")).' / ';
        echo $this->Form->select('year', $Y_range_array, array('empty' => "Year")).'<br/><br/>';
        echo $this->Form->select('hour',range(0,12),array('empty' => "hour")).' : ';
        echo $this->Form->select('min', $minute_range, array('empty' => "min")).' ';
        echo $this->Form->select('meridian',array('am'=>'AM','pm'=>'PM'), array('empty' => "AM/PM"));
        echo '</div>';

        echo $this->Form->input('area_id');
        echo $this->Form->input('event_place',array('placeholder' => 'イベントのお店など場所を入力してくだしあ'));
		echo $this->Form->input('event_address',array('placeholder' => '開催地の住所を入力してくだしあ'));
        echo $this->Form->input('event_price',array('type' => 'text','placeholder' => '0php〜800php'));
        echo $this->Form->input('category_id');
        echo $this->Form->input('event_detail',array('rows' => 5,
            'placeholder' => 'イベント詳細を入力してくだしてください(英訳)
            '));
        echo $this->Form->input('question_1',array('placeholder' => '質問1を入力してください。'));
		echo $this->Form->input('question_2',array('placeholder' => '質問2を入力してください。'));
		echo $this->Form->input('question_3',array('placeholder' => '質問3を入力してください。'));
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
