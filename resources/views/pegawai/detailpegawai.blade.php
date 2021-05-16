@extends('master.master')
@section('title','Detail Data Pegawai | CV Hasil Utama Konsultan')
@section('ket','Detail data pegawai yang telah dipilih sebelumnya')
@section('content')

<div class="row" >
@csrf
    <div class="col-sm-4">

        <div class="sp-loading"><img src="{{ asset('menu_2') }}/assets/images/sp-loading.gif" alt=""><br>LOADING
            IMAGES
        </div>
        <div class="sp-wrap">
            <a href="{{ asset('menu_2') }}/assets/images/products/big/1.jpg"><img src="{{ asset('menu_2') }}/assets/images/products/big/1.jpg" alt=""></a>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="product-right-info">
            <h3><b>Mens Fedora Hat CODEblack</b></h3>
            <div class="rating">
                <ul class="list-inline">
                    <li><a class="fa fa-star" href=""></a></li>
                    <li><a class="fa fa-star" href=""></a></li>
                    <li><a class="fa fa-star" href=""></a></li>
                    <li><a class="fa fa-star" href=""></a></li>
                    <li><a class="fa fa-star-o" href=""></a></li>
                </ul>
            </div>

            <h2> <b>$42</b><small class="text-muted m-l-10"><del>$62</del> </small></b></h2>

            <h5 class="m-t-20"><b>Stock: </b> 256pcs. <span class="label label-default m-l-5">In Stock</span></h5>

            <hr />

            <h5 class="font-600">Product Description</h5>

            <p class="text-muted">Dantes remained confused and silent by this
                explanation of the thoughts which had unconsciously been working in
                his mind, or rather soul; for there are two distinct sorts of ideas,
                those that proceed from the head and those from the heart.</p>

            <p class="text-muted">Unconsciously been working in
                his mind, or rather soul; for there are two distinct sorts of ideas,
                those that proceed from the head and those from the heart.</p>

            <div class="m-t-30">
                <button type="button" class="btn btn-white" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">
                    <span class="btn-label"><i class="fa fa-shopping-cart"></i>
                    </span>Buy Now</button>

            </div>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-xs-12">
            <h4><b>Specifications:</b></h4>
            <div class="table-responsive m-t-20">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="400">Brand</td>
                            <td>
                                TheBrandStore
                            </td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>
                                Black
                            </td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td>
                                9 Centimeters
                            </td>
                        </tr>
                        <tr>
                            <td>Width</td>
                            <td>
                                20 Centimeters
                            </td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>
                                13 Centimeters
                            </td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>
                                400 Grams
                            </td>
                        </tr>
                        <tr>
                            <td>Item part number:</td>
                            <td>
                                ABC2016
                            </td>
                        </tr>
                        <tr>
                            <td>Design</td>
                            <td>
                                Over-the-head
                            </td>
                        </tr>
                        <tr>
                            <td>Head Support</td>
                            <td>
                                No
                            </td>
                        </tr>
                        <tr>
                            <td width="400">Brand</td>
                            <td>
                                TheBrandStore
                            </td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>
                                Black
                            </td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td>
                                9 Centimeters
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


