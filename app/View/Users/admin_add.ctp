<div class="container">   
    <div class="row"> 
        <div class=" col-xs-12 col-md-3 "> 
            <div  id="edid"class="row">
                <?php
                echo $this->Html->image("LOGO1.png", array('class' => 'center', 'style' => ' height: 3em; display: block; margin: 2em 1em 2em 4em;',
                    "alt" => "Sippreas",
                    'url' => array('controller' => 'pages', 'action' => 'home2')
                ));
                ?>
            </div>
            <?php echo $this->element('navizquierda'); ?>
            <div id="edid" style="padding-bottom: 7em; padding-top:10em; margin-left: -15px; margin-right: -15px "></div>        
        </div>
        <div class="col-xs-12 col-sm-6 col-md-9">
            <div style="margin-bottom: 1.5em;">
                <h3 style="color: #666" ><?php echo ('Agregar usuarios'); ?></h3>
                <?php echo $this->Session->flash(); ?>    
                <hr class="colorgraph">
                <div class="dropdown">
                    <a class="btn dropdown-toggle btn-success" data-toggle="dropdown" href="#" >Acciones  <b class="caret"></b><span class="glyphicon glyphicon-wrench"></span></a>                                        
                    <ul class="dropdown-menu">                
                        <li><?php echo $this->Html->link('<span class="fa fa-group"></span>' . ' ' . 'lista de Usuarios', array('action' => 'index', $this->Form->value('User.id')), array('escape' => false)) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-5">     
            <fieldset>
                <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
                <label>Username:</label>
                <?php
                echo $this->Form->input('username', array('placeholder' => "Usuario", 'class' => 'form-control', 'data-toggle' => "tooltip", 'data-placement' => "left", 'title' => "Entre 5 y 15 caracteres",
                    'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>',
                    'afterInput' => '</div>'
                ));
                ?>	
                <br>
                <label>Nombre:</label>
                <?php
                echo $this->Form->input('name', array('placeholder' => "Nombre", 'class' => 'form-control',
                    'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>',
                    'afterInput' => '</div>'
                ));
                ?>	
                <br>
                <label>Apellido:</label>
                <?php
                echo $this->Form->input('lastname', array('class' => 'form-control', 'placeholder' => 'Apellido',
                    'beforeInput' => '<div class="input-group">  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>',
                    'afterInput' => '</div>'
                ));
                ?>
                <br>
                <label>Correo:</label>
                <?php
                echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Correo', 'value' => '',
                    'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-key fa-fw"></i></span>',
                    'afterInput' => ' </div>'));
                ?>            
                <br>
                <label>Contraceña:</label>
                <?php
                echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Digita una contraseña', 'value' => '', 'data-toggle' => "tooltip", 'data-placement' => "left", 'title' => "Entre 5 y 15 caracteres",
                    'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-key fa-fw"></i></span>',
                    'afterInput' => ' </div>'));
                ?>            
                <br>
                <label>Repita la contraseña:</label>
                <?php
                echo $this->Form->input('Confirmar contraseña', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'vuelva a escribir la contraseña',
                    'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-key fa-fw"></i></span>',
                    'afterInput' => ' </div>'));
                ?> 
                <br>
                <label>Activar:</label>
                <?php
                echo $this->Form->input('active', array('type' => 'checkbox', 'style' => 'margin-left: -2.8em;'));
                ?>              

                <label>Grupo:</label>

                <?php
                echo $this->Form->input('group_id', array('class' => "form-control"));
                ?>       
                <hr class="colorgraph">                   
                <div class="row center ">
                    <div class="col-xs-6 col-sm-6 col-md-6"> 
                        <button type="submit" class="btn btn-labeled btn-info">
                            <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>&nbsp;&nbsp;Registrar</button>

                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </fieldset>             
        </div>
    </div>
</div>

<div style=" padding-top: 2em">  <?php echo $this->element('footer'); ?></div>



