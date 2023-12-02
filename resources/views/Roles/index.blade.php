<x-layout>
    <div class="container my-3">
    <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
          </tr>
        </thead>
        <tbody>
         
            @foreach ($roles as $role) 
            <tr>
            <th scope="row">{{$loop->index+1}}</th>
                <td>{{$role->name}}</td>
                <td><a class="nav-link text-dark" href="/roles/{{$role->id}}/edit">ویرایش</a></td>
                <td>
                  <form method="POST" action="/roles/{{$role->id}}">
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
</x-layout>