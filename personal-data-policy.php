<?php

$fullDomain = strtolower($_SERVER['HTTP_HOST'] ?? '');
$fullDomain = explode(':', $fullDomain)[0];

$parts = explode('.', $fullDomain);
$domainSlug = count($parts) >= 2
        ? $parts[count($parts) - 2]
        : $fullDomain;

$domainTitle = ucwords(str_replace('-', ' ', $domainSlug));

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $domainTitle ?> — Карьерный апгрейд и инновационные решения</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='16' cy='16' r='16' fill='%234B2C5E'/%3E%3Cpath d='M17 7L10 18H16L15 25L22 14H16L17 7Z' fill='%23FDF5F6'/%3E%3C/svg%3E">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <canvas id="canvas-bg"></canvas>

    <header class="header" id="header">
        <div class="container header__container">
            <a href="./#hero" class="logo">
                <span class="logo__dot"></span>
                <span class="logo__text"><?= $domainTitle ?></span>
            </a>
            
            <nav class="nav" id="nav">
                <ul class="nav__list">
                    <li><a href="./#hero" class="nav__link">Главная</a></li>
                    <li><a href="./#about" class="nav__link">Методология</a></li>
                    <li><a href="./#services" class="nav__link">Программы</a></li>
                    <li><a href="./#reviews" class="nav__link">Кейсы</a></li>
                    <li><a href="./#blog" class="nav__link">Блог</a></li>
                </ul>
            </nav>

            <a href="./#contact" class="btn btn--header">
                <span>Связаться</span>
                <i data-lucide="arrow-up-right"></i>
            </a>

            <button class="burger" id="burger" aria-label="Menu">
                <span></span>
            </button>
        </div>
    </header>

    <main class="legal-page">
    <section class="pages">
        <div class="container">
            <span class="section-tag">Privacy & Security</span>
            <h1>Политика обработки персональных данных</h1>

            <div class="legal-content">
                <div class="policy-intro">
                    <h2>1. Общие положения</h2>
                    <p>
                        Настоящая политика (далее — «Политика») определяет порядок и условия обработки персональных
                        данных, предпринимаемые платформой <strong><?= $domainTitle ?></strong> (далее — «Оператор»), и
                        устанавливает меры по обеспечению безопасности этих данных в соответствии с требованиями GDPR.
                    </p>
                    <p>
                        1.1. Важнейшей целью Оператора является соблюдение прав и свобод человека при
                        обработке его данных, включая защиту прав на неприкосновенность частной жизни и профессиональную тайну.
                    </p>
                    <p>
                        1.2. Настоящая Политика применяется ко всей информации, которую Оператор может получить о посетителях 
                        веб-сайта <strong><?= $fullDomain ?></strong> в рамках предоставления услуг карьерного апгрейда.
                    </p>
                </div>

                <div class="policy-section">
                    <h2>2. Основные понятия</h2>
                    <ul class="terminology-list">
                        <li>
                            <strong>Веб-сайт</strong> — совокупность графических и информационных материалов, доступных по адресу <strong><?= $fullDomain ?></strong>.
                        </li>
                        <li><strong>Пользователь</strong> — любой посетитель веб-сайта.</li>
                        <li>
                            <strong>Персональные данные</strong> — любая информация, относящаяся к прямо или косвенно определенному Пользователю.
                        </li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>3. Данные, которые мы обрабатываем</h2>
                    <div class="data-grid">
                        <div class="data-item">
                            <i data-lucide="user-check"></i>
                            <div>
                                <strong>Личные данные:</strong>
                                <span>ФИО, Email, номер телефона (только цифры).</span>
                            </div>
                        </div>
                        <div class="data-item">
                            <i data-lucide="shield-check"></i>
                            <div>
                                <strong>Технические данные:</strong>
                                <span>Файлы cookies, IP-адрес, данные об устройстве.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="policy-section">
                    <h2>4. Цели обработки данных</h2>
                    <ul class="legal-list">
                        <li>Установление обратной связи для карьерных консультаций.</li>
                        <li>Предоставление доступа к материалам блога и экспертным кейсам.</li>
                        <li>Улучшение качества работы платформы и пользовательского интерфейса.</li>
                        <li>Направление уведомлений о новых программах пассивного дохода и стратегиях роста.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>5. Безопасность и правовые основания</h2>
                    <p>Мы обрабатываем данные только при наличии вашего согласия, полученного через формы на сайте. Оператор обеспечивает конфиденциальность данных и предотвращает доступ к ним третьих лиц без законных оснований.</p>
                </div>

                <div class="policy-section contact-footer-policy">
                    <h2>6. Вопросы и связь</h2>
                    <p>По любым вопросам обработки данных вы можете связаться с нашей службой поддержки в Париже:</p>
                    <div class="policy-contact-box">
                        <a href="mailto:hello@<?= $fullDomain ?>" class="policy-mail">
                            <i data-lucide="mail"></i> hello@<?= $fullDomain ?>
                        </a>
                        <p class="policy-address">24 Rue du Faubourg Saint-Honoré, 75008 Paris, France</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

    <footer class="footer">
        <div class="container footer__grid">
            <div class="footer__col footer__col--brand">
                <a href="./#hero" class="logo logo--footer">
                    <span class="logo__dot"></span>
                    <span class="logo__text"><?= $domainTitle ?></span>
                </a>
                <p class="footer__description">
                    Инновационная технология вашего профессионального роста. Постройте карьеру, которая работает на вас.
                </p>
            </div>

            <div class="footer__col">
                <h4 class="footer__title">Навигация</h4>
                <ul class="footer__links">
                    <li><a href="./#hero">Главная</a></li>
                    <li><a href="./#about">О нас</a></li>
                    <li><a href="./#services">Услуги</a></li>
                    <li><a href="./#blog">Статьи</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h4 class="footer__title">Документы</h4>
                <ul class="footer__links">
                    <li><a href="./privacy.php">Privacy Policy</a></li>
                    <li><a href="./cookies.php">Cookie Policy</a></li>
                    <li><a href="./terms.php">Terms of Service</a></li>
                    <li><a href="./return.php">Return Policy</a></li>
                    <li><a href="./disclaimer.php">Disclaimer</a></li>
                    <li><a href="./contact.php">Contact Us</a></li>
                    <li><a href="./personal-data-policy.php">Data Policy</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h4 class="footer__title">Контакты</h4>
                <ul class="footer__contact-info">
                    <li>
                        <i data-lucide="phone"></i>
                        <a href="tel:+33189481015">+33 1 89 48 10 15</a>
                    </li>
                    <li>
                        <i data-lucide="mail"></i>
                        <a href="mailto:hello@<?= $fullDomain ?>">hello@<?= $fullDomain ?></a>
                    </li>
                    <li>
                        <i data-lucide="map-pin"></i>
                        <span>24 Rue du Faubourg Saint-Honoré, 75008 Paris, France</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container footer__bottom">
            <p>&copy; 2026 <?= $domainTitle ?>. Все права защищены. Предложение активно только в странах ЕС.</p>
        </div>
    </footer>
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu__content">
            <ul class="mobile-menu__list">
                <li><a href="./#hero" class="mobile-menu__link">Главная</a></li>
                <li><a href="./#about" class="mobile-menu__link">Методология</a></li>
                <li><a href="./#services" class="mobile-menu__link">Программы</a></li>
                <li><a href="./#reviews" class="mobile-menu__link">Кейсы</a></li>
                <li><a href="./#blog" class="mobile-menu__link">Блог</a></li>
                <li><a href="./#contact" class="mobile-menu__link">Связаться</a></li>
            </ul>
        </div>
    </div>
    <div class="cookie-popup" id="cookie-popup">
        <div class="cookie-popup__content">
            <p>Этот сайт использует cookies для улучшения работы. Подробнее — в нашей <a href="./cookies.php">Cookie политике</a>.</p>
            <button class="btn btn--header" id="accept-cookies">Принять</button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>