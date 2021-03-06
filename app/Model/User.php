<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Sucursale $Sucursale
 */
class User extends AppModel {
    
    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
}
