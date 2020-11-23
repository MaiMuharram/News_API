<?php
include('../db_config.php');
class News{
public $detail_id;
public $news_title;
public $news_img;
public $news_date;
public $news_content;
public $news_id;
public $database;


function __construct(){
    $this->database=new DBConfig();
}

function getRows(){
    $pdo=$this->database->connect();

   $stmt= $pdo->prepare("select * from news_details");
   $stmt->execute();

   //return $stmt->fetchAll(PDO::FETCH_OBJ);
   $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
   $data=array();
   foreach($rows as $row){
      $content['detail_id']=$row->detail_id;
      $content['news_title']=$row->news_title;
      $content['news_date']=$row->news_date;

      array_push($data,$content);
   }
   return $data;

}

function getSingleRows($id){
    $pdo=$this->database->connect();

   $stmt= $pdo->prepare("select * from news_details where detail_id=?");
   $stmt->execute($id);

   return $stmt->fetchAll(PDO::FETCH_OBJ);
 
   }



function addRow($data){
    $pdo=$this->database->connect();
    $stm=$pdo->prepare('insert into news_details values(null,?,?,now(),?,?)');
    $stmt->execute([$this->news_title,$this->news_content]);
//catch(PDOException $ex){return false}
}

function updateRow($id){


}

function deleteRow($id){

}

}


?>