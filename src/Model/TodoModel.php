<?php

namespace Pagekit\todo\Model;

use Pagekit\Application as App;
use Pagekit\Database\ORM\ModelTrait;

/**
 * @Entity(tableClass="@todo_table")
 */
class TodoModel implements \JsonSerializable {
    use ModelTrait;
    
/* --------------- FIELDS --------------- */    
    /** @Column(type="integer") @id */
    public $id;

    /** @Column(type="string") */
    public $name;

    /** @Column(type="boolean") */
    public $do;
	
	  /**
	   * {@inheritdoc}
	   */
    public function jsonSerialize () 
	{
        return $this->toArray([]);
    }
	
	public function toArray ()
	{
		return App::db()->createQueryBuilder()->from('@todo_table')->get();
	}
}
