# Nette Framework + Webpack 4

This is just for education.

There is a simple example of Nette Framework with jQuery 3, bootstrap 4 and [Naja](https://github.com/jiripudil/Naja).
Naja is modern ES6-like library for Nette snippets ajaxification.

These assets are compiled and bundled together with Webpack.

## Development

- `git clone https://github.com/trainit/2018-03-nette-webpack.git`
- `cp app/config/config.local.neon.dist app/config/config.local.neon`
- `composer install`
- `npm install`
- `npm run dev`
- `php -S 0.0.0.0:8000 -t www`

## Deployment

- `npm run build`

## Todo

- separate CSS classes
- more examples (Vue?)

## Result

### Webpack

![Webpack](https://raw.githubusercontent.com/trainit/2018-03-nette-webpack/master/.docs/webpack.png)

### PHP Development Server

![PHP](https://raw.githubusercontent.com/trainit/2018-03-nette-webpack/master/.docs/phpserver.png)

### Browser

![Web](https://raw.githubusercontent.com/trainit/2018-03-nette-webpack/master/.docs/web.png)
