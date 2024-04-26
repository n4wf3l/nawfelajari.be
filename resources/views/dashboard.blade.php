<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard - NA</title>
    <link rel="icon" href="{{ asset('logonai.png') }}" type="image/x-icon" />
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

        html {
            scroll-behavior: smooth;
        }
        /* Ajoutez ici vos styles supplémentaires */

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
                <button id="hamburgerBtn" class="md:hidden block text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div id="navLinks" class="hidden md:flex gap-5 justify-between pr-5 text-lg font-medium text-white whitespace-nowrap"><div>
                <a href="{{ url('/') }}"  class="hover:text-teal-300">Accueil</a>
            </div>

            <div>
    <a href="{{ url('/') }}#about" class="hover:text-teal-300">Services</a>
</div>
            <div>
                <a href="{{ url('/') }}#projects" class="hover:text-teal-300">Projets</a>
            </div>
            <div>
            <a href="{{ route('about') }}" class="hover:text-teal-300">À propos</a>
            </div>
        <div>
        <a href="{{ route('posts.index') }}" class="hover:text-teal-300">Nouveautés</a>
        </div>
    <div>
    <a href="{{ route('contact') }}" class="hover:text-teal-300">Contact</a>
        </div> |
        <div>
        <a href="{{ url('/dashboard') }}"  class="text-teal-300 hover:text-teal-300">Dashboard</a>
        </div>
    </div>
    </div>
    <main class="px-4 py-8">
    <section class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-6 text-white mt-40">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg p-6 border border-black">
                <h2 class="text-xl font-semibold mb-4">Ajouter un site publié</h2>
                <form action="{{ route('projets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nom_societe">Nom de la société :</label>
                        <input type="text" name="nom_societe" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="type_societe">Type de société :</label>
                        <input type="text" name="type_societe" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="type_site">Type de site :</label>
                        <input type="text" name="type_site" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="lieu">Lieu :</label>
                        <input type="text" name="lieu" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="jours_developpement">Jours de développement :</label>
                        <input type="number" name="jours_developpement" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="langage_programmation">Langage de programmation :</label>
                        <input type="text" name="langage_programmation" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="etoiles">Étoiles (satisfaction) :</label>
                        <select name="etoiles" required class="border border-gray-300 p-2 rounded-md w-full">
                            <option value="★☆☆☆☆">★☆☆☆☆</option>
                            <option value="★★☆☆☆">★★☆☆☆</option>
                            <option value="★★★☆☆">★★★☆☆</option>
                            <option value="★★★★☆">★★★★☆</option>
                            <option value="★★★★★">★★★★★</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nombre_collaborateurs">Nombre de collaborateurs :</label>
                        <input type="number" name="nombre_collaborateurs" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="lien">Lien :</label>
                        <input type="text" name="lien" required class="border border-gray-300 p-2 rounded-md w-full" placeholder="https://exemple.com">
                    </div>
                    <div class="mb-4">
                        <label for="image">Photo :</label>
                        <input type="file" name="image" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-teal-300 text-white hover:bg-teal-500 rounded-md">Ajouter le projet</button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-lg p-6 border border-black">
                <h2 class="text-xl font-semibold mb-4">Ajouter un projet académique</h2>
                <form action="{{ route('academic_projets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nom_societe">Nom de la société :</label>
                        <input type="text" name="nom_societe" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="type_societe">Type de société :</label>
                        <input type="text" name="type_societe" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="type_site">Type de site :</label>
                        <input type="text" name="type_site" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="lieu">Lieu :</label>
                        <input type="text" name="lieu" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="jours_developpement">Jours de développement :</label>
                        <input type="number" name="jours_developpement" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="langage_programmation">Langage de programmation :</label>
                        <input type="text" name="langage_programmation" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="etoiles">Étoiles (satisfaction) :</label>
                        <select name="etoiles" required class="border border-gray-300 p-2 rounded-md w-full">
                            <option value="★☆☆☆☆">★☆☆☆☆</option>
                            <option value="★★☆☆☆">★★☆☆☆</option>
                            <option value="★★★☆☆">★★★☆☆</option>
                            <option value="★★★★☆">★★★★☆</option>
                            <option value="★★★★★">★★★★★</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nombre_collaborateurs">Nombre de collaborateurs :</label>
                        <input type="number" name="nombre_collaborateurs" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="lien">Lien :</label>
                        <input type="text" name="lien" required class="border border-gray-300 p-2 rounded-md w-full" placeholder="https://exemple.com">
                    </div>
                    <div class="mb-4">
                        <label for="image">Photo :</label>
                        <input type="file" name="image" required class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-500">Ajouter le projet</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
    <div class="bg-white rounded-lg p-6 border border-black">
            <!-- Autres éléments de votre tableau de bord -->
            <h2 class="text-xl font-semibold mb-4">Créer une nouvelle publication</h2>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre:</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Sujet:</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                        <textarea name="description" id="description" class="border border-gray-300 p-2 rounded-md w-full">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Photo:</label>
                        <input type="file" name="photo" id="photo" class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-500">Créer</button>
                    </div>
                </form>
        </div>


        <div class="bg-white rounded-lg p-6 border border-black">
        <h2 class="text-xl font-semibold mb-4">Ajouter un nouveau message</h2>
   
        <!-- Affichage message -->
         <div class="mt-8 mb-8">
            @foreach($messages as $message)
                <div class="bg-gray-200 p-4 rounded-lg">
                    <p>{{ $message->content }}</p>
                </div>
            @endforeach
    </div>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu du message</label>
                <textarea name="content" id="content" rows="3" class="border border-gray-300 p-2 rounded-md w-full" required>{{ $message->content ?? '' }}</textarea>
            </div>
            <div class="mb-4">
                <input type="hidden" name="enabled" value="1"> <!-- Champ caché avec la valeur 1 -->
                <input type="checkbox" name="enabled_checkbox" id="enabled" class="border border-gray-300 rounded-md" {{ isset($message) && $message->enabled ? 'checked' : '' }} disabled> <!-- Champ de case à cocher désactivé -->
                <label for="enabled" class="inline-block text-sm font-medium text-gray-700 ml-2">Activer le message</label>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-900 text-white hover:bg-teal-500 rounded-md">Ajouter le message</button>
            </div>
        </form>
    </div>
</section>

</main>

<footer class="bg-gray-100 py-12">
    <div class="container mx-auto">
        <div class="border-t border-gray-300"></div>
        <div class="flex justify-between items-center mt-8">
            <div class="w-1/2 md:w-2/3 lg:w-1/3">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">À propos de NA</h2>
                <p class="text-sm text-gray-600">NA est un ingénieur software et développeur fullstack diplômé et formé à la Haute Ecole Erasmus de Bruxelles. </p>
                <div class="flex items-center mt-6">
                <a href="https://www.instagram.com/natechforge/" target="_blank" rel="noopener noreferrer">
        <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/949187d7ee1e2afd8a023c671f59d74c39c29d054926767f17b217fed5475910?apiKey=d3784f4c52b7403885832573b3287702&"
            class="aspect-square w-[50px] hover:bg-teal-300 hover:rounded-full cursor-pointer" />
    </a>
    <a href="https://twitter.com/AjariNawfel" target="_blank" rel="noopener noreferrer">
        <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/a7d60a3960400d8a490b85c9fa9558bb8a2473d9b8b90dc4a3c6c99c2b361f7f?apiKey=d3784f4c52b7403885832573b3287702&"
            class="aspect-square w-[50px] hover:bg-teal-300 hover:rounded-full cursor-pointer" />
    </a>
    <a href="https://be.linkedin.com/in/nawfel-ajari" target="_blank" rel="noopener noreferrer">
        <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/20b91319aa8c73e3d645eb4aeefedc7f337acd87cc2bcea1a90ca77d18e63440?apiKey=d3784f4c52b7403885832573b3287702&"
            class="aspect-square w-[50px] hover:bg-teal-300 hover:rounded-full cursor-pointer" />
    </a>
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