<?php



/**
 * Description of UserController
 *
 * @author Usen
 */
class UserController extends Session{
    
    
    public function __construct() {
//        parent::checkSession();
        session_start();
    }

    public function actionRegistration() {
        parent::checkIndex();    
        require Root.'/views/registration.php';
    }
    
    public function actionSignIn(){
        parent::signInSession();
    }
    
    public function actionSignUp(){
        parent::signUpSession();
    }

    public function actionExit(){
        parent::exitSession();
    }
    
}
