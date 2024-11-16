<script setup>
  import { Link } from '@inertiajs/vue3';

  const props= defineProps({
    nameheader:String,
 })
//  let name=props.auth.user.name;

//alert(props.nameheader);
</script>

<template>
    <nav class="px-3 py-2 bg-white rounded shadow">
    <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
    <h5 class="fw-bold mb-0 me-auto">
       <!-- {{ auth.user.name }} -->
       Welcome Back {{ nameheader }}
    </h5>

    <div class="dropdown">
        <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="me-2 d-none d-sm-block">{{ nameheader }}</span>
            <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><Link class="dropdown-item" href="/logout">Logout</Link></li>                       
        </ul>
    </div>
</nav>
</template>


