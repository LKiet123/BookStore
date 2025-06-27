<?php

namespace App\Http\Controllers;

use App\Models\RepoBook;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudRepoController extends Controller
{

 
    /**
     * Registration page
     */
    public function createRepo()
    {
        return view('crud_kho.create');
    }

    /**
     * User submit form register
     */
    public function postRepo(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'warehouse_id' => 'required',
            'quantity' => 'required',
        ]);

        $data = $request->all();
        RepoBook::create([
            'book_id' => $data['book_id'],
            'warehouse_id' => $data['warehouse_id'],
            'quantity' => $data['quantity'],
            
        ]);

        return redirect("listRepo")->with('status','Registration Repo successful');
    }

    /**
     * View repo detail page
     */
    public function readRepo(Request $request) {
        $repo_id = $request->get('id');
        $repo = RepoBook::find($repo_id);

        return view('crud_kho.read', ['messi' => $repo]);
    }

    /**
     * Delete user by id
     */
    public function deleteRepo(Request $request) {
        $repo_id = $request->get('id');
        $repo = RepoBook::destroy($repo_id);

        return redirect("listRepo")->with('status','Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateRepo(Request $request)
    {
        $repo_id = $request->get('id');
        $repo = RepoBook::find($repo_id);

        return view('crud_kho.update', ['repo' => $repo]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateRepo(Request $request)
    {
        $input = $request->all();

        $request->validate([
           'book_id' => 'required',
            'warehouse_id' => 'required',
            'quantity' => 'required',
            
        ]);

       $repo = RepoBook::find($input['id']);
       
       $repo->book_id = $input['book_id'];
       $repo->warehouse_id = $input['warehouse_id'];
       $repo->quantity = $input['quantity'];
      
       $repo->save();

        return redirect("listRepo")->with('status','Update successfully');
    }

    /**
     * List of users
     */
    public function listRepo(Request $request)
    {
            $search = $request->input('search');

            $repos = RepoBook::with('repo')->when($search, function ($query, $search) {
                $query->where('book_id', 'like', "%{$search}%");

            })->paginate(10)->appends(['search' => $search]); // Append search query to pagination links

            return view('crud_kho.list', ['repos' => $repos]);

    }

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
