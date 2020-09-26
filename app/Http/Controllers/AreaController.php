<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $areas = Area::all();
//        $areas = Area::all()->paginate(10);
//        $areas = DB::table('areas')->paginate(10);

        return view("areas.index", compact("areas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $area = new Area;
        $title = __('areas.title.new_area');
        $textButton = __('areas.title.create');
        $route = route("areas.store");

        return view("areas.create", compact("title", "textButton", "route", "area"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required' , 'max:255'],
            'description' => ['nullable', 'string', 'min:2']
        ]);

        Area::create($request->only("name", "description"));

        return redirect(route("areas.index"))->with("success", __("areas.title.created_succesfully"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Area $area)
    {
        $title = __('areas.title.edit_area');
        $textButton = __('areas.title.save');
        $route = route("areas.update", ['area' => $area]);
        $update = true;

        return view("areas.edit", compact("title", "textButton", "route", "area", "update"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Area                $area
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Area $area)
    {
        $this->validate($request, [
            'name' => ['required' , 'max:255'],
            'description' => ['nullable', 'string', 'min:2']
        ]);

        $area->fill($request->only("name", "description"))->save();

        return back()->with("success", __("areas.title.updated_succesfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Area $area
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return back()->with("success", __("areas.title.deleted_succesfully"));
    }
}
