<div id="sidebar" class="d-flex flex-column bg-primary p-3 text-white" style="width: 250px; position: fixed; top: 0; left: 0; height: 100vh;">
    <br>
    <h2 class="text-center mb-4">Admin</h2>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">Pembelian</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{route('pakaian')}}" class="nav-link text-white">Pakaian</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{route('kategoriPakaian')}}" class="nav-link text-white">Kategori</a>
        </li>
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link text-white">Settings</a>
        </li>
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link text-white">Logout</a>
        </li>
    </ul>
</div>

<!-- CSS Inline -->
<style>
    #sidebar {
        transition: left 0.3s ease; 
    }
</style>
