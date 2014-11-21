<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
    public $helpers = array('Paginator');
	public $uses = array('User', 'Participant');

	public function beforeFilter() {
		parent::beforeFilter();
    	// ユーザー自身による登録とログアウトを許可する
    	$this->Auth->allow('signup', 'logout');
    }
    public function isAuthorized($user){ 
        //登録済みユーザは投稿できる。
        if (in_array($this->action, array('add', 'index'))) { 
            return true;
        }
        //投稿のオーナーは編集や削除ができる。
        if (in_array($this->action, array('edit', 'delete'))) {
            $userId = (int)$this->request->params['pass'][0];
            if ($this->User->isOwnedBy($userId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
    //paginate設定
    public $paginate = array(
        //モデルの指定
        'Participant' => array(
            //ページに表示する数
            'limit' => 3,
            //paginate urlを[:]=>[?]へ変更
            'paramType' => 'querystring',
        )
    ); 
/**
 * index method
 *
 * @return void
 */
	public function index() {
        //本日の日付を取得
        $todayDate = date("Y-m-d H:i:s"); 
        $this->set('todayDate', $todayDate);
        //Login user情報を取得
        $status = $this->Auth->user();
        $status['user_id'] = $status['id'];
        $this->set('status', $status);
        //paginateの分岐に必要な変数を取得 データは$getData[paginate][past]or$getData[paginate][recent]
        $getData = $this->params['url'];
        //Paginate処理
        //GET request && $getData['paginate']にデータがある場合実行
        if ($this->request->is('get') && (isset($getData['paginate']))) {
            //GETで取得したデータを$paginateBranchへ入れ替える
            $paginateBranch = $this->params['url']['paginate']; 
            $this->set('paginateBranch', $paginateBranch);

            switch ($paginateBranch) {
                //$paginateBranchの値が[recent]の場合
                case 'recent';
                    $this->Paginator->settings = $this->paginate;    
                    //Participant tableを次の条件でpaginate  ① loginUserId ② 参加フラグ③ today以降の日付
                    $entryEvent = $this->paginate('Participant', array('Participant.user_id' => $status['id'], 'Participant.status' => 0, 'Event.event_date >' => $todayDate));
                    $this->set('entryEvent', $entryEvent);
                    //Participant tableを次の条件でfind('all')  ① loginUserId ② 参加フラグ③ today以前の日付
                    $entryEventPast = $this->Participant->find(
                        'all',
                        array('conditions' => array('Participant.user_id' => $status['id'], 'Participant.status' => 0, 'Event.event_date <' => $todayDate)));
                    $this->set('entryEventPast', $entryEventPast);
                break;

                //$paginateBranchの値が[past]の場合
                case 'past';
                    //Participant tableを次の条件でfind('all')  ① loginUserId ② 参加フラグ ③ today以降の日付
                    $entryEvent = $this->Participant->find(
                        'all',
                        array('conditions' => array('Participant.user_id' => $status['id'], 'Participant.status' => 0, 'Event.event_date >' => $todayDate)));
                    $this->set('entryEvent', $entryEvent);
               
                    //Participant tableを次の条件でpaginate  ① loginUserId ② 参加フラグ③ today以前の日付
                    $this->Paginator->settings = $this->paginate;
                    $entryEventPast = $this->paginate('Participant', array('Participant.user_id' => $status['id'], 'Participant.status' => 0, 'Event.event_date <' => $todayDate));
                    $this->set('entryEventPast', $entryEventPast);
                break;
            }
       } else {
            //GET request && $getData['paginate']にデータが無かった場合
            $paginateBranch = 'noComent'; 
            $this->set('paginateBranch', $paginateBranch);

            //Participant tableを次の条件でfind('all')  ① loginUserId ② 参加フラグ ③ today以降の日付
            $entryEvent = $this->Participant->find(
                'all', 
                array('conditions' => array('Participant.user_id' => $status['id'], 'Participant.status' => 0, 'Event.event_date >' => $todayDate)));
            $this->set('entryEvent', $entryEvent);
            //Participant tableを次の条件でfind('all')  ① loginUserId ② 参加フラグ ③ today以前の日付
            $entryEventPast = $this->Participant->find(
                'all', 
                array(
            'conditions' => array('Participant.user_id' => $status['id'], 'Participant.status'=>0, 'Event.event_date <' => $todayDate)));
            $this->set('entryEventPast', $entryEventPast);
    	}
    }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
/**
 * add method
 *
 * @return void
 */
    public function signup() {       
        $status = $this->Auth->user();
        $this->set('status', $status);
        if ($this->request->is('post')) {
            $this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $status = $this->Auth->user();
        $this->set('status', $status);
        $editSignUp = $this->User->findById($status['id']);
        $this->set('editSignUp', $editSignUp);

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
        if ($this->request->is(array('post', 'put'))) {
            $data = array('id' => $editSignUp['User']['id']);
            $this->User->save($data); 

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.再度loginして下さい。'));
				return $this->redirect(array('action' => 'logout'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        $status = $this->Auth->user();
        $this->set('status', $status);
        $editSignUp = $this->User->findById($status['id']);
        $this->set('editSignUp', $editSignUp);
        $this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
        $data = array('id' => $editSignUp['User']['id'], 'del_flg' => '1');
        $this->User->save($data); 

  	    if ($this->User->save($this->request->data)) {
            $this->request->allowMethod('post', 'delete');

        if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'logout'));
        }
    }
/**
 * login method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function login() {
        if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
            	$this->redirect($this->Auth->redirect());
        	} else {
            	$this->Session->setFlash(__('Invalid username or password, try again'));
        	}
        }
    }
/**
 * logout method
 *
 */
    public function logout() {
        $status = $this->Auth->user();
        $this->set('status', $status);
        if (isset($status['id'])) {
            $this->redirect($this->Auth->logout());
        }
    }

}
