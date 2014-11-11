<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 * @property Event $Event
 */
class Area extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'area_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

      /*array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'dependent' => false,
			'conditions' => 'array()',
			'fields' => '',
			'order' => 'Area area_id ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
   */
}
