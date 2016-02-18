<?php

return [

    /*
     * Installation hook.
     */
    'install' => function ($app) {

        $util = $app['db']->getUtility();

        if ($util->tableExists('@todo_table') === false) {
            $util->createTable('@todo_table', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('name', 'string', ['length' => 255, 'default' => '']);
                $table->addColumn('do', 'boolean', ['default' => false]);
                $table->setPrimaryKey(['id']);
            });
        }

    },

    /*
     * Enable hook
     */
    'enable' => function ($app) {

    },

    /*
     * Uninstall hook
     */
    'uninstall' => function ($app) {

        // remove the config
        $app['config']->remove('todo_table');

        $util = $app['db']->getUtility();

        if ($util->tableExists('@todo_table')) {
            $util->dropTable('@todo_table');
        }

    },

    /*
     * Runs all updates that are newer than the current version.
     */
    'updates' => [

        '0.0.5' => function ($app) {
			
        },
    ],

];