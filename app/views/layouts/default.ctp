<?php echo $html->docType('xhtml-trans'); ?>
<html>
<head>
  <title>jccworld</title>
  <?php echo $html->css('styles'); ?>
  <style>
    #user-nav {
    	padding: 10px;
    	/*width: 100%;*/
    	border: 1px #000 solid;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div id="container">
		<div id="header">
			<h1> jccworld </h1>
		</div>
		<div id="content">
      <div id="user-nav">
        <?php if($logged_in): ?>
          Welcome, <?php echo $users_username . '! '; echo $html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
        <?php else: ?>
          <?php echo $html->link('Login', array('controller'=>'users', 'action'=>'login')); ?>&nbsp;or&nbsp;
          <?php echo $html->link('Register', array('controller'=>'users', 'action'=>'add')); ?>
        <?php endif;?>
      </div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
</body>
</head>
