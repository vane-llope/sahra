<x-layout>
  @if($users->isEmpty())
  <div class="container mt-5 text-center">
      <p>هنوز هیچ کاربری در این رویداد ثبت نام نکرده</p>
  </div>
  @else
    <div class="container my-3">
        <x-search :rote='"/users/users"'/>
    <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">ایمیل</th>
            <th scope="col">شماره تماس</th>
            <th scope="col">تاریخ تولد</th>
            <th scope="col">حذف از رویداد</th>
          </tr>
        </thead>
        <tbody>
         
            @foreach ($users as $user) 
            <tr>
            <th scope="row">{{$loop->index+1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->birthday}}</td>
                <td>
                  <form method="POST" action="/registered/{{$user->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">حذف</button>
                 </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    @endif
</x-layout>