<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {


public function isOwnedBy($event, $user) {
    return $this->field('id', array('user_id' => $event, 'id' => $user)) !== false;
}

/**
 * Validation rules
 *
 * @var array
 */


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

