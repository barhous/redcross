{!! Form::model($uh_kit, ['url' => route('uh_kit-store') ]) !!} 
    @include('uhkit.form') 
    {!! Form::submit(‘Save uhkit’,['class'=>'form-control btn btn-primary']) !!} 
{!! Form::close() !!} 