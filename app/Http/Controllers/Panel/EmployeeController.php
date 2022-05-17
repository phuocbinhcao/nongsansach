<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'Nhân viên' ) {
            $employees = Employee::all();
            return response()->view('panel.employee.index', ['employees' => $employees]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin đăng nhập không đúng.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('panel.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|string', //set validate for input of form
                'phone' => 'required|max:15|unique:employees,employee_phone',
                'address' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'identity' => 'required|string|unique:employees,employee_identity',
                'rolename' => 'required|string',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [ // Errors message
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài hơn :max',
                'confirmed' => ':attribute không đúng',
                'email' => ' :attribute không hợp lệ',
                'unique' => ':attribute đã tồn tại',
            ]
        );

        // Throw error when your enter is incorrect the fields
        if ($validate->fails()) {
            return redirect()->route('employees.create')->withErrors($validate);

        }

        // Upload file image, set extension
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/users', $filename);
        }

        User::create([ // add values to attribute of object user
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make(123456789), //password default: 123456789
            'avatar' => $filename,
            'address' => $request->address,
            'rolename' => $request->rolename,

        ]);

        // Get id of user account and then add to column user_id of table Employee
        $user_id = User::where('email', $request->email)->select('id')->first();

        $employee = new Employee;
        $employee->employee_name = $request->name;
        $employee->employee_phone = $request->phone;
        $employee->employee_identity = $request->identity;
        $employee->employee_address = $request->address;
        $employee->user_id = (int) $user_id->id;
        $employee->active = 1; //this coloum to hide/show information of this  employee when active = 0/1
        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Đã thêm nhân viên thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        // Get value of two table: employees and users by get user_id from employees table
        $user = User::where('id', '=', $employee->user_id)->first();
        return response()->view('panel.employee.show',
            [
                'employee' => $employee,
                'user' => $user,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find((int) $id);

        // Get value of employee you chosen by Id
        $userId = (int) $employee->user_id;
        $user = User::find($userId);
        return response()->view('panel.employee.edit',
            [
                'employee' => $employee,
                'users' => $user,
            ]);
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
        Employee::find((int) $id)->update([
            'employee_name' => $request->name,
            'employee_phone' => $request->phone,
            'employee_address' => $request->address,
            'employee_identity' => $request->identity,
        ]);

        $userId = (int) (Employee::find((int) $id)->user_id);
        $user = User::find($userId);
        if (!$request->has('avatar')) {
            // If the input avatar does not have value of image
            // And you dont want to change avatar, assign value for this input from users data table
            $filename = $user->avatar;
        } else {
            $file = $request->avatar;

            // If you want to change this avatar, choose file in here.
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/users', $filename);
        }
        User::find($userId)->update([
            'avatar' => $filename,
        ]);

        return redirect()->route('employees.index')->with('success', 'Đã sửa thông tin nhân viên thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        // Set column active = 0, to hide information of employee you want to delete,
        // avoid   foreign key error
        $employee->update(['active' => 0]);
        return redirect()->back()->with('success', 'Đã xóa nhân viên thành công!');
    }
}
