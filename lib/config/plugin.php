<?php

return array(
    'name' => 'Custom shop redirects',
    'description' => 'Ручное указание переадресаций',
    'vendor'=>670917,
    'version'=>'1.0.0',
    'img'=>'img/redirect.png',
    'icons'=>array(
        16 => 'img/redirect.png',
    ),
    'handlers' => array(
        'frontend_error' => 'frontendError',
    ),
);
