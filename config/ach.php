<?php

return [

    'docker_path' => env('ACH_DOCKER_PATH', 'docker'),
    'docker_compose_path' => env('ACH_DOCKER_COMPOSE_PATH', 'docker-compose'),
    'composer_path' => env('ACH_COMPOSER_PATH', 'composer'),
    'namespace' => env('ACH_NAMESPACE','ach'),
    'php_container' => env('ACH_PHP_CONTAINER','workspace'),
    'ide_helper_models_options' => env('ACH_IDE_HELPER_MODELS_OPTIONS','-n'),

];