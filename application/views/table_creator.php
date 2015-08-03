<?php
$firstLine = "public class ". ucfirst($databaseName). "Repo extends Table{

private static final String TAG =". $databaseName . "
private static final String TABLE_NAME = " . '"'.$tableName.'"'."; ";
echo $firstLine."\n\n\n";



$default1 = 'private static final String '. strtoupper($databaseName) .' _ID = "id";
private static final String '. strtoupper($databaseName). '"_BASE_ID = "base_id";
private static final String '. strtoupper($databaseName). '"_DATE_ENTRY" = "date_modified";';
echo $default1."\n";
foreach($fieldName as $row) {
 echo "private static final String". strtoupper($databaseName) .strtoupper($row). '="'.$row.'"'.";\n";
}

echo " @Override"."\n". "public String getTableStructure() {". "\n". "return TABLE_STRUCTURE;". "\n" . "}". "\n\n\n".
	 " @Override". "\n". "public String getName() {" . "\n". "return TABLE_NAME;". "\n". "};"."\n\n\n";

echo "private static final String TABLE_STRUCTURE".'" CREATE TABLE " + TABLE_NAME + " ( "'." +
  				".strtoupper($databaseName). "+ ".'"INTEGER PRIMARY KEY, "'." + 
  				".strtoupper($databaseName). "_BASE_ID +".'"INTEGER, "'." + 
  				".strtoupper($databaseName). "_DATE_ENTRY + ".'"TEXT, "'." + ";


foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames) {
	echo strtoupper($databaseName)."_".strtoupper($fieldNames). '+ "'.$typeNames.',"+'."\n";
	}

echo '"UNIQUE (" +'. strtoupper($databaseName). "_BASE_ID' + " ;

    if(is_array($checked)) {   
    foreach(array_combine($fieldName, $checked) as $fieldNames => $checkeds2) { 
    if($checkeds2 == 'UNIQUE') {        
          echo ', " + "'.strtoupper($databaseName).'"_BASE_ID "'.$fieldNames.' + " ';
        // break;
            } 
        }  
    }
echo ') ON CONFLICT REPLACE);" ;';

echo "\n\n\n". "  /** ===================== CRUD ================ **/". "\n\n";
$default3 = "public void add".ucfirst($tableName)."(".ucfirst($tableName)."Handler ".$tableName."HandlerArray) { 
  SQLiteDatabase db = this.getWritableDatabase();
  ContentValues values = new ContentValues();
  values.put (" .strtoupper($databaseName).'"_BASE_ID , "'.$tableName."HandlerArray.base_id);
  values.put ( key_date_modified, ".$tableName."HandlerArray.date_modified);"."\n";
echo $default3;
foreach($fieldName as $row) {
echo "  values.put ( key_".$row.", ".$tableName."HandlerArray.".$row.");"."\n";
}
echo "  db.insert( table_".$tableName.", null, values);
  db.close();
}";










?>