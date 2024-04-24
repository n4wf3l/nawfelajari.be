<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>À propos - NA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Styles -->
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        .mainVideo {
    width: 100%;
    height: 450px;
    border-radius: 10px;
    position: relative;
    z-index: 10;
}

.videoContainer {
    width: 100%;
    height: 450px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.dotsImg {
    position: absolute;
    width: 90%;
    height: 90%; /* Ajustez la taille selon vos besoins */
    top: -10%; /* Décalage vers le haut */
    right: -10%; /* Décalage vers la droite */
    object-fit: cover;
}


    </style>
    @vite('resources/css/app.css')
</head>

<body>
    <div id="app">
        <!-- Header avec le logo et le menu hamburger (qui remplace les nav links sur les petits écrans) -->
        <div class="flex flex-col py-12 bg-gray-900">
            <div class="flex justify-between items-center self-center mt-1 w-full max-w-[1298px] px-4 relative"> <!-- Ajoutez relative ici pour positionner les éléments absolus par rapport à celui-ci -->
                <div class="text-3xl font-bold text-white">NA
                    @auth <!-- Vérifie si l'utilisateur est connecté -->
                    <span id="logoutMenuBtn" class="ml-2 text-teal-300 cursor-pointer"> <!-- Ajoutez un ID pour le bouton de déconnexion -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block transform rotate-90"
                                viewBox="0 0 20 20" fill="currentColor"> <!-- Ajoute une icône de flèche déroulante -->
                                <path fill-rule="evenodd"
                                    d="M10 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1.447-.895l8 6a1 1 0 0 1 0 1.79l-8 6A1 1 0 0 1 10 18z"></path>
                            </svg>
                            <div id="logoutMenu"
                                class="absolute mt-2 bg-gray-900 border border-gray-300 rounded-md shadow-md hidden"> <!-- Utilisez top-full pour positionner le menu en dessous de la flèche déroulante -->
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-red-800 hover:text-white transition duration-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <!-- Lien de déconnexion -->
                                    {{ __('Log Out') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </span>
                        @endauth
                </div>
                <!-- Bouton du menu hamburger (visible uniquement sur les petits écrans) -->
                <button id="hamburgerBtn" class="md:hidden block text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
 
                <div id="navLinks"
                    class="hidden md:flex gap-5 justify-between pr-5 text-lg font-medium text-white whitespace-nowrap">
                    <div>
                        <a href="/" class="hover:text-teal-300 transition duration-500">Accueil</a>
                    </div>
                    <div>
                        <a href="{{ url('/') }}#about" class="hover:text-teal-300 transition duration-500">Services</a>
                    </div>
                    <div>
                        <a href="{{ url('/') }}#projects" class="hover:text-teal-300 transition duration-500">Projets</a>
                    </div>
                    <div>
                        <a href="{{ route('about') }}" class="text-teal-300 hover:text-teal-300 transition duration-500">À propos</a>
                    </div>
                    <div>
                        <a href="" class="hover:text-teal-300 transition duration-500">Nouveautés</a>
                    </div>
                    <div>
                        <a href="{{ route('contact') }}" class="hover:text-teal-300 transition duration-500">Contact</a>
                    </div>
                    @auth
                    |
                    <div>
                        <a href="{{ url('/dashboard') }}"
                            class="hover:text-teal-300">Dashboard</a>
                    </div>
                    @endauth
                </div>
            </div>

            <div class="flex gap-5 justify-between self-center mt-44 w-full max-w-[1012px] max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                <div class="flex flex-col flex-1 px-5 max-md:max-w-full">
                    <div class="mt-11 text-9xl font-bold text-white max-md:mt-10 max-md:max-w-full max-md:text-4xl">
                        À propos de moi
                    </div>
        <div
            class="flex gap-5 justify-between self-center px-5 mt-20 w-full max-w-[1070px] max-md:flex-wrap max-md:mt-10 max-md:max-w-full mb-20">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/88cfe832740fbad72af762269deeb7853d23d146e7bb9ebd24562abdc05bfcb1?apiKey=d3784f4c52b7403885832573b3287702&"
                class="flex-1 shrink-0 w-full aspect-[1.49] fill-sky-200" />
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/88cfe832740fbad72af762269deeb7853d23d146e7bb9ebd24562abdc05bfcb1?apiKey=d3784f4c52b7403885832573b3287702&"
                class="flex-1 shrink-0 w-full aspect-[1.49] fill-sky-200" />
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/88cfe832740fbad72af762269deeb7853d23d146e7bb9ebd24562abdc05bfcb1?apiKey=d3784f4c52b7403885832573b3287702&"
                class="flex-1 shrink-0 w-full aspect-[1.49] fill-sky-200" />
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/88cfe832740fbad72af762269deeb7853d23d146e7bb9ebd24562abdc05bfcb1?apiKey=d3784f4c52b7403885832573b3287702&"
                class="flex-1 shrink-0 w-full aspect-[1.49] fill-sky-200" />
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/88cfe832740fbad72af762269deeb7853d23d146e7bb9ebd24562abdc05bfcb1?apiKey=d3784f4c52b7403885832573b3287702&"
                class="flex-1 shrink-0 w-full aspect-[1.49] fill-sky-200" />
        </div>
        </div>
        </div>

        <section class="px-8 py-12 bg-gray-100">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center">Qui suis-je ?</h2>

        <p class="text-lg mb-6">
            Bonjour, je m'appelle Nawfel Ajari et je suis un ingénieur en informatique passionné par la création d'expériences en ligne captivantes et fonctionnelles. En fusionnant créativité et compétences techniques solides, je m'efforce de donner vie à des concepts numériques innovants. Mon objectif est de créer des sites web et des applications mobiles qui attirent non seulement visuellement mais offrent également des performances optimales et une convivialité exceptionnelle.
        </p>

        <p class="text-lg mb-6">
            Au-delà de ma passion pour la programmation, je possède également des compétences en rédaction sportive et en montage vidéo. Bien que j'aie moins d'expérience dans ce domaine, je vous invite à jeter un œil à la vidéo située sur le côté droit de votre écran. Elle reflète mon désir constant de diversifier mes compétences et de relever de nouveaux défis.
        </p>

        <h2 class="text-3xl font-bold mb-6 text-center">Compétences</h2>

<p class="text-lg mb-6">
    En tant que développeur passionné, j'ai acquis une solide expertise technique et une capacité avérée à créer des solutions logicielles efficaces. Voici un aperçu de mes compétences techniques :
</p>

<ul class="list-disc pl-6 mb-6">
    <li class="text-lg mb-4">
        👨🏽‍💻 Portefeuille diversifié sur GitHub : Mon engagement envers la résolution de problèmes complexes et le travail d'équipe se reflète dans mes nombreux projets disponibles sur GitHub. Chacun de ces projets démontre ma capacité à développer des solutions logicielles efficaces et innovantes.
    </li>
    <li class="text-lg mb-4">
        📚 Bases solides et ambition de croissance : Diplômé en programmation de l'Erasmushogeschool Brussel, j'ai acquis une base solide dans les principes fondamentaux du développement logiciel. Actuellement, je me spécialise en ingénierie logicielle, avec une expertise particulière en Laravel 10 PHP, pour approfondir mes compétences et ma compréhension des systèmes logiciels.
    </li>
    <li class="text-lg mb-4">
        💻 Compétences techniques : Je suis compétent dans une variété de langages de programmation, notamment JavaScript (React, Node.js), C#, et Java pour Android. De plus, je suis à l'aise avec les frameworks modernes qui me permettent de développer des applications web et mobiles robustes et évolutives.
    </li>
    <li class="text-lg mb-4">
        🌐 Maîtrise des langues et adaptabilité : En plus de mes compétences techniques, je suis également fluent en anglais, néerlandais et français, ce qui me permet de m'adapter et de collaborer efficacement dans des environnements multiculturels.
    </li>
</ul>

    </div>
</section>

      <section class="px-8 py-12 text-white">
        <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center">Spécialisation</h2>

        <p class="text-lg mb-6">
        Ma spécialisation se concentre sur tous les aspects liés aux systèmes sportifs, avec une emphase particulière sur le football. Mon expertise s'étend à la création de diverses plateformes, telles que des sites de rédaction sportive, des portails pour les clubs de football ou de futsal, ainsi que des systèmes d'administration destinés à ces clubs. 
        </p>

        <p class="text-lg mb-6">
        Je suis capable de concevoir des fonctionnalités avancées, telles que les onze types de la semaine, en utilisant des données provenant d'API spécialisées dans le domaine du football. Ces fonctionnalités visent à offrir une expérience immersive et interactive aux utilisateurs, tout en répondant aux besoins spécifiques des clubs et des fans.
        </p>

        <p class="text-lg mb-6">
        La plupart de mes projets académiques réalisés à l'Erasmushogeschool ont été développés en collaboration avec la Fédération belge de football. Certains de ces projets sont disponibles sur mon profil GitHub, offrant ainsi un aperçu de mon travail et de mes compétences dans ce domaine passionnant.
        </p>

        <div class="flex justify-center mt-20 mb-20">
            <div class="videoContainer">
                <iframe allowfullscreen="allowfullscreen" class="mainVideo" controls="controls"
                    src="https://www.youtube.com/embed/AHnA9_U4K5o"></iframe>
                <img class="dotsImg image-block"
                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
            </div>
        </div>
    </div>
</section>
</div>

<footer class="bg-gray-100 py-12">
        <div class="container mx-auto">
        <div class="border-t border-gray-300"></div>
        <div class="flex justify-between items-center mt-8">
            <div class="w-1/2 md:w-2/3 lg:w-1/3">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">À propos de NA</h2>
                <p class="text-sm text-gray-600">NA est un ingénieur software et développeur fullstack diplômé et formé à la Haute Ecole Erasmus de Bruxelles. </p>
                <div class="flex items-center mt-6">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/949187d7ee1e2afd8a023c671f59d74c39c29d054926767f17b217fed5475910?apiKey=d3784f4c52b7403885832573b3287702&"
                        class="aspect-square w-[50px]" />
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/a7d60a3960400d8a490b85c9fa9558bb8a2473d9b8b90dc4a3c6c99c2b361f7f?apiKey=d3784f4c52b7403885832573b3287702&"
                        class="aspect-square w-[50px]" />
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/20b91319aa8c73e3d645eb4aeefedc7f337acd87cc2bcea1a90ca77d18e63440?apiKey=d3784f4c52b7403885832573b3287702&"
                        class="aspect-square w-[50px]" />
                </div>
            </div>
            <div class="w-1/2 md:w-1/3 lg:w-1/4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact</h2>
                <div class="text-sm text-gray-600">
                    <p class="mb-2">170 Nijverheidskaai, Anderlecht</p>
                    <p class="mb-2">info@nawfelajari.be</p>
                    <p>+977-9876543210</p>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-300 mt-12"></div>
    </div>
</footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const navLinks = document.getElementById('navLinks');

            hamburgerBtn.addEventListener('click', () => {
                navLinks.classList.toggle('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const logoutMenuBtn = document.getElementById('logoutMenuBtn');
            const logoutMenu = document.getElementById('logoutMenu');

            // Fonction pour basculer l'affichage du menu de déconnexion
            function toggleLogoutMenu() {
                logoutMenu.classList.toggle('hidden');
            }

            // Ajoutez un gestionnaire d'événements pour le clic sur le bouton de menu de déconnexion
            logoutMenuBtn.addEventListener('click', function () {
                toggleLogoutMenu();
            });

            // Ajoutez un gestionnaire d'événements pour masquer le menu de déconnexion lorsque l'utilisateur clique en dehors de celui-ci
            document.addEventListener('click', function (event) {
                if (!logoutMenuBtn.contains(event.target) && !logoutMenu.contains(event.target)) {
                    logoutMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>