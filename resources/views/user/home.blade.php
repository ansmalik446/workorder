@extends('user.layout.header')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@section('content')
<section class="products pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Choose a sport below to get started</h2>
            </div>
        </div>
        <div class="row mt-5 pb-5">
            @forelse ($sports as $sport )

            <div class="col-md-4 col-12 mt-5 text-center">
                <a href="{{url('admins/product/'.$sport->id)}}" class="hover_none">
                    <div class="card">
                        <div class="card-img">
                          <img src="{{asset('upload/sports/'.$sport->image)}}" style="max-height: 250px;min-height: 249px;">
                        </div>
                        <div class="card-content">
                          <h2 class="big-title">{{$sport->name}}</h2>

                        </div>
                      </div>
                {{-- <div class="card card-bg">
                    <div class="card-body border-bottom pb-0">
                    <h4 class="card-title text-white">{{$sport->name}}</h4>
                    </div>
                  <div class="py-3"><img class="img-fluid" alt="BasketBall"
                    src="{{asset('upload/sports/'.$sport->image)}}"></div>
                </div> --}}
            </a>
              </div>
              @empty
              <div class="col-12 text-center height">
                  {{-- <h1>No Sports Available</h1> --}}
                  <img src="{{asset('img/nodata-removebg-preview.png')}}" style="width: 80%" alt="">
              </div>
            @endforelse

            {{-- <div class="col-md-3 text-center">
                <div class="card card-bg">
                    <div class="card-body border-bottom pb-0">
                    <h4 class="card-title text-white">BasketBall</h4>
                    </div>
                  <div class="py-3"><img class="img-fluid" alt="BasketBall"
                    src="./img/basketBall1.png"></div>
                </div>
            </div> --}}


              {{-- <div class="col-md-3 text-center">
                <div class="card card-bg">
                    <div class="card-body border-bottom pb-0">
                    <h4 class="card-title text-white">BasketBall</h4>
                    </div>
                  <div class="py-3"><img class="img-fluid" alt="BasketBall"
                    src="./img/basketBall1.png"></div>
                </div>
              </div>
              <div class="col-md-3 text-center">
                <div class="card card-bg">
                    <div class="card-body border-bottom pb-0">
                    <h4 class="card-title text-white">BasketBall</h4>
                    </div>
                  <div class="py-3"><img class="img-fluid" alt="BasketBall"
                    src="{{asset('img/basketBall1.png')}}"></div>
                </div>
              </div> --}}
        </div>

        {{-- <div class="row mt-5">
            <div class="col-md-3 text-center">
                <div class="card card-bg">
                    <div class="card-body border-bottom pb-0">
                    <h4 class="card-title text-white">BasketBall</h4>
                    </div>
                  <div class="py-3"><img class="img-fluid" alt="BasketBall"
                    src="{{url('img/basketBall1.png')}}"></div>
                </div>
              </div>

              <div class="col-md-3 text-center">
                <div class="card card-bg">
                    <div class="card-body border-bottom pb-0">
                    <h4 class="card-title text-white">BasketBall</h4>
                    </div>
                  <div class="py-3"><img class="img-fluid" alt="BasketBall"
                    src="{{url('img/basketBall1.png')}}"></div>
                </div>
              </div>


        </div> --}}
    </div>
</section>

@endsection

