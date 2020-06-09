<!DOCTYPE html>
<html lang="fa"> <!-- for foreign ip it will be "en" -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Shayan Valiyari">
        <!-- ================================= -->
                <!-- if user's ip was for IR -->
        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonegame')
        <meta name="description" content="{{$video->meta_desc}}">
        <meta name="keywords" content="{{$video->tags}}">
        @endif
        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonenews')
        <meta name="description" content="{{$news->meta_desc}}">
        <meta name="keywords" content="{{$news->tags}}">
        @endif
        @if(Request::path() == '/')
        <meta name="description" content="{{$tags->meta_desc}}">
        <meta name="keywords" content="{{$tags->tags}}">
        @endif
        @if(Request::path() == 'portfolio' || Request::path() == 'best-of-games')
        <meta name="description" content="{{$tags->meta_desc}}">
        <meta name="keywords" content="{{$tags->tags}}">
        @endif
        @if(Request::path() == 'blogs' || Request::path() == 'best-of-blogs')
        <meta name="description" content="{{$tags->meta_desc}}">
        <meta name="keywords" content="{{$tags->tags}}">
        @endif
        @if(Request::path() == 'contact-me')
        <meta name="description" content="{{$tags->meta_desc}}">
        <meta name="keywords" content="{{$tags->tags}}">
        @endif
        @if(Request::path() == 'shop')
        <meta name="description" content="{{$tags->meta_desc}}">
        <meta name="keywords" content="{{$tags->tags}}">
        @endif
        @if($view_name == 'game_search_result_body')
        <meta name="description" content="{{$q}}">
        <meta name="keywords" content="{{$q}}">
        @endif
        @if($view_name == 'blog_search_result_body')
        <meta name="description" content="{{$q}}">
        <meta name="keywords" content="{{$q}}">
        @endif
        <!-- ================================= -->
        <!-- if user's ip was foreign -->
        <!-- @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonegame')
        <meta name="description" content="{{$video->meta_descF_User}}">
        <meta name="keywords" content="{{$video->tagsF_User}}">
        @endif
        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonenews')
        <meta name="description" content="{{$news->meta_descF_User}}">
        <meta name="keywords" content="{{$news->tagsF_User}}">
        @endif
        @if(Request::path() == '/')
        <meta name="description" content="{{$tags->meta_descF_User}}">
        <meta name="keywords" content="{{$tags->tagsF_User}}">
        @endif
        @if(Request::path() == 'portfolio' || Request::path() == 'best-of-games')
        <meta name="description" content="{{$tags->meta_descF_User}}">
        <meta name="keywords" content="{{$tags->tagsF_User}}">
        @endif
        @if(Request::path() == 'blogs' || Request::path() == 'best-of-blogs')
        <meta name="description" content="{{$tags->meta_descF_User}}">
        <meta name="keywords" content="{{$tags->tagsF_User}}">
        @endif
        @if(Request::path() == 'contact-me')
        <meta name="description" content="{{$tags->meta_descF_User}}">
        <meta name="keywords" content="{{$tags->tagsF_User}}">
        @endif
        @if(Request::path() == 'shop')
        <meta name="description" content="{{$tags->meta_desc}}">
        <meta name="keywords" content="{{$tags->tags}}">
        @endif
        @if($view_name == 'game_search_result_body')
        <meta name="description" content="{{$q}}">
        <meta name="keywords" content="{{$q}}">
        @endif
        @if($view_name == 'blog_search_result_body')
        <meta name="description" content="{{$q}}">
        <meta name="keywords" content="{{$q}}">
        @endif -->
        <!-- ================================= -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" href="/s.png">
        <!-- ======================================================================================= -->
        <!-- if user's ip was for IR -->
        @if(Request::path() == 'portfolio')
        <title>{{ config('app.name', 'Laravel') }} | بازی های من</title>
        @endif

        @if(Request::path() == 'blogs')
        <title>{{ config('app.name', 'Laravel') }} | وبلاگ</title>
        @endif

        @if(Request::path() == 'contact-me')
        <title>{{ config('app.name', 'Laravel') }} | تماس با من</title>
        @endif

        @if(Request::path() == 'best-of-games' || Request::path() == 'best-of-blogs')
        <title>{{ config('app.name', 'Laravel') }} | برترین ها</title>
        @endif

        @if(Request::path() == '/')
        <title>{{ config('app.name', 'Laravel') }}</title>
        @endif

        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonenews')
        <title>{{ config('app.name', 'Laravel') }} | {{$news->title}}</title>
        @endif

        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonegame')
        <title>{{ config('app.name', 'Laravel') }} | {{$video->title}}</title>
        @endif
        @if($view_name == 'game_search_result_body' || $view_name == 'blog_search_result_body')
            @if(preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $q))
            <title>{{ config('app.name', 'Laravel') }} | نتایج جستجو برای {{$q}}</title>
            @else
            <title>{{ config('app.name', 'Laravel') }} | {{$q}} نتایج جستجو برای</title>
            @endif
        @endif
        <!-- ====================================================================================== -->
        <!-- if user's ip was foreign -->
        <!-- @if(Request::path() == 'portfolio')
        <title>{{ config('app.name', 'Laravel') }} | portfolio</title>
        @endif

        @if(Request::path() == 'blogs')
        <title>{{ config('app.name', 'Laravel') }} | posts</title>
        @endif

        @if(Request::path() == 'contact-me')
        <title>{{ config('app.name', 'Laravel') }} | contact-me</title>
        @endif

        @if(Request::path() == 'best-of-games' || Request::path() == 'best-of-blogs')
        <title>{{ config('app.name', 'Laravel') }} | Best Of</title>
        @endif

        @if(Request::path() == '/')
        <title>{{ config('app.name', 'Laravel') }}</title>
        @endif

        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonenews')
        <title>{{ config('app.name', 'Laravel') }} | {{$news->titleF_User}}</title>
        @endif

        @if(Route::currentRouteAction() == 'App\Http\Controllers\Welcome\GameShopController@showonegame')
        <title>{{ config('app.name', 'Laravel') }} | {{$video->titleFUser}}</title>
        @endif
        @if($view_name == 'game_search_result_body' || $view_name == 'blog_search_result_body')
        <title>{{ config('app.name', 'Laravel') }} | search results for {{$q}}</title>
        @endif -->
        <!-- ====================================================================================== -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/mediaelement/latest/mediaelementplayer.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda-themeless.min.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <link rel="stylesheet" href="/vendor/emojione/css/emojione.min.css"/>
        <link rel="stylesheet" href="/css/emoji_autocomplete.css">
        <style>@import url("/css/contact_icon.css");</style>

    </head>



    <body class="fade-in one">
    
            
            @yield('content')
            @include('layouts.panelfooter')
           

        <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    <script src="/js/vgallery.js"></script>
    <script src="https://cdn.jsdelivr.net/mediaelement/latest/mediaelement-and-player.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.0/spin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.0/ladda.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.0/jquery.textcomplete.min.js" 
    integrity="sha256-LVEfx05sOY34HXGS/RbJHlA2K9wH21TTM7OfrCZRR4o=" crossorigin="anonymous"></script>
    <script src="/vendor/emojione/lib/js/emojione.min.js"></script>
    <script src="/js/emoji_autocomplete.js"></script>
    <script src="/js/like.js"></script>
    <script src="/js/g_config.js"></script>
    <script src="/js/move-top.js"></script>
    <script src="/js/easing.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
                });
            });
    </script>

    
    
    </body>
</html>
