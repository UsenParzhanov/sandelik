<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting
 *
 * @author Usen
 */
class SettingController extends Session {
    
    public function __construct() {
        parent::checkSession();
    }
    
    public function actionChange(){
        $zapisi = Zapisi::getZapisi();
        $proverka = Login::checkUpdateUsername();
        Login::updateUsername();
        $userInfo = Login:: oneUsername();
        require Root.'/views/account.php';
        
    }
    
}
