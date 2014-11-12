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
    ?>


	<?php 

		// 11/04KS追記
		//Topのロゴ (/even_plus/top/index) へLink
		echo '<a href='.'/even_plus/top/index'.'><h1>'."Even+".'</h1></a>';


         if(isset($status['id']) && ($status['group_id']=1)){

		    //Bottum表示各ページへのLink
		    echo $this->Html->link('Mypage', '/users/view', array('class'=>'button'));
		    echo $this->Html->link('MakeEvent', '/events/add', array('class'=>'button'));
            echo $this->Html->link('Event', '/events/index', array('class'=>'button'));
            echo $this->Html->link('Logout', '/users/logout', array('class'=>'button'));

         }
        if(isset($status['id']) && ($status['group_id']=0)){

		    echo $this->Html->link('Mypage', '/users/view', array('class'=>'button'));
		    echo $this->Html->link('MakeEvent', '/events/add', array('class'=>'button'));
            echo $this->Html->link('Event', '/events/index', array('class'=>'button'));
		    echo $this->Html->link('Logout', '/users/logout', array('class'=>'button'));

        }
        if(!isset($status['id'])){

            echo $this->Html->link('Event', '/events/index', array('class'=>'button'));
            echo $this->Html->link('Login','/users/login',array('class'=>'button'));
            echo $this->Html->link('Signup','/users/signup',array('class'=>'button'));

        }


debug($status);

            

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
	<?php  echo $this->element('sql_dump'); ?>
</body>
</html>
