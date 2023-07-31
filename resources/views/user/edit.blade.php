<x-layout>
    <a onclick="goBack()" class="btn btn-primary ms-4" >Back</a>

    <div class="form col-md-6 offset-3 mb-5  ">

        <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            <legend class="text-center h4">Profile Form</legend>
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name" value="{{ old('name',$user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ old('email',$user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="control-label mb-1">Access</label>
                <select name="status"  class="form-control @error('status') is-invalid @enderror" >
                    {{-- <option value="">Role</option> --}}
                    <option value="2" @if ($user->status==2)
                                                selected
                                            @endif>Approve</option>
                    <option value="1" @if ($user->status==1)
                                                selected
                                            @endif>Reject</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="currentPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control @error('currentPassword') is-invalid @enderror" id="currentPassword" required placeholder="Enter old password.." name="currentPassword" >
                @error('currentPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}


            <div class="mb-3">
                <label for="password" class="form-label">Set New Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  placeholder="Enter new password.." name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Enter new password.." name="password_confirmation">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-1 text-center">
                <button class="btn btn-dark col-4" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-layout>
