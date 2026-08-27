@extends('layouts.app')

@section('title', 'All Employees')

@section('content')
    <h1>All Employees</h1>
    <p class="subtitle">{{ count($employees) }} record(s) on file.</p>

    @if (count($employees) === 0)
        <div class="card empty-state">
            <p>No employees yet.</p>
            <a href="{{ route('employees.create') }}" class="link">Add your first employee &rarr;</a>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Employment Type</th>
                    <th>Status</th>
                    <th>Hire Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    @php
                        $statusClass = [
                            'Active' => 'badge-active',
                            'Probation' => 'badge-probation',
                            'On Leave' => 'badge-onleave',
                            'Suspended' => 'badge-suspended',
                            'Terminated' => 'badge-terminated',
                        ][$employee['employment_status'] ?? ''] ?? '';
                    @endphp
                    <tr>
                        <td>
                            @if (!empty($employee['photo']))
                                <img src="{{ Illuminate\Support\Facades\Storage::url($employee['photo']) }}" alt="" style="width: 32px; height: 32px; object-fit: cover; border-radius: 50%;">
                            @else
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #e5e7eb;"></div>
                            @endif
                        </td>
                        <td>
                            @if (!empty($employee['employee_id']))
                                <span class="id-badge">{{ $employee['employee_id'] }}</span>
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $employee['name'] ?? '—' }}</td>
                        <td>{{ $employee['department'] ?? '—' }}</td>
                        <td>{{ $employee['employment_type'] ?? '—' }}</td>
                        <td><span class="badge {{ $statusClass }}">{{ $employee['employment_status'] ?? '—' }}</span></td>
                        <td>{{ !empty($employee['hire_date']) ? \Carbon\Carbon::parse($employee['hire_date'])->format('d M Y') : '—' }}</td>
                        <td><a class="link" href="{{ route('employees.show', $employee['employee_id'] ?? '') }}">View &rarr;</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection