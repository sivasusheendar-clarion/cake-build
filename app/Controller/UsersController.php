<?php

class UsersController extends AppController {

    public function login() {
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                if ($this->Auth->user('role') == 1) {
                    $this->Auth->loginRedirect = array('controller' => 'home', 'action' => 'index', 'admin' => true);
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
            if (!$this->User->findByEmail($this->data['User']['email'])) {
                if ($this->User->save($this->request->data['User'])) {
                    $id = $this->User->id;
                    // TEST OCMMENT
                    if (!empty($id)) {
                        $this->Session->setFlash('User Registered Successful.');
                        $this->redirect('/home');
                    } else {
                        $this->Session->setFlash('Unexpected error.');
                        $this->redirect('/users/register');
                    }
                }
            } else {
                $this->Session->setFlash('User already exists.');
            }
        }
    }

    public function forgotpassword() {
        if ($this->request->is('post')) {
            if ($User = $this->User->findByEmail($this->data['User']['email'])) {
                $User['User']['token'] = 'TEST TOKEN';
                $this->User->save($User['User']);
                $url = 'http://local.cakebuild.com/users/activate/?token=' . urlencode($User['User']['token']);
                $this->Session->setFlash('Activation link sent thru mail OR <a href="' . $url . '">click here</a>');
            } else {
                $this->Session->setFlash('User not exists.');
            }
        }
    }

    public function activate() {

        if ($User = $this->User->find('first', array('conditions' => array('User.token' => $this->request->query['token']), 'fields' => 'User.email'))) {
            $this->set('user_email', $User['User']['email']);
            $this->set('token', $this->request->query['token']);
        } else {
            $this->Session->setFlash('User not exists.');
        }
    }

    public function activateAction() {
        if ($this->request->is('post')) {
            if ($this->data['User']['confirm_password'] == $this->data['User']['password']) {
                if ($User = $this->User->find('first', array('conditions' => array('User.token' => $this->data['User']['token'])))) {
                    $User['User']['password'] = $this->data['User']['password'];
                    $User['User']['token'] = '';
                    $this->User->save($User['User']);
                    $this->Session->setFlash('Password modified.');
                } else {
                    $this->Session->setFlash('User not exists.');
                    $this->redirect('/users/forgotpassword');
                }
            } else {
                $this->Session->setFlash('Password mismatch.');
                $this->redirect('/users/activate/?token=' . urlencode($this->data['User']['token']));
            }
        }
        $this->redirect('/users/login');
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }

    function beforeFilter() {
        $this->Auth->allow('login', 'logout', 'register', 'forgotpassword', 'activate', 'activateAction');
    }

    /* Admin section starts */

    public function admin_index() {
        $this->set('users', $this->User->find('all'));
    }

    public function admin_view($id) {
        $this->User->id = $id;
        $this->set('User', $this->User->read());
    }

    public function admin_edit($id) {
        $this->User->id = $id;

        if ($this->request->is('get')) {
            $this->request->data = $this->User->read();
        } else {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User updated successfully');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('User not updated');
            }
        }
    }

}