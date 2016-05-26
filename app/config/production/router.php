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
        array(
            'name' => 'category',
            'pattern' => '/category/{slug:[A-Za-z0-9\-]+}',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'index'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'product-clone',
            'pattern' => '/product-clone/{slug:[A-Za-z0-9\-]+}',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'detail',
                'action' => 'index'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'product-user',
            'pattern' => '/product-user/{slug:[A-Za-z0-9\-]+}',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'detail',
                'action' => 'user'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'shop',
            'pattern' => '/shop/{slug:[A-Za-z0-9\-]+}/{slug1:[A-Za-z0-9\-]+}',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'shop'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'shop',
            'pattern' => '/shop/{slug:[A-Za-z0-9\-]+}',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'shop'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'shop',
            'pattern' => '/shop/{slug:[A-Za-z0-9\-]+}/',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'shop'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'product',
            'pattern' => '/product/{slug:[A-Za-z0-9\-]+}',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'product'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'product',
            'pattern' => '/product/',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'product'
            ),
            'httpMethods' => null
        ),
        array(
            'name' => 'product',
            'pattern' => '/product',
            'paths' => array(
                'module' => 'fontend',
                'controller' => 'category',
                'action' => 'product'
            ),
            'httpMethods' => null
        ),
    )


);