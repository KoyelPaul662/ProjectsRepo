<template>
    <div class="container mt-5 pt-5">
        <div class="col-10 col-sm-8 col-md-4 m-auto">
            <div class="card border-0 shadow py-4">
                <div class="card-body mx-3">
                    <h4 class="text-uppercase text-dark text-center fw-bold my-2 fs-3">LogIn</h4>   
                    <p class="text-center text-danger" v-if="$page.props.flash.errormsg">
                        {{ $page.props.flash.errormsg }}
                    </p>                                
                    <form @click.prevent="submit">
                        <input type="email" class="form-control my-2 py-2 rounded-2 mt-3" name="email" v-model="form.email" required placeholder="Email">
                        <p class="text-left text-danger" v-if="errors.email">{{ errors.email }}</p>
                        <input type="password" class="form-control my-2 py-2 rounded-2 mt-3" name="password" v-model="form.password"  required placeholder="Password">
                        <p class="text-left text-danger" v-if="errors.password">{{ errors.password }}</p>
                        <button type="submit" class="bg-indigo-600 text-white w-100 px-4 py-2 mt-3">Log In</button>
                    </form>
                    <p class="text-dark fw-bold mt-1 text-muted" @click.prevent="registration()" >New User?? <a href="#" class="text-decoration-none">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>   
</template>

<script setup>
    import { useForm} from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';
    defineProps({
        errors:Object,
    })
    const form = useForm({
                email:null, 
                password:null, 
            });

    function submit(){
        router.post('/logins',form);
    }     

    function registration(){
        router.get('/sign-up');
    }
</script>


