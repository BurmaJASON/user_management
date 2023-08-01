<x-auth-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5">
                <h3 class="text-primary text-center my-2">Login Form</h3>
                <form method="POST" action="" class="recentUsers">
                    @csrf
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

                    <div class="d-flex justify-content-center mb-1">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <a class="underline text-secondary" href="{{ route('register') }}">
                            You don't have an account?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
