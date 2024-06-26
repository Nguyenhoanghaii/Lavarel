@extends('bread.master')
@section('content')
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer">
                    <div class="banner">
                        <ul>
                            <!-- THE FIRST SLIDE -->

                                <li data-transition="boxfade" data-slotamount="20"
                                    style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                        data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                        data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                        data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                        data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                        data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                            data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined"
                                            src="image/slide/banner1.jpg" data-src="image/slide/banner1.jpg"
                                            style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/banner1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>

                                </li>
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container" >
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12" style="display: flex;">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">438 styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($product as $item)
                                    <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header" >
                                            <a href="/detail/{{$item->id}}"><img src="/image/product/{{$item->image}}"
                                                    alt="" style="width:500px;height:300px"></a>


                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$item->name}}</p>
                                            <p class="single-item-price">
                                                <span>{{$item->unit_price}}</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="/cart/{{$item->id}}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="/detail/{{$item->id}}">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>

                        </div> <!-- .beta-products-list -->
                            <div class="space50">&nbsp;</div>


                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
