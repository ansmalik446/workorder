@extends('user.layout.header')
<link rel="stylesheet" href="{{asset('css/flip.css')}}">
@section('content')

<div class="container">
    <div class="row pt-5 pb-5">
        <div class="col-12 text-center pb-4 ">
            <h2>Products</h2>
        </div>
        @forelse ($products as $product )
        <div class="col-md-4 col-12 my-4">
            <div class="flip-card">
                <a href="{{url('admins/option/' .$product->id)}}">
                <div class="flip-card-inner">
                  <div class="flip-card-front pt-5 text-center text-light">
                    <img src="{{asset('upload/product/'.$product->image)}}" alt="Avatar" class="rounded" style="width:80%;height:300px;">
                    <h3 class="mt-2">{{$product->name}}</h3>
                  </div>
                  <div class="flip-card-back d-flex">
                      <div class="p-3 content-center mx-auto">
                        <b>
                          {{$product->description}}
                        </b>

                      </div>

                  </div>
                </div>
            </a>
              </div>
        </div>
        @empty
        <div class="col-12 text-center height">
            {{-- <h1>No Product Available</h1> --}}
            <img src="{{asset('img/nodata-removebg-preview.png')}}" style="width: 80%" alt="">
        </div>

        @endforelse

    </div>
</div>


@endsection
