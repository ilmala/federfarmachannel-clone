<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FederFarma Channel</title>

    <link rel="stylesheet" href="css/app.css">
    <script defer src="https://unpkg.com/alpinejs@3.7.0/dist/cdn.min.js"></script>
    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.store('player', {
          init() {
            this.videos = JSON.parse(<?= json_encode($videos)?>)
            if(this.videos.length) {
              this.setCurrentVideoByIndex(0);
            }
            console.log(this.videos)
          },

          videos: [],

          currentVideoId: null,
          currentVideoShow: null,

          get current() {
            return this.videos.find(video => video.id === this.currentVideoId);
          },

          setCurrentVideoByIndex(index) {
            this.currentVideoId = this.videos[index].id;
            this.currentVideoShow = false;
          },

          select(index) {
            this.setCurrentVideoByIndex(index);
            this.currentVideoShow = false;
          },

          showCurrentVideo(){
            this.currentVideoShow = true;
          }
        })
      })
    </script>
</head>
<body class="antialiased">
<header class="bg-main-dark">
    <!-- Top Navigation -->
    <div class="container mx-auto flex justify-between items-center px-8 desktop:px-0 pt-10 desktop:pt-16 pb-[35px]">
        <img src="img/logo-ffc-white.svg" class="h-[44px]" alt="logo feder farma channel">
        <nav class="hidden desktop:flex items-center space-x-16">
            <a href="#" class="font-semibold text-white text-sm">Videogiornale</a>
            <a href="#" class="font-semibold text-white text-sm">In primo piano</a>
            <a href="#" class="font-semibold text-white text-sm">Un caffè con</a>
            <div class="relative" x-data="{ open: false }" :class="open ? 'bg-main-dark shadow-video-big' : '' ">
                <a href="#" @click.prevent="open = ! open" class="relative z-[100] flex items-center font-semibold text-white text-sm">
                    <span>Altre rubriche</span>
                    <img x-show="open" src="img/arrow-up.svg" class="ml-2" alt="arrow down">
                    <img x-show="!open" src="img/arrow-down.svg" class="ml-2" alt="arrow down">
                </a>
                <div x-show="open" x-transition @click.outside="open = false" class="z-[90] w-[200] bg-main-dark shadow-video-big rounded-lg -mt-12 pt-14 pb-4 flex flex-col  absolute -left-8 -right-8">
                    <a href="#" class="font-semibold flex items-center text-white text-sm px-8 py-2.5">
                        <span class="inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                        Galencia
                    </a>
                    <a href="#" class="font-semibold flex items-center text-white text-sm px-8 py-2.5">
                        <span class="inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                        Tecnologia
                    </a>
                    <a href="#" class="font-semibold flex items-center text-white text-sm px-8 py-2.5">
                        <span class="inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                        Pillole di salute
                    </a>
                </div>
            </div>
            <a href="#" class="w-12 h-12 flex justify-center items-center rounded-full bg-white/10">
                <img src="img/icons-search.svg" class="w-7 h-7" alt="icon search">
            </a>
        </nav>
        <div x-data="{open: false}" class="flex flex-col desktop:hidden relative">
            <button @click.prevent="open = true">
                <img src="img/icons-menu.svg" alt="menu">
            </button>

            <div x-show="open" x-transition class="fixed flex flex-col inset-0 bg-main-dark z-[110]">
                <div class="px-8 py-10 flex justify-between items-center">
                    <img src="img/logo-ffc-white.svg" class="h-[44px]" alt="logo feder farma channel">
                    <button @click.prevent="open = false">
                        <img src="img/icons-close.svg" alt="menu">
                    </button>
                </div>
                <div class="px-8 py-10 border-t border-black">
                    <div class="flex bg-white/10 rounded-full">
                        <input type="text" class="appearance-none text-white flex-1 px-4 h-12 bg-transparent outline-none"/>
                        <button class="p-3">
                            <img src="img/icons-search.svg" class="w-7 h-7" alt="icon search">
                        </button>
                    </div>
                </div>
                <nav class="px-8 flex-1 flex flex-col items-center space-y-10">
                    <a href="#" class="font-semibold text-xl text-white">Videogiornale</a>
                    <a href="#" class="font-semibold text-xl text-white">In primo piano</a>
                    <a href="#" class="font-semibold text-xl text-white">Un caffè con</a>
                    <a href="#" class="font-semibold text-xl text-white">Galenica</a>
                    <a href="#" class="font-semibold text-xl text-white">Tecnologie</a>
                    <a href="#" class="font-semibold text-xl text-white">Pillole di salute</a>
                </nav>
                <div class="px-8 py-10">
                    <p class="text-2xs text-center text-white">Copyright 2021 © FerderFarma Channel</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero -->
    <div x-data class="container mx-auto pb-[95px]">
        <!-- Player -->
        <div class="block w-full h-[375px] desktop:h-[545px] bg-main-light shadow-video-big relative bg-cover bg-center" :style="`background-image: url('img/covers/${$store.player.current.image_url}');`">
            <iframe x-show="$store.player.currentVideoShow" class="w-full h-full" :src="$store.player.current.video_url" :title="$store.player.current.title"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            <div x-show="!$store.player.currentVideoShow" class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div x-show="!$store.player.currentVideoShow" class="absolute inset-x-0 bottom-0 text-white px-8 py-4 desktop:px-12 desktop:py-12">
                <p class="text-base">Edizione del</p>
                <h3 class="font-semibold text-3xl desktop:text-5xl desktop:mb-6">
                    <span x-text="$store.player.current.publishedAt"></span>
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                            <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                            <span x-text="$store.player.current.duration"></span>
                        </span>
                </h3>

                <ul class="hidden desktop:block space-y-2">
                    <li class="font-semibold text-3xl flex items-center">
                        <span class="inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                        <span x-text="$store.player.current.title" class="truncate"></span>
                    </li>
                    <li class="font-medium text-2sm flex items-center">
                        <span class="inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                        <span x-text="$store.player.current.guests"></span>
                    </li>
                </ul>
            </div>

            <div x-show="!$store.player.currentVideoShow" class="absolute inset-0 flex justify-center items-center">
                <button>
                    <img src="img/icons-play.svg" class="w-24" alt="play" @click="$store.player.showCurrentVideo()">
                </button>
            </div>
        </div>

        <ul class="desktop:hidden mx-8 py-8 text-white space-y-2 border-b border-black">
            <li class="font-semibold text-xl flex items-center">
                <span class="shrink-0 inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                <span x-text="$store.player.current.title" class="truncate"></span>
            </li>
            <li x-show="$store.player.current.guests" class="font-medium text-2sm flex items-center">
                <span class="shrink-0 inline-block w-1.5 h-1.5 bg-main-base rounded-full mr-2"></span>
                <span x-text="$store.player.current.guests"></span>
            </li>
        </ul>

        <!-- Video list -->
        <div class="mt-12">
            <p class="font-semibold text-white px-8 desktop:hidden mb-2">Edizioni precedenti:</p>
            <div class="">
                <div class="overflow-x-auto flex gap-1 pb-3 pl-8 desktop:pl-0 scroll-pl-8 desktop:scroll-pl-0 snap-x">
                    <template x-for="(video, index) in $store.player.videos" :key="video.id">
                        <a href="#" @click.prevent="$store.player.select(index)" class="snap-start shrink-0 bg-main-light w-[260px] h-[150px] relative bg-cover bg-center" :style="`background-image: url('img/covers/${video.image_url}');`">
                            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

                            <div class="absolute inset-x-0 bottom-0 flex justify-between items-center text-white px-4 py-2">
                                <h3 class="font-semibold text-xl" x-text="video.publishedAt"></h3>
                                <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                                    <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                                    <span x-text="video.duration"></span>
                                </span>
                            </div>
                        </a>
                    </template>

                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <a href="#" class="inline-flex items-center h-6 px-4 bg-black/25 hover:bg-black/50 font-semibold text-xs text-main-base transition duration-200">
                    Tutte le edizioni
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Video slider XXL -->
<section class="bg-main-dark">
    <div class="overflow-x-auto flex gap-0.5 snap-x">
        <div class="relative shrink-0 snap-center bg-main-base w-[290px] h-[460px] desktop:w-[390px] desktop:h-[550px] bg-cover bg-center" style="background-image: url('img/sliders/slider-1.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div class="absolute left-0 bottom-[179px] desktop:bottom-[179px] desktop:bottom-[199px]">
                <div class="bg-white/30 font-medium text-white uppercase px-6 py-2.5">Galenica</div>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[170px] desktop:h-[170px] desktop:h-[190px] px-6 py-6 flex flex-col h-full">
                <h2 class="flex-1 font-semibold text-xl desktop:text-2xl text-white leading-[1.17]">
                    Vaccini covid “farmacia essenziale per incremento somministrazioni
                </h2>
                <div class="flex justify-end">
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                        <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                        03:11
                    </span>
                </div>
            </div>
        </div>
        <div class="relative shrink-0 snap-center bg-main-base w-[290px] h-[460px] desktop:w-[390px] desktop:h-[550px] bg-cover bg-center" style="background-image: url('img/sliders/slider-2.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div class="absolute left-0 bottom-[179px] desktop:bottom-[199px]">
                <div class="bg-white/30 font-medium text-white uppercase px-6 py-2.5">Galenica</div>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[170px] desktop:h-[190px] px-6 py-6 flex flex-col h-full">
                <h2 class="flex-1 font-semibold text-xl desktop:text-2xl text-white leading-[1.17]">
                    Vaccini covid “farmacia essenziale per incremento somministrazioni
                </h2>
                <div class="flex justify-end">
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                        <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                        03:11
                    </span>
                </div>
            </div>
        </div>
        <div class="relative shrink-0 snap-center bg-main-base w-[290px] h-[460px] desktop:w-[390px] desktop:h-[550px] bg-cover bg-center" style="background-image: url('img/sliders/slider-3.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div class="absolute left-0 bottom-[179px] desktop:bottom-[199px]">
                <div class="bg-white/30 font-medium text-white uppercase px-6 py-2.5">Galenica</div>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[170px] desktop:h-[190px] px-6 py-6 flex flex-col h-full">
                <h2 class="flex-1 font-semibold text-xl desktop:text-2xl text-white leading-[1.17]">
                    C’è ancora spazio per i laboratori galenici, ecco le opportunità che li attendono
                </h2>
                <div class="flex justify-end">
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                        <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                        03:11
                    </span>
                </div>
            </div>
        </div>
        <div class="relative shrink-0 snap-center bg-main-base w-[290px] h-[460px] desktop:w-[390px] desktop:h-[550px] bg-cover bg-center" style="background-image: url('img/sliders/slider-4.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div class="absolute left-0 bottom-[179px] desktop:bottom-[199px]">
                <div class="bg-white/30 font-medium text-white uppercase px-6 py-2.5">Tecnologia</div>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[170px] desktop:h-[190px] px-6 py-6 flex flex-col h-full">
                <h2 class="flex-1 font-semibold text-xl desktop:text-2xl text-white leading-[1.17]">
                    Nuova app di monitoraggio da remoto dell’indice glicemico
                </h2>
                <div class="flex justify-end">
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                        <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                        03:11
                    </span>
                </div>
            </div>
        </div>
        <div class="relative shrink-0 snap-center bg-main-base w-[290px] h-[460px] desktop:w-[390px] desktop:h-[550px] bg-cover bg-center" style="background-image: url('img/sliders/slider-5.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div class="absolute left-0 bottom-[179px] desktop:bottom-[199px]">
                <div class="bg-white/30 font-medium text-white uppercase px-6 py-2.5">Tecnologia</div>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[170px] desktop:h-[190px] px-6 py-6 flex flex-col h-full">
                <h2 class="flex-1 font-semibold text-xl desktop:text-2xl text-white leading-[1.17]">
                    Vaccini covid “farmacia essenziale per incremento somministrazioni
                </h2>
                <div class="flex justify-end">
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                        <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                        03:11
                    </span>
                </div>
            </div>
        </div>
        <div class="relative shrink-0 snap-center bg-main-base w-[290px] h-[460px] desktop:w-[390px] desktop:h-[550px] bg-cover bg-center" style="background-image: url('img/sliders/slider-6.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-main-dark/20 to-main-dark opacity-80"></div>

            <div class="absolute left-0 bottom-[179px] desktop:bottom-[199px]">
                <div class="bg-white/30 font-medium text-white uppercase px-6 py-2.5">Galenica</div>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[170px] desktop:h-[190px] px-6 py-6 flex flex-col h-full">
                <h2 class="flex-1 font-semibold text-xl desktop:text-2xl text-white leading-[1.17]">
                    C’è ancora spazio per i laboratori galenici, ecco le opportunità che li attendono
                </h2>
                <div class="flex justify-end">
                    <span class="font-normal text-2xs text-white bg-main-dark/80 rounded inline-flex py-0.5 pl-0.5 pr-1.5 items-center">
                        <img src="img/icons-play-arrow.svg" class="w-4" alt="play icon">
                        03:11
                    </span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Guests -->
<section class="bg-grey-light py-16">
    <div class="container mx-auto">
        <div class="flex justify-between items-center px-8 desktop:px-0">
            <h2 class="font-semibold text-xl desktop:text-2xl text-main-dark">
                <img src="img/images-arcobaleno.png" class="w-[145px] h-[3px] mb-4" alt="arcobaleno">
                I nostri ospiti
            </h2>

            <img src="img/images-logo-ffc-logo-ffc.png" class="h-[55px] hidden desktop:block" alt="logo feder farma channel">
        </div>
        
        <div class="mt-8 overflow-x-scroll ml-8 desktop:ml-0">
            <div class="flex gap-0.5 mb-16">
                <?php foreach ($guests as $guest): ?>
                    <div class="shrink-0">
                        <img class="w-[193px] h-[300px] object-cover" src="img/guests/<?= $guest->image_url;?>" alt="<?= $guest->first_name.' '.$guest->last_name;?>">
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
</body>
</html>