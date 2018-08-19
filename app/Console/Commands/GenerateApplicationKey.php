<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Encryption\Encrypter;

class GenerateApplicationKey extends Command
{
    /**
     * Console command name.
     */
    protected $signature = 'app:key-generate';

    /**
     * Console command description.
     */
    protected $description = 'Generate application key';

    /**
     * Execute console command.
     */
    public function handle() 
    {
        $applicationKey = $this->generateRandomKey();
        $environmentFilePath = base_path('.env');

        $this->writeKeyInsideEnvironmentFile($environmentFilePath, $applicationKey);
    }

    /**
     * Write key inside application environment file.
     */
    protected function writeKeyInsideEnvironmentFile(string $path, string $key) 
    {
        if (file_exists($path)) 
        {
            file_put_contents($path, preg_replace(
                $this->keyReplacementPattern(),
                'APP_KEY='.$key,
                file_get_contents($path)
            ));
            
            return $this->warn("[Configuration] Application key [$key] was saved into application environment file!");
        } 
        else {
            return $this->error('[Configuration] Environment file does not exists. I cant set application key. Moving on.');
        }
    }

    /**
     * Generate random encryption key from Encrypter class with given cipher.
     */
    protected function generateRandomKey() {
        return 'base64:'.base64_encode(
            Encrypter::generateKey(config('app.cipher'))
        );
    }

    /**
     * Get a regex pattern that will match env APP_KEY with any random key.
     */
    protected function keyReplacementPattern()
    {
        $escaped = preg_quote('='.$this->laravel['config']['app.key'], '/');
        return "/^APP_KEY{$escaped}/m";
    }
}
