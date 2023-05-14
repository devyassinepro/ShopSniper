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
                    <th><h6>Name</h6></th>
                    <th><h6>Products</h6></th>
                    <th><h6>Sales</h6></th>
                    <th><h6>Revenue</h6></th>
                    <th><h6>Expand</h6></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td><p>
                          <a href="{{ route('account.stores.show',$store->id) }}">{{ $store->name }} - {{ $store->currency }}</a>
                          <a  target="_blank" href="{{$store->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a> 

                        </p></td>
                        <td><p>{{ $store->allproducts }}</p></td>
                        <td><p>{{ $store->products_sum_totalsales }}</p></td>
                        @if($store->currency == "EUR" )
                        <td><p>{{number_format($store->products_sum_revenue, 2, ',', ' ')}} €</p></td>
                        @endif
                        @if($store->currency != "EUR" )
                        <td><p> $ {{number_format($store->products_sum_revenue, 2, ',', ' ')}}</p></td>
                        @endif
                        <td><a  class="btn btn-primary" href="{{ route('account.stores.show',$store->id) }}">Show Charts</a></td>
                        <td>
                            <form action="{{ route('account.stores.destroy',$store->id) }}" method="Post">
                                @csrf
                                @method('DELETE')

                                @if (!currentTeam()->onTrial())
                                <button type="submit" class="btn btn-warning">Untrack Store</button>
                                @endif
                              
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>
        <div class="my-4">
        {{ $stores->links() }}
            </div>
  
</div>