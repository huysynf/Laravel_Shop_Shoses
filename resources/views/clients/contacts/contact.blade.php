
@extends('clients.layouts.app')
@section('tittle','Liên hệ ')
@section('content')
    <div class="sec-banner bg0 p-t-80 p-b-50">

    </div>
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				Liên hệ
			</span>
        </div>
    </div>


    <!-- Product Detail -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="col-12">
                        Bản đồ
                    </div>
                    <div class="col-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59575.57896863725!2d105.70014938224404!3d21.05373509442376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457fc32e1bb%3A0xc5fd62bc391ec0ac!2zQTcsIFFMMzIsIE1pbmggS2hhaSwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1582008907394!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>

            <div class="col-sm-12 col-lg-6 col-md-6">
            <div class="row">
                <div class="col-12">
                    FaceBook
                </div>
                <div class="col-12">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhauiconfessions.td%2F&tabs=timeline&width=720&height=480&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=372844840059316" width="720" height="480" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
            </div>
            </div>
        </div>
    </section>


    <!-- Related Products -->


@endsection
@section('js')
    <script src="{{asset('client/js/product.js')}}"></script>
@endsection
