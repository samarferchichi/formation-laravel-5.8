<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new company';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    //    $company = Company::create([
         //   'name' => 'test name',
       //     'phone' => '123-123-123',
    //    ]);
    $this->info('info string here');
    }
}
