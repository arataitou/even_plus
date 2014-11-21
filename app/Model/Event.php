<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */

    public $name ='Event';
    public $belongsTo = array(
        'Area' => array(
            'className'  => 'Area',
            'foreignKey' => 'area_id',
            'order'      => 'Area.id ASC'
        ),
        'Category' => array(
            'className'  => 'Category',
            'foreignKey' => 'category_id',
            'order'      => 'Category.id ASC'
        )
    );
    
    public $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'category_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => false,
            ),
        ),
        'area_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => false,
            ),
        ),
        'event_title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty')
            ),
            'between' => array(
                'rule' => array('between', 5, 50),
                'message' => 'Between 5 to 50 characters'),
        ),
        //EventControllerでValidation
        'event_date' => array(
            'datetime' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please input the Datetime.',
                'allowEmpty' => false,
            ),
        ),
        'event_place' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
            'between' => array(
                'rule' => array('between', 0, 20),
                'message' => 'Between 0 to 20 characters'
            ),
        ),
        'event_address' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
            'between' => array(
                'rule' => array('between', 0, 100),
                'message' => 'Between 0 to 100 characters'
            ),
        ),
        'event_price' => array(
            'naturalNumber' => array(
                'rule'    => array('range', -1, 801),
                'message' => 'Please enter a number between 0 and 800'
            ),
        ),
        'event_detail' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty')
            ),
            'bio' => array(
                'rule' => array('between', 50, 300),
                'message' => '50文字以上、300文字以下で入力して下さい。'
                )
            ),
        'question_1' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty')
            ),
            'bio' => array(
                'rule' => array('between', 5, 200),
                'message' => '5文字以上、200文字以下で入力して下さい。'
            )
        ),
        'question_2' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty')
            ),
            'bio' => array(
                'rule' => array( 'between', 5, 200),
                'message' => '5文字以上、200文字以下で入力して下さい。'
            )
        ),
        'question_3' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty')
            ),
            'bio' => array(
                'rule' => array('between', 5, 200),
                'message' => '5文字以上、200文字以下で入力して下さい。'
            )
        ),
        'status' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            ),
        ),
    );

    //日付データ取得
    public function getEventsWithToday(){
        $today = date("Y-m-d");
        
        // データの取得
        $todayEvents = $this->find('all',array('conditions' =>
                                             array('event_date LIKE?' => '%'.$today.'%')
                                         )
                       );
        //取得したデータを返却
        return $todayEvents;
    }

    public function getEventsWithTomorrow(){
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
       
        // データの取得
        $tomorrowEvents = $this->find('all',array('conditions' => 
                                                array('event_date LIKE?' => '%'.$tomorrow.'%')
                                            )
                          );
        //取得したデータを返却
        return $tomorrowEvents;
    }

    public function getEventsWithOneWeek(){
        $start = date('Y-m-d');
        $end =  date('Y-m-d',strtotime("+7 day"));    
        $conditions = array(
                  'Event.event_date >=' => $start,
                  'Event.event_date <=' => $end
        );
        $order = array('Event.event_date' => 'asc');
        $oneweekEvents = $this->find('all', compact('conditions', 'order'));
        
        return $oneweekEvents;
    }

    public function getEventsWithTwoWeeks(){
        $start = date('Y-m-d');
        $end =  date('Y-m-d',strtotime("+14 day"));    
        $conditions = array(
                  'Event.event_date >=' => $start,
                  'Event.event_date <=' => $end
        );
        $order = array('Event.event_date' => 'asc');
        $twoweeksEvents = $this->find('all', compact('conditions', 'order'));
        
        return $twoweeksEvents;
    }

    //エリアデータ取得
    public function getEventsWithDowntown(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'area_id >=' => 1,
                          'area_id <=' => 3,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $downtownEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $downtownEvents;
    }

    public function getEventsWithMidtown(){
        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'area_id >=' => 4,
                          'area_id <=' => 6,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $midtownEvents = $this->find('all',compact('conditions', 'order'));
        
        //取得したデータを返却
        return $midtownEvents;
    }

    public function getEventsWithUptown(){
        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'area_id >=' => 7,
                          'area_id <=' => 10,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $uptownEvents = $this->find('all',compact('conditions', 'order'));
        
        //取得したデータを返却
        return $uptownEvents;
    }

    public function getEventsWithProvinces(){
        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'area_id >=' => 11,
                          'area_id <=' => 16,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $provincesEvents = $this->find('all',compact('conditions', 'order'));
        
        //取得したデータを返却
        return $provincesEvents;
    }
    
    public function getEventsWithOthers(){
        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'area_id' => 17,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $otherEvents = $this->find('all',compact('conditions', 'order'));
        
        //取得したデータを返却
        return $otherEvents;
    }

    //予算データ取得
    public function getEventsWithFree(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'event_price' => 0,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');

        $freeEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $freeEvents;
    }

    public function getEventsWithPriceOne(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'event_price >=' => 1,
                          'event_price <=' => 99,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $priceoneEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $priceoneEvents;
    }

    public function getEventsWithPriceTwo(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'event_price >=' => 100,
                          'event_price <=' => 199,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $pricetwoEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $pricetwoEvents;
    }

    public function getEventsWithPriceThree(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'event_price >=' => 200,
                          'event_price <=' => 299,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $pricethreeEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $pricethreeEvents;
    }

    public function getEventsWithPriceFour(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'event_price >=' => 300,
                          'event_price <=' => 499,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $pricefourEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $pricefourEvents;
    }

    public function getEventsWithPriceFive(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'event_price >=' => 500,
                          'event_price <=' => 800,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $pricefiveEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $pricefiveEvents;
    }

    //カテゴリデータ取得
    public function getEventsWithParty(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'category_id' => 1,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $partyEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $partyEvents;
    }

    public function getEventsWithStudy(){

       $start = date('Y-m-d');
       // データの取得
       $conditions = array( 
                         'category_id' => 2,
                         'Event.event_date >=' => $start
                     );
       $order = array('Event.event_date' => 'asc');
       
       $studyEvents = $this->find('all',compact('conditions', 'order'));

       //取得したデータを返却
       return $studyEvents;
    }

    public function getEventsWithFestival(){

       $start = date('Y-m-d');
       // データの取得
       $conditions = array( 
                         'category_id' => 3,
                         'Event.event_date >=' => $start
                     );
       $order = array('Event.event_date' => 'asc');
       
       $festivalEvents = $this->find('all',compact('conditions', 'order'));

       //取得したデータを返却
       return $festivalEvents;
    }

    public function getEventsWithSports(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'category_id' => 4,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $sportsEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $sportsEvents;
    }

    public function getEventsWithCulture(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'category_id' => 5,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $cultureEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $cultureEvents;
    }

    public function getEventsWithTrip(){

        $start = date('Y-m-d');
        // データの取得
        $conditions = array( 
                          'category_id' => 6,
                          'Event.event_date >=' => $start
                      );
        $order = array('Event.event_date' => 'asc');
        
        $tripEvents = $this->find('all',compact('conditions', 'order'));

        //取得したデータを返却
        return $tripEvents;
    }
  }
