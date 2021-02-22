@extends('layouts.app')
@section('content')

{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--    <!------ Include the above in your HEAD tag ---------->--}}

{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">--}}
{{--    <div class="container">--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-12 col-md-8 col-lg-6 pb-5">--}}


{{--                <!--Form with header-->--}}

{{--                <form action="/contact" method="post">--}}
{{--                    {{csrf_field()}}--}}
{{--                    <div class="card border-primary rounded-0">--}}
{{--                        <div class="card-header p-0">--}}
{{--                            <div class="bg-info text-white text-center py-2">--}}
{{--                                <h3><i class="fa fa-envelope"></i> Contact US</h3>--}}
{{--                                <p class="m-0">Give Feedback</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}

{{--                            <!--Body-->--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-2">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>--}}
{{--                                    </div>--}}
{{--                                    <input type="text" class="form-control"  name="name" placeholder="Enter Your Name" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-2">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>--}}
{{--                                    </div>--}}
{{--                                    <input type="email" class="form-control"  name="email" placeholder="admin@gmail.com" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-2">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>--}}
{{--                                    </div>--}}
{{--                                    <textarea class="form-control" name="content" placeholder="Drop Your Message Here" required></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="text-center">--}}
{{--                                <input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </form>--}}
{{--                <!--Form with header-->--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<style>


    /* RESET RULES
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    :root {
        --white: #afafaf;
        --red: #e31b23;
        --bodyColor: #292a2b;
        --borderFormEls: hsl(0, 0%, 10%);
        --bgFormEls: hsl(0, 0%, 14%);
        --bgFormElsFocus: hsl(0, 7%, 20%);
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        outline: none;
    }

    a {
        color: inherit;
    }

    input,
    select,
    textarea,
    button {
        font-family: inherit;
        font-size: 100%;
    }

    button,
    label {
        cursor: pointer;
    }

    select {
        appearance: none;
    }

    /* Remove native arrow on IE */
    select::-ms-expand {
        display: none;
    }

    /*Remove dotted outline from selected option on Firefox*/
    /*https://stackoverflow.com/questions/3773430/remove-outline-from-select-box-in-ff/18853002#18853002*/
    /*We use !important to override the color set for the select on line 99*/
    select:-moz-focusring {
        color: transparent !important;
        text-shadow: 0 0 0 var(--white);
    }

    textarea {
        resize: none;
    }

    ul {
        list-style: none;
    }

    body {
        font: 18px/1.5 "Open Sans", sans-serif;
        background: var(--bodyColor);
        color: var(--white);
        margin: 1.5rem 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }


    /* FORM ELEMENTS
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .my-form h1 {
        margin-bottom: 1.5rem;
    }

    .my-form li,
    .my-form .grid > *:not(:last-child) {
        margin-bottom: 1.5rem;
    }

    .my-form select,
    .my-form input,
    .my-form textarea,
    .my-form button {
        width: 100%;
        line-height: 1.5;
        padding: 15px 10px;
        border: 1px solid var(--borderFormEls);
        color: var(--white);
        background: var(--bgFormEls);
        transition: background-color 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25),
        transform 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25);
    }

    .my-form textarea {
        height: 170px;
    }

    .my-form ::placeholder {
        color: inherit;
        /*Fix opacity issue on Firefox*/
        opacity: 1;
    }

    .my-form select:focus,
    .my-form input:focus,
    .my-form textarea:focus,
    .my-form button:enabled:hover,
    .my-form button:focus,
    .my-form input[type="checkbox"]:focus + label {
        background: var(--bgFormElsFocus);
    }

    .my-form select:focus,
    .my-form input:focus,
    .my-form textarea:focus {
        transform: scale(1.02);
    }

    .my-form *:required,
    .my-form select {
        background-repeat: no-repeat;
        background-position: center right 12px;
        background-size: 15px 15px;
    }

    .my-form *:required {
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/asterisk.svg);
    }

    .my-form select {
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/down.svg);
    }

    .my-form *:disabled {
        cursor: default;
        filter: blur(2px);
    }


    /* FORM BTNS
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .my-form .required-msg {
        display: none;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/asterisk.svg)
        no-repeat center left / 15px 15px;
        padding-left: 20px;
    }

    .my-form .btn-grid {
        position: relative;
        overflow: hidden;
        transition: filter 0.2s;
    }

    .my-form button {
        font-weight: bold;
    }

    .my-form button > * {
        display: inline-block;
        width: 100%;
        transition: transform 0.4s ease-in-out;
    }

    .my-form button .back {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-110%, -50%);
    }

    .my-form button:enabled:hover .back,
    .my-form button:focus .back {
        transform: translate(-50%, -50%);
    }

    .my-form button:enabled:hover .front,
    .my-form button:focus .front {
        transform: translateX(110%);
    }


    /* CUSTOM CHECKBOX
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .my-form input[type="checkbox"] {
        position: absolute;
        left: -9999px;
    }

    .my-form input[type="checkbox"] + label {
        position: relative;
        display: inline-block;
        padding-left: 2rem;
        transition: background 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25);
    }

    .my-form input[type="checkbox"] + label::before,
    .my-form input[type="checkbox"] + label::after {
        content: '';
        position: absolute;
    }

    .my-form input[type="checkbox"] + label::before {
        left: 0;
        top: 6px;
        width: 18px;
        height: 18px;
        border: 2px solid var(--white);
    }

    .my-form input[type="checkbox"]:checked + label::before {
        background: var(--red);
    }

    .my-form input[type="checkbox"]:checked + label::after {
        left: 7px;
        top: 7px;
        width: 6px;
        height: 14px;
        border-bottom: 2px solid var(--white);
        border-right: 2px solid var(--white);
        transform: rotate(45deg);
    }


    /* FOOTER
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    footer {
        font-size: 1rem;
        text-align: right;
        backface-visibility: hidden;
    }

    footer a {
        text-decoration: none;
    }

    footer span {
        color: var(--red);
    }


    /* MQ
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    @media screen and (min-width: 600px) {
        .my-form .grid {
            display: grid;
            grid-gap: 1.5rem;
        }

        .my-form .grid-2 {
            grid-template-columns: 1fr 1fr;
        }

        .my-form .grid-3 {
            grid-template-columns: auto auto auto;
            align-items: center;
        }

        .my-form .grid > *:not(:last-child) {
            margin-bottom: 0;
        }

        .my-form .required-msg {
            display: block;
        }
    }

    @media screen and (min-width: 541px) {
        .my-form input[type="checkbox"] + label::before {
            top: 50%;
            transform: translateY(-50%);
        }

        .my-form input[type="checkbox"]:checked + label::after {
            top: 3px;
        }
    }
</style>
{{$message??''}}
<form class="my-form" method="post" action="/contact">
    {{csrf_field()}}
    <div class="container">
        <h1>Get in touch!</h1>
        <ul>

            <li>
                <div class="grid grid-2">
                    <input type="text" placeholder="Name" name="name" required>
                </div>
            </li>
            <li>
                <div class="grid grid-2">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
            </li>
            <li>
                <textarea placeholder="Message" name="content"></textarea>
            </li>

            <li>
                <div class="grid grid-3">
                    <div class="required-msg">REQUIRED FIELDS</div>
                    <button class="btn-grid" type="submit" >

                        <span class="front">SUBMIT</span>
                    </button>

                </div>
            </li>
        </ul>
    </div>
</form>

@endsection
