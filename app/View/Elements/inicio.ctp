<style>
    .container{
        width: 100%;
    }
    #banner {
        background: #3698c9;
        font-family: Roboto,sans-serif;;
        color: #fff;
        text-align: center;
        padding: 12px;
        padding-top: 20px;
        padding-bottom: 9px;
        margin-left: -1em;
        margin-right: -1em;
        //vertical-align: top;
    }
    #banner span {
        vertical-align: top;
    }
    #banner a {
        color: #9ad7ff;
        vertical-align: top;  
    }
    
    #im{
        background: url(img/homebg.jpg)no-repeat top center;
        
        height: 550px;        
        
    }
    #l1{
        
        padding-top: 3em;
        margin: 0 0 0 30em;
        text-align: center;
       
    }
    #l2{
        text-align: center;
        padding-top: 2em;
        padding-left: 10em
    }
    #l3{
       text-align: center;
       margin-left: 30em
    }
   
    #l5{       
         margin-top: -36em;
         margin-left: -17em;
           
    }
    #l6{
        
        padding-top:7em
    }
    #l7{
        padding-top: 7em;
        margin-left: 80%;
        
    }
    #cen{
        text-align: center;
        
    }
    .main-text
    {
        position: absolute;
        top: 65px;
        width: 100%;
        color: #FFF;
    }
    .main-text2
    {
        position: absolute;
        top: 1em;
        width: 100%;
        color: #FFF;
    }
    .main-te
    {
        position: absolute;
        top: 15em;
        height: 15em;
       // width: 100%;
        color: #FFF;
    }
    .main-he
    {
        position: absolute;
       top: 0em;
      // margin-left: 40px; 
      // right: 1em;
      //  height: 15em;
      //width: 100%;
        //color: #FFF;
    }
</style>


<div class="container">
    <div id="im" class="row">
        <div class="col-sm-12">


            <ul id="scene" >

                <li id="l1"  class="layer" data-depth="0.20"><?php echo $this->Html->image('layer1.png') ?></li>
                <li  id="l2" class="layer" data-depth="0.40"><?php echo $this->Html->image('layer2.png') ?></li>
                <li id="l3" class="layer" data-depth="0.60"><?php echo $this->Html->image('layer3.png') ?></li>
                <li  id="l4" class="layer" data-depth="0.80"><?php echo $this->Html->image('layer4.png') ?></li>
                <li  id="lb" class="layer" data-depth="0.80"><?php echo $this->Html->image('layer4.png') ?></li>
                <li  id="l5" class="layer" data-depth="1.00"><?php echo $this->Html->image('layer5.png') ?></li>
              
                <li id="l6" class="layer" data-depth="0.40">
                    <?php   echo $this->Html->image("LOG1.svg", array('style' => 'margin-left: 2em; margin-top: -1.5em;', 'height' => "90", "alt" => "Sippreas",'url' => array('controller' => 'users', 'action' => 'login') ));?>
                </li>
                <li id="l7" class="layer" data-depth="0.00" >
                    <?php echo $this->Html->link(__('Iniciar sesión'), array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-default')); ?>
                    <?php echo $this->Html->link(__('Crear cuenta'), array('controller' => 'users', 'action' => 'registro'), array('class' => 'btn btn-warning ')); ?>
                </li>
            </ul>

            <div class="row">
                <div class=" main-he col-xs-8 col-sm-12 ">
                    <div id="banner">
                        <span><i class="glyphicon glyphicon-play-circle"></i> </span>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"></span><i class="glyphicon glyphicon-remove"></i></button>
                        <span> &nbsp Puedes mirar el primer video creado por Sippreas. &nbsp </span>
                        <a href="/video/" >Mas informacion.</a>    
                    </div>
                </div>
                <div class=" main-te col-xs-8 col-sm-6 col-sm-offset-3 text-center">

                    <div id="myCarousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="active item" >
                                <?php echo $this->Html->image('default.png', array('style' => 'height: 24.3em; ' )) ?>                                                     
                                <div class="main-text2 hidden-xs">
                                    <div style="padding-top: 1.5em" class="col-sm-12 text-center "  >
                                        <div class="col-sm-12 text-center " data-toggle="tooltip" data-placement="top" title="Haz click en el area de trazado" >
                                     <div id="grafica1" style="height: 22em;" ></div>                        

                                    </div>  
                                    </div>  

                                </div>
                            </div>
                            <div class=" item">
                                <?php echo $this->Html->image('default.png', array('style' => 'height: 24.3em;')) ?>                                                     
                                <div class="main-text2 hidden-xs">
                                    <div style="padding-top: 1.5em" class="col-sm-12 text-center "  >
                                        <div class="col-sm-12 text-center " data-toggle="tooltip" data-placement="top" title="Puedes girar la grafica 3D" >
                                     <div id="grafica2" style="height: 22em;" ></div>                        

                                    </div>  
                                    </div> 

                                </div>
                            </div>
                            <div class=" item">
                                <?php echo $this->Html->image('default.png', array('style' => 'height: 24.3em;')) ?>                                                     
                                <div class="main-text2 hidden-xs">
                                    <div style="padding-top: 1.5em" class="col-sm-12 text-center "  >
                                        <div class="col-sm-12 text-center " data-toggle="tooltip" data-placement="top" title="Puedes girar la grafica 3D" >
                                     <div id="grafica3" style="height: 22em;" ></div>                        

                                    </div>  
                                    </div>  

                                </div>
                            </div>                           
                        </div>
                        <!-- Carousel nav -->

                        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                            </span></a>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>


<script>
var scene = document.getElementById('scene');
var parallax = new Parallax(scene);
</script>



    

