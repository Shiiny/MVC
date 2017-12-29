<?php 

namespace blog_mvc\model;

class Manager {

	const DB_NAME = 'test';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_HOST = 'localhost';

	private static $database;

	protected static function getDb() {
		if(is_null(self::$database)) {
			self::$database = new \PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8', self::DB_USER, self::DB_PASS);

		}
        return self::$database;
	}


}
