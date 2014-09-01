<div class="container">  
    <div class="row">        
      <div class=" col-xs-6 col-md-3 "> 
           <div  id="edid"class="row">
        <?php
            echo $this->Html->image("LOGO1.png", array('class'=>'text-center','style' => ' height: 3em; display: block; margin: 2em 1em 2em 4em;',
                "alt" => "Sippreas",
                'url' => array('controller' => 'pages', 'action' => 'home2')
            ));
            ?>
    </div>
    <?php echo $this->element('navizquierda'); ?>
    </div>
           <div class="col-xs-12 col-sm-6 col-md-9">
        <div style="margin-bottom: 1em;">
            <h3 style="color: #666" ><?php echo ('Informacion del usuario '); ?></h3>
               
            <hr class="colorgraph">
                    
            <div class="dropdown">
                <a class="btn dropdown-toggle btn-success" data-toggle="dropdown" href="#" >Cuenta <b class="caret"></b><span class="glyphicon glyphicon-wrench"></span></a>                                        
                <ul class="dropdown-menu">                 
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-wrench"></span>' . ' ' . 'Editar', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('escape' => false)) ?></li>
                    <li class="divider"></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span>' . ' ' . 'Eliminar usuario', array('controller' => 'users', 'action' => 'delete', $this->Session->read('Auth.User.id')), array('confirm' => 'Esta seguro de eliminar la cuenta?', 'escape' => false)) ?></li>
                    <li class="divider"></li>
                    <li><?php echo $this->Html->link('<span class="fa fa-group"></span>' . ' ' . 'Lista de usuaros', array('controller' => 'users', 'action' => 'index', $this->Session->read('Auth.User.id')), array('escape' => false)) ?></li>

                </ul>
            </div>
        </div>
    
    
      <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-9">
          
            <h4><?php echo h($user['User']['name']); ?>&nbsp;<?php echo h($user['User']['lastname']); ?></h4>

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td id="col">Id de Usuario:</td>
                        <td>&nbsp;<?php echo h($user['User']['id']); ?></td>
                    </tr>
                    <tr>
                        <td id="col">Usuario:</td>
                        <td>&nbsp;<?php echo h($user['User']['username']); ?></td>
                    </tr>
                    <tr>
                        <td id="col">Correo:</td>
                        <td>&nbsp;<a href=""><?php echo h($user['User']['email']); ?></a></td>
                    </tr>
                   
                    <tr>
                        <td id="col">Grupo:</td>
                        <td>&nbsp;<?php echo h($user['Group']['title']); ?></td>
                    </tr>
                    <tr>
                        <td id="col">Fecha de creación:</td>
                        <td>&nbsp;<?php echo h($user['User']['created']); ?></td>
                    </tr>
                    <tr>
                        <td id="col">Fecha de modificación:</td>
                        <td>&nbsp;<?php echo h($user['User']['modified']); ?></td>
                    </tr>
                     <tr>
                        <td id="col">Estado:</td>                        
                        <td>
                            <?php if ($user['User']['active'] == 1):?>
                            <div style="color:#46b8da;">&nbsp;Activo</div>
                            <?php else:?>
                            <div style="color:#F09108;">&nbsp;No activo</div>
                            <?php endif;?>
                          

                        </td>

                    </tr>
                </tbody>
            </table>

        </div>
      
         
        </div>
    </div>   
</div>
</div>
<div style="margin-top:2em;"><?php echo $this->element('footer'); ?></div>






