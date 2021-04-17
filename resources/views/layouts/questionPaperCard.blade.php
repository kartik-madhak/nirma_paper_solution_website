<div class="card text-light cool-card">
    <a href="/question-paper/{{$paper->id}}" class="stretched-link"></a>

    <div class="card-header text-truncate" style="font-size: small">
        {{ $paper->name }}
    </div>

    <div class="card-body text-left">
        <ul class="text-truncate ml-n4">
            <li>{{ $paper->paper_name }}</li>
            <li>{{ $paper->code }}</li>
            <li>{{ $paper->year }}</li>
        </ul>
    </div>

</div>


