<?php
App::uses('AppController', 'Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AreasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

}
