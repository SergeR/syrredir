<?php

return array(
    'name' => 'Redirect rules',
    'description' => 'User-defined redirect rules',
    'vendor'=>670917,
    'version'=>'1.0.0',
    'img'=>'img/redirect.png',
    'shop_settings' => TRUE,
    'icons'=>array(
        16 => 'img/redirect.png',
    ),
    'handlers' => array(
        'frontend_error' => 'frontendError',
    ),
    'locale' => array('en_US', 'ru_RU')
);
