<?php

class tempData{
  public $Link='';
  function __construct($value1, $value2){
    $this->connect();
    $this->storeInDB($value1, $value2);
  }

  function connect(){
    $this->link = mysqli_connect('localhost','u750376384_pentatronics','w/4jT0owsDD') or die('Cannot connect to the DB');
    mysqli_select_db($this->link,'u750376384_polyseg') or die('Cannot select the DB');
  }

  function storeInDB($value1, $value2){
    $query = "insert into tempData set value1='".$value1."', value2='".$value2."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
  }

}

if($_GET['value1'] != '' and $_GET['value2'] != ''){
  $tempData = new tempData($_GET['value1'],$_GET['value2']);
}

?>