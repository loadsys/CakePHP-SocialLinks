<?php
/**
 * Tests the SocialLinks Behavior Class
 */
App::uses('SocialLinksBehavior', 'SocialLinks.Model/Behavior');

/**
 * SocialLinksBehaviorTest
 *
 * @package SocialLinks.Test.Case.Model.Behavior
 */
class SocialLinksBehaviorTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var	array
	 */
	public $fixtures = array(
		'plugin.social_links.user'
	);

	/**
	 * setUp method
	 *
	 * @return	void
	 */
	public function setUp() {
		$this->User = ClassRegistry::init('SocialLinks.User');
		$this->User->Behaviors->load('SocialLinks.SocialLinks');

		parent::setUp();
	}

	/**
	 * tearDown method
	 *
	 * @return	void
	 */
	public function tearDown() {
		unset($this->SocialLinks);
		unset($this->User);
		parent::tearDown();
	}

	/**
	 * tests validation for the fields in the behavior
	 *
	 * @param multi $fieldName the name of the field to test the validation for
	 * @param multi $fieldValue the value of the field to test validation for
	 * @param multi $expectedResult the expected result of the validates call
	 * @return void
	 * @dataProvider providerValidationForField
	 */
	public function testsValidationForField($fieldName, $fieldValue, $expectedResult) {
		$data = array(
			'User' => array(
				'id' => '7d5b22bd-fc92-11e3-b153-080027dec79b',
				'token' => '40e9a32090f03eed13a6080e0b21a58d',
				'username' => 'test',
				'password' => '49342febad93ceee33ef5635e750aacd163b2106', // == `test`
				'first_name' => 'Test',
				'last_name' => 'User',
			)
		);

		$data['User'][$fieldName] = $fieldValue;
		$this->User->set($data);

		$validatesResponse = $this->User->validates(array('fieldList' => array($fieldName)));

		$this->assertEquals(
			$expectedResult,
			$validatesResponse,
			"Model::validates didn't return the expected return for the `{$fieldName}` field with the input of `{$fieldValue}`"
		);

		// if the expectedResult is false, ensure the $fieldName failed validation
		if ($expectedResult === false) {
			$errors = $this->User->invalidFields();
			$this->assertArrayHasKey(
				$fieldName,
				$errors,
				"The {$fieldName} was not in the list of invalid fields"
			);
		}
	}

	/**
	 * data provider for the testsValidationForField method
	 *
	 * @return array data inputs for the testsValidationForField method
	 */
	public function providerValidationForField() {
		return array(
			// blog field
			"Blog, Normal URL" => array(
				"blog",
				"http://wwww.google.com/",
				true,
			),
			"Blog, URL Without HTTP" => array(
				"blog",
				"wwww.google.com/",
				false,
			),
			"Blog, URL Without HTTP or www" => array(
				"blog",
				"google.com/",
				false,
			),
			"Blog, Invalid URL, Random String" => array(
				"blog",
				"google",
				false,
			),
			"Blog, `null`" => array(
				"blog",
				null,
				true,
			),

			// pinterest field
			"pinterest, Valid String" => array(
				"pinterest",
				"random",
				true,
			),
			"pinterest, Valid Mixed AlphaNumeric String" => array(
				"pinterest",
				"asdfkl345",
				true,
			),
			"pinterest, `null`" => array(
				"pinterest",
				null,
				true,
			),
			"pinterest, Invalid String, too short" => array(
				"pinterest",
				"12",
				false,
			),
			"pinterest, Invalid String, too long" => array(
				"pinterest",
				"12random1234567890",
				false,
			),

			// googleplus field
			"googleplus, Valid String" => array(
				"googleplus",
				"random",
				true,
			),
			"googleplus, Valid Mixed AlphaNumeric String" => array(
				"googleplus",
				"asdfkl345",
				true,
			),
			"googleplus, `null`" => array(
				"googleplus",
				null,
				true,
			),
			"googleplus, Invalid String, too long" => array(
				"googleplus",
				"aasldkfjalsdjkfalsjdflyuiyoiuyuoiyuioyuyuyiuyuoiyouiyoiuyuiouyi",
				false,
			),

			// youtube field
			"youtube, Valid String" => array(
				"youtube",
				"random",
				true,
			),
			"youtube, Valid Mixed AlphaNumeric String" => array(
				"youtube",
				"asdfkl345",
				true,
			),
			"youtube, `null`" => array(
				"youtube",
				null,
				true,
			),
			"youtube, Invalid String, too long" => array(
				"youtube",
				"aasldkfjalsdjkfalsjdflyuiyoiuyuoiyuioyuyuyiuyuoiyouiyoiuyuiouyi",
				false,
			),

			// linkedin field
			"linkedin, Valid String" => array(
				"linkedin",
				"random",
				true,
			),
			"linkedin, Valid Mixed AlphaNumeric String" => array(
				"linkedin",
				"asdfkl345",
				true,
			),
			"linkedin, `null`" => array(
				"linkedin",
				null,
				true,
			),
			"linkedin, Invalid String, too short" => array(
				"linkedin",
				"12",
				false,
			),
			"linkedin, Invalid String, too long" => array(
				"linkedin",
				"12random123456789asdfasdfasdfasdfasdfasdf0",
				false,
			),

			// facebook field
			"facebook, Valid String" => array(
				"linkedin",
				"random",
				true,
			),
			"facebook, Valid Mixed AlphaNumeric String" => array(
				"facebook",
				"asdfkl345.09ASDFASDFASDF",
				true,
			),
			"facebook, `null`" => array(
				"facebook",
				null,
				true,
			),
			"facebook, Invalid String, too short" => array(
				"facebook",
				"12as",
				false,
			),
			"facebook, Invalid String, too long" => array(
				"facebook",
				"12random123456789asdfasdfasdfasdfasdfasdf0ASLDKFJASDLFJASAFFfffffffffffffljadaljsdfljasdflajsdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasd",
				false,
			),
		);
	}

}
