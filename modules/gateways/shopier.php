<?php
/**
 * WHMCS Shopier Payment Gateway Module
 *
 * Shopier Payment Gateway Module allow you to integrate payment solutions with the
 * WHMCS platform.
 *
 * @copyright Copyright (c) WHMCS Limited 2015
 * @license http://www.whmcs.com/license/ WHMCS Eula
 * @Edited By https://github.com/GameModDLL/
 */
 
use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

/**
 * Define module related meta data.
 *
 * @return array
 */
function shopier_MetaData()
{
    return array(
        'DisplayName' => 'Shopier Whmcs 8x By Github.com/GameModDLL',
        'APIVersion' => '1.1',
        'DisableLocalCredtCardInput' => true,
        'TokenisedStorage' => false,
    );
}

/**
 * Define gateway configuration options.
 *
 * The fields you define here determine the configuration options that are
 * presented to administrator users when activating and configuring your
 * payment gateway module for use.
 *
 * @return array
 */
function shopier_config()
{
    // Callback URL'sini artık manuel olarak bir metin olarak gösteriyoruz.
    // Bu, kodun hata vermesini %100 engeller.
    $callbackBaseUrl = (\WHMCS\Config\Setting::getValue('SystemURL') ?: 'SystemUrl') . 'modules/gateways/callback/shopier.php';

    $responseUrlDescription = 'Shopier panelinizdeki **Geri Dönüş URL (Callback URL)** alanına aşağıdaki adresi **manuel olarak** girmeniz gerekmektedir:';
    $responseUrlDescription .= ' <strong><br>'.$callbackBaseUrl.'</strong>';
    
    return array(
        'FriendlyName' => array(
            'Type' => 'System',
            'Value' => 'Shopier ile Kredi Kartı/Banka Kartı Ödemesi',
        ),
        'shopier_api_key' => array(
            'FriendlyName' => 'API Key (Mağaza No)',
            'Type' => 'text',
            'Size' => '35',
            'Description' => 'Shopier panelinizden alacağınız API Key.',
        ),
        'shopier_api_secret' => array(
            'FriendlyName' => 'API Secret (Gizli Anahtar)',
            'Type' => 'password',
            'Size' => '35',
            'Description' => 'Shopier panelinizden alacağınız Gizli Anahtar.',
        ),
        'shopier_payment_url' => array(
            'FriendlyName' => 'Ödeme Başlangıç URL',
            'Type' => 'text',
            'Size' => '60',
            'Default' => 'https://www.shopier.com/ShowProduct/api_pay4.php',
            'Description' => 'Varsayılan Shopier ödeme bitiş noktası.',
        ),
        'shopier_website_index' => array(
            'FriendlyName' => 'Website İndex',
            'Type' => 'text',
            'Size' => '10',
            'Default' => '1',
            'Description' => 'Shopier panelinizdeki Websitesi İndeksi (genellikle 1).',
        ),
        'callback_info' => array(
            'FriendlyName' => 'Geri Dönüş (Callback) Bilgisi',
            'Type' => 'info',
            'Description' => $responseUrlDescription,
        ),
    );
}
/**
 * Payment link.
 *
 * Defines the HTML output displayed on an invoice. Typically consists of an
 * HTML form that will take the user to the payment gateway endpoint.
 *
 * @param array $params Payment Gateway Module Parameters
 *
 * @return string
 */
function shopier_link($params)
{
    $client = \WHMCS\User\Client::find($params['clientdetails']['id']);
    if ($client) {
        $user_registered = $client->created_at;
    } else {
        $user_registered = date('Y-m-d H:i:s');
    }
    
    $time_elapsed = time() - strtotime($user_registered);
    $buyer_account_age = (int)($time_elapsed/86400);

    $billingAddress = $params['clientdetails']['address1'];
    if (!empty($params['clientdetails']['address2'])) {
        $billingAddress .= ' '.$params['clientdetails']['address2'];
    }
    if (!empty($params['clientdetails']['state'])) {
        $billingAddress .= ' '.$params['clientdetails']['state'];
    }
        
    $productinfo = str_replace('"', '', $params["description"]);
    $productinfo = str_replace('&quot;', '', $productinfo);
    
    $currency=0; // TRY
    if ($params['currency']=="USD"){
        $currency=1;
    }else if ($params['currency']=="EUR"){
        $currency=2;
    }
    
    // 4. Dil Kontrolü
    $current_language=1;
    if (isset($_SESSION['Language']) && $_SESSION['Language'] == "turkish"){
        $current_language=0;
    }
    
    $modul_version='1.5';
    $version='WHMCS'; 
    
    srand(time(NULL));
    $random_nr=rand(100000,999999);

    $postfields = array(
        'API_key' => $params['shopier_api_key'],
        'website_index' => $params['shopier_website_index'],
        'platform_order_id' => $params['invoiceid'],
        'product_name' => $productinfo,
        'product_type' => 1,
        'buyer_name' => $params['clientdetails']['firstname'],
        'buyer_surname' => $params['clientdetails']['lastname'],
        'buyer_email' => $params['clientdetails']['email'],
        'buyer_account_age' => $buyer_account_age,
        'buyer_id_nr' => $params['clientdetails']['id'],
        'buyer_phone' => $params['clientdetails']['phonenumber'],
        'billing_address' => $billingAddress,
        'billing_city' => $params['clientdetails']['city'],
        'billing_country' => $params['clientdetails']['country'],
        'billing_postcode' => $params['clientdetails']['postcode'],
        'shipping_address' => 'NA',
        'shipping_city' => 'NA',
        'shipping_country' => 'NA',
        'shipping_postcode' => 'NA',
        'total_order_value' => $params['amount'],
        'currency' => $currency,
        'current_language'=>$current_language,
        'modul_version' =>$modul_version,
        'version' =>$version,
        'platform' => 4,
        'is_in_frame' => 0,
        'random_nr' => $random_nr
    );
    
    // 6. İmza (Signature) Oluşturma
    $data=$postfields["random_nr"].$postfields['platform_order_id'].$postfields['total_order_value'].$postfields['currency'];
    $signature = hash_hmac('SHA256', $data, $params['shopier_api_secret'], true);
    $signature = base64_encode($signature);
    $postfields['signature'] = $signature;

    $langPayNow = $params['langpaynow'];
    $url = $params['shopier_payment_url'];

    // 7. HTML Çıktısını Hazırla
    $htmlOutput = '<form method="post" action="' . $url . '" target="_blank">';
    foreach ($postfields as $k => $v) {
        $htmlOutput .= '<input type="hidden" name="' . $k . '" value="' . $v . '" />';
    }
    $htmlOutput .= '<input type="submit" value="' . $langPayNow . '" class="btn btn-primary" />';
    $htmlOutput .= '</form>';

    return $htmlOutput;
}
