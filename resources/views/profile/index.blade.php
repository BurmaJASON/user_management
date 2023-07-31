<x-layout>
    <a onclick="goBack()" class="btn btn-primary ms-4" >Back</a>

    <div class="form col-md-6 offset-3 mb-5  ">

        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @if(request()->routeIs('profile.index'))
                <legend class="text-center h4">Your Profile</legend>
            @else
                <legend class="text-center h4">Profile Form</legend>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                @if(request()->routeIs('profile.index'))
                    <input type="text" class="form-control" id="name"  value="{{ Auth::user()->name }}" disabled>
                @else
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name" value="{{ old('name',Auth::user()->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                @if(request()->routeIs('profile.index'))
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{ Auth::user()->email }}" disabled>
                @else
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ old('email',Auth::user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>

            @if (request()->routeIs('profile.index'))
                <div class="mb-3">
                    <label  class="control-label mb-1">Joined</label>
                    <input name="role" type="text" class="form-control" value="{{ Auth::user()->created_at->diffForHumans()}}" disabled>
                </div>
            @endif

            <div class="mb-3">
                <label  class="control-label mb-1">Access</label>
                <input name="role" type="text" class="form-control" value="{{ Auth::user()->status == 2  ? 'Approved' : 'Rejected'   }}" disabled>
            </div>

            <div class="mb-1 text-center">
                @if(request()->routeIs('profile.index'))
                    <a href="{{ route('profile.edit',Auth::user()->id) }}" class="btn btn-primary col-4">Edit</a>
                @else
                    <button class="btn btn-dark col-4" type="submit">
                        Update
                    </button>
                @endif
            </div>
        </form>
    </div>
</x-layout>
