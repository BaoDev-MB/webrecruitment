<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use App\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.job.add-job');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_types= JobType::all();
        $companies= Company::all();
        return view('pages.job.add-job',['job_types'=>$job_types,'company'=>$companies]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
//            'companies'=>'required|unique:companies,name',
            'email'=>'required|email|max:255',
            'job_title'=>'required|max:255',
            'job_type'=>'required',
            'majors'=>'required|unique:majors,name',
//            'salary'=>'required',
            'location'=>'required',
            'job_tag'=>'required',
            'description'=>'required',
            'job_url'=>'required',
            'date_expire'=>'required|date',
        ],$this->messages());
        $job = new Job([
            'email'=>$request->get('email'),
            'job_title'=>$request->get('job_title'),
            'job_types'=>$request->get('job_type'),
            'majors'=>$request->get('majors'),
//            'salary'=>$request->get('salary'),

            'location'=>$request->get('location'),
            'job_tag'=>$request->get('job_tag'),
            'description'=>$request->get('description'),
            'url'=>$request->get('job_url'),
            'date_expire'=>$request->get('date_expire')
        ]);
        $job->save();
        return redirect('/jobs')->withErrors("ok","Thêm job thành công");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function messages()
    {
        return [
//            'companies.required'=>'Không được để trống tên công ty ',
//            'companies.unique'=>'Tên công ty không tồn tại',
            'email.required'=>'Không được để trống Email',
            'email.email'=>'Email không đúng định dạng',
            'email.max'=>'Email không được lớn hơn 255 kí tự',
            'job_title.required'=>'Không được để trống Job title',
            'job_title.max'=>'Job title không được lớn hơn 255 kí tự',
            'job_type.required'=>'Bạn phải chọn Job title',
            'majors.required'=>'Không được để trống tên công ty',
            'majors.unique'=>'Tên công ty không tồn tại',
//            'salary.required'=>'Không được để trống Salary',
            'location.required'=>'Không được để trống Location',
            'job_tag.required'=>'Không được để trống Job_Tag',
            'description.required'=>'Không được để trống description',
            'job_url.required'=>'Không được để trống Url',
            'date_expire.required'=>'Không được để trống Date',
            'date_expire.date'=>'Không đúng định dạng',
        ];
    }
}
