{!! Form::model($uh_kit,['url' => route('customer-update',['id' => $uh_kit->id]) ]) !!} 
    {{ method_field('PATCH') }} 
    @include('uhkit.form') 
    {!! Form::submit(‘Update uhkit’,['class'=>'form-control btn btn-primary']) !!} 
{!! Form::close() !!} 