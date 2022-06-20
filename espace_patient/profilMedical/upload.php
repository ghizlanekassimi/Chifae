<?php
include '../../connexionDoc/cnx.php';
$success = false;
// $msgs = array();

$i=1;
//defines our variables as an empty values:
$name = $date = $add_by = $category = "";

//check empty file
if(empty($_FILES["file"]["size"]))
{
  $msgs="Veuillez choisir un fichier";
  $res = ['success'=>$success,
  'msgs' => $msgs];
  echo json_encode( $res );
  return;
 
}
//check the empty fields:
foreach($_POST as $key => $value)
{
  if(empty($value))
  {
    $msgs="Tous les champs sonts obligatoires";
        $res = ['success'=>$success,
        'msgs' => $msgs];
        echo json_encode( $res );
        return;
  }
}
//filter all the inputs and file input also: 
//==================================================
if((!empty($_POST) ) AND (!empty($_FILES["file"]["size"])))
{
    //test input function:
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $name = test_input($_POST["nom-docs"]);
    $date = test_input($_POST["docs-date"]);
    $add_by = test_input($_POST["added-by"]);
    $category = test_input($_POST["category"]);
     // testing the file info:
     $file_size = $_FILES["file"]["size"];
     $file_name = $_FILES["file"]["name"];
     $file_error = $_FILES["file"]["error"];
     $file_type = $_FILES["file"]["type"];
     $file_temp = $_FILES["file"]["tmp_name"];
     $file_new=  $name;
     $file_exten = explode('.', $file_name);
     $file_actual_exten = strtolower(end($file_exten));
     //allowed format: 
     $allowed = array('jpg', 'png', 'jpeg','pdf','doc','docx');  
     //extension check :
     //==================================
     if(in_array($file_actual_exten, $allowed))
      {
      //checking errors
        if($file_error===0)
        {
          //checking the file size 150MB: 
          if($file_size<150000000)
            {
              //give the new name to the file 
              $file_new_name = $file_new.".".$file_actual_exten;
              //======add a uniq id to uploaded file================================
              
             
              //===================check if file name exists already===========
            
              // $exist = mysqli_query($conn, "SELECT nomDoc FROM documents GROUP BY nomDoc  HAVING COUNT(*) > 1");
              //   if(mysqli_num_rows($exist)) {

              //    $nb=mysqli_num_rows($exist);
                 
              //     $file_new_name = $file_new."(".$nb.").".$file_actual_exten;
                 
              //   }
                 //give the file destination where it will be stored temporerly:
              $file_dest = 'uploads/'.$file_new_name;
              //===================================INSERT DATA TO DB==============================
              $doc_info = "INSERT INTO documents(nomDoc,date,ajoutPar,categorieDoc) VALUES ('$file_new_name','$date','$add_by','$category')";
              $addedInfo = mysqli_query($conn,$doc_info);     
              //========document added================ 
              if($addedInfo)
              {
                //move the file to uplaods folder : 
                move_uploaded_file( $file_temp , $file_dest );
                 $success = true;
                 $msgs="le document est ajoute 👌";

                 //get the id of the doc:
                 $idDoc = "SELECT idDoc FROM documents WHERE nomDoc = '$file_new_name'";
                 $docQuery= mysqli_query($conn,$idDoc); 
                 $id = mysqli_fetch_assoc($docQuery);
                 $res = ['success'=>$success,
                 'msgs' => $msgs,
                 'fileName'=> $file_name,
                 'name'=> $file_new_name,
                 'date'=>$date,
                 'added_by'=>$add_by,
                 'category'=>$category,
                 'id'=> $id];
                 echo json_encode( $res );
                 return;
             ;
              }
              // can't insert into db
              else
              {
                $msgs="une erreure est survenue, veuillez essayez ulterierement";
                $res = ['success'=>$success,
                 'msgs' => $msgs];
                 echo json_encode( $res );
                 return;
              }
              //=====================send the response to ajax===================
             
             }
            //=========================LARGE FILE SIZE=================================== : 
             else
             {
              $msgs="Fichier tres large , essayez de le compresser";
               $res = ['success'=>$success,
              'msgs' => $msgs];
             }
        } 
        // else of $_FILE["file"]["error"]!=0
        else
           {
            $msgs="une erreure est survenue, veuillez essayez ulterierement";
            $res = ['success'=>$success,
            'msgs' => $msgs];
            echo json_encode( $res );
            return;
           }
      } 
       // else of unallowed extension
       else
         {
          $msgs="le format de ce fichier est interdit";
          $res = ['success'=>$success,
          'msgs' => $msgs];
            echo json_encode( $res );
            return;

         }
  } 


// Send info back about the http response:


// print_r();

//============================

?>