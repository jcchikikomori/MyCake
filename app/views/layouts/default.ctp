<?php echo $html->docType('xhtml-trans'); ?>
<html>
<head>
  <title>jccworld</title>
  <?php echo $html->css('styles'); ?>
</head>
<body>
  <div id="container">
		<div id="header">
			<h1> jccworld </h1>
		</div>
		<div id="content">
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
