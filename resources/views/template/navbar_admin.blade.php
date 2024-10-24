<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded-pill shadow-sm" style="width: fit-content; padding: 0.5rem 1.5rem; margin-left: 650px;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <img src="{{asset('/img/Shova-Nexa-Bg-Black.png')}}" alt="" class="img-profil d-inline-block align-text-top rounded-circle img-profile img-thumbnail">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2" href="{{route('dashboard_admin')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- CSS-->
<style>
    .img-profile {
    width: 50px; 
    height: 50px;
    object-fit: cover; 
    border-radius: 50%; 
}

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1030;
        border-radius: 50px;
    }

    .navbar-nav {
        margin: 0 auto; 
    }

    .nav-link {
        color: white !important;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        border-radius: 20px;
    }

    .nav-link:hover {
        background-color: white;
        color: black !important;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }

    .navbar-brand {
        color: white !important;
    }

    .navbar-brand:hover {
        color: #ddd !important;
    }

    .navbar-toggler {
        background-color: white;
    }

    body {
        padding-top: 30px;
    }
</style>
