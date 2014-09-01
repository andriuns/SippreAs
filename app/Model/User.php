<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	 public $validate = array(
        'active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Ingresa un Nombre'
            ),
        ),
        'lastname' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite un apellido'
            ),
        ),
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite un usuario',
            ),
            'maximo caracteres' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Usuario entre 5 y 15 catacteres',
            ),
            'usuario unico' => array(
                'rule' => 'isUnique',
                'message' => 'El usuario ya existe!, intente con otro'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite una contraseña'
            ),
            'maximo caracteres' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Contraseña entre 5 y 15 caracteres'
            ),
            'Match passwords' => array(
                'rule' => 'matchPasswords',
                'message' => 'Contraseñas no cohinciden'
            ),
        ),
        'Confirmar contraseña' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Confirme su contraseña',
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Vuelva a ingresar un correo'
            ),
            'Email unico' => array(
                'rule' => 'isUnique',
                'message' => 'Ya es una cuenta Sippreas. Si es suya, inicie sesión ahora.'
            )
        ),
    );

    public function matchPasswords($data) {
        if ($data['password'] == $this->data['User']['Confirmar contraseña']) {
            return true;
        }
        $this->invalidate('Confirmar contraseña', 'Contraseñas no cohinciden');
        return false;
    }

    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
         
            return true;
    }
    //asociaciones
    public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    public $hasMany = array(
		'Dato' => array(
			'className' => 'Dato',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	public function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
}