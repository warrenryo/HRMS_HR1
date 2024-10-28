<x-app-layout>
    @section('title', 'Job Posting')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Job Posting') }}
        </h2>
    </x-slot>

    <div class="panel">
        <div class="flex justify-end">
            <button class="btn btn-primary" data-hs-overlay="#create-job">Create Job</button>
            @include('AdminComponents.Modals.JobPosting.AddJobPosting')
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
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Title</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Employment Type</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Location</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Schedule</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Salary</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Close Date</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Activity</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach($jobs as $job)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{$job->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$job->title}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$job->employment_type}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$job->location}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$job->schedule}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 text-red-600">
                                            &#8369; {{ number_format($job->salary_from, 2) }} - &#8369; {{ number_format($job->salary_to, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ \Carbon\Carbon::parse($job->close_date)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            @if($job->status == 'hiring')
                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-500 text-white">Hiring</span>
                                            @else
                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">Closed</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            @if($job->isActive)
                                            <div>
                                                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                        <path d="m9 12 2 2 4-4"></path>
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                            @else
                                            <div>
                                                <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                                                        <path d="M12 9v4"></path>
                                                        <path d="M12 17h.01"></path>
                                                    </svg>
                                                    In Active
                                                </span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium flex gap-2 items-center">
                                            <button data-hs-overlay="#view-details-{{$job->id}}" class="btn btn-info py-2 px-3">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button data-hs-overlay="#edit-job-{{$job->id}}" class="btn btn-success py-2 px-3">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button data-hs-overlay="#delete-job-{{$job->id}}" class="btn btn-danger py-2 px-3">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            @include('AdminComponents.Modals.JobPosting.DeleteJobPosting')
                                            @include('AdminComponents.Modals.JobPosting.EditJobPosting')
                                            @include('AdminComponents.Modals.JobPosting.ViewDetails')
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