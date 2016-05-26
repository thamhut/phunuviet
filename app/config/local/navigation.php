<?php
return array(
    'backend'=> array(
        array(
            'label' => 'Dashboard',
            'module' => 'backend',
            'controller' => 'index',
            'action'=> 'index',
            'url'   => '',
            'pull-left'=> 'fa fa-dashboard',
            'pull-right'=> '',
        ),
        array(
            'label' => 'Films',
            'controller' => '',
            'action'=> '',
            'url'   => '',
            'pull-left'=> 'fa fa-indent',
            'pull-right'=> '',
            'pages' => array(
                array(
                    'label' => 'Manage Films',
                    'module' => 'backend',
                    'controller' => 'film',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
                array(
                    'label' => 'Manage Episode',
                    'module' => 'backend',
                    'controller' => 'episode',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
                array(
                    'label' => 'Films-Categories',
                    'module' => 'backend',
                    'controller' => 'film-category',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
                array(
                    'label' => 'User Report',
                    'module' => 'backend',
                    'controller' => 'report',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
            )
        ),
        array(
            'label' => 'Categories',
            'controller' => '',
            'action'=> '',
            'url'   => '',
            'pull-left'=> 'fa fa-bars',
            'pull-right'=> '',
            'pages' => array(
                array(
                    'label' => 'Manage Categories',
                    'module' => 'backend',
                    'controller' => 'category',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
            )
        ),
        array(
            'label' => 'Users',
            'controller' => '',
            'action'=> '',
            'url'   => '',
            'pull-left'=> 'fa fa-users',
            'pull-right'=> '',
            'pages' => array(
                array(
                    'label' => 'Manage Users',
                    'module' => 'backend',
                    'controller' => 'user',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
            )
        ),
        array(
            'label' => 'Contact',
            'controller' => '',
            'action'=> '',
            'url'   => '',
            'pull-left'=> 'fa fa-comments-o',
            'pull-right'=> '',
            'pages' => array(
                array(
                    'label' => 'Manage Contact',
                    'module' => 'backend',
                    'controller' => 'contact',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
            )
        ),
		array(
			'label' => 'Cms',
			'controller' => '',
			'action'=> '',
			'url'   => '',
		   	'pull-left'=> 'fa fa-building',
		   	'pull-right'=> '',
		   	'pages' => array(
			   	array(
				   	'label' => 'Menu',
				   	'module' => 'backend',
				   	'controller' => 'cms-menu',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				),
			   	array(
				   	'label' => 'Post',
				   	'module' => 'backend',
				   	'controller' => 'cms-post',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				),
			   	array(
				   	'label' => 'Category',
				   	'module' => 'backend',
				   	'controller' => 'cms-category',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				),
			)
		),
		array(
			'label' => 'System',
			'controller' => '',
			'action'=> '',
			'url'   => '',
		   	'pull-left'=> 'fa fa-gears',
		   	'pull-right'=> '',
		   	'pages' => array(
			   	array(
				   	'label' => 'User',
				   	'module' => 'system',
				   	'controller' => 'acl-user',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				),
			   	array(
				   	'label' => 'Roles',
				   	'module' => 'system',
				   	'controller' => 'acl-role',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				),
			   	array(
				   	'label' => 'Resources',
				   	'module' => 'system',
				   	'controller' => 'acl-resource',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				),
			)
		),
		array(
			'label' => 'Configuration',
			'controller' => '',
			'action'=> '',
			'url'   => '',
		   	'pull-left'=> 'fa fa-wrench',
		   	'pull-right'=> '',
		   	'pages' => array(
			   	array(
				   	'label' => 'Site Configs',
				   	'module' => 'backend',
				   	'controller' => 'config',
				    'action'=> 'index',
				    'url'   => '',
				    'pull-left'=> 'fa fa-angle-double-right',
				    'pull-right'=> '',
				)
			)
		),
    		
    ),
);