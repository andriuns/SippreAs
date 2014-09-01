   <div class="container">
   <div class="jumbotron">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <fieldset>
            <?php echo $this->Session->flash(); ?>
            <h3>Restablecer contraseña</h3>           
            <hr class="colorgraph">
            <p style="padding: 0 0 0px 0;
                margin: 0;
                font-size: 15px;
                line-height: 20px;
                color: #666666;">
                Por favor, escribe tu dirección de correo electrónico. Recibirás un enlace de recuperación que te permitirá ingresar tu clave principal y resetear la contraseña de tu cuenta.
            </p>
          
            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
            <br>
            <div class="input-group">                                 
                 <span class="input-group-addon"><i class="fa  fa-envelope-o fa-fw"></i></span>
                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Ingresa tu correo')); ?>

            </div>
            <br>                          
           	<hr class="colorgraph">
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-6">
                     <button type="submit" class="btn btn-labeled btn-info">
                         <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>&nbsp;Enviar</button>

                </div>
               
            </div>
            <?php echo $this->Form->end();?> 
           
            <?php echo $this->Form->end();?> 
        </fieldset>

    </div>
</div>
</div>
       
</div>
<div style="margin-top: 10.9em;"><?php echo $this->element('footer'); ?></div>