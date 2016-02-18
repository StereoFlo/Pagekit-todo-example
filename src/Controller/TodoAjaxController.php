<?php

namespace Pagekit\todo\Controller;

use Pagekit\Application as App;
use Pagekit\todo\Model\TodoModel;

/**
 * @Access(admin=true)
 */
class TodoAjaxController
{
    public function indexAction() 
	{
		return ['message' => 'Nothing here'];
    }
	
    /**
     * @Request({"data"})
     */
	public function deleteAction ($data)
	{
		$delete = TodoModel::find($data['id']);
		if ($delete) $delete->delete();
		return ['message' => __('Deleted successfully.'), 'data' => $delete];
	}

    /**
     * @Request({"data"})
     */
	public function toggleAction ($data)
	{
		$edit = TodoModel::where(['id = ?'], [$data['id']])->from('@todo_table')->get();
		return ['message' => __('Toggled successfully.'), 'find' => $edit];
	}
	
    /**
     * @Request({"data"}, csrf=true)
     */
    public function saveAction ($data) 
	{
		$result = TodoModel::create();
		$data['do'] = 0;
        $result->save($data);
        return ['message' => __('Saved successfully.')];
    }
	
}
