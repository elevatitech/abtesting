# ABTesting Application

## Installation

- Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.

Install dependencies using Composer, run

```bash
composer install
```

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Mirgrations
```bash
bin/cake migrations migrate
```

## Create User
```bash
bin/cake migrations seed --seed UsersSeed
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server
```

Then visit `http://localhost:8765` to see the welcome page.

App Login:
- User: salil@elevatitech.com
- password: salil123