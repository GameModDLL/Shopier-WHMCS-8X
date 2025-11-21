# 🚀 WHMCS 8.x Shopier Ödeme Ağ Geçidi Modülü

## 💳 Genel Bakış

Bu, **WHMCS 8.x** ve üzeri sürümler için geliştirilmiş Shopier ödeme ağ geçidi (Payment Gateway) modülüdür. Bu modül sayesinde WHMCS tabanlı hizmet satışlarınızda müşterilerinize Shopier güvencesiyle kredi kartı/banka kartı ile ödeme imkanı sunabilirsiniz.

Bu sürüm, WHMCS'in son sürümlerinde yaşanan **`_config` fonksiyonu hatalarını** çözmek ve ödeme deneyimini **iframe içinde gömülü** (embedded) olarak sunmak üzere optimize edilmiştir.

***

## ✨ Temel Özellikler

* **WHMCS 8.x Uyumlu:** En son WHMCS mimarisi ve PHP standartlarına uygun olarak güncellenmiştir.
* **Hatasız Kurulum:** Konfigürasyon sırasında ortaya çıkan yaygın **`_config` hatalarını** giderir.
* **Gömülü Ödeme Deneyimi (Iframe):** Müşterileri ayrı bir sayfaya yönlendirmek yerine, ödeme formunu **fatura sayfasının içinde, bir `iframe` alanında** açar.
* **Otomatik Geri Dönüş:** Başarılı/başarısız ödemelerden sonra faturanın durumunu otomatik olarak günceller.
* **Güvenli İmza Doğrulama:** Shopier'dan gelen geri dönüş verilerini (callback) gizli anahtar (Secret Key) ile doğrulayarak güvenliği sağlar.

***

## ⚙️ Kurulum ve Ayarlar

### 1. Dosyaların Yüklenmesi

1.  GitHub deposundaki tüm dosyaları indirin.
2.  İndirdiğiniz dosyaların içinde bulunan `shopier.php` ve `callback/shopier.php` dosyalarını WHMCS kurulum dizininize kopyalayın:
    * `shopier.php` dosyasını: `[WHMCS KÖK DİZİNİ]/modules/gateways/` klasörüne kopyalayın.
    * `callback/shopier.php` dosyasını: `[WHMCS KÖK DİZİNİ]/modules/gateways/callback/` klasörüne kopyalayın.

### 2. Shopier Panel Ayarları

Shopier hesabınızda, modül ayarlarında belirtilen Geri Dönüş URL'sini (Callback URL) tanımlamanız gerekir:

* **Geri Dönüş URL (Callback URL):**
    `[SİZİN WHMCS ADRESİNİZ]/modules/gateways/callback/shopier.php`

### 3. WHMCS Yönetici Ayarları

1.  WHMCS Yönetici Paneli'ne giriş yapın.
2.  **Yapılandırma > Sistem Ayarları > Ödeme Ağ Geçitleri** yolunu izleyin.
3.  **Tüm Ödeme Ağ Geçitleri** sekmesinde, listeden **"Shopier ile Hızlı Ödeme"** seçeneğini işaretleyip **Değişiklikleri Kaydet**'e tıklayın.
4.  Gerekli alanlara **API Key (Mağaza No)** ve **API Secret (Gizli Anahtar)** bilgilerinizi girin.
5.  Sayfanın altındaki **Para Birimleri** bölümünde satış yaptığınız para birimlerinin (Örn: TRY) seçili olduğundan emin olun ve ayarları kaydedin.

***

## 🤝 Katkıda Bulunma

Bu modülü daha iyi hale getirmek için katkılarınızı bekliyorum! Her türlü öneri, hata düzeltmesi veya yeni özellik talebi için lütfen bir **Issue** açmaktan çekinmeyin veya bir **Pull Request** gönderin.

***

## 📜 Lisans

Bu proje WHMCS Eula Lisansı ile uyumludur. Detaylar için [WHMCS Eula](http://www.whmcs.com/license/) sayfasını kontrol edebilirsiniz.


