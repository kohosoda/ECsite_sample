@if ($errors->any())
<div class="cart-text text-left alert alert-danger">
  <ul class="mb-0">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif