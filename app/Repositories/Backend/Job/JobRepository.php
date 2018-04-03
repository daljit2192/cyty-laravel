<?php

namespace App\Repositories\Backend\Job;

use Illuminate\Support\Facades\DB;
use App\Job;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use File;
use Auth;

class JobRepository extends BaseRepository {

    public static function save_job($request) {
        $datetime = Carbon::now();
        $name = explode(".", $request["image"]->getClientOriginalName());
        $imageName = $name[0] . $datetime->toDateTimeString();
        $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
        $request["image"]->move(public_path("user-images/job/"), $imageName . "." . $request["image"]->getClientOriginalExtension());
        $job = new Job();
        $job->fill($request);
        $job->image = $imageName . "." . $request["image"]->getClientOriginalExtension();
        $job->created_by = Auth::user()->id;
        if ($job->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update_job($request) {
        $job = Job::find($request["id"]);
        $job->fill($request);
        if (isset($request["image"])) {
            $datetime = Carbon::now();
            $name = explode(".", $request["image"]->getClientOriginalName());
            $imageName = $name[0] . $datetime->toDateTimeString();
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
            $request["image"]->move(public_path("user-images/job/"), $imageName . "." . $request["image"]->getClientOriginalExtension());
            $job->image = $imageName . "." . $request["image"]->getClientOriginalExtension();
        }
        if ($job->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_all_jobs() {
        $jobs = Job::all();
        if (count($jobs) > 0 && isset($jobs) && !empty($jobs)) {
            return $jobs->toArray();
        } else {
            return array();
        }
    }

    public static function get_job($id) {
        $job = Job::find($id);
        if (count($job->toArray()) > 0 && isset($job) && !empty($job)) {
            return $job->toArray();
        } else {
            return array();
        }
    }

    public static function delete_job($id) {
        Job::where("id", $id)->delete();
    }

}
