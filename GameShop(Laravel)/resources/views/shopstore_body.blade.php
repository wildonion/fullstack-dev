@extends('layouts.welcome')
@section('content')
@include('layouts.panelhead')
  <div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid"> 
            <div class="content-grid-info">
               <div class="post-info">

               		@if($shop->status == 0)
						 @if($shop->title != '')
						 	<div dir="rtl"><strong>{{ $shop->title }}</strong></div>
						 @endif
						<div>{!! $shop->description !!}</div>
						 @if($shop->picture != '')
								 <img src="/uploads/images/shop_setting/{{$shop->picture}}" width="400" height="200">	 	
						 @endif
						 @if($shop->expired_at != '')
							<div dir="rtl">زمان باقی مانده به روز‌:
							{{\Carbon\Carbon::parse($shop->expired_at)->diffInDays(\Carbon\Carbon::now())}}</div>
						 @endif
					@endif

						

					@if($shop->status == 1)
					<div>fetch all stuffs for download and buy</div>
					@endif


               </div>
            </div>
          </div>
         </div>
        <!-- ===================================================== -->
        @include('right_panel')
        <div class="clearfix"></div>
      </div>
    </div>
</div>
@endsection
