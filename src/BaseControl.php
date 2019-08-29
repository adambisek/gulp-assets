<?php

declare(strict_types=1);

namespace GulpAssets;

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class BaseControl extends \Nette\Application\UI\Control
{

	/** @var string[] */
	protected $files = [];

	/** @var string|null */
	private $basePath;

	/**
	 * @return string[]
	 */
	public function getFiles(): array
	{
		return $this->files;
	}


	/**
	 * @param string[] $files
	 */
	public function setFiles(array $files): void
	{
		$this->files = $files;
	}


	/**
	 * @return string|null
	 */
	public function getBasePath(): ?string
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


	protected function formatFileUrl(string $file): string
	{
		$appendix = '';
		if (is_file($this->basePath . '/' . $file)) {
			$appendix = '?' . md5(filemtime($this->basePath . '/' . $file));
		}

		return $this->template->baseUrl . '/' . $file . $appendix;
	}

}