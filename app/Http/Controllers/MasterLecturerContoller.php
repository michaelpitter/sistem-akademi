<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class MasterLecturerContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = collect(request()->all());
        if($request){
            $q = $request
                // ->filter(fn($e) => $e == "asc" || $e == NULL)
                ->filter(fn($e) => $e == NULL)
                ->each(fn($e,$key)=>$request->pull($key));
            if($q->isNotEmpty()){
                $q = $request->map(fn($i,$k) => $k."=".$i)->join('&');
                return redirect('/dashboard/master/lecturers?'.$q);
            }
        }
        $breadcrumb = collect([
            "/dashboard" => "Dashboard",
            "title" => "Lecturer"
        ]);

        $title = $breadcrumb->last();
        return view('dashboard.master.lecturer.index',
            [
                'breadcrumb' => $breadcrumb,
                'title' => $title,
                'lecturers' => Lecturer::filter(request(['search','orderBy']))->paginate(10)->withQueryString(),
            ]
        );
    }

    public function search(Request $request){
        $search = $request->search;
        dd($search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
