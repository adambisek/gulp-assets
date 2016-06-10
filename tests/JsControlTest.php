<?php

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class JsControlTest extends PHPUnit_Framework_TestCase
{

	/** @var \GulpAssets\JsControl */
	private $control;


	public function setUp()
	{
		parent::setUp();
		$this->control = new \GulpAssets\JsControl();
		$this->control->setTemplateFactory(new TemplateFactoryMock());
		$this->control->template->baseUrl = 'http://url.tld';
		$this->control->setFiles([
			'script.js',
		]);
		$this->control->setBasePath(__DIR__ . '/test-assets');
	}


	public function testGetSet()
	{
		$this->assertEquals([
			'script.js'
		], $this->control->getFiles());
		$this->assertEquals(__DIR__ . '/test-assets', $this->control->getBasePath());
	}


	public function testRender()
	{
		ob_start();
		$this->control->render();
		$contents = ob_get_clean();
		$regexp = '#';
		$regexp .= preg_quote('<script type="text/javascript" src="http://url.tld/script.js?');
		$regexp .= '([a-zA-Z0-9]+)';
		$regexp .= preg_quote('"></script>');
		$regexp .= '#';
		$this->assertRegExp($regexp, $contents);
	}

}


