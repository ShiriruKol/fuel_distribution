<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonUsersData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import users data from jsonPlaceHolder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'users');

        $data = json_decode($response->getBody()->getContents());

        foreach ($data as $item)
        {
            DB::table('users')->insert([
                'name' => $item->name,
                'email' => $item->email,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role_id' => Role::get()->random()->id,
            ]);
        }
    }
}
