<!DOCTYPE html>
<html>
    <head>

        <?php echo $this->Html->charset('utf-8'); ?>
        <title> Sippreas <?php echo $title_for_layout; ?></title>       
        <?php
        echo $this->Html->meta('favicon.ico', '/favicon2.ico', array('type' => 'icon'));
        echo $this->Html->css(array('bootstrap.min','font-awesome.min'));
        echo $this->Html->script(array('Jquery','bootstrap.min','highcharts','graficas', 'parallax','edicionjs'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?> 
    </head>
    <body>
        <?php echo $this->element('inicio'); ?>     
            
            <?php echo $this->Session->flash('auth'); ?>         
            <?php echo $this->Session->flash(); ?>
            
            <?php echo $this->fetch('content'); ?>
         
             <?php echo $this->element('footer'); ?>    
    
       

    </body>
    
</html>
