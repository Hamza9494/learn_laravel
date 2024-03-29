<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">

                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed= {{$idea->user->name}}"
                    alt=" {{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show' , $idea->user->id)}} ">
                            {{$idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <form method="POST" action={{route("ideas.destroy" , $idea->id)}} ">
                @csrf
                @method(" delete") <button class="btn btn-danger btn-sm">x</button>
                <a href="{{route('ideas.show' , $idea->id)}}">view</a>
                <a href="{{route('ideas.edit' , $idea->id)}}">edit</a>

            </form>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$idea->likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    3-5-2023 </span>
            </div>
        </div>
        @include('shared.comment-box')
    </div>
</div>