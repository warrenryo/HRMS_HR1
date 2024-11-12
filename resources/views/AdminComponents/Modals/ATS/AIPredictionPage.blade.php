<x-app-layout>
    @section('title', 'Applicant Lists')
    <ul class="flex space-x-2 rtl:space-x-reverse pb-6">
        <li>
            <a href="{{ url('/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>AI Prediction </span>
        </li>
    </ul>

    <div class="panel">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mx-0 ">
            <div class="">
                <div class="pb-6">
                    <h1 class="text-2xl font-bold text-gray-800  dark:text-white">
                        Applicant Information
                    </h1>
                </div>
                <h1 class="text-gray-500 font-bold pb-2">Contact Information</h1>
                <div class="border dark:border-hotel_black-extra_light  rounded-lg">
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">Full Name</h1>
                        <p class="font-bold text-gray-700 uppercase dark:text-gray-300 ">{{$applicant->jobApplicantCandidate->first_name}} {{$applicant->jobApplicantCandidate->last_name}}</p>
                    </div>
                    <hr class="dark:border-hotel_black-extra_light" />
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">Email</h1>
                        <p class="font-bold text-gray-700 dark:text-gray-300 ">{{$applicant->jobApplicantCandidate->email}}</p>
                    </div>
                    <hr class="dark:border-hotel_black-extra_light" />
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">City,State</h1>
                        <p class="font-bold text-gray-700 dark:text-gray-300 ">{{$applicant->jobApplicantCandidate->city_state}}</p>
                    </div>
                    <hr class="dark:border-hotel_black-extra_light" />
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">Phone</h1>
                        <p class="font-bold text-gray-700 dark:text-gray-300 ">+63 {{$applicant->jobApplicantCandidate->phone}}</p>
                    </div>
                </div>
                <div class="pb-6 mt-4">
                    <h1 class="text-2xl font-bold text-gray-800  dark:text-white">
                        Relevant Experience
                    </h1>
                </div>
                <h1 class="text-gray-500 font-bold pb-2">Contact Information</h1>
                <div class="border dark:border-hotel_black-extra_light  rounded-lg">
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">Previous Job</h1>
                        <p class="font-bold text-gray-700 dark:text-gray-300 ">{{$applicant->jobApplicantCandidate->prev_job_title}}</p>
                    </div>
                    <hr class="dark:border-hotel_black-extra_light" />
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">Previous Company</h1>
                        <p class="font-bold text-gray-700 dark:text-gray-300 ">{{$applicant->jobApplicantCandidate->prev_company}}</p>
                    </div>
                </div>
                <h1 class="text-gray-500 font-bold pb-2 mt-4">AI Prediction <i class="fa-solid fa-robot ml-2"></i></h1>
                <div class="border dark:border-hotel_black-extra_light  rounded-lg">
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">AI Ratings</h1>
                        <div class="flex justify-center items-center text-[#e2a03f] mt-4">
                            @for ($i = 2; $i <= 10; $i +=2) <!-- Loop over even numbers (2, 4, 6, 8, 10) -->
                                @if ($ai_score->ai_ratings >= $i) <!-- If the rating is greater than or equal to the current even number, show filled star -->
                                <svg class="shrink-0 size-5 text-yellow-400 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                @else
                                <svg class="shrink-0 size-5 text-gray-300 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                @endif
                                @endfor
                        </div>
                    </div>
                    <hr class="dark:border-hotel_black-extra_light" />
                    <div class="p-4">
                        <h1 class="text-sm text-gray-500 mb-1">AI Response</h1>
                        <p class="text-justify">{{$ai_score->ai_response}}</p>
                    </div>
                </div>
                @php
                $job = \App\Models\JobPosting\JobPosting::find($applicant->jobApplicantCandidate->job_id);
                @endphp
                @if($job->questions->count() > 0)
                <div class="h-[60vh] my-10">
                    <h1 class="text-gray-500 font-bold pb-2">Your resume</h1>
                    <embed src="{{ asset('storage/' . $applicant->jobApplicantCandidate->resume_path) }}" width="100%" height="100%" frameborder="0"></e>
                </div>
                @else

                @endif
            </div>
            @if($job->questions->count() > 0)
            <div class="min-w-full">
                <h1 class="text-gray-500 font-bold mb-3">Applicant Answers</h1>
                <div class="border dark:border-hotel_black-extra_light rounded-lg box-border">
                    @if(!empty($job->questions))
                    @foreach($job->questions as $question)
                    <div class="my-4 px-6">
                        <label for="question-{{$question->id}}" class="block  text-gray-700 dark:text-gray-300 font-bold truncate">
                            {{ $question->questions }}
                        </label>
                        @if($question->q_type != 'checkbox')
                        <p class="text-sm text-gray-500">Your answer:</p>
                        @endif
                        <!-- Find the specific answer for the current question -->
                        @php
                        // Get the applicant's answer for the question
                        $answer = $applicant->applicantAnswer->firstWhere('employer_question_id', $question->id);

                        // Manually retrieve all the checkbox answers for the current question
                        $checkboxAnswers = \App\Models\JobPostingApplicant\ApplicantAnswerCheckbox::where('checkbox_answers_id', $question->id)
                        ->where('applicant_id', $applicant->id) // Assuming you need to filter by applicant as well
                        ->get();
                        @endphp

                        <!-- Display the answer if it exists -->
                        @if($answer)
                        <p class="dark:text-gray-300 ">{{ $answer->applicant_answer }}</p>
                        @else
                        @if($question->q_type == 'checkbox' && $checkboxAnswers->isNotEmpty())
                        <!-- Loop through the manually retrieved checkbox answers -->
                        <ul class="list-disc pl-10">
                            @foreach($checkboxAnswers as $checkbox)
                            <li class="dark:text-gray-300 ">{{ $checkbox->checkbox_answers }}</li> <!-- Assuming 'checkbox_answer' is the answer field -->
                            @endforeach
                        </ul>
                        @else
                        <p>No Answer provided</p>
                        @endif
                        @endif
                    </div>
                    <hr class="dark:border-hotel_black-extra_light" />
                    @endforeach
                    @endif
                </div>
            </div>
            @else
            <embed src="{{ asset('storage/' . $applicant->jobApplicantCandidate->resume_path) }}" width="100%" height="100%" frameborder="0"></e>
            @endif

        </div>
        <div class="mt-6 flex justify-end gap-4">
            <div>
                <a href="{{url('ai-response/'.$session_id)}}" class="btn btn-outline-primary">Go Back</a>
            </div>
            <div>
                <button class="btn btn-success" data-hs-overlay="#hs-scale-animation-modal">Schedule Interview</button>
            </div>
        </div>
    </div>

    <div id="hs-scale-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Schedule Interview
                    </h3>
                    <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form id="initial_interview_form" action="{{url('schedule-initial-interview/'.$applicant->jobApplicantCandidate->id. '/'.$session_id)}}" method="POST">
                        @csrf
                        <div x-data="form">
                            <label for="role">Date</label>
                            <input type="date" id="datepicker" name="date" required class="form-input" placeholder="Select Close Date">
                        </div>
                        <div x-data="form" class="mt-4">
                            <label for="role">Time</label>
                            <input id="preloading-time" x-model="date4" name="time" required class="form-input" />
                        </div>
                        <div class="mt-4">
                            <label for="role">Via</label>
                            <select required name="via" class=" py-2 px-3 pe-9 block w-full  border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option selected="">Open this select menu</option>
                                <option>Zoom</option>
                                <option>Gmeet</option>
                                <option>On Site</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="role">Platform Link <span class="text-[13px] text-neutral-500">(if not onsite)</span></label>
                            <input type="text" name="link" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Zoom, Gmeet Link">
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-animation-modal">
                        Close
                    </button>
                    <button type="submit" form="initial_interview_form" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Schedule Interview
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        //DATE PICKER
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datepicker", {
                // Options go here
                dateFormat: "Y-m-d", // Format of the date
            });
        });

        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                date4: '24:00',
                init() {
                    flatpickr(document.getElementById('preloading-time'), {
                        defaultDate: this.date4,
                        noCalendar: true,
                        enableTime: true,
                        dateFormat: 'H:i'
                    })
                }
            }));
        });
    </script>
</x-app-layout>