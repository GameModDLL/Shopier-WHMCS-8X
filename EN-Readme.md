# 🚀 WHMCS 8.x Shopier Payment Gateway Module

## 💳 Overview

This is the Shopier payment gateway module developed for **WHMCS 8.x** and later versions. This module allows you to offer your customers the ability to pay with a credit card or bank card via Shopier for your WHMCS-based services.

This version has been optimized specifically to resolve common **`_config` function errors** encountered in recent WHMCS versions and to provide an **embedded (iframe)** payment experience.

***

## ✨ Key Features

* **WHMCS 8.x Compatible:** Updated to align with the latest WHMCS architecture and PHP standards.
* **Error-Free Setup:** Resolves common **`_config` errors** encountered during the configuration process.
* **Embedded Payment Experience (Iframe):** Opens the payment form **inside an iframe on the invoice page**, rather than redirecting the customer to a separate page.
* **Automatic Callback:** Automatically updates the invoice status after successful/failed payments.
* **Secure Signature Verification:** Ensures security by validating the callback data received from Shopier using the Secret Key.

***

## ⚙️ Installation and Configuration

### 1. Uploading Files

1.  Download all files from the GitHub repository.
2.  Copy the `shopier.php` and `callback/shopier.php` files to your WHMCS installation directory:
    * Copy `shopier.php` to the: `[WHMCS ROOT DIRECTORY]/modules/gateways/` folder.
    * Copy `callback/shopier.php` to the: `[WHMCS ROOT DIRECTORY]/modules/gateways/callback/` folder.

### 2. Shopier Panel Settings

You must define the Callback URL specified in the module settings within your Shopier account:

* **Callback URL:**
    `[YOUR WHMCS URL]/modules/gateways/callback/shopier.php`

### 3. WHMCS Admin Settings

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
