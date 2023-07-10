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


        <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                        
                                        </div>
                                        <div class="card card-preview">
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-id">Niche</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-total">Start Added</span>
                                                        </th>
                                                        <th class="tb-odr-action">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                @foreach ($nicheall as $niche)
                                                    <tr class="tb-odr-item">
                                                        <td class="tb-odr-info">
                                                            <span class="tb-odr-id"><a href="#">{{ $niche->name }}</a></span>
                                                        </td>
                                                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">{{ $niche->created_at }}</span>
                                                            </span>
                                                        </td>
                                                        <td class="tb-odr-action">
                                                            <div class="tb-odr-btns d-none d-md-inline">
                                                            <form action="{{ route('account.niches.destroy',$niche->id) }}" method="Post">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                                              </form>                                                            
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                   
                                                </tbody>
                                            </table>
                                            <div>
                                          {{  $nicheall->links() }}

                                          </div>
                                        </div><!-- .card -->
                                    </div><!-- nk-block -->

    </div>
                        </div>
                    </div>
                </div>

    
    @endsection