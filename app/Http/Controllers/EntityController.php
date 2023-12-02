<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function index()
    {
        $this->authorize('display', Entity::class);
        return view('Entities.index', ['entities' => Entity::all()]);
    }

    public function create()
    {
        $this->authorize('create', Entity::class);
        return view('Entities.create');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        Entity::create($formFields);
        return back()->with('message', 'موجودیت با موفقیت ایجاد شد');
    }

    public function edit(Entity $entity)
    {
        $this->authorize('update', Entity::class);
        return view('Entities.edit', ['entity' => $entity]);
    }

    public function update(Request $request, Entity $entity)
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $entity->update($formFields);
        return redirect('/entities')->with('message', 'موجودیت با موفقیت ویرایش شد');
    }

    public function destroy(Entity $entity)
    {
        $this->authorize('remove', Entity::class);
        $entity->delete();
        return redirect('/entities')->with('message', ' موجودیت با موفقیت حذف شد');
    }
}
