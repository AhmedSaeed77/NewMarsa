@extends('layout.metronic')

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet p-5">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add Blog
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{ route('blog.addblog') }}" class="kt-form kt-form--fit kt-form--label-right" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <label >  Title:</label>
                    <div >
                        <input type="text" name="title" class="form-control" placeholder="enter title " required>
                    </div>
                </div>

                <div class="form-group row">
                    <label >   Content :</label>
                    <div >
                        <textarea  class="form-control" name="content"   placeholder="Describe yourself here..." required>  </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label >   Image :</label>
                    <div >
                        <input type="file" name="image" class="form-control" placeholder="image" required>
                    </div>
                </div>

            </div><br>
                <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                    <div class="kt-form__actions">
                        <div class="row">
                           <div class="col-lg-2"></div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-success">Add</button>
                                <a class="btn btn-dark" href="{{route('blog.blogs')}}" role="button">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!--end::Form-->
    </div>
</div>
</div>
@endsection
