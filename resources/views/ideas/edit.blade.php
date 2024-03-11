@include('layout.layout')
<h4> Edit yours ideas </h4>
<div class="row">
    <form action="{{route('ideas.update' , $idea->id)}}" method="post">

        @csrf
        <div class="mb-3">
            <textarea name="modified" class="form-control" id="modified" rows="3"> {{$idea->content}} </textarea>
        </div>
        <div class="">
            <button class="btn btn-dark"> update </button>
        </div>
    </form>

</div>