<x-auth-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2">Register Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{ old('name') }}" required>
                            <x-error name="name"></x-error>

                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1"
                          name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required>
                          <x-error name="email"></x-error>

                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control"
                          name="password" id="exampleInputPassword1" required>
                          <x-error name="password"></x-error>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                            <x-error name="password_confirmation"></x-error>
                          </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="d-flex justify-content-center ">
                            <a class="underline text-secondary" href="{{ route('login') }}">
                                Already registered?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
