<?php

namespace Framework;
use Illuminate\Database\Capsule\Manager as Capsule;

class Elequent
{

    public $capsule;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->capsule = new Capsule;

        $this->capsule->addConnection([
            'driver' => 'mysql',
            'host' => $config['host'],
            'database' => $config['dbname'],
            'username' => $config['username'],
            'password' =>  $config['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        // Make this Capsule instance available globally via static methods... (optional)
        $this->capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->capsule->bootEloquent();
    }
}