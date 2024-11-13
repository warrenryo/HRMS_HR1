@extends('layouts.JobPortalLayout')

@section('content')
@auth

<div class="grid grid-cols-2 gap-10 p-10 mx-0 2xl:mx-[20rem]">
    <div class="">
        <div class="pb-6">
            <h1 class="text-2xl font-bold text-gray-800  dark:text-white">
                Your Application
            </h1>
        </div>
        <h1 class="text-gray-500 font-bold pb-2">Contact Information</h1>
        <div class="border dark:border-hotel_black-extra_light  rounded-lg">
            <div class="p-4">
                <h1 class="text-sm text-gray-500 mb-1">Full Name</h1>
                <p class="font-bold text-gray-700 uppercase dark:text-gray-300 ">{{$application->first_name}} {{$application->last_name}}</p>
            </div>
            <hr class="border-hotel_black-extra_light"/>
            <div class="p-4">
                <h1 class="text-sm text-gray-500 mb-1">Email</h1>
                <p class="font-bold text-gray-700 dark:text-gray-300 ">{{$application->email}}</p>
            </div>
            <hr class="border-hotel_black-extra_light"/>
            <div class="p-4">
                <h1 class="text-sm text-gray-500 mb-1">City,State</h1>
                <p class="font-bold text-gray-700 dark:text-gray-300 ">{{$application->city_state}}</p>
            </div>
            <hr class="border-hotel_black-extra_light" />
            <div class="p-4">
                <h1 class="text-sm text-gray-500 mb-1">Phone</h1>
                <p class="font-bold text-gray-700 dark:text-gray-300 ">+63 {{$application->phone}}</p>
            </div>
        </div>
        @if($job->questions->count() > 0)
        <div class="h-[60vh] my-10">
            <h1 class="text-gray-500 font-bold pb-2">Your resume</h1>
            <embed src="{{ asset('resumes/' . $application->resume_path) }}#toolbar=0" width="100%" height="100%" frameborder="0"></e>
        </div>
        @else
        <div class="mt-4 ">
            <button onclick="redirectHome()" class="bg-hotel_green py-3 w-full text-white rounded-lg hover:bg-hotel_green-dark duration-300 text-center">Return Home</button>
        </div>
        @endif
    </div>
    @if($job->questions->count() > 0)
    <div>
        <h1 class="text-gray-500 font-bold mb-3">Employer Questions</h1>
        <div class="border dark:border-hotel_black-extra_light rounded-lg ">
            @if(!empty($job->questions))
            @foreach($job->questions as $question)
            <div class="my-4 px-6">
                <label for="question-{{$question->id}}" class="block  text-gray-700 dark:text-gray-300 font-bold">
                    {{ $question->questions }}
                </label>
                @if($question->q_type != 'checkbox')
                <p class="text-sm text-gray-500">Your answer:</p>
                @endif
                <!-- Find the specific answer for the current question -->
                @php
                // Get the applicant's answer for the question
                $answer = $application->applicantAnswer->firstWhere('employer_question_id', $question->id);

                // Manually retrieve all the checkbox answers for the current question
                $checkboxAnswers = \App\Models\JobPostingApplicant\ApplicantAnswerCheckbox::where('checkbox_answers_id', $question->id)
                ->where('applicant_id', $application->id) // Assuming you need to filter by application as well
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
            <hr class="border-hotel_black-extra_light"/>
            @endforeach
            @endif
        </div>
        <div class="mt-4 ">
            <button onclick="redirectHome()" class="bg-hotel_green py-3 w-full text-white rounded-lg hover:bg-hotel_green-dark duration-300 text-center">Return Home</button>
        </div>
    </div>
    @else
    <embed src="{{ asset('resumes/' . $application->resume_path) }}#toolbar=0" width="100%" height="100%" frameborder="0"></e>
    @endif
</div>
<script>
  function redirectHome() {
    window.location.href = "/"; // Replace with the desired URL
  }
</script>
@else
<script>
    window.location.href = "{{ url('login') }}"; // Redirect to login
</script>
@endauth
@endsection