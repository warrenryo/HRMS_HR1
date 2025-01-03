@extends('layouts.JobPortalLayout')

@section('content')
<style>
    .loading-indicator {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100px;
        /* Adjust based on your needs */
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #129c15;
        /* Change color to match your theme */
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>


<main class="max-w-6xl mx-auto px-4 py-8">
    <!-- Search Section -->
    <div class=" rounded-lg bg-white dark:bg-transparent dark:shadow-none shadow-sm p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Job Search Input -->
            <div class="relative">
                <input type="email" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                    <svg class="text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </div>
            </div>

            <!-- Location Dropdown -->
            <select class="py-3 px-4 pe-9 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:focus:ring-neutral-600">
                <option selected="">Open this select menu</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>

            <!-- Job Type Dropdown -->
            <select class="py-3 px-4 pe-9 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:focus:ring-neutral-600">
                <option selected="">Open this select menu</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>

            <!-- Search Button -->
            <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Search Jobs
            </button>
        </div>
    </div>

    @if($jobs != null && $jobs->count() > 0)
    <div class="grid grid-cols-2 gap-6">
        <div class="space-y-4 ">
            @foreach($jobs as $job)
            <div class=" job-item bg-white dark:bg-transparent rounded-xl border border-hotel_black-extra_light dark:border-hotel_black-extra_light p-5 space-y-2 dark:hover:border-hotel_green-dark cursor-pointer duration-300" data-job-id="{{$job->id}}">
                <div class="">
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-xs  bg-purple-200 dark:bg-[#7BBB7B] text-purple-800 dark:text-[#2A3D2A] font-bold  ">Urgently Hiring</s>
                </div>
                <div>
                    <h1 class="text-lg dark:text-hotel_green-light font-bold text-purple-900">{{$job->title}}</h1>
                    <h1 class="dark:text-gray-400">Paradise Hotel</h1>
                </div>
                <div>
                    <h1 class="mt-2 dark:text-gray-400">{{$job->location}}</h1>
                    <h1 class="dark:text-gray-400">Engineering - Software</h1>
                </div>
                <ul class="list-disc pl-5 mt-2">
                    @foreach($job->jobResponsibilities->take(3) as $jobres)
                    <li class="dark:text-gray-500">{{$jobres->responsibilities}}</li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <span class=" text-gray-500 dark:text-gray-300">3d ago</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="relative">
            <div id="select-job-message" class="text-center mt-10 hidden">
                <h2 class="text-xl font-semibold dark:text-gray-400">Select a Job to View Details</h2>
            </div>
            <div class="loading hidden">
                <div class="loading-indicator hidden text-center">
                    <p class="dark:text-neutral-400 mb-3">Loading job details...</p>
                    <div class="spinner"></div> <!-- You can style this spinner using CSS -->
                </div>
            </div>
            <div class="header hidden bg-white dark:bg-hotel_black-light shadow-md p-4 transition-all duration-300 ease-in-out transform opacity-0 translate-y-[-20px]">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-xl font-semibold dark:text-gray-300"><span id="job-title-header"></span></h1>
                        <p class="dark:text-gray-600">Paradise Hotel</p>
                    </div>
                    <div class="mt-5 flex gap-4">
                        <a id="apply-link" href="{{ Auth::check() ? url('apply/form/resume/') : url('login') }}" class="bg-pink-600 text-white py-2 px-4 rounded-lg font-bold">
                            Apply Now
                        </a>
                        <button class="bg-blue-100 text-blue-900 py-2 px-4 rounded-lg font-bold">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            <div class="content hidden max-h-[100vh] overflow-y-auto sticky top-4 " onscroll="handleScroll(this)">

                <div class="pb-20">
                    <div>
                        <h1 class="text-3xl font-semibold dark:text-gray-400"><span id="job-title"></span></h1>
                        <p class="text-lg dark:text-neutral-600">Paradise Hotel</p>
                    </div>
                    <div class="space-y-2 mt-4">
                        <span class="flex items-center gap-1 text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span id="location"></span>
                        </span>
                        <span class="flex items-center gap-1 text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span id="employment_type"></span>
                        </span>
                        <span class="flex items-center gap-1 dark:text-gray-400">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            Engineering - Software
                        </span>
                        <span class="flex items-center gap-1 text-gray-400">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>

                            <span>&#8369; <span id="salary_from"></span></span> - <span>&#8369; <span id="salary_to"></span></span>
                        </span>
                        <span class="flex items-center gap-1 dark:text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Posted <span id="created_at"></span>
                        </span>
                    </div>
                    <div class="mt-5 flex gap-4">
                        <a id="apply-link-2" href="{{ Auth::check() ? url('apply/form/resume') : url('login') }}" class="bg-pink-600 text-white py-2 px-4 rounded-lg font-bold">
                            Apply Now
                        </a>
                        <button class="bg-blue-100 text-blue-900 py-2 px-4 rounded-lg font-bold">
                            Save
                        </button>
                    </div>
                    <div class="mt-10">
                        <div>
                            <h1 class="text-xl font-semibold dark:text-gray-400">Role Description</h1>
                            <p id="job-details" class="dark:text-gray-500">
                            </p>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold mt-10 dark:text-gray-400">Benefits</h1>
                            <p id="benefits" class="dark:text-gray-500">

                            </p>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold mt-10 dark:text-gray-400">Responsibilities</h1>
                            <ul id="responsibilities-list" class="list-disc pl-5 mt-2 space-y-2 dark:text-gray-500">

                            </ul>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold mt-10 dark:text-gray-400">Skills</h1>
                            <ul id="skills-list" class="list-disc pl-5 mt-2 space-y-2 dark:text-gray-500">

                            </ul>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold mt-10 dark:text-gray-400">Qualifications</h1>
                            <ul id="qualifications-list" class="list-disc pl-5 mt-2 space-y-2 dark:text-gray-500">

                            </ul>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold mt-10 dark:text-gray-400">Setup</h1>
                            <ul id="setup-list" class="list-disc pl-5 mt-2 space-y-2 dark:text-gray-500">

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-8">
        <button class="px-6 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 inline-flex items-center gap-2">
            Load More
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>
    </div>
    @else
    <div>
        <h1 class="text-center">No Current Job</h1>
    </div>
    @endif
</main>

<script>
    function handleScroll(element) {
        const header = document.querySelector('.header');
        if (element.scrollTop > 280) {
            header.classList.remove('hidden', 'opacity-0', 'translate-y-[-20px]');
            header.classList.add('block', 'translate-y-0');
        } else {
            header.classList.add('hidden', 'translate-y-[-20px]');
            header.classList.remove('block', 'translate-y-0');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const jobItems = document.querySelectorAll('.job-item');
        const selectJobMessage = document.getElementById('select-job-message');
        const content = document.querySelector('.content');
        const loadingIndicator = document.querySelector('.loading');
        const header = document.querySelector('.header');
        const applyLink = document.getElementById('apply-link');
        const applyLink2 = document.getElementById('apply-link-2');

        selectJobMessage.classList.remove('hidden');
        header.classList.remove('hidden');

        jobItems.forEach(item => {
            item.addEventListener('click', async function() {
                // Remove active class from all job items
                // Remove active class from all job items
                jobItems.forEach(job => {
                    job.classList.remove('dark:border-hotel_black-extra_light', 'border-2', 'border-hotel_green-light'); // Remove all possible active classes
                });

                // Add active class to the clicked job item
                this.classList.add('border-hotel_green-light', 'border-2');
                const jobId = this.getAttribute('data-job-id');
                selectJobMessage.classList.add('hidden');
                header.classList.add('hidden');
                loadingIndicator.classList.remove('hidden');
                content.classList.add('hidden', 'opacity-0', 'translate-y-[-20px]');
                applyLink.href = `apply/form/resume/${jobId}`;
                applyLink2.href = `apply/form/resume/${jobId}`;
                try {
                    const response = await fetch(`/get-jobs/${jobId}`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    const data = await response.json();

                    // Update DOM elements
                    document.getElementById('job-title-header').textContent = data.title;
                    document.getElementById('job-title').textContent = data.title;
                    document.getElementById('job-details').textContent = data.role_description;
                    document.getElementById('benefits').textContent = data.benefits;
                    document.getElementById('location').textContent = data.location;
                    document.getElementById('employment_type').textContent = data.employment_type;
                    document.getElementById('salary_from').textContent = data.salary_from;
                    document.getElementById('salary_to').textContent = data.salary_to;

                    // Format created_at
                    const timeDiff = Math.floor((new Date() - new Date(data.created_at)) / (1000 * 60));
                    const timeAgo = timeDiff < 60 ? `${timeDiff} minute${timeDiff !== 1 ? 's' : ''} ago` :
                        timeDiff < 1440 ? `${Math.floor(timeDiff / 60)} hour${timeDiff / 60 !== 1 ? 's' : ''} ago` :
                        `${Math.floor(timeDiff / 1440)} day${Math.floor(timeDiff / 1440) !== 1 ? 's' : ''} ago`;
                    document.getElementById('created_at').textContent = timeAgo;

                    // Clear and populate lists
                    const lists = {
                        'responsibilities-list': data.responsibilities,
                        'skills-list': data.skills,
                        'qualifications-list': data.qualifications,
                        'setup-list': data.job_setup,
                    };

                    for (const [listId, items] of Object.entries(lists)) {
                        const listElement = document.getElementById(listId);
                        listElement.innerHTML = items && items.length > 0 ?
                            items.map(item => `<li>${item.responsibilities || item.skills || item.qualifications || item.setup}</li>`).join('') :
                            '<li>No items available.</li>';
                    }

                    content.classList.remove('hidden', 'opacity-0', 'translate-y-[-20px]');
                    content.classList.add('block', 'translate-y-0');
                } catch (error) {
                    console.error('Error fetching job details:', error);
                } finally {
                    loadingIndicator.classList.add('hidden');
                }
            });
        });
    });
</script>
@endsection