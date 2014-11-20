<div>
	<h2><?php echo $this->Html->link('Events',
                                         array('controller' => 'events','action' => 'index')
                                    ); ?>
    </h2>
	<div style = "float:left;height:250px;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
	<table>
	<thead>
	<tr>
			<th>日時</th>
	</tr>
	</thead>
	<tbody>
        <tr><td><?php echo $this->Html->link('Today', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'today')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Tomorrow', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'tomorrow')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('1 week',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'oneweek')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('2 weeks',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'twoweeks')
                           ); ?></td></tr>
    </tbody> 
    </table>
    </div>
	<div style = "float:left;height:250px;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
	<table>
	<thead>
	<tr>
			<th>エリア</th>
	</tr>
	</thead>
	<tbody>
        <tr><td><?php echo $this->Html->link('Downtown', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'downtown')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Midtown', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'midtown')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Uptown',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'uptown')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Provinces',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'provinces')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Others',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'others')
                           ); ?></td></tr>
    </tbody> 
    </tbody> 
    </table>
    </div>

	<div style = "float:left;height:250px;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
	<table>
	<thead>
	<tr>
			<th>予算</th>
	</tr>
	</thead>
	<tbody>
        <tr><td><?php echo $this->Html->link('Free', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'free')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('〜 99 PHP', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'priceone')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('100 〜 199 PHP',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'pricetwo')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('200 〜 299 PHP',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'pricethree')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('300 〜 499 PHP',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'pricefour')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('500 〜 800+ PHP',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'pricefive')
                           ); ?></td></tr>
    </tbody> 
    </tbody> 
    </table>
    </div>

	<div style = "float:left;height:250px;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
	<table>
	<thead>
	<tr>
			<th>カテゴリ</th>
	</tr>
	</thead>
	<tbody>
        <tr><td><?php echo $this->Html->link('Party', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'party')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Study', 
                               array('controller' => 'events', 'action' =>'index', 'type' => 'study')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Festival',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'festival')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Sports',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'sports')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Culture',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'culture')
                           ); ?></td></tr>
        <tr><td><?php echo $this->Html->link('Trip',
                               array('controller' => 'events', 'action' =>'index', 'type' => 'trip')
                           ); ?></td></tr>
    </tbody> 
    </tbody> 
    </table>
    </div>

    <div style = "clear:both;"></div>
    <?php if(isset($types)): ?>    
    <?php $event_signal = $types;
      switch ($event_signal) {
      //TODAY     
      case 'today': ?>
    <h2>Today's Events</h2>
    <?php foreach ($today as $today): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($today['Event']['event_title'],
                                         array('controller' => 'events','action' => 'view', $today['Event']['id']
                                         )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($today['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($today['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($today['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($today['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($today['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--TOMORROW -->
    <?php case 'tomorrow': ?>
    <h2>Tomorrow's Events</h2>
    <?php foreach ($tomorrow as $tomorrow): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">  
    <p><?php echo $this->Html->link($tomorrow['Event']['event_title'],
                                         array('controller' => 'events','action' => 'view', $tomorrow['Event']['id']
                                         )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($tomorrow['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($tomorrow['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($tomorrow['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($tomorrow['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($tomorrow['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--1 WEEK -->  
    <?php case 'oneweek': ?>
    <h2>Events within 1 week </h2>
    <?php foreach ($oneweek as $oneweek): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($oneweek['Event']['event_title'],
                                         array('controller' => 'events','action' => 'view', $oneweek['Event']['id']
                                         )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($oneweek['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($oneweek['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($oneweek['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($oneweek['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($oneweek['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--2 WEEKS -->
     <?php case 'twoweeks': ?>
    <h2>Events within 2 weeks </h2>
    <?php foreach ($twoweeks as $twoweeks): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($twoweeks['Event']['event_title'],
                                         array('controller' => 'events','action' => 'view', $twoweeks['Event']['id']
                                         )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($twoweeks['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($twoweeks['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($twoweeks['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($twoweeks['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($twoweeks['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>
 
    <!--エリア-->
    <!--Downtown -->
    <?php case 'downtown': ?>
    <h2>Events in Downtown</h2>
    <?php foreach ($downtown as $downtown): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($downtown['Event']['event_title'],
                                         array('controller' => 'events','action' => 'view', $downtown['Event']['id']
                                         )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($downtown['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($downtown['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($downtown['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($downtown['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($downtown['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--Midtown-->
    <?php case 'midtown': ?>
    <h2>Events in Midtown</h2>
      <?php foreach ($midtown as $midtown): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">  
    <p><?php echo $this->Html->link($midtown['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $midtown['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($midtown['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($midtown['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($midtown['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($midtown['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($midtown['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--Uptown -->  
    <?php case 'uptown': ?>
    <h2>Events in Uptown</h2>
    <?php foreach ($uptown as $uptown): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($uptown['Event']['event_title'],
                                         array('controller' => 'events','action' => 'view', $uptown['Event']['id']
                                         )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($uptown['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($uptown['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($uptown['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($uptown['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($uptown['Event']['event_price']); ?>&nbsp;</p>
    </div>
      <?php endforeach; ?>
    <?php break; ?>

    <!--Provinces -->
     <?php case 'provinces': ?>
    <h2>Events in Provinces </h2>
      <?php foreach ($provinces as $province): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($province['Event']['event_title'],
                                       array('controller' => 'events','action' => 'view', $province['Event']['id']
                                       )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($province['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($province['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($province['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($province['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($province['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--Others -->
    <?php case 'others': ?>
    <h2>Events in Other places </h2>
    <?php foreach ($others as $other): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($other['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $other['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($other['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($other['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($other['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($other['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($other['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!--予算-->
    <!--Free -->
    <?php case 'free': ?>
    <h2>Free Events! </h2>
    <?php foreach ($free as $free): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($free['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $free['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($free['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($free['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($free['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($free['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($free['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- ~99  -->
    <?php case 'priceone': ?>
    <h2>Events (~99 PHP)</h2>
    <?php foreach ($priceone as $one): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($one['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $one['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($one['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($one['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($one['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($one['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($one['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- 100 ~ 199  -->
    <?php case 'pricetwo': ?>
    <h2>Events (100~199 PHP)</h2>
    <?php foreach ($pricetwo as $two): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($two['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $two['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($two['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($two['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($two['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($two['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($two['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- 200 ~ 299  -->
    <?php case 'pricethree': ?>
    <h2>Events (200~299 PHP)</h2>
    <?php foreach ($pricethree as $three): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($three['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $three['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($three['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($three['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($three['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($three['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($three['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- 300 ~ 499  -->
    <?php case 'pricefour': ?>
    <h2>Events (300~499 PHP)</h2>
    <?php foreach ($pricefour as $four): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($four['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $four['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($four['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($four['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($four['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($four['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($four['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- 500 ~ 800+  -->
    <?php case 'pricefive': ?>
    <h2>Events (500~800+ PHP)</h2>
    <?php foreach ($pricefive as $five): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($five['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $five['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($five['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($five['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($five['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($five['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($five['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>
   
    <!-- カテゴリ-->
    <!-- Party  -->
    <?php case 'party': ?>
    <h2>Events (Party)</h2>
    <?php foreach ($party as $party): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($party['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $party['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($party['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($party['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($party['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($party['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($party['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- Study-->
    <?php case 'study': ?>
    <h2>Events (Study)</h2>
    <?php foreach ($study as $study): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($study['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $study['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($study['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($study['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($study['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($study['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($study['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- Festival  -->
    <?php case 'festival': ?>
    <h2>Events (Festival)</h2>
    <?php foreach ($festival as $festival): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($festival['Event']['event_title'],
                                       array('controller' => 'events','action' => 'view', $festival['Event']['id']
                                       )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($festival['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($festival['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($festival['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($festival['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($festival['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- Sports  -->
    <?php case 'sports': ?>
    <h2>Events (Sports)</h2>
    <?php foreach ($sports as $sports): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($sports['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $sports['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($sports['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($sports['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($sports['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($sports['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($sports['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- Culture  -->
    <?php case 'culture': ?>
    <h2>Events (Culture)</h2>
    <?php foreach ($culture as $culture): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($culture['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $culture['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($culture['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($culture['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($culture['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($culture['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($culture['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break; ?>

    <!-- Trip  -->
    <?php case 'trip': ?>
    <h2>Events (Trip)</h2>
    <?php foreach ($trip as $trip): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($trip['Event']['event_title'],
                                        array('controller' => 'events','action' => 'view', $trip['Event']['id']
                                        )
                  ); ?></p>
    <p><?php echo __('Event Img'); ?></p>
    <p><?php echo h($trip['Event']['event_img']); ?>&nbsp;</p>
    <p><?php echo __('Event Date'); ?></p>
    <p><?php echo h($trip['Event']['event_date']); ?>&nbsp;</p>
    <p><?php echo __('Event Place'); ?></p>
    <p><?php echo h($trip['Event']['event_place']); ?>&nbsp;</p>
    <p><?php echo __('Event Address'); ?></p>
    <p><?php echo h($trip['Event']['event_address']); ?>&nbsp;</p>
    <p><?php echo __('Event Price'); ?></p>
    <p><?php echo h($trip['Event']['event_price']); ?>&nbsp;</p>
    </div>
    <?php endforeach; ?>
    <?php break;} ?>



    <!-- デフォルトの画面（Recent Events) -->
    <?php else: ?>
    <?php if(isset($data)): ?>
    <div>
    <h2>Recent Events</h2>
    <?php foreach ($data as $data): ?>
    <div style = "float:left;width:23%;min-width:180px;background-color:#ddd;margin:10px;">
    <p><?php echo $this->Html->link($data['Event']['event_title'],
                                       array('controller' => 'events','action' => 'view', $data['Event']['id']
                                       )
                  ); ?></p>
    <p><?php echo $data['Event']['event_img']; ?></p>
    <p>日付：<?php echo $data['Event']['event_date']; ?></p>
    <p>エリア：<?php echo $data['Area']['area_name']; ?></p>
    <p>予算：<?php echo $data['Event']['event_price']; ?> PHP</p>
    <p>カテゴリ：<?php echo $data['Category']['category_title']; ?></p>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>

    <div style = "clear:both;"></div>
    <p><?php echo $this->Paginator->prev('< 前へ', array(),null,array('class' => 'disabled')); ?>
    <?php echo $this->Paginator->numbers(); ?>
    <?php echo $this->Paginator->next('次へ >', array(),null,array('class' => 'disabled')); ?>
    <?php 
        echo $this->Paginator->counter(array('format' => '全%count%件  ' ));
        echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));   ?></p>
    <?php endif; ?>



