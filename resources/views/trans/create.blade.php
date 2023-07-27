@extends('parent')

@section('title' , 'المعاملات')

@section('main-title' , 'إضافة معاملة')

@section('sub-title' , 'إضافة معاملة')

@section('style')


@endsection

@section('content')
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>إضافة معاملة جديدة</div>
		<div class="tools">
			<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
			<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
			<a href="javascript:;" class="reload" data-original-title="" title=""> </a>
			<a href="javascript:;" class="remove" data-original-title="" title=""> </a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form class="form-horizontal" method="post" action="{{route('archives.store')}}" >
             @csrf
             @method('post')
			<div class="form-body">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3" >   عنوان المعاملة  </label>
							<div class="col-md-9">
								<input type="text"  id="transTitle" name="transTitle" class="form-control">
								<span class="help-block">  </span>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"> رقم المعاملة </label>
							<div class="col-md-9">
								<input type="text"  id="transNo" name="transNo" class="form-control"></div>
						</div>
					</div>
					<!--/span-->

				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"> اسم الملف </label>
							<div class="col-md-9">
								<input type="text"  id="filename" name="filename" class="form-control">
							</div>
						</div>
					</div>
					<!--/span-->
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label  for="transType" >نوع المعاملة</label>
                          <select class="form-control select2" name="transType" id="transType" style="width: 100%;">
                            {{-- <option selected="selected">Alabama</option> --}}
                            <option value="وارد" >وارد</option>
                            <option value="صادر"> صادر</option>
                          </select>
                        </div>


				</div>

				<!--/row-->



				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"> المرفق   </label>
							<div class="col-md-9">
								<input  id="attached" name="attached" type="file" class="form-control"> </div>
						</div>
					</div>
					<!--/span-->

					<!--/span-->
			</div>
				<!--/row-->

				<!--/row-->

			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="post" class="btn green" onclick="performStore()"><i class="fa fa-check"></i>حفظ </button>
								<button type="button" class="btn default">إلغاء </button>
							</div>
						</div>
					</div>
					<div class="col-md-6"> </div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>




@endsection


@section('script')

<script>
    function performStore() {
        let formData = new FormData();
        formData.append('transTitle', document.getElementById('transTitle').value);
        formData.append('transNo', document.getElementById('transNo').value);
        formData.append('filename', document.getElementById('filename').value);
        formData.append('transType', document.getElementById('transType').value);
        formData.append('attached', document.getElementById('attached').files[0]);
         store('/cms/admins/archives' ,formData );


    }
</script>

@endsection
