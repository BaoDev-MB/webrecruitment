<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileCompanyController extends Controller
{
    /**
     * ProfileCompanyController constructor.
     */
    public function __construct() {
        $this->middleware( 'checklogin' );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //lấy id company từ user
        $company = Session( 'auth' );
        $company = Company::find($company->company->id);

        return view( 'pages.profile-company', [ 'company' => $company ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'pass_new'     => 'min:8|required',
            'pass_confirm' => 'min:8|same:pass_new'
        ], $this->messages() );
        $users = Session::get( 'auth' );
        $users = User::find( $users->id );

        if (Hash::check($request->get('pass'), $users->password)) {
            $users->password = Hash::make( $request->input( 'pass_new' ) );
            $users->update();
            $users->save();
            return redirect( '/profile' )->with( "ok", "Thay đổi password thành công" );

        }else
            return redirect( '/' )->with( "ok", "Mật khẩu không đúng" );
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
//        $request->validate( [
//            'phone' => 'required|max:10',
//            'name'  => 'required',
//        ], $this->messages() );
        $company             = Company::find( $id );
        $company->name = $request->input( 'name' );
        $company->location      = $request->input( 'location' );
        $company->url= $request->input('url');
        $company->description= $request->input('notes');

        $company->update();
        $company->save();

        return redirect( '/profileCompany' )->with( "ok", "Chỉnh sửa profile thành công" );
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
    private function messages() {
        return [
//            'phone.required'        => 'Số điện thoại phải 10 số',
//            'name.required'         => 'Username không hợp lệ',
//            'pass_new.required'     => 'Password chứa ít nhất 8 ký tự',
//            'pass_confirm.required' => 'Password không trùng khớp'
        ];
    }
}
