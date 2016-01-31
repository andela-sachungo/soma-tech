<div id = "add-category" class="modal fade" tabindex="-1"
    role="dialog" aria-hidden="true" aria-labelledby="add-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('category.store') }}">
                    {!! csrf_field() !!}
                    @include('partials.error')

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="control-label">Title</label>
                        <input class="form-control" name = "title" id="title" type="text" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    <input name="email" value="{{ auth()->user()->email }}" hidden>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->