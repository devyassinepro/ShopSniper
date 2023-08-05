@extends('layouts.account_niche')

@section('title', '| Niches')

@section('content')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Niches</h3>
                                        </div><!-- .nk-block-head-content -->
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
          <a class="btn btn-primary" href="{{ route('account.niches.create') }}">Add Niche</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->

        </br></br>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

                            <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                            <th scope="col">Niche</th>
                                            <th scope="col">Start Added</th>
                                            <th scope="col"></th>

                                          
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($nicheall as $niche)
                                        <tr>
                                            <td>
                                                 <span class="tb-odr-id"><a href="#">{{ $niche->name }}</a></span>
                                            </td>
                                           
                                            <td> 
                                            <span class="amount">{{ $niche->created_at }}</span>
                                            </td>
                                            
                                            <td>                   
                                            <form action="{{ route('account.niches.destroy',$niche->id) }}" method="Post">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                                              </form>                                               </td>
                                            <!-- Add more data rows as needed -->
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>


    </div>
                        </div>
                    </div>
                </div>

    
    @endsection