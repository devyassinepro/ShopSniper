@extends('layouts.admin')

@section('title', '| Products')

@section('content') 
 <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
        <div><h4>View Product</h4></div>
        <div><h5>Product Title : {{$products->first()->title}}</h5></div>

        <div><h3>Product prix : {{$products->first()->prix}}</h3></div>


        <td><a href="{{ $products->first()->url }}" target="_blank"><img src="{{ $products->first()->imageproduct }}" width="300" height="300"></a></td>
        <td><a  class="btn btn-success" href="{{$products->first()->url}}" target="_blank">View </a></td>
        <td><a  class="btn btn-primary"   target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($products->first()->title)}}">Search on AliExpress</a></td>
     
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Today</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>Weeklysales</th>
                    <th>Monthlysales</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <td>{{ $products->first()->todaysales }}</td>

                    <td>{{ $products->first()->yesterdaysales }}</td>
                        <td>{{ $products->first()->day3sales }}</td>
                        <td>{{ $products->first()->day4sales }}</td>
                        <td>{{ $products->first()->day5sales }}</td>
                        <td>{{ $products->first()->day6sales }}</td>
                        <td>{{ $products->first()->weeklysales }}</td>
                        <td>{{ $products->first()->montlysales }}</td>

                    </tr>
            </tbody>
            </table>
          </div>
            <div>   
            <form action="{{ route('admin.product.update', $products->first()->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                  <label for="inputAddress">Title</label>
                  <input type="text" class="form-control" name="title" id="inputAddress" value="{{ $products->first()->title }}">
                </div>

                <div class="form-group">
                  <label for="inputAddress">Aliexpress Price</label>
                  <input type="number"  step="any" class="form-control" name="pricealiexpress" id="inputAddress" value ="{{ $products->first()->price_aliexpress }}" placeholder="Price aliexpress">
                </div>

                <!-- Add form fields for other product data -->

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
            </div>
        </main>
      </div>
      <div class="row">


      <!-- <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form> -->
      </div>

    </div>
    
    @endsection