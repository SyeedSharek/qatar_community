<template>
    <div
        class="min-h-screen bg-[#1abc9c] flex flex-col items-center justify-center sm:grid sm:grid-cols-2 sm:gap-[80px] lg:grid-cols-2"
    >
        <h1
            class="text-2xl font-bold text-center text-white py-4 sm:fixed sm:top-0 sm:w-full sm:py-6 sm:mb-0 sm:shadow-md lg:fixed lg:top-0 lg:mb-0 lg:w-full"
        >
            Sign In Your Account
        </h1>
        <div
            class="w-[250px] h-[200px] mb-4 sm:ml-[60px] sm:grid-col-1 sm:w-[300px] sm:h-[250px] lg:w-[450px] lg:m-[40px]"
        >
            <img
                src="/public/images/login/login.svg"
                alt="Login Illustration"
            />
        </div>

        <!-- Form Div -->
        <div
            class="bg-[#95a5a6] flex flex-col w-[250px] border border-black rounded-md p-6 sm:col-span-1 lg:ml-[100px] lg:h-[350px]"
        >
            <form
                @submit.prevent="loginData"
                action=""
                class="flex flex-col lg:mt-8"
            >
                <div class="flex flex-col mb-4">
                    <label class="font-semibold mb-1 p-1" for="email"
                        >Email</label
                    >
                    <input
                        class="rounded-sm p-1"
                        type="email"
                        id="email"
                        placeholder="Enter Your Email"
                        v-model="formData.email"
                    />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-semibold mb-1 p-1" for="password"
                        >Password</label
                    >
                    <input
                        class="rounded-sm p-1"
                        type="password"
                        id="password"
                        placeholder="Enter Your Password"
                        v-model="formData.password"
                    />
                </div>
                <button
                    type="submit"
                    class="text-white font-semibold py-2 px-4 bg-[#27ae60] rounded-md hover:bg-[#cc093a]"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            formData: {
                email: "",
                password: "",
            },
            formError: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
      loginData() {
            axios
                .post("/api/auth/login", this.formData)
                .then((response) => {
                    console.log(response);
                    const token = response.data.access_token;
                    if(token){
                        localStorage.setItem("authToken",token);
                        this.$router.push("Dashboard");
                    }

                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
    },
};
</script>

<style></style>
