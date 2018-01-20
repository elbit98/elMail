<?php

namespace App\Http\Controllers;
use App\models\Bunch;
use App\models\Subscriber;
use App\Http\Requests\SubscriberRequest;
use App\Observers\SubscriberObserver;
use App\models\User;
use Illuminate\Support\Facades\Auth;


class SubscriberController extends Controller
{
    public function index($bunch_id, User $user, Subscriber $subscriber)
    {
        $bunchs = Bunch::all()->where('id', $bunch_id);

        if(sizeof($bunchs)){
            foreach ($bunchs as $bunch){
                if (Auth::user()->id === $bunch->created_by) {
                    $data['subscribers'] = Subscriber::owned()->where('bunch_id', $bunch_id)->get();
                    $data['bunches'] = $bunchs;
                    return view('subscriber.index', $data)->with('bunch_id', $bunch_id);
                }else{
                    abort(404);
                }
            }
        }else{
            abort(404);
        }
    }

    public function create($id)
    {
        return view('subscriber.create')->with('id', $id);
    }



    public function store($bunch_id, Subscriber $subscriber, SubscriberRequest $request)
    {
        if (!empty($request->name)&&!empty($request->email)) {
            $subscriber->name = $request->name;
            $subscriber->surname = $request->surname;
            $subscriber->email = $request->email;
            $subscriber->bunch_id = $bunch_id;
        }else{
            return redirect()->route('bunch::subscriber.create');
        }
        $subscriber->save();
        return redirect()->route('bunch::subscriber.index', $bunch_id)->withMessage('Subscriber ADD');
    }

    public function show($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('view', $subscriber)) {
            return view('subscriber.show', compact('subscriber'))->with('bunch_id', $bunch_id);
        }else{
            abort(404);
        }
    }

    public function edit($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('view', $subscriber)) {
            return view('subscriber.edit', compact('subscriber'))->with('bunch_id', $bunch_id);
        }else{
            abort(404);
        }
    }

    public function update($bunch_id, SubscriberRequest $request, Subscriber $subscriber)
    {
        if (!empty($request->name)&&!empty($request->surname)&&!empty($request->email)) {
            $subscriber->name = $request->name;
            $subscriber->surname = $request->surname;
            $subscriber->email = $request->email;
        }else{
            return redirect()->route('bunch::subscriber.create', $bunch_id);
        }
        $subscriber->save();

        return redirect()->route('bunch::subscriber.index', $bunch_id)->withMessage('Subscriber UPDATED');
    }



    public function destroy($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('delete', $subscriber)) {
            $subscriber->delete();
            return redirect()->route('bunch::subscriber.index', $bunch_id)->withMessage('Subscriber DELETED');
        }else{
            abort(404);
        }
    }

    public static function boot()
    {
        parent::boot();
        parent::observe(new SubscriberObserver());
    }


}