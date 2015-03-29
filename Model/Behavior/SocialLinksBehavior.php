<?php
/**
 * SocialLinks Behavior
 *
 * Loads a a behavior for defining fields for social sites and providing validation
 * for the value
 */
App::uses('ModelBehavior', 'Model');

/**
 * SocialLinksBehavior
 *
 * @package SocialLinks.Model.Behavior
 */
class SocialLinksBehavior extends ModelBehavior {

	/**
	 * Base settings array
	 *
	 * @var array
	 */
	protected $settings = array(
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
			$this->settings[$Model->alias] = $this->settings;
		}
		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);
	}

	/**
	 * beforeValidate callback, sets up the validation rules on the fields
	 *
	 * @param Model $Model the model instance the callback is called on
	 * @param array  $options options passed from Model::save()
	 * @return bool true if validation should continue, false otherwise
	 */
	public function beforeValidate(Model $Model, $options = array()) {
		$ModelValidatorClass = $Model->validator();

		// foreach key in the settings array
		foreach($this->settings as $key => $settingValue):

			// If the setting isn't set to false
			if ($this->settings[$Model->alias][$key] !== false) {
				//Switch on the social link type
				switch ($key) {
					case 'blog':
						$this->validateBlog($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					case 'pinterest':
						$this->validatePinterest($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					case 'googleplus':
						$this->validateGooglePlus($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					case 'youtube':
						$this->validateYouTube($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					case 'linkedin':
						$this->validateLinkedIn($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					case 'facebook':
						$this->validateFacebook($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					case 'twitter':
						$this->validateTwitter($ModelValidatorClass, $this->settings[$Model->alias][$key]);
						break;
					default:
						//No Default case - field isn't part of the settings for this Behavior
						break;
				}
			}
		endforeach;
	}

	/**
	 * validate a blog url, uses the url rule to validate the field
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validateBlog(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'url' => array(
				'rule' => array('url', true),
				'message' => 'Please enter a valid url',
				'allowEmpty' => true,
			),
		);
	}

	/**
	 * validate a Pinterest username, using a regex
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validatePinterest(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid Pinterest username',
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 3, 15),
				'message' => 'Please enter a valid Pinterest username, must be between 3 and 15 characters long',
				'allowEmpty' => true,
			),
		);
	}

	/**
	 * validate a GooglePlus username, using a regex
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validateGooglePlus(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid Google+ username',
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 50),
				'message' => 'Please enter a valid Google+ username, must be between 1 and 50 characters long',
				'allowEmpty' => true,
			),
		);
	}

	/**
	 * validate a YouTube username, using a regex
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validateYouTube(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid YouTube username',
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 50),
				'message' => 'Please enter a valid YouTube username, must be between 1 and 50 characters long',
				'allowEmpty' => true,
			),
		);
	}

	/**
	 * validate a LinkedIn username, using a regex
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validateLinkedIn(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Please enter a valid LinkedIn username',
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 5, 30),
				'message' => 'Please enter a valid LinkedIn username, must be between 5 and 30 characters long',
				'allowEmpty' => true,
			),
		);
	}

	/**
	 * validate a Facebook username, using a regex
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validateFacebook(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'alphanumeric_with_dot' => array(
				'rule' => '/^[a-zA-Z0-9.]/',
				'message' => 'Please enter a valid Facebook username or custom url',
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 5, 255),
				'message' => 'Please enter a valid Facebook username or custom url, must be between 5 and 255 characters long',
				'allowEmpty' => true,
			),
		);
	}

	/**
	 * validate a Twitter username, using a regex
	 *
	 * @param ModelValidator &$ModelValidatorClass the ModelValidator for the Model the behavior is modifying
	 * @param string $propertyName the name of the field, this is adding validation for
	 * @return void
	 */
	protected function validateTwitter(&$ModelValidatorClass, $propertyName) {
		$ModelValidatorClass[$propertyName] = array(
			'alphanumeric_with_underscores' => array(
				'rule' => '/^[a-zA-Z0-9_]/',
				'message' => 'Please enter a valid Twitter username',
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 15),
				'message' => 'Please enter a valid Twitter username, must be between 1 and 15 characters long',
				'allowEmpty' => true,
			),
		);
	}

}
