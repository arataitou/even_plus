<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<style>
.logo a:hover {
    color:#ddd;
}
</style>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		//Topのロゴ (/even_plus/top/index) へLink
		echo '<a href='.'/even_plus/tops/index'.' style="text-decoration:none;" ><h2 class="logo">
            <Center><font size=9 color="#F1C40F" face="Zapfino">'.'Even+'.'</font></font></Center></h2></a>';
         if (isset($status['id']) && ($status['group_id'] == 1)) {
		    //Button表示各ページへのLink
		    echo $this->Html->link('Mypage', '/users/index', array('class'=>'button'));
		    echo $this->Html->link('MakeEvent', '/events/add', array('class'=>'button'));
            echo $this->Html->link('Event', '/events/index', array('class'=>'button'));
            echo $this->Html->link('Logout', '/users/logout', array('class'=>'button'));
         }

        if (isset($status['id']) && ($status['group_id'] == 0)) {
		    echo $this->Html->link('Mypage', '/users/index', array('class'=>'button'));
		    echo $this->Html->link('MakeEvent', '/events/add', array('class'=>'button'));
            echo $this->Html->link('Event', '/events/index', array('class'=>'button'));
		    echo $this->Html->link('Logout', '/users/logout', array('class'=>'button'));
        }

        if (!isset($status['id'])) {
            echo $this->Html->link('Event', '/events/index', array('class'=>'button'));
            echo $this->Html->link('Login', '/users/login', array('class'=>'button'));
            echo $this->Html->link('Signup','/users/signup', array('class'=>'button'));
        }
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php 
				echo $this->Html->link('Home', '/tops/index', array('class'=>'button'));
			?>
		</div>
	</div>
</body>
</html>
