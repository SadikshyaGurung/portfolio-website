<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        // $users = Portfolio::latest()->paginate(2);
        $users = Portfolio::latest()->get();
        // dd($users);
        return view('home', compact('users'));
    }

    public function add()
    {
        return view('add');
    }
    public function store(PortfolioUpdateRequest $request)
    {
        // dd($request);
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            // $filename = time() . '.' . $request->file('photo')->extension();
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = 'storage/' . $path;
        }

        Portfolio::create($validated);
        return redirect('/');

    }

    public function update(PortfolioUpdateRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = 'storage/' . $path;
        }
        Portfolio::where('id', $request['id'])->update($validated);
        return redirect('/');
    }

    public function updateView($id)
    {
        // dd($id);
        $user = Portfolio::where('id', $id)->get();
        return view('update', ['user' => $user[0]]);
    }

    public function destroy($id)
    {
        Portfolio::where('id', $id)->delete();

        return back();
    }
}
