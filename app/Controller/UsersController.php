<?php

App::uses('Controller', 'AppController');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator' => array('limit' => 16, 'order' => array('User.id' => 'desc')));
    public $helpers=array('Js');
    //public $uses=array('Dato');

    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('recuperar', 'registro', 'login');
        // $this->Auth->fields = array('username' => 'email');
    }
public function admin_search($search = null)
    {
        $this->User->recursive = 0;
      
        if(!$search)
        {
            $this->User->find('all', array('order' => 'name'));
        }
        else
        {
			//-- Query the database using a Where clause
           $this->User->find('all', 
				array(
					'order' => 'name',
					'conditions' => array('name LIKE' => '%'.$search.'%')
                )
			);
        }
                
		// Set up your Variables to pass into the view
       $this->set('users', $this->Paginator->paginate());
        
      

		// Use the index template instead of the default rendered search template
       // $this->render('admin_index');
    }
    public function registro() {
        $this->set('title_for_layout', 'Registrarse');
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['active'] = 1;
            $this->request->data['User']['group_id'] = 1;
            if ($this->User->save($this->request->data)) {
                $email = new CakeEmail('gmail');
                $email->from(array('sippreasinfo@gmail.com' => 'Sippreas'));
                $email->to($this->data['User']['email']);
                $email->subject('Sippreas. Confirma tu registro');
                $email->template('registro');
                $email->viewVars(array('name' => $this->data['User']['name'],
                    'lastname' => $this->data['User']['lastname'],
                    'username' => $this->data['User']['username'],
                    'email' => $this->data['User']['email'],
                    'password' => $this->data['User']['password']));
                $email->emailFormat('html');
                if ($email->send()) {
                    $this->Session->setFlash('Registro Exitoso! En un momento recibiras en tu correo electronico la confirmacion del registro.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    return $this->redirect(array('action' => 'login'));
                } else {
                    $this->User->delete('User.id');
                    $this->Session->setFlash('El registro no se completo. Vuelve a intentarlo.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'));
                }
            }
            $this->Session->setFlash('Datos incorrectos', 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function recuperar() {
        $this->set('title_for_layout', 'Recuperar contraseña');
        if ($this->request->is('post')) {
            $mail = $this->request->data['User']['email'];
            $data = $this->User->findByEmail($mail);
            //debug($data);
            //die();   
            if (!$data) {
                $this->Session->setFlash('El Usuario no se encuentra registrado', 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
                $this->redirect('/users/recuperar');
            } else {
                $data['User']['password'] = $this->User->randomPassword();
                $name = $data['User']['name'];
                $lastname = $data['User']['lastname'];
                $mail = $data['User']['email'];
                $username = $data['User']['username'];
                // debug($this->User->save($data));
                //die();
                if ($this->User->save($data, false)) {
                    $email = new CakeEmail('gmail');
                    $email->to($mail);
                    $email->from(array('sippreasinfo@gmail.com' => 'Sippreas'));
                    $email->emailFormat('html');
                    $email->subject('Restablecer contraseña');
                    $email->viewVars(array('email' => $mail, 'username' => $username, 'name' => $name, 'lastname' => $lastname, 'password' => $data['User']['password']));
                    $email->template('reset');
                    if ($email->send()) {
                        $this->Session->setFlash('Por favor verifica tu correo, se te ha enviado una nueva contraseña.', 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-success'
                        ));
                    } else {

                        $this->Session->setFlash('Por el momeno el servidor esta presentando fallos, intenta nuevamente mas tarde', 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-danger'
                        ));
                    }
                }
            }
            $this->redirect('/users/login');
        }
    }

    public function view($id = null) {
        $this->set('title_for_layout', 'Ver perfil');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        $user_id = $this->Auth->user('id');
        // debug($user_id);
        if ($id == $user_id) {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
            $this->set('user', $this->User->find('first', $options));

            //$user_id = $this->Auth->user('id');
            //$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
            //$this->set('user', $this->User->find('first', $options));
            //$user = $this->User->find('all',array('User.id' => $user_id));
            //$this->set('user', $this->User->find('first', $user));
        } else {
            //$user_id = $this->Auth->user('id');
            $this->Session->setFlash(__('El perfil que has ingresado es incorrecto, no posee acceso ha esta informacion!!'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
            //$user = $this->User->find('all',array('User.id' => $user_id));
            //$this->set('user', $this->User->find('first', $user));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function login() {
        $this->set('title_for_layout', 'Iniciar sesión');
        if ($this->Session->check('Auth.User')) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $dato = $this->request->data['User']['username'];
            $dato2 = $this->User->findByUsername($dato);

            if ($this->Auth->login()) {
                $status = $this->Auth->user('active');
                if ($status == 0) {
                    $dato2['User']['active'] = 1;
                    $dato2['User']['password'] = $this->User->randomPassword();
                    $name = $dato2['User']['name'];
                    $lastname = $dato2['User']['lastname'];
                    $mail = $dato2['User']['email'];
                    $username = $dato2['User']['username'];
                    // debug($this->User->save($data));
                    //die();
                    if ($this->User->save($dato2, false)) {
                        $email = new CakeEmail('gmail');
                        $email->to($mail);
                        $email->from(array('sippreasinfo@gmail.com' => 'Sippreas'));
                        $email->emailFormat('html');
                        $email->subject('Restablecer contraseña');
                        $email->viewVars(array('email' => $mail, 'username' => $username, 'name' => $name, 'lastname' => $lastname, 'password' => $dato2['User']['password']));
                        $email->template('reset');
                        if ($email->send()) {
                            $this->Session->setFlash('Por favor verifica tu cuenta, se te ha activado la cuenta con una nueva contraseña.', 'alert', array(
                                'plugin' => 'BoostCake',
                                'class' => 'alert-success'
                            ));
                        } else {

                            $this->Session->setFlash('Por el momeno el servidor esta presentando fallos, intenta nuevamente mas tarde', 'alert', array(
                                'plugin' => 'BoostCake',
                                'class' => 'alert-danger'
                            ));
                        }
                    }
                    $this->Session->setFlash('Tu cuenta se ha reactivado, porfavor mira tu correo para que puedas acceder con tu nueva contraseña', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                            )
                    );
                    $this->Session->write('Auth.User.group', $this->User->Group->field('title', array('Group.id' => $this->Auth->user('group_id'))));
                    $this->redirect(array('controller' => 'users', 'action' => 'index', $this->Auth->user('group') => true));
                } else {
                    $this->Session->write('Auth.User.group', $this->User->Group->field('title', array('Group.id' => $this->Auth->user('group_id'))));
                    $this->redirect(array('controller' => 'users', 'action' => 'index', $this->Auth->user('group') => true));
                }

                // return $this->redirect($this->Auth->redirectUrl());
                // Prior to 2.3 use
                // `return $this->redirect($this->Auth->redirect());`
            } else {
                $this->Session->setFlash('usuario o contraseña invalidos', 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                        )
                );
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function admin_logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home2'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->set('title_for_layout', 'Editar informacion');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(('Usuario Invalido'));
        }
        $id_nuevo = $this->Auth->user('id');
        
        if ($id == $id_nuevo) {
            if ($this->request->is(array('post', 'put'))) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('El usuario se ha actualizado correctamente.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('El usuario no se ha guardado. Por favor, Intente nuevamnte.', 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                }
            } else {
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $this->request->data = $this->User->find('first', $options);
            }
        } else {
            $this->Session->setFlash(__('El usuario no se ha editado, no posee acceso ha esta informacion!!'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
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
        $id_nu = $this->Auth->user('id');
        if ($id == $id_nu) {
            if (!$id) {
                $this->Session->setFlash('Ingrese un Id correcto', 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
                $this->redirect(array('action' => 'index'));
            }

            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Session->setFlash('Usuario no existe', 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
                $this->redirect(array('action' => 'index'));
            }
            if ($this->User->saveField('active', 0)) {
                $this->Session->setFlash(_('Tu cuenta se ha eliminado correctamente.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'logout'));
            }
        } else {
            $this->Session->setFlash(__('El usuario no se ha eliminado, no posee acceso ha esta informacion!!'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title_for_layout', 'Usuarios');
        //$this->layout = 'admin';
       
       $this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
        //$this->render('admin_add');
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->set('title_for_layout', 'ver perfil');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
        $this->render('admin_view');
    }
    

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->set('title_for_layout', 'Añadir usuario');
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario se guardado correctamente.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Datos incorrectos.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Editar informacion');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('La informacion se ha acutualizado correctamente.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Datos incorrectos.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    public function admin_delete($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Id no es correcto, no posee acceso ha esta informacion.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('El usuario no existe.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->saveField('active', 0)) {
            $this->Session->setFlash(__('Usuario %s desactivado correctamente.', h($id)), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-warning'
            ));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El usuario no se ha desactivado.'), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-danger'
        ));
        $this->redirect(array('action' => 'index'));
    }

    //$mensaje=array(('alert',array('plugin' => 'BoostCake', 'class' => 'alert-success')));
    public function admin_activate($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Proporcione un Id.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('proporsione un usuario correcto, no posee acceso ha esta informacion!!'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->saveField('active', 1)) {
            $this->Session->setFlash(__('El usuario %s se activado correctamente.',h($id)), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));

            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuario no activado'));
        $this->redirect(array('action' => 'index'));
    }

}
