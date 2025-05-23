<x-guest-layout>
    @section('title', 'Register')
    <div class="flex min-h-screen">
    <div class="w-1/2 min-h-screen hidden lg:flex flex-col items-center justify-center text-white dark:text-black p-4 relative">
            <!-- Background Image Div -->
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('assets/images/hotel.jpg'); filter: brightness(0.4) blur(1px); z-index: -1;">
            </div>

            <!-- Content (Text and Image) -->
            <div class="relative z-10 w-full mx-auto mb-5">
                <img src="/assets/images/icon.png" alt="coming_soon" class="lg:max-w-[370px] xl:max-w-[300px] mx-auto" />
            </div>
            <h3 class="text-3xl font-bold mb-4 text-center text-white">Welcome to ParadiseHotel</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                We're thrilled to have you at ParadiseHotel. Enjoy your stay and explore our world-class amenities.
            </p>
        </div>
        <div class="w-full lg:w-1/2 relative flex justify-center items-center">
            <div class="max-w-[600px] p-5 md:p-10">
                <h2 class="font-bold text-3xl mb-3">Sign Up</h2>
                <p class="mb-7">Enter your email and password to register</p>
                <form method="POST" class="space-y-5" action="{{ route('register') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Last Name -->
                        <div>
                            <x-input-label for="lname" :value="__('Last Name')" />
                            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                                required autofocus autocomplete="lastname" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="add" :value="__('Address')" />
                        <x-text-input id="add" class="block mt-1 w-full" type="text" name="address" :value="old(key: 'address')"
                            required autofocus autocomplete="address" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Address -->
                    <div>
                        <x-input-label for="city" :value="__('City')" />
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old(key: 'city')"
                            required autofocus autocomplete="city" />
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Mobile NUmber -->
                        <div>
                            <x-input-label for="number" :value="__('Mobile Number')" />
                            <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')"
                                required autofocus autocomplete="number" />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="zip" :value="__('Zip Code')" />
                            <x-text-input id="zip" class="block mt-1 w-full" type="number" name="zip_code" :value="old(key: 'zip_code')"
                                required autofocus autocomplete="zip_code" />
                            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                        </div>
                    </div>


                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <button type="submit" class="btn btn-primary w-full bg-hotel_green-light border border-hotel_green-light">SIGN UP</button>
                </form>
                <div
                    class="relative my-7 h-5 text-center before:w-full before:h-[1px] before:absolute before:inset-0 before:m-auto before:bg-[#ebedf2]  dark:before:bg-[#253b5c]">
                    <div
                        class="font-bold text-white-dark bg-[#fafafa] dark:bg-[#060818] px-2 relative z-[1] inline-block">
                        <span>OR</span>
                    </div>
                </div>
                <ul class="flex justify-center gap-2 sm:gap-5 mb-5">
                    <li>
                        <button type="button"
                            class="btn flex gap-1 sm:gap-2 text-black shadow-none bg-white-dark/30 dark:border-[#253b5c] dark:hover:bg-[#1b2e4b] dark:bg-transparent dark:text-white hover:bg-white ">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 256 193" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                preserveAspectRatio="xMidYMid">
                                <g>
                                    <path
                                        d="M58.1818182,192.049515 L58.1818182,93.1404244 L27.5066233,65.0770089 L0,49.5040608 L0,174.59497 C0,184.253152 7.82545455,192.049515 17.4545455,192.049515 L58.1818182,192.049515 Z"
                                        fill="#4285F4"></path>
                                    <path
                                        d="M197.818182,192.049515 L238.545455,192.049515 C248.203636,192.049515 256,184.224061 256,174.59497 L256,49.5040608 L224.844415,67.3422767 L197.818182,93.1404244 L197.818182,192.049515 Z"
                                        fill="#34A853"></path>
                                    <polygon fill="#EA4335"
                                        points="58.1818182 93.1404244 54.0077618 54.4932827 58.1818182 17.5040608 128 69.8676972 197.818182 17.5040608 202.487488 52.4960089 197.818182 93.1404244 128 145.504061">
                                    </polygon>
                                    <path
                                        d="M197.818182,17.5040608 L197.818182,93.1404244 L256,49.5040608 L256,26.2313335 C256,4.64587897 231.36,-7.65957557 214.109091,5.28587897 L197.818182,17.5040608 Z"
                                        fill="#FBBC04"></path>
                                    <path
                                        d="M0,49.5040608 L26.7588051,69.5731646 L58.1818182,93.1404244 L58.1818182,17.5040608 L41.8909091,5.28587897 C24.6109091,-7.65957557 0,4.64587897 0,26.2313335 L0,49.5040608 Z"
                                        fill="#C5221F"></path>
                                </g>
                            </svg>
                            Google
                        </button>
                    </li>
                    <li>
                        <button type="button"
                            class="btn flex gap-1 sm:gap-2 text-black shadow-none bg-white-dark/30 dark:border-[#253b5c] dark:hover:bg-[#1b2e4b] dark:bg-transparent dark:text-white hover:bg-white">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 256 250" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                preserveAspectRatio="xMidYMid">
                                <g>
                                    <path
                                        d="M128.00106,0 C57.3172926,0 0,57.3066942 0,128.00106 C0,184.555281 36.6761997,232.535542 87.534937,249.460899 C93.9320223,250.645779 96.280588,246.684165 96.280588,243.303333 C96.280588,240.251045 96.1618878,230.167899 96.106777,219.472176 C60.4967585,227.215235 52.9826207,204.369712 52.9826207,204.369712 C47.1599584,189.574598 38.770408,185.640538 38.770408,185.640538 C27.1568785,177.696113 39.6458206,177.859325 39.6458206,177.859325 C52.4993419,178.762293 59.267365,191.04987 59.267365,191.04987 C70.6837675,210.618423 89.2115753,204.961093 96.5158685,201.690482 C97.6647155,193.417512 100.981959,187.77078 104.642583,184.574357 C76.211799,181.33766 46.324819,170.362144 46.324819,121.315702 C46.324819,107.340889 51.3250588,95.9223682 59.5132437,86.9583937 C58.1842268,83.7344152 53.8029229,70.715562 60.7532354,53.0843636 C60.7532354,53.0843636 71.5019501,49.6441813 95.9626412,66.2049595 C106.172967,63.368876 117.123047,61.9465949 128.00106,61.8978432 C138.879073,61.9465949 149.837632,63.368876 160.067033,66.2049595 C184.49805,49.6441813 195.231926,53.0843636 195.231926,53.0843636 C202.199197,70.715562 197.815773,83.7344152 196.486756,86.9583937 C204.694018,95.9223682 209.660343,107.340889 209.660343,121.315702 C209.660343,170.478725 179.716133,181.303747 151.213281,184.472614 C155.80443,188.444828 159.895342,196.234518 159.895342,208.176593 C159.895342,225.303317 159.746968,239.087361 159.746968,243.303333 C159.746968,246.709601 162.05102,250.70089 168.53925,249.443941 C219.370432,232.499507 256,184.536204 256,128.00106 C256,57.3066942 198.691187,0 128.00106,0 Z M47.9405593,182.340212 C47.6586465,182.976105 46.6581745,183.166873 45.7467277,182.730227 C44.8183235,182.312656 44.2968914,181.445722 44.5978808,180.80771 C44.8734344,180.152739 45.876026,179.97045 46.8023103,180.409216 C47.7328342,180.826786 48.2627451,181.702199 47.9405593,182.340212 Z M54.2367892,187.958254 C53.6263318,188.524199 52.4329723,188.261363 51.6232682,187.366874 C50.7860088,186.474504 50.6291553,185.281144 51.2480912,184.70672 C51.8776254,184.140775 53.0349512,184.405731 53.8743302,185.298101 C54.7115892,186.201069 54.8748019,187.38595 54.2367892,187.958254 Z M58.5562413,195.146347 C57.7719732,195.691096 56.4895886,195.180261 55.6968417,194.042013 C54.9125733,192.903764 54.9125733,191.538713 55.713799,190.991845 C56.5086651,190.444977 57.7719732,190.936735 58.5753181,192.066505 C59.3574669,193.22383 59.3574669,194.58888 58.5562413,195.146347 Z M65.8613592,203.471174 C65.1597571,204.244846 63.6654083,204.03712 62.5716717,202.981538 C61.4524999,201.94927 61.1409122,200.484596 61.8446341,199.710926 C62.5547146,198.935137 64.0575422,199.15346 65.1597571,200.200564 C66.2704506,201.230712 66.6095936,202.705984 65.8613592,203.471174 Z M75.3025151,206.281542 C74.9930474,207.284134 73.553809,207.739857 72.1039724,207.313809 C70.6562556,206.875043 69.7087748,205.700761 70.0012857,204.687571 C70.302275,203.678621 71.7478721,203.20382 73.2083069,203.659543 C74.6539041,204.09619 75.6035048,205.261994 75.3025151,206.281542 Z M86.046947,207.473627 C86.0829806,208.529209 84.8535871,209.404622 83.3316829,209.4237 C81.8013,209.457614 80.563428,208.603398 80.5464708,207.564772 C80.5464708,206.498591 81.7483088,205.631657 83.2786917,205.606221 C84.8005962,205.576546 86.046947,206.424403 86.046947,207.473627 Z M96.6021471,207.069023 C96.7844366,208.099171 95.7267341,209.156872 94.215428,209.438785 C92.7295577,209.710099 91.3539086,209.074206 91.1652603,208.052538 C90.9808515,206.996955 92.0576306,205.939253 93.5413813,205.66582 C95.054807,205.402984 96.4092596,206.021919 96.6021471,207.069023 Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                            Github
                        </button>
                    </li>
                    <li>
                        <button type="button"
                            class="btn flex gap-1 sm:gap-2 text-black shadow-none bg-white-dark/30 dark:border-[#253b5c] dark:hover:bg-[#1b2e4b] dark:bg-transparent dark:text-white hover:bg-white">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 256 209" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                preserveAspectRatio="xMidYMid">
                                <g>
                                    <path
                                        d="M256,25.4500259 C246.580841,29.6272672 236.458451,32.4504868 225.834156,33.7202333 C236.678503,27.2198053 245.00583,16.9269929 248.927437,4.66307685 C238.779765,10.6812633 227.539325,15.0523376 215.57599,17.408298 C205.994835,7.2006971 192.34506,0.822 177.239197,0.822 C148.232605,0.822 124.716076,24.3375931 124.716076,53.3423116 C124.716076,57.4586875 125.181462,61.4673784 126.076652,65.3112644 C82.4258385,63.1210453 43.7257252,42.211429 17.821398,10.4359288 C13.3005011,18.1929938 10.710443,27.2151234 10.710443,36.8402889 C10.710443,55.061526 19.9835254,71.1374907 34.0762135,80.5557137 C25.4660961,80.2832239 17.3681846,77.9207088 10.2862577,73.9869292 C10.2825122,74.2060448 10.2825122,74.4260967 10.2825122,74.647085 C10.2825122,100.094453 28.3867003,121.322443 52.413563,126.14673 C48.0059695,127.347184 43.3661509,127.988612 38.5755734,127.988612 C35.1914554,127.988612 31.9009766,127.659938 28.694773,127.046602 C35.3777973,147.913145 54.7742053,163.097665 77.7569918,163.52185 C59.7820257,177.607983 37.1354036,186.004604 12.5289147,186.004604 C8.28987161,186.004604 4.10888474,185.75646 0,185.271409 C23.2431033,200.173139 50.8507261,208.867532 80.5109185,208.867532 C177.116529,208.867532 229.943977,128.836982 229.943977,59.4326002 C229.943977,57.1552968 229.893412,54.8901664 229.792282,52.6381454 C240.053257,45.2331635 248.958338,35.9825545 256,25.4500259"
                                        fill="#55acee"></path>
                                </g>
                            </svg>
                            Twitter
                        </button>
                    </li>
                </ul>
                <p class="text-center">Already have an account ? <a href="{{ route('login') }}"
                        class="text-primary font-bold hover:underline">Sign In</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>