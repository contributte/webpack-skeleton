# Webpack skeleton

A Nette application skeleton with Webpack 5, Tailwind CSS, and Vue support.

![Contributte Webpack skeleton](https://heatbadger.now.sh/github/readme/contributte/webpack-skeleton/)

<p align="center">
  <a href="https://github.com/contributte/webpack-skeleton/actions"><img src="https://badgen.net/github/checks/contributte/webpack-skeleton/master" alt="Build status"></a>
  <a href="https://codecov.io/gh/contributte/webpack-skeleton"><img src="https://badgen.net/codecov/c/github/contributte/webpack-skeleton" alt="Code coverage"></a>
  <a href="https://packagist.org/packages/contributte/webpack-skeleton"><img src="https://badgen.net/packagist/dm/contributte/webpack-skeleton" alt="Packagist downloads"></a>
  <a href="https://packagist.org/packages/contributte/webpack-skeleton"><img src="https://badgen.net/packagist/v/contributte/webpack-skeleton" alt="Packagist version"></a>
</p>
<p align="center">
  <a href="https://packagist.org/packages/contributte/webpack-skeleton"><img src="https://badgen.net/packagist/php/contributte/webpack-skeleton" alt="PHP version"></a>
  <a href="https://github.com/contributte/webpack-skeleton"><img src="https://badgen.net/github/license/contributte/webpack-skeleton" alt="License"></a>
  <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan" alt="Gitter support"></a>
  <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow" alt="Forum support"></a>
  <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854" alt="Sponsor Contributte"></a>
</p>

<p align="center">
  Website <a href="https://contributte.org">contributte.org</a> | Contact <a href="https://f3l1x.io">f3l1x.io</a> | Twitter <a href="https://twitter.com/contributte">@contributte</a>
</p>

<p align="center">
  <a href="https://examples.contributte.org/webpack-skeleton/"><img src="https://api.microlink.io?url=https%3A%2F%2Fexamples.contributte.org%2Fwebpack-skeleton%2F&amp;overlay.browser=light&amp;screenshot=true&amp;meta=false&amp;embed=screenshot.url" alt="Webpack skeleton demo"></a>
</p>

## Installation

Requirements:

- [PHP](https://www.php.net/downloads.php) 8.4 or newer
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) with [npm](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [GNU Make](https://www.gnu.org/software/make/)

1. Create a new project.

```bash
composer create-project -s dev contributte/webpack-skeleton acme
```

The `-s dev` option is required because the skeleton is distributed from its development branch.

2. Enter the project directory.

```bash
cd acme
```

3. Create the local configuration.

```bash
make init
```

This copies `config/local.neon.example` to the ignored `config/local.neon` file.

4. Prepare writable directories.

```bash
make setup
```

Composer installs PHP dependencies as part of `create-project`.

5. Install frontend dependencies from `package-lock.json`.

```bash
npm ci
```

At present, a clean `npm ci` reports that `package.json` and `package-lock.json` are out of sync around the `awesome-typescript-loader` TypeScript peer dependency. The lockfile must be reconciled in the project before the frontend development commands below can be used from a clean checkout; do not substitute an untracked dependency tree for a reproducible install.

## Usage

### Dev server

For hot module replacement, start the PHP application and Webpack development server in separate terminals:

```bash
make dev
```

```bash
npm run dev
```

Open [http://localhost:8080](http://localhost:8080). This Webpack development-server URL is the interactive development entry point; verify the home page, its AJAX snippet reloads, the example form, and the admin-page link.

The Webpack development server proxies requests to the PHP server at `localhost:8000` by default.

The home page confirms a successful setup with AJAX snippet reloads, an example form, and a link to the admin page.

Override the Webpack server and proxy addresses independently:

- `WEBPACK_DEV_SERVER_HOST` defaults to `localhost`.
- `WEBPACK_DEV_SERVER_PORT` defaults to `8080`.
- `WEBPACK_DEV_SERVER_PROXY_HOST` defaults to `localhost`.
- `WEBPACK_DEV_SERVER_PROXY_PORT` defaults to `8000`.

### Watcher

To serve the PHP application directly and rebuild assets on changes, run these commands in separate terminals:

```bash
make dev
```

```bash
npm run watch
```

Open [http://localhost:8000](http://localhost:8000). This is the passive-watch alternative without the Webpack development-server proxy or hot module replacement.

The PHP development server uses `www/` as its document root. Use `npm run start` or `make build` for a one-time development build. Use `npm run build` for a production build.

Webpack writes frontend bundles to `www/dist/`. The configured entry points are `assets/front.js` and `assets/admin.js`.

Production builds hash CSS filenames, but the checked-in Latte layouts reference the stable `front.bundle.css` and `admin.bundle.css` names. Resolve that integration (for example with a manifest) before treating `npm run build` output as deployable. JavaScript filenames remain stable in the current configuration.

## Configuration

Shared application configuration is in `config/config.neon`. Keep local parameters and service overrides in the ignored `config/local.neon` file created by `make init`.

## Makefile

The [Makefile](Makefile) provides these targets:

| Target | Description |
|---|---|
| `make init` | Copies `config/local.neon.example` to `config/local.neon`. |
| `make project` | Runs `make install` and `make setup`; useful after checkout, but redundant immediately after `composer create-project`. |
| `make install` | Installs PHP dependencies with `composer install`. |
| `make setup` | Creates writable `var/tmp` and `var/log` directories. |
| `make clean` | Removes generated files from `var/tmp` and `var/log`, preserving `.gitignore`. |
| `make dev` | Starts the PHP development server on `0.0.0.0:8000` with Nette debug mode enabled. |
| `make build` | Runs the one-time development asset build through `npm run start`; it is not the production build. |
| `make webpack` | Starts the Webpack development server through `npm run dev`. |
| `make qa` | Runs `make cs` and `make phpstan`. |
| `make cs` | Checks `app/` and `tests/` with CodeSniffer. |
| `make csf` | Fixes supported coding-style issues in `app/` and `tests/`. |
| `make phpstan` | Runs PHPStan with `phpstan.neon` and a 512 MB memory limit. |
| `make tests` | Runs the Nette Tester suite in `tests/`. |
| `make coverage` | Runs the test suite and writes coverage to `coverage.xml`. |
| `make deploy` | Cleans runtime files, prepares the project, builds assets, and cleans runtime files again. |

## Testing

```bash
make qa
make tests
```

`make qa` runs coding-standard and PHPStan checks. `make tests` runs Nette Tester tests from `tests/`.

## Screenshots

### Webpack

![Webpack compilation](.docs/webpack.png)

### PHP server

![PHP development server](.docs/phpserver.png)

### Application

![Webpack skeleton application](.docs/web.png)

## Development

This skeleton is maintained by [Contributte](https://contributte.org). Report issues and submit changes through the [GitHub repository](https://github.com/contributte/webpack-skeleton).

See [Contributte development guidelines](https://contributte.org/contributing.html) before contributing.
