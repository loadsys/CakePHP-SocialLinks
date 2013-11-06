<?php
class SocialLinksBehavior extends ModelBehavior {

	/**
	 * Base settings array
	 *
	 * @var array
	 */
	protected $_settings = array(
		'blog' => 'blog',
		'pinterest' => 'pinterest',
		'googleplus' => 'googleplus',
		'youtube' => 'youtube',
		'linkedin' => 'linkedin',
		'facebook' => 'facebook',
		'twitter' => 'twitter',
	);

	/**
	 * Initiate behavior for the model using specified settings.
	 *
	 * Available settings:
	 *
	 * - blog: (string, optional) Blog Field Name value, can be set to FALSE
	 * - pinterest: (string, optional) Pinterest Field Name value, can be set to FALSE
	 * - googleplus: (string, optional) GooglePlus Field Name value, can be set to FALSE
	 * - youtube: (string, optional) YouTube Field Name value, can be set to FALSE
	 * - linkedin: (string, optional) LinkedIn Field Name value, can be set to FALSE
	 * - facebook: (string, optional) Facebook Field Name value, can be set to FALSE
	 * - twitter: (string, optional) Twitter Field Name value, can be set to FALSE
	 *
	 * @param Model $Model Model using the behavior
	 * @param array $settings Settings to override for model.
	 * @return void
	 */
	public function setup(Model $Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = $this->_settings;
		}
		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);
	}

	/**
	 * beforeValidate - beforeValidate callback, sets up validation rules on the social link fields
	 *
	 * @param  Model  $Model   [description]
	 * @param  array  $options [description]
	 * @return [type]          [description]
	 */
	public function beforeValidate(Model $Model, $options = array()) {
		$_ModelValidator = $Model->validator();

		//Foreach key in the settings array
		foreach($this->_settings as $key => $settingValue):

			//If the setting isn't set to false
			if($this->settings[$Model->alias][$key] !== FALSE) {
				//Switch on the social link type
				switch($key) {
					case 'blog':
						$this->_setupBlogValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					case 'pinterest':
						$this->_setupPinterestValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					case 'googleplus':
						$this->_setupGoogleplusValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					case 'youtube':
						$this->_setupYoutubeValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					case 'linkedin':
						$this->_setupLinkedinValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					case 'facebook':
						$this->_setupFacebookValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					case 'twitter':
						$this->_setupTwitterValidation($_ModelValidator, $this->settings[$Model->alias][$key]);
						break;
					default:
						//No Default case - field isn't part of the settings for this Behavior
						break;
				}
			}
		endforeach;
	}

	/**
	 * _setupBlogValidation - add validation to the Blog Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupBlogValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'url' => array(
				'rule' => array('url', TRUE),
				'message' => 'Please enter a valid url',
				'allowEmpty' => TRUE,
			),
		);
	}

	/**
	 * _setupPinterestValidation - add validation to the Pinterest Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupPinterestValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid Pinterest username',
				'allowEmpty' => TRUE,
			),
			'between' => array(
				'rule'    => array('between', 3, 15),
				'message' => 'Please enter a valid Pinterest username, must be between 3 and 15 characters long',
				'allowEmpty' => TRUE,
			),
		);
	}

	/**
	 * _setupGoogleplusValidation - add validation to the GooglePlus Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupGoogleplusValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid Google+ username',
				'allowEmpty' => TRUE,
			),
			'between' => array(
				'rule'    => array('between', 1, 50),
				'message' => 'Please enter a valid Google+ username, must be between 1 and 50 characters long',
				'allowEmpty' => TRUE,
			),
		);
	}

	/**
	 * _setupYoutubeValidation - add validation to the YouTube Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupYoutubeValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid YouTube username',
				'allowEmpty' => TRUE,
			),
			'between' => array(
				'rule'    => array('between', 1, 50),
				'message' => 'Please enter a valid YouTube username, must be between 1 and 50 characters long',
				'allowEmpty' => TRUE,
			),
		);
	}

	/**
	 * _setupLinkedinValidation - add validation to the LinkedIn Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupLinkedinValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid LinkedIn username',
				'allowEmpty' => TRUE,
			),
			'between' => array(
				'rule'    => array('between', 5, 30),
				'message' => 'Please enter a valid LinkedIn username, must be between 5 and 30 characters long',
				'allowEmpty' => TRUE,
			),
		);
	}

	/**
	 * _setupFacebookValidation - add validation to the Facebook Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupFacebookValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'alphanumeric_with_dot' => array(
				'rule' => '/^[a-zA-Z0-9.]/',
				'message' => 'Please enter a valid Facebook username or custom url',
				'allowEmpty' => TRUE,
			),
			'between' => array(
				'rule'    => array('between', 5, 255),
				'message' => 'Please enter a valid Facebook username or custom url, must be between 5 and 255 characters long',
				'allowEmpty' => TRUE,
			),
		);
	}

	/**
	 * _setupTwitterValidation - add validation to the Twitter Model property
	 *
	 * @param  [type] $_ModelValidator [description]
	 * @param  [type] $propertyName    [description]
	 * @return [type]                  [description]
	 */
	protected function _setupTwitterValidation(&$_ModelValidator, $propertyName) {
		$_ModelValidator[$propertyName] = array(
			'alphanumeric_with_underscores' => array(
				'rule' => '/^[a-zA-Z0-9_]/',
				'message' => 'Please enter a valid Twitter username',
				'allowEmpty' => TRUE,
			),
			'between' => array(
				'rule'    => array('between', 1, 15),
				'message' => 'Please enter a valid Twitter username, must be between 1 and 15 characters long',
				'allowEmpty' => TRUE,
			),
		);
	}

}