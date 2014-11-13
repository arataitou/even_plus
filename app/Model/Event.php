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
    /*public function beforeFind($queryData) {
        $queryData = parent::beforeFind($queryData);
        $queryData['order'][] = 'event_date';
        return $queryData;
    }

    public function Order()
    {
        $posts = array();
        $order = array('Event.event_date ASC');
        $posts = $this->find('all',array('order' => $order));
        return $posts;

        }*/
    public $name ='Event';
    public $belongsTo = array(
           'Area' => array(
                 'className' => 'Area',
                 'foreignKey' => 'area_id',
                 'order' => 'Area.id ASC'
                 ),
           'Category' => array(
                 'className' => 'Category',
                 'foreignKey' => 'category_id',
                 'order' => 'Category.id ASC'
                 
           ));

    
     public function getEventsWithToday(){
        $today = date("Y-m-d");
        
        // データの取得
        $TODAY = $this->find('all',array('conditions' =>
                      array('event_date LIKE?' => '%'.$today.'%')));
        //取得したデータを返却
        return $TODAY;
         

        }

     public function getEventsWithTomorrow(){
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
       
        // データの取得
        $TOMORROW = $this->find('all',array('conditions' => array('event_date LIKE?' => '%'.$tomorrow.'%')));
        //取得したデータを返却
        return $TOMORROW;
        }

    public function getEventsWithOneWeek(){
          $start = date('Y-m-d');
          $end =  date('Y-m-d',strtotime("+7 day"));    
          $conditions = array(
                    'Event.event_date >=' => $start,
                    'Event.event_date <=' => $end
          );
          $order = array('Event.event_date' => 'asc');
          $ONEWEEK = $this->find('all', compact('conditions','order'));
          
          return $ONEWEEK;
        }
    public function getEventsWithTwoWeeks(){
          $start = date('Y-m-d');
          $end =  date('Y-m-d',strtotime("+14 day"));    
          $conditions = array(
                    'Event.event_date >=' => $start,
                    'Event.event_date <=' => $end
          );
          $order = array('Event.event_date' => 'asc');
          $TWOWEEKS = $this->find('all', compact('conditions','order'));
          
          return $TWOWEEKS;
        }

        


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
}
