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
            'label' => 'Website',
            'controller' => '',
            'action'=> '',
            'url'   => '',
            'pull-left'=> 'fa fa-edge',
            'pull-right'=> '',
            'pages' => array(
                array(
                    'label' => 'Manage Website',
                    'module' => 'backend',
                    'controller' => 'website',
                    'action'=> 'index',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                ),
                array(
                    'label' => 'Register Website',
                    'module' => 'backend',
                    'controller' => 'website',
                    'action'=> 'add',
                    'url'   => '',
                    'pull-left'=> 'fa fa-angle-double-right',
                    'pull-right'=> '',
                )
            )
        ),
		array(
			'label' => 'Mapcate',
			'controller' => '',
			'action'=> '',
			'url'   => '',
			'pull-left'=> 'fa fa-edge',
			'pull-right'=> '',
			'pages' => array(
				array(
					'label' => 'Manage link',
					'module' => 'backend',
					'controller' => 'mapcate',
					'action'=> 'index',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				),
				array(
					'label' => 'Add Mapcate',
					'module' => 'backend',
					'controller' => 'mapcate',
					'action'=> 'add',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				)
			)
		),
		array(
			'label' => 'Slider',
			'controller' => '',
			'action'=> '',
			'url'   => '',
			'pull-left'=> 'fa fa-list',
			'pull-right'=> '',
			'pages' => array(
				array(
					'label' => 'Manage Slider',
					'module' => 'backend',
					'controller' => 'slider',
					'action'=> 'index',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				),
				array(
					'label' => 'Add Slider',
					'module' => 'backend',
					'controller' => 'slider',
					'action'=> 'add',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				)
			)
		),
		array(
			'label' => 'Products',
			'controller' => '',
			'action'=> '',
			'url'   => '',
			'pull-left'=> 'fa fa-list',
			'pull-right'=> '',
			'pages' => array(
				array(
					'label' => 'Manage Product',
					'module' => 'backend',
					'controller' => 'product',
					'action'=> 'index',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				),
				array(
					'label' => 'Add Product',
					'module' => 'backend',
					'controller' => 'product',
					'action'=> 'add',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				)
			)
		),
		array(
			'label' => 'Product Clone',
			'controller' => '',
			'action'=> '',
			'url'   => '',
			'pull-left'=> 'fa fa-list',
			'pull-right'=> '',
			'pages' => array(
				array(
					'label' => 'Manage Product',
					'module' => 'backend',
					'controller' => 'productclone',
					'action'=> 'index',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				)
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
			'label' => 'FAQs',
			'controller' => '',
			'action'=> '',
			'url'   => '',
			'pull-left'=> 'fa fa-comments-o',
			'pull-right'=> '',
			'pages' => array(
				array(
					'label' => 'Manage Faq',
					'module' => 'backend',
					'controller' => 'faq',
					'action'=> 'index',
					'url'   => '',
					'pull-left'=> 'fa fa-angle-double-right',
					'pull-right'=> '',
				),
				array(
					'label' => 'Create Faq',
					'module' => 'backend',
					'controller' => 'faq',
					'action'=> 'update',
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