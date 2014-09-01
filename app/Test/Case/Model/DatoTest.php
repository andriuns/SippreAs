<?php
App::uses('Dato', 'Model');

/**
 * Dato Test Case
 *
 */
class DatoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dato',
		'app.user',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dato = ClassRegistry::init('Dato');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dato);

		parent::tearDown();
	}

}
