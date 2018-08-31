<?php

use DI\ContainerBuilder;
use Ironex\ExampleForm;

ini_set("error_reporting", E_ALL);
ini_set("display_errors", "On");

require __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

init();

/**
 * @throws Exception
 */
function init()
{
    $containerBuilder = new ContainerBuilder;
    $containerBuilder->useAutowiring(true);
    $containerBuilder->useAnnotations(true);
    $container = $containerBuilder->build();
    $container->call([ExampleForm::class, "init"]);
}