<?php

class m140327_083837_create_db extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_post', array(
            'id' => 'pk',
            'title' => 'string(255) NOT NULL',
            'post_body' => 'text NOT NULL',
            'creation_date' => 'datetime NOT NULL',
        ));
        $this->createTable('tbl_like', array(
            'id' => 'pk',
            'post_id' => 'integer NOT NULL',
            'reaction' => 'integer NOT NULL',
            'creation_date' => 'datetime NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_post');
        $this->dropTable('tbl_like');

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}