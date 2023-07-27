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
			<i class="fa fa-gift"></i>تعديل على  معاملة </div>
		<div class="tools">
			<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
			<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
			<a href="javascript:;" class="reload" data-original-title="" title=""> </a>
			<a href="javascript:;" class="remove" data-original-title="" title=""> </a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
        <form >
            @csrf
            @method('PUT')
			<div class="form-body">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3" >   عنوان المعاملة  </label>
							<div class="col-md-9">
								<input type="text"  id="transTitle" name="transTitle" class="form-control" value="{{$archives->transTitle}}">
								<span class="help-block">  </span>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"> رقم المعاملة </label>
							<div class="col-md-9">
						<input type="text"  id="transNo" name="transNo" class="form-control" value="{{$archives->transTitle}}"></div>
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
								<input type="text"  id="filename" name="filename" class="form-control" value="{{$archives->filename}}">
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">نوع المعاملة  </label>
							<div class="col-md-9">
								<input type="text"  id="transType" name="transType" class="form-control" value="{{$archives->transType}}">
							</div>
						</div>
					</div>
					<!--/span-->

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
								<button type="button" class="btn green" onclick="performUpdate({{$archives->id}})"><i class="fa fa-check"></i>حفظ </button>
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
    function performUpdate(id) {
        let formData = new FormData();
        formData.append('transTitle', document.getElementById('transTitle').value);
        formData.append('transNo', document.getElementById('transNo').value);
        formData.append('filename', document.getElementById('filename').value);
        formData.append('transType', document.getElementById('transType').value);
        formData.append('attached', document.getElementById('attached').files[0]);

         storeRoute('/cms/admins/archives_update/'+id ,formData );

    }

</script>

@endsection
