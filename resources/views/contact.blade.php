
@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @if(isset($message))
                    <div class="alert alert-success" role="alert">
                        {{ $message ?? ''}}
                    </div>
                @endif


                <div class="card">
                    <div class="card-header">Feedback</div>

                    <div class="card-body">


                        <form method="POST" action='/contact'>
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required
                                           placeholder="John Smith">


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required
                                           autocomplete="email" placeholder="abc@gmail.com">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Message</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="content" placeholder="Drop Your Message Here"
                                              required></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" value="submit" class="btn btn-primary">
                                        Submit
                                    </button>


                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
