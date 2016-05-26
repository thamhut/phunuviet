<?php
return array(
    'routers' => array(

        array(
            'name' => 'default',
            'pattern' => '/:module/:controller/:action',
            'paths' => array(
                'module' => 1,
                'controller' => 2,
                'action' => 3
            ),
            'httpMethods' => null
        ),
        
    )


);