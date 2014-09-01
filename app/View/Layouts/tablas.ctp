
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','handsontable'));
             echo $this->Html->script(array('jquery-1.11.1.min','Handsontable11','highcharts','exportarH'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<style type="text/css">
body {background: white; margin: 20px;}
h2 {margin: 20px 0;}
</style>
<body >
    
	<div id="container">
            
		<div id="header">
			
		</div>
		<div id="content">
    
                    
			<?php
                        //echo $this->element('tabla');
                        echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
          
		</div>
		<div id="footer">
			
		</div>
	</div>
        
	<?php echo $this->element('sql_dump'); ?>
    
</body>
</html>
