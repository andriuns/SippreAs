<div class="container">
<div class="jumbotron">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6">
        <fieldset>
            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
            <?php echo $this->Session->flash(); ?>
            <h3>Crear tu cuenta <small>gratis.</small></h3>
            <hr class="colorgraph">
            <div class="row">                            
                <div class="col-xs-12 col-sm-6 col-md-6">
                     <?php
                    echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nombre',
                        'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-user fa-fw"></i></span>',
                        'afterInput' => ' </div>'));
                    ?>                  
                    
                </div>                                                        
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">                                                                    
                        <?php echo $this->Form->input('lastname', array('class' => 'form-control', 'placeholder' => 'Apellido')); ?>
                    </div>
                </div>
            </div>
            <?php
            echo $this->Form->input('username', array('placeholder' => "Nombre de usuario", 'class' => 'form-control', 'data-toggle'=>"tooltip", 'data-placement'=>"right" ,'title'=>"Entre 5 y 15 caracteres",
                'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>',
                'afterInput' => '</div>'
            ));
            ?>	
            <br>
            <?php
            echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Correo electronico',
                'beforeInput' => '<div class="input-group">  <span class="input-group-addon"><i class="fa  fa-envelope-o fa-fw"></i></span>',
                'afterInput' => '</div>'
            ));
            ?>				
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?php
                    echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Contraseña',
                        'beforeInput' => '<div class="input-group"> <span class="input-group-addon"><i class="fa  fa-key fa-fw"></i></span>',
                        'afterInput' => ' </div>'));
                    ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">                                                       
                        <?php
                        echo $this->Form->input('Confirmar contraseña', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Vuelva a escribir contraseña','data-toggle'=>"tooltip", 'data-placement'=>"right" ,'title'=>"Entre 5 y 15 caracteres",
                        ));
                        ?>
                    </div>
                </div>
            </div>            
            <hr class="colorgraph">
            <div class="row ">
                <div class="col-xs-6 col-sm-6 col-md-6"> 
                <button type="submit" class="btn btn-labeled btn-info">
                    <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>&nbsp;Crear Cuenta</button>
                   
                </div>
               
            </div>
           <?php echo $this->Form->end(); ?>
        </fieldset>
    </div>
    <style>
        h5 {
font-size: 19px;
line-height: 28px;
font-family: sans-serif;
margin: 0;
padding: 0px 0 5px 0;
font-weight: normal;
color: #333333;

}

.register-st2-txt-block {
padding-top: 61px;
}
.register-st2-txt-block p {
padding: 0 0 10px 0;
margin: 0;
font-size: 15px;
line-height: 20px;
color: #666666;
}

    </style>
    <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="register-st2-txt-block">
			  <h5 class="main-italic-header">
				Tu contraseña es tu principal clave de cifrado.
			  </h5>
			  <p>
				La seguridad de tu cuenta depende de la fortaleza de tu contraseña. Las contraseñas demasiado cortas, demasiado simples o palabras del diccionario, pueden ser descubiertas con facilidad.
			  </p>
			  <h5 class="main-italic-header">
				No olvides tu contraseña.
			  </h5>
			  <p>
				No hay proceso de recuperación de contraseñas perdidas. Si no puedes recordar la tuya, no podrás acceder de nuevo a tu cuenta y tus datos almacenados.
			  </p>
			  <h5 class="main-italic-header">
				 Tu cuenta es tan segura como lo es tu PC.
			  </h5>			 
			  <p>
				No escribas tu contraseña en un dispositivo que no confíes plenamente. No ingreses a tu cuenta desde un ordenador público o compartido.
			  </p>
		   </div>
    </div>
</div>
</div>
</div>
<div style="margin-top: 4.5em;"><?php echo $this->element('footer'); ?></div>






