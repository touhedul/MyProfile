<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AchievementDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\AchievementCreateRequest;
use App\Http\Requests\AchievementUpdateRequest;
use App\Models\Achievement;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\AchAchievementTextUpdate;
use App\Models\AdditionalInfo;

class AchievementController extends AppBaseController
{

    private $icon = 'pe-7s-medal';


    public function index(AchievementDataTable $achievementDataTable)
    {
        $this->authorize('Achievement-view');
        $icon = $this->icon;
        $achievementInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','achievement_text')->orWhere('key','achievement_description');
        })->get();
        return $achievementDataTable->render('admin.achievements.index',compact('icon','achievementInfo'));
    }


    public function create()
    {
        $this->authorize('Achievement-create');
        return view('admin.achievements.create')->with('icon', $this->icon);
    }


    public function store(AchievementCreateRequest $request)
    {
        $this->authorize('Achievement-create');

        $status = $request->status ?? 0;
        $imageName = FileHelper::uploadImage($request,null,[],500,600);
        Achievement::create(array_merge($request->all(),['status'=>$status,'image' => $imageName,'user_id'=>auth()->id()]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.achievements.index'));
    }


    public function show(Achievement $achievement)
    {
        $this->authorize('Achievement-view');
        checkUserAndAuthId($achievement);
        return view('admin.achievements.show',compact('achievement'))->with('icon', $this->icon);
    }


    public function edit(Achievement $achievement)
    {
        $this->authorize('Achievement-update');
        checkUserAndAuthId($achievement);
        return view('admin.achievements.edit',compact('achievement'))->with('icon', $this->icon);
    }


    public function update(Achievement $achievement, AchievementUpdateRequest $request)
    {
        $this->authorize('Achievement-update');
        checkUserAndAuthId($achievement);
        $imageName = FileHelper::uploadImage($request, $achievement,[],500,600);
        $status = $request->status ?? 0;
        $achievement->fill(array_merge($request->all(), ['image' => $imageName,'status'=>$status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.achievements.index'));
    }


    public function destroy(Achievement $achievement)
    {
        $this->authorize('Achievement-delete');
        checkUserAndAuthId($achievement);
        FileHelper::deleteImage($achievement);
        $achievement->delete();
    }

    public function saveText(AchAchievementTextUpdate $request)
    {
        $this->authorize('Achievement-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','achievement_text')->update(['value' => $request->achievement_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','achievement_description')->update(['value' => $request->achievement_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.achievements.index'));
    }
}
