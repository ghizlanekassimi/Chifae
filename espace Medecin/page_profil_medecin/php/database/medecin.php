<?php


class Medecin {
     public $db;
     
     public function __construct(DBController $db){
         if(!isset($db->con)) return null;
         $this->db = $db;
     }
 
     public function getData($table ='medecin',$email){
         $result = $this->db->con->query("select * from {$table} where gmail='{$email}' ");
         $resultArray = array();
         //fetch data one by one
         while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
             $resultArray[] = $item;
         }
         return $resultArray;
     }

    public function deleteData($table="medecin",$column,$email){
        
        $result = mysqli_query($this->db->con,"UPDATE {$table} SET {$column} =NULL WHERE `gmail`='{$email}';");
        if($result){
            // echo "deleted succefuly";
        }
        else{
            // echo "nope";
        }
        return $result;
    }
 public function deleteDataHoraires($email){
    
        // echo "IAM WORKING BABYY" ;
        $result = mysqli_query($this->db->con,"UPDATE medecin SET Horaires = '00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00'  WHERE `gmail`='{$email}';");
        if($result)
        {
            $res = [
                'status' => 200,
                'message' => 'la donnee est supprimé'
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
    
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Une erreur est survenue'
            ];
            echo json_encode($res);
            return;
        }
 }

     public function displayData($table ,$column,$email){
        $result = $this->db->con->query("select {$column} from {$table} where gmail = '{$email}' ");
         $resultArray = array();
         //fetch data one by one
         while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
             $resultArray[] = $item;
         }
         $string = $resultArray[0][$column];
         if($column == 'specialites') {
         $arrayspec = explode("\r\n",$string);}
         elseif($column == 'experience') {
            $arrayspec = explode(".",$string);
         }
        elseif($column == 'diplome') {
                $arrayspec = explode(".",$string);
         }
         elseif($column == 'horaires') {
            $arrayspec = explode("\r\n",$string);
     } elseif ($column == 'maladieTraite'){
         
             $arrayspec = explode("\r\n",$string);}
     
         else{
            $arrayspec = explode(" ",$string);
         }
        
         return $arrayspec;
     }
    
    public function insertInto($params=null,$table = 'medecin'){
        if($this->db->con !=null){
            if($params !=null){
                //get table columns
                $columns = implode(',',array_keys($params));
                echo "column";
                print_r($columns);
                $values = "'".implode("','",array_values($params))."'";
                echo "value";
                print_r($values);
                $query_string = sprintf("insert into %s (%s) values (%s)",$table,$columns,$values);
                 $res = $this->db->con->query($query_string);
                if($res){
                    echo "data succefully inserted";
                }
            }
        }
    }
    public function update($id=null,$data=array(),$table='medecin',$choix){
        if($this->db->con != null){
            if($id !=null && isset($data)){
                if($choix == "information"){
                $query_string = sprintf("update {$table} set nom = '%s' ,prenom = '%s' , gmail = '%s',numero = '%s' , ville = '%s',adresse = '%s',motdepasse = '%s'  where id = '%d' ",$data['nom'],$data['prenom'] ,$data['gmail'] ,$data['numero'], $data['ville'],$data['adresse'],$data['motdepasse'],$id);
                $res =$this->db->con->query($query_string); 
                if($res){
                    
    //                     echo "<script>
                  
    //               swal({
    //                   title: 'tarif est bien modifié',
    //                   text: '',
    //                   icon: 'success',
                      
    //               });
                  
    //   </script>";
                 
                }   
            }  
                
                                                    
            }
        }
    } 
    //if the input value is empty then  we replace it with its old value in the database 
    public function verifyEmpty($champ,$column){
        if(!isset($_REQUEST[$column]) || strlen(trim($_REQUEST[$column])) == 0){
            
            $result = $this->db->con->query("select {$column} from medecin where id='1' ");
            $resultArray = array();
            //fetch data one by one
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
                
            }
            $champ = $resultArray[0][$column];
            return $champ;
            
        }
        else{
            //if the value in the input is not empty then we do nothing
            return $champ;
        }
    }
     //this function to add the new value to others values in database
    public function ajout($array,$for,$choix){
        if($array[0] == ""){
            $array[0] = $for;
            $query_string = "update medecin set $choix = '{$array[0]}' where id='1' ";
            $res =$this->db->con->query($query_string); 
           if($res){
             echo" <script>
             
             swal({
                 title: 'updated successfully!',
                 text: '',
                 icon: 'success',
                 
               });
               
 </script>
 ";
 
            return;
        }}
        
        if($for == "") {
            return;
        }
       else{ array_push($array,$for); 
        if($choix == 'experience'){
        $formation =implode(".",$array);
        }
        elseif($choix == 'specialites') {
            $formation =implode("\r\n",$array);
        }
        elseif($choix == 'diplome'){
            $formation =implode(".",$array);
        }
        else {
            $formation =implode(" ",$array);
        }
        $query_string = "update medecin set $choix = '{$formation}' where id='1' ";
           $res =$this->db->con->query($query_string); 
          if($res){
            echo" <script>
            
            swal({
                title: 'updated successfully!',
                text: '',
                icon: 'success',
                
              });
              
</script>
";


          }
          
        }
    }
    

        
      public function updateTarif($typeTarif,$value){
        if($value == ""){
            return;
        }
        else {$query_string = "update medecin set $typeTarif = '{$value}' where id='1' ";
        $res =$this->db->con->query($query_string); 
       if($res){
        echo" <script>
            
        swal({
            title: 'tarif est modifié!',
            text: '',
            icon: 'success',
            
          });
          
</script>
";

              }}
      }

         //pour changer les horaires
      public function changeHoraire($arrayHoraires,$entree,$sortie,$choix){
        
         if(($entree == "") || ($sortie == "")) {
           return;
         }
         
        else{
            if($choix == 'Lundi') {
            $arrayHoraires[0] =$entree." - ".$sortie;
          }
         elseif($choix == 'Mardi') {
             $arrayHoraires[1] =$entree." - ".$sortie;
         }
         elseif($choix == 'Mercredi'){
             $arrayHoraires[2] =$entree." - ".$sortie;
         }
         elseif($choix == 'Jeudi'){
             $arrayHoraires[3] =$entree." - ".$sortie;
         }
         elseif($choix == 'Vendredi'){
             $arrayHoraires[4] =$entree." - ".$sortie;
         }
         elseif($choix == 'Samedi'){
            $arrayHoraires[5] =$entree." - ".$sortie;
        }
        elseif($choix == 'Dimanche'){
            $arrayHoraires[6] =$entree." - ".$sortie;
        }
         }
         $formation =implode("\r\n",$arrayHoraires);
         $query_string = "update medecin set Horaires = '{$formation}' where id='1' ";
         $res =$this->db->con->query($query_string); 
         if($res){
            echo "<script>
                  
            swal({
                title: 'Horaire est bien modifié',
                text: '',
                icon: 'success',
                
            });
            
</script>";
              }
             }


             public function UpdateH($arrayHoraires,$arrayEntree,$arraySortie){
                $tab = array();
                for($i=0;$i<count($arrayHoraires);$i++){
                    if(($arrayEntree[$i]=="") || ($arraySortie[$i] == ""))
                    $tab[$i] = $arrayHoraires[$i];
                else{
                    $arrayHoraires[$i] = $arrayEntree[$i]." - ".$arraySortie[$i];
                }
            }
                
                for($i=0;$i<count($arrayHoraires);$i++){
                    if($arrayHoraires[$i] == ""." - ".""){
                        $arrayHoraires[$i] =$tab[$i];
                    }

                }
                $formation =implode("\r\n",$arrayHoraires);
                $query_string = "update medecin set Horaires = '{$formation}' where id='1' ";
                $res =$this->db->con->query($query_string); 
                if($res){
                   echo "<script>
                  
                    swal({
                        title: 'Horaires est bien modifié',
                        text: '',
                        icon: 'success',
                        
                    });
                    
        </script>";
                     }
             }
       
      
    //   public function uploadImage(){
    //         if($_FILES["image"]["error"] == 4){
    //         echo
    //         "<script> alert('Image Does Not Exist'); </script>"
    //         ;
    //     }
    //     else{
    //         $fileName = $_FILES["image"]["name"];
    //         $fileSize = $_FILES["image"]["size"];
    //         $tmpName = $_FILES["image"]["tmp_name"];

    //         $validImageExtension = ['jpg', 'jpeg', 'png'];
    //         $imageExtension = explode('.', $fileName);
    //         $imageExtension = strtolower(end($imageExtension));
    //         if ( !in_array($imageExtension, $validImageExtension) ){
    //         echo
    //         "
    //         <script>
    //             alert('Invalid Image Extension');
    //         </script>
    //         ";
    //         }
    //         else if($fileSize > 1000000){
    //         echo
    //         "
    //         <script>
    //             alert('Image Size Is Too Large');
    //         </script>
    //         ";
    //         }
    //         else{
    //         $newImageName = uniqid();
    //         $newImageName .= '.' . $imageExtension;

    //         move_uploaded_file($tmpName, 'img/' . $newImageName);
    //         $query = "INSERT INTO medecin (photo) VALUES('', '$name', '$newImageName') where id='1'";
    //         $res = $this->db->con->query($query);
    //        if($res){
    //         echo
    //         "
    //         <script>
    //             alert('Successfully Added');
    //         </script>
    //         ";
    //         }
    //     }
        
    //   }
    // }

   
} 
   ?>