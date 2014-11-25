<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TopsController extends AppController {
    public $uses = array('Event', 'Area', 'Category');
    public $helpers = array('Paginator');
    public $components = array('Session', 'Paginator');
    //Pagenatorの設定
    public $paginate = array(
        //モデルの指定
        'Event' => array(
        //ページに表示する数
        'limit' => 3,
        //並び順
        'order' => array('created' => 'asc'),
        )
    );

    public function index(){
        //Login user情報を取得
        $status = $this->Auth->user();
        $status['user_id'] = $status['id'];
        $this->set('status', $status);

        $start = date('Y-m-d');
        $this->Paginator->settings = array(
            'Event' => array(
                'order' => 'Event.event_date asc',
                'limit' => 4,
                'conditions' => array(
                    'Event.event_date >=' => $start
                )
            )
        );
        $data = $this->Paginator->paginate('Event');
        $this->set(compact('data'));
    }

    public function beforeFilter() {
        $this->Auth->allow('index');
    }
}


