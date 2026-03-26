// ── Theme toggle ──
function toggleTheme() {
    const html = document.documentElement;
    const isLight = html.getAttribute('data-theme') === 'light';
    html.setAttribute('data-theme', isLight ? 'dark' : 'light');
    localStorage.setItem('theme', isLight ? 'dark' : 'light');
}

document.getElementById('themeToggle')?.addEventListener('click', toggleTheme);
document.getElementById('themeToggleMobile')?.addEventListener('click', toggleTheme);

// ── Mobile menu toggle ──
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const bar1 = document.getElementById('bar1');
const bar2 = document.getElementById('bar2');
const bar3 = document.getElementById('bar3');
let menuOpen = false;

menuBtn?.addEventListener('click', () => {
    menuOpen = !menuOpen;
    mobileMenu.classList.toggle('open', menuOpen);
    bar1.style.transform = menuOpen ? 'rotate(45deg) translate(4px, 4px)' : '';
    bar2.style.opacity = menuOpen ? '0' : '1';
    bar3.style.transform = menuOpen ? 'rotate(-45deg) translate(4px, -4px)' : '';
});

window.closeMobileMenu = function () {
    menuOpen = false;
    mobileMenu.classList.remove('open');
    bar1.style.transform = '';
    bar2.style.opacity = '1';
    bar3.style.transform = '';
};

// ── Scroll reveal ──
const revealElements = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
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
    if (navbar) {
        navbar.style.borderBottomColor = window.scrollY > 50
            ? 'rgba(0, 240, 255, 0.12)'
            : 'rgba(0, 240, 255, 0.08)';
    }
});

// ── Looping typewriter ──
(function () {
    const el = document.getElementById('typewriter');
    if (!el) return;

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

    setTimeout(type, 600);
})();
