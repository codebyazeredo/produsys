<header class="bg-nav">
    <div class="flex justify-between items-center p-3">
        <div class="flex items-center space-x-4">
            <button @click="open = !open" class="text-white md:hidden">
                <i class="fas fa-bars"></i>
            </button>

            <h1 class="text-white text-lg font-semibold">Logo</h1>
        </div>

        <div class="flex items-center space-x-4">
            <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 hidden md:block lg:block no-underline hover:text-gray-300">
                Github
            </a>

            <div class="flex items-center space-x-2">
                <img class="h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="Avatar">
                <a href="#" class="text-white hidden md:block lg:block no-underline hover:text-gray-300">Adam Wathan</a>
            </div>

            <div class="relative">
                <button id="ProfileDropDownBtn" class="text-white">
                    <i class="fas fa-caret-down"></i>
                </button>
                <div id="ProfileDropDown" class="rounded shadow-md bg-white absolute hidden mt-2 right-0 w-48">
                    <ul class="list-reset">
                        <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-100">My account</a></li>
                        <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-100">Notifications</a></li>
                        <li><hr class="border-t mx-2 border-gray-200"></li>
                        <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-100">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="text-black block px-4 py-2">Dashboard</a>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="text-black block px-4 py-2">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="text-black block px-4 py-2" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('ProfileDropDownBtn').addEventListener('click', function() {
        const dropdown = document.getElementById('ProfileDropDown');
        dropdown.classList.toggle('hidden');
    });
</script>
