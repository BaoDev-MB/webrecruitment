<?php

namespace App\Http\Controllers;

use App\Company;
use App\ContactJobType;
use App\Job;
use App\JobType;
use App\Major;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobController extends Controller {
    /**
     * JobController constructor.
     */
    public function __construct() {
        $this->middleware( 'checklogin' )->except( [ 'index', 'show' ] );
        $this->middleware( 'checkiscompany' )->except( [ 'index', 'show' ] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $jobs = Job::paginate(2);

        return view( 'pages.job.browse-jobs', [ 'jobs' => $jobs ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // thêm sửa xóa là của doanh nghiệp
    public function create() {
        $job_types = JobType::all();
        $majors    = Major::all();

        return view( 'pages.job.add-job', [ 'job_types' => $job_types, 'majors' => $majors ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        // kiểm tra đăng nhập
        $request->validate( [
//            'companies'=>'required|unique:companies,name',
            'email'        => 'required|email|max:255',
            'job_title'    => 'required|max:255',
            'job_type'     => 'required',
            'majors'       => 'required|unique:majors,name',
//            'salary'=>'required',
            'location'     => 'required',
            'job_tag'      => 'required',
            'description'  => 'required',
            'requirements' => 'required',
            'benefits'     => 'required',
            'job_url'      => 'required',
            'date_expire'  => 'required|date',
        ], $this->messages() );
        //kieemr tra quyen cuar user là doanhnghiep
        //lấy id company từ user
        $companyid = \session( 'auth' )->company->id;

        $job             = new Job( [
            'email'        => $request->get( 'email' ),
            'job_title'    => $request->get( 'job_title' ),
            'job_types'    => $request->get( 'job_type' ),
            'majors_id'    => $request->get( 'majors' ),
//            'salary'=>$request->get('salary'),
            'location'     => $request->get( 'location' ),
            'job_tag'      => $request->get( 'job_tag' ),
            'description'  => $request->get( 'description' ),
            'requirements' => $request->get( 'requirements' ),
            'benefits'     => $request->get( 'benefits' ),
            'url'          => $request->get( 'job_url' ),
            'date_expire'  => $request->get( 'date_expire' )
        ] );
        $job->company_id = $companyid;
        $job->active     = 1;
        //save job
        $job->save();
        // thêm liên kết vào bảng mới
        $job->jobtypes()->attach( $request->get( 'job_type' ) );

        return redirect( '/companyjobs' )->with( "ok", "Thêm job thành công" );

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $job = Job::find( $id );

        return view( 'pages.job.job-details', [ 'job' => $job ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        $job       = Job::find( $id );
        $job_types = JobType::all();
        $majors    = Major::all();

        return view( 'pages.job.edit-job', [ 'job' => $job, 'job_types' => $job_types, 'majors' => $majors ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        $request->validate( [
            'email'        => 'required|email|max:255',
            'job_title'    => 'required|max:255',
            'job_type'     => 'required',
            'majors'       => 'required|unique:majors,name',
//            'salary'=>'required',
            'location'     => 'required',
            'job_tag'      => 'required',
            'description'  => 'required',
            'requirements' => 'required',
            'benefits'     => 'required',
            'job_url'      => 'required',
            'date_expire'  => 'required|date|date_format:Y-m-d',
        ], $this->messages() );
        $job               = Job::find( $id );
        $job->email        = $request->input( 'email' )??'';
        $job->job_title    = $request->input( 'job_title' )??'';
        $job->majors_id    = $request->input( 'majors' );
        $job->salary       = $request->input( 'salary' )??0;
        $job->location     = $request->input( 'location' )??'';
        $job->job_tag      = $request->input( 'job_tag' );
        $job->description  = $request->input( 'description' );
        $job->requirements = $request->input( 'requirements' );
        $job->benefits     = $request->input( 'benefits' );
        $job->url          = $request->input( 'job_url' );
        $job->date_expire  = $request->input( 'date_expire' );
        $job->update();
//        dd($request->post('job_type'));
        // xoas toan bộ pivot cũ
        $job->jobtypes()->detach();
        // addnew pivot mới
        foreach ( $request->post( 'job_type' ) as $idjobtype ) {
            $job->jobtypes()->attach( $idjobtype );
        }
        return redirect( '/jobs/'.$job->id )->with( "ok", "Chỉnh sửa job thành công" );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        Job::deleted( $id );
    }

    private function messages() {
        return [
            'email.required'        => 'Không được để trống Email',
            'email.email'           => 'Email không đúng định dạng',
            'email.max'             => 'Email không được lớn hơn 255 kí tự',
            'job_title.required'    => 'Không được để trống Job title',
            'job_title.max'         => 'Job title không được lớn hơn 255 kí tự',
            'job_type.required'     => 'Bạn phải chọn Job Type',
            'benefits.required'     => 'Benefits được để trống tên công ty',
            'requirements.required' => 'Requirements được để trống tên công ty',
            'majors.required'       => 'Không được để trống tên ngành',
            'majors.unique'         => 'Tên ngành không tồn tại',
//            'salary.required'=>'Không được để trống Salary',
            'location.required'     => 'Không được để trống Location',
            'job_tag.required'      => 'Không được để trống Job_Tag',
            'description.required'  => 'Không được để trống description',
            'job_url.required'      => 'Không được để trống Url',
            'date_expire.required'  => 'Không được để trống Date',
            'date_expire.date'      => 'Closing Date Không đúng định dạng',
        ];
    }

    public function test() {
//        $job = Job::find(6 );
//        $job->jobtypes()->detach();
    }
}
