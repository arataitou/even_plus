<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventsController extends AppController {
    public $uses = array('Event','Category','Area');
    public $helpers = array('Paginator');
    public $components = array('Session','Paginator');
    //Paginatorの設定
    public $paginate = array(
        //モデルの指定
        'Event' => array(
             //ページに表示する数
             'limit' => 3,
             //並び順
             'order' => array('created' => 'asc'),
        )
    );

<<<<<<< HEAD
/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session');



    //ユーザ制限
    public function isAuthorized($user){
        //登録済みユーザは投稿できる。
        if($this->action ==='add'){
            return true;
        }

        //投稿のオーナーは編集や削除ができる。
        if(in_array($this->action,array('edit','delete'))){
            $eventId = (int)$this->request->params['pass'][0];
            if($this->Event->isOwnedBy($eventId,$user['id'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }



/**
 * index method
 *
 * @return void
 */
    public function index() {

        $status=$this->Auth->user();
        $this->set('status',$status);


		$this->Event->recursive = 0;
		$this->set('events', $this->Paginator->paginate());
	}
=======
	public function index(){

        $order = array(
                     'order' => 'event_date asc',
                     'limit' => 4,
        );
        $eventList = $this->Event->find('all', $order);
		$this->set('events', $eventList);

        //日付ソートのデータ
        $today_date = $this->Event->getEventsWithToday();
        $this->set('today', $today_date);

        $tomorrow_date = $this->Event->getEventsWithTomorrow();
        $this->set('tomorrow', $tomorrow_date);

        $this->Paginator->settings = $this->paginate;
        $data = $this->Paginator->paginate('Event');
        $this->set(compact('data'));

        $type = $this->params['named']['type'];
        $this->set('types', $type);

    }
>>>>>>> fa629de9759bbec7d2763401f4cede9d845dd0bc

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
        }
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));

        //user_idからuser名を取れるように配列を操作してviewにぶちあげ
        $users = $this->User->find('all', array('fields' => array('id', 'name')));
        $this->set('users', $users);
        $userId = array();
        $userName = array();
        foreach($users as $user){
            array_push($userId, $user['User']['id']);
            array_push($userName, $user['User']['name']);
        }
        $userIdAndName = array_combine($userId, $userName);
        $this->set('userIdAndName', $userIdAndName);

        //個別answerページのためにpaginateにぶち込んでviewにぶちあげ
        $this->paginate = array(
            'limit' => '10',
            'conditions' => array('event_id' => $id)
            );
        $this->set('participantsEach', $this->Paginator->paginate('Participants'));

        //三名の三回答をランダムに表示するために配列を三件ランダムに取得してviewにぶちあげ
        $participants = $this->Participants->find('all', array(
            'order' => 'rand()',
            'limit' => 3,
            'conditions' => array('event_id' => $id)
            ));
        $this->set('participantsRandom', $participants);

        /*
        //login済みのユーザーだった場合「参加ボタン」を表示するため、viewにuser_idをset
        if ($userId = $this->Auth->user('id')){
            $this->set('userId', $userId);
            if ($userId == '1' || $this->Event->data["user_id"]){
                $this->set('flagUd', "haveAuthority");
            }
        }
         */
    }
/**
 * add method
 *
 * @return void
 */
    public function add() {
<<<<<<< HEAD


        $status=$this->Auth->user();
        $this->set('status',$status);


        if ($this->request->is('post')) {
            //下記一文を追加
            $this->request->data['Event']['user_id'] = $this->Auth->user('id');
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
        }

	}
=======
        if ($this->request->is('post')) {
            $eventMonth = $this->request->data["Event"]["month"];
            $eventDay = $this->request->data["Event"]["day"];
            $eventYear = $this->request->data["Event"]["year"];
            $eventHour = $this->request->data["Event"]["hour"];
            $eventMin = $this->request->data["Event"]["min"];
            $eventMeridation = $this->request->data["Event"]["meridian"];
>>>>>>> fa629de9759bbec7d2763401f4cede9d845dd0bc

            if ($eventMonth == null || $eventDay == null || $eventYear == null || $eventHour == null || $eventMin == null || $eventMeridation = null) {
                $this->Session->setFlash(__('日時をすべて選択してください'));//日時のValidation
            }else{
                //データベースに送る配列を形成
                $data = array(
                    "event_title" => $this->request->data["Event"]["event_title"],
                    "event_date" => array(
                        "month" => $eventMonth,
                        "day" => $eventDay,
                        "year" => $eventYear,
                        "hour" => $eventHour,
                        "min" => $eventMin,
                        "meridian" => $eventMeridation
                    ),
                    "area_id" => $this->request->data["Event"]["area_id"],
                    "event_place" => $this->request->data["Event"]["event_place"],
                    "event_address" => $this->request->data["Event"]["event_address"],
                    "event_price" => $this->request->data["Event"]["event_price"],
                    "category_id" => $this->request->data["Event"]["category_id"],
                    "event_detail" => $this->request->data["Event"]["event_detail"],
                    "question_1" => $this->request->data["Event"]["question_1"],
                    "question_2" => $this->request->data["Event"]["question_2"],
                    "question_3" => $this->request->data["Event"]["question_3"]
                );
    			$this->Event->create();
    			if ($this->Event->save($data)) {
    				$this->Session->setFlash(__('The event has been saved.'));
                    return $this->redirect(array('action' => 'index'));
    			} else {
    				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
                }
            }
        }
        //イベントの時間を制限するために
        //max_dateの時間とmin_dateの時間を現在時刻より指定
        $monthMax = date('m', strtotime("+ 14 day"));
        $dateMax = date('d', strtotime("+ 14 day"));
        $yearMax = date('Y', strtotime("+ 14 day"));

        $monthMin = date('m', strtotime("+ 3 day"));
        $dateMin = date('d', strtotime("+ 3 day"));
        $yearMin = date('Y', strtotime("+ 3 day"));

        //max_dateとmin_dateの範囲を指定
        $monthRange = range($monthMin, $monthMax);
        $dateRange = range($dateMin, $dateMax);
        $yearRange = range($yearMin, $yearMax);

        //分の入力を15分おきに限定
        $minuteRange = array();
        $minuteRange = array('0' => '0', '15' => '15', '30' => '30', '45' => '45');

        $monthRangeArray = array_combine($monthRange, $monthRange);
        $dateRangeArray = array_combine($dateRange, $dateRange);
        $yearRangeArray = array_combine($yearRange, $yearRange);

        $this->set('monthRangeArray', $monthRangeArray);
        $this->set('dateRangeArray', $dateRangeArray);
        $this->set('yearRangeArray', $yearRangeArray);
        $this->set('minuteRange', $minuteRange);

        $this->set('categories', $this->Category->find(
            'list',
            array(
                'fields' => array('Category.id', 'Category.category_title')
                )
            )
        );
        $this->set('areas',$this->Area->find(
            'list',
            array(
                'fields' => array('Area.id', 'Area.area_name')
                )
            )
        );
    }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
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
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('The event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
    }

    public function join($id = null){
    }
}
