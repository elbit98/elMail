<?php

namespace App\Http\Controllers;
use App\models\Bunch;
use App\models\Campaign;
use App\Http\Requests\CampaignRequest;
use App\Mail\MailClass;
use App\Observers\CampaignObserver;
use App\models\Template;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CampaignController extends Controller
{

    public function index()
    {
        $data['campaigns'] = Campaign::owned()->available()->get();
        return view('campaign.index', $data);
    }

    public function create()
    {
        $templates = Template::owned()->get();

        $templatesList = array();
        foreach($templates as $key => $template){
            $templatesList[$template->id] = $template->name;
        }

        $data['templates'] = $templatesList;

        $bunches = Bunch::owned()->get();

        $bunchesList = array();
        foreach($bunches as $key => $bunch){
            $bunchesList[$bunch->id] = $bunch->name;
        }

        $data['bunches'] = $bunchesList;

        return view('campaign.create', $data);
    }

    public function store(Campaign $campaign, CampaignRequest $request)
    {
        if (!empty($request->name)&&!empty($request->description)) {
            $campaign->name = $request->name;
            $campaign->description = $request->description;
            $campaign->template_id = $request->template_id;
            $campaign->bunch_id = $request->bunch_id;
        }else{
            return redirect()->route('campaigns.create');
        }

        $campaign->save();

        return redirect()->route('campaigns.index');
    }

    public function show(Campaign $campaign, User $user)
    {
        if ($user->can('view', $campaign)) {
            $user_email = Auth::user()->email;
            return view('campaign.show', compact('campaign'))->with('user_email', $user_email);
        }else{
            abort(404);
        }
    }

    public function edit(Campaign $campaign, User $user)
    {
        if ($user->can('view', $campaign)) {

            $templates = Template::owned()->get();

            $templatesList = array();
            foreach($templates as $key => $template){
                $templatesList[$template->id] = $template->name;
            }

            $data['templates'] = $templatesList;

            $bunches = Bunch::owned()->get();

            $bunchesList = array();
            foreach($bunches as $key => $bunch){
                $bunchesList[$bunch->id] = $bunch->name;
            }

            $data['bunches'] = $bunchesList;

            return view('campaign.edit', compact('campaign'), $data);
        }else{
            abort(404);
        }
    }

    public function update(CampaignRequest $request, Campaign $campaign)
    {
        if (!empty($request->name)&&!empty($request->description)) {
            $campaign->name = $request->name;
            $campaign->description = $request->description;
            $campaign->template_id = $request->template_id;
            $campaign->bunch_id = $request->bunch_id;
        }else{
            return redirect()->route('campaigns.create');
        }
        $campaign->save();

        return redirect()->route('campaigns.index');
    }

    public function destroy(Campaign $campaign, User $user)
    {
        if ($user->can('delete', $campaign)) {
            $campaign->delete();
            return redirect()->route('campaigns.index');
        }else{
            abort(404);
        }
    }

    public function preview(Campaign $campaign, User $user)
    {
        if ($user->can('view', $campaign)) {
            $user_email = Auth::user()->email;
            return view('campaign.preview', compact('campaign'))->with('user_email', $user_email);
        }else{
            abort(404);
        }
    }

    public function send(Campaign $campaign){
        foreach ($campaign->bunch->subscribers as $key => $subscriber){
            Mail::to($subscriber->email)->send(new MailClass($campaign->name, $subscriber->name, $subscriber->email, $campaign->template->content));
        }
        return redirect()->route('campaigns.index')->withMessage('Campaign SEND');
    }
}
