<?php
class m0002_add_status_column_to_users{
    public function up(){
        $db = \App\core\Application::$app->database;
        $sql = "ALTER TABLE users ADD COLUMN status int DEFAULT 0";
        $db->pdo->exec($sql);
    }

    public function down(){
        $db = \App\core\Application::$app->database;
        $sql = "ALTER TABLE users DROP COLUMN status";
        $db->pdo->exec($sql);
    }
}