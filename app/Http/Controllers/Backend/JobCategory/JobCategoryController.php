<?php

namespace App\Http\Controllers\Backend\JobCategory;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\JobCategory\JobCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

/**
 * Class JobCategoryController.
 */
class JobCategoryController extends Controller {

    public function __construct() {
        
    }

    public function checkUser() {

        if (!Auth::check() || Auth::user()->role_id != 3) {
            return false;
        } else {
            return true;
        }
    }

    public function add_job_category() {
        if ($this->checkUser()) {
            return view('backend.jobcategory.add_job_category');
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_all_job_categories() {
        if ($this->checkUser()) {
            $job_categories = JobCategoryRepository::get_all_job_categories();
            return view("backend.jobcategory.show_all_job_categories", ['job_categories' => $job_categories]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_job_category($id) {
        if ($this->checkUser()) {
            $job_category = JobCategoryRepository::get_job_category($id);
            return view("backend.jobcategory.edit_job_category", ['job_category' => $job_category]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function save_job_category(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.jobcategory.add_job_category", ['errors' => $errors]);
        } else {
            $jobcategorySave = JobCategoryRepository::save_job_catgeory($request->all());
            if ($jobcategorySave) {
                return redirect('/admin/jobcategories');
            } else {
                return view("backend.jobcategory.add_job_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

    public function delete_job_category($id) {
        if ($id !== "") {
            $deleteJobCategory = JobCategoryRepository::delete_job_category($id);
            if ($deleteJobCategory) {
                return redirect('/admin/jobcategories');
            }
        }
    }

    public function update_job_category(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.jobcategory.edit_job_category", ['errors' => $errors]);
        } else {
            $jobCategoryUpdate = JobCategoryRepository::update_job_catgeory($request->all());
            if ($jobCategoryUpdate) {
                return redirect('/admin/jobcategories');
            } else {
                return view("backend.category.edit_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

}
