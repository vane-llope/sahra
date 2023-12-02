<x-layout>
    <x-form-layout>
                      <p class="text-center h1 fw-bold mb-3  mt-4">ایجاد موجودیت</p>
                      <form class="mx-1 mx-md-4"  method="POST" action="/entities" >
                        @csrf

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                              <input value="{{old('name')}}"  type="text" name="name" placeholder="نام" id="form3Example1c" class="form-control" />
                              @error('name')
                              <p class="text-danger">{{$message}}</p>
                           @enderror
                            </div>
                          </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-danger btn-lg w-100">ایجاد موجودیت</button>
                        </div>
      
                      </form>
                    
                    </x-form-layout>
  </x-layout>