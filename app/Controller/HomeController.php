<?php

class HomeController extends AppController {

    public function index() {
        if (!$this->Auth->authorize) {
            //   return $this->redirect($this->Auth->logoutRedirect);
        }
    }
    
    function admin_index() {
            
            
    }


    function beforeFilter() {
        $this->Auth->allow('index', 'view', 'login', 'home');
    
        //    $this->set('logged_in', $this->Auth->loggedIn());
        if (!$this->Auth->loggedIn()) {
            return $this->redirect($this->Auth->logoutRedirect);
        }
    }

}