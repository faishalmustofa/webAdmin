<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\UserRole;
use Auth;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $user = Auth::user();
            $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
            $admin_role = $user_roles->role;
            
            if( $admin_role->slug === 'super-admin' ){
                $event->menu->addAfter('grafik',[
                    'text'        => 'User List',
                    'url'         => '/user-list',
                    'icon'        => 'fas fa-fw fa-user',
                ]);
            }
            
        });
    }
}
