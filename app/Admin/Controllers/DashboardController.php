<?php

namespace App\Admin\Controllers;

use App\Models\Update\UpdateModel;

class DashboardController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function general()
    {
        $version=UpdateModel::checkUpdate();

        $status = [
            ['name' => 'NOJ Version',       'value' => version()],
            ['name' => 'Lastest Version',       'value' => is_null($version)?'Failed to fetch latest version':$version["name"]],
            ['name' => 'Problems',          'value' => \App\Models\Eloquent\ProblemModel::count()],
            ['name' => 'Solutions',         'value' => \App\Models\Eloquent\ProblemSolutionModel::count()],
            ['name' => 'Submissions',       'value' => \App\Models\Eloquent\SubmissionModel::count()],
            ['name' => 'Contests',          'value' => \App\Models\Eloquent\ContestModel::count()],
            ['name' => 'Users',             'value' => \App\Models\Eloquent\UserModel::count()],
            ['name' => 'Groups',            'value' => \App\Models\Eloquent\GroupModel::count()],
        ];

        return view('admin::dashboard.general', [
            'status'=>$status,
            'version'=>$version
        ]);
    }
}
