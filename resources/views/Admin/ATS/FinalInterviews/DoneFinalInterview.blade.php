<x-app-layout>
    @section('title', 'Done Final Interview Lists')
    <ul class="flex space-x-2 rtl:space-x-reverse pb-6">
        <li>
            <a href="{{ url('/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>Done Final Interview Lists</span>
        </li>
    </ul>

    <div class="panel">
        <div class="flex items-center gap-3">
            <div class="w-4 h-4 bg-orange-200"></div>
            <p class="dark:text-neutral-300">On Going Interview</p>
        </div>
        <div class="mt-4">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">ID</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Applicant Name</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Email</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Job Applied</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Scheduled Final Interview</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Time</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Via</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach($applicants as $applicant)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700 duration-300">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-300 ">{{$applicant->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-300">{{$applicant->applicantInitial->first_name}} {{$applicant->applicantInitial->last_name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-300">{{$applicant->applicantInitial->email}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-300">{{$applicant->applicantInitial->jobApplied->title}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-300">{{ \Carbon\Carbon::parse($applicant->date)->format('F j, Y') }} </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-300"> {{ \Carbon\Carbon::parse($applicant->time)->format('h:i A') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-300"> {{$applicant->via}}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                                <div class="hs-tooltip inline-block">
                                                    <button data-hs-overlay="#view-details-{{$applicant->id}}" type="button" class="btn btn-info py-2 px-3">
                                                        <i class="fa-solid fa-eye"></i>
                                                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                            View Details
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="hs-tooltip inline-block">
                                                <button data-hs-overlay="#mark-as-passed-{{$applicant->id}}" type="button" class="btn btn-secondary py-2 px-3">
                                                    <i class="fa-solid fa-check"></i>
                                                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                        Set as Passed Candidate
                                                    </span>
                                                </button>
                                            </div>
                                            @include('AdminComponents.Modals.ATS.InitialInterview.ViewInitialApplicantDetails')
                                            @include('AdminComponents.Modals.ATS.FinalInterview.SetAsPassed')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>