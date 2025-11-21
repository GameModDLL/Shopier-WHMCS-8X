# 🚀 WHMCS 8.x Shopier Ödeme Ağ Geçidi Modülü / Shopier Payment Gateway Module

## 🌍 Dil Seçimi / Language Selection

| Dil / Language | Bağlantı / Link |
| :--- | :--- |
| **Türkçe (TR)** | [Türkçe Açıklama](/TR-Readme.md) |
| **English (EN)** | [English Description](/EN-Readme.md) |

***

# 🇹🇷 Türkçe Açıklama

## 💳 Genel Bakış

Bu, **WHMCS 8.x** ve üzeri sürümler için geliştirilmiş Shopier ödeme ağ geçidi (Payment Gateway) modülüdür. Bu modül sayesinde WHMCS tabanlı hizmet satışlarınızda müşterilerinize Shopier güvencesiyle kredi kartı/banka kartı ile ödeme imkanı sunabilirsiniz.

Bu sürüm, WHMCS'in son sürümlerinde yaşanan **`_config` fonksiyonu hatalarını** çözmek ve ödeme deneyimini **iframe içinde gömülü** (embedded) olarak sunmak üzere optimize edilmiştir.

### ✨ Temel Özellikler

* **WHMCS 8.x Uyumlu:** En son WHMCS mimarisi ve PHP standartlarına uygun olarak güncellenmiştir.
* **Hatasız Kurulum:** Konfigürasyon sırasında ortaya çıkan yaygın **`_config` hatalarını** giderir.
* **Gömülü Ödeme Deneyimi (Iframe):** Müşterileri ayrı bir sayfaya yönlendirmek yerine, ödeme formunu **fatura sayfasının içinde, bir `iframe` alanında** açar.
* **Otomatik Geri Dönüş:** Başarılı/başarısız ödemelerden sonra faturanın durumunu otomatik olarak günceller.
* **Güvenli İmza Doğrulama:** Shopier'dan gelen geri dönüş verilerini (callback) gizli anahtar (Secret Key) ile doğrulayarak güvenliği sağlar.

### ⚙️ Kurulum ve Ayarlar

#### 1. Dosyaların Yüklenmesi

1.  GitHub deposundaki tüm dosyaları indirin.
2.  İndirdiğiniz dosyaların içinde bulunan `shopier.php` ve `callback/shopier.php` dosyalarını WHMCS kurulum dizininize kopyalayın:
    * `shopier.php` dosyasını: `[WHMCS KÖK DİZİNİ]/modules/gateways/` klasörüne kopyalayın.
    * `callback/shopier.php` dosyasını: `[WHMCS KÖK DİZİNİ]/modules/gateways/callback/` klasörüne kopyalayın.

#### 2. Shopier Panel Ayarları

Shopier hesabınızda, modül ayarlarında belirtilen Geri Dönüş URL'sini (Callback URL) tanımlamanız gerekir:

* **Geri Dönüş URL (Callback URL):**
    `[SİZİN WHMCS ADRESİNİZ]/modules/gateways/callback/shopier.php`

#### 3. WHMCS Yönetici Ayarları

1.  WHMCS Yönetici Paneli'ne giriş yapın.
2.  **Yapılandırma > Sistem Ayarları > Ödeme Ağ Geçitleri** yolunu izleyin.
3.  **Tüm Ödeme Ağ Geçitleri** sekmesinde, listeden **"Shopier ile Hızlı Ödeme"** seçeneğini işaretleyip **Değişiklikleri Kaydet**'e tıklayın.
4.  Gerekli alanlara **API Key (Mağaza No)** ve **API Secret (Gizli Anahtar)** bilgilerinizi girin.
5.  Sayfanın altındaki **Para Birimleri** bölümünde satış yaptığınız para birimlerinin (Örn: TRY) seçili olduğundan emin olun ve ayarları kaydedin.

---

# 🇺🇸 English Description

## 💳 Overview

This is the Shopier payment gateway module developed for **WHMCS 8.x** and later versions. This module allows you to offer your customers the ability to pay with a credit card or bank card via Shopier for your WHMCS-based services.

This version has been optimized specifically to resolve common **`_config` function errors** encountered in recent WHMCS versions and to provide an **embedded (iframe)** payment experience.

### ✨ Key Features

* **WHMCS 8.x Compatible:** Updated to align with the latest WHMCS architecture and PHP standards.
* **Error-Free Setup:** Resolves common **`_config` errors** encountered during the configuration process.
* **Embedded Payment Experience (Iframe):** Opens the payment form **inside an iframe on the invoice page**, rather than redirecting the customer to a separate page.
* **Automatic Callback:** Automatically updates the invoice status after successful/failed payments.
* **Secure Signature Verification:** Ensures security by validating the callback data received from Shopier using the Secret Key.

### ⚙️ Installation and Configuration

#### 1. Uploading Files

1.  Download all files from the GitHub repository.
2.  Copy the `shopier.php` and `callback/shopier.php` files to your WHMCS installation directory:
    * Copy `shopier.php` to the: `[WHMCS ROOT DIRECTORY]/modules/gateways/` folder.
    * Copy `callback/shopier.php` to the: `[WHMCS ROOT DIRECTORY]/modules/gateways/callback/` folder.

#### 2. Shopier Panel Settings

You must define the Callback URL specified in the module settings within your Shopier account:

* **Callback URL:**
    `[YOUR WHMCS URL]/modules/gateways/callback/shopier.php`

#### 3. WHMCS Admin Settings

1.  Log in to your WHMCS Admin Panel.
2.  Navigate to **Configuration > System Settings > Payment Gateways**.
3.  Go to the **All Payment Gateways** tab and select **"Shopier ile Hızlı Ödeme"** (or the name you assigned) from the list, then click **Save Changes**.
4.  Enter your **API Key (Store No)** and **API Secret (Secret Key)** in the required fields.
5.  Ensure your sales currency (e.g., **TRY**) is checked under the **Currencies** section at the bottom of the page, and save the settings.

***

## 🤝 Contributing

I welcome your contributions to make this module even better! Please feel free to open an **Issue** or submit a **Pull Request** for any suggestions, bug fixes, or new feature requests.

***

## 📜 License

This project is compliant with the WHMCS Eula License. For details, please check the [WHMCS Eula](http://www.whmcs.com/license/) page.
