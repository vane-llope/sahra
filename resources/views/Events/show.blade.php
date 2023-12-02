
<x-layout>
 <div class="container my-4">

    <div class="row container  ">
      <div class="col-sm-6">
        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-black-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
          <img src="{{($event->image) ? asset('storage/'.$event->image) : asset('/images/TranscodedWallpaper.jpg')}}" alt="" />
       </div>
        </div>
        <div class="col-sm-6">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-black-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
    <div>
        
    <p class=" text-black-500 dark:text-black-400 leading-relaxed">  introduction : {{$event->introduction}}  </p>
    <p class=" text-black-500 dark:text-black-400  leading-relaxed">  <p class="mt-4 text-black-500 dark:text-black-400 text-sm leading-relaxed">   <x-event-tags :tagsCsv="$event['tags']"/> </p>
  </p>
   
    </div>
        </div>
      </div>
      <p class="my-5 container">  Description : {{$event->description}}  </p>
      @if($event->type == 2003)
      @guest
       <p class="fw-bold"> برای ثبت نام ابتدا باید وارد حساب کاربری خود شوید</p>
       @else
       <div class=" p-6 via-transparent motion-safe:hover:scale-[1.01] transition-all duration-250 ">
        <form method="post" action="/registered/{{$event->id}}">
          @csrf
          <button type="submit" class="btn btn-danger p-2">ثبت نام</button>
       </form>
      </div>
       @endguest
      @endif
      @can('display',auth()->user()) 
      <a class="nav-item btn" href="/registered/users/{{$event->id}}">نمایش افرادی که ثبت نام کرده اند</a>
      @endcan
 </div>
</div>
</x-layout>