<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Platform Presences</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Plateform De Presence
                    abraracourcix
                </div>



                @php
                    
                $today = Illuminate\Support\Carbon::today();
                // dd($today->year);
                echo '<h1 class="w3-text-teal"><center>' . $today->format('F Y') . '</center></h1>';
                $tempDate = Illuminate\Support\Carbon::createFromDate($today->year, $today->month, 1);
                echo '<table border="1" class = "w3-table w3-boarder w3-striped">
                       <thead><tr class="w3-theme">
                       <th>Mon</th>
                       <th>Tue</th>
                       <th>Wed</th>
                       <th>Thu</th>
                       <th>Fri</th>
                       <th>Sat</th>
                       <th>Sun</th>
                       </tr></thead>';
                $skip = $tempDate->dayOfWeek;
                for($i = 0; $i < $skip-1; $i++)
                {
                    $tempDate->subDay();
                }
                //loops through month
                do
                {
                    echo '<tr>';
                    //loops through each week
                    for($i=0; $i < 7; $i++)
                    {
                        echo '<td><span class="date">';
            
                        echo $tempDate->day;
            
                        echo '</span></td>';
            
                        $tempDate->addDay();
                    }
                    echo '</tr>';
            
                }while($tempDate->month == $today->month);
            
                echo '</table>';
               
                @endphp



                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
