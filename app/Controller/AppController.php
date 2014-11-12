<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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


	//Html,From,Session機能を使う為、登録する。
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('DebugKit.Toolbar');


    // Login,Logoutの認証
    // LoginとLogoutのactionが実行された後に読み込まれるURLを設定
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'name', 'password' => 'password')
                )
            ),


            'loginRedirect' => array('controller' => 'tops', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            //ユーザ認証部
            'authorize'=> array('Controller')
        )
    );


    //ユーザ制限
    public function isAuthorized($user) {
        //group_id=1はadmin
        if(isset($user['group_id']) && $user['group_id'] ==='1'){
          return true;
       }
       //デフォルトは拒否
       return false;
   }


    //AuthComponentに全てのコントローラの viewとsignup アクションでログインを必要としないように設定。
    public function beforeFilter() {
        $this->Auth->allow('view','signup');
    }


}
