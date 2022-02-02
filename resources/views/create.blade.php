@extends('layout')


@section('main-content')
<div style="padding:40px;">
  <h4 class="text-center mb-3 text-success">Create Task</h4>
<form class="needs-validation" novalidate action="{{route('task.store') }}" method="POST">
  @csrf
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom01"><h6>Title:</h6></label>
      <input type="text" class="form-control" id="validationCustom01" name="title" placeholder="Todo Title"  required>
      <div class="invalid-feedback">
        Please provide a valid title.
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationCustom02"><h6>Description:</h6></label>
      <textarea class="form-control" id="validationCustom02" name="description" placeholder="Todo Description" required></textarea>
      <div class="invalid-feedback">
        Please provide a valid description.
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationCustom02"><h6>Status:</h6></label>
      <select class="form-control" name="status" placeholder="Todo Description">
      @foreach($statuses as $status)
    <option value="{{$status['value'] }}" >{{$status['label'] }}</option>
      @endforeach
      </select>
      
    </div>
  </div>
  <a href="{{route('index')}}" class="btn btn-danger" type="submit"><i class="fa fa-arrow-left"></i> Cancel</a>
  <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Save</button>

</form>

</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection