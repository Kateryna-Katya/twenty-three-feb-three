/**
 * Project: <?= $domainTitle ?>
 * Full Production Script: Canvas, GSAP, Observer, Form, Menu
 */

document.addEventListener('DOMContentLoaded', () => {
    // 0. Инициализация иконок Lucide
    if (window.lucide) lucide.createIcons();

    // --- 1. CANVAS BACKGROUND (Плавные частицы) ---
    const initCanvas = () => {
        const canvas = document.getElementById('canvas-bg');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        const resize = () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        };

        class Particle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 1;
                this.speedX = (Math.random() - 0.5) * 0.4;
                this.speedY = (Math.random() - 0.5) * 0.4;
                this.opacity = Math.random() * 0.4;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) this.reset();
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(106, 13, 173, ${this.opacity})`; // Фиолетовый
                ctx.fill();
            }
        }

        for (let i = 0; i < 40; i++) particles.push(new Particle());
        
        const animate = () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(animate);
        };

        window.addEventListener('resize', resize);
        resize();
        animate();
    };

    // --- 2. МОБИЛЬНОЕ МЕНЮ (Полный контроль видимости) ---
    const initMobileMenu = () => {
        const burger = document.getElementById('burger');
        const menu = document.getElementById('mobile-menu');
        if (!burger || !menu) return;

        const links = menu.querySelectorAll('.mobile-menu__link');

        burger.onclick = () => {
            const isOpen = menu.classList.toggle('active');
            burger.classList.toggle('active');
            
            // Блокируем скролл при открытом меню
            document.body.style.overflow = isOpen ? 'hidden' : '';

            if (isOpen) {
                // Сначала устанавливаем в невидимое состояние, затем плавно проявляем
                gsap.set(links, { opacity: 0, y: 30 });
                gsap.to(links, { 
                    opacity: 1, 
                    y: 0, 
                    stagger: 0.1, 
                    duration: 0.5, 
                    ease: "power2.out",
                    delay: 0.3 
                });
            } else {
                gsap.to(links, { opacity: 0, y: -20, duration: 0.3 });
            }
        };

        // Закрытие при клике на ссылку
        links.forEach(link => {
            link.onclick = () => {
                menu.classList.remove('active');
                burger.classList.remove('active');
                document.body.style.overflow = '';
            };
        });
    };

    // --- 3. АНИМАЦИИ ПРИ СКРОЛЛЕ (Observer + GSAP) ---
    const initScrollAnims = () => {
        const items = document.querySelectorAll('.service-card, .post-card, .review-card, .about__grid, .contact__container, .section-title');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    gsap.to(entry.target, {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        ease: "power3.out"
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1, 
            rootMargin: "0px 0px -50px 0px" // Подгружаем чуть раньше появления в кадре
        });

        items.forEach(item => {
            // Начальное скрытие через GSAP для плавности
            gsap.set(item, { opacity: 0, y: 40 });
            observer.observe(item);
        });
    };

    // --- 4. ВАЛИДАЦИЯ ТЕЛЕФОНА И ФОРМЫ ---
    const initFormValidation = () => {
        const phoneInput = document.getElementById('phone');
        const form = document.getElementById('career-form');
        if (!form) return;

        // Фильтр: Только цифры
        if (phoneInput) {
            phoneInput.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/\D/g, '');
            });
        }

        // Капча
        const n1 = Math.floor(Math.random() * 5) + 3;
        const n2 = Math.floor(Math.random() * 4) + 1;
        const capLabel = document.getElementById('captcha-label');
        if (capLabel) capLabel.innerText = `Сколько будет ${n1} + ${n2}?`;

        form.onsubmit = (e) => {
            e.preventDefault();
            const ans = document.getElementById('captcha-input').value;
            
            if (parseInt(ans) !== (n1 + n2)) {
                alert("Ошибка в капче! Попробуйте снова.");
                return;
            }

            if (phoneInput && phoneInput.value.length < 8) {
                alert("Пожалуйста, введите корректный номер телефона.");
                return;
            }

            const btn = form.querySelector('button');
            btn.disabled = true;
            btn.innerText = "Отправка...";

            // Имитация AJAX
            setTimeout(() => {
                gsap.to(form, { opacity: 0, y: -20, duration: 0.5, onComplete: () => {
                    form.innerHTML = `
                        <div class="form__message" style="display:flex; flex-direction:column; align-items:center; text-align:center;">
                            <i data-lucide="check-circle" style="width:48px; height:48px; color:#6A0DAD; margin-bottom:15px;"></i>
                            <h3>Заявка отправлена!</h3>
                            <p>Мы свяжемся с вами в течение рабочего дня.</p>
                        </div>
                    `;
                    if (window.lucide) lucide.createIcons();
                    gsap.to(form, { opacity: 1, y: 0 });
                }});
            }, 1500);
        };
    };

    // --- 5. ВХОДНАЯ АНИМАЦИЯ HERO ---
    const initHero = () => {
        const tl = gsap.timeline();
        tl.from(".header", { y: -50, opacity: 0, duration: 1 })
          .from(".hero__title", { y: 50, opacity: 0, duration: 1 }, "-=0.5")
          .from(".hero__text", { opacity: 0, duration: 1 }, "-=0.8")
          .from(".hero__visual", { scale: 0.8, opacity: 0, duration: 1.2 }, "-=1")
          .add(() => {
              initScrollAnims();
              initMobileMenu();
              initFormValidation();
          });
    };

    // --- 6. ДОП. ФУНКЦИИ (Cookies + Header Scroll) ---
    const initExtras = () => {
        // Хедер при скролле
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (header) header.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Куки
        const cookiePopup = document.getElementById('cookie-popup');
        if (cookiePopup && !localStorage.getItem('cookies_accepted')) {
            setTimeout(() => cookiePopup.classList.add('active'), 3000);
            document.getElementById('accept-cookies').onclick = () => {
                localStorage.setItem('cookies_accepted', 'true');
                cookiePopup.classList.remove('active');
            };
        }
    };

    // ЗАПУСК ВСЕХ МОДУЛЕЙ
    initCanvas();
    initHero();
    initExtras();
});