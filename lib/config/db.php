<?php
return array(
    'shop_syrredir' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'old_route' => array('varchar', 255, 'null' => 0),
        'new_route' => array('varchar', 255, 'null' => 0),
        ':keys' => array(
            'PRIMARY' => 'id',
            'old_route' => array('old_route', 'unique' => 1),
            'new_route' => 'new_route',
        ),
    ),
);