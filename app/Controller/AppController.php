<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers=array('Js'=>array('Jquery'),            
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		);
	public $components=array('RequestHandler', 'Email','Session', 'Auth'=>array(
										'authorize'=>array('controller'),
										 	/*'Form' => array(
           								 		'fields' => array('username'=>'username', 'password'=>'password'),
           								 		'scope' => array('User.active' => 1)                								
           										 )           								 
       										 ),*/
										
										'loginRedirect'=>array('controller'=>'pages','action' =>'home2'),
										'logoutRedirect'=>array('controller'=>'pages','action'=>'home2','admin'=>false),
										'loginAction'=>array('controller'=>'users','action'=>'login','admin'=>false),
										'authError' => 'No tiene acceso a este contenido, por favor Inicia Sesión como Administrador.',
										'authenticate' => array(
					'Form' => array(
					'userModel' => 'User',
					'fields' => array(
						'username' => 'username'
					),
					//'scope' => array('User.active' => true),
				)
					),
							'flash' => array(
							'element' => 'alert',
						'key' => 'auth',
					'params' => array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				)
			)

							));

	public function beforeFilter(){
		$this->set('userGroup',$this->Auth->user('group'));
	}

	public function isAuthorized($user){
		//debug($user);
		if($user['group']=='admin' ) return true;
		if($user['group']=='registrado') {
			if(isset($this->request->prefix)){
				if($this->request->prefix=='admin')  return false;
					//$this->redirect(array('controller' => 'users', 'action' => 'login'));
					return false;
			}
			return true;
		}

			
		return false;
	}

}
