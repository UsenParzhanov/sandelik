<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getListofzapis
 *
 * @author Usen
 */
class Zapisi{
    
    public static $proverka = "<p class='proverka'>Заполните все графы</p>";

    
    public static function getDate(){
        
        $db = Db::DbConnection();
        
        $result = $db ->query('SELECT DISTINCT date FROM zapisi WHERE user_id='.$_SESSION["user_id"].' ORDER BY id DESC');
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        
        $date = array();
        $i = 0;
        
        while ($row = $result ->fetch()){
            $date[$i]['date'] = $row['date'];
            $i++;
        }
        
        return $date;
 
    }

    public static function getZapisi(){
        
        $db = Db::DbConnection();
        
        $result = $db ->query('SELECT text, tag, date, id FROM zapisi WHERE user_id='.$_SESSION["user_id"].' ORDER BY id DESC');
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        
        $zapisi = array();
        $i = 0;
        
        while ($row = $result ->fetch()){
            $zapisi[$i]['text'] = $row['text'];
            $zapisi[$i]['tag'] = $row['tag'];
            $zapisi[$i]['date'] = $row['date'];
            $zapisi[$i]['id'] = $row['id'];
            $i++;
        }
        
        return $zapisi;
 
    }
    
    public static function addZapis(){
        
        if(isset($_POST['addButton']) && $_POST['tag']==!"" && $_POST['text']==!"" ){
        $today = date('Y-m-d');   
        $db = Db::DbConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("INSERT INTO zapisi (text, tag, date , user_id)VALUES (:text, :tag, :date, :user_id)");
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':user_id', $user_id);
        $text = $_POST['text'];
        $tag = $_POST['tag'];    
        $date = $today;
        $user_id = $_SESSION['user_id'];
        $stmt->execute();
        
        header('Location: main');
        }        
    }
    public static function proverka(){
        if(isset($_POST['tag']) && isset($_POST['text'])){   
            if($_POST['tag']=="" or $_POST['text']==""){
                $proverka = Zapisi::$proverka;
                return $proverka;
            }
            
        } 
    }
    
    
}
