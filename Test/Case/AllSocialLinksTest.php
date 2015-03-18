<?php
/*
 * Custom test suite to execute all SocialLinks Plugin tests.
 */
class AllSocialLinksTest extends PHPUnit_Framework_TestSuite {
	public static $suites = array(
		'AllSocialLinksBehaviorsTest.php',
	);

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
