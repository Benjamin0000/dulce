<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage; 
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

    public static function upload_poster($file)
    {
        $fileSize = $file->getSize(); // size in bytes
        $fileSizeInKB = $fileSize / 1024;
        $maxSizeInKB = 200;

        if ($fileSizeInKB > $maxSizeInKB) 
            return ['error' => 'The image must not exceed 200KB in size.'];

        $path = $file->storePublicly('images', 'public');
        return ['path'=>$path];
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

        $upload = self::upload_poster($poster); 
        if(isset($upload['error'])) return $upload; 

        $data['poster'] = $upload['path']; 
        Branch::create($data); 
        return ['success'=>"Branch created"]; 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id); 
        return view('app.branches.show.index', compact('branch')); 
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
            $upload = self::upload_poster($poster);

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

    public function add_manager(Request $request)
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
    public function destroy(string $id)
    {
        //
    }
}
