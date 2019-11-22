<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class DbCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL database based on the database config file or the provided name';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schemaName = $this->argument('name') ?: 'tss_log';
        // $username = $this->ask('username');
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        config([
            "database.connections.mysql.database" => null,
            // "database.connections.mysql.username" => $this->ask('database username'),
            // "database.connections.mysql.password" => $this->secret('database password'),
        ]);

        // $config = Config::get('database.connections.mysql');
        // $config['username'] = $this->ask('database username');
        // $config['password'] = $this->secret('database password');

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        DB::statement($query);

        // $config['database'] = $schemaName;
        // Config::set('database.connections.mysql', $config);

        config(["database.connections.mysql.database" => $schemaName]);
    }
}
