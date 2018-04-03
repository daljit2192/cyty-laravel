<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Job\JobRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class JobController.
 */
class JobController extends Controller {

    public function add_job() {
        return view('backend.job.add_job');
    }

    public function get_all_jobs() {
        $jobs = JobRepository::get_all_jobs();
        return view("backend.job.show_all_jobs", ['jobs' => $jobs]);
    }

    public function get_job($id) {
        $job = JobRepository::get_job($id);
        return view("backend.job.edit_job", ['job' => $job]);
    }

    public function save_job(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.job.add_job", ['errors' => $errors]);
        } else {
            $jobSave = JobRepository::save_job($request->all());
            if ($jobSave) {
                return view("backend.job.add_job", ['class' => "success", 'message' => "Category saved successfully"]);
            } else {
                return view("backend.job.add_job", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

    public function delete_job($id) {
        if($id!==""){
            JobRepository::delete_job($id);
        }
    }

    public function update_job(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.job.edit_job", ['errors' => $errors]);
        } else {
            $jobUpdate = JobRepository::update_job($request->all());
            if ($jobUpdate) {
                return redirect('/admin/jobs');
            } else {
                return view("backend.job.edit_job", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

}
