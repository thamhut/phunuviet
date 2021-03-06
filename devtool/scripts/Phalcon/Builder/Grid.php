<?php

/*
  +------------------------------------------------------------------------+
  | Phalcon Developer Tools                                                |
  +------------------------------------------------------------------------+
  | Copyright (c) 2011-2014 Phalcon Team (http://www.phalconphp.com)       |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file docs/LICENSE.txt.                        |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Andres Gutierrez <andres@phalconphp.com>                      |
  |          Eduar Carvajal <eduar@phalconphp.com>                         |
  +------------------------------------------------------------------------+
*/

namespace Phalcon\Builder;

use Phalcon\Db\Column;
use Phalcon\Builder\Component;
use Phalcon\Builder\BuilderException;
use Phalcon\Script\Color;
use Phalcon\Text as Utils;
use Phalcon\Text;

/**
 * ModelBuilderComponent
 *
 * Builder to generate models
 *
 * @category    Phalcon
 * @package    Builder
 * @subpackage  Model
 * @copyright   Copyright (c) 2011-2014 Phalcon Team (team@phalconphp.com)
 * @license    New BSD License
 */
class Grid extends Component
{
    /**
     * Mapa de datos escalares a objetos
     *
     * @var array
     */
    private $_typeMap = array(//'Date' => 'Date',
        //'Decimal' => 'Decimal'
    );

    public function __construct($options)
    {
        if (!isset($options['name'])) {
            throw new BuilderException("Please, specify the model name");
        }
        if (!isset($options['force'])) {
            $options['force'] = false;
        }
        if (!isset($options['className'])) {
            $options['className'] = Utils::camelize($options['name']);
        }
        if (!isset($options['fileName'])) {
            $options['fileName'] = $options['name'];
        }
        $this->_options = $options;
    }

    /**
     * Returns the associated PHP type
     *
     * @param  string $type
     * @return string
     */
    public function getPHPType($type)
    {
        switch ($type) {
            case Column::TYPE_INTEGER:
                return 'integer';
                break;
            case Column::TYPE_DECIMAL:
            case Column::TYPE_FLOAT:
                return 'double';
                break;
            case Column::TYPE_DATE:
            case Column::TYPE_VARCHAR:
            case Column::TYPE_DATETIME:
            case Column::TYPE_CHAR:
            case Column::TYPE_TEXT:
                return 'string';
                break;
            default:
                return 'string';
                break;
        }
    }

    public function build()
    {       
    	
        $templateInit = "
    public function init() {
		\$model = new %s();
		\$this->setSource(\$model->search());
		\$this->setColumns(\$this->getColumns());
	}
";
        
        $templateGetColumns = "
    public function getColumns() {
		return array(%s
		);
	}
";

        $templateCode = "<?php
        		
%s%s%sclass %sGrid extends Grid {
%s
}
";
        if (!$this->_options['name']) {
            throw new BuilderException("You must specify the table name");
        }

        $path = '';
        if (isset($this->_options['directory'])) {
            if ($this->_options['directory']) {
                $path = $this->_options['directory'] . '/';
            }
        } else {
            $path = '.';
        }
        $config = $this->_getConfig($path);
        
        if (!isset($this->_options['modelsDir'][$this->_options['module']])) {
            if (!isset($config->application->gridsDir[$this->_options['module']])) {
                throw new BuilderException(
                    "Builder doesn't knows where is the models directory"
                );
            }
            $gridsDir = $config->application->gridsDir[$this->_options['module']];
            
        } else {
            $gridsDir = $this->_options['modelsDir'];
        }            
        
        $gridsDir = rtrim(rtrim($gridsDir, '/'), '\\') . DIRECTORY_SEPARATOR;             
        
        if ($this->isAbsolutePath($gridsDir) == false) {
            $gridPath = $path . DIRECTORY_SEPARATOR . $gridsDir;
        } else {
            $gridPath = $gridsDir;
        }                           

        $methodRawCode = array();
        $className = $this->_options['className'];
        $gridPath .= $className . 'Grid.php';

        if (file_exists($gridPath)) {
            if (!$this->_options['force']) {
                throw new BuilderException(
                    "The model file '" . $className .
                    ".php' already exists in models dir"
                );
            }
        }

        if (!isset($config->database)) {
            throw new BuilderException(
                "Database configuration cannot be loaded from your config file"
            );
        }

        if (!isset($config->database->adapter)) {
            throw new BuilderException(
                "Adapter was not found in the config. " .
                "Please specify a config variable [database][adapter]"
            );
        }

        if (isset($this->_options['namespace'])) {
            $namespace = 'namespace ' . $this->_options['namespace'] . ';'
                . PHP_EOL . PHP_EOL;
        } else {
            $namespace = '';
        }

        $adapter = $config->database->adapter;
        $this->isSupportedAdapter($adapter);

        if (isset($config->database->adapter)) {
            $adapter = $config->database->adapter;
        } else {
            $adapter = 'Mysql';
        }

        if (is_object($config->database)) {
            $configArray = $config->database->toArray();
        } else {
            $configArray = $config->database;
        }

        // An array for use statements
        $uses = array();
		$uses[] = 'use OE\Widget\Grid;';
		$uses[] = 'use '. $this->_options['modelsNamespace'].'\\'. $this->_options['className'].';';
		$uses[] = 'use App\Grids\Elements\ActionLink;';
		$uses[] = 'use OE\Widget\Grid\Filter\DateRange;';
        
        $adapterName = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;
        unset($configArray['adapter']);
        $db = new $adapterName($configArray);

        $initialize = array();
        if (isset($this->_options['schema'])) {
        	if ($this->_options['schema'] != $config->database->dbname) {
        		$initialize[] = sprintf(
        				$templateThis, 'setSchema', '"' . $this->_options['schema'] . '"'
        		);
        	}
        	$schema = $this->_options['schema'];
        } elseif ($adapter == 'Postgresql') {
        	$schema = 'public';
        	$initialize[] = sprintf(
        			$templateThis, 'setSchema', '"' . $this->_options['schema'] . '"'
        	);
        } else {
        	$schema = $config->database->dbname;
        }

        $table = $this->_options['name'];
        if ($db->tableExists($table, $schema)) {
            $fields = $db->describeColumns($table, $schema);
        } else {
            throw new BuilderException('Table "' . $table . '" does not exists');
        }

        /**
         * Check if there has been an extender class
         */
        $extends = 'App\\Models\\'. $this->_options['className'];
        if (isset($this->_options['extends'])) {
            if (!empty($this->_options['extends'])) {
                $extends = $this->_options['extends'];
            }
        }

        /**
         * Check if there have been any excluded fields
         */
        $attributes = array();
        $setters = array();
        $getters = array();
        $license = '';

        $content = join('', $attributes);
        $content = '';
        
        $columnSearch = array();
        foreach ($fields as $field) {
        	$name = $field->getName();
        	
        	if(in_array($name, array('created_at', 'password'))) {
        		continue;
        	}
        	
       		$classModel = null;
       		$filter = null;
       		
        	if( in_array($name, array('register_at', 'updated_at'))) {
        		$column = "
	        	array(
					'name' => '%s',	
					'header' => \$this->_('%s'),
					'value' => '%s%s',
					'operator' => 'like',
	       			'filter' => new DateRange(array('format' => 'yy-mm-dd'))%s,
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),";
        		
        	} elseif($name == 'status') {
        		$column = "
	        	array(
					'name' => '%s',	
					'header' => \$this->_('%s'),
					'value' => function(\$data) {
        				return %s::getStatusLabel(\$data->%s);
        			},
        			'filter' => %s::listStatus(),	
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				),";
        		$classModel = $this->_options['className'];
        		$filter = $this->_options['className'];
        		
        	} else {
        		$column = "
	        	array(
					'name' => '%s',	
					'header' => \$this->_('%s'),
					'value' => '%s%s',
					'operator' => 'like',
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center')%s, 		
				),";
        	}
        	$columnSearch[] = sprintf($column, $name, $name, $classModel, $name, $filter);
       	}
       	
       	$columnAction = "
	       		array(
					'name' => '',
					'header' => \$this->_('Action'),
					'sort' => false,
					'filter' => false,
       				'export' => false,	
					'value' => function(\$data) {
						\$actionLinks = new ActionLink(\$data, array('baseUri' => '/backend/%s'));
						return \$actionLinks->getLinks();
					},					
					'htmlOptions' => array('class' => 'text-center'), 		
					'headerHtmlOptions' => array('class' => 'text-center'), 		
				)";
       	
       	$columnSearch[] = sprintf($columnAction, str_replace('_', '-', lcfirst(Text::uncamelize($this->_options['className']))));
                
        $columnSearch = implode('', $columnSearch);
        
        $content .= sprintf($templateInit, $this->_options['className']);
        $content .= sprintf($templateGetColumns, $columnSearch);

        $str_use = '';
        if (!empty($uses)) {
            $str_use = implode(PHP_EOL, $uses) . PHP_EOL . PHP_EOL;
        }

        $code = sprintf(
            $templateCode,
            $license,
            $namespace,
            $str_use,
            $className,
            $content
        );

        if (!@file_put_contents($gridPath, $code)) {
                throw new BuilderException("Unable to write to '$gridPath'");
        }

        if ($this->isConsole()) {
            $this->_notifySuccess('Grid "' . $this->_options['name'] .'" was successfully created.');
        }
    }
}