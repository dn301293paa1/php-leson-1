<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class homeWork extends Command
{

    protected $signature = 'app:work {name?}';

    protected $description = 'homework';

    public function handle()
    {
        $name = $this->argument("name");
        $age = $this->ask("скільки тобі років?");


        if ($age < 18 && !$this->confirm('Are you sure you want to continue?')) {
            return;
        }


        $option = $this->choice('Select an option', ['read', 'write']);

        if ($option === 'read') {
            $file = 'app/Console/file.txt';

            if (file_exists($file)) {
                $content = file_get_contents($file);
                $this->info($content);
            } else {
                $this->error('Файл не існує');
            }
        } else {
            if ($option === 'write') {
                $gender = $this->ask('Please enter your gender');
                $city = $this->ask('Please enter your city');
                $phone = $this->ask('Please enter your phone number');

                $data = [
                    'name' => $name,
                    'age' => $age,
                    'gender' => $gender,
                    'city' => $city,
                    'phone' => $phone,
                ];

                $jsonData = json_encode($data, JSON_PRETTY_PRINT);
                $file = 'app/Console/file.txt';

                if (file_put_contents($file, $jsonData)) {
                    $this->info('Data successfully written to file');
                } else {
                    $this->error('Failed to write data to file');
                }
            }
        }


    }
}
