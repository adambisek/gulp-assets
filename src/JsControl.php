<?php

namespace GulpAssets;

/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 */
class JsControl extends BaseControl
{

	public function render()
	{
		foreach ($this->files as $file) {
			echo '<script type="text/javascript" src="' . $this->formatFileUrl($file) . '"></script>';
		}
	}

}