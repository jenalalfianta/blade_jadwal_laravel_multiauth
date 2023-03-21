<nav class="shadow">
    <div class="py-3 flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img class="w-20 cursor-pointer" src="{{asset('assets/images/Logo Web SVG.svg')}}"
                alt="">
        </div>
        <div class="nav-links duration-500 md:static md:min-h-fit absolute bg-white min-h-[40vh] left-0 top-[-100%] w-full
                    md:w-auto flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-violet-500" href="#">Beranda</a>
                </li>
                <li>
                    <a class="hover:text-violet-500" href="#">Jadwal</a>
                </li>
                <li>
                    <a class="hover:text-violet-500" href="#">Ruang</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6">
            <button class="bg-violet-500 text-white px-5 py-2 rounded-full
        hover:bg-violet-700">Sign In</button>
            <ion-icon class="text-3xl cursor-pointer md:hidden" name="menu"
                onclick="onToggleMenu(this)"></ion-icon>
        </div>
    </div>
</nav>