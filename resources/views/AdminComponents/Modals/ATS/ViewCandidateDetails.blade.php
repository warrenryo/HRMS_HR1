
@include('AdminComponents.Modals.ATS.CandidateConfirmation')

<div id="view-details-{{$applicant->id}}" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/50 hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-stacked-overlays-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-7xl lg:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-stacked-overlays-label" class="font-bold text-gray-800 dark:text-white">
                    Modal title (level 1)
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#view-details-{{$applicant->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-4 overflow-y-auto">
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
                        <h1 class="text-gray-500 font-bold pb-2 mt-4">AI Perspective <i class="fa-solid fa-robot ml-2"></i></h1>
                        <div class="border dark:border-hotel_black-extra_light  rounded-lg">
                            <div class="p-4">
                                <h1 class="text-sm text-gray-500 mb-1">AI Response</h1>
                                <p>{{$applicant->jobApplicantCandidate->AI_Prompt}}</p>
                            </div>
                        </div>
                        @php
                        $job = \App\Models\JobPosting\JobPosting::find($applicant->jobApplicantCandidate->job_id);
                        @endphp
                        @if($job->questions->count() > 0)
                        <div class="h-[60vh] my-10">
                            <h1 class="text-gray-500 font-bold pb-2">Your resume</h1>
                            <embed src="{{ asset('resumes/' . $applicant->jobApplicantCandidate->resume_path) }}" width="100%" height="100%" frameborder="0"></e>
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
                    <embed src="{{ asset('resumes/' . $applicant->jobApplicantCandidate->resume_path) }}" width="100%" height="100%" frameborder="0"></e>
                    @endif
                
                </div>
            </div>

            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#view-details-{{$applicant->id}}">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

