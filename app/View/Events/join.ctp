<div class="join form">
<?php echo $this->Form->create('join'); ?>
    <fieldset>
        <legend><?php echo __('Join the Event'); ?></legend>
        <h2><?php echo $eventInfo['Event']['event_title']?></h2>
<?php
    echo '<div class="input text required">';
    echo $this->Form->input('answer_1', array('placeholder' => 'Q1に解答してください', 'label' => 'Q1 '.$eventInfo['Event']['question_1']));
    echo $this->Form->input('answer_2', array('placeholder' => 'Q2に解答してください', 'label' => 'Q2 '.$eventInfo['Event']['question_2']));
    echo $this->Form->input('answer_3', array('placeholder' => 'Q3に解答してください', 'label' => 'Q3 '.$eventInfo['Event']['question_3']));
    echo '</div>';
?>    
    </fieldset>
<?php echo $this->Form->end(__('submit')); ?>
