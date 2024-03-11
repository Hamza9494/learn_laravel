@include('layout.layout')
<h4> Edit yours ideas </h4>
<div class="row">
    <form action="{{route('ideas.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="idea" class="form-control" id="idea" rows="3"> {{$idea->content}} </textarea>
            @error('idea')
            <span class="d-block fs-6 text-danger my-2"> {{$message}} </span>

            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>

</div>