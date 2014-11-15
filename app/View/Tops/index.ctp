    <h2>説明文</h2>
    <div class = "blk_explain" style = "width:917px;">
    <p class = "txt">
    フィリピ人　と　EVENな関係でイベントを楽しみたい！</p>
    </div>

    
    
    
    
    <h2 style = "background-color:#ddd;border-bottom:solid 1px;margin:10px -20px;">Recent Events</h2>
    <?php foreach ($data as $data): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin-right:10px;">
    <h3>Event</h3>
    <p><?php echo $this->Html->link($data['Event']['event_title'],
                                       array('controller' => 'events','action' => 'view')
                                   ); ?></p>
    <p><?php echo $data['Event']['event_img']; ?></p>
    <p>日付：<?php echo $data['Event']['event_date']; ?></p>
    <p>エリア：<?php echo $data['Area']['area_name']; ?></p>
    <p>予算：<?php echo $data['Event']['event_price']; ?> PHP</p>
    <p>カテゴリ：<?php echo $data['Category']['category_title']; ?></p>
    </div>
    <?php endforeach; ?>
    <div style = "clear:both;"></div>
    <p style = "text-align:right;margin-right:10%;">
    <?php echo $this->Html->link('More Events>>', 
                   array('controller' => 'events','action' => 'index')); ?>
    </p>
