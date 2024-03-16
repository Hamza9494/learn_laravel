@include('layout.layout')
<h4> Edit yours idea </h4>
<div class="row">
    <form action="{{route('ideas.update' , $idea->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"> {{$idea->content}} </textarea>
        </div>
        <div class="">
            <button class="btn btn-dark"> update </button>
        </div>
    </form>

</div>