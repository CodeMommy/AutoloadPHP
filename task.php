#!/usr/bin/env php

<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

require_once(__DIR__ . '/vendor/autoload.php');

use CodeMommy\TaskPHP\Task;

/**
 * Task Update Version
 */
Task::add('update-version', 'Update Version', function () {
    $file = __DIR__ . '/composer.json';
    $composer = file_get_contents($file);
    $composer = json_decode($composer, true);
    $version = $composer['version'];
    $version = explode('.', $version);
    $version[2] = intval($version[2]) + 1;
    $version = implode('.', $version);
    $composer['version'] = $version;
    $composer = json_encode($composer, JSON_PRETTY_PRINT);
    $composer = str_replace('\\/', '/', $composer);
    file_put_contents($file, $composer);
    echo(sprintf('Updated version to %s.', $version));
});

/**
 * Task Update
 */
Task::add('update', 'Update Composer', function () {
    system('php -v');
    Task::line();
    system('git pull');
    Task::line();
    system('composer self-update');
    Task::line();
    system('composer update');
});

/**
 * Task Test
 */
Task::add('test', 'Test', function () {
    $test = Task::getParameter(0);
    $phpUnitPath = sprintf('%s/vendor/bin/phpunit', __DIR__);
    $phpUnitPath = str_replace('/', DIRECTORY_SEPARATOR, $phpUnitPath);
    if (empty($test)) {
        system($phpUnitPath);
    } else {
        system(sprintf('cd test && "%s" %sTest --repeat 100', $phpUnitPath, $test));
    }
});

/**
 * Start
 */
Task::config('CodeMommy AutoloadPHP Task', '');
Task::run();