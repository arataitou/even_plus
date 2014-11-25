<?php
App::uses('AppModel', 'Model');
/**
 * Participant Model
 *
 */
class Participant extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'event_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'answer_1' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
                ),
            'between' => array(
                'rule' => array('between', 0, 100),
                'message' => 'Between 0 to 100 characters.'
            ),
        ),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		'answer_2' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
                ),
            'between' => array(
                'rule' => array('between', 0, 100),
                'message' => 'Between 0 to 100 characters.'
            ),
        ),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		'answer_3' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
                ),
            'between' => array(
                'rule' => array('between', 0, 100),
                'message' => 'Between 0 to 100 characters.'
            ),
        ),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
