<div class="nk-content ">
                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <!-- <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                     -->
                                    <!-- </div>.nk-block-between -->
                                <!-- </div>.nk-block-head -->
                                  
                            @if(!currentTeam()->subscribed())
                            <div class="alert alert-fill alert-icon alert-warning" role="alert">
                                <em class="icon ni ni-alert-circle"></em> 
                                <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                            </div>
                            @endif
                               
                        <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-search"></i>
                                    Search For Competitors
                                </h4>

                               <div class="card">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title">Filters</h5>
                                            </div>
                                        <form wire:submit.prevent="save" class="gy-3">
                                        <!-- filter title -->
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Include Title Keywords</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text"  wire:model.defer="title" class="form-control" id="site-name" placeholder="Separate search query">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Exclude Title Keywords</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" wire:model.defer="titleexclude" class="form-control" id="site-name" placeholder="Separate search query">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <!-- filter Description  -->
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Include Description Keywords</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" wire:model.defer="description" id="site-name" placeholder="Separate search query">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Exclude Description Keywords</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" wire:model.defer="descriptionexlude" id="site-name" placeholder="Separate search query">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- filter url -->
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Include Domain Keywords</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control"  wire:model.defer="url" id="site-name" placeholder="Separate search query">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Exclude Domain Keywords</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" wire:model.defer="urlexlude" id="site-name" placeholder="Separate search query">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-center">
                                        <div class="col-lg-3">
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Price</span>
                                                    </div>
                                                    <input type="number" class="form-control" wire:model.defer="pricemin" placeholder="Min" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Price</span>
                                                            </div>
                                                            <input type="number" class="form-control" wire:model.defer="pricemax" placeholder="Max" >
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Store Products</span>
                                                    </div>
                                                    <input type="number" class="form-control" wire:model.defer="storemin" placeholder="Min" >
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Store Products</span>
                                                        </div>
                                                        <input type="number" class="form-control" wire:model.defer="storemax" placeholder="Max">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Filters -->
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-3">
                                            <div class="form-control-wrap">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Store Country</label>
                                                        </div>
                                                        <select class="form-control" wire:model.defer="country" id="inputGroupSelect01">
                                                            <option value=""selected>All</option>
                                                            <option value="US">United States (US)</option>
                                                            <option value="PE">Peru (PE)</option>
                                                            <option value="DK">Denmark (DK)</option>
                                                            <option value="SI">Slovenia (SI)</option>
                                                            <option value="CZ">Czech Republic (CZ)</option>
                                                            <option value="SG">Singapore (SG)</option>
                                                            <option value="KE">Kenya (KE)</option>
                                                            <option value="KR">South Korea (KR)</option>
                                                            <option value="JP">Japan (JP)</option>
                                                            <option value="KZ">Kazakhstan (KZ)</option>
                                                            <option value="NZ">New Zealand (NZ)</option>
                                                            <option value="AE">United Arab Emirates (AE)</option>
                                                            <option value="AU">Australia (AU)</option>
                                                            <option value="CL">Chile (CL)</option>
                                                            <option value="QA">Qatar (QA)</option>
                                                            <option value="NL">Netherlands (NL)</option>
                                                            <option value="IN">India (IN)</option>
                                                            <option value="CN">China (CN)</option>
                                                            <option value="AT">Austria (AT)</option>
                                                            <option value="EE">Estonia (EE)</option>
                                                            <option value="VN">Vietnam (VN)</option>
                                                            <option value="KW">Kuwait (KW)</option>
                                                            <option value="AR">Argentina (AR)</option>
                                                            <option value="BR">Brazil (BR)</option>
                                                            <option value="PL">Poland (PL)</option>
                                                            <option value="MY">Malaysia (MY)</option>
                                                            <option value="HK">Hong Kong (HK)</option>
                                                            <option value="MT">Malta (MT)</option>
                                                            <option value="MV">Maldives (MV)</option>
                                                            <option value="SE">Sweden (SE)</option>
                                                            <option value="EG">Egypt (EG)</option>
                                                            <option value="CH">Switzerland (CH)</option>
                                                            <option value="LK">Sri Lanka (LK)</option>
                                                            <option value="SA">Saudi Arabia (SA)</option>
                                                            <option value="PK">Pakistan (PK)</option>
                                                            <option value="DE">Germany (DE)</option>
                                                            <option value="BO">Bolivia (BO)</option>
                                                            <option value="TW">Taiwan (TW)</option>
                                                            <option value="LU">Luxembourg (LU)</option>
                                                            <option value="CA">Canada (CA)</option>
                                                            <option value="SK">Slovakia (SK)</option>
                                                            <option value="LT">Lithuania (LT)</option>
                                                            <option value="FR">France (FR)</option>
                                                            <option value="MU">Mauritius (MU)</option>
                                                            <option value="LV">Latvia (LV)</option>
                                                            <option value="CY">Cyprus (CY)</option>
                                                            <option value="MX">Mexico (MX)</option>
                                                            <option value="GG">Guernsey (GG)</option>
                                                            <option value="RO">Romania (RO)</option>
                                                            <option value="HU">Hungary (HU)</option>
                                                            <option value="FI">Finland (FI)</option>
                                                            <option value="PH">Philippines (PH)</option>
                                                            <option value="RS">Serbia (RS)</option>
                                                            <option value="ID">Indonesia (ID)</option>
                                                            <option value="IM">Isle of Man (IM)</option>
                                                            <option value="IE">Ireland (IE)</option>
                                                            <option value="JE">Jersey (JE)</option>
                                                            <option value="LB">Lebanon (LB)</option>
                                                            <option value="UA">Ukraine (UA)</option>
                                                            <option value="ZA">South Africa (ZA)</option>
                                                            <option value="DO">Dominican Republic (DO)</option>
                                                            <option value="PT">Portugal (PT)</option>
                                                            <option value="ES">Spain (ES)</option>
                                                            <option value="NG">Nigeria (NG)</option>
                                                            <option value="NO">Norway (NO)</option>
                                                            <option value="BA">Bosnia and Herzegovina (BA)</option>
                                                            <option value="IL">Israel (IL)</option>
                                                            <option value="TH">Thailand (TH)</option>
                                                            <option value="JO">Jordan (JO)</option>
                                                            <option value="BG">Bulgaria (BG)</option>
                                                            <option value="IT">Italy (IT)</option>
                                                            <option value="GB">United Kingdom (GB)</option>
                                                            <option value="IS">Iceland (IS)</option>
                                                            <option value="BH">Bahrain (BH)</option>
                                                            <option value="TR">Turkey (TR)</option>
                                                            <option value="CR">Costa Rica (CR)</option>
                                                            <option value="MA">Morocco (MA)</option>
                                                            <option value="GR">Greece (GR)</option>
                                                            <option value="MK">North Macedonia (MK)</option>
                                                            <option value="CO">Colombia (CO)</option>
                                                            <option value="BE">Belgium (BE)</option>
                                                            <option value="GT">Guatemala (GT)</option>

                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                  <div class="form-control-wrap">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01">Store Currency</label>
                                                            </div>
                                                            <select class="form-control"  wire:model.defer="currency" id="inputGroupSelect01">
                                                                <option value=""selected>All</option>
                                                                <option value="USD">USD</option>
                                                                <option value="EUR">EUR</option>
                                                                <option value="GBP">GBP</option>
                                                                <option value="THB">THB</option>
                                                                <option value="HKD">HKD</option>
                                                                <option value="IDR">IDR</option>
                                                                <option value="RON">RON</option>
                                                                <option value="TRY">TRY</option>
                                                                <option value="ILS">ILS</option>
                                                                <option value="GTQ">GTQ</option>
                                                                <option value="UAH">UAH</option>
                                                                <option value="HUF">HUF</option>
                                                                <option value="CHF">CHF</option>
                                                                <option value="MXN">MXN</option>
                                                                <option value="RUB">RUB</option>
                                                                <option value="CAD">CAD</option>
                                                                <option value="BOB">BOB</option>
                                                                <option value="LKR">LKR</option>
                                                                <option value="ZAR">ZAR</option>
                                                                <option value="NZD">NZD</option>
                                                                <option value="SAR">SAR</option>
                                                                <option value="VND">VND</option>
                                                                <option value="MYR">MYR</option>
                                                                <option value="SEK">SEK</option>
                                                                <option value="QAR">QAR</option>
                                                                <option value="ARS">ARS</option>
                                                                <option value="PEN">PEN</option>
                                                                <option value="BRL">BRL</option>
                                                                <option value="AED">AED</option>
                                                                <option value="CLP">CLP</option>
                                                                <option value="EGP">EGP</option>
                                                                <option value="USD">USD</option>
                                                                <option value="PHP">PHP</option>
                                                                <option value="KES">KES</option>
                                                                <option value="ISK">ISK</option>
                                                                <option value="MUR">MUR</option>
                                                                <option value="CNY">CNY</option>
                                                                <option value="BAM">BAM</option>
                                                                <option value="NOK">NOK</option>
                                                                <option value="AUD">AUD</option>
                                                                <option value="INR">INR</option>
                                                                <option value="MAD">MAD</option>
                                                                <option value="KRW">KRW</option>
                                                                <option value="DOP">DOP</option>
                                                                <option value="NGN">NGN</option>
                                                                <option value="BGN">BGN</option>
                                                                <option value="KWD">KWD</option>
                                                                <option value="TWD">TWD</option>
                                                                <option value="PLN">PLN</option>
                                                                <option value="COP">COP</option>
                                                                <option value="KZT">KZT</option>
                                                                <option value="CRC">CRC</option>
                                                                <option value="PKR">PKR</option>
                                                                <option value="SGD">SGD</option>
                                                                <option value="JPY">JPY</option>
                                                                <option value="CZK">CZK</option>
                                                                <option value="DKK">DKK</option>
                                                                <option value="MVR">MVR</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>

                                         <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Dropshipping</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                <input type="checkbox" wire:model.defer="filterDropshipping" id="filter-dropshipping">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            
                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-11">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Search</button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                        </div><!-- card -->
                 
                </div>
              </div>
            </div>
            </div>
                </div>
            </div>    
                            <!-- Loading LiveWire -->
                        <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                        </div>
                                
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                    <!-- after  -->
                                    <div  wire:loading.class="invisible" class="nk-tb-item nk-tb-head">
                                        <!-- <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="oid">
                                                <label class="custom-control-label" for="oid"></label>
                                            </div>
                                        </div> -->

                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Product</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Price</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Store Products</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Currency</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Country</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block"></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Expand</span></div>

                                    </div><!-- .nk-tb-item -->

                                    @foreach ($products as $product)
                                    <div wire:loading.class="invisible" class="nk-tb-item">
                                        <!-- <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="oid01">
                                                <label class="custom-control-label" for="oid01"></label>
                                            </div>
                                        </div> -->
                                        <div class="nk-tb-col">
                                            <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                                        </div>
                                        <div class="nk-tb-col">
                                            <a href="{{ route('account.product.show',$product->id) }}"><h6>{{ $product->title }}</h6></a>
                                            <a target="_blank" href="{{ $product->url }}">{{ parse_url($product->url, PHP_URL_HOST) }}</a>


                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                                <a  target="_blank" href="{{$product->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($product->title)}}&search_type=keyword_unordered&media_type=all"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($product->title)}}"> <img src="https://img.icons8.com/color/512/aliexpress.png" width="30" height="30"></a>
                                         </div>

                                         <div class="nk-tb-col tb-col-md">
                                           <h6>$ {{ $product->prix }}</h6> 
                                         <!-- <span class="badge badge-sm badge-dot has-bg bg-info d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">$ {{ $product->prix }}</span> -->

                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                                  <h6>{{ $product->stores->currency }}</h6> 

                                       </div>

                                        <div class="nk-tb-col tb-col-md">
                                        <h6>{{ $product->stores->allproducts }}</h6> 

                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                        <h6>{{ $product->stores->country }}</h6> 

                                        </div>
                                        <!-- <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub"> <a  class="btn btn-success" href="{{ route('account.product.show',$product->id) }}" >View </a></span>
                                            <button wire:click="exportToCsv('{{ $product->url }}')">Export Product</button> -->

                                        <!-- </div> -->
                                        <div class="nk-tb-col tb-col-md">
                                            <li><a wire:click="exportToCsv('{{ $product->url }}')" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Import product</span></a></li>
                                        </div>
                                      
                                        <div class="nk-tb-col tb-col-md">
                                        <form method="POST" action="{{ route('account.stores.trackstore', $product->stores->id) }}">
                                        @csrf
                                        <!-- Your form content here -->
                                        <button type="submit" class="btn btn-white btn-dim btn-outline-primary">
                                            <em class="icon ni ni-crosshair"></em>
                                            <span>Track product</span>
                                        </button>
                                            </form>                                         
                                      </div> 

                                                
                                    </div><!-- .nk-tb-item -->
                                    @endforeach
                                </div>

                                <!-- <div class="card">
                                    <div class="card-inner">
                                        <div wire:loading.class="invisible" class="my-4">
                                            {{ $products->links() }}

                                        </div>
                                    </div>
                                </div> -->

                                <div wire:loading.class="invisible" class="card">
                                    <div class="card-inner">
                                        <div wire:loading.class="invisible" class="my-4">
                                            <div>
                                                    @if ($products->hasPages())
                                                        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                                                            <span>
                                                                {{-- Previous Page Link --}}
                                                                @if ($products->onFirstPage())
                                                                    <span class="btn btn-primary">
                                                                       <
                                                                    </span>
                                                                @else
                                                                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-primary">
                                                                    <
                                                                    </button>
                                                                @endif
                                                            </span>
                                                
                                                              <!-- Page Input and "Go" Button -->
                                                            {{ $products->links() }}

                                                            <span>
                                                                {{-- Next Page Link --}}
                                                                @if ($products->hasMorePages())
                                                                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-primary">
                                                                       >
                                                                    </button>
                                                                @else
                                                                    <span class="btn btn-primary">
                                                                    >
                                                                    </span>
                                                                @endif
                                                            </span>
                                                        </nav>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
</div>
                        