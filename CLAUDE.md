# ma.rkbee.ch — Mark Beech's Personal Portfolio

## Project Overview

Personal portfolio site for Mark Beech (GitHub: JayBizzle), a Full Stack Web Developer based in York, Yorkshire with 30 years of experience. Hosted at ma.rkbee.ch.

## Tech Stack

- **Framework:** Laravel 13 (PHP 8.4, via Herd)
- **Frontend:** Single Blade view (`resources/views/welcome.blade.php`) with Tailwind CSS v4
- **Build:** Vite 8 with `@tailwindcss/vite` plugin and `laravel-vite-plugin`
- **Fonts:** Inter (display/body, weights 200-900), JetBrains Mono (code accents, weights 300-700) via Google Fonts

## Architecture

- `routes/web.php` — single `GET /` route returning the `welcome` view
- `resources/views/welcome.blade.php` — the portfolio markup + inline JS
- `resources/css/app.css` — all styles: Tailwind v4 `@theme` config, CSS custom properties (theme vars), and custom component CSS
- `vite.config.js` — Vite config with Laravel and Tailwind plugins
- Web root is `public/` (configure Herd accordingly)
- No database, no auth, no API — just a static-ish portfolio served through Laravel

## What's Been Done

### Design & Layout
- Dark cyberpunk aesthetic: void black (#0a0a0f), electric cyan (#00f0ff), violet accents
- Animated SVG grid background with slow diagonal drift
- Two pulsing gradient orbs for atmospheric depth
- Glassmorphism sticky navbar with blur effect
- Smooth scroll, scroll-reveal animations with staggered delays
- Fully responsive (mobile-first)

### Sections
- **Hero:** Name (Inter Black, 900 weight), typewriter tagline ("Eat. Sleep. Code. Repeat." — loops with erase/retype), CTA buttons
- **Projects:** 6 open-source project cards (MySQL Dumper, Crawler Detect, DeployBot API, Laravel Migrations Organiser, Safeurl, hasmeta) with hover glow + scan-line effect, GitHub link buttons
- **About:** 30 years experience, 'Best Niche Recruitment' 2012, OSS contributor, personality tags, GitHub social link, Yorkshire Wikipedia link
- **Contact:** mailto link to m@rkbee.ch (clever domain split)
- **Footer:** Copyright 2026

### Light/Dark Theme
- Sun/moon toggle in navbar (desktop + mobile) with rotation animation
- All colours use CSS custom properties with dark defaults + `[data-theme="light"]` overrides
- Light mode: soft grey bg (#f0f1f6), cyan-700 accent (#0e7490) for readability
- 0.5s smooth transition on theme switch
- Preference persisted in localStorage with flash-free restore via blocking script in `<head>`

### Typography Audit (completed)
- Custom `text-2xs` token (0.625rem) added to Tailwind config for tech tags
- Fixed broken `font-600` (not a Tailwind class) on card titles — now `font-semibold`
- Section h2s bumped to `font-extrabold` with explicit `leading-none`
- Hero uses `tracking-tighter` for optical tightness at large sizes
- All arbitrary tracking values (`tracking-[0.3em]`, `tracking-[0.2em]`) replaced with `tracking-widest`
- Body copy made responsive (`text-base sm:text-lg`) across all paragraphs
- Card descriptions responsive (`text-sm sm:text-base`)
- CSS shadow type system aligned to Tailwind's scale (0.85rem/0.95rem -> 0.875rem)
- `text-balance` on contact paragraph to prevent orphans

## Key Details

- **Email:** m@rkbee.ch (not mark@ma.rkbee.ch)
- **GitHub:** JayBizzle
- **Location:** York, "God's Own County"
- **Font preference:** User tried Bebas Neue (too tall), Bungee (didn't like), Archivo Black (didn't like), settled on Inter with font-black weight for hero

## Build Commands

- `npm run dev` — start Vite dev server with HMR
- `npm run build` — production build (outputs to `public/build/`)

## What Could Come Next

- Extract inline JS from the Blade view into `resources/js/app.js`
- Add more Laravel features (the reason it was wrapped in Laravel — user mentioned wanting to add "features" in the future)
- Add more projects or a blog section
- Analytics integration
- SEO meta tags / Open Graph tags
- Favicon / site icon
