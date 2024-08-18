<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{ asset('images/logo.svg') }}" class="mr-2"
                alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="{{ asset('images/logo-mini.svg') }}"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="images/faces/face28.jpg" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <button class="dropdown-item" id="logout-btn">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </button>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#logout-btn').click(function() {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('auth.logout') }}",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.href =
                                "{{ route('auth.login') }}";
                        }, 1500);
                    },
                    error: function(err) {
                        Swal.fire({
                            title: 'Error!',
                            text: err.responseJSON.message,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            });
        });
    </script>
@endpush
