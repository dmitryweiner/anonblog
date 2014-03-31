CREATE TABLE "tbl_like" ("id" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL  UNIQUE , "post_id" INTEGER, "reaction" INTEGER, "creation_date" DATETIME);
CREATE TABLE "tbl_post" ("id" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL , "post_body" TEXT, "creation_date" DATETIME, "title" CHAR(256));
