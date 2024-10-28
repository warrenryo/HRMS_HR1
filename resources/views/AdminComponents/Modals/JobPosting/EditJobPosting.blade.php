<div id="edit-job-{{$job->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 lg:max-w-4xl lg:w-full m-3 lg:mx-auto m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Edit {{$job->title}} Job
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#edit-job-{{$job->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <form method="POST" action="{{ url('job-posting/manage/edit-job/'.$job->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="cName">Title</label>
                                    <input id="cName" type="text" placeholder="Enter Job Title" value="{{$job->title}}" name="title" class="form-input" required />
                                </div>
                                <div>
                                    <label for="emp">Employment Type</label>
                                    <select id="emp" name="employment_type" class="py-2 px-3 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected="">Select Employment Type</option>
                                        @foreach($employment_enum as $emp)
                                        <option value="{{$emp->value}}" {{ $job->employment_type == $emp->value ? 'selected' : '' }}>{{$emp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="industry">Location</label>
                                <input id="industry" type="text" placeholder="Enter Company Location" value="{{$job->location}}" name="location" class="form-input" required />
                            </div>
                            <!-- Select -->
                            <div>
                                <label for="industry">Setup</label>
                                <select multiple="" name="setup[]" data-hs-select='{
                                "placeholder": "Select multiple options...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                }' class="hidden">
                                    <option value="">Choose Setup</option>
                                    @foreach($employment_setup as $setup)
                                    <option value="{{ $setup->value }}"
                                        {{ in_array($setup->value, $job->jobSetup->pluck('setup')->toArray()) ? 'selected' : '' }}>
                                        {{ $setup->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End Select -->
                            <div>
                                <label for="ctnTextarea">Benefits</label>
                                <textarea id="ctnTextarea" rows="3" class="form-textarea" name="benefits" placeholder="Ex. Work from Home" required>{{$job->benefits}}</textarea>
                            </div>
                            <div>
                                <label for="sched">Schedule</label>
                                <input id="sched" type="text" placeholder="Ex. Monday to Friday" value="{{$job->schedule}}" name="schedule" class="form-input" required />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="salary1">Salary From</label>
                                    <input id="salary1" type="number" placeholder="Enter Salary Rate" value="{{$job->salary_from}}" name="salary_from" class="form-input" required />
                                </div>
                                <div>
                                    <label for="salary2">Salary To</label>
                                    <input id="salary2" type="number" placeholder="Enter Salary Rate" value="{{$job->salary_to}}" name="salary_to" class="form-input" required />
                                </div>
                            </div>
                            <div>
                                <label for="role">Role Description</label>
                                <textarea id="role" rows="3" class="form-textarea" name="role_description" placeholder="Enter Role Description" required>{{$job->role_description}}</textarea>
                            </div>

                            <div x-data="form">
                                <label for="role">Close Date</label>
                                <input type="text" id="datepicker" name="close_date" value="{{$job->close_date}}" class="form-input" placeholder="Select Close Date">
                            </div>

                        </div>
                        <div class="space-y-5 ">
                            <div id="responsibilities-{{$job->id}}">
                                <div class="responsibility-{{$job->id}}">
                                    <label for="sched">Responsibilities</label>
                                    @if($job->jobResponsibilities->isEmpty())
                                    <input id="qual" type="text" name="new_responsibilities[]" placeholder="Enter Responsibilities" class="form-input" required />
                                    @else
                                    @foreach($job->jobResponsibilities as $responsibility)
                                    <div class="responsibility mt-2 flex items-center" id="responsibility-{{ $responsibility->id }}">
                                        <input id="responsibility-{{ $responsibility->id }}"
                                            type="text"
                                            name="responsibilities[{{ $responsibility->id }}]"
                                            value="{{ $responsibility->responsibilities }}"
                                            placeholder="Enter Responsibilities"
                                            class="form-input mr-2"
                                            required />
                                        <button class="btn btn-danger py-2 px-3 delete-responsibility"
                                            type="button"
                                            data-id="{{ $responsibility->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="button" id="add-responsibilities-{{$job->id}}" class="btn btn-success w-full"><i class="fa-solid fa-plus mr-1"></i> Add Responsibilities</button>

                            <div id="skills-{{$job->id}}">
                                <div class="skill-{{$job->id}}">
                                    <label for="ski">Skills</label>
                                    @if($job->jobSkills->isEmpty())
                                    <input id="qual" type="text" name="new_skills[]" placeholder="Enter Responsibilities" class="form-input" required />
                                    @else
                                    @foreach($job->jobSkills as $skill)
                                    <div class="skillinput mt-2 flex items-center" id="skillinput-{{ $skill->id }}">
                                        <input id="skillinput-{{ $skill->id }}"
                                            type="text"
                                            name="skills[{{ $skill->id }}]"
                                            value="{{ $skill->skills }}"
                                            placeholder="Enter Skills"
                                            class="form-input mr-2"
                                            required />
                                        <button class="btn btn-danger  py-2 px-3 delete-skillinput"
                                            type="button"
                                            data-id="{{ $skill->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="button" id="add-skills-{{$job->id}}" class="btn btn-success w-full"><i class="fa-solid fa-plus mr-1"></i> Add Skills</button>

                            <div id="qualifications-{{$job->id}}">
                                <div class="qualification-{{$job->id}}">
                                    <label for="qual">Qualifications</label>
                                    @if($job->jobQualifications->isEmpty())
                                    <input id="qual" type="text" name="new_qualifications[]" placeholder="Enter Responsibilities" class="form-input" required />
                                    @else
                                    @foreach($job->jobQualifications as $qual)
                                    <div class="qualinput mt-2 flex items-center" id="qualinput-{{ $qual->id }}">
                                        <input id="qualinput-{{ $qual->id }}"
                                            type="text"
                                            name="qualifications[{{ $qual->id }}]"
                                            value="{{ $qual->qualifications }}"
                                            placeholder="Enter Qualifications"
                                            class="form-input mr-2"
                                            required />
                                        <button class="btn btn-danger py-2 px-3 delete-qualinput"
                                            type="button"
                                            data-id="{{ $qual->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="button" id="add-qualifications-{{$job->id}}" class="btn btn-success w-full"><i class="fa-solid fa-plus mr-1"></i> Add Qualifications</button>
                        </div>
                    </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#edit-job-{{$job->id}}">
                    Close
                </button>
                <button type="submit"  class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save changes
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //RESPONSIBILITIES
    document.getElementById('add-responsibilities-{{$job->id}}').addEventListener('click', function() {
        var newRequirement = document.createElement('div');
        newRequirement.classList.add('responsibility-{{$job->id}}');
        newRequirement.innerHTML = '<input id="sched" type="text" name="new_responsibilities[]" placeholder="Add Responsibilities" class="form-input mt-2"  />';
        document.getElementById('responsibilities-{{$job->id}}').appendChild(newRequirement);
    });

    //SKILLS
    document.getElementById('add-skills-{{$job->id}}').addEventListener('click', function() {
        var newRequirement = document.createElement('div');
        newRequirement.classList.add('skill-{{$job->id}}');
        newRequirement.innerHTML = '<input id="ski" type="text" name="new_skills[]" placeholder="Add Skills" class="form-input mt-2"/>';
        document.getElementById('skills-{{$job->id}}').appendChild(newRequirement);
    });

    //QUALIFICATIONS
    document.getElementById('add-qualifications-{{$job->id}}').addEventListener('click', function() {
        var newRequirement = document.createElement('div');
        newRequirement.classList.add('qualification-{{$job->id}}');
        newRequirement.innerHTML = '<input id="qual" type="text" name="new_qualifications[]" placeholder="Add Qualifications" class="form-input mt-2" />';
        document.getElementById('qualifications-{{$job->id}}').appendChild(newRequirement);
    });

    //DATE PICKER
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker", {
            // Options go here
            dateFormat: "Y-m-d", // Format of the date
        });
    });
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-responsibility')) {
            const responsibilityId = event.target.getAttribute('data-id');
            const responsibilityDiv = document.getElementById('responsibility-' + responsibilityId);

            // Get the CSRF token
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Use the Fetch API to send the DELETE request
            fetch('/delete-responsibility/' + responsibilityId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error deleting responsibility.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        responsibilityDiv.remove(); // Remove the responsibility from the DOM
                        alert('Responsibility deleted successfully.');
                    } else {
                        alert('Error deleting responsibility.');
                    }
                })
                .catch(error => {
                    alert('An error occurred: ' + error.message);
                });
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-skillinput')) {
            const skillsId = event.target.getAttribute('data-id');
            const skillsDiv = document.getElementById('skillinput-' + skillsId);

            // Get the CSRF token
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Use the Fetch API to send the DELETE request
            fetch('/delete-skills/' + skillsId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error deleting responsibility.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        skillsDiv.remove(); // Remove the responsibility from the DOM
                        alert('Responsibility deleted successfully.');
                    } else {
                        alert('Error deleting responsibility.');
                    }
                })
                .catch(error => {
                    alert('An error occurred: ' + error.message);
                });
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-qualinput')) {
            const qualId = event.target.getAttribute('data-id');
            const qualDiv = document.getElementById('qualinput-' + qualId);

            // Get the CSRF token
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Use the Fetch API to send the DELETE request
            fetch('/delete-qualifications/' + qualId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error deleting responsibility.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        qualDiv.remove(); // Remove the responsibility from the DOM
                        alert('Responsibility deleted successfully.');
                    } else {
                        alert('Error deleting responsibility.');
                    }
                })
                .catch(error => {
                    alert('An error occurred: ' + error.message);
                });
        }
    });
</script>