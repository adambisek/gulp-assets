<?php

declare(strict_types=1);

namespace GulpAssets;

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class ControlFactory
{

	/** @var mixed[] */
	private $config;

	/** @var string */
	private $basePath;


	public function __construct(array $config = null)
	{
		if ($config !== null) {
			$this->setConfig($config);
			if (isset($config['basePath'])) {
				$this->setBasePath($config['basePath']);
			}
		}
	}


	/**
	 * @param mixed[] $config
	 */
	public function setConfig(array $config): void
	{
		$this->config = $config;
	}


	/**
	 * @return string
	 */
	public function getBasePath(): string
	{
		return $this->basePath;
	}


	/**
	 * @param string $basePath
	 */
	public function setBasePath(string $basePath): void
	{
		$this->basePath = $basePath;
	}


	/**
	 * @param mixed $section
	 * @return CssControl
	 */
	public function createCssControl($section): CssControl
	{
		if (!isset($this->config[$section])) {
			throw new \InvalidArgumentException('Section "' . $section . '" not found. Did you set it in config?');
		}

		$control = new CssControl;

		if (isset($this->config[$section]['css'])) {
			$control->setFiles($this->config[$section]['css']);
		}

		$control->setBasePath($this->basePath);

		return $control;
	}


	/**
	 * @param mixed $section
	 * @return JsControl
	 */
	public function createJsControl($section): JsControl
	{
		if (!isset($this->config[$section])) {
			throw new \InvalidArgumentException('Section "' . $section . '" not found. Did you set it in config?');
		}

		$control = new JsControl;

		if (isset($this->config[$section]['js'])) {
			$control->setFiles($this->config[$section]['js']);
		}

		$control->setBasePath($this->basePath);

		return $control;
	}

}