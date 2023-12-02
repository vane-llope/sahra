<x-layout>
    <div class="container my-3">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
             
                  <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 ">ویرایش </p>
  
                  <form method="POST" action="/events/{{$event->id}}"  enctype="multipart/form-data" class="mx-1 mx-md-4">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">

                <div class="col-md-10 col-lg-6 col-xl-7 align-items-center order-1 order-lg-2">
  
                    @php
                    $image =($event->image)? 'storage/'.$event->image : null;
                    @endphp
                    <x-imageUploader :image="$image" />

                      <div class="d-flex flex-row align-items-center my-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" value="{{$event->tags}}" name="tags" class="form-control" />
                          <label class="form-label" for="form3Example1c">تگ ها</label>
                          @error('tags')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                      </div>
    
                  </div>
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mt-5 ">
  
                          <div class="d-flex flex-row align-items-center">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0 ">
                              <textarea name="introduction" id="" cols="30" rows="10" class="form-control">{{$event->introduction}}</textarea>
                              <label class="form-label" for="form3Example1c">مقدمه</label>
                              @error('introduction')
                              <p class="text-danger">{{$message}}</p>
                           @enderror
                            </div>
                          </div>
  
                          <div class="d-md-flex justify-content-around align-items-center  mb-4 py-2 rounded">
                            <label class="me-3">نوع</label>
                              <select class="form-control bg-light text-end" id="type" name="type">
                                <option value="2005" >رویداد</option>
                                <option value="2004">مقاله</option>
                            </select>
                            
                          </div>
    </div>
    </div>
    
    <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$event->description}}</textarea>
          <label class="form-label" for="form3Example1c">توضیحات</label>
          @error('description')
          <p class="text-danger">{{$message}}</p>
       @enderror
        </div>
      </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg w-100">ثبت ویرایش</button>
                    </div>

                  </form>
  
            </div>
          </div>
        </div>
      </div>
    </div>
</x-layout>