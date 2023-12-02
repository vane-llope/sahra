<x-layout>
    <section class=" bg-dark ">
        <div class="container ">
          <div class="row d-flex justify-content-center  align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black my-5" style="buser-radius: 25px; ">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 user-2 user-lg-1">
      
                      <p class="text-center h1 fw-bold mb-3  mt-4">ویرایش کاربر </p>
                 
                    <form method="POST" action="/users/{{$user->id}}" >
                         @csrf
                         @method('PUT')
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input  value="{{$user->name}}"  type="text" name="name" id="form3Example1c" class="form-control" />
                          <label class="form-label" for="form3Example1c"> نام</label>
                          @error('name')
                          <p class="text-danger">{{$message}}</p>
                       @enderror
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input value="{{$user->email}}" type="email" name="email" id="form3Example3c" class="form-control" />
                          <label class="form-label" for="form3Example3c">ایمیل </label>
                          @error('email')
                          <p class="text-danger">{{$message}}</p>
                       @enderror
                        </div>
                      </div>
                      
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input value="{{$user->phone}}" type="phone" name="phone" id="form3Example2c" class="form-control" />
                          <label class="form-label" for="form3Example2c">تلفن</label>
                          @error('phone')
                          <p class="text-danger">{{$message}}</p>
                       @enderror
                        </div>
                      </div>
  
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-baby fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input value="{{$user->birthday}}" type="text" placeholder="روز/ماه/سال" name="birthday" id="form3Example2c" class="form-control" />
                          <label class="form-label" for="form3Example2c">تاریخ تولد </label>
                          @error('birthday')
                          <p class="text-danger">{{$message}}</p>
                       @enderror
                        </div>
                      </div>

  
                      
  
                  <div class="d-md-flex justify-content-around align-items-center mb-4 py-2 buser rounded">
  
                    <h6 class="mb-0">جنسیت: </h6>
  
                    <div class="form-check form-check-inline mb-0 me-3">
                      <input class="form-check-input" type="radio" <?php echo($user->gender == 'female'? 'checked="checked"':''); ?> value="female" name="gender" id="femaleGender"
                        value="femail" checked />
                      <label class="form-check-label" for="femaleGender">زن</label>
                    </div>
  
                    <div class="form-check form-check-inline mb-0 me-3">
                      <input class="form-check-input" type="radio" <?php echo($user->gender == 'male'? 'checked="checked"':''); ?>  name="gender" id="maleGender"
                        value="male" />
                      <label class="form-check-label" for="maleGender">مرد</label>
                    </div>
  
                  </div>
                  <div class="my-4">
                    <select class="form-control" id="type" name="role">
                      @if ($user->roles->first())
                      <option value="{{$user->roles->first()->name}}" selected>{{$user->roles->first()->name}}</option>
                   @else 
                   <option value="">فاقد نقش </option>
                      @endif
                     @foreach ($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                      <option value="">فاقد نقش </option>
                  </select>
                  </div>
                    
    
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-danger btn-lg w-100">اعمال تغییرات</button>
                      </div>
    
                    </form>
      
                    </div>
                   <!-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center user-1 user-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
      
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </x-layout>