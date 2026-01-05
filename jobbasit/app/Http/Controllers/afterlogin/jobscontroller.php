<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\company;
use App\models\vacancy;
use Auth;

class jobscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $vacancies = vacancy::orderBy('id', 'desc')->paginate(7);
        return view('afterlogin.jobs.jobs', compact('vacancies'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('afterlogin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    \Log::info('Job store method called', ['request' => $request->all()]);
    
    $validated = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_type' => 'required|string|in:Full-time,Part-time,Contract,Internship,Remote',
        'experience' => 'required|string|in:Entry Level,Mid Level,Senior Level,Lead,Director',
        'description' => 'required|string|min:50|max:5000',
        'requirements' => 'required|string|min:20|max:2000',
        'salary_min' => 'nullable|numeric',
        'salary_max' => 'nullable|numeric',
        'salary_currency' => 'nullable|string|size:3',
        'location' => 'required|string|max:255',
        'work_setup' => 'required|string|in:On-site,Remote,Hybrid',
        'application_deadline' => 'nullable|date|after_or_equal:today',
        'vacancies' => 'required|integer|min:1|max:1000',
        'benefits' => 'nullable|string|max:2000',
        'instructions' => 'nullable|string|max:2000'
        ]);

        \Log::info('Validation passed', $validated);

        // Create salary range
        $salaryRange = null;
        if ($request->filled(['salary_min', 'salary_max', 'salary_currency'])) {
            $salaryRange = $request->salary_min . '-' . $request->salary_max . ' ' . $request->salary_currency;
        }

        try {
            $vacancy = new Vacancy();
            $vacancy->user_id = Auth::id();
            $vacancy->company_id = Auth::user()->company->id;
            $vacancy->job_title = $validated['job_title'];
            $vacancy->job_type = $validated['job_type'];
            $vacancy->experience = $validated['experience'];
            $vacancy->job_description = $validated['description'];
            $vacancy->requirements = $validated['requirements'];
            $vacancy->salary_range = $salaryRange;
            $vacancy->location = $validated['location'];
            $vacancy->work_setup = $validated['work_setup'];
            $vacancy->application_deadline = $validated['application_deadline'];
            $vacancy->vacancies = $validated['vacancies'];
            $vacancy->benefits = $validated['benefits'] ?? null;
            $vacancy->instructions = $validated['instructions'] ?? null;
            
            \Log::info('Attempting to save vacancy', $vacancy->toArray());
            
            if ($vacancy->save()) {
                \Log::info('Vacancy saved successfully', ['id' => $vacancy->id]);
                
                // Option 1: Using with()
                return redirect()->route('jobs.index')->with([
                    'success' => 'Job Published Successfully',
                    'alert-type' => 'success'
                ]);
                
                // OR Option 2: Using session()->flash()
                // session()->flash('success', 'Job Published Successfully');
                // return redirect()->route('jobs.index');
            }
            
            \Log::error('Vacancy save failed');
            return back()->with('error', 'Failed to save job. Please try again.');
            
        } catch (\Exception $e) {
            \Log::error('Exception in job store: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
}
    public function create_company(Request $request){
         $validate = $request->validate([
        'name' => 'required|string|max:255',
        'company_tagline' => 'required|string|max:255',
        'description' => 'required|string',
        'industry' => 'required|string|max:255',
        'size' => 'required|string|max:50',
        'website' => 'required|url|max:255',
        'location' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'contact' => 'required|string|max:20',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'name.required' => 'Company name is required',
        'company_tagline.required' => 'Company tagline is required',
        'description.required' => 'Company description is required',
        'logo.image' => 'The logo must be an image file',
        'logo.max' => 'The logo must not exceed 2MB',
    ]);
    // checking image is coming or not
    if($request->hasFile('logo')){
        $imagename = time().".".$request->logo->getClientOriginalExtension();
        $request->logo->storeAs('companies', $imagename, 'public');
    }
    // laravel quirey builder//
        $company = new company;
        $company->user_id = Auth::id();
        $company->name = $request->name;
        $company->company_tagline = $request->company_tagline;
        $company->description = $request->description;
        $company->industry = $request->industry;
        $company->size = $request->size;
        $company->website = $request->website;
        $company->location = $request->location;
        $company->email = $request->email;
        $company->contact = $request->contact;
        $company->logo = "companies/".$imagename;
        $company->save();
        return redirect()->back()->with('success','created company successfully');

        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $vacancy = Vacancy::find($id); // Capital 'V'
    
    if (!$vacancy) {
        return redirect()->back()->with('error', 'Job not found');
    }
    
    $vacancy->delete();
    return redirect()->back()->with('success', 'Job deleted successfully');
}
}
