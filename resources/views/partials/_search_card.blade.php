<a class='card-link' href='/{{ $route }}/{{ $searches->last()->name }}'>
    <div class='card'>
        <div class='card-body'>
            <h5 class='card-title text-center'>{{ $searches->last()->name }}</h5>
        </div>
        <ul class='list-group list-group-flush text-center'>
            <li class='list-group-item'>{{ $searches->last()->platform->name }}</li>
            <li class='list-group-item'>{{ $searches->last()->frequency_value }} {{ $searches->last()->frequency_unit }}</li>
            <li class='list-group-item'>
                @foreach($searches->last()->criteria as $criterion)
                    {{ $criterion->name }}={{ $criterion->pivot->value }}
                @endforeach
            </li>
        </ul>
    </div>
</a>

@php($searches->pop())