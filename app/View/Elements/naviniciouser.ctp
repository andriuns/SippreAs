<style>
    #conta{
margin-right: auto;
margin-left: auto;
padding-left: 6.4em;
padding-right: 7.4em;
        
    }
  
.navbar-nav>li>.dropdown-menu:before{
content: '';
display: inline-block;
border-left: 7px solid transparent;
border-right: 7px solid transparent;
border-bottom: 7px solid #ccc;
border-bottom-color: rgba(6, 5, 5, 0.77);
position: absolute;
top: -7px;
right: 1em;

}
.caret-up {
    width: 0; 
    height: 0; 
    border-left: 4px solid rgba(0, 0, 0, 0);
    border-right: 4px solid rgba(0, 0, 0, 0);
    border-bottom: 4px solid;
    
    display: inline-block;
    margin-left: 2px;
    vertical-align: middle;
}
</style>

<script>
  $(function(){
    $(".hov").hover(            
            function() {
                $('.hove', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.hove', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
</script>
    
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div id='conta' class="container-fluid"> 
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

<?php if ($userGroup == false): ?>
            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
            <?php
            echo $this->Html->image("LOGO1.png", array('style' => ' height: 2.8em; margin: 0.5em 0 0 0;',
                "alt" => "Sippreas",
                'url' => array('controller' => 'pages', 'action' => 'home2')
            ));
            ?>
            <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><?php  echo $this->Html->link('<span class="fa fa-home fa-lg"></span>'.' '.'Inicio',array('controller'=>'pages', 'action'=>'home2'), array('escape' => false));?></li>
                
                <li class=" hov dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Archivos<b class="caret"></b></a>
                        <ul class=" hove dropdown-menu">
                            <?php if ($userGroup== 'admin'):?>
                            <li><?php echo $this->Html->link('<span class="fa fa-folder-open"></span>' . ' ' . ' Administrar documentos', array('controller' => 'datos', 'action' => 'index','admin'=>true), array('escape' => false)) ?>
                            </li>
                            <li><?php echo $this->Html->link('<span class="fa fa-folder"></span>' . ' ' . ' Mis documentos', array('controller' => 'datos', 'action' => 'index','admin'=>false), array('escape' => false)) ?></li>
                              <?php else:?>
                            <li><?php echo $this->Html->link('<span class="fa fa-folder"></span>' . ' ' . ' Mis documentos', array('controller' => 'datos', 'action' => 'index'), array('escape' => false)) ?></li>
                              <?php endif;?>
                            <li class="divider"></li>
                            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>' . ' ' . 'Añadir  documento', array('controller' => 'datos', 'action' => 'add', 'admin' => false), array('escape' => false)) ?>
                            </li>                  
                        </ul>
                    </li>
                  <li class=" hov dropdown">                      
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ayuda<b class="caret"></b></a>
                        <ul class=" hove dropdown-menu">
                            <li><?php echo $this->Html->link('<span class="fa fa-group"></span>' . ' ' . 'Administrar  usuarios', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
                            </li>
                            <li class="divider"></li>
                            <li><?php echo $this->Html->link('<span class="fa fa-user"></span>' . ' ' . 'Agregar  usuario', array('controller' => 'users', 'action' => 'add', 'admin' => true), array('escape' => false)) ?>
                            </li>                  
                        </ul>
                    </li>
            </ul>
<?php endif; ?>
            
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
<?php if ($userGroup == 'admin'): ?>  
                    <li class=" hov dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
                        <ul class="hove dropdown-menu">
                            <li><?php echo $this->Html->link('<span class="fa fa-group"></span>' . ' ' . 'Administrar  usuarios', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
                            </li>
                            <li class="divider"></li>
                            <li><?php echo $this->Html->link('<span class="fa fa-user"></span>' . ' ' . 'Agregar  usuario', array('controller' => 'users', 'action' => 'add', 'admin' => true), array('escape' => false)) ?>
                            </li>                  
                        </ul>
                    </li>
<?php endif; ?>
<?php if (!$this->Session->check('Auth.User')): ?>
                    
                    <li class=" dropdown" style="margin-top: 0.6em; margin-right: 0.3em; background-color: "><div class="btn-group"> <?php echo $this->Html->link('Iniciar sesión', array('controller' => 'users', 'action' => 'login'), array('class' => "btn btn-default")); ?> </div> </li>                                  
                    <li class=" dropdown" style="margin-top: 0.6em; margin-right: 0.8em; "><div class="btn-group"> <?php echo $this->Html->link('Crear cuenta', array('controller' => 'users', 'action' => 'registro'), array('class' => "btn btn-warning")); ?> </div> </li>                                  

                    <li class=" hov mega-dropdown-menu" style="margin-top: 0.6em; margin-right: 1em;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Menu <span class="fa fa-gear"></span>
                            </button>
                            <ul class=" hove dropdown-menu multi-level" role="menu">
                                <li class=" hove dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">SippreAs</a>                      
                                <li><a href="#">Soporte</a></li>                                
                            </ul>
                        </div>
                    </li>
<?php else: ?>   
                 <li class="hov dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><samp class="fa fa-user fa-lg" ></samp> &nbsp;<?php echo $this->Session->read('Auth.User.username');?> <b class="caret"></b></a>
                                        
              <ul class=" hove dropdown-menu">
                 <li>
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>'.' '.'Mi perfil',array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')),array('escape'=>false))?>
                
                 </li>
                  <li class="divider"></li>
                  <li>
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span>'.' '.'Desconectar',array('controller'=>'users','action'=>'logout'),array('escape'=>false))?>
                 </li>
              </ul>
            </li>
                   
                    
<?php endif; ?>

            </ul>

        </div>        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

