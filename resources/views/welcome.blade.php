<!DOCTYPE html>
<html lang="en">
<script>if(localStorage.getItem('theme')==='light')document.documentElement.setAttribute('data-theme','light')</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Beech — Full Stack Web Developer</title>
    <meta name="description" content="Mark Beech — Full Stack Web Developer based in York, Yorkshire. 20 years experience building for the web.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        void: '#0a0a0f',
                        surface: '#12121a',
                        cyan: '#00f0ff',
                        violet: '#8b5cf6',
                        slate: {
                            750: '#1e1e2e',
                        }
                    },
                    fontFamily: {
                        display: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                        body: ['Inter', 'sans-serif'],
                    },
                    fontSize: {
                        '2xs': ['0.625rem', { lineHeight: '1rem' }],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=JetBrains+Mono:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* ── THEME VARIABLES ── */
        :root {
            --bg: #0a0a0f;
            --bg-rgb: 10, 10, 15;
            --surface: rgba(18, 18, 26, 0.6);
            --text: #e2e8f0;
            --text-heading: #ffffff;
            --text-muted: #94a3b8;
            --text-faint: #64748b;
            --accent: #00f0ff;
            --accent-rgb: 0, 240, 255;
            --accent-hover: #00f0ff;
            --accent-dark: #0a0a0f;
            --violet-rgb: 139, 92, 246;
            --grid-opacity: 0.03;
            --orb-opacity: 0.12;
            --card-border: rgba(0, 240, 255, 0.06);
            --divider-opacity: 0.15;
            --nav-bg: rgba(10, 10, 15, 0.7);
            --selection-bg: rgba(0, 240, 255, 0.25);
            --tag-bg: rgba(0, 240, 255, 0.04);
            --tag-border: rgba(0, 240, 255, 0.08);
            --footer-border: rgba(255, 255, 255, 0.05);
        }

        [data-theme="light"] {
            --bg: #f0f1f6;
            --bg-rgb: 240, 241, 246;
            --surface: rgba(255, 255, 255, 0.7);
            --text: #334155;
            --text-heading: #0f172a;
            --text-muted: #64748b;
            --text-faint: #94a3b8;
            --accent: #0e7490;
            --accent-rgb: 14, 116, 144;
            --accent-hover: #06b6d4;
            --accent-dark: #ffffff;
            --grid-opacity: 0.06;
            --orb-opacity: 0.08;
            --card-border: rgba(14, 116, 144, 0.12);
            --divider-opacity: 0.25;
            --nav-bg: rgba(240, 241, 246, 0.8);
            --selection-bg: rgba(14, 116, 144, 0.2);
            --tag-bg: rgba(14, 116, 144, 0.06);
            --tag-border: rgba(14, 116, 144, 0.15);
            --footer-border: rgba(0, 0, 0, 0.06);
        }

        /* ── BASE ── */
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            transition: background 0.5s ease, color 0.5s ease;
        }
        ::selection {
            background: var(--selection-bg);
            color: var(--accent);
        }

        /* ── ANIMATED GRID BACKGROUND ── */
        .grid-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .grid-bg::before {
            content: '';
            position: absolute;
            inset: -50%;
            background-image:
                linear-gradient(rgba(var(--accent-rgb), var(--grid-opacity)) 1px, transparent 1px),
                linear-gradient(90deg, rgba(var(--accent-rgb), var(--grid-opacity)) 1px, transparent 1px);
            background-size: 60px 60px;
            animation: gridDrift 25s linear infinite;
            transition: background-image 0.5s ease;
        }
        .grid-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(var(--accent-rgb), 0.06) 0%, transparent 60%),
                        radial-gradient(ellipse 60% 40% at 80% 80%, rgba(var(--violet-rgb), 0.04) 0%, transparent 50%);
        }
        @keyframes gridDrift {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
        }

        /* ── GRADIENT PULSE ORB ── */
        .orb {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(120px);
            opacity: var(--orb-opacity);
            pointer-events: none;
            z-index: 0;
            transition: opacity 0.5s ease;
        }
        .orb-1 {
            top: -200px;
            right: -100px;
            background: linear-gradient(135deg, #00f0ff, #8b5cf6);
            animation: orbFloat1 12s ease-in-out infinite;
        }
        .orb-2 {
            bottom: -200px;
            left: -100px;
            background: linear-gradient(135deg, #8b5cf6, #00f0ff);
            animation: orbFloat2 15s ease-in-out infinite;
        }
        @keyframes orbFloat1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-80px, 60px) scale(1.15); }
        }
        @keyframes orbFloat2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(60px, -80px) scale(1.1); }
        }

        /* ── NAVBAR GLASSMORPHISM ── */
        .navbar {
            backdrop-filter: blur(20px) saturate(1.4);
            -webkit-backdrop-filter: blur(20px) saturate(1.4);
            background: var(--nav-bg);
            border-bottom: 1px solid rgba(var(--accent-rgb), 0.08);
            transition: background 0.5s ease, border-color 0.5s ease;
        }
        .nav-link {
            position: relative;
            color: var(--text-muted);
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, var(--accent), #8b5cf6);
            transition: width 0.3s ease;
        }
        .nav-link:hover { color: var(--accent); }
        .nav-link:hover::after { width: 100%; }

        /* ── TYPEWRITER ── */
        .typewriter {
            display: inline;
            border-right: 2px solid var(--accent);
            animation: blink 0.75s step-end infinite;
        }
        @keyframes blink {
            50% { border-color: transparent; }
        }

        /* ── HERO FADE-IN STAGGER ── */
        .hero-line {
            opacity: 0;
            transform: translateY(24px);
            animation: fadeUp 0.7s ease forwards;
        }
        .hero-line:nth-child(1) { animation-delay: 0.1s; }
        .hero-line:nth-child(2) { animation-delay: 0.35s; }
        .hero-line:nth-child(3) { animation-delay: 0.6s; }
        .hero-line:nth-child(4) { animation-delay: 0.85s; }
        .hero-line:nth-child(5) { animation-delay: 1.1s; }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── PROJECT CARDS ── */
        .project-card {
            position: relative;
            background: var(--surface);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 2rem;
            transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease, background 0.5s ease;
            overflow: hidden;
        }
        .project-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 16px;
            padding: 1px;
            background: linear-gradient(135deg, transparent, rgba(0, 240, 255, 0.0), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            transition: background 0.35s ease;
        }
        .project-card:hover {
            transform: translateY(-4px);
            border-color: rgba(var(--accent-rgb), 0.15);
            box-shadow:
                0 0 30px rgba(var(--accent-rgb), 0.08),
                0 0 60px rgba(var(--accent-rgb), 0.04),
                inset 0 1px 0 rgba(var(--accent-rgb), 0.06);
        }
        .project-card:hover::before {
            background: linear-gradient(135deg, rgba(var(--accent-rgb), 0.2), rgba(var(--violet-rgb), 0.15), rgba(var(--accent-rgb), 0.2));
        }
        /* scanning line on hover */
        .project-card::after {
            content: '';
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, transparent 40%, rgba(var(--accent-rgb), 0.03) 50%, transparent 60%);
            transition: top 0.6s ease;
            pointer-events: none;
        }
        .project-card:hover::after {
            top: 100%;
        }

        /* ── GITHUB BUTTON ── */
        .gh-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            border: 1px solid rgba(var(--accent-rgb), 0.2);
            border-radius: 8px;
            color: var(--accent);
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .gh-btn:hover {
            background: rgba(var(--accent-rgb), 0.08);
            border-color: rgba(var(--accent-rgb), 0.4);
            box-shadow: 0 0 20px rgba(var(--accent-rgb), 0.1);
        }

        /* ── CTA BUTTONS ── */
        .btn-primary {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, var(--accent), rgba(var(--accent-rgb), 0.8));
            color: var(--accent-dark);
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(var(--accent-rgb), 0.2);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 40px rgba(var(--accent-rgb), 0.35);
        }
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            border: 1px solid rgba(var(--accent-rgb), 0.25);
            color: var(--accent);
            font-weight: 500;
            font-size: 0.875rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: rgba(var(--accent-rgb), 0.06);
            border-color: rgba(var(--accent-rgb), 0.45);
            transform: translateY(-2px);
        }

        /* ── SECTION DIVIDER ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(var(--accent-rgb), var(--divider-opacity)), rgba(var(--violet-rgb), var(--divider-opacity)), transparent);
            transition: background 0.5s ease;
        }

        /* ── SCROLL REVEAL ── */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── ABOUT TAGS ── */
        .about-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 1rem;
            background: var(--tag-bg);
            border: 1px solid var(--tag-border);
            border-radius: 999px;
            font-size: 0.875rem;
            color: var(--text-muted);
            transition: all 0.3s ease;
        }
        .about-tag:hover {
            border-color: rgba(var(--accent-rgb), 0.2);
            color: var(--accent);
        }

        /* ── CONTACT LINK ── */
        .contact-link {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--accent);
            text-decoration: none;
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.25rem;
            font-weight: 500;
            padding: 1rem 2rem;
            border: 1px solid rgba(var(--accent-rgb), 0.15);
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .contact-link:hover {
            background: rgba(var(--accent-rgb), 0.06);
            border-color: rgba(var(--accent-rgb), 0.35);
            box-shadow: 0 0 30px rgba(var(--accent-rgb), 0.1);
        }

        /* ── MOBILE NAV ── */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }

        /* ── RESPONSIVE TYPEWRITER ── */
        @media (max-width: 640px) {
            .typewriter {
                white-space: normal;
                border-right: none;
                width: auto;
                animation: fadeUp 0.7s ease 0.6s forwards;
                opacity: 0;
                transform: translateY(24px);
            }
        }

        /* ── FOCUS STYLES ── */
        a:focus-visible, button:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }

        /* ── THEME TOGGLE ── */
        .theme-toggle {
            position: relative;
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 50%;
            border: 1px solid rgba(var(--accent-rgb), 0.15);
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: border-color 0.3s ease, background 0.3s ease;
            overflow: hidden;
        }
        .theme-toggle:hover {
            border-color: rgba(var(--accent-rgb), 0.4);
            background: rgba(var(--accent-rgb), 0.06);
        }
        .theme-toggle svg {
            position: absolute;
            width: 1.125rem;
            height: 1.125rem;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
        }
        .theme-toggle .icon-sun {
            color: var(--accent);
            transform: rotate(0deg) scale(1);
            opacity: 1;
        }
        .theme-toggle .icon-moon {
            color: var(--accent);
            transform: rotate(-90deg) scale(0);
            opacity: 0;
        }
        [data-theme="light"] .theme-toggle .icon-sun {
            transform: rotate(90deg) scale(0);
            opacity: 0;
        }
        [data-theme="light"] .theme-toggle .icon-moon {
            transform: rotate(0deg) scale(1);
            opacity: 1;
        }

        /* ── LIGHT MODE TAILWIND OVERRIDES ── */
        [data-theme="light"] .text-white { color: var(--text-heading); }
        [data-theme="light"] .text-slate-300 { color: #475569; }
        [data-theme="light"] .text-slate-400 { color: #64748b; }
        [data-theme="light"] .text-slate-500 { color: #94a3b8; }
        [data-theme="light"] .text-slate-600 { color: #94a3b8; }
        [data-theme="light"] .text-cyan { color: var(--accent); }
        [data-theme="light"] .text-cyan\/60 { color: #0e7490; }
        [data-theme="light"] .text-cyan\/50 { color: #0e7490; }
        [data-theme="light"] .text-cyan\/80 { color: #0e7490; }
        [data-theme="light"] .from-cyan { --tw-gradient-from: var(--accent); }
        [data-theme="light"] .to-violet { --tw-gradient-to: #7c3aed; }
        [data-theme="light"] .bg-cyan\/5 { background-color: rgba(var(--accent-rgb), 0.05); }
        [data-theme="light"] .border-cyan\/10 { border-color: rgba(var(--accent-rgb), 0.1); }
        [data-theme="light"] .bg-violet\/5 { background-color: rgba(var(--violet-rgb), 0.05); }
        [data-theme="light"] .border-violet\/10 { border-color: rgba(var(--violet-rgb), 0.1); }
        [data-theme="light"] .bg-white\/5 { background-color: rgba(0, 0, 0, 0.03); }
        [data-theme="light"] .border-white\/10 { border-color: rgba(0, 0, 0, 0.08); }
        [data-theme="light"] .border-white\/5 { border-color: var(--footer-border); }
        [data-theme="light"] .bg-void\/95 { background-color: rgba(240, 241, 246, 0.95); }
        [data-theme="light"] .border-cyan\/10 { border-color: rgba(var(--accent-rgb), 0.1); }
        [data-theme="light"] .bg-slate-400 { background-color: #64748b; }
    </style>
</head>
<body class="antialiased">
    <!-- Animated Background -->
    <div class="grid-bg" aria-hidden="true"></div>
    <div class="orb orb-1" aria-hidden="true"></div>
    <div class="orb orb-2" aria-hidden="true"></div>

    <!-- ═══ NAVBAR ═══ -->
    <nav class="navbar fixed top-0 left-0 right-0 z-50">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="#" class="font-mono text-sm tracking-wider text-cyan">
                <span class="opacity-50">&lt;</span>mb<span class="opacity-50"> /&gt;</span>
            </a>
            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#projects" class="nav-link font-mono text-xs tracking-widest uppercase">Projects</a>
                <a href="#about" class="nav-link font-mono text-xs tracking-widest uppercase">About</a>
                <a href="#contact" class="nav-link font-mono text-xs tracking-widest uppercase">Contact</a>
                <button id="themeToggle" class="theme-toggle" aria-label="Toggle theme">
                    <svg class="icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><path d="M12 1v2m0 18v2M4.22 4.22l1.42 1.42m12.72 12.72l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg class="icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                </button>
            </div>
            <!-- Mobile: theme toggle + hamburger -->
            <div class="md:hidden flex items-center gap-3">
                <button id="themeToggleMobile" class="theme-toggle" aria-label="Toggle theme">
                    <svg class="icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><path d="M12 1v2m0 18v2M4.22 4.22l1.42 1.42m12.72 12.72l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg class="icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                </button>
                <button id="menuBtn" class="flex flex-col gap-1.5 p-2" aria-label="Toggle menu">
                <span class="w-5 h-px bg-slate-400 transition-all duration-300" id="bar1"></span>
                <span class="w-5 h-px bg-slate-400 transition-all duration-300" id="bar2"></span>
                <span class="w-5 h-px bg-slate-400 transition-all duration-300" id="bar3"></span>
            </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu fixed top-16 right-0 bottom-0 w-64 bg-void/95 backdrop-blur-xl border-l border-cyan/10 md:hidden flex flex-col pt-8 px-8 gap-6 z-50">
            <a href="#projects" class="nav-link font-mono text-sm tracking-widest uppercase" onclick="closeMobileMenu()">Projects</a>
            <a href="#about" class="nav-link font-mono text-sm tracking-widest uppercase" onclick="closeMobileMenu()">About</a>
            <a href="#contact" class="nav-link font-mono text-sm tracking-widest uppercase" onclick="closeMobileMenu()">Contact</a>
        </div>
    </nav>

    <main class="relative z-10">
        <!-- ═══ HERO ═══ -->
        <section class="min-h-screen flex items-center justify-center px-6">
            <div class="max-w-4xl w-full">
                <div class="hero-line">
                    <span class="font-mono text-sm text-cyan/60 tracking-widest uppercase">// Full Stack Web Developer</span>
                </div>
                <div class="hero-line mt-4">
                    <h1 class="font-display font-black text-5xl sm:text-7xl lg:text-9xl tracking-tighter text-white leading-none uppercase">
                        Mark <span class="bg-gradient-to-r from-cyan to-violet bg-clip-text text-transparent">Beech</span>
                    </h1>
                </div>
                <div class="hero-line mt-6">
                    <div class="inline-block">
                        <p id="typewriter" class="typewriter font-mono text-xl sm:text-2xl text-cyan/80 pr-1"></p>
                    </div>
                </div>
                <div class="hero-line mt-4">
                    <p class="text-slate-400 text-base sm:text-lg max-w-xl leading-relaxed">
                        Building robust, elegant solutions for the web from <span class="text-slate-300">York, Yorkshire</span>.
                    </p>
                </div>
                <div class="hero-line mt-10 flex flex-wrap gap-4">
                    <a href="#projects" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        View Projects
                    </a>
                    <a href="#contact" class="btn-secondary">
                        Contact Me
                    </a>
                </div>
            </div>
        </section>

        <div class="divider max-w-6xl mx-auto"></div>

        <!-- ═══ PROJECTS ═══ -->
        <section id="projects" class="py-24 sm:py-32 px-6">
            <div class="max-w-6xl mx-auto">
                <div class="reveal mb-16">
                    <span class="font-mono text-xs text-cyan/50 tracking-widest uppercase">// Open Source</span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white mt-2 tracking-tight leading-none">Projects</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="project-card reveal">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-cyan/5 border border-cyan/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                            </div>
                            <span class="font-mono text-2xs text-slate-500 tracking-wider uppercase">PHP</span>
                        </div>
                        <h3 class="font-display font-semibold text-lg leading-snug text-white mb-2">MySQL Dumper</h3>
                        <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-6">Create MySQL dumps and upload to Dropbox, S3 or remote FTP server.</p>
                        <a href="https://github.com/JayBizzle/mysqldumper" target="_blank" rel="noopener noreferrer" class="gh-btn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>

                    <!-- Card 2 -->
                    <div class="project-card reveal">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-violet/5 border border-violet/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                            </div>
                            <span class="font-mono text-2xs text-slate-500 tracking-wider uppercase">PHP</span>
                        </div>
                        <h3 class="font-display font-semibold text-lg leading-snug text-white mb-2">Crawler Detect</h3>
                        <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-6">A PHP class for detecting bots/crawlers/spiders via the user agent.</p>
                        <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank" rel="noopener noreferrer" class="gh-btn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>

                    <!-- Card 3 -->
                    <div class="project-card reveal">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-cyan/5 border border-cyan/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.58-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/></svg>
                            </div>
                            <span class="font-mono text-2xs text-slate-500 tracking-wider uppercase">PHP</span>
                        </div>
                        <h3 class="font-display font-semibold text-lg leading-snug text-white mb-2">DeployBot API</h3>
                        <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-6">A simple PHP wrapper for the DeployBot API.</p>
                        <a href="https://github.com/JayBizzle/DeployBot-API" target="_blank" rel="noopener noreferrer" class="gh-btn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>

                    <!-- Card 4 -->
                    <div class="project-card reveal">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-violet/5 border border-violet/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/></svg>
                            </div>
                            <span class="font-mono text-2xs text-slate-500 tracking-wider uppercase">Laravel</span>
                        </div>
                        <h3 class="font-display font-semibold text-lg leading-snug text-white mb-2">Laravel Migrations Organiser</h3>
                        <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-6">A Laravel 5 package to help organise migrations.</p>
                        <a href="https://github.com/JayBizzle/Laravel-Migrations-Organiser" target="_blank" rel="noopener noreferrer" class="gh-btn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>

                    <!-- Card 5 -->
                    <div class="project-card reveal">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-cyan/5 border border-cyan/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m9.86-2.556a4.5 4.5 0 00-1.242-7.244l-4.5-4.5a4.5 4.5 0 00-6.364 6.364L5.25 9.879" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m9.86-2.556a4.5 4.5 0 00-1.242-7.244"/></svg>
                            </div>
                            <span class="font-mono text-2xs text-slate-500 tracking-wider uppercase">Laravel</span>
                        </div>
                        <h3 class="font-display font-semibold text-lg leading-snug text-white mb-2">Safeurl</h3>
                        <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-6">A Laravel package to create safe, SEO friendly URLs.</p>
                        <a href="https://github.com/JayBizzle/Safeurl" target="_blank" rel="noopener noreferrer" class="gh-btn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>

                    <!-- Card 6 -->
                    <div class="project-card reveal">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-violet/5 border border-violet/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 6h.008v.008H6V6z"/></svg>
                            </div>
                            <span class="font-mono text-2xs text-slate-500 tracking-wider uppercase">Laravel</span>
                        </div>
                        <h3 class="font-display font-semibold text-lg leading-snug text-white mb-2">hasmeta</h3>
                        <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-6">A Laravel trait to access model meta data as if it was a property on your model.</p>
                        <a href="https://github.com/JayBizzle/hasmeta" target="_blank" rel="noopener noreferrer" class="gh-btn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="divider max-w-6xl mx-auto"></div>

        <!-- ═══ ABOUT ═══ -->
        <section id="about" class="py-24 sm:py-32 px-6">
            <div class="max-w-6xl mx-auto">
                <div class="reveal mb-16">
                    <span class="font-mono text-xs text-cyan/50 tracking-widest uppercase">// Background</span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white mt-2 tracking-tight leading-none">About Me</h2>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-16">
                    <!-- Left Column -->
                    <div class="lg:col-span-3 space-y-6 reveal">
                        <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                            Senior Web Developer with <span class="text-cyan font-medium">30 years</span> of experience crafting solutions for the web. Developer of the <span class="text-white font-medium">'Best Niche Recruitment' site 2012</span>. Active open source developer and contributor.
                        </p>
                        <p class="text-slate-400 text-base sm:text-lg leading-relaxed">
                            Based in York, <a href="https://en.wikipedia.org/wiki/Yorkshire" target="_blank" rel="noopener noreferrer" class="text-cyan/80 hover:text-cyan underline underline-offset-4 decoration-cyan/20 hover:decoration-cyan/50 transition-colors">God's Own County</a> &mdash; where the code is strong and the tea is stronger.
                        </p>
                    </div>
                    <!-- Right Column -->
                    <div class="lg:col-span-2 reveal">
                        <h3 class="font-mono text-xs text-cyan/50 tracking-widest uppercase mb-4">// The person</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="about-tag">&#128104;&#8205;&#128105;&#8205;&#128102;&#8205;&#128102; Father of Two</span>
                            <span class="about-tag">&#9992;&#65039; Airplane Geek</span>
                            <span class="about-tag">&#127866; Beer Lover</span>
                            <span class="about-tag">&#127942; Rugby League</span>
                            <span class="about-tag">&#128187; Tech Nerd</span>
                            <span class="about-tag">&#127963;&#65039; Yorkshire to the Core</span>
                        </div>
                        <div class="mt-8">
                            <h3 class="font-mono text-xs text-cyan/50 tracking-widest uppercase mb-4">// Connect</h3>
                            <a href="https://github.com/JayBizzle" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 text-slate-300 hover:text-cyan transition-colors group">
                                <div class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 group-hover:border-cyan/20 flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium">GitHub</div>
                                    <div class="text-xs text-slate-500 font-mono">@JayBizzle</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="divider max-w-6xl mx-auto"></div>

        <!-- ═══ CONTACT ═══ -->
        <section id="contact" class="py-24 sm:py-32 px-6">
            <div class="max-w-6xl mx-auto text-center">
                <div class="reveal">
                    <span class="font-mono text-xs text-cyan/50 tracking-widest uppercase">// Get In Touch</span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white mt-2 tracking-tight leading-none">Contact</h2>
                    <p class="text-slate-400 mt-4 text-base sm:text-lg leading-relaxed max-w-lg mx-auto text-balance">Have a project in mind or just want to say hello? Drop me a line.</p>
                </div>
                <div class="reveal mt-12">
                    <a href="mailto:m@rkbee.ch" class="contact-link mx-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        m@rkbee.ch
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- ═══ FOOTER ═══ -->
    <footer class="relative z-10 border-t border-white/5 py-8 px-6">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-mono text-xs text-slate-600">&copy; 2026 Mark Beech. All rights reserved.</p>
            <a href="#" class="font-mono text-xs text-slate-600 hover:text-cyan transition-colors">
                <span class="opacity-50">&lt;</span>mb<span class="opacity-50"> /&gt;</span>
            </a>
        </div>
    </footer>

    <!-- ═══ SCRIPTS ═══ -->
    <script>
        // ── Theme toggle ──
        function toggleTheme() {
            const html = document.documentElement;
            const isLight = html.getAttribute('data-theme') === 'light';
            html.setAttribute('data-theme', isLight ? 'dark' : 'light');
            localStorage.setItem('theme', isLight ? 'dark' : 'light');
        }
        // Restore saved preference
        (function () {
            const saved = localStorage.getItem('theme');
            if (saved === 'light') {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
        document.getElementById('themeToggle').addEventListener('click', toggleTheme);
        document.getElementById('themeToggleMobile').addEventListener('click', toggleTheme);

        // ── Mobile menu toggle ──
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');
        let menuOpen = false;

        menuBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.classList.toggle('open', menuOpen);
            bar1.style.transform = menuOpen ? 'rotate(45deg) translate(4px, 4px)' : '';
            bar2.style.opacity = menuOpen ? '0' : '1';
            bar3.style.transform = menuOpen ? 'rotate(-45deg) translate(4px, -4px)' : '';
        });

        function closeMobileMenu() {
            menuOpen = false;
            mobileMenu.classList.remove('open');
            bar1.style.transform = '';
            bar2.style.opacity = '1';
            bar3.style.transform = '';
        }

        // ── Scroll reveal ──
        const revealElements = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Stagger siblings
                    const siblings = entry.target.parentElement.querySelectorAll('.reveal');
                    let delay = 0;
                    siblings.forEach((sib) => {
                        if (sib === entry.target) {
                            entry.target.style.transitionDelay = `${delay * 0.1}s`;
                        }
                        delay++;
                    });
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        revealElements.forEach(el => observer.observe(el));

        // ── Navbar background on scroll ──
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.borderBottomColor = 'rgba(0, 240, 255, 0.12)';
            } else {
                navbar.style.borderBottomColor = 'rgba(0, 240, 255, 0.08)';
            }
        });

        // ── Looping typewriter ──
        (function () {
            const el = document.getElementById('typewriter');
            const text = 'Eat. Sleep. Code. Repeat.';
            const typeSpeed = 80;
            const eraseSpeed = 40;
            const pauseAfterType = 2000;
            const pauseAfterErase = 600;
            let i = 0;

            function type() {
                if (i <= text.length) {
                    el.textContent = text.slice(0, i);
                    i++;
                    setTimeout(type, typeSpeed);
                } else {
                    setTimeout(erase, pauseAfterType);
                }
            }

            function erase() {
                if (i >= 0) {
                    el.textContent = text.slice(0, i);
                    i--;
                    setTimeout(erase, eraseSpeed);
                } else {
                    i = 0;
                    setTimeout(type, pauseAfterErase);
                }
            }

            // Start after the hero fade-in delay
            setTimeout(type, 600);
        })();
    </script>
</body>
</html>
