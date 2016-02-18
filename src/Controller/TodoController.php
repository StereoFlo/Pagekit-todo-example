<?php

namespace Pagekit\todo\Controller;

use Pagekit\Application as App;
use Pagekit\todo\Model\TodoModel;

/**
 * @Access(admin=true)
 */
class TodoController
{
    public function indexAction() 
	{
		$entries = TodoModel::toArray();
        return [
            '$view' => [
                'title' => __('Home page'),
                'name' => 'todo:views/admin/index.php'
            ],
			'$data' => [
				'entries' => $entries
			]
        ];
    }
}
