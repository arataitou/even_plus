<?php
App::uses('AppModel', 'Model');

//SimplePasswordHasherクラスの定義
App::uses('SimplePasswordHasher','Controller/Component/Auth');


/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */

    //ユーザーが保存されるときは毎回 SimplePasswordHasher 
    //クラスを用いてパスワードがハッシュ化されます。
    public function beforeSave($options = array()){
        if(isset($this->data[$this->alias]['password'])){
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

    

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
   
    public function isOwnedBy($user, $user) {
    return $this->field('id', array('id' => $user, 'id' => $user)) !== false;
}




}

