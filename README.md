![](https://heatbadger.now.sh/github/readme/contributte/webpack-skeleton/)

<p align=center>
  <a href="https://github.com/contributte/webpack-skeleton/actions"><img src="https://badgen.net/github/checks/contributte/webpack-skeleton/master"></a>
  <a href="https://coveralls.io/r/contributte/webpack-skeleton"><img src="https://badgen.net/coveralls/c/github/contributte/webpack-skeleton"></a>
  <a href="https://packagist.org/packages/contributte/webpack-skeleton"><img src="https://badgen.net/packagist/dm/contributte/webpack-skeleton"></a>
  <a href="https://packagist.org/packages/contributte/webpack-skeleton"><img src="https://badgen.net/packagist/v/contributte/webpack-skeleton"></a>
</p>
<p align=center>
  <a href="https://packagist.org/packages/contributte/webpack-skeleton"><img src="https://badgen.net/packagist/php/contributte/webpack-skeleton"></a>
  <a href="https://github.com/contributte/webpack-skeleton"><img src="https://badgen.net/github/license/contributte/webpack-skeleton"></a>
  <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
  <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
  <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

<p align=center>
	<img src="https://api.microlink.io?url=https%3A%2F%2Fexamples.contributte.org%2Fwebpack-skeleton%2F&overlay.browser=light&screenshot=true&meta=false&embed=screenshot.url">
</p>

-----

## Goal

Main goal is to provide webpack starter-kit project for Nette developers.

## Demo

https://examples.contributte.org/webpack-skeleton/

## Installation

You will need `PHP 7.4+` and [Composer](https://getcomposer.org/).

Create project using composer.

```bash
composer create-project -s dev contributte/webpack-skeleton acme
```

Install Composer dependencies: `composer install`

Install NPM dependencies: `npm install`

Now you have application installed. It's time to run it.

## Startup

**Backend**

The easiest way is to use php built-in web server.

```bash
php -S 0.0.0.0:8000 -t www
```

Then visit [http://localhost:8000](http://localhost:8000) in your browser.

**Frontend**

If you want compile assets, call `npm run start`.

If you need watcher, call `npm run watch`, it will watch your codebase and rebuild assets.

If you want build for production, call `npm run build`.

If you want start webpack development server with HRM, call `npm run dev`, open [http://localhost:8080](http://localhost:8080) in your browser.

## Features

- :+1: Nette 3.0
- :+1: Webpack configuration
    - :tada: extracting JS to single bundle
    - :tada: extracting CSS to single file
    - :tada: more bundles (front/admin/vendor)
- :+1: Snippets
    - :tada: few snippets
- :+1: Nette Form
    - :tada: AJAX submitting
    - :tada: form builder
        - empty value on control (`@` in email)
        - validation rules (filled + email)
        - simple filter (transform email to lowercase)
        - onValidate / onSubmit / onSuccess
    - :tada: manual rendering
        - success snippet / error snippet
        - required class on form-group
        - description on control

## Screenshots

<p align=center>
	<img src="https://raw.githubusercontent.com/contributte/webpack-skeleton/master/.docs/webpack.png">
</p>

<p align=center>
	<img src="https://raw.githubusercontent.com/contributte/webpack-skeleton/master/.docs/phpserver.png">
</p>

<p align=center>
	<img src="https://raw.githubusercontent.com/contributte/webpack-skeleton/master/.docs/web.png">
</p>
