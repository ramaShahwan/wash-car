@extends('employee.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الصفحة الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->

				<style>
					.dash-widget {
						background-color: #fff;
						border-radius: 4px;
						margin-bottom: 30px;
						padding: 20px;
						position: relative;
						box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
					}
					.dash-widget-bg1 {
						width: 65px;
						float: left;
						color: #fff;
						display: block;
						font-size: 50px;
						text-align: center;
						line-height: 65px;
						background: #0162e8;
						border-radius: 50%;
						font-size: 40px;
						height: 65px;
					}
					.dash-widget-info > span.widget-title1 {
						background: #0162e8;
						color: #fff;
						padding: 5px 10px;
						border-radius: 4px;
						font-size: 13px;
					}
				</style>

@endsection
@section('content')
<!-- row -->
<div class="row">

	<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
		<a href="{{ url('/get_orders') }}">
			<div class="dash-widget">
				<span class="dash-widget-bg1"><i class="fa fa-bell" aria-hidden="true"></i></span>
				<div class="dash-widget-info text-right">
					<br>
						<h3 style="color: black;">الطلبات المعلقة</h3>
				  	<br>
				</div>
			</div>
		</a>
	</div>

	<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
		<a href="{{ url('/myGallery') }}">
			<div class="dash-widget">
				<span class="dash-widget-bg1"><i class="fa fa-eye" aria-hidden="true"></i></span>
				<div class="dash-widget-info text-right">
					<br>
						<h3 style="color: black;">صور أعمالي</h3>
				  	<br>
				</div>
			</div>
		</a>
	</div>

</div>
<!-- row closed -->

@endsection
@section('js')
@endsection