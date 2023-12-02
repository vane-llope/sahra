@if (session()->has('message'))
    <div x-data="{show : true}" x-init="setTimeout(()=>show = false,3000)" x-show="show" style="z-index: 9999;" class="container text-center fixed-top top-0 mt-5 alert alert-dark alert-dismissible fade show" role="alert">
       <p>{{session('message')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>  
@endif