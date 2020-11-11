<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\Setting;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Setting::query()->delete();
        DB::table('settings')->insert([
            'notifications_settings_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.',
            'about_app'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.',
            'phone' =>'201066436323',
            'email'=>'BloodBank@gmail.com',
            'tw_link' =>'https://www.twiiter.com/BloodBank',
            'insta_link' =>'https://www.instgram.com/BloodBank',
            'facebook_link' =>'https://www.facebook.com/BloodBank'
        ]);
        Permission::query()->delete();
        create_permission('users lists','users.index');
        create_permission('users create','users.store,users.create');
        create_permission('users edit','users.edit,users.update');
        create_permission('users destroy','users.destroy');
        create_permission('categories lists','categories.index');
        create_permission('categories create','categories.store.categories.create');
        create_permission('categories edit','categories.edit,categories.update');
        create_permission('categories destroy','categories.destroy');
    }
}
