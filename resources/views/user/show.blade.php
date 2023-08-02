<x-layout>
    <a onclick="goBack()" class="btn btn-primary ms-4" >Back</a>

    <div class="form col-md-6 offset-3 mb-5  ">

        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name"  value="{{ $user->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{ $user->email }}" disabled>
            </div>

            <div class="mb-3">
                <label  class="control-label mb-1">Joined Date</label>
                <input name="role" type="text" class="form-control" value="{{ $user->created_at->format('h:i:s A (d-m-y)')}}" disabled>
            </div>

            <div class="mb-3">
                <label  class="control-label mb-1">Access</label>
                @if ($user->status == 2)
                    <input name="role" type="text" class="form-control" value="Approved" disabled>
                @elseif($user->status == 1)
                    <input name="role" type="text" class="form-control" value="Rejected" disabled>
                @else
                    <input type="text" name="role" class="form-control" value="Pending" disabled>
                @endif
            </div>

            <div class="mb-1 text-center">
                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary col-4">Edit</a>
            </div>
        </form>
    </div>
    <div class="p-5">
        <h4>
            Recent Activity
        </h4>
        <hr>
        <table>
            @if (count($logs) != 0)
            <tbody>
                @foreach ($logs as $index => $log)
                    @if ($log->user)
                    <tr>
                        <td>
                            <span>
                                <b class="me-2">{{ $log->user->name }}</b> <span class="status event">{{ $log->event }}</span>   <b class="mx-2 text-secondary">{{ $log->data['name'] }}({{ $log->data['email'] }})</b>  {{ $log->created_at->diffForHumans() }}.
                            </span>
                        </td>
                    </tr>
                    @else
                    <tr>

                        <td>
                            <span>
                                <b>Unknown User</b> <span class="status event">{{ $log->event }}</span> <b class="mx-2 text-secondary">{{ $log->data['name'] }}({{ $log->data['email'] }})</b>  {{ $log->created_at->diffForHumans() }}.
                            </span>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
            @else
                <h1 class="text-center text-secondary mt-5">No Activities yet!</h1>
            @endif
        </table>
        <hr>
    </div>
</x-layout>
