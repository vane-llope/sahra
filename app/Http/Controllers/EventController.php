<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    function index()
    {
        return view('Events.index', ['events' => Event::latest()->filter(request(['tag', 'search']))->paginate(8)]);
    }

    function create()
    {
        $this->authorize('create', Event::class);
        return view('Events.create');
    }

    function store(Request $request)
    {
        $formFields = $request->validate([
            'introduction' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'type' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Event::create($formFields);
        return redirect('/events')->with('message', 'رویداد با موفقیت ایجاد شد');
    }
    public function show(Request $request, Event $event)
    {
        $message = null;
        if (auth()->check()) {
            $existingRecord = UserEvent::query()
                ->where('user_id', auth()->user()->id)
                ->where('event_id', $request->event->id)
                ->first();
            if ($existingRecord) {
                $message = 'شما قبلا ثبت نام کرده اید';
            } else
                $message = null;
        }

        return view('Events.show', [
            'event' => $event, 'message' => $message
        ]);
    }

    public function edit(Event $event)
    {
        $this->authorize('update', Event::class);
        return view('Events.edit', ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {

        $formFields = $request->validate([
            'introduction' => 'required',
            'description' => 'required',
            'type' => 'required',
            'tags' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $event->update($formFields);
        return redirect('/events')->with('message', 'رویداد با موفقیت ویرایش یافت');
    }
    public function destroy(Event $event)
    {
        $this->authorize('remove', Event::class);
        $event->delete();
        return redirect('/events')->with('message', ' رویداد با موفقیت حذف شد');
    }
}
