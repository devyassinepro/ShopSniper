<div>
<div class="mb-4">
            <input
                type="search"
                wire:model.debounce.500ms="search"
                placeholder="Search products"
                class="border-gray-400 rounded w-full py-2 pr-10 pl-4"
            >
    </div>     
     <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th><h6>Image</h6></th>
                    <th><h6>Title</h6></th>
                    <th><h6>Today</h6></th>
                    <th><h6>Yesterday</h6></th>
                    <th><h6>Total sales</h6></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                        <tr>
                        <td><a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="150" height="150"></a></td>
                        <td>
                          <a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }} - $ {{ $product->prix }}</a>
                          <a  target="_blank" href="{{$product->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a> 
                          <a  target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($product->title)}}&search_type=keyword_unordered&media_type=all"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" width="30" height="30"></a>
                          <a  target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($product->title)}}"> <img src="https://img.icons8.com/color/512/aliexpress.png" width="30" height="30"></a>
                        </td>                     
                          <!-- <td></td> -->
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $product->todaysales_count * $product->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->todaysales_count }}</label>
                          </td>
                          <td>
                          <label class="badge badge-success badge-pill">${{ $product->yesterdaysales_count * $product->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->yesterdaysales_count }}</label>
                          </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $product->totalsales * $product->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->totalsales }}</label>
                          </td>
                          <td><a  class="btn btn-success" href="{{ route('account.product.show',$product->id) }}" >View </a></td>

                        </tr>
                        @endforeach
            </tbody>
            </table>
          </div>
        <div class="my-4">
        {{ $products->links() }}
            </div>
  
</div>