<?php


/**
 * Description of MainController
 *
 * @author Usen
 */
class MainController extends Session {
    
    public function __construct() {
            parent::checkSession();
    }
    public function actionList(){ 
        $date = Zapisi::getDate();
        $zapisi = Zapisi::getZapisi();
        $userInfo = Login:: oneUsername();
        require Root.'/views/main.php';     
    }
    public function actionAdd(){
        $zapisi = Zapisi::getZapisi();
        Zapisi::addZapis();
        $proverka = Zapisi::proverka();
        $userInfo = Login:: oneUsername();
        require Root.'/views/add.php';
    }
}
