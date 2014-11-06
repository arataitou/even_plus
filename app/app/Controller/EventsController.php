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
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Event','Category','Area');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->Paginator->paginate());
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
        $this->set('categories',$this->Category->find('list',array(
            'fields' => array(
                'Category.id', 'Category.category_title')
                )
            )
        );

        $this->set('areas',$this->Area->find('list',array(
            'fields' => array(
                'Area.id','Area.area_name')
                )
            )
        );

        if ($this->request->is('post')) {
            $data = array(
                "event_title" => $_POST["data"]["Event"]["event_title"],
                "event_date" => array(
                    "month" => $_POST["data"]["Event"]["month"],
                    "day" => $_POST["data"]["Event"]["day"],
                    "year" => $_POST["data"]["Event"]["year"],
                    "hour" => $_POST["data"]["Event"]["hour"],
                    "min" => $_POST["data"]["Event"]["min"],
                    "meridian" => $_POST["data"]["Event"]["meridian"]
                    ),
                "area_id" => $_POST["data"]["Event"]["area_id"],
                "event_place" => $_POST["data"]["Event"]["event_place"],
                "event_address" => $_POST["data"]["Event"]["event_address"],
                "event_price" => $_POST["data"]["Event"]["event_price"],
                "category_id" => $_POST["data"]["Event"]["category_id"],
                "event_detail" => $_POST["data"]["Event"]["event_detail"],
                "question_1" => $_POST["data"]["Event"]["question_1"],
                "question_2" => $_POST["data"]["Event"]["question_2"],
                "question_1" => $_POST["data"]["Event"]["question_3"]
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

    public function date_limit(){
       
       
        $date_limited = $_POST["data"]["Event"]["month"].'/'.$_POST["data"]["Event"]["date"].'/'.$_POST["data"]["Event"].' '.$_POST["data"]["Event"]["hour"].':'.$_POST["data"]["Event"]["minute"].' '.$_POST["data"]["Event"]['noon'];


        $_POST["data"]["Event"] = array(
            "event_title" => $_POST ["data"]["Event"]["event_title"],
            "month" => $_POST ["data"]["Event"]["month"],
            "event_date" => $date_limited,
            "area_id" => $_POST ["data"]["Event"]["area_id"],
            "event_place" => $_POST ["data"]["Event"]["event_place"],
            "event_address" => $_POST ["data"]["Event"]["event_address"],
            "event_price" => $_POST ["data"]["Event"]["event_price"],
            "category_id" => $_POST ["data"]["Event"]["category_id"],
            "event_detail" => $_POST ["data"]["Event"]["event_detail"],
            "question_1" => $_POST ["data"]["Event"] ["question_1"],
            "question_2" => $_POST ["data"]["Event"] ["question_2"],
            "question_1" => $_POST ["data"]["Event"] ["question_3"]
            );
        
        return $this->redirect(array('action' => 'add'));
        
    }
         
}
