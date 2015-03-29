<?php
/**
 * Fixtures for the User Model to Test
 */

/**
 * UserFixture
 *
 * @package SocialLinks.Test.Fixture
 */
class UserFixture extends CakeTestFixture {

	/**
	 * fields for the User Fixture
	 *
	 * @var array
	 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'token' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'blog' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pinterest' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'googleplus' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'youtube' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'linkedin' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'facebook' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'twitter' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	/**
	 * Records to load into the database
	 *
	 * @var array
	 */
	public $records = array(
		array(
			'id' => '7d5b22bd-fc92-11e3-b153-080027dec79b',
			'token' => '40e9a32090f03eed13a6080e0b21a58d',
			'username' => 'test',
			'password' => '49342febad93ceee33ef5635e750aacd163b2106', // == `test`
			'first_name' => 'Test',
			'last_name' => 'User',
			'blog' => 'https://www.testingasdf.com/',
			'pinterest' => 'random',
			'googleplus' => 'random',
			'youtube' => 'random',
			'linkedin' => 'random',
			'facebook' => 'random',
			'twitter' => 'random',
		),
		array(
			'id' => 'c64ddc9c-7193-11e4-b74c-000c290352bb',
			'token' => 'bb0a91cfa4f3b703531c1dc4f5f64b89',
			'username' => 'blowfish',
			'password' => '$2a$10$GETe7PdF2xekpYqdVfK5EOGi9MsBw6MbNI.NLZkLQoDipykAy3h76',
			'first_name' => 'Testing',
			'last_name' => 'Second',
			'blog' => null,
			'pinterest' => null,
			'googleplus' => null,
			'youtube' => null,
			'linkedin' => null,
			'facebook' => null,
			'twitter' => null,
		),
	);
}
