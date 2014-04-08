<?php

class m140402_104030_create_admin_login extends CDbMigration
{
	public function up()
	{
        $this->insert('tbl_user', array(
            "login"    => "admin",
            "name"     => "admin",
            "password" => CPasswordHelper::hashPassword("admin"),
        ));
    }


	public function down()
	{
        $this->delete(
            'tbl_user',"id = '1'"
        );
	}
}