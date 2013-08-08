<?php

class UsersController extends AppController {

    public function login() {
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
                // Prior to 2.3 use `return $this->redirect($this->Auth->redirect());`
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    public function index() {

    }

    public function register() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data['User'])) {
                $id = $this->User->id;
                // TEST OCMMENT 
                if (!empty($id)) {
                   $this->Session->setFlash('User Registered Successful .');    
                   $this->redirect('/home');
                } else {
                    $this->Session->setFlash('Unable to add Role.');
                    $this->redirect('/users/register');
                }
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

     function beforeFilter() {

        $this->Auth->allow('login', 'logout','register');

    }
}