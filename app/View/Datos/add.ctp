<style>
    #rowa{
        background-color: #f2f2f2;
        border-right: 2px solid #D9D6D6;
    }
    #rowb{
        background-color: #fff;
    }
       .htCore td.customClass {
    background: #1E90FF;
    color: #f8f8ff;
}
</style>

<div class="container-fluid">

    <div  class="row">
        <div  id="rowa" class="col-xs-12 col-md-7">
            <?php echo $this->Session->flash(); ?> 

            <div class="col-lg-12 text-center">
                <h3>Graficas sugeridas</h3>
                <hr>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <a href="portfolio-item.html">
                     Columnas
                    
                    <?php echo $this->Html->image('estadistica.png',array('class'=>'img-responsive img-home-portfolio'))?>
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <a href="portfolio-item.html">
                   Barras
                     <?php echo $this->Html->image('estadistica.png',array('class'=>'img-responsive img-home-portfolio'))?>
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <a href="portfolio-item.html">
                    Areas
                    <?php echo $this->Html->image('estadistica.png',array('class'=>'img-responsive img-home-portfolio'))?>
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <a href="portfolio-item.html">
                    Lineas
                    <?php echo $this->Html->image('estadistica.png',array('class'=>'img-responsive img-home-portfolio'))?>                 
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <a href="portfolio-item.html">
                    tarta
                    <?php echo $this->Html->image('estadistica.png',array('class'=>'img-responsive img-home-portfolio'))?>
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <a href="portfolio-item.html">
                    Dispercion
                     <?php echo $this->Html->image('estadistica.png',array('class'=>'img-responsive img-home-portfolio'))?>
                </a>
            </div>

           
           <div class="col-lg-12">   
                <input id="search_field2" type="search" placeholder="Search">
            <button class="btn btn-info" type="submit" name="save">Guardar</button>
                 <div class="input-group">   

                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                <?php echo $this->Form->input('name', array('id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Nombre del archivo', 'label' => false)); ?>
            </div>
                <div id="example1" style="overflow: scroll" class="handsontable"></div>
            </div>
            <script>
                $(document).ready(function() {
                    var $container = $("#example1");                    
                    var $parent = $container.parent();
                    var autosaveNotification;
                    $container.handsontable({
                        startRows: 14,
                        startCols: 14,
                        colHeaders: true,
                        rowHeaders: true,
                        minSpareRows: true,
                        // minSpareCols: 10,   
                        columnSorting: true,
                        manualColumnMove: true,
                        manualColumnResize: true,
                        contextMenu: true,
                        comments: true,
                        cell: true,                                   
                        manualRowResize: true,
                        persistentState: true,
                        search: {
          searchResultClass: 'customClass'
      }
                    });
                    //alert()
                    var handsontable = $container.data('handsontable');
                    $parent.find('button[name=save]').click(function() {
                        
                        var data = JSON.stringify(handsontable.getData());
                        var nombre = $("#titulo").val();                      
                        
                        $.post('<?php echo $this->Html->url('/datos/add'); ?>',{datos:data,name:nombre,user_id:"<?php echo $this->Session->read('Auth.User.id') ?>"},function(res){
                            console.log(res);
                        });
                       // alert("  "+nombre+"  "+data);
                    });
                    //var handsontable = $container.data('handsontable');

                });
                $('#search_field2').on('keyup', function (event) {
      var hot =  $('#example1').handsontable('getInstance');
  
      var queryResult = hot.search.query(this.value);
  
      console.log(queryResult);
  
      hot.render();
  });
                function insertColumn() {

                    $('#example1').handsontable('getInstance').alter('insert_col');
                }

            </script>
        </div>
        <div id="rowb" class="col-xs-12 col-md-5">
           <div id="graficaAdd"></div>
            
            <script>
            $(function () {
    $('#graficaAdd').highcharts({chart: {
            type: 'column'
        },
        title: {
            text: 'Reporte de ventas'
        },

        subtitle: {
            text: 'Periodo 2011-2013'
        },


        xAxis: {
            categories: ['Kia','Nissan','Toyota','Honda' ]
        },
       yAxis: {
           title: {
                text: 'Número de autos vendidos'
            }          
        },
        series: [{
            name: '2011',
            data: [10,11,12,13]

        }, {
            name: '2012',
           data: [20,11,14,13]

        }, {
            name: '2013',
           data: [30,15,14,13]       

        }]
    });
});
            </script>
           
        </div>

    </div>

</div>
<div style="margin-top: 2em"><?php echo $this->element('footer'); ?></div>













