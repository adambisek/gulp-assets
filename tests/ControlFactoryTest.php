<?php

/**
 * Created by Adam Bisek <adam.bisek@gmail.com>
 */
class ControlFactoryTest extends PHPUnit_Framework_TestCase
{

	/** @var \GulpAssets\ControlFactory */
	private $factory;


	public function setUp()
	{
		parent::setUp();
		$this->factory = new \GulpAssets\ControlFactory([
			'front' => [
				'css' => [
					'cssFile.css',
				],
				'js' => [
					'jsFile.css',
				],
			],
			'admin' => [
				'css' => [
					'cssFile2.css',
				],
				'js' => [
					'jsFile2.css',
				],
			],
			'basePath' => 'abc',
		]);
	}


	public function testGetSet()
	{
		$this->assertEquals('abc', $this->factory->getBasePath());
	}


	public function testCreateCssControl()
	{
		$control = $this->factory->createCssControl('front');
		$this->assertInstanceOf('GulpAssets\CssControl', $control);
		$this->assertEquals(['cssFile.css'], $control->getFiles());
	}


	/**
	 *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Section frontNonExisting not found. Did you set it in config?
	 */
	public function testCreateCssControlSectionFail()
	{
		$control = $this->factory->createCssControl('frontNonExisting');
	}


	public function testCreateJsControl()
	{
		$control = $this->factory->createJsControl('front');
		$this->assertInstanceOf('GulpAssets\JsControl', $control);
		$this->assertEquals(['jsFile.css'], $control->getFiles());
	}


	/**
	 *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Section frontNonExisting not found. Did you set it in config?
	 */
	public function testCreateJsControlSectionFail()
	{
		$control = $this->factory->createJsControl('frontNonExisting');
	}

}
