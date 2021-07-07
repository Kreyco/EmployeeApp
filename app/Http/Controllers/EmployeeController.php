<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Area;
use App\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $areas = Area::all();
        $roles = Role::all();
        $genders = ['M' => trans('employees.label.male'), 'F' => trans('employees.label.female')];

        return view('employees.create', compact('areas', 'roles', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /** @var $employee Employee **/
        $validatedData = $request->validate([
            'name' => ['required' , 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'gender' => ['required'],
            'area_id' => ['required'],
            'notes' => ['required']
        ]);

        if ($validatedData)
        {
            $employee = Employee::create($request->all());

            if ($request->roles)
            {
                $employee->roles()->sync($request->roles);
            }
        }

        $request->session()->flash('status', trans('employees.title.created_successfully'));

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        $areas = Area::all();
        $roles = Role::all();
        $genders = ['M' => trans('employees.label.male'), 'F' => trans('employees.label.female')];
        $rolesEmployee = $employee->roles->toArray();
        $rolesEmployee = $employee->roles()->pluck('roles.id')->toArray();

        return view('employees.edit', compact('employee', 'areas', 'roles', 'genders', 'rolesEmployee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        /** @var $employee Employee **/
        $validatedData = $request->validate([
            'name' => ['required' , 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'gender' => ['required'],
            'area_id' => ['required'],
            'notes' => ['required']
        ]);

        if ($validatedData)
        {
            $employee = Employee::find($employee->id);

            if (is_null($employee))
            {
                $request->session()->flash('status', trans('employees.title.does_not_exist'));

                return redirect()->route('employees.index');
            }

            $employee->update($request->all());

            if ($request->roles)
            {
                $employee->roles()->sync($request->roles);
            }
        }

        $request->session()->flash('status', trans('employees.title.edited_successfully'));

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Employee $employee)
    {
        if (is_null($employee)){
            $request->session()->flash('status', trans('employees.title.does_not_exist'));

            return redirect()->route('employees.index');
        }

        $employee->delete();

        $request->session()->flash('status', trans('employees.title.deleted_successfully'));

        return redirect()->route('employees.index');
    }
}
