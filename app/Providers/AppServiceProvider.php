<?php

namespace App\Providers;

use App\Form;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('WEBSITE SETTINGS');
            $coachs = User::where('role_id',2)->get();
            $students = User::where('role_id',3)->get();
            $visiteurs = User::where('role_id',4)->get();
            $messages = Form::where('read',false)->get();
            $nbCoach = count($coachs);
            $nbStudent = count($students);
            $nbVisiteur = count($visiteurs);
            $nbMessages = count($messages);
            $event->menu->add(
            
            [ 
                'text' => 'Coachs',
                'url'  => 'user/create',
                'icon' => 'fas fa-fw fa-user',
                'label' => $nbCoach
            ],
            [ 
                'text' => 'Students',
                'url'  => 'user',
                'icon' => 'fas fa-fw fa-users',
                'label' => $nbStudent
            ],
            [ 
                'text' => 'Visiteurs',
                'url'  => 'visiteurs',
                'icon' => 'fas fa-fw fa-user-plus',
                'label' => $nbVisiteur
            ],
            [
                'text'    => 'Messages',
                'icon'    => 'fas fa-envelope-open-text',
                'label' => $nbMessages,
                'url'  => 'form',
            
            ],
            
            [
                'text'    => 'About',
                'icon'    => 'fas fa-fw fa-info-circle',
                'url'  => 'about',
                
            ],
            
            [
                'text'    => 'Info-Contact',
                'icon'    => 'fas fa-fw fa-address-book',
                'url'  => 'info',
                
            ],
            [
                'text'    => 'Newsletter',
                'icon'    => 'fas fa-fw fa-mail-bulk',
                'url'  => 'newsletter',
            ],
            [
                'text'    => 'Testimonials',
                'icon'    => 'fas fa-fw fa-folder-open',
                'url'  => 'testimonial',
                
            ]
            
        );
        });
    }
}