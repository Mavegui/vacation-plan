<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VacationPlan;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with the user's vacation plans.
     *
     * This method retrieves all vacation plans associated with the currently authenticated user
     * and returns them to the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $plans = VacationPlan::where('user_id', Auth::id())->get(); // Filter vacation plans by the authenticated user
        
        return view('admin.dashboard', compact('plans')); // Passes the vacation plans to the view
    }

    /**
     * Show the form for updating the authenticated user's information.
     *
     * This method retrieves the currently authenticated user
     * and returns the view for updating user details.
     *
     * @return \Illuminate\View\View
     */
    public function updateUser() {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('admin.updateUser', compact('user')); // Pass user data to the view
    }

    /**
     * Update the authenticated user's information.
     *
     * This method validates the input data for updating the user's details,
     * updates the user's record in the database, and redirects back to the dashboard
     * with a success message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserPut(Request $request) {
        $user = Auth::user(); // Retrieve the authenticated user
    
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
    
        $user->save(); // Save the changes to the database
    
        return redirect()->route('admin.dashboard')->with('success', 'User data updated successfully!');
    }

    /**
     * Show the form for creating a new vacation plan.
     *
     * This method returns the view for creating a new vacation plan.
     *
     * @return \Illuminate\View\View
     */
    public function createPlanVacation() {
        return view('admin.create');
    }

    /**
     * Store a newly created vacation plan.
     *
     * This method validates the input data for creating a vacation plan,
     * saves the new vacation plan to the database, and redirects to the dashboard
     * with a success message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'locale' => 'required|string|max:255',
        ]);
        // Validation for Brazilian locale might be added here if needed
        
        // Add user_id to the validated data array
        $validatedData['user_id'] = Auth::id();

        VacationPlan::create($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Vacation plan created successfully!');
    }

    /**
     * Show the form for editing a specific vacation plan.
     *
     * This method retrieves a vacation plan by its ID and ensures that it belongs
     * to the authenticated user before returning the view for editing.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function updatePlanVacation($id) {
        $plan = VacationPlan::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail(); // Ensure that the user can only view their own plans

        return view('admin.update', compact('plan'));
    }

    /**
     * Update a specific vacation plan.
     *
     * This method validates the input data for updating a vacation plan,
     * updates the plan in the database, and redirects to the dashboard
     * with a success message.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
        $plan = VacationPlan::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail(); // Ensure that the user can only update their own plans

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'locale' => 'required|string|max:255',
        ]);

        $plan->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Vacation plan updated successfully!');
    }

    /**
     * Delete a specific vacation plan.
     *
     * This method attempts to delete a vacation plan by its ID. If the plan is found and deleted,
     * the user is redirected to the dashboard with a success message. If the plan is not found,
     * an error message is returned.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $plan = VacationPlan::find($id);

        if ($plan) {
            $plan->delete();
            return redirect()->route('admin.dashboard')->with('success', 'Vacation plan deleted successfully!');
        }
    
        return redirect()->route('admin.dashboard')->with('error', 'Vacation plan not found!');
    }

    /**
     * Generate a PDF for a specific vacation plan.
     *
     * This method retrieves a vacation plan by its ID, generates a PDF file with the plan's details,
     * and initiates a download of the PDF file.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id) {
        $plan = VacationPlan::with('user')->findOrFail($id);

        $pdf = Pdf::loadView('admin.pdf', compact('plan'));
    
        return $pdf->download('vacation_plan_' . $plan->id . '.pdf');
    }
}
