<?php
declare(strict_types=1);

$siteBase = 'https://randevuajandam.com';
$apiBase = 'https://randevuajandam.com/api/v1';
$mobileBase = 'https://randevuajandam.com/api/v1';

$catalogues = [
    'public-doctor' => [
        'title' => 'Hekim Web Sitesi',
        'prefix' => '/public',
        'auth' => 'api-key',
        'items' => [
            ['GET', '/profile', 'Hekim profilini ve çalışma bilgisini getirir.'],
            ['GET', '/services', 'Aktif hizmet listesini getirir.'],
            ['GET', '/site-content', 'Blog, SSS, galeri, yorum ve eğitim paketini getirir.'],
            ['GET', '/educations', 'Yayındaki eğitimleri listeler.'],
            ['GET', '/educations/{slugOrId}', 'Eğitim detayı ve form alanlarını getirir.'],
            ['POST', '/educations/apply', 'Misafir eğitim başvurusu oluşturur.'],
            ['GET', '/slots?date=YYYY-MM-DD', 'Seçilen günün uygun saatlerini getirir.'],
            ['POST', '/otp/send', 'Randevu telefonu için doğrulama kodu gönderir.'],
            ['POST', '/otp/verify', 'Altı haneli telefon doğrulama kodunu onaylar.'],
            ['POST', '/appointments', 'Misafir randevu talebi oluşturur.'],
        ],
    ],
    'public-clinic' => [
        'title' => 'Klinik Web Sitesi',
        'prefix' => '/public/clinic',
        'auth' => 'api-key',
        'items' => [
            ['GET', '/profile', 'Klinik profilini ve hekim sayısını getirir.'],
            ['GET', '/doctors', 'Aktif klinik hekimlerini listeler.'],
            ['GET', '/doctors/{idOrSlug}', 'Hekim detayını getirir.'],
            ['GET', '/services?doktor_id={id}', 'Klinik hizmetlerini, isteğe bağlı hekim filtresiyle getirir.'],
            ['GET', '/site-content', 'Klinik hekimlerinin içeriklerini birleştirir.'],
            ['GET', '/slots?date=YYYY-MM-DD&doktor_id={id}', 'Hekim için uygun saatleri getirir.'],
            ['POST', '/otp/send', 'Hekim seçimiyle telefon doğrulama kodu gönderir.'],
            ['POST', '/otp/verify', 'Telefon doğrulama kodunu onaylar.'],
            ['POST', '/appointments', 'Klinik üzerinden randevu talebi oluşturur.'],
        ],
    ],
    'manage' => [
        'title' => 'Randevu Yönetimi',
        'prefix' => '/public/manage',
        'auth' => 'none',
        'items' => [
            ['GET', '/{token}', 'Yönetim bağlantısındaki randevuyu görüntüler.'],
            ['POST', '/{token}/cancel', 'Randevuyu yönetim tokenı ile iptal eder.'],
        ],
    ],
    'doctor-panel' => [
        'title' => 'Hekim Yönetim Paneli',
        'prefix' => '/doctor',
        'auth' => 'panel',
        'items' => [
            ['POST', '/auth/login', 'Hekim paneli için Bearer token üretir.'],
            ['GET', '/auth/me', 'Oturumdaki hekimin ayrıntılı profilini getirir.'],
            ['POST', '/auth/logout', 'Mevcut tokenı iptal eder.'],
            ['GET', '/dashboard', 'Panel özet verilerini getirir.'],
            ['PUT', '/profile', 'Profil bilgilerini günceller.'],
            ['POST', '/profile', 'Profil bilgisi ve fotoğrafını multipart olarak günceller.'],
            ['PUT', '/password', 'Panel parolasını günceller.'],
            ['GET', '/randevu-ayarlari', 'Randevu ayarlarını getirir.'],
            ['PUT', '/randevu-ayarlari', 'Randevu ayarlarını günceller.'],
            ['PUT', '/calisma-saatleri', 'Çalışma saatlerini günceller.'],
            ['GET', '/randevular', 'Randevuları filtreleyerek listeler.'],
            ['POST', '/randevular', 'Kayıtlı hasta için randevu oluşturur.'],
            ['POST', '/randevular/misafir', 'Misafir hasta için randevu oluşturur.'],
            ['PUT', '/randevular/{id}', 'Randevu bilgilerini günceller.'],
            ['PUT', '/randevular/{id}/durum', 'Randevu durumunu günceller.'],
            ['PUT', '/randevular/{id}/reschedule', 'Randevu tarih ve saatini değiştirir.'],
            ['DELETE', '/randevular/{id}', 'Randevuyu siler.'],
            ['GET', '/takvim/events', 'Takvim olaylarını getirir.'],
            ['POST', '/takvim/periyot', 'Randevu periyodunu günceller.'],
            ['GET', '/hastalar', 'Hastaları listeler.'],
            ['GET', '/hastalar/ara', 'Hasta araması yapar.'],
            ['POST', '/hastalar', 'Yeni hasta oluşturur.'],
            ['GET', '/izinler', 'İzin kayıtlarını listeler.'],
            ['POST', '/izinler', 'İzin kaydı oluşturur.'],
            ['DELETE', '/izinler/{id}', 'İzin kaydını siler.'],
            ['GET', '/hizli-kapat/slots', 'Hızlı kapatma için slotları getirir.'],
            ['POST', '/hizli-kapat', 'Seçili slotları kapatır veya açar.'],
            ['GET', '/hizmetler', 'Hizmetleri listeler.'],
            ['POST', '/hizmetler', 'Hizmet oluşturur.'],
            ['PUT', '/hizmetler/{id}', 'Hizmeti günceller.'],
            ['DELETE', '/hizmetler/{id}', 'Hizmeti siler.'],
            ['GET', '/branslar', 'Branş listesini getirir.'],
            ['GET', '/web-sitesi', 'Web sitesi ve API anahtarı bilgisini getirir.'],
            ['POST', '/web-sitesi', 'Web sitesi kurulumunu kaydeder.'],
            ['POST', '/web-sitesi/api-anahtari', 'API anahtarlarını yeniler.'],
        ],
    ],
    'doctor-features' => [
        'title' => 'Paket Özellikleri',
        'prefix' => '/doctor',
        'auth' => 'panel',
        'items' => [
            ['PUT', '/hakkimda', 'Hakkımda içeriğini günceller. [hakkimda]'],
            ['GET', '/bloglar', 'Blogları listeler. [blog]'],
            ['POST', '/bloglar', 'Blog oluşturur. [blog]'],
            ['PUT', '/bloglar/{id}', 'Blog günceller. [blog]'],
            ['DELETE', '/bloglar/{id}', 'Blog siler. [blog]'],
            ['GET', '/faqs', 'SSS listesini getirir. [faq]'],
            ['POST', '/faqs', 'SSS oluşturur. [faq]'],
            ['PUT', '/faqs/{id}', 'SSS günceller. [faq]'],
            ['DELETE', '/faqs/{id}', 'SSS siler. [faq]'],
            ['POST', '/faqs/{id}/toggle', 'SSS yayını değiştirir. [faq]'],
            ['GET', '/galeri', 'Galeri listesini getirir. [galeri]'],
            ['POST', '/galeri', 'Galeri görseli ekler. [galeri]'],
            ['POST', '/galeri/sirala', 'Galeri sırasını günceller. [galeri]'],
            ['PUT', '/galeri/{id}', 'Galeri girdisini günceller. [galeri]'],
            ['DELETE', '/galeri/{id}', 'Galeri girdisini siler. [galeri]'],
            ['GET', '/yorumlar', 'Yorumları listeler. [yorum]'],
            ['POST', '/yorumlar/{id}/yanit', 'Yoruma yanıt ekler. [yorum]'],
            ['PUT', '/yorumlar/{id}/durum', 'Yorum durumunu günceller. [yorum]'],
            ['GET', '/egitimler', 'Eğitimleri listeler. [egitimler]'],
            ['POST', '/egitimler', 'Eğitim oluşturur. [egitimler]'],
            ['GET', '/egitimler/{id}/basvurular', 'Eğitim başvurularını getirir. [egitimler]'],
            ['GET', '/finans/ozet', 'Finansal özeti getirir. [finans]'],
            ['GET|POST', '/finans/kategoriler', 'Finans kategorilerini listeler veya oluşturur. [finans]'],
            ['GET|POST', '/finans/gelirler', 'Gelirleri listeler veya oluşturur. [finans]'],
            ['GET|POST', '/finans/giderler', 'Giderleri listeler veya oluşturur. [finans]'],
            ['GET', '/finans/hasta-bakiyeleri', 'Hasta bakiyelerini getirir. [finans]'],
            ['GET', '/finans/rapor', 'Finans raporunu getirir. [finans]'],
        ],
    ],
    'mobile' => [
        'title' => 'Mobil Hasta Uygulaması',
        'prefix' => '',
        'auth' => 'mobile',
        'items' => [
            ['POST', '/auth/login', 'Hasta girişi yapar ve token üretir.'],
            ['POST', '/auth/register', 'Hasta kaydı yapar ve token üretir.'],
            ['POST', '/auth/social', 'Google/Apple giriş uç noktası; henüz 501 döner.'],
            ['GET', '/meta/filters', 'Branş, il ve görüşme tipi filtrelerini getirir.'],
            ['GET', '/doctors', 'Hekimleri sayfalı olarak listeler.'],
            ['GET', '/doctors/{id}', 'Hekim detayını getirir.'],
            ['GET', '/doctors/{id}/slots?tarih=YYYY-MM-DD', 'Hekim slotlarını getirir.'],
            ['GET', '/clinics', 'Klinikleri sayfalı olarak listeler.'],
            ['GET', '/clinics/{id}', 'Klinik detayını getirir.'],
            ['GET', '/map/pins', 'Harita işaretçilerini getirir.'],
            ['GET', '/blogs', 'Blogları sayfalı olarak listeler.'],
            ['GET', '/blogs/{id}', 'Blog detayını getirir.'],
            ['GET', '/services', 'Hizmetleri sayfalı olarak listeler.'],
            ['GET', '/services/{id}', 'Hizmet detayını getirir.'],
            ['GET', '/auth/me', 'Hasta profilini getirir.'],
            ['PUT', '/auth/profile', 'Hasta profilini günceller.'],
            ['PUT', '/auth/password', 'Hasta parolasını günceller.'],
            ['POST', '/auth/logout', 'Hasta oturumunu kapatır.'],
            ['GET', '/appointments', 'Hastanın randevularını getirir.'],
            ['POST', '/appointments', 'Hasta adına randevu oluşturur.'],
            ['POST', '/appointments/{id}/cancel', 'Hastanın randevusunu iptal eder.'],
        ],
    ],
];

function methodClass(string $method): string
{
    return 'method-'.strtolower(str_replace('|', '-', $method));
}

function endpointCount(array $catalogues): int
{
    return array_sum(array_map(static fn (array $group): int => count($group['items']), $catalogues));
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#070d18">
    <meta name="description" content="Randevu Ajandam — hekim ve klinik randevu SaaS platformu. Ürün tanıtımı ve API dokümantasyonu.">
    <title>Randevu Ajandam | Platform &amp; API Dokümantasyonu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="layout">
    <aside class="sidebar" id="sidebar">
        <a class="brand" href="#baslangic">
            <span class="brand-mark">R</span>
            <span>randevu<span>ajandam</span></span>
        </a>
        <p class="eyebrow">Developer Portal</p>
        <nav class="navigation" aria-label="Dokümantasyon menüsü">
            <a href="#baslangic">Başlangıç</a>
            <a href="#platform">Platform nedir?</a>
            <a href="#moduller">Modüller</a>
            <a href="#kim-icin">Kimler için?</a>
            <p>API</p>
            <a href="#api-kok">API kök adresleri</a>
            <a href="#kimlik-dogrulama">Kimlik doğrulama</a>
            <a href="#randevu-akisi">Randevu akışı</a>
            <p>Referans</p>
            <a href="#public-doctor">Hekim web sitesi</a>
            <a href="#public-clinic">Klinik web sitesi</a>
            <a href="#manage">Randevu yönetimi</a>
            <a href="#doctor-panel">Hekim paneli</a>
            <a href="#doctor-features">Paket özellikleri</a>
            <a href="#mobile">Mobil hasta API</a>
            <p>Kaynaklar</p>
            <a href="#hatalar">Hata sözleşmesi</a>
            <a href="#notlar">Uygulama notları</a>
        </nav>
        <div class="sidebar-footer">
            <span class="status-dot"></span> API v1
            <span class="muted">·</span>
            <span class="muted">Güncel</span>
        </div>
    </aside>

    <div class="sidebar-overlay" id="sidebar-overlay" data-overlay hidden></div>

    <main class="content">
        <header class="topbar">
            <button class="menu-button" type="button" aria-label="Menüyü aç" data-menu>☰</button>
            <div class="search">
                <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/>
                </svg>
                <input type="search" id="search" placeholder="Endpoint, modül veya konu ara…" autocomplete="off">
                <kbd>/</kbd>
            </div>
            <a class="api-link" href="#api-referansi">API Referansı ↗</a>
        </header>

        <div class="page">
            <!-- HERO -->
            <section class="hero" id="baslangic">
                <div class="hero-copy">
                    <div class="hero-badge"><i>✓</i> Hekim &amp; Klinik Randevu SaaS</div>
                    <h1>Randevu yönetimini<br><em>tek platformda</em> birleştirin.</h1>
                    <p class="lead">
                        Randevu Ajandam; doktorlar, diyetisyenler, psikologlar ve kliniklerin randevu,
                        profil ve vitrin sitelerini yönettiği; hastaların ise uzman bulup randevu aldığı
                        modern bir SaaS platformudur.
                    </p>
                    <div class="hero-actions">
                        <a class="button primary" href="#platform">Platformu keşfet <span>→</span></a>
                        <a class="button ghost" href="#api-referansi">API dokümantasyonu</a>
                    </div>
                </div>
                <div class="hero-card">
                    <div class="code-title">
                        <span class="live-dot"></span>
                        Uygun randevu saatleri
                        <button type="button" class="copy-button" data-copy="#hero-code">Kopyala</button>
                    </div>
                    <pre id="hero-code"><code><span class="code-curl">curl</span> -G <span class="code-string">"<?= htmlspecialchars($apiBase) ?>/public/slots"</span> \
  -H <span class="code-string">"X-Api-Key: YOUR_API_KEY"</span> \
  -H <span class="code-string">"X-Api-Secret: YOUR_API_SECRET"</span> \
  --data-urlencode <span class="code-string">"date=2026-07-20"</span></code></pre>
                    <div class="code-response"><span>200</span> <code>{"success":true,"data":{"slots":[...]}}</code></div>
                </div>
            </section>

            <section class="stats" aria-label="Platform özeti">
                <div><strong><span><?= endpointCount($catalogues) ?>+</span></strong><span>API Endpoint</span></div>
                <div><strong><span>6</span></strong><span>Ürün modülü</span></div>
                <div><strong><span>JSON</span></strong><span>Yanıt biçimi</span></div>
                <div><strong><span>v1</span></strong><span>Kararlı API</span></div>
            </section>

            <!-- PLATFORM INTRO -->
            <section class="doc-section" id="platform">
                <div class="intro-panel">
                    <p class="eyebrow">01 · Ürün tanıtımı</p>
                    <h2>Ne işe yarar? Amacı nedir?</h2>
                    <p class="intro-lead">
                        Randevu Ajandam’ın amacı; sağlık ve danışmanlık profesyonellerinin
                        <strong style="color:#fff;font-weight:600">randevu operasyonunu dijitalleştirmek</strong>,
                        kendi markalarını web’de sergilemek ve hastalarla güvenli, izlenebilir bir iletişim kurmaktır.
                        Tek bir platform; pazar yeri, yönetim paneli, kurumsal vitrin siteleri ve API’yi bir arada sunar.
                    </p>
                    <div class="intro-pills">
                        <span>📅 Online randevu</span>
                        <span>🏥 Hekim &amp; klinik paneli</span>
                        <span>🌐 Özel web siteleri</span>
                        <span>🔌 Public API</span>
                        <span>📱 Mobil hasta deneyimi</span>
                        <span>💳 SaaS paketleri</span>
                    </div>
                </div>

                <div class="purpose-grid">
                    <article class="purpose-card">
                        <div class="purpose-icon">🎯</div>
                        <h3>Amaç</h3>
                        <p>
                            Randevu alma, onaylama, iptal ve yeniden planlama süreçlerini
                            tek merkezde toplamak; kağıt ajanda ve dağınık Excel tablolarını ortadan kaldırmak.
                        </p>
                    </article>
                    <article class="purpose-card t2">
                        <div class="purpose-icon">⚙️</div>
                        <h3>Ne işe yarar?</h3>
                        <p>
                            Hekim ve klinikler çalışma saatlerini, hizmetlerini, hastalarını ve finansını yönetir;
                            ziyaretçiler uygun saati seçip KVKK uyumlu randevu talebi oluşturur.
                        </p>
                    </article>
                    <article class="purpose-card t3">
                        <div class="purpose-icon">🚀</div>
                        <h3>Neden farklı?</h3>
                        <p>
                            Sadece bir randevu takvimi değil: SaaS üyelik paketleri, API ile entegre
                            hekim/klinik siteleri, OTP, webhook ve mobil API ile uçtan uca ekosistem.
                        </p>
                    </article>
                </div>

                <div class="value-strip">
                    <div class="value-item">
                        <strong>Ziyaretçi için</strong>
                        <p>Branş, konum ve uzman araması; hekim detayı; uygun slot seçimi; anında randevu talebi.</p>
                    </div>
                    <div class="value-item">
                        <strong>Hekim / klinik için</strong>
                        <p>Panel, takvim, hasta kartı, finans, içerik (blog, galeri, SSS) ve kendi web vitrini.</p>
                    </div>
                    <div class="value-item">
                        <strong>Geliştirici için</strong>
                        <p>JSON API, API key + Bearer oturum, tutarlı hata sözleşmesi ve hız limitleri.</p>
                    </div>
                </div>
            </section>

            <!-- MODULES -->
            <section class="doc-section" id="moduller">
                <div class="section-heading">
                    <p class="eyebrow">02 · Ekosistem</p>
                    <h2>Platform modülleri</h2>
                    <p>Her parça kendi rolünü oynar; veri ve randevu akışı merkezi API üzerinden birleşir.</p>
                </div>
                <div class="module-grid">
                    <article class="module-card">
                        <div class="stripe"></div>
                        <div class="module-body">
                            <span class="tag">Site · randevuajandam.com</span>
                            <h3>Ana platform &amp; pazar yeri</h3>
                            <p>Ziyaretçilerin hekim ve klinik aradığı vitrin; hekim kaydı, paket seçimi ve admin paneli.</p>
                            <ul>
                                <li>Kök: <code><?= htmlspecialchars($siteBase) ?></code></li>
                                <li>Yönetim paneli (<code>/yonetim</code>)</li>
                                <li>Hekim paneli (<code>/hekim/panel</code>)</li>
                                <li>Dizin, arama, paket &amp; SEO ayarları</li>
                            </ul>
                        </div>
                    </article>
                    <article class="module-card m2">
                        <div class="stripe"></div>
                        <div class="module-body">
                            <span class="tag">API · /api/v1</span>
                            <h3>Merkezi Public / Panel API</h3>
                            <p>Hekim ve klinik siteleri ile panel istemcilerinin konuştuğu JSON arayüzü.</p>
                            <ul>
                                <li>Kök: <code><?= htmlspecialchars($apiBase) ?></code></li>
                                <li>Public hekim &amp; klinik uç noktaları</li>
                                <li>Hekim paneli Bearer oturumu</li>
                                <li>Slot, OTP, randevu, içerik, finans</li>
                            </ul>
                        </div>
                    </article>
                    <article class="module-card m3">
                        <div class="stripe"></div>
                        <div class="module-body">
                            <span class="tag">Hekim sitesi</span>
                            <h3>Bireysel hekim vitrin sitesi</h3>
                            <p>Hekimin kendi markasıyla yayınladığı kurumsal site + CMS; randevu verisi API’den gelir.</p>
                            <ul>
                                <li>Özel alan adı veya alt alan adı</li>
                                <li>Tema &amp; içerik yönetimi</li>
                                <li>Online randevu formu</li>
                                <li>Paket: Özel Web Sitesi</li>
                            </ul>
                        </div>
                    </article>
                    <article class="module-card m4">
                        <div class="stripe"></div>
                        <div class="module-body">
                            <span class="tag">Klinik sitesi</span>
                            <h3>Klinik kurumsal site</h3>
                            <p>Çok hekimli klinikler için vitrin: hekim listesi, hizmetler ve hekim seçimli randevu.</p>
                            <ul>
                                <li>Özel alan adı veya alt alan adı</li>
                                <li>Klinik profili &amp; hekim kadrosu</li>
                                <li>CMS ve tema yönetimi</li>
                                <li>Paket: Klinik Kurumsal</li>
                            </ul>
                        </div>
                    </article>
                    <article class="module-card m5">
                        <div class="stripe"></div>
                        <div class="module-body">
                            <span class="tag">Mobil</span>
                            <h3>Hasta mobil uygulaması</h3>
                            <p>React Native / Expo tabanlı hasta uygulaması; dizin, randevu ve hesap yönetimi.</p>
                            <ul>
                                <li>Kayıt / giriş (Bearer token)</li>
                                <li>Hekim &amp; klinik keşfi</li>
                                <li>Randevu oluşturma &amp; iptal</li>
                            </ul>
                        </div>
                    </article>
                    <article class="module-card m6">
                        <div class="stripe"></div>
                        <div class="module-body">
                            <span class="tag">SaaS</span>
                            <h3>Paket &amp; abonelik modeli</h3>
                            <p>Aylık / yıllık paketler; özellik bayrakları (blog, galeri, finans, web sitesi vb.).</p>
                            <ul>
                                <li>Dinamik özellik listesi</li>
                                <li>API’de paket kısıtları (403)</li>
                                <li>iyzico ile ödeme altyapısı</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </section>

            <!-- WHO FOR -->
            <section class="doc-section" id="kim-icin">
                <div class="section-heading">
                    <p class="eyebrow">03 · Hedef kitle</p>
                    <h2>Kimler için tasarlandı?</h2>
                    <p>Sağlık ve danışmanlık alanında randevu ile çalışan herkes için ölçeklenebilir bir altyapı.</p>
                </div>
                <div class="audience-row">
                    <article class="audience-card">
                        <div class="emoji">🩺</div>
                        <h3>Bireysel hekimler</h3>
                        <p>Muayenehane randevusu, vitrin sitesi ve hasta takibi.</p>
                    </article>
                    <article class="audience-card">
                        <div class="emoji">🏥</div>
                        <h3>Klinikler</h3>
                        <p>Çok hekimli kadro, hakediş, duyuru ve kurumsal site.</p>
                    </article>
                    <article class="audience-card">
                        <div class="emoji">🧠</div>
                        <h3>Psikolog &amp; diyetisyen</h3>
                        <p>Online / yüz yüze görüşme tipleri ve esnek takvim.</p>
                    </article>
                    <article class="audience-card">
                        <div class="emoji">💻</div>
                        <h3>Geliştiriciler</h3>
                        <p>Site, mobil veya özel istemci için stabil API sözleşmesi.</p>
                    </article>
                </div>
            </section>

            <!-- API ROOT -->
            <section class="doc-section" id="api-kok">
                <div class="section-heading">
                    <p class="eyebrow">04 · Genel bakış</p>
                    <h2>API kök adresleri</h2>
                    <p>İstemci tipine göre iki taban URL kullanılır. Tüm yanıtlar JSON biçimindedir.</p>
                </div>
                <div class="base-grid">
                    <article class="base-card">
                        <span class="card-icon">⌘</span>
                        <h3>Platform kök adresi</h3>
                        <code><?= htmlspecialchars($siteBase) ?></code>
                        <p>Ana web sitesi, yönetim paneli ve hekim paneli bu kök altında yayınlanır.</p>
                    </article>
                    <article class="base-card">
                        <span class="card-icon">⚡</span>
                        <h3>Web sitesi ve panel API</h3>
                        <code><?= htmlspecialchars($apiBase) ?></code>
                        <p>Hekim, klinik public API ve hekim paneli isteklerini karşılar.</p>
                    </article>
                    <article class="base-card">
                        <span class="card-icon">▣</span>
                        <h3>Mobil hasta API</h3>
                        <code><?= htmlspecialchars($mobileBase) ?></code>
                        <p>React Native hasta uygulaması için JSON uç noktaları.</p>
                    </article>
                    <article class="base-card">
                        <span class="card-icon">↗</span>
                        <h3>Örnek istek</h3>
                        <code><?= htmlspecialchars($apiBase) ?>/public/profile</code>
                        <p>Tüm path’ler bu köke eklenir; <code>Accept: application/json</code> gönderin.</p>
                    </article>
                </div>
                <div class="notice info">
                    <span>i</span>
                    <div>
                        <strong>Üretim adresi</strong>
                        <p>Kök: <code><?= htmlspecialchars($siteBase) ?></code> · API: <code><?= htmlspecialchars($apiBase) ?></code>. HTTPS zorunludur; API anahtarlarını yalnızca sunucu tarafında kullanın.</p>
                    </div>
                </div>
            </section>

            <!-- AUTH -->
            <section class="doc-section" id="kimlik-dogrulama">
                <div class="section-heading">
                    <p class="eyebrow">05 · Güvenlik</p>
                    <h2>Kimlik doğrulama</h2>
                    <p>İstek türüne göre API anahtarı, Bearer token veya yönetim tokenı kullanılır.</p>
                </div>
                <div class="auth-grid">
                    <article class="auth-card">
                        <span class="auth-number">01</span>
                        <h3>Site anahtarı</h3>
                        <p>Hekim ve klinik web sitesi uç noktalarında iki header zorunludur.</p>
                        <pre><code>X-Api-Key: YOUR_API_KEY
X-Api-Secret: YOUR_API_SECRET</code></pre>
                        <small><code>X-Secret-Key</code>, secret için geriye uyumlu alternatif başlıktır.</small>
                    </article>
                    <article class="auth-card">
                        <span class="auth-number">02</span>
                        <h3>Panel oturumu</h3>
                        <p>Önce giriş yapın; dönen tokenı korumalı panel isteklerinde kullanın.</p>
                        <pre><code>Authorization: Bearer {token}
X-Api-Key: YOUR_API_KEY
X-Api-Secret: YOUR_API_SECRET</code></pre>
                        <small>Token yalnızca giriş yanıtında düz metin olarak döner.</small>
                    </article>
                    <article class="auth-card">
                        <span class="auth-number">03</span>
                        <h3>Hasta oturumu</h3>
                        <p>Mobil giriş veya kayıt sonrasında yalnızca Bearer token gönderilir.</p>
                        <pre><code>Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json</code></pre>
                        <small>Token geçersiz, süresi dolmuş veya silinmişse 401 döner.</small>
                    </article>
                </div>
                <div class="notice warning">
                    <span>!</span>
                    <div>
                        <strong>Anahtarları istemciye koymayın</strong>
                        <p><code>X-Api-Secret</code> yalnızca sunucu tarafında saklanmalıdır. Tarayıcıdaki herkese açık JavaScript paketi veya mobil uygulama içine gömülmemelidir.</p>
                    </div>
                </div>
            </section>

            <!-- FLOW -->
            <section class="doc-section" id="randevu-akisi">
                <div class="section-heading">
                    <p class="eyebrow">06 · Entegrasyon</p>
                    <h2>Randevu oluşturma akışı</h2>
                    <p>Misafir randevusu; uygun slot seçimi ve gerekirse telefon doğrulamasından sonra oluşturulur.</p>
                </div>
                <ol class="flow">
                    <li>
                        <span>1</span>
                        <div>
                            <strong>Profil ve hizmetleri getir</strong>
                            <p><code>GET /public/profile</code> ve <code>GET /public/services</code> ile formu hazırlayın.</p>
                        </div>
                    </li>
                    <li>
                        <span>2</span>
                        <div>
                            <strong>Uygun saati sorgula</strong>
                            <p><code>GET /public/slots?date=YYYY-MM-DD</code> çağrısındaki boş slotlardan birini seçin.</p>
                        </div>
                    </li>
                    <li>
                        <span>3</span>
                        <div>
                            <strong>OTP kullanın</strong>
                            <p>OTP etkinse <code>/otp/send</code> ve <code>/otp/verify</code> adımlarıyla telefonu doğrulayın.</p>
                        </div>
                    </li>
                    <li>
                        <span>4</span>
                        <div>
                            <strong>Randevu oluştur</strong>
                            <p><code>POST /public/appointments</code> gövdesinde KVKK onayını, hasta ve randevu alanlarını gönderin.</p>
                        </div>
                    </li>
                </ol>

                <article class="endpoint-detail" id="appointment-example" data-searchable>
                    <div class="endpoint-top">
                        <div><span class="method method-post">POST</span><code>/public/appointments</code></div>
                        <span class="badge">API key gerekli</span>
                    </div>
                    <p class="endpoint-description">Bireysel hekim sitesi üzerinden misafir randevu talebi oluşturur. Başarılı yanıtta yönetim bağlantısı döner.</p>
                    <div class="detail-grid">
                        <div>
                            <h4>JSON gövdesi</h4>
                            <pre><code>{
  "hizmet_id": 12,
  "tarih": "2026-07-20",
  "saat": "14:30",
  "ad": "Ayşe",
  "soyad": "Yılmaz",
  "telefon": "05321234567",
  "e_posta": "ayse@example.com",
  "not": "Kontrol randevusu",
  "gorusme_tipi": "yuz_yuze",
  "kvkk_onay": true,
  "otp_kod": "123456"
}</code></pre>
                        </div>
                        <div>
                            <h4>201 yanıtı</h4>
                            <pre><code>{
  "success": true,
  "message": "Randevu talebiniz alındı.",
  "data": {
    "id": 145,
    "tarih": "2026-07-20",
    "saat": "14:30",
    "durum": "beklemede",
    "yonetim_url": "https://.../randevu-yonet/..."
  }
}</code></pre>
                        </div>
                    </div>
                    <div class="parameter-table-wrap">
                        <table>
                            <thead>
                            <tr><th>Alan</th><th>Tür</th><th>Durum</th><th>Açıklama</th></tr>
                            </thead>
                            <tbody>
                            <tr><td><code>hizmet_id</code></td><td>integer</td><td><b>Zorunlu</b></td><td>Seçilen aktif hizmetin ID değeri.</td></tr>
                            <tr><td><code>tarih</code></td><td>string</td><td><b>Zorunlu</b></td><td><code>Y-m-d</code>; bugün veya sonrası olmalıdır.</td></tr>
                            <tr><td><code>saat</code></td><td>string</td><td><b>Zorunlu</b></td><td><code>H:i</code> biçiminde, uygun bir slot olmalıdır.</td></tr>
                            <tr><td><code>ad</code>, <code>soyad</code>, <code>telefon</code></td><td>string</td><td><b>Zorunlu</b></td><td>Hasta iletişim bilgileri.</td></tr>
                            <tr><td><code>kvkk_onay</code></td><td>boolean</td><td><b>Zorunlu</b></td><td><code>true</code> veya kabul edilen form değeri olmalıdır.</td></tr>
                            <tr><td><code>gorusme_tipi</code></td><td>enum</td><td>Opsiyonel</td><td><code>yuz_yuze</code> (varsayılan) veya <code>online</code>.</td></tr>
                            <tr><td><code>otp_kod</code></td><td>string</td><td>Koşullu</td><td>OTP aktifse altı haneli doğrulama kodu.</td></tr>
                            </tbody>
                        </table>
                    </div>
                </article>
            </section>

            <!-- EXAMPLES -->
            <section class="doc-section" id="detayli-ornekler">
                <div class="section-heading">
                    <p class="eyebrow">07 · Örnekler</p>
                    <h2>Sık kullanılan uç noktalar</h2>
                </div>
                <div class="example-stack">
                    <article class="endpoint-detail" data-searchable>
                        <div class="endpoint-top">
                            <div><span class="method method-get">GET</span><code>/public/slots?date=2026-07-20</code></div>
                            <span class="badge">60 istek/dk</span>
                        </div>
                        <p class="endpoint-description">Hekimin seçilen gün için boş randevu saatlerini döndürür. Geçmiş tarih kabul edilmez; bugünün geçmiş saatleri yanıttan çıkarılır.</p>
                        <div class="inline-parameters"><span><code>date</code> <b>zorunlu</b> <em>Y-m-d</em></span></div>
                    </article>
                    <article class="endpoint-detail" data-searchable>
                        <div class="endpoint-top">
                            <div><span class="method method-post">POST</span><code>/public/otp/verify</code></div>
                            <span class="badge">15 istek/dk</span>
                        </div>
                        <p class="endpoint-description">Gönderilen SMS kodunu doğrular. Kod altı karakter olmalıdır ve telefon ile ilişkilidir.</p>
                        <pre><code>{ "telefon": "05321234567", "kod": "123456" }</code></pre>
                    </article>
                    <article class="endpoint-detail" data-searchable>
                        <div class="endpoint-top">
                            <div><span class="method method-post">POST</span><code>/doctor/auth/login</code></div>
                            <span class="badge">12 istek/dk</span>
                        </div>
                        <p class="endpoint-description">Site anahtarıyla doğrulanan hekim için panel oturumu üretir. Klinik panelinde eşdeğer uç nokta <code>/clinic/doctor/auth/login</code> adresidir.</p>
                        <pre><code>{ "e_posta": "doktor@example.com", "sifre": "guvenli-parola" }</code></pre>
                    </article>
                    <article class="endpoint-detail" data-searchable>
                        <div class="endpoint-top">
                            <div><span class="method method-post">POST</span><code>/auth/register</code></div>
                            <span class="badge mobile-badge">Mobil API</span>
                        </div>
                        <p class="endpoint-description">Mobil hasta hesabı oluşturur ve doğrudan Bearer token döner.</p>
                        <pre><code>{ "ad": "Ayşe", "soyad": "Yılmaz", "e_posta": "ayse@example.com", "telefon": "05321234567", "sifre": "en-az-6-karakter", "device": "ios" }</code></pre>
                    </article>
                </div>
            </section>

            <!-- FULL REFERENCE -->
            <section class="doc-section reference" id="api-referansi">
                <div class="section-heading">
                    <p class="eyebrow">08 · API referansı</p>
                    <h2>Tüm uç noktalar</h2>
                    <p>Arama kutusu yol, HTTP metodu, açıklama ve paket adlarında filtreler.</p>
                </div>
                <?php foreach ($catalogues as $id => $catalogue): ?>
                    <article class="endpoint-group" id="<?= htmlspecialchars($id) ?>" data-group>
                        <header class="group-header">
                            <div>
                                <h3><?= htmlspecialchars($catalogue['title']) ?></h3>
                                <p><code><?= htmlspecialchars($catalogue['auth'] === 'mobile' ? $mobileBase : $apiBase) ?><?= htmlspecialchars($catalogue['prefix']) ?></code></p>
                            </div>
                            <span><?= count($catalogue['items']) ?> endpoint</span>
                        </header>
                        <div class="endpoint-list">
                            <?php foreach ($catalogue['items'] as [$method, $path, $description]): ?>
                                <div class="endpoint-row" data-searchable>
                                    <span class="method <?= methodClass($method) ?>"><?= htmlspecialchars($method) ?></span>
                                    <code><?= htmlspecialchars($path) ?></code>
                                    <p><?= htmlspecialchars($description) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </section>

            <!-- ERRORS -->
            <section class="doc-section" id="hatalar">
                <div class="section-heading">
                    <p class="eyebrow">09 · Hatalar</p>
                    <h2>Tutarlı hata sözleşmesi</h2>
                    <p>Başarılı JSON yanıtları <code>success: true</code> taşır. Doğrulama ve iş kuralı hataları açıklayıcı <code>message</code> alanıyla döner.</p>
                </div>
                <div class="error-grid">
                    <div><span class="status s400">422</span><h3>Doğrulama / iş kuralı</h3><p>Eksik alan, geçersiz format, dolu slot, yanlış parola veya geçersiz OTP.</p></div>
                    <div><span class="status s401">401</span><h3>Kimlik doğrulama</h3><p>Eksik veya yanlış API anahtarı, secret ya da geçersiz Bearer token.</p></div>
                    <div><span class="status s403">403</span><h3>Yetki / paket</h3><p>Pasif hesap, yanlış site sahibi veya pakette olmayan özellik.</p></div>
                    <div><span class="status s429">429</span><h3>Hız limiti</h3><p>Uç noktaya ait dakikalık istek sınırı aşıldı. Geri çekilme uygulayın.</p></div>
                    <div><span class="status s404">404</span><h3>Kaynak bulunamadı</h3><p>İstenen hekim, eğitim veya başka bir kayıt mevcut değil.</p></div>
                    <div><span class="status s500">500</span><h3>Sunucu hatası</h3><p>Beklenmeyen hata. İsteği güvenli biçimde yeniden deneyin ve kayıt altına alın.</p></div>
                </div>
                <pre class="response-code"><code>{
  "success": false,
  "message": "API anahtarı gerekli. X-Api-Key başlığını gönderin."
}</code></pre>
            </section>

            <!-- NOTES -->
            <section class="doc-section" id="notlar">
                <div class="section-heading">
                    <p class="eyebrow">10 · Uygulama notları</p>
                    <h2>Entegrasyon için notlar</h2>
                </div>
                <div class="notes">
                    <article>
                        <h3>İçerik türü</h3>
                        <p>JSON isteklerinde <code>Content-Type: application/json</code> gönderin. Fotoğraf içeren panel güncellemeleri için <code>multipart/form-data</code> kullanın.</p>
                    </article>
                    <article>
                        <h3>Sayfalama</h3>
                        <p>Liste uç noktaları <code>page</code> ve <code>per_page</code> kabul eder. Maksimum sayfa boyutu uç noktaya göre 40 veya 50’dir. Yanıtlar <code>data.items</code> ve <code>data.meta</code> içerir.</p>
                    </article>
                    <article>
                        <h3>Paket kısıtları</h3>
                        <p>Blog, SSS, galeri, yorum, eğitim ve finans uç noktaları ilgili hekim paket özelliğini gerektirir. Bu durumda API <code>403</code> döner.</p>
                    </article>
                    <article>
                        <h3>Randevu güvenliği</h3>
                        <p>Randevu uç noktaları hız limiti, honeypot ve yapılandırmaya göre OTP doğrulaması uygular. İstemci, kullanıcıya API hata mesajını anlaşılır biçimde göstermelidir.</p>
                    </article>
                </div>
            </section>
        </div>

        <footer>
            <span class="footer-brand">Randevu Ajandam</span>
            <span>•</span>
            Developer Portal
            <span>•</span>
            API v1 Dokümantasyonu
            <span>•</span>
            Platform tanıtımı &amp; entegrasyon rehberi
        </footer>
    </main>
</div>
<script src="assets/app.js"></script>
</body>
</html>
