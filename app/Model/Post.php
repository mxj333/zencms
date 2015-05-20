<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 */

App::uses('MxValidation', 'Localized.Validation');

class Post extends AppModel {
    
                    public $actsAs = array(
                            'Translate' => array(
                                'title'
                            )
                        );

/**
 * Validation rules
 *
 * @var array
 * 
 * 
 */
                    
                    public $validate = array(
                    'title' => array(
                            'notEmpty' => array(
                            'rule' => array('notEmpty'),
                            'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                            ),
                    ),
                    'body' => array(
                            'notEmpty' => array(
                            'rule' => array('notEmpty'),
                            'message' => ' body Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                            ),
                    ),
                    'user_id' => array(
                            'notEmpty' => array(
                            'rule' => array('notEmpty'),
                            'message' => ' userId body Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                            ),
                    ),
                        'postal' => array(
                            'valid' => array(
                                'rule' => array('postal', null, 'mx'),
                                'message' => 'Must be valid mexico postal code'
                            )
                        )
                    );
//	public $validate = array(
//                                        'postal' => array(
//			'valid' => array(
//				'rule' => array('postal', null, 'mx'),
//				'message' => 'Must be valid mexico postal code'
//			)
//		),
//		'user_id' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'title' => array(
//			'notEmpty' => array(
//				'rule' => array('notEmpty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//            
//	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
/*
 * 在 Post 模型中调用 isOwnedBy() 来告诉用户是否有权限来编辑post. 
 */        
                    public function isOwnedBy($post, $user) {
                        return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
                    }
                    
                    
                    
                    
}
