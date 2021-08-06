<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\UserController;

class StoreUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:store {api} {page?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Storing User information';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $api = $this->argument('api');
        $page = $this->argument('page') ?? 0;

        $controller = app()->make('App\Http\Controllers\UserController');
        
        app()
            ->make('Illuminate\Http\Request')
            ->merge([
                'api' => $api,
                'page' => $page
            ]);
        
        app()->call([$controller, 'store']);
    }
}
