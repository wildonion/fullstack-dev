@extends('layouts.welcome')

@section('content')
	@include('layouts.panelhead')
  <div class="contact-content">
   <div class="container">
   @foreach ($acis as $aci)
         <div class="contact-info">
            <!-- <h2>CONTACT</h2> -->
         </div>
      
      <div class="contact-details">
          
            <div class="col-md-6 contact-map">
             @if($aci->picture != '')
             <img src="/uploads/images/about_admin/{{$aci->picture}}" alt="{{$aci->full_name}}"
                  width="550" height="395" class="img-responsive">
             @else
             <img src="/contact.png" alt="{{$aci->full_name}}"
                  width="550" height="395" class="img-responsive">
             @endif   
            </div>
        <!-- here we should check the ip for dir and all titles -->
          <div class="col-md-6 company_address" dir="rtl">     
            <h4>با من در تماس باش</h4>
              <p><a href="javascript:void(0)" class="fa fa-user-circle"></a> 
              {{$aci->full_name}}</p>
              @if ($aci->compony != '')
                   <p><a href="javascript:void(0)" title="شرکت" class="fa fa-building"></a> {{$aci->compony}}</p>
              @endif
              @if ($aci->phone_number != '' && $aci->phone_number[0] != '0')
                <p><a href="javascript:void(0)" title="شماره تماس" class="fa fa-phone"></a> +98{{$aci->phone_number}}</p>
              @else
                <p><a href="javascript:void(0)" title="شماره تماس" class="fa fa-phone"></a> {{$aci->phone_number}}</p>
              @endif
              <p>
              <!-- @if($aci->facebook != '')
              <a href="https://facebook.com/{{$aci->facebook}}" title="facebook" class="fa fa-facebook"></a>  
              @endif -->
              @if($aci->instagram != '')
              <a href="https://instagram.com/{{$aci->instagram}}/" class="fa fa-instagram" title="instagram"></a>  
              @endif
              @if($aci->gmail != '')
              <a href="mailto:{{$aci->gmail}}" title="gmail" class="fa fa-google"></a>  
              @endif
              @if($aci->email != '')
              <a href="mailto:{{$aci->email}}" title="email" class="fa fa-yahoo"></a> 
              @endif
              @if($aci->telegram != '')
              <a href="https://t.me/{{$aci->telegram}}" title="telegram" class="fa fa-telegram"></a>
              @endif
              </p>
          </div>
          <div class="clearfix"></div>
       </div>    
   </div>
    @endforeach
   </div>
</div>
@endsection