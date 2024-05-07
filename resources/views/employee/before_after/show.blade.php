@extends('employee.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">صور أعمالي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قبل وبعد التنظيف</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0"> قبل وبعد التنظيف </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">

								@foreach($data as $dt)

                                <div class="row">
                                    
                                    <div class="col-md-6 text-center">
                                        <div>
                                            <h4>قبل</h4>
                                            <img src="{{ URL::asset('/site/img/gallery/'.$dt->beforeImage) }}" style="height: 300px; width: 300px;">
                                            <br><br>
                                            <div class="text-center">
                                                <a class="btn btn-info" href="{{ route('before.edit', $dt->id) }}" style="color: white"> <i class="las la-pen"></i> تعديل </a> &nbsp;&nbsp;&nbsp;
          
                                            	<a class="modal-effect btn btn-danger" data-toggle="modal" title="حذف" style="cursor: pointer;"
													data-target="#delete{{$dt->id}}"> <i class="las la-trash"></i> حذف </a>
													<form action="{{route('before.delete', $dt->id)}}" method="POST" enctype="multipart/form-data">
															@csrf
															@method('DELETE')
														<div id="delete{{$dt->id}}" class="modal fade delete-modal" role="dialog">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
			
																	<div class="modal-header ">
																		<h6 class="modal-title">حذف صورة قبل التنظيف</h6><button aria-label="Close" class="close" data-dismiss="modal"
																			type="button"><span aria-hidden="true">&times;</span></button>
																	</div>
			
																	<div class="modal-body text-center">
																		<img src="{{URL::asset('assets/img/media/sent.png')}}" alt="" width="50" height="46">
																		<br><br>
																		<h5>هل أنت متأكد من عملية الحذف؟</h5>
																		<br>
																		<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">إلغاء</a>
																			<button type="submit" class="btn btn-danger">حذف</button>
																		</div>
																		<br>
																	</div>
																</div>
															</div>
														</div>
													</form>
                                            </div>
                                            <br><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-center">
                                        <div>
                                            <h4>بعد</h4>
                                            <img src="{{ URL::asset('/site/img/gallery/'.$dt->afterImage) }}" style="height: 300px; width: 300px;">
                                            <br><br>
                                            <div class="text-center">
		
                                                <a class="btn btn-info" href="{{ route('after.edit', $dt->id) }}" style="color: white"> <i class="las la-pen"></i> تعديل </a> &nbsp;&nbsp;&nbsp;
          
                                            	<a class="modal-effect btn btn-danger" data-toggle="modal" title="حذف" style="cursor: pointer;"
													data-target="#delete1{{$dt->id}}"> <i class="las la-trash"></i> حذف </a>
													<form action="{{route('after.delete', $dt->id)}}" method="POST" enctype="multipart/form-data">
															@csrf
															@method('DELETE')
														<div id="delete1{{$dt->id}}" class="modal fade delete-modal" role="dialog">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
			
																	<div class="modal-header">
																		<h6 class="modal-title">حذف صورة بعد التنظيف</h6><button aria-label="Close" class="close" data-dismiss="modal"
																			type="button"><span aria-hidden="true">&times;</span></button>
																	</div>
			
																	<div class="modal-body text-center">
																		<img src="{{URL::asset('assets/img/media/sent.png')}}" alt="" width="50" height="46">
																		<br><br>
																		<h5>هل أنت متأكد من عملية الحذف؟</h5>
																		<br>
																		<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">إلغاء</a>
																			<button type="submit" class="btn btn-danger">حذف</button>
																		</div>
																		<br>
																	</div>
																</div>
															</div>
														</div>
													</form>
                                            </div>
                                            <br><br><br>
                                        </div>
                                    </div>
                                </div>  
                                    
                                @endforeach

								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
		
@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection