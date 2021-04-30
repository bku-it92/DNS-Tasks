<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'access admin']);
        $role = Role::create(['name' => 'Admin']);
        $permission->assignRole($role);
        $user = User::create([
            'name' => 'IT92-NiStrohm',
            'email' => 'IT92-NiStrohm@student.bkukr.de',
            'password' => Hash::make('1234Pass'),
        ]);
        $user->assignRole($role);

        $user = User::create([
            'name' => 'Klimkeit',
            'email' => 'ruediger.klimkeit@bkukr.de',
            'password' => Hash::make('1234Pass'),
        ]);
        $user->assignRole($role);

        Question::create([
            'question' => 'Welcher ist der primäre DNS Server von it92.de?',
            'answer' => 'chin.ns.cloudflare.com'
        ]);
        Question::create([
            'question' => 'Welcher ist der sekundäre DNS Server von it92.de?',
            'answer' => 'piotr.ns.cloudflare.com'
        ]);
        Question::create([
            'question' => 'Wie lautet die IPv4 des primären DNS Servers von Google?',
            'answer' => '8.8.8.8'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "02997e41"?',
            'answer' => '6ED3B651-508D-43E5-A0F7-B61A969120F3'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "1f1653dd"?',
            'answer' => 'E17195A4-E6F4-4A6C-81A9-4184C6CFE2E0'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "3487c144"?',
            'answer' => '43E01165-E707-4B47-9800-011B5560BA55'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "6fcf8cf9"?',
            'answer' => '990BAC1F-4D64-4ADD-B713-EE0BC50F49ED'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "836a03cf"?',
            'answer' => 'C43CC222-CD33-47B5-A31E-F40D9CE5AE11'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "aa6a24c3"?',
            'answer' => '447AF0AA-794D-4921-8C1E-76E7754FA7B4'
        ]);
        Question::create([
            'question' => 'Wie ist der Wert des TXT Record "ebe70c44"?',
            'answer' => '203DC425-7699-487D-A3CB-5A59DFC4FAC9'
        ]);
        Question::create([
            'question' => 'Welche Priorisierung hat der MX Record von it92.de?',
            'answer' => '0'
        ]);
        Question::create([
            'question' => 'Welcher Mail-Server ist für it92.de hinterlegt?',
            'answer' => 'mail.strohm.tech'
        ]);
        Question::create([
            'question' => 'Auf welches Ziel zeigt der UDP-Dienst "_ts3"?',
            'answer' => 'bku-ts.de'
        ]);
        Question::create([
            'question' => 'Welche Gewichtung hat der UDP-Dienst "_ts3"?',
            'answer' => '5'
        ]);
        Question::create([
            'question' => 'Welchen Port hat der UDP-Dienst "_ts3"?',
            'answer' => '9987'
        ]);
    }
}
