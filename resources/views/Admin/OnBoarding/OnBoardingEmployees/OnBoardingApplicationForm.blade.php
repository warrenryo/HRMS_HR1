@extends('layouts.ApplicationFormLayout')

@section('content')
<div class="max-w-7xl  mx-auto">
    <!-- Card Section -->
    <div class=" px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <form action="{{ url('submit-onboarding-form/'.$id) }}" method="POST">
            @csrf
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
                                    src="{{ isset($user->profile_photo) ? asset('storage/' . $user->profile_photo) : 'https://preline.co/assets/img/160x160/img1.jpg' }}" alt="Avatar">

                                <div class="sm:col-span-9">
                                    <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                                    <input type="file" accept="image/*" required name="af-submit-application-resume-cv" id="photo" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
        file:bg-gray-50 file:border-0
        file:bg-gray-100 file:me-4
        file:py-2 file:px-4
        dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                        onchange="updateImagePreview(event)">
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateImagePreview(event) {
                                // Get the selected file
                                const file = event.target.files[0];

                                // Check if a file was selected and if it's an image
                                if (file && file.type.startsWith('image/')) {
                                    // Create a URL for the selected image
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        // Update the image src to display the selected file
                                        document.getElementById('avatarImage').src = e.target.result;
                                    }

                                    // Read the selected image file as a data URL
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>

                        <!-- Card Section -->
                        <div class="mx-auto">
                            <!-- Card -->
                            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
                                <!-- Section -->
                                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                                    <div class="sm:col-span-12">
                                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                            Submit your application
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
                                            <input id="af-submit-application-full-name" required name="firstname" placeholder="First name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            <input type="text" placeholder="Last name" required name="lastname" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
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
                                        <input id="af-submit-application-email" type="email" required name="email" placeholder="Email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <p class="text-[12px] dark:text-neutral-400">*Please provide an active email or use your email where we send this form</p>
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
                                        <div x-data="form">
                                            <input type="date" placeholder="Birthdate" id="datepicker" name="birthdate" required class="form-input dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        </div>
                                        <script>
                                            //DATE PICKER
                                            document.addEventListener('DOMContentLoaded', function() {
                                                flatpickr("#datepicker", {
                                                    // Options go here
                                                    dateFormat: "Y-m-d", // Format of the date
                                                });
                                            });
                                        </script>
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
                                        <select required name="gender" class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            <option value="" selected disabled>Sex/Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Femal">Female</option>
                                        </select>
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
                                        <select required name="civil_status" class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            <option value="" selected disabled>Civil Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
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
                                        <input required name="phone" id="af-submit-application-phone" placeholder="Mobile Number" type="number" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
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
                                        <textarea required name="address" id="af-submit-application-bio" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="6" placeholder="Your address here"></textarea>
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
                                        <input id="af-submit-application-linkedin-url" type="text" name="sss" placeholder="if applicable" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    </div>
                                    <!-- End Col -->

                                    <div class="sm:col-span-3">
                                        <label for="af-submit-application-twitter-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                            Tax Identification Number (TIN)
                                        </label>
                                    </div>
                                    <!-- End Col -->

                                    <div class="sm:col-span-9">
                                        <input id="af-submit-application-twitter-url" name="tin" placeholder="if applicable" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    </div>
                                    <!-- End Col -->

                                    <div class="sm:col-span-3">
                                        <label for="af-submit-application-github-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                            PhilHealth Number
                                        </label>
                                    </div>
                                    <!-- End Col -->

                                    <div class="sm:col-span-9">
                                        <input id="af-submit-application-github-url" name="philhealth" placeholder="if applicable" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    </div>
                                    <!-- End Col -->

                                    <div class="sm:col-span-3">
                                        <label for="af-submit-application-portfolio-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                            Pag-IBIG (HDMF)
                                        </label>
                                    </div>
                                    <!-- End Col -->

                                    <div class="sm:col-span-9">
                                        <input id="af-submit-application-portfolio-url" name="pagibig" placeholder="if applicable" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    </div>
                                    <!-- End Col -->

                                </div>
                                <!-- End Section -->


                                <!-- Section -->
                                <div class="py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                        Submit application
                                    </h2>
                                    <p class="mt-3 text-sm text-gray-600 dark:text-neutral-400">
                                        In order to contact you with future jobs that you may be interested in, we need to store your personal data.
                                    </p>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                        Please ensure that all information provided in this form is accurate and truthful.
                                        By submitting this form, you acknowledge that the data will be securely stored and processed in accordance with our privacy policy and applicable regulations.
                                        Any false or misleading information may result in the rejection of your application or other consequences as per our terms and conditions.
                                    </p>

                                    <div class="mt-5 flex">
                                        <input type="checkbox" required class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="af-submit-application-privacy-check">
                                        <label for="af-submit-application-privacy-check" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Allow us to process your personal information.</label>
                                    </div>
                                </div>
                                <!-- End Section -->
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Card Section -->
                        <!-- End Grid -->

                        <div class="mt-5 flex justify-center gap-x-2">
                            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Submit your application
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </form>
    </div>
    <!-- End Card Section -->
</div>
@endsection