<?php

namespace GulpAssets;

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class BaseControl extends \Nette\Application\UI\Control
{

	/** @var array */
	protected $files;

	/** @var string */
	private $basePath;


	/**
	 * @return array
	 */
	public function getFiles()
	{
		return $this->files;
	}


	/**
	 * @param array $files
	 */
	public function setFiles($files)
	{
		$this->files = $files;
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


	protected function formatFileUrl($file)
	{
		$appendix = '';
		if(is_file($this->basePath . '/' . $file)){
			$appendix = '?' . md5(filemtime($this->basePath . '/' . $file));
		}

		return $this->template->baseUrl . '/' . $file . $appendix;
	}

}