
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
        <div  id="edid"style="padding-bottom: 100%; padding-top:10em; margin-left: -15px; margin-right: -15px "></div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-10">
    <div style="margin-bottom: 5em;">
    <h3 style="color: #666" ><?php echo ('Administracion de Documentos'); ?></h3>
    <?php echo $this->Session->flash(); ?>    
    <hr class="colorgraph">
    <?php echo $this->Html->link(('+ Añadir nuevo documento'), array('action' => 'add','admin'=>false), array('class' => "btn btn-success btn-sm pull-left")); ?></li>           
    </div>
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-bars"></span> Lista de Documentos</h3>
            <div class="pull-right">
                <button class="btn btn-info btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Buscar</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="filters">                        
                        <th><?php echo $this->Paginator->sort('id', '<input type="text" class="form-control input" placeholder="Id " disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('name', '<input type="text" class="form-control input" placeholder="Nombre" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('user_id', '<input type="text" class="form-control input" placeholder="Usuario" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('created', '<input type="text" class="form-control input" placeholder="Fecha de creación" disabled>', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', '<input type="text" class="form-control input" placeholder="Fecha de edición" disabled>', array('escape' => false)); ?></th>                        
                        <th><?php echo $this->Paginator->sort('Exp'); ?></th>
                        <th><?php echo $this->Paginator->sort('Ver'); ?></th>
                        <th><?php echo $this->Paginator->sort('Edi'); ?></th>
                        <th><?php echo $this->Paginator->sort('Eli'); ?></th>
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
                        
                    <?php foreach ($datos as $dato): ?>
                        <tr>  
                            <td><?php echo h($dato['Dato']['id']); ?>&nbsp;</td>
                            <td><?php echo h($dato['Dato']['name']); ?>&nbsp;</td>  
                            <td>
                                    <?php echo $this->Html->link($dato['User']['name'], array('controller' => 'users', 'action' => 'view', $dato['User']['id'])); ?>
                            </td>
                            <td><?php echo h($dato['Dato']['created']); ?>&nbsp;</td>
                            <td><?php echo h($dato['Dato']['modified']); ?>&nbsp;</td>
                             <td >
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-folder-open" data-toggle="tooltip" data-placement="left" title="Ver informacion"></span>'), array('action' => 'excel', $dato['Dato']['id'],'admin'=>false), array('escape' => false)); ?>
                            </td>
                             <td >
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-folder-open" data-toggle="tooltip" data-placement="left" title="Ver informacion"></span>'), array('action' => 'view', $dato['Dato']['id'],'admin'=>false), array('escape' => false)); ?>
                            </td>
                           <td >
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil"  data-toggle="tooltip" data-placement="left" title="Editar informacion"></span>'), array('action' => 'edit',  $dato['Dato']['id'],'admin'=>false), array('escape' => false,'id'=>'col')); ?>
                            </td>
                            <td > 
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="left" title="Desactivar usuario"></span>'), array('action' => 'delete', $dato['Dato']['id'],'admin'=>false),  array('escape' => false, 'id' => "cole"), __('Esta seguro de eliminar el archivo %s?', $dato['Dato']['name'])); ?>
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
