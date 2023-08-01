<x-layout>
    <a onclick="goBack()" class="btn btn-primary ms-4" >Back</a>

    <div class="form col-md-6 offset-3 mb-5  ">

        <form action="{{ route('user.store') }}" method="POST" >
            <legend class="text-center h4">Create User Form</legend>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Mr John Doe" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="control-label mb-1">Access for Admin's actions</label>
                <select name="status"  class="form-control @error('status') is-invalid @enderror" required >
                    <option value="0">Pending</option>
                    <option value="2">Approve</option>
                    <option value="1">Reject</option>
                </select>
                <span class="text-secondary text-underline small">*Default goes to Pending</span>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  placeholder="Enter your password.." required name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required placeholder="Enter confirm password.." name="password_confirmation">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-1 text-center">
                <button class="btn btn-primary col-4" type="submit">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-layout>
