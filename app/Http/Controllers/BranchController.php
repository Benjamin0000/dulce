<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\DB; 
use App\Models\Branch; 
use App\Models\User; 

class BranchController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::latest()->paginate(10); 
        return view('app.branches.index', compact('branches'));  
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create_branch(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'state' => 'required|max:200',
            'city' => 'required|max:200',
            'address' => 'required|max:500',
            'poster' => 'required|mimes:jpeg,png,jpg,gif,webp',
        ]);
        $data = $request->all(); 
        $poster = $request->file('poster'); 

        $upload = upload_poster($poster, 200); 
        if(isset($upload['error'])) return $upload; 

        $data['poster'] = $upload['path']; 
        Branch::create($data); 
        return ['success'=>"Branch created"]; 
    }
    /**
     * Assign manager to a branch. 
     */
    public function assign_manager(Request $request)
    {
        $request->validate([
            'manager' => 'required',
            'branch' => 'required',
        ]);
        $branch_id = $request->input('branch'); 
        $manager_id = $request->input('manager'); 

        $branch = Branch::find($branch_id); 
        if(!$branch)
            return ['error'=>"Branch does not exist"]; 

        $manager = User::where([ ['id', $manager_id], ['role', 2] ])->first();
        if(!$manager)
            return  ['error'=>"Manager does not exist"]; 

        if($current_branch = $manager->branch){
            $branch_name = $current_branch->name; 
            return ['error'=>"The selected manager has already been assigned branch $branch_name"];
        }

        $branch->manager_id = $manager->id; 
        $branch->save(); 
        return ['success'=>"Manager Assigned Successfully"]; 
    }

    public function unassign_manager($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->manager_id = NULL; 
        $branch->save(); 
        return back()->with('success', "Manager Unassigned"); 
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);
        $managers = User::where('role', 2);

        if($ID = $branch->manager_id)
            $managers->where('id', '<>', $ID);
        
        $managers = $managers->latest()->paginate(10); 
        return view('app.branches.show.index', compact('branch', 'managers'));
    }

    /**
     * Update the branch 
     */
    public function update_branch(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'state' => 'required|max:200',
            'city' => 'required|max:200',
            'address' => 'required|max:500',
            'poster' => 'nullable|mimes:jpeg,png,jpg,gif,webp',
        ]);
        $branch = Branch::findOrFail($id); 
        $data = $request->all(); 

        if($request->hasFile('poster'))
        {
            $poster = $request->file('poster'); 
            $upload = upload_poster($poster, 200);

            if(isset($upload['error'])) return $upload;

            if ($branch->poster) {
                if (Storage::disk('public')->exists($branch->poster))
                    Storage::disk('public')->delete($branch->poster);
            }
            $data['poster'] = $upload['path']; 
        }
        $branch->update($data); 
        return ['success'=>"Branch Updated"]; 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function managers()
    {
        $branches = Branch::all();
        $managers = User::where('role', 2)->latest()->paginate(10); 
        return view('app.managers.index', compact('branches', 'managers')); 
    }

    public function create_manager(Request $request)
    {
        $request->validate([
            'name'=>"required|max:250",
            'username'=>"required|max:250",
            'password'=>"required"
        ]);
        $data = $request->all(); 

        $check = User::where('username', $data['username'])->exists(); 
        if($check)
            return ['error'=>"Username already exists"]; 

        $data['role'] = 2; 
        $data['password'] = bcrypt($data['password']); 
        User::create($data);  
        return ['success'=>"Manager Created"]; 
    }
    /**
     * Update the specified resource in storage.
     */
    public function update_manager(Request $request)
    {
        $request->validate([
            'name'=>"required|max:250",
            'username'=>"required|max:250",
            'password'=>"required",
            'id'=>'required'
        ]);
        $id = $request->input('id'); 
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password'); 

        $check = User::where([ 
            ['username', $username], 
            ['id', '<>', $id] 
        ])->exists(); 
        if($check)
            return ['error'=>"Username already exists"]; 

        $user = User::where([ ['id', $id], ['role', 2] ])->first(); 
        $user->name = $name; 
        $user->username = $username; 
        $user->password = $password; 
        $user->save(); 
        return ['success'=>"Manager Updated"]; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_manager(string $id)
    {
        $manager = User::where([ ['id', $id], ['role', 2] ])->first(); 
        if(!$manager) return back()->with('error', 'Manager not found');

        $branch = Branch::where('manager_id', $id)->first();
        if($branch){
            $branch->manager_id = NULL; 
            $branch->save(); 
        }
        $manager->delete(); 
        return back()->with('success', 'Manager Deleted'); 
    }
}
