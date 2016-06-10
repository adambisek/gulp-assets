gulp-assets
===========
[![Build Status](https://travis-ci.org/adambisek/gulp-assets.svg?branch=master)](https://travis-ci.org/adambisek/gulp-assets)
[![Latest Stable Version](https://poser.pugx.org/adambisek/gulp-assets/v/stable)](https://packagist.org/packages/adambisek/gulp-assets)
[![License](https://poser.pugx.org/adambisek/gulp-assets/license.png)](https://github.com/adambisek/gulp-assets/blob/master/LICENSE)

Simply link gulp processed assets to page.
Adds file hash into query string to force refresh after gulp process new files.

Installation
------------
Preferred installation is with [Composer](https://doc.nette.org/composer).

<code>
composer require adambisek/gulp-assets
</code>

Usage
------------
config.neon -> simple define output gulp files
```
parameters:
	assetsFactory:
		basePath: '%appDir%/../public'
		front:
			css:
				dist/front/front.bundle.css: all
				dist/front/front-print.bundle.css: all
			js:
				- dist/front/front.bundle.js

services:
	- GulpAssets\ControlFactory(%assetsFactory%)
```

BasePresenter -> create renderable components
```
public function createComponentCss()
{
	return $this->assetsControlFactory->createCssControl('front');
}

public function createComponentJs()
{
	return $this->assetsControlFactory->createJsControl('front');
}
```

Template:
```
<html>
	<head>
		{control js}
		{control css}
	</head>
	<body> ... </body>
</html>
```