
<x-layout>
  <x-search :rote='"/events"'/>
   @if (count([$events]) == 0) <p>No events</p>
@else 
 <div class="max-w-7xl mx-auto p-6 lg:p-8 container">

       <div class="masonry-container">
           @foreach ($events as $event)

           <div class="masonry-item my-2 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-black-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
              
                  <div class=" items-center justify-center rounded-full position-relative">
                    <img src="{{($event->image) ? asset('storage/'.$event->image) : asset('/images/TranscodedWallpaper.jpg')}}" alt="" />
                   
                    <!--<div class="dropdown position-absolute fixed-top ">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownButton" aria-haspopup="true" aria-expanded="false">
                          ...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownButton" id="dropdownMenu">
                          <a class="dropdown-item " href="/events/{{$event->id}}/edit">ویرایش</a>
                          <a class="dropdown-item ">    
                            <form method="post" action="/events/{{$event->id}}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn">حذف</button>
                           </form>
                          </a>
                        </div>
                      </div>-->
                  </div>
              <p class="mt-3 text-sm ">  introduction : {{$event->introduction}}  </p>
              <p class=" text-sm">   <x-event-tags :tagsCsv="$event['tags']"/> </p>
              <a href="/events/{{$event['id']}}" class=" text-dark nav-link">  Click for more ... </a>
          
          </div>


           @endforeach  
   </div>
       </div>  
     

      <ul class="container">
        <li class="page-item">{{$events->links('pagination::bootstrap-4')}}</li>
      </ul>

     
 @endif
</x-layout>

