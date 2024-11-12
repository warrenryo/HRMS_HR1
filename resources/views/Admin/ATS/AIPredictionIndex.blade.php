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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($response as $result)
            <div class="max-w-[18rem] w-full bg-[#3b3f5c] shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                <div class="text-center text-black-light">
                    <div class="flex justify-center pb-6">
                        <embed src="{{ asset('storage/resumes/xYBt1Lh8lRo7piGLxMUjjVuEFNAzxM96MIgCkVqF.pdf' ) }}" width="100%" height="100%" frameborder="0"></e>
                    </div>
                    <h5 class="text-white text-[15px] font-semibold mb-2">{{ $result['candidate_name'] }}</h5>
                    <p>Applying for {{ $result['job_title'] }}</p>
                    <div class="flex justify-center items-center text-[#e2a03f] mt-4">
                        @for ($i = 2; $i <= 10; $i +=2) <!-- Loop over even numbers (2, 4, 6, 8, 10) -->
                            @if ($result['ai_ratings'] >= $i) <!-- If the rating is greater than or equal to the current even number, show filled star -->
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
                    <p class="text-[10px] text-white mb-3">AI RATINGS</p>
                    <div class="flex justify-center items-center gap-2">
                        @include('AdminComponents.Modals.ATS.AIPredictionModal')

                        <div class="hs-tooltip inline-block">
                            <a href="{{ url('show-candidate/'.$result->candidate_id.'/'.$result->responses_session) }}" type="button" class="btn btn-secondary py-2 px-3">
                                <i class="fa-solid fa-robot"></i>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                    View AI Prediction
                                </span>
                            </a>
                        </div>
                        <div class="hs-tooltip inline-block">
                            <button data-hs-overlay="#" type="button" class="btn btn-primary py-2 px-3">
                                <i class="fa-solid fa-eye"></i>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                    View Candidate
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>