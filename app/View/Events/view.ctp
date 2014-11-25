<div class="events view">
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
        <dt><?php echo __('Organizer')?></dt>
        <dd>
            <?php echo $this->Html->link($event['User']['name'], '/users/view/'.$event['User']['id']); ?>
            &nbsp;
        </dd>
    </dl>
&nbsp;
    <h3><?php echo __('Event Detail'); ?></h3>
    <h4><?php echo h($event['Event']['event_detail']); ?></h4>

<!--ここから....answersをquestionごとに個別で表示させるためのifとswitch-->
    <?php if(isset($_GET['moreanswers'])): ?>
        <?php switch($_GET['moreanswers']){
                case '1':
                    echo '<h3>'.__('Q1 ').$event['Event']['question_1'].'</h3>';
                    foreach($participantsEach as $each){
                        echo '<p>'.$each['Participants']['answer_1'].'...'.$this->Html->link($userIdAndName[$each['Participants']['user_id']], '/users/view/'.$each['Participants']['user_id']).'</p>';
                    }
                    echo $this->Paginator->prev('< Previous', array(), null, array('class' => 'prev disabled'));
                    echo $this->Paginator->numbers(array('separator' => ''));
                    echo $this->Paginator->next('Next >', array(), null, array('class' => 'next disabled'));
                    break; 
                case '2' :
                    echo '<h3>'.__('Q2 ').$event['Event']['question_2'].'</h3>';
                    foreach($participantsEach as $each){
                        echo '<p>'.$each['Participants']['answer_2'].'...'.$this->Html->link($userIdAndName[$each['Participants']['user_id']], '/users/view/'.$each['Participants']['user_id']).'</p>';
                    }
                    echo $this->Paginator->prev('< Previous', array(), null, array('class' => 'prev disabled'));
                    echo $this->Paginator->numbers(array('separator' => ''));
                    echo $this->Paginator->next('Next >', array(), null, array('class' => 'next disabled'));
                    break; 
                case '3' :
                    echo '<h3>'.__('Q3 ').$event['Event']['question_3'].'</h3>';
                    foreach($participantsEach as $each){
                        echo '<p>'.$each['Participants']['answer_2'].'...'.$this->Html->link($userIdAndName[$each['Participants']['user_id']], '/users/view/'.$each['Participants']['user_id']).'</p>';
                    }
                    echo $this->Paginator->prev('< Previous', array(), null, array('class' => 'prev disabled'));
                    echo $this->Paginator->numbers(array('separator' => ''));
                    echo $this->Paginator->next('Next >', array(), null, array('class' => 'next disabled'));
                    break; 
              }
        ?>

<!--デフォルトのanswers-->
    <?php else: ?>
    <h3><?php echo __('Q1 ').$event['Event']['question_1']; ?></h3>
            <?php
                foreach($participantsRandom as $random){
                     echo '<p>'.$random['Participants']['answer_1'].'...'.$this->Html->link($userIdAndName[$random['Participants']['user_id']], '/users/view/'.$random['Participants']['user_id']).'</p>';
            }
            ?>
    <p><?php echo $this->Html->link('Check more answers', '/events/view/'.$event['Event']['id'].'?moreanswers=1'); ?></p>
    <h3><?php echo __('Q2 ').$event['Event']['question_2']; ?></h3>
            <?php
                foreach($participantsRandom as $random){
                    echo '<p>'.$random['Participants']['answer_2'].'...'.$this->Html->link($userIdAndName[$random['Participants']['user_id']], '/users/view/'.$random['Participants']['user_id']).'</p>';
                }
            ?>
    <p><?php echo $this->Html->link('Check more answers', '/events/view/'.$event['Event']['id'].'?moreanswers=2'); ?></p>
    <h3><?php echo __('Q3 ').$event['Event']['question_3']; ?></h3>
            <?php
                foreach($participantsRandom as $random){
                    echo '<p>'.$random['Participants']['answer_3'].'...'.$this->Html->link($userIdAndName[$random['Participants']['user_id']], '/users/view/'.$random['Participants']['user_id']).'</p>';
                }
            ?>
    <p><?php echo $this->Html->link('Check more answers', '/events/view/'.$event['Event']['id'].'?moreanswers=3'); ?></p>

    <h3><?php echo __('Participants List'); ?></h3>
    <ul>
    <?php
        foreach($participantsEach as $participant){
            echo '<li>'.$this->Html->link($userIdAndName[$participant['Participants']['user_id']], '/users/view/'.$participant['Participants']['user_id']).'</li>';
        }
    ?>
    </ul>
    <?php endif; ?>
<!--ここまで....answersをquestionごとに個別で表示させるためのswitch-->
