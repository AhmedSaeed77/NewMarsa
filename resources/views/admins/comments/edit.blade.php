@extends('layout.metronic')

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="col-xl-12">
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <div class="card-title">
                <span class="svg-icon svg-icon-1 me-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                    </svg>
                </span>
                <h2>Edit Comment</h2>
            </div>
        </div>
        <div class="card-body pt-5">
            <form   method="post" class="form" action="{{route('comment.updatecomment',$comment->id)}}" >
                @csrf
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Title</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7"  title="Enter the comment's title."></i>
                    </label>
                    <input type="text" class="form-control form-control-solid" name="title" value = " {{ $comment->title }} " required/>
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Content </span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" title="Enter the comment's content"></i>
                    </label>
                    <textarea class="form-control form-control-solid" name="content" required>{{ $comment->content }}</textarea>
                </div>
                    
                <div class="separator mb-6"></div>
                <div class="d-flex flex-row-reverse justify-content-between">
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">Edit</span>
                    </button>
                    <a class="btn btn-dark" href="{{route('comment.comments')}}" role="button">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
