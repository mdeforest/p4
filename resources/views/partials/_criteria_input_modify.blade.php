@if(count($criteria) > 0)
    <div class='col-sm-3'>
        <div class='form-check additional-col'>
            <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? 'checked' : '' }}>
            <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
        </div>
        <div class='form-group checkbox-value'>
            <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
            <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ $search->criteria->where('name', $criteria->last()->name)->first() ? $search->criteria->where('name', $criteria->last()->name)->first()->pivot->value : '' }}' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? '' : 'disabled' }}>
            @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
        </div>
    </div>
    @php($criteria->pop())
@endif

@if(count($criteria) > 0)
    <div class='col-sm-3'>
        <div class='form-check additional-col'>
            <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? 'checked' : '' }}>
            <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
        </div>
        <div class='form-group checkbox-value'>
            <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
            <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ $search->criteria->where('name', $criteria->last()->name)->first() ? $search->criteria->where('name', $criteria->last()->name)->first()->pivot->value : '' }}' {{  $search->criteria->where('name', $criteria->last()->name)->first() ? '' : 'disabled' }}>
            @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
        </div>
    </div>
    @php($criteria->pop())
@endif