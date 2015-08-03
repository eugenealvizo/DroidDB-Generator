<?php

echo "public class ".ucfirst($tableName)."Handler{
	private final static String TAG =".'"'.ucfirst($tableName).'";
	int id;
	int base_id;
	String date_modified;
';
foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames) {
	if($typeNames == "INTEGER"){
	$typeNames = "Int";
	} else {
	$typeNames = "String";
	}
echo $typeNames." ".$fieldNames.";\n";
}


echo "\n\n". "  /** ===================== Default Constructor ================ **/". "\n\n";

echo "public ".ucfirst($tableName)."Handler(int id, int base_id, String date_modified, ";

$count = (count($typeName));
foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames) {
	if($typeNames == "INTEGER"){
	$typeNames = "int";
	} else {
	$typeNames = "String";
	}

 if($count == 1) {
	echo $typeNames." ".$fieldNames;
 } else {
	echo $typeNames." ".$fieldNames.", ";
 }
$count--;

}
echo "){\n";
echo "this.id = id;
this.base_id = base_id;
this.date_modified = date_modified;\n";

foreach($fieldName as $fieldNames) {
echo "this.".$fieldNames." = ".$fieldNames.";\n";
}

echo "}\n\n";


// 2nd Handler
echo "public ".ucfirst($tableName)."Handler(int base_id, String date_modified, ";

$count = (count($typeName));
foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames) {
	if($typeNames == "INTEGER"){
	$typeNames = "int";
	} else {
	$typeNames = "String";
	}

 if($count == 1) {
	echo $typeNames." ".$fieldNames;
 } else {
	echo $typeNames." ".$fieldNames.", ";
 }
$count--;

}
echo "){\n";
echo "this.base_id = base_id;
this.date_modified = date_modified;\n";

foreach($fieldName as $fieldNames) {
echo "this.".$fieldNames." = ".$fieldNames.";\n";
}

echo "}\n\n";


// Loop
foreach(array_combine($fieldName, $typeName) as $fieldNames => $typeNames) {
	if($typeNames == "INTEGER"){
	$typeNames = "int";
	} else {
	$typeNames = "String";
	}

echo "public String getid() {
return id;
}
public void setid(String id) {
this.id = id;
} 

public String getbase_id() {
return base_id;
}
public void setbase_id(String base_id) {
this.base_id = base_id;
}

public String getdate_modified() {
return date_modified;
}
public void setdate_modified(String date_modified) {
this.date_modified = date_modified;
}
";

echo "public ".$typeNames." get".$fieldNames."() {
	return ".$fieldNames.";
}
public void set".$fieldNames."(".$typeNames." ".$fieldNames.") {
	this.".$fieldNames." = ".$fieldNames.";
}\n\n"

;
}