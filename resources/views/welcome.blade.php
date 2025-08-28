<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Heitor Flávio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0a0a;
            background-image: radial-gradient(
                circle,
                rgba(0, 255, 255, 0.1) 0%,
                transparent 70%
            );
            scroll-behavior: smooth;
            overflow-x: hidden; /* Previne scroll horizontal */
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, #0ea5e9, #8b5cf6);
        }

        .skill-bar {
            transition: width 1.5s ease-in-out;
        }

        .project-card {
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .project-card:hover .project-image {
            transform: scale(1.05);
        }

        .project-image {
            transition: transform 0.5s ease;
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        .typewriter {
            overflow: hidden;
            border-right: .15em solid #0ea5e9;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .05em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }
            to {
                width: 100%
            }
        }

        @keyframes blink-caret {
            from, to {
                border-color: transparent
            }
            50% {
                border-color: #0ea5e9;
            }
        }

        .grid-pattern {
            background-image: linear-gradient(rgba(12, 12, 12, 0.9) 1px, transparent 1px),
            linear-gradient(90deg, rgba(12, 12, 12, 0.9) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Mobile menu styles - CORRIGIDO */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: rgba(17, 24, 39, 0.98);
            backdrop-filter: blur(20px);
            z-index: 1000;
            transition: right 0.3s ease-in-out;
            padding: 2rem;
            overflow-y: auto;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mobile-menu.active {
            right: 0;
        }

        /* Overlay para quando o menu estiver aberto */
        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Mobile specific adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr !important;
                gap: 0.5rem !important;
            }

            .skill-bars {
                padding: 0 1rem;
            }

            .project-card {
                margin-bottom: 1.5rem;
            }

            .contact-grid {
                grid-template-columns: 1fr !important;
                gap: 2rem !important;
            }

            .section-padding {
                padding: 3rem 1rem !important;
            }

            .typewriter {
                white-space: normal;
                border-right: none;
                animation: none;
            }

            /* Previne que o body scroll quando o menu está aberto */
            body.no-scroll {
                overflow: hidden;
            }
        }

        @media (max-width: 640px) {
            .hero-buttons {
                flex-direction: column;
                gap: 1rem;
            }

            .hero-buttons a {
                width: 100%;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr !important;
            }

            .mobile-menu {
                width: 100%;
                right: -100%;
            }
        }

        @media(max-height: 800px) {
            #go-down {
                display: none !important;
            }
        }

    </style>
</head>


<body class="dark text-gray-200">

<!-- Background Elements -->
<div class="fixed inset-0 pointer-events-none z-0 overflow-hidden grid-pattern"></div>

<div class="fixed inset-0 pointer-events-none z-0 opacity-20">
    <div class="absolute top-1/4 left-1/4 w-72 h-72 rounded-full bg-cyan-500/10 blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-72 h-72 rounded-full bg-purple-500/10 blur-3xl"></div>
</div>

<!-- Navigation -->
<nav class="top-0 w-full backdrop-blur-md z-50 fixed">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
        <a href="#"
           class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
            &lt;heitor.f/&gt;
        </a>

        <div class="hidden md:flex space-x-8">
            <a href="#inicio" class="hover:text-cyan-400 transition">Início</a>
            <a href="#sobre" class="hover:text-cyan-400 transition">Sobre</a>
            <a href="#projetos" class="hover:text-cyan-400 transition">Projetos</a>
            <a href="#habilidades" class="hover:text-cyan-400 transition">Habilidades</a>
            <a href="#contato" class="hover:text-cyan-400 transition">Contato</a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="https://github.com/heitorflavio" target="_blank"
               class="text-gray-400 hover:text-cyan-400 transition hidden sm:block">
                <i class="fab fa-github text-xl"></i>
            </a>
            <a href="https://www.linkedin.com/in/heitorflavio/" target="_blank"
               class="text-gray-400 hover:text-cyan-400 transition hidden sm:block">
                <i class="fab fa-linkedin text-xl"></i>
            </a>
            <a href="{{route('file.download')}}" target="_blank"
               class="text-gray-400 hover:text-cyan-400 transition hidden sm:block">
                <i class="fas fa-file-alt text-xl"></i>
            </a>
            <button id="mobile-menu-button" class="md:hidden text-gray-400 hover:text-white">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
         class="mobile-menu fixed inset-y-0 right-0 w-64 bg-gray-900/95 backdrop-blur-lg z-50 md:hidden p-6 border-l border-gray-800">
        <div class="flex justify-end mb-10">
            <button id="close-menu" class="text-gray-400 hover:text-white">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <div class="flex flex-col space-y-6">
            <a href="#inicio" class="text-lg hover:text-cyan-400 transition py-2">Início</a>
            <a href="#sobre" class="text-lg hover:text-cyan-400 transition py-2">Sobre</a>
            <a href="#projetos" class="text-lg hover:text-cyan-400 transition py-2">Projetos</a>
            <a href="#habilidades" class="text-lg hover:text-cyan-400 transition py-2">Habilidades</a>
            <a href="#contato" class="text-lg hover:text-cyan-400 transition py-2">Contato</a>
        </div>

        <div class="absolute bottom-8 left-6 right-6">
            <div class="flex justify-center space-x-6">
                <a href="https://github.com/heitorflavio" target="_blank" class="text-gray-400 hover:text-cyan-400 transition">
                    <i class="fab fa-github text-2xl"></i>
                </a>
                <a href="https://www.linkedin.com/in/heitorflavio/" target="_blank" class="text-gray-400 hover:text-cyan-400 transition">
                    <i class="fab fa-linkedin text-2xl"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header id="inicio" class="relative flex flex-col items-center justify-center min-h-screen text-center px-4 pt-20">
    <div class="floating-element mb-8">
        <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-r from-cyan-500 to-purple-500 p-1">
            <img class="w-full h-full rounded-full bg-gray-900"
                 src="{{ asset("assets/image.jpg") }}">
        </div>
    </div>

    <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold mb-6 hero-title">
        <span class="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Desenvolvedor</span>
        <span class="block mt-2">Full-Stack</span>
    </h1>

    <p class="typewriter text-lg sm:text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto mt-6">
        Criando soluções inovadoras com tecnologia de ponta.
    </p>

    <div class="mt-12 flex flex-wrap justify-center gap-4 hero-buttons">
        <a href="#projetos"
           class="px-6 sm:px-8 py-3 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 transition text-white font-medium">
            Ver Projetos
        </a>
        <a href="#contato"
           class="px-6 sm:px-8 py-3 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm hover:bg-white/10 transition font-medium">
            Entrar em Contato
        </a>
    </div>

    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2" id="go-down">
        <a href="#sobre"
           class="animate-bounce inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/5 border border-white/10">
            <i class="fas fa-chevron-down text-cyan-400"></i>
        </a>
    </div>
</header>

<!-- Sobre -->
<section id="sobre" class="relative py-16 md:py-20 px-4 section-padding">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold section-title">Sobre Mim</h2>

        <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div>
                <p class="text-gray-300 leading-relaxed mb-6">
                    Sou um Desenvolvedor Full-Stack especializado em tecnologias web avançadas, como WebSocket e TDD,
                    com
                    experiência em Laravel e Django. Atuante na criação de soluções robustas, incluindo integrações com
                    sistemas ERP e desenvolvimento de plataformas web personalizadas, entregando projetos escaláveis e
                    eficientes
                </p>
                <p class="text-gray-300 leading-relaxed mb-8">
                    Com background em engenharia da Computação
                    e uma paixão por inovação tecnológica, estou sempre em busca de novos desafios que me permitam
                    aplicar minhas habilidades e aprender novas tecnologias.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 skill-bars">
                    <div class="flex items-center mx-auto">
                        <div class="mr-3 text-cyan-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span>Desenvolvimento Web</span>
                    </div>
                    <div class="flex items-center mx-auto">
                        <div class="mr-3 text-cyan-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span>Aplicações em Nuvem</span>
                    </div>
                    <div class="flex items-center mx-auto">
                        <div class="mr-3 text-cyan-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span>Automações</span>
                    </div>
                    <div class="flex items-center mx-auto">
                        <div class="mr-3 text-cyan-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span>UX/UI Design</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 stats-grid mt-8 md:mt-0">
                <div
                    class="bg-gradient-to-br from-gray-900 to-black p-4 sm:p-6 rounded-2xl border border-gray-800 text-center">
                    <div class="text-3xl sm:text-4xl font-bold text-cyan-400 mb-2">4+</div>
                    <div class="text-gray-400 text-sm sm:text-base">Anos de Experiência</div>
                </div>
                <div
                    class="bg-gradient-to-br from-gray-900 to-black p-4 sm:p-6 rounded-2xl border border-gray-800 text-center">
                    <div class="text-3xl sm:text-4xl font-bold text-purple-400 mb-2">20+</div>
                    <div class="text-gray-400 text-sm sm:text-base">Projetos Concluídos</div>
                </div>
                <div
                    class="bg-gradient-to-br from-gray-900 to-black p-4 sm:p-6 rounded-2xl border border-gray-800 text-center">
                    <div class="text-3xl sm:text-4xl font-bold text-green-400 mb-2">10+</div>
                    <div class="text-gray-400 text-sm sm:text-base">Certificações Técnicas</div>
                </div>
                <div
                    class="bg-gradient-to-br from-gray-900 to-black p-4 sm:p-6 rounded-2xl border border-gray-800 text-center">
                    <div class="text-3xl sm:text-4xl font-bold text-blue-400 mb-2">100%</div>
                    <div class="text-gray-400 text-sm sm:text-base">Foco em Qualidade</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projetos -->
<section id="projetos" class="py-16 md:py-20 px-4 bg-black/30 z-10 relative section-padding">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold section-title">Projetos Recentes</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Projeto 1 -->
            <div
                class="project-card rounded-2xl bg-gradient-to-b from-gray-900 to-black border border-gray-800 overflow-hidden">
                <div class="h-48 bg-gray-800 overflow-hidden">
                    <div
                        class="project-image h-full bg-gradient-to-r from-cyan-900/30 to-purple-900/30 flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-5xl text-cyan-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">API 5 Minutos (Back-End)</h3>
                    <p class="text-gray-400 text-sm mb-4">
                        API RESTful para gerenciamento de meditações e usuários.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">Laravel</span>
                        <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">Blade</span>
                        <span class="px-3 py-1 bg-cyan-900/30 text-cyan-400 rounded-full text-xs">MySQL</span>
                    </div>
                    <div class="flex space-x-3">
                        <a href="https://www.eumedito.org/ws/api/documentation"
                           class="text-sm text-cyan-400 hover:text-cyan-300"
                           target="_blank" rel="noopener noreferrer"
                        ><i
                                class="fas fa-external-link-alt mr-1"></i> Demo</a>
                        <a class="text-sm text-gray-400 hover:text-gray-300"><i class="fab fa-github mr-1"></i>
                            Private</a>
                    </div>
                </div>
            </div>

            <!-- Projeto 2 -->
            <div
                class="project-card rounded-2xl bg-gradient-to-b from-gray-900 to-black border border-gray-800 overflow-hidden">
                <div class="h-48 bg-gray-800 overflow-hidden">
                    <div
                        class="project-image h-full bg-gradient-to-r from-purple-900/30 to-pink-900/30 flex items-center justify-center">
                        <i class="fas fa-brands fa-instagram text-5xl text-purple-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Permuta aí</h3>
                    <p class="text-gray-400 text-sm mb-4">Plataforma de integração entre empresas e influenciadores.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">Laravel</span>
                        <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">Blade</span>
                        <span class="px-3 py-1 bg-cyan-900/30 text-cyan-400 rounded-full text-xs">MySQL</span>
                    </div>
                    <div class="flex space-x-3">
                        <a href="https://permutaai.com.br/" class="text-sm text-cyan-400 hover:text-cyan-300"
                           target="_blank" rel="noopener noreferrer"
                        ><i
                                class="fas fa-external-link-alt mr-1"></i> Demo</a>
                        <a href="#" class="text-sm text-gray-400 hover:text-gray-300"><i class="fab fa-github mr-1"></i>
                            Private</a>
                    </div>
                </div>
            </div>

            <!-- Projeto 3 -->
            <div
                class="project-card rounded-2xl bg-gradient-to-b from-gray-900 to-black border border-gray-800 overflow-hidden">
                <div class="h-48 bg-gray-800 overflow-hidden">
                    <div
                        class="project-image h-full bg-gradient-to-r from-blue-900/30 to-green-900/30 flex items-center justify-center">
                        <i class="fas fa-tachometer-alt text-5xl text-blue-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Plataforma de Gerenciamento</h3>
                    <p class="text-gray-400 text-sm mb-4">Sistema web para gerenciamento de Filas e Atendimentos.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">Laravel</span>
                        <span class="px-3 py-1 bg-green-900/30 text-green-400 rounded-full text-xs">Vue.js</span>
                        <span class="px-3 py-1 bg-purple-900/30 text-purple-400 rounded-full text-xs">Livewire</span>
                        <span class="px-3 py-1 bg-cyan-900/30 text-cyan-400 rounded-full text-xs">PgSQL</span>
                    </div>
                    <div class="flex space-x-3">
                        <a class="text-sm text-gray-400 hover:text-gray-300"><i
                                class="fas fa-external-link-alt mr-1"></i> Demo</a>
                        <a class="text-sm text-gray-400 hover:text-gray-300"><i class="fab fa-github mr-1"></i>
                            Private</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="https://www.linkedin.com/in/heitorflavio/" target="_blank"
               class="inline-flex items-center px-6 py-3 border border-cyan-400/30 text-cyan-400 rounded-xl hover:bg-cyan-400/10 transition">
                <i class="fab fa-linkedin mr-2"></i> Veja Mais No LinkedIn
            </a>
        </div>
    </div>
</section>

<!-- Habilidades -->
<section id="habilidades" class="py-16 md:py-20 px-4 z-10 relative">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold section-title">Minhas Habilidades</h2>

        <div class="grid md:grid-cols-2 gap-8 md:gap-12">
            <div class="skill-bars">
                <h3 class="text-xl font-semibold mb-6 text-cyan-400">Tecnologias & Linguagens</h3>

                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-300">PHP & Laravel</span>
                            <span class="text-cyan-400">90%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                            <div class="skill-bar h-2 bg-gradient-to-r from-cyan-400 to-blue-400"
                                 style="width: 90%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-300">JavaScript/Vue.js</span>
                            <span class="text-cyan-400">85%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                            <div class="skill-bar h-2 bg-gradient-to-r from-cyan-400 to-blue-400"
                                 style="width: 85%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-300">Livewire</span>
                            <span class="text-cyan-400">88%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                            <div class="skill-bar h-2 bg-gradient-to-r from-cyan-400 to-blue-400"
                                 style="width: 88%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-300">MySQL/PostgreSQL</span>
                            <span class="text-cyan-400">82%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                            <div class="skill-bar h-2 bg-gradient-to-r from-cyan-400 to-blue-400"
                                 style="width: 82%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-6 text-cyan-400">Ferramentas & Competências</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <div class="skill-card bg-gray-900/50 p-3 sm:p-4 rounded-xl border border-gray-800 text-center">
                        <i class="fab fa-laravel text-xl sm:text-2xl text-red-500 mr-2 sm:mr-3"></i>
                        <span class="text-sm sm:text-base">Laravel Ecosystem</span>
                    </div>
                    <div class="skill-card bg-gray-900/50 p-3 sm:p-4 rounded-xl border border-gray-800 text-center">
                        <i class="fab fa-vuejs text-xl sm:text-2xl text-emerald-400 mr-2 sm:mr-3"></i>
                        <span class="text-sm sm:text-base text-center">Vue.js</span>
                    </div>
                    <div class="skill-card bg-gray-900/50 p-3 sm:p-4 rounded-xl border border-gray-800 text-center">
                        <i class="fas fa-bolt text-xl sm:text-2xl text-orange-400 mr-2 sm:mr-3"></i>
                        <span class="text-sm sm:text-base">Livewire & Alpine.js</span>
                    </div>
                    <div class="skill-card bg-gray-900/50 p-3 sm:p-4 rounded-xl border border-gray-800 text-center">
                        <i class="fas fa-database text-xl sm:text-2xl text-blue-400 mr-2 sm:mr-3"></i>
                        <span class="text-sm sm:text-base">Eloquent ORM</span>
                    </div>
                    <div class="skill-card bg-gray-900/50 p-3 sm:p-4 rounded-xl border border-gray-800 text-center">
                        <i class="fas fa-code text-xl sm:text-2xl text-purple-400 mr-2 sm:mr-3"></i>
                        <span class="text-sm sm:text-base">API REST</span>
                    </div>
                    <div class="skill-card bg-gray-900/50 p-3 sm:p-4 rounded-xl border border-gray-800 text-center">
                        <i class="fas fa-tasks text-xl sm:text-2xl text-cyan-400 mr-2 sm:mr-3"></i>
                        <span class="text-sm sm:text-base">Testes (Pest)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stack Específica -->
        <div class="mt-16">
            <h3 class="text-xl font-semibold mb-6 text-cyan-400">Stack PHP/Laravel Especializada</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div
                    class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex flex-col items-center text-center">
                    <i class="fab fa-php text-4xl text-blue-400 mb-2"></i>
                    <span class="font-medium">PHP 7+</span>
                    <span class="text-sm text-gray-400">OOP, Traits, Attributes</span>
                </div>
                <div
                    class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex flex-col items-center text-center">
                    <i class="fab fa-laravel text-4xl text-red-500 mb-2"></i>
                    <span class="font-medium">Laravel</span>
                    <span class="text-sm text-gray-400">Eloquent, MVC, Artisan</span>
                </div>
                <div
                    class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex flex-col items-center text-center">
                    <i class="fab fa-vuejs text-4xl text-emerald-400 mb-2"></i>
                    <span class="font-medium">Vue.js</span>
                    <span class="text-sm text-gray-400">Options API, Pinia</span>
                </div>
                <div
                    class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex flex-col items-center text-center">
                    <i class="fas fa-bolt text-4xl text-orange-400 mb-2"></i>
                    <span class="font-medium">Livewire</span>
                    <span class="text-sm text-gray-400">Componentes, Estado</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contato -->
<section id="contato" class="py-16 md:py-20 px-4 bg-black/30 z-10 relative section-padding">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold section-title">Entre em Contato</h2>

        <p class="text-gray-400 text-center max-w-2xl mx-auto mb-8 md:mb-12">
            Estou disponível para oportunidades freelance e projetos desafiadores.
            Entre em contato e vamos conversar!
        </p>

        <div class="grid md:grid-cols-2 gap-8 md:gap-12 contact-grid">
            <div>

                @if (session('success'))
                    <div class="my-4 p-4 text-green-500 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                    @if (session('error'))
                        <div class="my-4 p-4 text-red-500 text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                <form class="space-y-6" method="POST" action="{{ route('contact.send') }}">
                    @method('POST')
                    @csrf

                    <div>
                        <label for="name" class="block text-gray-400 mb-2">Nome</label>
                        <input type="text" id="name" name="name" placeholder="Seu nome completo" required
                               class="w-full px-4 py-3 rounded-xl bg-gray-900/50 border border-gray-800 text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-gray-400 mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="seu@email.com" required
                               class="w-full px-4 py-3 rounded-xl bg-gray-900/50 border border-gray-800 text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-gray-400 mb-2">Mensagem</label>
                        <textarea id="message" required name="text" rows="4" placeholder="Sua mensagem..."
                                  class="w-full px-4 py-3 rounded-xl bg-gray-900/50 border border-gray-800 text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-400"></textarea>
                        @error('text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full px-6 py-3 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 transition text-white font-medium">
                        Enviar Mensagem
                    </button>
                </form>
            </div>

            <div>
                <div
                    class="bg-gradient-to-b from-gray-900 to-black p-6 md:p-8 rounded-2xl border border-gray-800 h-full">
                    <h3 class="text-xl font-semibold mb-6 text-cyan-400">Informações de Contato</h3>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-cyan-400 mr-4 mt-1">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-gray-400">Email</p>
                                <a class="text-gray-200" href="mailto:heitorflavio.r@outlook.com">heitorflavio.r@outlook.com</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-cyan-400 mr-4 mt-1">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <p class="text-gray-400">Telefone</p>
                                <p class="text-gray-200">+55 (38) 999727769</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-cyan-400 mr-4 mt-1">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="text-gray-400">Localização</p>
                                <p class="text-gray-200">Minas Gerais, Brasil</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-800">
                        <h4 class="text-lg font-semibold mb-4 text-cyan-400">Redes Sociais</h4>

                        <div class="flex space-x-4">
                            <a href="https://www.linkedin.com/in/heitorflavio/"
                               class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-cyan-400 hover:text-white transition"
                               target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://github.com/heitorflavio"
                               class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-cyan-400 hover:text-white transition"
                               target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Animação das barras de habilidade quando a seção é visualizada
    document.addEventListener('DOMContentLoaded', function () {
        const skillBars = document.querySelectorAll('.skill-bar');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const width = entry.target.style.width;
                    entry.target.style.width = '0';
                    setTimeout(() => {
                        entry.target.style.width = width;
                    }, 100);
                    observer.unobserve(entry.target);
                }
            });
        }, {threshold: 0.5});

        skillBars.forEach(bar => {
            observer.observe(bar);
        });

        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenuButton = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        closeMenuButton.addEventListener('click', function () {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        // Close menu when clicking on links
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function () {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        });
    });
</script>
</body>

</html>
