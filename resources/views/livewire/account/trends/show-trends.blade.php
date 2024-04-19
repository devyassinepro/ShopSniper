 
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <div class="nk-block">
                
                            <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                        </div>
                                  <div class="row g-gs">
                                    
                                  <div class="col-md-5">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-inner">
                 
                                                        <div id="carouselExConInd" class="carousel slide" data-bs-ride="carousel">
                                                                  <ol class="carousel-indicators">
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="0" class="active"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="1"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="2"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="3"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="4"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="5"></li>

                                                                  </ol>
                                                                  <div class="carousel-inner">
                                                                      <div class="carousel-item active">
                                                                          <img src="{{ $products->first()->imageproduct }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image2 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image3 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image4 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image5 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      
                                                                  </div>
                                                                  <a class="carousel-control-prev" href="#carouselExConInd" role="button" data-bs-slide="prev">
                                                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                      <span class="visually-hidden">Previous</span>
                                                                  </a>
                                                                  <a class="carousel-control-next" href="#carouselExConInd" role="button" data-bs-slide="next">
                                                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                      <span class="visually-hidden">Next</span>
                                                                  </a>
                                                              </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                                </div>
                                            <!-- screen2 -->
                                            <div class="col-md-7">
                                                <div class="card card-bordered card-preview">
                                                      <div class="card-inner">
                                                            <div class="card-head">
                                                                <h4 class="nk-block-title page-title-card">{{$products->first()->title}}</h4>
                                                            </div>
                                                            
                                                            
                                                            <div class="card-head">
                                                              <div class="limited-text">
                                                                  <p>{!! strip_tags($products->first()->description) !!}</p>
                                                              </div>
                                                              <a href="#" class="read-more">Read More</a>
                                                          </div>


                                            <div class="card-inner pt-0">
                                                <div class="rounded px-2 py-4 bg-primary">
                                                    
                                                    <div class="d-flex">
                                                        <div class="w-50 px-4">
                                                            <div class="fs-14px text-white text-opacity-75">Product Cost</div>
                                                            <span class="fs-2 lh-1 mb-1 text-white">${{$products->first()->price_aliexpress}}</span>
                                                        </div>
                                                        <div class="border-start opacity-50"></div>
                                                        <div class="w-50 px-4">
                                                            <div class="fs-14px text-white text-opacity-75">Selling Price</div>
                                                            <span class="fs-2 lh-1 mb-1 text-white">${{$products->first()->prix}}</span>
                                                        </div>
                                                        <div class="border-start opacity-50"></div>
                                                        <div class="w-50 px-4">
                                                            <div class="fs-14px text-white text-opacity-75">Profit per Sale</div>
                                                            <span class="fs-2 lh-1 mb-1 text-white">${{$products->first()->prix - $products->first()->price_aliexpress}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     <!-- button part  -->
                                     <div class="nk-ck-sm">

<ul class="">
     <li>
           <a  class="btn btn-white btn-dim btn-outline-primary"  target="_blank" href="{{$products->first()->url}}"><em class="icon ni ni-eye-fill"></em>Go to Shopify</a>
           <a  class="btn btn-white btn-dim btn-outline-primary"   target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($products->first()->title)}}"><em class="icon ni ni-eye-fill"></em>Go to AliExpress</a>
     </li>
      <br>
     <li>
           <a  class="btn btn-white btn-dim btn-outline-primary"   target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($products->first()->title)}}&search_type=keyword_unordered&media_type=all"><em class="icon ni ni-facebook-circle"></em>Go to FB Ads</a>
           <a wire:click="exportToCsv('{{ $products->first()->url }}')" class="btn btn-white btn-dim btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#95bf46}</style><path d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z"/></svg><span>Import product</span></a>                                                     
     </li>
   
 </ul>
                                
</div><!-- .card -->


</div>
</div>
</div><!-- .card-preview -->

</div>

<!-- ALl Affiche -->

<div class="col-md-20 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">
<i class="fas fa-table"></i>
Sales Tracking
<div class="nk-tb-col tb-col-md">
<a wire:click="trackstore('{{ $products->first()->stores->id }}')" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-crosshair"></em>Track product</a>                                                     
                                     
</div> 
</h4>
<img src="{{ asset('assets/images/trackingsales.png') }}" width="1500" height= "300">
</div>
</div>

                                </div>




</div>
</div>
</div>    
</div>  
  
           

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="{{ asset('assets/js/example-chart.js?ver=3.2.0') }}"></script> -->
<script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/charts/chart-sales.js?ver=3.2.0') }}"></script>

<style>
.limited-text {
    max-height: 70px;
    overflow: hidden;
}

.read-more {
    display: none;
    color: #007BFF;
    cursor: pointer;
}

.read-more.show {
    display: block;
}

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".read-more").on("click", function(e) {
            e.preventDefault();
            $(".limited-text").toggleClass("show");
            $(this).hide();
        });
    });
</script>