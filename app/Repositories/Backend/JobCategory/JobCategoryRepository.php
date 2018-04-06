<?php

namespace App\Repositories\Backend\JobCategory;

use Illuminate\Support\Facades\DB;
use App\JobCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use File;
use Auth;

class JobCategoryRepository extends BaseRepository {

    public static function save_job_catgeory($request) {
        $job_category = new JobCategory();
        $job_category->fill($request);
        $job_category->created_by = Auth::user()->id;
        if ($job_category->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update_job_catgeory($request) {
        $job_category = JobCategory::find($request["id"]);
        $job_category->fill($request);
        if ($job_category->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_all_job_categories() {
        $job_category = JobCategory::all();
        if (count($job_category) > 0 && isset($job_category) && !empty($job_category)) {
            return $job_category->toArray();
        } else {
            return array();
        }
    }

    public static function get_job_category($id) {
        $job_category = JobCategory::find($id);
        if (count($job_category->toArray()) > 0 && isset($job_category) && !empty($job_category)) {
            return $job_category->toArray();
        } else {
            return array();
        }
    }

    public static function delete_job_category($id) {
        $jobdeleteCategory = JobCategory::where("id", $id)->delete();
        if($jobdeleteCategory){
            return true;
        } else {
            return false;
        }
    }

}
