<x-layout>
  <x-form-layout>
                    <p class="text-center h1 fw-bold mb-3  mt-4">ثبت نام </p>
                    <a class="nav-link text-dark text-center" href="/users/login">در صورت داشتن حساب کاربری <span class="text-danger">کلیک کنید</span>  </a>
    
                    
                  <form method="POST" action="/users/register">
                       @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input value="{{old('name')}}"  placeholder="نام"  type="text" name="name" id="form3Example1c" class="form-control" />
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input value="{{old('email')}}"  placeholder="ایمیل"   type="email" name="email" id="form3Example3c" class="form-control" />
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                      </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input value="{{old('phone')}}"  placeholder="تلفن"  type="phone" name="phone" id="form3Example2c" class="form-control" />
                        @error('phone')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-baby fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input value="{{old('birthday')}}" placeholder="روز/ماه/سال"  name="birthday" type="text" class="form-control form-control-lg" id="birthdayDate" />
                        @error('birthday')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                      </div>
                    </div>

                    

                <div class="d-md-flex justify-content-around align-items-center mb-4 py-2 border rounded">

                  <h6 class="mb-0">جنسیت: </h6>

                  <div class="form-check form-check-inline mb-0 me-3">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="femail" checked />
                    <label class="form-check-label" for="femaleGender">زن</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-3">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="male" />
                    <label class="form-check-label" for="maleGender">مرد</label>
                  </div>

                </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input  placeholder="پسورد"  type="password" name="password" id="form3Example4c" class="form-control" autocomplete="new-password"/>
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input   placeholder="تکرار پسورد"  type="password" name="password_confirmation" id="form3Example4cd" class="form-control" autocomplete="new-password"/>
                        @error('password_confirmation')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                      </div>
                    </div>
  
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-danger btn-lg w-100">ثبت نام</button>
                    </div>
  
                  </form>
  </x-form-layout>
</x-layout>