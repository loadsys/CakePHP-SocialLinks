<?php
App::uses('SocialLinksBehavior', 'SocialLinks.Model/Behavior');

/**
 * SocialLinks Test Case
 *
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
		$this->SocialLinks = new SocialLinksBehavior($this->User);
		$this->SocialLinks->setup($this->User);
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

	public function testsIncomplete() {
		$this->markTestIncomplete("No tests written for SocialLinksBehaviorTest");
	}

}
