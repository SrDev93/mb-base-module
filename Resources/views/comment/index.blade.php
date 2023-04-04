@extends('layouts.admin')

@push('stylesheets')

@endpush

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        @include('base::comment.partial.header')
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">لیست دیدگاه کاربران</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ردیف</th>
                                    <th class="wd-15p border-bottom-0">نام</th>
                                    <th class="wd-15p border-bottom-0">ایمیل</th>
                                    <th class="wd-15p border-bottom-0">کامنت</th>
                                    <th class="wd-15p border-bottom-0">وضعیت</th>
                                    <th class="wd-20p border-bottom-0">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><p style="white-space: normal;">{{ $item->text }}</p></td>
                                        <td>@if($item->status) <span class="badge bg-success">تایید شده</span> @else <span class="badge bg-danger">تایید نشده</span>  @endif</td>
                                        <td>
                                            <button type="button" class="parent-id btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{ $item->id }}">
                                                <i class="fa fa-reply"></i>
                                            </button>

                                            @if(!$item->status)
                                                <a href="{{ route('comment-status', $item->id) }}" class="btn btn-primary"><i class="fa fa-check"></i></a>
                                            @else
                                                <a href="{{ route('comment-status', $item->id) }}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                            @endif
                                            <button type="submit" onclick="return confirm('برای حذف اطمبنان دارید؟')" form="form-{{ $item->id }}" class="btn btn-danger fs-14 text-white edit-icn" title="حذف">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                            <form id="form-{{ $item->id }}" action="{{ route('comment.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @foreach($item->children as $key2 => $child)
                                        <tr>
                                            <td>{{ $key + 1 .'-'. $key2 + 1 }}</td>
                                            <td>{{ $child->name }}</td>
                                            <td>{{ $child->email }}</td>
                                            <td><p style="white-space: normal;">{{ $child->text }}</p></td>
                                            <td>@if($child->status) <span class="badge bg-success">تایید شده</span> @else <span class="badge bg-danger">تایید نشده</span>  @endif</td>
                                            <td>
                                                <button type="submit" onclick="return confirm('برای حذف اطمبنان دارید؟')" form="form-{{ $child->id }}" class="btn btn-danger fs-14 text-white edit-icn" title="حذف">
                                                    <i class="fe fe-trash"></i>
                                                </button>
                                                <form id="form-{{ $child->id }}" action="{{ route('comment.destroy', $child->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ route('comment.store') }}" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">ارسال پاسخ</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" class="parent_id" name="parent_id" value="">
                        <textarea name="message" class="form-control" placeholder="پاسخ" rows="5"></textarea>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ثبت</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">انصراف</button>
                    </div>

                    @csrf
                </form>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('.parent-id').click(function () {
                var id = $(this).data('id');

                $('.parent_id').val(id);
            });
        </script>
    @endpush
@endsection
