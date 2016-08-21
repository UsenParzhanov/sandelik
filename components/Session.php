<?php

/**
 * Description of Session
 *
 * @author Usen
 */
class Session {
    
    
    
    
    public function checkSession() {
        
        session_start();
        $userData = Login::getUsernames();
        
        
        if(isset($_COOKIE['u_name']) && isset($_COOKIE['u_password']) ){
           
            $_SESSION['user_name'] = $_COOKIE['u_name'];
            $_SESSION['user_password'] = $_COOKIE['u_password'];
//            $_SESSION['user_id'] = $_COOKIE['u_id'];
            
//        SEXXXXXXXXXXXXXX    
            
           
            
            foreach ($userData as $data){
                        
            if($_SESSION['user_name'] == $data['user_name']){
                $_SESSION['user_id'] = $data['user_id'];
                setcookie('u_id', $_SESSION['user_id'], time()+3600,'/');    
            } 
            
            }
            
     
            
            
            
//        SEXXXXXXXXXXXXXXX  
            
        }
 
        
        if(isset($_SESSION['user_name']) && isset($_SESSION['user_password'])){
           
           return true;
            
        }  else {
            header('Location: index');
        }
 
        
    }
    
    
    
    public function signInSession(){
        
        $userData = Login::getUsernames();
        
        if(isset($_SESSION['user_name'])){
            header('Location: main');
            exit();
        }
        
        
        if(isset($_POST['user_name']) && isset($_POST['user_password'])){
            
            if(empty($userData)){
                header('Location: index');
            }
            
            
            foreach ($userData as $data){
                        
            if($_POST['user_name'] == $data['user_name'] && $_POST['user_password'] == $data['user_password']){
                $_SESSION['user_name'] = $_POST['user_name'];
                $_SESSION['user_password'] = $_POST['user_password'];
//                $_SESSION['user_id'] = $data['user_id'];
                $u_n = $_POST['user_name'];
                $u_p = $_POST['user_password'];
                setcookie('u_name', $u_n, time()+3600,'/');
                setcookie('u_password', $u_p, time()+3600,'/');
//                setcookie('u_id', $_SESSION['user_id'], time()+3600,'/');
                
                header('Location: main');
                
            }  else {
                header('Location: index');
            }
            
            }
            
        }
        
        header('Location: index');
    }
    
    
    public function signUpSession(){
        
        
        $userData = Login::getUsernames();
        
        if(isset($_POST['user_name']) or isset($_POST['user_password'])){
            if($_POST['user_name']=='' or $_POST['user_password']==''){
            header('Location: index');
            exit();
        }
        }
        
        
        
        
        if(isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['submitUP'])){
             
          
               foreach ($userData as $data){
                     
                if($data['user_name'] == $_POST['user_name'] or $_POST['user_name']=='' or $_POST['user_password'] == ''){
                    header('Location: index');
                    exit();
                }           
                }
          
                $db = Db::DbConnection();
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $db->prepare("INSERT INTO users (user_name, user_password,user_surname,user_sex,image_path)VALUES (:user_name, :user_password, :user_surname, :user_sex, :image_path)");
                $stmt->bindParam(':user_name', $user_name);
                $stmt->bindParam(':user_password', $user_password);
                $stmt->bindParam(':user_surname', $user_surname);
                $stmt->bindParam(':user_sex', $user_sex);
                $stmt->bindParam(':image_path', $image_path);
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $user_surname = 0;
                $user_sex = 0;
                $image_path = 'user-photo.png';
                $stmt->execute();
           
                $_SESSION['user_name'] = $_POST['user_name'];
                $_SESSION['user_password'] = $_POST['user_password'];
  
                
                $u_n = $_SESSION['user_name'];
                $u_p = $_SESSION['user_password'];
                
                
                setcookie('u_name', $u_n, time()+3600,'/');
                setcookie('u_password', $u_p, time()+3600,'/');
                
                header('Location: main');
                
         }
        header('Location: main');
    }


    
    
    public function checkIndex(){
        
        if(isset($_COOKIE['u_name']) && isset($_COOKIE['u_password'])){
            header('Location: main');
        }
        
    }
    
    
    
    
    public function exitSession(){
        
        
        if(isset($_SESSION['user_name']) && isset($_SESSION['user_password']) && isset($_SESSION['user_id'])){
            $u_n = $_SESSION['user_name'];
            $u_p = $_SESSION['user_password'];
            $u_id = $_SESSION['user_id'];
            setcookie('u_name', $u_n, time()-3600,'/');
            setcookie('u_password', $u_p, time()-3600,'/');
            setcookie('u_id', $u_id, time()-3600,'/');
            session_destroy();
        }
        
        header('Location: index');
        
        
    }
    
    
}
