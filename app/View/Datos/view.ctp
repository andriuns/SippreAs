<style>
    #rowa{
        background-color: #f2f2f2;
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
        <div id="rowa" class="col-xs-12 col-md-7">

            <h3 class="text-center">Gráficas recomendadas</h3>
<pre id="example1console" class="console">Click "Load" to load data from server</pre>
<p>Most of the people use <strong>array of arrays</strong> data source with Handsontable.</p>
<div>    
   <button class="maximize"><font><font class="">Maximizar la</font></font></button>
    <button name="load">Load</button>
     
    <button type="insertColumnButton" name="insertCol" title="Insert Column" onclick="insertColumn()">Insert Column</button>
    <input id="search_field2" type="search" placeholder="Search">
</div>
<div id="example1" style="width: 750px; height: 390px; overflow: auto" class="handsontable"></div>
<?php echo $this->Form->create('Dato'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dato'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('id'=>'titulo'));
	?>
	</fieldset>
<button name="edit" type="submit">edit</button> 
<button id="prueba">Seleccion</button>
<?php echo $this->Form->end(); ?>

<script>
var $container = $("#example1");
  var $parent = $container.parent();
  var $console = $("#example1console");
  var autosaveNotification;    
    
    var maxed = false
    , resizeTimeout
    , availableWidth
    , availableHeight
    , $window = $(window);
    
  
  var calculateSize = function () {
    if(maxed) {
      var offset = $container.offset();
      availableWidth = $window.width() - offset.left + $window.scrollLeft();
      availableHeight = $window.height() - offset.top + $window.scrollTop();
      $container.width(availableWidth).height(availableHeight);
    }
  };
  $window.on('resize', calculateSize);
    function editar(){
        var handsontable = $container.data('handsontable');
         $parent.find('button[name=edit]').click(function() {
             //alert("  "+nombre+"  "+data);
                        
                        var data = JSON.stringify(handsontable.getData());
                        var nombre = $("#titulo").val();                      
                        alert("  "+nombre+"  "+data);
                        $.post('<?php echo $this->Html->url(array('controller'=>'datos','action'=>'view',$this->Form->value('Dato.id'))); ?>',{datos:data,name:nombre,user_id:"<?php echo $this->Session->read('Auth.User.id') ?>"},function(res){
                            console.log(res);
                           alert("  "+nombre+"  "+data);  
                        });
                        //alert("  "+nombre+"  "+data);
                    });
    }
    
var handsontable;

$("#prueba").on("click",function(event){
    $("#htCore").clone().prependTo( "#oculto" );
    $("#oculto table").attr("id","tmp");

    $("#oculto div, #oculto colgroup, #oculto thead").remove();
    $.each($("#oculto th"), function(index, valor){
        if($(valor).html() == "" || $(valor).html() == null){
            $(valor).remove();
        }
    });
    $.each($("#oculto td"), function(index, valor){
        if($(valor).html() == "" || $(valor).html() == null){
            alert(index > 0);
            if(index > 0){
                //alert("___"+index);
                $(valor).remove();
            }
            
        }
    });

    event.preventDefault();
    $('#tab').highcharts({
        data: {
            table: document.getElementById('tmp')
        },
                chart: {
                     zoomType: 'xy'// zomm
                  // inverted: true, //invertir grafica
                   // type: 'column',
           
//            options3d: { //3d
//                enabled: true,
//                alpha: 15,
//                beta: 15,
//                depth: 50
//            }

           
        },
       
        title: {
            text: 'Data extracted from a HTML table in the page'
        },
        yAxis: {
            allowDecimals: false,//true para que se asignen decimales
            title: {
                text: 'Units'
            }
        },
                

            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
    });
});

function cargar () {
 handsontable = $container.data('handsontable');
 
 $.ajax({
    data: '<?php echo $this->Html->url('/datos/view');?>',    
    dataType: 'json',
    type: 'get',
    success: function (res) {
      handsontable.loadData(res.data);
      $console.text('Data loaded');
      
      /*var tmp = $container.data('handsontable').getData();
        console.log(JSON.stringify(tmp));
        var data = new Array(); 
         //$container.handsontable('alter', 'insert_row', 0, 1,data);
         //$container.handsontable('getInstance').alter('insert_col');
         //$container.handsontable('alter', 'insert_col');       
         //$container.handsontable('alter', 'insert_col', 'sales', 5);
        
        for(var j=0; j<data.length;j++){
            data[j] = data[j].toUpperCase();
            $container.handsontable('setDataAtCell', 0, j, data[j]);
            
        }*/
         
      //$container.handsontable({colHeaders: data });
    }
    
  });
 
}    
$(document).ready(function () {  
  
  $container.handsontable({
 //currentRowClassName:'currentRow',
   // currentColClassName: 'currentCol',
   search: {
          searchResultClass: 'customClass'
      },    
    startRows: 15,
    startCols: 15,
    colHeaders: true,
    rowHeaders: true,
    minSpareRows: true,    
   // minSpareCols: 10,   
    columnSorting: true,
    manualColumnMove: true,
    manualColumnResize: true,
    contextMenu: true,//[ 'row_above' , 'row_below' , 'remove_row','remove_col','hsep1','hsep2','hsep3','col_left','col_right' ],
    //comments: true,
    cell: true,
    persistentState: true
   
  });
  //alert()


//$parent.find('button[name=load]').click();
  
cargar(); 
editar();
  
});
$('#search_field2').on('keyup', function (event) {
      var hot = $container.handsontable('getInstance');
  
      var queryResult = hot.search.query(this.value);
      
      console.log(queryResult);
  
      hot.render();
  });
//maximizar tabla
 $('.maximize').on('click', function () {
    maxed = !maxed;
    if(maxed) {
      calculateSize();
    }
    else {
      $container.width(749).height(390);
    }
    $container.handsontable('render');
  });
  //insertar columna
    function insertColumn() {    
    $container.handsontable('getInstance').alter('insert_col');
    }

</script>
 </div>
        <div id="rowb" class="col-xs-12 col-md-5">
            <div id="tab"></div>
            <div id="oculto" style="display:none"></div>
        </div>

    </div>

</div>
<div style="margin-top: 2em"><?php echo $this->element('footer'); ?></div>


<?php echo $this->Html->script('data');?>

   