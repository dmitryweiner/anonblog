<?php

class m140327_083837_create_db extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_user', array(
            'id' => 'pk',
            'login' => 'varchar(255) NOT NULL',
            'name' => 'varchar(255) NOT NULL',
            'password' => 'varchar(255) NOT NULL',
            'creation_date' => 'timestamp  NOT NULL DEFAULT NOW()',
        ));
        $this->createTable('tbl_post', array(
            'id' => 'pk',
            'title' => 'varchar(255) NOT NULL',
            'message' => 'text NOT NULL',
            'user_id' => 'integer NOT NULL',
            'creation_date' => 'timestamp  NOT NULL DEFAULT NOW()',
        ));
        $this->createTable('tbl_like', array(
            'id' => 'pk',
            'post_id' => 'integer NOT NULL',
            'reaction' => 'integer NOT NULL',
            'user_id' => 'integer NOT NULL',
            'creation_date' => 'timestamp  NOT NULL DEFAULT NOW()',
        ));
        $this->createTable('tbl_comment', array(
            'id' => 'pk',
            'post_id' => 'integer NOT NULL',
            'user_id' => 'integer NOT NULL',
            'previous_comment_id' => 'integer DEFAULT NULL',
            'message' => 'text NOT NULL',
            'creation_date' => 'timestamp  NOT NULL DEFAULT NOW()',
        ));
        $this->addForeignKey('fk_post_user', 'tbl_post', 'user_id', 'tbl_user', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk_like_post', 'tbl_like', 'post_id', 'tbl_post', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk_like_user', 'tbl_like', 'user_id', 'tbl_user', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk_comment_post', 'tbl_comment', 'post_id', 'tbl_post', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk_comment_user', 'tbl_comment', 'user_id', 'tbl_user', 'id','CASCADE','CASCADE');
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