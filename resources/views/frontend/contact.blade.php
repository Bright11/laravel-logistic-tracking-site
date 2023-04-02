@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/divider.css">
    <link rel="stylesheet" href="css/frontend.css">
@endpush
@section('title')
    <title>Maximum Global Security</title>
@endsection
@section('content')
    <div class="about">
		<style>

			@media screen and (max-width:768px){
				.contact>form {
    display:flex !important;
    flex-direction: column !important;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 10px;
				width:90vw;

}

			}

		</style>
        @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div style="margin-top:100px"></div>
        <div class="contact">
            <h3>We love to hear from you</h3>
            <form action="sendmessage" method="POST">
                @csrf
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <input name="name" placeholder="Your name" />
                <input name="email" placeholder="Email" />
                <textarea rows="4" placeholder="Enter your message" name="message" cols="50"></textarea>
                    {{-- <div>
                          {!! htmlFormSnippet() !!}
                          @if($errors->has('g-recaptcha-response'))

                          @endif
                          <div>
                            <small class="text-danger mb-3">
                                {{$errors->first('g-recaptcha-response')}}
                            </small>
                          </div>
                    </div> --}}
                <button>Send</button>
            </form>
        </div>

    </div>
@endsection
