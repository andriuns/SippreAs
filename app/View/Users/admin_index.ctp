<div class="container">  
<div class="row">
    <div class=" col-xs-6 col-md-2"> 
         <div  id="edid"class="row">
        <?php
            echo $this->Html->image("LOGO1.png", array('class'=>'text-center','style' => 'height: 3em; display: block; margin: 2em 1em 2em 0.8em;',
                "alt" => "Sippreas",
                'url' => array('controller' => 'pages', 'action' => 'home2')
            ));
            ?>
    </div>
    <?php echo $this->element('navizquierda'); ?>
        <div  id="edid"style="padding-bottom: 6em; padding-top:10em; margin-left: -15px; margin-right: -15px "></div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-10">
    <div style="margin-bottom: 5em;">
    <h3 style="color: #666" ><?php echo ('Administracion de Usuarios'); ?></h3>
    <?php echo $this->Session->flash(); ?>    
    <hr class="colorgraph">
    <?php echo $this->Html->link(('+ Añadir nuevo usuario'), array('action' => 'add'), array('class' => "btn btn-success btn-sm pull-left")); ?></li>           
    </div>
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-th"></span> Lista de Usuarios</h3>
            <div class="pull-right">
                <button class="btn btn-info btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Buscar</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="filters">                        
                        <th><?php echo $this->Paginator->sort('name', '<input type="text" class="form-control input" placeholder="Nombre" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('lastname', '<input type="text" class="form-control input" placeholder="Apellido" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('username', '<input type="text" class="form-control input" placeholder="Usuario" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('email', '<input type="text" class="form-control input" placeholder="Correo" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('active', '<input type="text" class="form-control input" placeholder="Activo" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('group_id', '<input type="text" class="form-control input" placeholder="Grupo" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('ve'); ?></th> 
                        <th><?php echo $this->Paginator->sort('Ed'); ?></th>
                        <th><?php echo $this->Paginator->sort('El'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <style>
                            #col{
                                color:#47a447; 
                            }
                            #cole{
                                color:#e02222;; 
                            }
                            #col:hover{
                                color: #e02222;
                            }
                            #cole:hover{
                                color: #F09108;
                            }                            
                        </style>
                        
                    <?php foreach ($users as $user): ?>
                        
                        <tr>                           
                            <td><?php echo h($user['User']['name']); ?></td>
                            <td><?php echo h($user['User']['lastname']); ?></td>
                            <td><?php echo h($user['User']['username']); ?></td>
                            <td><?php echo h($user['User']['email']); ?></td>		
                            <td><?php echo h($user['User']['active']); ?></td>
                            <td>
                                <?php echo $this->Html->link($user['Group']['title'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                            </td>
                            <td >
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="left" title="Ver informacion"></span>'), array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
                            </td>
                        
                            <td >
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil"  data-toggle="tooltip" data-placement="left" title="Editar informacion"></span>'), array('action' => 'edit', $user['User']['id']), array('escape' => false,'id'=>'col')); ?>
                            </td>
                            <td >
                                <?php
                                if ($user['User']['active'] != 0) {
                                    echo $this->Html->link('<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="left" title="Desactivar usuario"></span>', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Esta seguro de desactivar la cuenta?','escape' => false, 'id' => "cole"));
                                } else {
                                    echo $this->Html->link("R", array('action' => 'activate', $user['User']['id']), array('escape' => false, 'class' => "label label-warning", 'data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Activar Usuario"));
                                }
                                ?>
                            </td>	

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>                
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    <h5>
                        Total Count <span class="label label-info"><?php
                            echo $this->Paginator->counter(array(
                                'format' => ('Pagina {:page} de {:pages}, Usuarios {:count}')
                            ));
                            ?></span></h5>
                </div>
                <div class="col-md-6">
                    <ul class="pull-right">
                        <?php
                        echo $this->element('pag');
                        ?>
                    </ul>
                </div>
            </div>
        </div>           
    </div>     
</div>  
</div>
</div>
     <div style="margin-top: 2em"><?php echo $this->element('footer'); ?></div>
<style>
    .back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
}
</style>
 <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" title="Click para subir." data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

 
<div id="lin"  class="tab-pane fade ">     
                    asdfa
                    <div id="jo" >                        
                </div>            
                </div>
                
<?php
$this->Js->get('#lin');
$this->Js->event('click', $this->Js->request(
                array('action' => 'admin_view', $this->Session->read('Auth.User.id')
                ), array(
            'update' => '#jo',
            'async' => true,
            'method' => 'post',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(array(
                'isForm' => false,
                'inline' => true
            ))
                )
));
?>
<?php echo $this->Js->writeBuffer(); ?>