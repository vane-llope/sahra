@props(['tagsCsv'])
@php
    $tags = explode('#',$tagsCsv);
    unset($tags[0]);
 @endphp   
  <div class="d-flex">
        @foreach ($tags as $tag)
           <a  class = 'text-dark nav-link ' href="/events?tag={{$tag}}">#{{$tag}}</a> 
  @endforeach 
  </div>
  