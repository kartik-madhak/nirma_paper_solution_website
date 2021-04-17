<div class="row border-bottom border-top text-light"
     style="background-color: #2D2D2D; border-color: #404345!important;" id="{{$answer->id}}">

    <div class="col-1 mt-4">
        <div style="cursor: pointer; font-size: 13px;">
                                    <span class="material-icons clickEvent {{$answer->likedByUser ? 'text-primary':''}}"
                                          id="{{ $answer->id }}"
                                          style="font-size: 17px">
                                        thumb_up
                                    </span>
            <span id="{{'likeNumber' . $answer->id}}" class="ml-1">
                                        {{ $answer->likes }}
                                    </span>
        </div>
    </div>

    <div class="p-4 col-11">
        <div class="answer-content">
            {!! $answer->content !!}
        </div>
        <div class="footer mt-5" style="font-size: 13px">
            <div class="float-left">

                @if($user->name==$answer->user->name || $user->email==env('WEBSITE_OWNER_EMAIL'))
                    <form action="/answer/{{$answer->id}}/edit" class="d-inline" method="get">
                        @csrf
                        <button class="btn btn-link text-white-50"
                                style="text-decoration: none">Edit
                        </button>
                    </form>
                    <form action="/answer/{{$answer->id}}/delete" method="post"
                          class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-link text-white-50"
                                style="text-decoration: none">Delete
                        </button>
                    </form>

                @endif
                <button class="btn btn-link text-white-50"
                        style="text-decoration: none"
                        onclick="prompt('Press Ctrl + C, then Enter to copy to clipboard',
                            '{{url()->current() . '#' . $answer->id}}')">Share
                </button>

            </div>

            <div class="float-right">
                {{ $answer->user->name . ' at ' . $answer->created_at }}
            </div>
        </div>

    </div>
</div>
