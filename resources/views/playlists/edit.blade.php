@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Playlist {{ $playlist->name }}
                    </div>

                    <div class="panel-body">
                        @if($errors && $errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="post" action="{{ route('playlists.update', ['playlist' => $playlist]) }}">
                            @foreach ($userChannels as $userChannel)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="channels[]" value="{{ $userChannel->id }}"
                                               @if(in_array($userChannel->id, old('channels', $playlist->channels->pluck('id')->toArray()))) checked="checked" @endif
                                        >
                                        {{ $userChannel->channel->name }}
                                    </label>
                                </div>
                            @endforeach

                            <button class="btn btn-success">Edit Playlist</button>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
