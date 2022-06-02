<?php

class weightData{
  public $Link='';
  function __construct($value1, $value2, $value3, $value4){
    $this->connect();
    $this->storeInDB($value1, $value2, $value3, $value4);
  }

  function connect(){
    $this->link = mysqli_connect('localhost','u750376384_pentatronics','w/4jT0owsDD') or die('Cannot connect to the DB');
    mysqli_select_db($this->link,'u750376384_polyseg') or die('Cannot select the DB');
  }

  function storeInDB($value1, $value2, $value3, $value4){
    $query = "insert into weightData set value1='".$value1."', value2='".$value2."', value3='".$value3."', value4='".$value4."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
  }

}

if($_GET['value1'] != '' and $_GET['value2'] != '' and $_GET['value3'] != '' and $_GET['value3'] != ''){
  $weightData = new weightData($_GET['value1'],$_GET['value2'],$_GET['value3'],$_GET['value4']);
}

?>