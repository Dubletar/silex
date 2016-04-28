Caxy Silex Skeleton
===================

Welcome to Caxy's Silex Skeleton - a fully-functional Silex application that
you can use as the skeleton for your new applications. We use this as a
platform for learning and experimentation.

This document contains information on how to start using the Silex Skeleton.

Creating a Silex Application
----------------------------

Silex uses [Composer][] to ease the creation of a new project:

```bash
composer create-project caxy/silex-skeleton path/to/install
```

Composer will create a new Silex project under the path/to/install directory.

If your application will serve static assets using the PHP built-in web server
during development, you should add these lines to the top of `web/index_dev.php`:

```php
if (php_sapi_name() === 'cli-server' && is_file(__DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']))) {
    return false;
}
```

Browsing the Demo Application
-----------------------------

Congratulations! You're now ready to use Silex.

To see a real-live Silex page in action, start the PHP built-in web server with
command:

```bash
cd path/to/install
COMPOSER_PROCESS_TIMEOUT=86400 composer run
```

Then, browse to <http://localhost:8888/>.

Running tests
-------------

```bash
cd path/to/install
composer test
```

Getting started with Silex
--------------------------

This distribution is meant to be the starting point for your Silex applications.

A great way to start learning Silex is via the [Documentation][], which will
take you through all the features of Silex.

What's inside?
--------------

The Silex Skeleton is configured with the following service providers:

* [ServiceControllerServiceProvider][] - As your Silex application grows, you
  may wish to begin organizing your controllers in a more formal fashion.
  Silex can use controller classes out of the box, but with a bit of work,
  your controllers can be created as services, giving you the full power of
  dependency injection and lazy loading.
* [HttpFragmentServiceProvider][] - Provides fragment rendering in templates.
* [AssetServiceProvider][] - Provides versioned URLs of front end assets.
* [TwigServiceProvider][] - Provides integration with the Twig template engine.

In development mode, these service providers support profiling and debugging:

* [WebProfilerServiceProvider][] - Enable the Symfony web debug toolbar and
  the Symfony profiler in your Silex application when developing.
* [MonologServiceProvider][] - Enable logging in the development environment.
* [VarDumperServiceProvider][] - Integrates Twig and the VarDumper component.

Read the [Providers][] documentation for more details about Silex Service
Providers.

Enjoy!

[Composer]: http://getcomposer.org/
[Documentation]: https://silex.readthedocs.org/en/latest/index.html
[ServiceControllerServiceProvider]: https://silex.readthedocs.org/en/latest/providers/service_controller.html
[HttpFragmentServiceProvider]: http://silex.readthedocs.org/en/stable/providers/http_fragment.html
[AssetServiceProvider]: https://silex.readthedocs.org/en/latest/providers/asset.html
[TwigServiceProvider]: https://silex.readthedocs.org/en/latest/providers/twig.html
[WebProfilerServiceProvider]: http://github.com/silexphp/Silex-WebProfiler
[MonologServiceProvider]: https://silex.readthedocs.org/en/latest/providers/monolog.html
[VarDumperServiceProvider]: https://silex.readthedocs.org/en/latest/providers/var-dumper.html
[Providers]: https://silex.readthedocs.org/en/latest/providers.html
