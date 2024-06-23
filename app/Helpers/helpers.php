<?php

use App\Models\Team;
use Illuminate\Support\Facades\Auth;

if (! function_exists('on_page')) {
    /**
     * Check's whether request url/route matches passed link.
     *
     * @param $link
     * @param string $type
     * @return null
     */
    function on_page($link, $type = 'name')
    {
        switch ($type) {
            case 'url':
                $result = ($link == request()->fullUrl());
                break;

            default:
                $result = ($link == request()->route()->getName());
        }

        return $result;
    }
}

if (! function_exists('return_if')) {
    /**
     * Appends passed value if condition is true.
     *
     * @param $condition
     * @param $value
     * @return null
     */
    function return_if($condition, $value)
    {
        if ($condition) {
            return $value;
        }
    }
}

if (! function_exists('currentTeam')) {
    /**
     * Get user's currently selected team...
     *
     * @return Team
     */
    function currentTeam()
    {
        return Auth::user()->currentTeam;
    }
}

if (! function_exists('team')) {
    /**
     * Appends passed value if condition is true.
     *
     * @return Team
     */
    function team()
    {
        Auth::user()->personalTeam();
    }
}

if (! function_exists('split_name')) {
    /**
     * uses regex that accepts any word character or hyphen in last name.
     *
     * @return array
     */
    function split_name($name)
    {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#'.$last_name.'#', '', $name));

        return [$first_name, $last_name];
    }
}

if (! function_exists('subscription_team')) {
    /**
     * uses regex that accepts any word character or hyphen in last name.
     *
     * @return array
     */
    function subscription_team($subscription)
    {
        return Team::find($subscription->team_id);
    }
}


if (! function_exists('check_user_type')) {
    /**
     * uses roles middleware to get user's type
     *
     * @return array
     */
    function check_user_type()
    {
        $authGuard = Auth::guard();
        
        if ($authGuard->guest()) {
            $user_type = 'guest';
        }
        
        $role = 'admin';
        $roles = is_array($role)
            ? $role
            : explode('|', $role);
        
        if (! $authGuard->user()->hasAnyRole($roles))
            $user_type = 'user';
        else
            $user_type = 'admin';

        return $user_type;
    }
}


if (! function_exists('check_store_limit')) {
    /**
     * get user's store limit
     *
     * @return array
     */
    function check_store_limit()
    {
        $currentTeam = currentTeam();
        if(!empty($currentTeam) && !empty($currentTeam->plan) && !empty($currentTeam->plan->store_access_count))
            return $currentTeam->plan->store_access_count;

        return 0;
    }
}

function getDockerURL($path, $port) {
    return 'http://localhost:'.$port.'/'.$path;
}

function getDockerHeaders() {
    return ['Content-Type' => 'application/json'];
}

function getShopifyURLForStore($endpoint, $store) {
    return checkIfStoreIsPrivate($store) ? 
        'https://'.$store['api_key'].':'.$store['api_secret_key'].'@'.$store['myshopify_domain'].'/admin/api/'.config('custom.shopify_api_version').'/'.$endpoint 
        :
        'https://'.$store['myshopify_domain'].'/admin/api/'.config('custom.shopify_api_version').'/'.$endpoint;
}

function getShopifyHeadersForStore($store, $method = 'GET') {
    return $method == 'GET' ? [
        'Content-Type' => 'application/json',
        'X-Shopify-Access-Token' => $store['access_token']
    ] : [
        'Content-Type: application/json',
        'X-Shopify-Access-Token: '.$store['access_token']
    ];
}

function getGraphQLHeadersForStore($store) {
    return checkIfStoreIsPrivate($store) ? [
        'Content-Type' => 'application/json',
        'X-Shopify-Access-Token' => $store['api_secret_key'],
        'X-GraphQL-Cost-Include-Fields' => true
    ] : [
        'Content-Type' => 'application/json',
        'X-Shopify-Access-Token' => $store['access_token'],
        'X-GraphQL-Cost-Include-Fields' => true
    ];
}

function checkIfStoreIsPrivate($store) {
    return isset($store['api_key']) && isset($store['api_secret_key'])
            && $store['api_key'] !== null && $store['api_secret_key'] !== null  
            && strlen($store['api_key']) > 0 && strlen($store['api_secret_key']) > 0; 
}

function getCurrencySymbol($code) {
    switch($code) {
        case 'INR': return '₹ ';
        case 'EUR': return '€ ';
        case 'UAH': return '₴ ';
        case 'PLN': return 'zł ';
        case 'RON': return 'Lei ';
        case 'CZK': return 'Kč ';
        case 'SEK': return 'SEK ';
        case 'HUF': return 'Ft ';
        case 'BYN': return 'BYN ';
        case 'BGN': return 'лв. ';
        case 'DKK': return 'DKK ';
        case 'NOK': return 'NOK ';
        case 'HRK': return 'kn ';
        case 'MDL': return 'L ';
        case 'BAM': return 'KM ';
        case 'ALL': return 'Lek ';
        case 'MKD': return 'ден ';
        case 'ISK': return 'kr ';
        case 'SAR': return 'ر.س';
        case 'ARS':
        case 'CAD': return 'C$ ';
        case 'NZD': return 'NZ$ ';
        case 'CLP':
        case 'COP':
        case 'MXN':
        case 'SGD': return 'S$ ';
        case 'AUD': return 'A$ ';
        case 'USD': return '$ ';
        case 'GBP': return '£ ';
        case 'CHF': return 'CHF ';
        case 'ZAR': return 'S ';
        case 'RUB': return '₽ ';
        case 'QAR': return 'ر.ق ';
        case 'MUR':
        case 'NPR': return '₨ ';
        case 'MYR': return 'RM ';
        case 'KPW':
        case 'KRW': return '₩ ';
        case 'JPY': return '¥ ';
        case 'IDR': return 'Rp ';
        case 'VND': return '₫ ';
        case 'KWD': return 'د.ك ';
        case 'AED': return 'د.إ ';
        case 'OMR': return 'ر.ع. ';
        case 'BOB': return '$ ';
        case 'AZN': return '₼ ';
        case 'THB': return '฿ ';
        default : return $code;
    }
}

function determineIfAppIsEmbedded() {
    return config('custom.app_embedded') == 'true' || config('custom.app_embedded') == true;
}

