<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return to view
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return to view form add job
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
            'companies'=>'require|unique:companies,name',
            'email'=>'required|email|max:255',
            'job_title'=>'required|max:255',
            'job_type'=>'required',
            'majors'=>'require|unique:majors,name',
            'salary'=>'required',
            'location'=>'required',
            'job_tag'=>'required',
            'description'=>'required',
            'url'=>'required',
            'date_expire'=>'required|date',
        ],$this->messages());
        $job = new Job();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'companies.require'=>'Không được để trống tên công ty ',
            'companies.unique'=>'Tên công ty không tồn tại',
            'email.require'=>'Không được để trống Email',
            'email.email'=>'Email không đúng định dạng',
            'email.max'=>'Email không được lớn hơn 255 kí tự',
            'job_title.require'=>'Không được để trống Job title',
            'job_title.max'=>'Job title không được lớn hơn 255 kí tự',
            'job_type.require'=>'Bạn phải chọn Job title',
            'majors.require'=>'Không được để trống tên công ty',
            'majors.unique'=>'Tên công ty không tồn tại',
            'salary.require'=>'Không được để trống Salary',
            'location.require'=>'Không được để trống Location',
            'job_tag.require'=>'Không được để trống Job_Tag',
            'description.require'=>'Không được để trống description',
            'url.require'=>'Không được để trống',
            'date_expire.require'=>'Không được để trống',
            'date_expire.date'=>'không đúng định dạng',
        ];
    }
}
