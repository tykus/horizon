@if (Session::has('info'))
  <div class="alert alert-info">
    {{ Session::get('info') }}
  </div>
@elseif (Session::has('error'))
  <div class="alert alert-danger">
    {{ Session::get('error') }}
  </div>
@endif
