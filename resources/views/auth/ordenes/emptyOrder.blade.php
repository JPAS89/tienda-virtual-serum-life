@extends('layouts.app')

@section('seccion')
<style>

.deneb_footer .widget_wrapper {
    background-repeat: no-repeat;
    background-size: cover;
    padding-top: 200px;
    padding-bottom: 70px;
}
@media (max-width: 767px) {
    .deneb_footer .widget_wrapper .widget {
        margin-bottom: 40px;
    }
}
.deneb_footer .widget_wrapper .widget .widget_title {
    margin-bottom: 30px;
}
.deneb_footer .widget_wrapper .widget .widget_title h4 {
    font-weight: bold;
}
.deneb_footer .widget_wrapper .widget .widget_title h4:after {
    content: "";
    display: block;
    background: url(../images/shape/line.png) no-repeat;
    max-width: 38px;
    height: 2px;
    margin-top: 5px;
}
.deneb_footer .widget_wrapper .widegt_about p {
    margin-bottom: 20px;
}
.deneb_footer .widget_wrapper .widegt_about .social li {
    display: inline-block;
    margin-right: 10px;
}
.deneb_footer .widget_wrapper .widegt_about .social li a {
    display: block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    background-color: #f9e6d4;
    color: #fba543;
    font-size: 14px;
    -webkit-transition: all all 0.5s ease-out 0s;
    -moz-transition: all all 0.5s ease-out 0s;
    -ms-transition: all all 0.5s ease-out 0s;
    -o-transition: all all 0.5s ease-out 0s;
    transition: all all 0.5s ease-out 0s;
}
.deneb_footer .widget_wrapper .widegt_about .social li a:hover,
.deneb_footer .widget_wrapper .widegt_about .social li a:focus {
    background-image: -moz-linear-gradient(0deg, #ffbd27 0%, #feb000 100%);
    background-image: -webkit-linear-gradient(0deg, #ffbd27 0%, #feb000 100%);
    background-image: -ms-linear-gradient(0deg, #ffbd27 0%, #feb000 100%);
    color: #fff;
    box-shadow: 2.5px 4.33px 15px 0px rgba(254, 176, 0, 0.4);
}
.deneb_footer .widget_wrapper .widget_link ul li {
    margin-bottom: 5px;
}
.deneb_footer .widget_wrapper .widget_link ul li a {
    text-transform: capitalize;
    color: #7a808d;
}
.deneb_footer .widget_wrapper .widget_link ul li a:hover,
.deneb_footer .widget_wrapper .widget_link ul li a:focus {
    color: #feb000;
}
.deneb_footer .widget_wrapper .widget_contact .contact_info .single_info {
    max-width: 250px;
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
}
.deneb_footer .widget_wrapper .widget_contact .contact_info .single_info .icon {
    font-size: 12px;
    color: #feb000;
    margin-right: 10px;
}
.deneb_footer .widget_wrapper .widget_contact .contact_info .single_info .info p a {
    color: #7a808d;
}
.deneb_footer .widget_wrapper .widget_contact .contact_info .single_info .info p span {
    display: block;
}

.deneb_footer .copyright_area {
    background: #edecf0;
    padding: 10px 0;
}
.deneb_footer .copyright_area .copyright_text {
    text-align: center;
}
.deneb_footer .copyright_area .copyright_text p {
    color: #011a3e;
}
.deneb_footer .copyright_area .copyright_text p span {
    color: #feb000;
}
.deneb_cta .cta_wrapper {
    padding: 45px 50px 42px;
    max-width: 970px;
    border-radius: 15px;
    margin: auto;
    margin-bottom: -135px;
    position: relative;
    background-image: -moz-linear-gradient(0deg, #ffbd27 0%, #feb000 100%);
    background-image: -webkit-linear-gradient(0deg, #ffbd27 0%, #feb000 100%);
    background-image: -ms-linear-gradient(0deg, #ffbd27 0%, #feb000 100%);
    box-shadow: 2.5px 4.33px 15px 0px rgba(254, 176, 0, 0.4);
    z-index: 1;
}
.deneb_cta .cta_wrapper:after {
    content: "";
    background: url(../images/shape/cta_shape.png) no-repeat;
    background-position: bottom;
    width: 100%;
    height: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: -1;
}
.deneb_cta .cta_wrapper .cta_content h3 {
    color: #fff;
    font-weight: bold;
}
@media (max-width: 767px) {
    .deneb_cta .cta_wrapper .cta_content h3 {
        font-size: 24px;
    }
}
.deneb_cta .cta_wrapper .cta_content h3:after {
    content: "";
    display: block;
    background: url(../images/shape/line_2.png) no-repeat;
    max-width: 110px;
    height: 2px;
    margin-top: 13px;
    margin-bottom: 24px;
}
.deneb_cta .cta_wrapper .cta_content p {
    color: #fff;
}
.deneb_cta .cta_wrapper .button_box {
    float: right;
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .deneb_cta .cta_wrapper .button_box {
        float: none;
        text-align: left;
        margin-top: 30px;
    }
}
@media (max-width: 767px) {
    .deneb_cta .cta_wrapper .button_box {
        float: none;
        text-align: center;
        margin-top: 30px;
    }
}
.deneb_cta .cta_wrapper .button_box .deneb_btn {
    background: #fff;
    color: #011a3e;
}
.deneb_cta .cta_wrapper .button_box .deneb_btn:hover,
.deneb_cta .cta_wrapper .button_box .deneb_btn:focus {
    box-shadow: 2.5px 4.33px 15px 0px rgba(0, 0, 0, 0.15);
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<section class="deneb_cta">
	<div class="container">
		<div class="cta_wrapper">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="cta_content">
						<h3>Aun no has hecho la primer compra !</h3>
						<p>Visita nuestro catalogo  y disfruta  nuestros productos.</p>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="button_box">
						<a href="{{ route('catalogo')}}" class="btn btn-warning">Ver Productos</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection