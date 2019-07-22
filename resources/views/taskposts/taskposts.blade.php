<ul class="media-list">
    @foreach ($taskposts as $taskpost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($taskpost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $taskpost->user->name, ['id' => $taskpost->user->id]) !!} <span class="text-muted">posted at {{ $taskpost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($taskpost->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $taskpost->user_id)
                        {!! Form::open(['route' => ['taskposts.destroy', $taskpost->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $taskposts->render('pagination::bootstrap-4') }}