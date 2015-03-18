<?php
/*
 * Custom test suite to execute all SocialLinks Plugin behavior tests.
 */
class AllSocialLinksBehaviorsTest extends PHPUnit_Framework_TestSuite {
	public static function suite() {
		$suite = new CakeTestSuite('All SocialLinks Plugin Behavior Tests');
		$suite->addTestDirectoryRecursive(dirname(__FILE__) . '/Model/Behavior/');
		return $suite;
	}
}
