<?php
/**
 * Custom test suite to execute all SocialLinks Plugin Behavior tests.
 */

/*
 * AllSocialLinksBehaviorsTest
 *
 * @package SocialLinks.Test.Case
 */
class AllSocialLinksBehaviorsTest extends PHPUnit_Framework_TestSuite {

	/**
	 * the overall suite for this class
	 *
	 * @return CakeTestSuite
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All SocialLinks Plugin Behavior Tests');
		$suite->addTestDirectoryRecursive(dirname(__FILE__) . '/Model/Behavior/');
		return $suite;
	}
}
