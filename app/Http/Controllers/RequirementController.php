<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequirementController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $requirements = Requirement::with(['book', 'user'])
                ->get();
        }
        if (Auth::user()->isPartner()) {
            $requirements = Requirement::with(['book', 'user'])
                ->where('requirements.user_id', '=', Auth::user()->id)
                ->get();
        }
        return view('requirements.index', ['requirements' => $requirements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Requirement $requirement
     * @return void
     */
    public function update(Request $request, Requirement $requirement)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Requirement $requirement
     * @return void
     */
    public function destroy(Requirement $requirement)
    {
        //
    }
}
