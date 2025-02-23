@extends('layouts.app')


@php
    $heroImage = Vite::asset('resources/assets/images/beranda/heroImage.jpg');
    $aboutImage = Vite::asset('resources/assets/images/beranda/aboutImage.jpeg');
    $brandLogo = Vite::asset('resources/assets/brand/brandLogo.svg');
    $mitraImage = Vite::asset('resources/assets/images/beranda/darurejoVillage.jpeg');
    $teamImage = [
        'Muhammad Al Kindy' => [
            'path' => Vite::asset('resources/assets/images/team/Muhammad_Al_Kindy.jpeg'),
            'nim' => '2141762057',
            'position' => 'Web Developer',
        ],
        'Vivi Nur Wijayaningrum, S.Kom, M.Kom' => [
            'path' => Vite::asset('resources/assets/images/team/Vivi_Nur_Wijayaningrum,_S.Kom,_M.Kom.jpeg'),
            'nim' => '',
            'position' => 'Dosen Pembimbing',
        ],
        'Ifa Indrian Ningsih' => [
            'path' => Vite::asset('resources/assets/images/team/Ifa_Indrian_Ningsih.jpeg'),
            'nim' => '2041720007',
            'position' => 'Project Manager',
        ],
        'Thoriq Fathurrozi' => [
            'path' => Vite::asset('resources/assets/images/team/Thoriq_Fathurrozi.jpeg'),
            'nim' => '2241720052',
            'position' => 'Web Developer',
        ],
        'Moch. Naufal Ardian Ramadhan' => [
            'path' => Vite::asset('resources/assets/images/team/Moch._Naufal_Ardian_Ramadhan.jpeg'),
            'nim' => '2341760148',
            'position' => 'UI/UX Designer',
        ],
        'Niken Maharani Permata' => [
            'path' => Vite::asset('resources/assets/images/team/Niken_Maharani_Permata.jpeg'),
            'nim' => '2141762006',
            'position' => 'Data Analyst',
        ],
    ];

    $countData = [
        'users' => 15,
        'villages' => 50,
        'certification' => 5,
    ];
@endphp

@push('styles')
@endpush

@section('contents')
    <main class="overflow-scroll h-screen no-scrollbar">
        @include('includes.navbar')
        <section id="hero"
            class="mx-6 sm:mx-10 md:mx-20 flex flex-wrap gap-5 xl:gap-0 justify-between xl:justify-around mt-3 mb-20">
            <div class="hero-desc sm:ms-4  flex justify-start animate-fadeIn transition-all">
                <div class="sm:w-[353px] md:w-[453px]">
                    <div class="text mb-8">
                        <h1
                            class="inline-block xl:text-[64px] text-4xl font-bold leading-snug mb-4 bg-gradient-to-r from-[#194F1F] -from-[0.85%] via-[#649069] via-[38%] to-[#4D7151] to-[97%] text-transparent bg-clip-text">
                            Meningkatkan
                            Kesejahteraan
                            Masyarakat</h1>
                        <p class="text-neutral-base text-xs md:text-base font-normal leading-6">Website kami digunakan untuk
                            menginput data calon
                            penerima bantuan sosial yang akan diuji kelayakannya untuk menerima bantuan sosial sehingga
                            bantuan
                            sosial yang diberikan tepat sasaran.</p>
                    </div>
                    <ul class="action flex gap-6 xl:gap-8">
                        <li>
                            <a
                                href="{{ Auth::user()?->role === 'user' ? route('user.pengajuan.index') : route('showData') }}">
                                <button onclick="window.utils.Animate.ripple.rippleEffect(event)"
                                    class="overflow-hidden relative">
                                    <h1
                                        class="px-4 py-3 lg:px-8 lg:py-6 bg-primary-base text-xs md:text-base rounded-lg xl:rounded-2xl text-neutral-50 leading-5">
                                        {{ Auth::user()?->role == 'user' ? 'Masukkan Data' : 'Lihat Data' }}
                                    </h1>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Auth::user() ? route('showData') : route('auth.signUp') }}">
                                <button onclick="window.utils.Animate.ripple.rippleEffect(event)"
                                    class="overflow-hidden relative">
                                    <h1
                                        class="px-4 py-3 lg:px-8 lg:py-6 rounded-lg  xl:rounded-2xl border text-xs md:text-base border-primary-300 text-primary-base leading-5">
                                        {{ Auth::user() ? 'Penerima yang ideal' : 'Bergabung sekarang' }}
                                    </h1>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hero-image flex justify-end order-first lg:order-last">
                <div class="relative">
                    <div class="relative animate-fadeIn translate-x-2">
                        <div
                            class="z-0 w-[310px] h-[310px]  lg:w-[368px] lg:h-[368px] xl:w-[568px] xl:h-[568px] rounded-xl rotate-6 bg-primary-base transition-all animate-shiftRight">
                        </div>
                        <div class="absolute z-10 top-0 w-[310px] h-[310px] lg:w-[368px] lg:h-[368px] xl:w-[568px] xl:h-[568px] animate-shiftLeft transition-all rounded-xl bg-primary-base !bg-cover !bg-center"
                            style="background: url({{ $heroImage }});"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="banner"
            class="mb-16 hero-label bg-gradient-to-r from-primary-500 to-[#1A5020] to-[55%] px-20 py-10">
            <ul class="flex text-neutral-50 justify-around flex-wrap gap-4 xl:gap-0" x-data="{}">
                <li class="w-60 text-center sm:text-start">
                    <h1 class="text-5xl xl:text-[64px] mb-1 font-bold "><span class="Count">4</span>k+</h1>
                    <p class="font-normal leading-6">4 ribu lebih orang yang ada dalam Desa Darurejo, Plandaan, Jombang.</p>
                </li>
                <li class="w-60 text-center sm:text-start">
                    <h1 class="text-5xl xl:text-[64px] mb-1 font-bold"><span class="">1,7</span>k+</h1>
                    <p class="font-normal leading-6">1,7k lebih keluarga yang berada di Desa Darurejo, Plandaan, Jombang
                    </p>
                </li>
                <li class="w-60 text-center sm:text-start">
                    <h1 class="text-5xl xl:text-[64px] mb-1 font-bold"><span class="Count">46</span></h1>
                    <p class="font-normal leading-6">46 RT yang ada di Desa Darurejo, Plandaan, Jombang
                    </p>
                </li>
            </ul>
        </section>
        <section id="news" class="news px-3 md:px-11 mb-16">
            <div class="header mb-8 px-1 md:px-0">
                <div class="header-title">
                    <h6 class="text-primary-500 text-sm md:text-xl font-medium">Berita</h6>
                    <h1 class="text-neutral-base text-lg md:text-4xl font-semibold">Jelajahi Berita Terbaru Kami.</h1>
                </div>
            </div>
            <div class="news-contents ">
                <div class="wrap relative ">
                    <div class="grid grid-flow-rows  sm:grid-cols-2 xl:grid-cols-4 gap-11 ">
                        @foreach ($news as $berita)
                            @if ($loop->iteration == 1)
                                <a href="{{ $berita->url }}" target="_blank"
                                    class="news-card-first sm:col-span-2 w-full min-h-96 xl:h-full rounded-xl overflow-hidden "
                                    style="background: url('{{ $berita->url_image }}'); background-size:cover;">
                                    <div class="card backdrop-brightness-50 pt-auto px-4 py-5 flex items-end h-full">
                                        <div class="">
                                            <div class="header-card w-3/5">
                                                <div class="category">
                                                    <h3 class="text-neutral-50">{{ $berita->category }}</h3>
                                                </div>
                                                <div class="header-title">
                                                    <h1 class="text-neutral-50 font-semibold text-2xl">{{ $berita->title }}
                                                    </h1>
                                                </div>
                                                <div class="header-date">
                                                    <h2 class="text-sm text-neutral-50 font-medium">
                                                        {{ date_format($berita->created_at, 'd M Y') }}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="body-card">
                                                <p class="text-neutral-50/70 text-sm font-medium">
                                                    {{ $berita->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="{{ $berita->url }}" target="_blank" class="news-card-second">
                                    <div class="card">
                                        <div class="header-card mb-4">
                                            <img class="rounded-xl object-cover w-full min-h-[310px]"
                                                src="{{ $berita->url_image }}" alt="{{ $berita->title }}">
                                            <div class="header-category mt-3">
                                                <h3 class="text-primary-base font-medium text-sm">{{ $berita->category }}
                                                </h3>
                                            </div>
                                            <div class="header-title">
                                                <h1 class="text-neutral-base font-semibold text-2xl">{{ $berita->title }}
                                                </h1>
                                            </div>
                                            <div class="header-date">
                                                <h2 class="text-sm text-neutral-500 font-medium">
                                                    {{ date_format($berita->created_at, 'd M Y') }}
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="body-card">
                                            <p class="text-neutral-500 text-sm font-medium tracking-wide">
                                                {{ $berita->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <section id="team" class="px-3 md:px-11 mb-16">
            <div class="grid grid-flow-row grid-cols-1 justify-center gap-8">
                <div class="py-8 px-5 md:py-16 md:px-20 text-neutral-100 text-center bg-primary-base rounded-xl ">
                    <div class="text">
                        <h3 class="text-xs lg:text-3xl font-medium mb-1">Tentang Kami 🔫</h3>
                        <h1 class="text-2xl sm:text-4xl lg:text-7xl text-neutral-50 font-medium mb-2"><span
                                class="font-bold">Kenali
                                Lebih Dekat</span> <br> Tentang Kami
                        </h1>
                        <h6 class="text-xs lg:text-4xl">Tak kenal maka tak terkenal maka dari itu mari kenalan</h6>
                    </div>
                </div>
                <div class="row-span-2">
                    <div class="grid grid-cols-2 w-full gap-4">
                        <div class="w-full h-full rounded-xl overflow-hidden" style="background:url({{ $aboutImage }});">
                            <img src="{{ $aboutImage }}" alt="">
                        </div>
                        <div class="grid grid-rows-2 grid-cols-1 gap-4">
                            <div
                                class="bg-primary-base text-center rounded-xl relative flex items-center justify-center text-neutral-50 overflow-hidden">
                                <h1 class="font-extrabold text-xl sm:text-3xl md:text-6xl">WE ARE HERE <br> FOR YOU</h1>
                                <svg width="270" height="270" viewBox="0 0 270 270" fill="none"
                                    class="absolute -top-24 -left-[105px]" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity=".5" cx="135" cy="135" r="120.5" stroke="#D1DCD2"
                                        stroke-width="29" />
                                </svg>
                                <svg width="270" height="270" viewBox="0 0 270 270" fill="none"
                                    class="absolute -top-5 -left-[120px]" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity=".5" cx="135" cy="135" r="120.5" stroke="#D1DCD2"
                                        stroke-width="29" />
                                </svg>
                                <svg width="270" height="270" viewBox="0 0 270 270" fill="none"
                                    class="absolute -bottom-10 -right-[100px]" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity=".5" cx="135" cy="135" r="120.5" stroke="#D1DCD2"
                                        stroke-width="29" />
                                </svg>
                                <svg width="270" height="270" viewBox="0 0 270 270" fill="none"
                                    class="absolute -bottom-24 -right-[80px]" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity=".5" cx="135" cy="135" r="120.5" stroke="#D1DCD2"
                                        stroke-width="29" />
                                </svg>
                            </div>
                            <div class=" rounded-xl overflow-hidden flex justify-center items-center bg-neutral-50">
                                <div class="brand-logo fill-primary-base px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 84 34" fill="inherit"
                                        class="w-full">
                                        <g clip-path="url(#a)" fill="inherit">
                                            <path id="logo1" class="animate-[slideRight_1.5s_ease-in-out]"
                                                d="M19.939.5a12.24 12.24 0 0 0-8.746 3.7l-7.57 7.733A12.77 12.77 0 0 0 0 20.866C0 27.844 5.538 33.5 12.369 33.5a12.24 12.24 0 0 0 8.746-3.7l5.236-5.349L41.608 8.867A5.85 5.85 0 0 1 45.785 7.1c2.623 0 4.847 1.746 5.618 4.163l4.815-4.919C54.02 2.83 50.169.5 45.785.5a12.24 12.24 0 0 0-8.746 3.7L16.546 25.133a5.85 5.85 0 0 1-4.177 1.767c-3.263 0-5.907-2.701-5.907-6.034a6.1 6.1 0 0 1 1.73-4.266l7.57-7.733A5.85 5.85 0 0 1 19.939 7.1c2.623 0 4.847 1.746 5.618 4.163l4.815-4.919C28.175 2.83 24.323.5 19.939.5" />
                                            <path id="logo2" class="animate-[slideLeft_1.5s_ease-in-out]"
                                                d="M42.392 25.133a5.85 5.85 0 0 1-4.177 1.767c-2.623 0-4.846-1.746-5.617-4.162l-4.815 4.919C29.979 31.17 33.83 33.5 38.215 33.5a12.24 12.24 0 0 0 8.746-3.7L67.454 8.867A5.85 5.85 0 0 1 71.631 7.1c3.263 0 5.907 2.701 5.907 6.034a6.1 6.1 0 0 1-1.73 4.266l-7.57 7.733a5.85 5.85 0 0 1-4.177 1.767c-2.623 0-4.846-1.746-5.617-4.162l-4.815 4.918C55.825 31.17 59.677 33.5 64.06 33.5a12.24 12.24 0 0 0 8.746-3.7l7.57-7.733A12.77 12.77 0 0 0 84 13.134C84 6.156 78.462.5 71.631.5a12.24 12.24 0 0 0-8.746 3.7z" />
                                        </g>
                                        <defs>
                                            <clipPath id="a">
                                                <path fill="#fff" d="M0 .5h84v33H0z" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="mitra" class="px-3 md:px-11 mb-16">
            <div class="bg-primary-base rounded-xl py-4 md:py-12 px-2 md:px-6">
                <div class="header text-center">
                    <h6 class="text-neutral-50 text-xl md:text-7xl font-bold mb-2">Mitra</h6>
                    <h1 class="text-neutral-50 text-lg md:text-4xl font-normal">Desa Darurejo - Jombang</h1>
                </div>
                <div class="body grid lg:grid-cols-2 xl:grid-cols-3 gap-4 mt-5 lg:mt-10">
                    <div class="xl:col-span-2 flex flex-col gap-4 justify-between">
                        <div class="bg-neutral-50 rounded-xl xl:grow p-4 md:p-6">
                            <h1 class="text-base md:text-xl lg:text-4xl 2xl:text-6xl font-bold">Desa Darurejo</h1>
                            <div class="mt-2 md:mt-6">
                                <p class="text-xs md:text-sm lg:text-base 2xl:text-xl">Darurejo adalah sebuah desa di
                                    wilayah
                                    Kecamatan
                                    Plandaan,
                                    Kabupaten
                                    Jombang, Provinsi Jawa Timur.
                                    Dengan jumlah penduduk 4.798 jiwa yang sebagian besar penduduk
                                    bekerja di sektor pertanian, baik sebagai petani maupun buruh tani. Penghasilan yang
                                    diperoleh bergantung pada kondisi alam dan musim. Ketika panen melimpah, penghasilan
                                    yang diperoleh relatif stabil.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-xl lg:grow xl:shrink">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31650.5527569458!2d112.1704836756068!3d-7.429896969030947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e783c49504cfa87%3A0x6eab2dc5fe635aa2!2sDarurejo%2C%20Plandaan%2C%20Jombang%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1722839245433!5m2!1sen!2sid"
                                class="w-full h-[397px] lg:h-full" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="rounded-xl overflow-hidden w-full">
                        <img src="{{ $mitraImage }}" alt="" class="w-full object-cover">
                    </div>
                </div>
            </div>
        </section>
        <section id="our-team-people" class="px-3 md:px-11 mb-16">
            <div class="header mb-8 px-1 md:px-0">
                <h6 class="text-primary-500 text-sm md:text-xl font-medium">Our Team</h6>
                <h1 class="text-neutral-base text-lg md:text-4xl font-semibold">Our Excellence Team</h1>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 grid-rows-2 gap-4">
                @foreach ($teamImage as $memberName => $data)
                    <div
                        @if ($data['nim'] == '') class="team-card rounded-xl overflow-hidden order-first md:order-none" 
                        @elseif ($data['nim'] == '2141762057') class="team-card rounded-xl overflow-hidden order-last md:order-none"
                        @else class="team-card rounded-xl overflow-hidden" @endif>
                        <div class="image-team w-full h-[564px] bg-cover bg-center hover:scale-110 transition-all duration-300 ease-in-out delay-150"
                            @if ($data['nim'] == '') style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 15.45%, rgba(0, 0, 0, 0.60) 77.73%), url({{ $data['path'] }}) lightgray 0px -2.842px / 100% 117.586% no-repeat;" 
                            @elseif($data['nim'] == '2241720052') style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 15.45%, rgba(0, 0, 0, 0.60) 77.73%), url({{ $data['path'] }}) lightgray -54px -122.153px / 124.434% 130.024% no-repeat;" 
                            
                            @else 
                            style="background:linear-gradient(180deg, rgba(0, 0, 0, 0.00) 15.45%, rgba(0, 0, 0, 0.60) 77.73%), url('{{ $data['path'] }}') lightgray 50% / cover no-repeat;" @endif>

                            <div
                                class="px-4 pb-9 w-full h-full flex flex-col justify-end text-neutral-50 backdrop-grayscale hover:backdrop-grayscale-0 transition-all duration-200 ease-in hover:scale-75 delay-150">
                                <h1 class="font-semibold text-2xl mb-1">{{ $memberName }}</h1>
                                <h5 class="text-sm text-neutral-100 mb-2">{{ $data['nim'] }}</h5>
                                <h2 class="font-medium">{{ $data['position'] }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
        @include('includes.footer')
    </main>
@endsection

@push('scripts')
    <script type="module">
        // Create the observer
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                // If the element is visible
                if (entry.isIntersecting) {
                    // run the animation class
                    window.utils.Animate.counter.animateCount(event)
                }
            });
        });

        const observerLogo = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                // If the element is visible
                if (entry.isIntersecting) {
                    // run the animation class
                    $(entry.target).find('#logo1').addClass('animate-[slideRight_1.5s_ease-in-out]')
                    $(entry.target).find('#logo2').addClass('animate-[slideLeft_1.5s_ease-in-out]')
                } else {

                    $(entry.target).find('#logo1').removeClass('animate-[slideRight_1.5s_ease-in-out]')
                    $(entry.target).find('#logo2').removeClass('animate-[slideLeft_1.5s_ease-in-out]')
                }
            });
        });


        function observerCallback(entries, observer) {
            entries.forEach(entry => {
                let name = $(entry.target).attr('id')
                if (entry.isIntersecting) {
                    $('#nav-' + name).addClass('active-navbar')
                } else {
                    $('#nav-' + name).removeClass('active-navbar')

                }
            });
        }
        const observerNews = new IntersectionObserver(observerCallback);
        observerNews.observe(document.querySelector('#news'))

        const observerHero = new IntersectionObserver(observerCallback);
        observerHero.observe(document.querySelector('#hero'))

        const observerTeam = new IntersectionObserver(observerCallback);
        observerTeam.observe(document.querySelector('#team'))

        // Tell the observer which elements to track
        observer.observe(document.querySelector('.Count'));

        observerLogo.observe(document.querySelector('.brand-logo'));
    </script>
@endpush
