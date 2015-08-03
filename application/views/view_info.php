<?php $this->load->view('html/header'); ?>
<h2 class="section-header">Database</h2>
    <form>
      <span><input type="text" placeholder="Database Name" name="databaseName" id="databaseName"></span>
      <span><input type="text" placeholder="Table Name" name="tableName" id="tableName"></span>
      <span><input type="button" name="fire-new-field" value="Add New Field"></input></span><br><br>
      
      <div id="add-field">
        <div class="field-types" name="addField" id="addField0">
          <span><input type="text" placeholder="Field Name" name="fieldName" id="fieldName"></span>
          <span><select name="typeName">
            <option value="#" selected disabled>Select Type:</option>
            <option value="INTEGER">INTERGER</option>
            <option value="TEXT">TEXT</option>
            <option value="REAL">REAL</option>
            <option value="BLOB">BLOB</option>
          </select></span>
          <span><input type="checkbox" name="checkbox" id="checkbox" value="UNIQUE">UNIQUE</span>
        </div> <!-- /#add-field -->
      </div> <!-- /#add-field -->
    </form>
    <br>
    <span><input type="button" id="generate" name="generate" value="Generate"></input></span>
    <span><input type="button" id="handler" name="handler" value="Handler"></input></span>

<br/><br/>
<div>
  <textarea type="text" rows="50" cols="88" id="Idata"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;
  <textarea type="text" rows="50" cols="92" id="HandlerData"></textarea>
</div>


<script>
  // Add new field.
  $('[name=fire-new-field]').live('click', function() {
    var num = $('div[id=add-field] div').length;
    $('#add-field').append('<div class="field-types" name="addField" id="addField'+num+'"> <input type="text" placeholder="Field Name" name="fieldName" id="fieldName"> <select name="typeName"><option value="#" selected disabled>Select Type:</option><option value="INTEGER">INTERGER</option> <option value="TEXT">TEXT</option> <option value="REAL">REAL</option> <option value="BLOB">BLOB</option></select> <input type="checkbox" name="checkbox" id="checkbox" value="UNIQUE">UNIQUE <input type="button" value="Delete" name="remove-field"></input></div>');
  num--;
    $('#addField'+num).find('[name=fieldName]').val(); 
    $('#addField'+num).find('[name=typeName]').val();
    $('#addField'+num).find('[name=checkbox]').val();
  });

  // Remove field.
  $('[name=remove-field]').live('click', function() {
    $(this).parent().remove();
  });

  
  // Get data.
  $('[name=generate]').click(function(){
        var checked   = Array();
        var typeName  = Array();
        var fieldName = Array();
        var base_url  = 'http://localhost/framework/';
        var i;
        var arr               = new Array();
        var counter           = $('div[id=add-field] div').length; 
        var databaseName      = $('input#databaseName').val();
        var tableName         = $('input#tableName').val();
    for(i=0;i<counter;i++) {
        fieldName.push($('#addField'+i).find('[name=fieldName]').val());
        typeName.push($('#addField'+i).find('[name=typeName]').val());
        checked.push($('#addField'+i).find('[name=checkbox]:checked').val());
        };
    $("#Idata").load(base_url+'index/getInputData', {databaseName:databaseName, tableName:tableName, fieldName:fieldName, typeName:typeName, checked:checked}, function(data){
    
    });
});

  $('[name=handler]').click(function(){
        var checked = Array();
        var typeName = Array();
        var fieldName = Array();
        var base_url = 'http://localhost/framework/';
        var i;
        var arr               = new Array();
        var counter           = $('div[id=add-field] div').length; 
        var databaseName      = $('input#databaseName').val();
        var tableName         = $('input#tableName').val();
    for(i=0;i<counter;i++) {
        fieldName.push($('#addField'+i).find('[name=fieldName]').val());
        typeName.push($('#addField'+i).find('[name=typeName]').val());
        checked.push($('#addField'+i).find('[name=checkbox]:checked').val());
        };
    $("#HandlerData").load(base_url+'index/getInputData2', {databaseName:databaseName, tableName:tableName, fieldName:fieldName, typeName:typeName, checked:checked}, function(data){
    
    });
});


  </script>