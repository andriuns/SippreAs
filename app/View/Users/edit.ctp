<div class="container">
   
<div class="row">
     <div class=" col-xs-12 col-md-3 "> 
         <div  id="edid"class="row">
        <?php
            echo $this->Html->image("LOGO1.png", array('class'=>'center','style' => ' height: 3em; display: block; margin: 2em 1em 2em 4em;',
                "alt" => "Sippreas",
                'url' => array('controller' => 'pages', 'action' => 'home2')
            ));
            ?>
    </div>
        <?php echo $this->element('navizquierda'); ?>
        </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
        <div style="margin-bottom: 1em;">
            <h3 style="color: #666" ><?php echo ('Editar informacion'); ?></h3>
            <?php echo $this->Session->flash(); ?>    
            <hr class="colorgraph">
            <div class="dropdown">
                <a class="btn dropdown-toggle btn-success  " data-toggle="dropdown" href="#" >Cuenta <b class="caret"></b><span class="glyphicon glyphicon-wrench"></span></a>                                        
                <ul class="dropdown-menu">                
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>' . ' ' . 'Ver perfil', array('action' => 'view', $this->Form->value('User.id')), array('escape' => false)) ?></li>
                    <li class="divider"></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span>' . ' ' . 'Eliminar cuenta', array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => 'Esta seguro de eliminar la cuenta?', 'escape' => false)) ?></li>
                    
                </ul>
            </div>
        </div>
    </div>
     <div class="col-xs-12 col-sm-6 col-md-5"> 
        <fieldset>
            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false,'class'=>'form-control'))); ?>
            <?php echo $this->Session->flash(); ?>
            
            <label>Usuario:</label>
            <?php           
            echo $this->Form->input('id');            
            echo $this->Form->input('username', array('placeholder' => "Usuario",'data-toggle'=>"tooltip", 'data-placement'=>"left" ,'title'=>"Entre 5 y 15 caracteres",
                'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa fa-group fa-fw"></i></span>',
                'afterInput' => '</div>'
            ));
            ?>	
            <br>
           <label>Nombre:</label>
            <?php
            echo $this->Form->input('name', array('placeholder' => "Nombre",
                'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>',
                'afterInput' => '</div>'
            ));
            ?>	
            <br>
            <label>Apellido:</label>
            <?php
            echo $this->Form->input('lastname', array('placeholder' => 'Apellido',
                'beforeInput' => '<div class="input-group">  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>',
                'afterInput' => '</div>'
            ));
            ?>
            <br>
            <label>Contraceña nueva:</label>
            <?php
                    echo $this->Form->input('password', array('placeholder' => 'Nueva contaceña','value'=>'', 'data-toggle'=>"tooltip", 'data-placement'=>"left" ,'title'=>"Entre 5 y 15 caracteres",
                        'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-key fa-fw"></i></span>',
                        'afterInput' => ' </div>'));
                    ?>            
            <br>
            <label>Repita la contraseña:</label>
            <?php
                    echo $this->Form->input('Confirmar contraseña', array('type'=>'password','placeholder' => 'vuelva a escribir la contraseña',
                        'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-key fa-fw"></i></span>',
                        'afterInput' => ' </div>'));
                    ?>       
            <hr class="colorgraph">
           
            <div class="row center ">
               <div class="col-xs-6 col-sm-6 col-md-6"> 
                <button type="submit" class="btn btn-labeled btn-info">
                    <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>&nbsp;&nbsp;Actualizar</button>
                   
                </div>
               
            </div>
           <?php echo $this->Form->end(); ?>
        </fieldset>
    </div>
    </div>
       </div>
      
    <div style="margin-top: 2em;"><?php echo $this->element('footer'); ?></div>

