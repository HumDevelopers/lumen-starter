<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConfigureApplication extends Command 
{
    /**
     * Console command name.
     * 
     * @param string
     */
    protected $signature = 'app:configure';

    /**
     * Console command description (you can view it inside bash).
     * 
     * @param string
     */
    protected $description = 'Configure your application';

    /**
     * Execute con sole command.
     */
    public function handle() 
    {
        if ($this->confirm('[Configuration] Do you want configure application right now?')) {
            if ($this->confirm('[Configuration] Do you want create environment file and generate application key?')) {
                $this->copyEnvironmentFile();
                $this->generateApplicationKey();
            }

            if ($this->confirm('[Configuration] Do you want to perform migrations?')) {
                $this->migrateDatabase();

                if ($this->confirm('[Configuration] Do you want seed table with example user?')) {
                    $this->seedDatabase();
                }

                if ($this->confirm('[Configuration] Do you want install Passport?')) {
                    $this->installPassport();
                }
            }
        }

        $this->warn("\n[Configuration] Thats it! Application has been configured. You should check README if you need more help. Have fun and build something amazing!");
    }

    /**
     * Copy the example environment file into .env file.
     */
    protected function copyEnvironmentFile() 
    {
        $envFile = base_path('.env');
        $envExampleFile = base_path('.env.example');

        // Check if environment file isn't already in directory.
        if (file_exists($envFile)) {
            return $this->warn("[Configuration] Environment file already exists. You don't need this step. Moving on.");
        }

        // Check if example environment file exists in directory. 
        // We don't want to copy file that does not exists, right? ;-)
        if (!copy($envExampleFile, $envFile)) {
            return $this->info("[Configuration] I didn't find example environment file in this directory. Moving on.");
        }

        $this->warn("[Configuration] Crafted environment file from example.");
    }

    /**
     * Migrate all tables to database.
     */
    protected function migrateDatabase()
    {
        $this->call('migrate');
    }

    /**
     * Seed database.
     */
    protected function seedDatabase()
    {
        $this->call('db:seed');
    }

    /**
     * Generate application key.
     */
    protected function generateApplicationKey() {
        $this->call('app:key-generate');
    }

    /**
     * Install encryption keys and other stuff for Passport.
     */
    protected function installPassport() {
        $this->call('passport:install');
    }
}
