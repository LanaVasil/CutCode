<div class="form-check mb-3">

  <input class="form-check-input" type="checkbox" value="{{$checkValue}}" @if($checkValue) checked @endif
  id="{{ $id }}" />

  <label class="form-check-label pt-1" for="{{ $id }}" {{ $asterisk }}>
    {{ $label }} jhjkh {{$checkValue}}
  </label>
</div>
