<?php

namespace App\Http\Controllers;

use App\models\Bunch;
use App\models\User;
use App\Http\Requests\BunchRequest;


class BunchController extends Controller
{
    public function index()
    {
        $bunch = Bunch::all();
        return view('bunch.index', compact('bunch'));
    }


    public function create()
    {
        return view('bunch.create');
    }

    public function store(Bunch $bunch, BunchRequest $request)
    {
        if (!empty($request->name)&&!empty($request->about)) {
            $bunch->name = $request->name;
            $bunch->about = $request->about;
        }else{
            return redirect()->route('bunch.create');
        }
            $bunch->save();
            return redirect()->route('bunch.index')->withMessage('Bunch ADD');
    }

    public function show(Bunch $bunch, User $user)
    {
        if ($user->can('view', $bunch)) {
        return view('bunch.show', compact('bunch'));
        }else{
            abort(404);
        }
    }

    public function update(BunchRequest $request, Bunch $bunch)
    {
        $bunch->update($request->all());
        return redirect()->route('bunch.index')->withMessage('Bunch UPDATED');
    }


    public function edit(Bunch $bunch, User $user)
    {
        if ($user->can('view', $bunch)) {
        return view('bunch.edit', compact('bunch'));
        }else{
            abort(404);
        }
    }

    public function destroy(Bunch $bunch, User $user)
    {
        if ($user->can('delete', $bunch)) {
            $bunch->delete();
            return redirect()->route('bunch.index')->withMessage('Bunch DELETED');
        }else{
            abort(404);
        }
    }

}
