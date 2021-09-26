<?php

use Minivel\Application;

class m0001_initial
{
    public function up(){
        $db = Application::$app->database;
        $sql = "CREATE TABLE IF NOT EXISTS users(
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL ,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )";

        $db->pdo->exec($sql);
    }

    public function down(){
        $db = Application::$app->database;
        $db->pdo->exec("DROP TABLE users");
    }
}
