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

        //日付ソートのデータ
        $today_data = $this->Event->getEventsWithToday();
        $this->set('today', $today_data);
        
        $tomorrow_data = $this->Event->getEventsWithTomorrow();
        $this->set('tomorrow', $tomorrow_data);
        
        $oneWeek_data = $this->Event->getEventsWithOneWeek();
        $this->set('oneweek', $oneWeek_data);

        $twoWeeks_data = $this->Event->getEventsWithTwoWeeks();
        $this->set('twoweeks', $twoWeeks_data);

        //エリアソートのデータ
        $downtown_data = $this->Event->getEventsWithDowntown();
        $this->set('downtown', $downtown_data);
        
        $midtown_data = $this->Event->getEventsWithMidtown();
        $this->set('midtown', $midtown_data);

        $uptown_data = $this->Event->getEventsWithUptown();
        $this->set('uptown', $uptown_data);

        $provinces_data = $this->Event->getEventsWithProvinces();
        $this->set('provinces', $provinces_data);

        $others_data = $this->Event->getEventsWithOthers();
        $this->set('others', $others_data);
        
        //予算ソートのデータ
        $free_data = $this->Event->getEventsWithFree();
        $this->set('free', $free_data);

        $priceOne_data = $this->Event->getEventsWithPriceOne();
        $this->set('priceone', $priceOne_data);
        
        $priceTwo_data = $this->Event->getEventsWithPriceTwo();
        $this->set('pricetwo', $priceTwo_data);

        $priceThree_data = $this->Event->getEventsWithPriceThree();
        $this->set('pricethree', $priceThree_data);

        $priceFour_data = $this->Event->getEventsWithPriceFour();
        $this->set('pricefour', $priceFour_data);

        $priceFive_data = $this->Event->getEventsWithPriceFive();
        $this->set('pricefive', $priceFive_data);
        
        //カテゴリソートのデータ
        $party_data = $this->Event->getEventsWithParty();
        $this->set('party', $party_data);

        $study_data = $this->Event->getEventsWithStudy();
        $this->set('study', $study_data);
        
        $festival_data = $this->Event->getEventsWithFestival();
        $this->set('festival', $festival_data);

        $sports_data = $this->Event->getEventsWithSports();
        $this->set('sports', $sports_data);

        $culture_data = $this->Event->getEventsWithCulture();
        $this->set('culture', $culture_data);

        $trip_data = $this->Event->getEventsWithTrip();
        $this->set('trip', $trip_data);

        $others_date = $this->Event->getEventsWithOthers();
        $start = date('Y-m-d');
        $this->Paginator->settings = array(
              'Event' => array(
                     'order' => 'Event.event_date asc',
                     'limit' => 8,
                     'conditions' => array(
                         'Event.event_date >=' => $start)
              )
        );
        $data = $this->Paginator->paginate('Event');
        $this->set(compact('data'));
        
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
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $eventMonth = $this->request->data["Event"]["month"];
            $eventDay = $this->request->data["Event"]["day"];
            $eventYear = $this->request->data["Event"]["year"];
            $eventHour = $this->request->data["Event"]["hour"];
            $eventMin = $this->request->data["Event"]["min"];
            $eventMeridation = $this->request->data["Event"]["meridian"];

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
}
