
<div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                <div wire:loading.delay>
                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                <div class="la-square-jelly-box la-3x">
                <div></div>
                <div></div>
                </div>
                </div>
                </div>
          <h2> Stores</h2>
          <a class="btn btn-success" href="{{ route('admin.stores.create') }}">Add</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           Filtres
      </button>
        </br></br>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

                                        <!-- after filters -->
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
                                    </div>

                                    <div class="row g-3 align-center">
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
                                        </div>
                                        <div class="col-lg-3">    
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



        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Store</th>
                    <th>Url</th>
                    <th>Products</th>
                    <!-- <th>Start Tracking</th> -->
                    <!-- <th>Status</th> -->
                    <th>Sales</th>
                    <th>Revenue</th>
                    <!-- <th>Show</th> -->
                    <!-- <th>Tracking</th> -->
                    <th>Show Details</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td><a href="{{ route('admin.stores.show',$store->id) }}">{{ $store->name }}</a></td>
                        <td><a href="{{ $store->url }}">{{ $store->url }}</a> {{ $store->id }}</td>
                        <td>{{ $store->allproducts }}</td>
                        <!-- <td>{{ $store->status }}</td> -->
                        <td>{{ $store->sales }}</td>
                        <td>$ {{ number_format($store->revenue, 2, ',', ' ') }}</td>
                        <td><a  class="btn btn-success" href="{{ route('admin.stores.show',$store->id) }}">Show Details</a></td>

                            <form action="{{ route('admin.stores.destroy',$store->id) }}" method="Post">

                                @csrf
                                @method('DELETE')
                                <td>  <button type="submit" class="btn btn-danger">Delete</button> </td>
                            </form>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>

          <div>
        {{  $stores->links() }}

        </div>
        </main>
      </div>
    </div>