<?php

class UsersController extends AppController {
    
    public function login() {
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {
                
                if ($this->Auth->user('role') ==  1) {
                    $this->Auth->loginRedirect = array('controller' => 'home', 'action' => 'index','admin'=>true);
                } else {
                    $this->Auth->loginRedirect = array('controller' => 'home', 'action' => 'index');
                }
               
                return $this->redirect($this->Auth->loginRedirect);
                //
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
            if(!$this->User->findByEmail($this->data['User']['email'])) {
                if ($this->User->save($this->request->data['User'])) {
                    $id = $this->User->id;
                    // TEST OCMMENT
                    if (!empty($id)) {
                       $this->Session->setFlash('User Registered Successful .');
                       $this->redirect('/home');
                    } else {
                        $this->Session->setFlash('Unexpected error.');
                        $this->redirect('/users/register');
                    }
                }
            }
            else {
                     $this->Session->setFlash('User already exists.');
            }
        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }

     function beforeFilter() {
        $this->Auth->allow('login', 'logout','register');
    }
    
    /* Admin section starts */
     public function admin_index() {
             $this->set('users', $this->User->find('all'));
    }
    
     public function admin_view() {
             $this->set('users', $this->User->find('all'));
    }
    
     public function admin_edit() {
             $this->set('users', $this->User->find('all'));
    }
    
}