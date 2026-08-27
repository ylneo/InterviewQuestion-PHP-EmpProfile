<h3>Employee Profile System</h3>

<p>Laravel app for adding and viewing employee profiles, built for the PHP coding test. Multi-step form on the frontend, a REST API that validates and saves the data, and a JSON file standing in for a database. </p>

<b>Features</b>
<ul>
<li>4-step add-employee form: Personal Info → Address → Employment Details → Photo & Documents</li>
<li>Auto-generated employee IDs (EMP-0001, EMP-0002)</li>
<li>Optional document uploads (NRIC/passport, offer letter, NDA, certificates, work permit with expiry tracking for foreign hires)</li>
<li>Profile photo upload with live preview</li>
<li>List view (index.blade.php) + individual profile view (show.blade.php)</li>
</ul>

<b>Tech stack</b>
Backend: Laravel / JSON (records stored in storage/app/employees.json)
Frontend: Blade + HTML5/CSS

