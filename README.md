# MINIVEL

PHP MVC Framework

## # Installation Via Composer
If your computer already has PHP and Composer installed, you may create a new Minivel project by using Composer directly. After the application has been created, you may start local development server using PHP
Built-in web server.
    
    composer create-project rashedraju/minivel my-app
    cd my-app
    php -S localhost:8080 -t public

## # Environment Configuration
The root directory of your application will contain a <span style="color:#EA1834">.env.example</span> file that defines many common environment variables. Create a <span style="color:#EA1834">.env</span> file to your application root directory and add your database connection information as well as various other core configuration. 

## # Migrations
Migrations are like version control for your database, allowing your team to define and share the application's database schema definition. To run the migrations:
    
    php migration.php

#### Generating migration
You can write your own database schema inside the migrations directory and run migration to apply them.

#### Migration structure
To create database schema migration create a new php file inside migrations directory.

File name should follow this naming convention: <span style="color:#fdcb6e">[mYourMigrationNumber_your_migration_name.php]</span>

A migration class contains two methods: <span style="color:#EA1834"> up </span> and <span style="color:#EA1834">down</span>. The <span style="color:#EA1834">up</span> method is used to add new tables, columns, or indexes to your database, while the <span style="color:#EA1834">down</span> method should reverse the operations performed by the up method.
    
    <?php

    class m0001_initial{

        public function up(){
            //
        }

        public function down(){
            //
        }
    }    

