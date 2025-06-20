<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Frontend\HomeService;
use App\Http\Services\JobPostService;
use App\Traits\ResponseTrait;

class JobController extends Controller
{
    use ResponseTrait;
    public $homeService;
    public $jobService;

    public function __construct()
    {
        $this->homeService = new HomeService();
        $this->jobService = new JobPostService();
    }

    public function job()
    {
        $data['title'] = __('Find Job');
        $data['allJob'] = $this->homeService->getJob(6);
        return view('frontend.jobs.all_job', $data);
    }

    public function jobDetails($slug)
    {
        $data['title'] = __('Job Details');
        $data['jobPostData'] = $this->jobService->getBySlug($slug);;
        return view('frontend.jobs.job_details', $data);
    }

}
