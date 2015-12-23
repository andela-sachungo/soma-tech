<div id = "edit-category" class="modal fade" tabindex="-1"
    role="dialog" aria-hidden="true" aria-labelledby="edit-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($category,['method' => 'PATCH', 'route' => ['category.update', $category->id]]) !!}
                    @include('partials.error')

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->