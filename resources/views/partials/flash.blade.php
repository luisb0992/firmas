@if(Session::has('flash_message'))
    <div class="alert {{ Session::get('flash_class') }} alert-dismissible fade show" role="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong class="text-center">{{Session::get('flash_message')}}</strong>
  	</div>
@endif
