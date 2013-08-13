<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // app/Controller/AppController.php
    public $components = array(
        "Auth" => array(
            'allowedActions' => array(
                'index', 'image', 'view'
            ),
            'loginRedirect' => array('controller' => 'home'), // After success where page goes to
            'logoutRedirect' => array('controller' => 'users', 'action'=>'login'), // This is login page
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        ),
        "Session");
    public $helpers = array('Session', 'Form', 'Html', 'Js', 'Time');
    public $user;

    function beforeFilter() {
        if ($this->params['admin']) {  
            if($this->Session->check('User') == false) { 
                $this->flash("The URL you\'ve followed requires you login.",'/login',2);
            }
            $this->layout = 'admin';
        }
    } 

    public function beforeRender() {
        $this->set('user', $this->user);
    }

}
