<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {

  public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
  
    public function beforeSave($options = array()) {
        unset($this->data['User']['confirm_password']);
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }

}

?>