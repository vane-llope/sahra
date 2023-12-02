<x-layout>
  <x-navbar/>
  <x-form-layout>
                    <p class="text-center h1 fw-bold mb-3  mt-4">ورود</p>
                    <a class="nav-link text-dark text-center" href="/users/login">در صورت نداشتن حساب کاربری  <span class="text-danger">ثبت نام کنید </span>  </a>
    
                    <form class="mx-1 mx-md-4"  method="POST" action="/users/authenticate" >
                      @csrf

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input value="{{old('phone')}}" placeholder="تلفن" type="phone" name="phone" id="form3Example2c" class="form-control" />
                          </div>
                        </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" name="password"  placeholder="پسورد"  id="form3Example4c" class="form-control"  autocomplete="current-password"/>
                        </div>
                      </div>

    
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-danger btn-lg w-100">ورود</button>
                      </div>
    
                    </form>
                  
                  </x-form-layout>
</x-layout>