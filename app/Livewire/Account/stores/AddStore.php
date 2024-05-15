<?php

namespace App\Livewire\Account\stores;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;
use App\Models\Niche;
use App\Models\Nichestore;
use App\Models\stores;
use App\Models\Product;
use App\Models\Storeuser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Cache\Store;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;


class AddStore extends Component
{
    use LivewireAlert;

    public $url = '';
 
    public $nicheoption;

    public function render()
    {
        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        $storelimit = check_store_limit();
        // get user's stores
        $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id');
        $totalstores = count($totalstores);

        //to add niche to store
        $allniches = Niche::where('user_id', $user_id)->get();

        if ($allniches->isEmpty()) {

            DB::table('niches')->insert([
                "name" => 'All',
                "user_id" => $user_id,
            ]);

        }
        return view('livewire.account.stores.add-store', compact('allniches','storelimit','totalstores'));
    }





    //add store function

    public function save()
    {
        $user_id = Auth::user()->id;
        $firstNiche = Niche::where('user_id', $user_id)->first();


        try {
            $validated = $this->validate([
                'url' => 'required'
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
            $this->alert('warning', __('url not valid!'));
        
            // Redirect back to the previous page with the validation errors
            return redirect()->back()->withErrors($e->validator);
        }
      
  
        if (empty($validated['nicheoption'])) {
            // $nicheemty = $firstNiche->id;
            $nicheoption=$firstNiche->id;
        }else{
            $nicheoption=$this->nicheoption;
        }


        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();


        if(currentTeam()->onTrial()){

            if($storeuser >=3 ){
                return redirect()->route('account.storesearch.index')->with('error','You can not add more stores on trial');
            
            }
        }
        else if(check_store_limit() <= $storeuser)
        {
            $storeLimit = check_store_limit();
            if ($storeLimit) {
                $this->alert('warning', __('You can not add stores more than :limit', ['limit' => $storeLimit]));
                return redirect()->route('account.storesearch.index');
            }
        }

        //if domaine with url ;;; 
        $parsedUrl = parse_url($this->url);

        if (isset($parsedUrl['host'])) {
            $domain = $parsedUrl['scheme'] . '://' . $parsedUrl['host']. '/' ;

        } else {
            $this->alert('warning', __('This Store not Supported by Weenify !'));

            // return redirect()->route('account.storesearch.index');
        }

    // scrapping Data of store
        $storedata =$this->scrapeStore($domain);

                // check if store already added
                $stores = stores::where('url', $domain)->first();
                if($stores)
                {
                    $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $stores->id)->count();
                    if($storeuser > 0)
                    {
                        // redirect()->route('account.stores.create')->with('error','You have already created that store.');
                        Storeuser::create([
                            "store_id" => $stores->id,
                            "user_id" => $user_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);
                        Nichestore::create([
                            "stores_id" => $stores->id,
                            "niche_id" => $nicheoption,
                            "created_at" => now(),
                            "updated_at" => now()
                       ]);
                       //make status On
                       DB::table('stores')->where('id', $stores->id)->update(array('status' => 1));
                       return redirect()->route('account.storesearch.index');
                        // return redirect()->route('account.stores.show',$stores->id);
                    }
                    else
                    {
                        Storeuser::create([
                            "store_id" => $stores->id,
                            "user_id" => $user_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);

                        Nichestore::create([
                             "stores_id" => $stores->id,
                             "niche_id" => $nicheoption,
                             "created_at" => now(),
                             "updated_at" => now()
                        ]);
                        DB::table('stores')->where('id', $stores->id)->update(array('status' => 1));

                        return redirect()->route('account.storesearch.index');
                    }
                }
                else
                {
                    try {
                        $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
                        $context = stream_context_create($opts);
                        $meta = file_get_contents($domain.'meta.json',false,$context);
                        $metas = json_decode($meta);
                        $totalproducts = $metas->published_products_count;

                        $store_id = DB::table('stores')->insertGetId(
                            ['url' => $domain,
                            'name' => $metas->name,
                            'status' => 1,
                            'sales' => 0,
                            'tag' => '',
                            'revenue' => 0,
                            'city' => $metas->city,
                            'country' => $metas->country,
                            'currency' => $metas->currency,
                            'shopifydomain' => $metas->myshopify_domain,
                            'allproducts' => $metas->published_products_count,
                            'todaysales' => 0,
                            'yesterdaysales' => 0,
                            'day3sales' => 0,
                            'day4sales' => 0,
                            'day5sales' => 0,
                            'day6sales' => 0,
                            'day7sales' => 0,
                            'weeksales' => 0,
                            'monthsales' => 0,
                            'dropshipping' => 1,
                            'tshirt' => 0,
                            'digital' => 0,
                            'title'=> $storedata['site_name'],
                            'description'=> $storedata['description'],
                            'theme'=> $storedata['theme_name'],
                            'facebookusername'=> $storedata['facebook_usernames'],
                            'instagramusername'=> $storedata['instagram_usernames'],
                            'pinterestusername'=> $storedata['pinterest_usernames'],
                            'youtubeusername'=> $storedata['youtube_usernames'],
                            'tiktokusername'=> $storedata['tiktok_usernames'],
                            'snapchatusername'=> $storedata['snapchat_usernames'],
                            'facebookpixel'=> $storedata['facebook_pixel'],
                            'googlepixel'=> $storedata['google_ads'],
                            'snapchatpixel'=> $storedata['snapchat_pixel'],
                            'pinterestpixel'=> $storedata['pinterest_pixel'],
                            'tiktokpixel'=> $storedata['tiktok_pixel'],
                            'created_at' => now(),
                            'updated_at' => now(),
                            'user_id' => $user_id
                            ]
                        );
                 
                       
                        Storeuser::create([
                            "store_id" => $store_id,
                            "user_id" => $user_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);

                        Nichestore::create([
                             "stores_id" => $store_id,
                             "niche_id" => $nicheoption,
                             "created_at" => now(),
                             "updated_at" => now()
                        ]);
                        if($totalproducts<=250){
                            createstore($domain,$store_id,1);


                        }else if($totalproducts<=500){
                            for ($i = 1; $i <= 2; $i++) {
                                createstore($domain,$store_id,$i);

                            }
                         }else if($totalproducts<=750){
                            for ($i = 1; $i <= 3; $i++) {
                                createstore($domain,$store_id,$i);

                            }
                        }
                        else if($totalproducts<=1000 || $totalproducts>1000){
                            for ($i = 1; $i <= 4; $i++) {
                                createstore($domain,$store_id,$i);
                            }
                        }
                    } catch(\Exception $exception) {
                        $this->alert('warning', __('This Store not Supported by Weenify !'));
                        // return redirect()->route('account.storesearch.index');

                        // Log::error($exception->getMessage());
                    }
                }

        // return redirect()->route('account.stores.index');
        $this->alert('success', __('Store has been Added successfully , wait Between 2h To 24h to get All Sales'));
        return redirect()->route('account.storesearch.index');
  

    }

    public function scrapeStore($url)
    {

        // Fetch HTML content from the URL
        try {
            $client = new Client();
            $response = $client->get($url);
            $html_content = $response->getBody()->getContents();
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Failed to fetch URL: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch URL'], 500);
        }
        
        // Extract description, keywords, site name, and social media usernames
        $description = null;
        $keywords = null;
        $site_name = null;
        $instagram_usernames = [];
        $facebook_usernames = [];
        $tiktok_usernames = [];
        
        if (!empty($html_content)) {
            $crawler = new Crawler($html_content);
            
            // Extract description meta tag content
            $description_tag = $crawler->filterXPath('//meta[@name="description"]');
            if ($description_tag->count() > 0) {
                $description = $description_tag->attr('content');
            }
            
            
            // Extract site name from title tag
            $title_tag = $crawler->filter('title');
            if ($title_tag->count() > 0) {
                $site_name = $title_tag->text();
            }
            
            // Extract social media usernames
            $instagram_usernames = $this->extractSocialMediaURLs($html_content, 'instagram');
            $facebook_usernames = $this->extractSocialMediaURLs($html_content, 'facebook');
            $tiktok_usernames = $this->extractSocialMediaURLs($html_content, 'tiktok');
            $pinterest_usernames = $this->extractSocialMediaURLs($html_content, 'pinterest');
            $youtube_usernames = $this->extractSocialMediaURLs($html_content, 'youtube');
            $snapchat_usernames = $this->extractSocialMediaURLs($html_content, 'snapchat');


        }
        
        // Check for TikTok pixel
        $tiktok_pixel = $this->checkTikTokPixel($html_content);
        
        // Check for Google Ads
        $google_ads = $this->checkGoogleAds($html_content);
        
        // Check for Facebook Pixel
        $facebook_pixel = $this->checkFacebookPixel($html_content);
        
        return [
            'site_name' => $site_name,
            'description' => $description,
            'instagram_usernames' => $instagram_usernames,
            'facebook_usernames' => $facebook_usernames,
            'tiktok_usernames' => $tiktok_usernames,
            'snapchat_usernames' => $snapchat_usernames,
            'pinterest_usernames' => $pinterest_usernames,
            'youtube_usernames' => $youtube_usernames,
            'theme_name' => $this->extractThemeName($html_content),
            'tiktok_pixel' => $tiktok_pixel,
            'google_ads' => $google_ads,
            'facebook_pixel' => $facebook_pixel,
            'snapchat_pixel' => $this->checkSnapchatPixel($html_content),
            'pinterest_pixel' => $this->checkPinterestPixel($html_content),
        ];

    }

    private function extractSocialMediaURLs($html_content, $platform)
    {
        $url = [];

        if (!empty($html_content)) {
            // Extract URLs based on the platform
            switch ($platform) {
                case 'instagram':
                    preg_match_all('/(?:https?:\/\/)?(?:www\.)?instagram\.com\/[^s\/]+/i', $html_content, $matches);
                    $url = isset($matches[0][0]) ? $matches[0][0] : null;
                    break;
                case 'facebook':
                    preg_match_all('/(?:https?:\/\/)?(?:www\.)?facebook\.com\/[^\s\/]+/i', $html_content, $matches);
                    $url = isset($matches[0][0]) ? $matches[0][0] : null;
                    break;
                case 'tiktok':
                    preg_match_all('/(?:https?:\/\/)?(?:www\.)?tiktok\.com\/@?[a-zA-Z0-9_.-]+/i', $html_content, $matches);
                    $url = isset($matches[0][0]) ? $matches[0][0] : null;
                    break;
                   
                case 'snapchat':
                    preg_match_all('/(?:https?:\/\/)?(?:www\.)?snapchat\.com\/@[^\s\/]+/i', $html_content, $matches);
                    $url = isset($matches[0][0]) ? $matches[0][0] : null;
                    break;
                case 'pinterest':
                    preg_match_all('/(?:https?:\/\/)?(?:www\.)?pinterest\.com\/[^\s\/]+/i', $html_content, $matches);
                    $url = isset($matches[0][0]) ? $matches[0][0] : null;
                    break;
                case 'youtube':
                    preg_match_all('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/@[^\s\/]+/i', $html_content, $matches);
                    $url = isset($matches[0][0]) ? $matches[0][0] : null;
                    break;
            }
        }
        return $url;
    }


    private function checkTikTokPixel($html_content)
    {
        if (!empty($html_content)) {
            return stripos($html_content, 'tiktok') !== false ? 1 : 0;
        }
        return 0;
    }
    
    private function checkGoogleAds($html_content)
    {
        if (!empty($html_content)) {
            // Look for specific patterns indicating Google Tag Manager
            // Check for URLs containing "googletagmanager.com"
            $pattern = '/googletagmanager\.com/i';
            return preg_match($pattern, $html_content) ? 1 : 0;
        }
        return 0;
    }
    
    private function checkFacebookPixel($html_content)
    {
        if (!empty($html_content)) {
            return (stripos($html_content, 'facebook') !== false && stripos($html_content, 'pixel') !== false) ? 1 : 0;
        }
        return 0;
    }
    
    private function extractThemeName($html_content)
    {
        $theme_name = null;
        if (!empty($html_content)) {
            // Use regular expressions to extract the theme name from the script tag
            $pattern = '/Shopify\.theme\s*=\s*{"name":"([^"]+)"/i';
            if (preg_match($pattern, $html_content, $matches)) {
                // The theme name will be captured in the first captured group ($matches[1])
                $theme_name = $matches[1];
            }
        }
        return $theme_name ? 1 : 0;
    }
    
    private function checkSnapchatPixel($html_content)
    {
        if (!empty($html_content)) {
            // Look for specific patterns indicating Snap Pixel code
            $pattern = '/<!-- Snap Pixel Code -->.*?snaptr\(\'init\'.*?\'PAGE_VIEW\'\);\s*<\/script>/is';
            return preg_match($pattern, $html_content) ? 1 : 0;
        }
        return 0;
    }
    
    private function checkPinterestPixel($html_content)
    {
        if (!empty($html_content)) {
            // Look for the occurrence of the pintrk function
            $pattern = '/pintrk\s*\(/i';
            return preg_match($pattern, $html_content) ? 1 : 0;
        }
        return 0;
    }
}



function createstore ($store ,$store_id, $i){
    $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    $html = file_get_contents($store.'products.json?page='.$i.'&limit=250',false,$context);
    $products = json_decode($html)->products;
    foreach ($products as $product) {

        if(isset($product->variants[0]->price)){
            $price= $product->variants[0]->price;
        }else{
            $price=0;
        }
        if(isset($product->images[0]->src)){
            $image= $product->images[0]->src;
        }else{
            $image ='';
        }
        if (isset($product->images[1])) {
            $image2 = $product->images[1]->src;
        }else $image2 ='';

        if (isset($product->images[2])) {
            $image3 = $product->images[2]->src;
        }else $image3 ='';

        if (isset($product->images[3])) {
            $image4 = $product->images[3]->src;
        }else $image4 ='';

        if (isset($product->images[4])) {
            $image5 = $product->images[4]->src;
        }else $image5 ='';

        if (isset($product->images[5])) {
            $image6 = $product->images[5]->src;
        }else $image6 ='';

        $timeconvert = strtotime($product->updated_at);
        $totalsales = 0;
        $urlproduct = $store.'products/'.$product->handle;
        Product::firstOrCreate([
            "id" => $product->id,
            "title" => $product->title,
            "timesparam" => $timeconvert,
            "prix" => $price,
            "revenue" => 0,
            "stores_id" => $store_id,
            "url" => $urlproduct,
            "imageproduct" => $image,
            "favoris" => 0,
            "totalsales" => $totalsales,
            "todaysales" => 0,
            "yesterdaysales" => 0,
            "day3sales" => 0,
            "day4sales" => 0,
            "day5sales" => 0,
            "day6sales" => 0,
            "day7sales" => 0,
            "weeksales" => 0,
            "monthsales" => 0,
            'dropshipping' => 1,
            'tshirt' => 0,
            'digital' => 0,
            'price_aliexpress'=>0,
            'description' => $product->body_html,
            'created_at_shopify' => $product->published_at,
            'created_at_favorite' => $product->published_at,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5,
            'image6' => $image6,
        ]);
    }
}

