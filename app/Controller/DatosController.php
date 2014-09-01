<?php
App::uses('AppController', 'Controller');
App::uses('CakePdf', 'CakePdf.Pdf');
/**
 * Datos Controller
 *
 * @property Dato $Dato
 * @property PaginatorComponent $Paginator
 */
class DatosController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    /**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
         public function excel ($id){
        $options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
        $data1 = $this->Dato->find('first', $options, array('Dato.datos'));
        $data2 = $data1['Dato']['datos'];
        $data = json_decode($data2, true);
        //debug($data);
       // die();
        //$this->set('_serialize', array('data'));
        //debug($data);
        //die();
        $this->set('posts', $data);
        
       
   }
	public function index() {            
            
            $user_id = $this->Auth->user('id');
            
            if($user_id){
            $this->Paginator->settings = array(
            'conditions' => array('Dato.user_id' => $user_id)
             );              
            }            
           
            $datos = $this->Paginator->paginate('Dato');
            $this->set(compact('datos'));
    
    
        //$this->set('datos',$this->Paginator->paginate($datos1));
	}
public function admin_index() {
		$this->Dato->recursive = 0;
		$this->set('datos', $this->Paginator->paginate());
               
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id=null) {
   $this->layout='tablasgraficas';
   
        if (!$this->Dato->exists($id)) {
            throw new NotFoundException(__('Dato invalido'));
        }
        
        //$ide= $this->Dato$this->Dato->primaryKey => $id;
        //$dataa=$id;
       // debug($ide);
        //die();
        if($this->Auth->user('group_id')==1){            
          $user_id = $this->Auth->user('id');          
         $opti = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id,'Dato.user_id' => $user_id));
         $dat = $this->Dato->find('list', $opti);
         //debug($dat);
         //die();               
            if(!empty($dat)){
              $options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
        // debug($this->Dato->find('first', $options));
        //$this->set('dato', $this->Dato->find('first', $options));

        $data1 = $this->Dato->find('first', $options, array('Dato.datos'));
        $data2 = $data1['Dato']['datos'];
        $data = json_decode($data2, true);
        //debug($datas);
        $this->set('_serialize', array('data'));
        $this->set('data', $data);
            }
            else{
                $this->Session->setFlash('No tiene acceso ha este contenido.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                return $this->redirect(array('action' => 'index'));                  
            }
               // $datos=  $this->Dato->find('list',array('conditions' => array('Dato.user_id' => $user_id)));
        }else{
             $options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
        $data1 = $this->Dato->find('first', $options, array('Dato.datos'));
        $data2 = $data1['Dato']['datos'];
        $data = json_decode($data2, true);
        //debug($datas);
        $this->set('_serialize', array('data'));
        $this->set('data', $data);  
        }
         
        
//       if ($this->request->is(array('post', 'put'))) {
//           			if ($this->Dato->save($this->request->data)) {                            
//                              $this->Session->DatosetFlash('Documento editado correctamente.', 'alert', array(
//                        'plugin' => 'BoostCake',
//                        'class' => 'alert-success'
//                    ));
//               // return $this->redirect(array('action' => 'index','admin'=>true));
//				
//			} else {
//				$this->Session->setFlash(__('El documento no se ha guardado. Por favor, intente nuevamente.'));
//			}
//		} else {
//			$options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
//			$this->request->data = $this->Dato->find('first', $options);
//		}
		
                }
    

    /**
 * add method
 *
 * @return void
 */
public function ola($id = null){
    $this->Dato->id = $id;
            if (!$this->Dato->exists()) {
                throw new NotFoundException(__('Invalid invoice'));
            }
            $this->pdfConfig = array(
                'orientation' => 'portrait',
                'download' => true,
                'filename' => 'Invoice.pdf' 
            );
            $this->set('invoice', $this->Dato->read(null, $id));
            
        
}
public function add() {
            
            $this->layout='tablasgraficas';
           
            if ($this->request->is('post')) {
			$this->Dato->create();
			if ($this->Dato->save($this->request->data)) {
				$this->Session->setFlash(__('El perfil que has ingresado es incorrecto, no posee acceso ha esta informacion!!'), 'alert', array(
                                    'plugin' => 'BoostCake',
                                    'class' => 'alert-danger'
                                ));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('no se ha podido guardar intenta nuevamente.'));
                                return $this->redirect(array('action' => 'index'));
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
            
		if (!$this->Dato->exists($id)) {
			throw new NotFoundException(__('Invalid dato'));
		}
                if($this->Auth->user('group_id')==1){
          $user_id = $this->Auth->user('id'); 
         $opti = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id,'Dato.user_id' => $user_id));
         $dat = $this->Dato->find('list', $opti);
         //debug($dat);
         //die();
                
            if(!empty($dat)){
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dato->save($this->request->data)) {
				$this->Session->setFlash(__('The dato has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dato could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
			$this->request->data = $this->Dato->find('first', $options);
		}
		$users = $this->Dato->User->find('list');
		$this->set(compact('users'));
                }else{
                   $this->Session->setFlash('No tiene acceso ha este contenido.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                return $this->redirect(array('action' => 'index'));
                 
                }
                }
                if ($this->request->is(array('post', 'put'))) {
			if ($this->Dato->save($this->request->data)) {
                              $this->Session->setFlash('Documento editado correctamente.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                return $this->redirect(array('action' => 'index','admin'=>true));
				
			} else {
				$this->Session->setFlash(__('El documento nose ha guardado. Por favor, intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
			$this->request->data = $this->Dato->find('first', $options);
		}
		$users = $this->Dato->User->find('list');
		$this->set(compact('users'));
                }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dato->id = $id;
		if (!$this->Dato->exists()) {
			throw new NotFoundException(__('Invalid dato'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Dato->delete()) {
			$this->Session->setFlash(__('The dato has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dato could not be deleted. Please, try again.'));
		}
                if($this->Auth->user('group_id')==0){
                    return $this->redirect(array('action' => 'index', 'admin'=>true));
                }else{
                    return $this->redirect(array('action' => 'index'));
                }
		
	}
        
        
                }
