@if(Session::has('delete'))
<p class="alert alert-danger" style="width: 20%; left:53%;">{{ Session::get('delete')}}</p>
@endif
@if(Session::has('delete1'))
<p class="alert alert-success" style="width: 20%; left:75%;">{{ Session::get('delete1')}}</p>
@endif
@if(Session::has('add'))
<p class="alert alert-success" style="width: 20%; left:53%;">{{ Session::get('add')}}</p>
@endif
@if(Session::has('cat'))
<p class="alert alert-success" style="width: 20%; left:53%;">{{ Session::get('cat')}}</p>
@endif