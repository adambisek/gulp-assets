<?php

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class TemplateFactoryMock implements \Nette\Application\UI\ITemplateFactory
{

	public function createTemplate(\Nette\Application\UI\Control $control = NULL)
	{
		return new Template();
	}

}


class Template extends \stdClass implements \Nette\Application\UI\ITemplate
{

	public function render()
	{
		// TODO: Implement render() method.
	}

	public function setFile($file)
	{
		// TODO: Implement setFile() method.
	}

	public function getFile()
	{
		// TODO: Implement getFile() method.
	}

}