@extends('frontend.layouts.app')
@section('content')


<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">
    <div class="custom-container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">{{$data['name']}}</li>
            </ul>
        </div>
    </div>
</div>



<div class="blog-area pt-75 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row grid">
                    @php
                    $dataProd = App\Models\Blog::where('is_deleted', 0)->paginate(21);
                    @endphp
                    @foreach($dataProd as $cat)
                    <div class="col-lg-4 col-md-4 col-12 col-sm-4 grid-item wow tmFadeInUp">
                        <div class="blog-wrap-2 mb-30">
                            <div class="blog-img-2">
                                <a href="{{ url('blog-detail/'.$cat->slug) }}"><img
                                        src="{{url('public/uploads/'.$cat->image)}}" alt=""></a>

                            </div>
                            <div class="blog-content-2">
                              
                                <h3><a href="{{ url('blog-detail/'.$cat->slug) }}">{{ $cat->name }}</a></h3>
                                <div class="blog-btn">
                                    <a href="{{ url('blog-detail/'.$cat->slug) }}">Read more <i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach





                </div>
                
            </div>

            {{ $dataProd->links() }}

        </div>
    </div>
</div>




@endsection