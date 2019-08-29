<?php

declare(strict_types=1);

namespace GulpAssets;

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class CssControl extends BaseControl
{

	public function render(): void
	{
		foreach ($this->files as $file => $media) {
			echo '<link rel="stylesheet" type="text/css" media="' . $media . '" href="' . $this->formatFileUrl($file) . '">';
		}
	}

}