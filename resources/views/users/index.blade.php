<x-layout>
    <div class="container my-3">
        <x-search :rote='"/users/users"'/>
        <div class="overflow-auto">
    <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">ایمیل</th>
            <th scope="col">شماره تماس</th>
            <th scope="col">تاریخ تولد</th>
            <th scope="col">edit</th>
            <th scope="col">password</th>
            <th scope="col">delete</th>
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
                <td><a class="nav-link text-dark" href="/users/{{$user->id}}/edit">Edit</a></td>
                <td><a class="nav-link text-dark" href="/users/password/{{$user->id}}/edit">Password</a></td>
                <td>
                  <form method="POST" action="/users/{{$user->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Delete</button>
                 </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
</x-layout>