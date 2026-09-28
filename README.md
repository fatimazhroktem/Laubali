# Laubali - Çok Yazarlı Blog Platformu

Karanlık tema estetiği ve oyun/siber tasarım unsurlarıyla hazırlanmış, birden fazla yazarın kişisel denemeler, oyun/film incelemeleri, gezi notları ve özlü sözler paylaşabildiği PHP ve MySQL tabanlı dinamik web platformu.

---

## Proje Hakkında

Bu proje, 2021 yılında aktif yazarlık yapan bir arkadaş grubu arasında içerik üretimi, fikir paylaşımı ve incelemeler yayımlamak amacıyla geliştirilmiştir. Sade mimarisi, tematik koyu modu, çoklu yazar desteği ve etkileşimli modülleriyle topluluk odaklı bir blog deneyimi sunar.

---

## Öne Çıkan Özellikler

* **Üyelik ve Yazar Yönetimi:**
  * Oturum açma, yetkilendirme ve çıkış işlemleri.
  * Yazar profilleri ve özel profil avatarları.
  * Anlık aktif yazar durumu takibi ("Kullanıcı Online").
* **Kategori ve İçerik Mimarisi:**
  * Kişisel Gelişim, Seyahatler, Öneriler, İncelemeler ve Özlü Sözler ana başlıkları.
  * İncelemeler ve yazılar için kart yerleşimleri ve okunma sayaçları.
  * "Özel" ve "Eskiler" arşiv listelemeleri.
* **Etkileşimli Modüller:**
  * Düşünce ve soru-cevap modülü (Örn: "Deli olmadığını nasıl kanıtlarsın?").
  * Ziyaretçiler veya yazarlar arası iletişim/mesajlaşma altyapısı.
* **Arayüz ve Tasarım:**
  * Açık ve koyu tema geçiş butonu ("Açık Mod").
  * Webfont desteği, özel tipografi ve logo tasarımı.
  * Görsel yükleme ve galeri yönetimi.

---

## Kullanılan Teknolojiler

* **Arka Yüz (Backend):** PHP (Native PHP)
* **Veritabanı:** MySQL / MariaDB
* **Ön Yüz (Frontend):** HTML5, CSS3, JavaScript
* **Sunucu Yapılandırması:** Apache (`.htaccess` URL ve erişim yönetimi)

---

## Dizin Yapısı

```text
blogumsu/
├── ayarlar/            # Veritabanı bağlantı ve site genel konfigürasyon dosyaları
├── css/                # Arayüz stil sayfaları
├── genel/              # Header, footer ve ortak kullanılan şablon bileşenleri
├── islemler/           # Form post, veri ekleme/güncelleme gibi backend işlem scriptleri
├── js/                 # Dinamik istemci tarafı scriptleri ve tema değiştirici
├── mesajlar/           # İletişim ve mesajlaşma modülüne ait sayfalar
├── ozel/               # Kategori dışı veya özel yetki gerektiren içerik sayfası
├── php/                # Yardımcı PHP fonksiyonları ve kütüphaneler
├── profil/             # Kullanıcı ve yazar profil sayfaları
├── resimler/           # Sabit site görselleri, ikonlar ve logolar
├── sayfalar/           # Blog ana sayfası (blog.php), hakkımızda ve içerik ekranları
├── soru/               # Etkileşimli soru-cevap modülüne ait sayfalar
├── stil/               # Ek tasarım ve özelleştirilmiş tema dosyaları
├── upload/             # Yazarlar tarafından yüklenen görseller ve ortam dosyaları
├── webfonts/           # Özel font ve ikon seti dosyaları
├── .htaccess           # Apache yönlendirme ve dizin güvenlik kuralları
├── index.html          # Karşılama / yönlendirme giriş sayfası
└── uyelik.sql          # Veritabanı tabloları ve örnek veri şeması
