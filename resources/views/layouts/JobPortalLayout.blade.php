<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset='utf-8' />
  <meta http-equiv='X-UA-Compatible' content='IE=edge' />
  <meta name='viewport' content='width=device-width, initial-scale=1' />
  <title>@yield('title')</title>
  <link rel="icon" href="{{ asset('assets/images/ANAA LOGO.png')}}" type="image/png">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!--FONTAWESOME-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  <script src="/assets/js/perfect-scrollbar.min.js"></script>
  <script defer src="/assets/js/popper.min.js"></script>
  <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
  <script defer src="/assets/js/sweetalert.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
  .toggle-btn {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    font-size: 20px;
    cursor: pointer;
    border: none;
    background: none;
    color: inherit;
  }

  button svg {
    width: 24px;
    height: 24px;
  }
</style>

<body class="dark antialiased relative text-sm font-normal overflow-x-hidden">

  <!-- screen loader -->
  <div
    class="screen_loader fixed inset-0 bg-[#fafafa] dark:bg-[#060818] z-[60] grid place-content-center animate__animated">
    <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
      <path
        d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
        <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s"
          repeatCount="indefinite" />
      </path>
      <path
        d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
        <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s"
          repeatCount="indefinite" />
      </path>
    </svg>
  </div>

  <div class="fixed bottom-6 ltr:right-6 rtl:left-6 z-50" x-data="scrollToTop">
    <template x-if="showTopButton">
      <button type="button"
        class="btn btn-outline-primary rounded-full p-2 animate-pulse bg-[#fafafa] dark:bg-[#060818] dark:hover:bg-primary"
        @click="goToTop">
        <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
            fill="currentColor" />
          <path
            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
            fill="currentColor" />
        </svg>
      </button>
    </template>
  </div>



  <!-- Header -->
  <header class="border-b bg-white dark:border-hotel_black-light dark:bg-hotel_black-light" :class="{ 'dark': $store.app.semidark && $store.app.menu === 'horizontal' }">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold text-hotel_green-light">ParadiseHotel</h1>
      <div class="space-x-4 flex ">
        <button class="toggle-btn" id="theme-toggle">
          <span id="icon-container">
            <!-- Initial moon icon (for dark mode) -->
            <i id="moon-icon" class="fa-regular fa-moon dark:text-gray-300"></i>


            <!-- Initial sun icon (for light mode), hidden initially -->
            <i id="sun-icon" class="fa-regular fa-sun "></i>

          </span>
        </button>

        @if(Route::has('login'))
        @auth
        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
          <button id="hs-dropdown-transform-style" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
            {{Auth::user()->name}}
            <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m6 9 6 6 6-6" />
            </svg>
          </button>

          <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-transform-style">
            <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 mt-2 origin-top-left min-w-60 bg-white shadow-md rounded-lg dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" data-hs-transition>
              <div class="p-1 space-y-0.5">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                  Newsletter
                </a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('logout')}}" onclick="event.preventDefault();
                                      this.closest('form').submit();" class=" text-danger !py-3" @click="toggle">
                    <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2 rotate-90" width="18" height="18"
                      viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.5"
                        d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Sign Out
                  </a>
                </form>
              </div>
            </div>
          </div>
        </div>
        @else
        <button class="px-4 py-2 text-gray-600 hover:text-gray-900">Login</button>
        @if(Route::has('register'))
        <button class="px-4 py-2 text-gray-600 hover:text-gray-900">Register</button>
        @endif
        @endauth
        @endif
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Post a Job</button>
      </div>
    </div>
  </header>
  <script>
    // Function to apply the saved theme from localStorage
    function applySavedTheme() {
      const savedTheme = localStorage.getItem('theme');
      if (savedTheme) {
        document.body.classList.remove('dark', 'light');
        document.body.classList.add(savedTheme);
        updateIcon(savedTheme);
      } else {
        // Default to dark if no theme is saved
        document.body.classList.add('dark');
        updateIcon('dark');
      }
    }

    // Function to update the icon based on the theme
    function updateIcon(theme) {
      const moonIcon = document.getElementById('moon-icon');
      const sunIcon = document.getElementById('sun-icon');

      if (theme === 'dark') {
        moonIcon.style.display = 'block';
        sunIcon.style.display = 'none';
      } else {
        moonIcon.style.display = 'none';
        sunIcon.style.display = 'block';
      }
    }

    // Event listener for theme toggle
    document.getElementById('theme-toggle').addEventListener('click', function() {
      if (document.body.classList.contains('dark')) {
        document.body.classList.remove('dark');
        document.body.classList.add('light');
        localStorage.setItem('theme', 'light');
        updateIcon('light');
      } else {
        document.body.classList.remove('light');
        document.body.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        updateIcon('dark');
      }
    });

    // Apply the saved theme when the page loads
    applySavedTheme();
  </script>
  @yield('content')
  <script src="/assets/js/alpine-collaspe.min.js"></script>
  <script src="/assets/js/alpine-persist.min.js"></script>
  <script defer src="/assets/js/alpine-ui.min.js"></script>
  <script defer src="/assets/js/alpine-focus.min.js"></script>
  <script defer src="/assets/js/alpine.min.js"></script>
  <script src="/assets/js/custom.js"></script>
</body>

</html>