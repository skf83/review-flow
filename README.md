<p>
    <img src="src/build/static/icons/icon_256.png" width="256" alt="Element logo">
</p>

[![Minimum PHP Version][ico-php]][link-php]
[![Vue version][ico-vue]][link-vue]
[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-ci]][link-ci]
[![Software License][ico-license]][link-license]
[![Total Downloads][ico-downloads]][link-downloads]

Element is designed to be very simple and straightforward to use.

:elephant: Requirements
===
Element requires PHP 7.1+.

> **IMPORTANT:** If you want to use YAML files or strings, then you need to require in the [Symfony Yaml component](https://packagist.org/packages/symfony/yaml#v5.4.39) in your `composer.json`.

:zap: Installation
===
The supported way of creating an Element project is via Composer.

```sh
$ composer create-project element/nexus <NAME>
```

Whats the foss all about?
===
Element is designed to be very simple and straightforward to use. It's kind of similar to Laravel, but with a structure and context that suited my needs and
taste in a better way!... While the public views are more or less up to the developer itself, I decided to use the free version of [Soft UI Dashboard from creative tim](https://www.creative-tim.com/product/soft-ui-dashboard) for the backend dashboard, simply because it's really easy to use! It has lots of cool ui elements
and the best part of it?! It's 100% free - Even for commercial apps 😊 So you are good there 👌... Although it comes with an MIT license, so please bear that in mind whenever you make any changes to the code.

**But I highly recommend** any users of Element3 to check out their [Pro version](https://www.creative-tim.com/product/soft-ui-dashboard-pro) 👀📢 It's really cool, and it comes with a lot of extra cool features... Or else feel free to switch to your own template if you like. (I left the theme as a .zip folder under 'src/assets/themes')

:speech_balloon: Usage
===
Open up the terminal and type the command below, to see a list of all the commands Element cli has to offer...
``` bash
$ php element
```

For example, this command will launch the app on the built-in webserver
``` bash
$ php element app:serve
```
But please try it out for yourself! :rocket: It has loads of cool features :sunglasses:

Testing
===
``` bash
$ phpunit
```


:link: Contributing
===
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


:cop: Security
===
If you discover any security related issues, please email [stefan@korfitz.com](mailto:stefan@korfitz.com?subject=[SECURITY]%20Config%20Security%20Issue) directly, instead of using the issue tracker.

:heavy_check_mark: Source
===
Element was inspired and put together from these courses over at [codecourse.com](http://codecourse.com)
1.  [Build a shopping cart (episode 2)](https://codecourse.com/watch/build-a-shopping-cart?part=168-setting-up) 
2.  [Configuration with Slim 3](https://codecourse.com/courses/configuration-with-slim-3)
3.  [Custom 404 views with Slim 3](https://codecourse.com/courses/slim-3-custom-404-views)
4.  [JWT Authentication from Scratch](https://codecourse.com/watch/jwt-authentication-from-scratch)
5.  [Eloquent translations with Slim 3](https://codecourse.com/watch/eloquent-translations-with-slim-3)
6.  [Slim 3 Pagination](https://codecourse.com/watch/slim-3-pagination)
7.  [Mailable Classes in Slim 3](https://codecourse.com/courses/mailable-classes-in-slim-3)
8.  [Get friendly with Webpack](https://codecourse.com/courses/get-friendly-with-webpack)
9.  [Building a Vue project with Webpack](https://codecourse.com/courses/building-a-vue-project-with-webpack)
10. [Learn Vuex](https://codecourse.com/courses/learn-vuex)
11. [The Symfony Console Component](https://codecourse.com/watch/symfony-console-component)
12. [Build a command-line uptime monitor](https://codecourse.com/courses/build-a-command-line-uptime-monitor)
13. [Database migrations with Slim](https://codecourse.com/watch/database-migrations-with-slim)
14. [Build an image upload microservice](https://codecourse.com/watch/build-an-image-upload-microservice)
15. [Unit testing with PHPUnit](https://codecourse.com/watch/unit-testing-with-php-unit)


:mega: Credits
===
- [Stefan Korfitz](https://www.korfitz.com)
- [Alex Garret](https://github.com/alexgarrett) :point_left: He's the real wizard :rocket:


:copyright: License
===
The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.

[ico-php]: https://img.shields.io/badge/php-7.4-8892BF.svg?style=for-the-badge&logo=php
[ico-vue]: https://img.shields.io/badge/vue.js-3-4FC08D.svg?style=for-the-badge&logo=vuedotjs
[ico-version]: https://img.shields.io/packagist/v/element/nexus.svg?style=for-the-badge&logo=packagist
[ico-ci]: https://img.shields.io/gitlab/pipeline/skf83/app/develop?style=for-the-badge&logo=webpack
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=for-the-badge
[ico-downloads]: https://img.shields.io/packagist/dt/element/app.svg?style=for-the-badge

[link-php]: https://php.net/
[link-vue]: https://vuejs.org/
[link-packagist]: https://packagist.org/packages/element/nexus
[link-ci]: https://gitlab.com/skf83/app/commits/develop
[link-license]: https://opensource.org/licenses/MIT
[link-downloads]: https://packagist.org/packages/element/nexus
