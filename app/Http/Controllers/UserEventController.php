<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Http\Request;

class UserEventController extends Controller
{


    public function create(Request $request)
    {
            $existingRecord = UserEvent::query()
                ->where('user_id', auth()->user()->id)
                ->where('event_id', $request->event)
                ->first();
            if ($existingRecord) {
                return back()->with('message', ' شما قبلا ثبت نام کرده اید');
            } else
                $formFields['user_id'] = auth()->user()->id;
            $formFields['event_id'] = $request->event;


            UserEvent::create($formFields);
            return back()->with('message', 'ثبت نام با موفقیت انجام شد');
        
    }
    //show registered users
    public function index(Request $request)
    {
        $this->authorize('display', User::class);
        $userIds = UserEvent::where('event_id', $request->event)
            ->pluck('user_id')
            ->toArray();

        // Fetch the user data from the users table based on the user_ids
        $users = User::whereIn('id', $userIds)->get();

        return view('UserEvents.index', ['users' => $users]);
    }

    public function destroy(User $user){
        $this->authorize('remove', User::class);
        $UserEvent =  UserEvent::query()->where('user_id', $user->id);
        $UserEvent->delete();
        return back()->with('message', $user->name . 'از این رویداد حذف شد');
    }
}
