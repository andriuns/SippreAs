<!DOCTYPE html>
<html>
    <head>

        <?php echo $this->Html->charset('utf-8'); ?>
        <title> Sippreas:  <?php echo $title_for_layout; ?></title>       
        <?php
        echo $this->Html->meta('favicon.ico', '/favicon2.ico', array('type' => 'icon'));
        echo $this->Html->css(array('bootstrap.min','handsontable','edicioncss', 'font-awesome.min'));    
        echo $this->Html->script(array('Jquery','Handsontable11','bootstrap.min','highcharts','exportarH','edicionjs'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?> 
        <style>
            
</style>
    </head>
    
    <body>
     
        <?php echo $this->element('naviniciouser'); ?>  
        
   
             
            <?php echo $this->Session->flash('auth'); ?>         
            <?php echo $this->Session->flash(); ?>
            
            <?php echo $this->fetch('content'); ?>
           
     
        
    </body>

</html>



