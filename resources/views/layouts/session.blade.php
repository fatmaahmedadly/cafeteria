@if(Session::has('delete'))
<p class="alert alert-danger">{{ Session::get('delete')}}</p>
@endif
@if(Session::has('delete1'))
<p class="alert alert-success">{{ Session::get('delete1')}}</p>
@endif
@if(Session::has('add'))
<p class="alert alert-success">{{ Session::get('add')}}</p>
@endif
@if(Session::has('cat'))
<p class="alert alert-success">{{ Session::get('cat')}}</p>
@endif