@extends('fontend.master')
@section('u-title')
    Sent-Request-Product-With-Massage
@endsection
@section('fontend')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    Send Product Request
                </header>
                <div class="card-body">
                    <form action="{{ url('product/request/'.$product->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Request</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
