<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;

class CreateTestStaff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-staff';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

            User::create([
                "name" => 'Test Staff',
                "email" => 'teststaff@mail.com',
                "password" => 'password',
                "is_staff" => true
            ]);
            $this->info("Test Staff Account created successfully\nname: Test Staff\nemail: teststaff@mail.com\npassword: password");
        } catch (Exception $exception) {
            if ($exception->getCode() == 23000) {
                $this->error("Error!!! Test Staff already exists");
            }
        }

    }
}
