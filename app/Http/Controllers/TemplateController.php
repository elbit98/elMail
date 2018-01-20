<?php
namespace App\Http\Controllers;
use App\Http\Requests\TemplateRequest;
use App\models\Template;
use App\models\User;
use App\Observers\TemplateObserver;

class TemplateController extends Controller
{
    public function index()
    {
        $data['templates'] = Template::owned()->get();
        return view('template.index', $data);
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(Template $template, TemplateRequest $request)
    {
        if (!empty($request->name)&&!empty($request->content)) {
            $template->name = $request->name;
            $template->content = $request->content;
        }else{
            return redirect()->route('templates.create');
        }

        $template->save();

        return redirect()->route('templates.index')->withMessage('Template has been added');
    }

    public function show(Template $template, User $user)
    {
        if ($user->can('view', $template)) {
            return view('template.show', compact('template'));
        }else{
            abort(404);
        }
    }

    public function edit(Template $template, User $user)
    {
        if ($user->can('view', $template)) {
            return view('template.edit', compact('template'));
        }else{
            abort(404);
        }
    }

    public function update(TemplateRequest $request, Template $template)
    {
        if (!empty($request->name)&&!empty($request->content)) {
            $template->name = $request->name;
            $template->content = $request->content;
        }else{
            return redirect()->route('templates.create');
        }
        $template->save();

        return redirect()->route('templates.index')->withMessage('Template has been updated');
    }

    public function destroy(Template $template, User $user)
    {
        if ($user->can('delete', $template)) {
            $template->delete();
            return redirect()->route('templates.index')->withMessage('Template has been deleted');
        }else{
            abort(404);
        }
    }

    public static function boot()
    {
        parent::boot();
        parent::observe(new TemplateObserver());
    }
}