<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MigratePasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate plaintext passwords to hashed passwords';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            // Cek apakah password sudah di-hash (bcrypt hash panjangnya 60 karakter)
            if (strlen($user->password) !== 60 || !preg_match('/^\$2y\$/', $user->password)) {
                // Hash password dan update di database
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($user->password)]);

                $this->info("Password for user {$user->id} has been hashed.");
            }
        }

        $this->info('Password migration completed!');
        return 0;
    }
}
