<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'name';

	var $hasMany = array (
		'Post' => array(
			'className'=>'Post',
			'foreignKey'=>'id',
			'dependent'=>false,
			'conditions'=>'',
			'fields'=>'',
			'order'=>'',
			'limit'=>'',
			'offset'=>'',
			'exclusive'=>'',
			'finderQuery'=>'',
			'counterQuery'=>''
		)
	);

	var $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter your name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Username is required',
			),
			'isUnique'=>array(
				'rule' => array('isUnique'),
				'message' => 'That username has already been taken',
			)
		),
		'password' => array(
			'between' => array(
				'rule' => array('between', 5, 15),
				'message' => 'Password must be between 5 and 15 characters.',
			),
			'matchPasswords' => array(
				'rule' => array('matchPasswords'),
				'message' => 'The passwords do not match.',
			)
		)
		// 'roles' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		'message' => 'Please enter a valid role',
		// 	),
		// ),
	);

	// CUSTOM FUNCTION
	function matchPasswords($data) {
		if ($data['password'] == $this->data['User']['password_confirmation']) {
			return true;
		}
		$this->invalidate('password_comfirmation', 'matchPasswords');
		return false;
	}
	// ALSO THIS ONE
	function hashpasswords($data) {
		if (isset($this->data['User']['password'])) {
			// $password = $this->data['User']['password'];
			$this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
			return $data;
		}
		return $data;
	}
	// actions before saving to database
	function beforeSave() {
		$this->hashPasswords(NULL, TRUE);
		return true;
	}
}
