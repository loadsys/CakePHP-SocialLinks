<?php
/**
 * Custom test suite to execute all SocialLinks Plugin tests.
 */

/*
 * AllSocialLinksTest
 *
 * @package SocialLinks.Test.Case
 */
class AllSocialLinksTest extends PHPUnit_Framework_TestSuite {

	/**
	 * the list of suites to include
	 *
	 * @var array
	 */
	public static $suites = array(
		'AllSocialLinksBehaviorsTest.php',
	);

	/**
	 * the overall suite for this class
	 *
	 * @return CakeTestSuite
	 */
	public static function suite() {
		$path = dirname(__FILE__) . '/';
		$suite = new CakeTestSuite('All SocialLinks Tests');

		foreach (self::$suites as $file) {
			if (is_readable($path . $file)) {
				$suite->addTestFile($path . $file);
			}
		}

		return $suite;
	}
}
