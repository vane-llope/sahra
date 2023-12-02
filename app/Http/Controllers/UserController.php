<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   function index()
   {
      $this->authorize('display', User::class);
      return view('users.index', ['users' => User::latest()->filter(request(['search']))->get()]);
   }
   function login()
   {
      return view('users.login');
   }

   function register()
   {
      return view('users.register');
   }
   function store(Request $request)
   {
      $formFields = $request->validate([
         'name' => 'required',
         'email' => ['required', 'email', Rule::unique('users', 'email')],
         'phone' => 'required',
         'birthday' => 'required',
         'gender' => 'required',
         'password' => ['required', 'confirmed', 'min:6']
      ]);

      $formFields['password'] = bcrypt($formFields['password']);

      $user = User::create($formFields);

      auth()->login($user);
      return redirect('/')->with('message', 'خوش آمدید' . $user->name);
   }

   public function authenticate(Request $request)
   {
      $formFields = $request->validate([
         'phone' => 'required',
         'password' => 'required'
      ]);
      if (auth()->attempt($formFields)) {
         $request->session()->regenerate();
         return redirect('/')->with('message', auth()->user()->name.' خوش آمدید ');
      }
      return back()->with(['message' => 'اطلاعات نامعتبراند']);
   }
   public function edit(User $user)
   {
      $this->authorize('update', User::class);
      return view('users.edit', ['user' => $user, 'roles' => Role::all()]);
   }

   public function logout(Request $request)
   {
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/')->with('message', 'کاربرگرامی شما از حساب خود خارج شدید');
   }
   public function update(Request $request, User $user)
   {
      $formFields = $request->validate([
         'name' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'birthday' => 'required',
         'gender' => 'required',
         'role' => 'nullable', // Allow the role to be nullable
      ]);

      $roleId = $request->input('role');

      if ($roleId) {
         // Check if the user already has a role
         $userRole = UserRole::where('user_id', $user->id)->first();

         if ($userRole) {
            // User already has a role, update it
            $userRole->role_id = $roleId;
            $userRole->save();
         } else {
            // User doesn't have a role, create a new one
            UserRole::create([
               'user_id' => $user->id,
               'role_id' => $roleId,
            ]);
         }
      } else {
         // Role is empty, delete the user's role if it exists
         UserRole::where('user_id', $user->id)->delete();
      }

      $user->update($formFields);

      return redirect('/users')->with('message', 'کاربر با موفقیت ویرایش یافت');
   }
   public function changePassword(User $user)
   {
      $this->authorize('update', User::class);
      return view('users.changePassword', ['user' => $user]);
   }
   public function updatePassword(Request $request, User $user)
   {

      $formFields = $request->validate([
         'password' => ['required', 'confirmed', 'min:6']
      ]);

      $formFields['password'] = bcrypt($formFields['password']);

      $user->update($formFields);
      return redirect('/users/users')->with('message', "پسورد کاربر ویرایش شد");
   }
   public function destroy(User $user)
   {
      $this->authorize('remove', User::class);
      $user->delete();
      return redirect('/users/users')->with('message', $user->name . ' حذف شد');
   }
}
