<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index',['companies' => Company::withCount('employees')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'website' => $request->website,
        ]);

        if($request->hasFile('logo')){
            Storage::delete('/public/logos/'.$company->logo);
            $company->logo = $this->savePhoto($request->file('logo'));
            $company->save(); 
        }

        session()->flash('mss', 'added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show',['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',['company' => $company]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'website' => $request->website,
        ]);

        if($request->hasFile('logo')){
            Storage::delete('/public/logos/'.$company->logo);
            $company->logo = $this->savePhoto($request->file('logo'));
            $company->save(); 
        }
        session()->flash('mss', 'Edit successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::delete('/public/logos/'.$company->logo);
        $company->delete();
        session()->flash('delete', 'deleted successfully');
        return back();
    }


    public function savePhoto($file)
    {
        $logoWithExt = $file->getClientOriginalName();
        $logoName = pathinfo($logoWithExt, PATHINFO_FILENAME);
        $logoExtension = $file->getClientOriginalExtension();

        $logoNameToStore = $logoName.'_'.time().'.'.$logoExtension;

        $file->storeAs('public/logos',$logoNameToStore);

        return $logoNameToStore;
    }
}
