<?php

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class CssControlTest extends PHPUnit_Framework_TestCase
{

	/** @var \GulpAssets\CssControl */
	private $control;


	public function setUp()
	{
		parent::setUp();
		$this->control = new \GulpAssets\CssControl();
		$this->control->setTemplateFactory(new TemplateFactoryMock());
		$this->control->template->baseUrl = 'http://url.tld';
		$this->control->setFiles([
			'style.css' => 'screen',
		]);
		$this->control->setBasePath(__DIR__ . '/test-assets');
	}


	public function testGetSet()
	{
		$this->assertEquals([
			'style.css' => 'screen'
		], $this->control->getFiles());
		$this->assertEquals(__DIR__ . '/test-assets', $this->control->getBasePath());
	}


	public function testRender()
	{
		ob_start();
		$this->control->render();
		$contents = ob_get_clean();
		$regexp = '#';
		$regexp .= preg_quote('<link rel="stylesheet" type="text/css" media="screen" href="http://url.tld/style.css?');
		$regexp .= '([a-zA-Z0-9]+)';
		$regexp .= preg_quote('">');
		$regexp .= '#';
		$this->assertRegExp($regexp, $contents);
	}

}


