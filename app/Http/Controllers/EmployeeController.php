<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    
    public function index(): View
    {
        $employees = Employee::all();

        $employees = array_reverse($employees);

        return view('employees.index', compact('employees'));
    }

  
    public function create(): View
    {
        return view('employees.create');
    }

    
    public function show(string $employeeId): View
    {
        $employees = Employee::all();

        $employee = collect($employees)
            ->firstWhere('employee_id', $employeeId);

        abort_if(! $employee, 404, 'Employee not found.');

        return view('employees.show', compact('employee'));
    }

    
    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        } else {
            unset($data['photo']);
        }

        
        $documentFields = [
            'nric_passport',
            'offer_letter',
            'signed_nda',
            'academic_certificates',
            'work_permit',
        ];

        foreach ($documentFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('documents', 'public');
            } else {
                unset($data[$field]);
            }
        }

        $employee = Employee::create($data);

        return response()->json([
            'message' => 'Employee created successfully.',
            'data' => $employee,
        ], 201);
    }
}