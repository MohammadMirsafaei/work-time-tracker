@extends('dashboard.layout.layout')

@section('title')
    home
@endsection

@section('content')
<div class="row mt-3">
    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add time</button>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add time</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <label for="">date</label>
                <input class="form-control" type="date" name="date" placeholder="date" id="">
            </div>
            <div class="form-group">
                <label for="">start</label>
                <input class="form-control" type="time" name="start" placeholder="start" id="">
            </div>
            <div class="form-group">
                <label for="">end</label>
                <input class="form-control" type="time" name="end" placeholder="end" id="">
            </div>
            <div class="form-group">
                <label for="">company</label>
                <select class="form-control" name="company">
                    <option value="0">select</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">project</label>
                <select class="form-control" name="project">
                </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script>
        $('select[name="company"]').change(function () {
            let selected = $('select[name="company"] option:selected');
            let project = $('select[name="project"]');
            project.empty();
            $.ajax({
                url: '/dashboard/company/' + selected.val(),
            })
            .done(function (data) {

                data.forEach(el => {
                    project.append(`<option value="${el.id}">${el.name}</option>`);
                });
            });
        });

        $('#saveBtn').click(function(){
            $.ajax({
                url: '/dashboard/timeSheet/',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "date": $('input[name="date"]').val(),
                    "start": $('input[name="start"]').val(),
                    "end": $('input[name="end"]').val(),
                    "project": $('select[name="project"] option:selected').val(),
                }
            })
            .done(function(data){
                alert(data.message);
            });
        });
    </script>
@endsection
