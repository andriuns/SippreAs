

<style>
 
.gray-bottom {
border-bottom: 1px solid #c7c7c7;
}

#fon{
    background: url(img/bg.jpg) repeat;
    
}
#font{
    background: url(img/fonicon.jpg) ;
    padding-bottom: 0.5em;
    padding-top: 0.2em;
    
}
#p1{
  color: #333333;
}

</style>
<div id="fon"class="container">
    <div id="fon" style="padding-top:5em" class="row">     
        <div class="col-md-4 text-center">
            
            <?php
            echo $this->Html->image("icon1.svg", array(' style'=>"width: 160px; height: 160px;",
                "alt" => "Sippreas",
                'url' => array('controller' => 'users', 'action' => 'login')
            ));
            ?>
           
            <div id="font">
            <h2 >Ilustre sus datos</h2>
            <p id="p1">Cree diferentes forma de presetar sus resultados estadisticos. Puesdes crear, gráficos de burbujas, de barras, gráficos circulares, entre otros.  
          <p><a class="btn btn-info" href="#" role="button">Mas informacion »</a></p>
        </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-md-4 text-center">
            <?php
            echo $this->Html->image("icon2.svg", array(' style'=>"width: 160px; height: 160px;",
                "alt" => "Sippreas",
                'url' => array('controller' => 'users', 'action' => 'login')
            ));
            ?>
           <div id="font">
          <h2>Editar datos</h2>
          <p id="p1"> SippreAs tiene una hoja de cálculo integrada para la edición de datos fácil. También puede importar sus archivos de XLS, XLSX y archivos CSV
          <p><a class="btn btn-info" href="#" role="button">Mas informacion »</a></p>
        </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-md-4 text-center">
             <?php
            echo $this->Html->image("icon3.png", array(' style'=>"width: 160px; height: 160px;",
                "alt" => "Sippreas",
                'url' => array('controller' => 'users', 'action' => 'login')
            ));
            ?>
            <div id="font">
          <h2>Descarga tus datos</h2>
          <p id="p1">Exporta tus datos a la computadora como documentos XlSX, CSV &nbspy PDF, se suman la gráfica la que puedes descargar en formato JPEG, PNG y SVG.
          <p><a class="btn btn-info" href="#" role="button">Mas informacion »</a></p>
        </div>
        </div><!-- /.col-lg-4 -->
    </div>
    
        
        
<?php if($this->Session->check('Auth.User')):?>
<div id="blank">
    <div class="white">
    <div class="w990">
        <center>
         <?php echo $this->Html->link('Crea una Estadistica!', array('controller'=>'users','action'=>'login'), array('class'=>"btn btn-info btn-lg")) ?>
        </center>
    </div>
  </div>
</div>
<?php endif;?>


  
        <h2  style="text-align: center; margin-top: 50px; "><font><font>SippreAs. </font><font>La forma más fácil</font></font></h2>
        <div  style="text-align: center; width: 100%;"><font><font>
         De Crear Estadisticas. </font><font>No se requieren conocimientos de diseño .
        </font></font></div>
    
        <center><?php
            echo $this->Html->image("pc.png", array(' style'=>"margin-top:20px; height: 335px;",
                "alt" => "Sippreas",
                'url' => array('controller' => 'users', 'action' => 'login')
            ));
            ?> 
        
      
    <div  style="padding-bottom: 40px;padding-top: 40px;">
    
        <center>
         <?php echo $this->Html->link('Empieza ahora, es gratis!', array('controller'=>'users','action'=>'login'), array('class'=>"btn btn-info btn-lg")) ?>
        </center>
   
  </div>
  </div>

   
    