<section class="jk-header">
    <div class="container">
		<div class="row">
        	<div class="col-12-md">
	
            <nav class="navbar navbar-inverse">
     			
        		<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="#"></a>
		        </div>
		    
		        <div class="collapse navbar-collapse" id="navbar-collapse-3">
             <!-- if user's ip was for IR -->
              <style>
                .navbar-nav > li > a {
                  font-family: 'BTabassom';
                }
              </style>
              <ul class="nav navbar-nav navbar-right">
                <li @if($view_name == 'index') class="active" @else class="" @endif><a href="{{ url('/') }}">صفحه اصلی</a></li> 
                <li @if($view_name == 'games_body') class="active" @else class="" @endif><a href="{{ url('portfolio') }}">بازی های من</a></li>
                <li @if($view_name == 'blogs_body') class="active" @else class="" @endif><a href="{{url('blogs')}}">بلاگ</a></li>         
                <li @if($view_name == 'contact_body') class="active" @else class="" @endif><a href="{{url('contact-me')}}">تماس با من</a></li>
                @if($view_name == 'games_body')
                  <li @if($view_name == 'best_of_games') class="active" @else class="" @endif><a href="{{url('best-of-games')}}" title="برترین بازی ها">برترین ها</a></li>
                @endif
                @if($view_name == 'blogs_body')
                  <li @if($view_name == 'best_of_blogs') class="active" @else class="" @endif><a href="{{url('best-of-blogs')}}" title="برترین پست ها">برترین ها</a></li>
                @endif
              </ul>
              <!-- if user's ip was foreign -->
              <!-- <style>
                .navbar-nav > li > a {
                  font-family: 'Raleway';
                }
              </style>
		          <ul class="nav navbar-nav">
		            <li @if($view_name == 'index') class="active" @else class="" @endif><a href="{{ url('/') }}">Home Page</a></li>	
      					<li @if($view_name == 'games_body') class="active" @else class="" @endif><a href="{{ url('portfolio') }}">Portfolio</a></li>
      					<li @if($view_name == 'blogs_body') class="active" @else class="" @endif><a href="{{url('blogs')}}">Blog</a></li>					
      					<li @if($view_name == 'contact_body') class="active" @else class="" @endif><a href="{{url('contact-me')}}">Contact</a></li>
                @if($view_name == 'games_body')
                  <li @if($view_name == 'best_of_games') class="active" @else class="" @endif><a href="{{url('best-of-games')}}" title="best of all posts">‌Best Of</a></li>
                @endif
                @if($view_name == 'blogs_body')
                  <li @if($view_name == 'best_of_blogs') class="active" @else class="" @endif><a href="{{url('best-of-blogs')}}" title="best of all games">Best Of</a></li>
                @endif
		          </ul> -->
		        </div>
   		    </nav>

    		</div>
		</div>
    
        <div class="pra">
        <!-- if user's ip was for IR -->
          @if($brand->brand != '')
               {!! $brand->brand !!}
          @endif
            <!-- if user's ip was foreign -->
          <!-- @if($brand->brandF_User != '')
            {!! $brand->brandF_User !!}
          @endif -->
        </div>
        
	</div>
</section>




