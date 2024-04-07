<div class="row"> 
                        <!-- messages -->
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                           
                            @if(!currentTeam()->subscribed())
                            <div class="alert alert-fill alert-icon alert-warning" role="alert">
                                <em class="icon ni ni-alert-circle"></em> 
                                <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                            </div>
                            @endif
                            <!-- Loading LiveWire -->
                          <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                         </div>
                               
                        <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                              
                                <h4 class="card-title">
                                    <i class="fas fa-search"></i>
                                    Search For Competitors
                                </h4>

                                <div class="card">
                                        <div class="card-inner">
                                                  
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
                                                                    <input type="text"  wire:model="title" class="form-control" id="site-name" placeholder="Separate search query">
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
                                                                    <input type="text" wire:model="titleexclude" class="form-control" id="site-name" placeholder="Separate search query">
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
                                                            <input type="text" class="form-control" wire:model="description" id="site-name" placeholder="Separate search query">
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
                                                            <input type="text" class="form-control" wire:model="descriptionexlude" id="site-name" placeholder="Separate search query">
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
                                                            <input type="text" class="form-control"  wire:model="url" id="site-name" placeholder="Separate search query">
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
                                                            <input type="text" class="form-control" wire:model="urlexlude" id="site-name" placeholder="Separate search query">
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
                                                            <input type="number" class="form-control" wire:model="pricemin" placeholder="Min" >
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
                                                                    <input type="number" class="form-control" wire:model="pricemax" placeholder="Max" >
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
                                                            <input type="number" class="form-control" wire:model="storemin" placeholder="Min" >
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
                                                                <input type="number" class="form-control" wire:model="storemax" placeholder="Max">
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
                                                                <select class="form-control" wire:model="country" id="inputGroupSelect01">
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
                                                                    <select class="form-control"  wire:model="currency" id="inputGroupSelect01">
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

                                                <div class="col-lg-1">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Dropshipping</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                        <input type="checkbox" wire:model="filterDropshipping" id="filter-dropshipping">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-1">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">T-Shirt</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                        <input type="checkbox" wire:model="filtertshirt" id="filter-tshirt">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Digital</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                        <input type="checkbox" wire:model="filterDigital" id="filter-Digital">
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                                    
                                            <div class="row g-3">
                                                <div class="col-lg-7 offset-lg-11">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Search</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </form>
                                        </div> <!-- card-inner --> 
                                </div><!-- card -->
                 
                                    </div>    <!-- card-body -->
                                </div>  <!-- card  -->
                        </div>  <!-- col-md-12  -->

                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Product</span></div>
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Price</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Store Products</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Currency</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Country</span></div>
                                            <!-- <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Expand</span></div> -->

                                            <div class="nk-tb-col nk-tb-col-tools">
                                            </div>
                                        </div><!-- .nk-tb-item -->

                                        @foreach ($products as $product)

                                        <div class="nk-tb-item">

                                            <div class="nk-tb-col">
                                                <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                                            </div>
                                            <div class="nk-tb-col">
                                                    <a href="{{ route('account.researchdata.show',['id' =>$product->id]) }}" wire:navigate><h6>{{ $product->title }} ({{ $product->created_at_shopify }})</h6></a>
                                                    <a target="_blank" href="{{ $product->url }}">{{ parse_url($product->url, PHP_URL_HOST) }}</a>
                                                    <!-- <a>{{ $product->created_at }}</a> -->

                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <a  target="_blank" href="{{$product->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($product->title)}}&search_type=keyword_unordered&media_type=all"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($product->title)}}"> <img src="https://img.icons8.com/color/512/aliexpress.png" width="30" height="30"></a>
                                      
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                       <h6>$ {{ $product->prix }}</h6> 
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                         <h6>{{ $product->stores->allproducts }}</h6> 
                                            </div>

                                            <div class="nk-tb-col tb-col-sm">
                                                   <h6>{{ $product->stores->currency }}</h6> 
                                            </div>

                                            <div class="nk-tb-col tb-col-sm">
                                                   <h6>{{ $product->stores->country }}</h6> 
                                           </div>

        
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('account.researchdata.show',['id' =>$product->id]) }}" wire:navigate class="btn btn-icon btn-trigger btn-tooltip" title="Show Charts">
                                                            <em class="icon ni ni-eye"></em></a></li>
                                                    <li>
                                                        <div class="drodown me-n1">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{ route('account.researchdata.show',['id' =>$product->id]) }}" wire:navigate><em class="icon ni ni-eye"></em><span>Show Charts</span></a></li>
                                                                    <li><a wire:click="exportToCsv('{{ $product->url }}')" class="btn btn-white btn-dim btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#95bf46}</style><path d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z"/></svg><span>Import product</span></a></li>                                                         
                                                                    <li>    
                                                                    <a wire:click="trackstore('{{ $products->first()->stores->id }}')" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-crosshair"></em>Track product</a>                                                     
 
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                             <!-- .pagination Start -->

                    <div class="card">
                                    <div class="card-inner">
                                     <div class="nk-block-between-md g-3">
                                                <div class="g"> </div>

                                            <div class="g">
                                                           
                                                    <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                                    <ul class="pagination">
                                                                        @if ($products->currentPage() > 1)
                                                                            <li class="page-item">
                                                                                <a class="page-link" wire:click="previousPage" href="#">
                                                                                    <em class="icon ni ni-back-alt-fill"></em>
                                                                                </a>
                                                                            </li>
                                                                        @else
                                                                            <li class="page-item disabled">
                                                                                <span class="page-link"><em class="icon ni ni-back-alt-fill"></em></span>
                                                                            </li>
                                                                        @endif

                                                                        @if ($products->currentPage() < $products->lastPage())
                                                                            <li class="page-item">
                                                                                <a class="page-link" wire:click="nextPage" href="#">
                                                                                    <em class="icon ni ni-forward-alt-fill"></em>
                                                                                </a>
                                                                            </li>
                                                                        @else
                                                                            <li class="page-item disabled">
                                                                                <span class="page-link"><em class="icon ni ni-forward-alt-fill"></em></span>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                    <div>
                                                                         <!-- <select class="form-select js-select2" data-search="on" data-dropdown="xs center" wire:model.live="page">
                                                                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select> -->
                                                                   
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown"> {{ $products->currentPage()  }} </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <!-- Default option without filter -->
                                                                <!-- Other pagination options -->

                                                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                                <li>
                                                                    <a class="page-link" wire:click="gotoPage({{ $i }})">
                                                                        <span>{{ $i }}</span>
                                                                    </a>
                                                                </li>

                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                 </div><!-- g -->
                                                                    <div>OF {{ $products->lastPage() }}</div>
                                                    </div>
                                                </div>
                                            </div>
                            <!-- .pagination END -->
                               
</div> <!-- row  -->

