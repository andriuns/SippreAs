
<h2>Array data source</h2>
<pre id="example1console" class="console">Click "Load" to load data from server</pre>
<p>Most of the people use <strong>array of arrays</strong> data source with Handsontable.</p>

<div id="example1" style="width: 600px; height: 300px; overflow: scroll" class="handsontable"></div>

<p>
    <button name="load">Load</button>
<button id="save">Save</button>
  <button name="dump" data-dump="#example1" title="Prints current data source to Firebug/Chrome Dev Tools">
                  Dump data to console
                </button>
    <button type="insertColumnButton" name="insertCol" title="Insert Column" onclick="insertColumn()">Insert Column</button>
</p>
<script>
$(document).ready(function () {
  
  var $container = $("#example1");
  var $parent = $container.parent();
  var $console = $("#example1console");
  var autosaveNotification;
  $container.handsontable({

    startRows: 15,
    startCols: 16,
    colHeaders: true,
    rowHeaders: true,
    minSpareRows: true,    
   // minSpareCols: 10,   
    columnSorting: true,
    manualColumnMove: true,
    manualColumnResize: true,
    contextMenu: true,
    persistentState: true
  });
  //alert()
var handsontable = $container.data('handsontable');


$parent.find('button[name=load]').click(function () {
 $.ajax({
    data: '<?php echo $this->Html->url('datos/datosget');?>',    
    dataType: 'json',
    type: 'GET',
    success: function (res) {
      handsontable.loadData(res.data);
      $console.text('Data loaded');
      
      var tmp = $container.data('handsontable').getData();
        console.log(JSON.stringify(tmp));
        var data = new Array(); 
         $container.handsontable('alter', 'insert_row', 0, 1,data);
         //$container.handsontable('getInstance').alter('insert_col');
         //$container.handsontable('alter', 'insert_col');       
         //$container.handsontable('alter', 'insert_col', 'sales', 5);
        
        for(var j=0; j<data.length;j++){
            data[j] = data[j].toUpperCase();
            $container.handsontable('setDataAtCell', 0, j, data[j]);
            
        }
         
      //$container.handsontable({colHeaders: data });
    }
    
  });
 
});
  
  
});
    function insertColumn() {
    
    $('#example1').handsontable('getInstance').alter('insert_col');
}

</script>
<button id="lin">
jej
</button>
<div id="jo">
    
</div>
<?php


$this->Js->get('#lin');
$this->Js->event('click',  $this->Js->request(
      array('controller'=>'Datos','action' => 'index'
      ),
      array(
          'update'=>'#jo',
          'async' => true,
          'method' => 'post',
          'dataExpression'=>true,
          'data'=> $this->Js->serializeForm(array(
              'isForm' => false,
              'inline' => true
          ))
          
      )
  ));

?>
<?php echo $this->Js->writeBuffer();?>