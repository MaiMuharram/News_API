<?php
include('../models/news.php');

$news_model=new News();
//echo jason_encode($news_model->getRows());
if(isset($_POST&&!empty($_POST))){
   // echo $_POST['news_title'];
    //echo $_POST['news_content'];
    $news_model->news_title=$_POST['news_title'];
    $news_model->news_content=$_POST['news_content'];

    $news_model->news_title=strip_tags($news_model->news_title);
    $news_model->news_content=strip_tags($news_model->news_content);


   if( $news_model->addRow()){
       $feedback['code']=2090;
       $feedback['message']="successfull";
   }else{
    $feedback['code']=2000;
    $feedback['message']="failed";
   }

   echo json_encode($feedback);
}
else if(isset($_GET['detail_id'])){
    echo jason_encode($news_model->getSingleRows($_GET['detail_id']));
}
else{
    echo jason_encode($news_model->getRows());
}


?>