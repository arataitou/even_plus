    <div style="width:98%;min-width:180px;border-style:dotted;background-color:#F1C40F;margin:0px auto;">
        <p><font size=5 color="#FFFFFF" face="Comic Sans MS"><Center>LOVE to communicate with FILIPINOS!!</Center></font></p>
        <p><font size=5  color="#FFFFFF" face="Comic Sans MS"><Center>1. Each participant will pay with the maxinum amount of 800 PHP</Center></font></p>
        <p><font size=5 color="#FFFFFF" face="Comic Sans MS"><Center>2. The event will take place between 3 days and 2 weeks</Center></font></p>
        <p><font size=5 color="#FFFFFF" face="Comic Sans MS"><Center>3. Each participant should prepare 3 questions</Center></font></p>
    </div>

    <div style="clear:both;"></div>
    <h2 style="background-color:#bbbbbb;margin:10px -20px;padding:5px;"><font color="#333300">Recent Events</font></h2>
    <?php foreach ($data as $data): ?>
    <div style="float:left;width:23%;min-width:180px;background-color:#ddd;margin-right:10px;">
        <p><?php echo $this->Html->link($data['Event']['event_title'],
                                           array('controller' => 'events', 'action' => 'view', $data['Event']['id'])
                                       ); ?></p>
        <p><?php echo $data['Event']['event_img']; ?></p>
        <p>DATE :<?php echo $data['Event']['event_date']; ?></p>
        <p>AREA :<?php echo $data['Area']['area_name']; ?></p>
        <p>COST :<?php echo $data['Event']['event_price']; ?> PHP</p>
        <p>CATEGORY :<?php echo $data['Category']['category_title']; ?></p>
    </div>
    <?php endforeach; ?>
    <div style="clear:both;"></div>
    <p style="text-align:right;margin-right:0%;">
    <?php echo $this->Html->link('More Events>>', 
                   array('controller' => 'events', 'action' => 'index')); ?>
    </p>
