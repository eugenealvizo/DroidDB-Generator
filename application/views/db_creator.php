<?php
$firstLine = "public class ". ucfirst($tableName). "Repo extends Table{

private static final String TAG ='". $tableName . "';
private static final String TABLE_NAME = " . '"'.$tableName.'"'."; ";
echo $firstLine."\n\n\n";

$default1 = 'private static final String '. strtoupper($tableName) .'_ID = "id";
private static final String '. strtoupper($tableName).'_BASE_ID= "base_id";
private static final String '. strtoupper($tableName). '_DATE_ENTRY" = "date_entry";';
echo $default1."\n";
foreach($fieldName as $row) {
 echo "private static final String ". strtoupper($tableName) ."_".strtoupper($row). '="'.$row.'"'.";\n\n";
}

echo " @Override"."\n". " public String getTableStructure() {". "\n". "   return TABLE_STRUCTURE;". "\n" . "}". "\n\n\n".
     " @Override". "\n". " public String getName() {" . "\n". "   return TABLE_NAME;". "\n". "};"."\n\n\n";

echo "private static final String TABLE_STRUCTURE".'" CREATE TABLE " + TABLE_NAME + " ( "'." +
          ".strtoupper($tableName). "_ID + ".'"INTEGER PRIMARY KEY, "'." + " . "\n"
           .strtoupper($tableName). "_BASE_ID +".'"INTEGER, "'." + " ."\n"
           .strtoupper($tableName). "_DATE_ENTRY + ".'"TEXT, "'." + "."\n";


foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames) {
  echo "     ".strtoupper($tableName)."_".strtoupper($fieldNames). '+ "'.$typeNames.', "+'."\n";
  }

echo '"UNIQUE (" +'. strtoupper($tableName). "_BASE_ID + " ;

    if(is_array($checked)) {   
    foreach(array_combine($fieldName, $checked) as $fielIdNames => $checkeds2) { 
    if($checkeds2 == 'UNIQUE') {        
          echo ', " + "'.strtoupper($tableName).'"_BASE_ID "'.$fieldNames.' + " ';
        // break;
            } 
        }  
    }
echo ') ON CONFLICT REPLACE);" ;';


echo "\n\n"."public ".$tableName."HandlerArray parse".$tableName."(Cursor cursor) { 
    \n".$tableName."HandlerArray data = new ".$tableName."HandlerArray(); \n";
    echo"data.setBaseId(cursor.getInt(cursor.getColumnIndex(".strtoupper($tableName). "_BASE_ID"."); \n".
        "data.setDateEntry(cursor.getString(cursor.getColumnIndex(".strtoupper($tableName). "_DATE_ENTRY"."); \n";
foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames)  {
        if($typeNames == "INTEGER") {
            $typeNames = "Int";
           } else {
            $typeNames = "String";
         }   
      echo  "data.set".ucfirst($fieldNames)."(cursor.get".$typeNames."(cursor.getColumnIndex(".strtoupper($tableName)."_".strtoupper($fieldNames)."); \n";
     }
echo "return data; \n }";     

echo "\n\n\n". "  /** ===================== CRUD ================ **/". "\n\n";
$default3 = "public void add".ucfirst($tableName)."(".ucfirst($tableName)."Handler ".$tableName."HandlerArray) { 
  ContentValues values = new ContentValues();
  values.put (" .strtoupper($tableName)."_BASE_ID , ".$tableName."HandlerArray.base_id);
  values.put (" .strtoupper($tableName). "_DATE_ENTRY, ".$tableName."HandlerArray.date_modified);"."\n";
echo $default3;
foreach($fieldName as $row) {
echo "  values.put (".strtoupper($tableName).ucfirst($row).", ".$tableName."HandlerArray.".$row.");"."\n";
}
echo " return insert(values); \n} \n";

?>