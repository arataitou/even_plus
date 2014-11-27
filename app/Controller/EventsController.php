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
    public $uses = array('Event', 'Category', 'Area', 'User', 'Participants');
    public $helpers = array('Paginator');
    public $components = array('Session', 'Paginator');

/**
 * Components
 *
 * @var array
 */
    //ユーザ制限
    public function isAuthorized($user){
        //登録済みユーザは投稿できる。
        if ($this->action === 'add') {
            return true;
        }
        //投稿のオーナーは編集や削除ができる。
        if (in_array($this->action, array('edit', 'delete'))) {
            $eventId = (int)$this->request->params['pass'][0];
            if ($this->Event->isOwnedBy($eventId, $user['id'])) {
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
        $this->set('status', $status);

        $order = array(
                     'order' => 'event_date asc',
                     'limit' => 4,
        );
        $eventList = $this->Event->find('all', $order);
		$this->set('events', $eventList);

        //日付ソートのデータ
        $todayEventsData = $this->Event->getEventsWithToday();
        $this->set('today', $todayEventsData);
        
        $tomorrowEventsData = $this->Event->getEventsWithTomorrow();
        $this->set('tomorrow', $tomorrowEventsData);
        
        $oneWeekEventsData = $this->Event->getEventsWithOneWeek();
        $this->set('oneweek', $oneWeekEventsData);

        $twoWeeksEventsData = $this->Event->getEventsWithTwoWeeks();
        $this->set('twoweeks', $twoWeeksEventsData);

        //エリアソートのデータ
        $downtownEventsData = $this->Event->getEventsWithDowntown();
        $this->set('downtown', $downtownEventsData);
        
        $midtownEventsData = $this->Event->getEventsWithMidtown();
        $this->set('midtown', $midtownEventsData);

        $uptownEventsData = $this->Event->getEventsWithUptown();
        $this->set('uptown', $uptownEventsData);

        $provincesEventsData = $this->Event->getEventsWithProvinces();
        $this->set('provinces', $provincesEventsData);

        $othersEventsData = $this->Event->getEventsWithOthers();
        $this->set('others', $othersEventsData);
        
        //予算ソートのデータ
        $freeEventsData = $this->Event->getEventsWithFree();
        $this->set('free', $freeEventsData);

        $priceOneEventsData = $this->Event->getEventsWithPriceOne();
        $this->set('priceone', $priceOneEventsData);
        
        $priceTwoEventsData = $this->Event->getEventsWithPriceTwo();
        $this->set('pricetwo', $priceTwoEventsData);

        $priceThreeEventsData = $this->Event->getEventsWithPriceThree();
        $this->set('pricethree', $priceThreeEventsData);

        $priceFourEventsData = $this->Event->getEventsWithPriceFour();
        $this->set('pricefour', $priceFourEventsData);

        $priceFiveEventsData = $this->Event->getEventsWithPriceFive();
        $this->set('pricefive', $priceFiveEventsData);
        
        //カテゴリソートのデータ
        $partyEventsData = $this->Event->getEventsWithParty();
        $this->set('party', $partyEventsData);

        $studyEventsData = $this->Event->getEventsWithStudy();
        $this->set('study', $studyEventsData);
        
        $festivalEventsData = $this->Event->getEventsWithFestival();
        $this->set('festival', $festivalEventsData);

        $sportsEventsData = $this->Event->getEventsWithSports();
        $this->set('sports', $sportsEventsData);

        $cultureEventsData = $this->Event->getEventsWithCulture();
        $this->set('culture', $cultureEventsData);

        $tripEventsData = $this->Event->getEventsWithTrip();
        $this->set('trip', $tripEventsData);

        //Paginatorの設定
        $start = date('Y-m-d');
        $this->Paginator->settings = array(
              'Event' =>
              array(
                     'order' => 'Event.event_date asc',
                     'limit' => 8,
                     'conditions' => array(
                         'Event.event_date >=' => $start)
              )
        );
        $data = $this->Paginator->paginate('Event');
        $this->set(compact('data'));
       
        //パラメータの設定
        if (isset($this->params['named']['type'])){
            $type = $this->params['named']['type'];
            $this->set('types',$type);
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
        if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
        }
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $event = $this->Event->find('first', $options);
        $this->set('event', $event);

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
        
        //login済みのユーザーだった場合「参加ボタン」を表示するため、viewにuser_idをset
        $userId = $this->Auth->user('id');
        if ($userId) {
            $this->set('userId', $userId);
            //管理者あるいは作成者だった場合削除リンクを表示表示する
            if ($userId == '1' || $userId == $event['Event']['user_id']) {
                $this->set('flagUserDelete', "haveAuthority");
            }
        }
    }
/**
 * add method
 *
 * @return void
 */
    public function add() {
        $status=$this->Auth->user();
        $this->set('status',$status);

        if ($this->request->is('post')) {
            $eventMonth = $this->request->data["Event"]["month"];
            $eventDay = $this->request->data["Event"]["day"];
            $eventYear = $this->request->data["Event"]["year"];
            $eventHour = $this->request->data["Event"]["hour"];
            $eventMin = $this->request->data["Event"]["min"];
            $eventMeridation = $this->request->data["Event"]["meridian"];

            if ($eventMonth == null || $eventDay == null || $eventYear == null || $eventHour == null || $eventMin == null || $eventMeridation = null) {
                $this->Session->setFlash(__('日時をすべて選択してください'));//日時のValidation
            } else {
                //データベースに送る配列を形成
                $data = array(
                    "event_title" => $this->request->data["Event"]["event_title"],
                    "user_id" => $status['id'],
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
                    "question_3" => $this->request->data["Event"]["question_3"],
                    "status" => '1'
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
        $this->set('areas', $this->Area->find(
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
            $data = array('id' => $id);
            $this->Event->save($data); 
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
        $this->set('categories', $this->Category->find(
            'list',
            array(
                'fields' => array('Category.id', 'Category.category_title')
                )
            )
        );
        $this->set('areas', $this->Area->find(
            'list',
            array(
                'fields' => array('Area.id', 'Area.area_name')
                )
            )
        );
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
		if ($this->request->is(array('post', 'put'))) {
            $data = array('id' => $id, 'status' => '1');
            $this->Event->save($data); 
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been deleted.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be deleted. Please, try again.'));
			}
		} 
    }


    public function join($id = null){
        $this->Event->id = $id;

        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $eventInfo = $this->set('eventInfo', $this->Event->find('first', $options));

        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }

        if ($this->request->is('post')) {
            $data = array(
                "event_id" => $id,
                //"user_id" => $this->Auth->user('id'); 参加者のuser_id挿入するべし
                "answer_1" => $this->request->data['Participant']['answer_1'],
                "answer_2" => $this->request->data['Participant']['answer_2'],
                "answer_3" => $this->request->data['Participant']['answer_3'],
                "status" => '1' //status = 1 を有効な参加者としている
            );

            $this->Participant->create();
            if ($this->Participant->save($data)) {
                $this->Session->setFlash(__('The event has been saved.'));
            } else {
                $this->Session->setFlash(__('The event could not be joined. Please, try again.'));
            }
        }
    }

    public function cancel($id = null){
        $this->Event->id = $id;
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invlid event'));
        }

        $userJoinEvent = $this->Participants->find('first', array(
            'conditions' => array('event_id' => $id,
            //'user_id' => $this->Auth->user('id'),
            //'status' => 'true'
        ),//user_id、statusの検索条件追加
            )
        );

        $cancelInfo = array(
            "id" => $userJoinEvent['Particpant']['id'], 
            "status" => 'false'
        );

        if ($this->Participants->save($cancelInfo)) {
            $this->Session->setFlash(__('You canceled to participate this event.'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('You could not cancel to participate this event.'));
        }
    }
}
