<?php

namespace GulpAssets;

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class ControlFactory
{

	/** @var array */
	private $config;

	/** @var string */
	private $basePath;


	public function __construct(array $config = NULL)
	{
		if($config !== NULL){
			$this->setConfig($config);
			if(isset($config['basePath'])){
				$this->setBasePath($config['basePath']);
			}
		}
	}


	public function setConfig(array $config)
	{
		$this->config = $config;
	}


	/**
	 * @return string
	 */
	public function getBasePath()
	{
		return $this->basePath;
	}


	/**
	 * @param string $basePath
	 */
	public function setBasePath($basePath)
	{
		$this->basePath = $basePath;
	}


	public function createCssControl($section)
	{
		if(!isset($this->config[$section])){
			throw new \InvalidArgumentException("Section $section not found. Did you set it in config?");
		}
		$control = new CssControl();
		if(isset($this->config[$section]['css'])){
			$control->setFiles($this->config[$section]['css']);
		}
		$control->setBasePath($this->basePath);
		return $control;
	}


	public function createJsControl($section)
	{
		if(!isset($this->config[$section])){
			throw new \InvalidArgumentException("Section $section not found. Did you set it in config?");
		}
		$control = new JsControl();
		if(isset($this->config[$section]['js'])) {
			$control->setFiles($this->config[$section]['js']);
		}
		$control->setBasePath($this->basePath);
		return $control;
	}

}