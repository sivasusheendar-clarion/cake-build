<?php

class HomeController extends AppController {

    public function index() {
        $this->User = ClassRegistry::init('User');
        $this->set('user_email', $this->Session->read('Auth.User.email'));

        if ($this->request->is('post')) { print_r($this->request->data); exit; 
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User updated successfully');
            }
        }
        else {
             $this->User->id = $this->Session->read('Auth.User.id');
            $this->request->data = $this->User->read();
        }


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