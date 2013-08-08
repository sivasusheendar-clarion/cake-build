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

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}