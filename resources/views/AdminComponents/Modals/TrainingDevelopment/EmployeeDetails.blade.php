<div id="employee-details-{{$employee->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-7xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <!-- <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Employee Details for {{$employee->firstname}} {{$employee->lastname}}
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#employee-details-{{$employee->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div> -->
            <div class=" overflow-y-auto">
                <div class=" ">
                    <!-- Card -->
                    <div class="bg-white rounded-xl shadow dark:bg-neutral-900">
                        <div class="relative h-40 rounded-t-xl bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-cover bg-center">

                        </div>

                        <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                            <!-- Grid -->
                            <div class="space-y-4 sm:space-y-6">
                                <div>
                                    <label class="sr-only">
                                        Product photo
                                    </label>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-x-5">
                                        <!-- Display default image or uploaded image -->
                                        <img id="avatarImage" class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 rounded-full ring-4 ring-white dark:ring-neutral-900"
                                            src="{{asset('profile/'.$employee->EmployeeTraining->profile)}}" alt="Avatar">
                                    </div>
                                </div>
                                <!-- Card Section -->
                                <div class="mx-auto">
                                    <!-- Card -->
                                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
                                        <!-- Section -->
                                        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                                            <div class="sm:col-span-12">
                                                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                                    Employee Information
                                                </h2>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <label for="af-submit-application-full-name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                    Full name
                                                </label>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <div class="sm:flex">
                                                    <input id="af-submit-application-full-name" value="{{$employee->EmployeeTraining->firstname}}" readonly name="firstname" placeholder="First name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                    <input type="text" placeholder="Last name" value="{{$employee->EmployeeTraining->lastname}}" readonly name="lastname" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                    Email
                                                </label>
                                            </div>
                                            <!-- End Col -->


                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-email" value="{{$employee->EmployeeTraining->email}}" readonly type="email" required name="email" placeholder="Email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <div class="inline-block">
                                                    <label for="af-submit-application-phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                        Birthdate
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <div>
                                                    <input id="af-submit-application-email" value="{{\Carbon\Carbon::parse($employee->EmployeeTraining->birthdate)->format('F j, Y') }}" readonly type="email" required name="email" placeholder="Email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <div class="inline-block">
                                                    <label for="af-submit-application-phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                        Sex/Gender
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-email" value="{{$employee->EmployeeTraining->gender}}" readonly type="email" required name="email" placeholder="Email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <div class="inline-block">
                                                    <label for="af-submit-application-phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                        Civil Status
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-email" value="{{$employee->EmployeeTraining->civil_status}}" readonly type="email" required name="email" placeholder="Email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->


                                            <div class="sm:col-span-3">
                                                <div class="inline-block">
                                                    <label for="af-submit-application-phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                        Phone
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input  value="{{$employee->EmployeeTraining->number}}" readonly name="phone" id="af-submit-application-phone" placeholder="Mobile Number" type="number" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <div class="inline-block">
                                                    <label for="af-submit-application-bio" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                        Address
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <textarea readonly required name="address" id="af-submit-application-bio" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="6" placeholder="Your address here">{{$employee->EmployeeTraining->address}}</textarea>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Section -->


                                        <!-- Section -->
                                        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                                            <div class="sm:col-span-12">
                                                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                                    Government Identification Numbers
                                                </h2>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <label for="af-submit-application-linkedin-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                    Social Security System (SSS)
                                                </label>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-linkedin-url" value="{{$employee->EmployeeTraining->sss}}" readonly type="text" name="sss"  class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <label for="af-submit-application-twitter-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                    Tax Identification Number (TIN)
                                                </label>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-twitter-url" name="tin" value="{{$employee->EmployeeTraining->tin}}" readonly  type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <label for="af-submit-application-github-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                    PhilHealth Number
                                                </label>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-github-url" value="{{$employee->EmployeeTraining->philhealth}}" readonly  name="philhealth" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-3">
                                                <label for="af-submit-application-portfolio-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                                    Pag-IBIG (HDMF)
                                                </label>
                                            </div>
                                            <!-- End Col -->

                                            <div class="sm:col-span-9">
                                                <input id="af-submit-application-portfolio-url" value="{{$employee->EmployeeTraining->pagibig}}" readonly name="pagibig" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                            <!-- End Col -->

                                        </div>
                                        <!-- End Section -->


                                       
                                        <!-- End Section -->
                                    </div>
                                    <!-- End Card -->
                                </div>
                              
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#employee-details-{{$employee->id}}">
                    Close
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