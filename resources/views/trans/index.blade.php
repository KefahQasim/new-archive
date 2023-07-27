@extends('parent')

@section('title' , 'المعاملات')

@section('main-title' , ' عرض المعاملات')

@section('sub-title' , 'عرض المعاملات')

@section('style')


@endsection

@section('content')

<div class="portlet light portlet-fit bordered">

	<div class="portlet-body">
        <form action="" method="get" style="margin-bottom:2%;">
            <div class="row">
              <div class="input-icon col-md-2">
                  <input type="text" class="form-control" placeholder="ابحث من عنوان المعاملة "
                     name='transTitle' @if( request()->transTitle) value={{request()->transTitle}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>

                  <div class="input-icon col-md-2">
                  <input type="text" class="form-control" placeholder=" ابحث من خلال  اسم الملف"
                     name='filename' @if( request()->filename) value={{request()->filename}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>

                  <div class="input-icon col-md-2">
                  <input type="text" class="form-control" placeholder="ابحث من خلال  نوع المعاملة "
                     name='transType' @if( request()->transType) value={{request()->transType}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>

            <div class="col-md-6">
                <button class="btn btn-danger btn-md" type="submit">Filter</button>
                <a href="{{route('archives.index')}}" type="button" class="btn btn-info">إنهاء البحث </a>
            </div>



          </div>
            </form>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-striped text-nowrap text-center">

			<tr class="bg-info">
				<th >المتسلسل</th>
                <th >عنوان المعاملة</th>
                <th >رقم المعاملة</th>
				<th >نوع المعاملة </th>
                <th >الاعدادات</th>
			</tr>
			</thead>
			<tbody >
                @foreach ( $archives as $archive)

					<tr >

						<td > {{$archive->id}}  </td>
						<td> {{$archive->transTitle}} </td>
						<td > {{$archive->transNo}} </td>
						<td >  {{$archive->transType}}	</td>
						<td>
							<a type="button" href="{{route('archives.edit', $archive->id)}}"  class="btn btn-outline editingTRbutton btn-circle  btn-sm green">
								<i class="fa fa-edit"></i> تعديل </a >
                                <button type="button"  onclick="performDestroy({{$archive->id}} , this)"  class="btn btn-outline btn-circle dark btn-sm black">	<i class="fa fa-trash-o"></i> حذف  </button>

						</td>
					</tr>
                    @endforeach
					</tbody>
				</table>
                {{-- $archives->links() --}}

			</div>
		</div>
	</div>
</div>

@endsection


@section('script')


@endsection
