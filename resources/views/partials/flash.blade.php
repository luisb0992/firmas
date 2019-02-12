@if(Session::has('flash_message'))
    <div class="alert {{ Session::get('flash_class') }} alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong class="text-center">{{Session::get('flash_message')}}</strong>
  	</div>
@endif
