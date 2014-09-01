<div class="container">
<div class="jumbotron">  
<div class="row">
    
    <div class="col-xs-12 col-sm-8 col-md-6">
        <fieldset>
            <?php echo $this->Session->flash(); ?>
            
                <h3>Iniciar Sesión</h3>
           
           
                <div  class="pull-right" style=" margin-top: -2.1em;" >
                    o <?php echo $this->Html->link('Crea una cuenta', 'registro', array('style' => 'text-decoration: none;')); ?>

                </div>

            <hr class="colorgraph">

            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
            <br>
            <div class="input-group">                                   
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Nombre de Usuario o Email','autofocus')); ?>

            </div>
            <br>                          
            <div class="input-group">                                    
                <span class="input-group-addon"><i class="fa  fa-key"></i></span> 
                <?php echo $this->Form->input('password', array('id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña'), array('escape' => false)); ?>
            </div>   

            <div>                
                <?php echo $this->Html->link('¿Has olvidado tu contraseña?', array('controller' => 'users', 'action' => 'recuperar'), array('class' => 'pull-right', 'style' => 'text-decoration: none;')); ?> 
            </div>
            <br>  
            <hr class="colorgraph">

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <button type="submit" class="btn btn-labeled btn-info">
                        Iniciar Sesión &nbsp;<span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span></button>
                    

                </div>
                 
            </div>
            <?php echo $this->Form->end();?> 
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
padding-top: 8.4em;
}
.register-st2-txt-block p {
padding: 0 0 30px 0;
margin: 0;
font-size: 15px;
line-height: 20px;
color: #666666;
}

    </style>
    <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="register-st2-txt-block">
			  <h5>
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
 
<div style="margin-top: 10.9em;"><?php echo $this->element('footer'); ?></div>