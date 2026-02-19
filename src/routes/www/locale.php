<?php

/**
 * OUTER Group that applies CSRF to routes
 *
 * @var $app
 *
 */
$app->group('', function () use($app) {

    /**
     * adding to view : LOCALIZATION
     */
    $app->get('/translate/{lang}', ['app\controllers\TranslationController', 'switch'])->setName('translate.switch');

});