
@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        @include('faq::partial.header')
        <!-- PAGE-HEADER END -->

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">ویرایش پرسش متداول</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('faq.update', $faq->id) }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="question" class="form-label">پرسش</label>
                                <input type="text" name="question" class="form-control" id="question" required value="{{ $faq->question }}">
                                <div class="invalid-feedback">لطفا پرسش را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="answer" class="form-label">پاسخ</label>
                                <input type="text" name="answer" class="form-control" id="answer" required value="{{ $faq->answer }}">
                                <div class="invalid-feedback">لطفا پاسخ را وارد کنید</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @method('PATCH')
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->


    </div>
@endsection
