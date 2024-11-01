@extends('layouts.JobPortalLayout')

@section('content')
@auth
<div class="grid grid-cols-2 gap-4 p-10 mx-0 2xl:mx-[20rem]">
    <div>
        <!-- Hire Us -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-xl mx-auto">


                <div class="mt-12">
                    <!-- Form -->
                    <form>
                        <!-- Stepper -->
                        <div data-hs-stepper="">
                            <!-- Stepper Nav -->
                            <ul class="relative flex flex-row gap-x-2">
                                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{"index": 1}'>
                                    <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                                        <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600 dark:bg-neutral-700 dark:text-white dark:group-focus:bg-gray-600 dark:hs-stepper-active:bg-blue-500 dark:hs-stepper-success:bg-blue-500 dark:hs-stepper-completed:bg-teal-500 dark:hs-stepper-completed:group-focus:bg-teal-600">
                                            <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">1</span>
                                            <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>

                                    </span>
                                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600 dark:bg-neutral-700 dark:hs-stepper-success:bg-blue-600 dark:hs-stepper-completed:bg-teal-600"></div>
                                </li>

                                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{"index": 2}'>
                                    <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                                        <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600 dark:bg-neutral-700 dark:text-white dark:group-focus:bg-gray-600 dark:hs-stepper-active:bg-blue-500 dark:hs-stepper-success:bg-blue-500 dark:hs-stepper-completed:bg-teal-500 dark:hs-stepper-completed:group-focus:bg-teal-600">
                                            <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">2</span>
                                            <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>

                                    </span>
                                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600 dark:bg-neutral-700 dark:hs-stepper-success:bg-blue-600 dark:hs-stepper-completed:bg-teal-600"></div>
                                </li>

                                <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{"index": 3}'>
                                    <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                                        <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600 dark:bg-neutral-700 dark:text-white dark:group-focus:bg-gray-600 dark:hs-stepper-active:bg-blue-500 dark:hs-stepper-success:bg-blue-500 dark:hs-stepper-completed:bg-teal-500 dark:hs-stepper-completed:group-focus:bg-teal-600">
                                            <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">3</span>
                                            <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>

                                    </span>
                                    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600 dark:bg-neutral-700 dark:hs-stepper-success:bg-blue-600 dark:hs-stepper-completed:bg-teal-600"></div>
                                </li>
                                <!-- End Item -->
                            </ul>
                            <!-- End Stepper Nav -->

                            <!-- Stepper Content -->
                            <div class=" ">
                                <!-- First Content -->
                                <div data-hs-stepper-content-item='{"index": 1}' class="py-10">
                                    <div class="text-center pb-16">
                                        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
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
                                                <label for="hs-firstname-hire-us-2" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">First Name</label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}" id="hs-firstname-hire-us-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>

                                            <div>
                                                <label for="hs-lastname-hire-us-2" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Last Name</label>
                                                <input type="text" name="lastname" value="{{Auth::user()->userDetails->lastname}}" id="hs-lastname-hire-us-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <!-- End Grid -->

                                        <div>
                                            <label for="hs-work-email-hire-us-2" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Email</label>
                                            <input type="email" name="email" value="{{Auth::user()->email}}" id="hs-work-email-hire-us-2" autocomplete="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        </div>
                                    </div>
                                </div>
                                <!-- End First Content -->

                                <!-- First Content -->
                                <div data-hs-stepper-content-item='{"index": 2}' style="display: none;" class="py-10">
                                    <h1 class="text-3xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                                        Enter a job that shows relevant experience
                                    </h1>
                                    <p class="mt-4 text-gray-600 dark:text-neutral-400">
                                        TWe share one job title with the employer to introduce you as a candidate.
                                    </p>
                                    <h1 class="font-bold pt-4 pb-2">Relevant experience <span class="font-light text-sm">(optional)</span></h1>
                                    <div class="border rounded-lg p-6">
                                        <div>
                                            <label for="jobTitle" class="block mb-2 text-sm text-gray-700 font-bold dark:text-white">Job Title</label>
                                            <input type="text" name="lastname" id="jobTitle" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        </div>
                                        <div class="mt-4">
                                            <label for="company" class="block mb-2 text-sm text-gray-700 font-bold dark:text-white">Company</label>
                                            <input type="text" name="lastname" id="company" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        </div>
                                    </div>
                                    <div class="space-y-2 mt-4">
                                        @if(!empty($job->questions))
                                            @foreach($job->questions as $question)
                                            <label for="question-{{$question->id}}" class="block mb-2 text-sm text-gray-700 font-bold dark:text-white" style="margin-top: 20px;">{{ $question->questions }}</label>
                                                @if($question->q_type == 'input')
                                                <input type="text" name="answers[{{$question->id}}]" id="question-{{$question->id}}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                @elseif($question->q_type == 'checkbox')
                                                    @foreach($question->employerCheckboxOptions as $option)
                                                    <div class="flex">
                                                        <input type="checkbox" name="checkbox_answers[{{$question->id}}][]" value="{{ $option->id }}" id="checkbox-{{$option->id}}" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <label for="checkbox-{{$option->id}}" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">{{ $option->options }}</label>
                                                    </div>
                                                    @endforeach
                                                    @elseif($question->q_type == 'textarea')
                                                    <div class="max-w-sm space-y-3">
                                                        <textarea class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="This is a textarea placeholder"></textarea>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- End First Content -->

                                <!-- First Content -->
                                <div data-hs-stepper-content-item='{"index": 3}' style="display: none;">
                                    <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                                        <h3 class="text-gray-500 dark:text-neutral-500">
                                            Third content
                                        </h3>
                                    </div>
                                </div>
                                <!-- End First Content -->

                                <!-- Final Content -->
                                <div data-hs-stepper-content-item='{"isFinal": true}' style="display: none;">
                                    <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                                        <h3 class="text-gray-500 dark:text-neutral-500">
                                            Final content
                                        </h3>
                                    </div>
                                </div>
                                <!-- End Final Content -->

                                <!-- Button Group -->
                                <div class="mt-5 flex justify-between items-center gap-x-2">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-stepper-back-btn="">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6"></path>
                                        </svg>
                                        Back
                                    </button>
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-next-btn="">
                                        Next
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6"></path>
                                        </svg>
                                    </button>
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-finish-btn="" style="display: none;">
                                        Finish
                                    </button>
                                    <button type="reset" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-reset-btn="" style="display: none;">
                                        Reset
                                    </button>
                                </div>
                                <!-- End Button Group -->
                            </div>
                            <!-- End Stepper Content -->
                        </div>
                        <!-- End Stepper -->
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        <!-- End Hire Us -->
    </div>
    <div class=" max-h-[80vh] overflow-y-auto sticky top-20">
        <div class="max-w-[700px] py-10 px-10 border border-gray-300 rounded-lg">
            <div class="mb-6">
                <h1 class="text-3xl font-semibold">{{$job->title}}</h1>
                <p class="text-lg">Paradise Hotel</p>
            </div>
            <hr />
            <div class="mt-6">
                <div>
                    <h1 class=" font-semibold ">Role Description</h1>
                    <p class="text-sm leading-6">{{$job->role_description}}</p>
                </div>

                <div>
                    <h1 class="text-sm font-semibold mt-10">Responsibilities</h1>
                    <ul class="list-disc pl-5 mt-2 space-y-2">
                        @foreach($job->jobResponsibilities as $jobs)
                        <li class="text-sm">{{$jobs->responsibilities}}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="hs-show-hide-collapse-heading" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-show-hide-collapse">
                    <div>
                        <h1 class="font-semibold mt-4 ">Benefits</h1>
                        <p class="text-sm leading-6">{{$job->benefits}}</p>
                    </div>
                    <div>
                        <h1 class=" font-semibold mt-4">Skills</h1>
                        <ul class="list-disc pl-5 mt-2 space-y-2">
                            @foreach($job->jobSkills as $jobs)
                            <li class="text-sm">{{$jobs->skills}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h1 class=" font-semibold mt-4">Qualifications</h1>
                        <ul class="list-disc pl-5 mt-2 space-y-2">
                            @foreach($job->jobQualifications as $jobs)
                            <li class="text-sm">{{$jobs->qualifications}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h1 class=" font-semibold mt-4">Setup</h1>
                        <ul class="list-disc pl-5 mt-2 space-y-2">
                            @foreach($job->jobSetup as $jobs)
                            <li class="text-sm">{{$jobs->setup}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <p class="mt-2 flex justify-center text-lg">
                    <button type="button" class="hs-collapse-toggle inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 decoration-2 hover:text-blue-700 hover:underline focus:outline-none focus:underline focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600" id="hs-show-hide-collapse" aria-expanded="false" aria-controls="hs-show-hide-collapse-heading" data-hs-collapse="#hs-show-hide-collapse-heading">
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