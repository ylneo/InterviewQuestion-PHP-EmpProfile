@extends('layouts.app')

@section('title', ($employee['name'] ?? 'Employee') . ' — Profile')

@section('content')
    <a href="{{ route('employees.index') }}" class="link">&larr; Back to all employees</a>

    <div style="margin-top: 16px; display: flex; align-items: center; gap: 16px;">
        @if (!empty($employee['photo']))
            <img src="{{ Illuminate\Support\Facades\Storage::url($employee['photo']) }}" alt="{{ $employee['name'] ?? 'Employee' }}" style="width: 64px; height: 64px; object-fit: cover; border-radius: 50%; border: 1px solid var(--color-border);">
        @endif
        <div>
            <h1>{{ $employee['name'] ?? 'Employee' }}</h1>
            <p class="subtitle">
                @if (!empty($employee['employee_id']))
                    <span class="id-badge">{{ $employee['employee_id'] }}</span>
                @endif
                &middot; {{ $employee['department'] ?? '—' }}
            </p>
        </div>
    </div>

    <div class="card">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="label">Gender</div>
                <div class="value">{{ $employee['gender'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Marital Status</div>
                <div class="value">{{ $employee['marital_status'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Phone No.</div>
                <div class="value">{{ $employee['phone'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Email</div>
                <div class="value">{{ $employee['email'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Date of Birth</div>
                <div class="value">{{ $employee['date_of_birth'] ? \Carbon\Carbon::parse($employee['date_of_birth'])->format('d M Y') : '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Nationality</div>
                <div class="value">{{ $employee['nationality'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">{{ !empty($employee['passport_number']) ? 'Passport No.' : 'IC No.' }}</div>
                <div class="value">{{ $employee['passport_number'] ?? $employee['ic_number'] ?? '—' }}</div>
            </div>
            <div class="detail-item form-group--full">
                <div class="label">Address</div>
                <div class="value">{{ $employee['address'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">State</div>
                <div class="value">{{ $employee['state'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Country</div>
                <div class="value">{{ $employee['country'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Hire Date</div>
                <div class="value">{{ !empty($employee['hire_date']) ? \Carbon\Carbon::parse($employee['hire_date'])->format('d M Y') : '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Department</div>
                <div class="value">{{ $employee['department'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Employment Type</div>
                <div class="value">{{ $employee['employment_type'] ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="label">Employment Status</div>
                <div class="value">{{ $employee['employment_status'] ?? '—' }}</div>
            </div>
            @if (!empty($employee['work_permit_expiry']))
                <div class="detail-item">
                    <div class="label">Work Permit / Visa Expiry</div>
                    <div class="value">{{ $employee['work_permit_expiry'] }}</div>
                </div>
            @endif
        </div>
    </div>

    @php
        $documentLabels = [
            'nric_passport' => 'Scanned NRIC / Passport',
            'offer_letter' => 'Offer Letter',
            'signed_nda' => 'Signed NDA',
            'academic_certificates' => 'Academic Certificates',
            'work_permit' => 'Work Permit / Visa',
        ];
        $uploadedDocs = array_filter($documentLabels, fn ($key) => !empty($employee[$key] ?? null), ARRAY_FILTER_USE_KEY);
    @endphp

    <div class="card" style="margin-top: 20px;">
        <h2 style="font-size: 1.05rem; margin-top: 0;">Documents</h2>

        @if (count($uploadedDocs) === 0)
            <p class="hint" style="margin-top: 8px;">No documents uploaded.</p>
        @else
            <ul class="doc-list">
                @foreach ($uploadedDocs as $key => $label)
                    <li>
                        <a class="link" href="{{ Illuminate\Support\Facades\Storage::url($employee[$key]) }}" target="_blank" rel="noopener">
                            {{ $label }} &rarr;
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection