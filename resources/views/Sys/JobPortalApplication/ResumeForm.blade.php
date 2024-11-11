@extends('layouts.JobPortalLayout')

@section('content')
@auth
<div class="grid grid-cols-2 gap-4 p-10 mx-0 2xl:mx-[20rem]">
    <div>

        <div class="max-w-[85rem] px-4  sm:px-6 mx-auto pb-10">
            <form id="application_form" action="{{ url('apply/form/resume/for-review/'.$job->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="max-w-xl mx-auto">
                    <div class="text-center pb-16">
                        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-gray-300">
                            Your Information
                        </h1>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Tell us your information in order to let us know you
                        </p>
                    </div>
                    <div class="grid gap-4 lg:gap-6">
                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-firstname-hire-us-2" class="block mb-2 text-sm text-gray-700 font-medium dark:text-neutral-400">First Name</label>
                                <input type="text" name="name" required value="{{Auth::user()->name}}" id="hs-firstname-hire-us-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div>

                            <div>
                                <label for="hs-lastname-hire-us-2" class="block mb-2 text-sm text-gray-700 font-medium dark:text-neutral-400">Last Name</label>
                                <input type="text" name="lastname" required value="{{Auth::user()->userDetails->lastname}}" id="hs-lastname-hire-us-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div>
                        </div>
                        <!-- End Grid -->

                        <div>
                            <label for="hs-work-email-hire-us-2" class="block mb-2 text-sm text-gray-700 font-medium dark:text-neutral-400">Email</label>
                            <input type="email" name="email" required value="{{Auth::user()->email}}" id="hs-work-email-hire-us-2" autocomplete="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        </div>

                         <!-- Grid -->
                         <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-firstname-hire-us-3" class="block mb-2 text-sm text-gray-700 font-medium dark:text-neutral-400">Phone</label>
                                <input type="number" name="number" required value="{{Auth::user()->userDetails->number}}" id="hs-firstname-hire-us-3" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div>

                            <div>
                                <label for="hs-lastname-hire-us-5" class="block mb-2 text-sm text-gray-700 font-medium dark:text-neutral-400">City/State</label>
                                <input type="text" name="city" required value="{{Auth::user()->userDetails->city}}" id="hs-lastname-hire-us-5" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div>
                        </div>
                        <!-- End Grid -->
                    </div>

                    <h1 class="text-center text-3xl font-bold mt-10 text-gray-800 sm:text-3xl dark:text-neutral-300">
                        Enter a job that shows relevant experience
                    </h1>
                    <p class="text-center mt-4 text-gray-600 dark:text-neutral-400">
                        TWe share one job title with the employer to introduce you as a candidate.
                    </p>
                    <h1 class="font-bold pt-4 pb-2 dark:text-neutral-400">Relevant experience <span class="font-light text-sm">(optional)</span></h1>
                    <div class="border dark:border-hotel_black-extra_light rounded-lg p-6">
                        <div>
                            <label for="jobTitle" class="block mb-2 text-sm text-gray-700 font-bold dark:text-neutral-400">Job Title</label>
                            <input type="text" name="prev_job_title" id="jobTitle" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        </div>
                        <div class="mt-4">
                            <label for="company" class="block mb-2 text-sm text-gray-700 font-bold dark:text-neutral-400">Company</label>
                            <input type="text" name="prev_company" id="company" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        </div>
                    </div>
                    <div class="space-y-2 mt-4">
                        @if(!empty($job->questions))
                        @foreach($job->questions as $question)
                        <label for="question-{{$question->id}}" class="block mb-2 text-sm text-gray-700 font-bold dark:text-neutral-400" style="margin-top: 20px;">{{ $question->questions }}</label>
                        @if($question->q_type == 'input')
                        <input type="text" name="answers[{{$question->id}}]" required id="question-{{$question->id}}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        @elseif($question->q_type == 'checkbox')
                        @foreach($question->employerCheckboxOptions as $option)
                        <div class="flex">
                            <input type="checkbox" name="checkbox_answers[{{$question->id}}][]" value="{{ $option->options }}" id="checkbox-{{$option->id}}" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                            <label for="checkbox-{{$option->id}}" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">{{ $option->options }}</label>
                        </div>
                        @endforeach
                        @elseif($question->q_type == 'textarea')
                        <div class="max-w-sm space-y-3">
                            <textarea required name="answers[{{$question->id}}]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="This is a textarea placeholder"></textarea>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>

                    <h1 class="mt-10 text-3xl font-bold text-gray-800 sm:text-3xl dark:text-neutral-300">
                        Add a resume for the employer
                    </h1>
                    <div class="mt-10">
                        <label for="large-file-input" class="sr-only">Choose file</label>
                        <input type="file" accept=".pdf" required name="resume" id="large-file-input" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                            file:bg-gray-50 file:border-0
                                            file:me-4
                                            file:py-3 file:px-4 file:sm:py-5
                                            dark:file:bg-neutral-700 dark:file:text-neutral-400">
                    </div>
                    <p class="mt-2 dark:text-neutral-300">We accept only PDF files</p>
                </div>
                <div class="flex justify-end mt-10">
                    <button type="button" data-hs-overlay="#hs-cookies" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 focus:outline-none focus:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none">
                        Submit Application
                    </button>
                </div>
                @include('Sys.JobPortalApplication.SubmitConfirmation')
            </form>
        </div>
    </div>
    <div class=" max-h-[80vh] overflow-y-auto sticky top-20">
        <div class="max-w-[700px] py-10 px-10 border border-gray-300 dark:border-hotel_black-extra_light rounded-lg">
            <div class="mb-6">
                <h1 class="text-3xl font-semibold dark:text-neutral-300">{{$job->title}}</h1>
                <p class="text-lg dark:text-neutral-400">Paradise Hotel</p>
            </div>
            <hr class="border-hotel_black-extra_light"/>
            <div class="mt-6">
                <div>
                    <h1 class=" font-semibold dark:text-neutral-400">Role Description</h1>
                    <p class="text-sm leading-6 dark:text-neutral-500">{{$job->role_description}}</p>
                </div>

                <div>
                    <h1 class="text-sm font-semibold mt-10 dark:text-neutral-400">Responsibilities</h1>
                    <ul class="list-disc pl-5 mt-2 space-y-2 dark:text-neutral-500">
                        @foreach($job->jobResponsibilities as $jobs)
                        <li class="text-sm">{{$jobs->responsibilities}}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="hs-show-hide-collapse-heading" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-show-hide-collapse">
                    <div>
                        <h1 class="font-semibold mt-4 dark:text-neutral-400">Benefits</h1>
                        <p class="text-sm leading-6 dark:text-neutral-500">{{$job->benefits}}</p>
                    </div>
                    <div>
                        <h1 class=" font-semibold mt-4 dark:text-neutral-400">Skills</h1>
                        <ul class="list-disc pl-5 mt-2 space-y-2 dark:text-neutral-500">
                            @foreach($job->jobSkills as $jobs)
                            <li class="text-sm">{{$jobs->skills}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h1 class=" font-semibold mt-4 dark:text-neutral-400">Qualifications</h1>
                        <ul class="list-disc pl-5 mt-2 space-y-2 dark:text-neutral-500">
                            @foreach($job->jobQualifications as $jobs)
                            <li class="text-sm">{{$jobs->qualifications}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h1 class=" font-semibold mt-4 dark:text-neutral-400">Setup</h1>
                        <ul class="list-disc pl-5 mt-2 space-y-2 dark:text-neutral-500">
                            @foreach($job->jobSetup as $jobs)
                            <li class="text-sm">{{$jobs->setup}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <p class="mt-2 flex justify-center text-lg">
                    <button type="button" class="hs-collapse-toggle inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 dark:text-hotel_green-light decoration-2 hover:text-blue-700 hover:underline focus:outline-none focus:underline focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none  dark:hover:text-hotel_green-dark dark:focus:text-hotel_green-dark" id="hs-show-hide-collapse" aria-expanded="false" aria-controls="hs-show-hide-collapse-heading" data-hs-collapse="#hs-show-hide-collapse-heading">
                        <span class="hs-collapse-open:hidden">View full job description</span>
                        <span class="hs-collapse-open:block hidden">Read less</span>
                        <svg class="hs-collapse-open:rotate-180 shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                </p>

            </div>
        </div>
    </div>
</div>
@else
<script>
    window.location.href = "{{ url('login') }}"; // Redirect to login
</script>
@endauth

@endsection