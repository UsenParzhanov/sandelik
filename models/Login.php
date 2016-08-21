<?php



/**
 * Description of Login
 *
 * @author Usen
 */
class Login {
    
    public static function getUsernames(){
        
        $db = Db::DbConnection();
        $result = $db ->query('SELECT user_name, user_password, id FROM users ORDER BY id');
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        
        $userData = array();
        $i = 0;
        
        while ($row = $result ->fetch()){
            $userData[$i]['user_name'] = $row['user_name'];
            $userData[$i]['user_password'] = $row['user_password'];
            $userData[$i]['user_id'] = $row['id'];
            $i++;
        }
        
        return $userData;
    }
    
    public static function oneUsername(){
        $db = Db::DbConnection();
        $result = $db ->query('SELECT id, user_name, user_password, user_surname, user_sex, image_path FROM users WHERE id='.$_SESSION["user_id"].'');
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        
        $userInfo = array();
       
        
        while ($row = $result ->fetch()){
            $userInfo['user_id'] = $row['id'];
            $userInfo['user_name'] = $row['user_name'];
            $userInfo['user_password'] = $row['user_password'];
            $userInfo['user_surname'] = $row['user_surname'];
            $userInfo['user_sex'] = $row['user_sex'];
            $userInfo['image_path'] = $row['image_path'];
        }
        
        return $userInfo;
    }
    
    public static function updateUsername(){
        
        $userInfo = self::oneUsername();
        
        
        
        
        if(isset($_POST["updateButton"]) && $_POST["name"]==!""){
            
            if($_POST["surname"]=="Введите вашу фамилию" or $_POST["surname"]==""){
                $_POST["surname"]=0;
            }
            
            if($_POST["sex"]=="Неважно"){
                $_POST["sex"]=0;
            }
            
            if($_FILES){
             $filename = $_FILES['uploadPhoto']['name'];
             $tmp_name = $_FILES['uploadPhoto']['tmp_name'];
             $location = "templates/images/users_ava/";
             
             if($filename==!""){
                 move_uploaded_file($tmp_name, $location.$filename);
                 $db = Db::DbConnection();
                 $stmt = $db->prepare('UPDATE users SET user_sex=:user_sex, user_surname=:user_surname, user_name=:user_name, image_path=:image_path WHERE id=' .$userInfo["user_id"].' ORDER BY id');                                  
                 $stmt->bindParam(":user_sex", $_POST["sex"], PDO::PARAM_STR);
                 $stmt->bindParam(":user_surname", $_POST["surname"], PDO::PARAM_STR);
                 $stmt->bindParam(":user_name", $_POST["name"], PDO::PARAM_STR);
                 $stmt->bindParam(":image_path", $filename, PDO::PARAM_STR);
                 $stmt->execute(); 
             }else{
                 $db = Db::DbConnection();
                 $stmt = $db->prepare('UPDATE users SET user_sex=:user_sex, user_surname=:user_surname, user_name=:user_name WHERE id=' .$userInfo["user_id"].' ORDER BY id');                                  
                 $stmt->bindParam(":user_sex", $_POST["sex"], PDO::PARAM_STR);
                 $stmt->bindParam(":user_surname", $_POST["surname"], PDO::PARAM_STR);
                 $stmt->bindParam(":user_name", $_POST["name"], PDO::PARAM_STR);
                 $stmt->execute(); 
             }
             
        }  
            
            
            
            
           
        }
        
    }
    
       public static function checkUpdateUsername(){
        
        
        if(isset($_POST["updateButton"])){
            
            if($_POST["name"]==""){
                $proverka = "<p class='proverk'>Заполните обязательные графы</p>";
                return $proverka;
            }else{
                $saved = "<p class='proverk'>Ваши изменения сохранены.</p>";
                return $saved;
            }

        }
        
    }
    
    
}
