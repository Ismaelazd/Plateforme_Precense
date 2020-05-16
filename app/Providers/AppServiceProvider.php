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
            $messages = Form::where('read',false)->get();
            $nbCoach = count($coachs);
            $nbStudent = count($students);
            $nbMessages = count($messages);
            $event->menu->add(
            
            [ 
                'text' => 'Coachs',
                'url'  => 'users',
                'icon' => 'fas fa-fw fa-user',
                'label' => $nbCoach
            ],
            [ 
                'text' => 'Students',
                'url'  => 'users',
                'icon' => 'fas fa-fw fa-users',
                'label' => $nbStudent
            ],
            [
                'text'    => 'Messages',
                'icon'    => 'fas fa-envelope-open-text',
                'label' => $nbMessages,
                'url'  => 'form',
            
            ],
            [
                'text'    => 'Services',
                'icon'    => 'fas fa-tools',
                'submenu' => [
                    [
                        'text' => 'Les services',
                        'url'  => 'service',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text' => 'Ajouter',
                        'url'  => 'service/create',
                        'icon_color' => 'green',
                    ],
                    
                ],
            ],
            [
                'text'    => 'Elements HomePage',
                'icon'    => 'fas fa-stream',
                'submenu' => [
                    [
                        'text' => 'Les élémments',
                        'url'  => 'homeElement',
                        'icon_color' => 'yellow',
                    ],            
                    
                ],
            ],
            [
                'text'    => 'About',
                'icon'    => 'fas fa-info-circle',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'about',
                        'icon_color' => 'yellow',
                    ],
                    
                ],
            ],
            
            [
                'text'    => 'Contact',
                'icon'    => 'fas fa-address-book',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'contact',
                        'icon_color' => 'yellow',
                    ],
                    
                    
                ],
            ],
           
            [
                'text'    => 'Newsletter',
                'icon'    => 'fas fa-mail-bulk',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'newsletter',
                        'icon_color' => 'yellow',
                    ],
                    
                    
                ],
            ],
            [
                'text'    => 'Footer',
                'icon'    => 'fas fa-caret-square-down',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'footer',
                        'icon_color' => 'yellow',
                    ],     
                    
                ],
            ],
            [
                'text'    => 'Testimonials',
                'icon'    => 'fas fa-folder-open',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'testimonial',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text' => 'Ajouter',
                        'url'  => 'testimonial/create',
                        'icon_color' => 'green',
                    ],
                    
                ],
            ],
            [
                'text'    => 'Articles',
                'icon'    => 'fas fa-newspaper',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'article',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text' => 'Ajouter',
                        'url'  => 'article/create',
                        'icon_color' => 'green',
                    ],
                    
                ],
            ],
            [
                'text'    => 'Tags',
                'icon'    => 'fas fa-tags',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'tag',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text' => 'Ajouter',
                        'url'  => 'tag/create',
                        'icon_color' => 'green',
                    ],
                    
                ],
            ],
            [
                'text'    => 'Catégories',
                'icon'    => 'fas fa-list',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'categorie',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text' => 'Ajouter',
                        'url'  => 'categorie/create',
                        'icon_color' => 'green',
                    ],
                    
                ],
            
            ],
            [
                'text'    => 'Commentaires',
                'icon'    => 'fas fa-comments',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'commentaire',
                        'icon_color' => 'yellow',
                    ],
                    
                    
                ],
            ],
            [
                'text'    => 'Quote',
                'icon'    => 'fas fa-quote-left',
                'submenu' => [
                    [
                        'text' => 'Content',
                        'url'  => 'quote',
                        'icon_color' => 'yellow',
                    ],
                    
                    
                ],
            ]
        );
        });
    }
}