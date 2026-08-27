@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
    <h1>Add New Employee</h1>
    <p class="subtitle">Fields marked with an asterisk (*) are required.</p>

    <div id="formAlert"></div>

    <div class="wizard-progress" id="wizardProgress">
        <div class="wizard-progress__step is-active" data-step-indicator="1">
            <div class="wizard-progress__circle">1</div>
            <div class="wizard-progress__label">Personal</div>
        </div>
        <div class="wizard-progress__line"></div>
        <div class="wizard-progress__step" data-step-indicator="2">
            <div class="wizard-progress__circle">2</div>
            <div class="wizard-progress__label">Address</div>
        </div>
        <div class="wizard-progress__line"></div>
        <div class="wizard-progress__step" data-step-indicator="3">
            <div class="wizard-progress__circle">3</div>
            <div class="wizard-progress__label">Employment</div>
        </div>
        <div class="wizard-progress__line"></div>
        <div class="wizard-progress__step" data-step-indicator="4">
            <div class="wizard-progress__circle">4</div>
            <div class="wizard-progress__label">Documents</div>
        </div>
    </div>

    <form id="employeeForm" class="card" novalidate>

        {{-- ===================== STEP 1: PERSONAL INFO ===================== --}}
        <div class="wizard-step" data-step="1">
            <h2 class="wizard-step__title">Personal Information</h2>
            <p class="wizard-step__subtitle">Basic details about the employee.</p>

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Employee Name *</label>
                    <input type="text" id="name" name="name" maxlength="255" required>
                    <div class="field-error" data-error-for="name"></div>
                </div>

                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="field-error" data-error-for="gender"></div>
                </div>

                <div class="form-group">
                    <label for="marital_status">Marital Status *</label>
                    <select id="marital_status" name="marital_status" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                    <div class="field-error" data-error-for="marital_status"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone No. *</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9+\-\s]{7,20}" placeholder="+60 12-345 6789" required>
                    <div class="field-error" data-error-for="phone"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" maxlength="255" required>
                    <div class="field-error" data-error-for="email"></div>
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth *</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                    <div class="field-error" data-error-for="date_of_birth"></div>
                </div>

                <div class="form-group">
                    <label for="nationality">Nationality *</label>
                    <input type="text" id="nationality" name="nationality" maxlength="100" placeholder="e.g. Malaysian" required>
                    <div class="field-error" data-error-for="nationality"></div>
                </div>

                <div class="form-group" id="icNumberGroup">
                    <label for="ic_number">IC No. *</label>
                    <input type="text" id="ic_number" name="ic_number" maxlength="20" placeholder="e.g. 901231-14-5678">
                    <div class="field-error" data-error-for="ic_number"></div>
                </div>

                <div class="form-group" id="passportNumberGroup" style="display: none;">
                    <label for="passport_number">Passport No. *</label>
                    <input type="text" id="passport_number" name="passport_number" maxlength="20">
                    <div class="field-error" data-error-for="passport_number"></div>
                </div>
            </div>
        </div>

        {{-- ===================== STEP 2: ADDRESS ===================== --}}
        <div class="wizard-step" data-step="2" style="display: none;">
            <h2 class="wizard-step__title">Address</h2>
            <p class="wizard-step__subtitle">Where the employee currently resides.</p>

            <div class="form-grid">
                <div class="form-group form-group--full">
                    <label for="address">Address *</label>
                    <textarea id="address" name="address" maxlength="500" required></textarea>
                    <div class="field-error" data-error-for="address"></div>
                </div>

                <div class="form-group">
                    <label for="state">State *</label>
                    <input type="text" id="state" name="state" maxlength="100" placeholder="e.g. Kedah" required>
                    <div class="field-error" data-error-for="state"></div>
                </div>

                <div class="form-group">
                    <label for="country">Country *</label>
                    <input type="text" id="country" name="country" maxlength="100" placeholder="e.g. Malaysia" required>
                    <div class="field-error" data-error-for="country"></div>
                </div>
            </div>
        </div>

        {{-- ===================== STEP 3: EMPLOYMENT DETAILS ===================== --}}
        <div class="wizard-step" data-step="3" style="display: none;">
            <h2 class="wizard-step__title">Employment Details</h2>
            <p class="wizard-step__subtitle">Role, department, and employment terms.</p>

            <div class="form-grid">
                <div class="form-group">
                    <label for="hire_date">Hire Date *</label>
                    <input type="date" id="hire_date" name="hire_date" required>
                    <div class="field-error" data-error-for="hire_date"></div>
                </div>

                <div class="form-group">
                    <label for="department">Department *</label>
                    <input type="text" id="department" name="department" maxlength="100" placeholder="e.g. Engineering" required>
                    <div class="field-error" data-error-for="department"></div>
                </div>

                <div class="form-group">
                    <label for="employment_type">Employment Type *</label>
                    <select id="employment_type" name="employment_type" required>
                        <option value="" disabled selected>Select type</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Contract">Contract</option>
                    </select>
                    <div class="field-error" data-error-for="employment_type"></div>
                </div>

                <div class="form-group">
                    <label for="employment_status">Employment Status *</label>
                    <select id="employment_status" name="employment_status" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="Active">Active</option>
                        <option value="Probation">Probation</option>
                        <option value="On Leave">On Leave</option>
                        <option value="Suspended">Suspended</option>
                        <option value="Terminated">Terminated</option>
                    </select>
                    <div class="field-error" data-error-for="employment_status"></div>
                </div>

                <div class="form-group" id="workPermitExpiryGroup" style="display: none;">
                    <label for="work_permit_expiry">Work Permit / Visa Expiry</label>
                    <input type="date" id="work_permit_expiry" name="work_permit_expiry">
                    <div class="hint">Required for foreign hires who upload a work permit.</div>
                    <div class="field-error" data-error-for="work_permit_expiry"></div>
                </div>
            </div>
        </div>

        {{-- ===================== STEP 4: PHOTO & DOCUMENTS ===================== --}}
        <div class="wizard-step" data-step="4" style="display: none;">
            <h2 class="wizard-step__title">Photo & Documents</h2>
            <p class="wizard-step__subtitle">Optional. PDF, JPG, or PNG — max 5MB each (2MB for photo).</p>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="photo">Profile Photo</label>
                <div style="display: flex; align-items: center; gap: 16px;">
                    <img id="photoPreview" src="" alt="" style="display: none; width: 72px; height: 72px; object-fit: cover; border-radius: 50%; border: 1px solid var(--color-border);">
                    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" style="flex: 1;">
                </div>
                <div class="hint">JPG or PNG, max 2MB.</div>
                <div class="field-error" data-error-for="photo"></div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="nric_passport">Scanned NRIC / Passport</label>
                    <input type="file" id="nric_passport" name="nric_passport" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="field-error" data-error-for="nric_passport"></div>
                </div>

                <div class="form-group">
                    <label for="offer_letter">Offer Letter</label>
                    <input type="file" id="offer_letter" name="offer_letter" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="field-error" data-error-for="offer_letter"></div>
                </div>

                <div class="form-group">
                    <label for="signed_nda">Signed NDA</label>
                    <input type="file" id="signed_nda" name="signed_nda" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="field-error" data-error-for="signed_nda"></div>
                </div>

                <div class="form-group">
                    <label for="academic_certificates">Academic Certificates</label>
                    <input type="file" id="academic_certificates" name="academic_certificates" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="field-error" data-error-for="academic_certificates"></div>
                </div>

                <div class="form-group">
                    <label for="work_permit">Work Permit / Visa</label>
                    <input type="file" id="work_permit" name="work_permit" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="field-error" data-error-for="work_permit"></div>
                </div>
            </div>
        </div>

        <div class="wizard-nav">
            <button type="button" id="prevBtn" class="btn-secondary" style="visibility: hidden;">Back</button>
            <span id="submitStatus" class="hint"></span>
            <button type="button" id="nextBtn" class="btn-primary">Next</button>
            <button type="submit" id="submitBtn" class="btn-primary" style="display: none;">Save Employee</button>
        </div>
    </form>
@endsection

@section('scripts')
<script>
(function () {
    const LOCAL_NATIONALITY = 'malaysian';
    const TOTAL_STEPS = 4;
    let currentStep = 1;

    const form = document.getElementById('employeeForm');
    const nationalityInput = document.getElementById('nationality');
    const expiryGroup = document.getElementById('workPermitExpiryGroup');
    const expiryInput = document.getElementById('work_permit_expiry');
    const icGroup = document.getElementById('icNumberGroup');
    const icInput = document.getElementById('ic_number');
    const passportGroup = document.getElementById('passportNumberGroup');
    const passportInput = document.getElementById('passport_number');
    const submitBtn = document.getElementById('submitBtn');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitStatus = document.getElementById('submitStatus');
    const formAlert = document.getElementById('formAlert');
    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photoPreview');

    /* ---------------- Wizard navigation ---------------- */

    function showStep(step) {
        document.querySelectorAll('.wizard-step').forEach(el => {
            el.style.display = (parseInt(el.dataset.step, 10) === step) ? 'block' : 'none';
        });

        document.querySelectorAll('.wizard-progress__step').forEach(el => {
            const indicatorStep = parseInt(el.dataset.stepIndicator, 10);
            el.classList.remove('is-active', 'is-done');
            if (indicatorStep === step) el.classList.add('is-active');
            if (indicatorStep < step) el.classList.add('is-done');
        });

        prevBtn.style.visibility = (step === 1) ? 'hidden' : 'visible';
        nextBtn.style.display = (step === TOTAL_STEPS) ? 'none' : 'inline-block';
        submitBtn.style.display = (step === TOTAL_STEPS) ? 'inline-block' : 'none';

        currentStep = step;
    }

    function validateCurrentStep() {
        const fields = document.querySelectorAll(`.wizard-step[data-step="${currentStep}"] input, .wizard-step[data-step="${currentStep}"] select, .wizard-step[data-step="${currentStep}"] textarea`);

        for (const field of fields) {
            // Skip fields that are hidden (e.g. the inactive IC/passport pair)
            if (field.offsetParent === null) continue;

            if (!field.checkValidity()) {
                field.reportValidity();
                return false;
            }
        }

        return true;
    }

    nextBtn.addEventListener('click', function () {
        if (!validateCurrentStep()) return;
        if (currentStep < TOTAL_STEPS) showStep(currentStep + 1);
    });

    prevBtn.addEventListener('click', function () {
        if (currentStep > 1) showStep(currentStep - 1);
    });

    /* ---------------- Conditional fields ---------------- */

    function isForeignHire() {
        return nationalityInput.value.trim().toLowerCase() !== LOCAL_NATIONALITY
            && nationalityInput.value.trim() !== '';
    }

    function toggleConditionalFields() {
        expiryGroup.style.display = isForeignHire() ? 'flex' : 'none';
        if (!isForeignHire()) {
            expiryInput.value = '';
        }

        if (isForeignHire()) {
            icGroup.style.display = 'none';
            icInput.value = '';
            icInput.required = false;

            passportGroup.style.display = 'flex';
            passportInput.required = true;
        } else {
            passportGroup.style.display = 'none';
            passportInput.value = '';
            passportInput.required = false;

            icGroup.style.display = 'flex';
            icInput.required = true;
        }
    }

    nationalityInput.addEventListener('input', toggleConditionalFields);
    toggleConditionalFields();

    photoInput.addEventListener('change', function () {
        const file = photoInput.files[0];
        if (!file) {
            photoPreview.style.display = 'none';
            photoPreview.src = '';
            return;
        }
        const reader = new FileReader();
        reader.onload = e => {
            photoPreview.src = e.target.result;
            photoPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });

    /* ---------------- Error handling ---------------- */

    function clearErrors() {
        document.querySelectorAll('.field-error').forEach(el => el.textContent = '');
        document.querySelectorAll('.has-error').forEach(el => el.classList.remove('has-error'));
        formAlert.innerHTML = '';
    }

    function jumpToStepContaining(field) {
        const stepEl = field.closest('.wizard-step');
        if (stepEl) showStep(parseInt(stepEl.dataset.step, 10));
    }

    function showServerErrors(errors) {
        let firstErrorField = null;

        Object.keys(errors).forEach(field => {
            const errorEl = document.querySelector(`[data-error-for="${field}"]`);
            const inputEl = document.getElementById(field);
            if (errorEl) errorEl.textContent = errors[field][0];
            if (inputEl) {
                inputEl.classList.add('has-error');
                if (!firstErrorField) firstErrorField = inputEl;
            }
        });

        if (firstErrorField) jumpToStepContaining(firstErrorField);
    }

    /* ---------------- Submit ---------------- */

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        clearErrors();

        if (!validateCurrentStep()) return;

        submitBtn.disabled = true;
        submitStatus.textContent = 'Saving...';

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route('api.employees.store') }}', {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: formData,
            });

            const result = await response.json();

            if (response.status === 422) {
                showServerErrors(result.errors || {});
                formAlert.innerHTML = '<div class="alert alert-error">Please fix the errors below and try again.</div>';
                submitStatus.textContent = '';
                submitBtn.disabled = false;
                return;
            }

            if (!response.ok) {
                throw new Error(result.message || 'Something went wrong.');
            }

            formAlert.innerHTML = `<div class="alert alert-success">Employee ${result.data.employee_id} created successfully. Redirecting...</div>`;
            submitStatus.textContent = '';
            form.reset();
            toggleConditionalFields();
            photoPreview.style.display = 'none';
            photoPreview.src = '';

            setTimeout(() => {
                window.location.href = '{{ route('employees.index') }}';
            }, 1200);
        } catch (err) {
            formAlert.innerHTML = `<div class="alert alert-error">${err.message}</div>`;
            submitStatus.textContent = '';
            submitBtn.disabled = false;
        }
    });

    showStep(1);
})();
</script>
@endsection