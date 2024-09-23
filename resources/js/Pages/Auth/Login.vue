<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const isMenuOpen = ref(false);

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>

    <Head title="GESPARKING" />

    <div class="bg-cover bg-center bg-no-repeat bg-fixed min-h-screen"
        style="background-image: url('https://img.freepik.com/vector-gratis/fondo-monocromatico-blanco-estilo-papel_52683-66443.jpg');">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                                <span
                                    class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="navbar-user" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-user">
                        <ul
                            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>



        </div>

        <main class="mt-6 text-center">
            <div class="font-sans text-lg text-black">
                <p class="border-2 border-black p-5 rounded-lg">
                    Gesparking es un moderno parqueadero diseñado para ofrecer comodidad y seguridad a los usuarios.
                    Con amplias instalaciones y tecnología avanzada, proporciona espacios bien organizados y sistemas de
                    pago eficientes. Su infraestructura está equipada con cámaras de seguridad y personal capacitado
                    para garantizar una experiencia tranquila. Es ideal tanto para estancias cortas como largas, y
                    su ubicación estratégica facilita el acceso a puntos clave de la ciudad.
                </p>
            </div>
            <section class="flex flex-wrap justify-center gap-4 mt-6">
                <img class="w-1/2 md:w-1/3 lg:w-1/4 border-2 border-black rounded-lg shadow-md"
                    src="https://www.ambitojuridico.com/sites/default/files/styles/imagen_800x400/public/2022-02/parqueadero-da%C3%B1os-servicio%28Freepik%29.jpg.webp?itok=sOqZjmKZ"
                    alt="Galería 1">
                <img class="w-1/2 md:w-1/3 lg:w-1/4 border-2 border-black rounded-lg shadow-md"
                    src="https://jlvhomedesign.com/wp-content/uploads/2018/10/parqueaderos-1200x628.png"
                    alt="Galería 2">
            </section>
        </main>

        <footer class="py-16 text-center text-sm text-black">
            <p class="mb-4 text-lg font-bold">Contáctanos</p>
            <div class="flex flex-col gap-2 justify-center">
                <div class="flex gap-2 justify-center ">
                    <button
                        class="p-2 bg-gray-200 rounded-lg transition-transform duration-200 transform hover:bg-pink-600 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0,0,256,256" width="30" height="30"
                            class="fill-white">
                            <g fill-rule="nonzero" stroke="none" font-family="none" font-weight="none" font-size="none">
                                <g transform="scale(8,8)">
                                    <path
                                        d="M11.46875,5c-3.55078,0-6.46875,2.91406-6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078-2.91406,-6.46875-6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266-1.99609,4.46875-4.46875,4.46875h-9.0625c-2.47266,0-4.46875,-1.99609-4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0-0.90625,0.40234-0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391-0.40234,-0.90625-0.90625,-0.90625zM16,10c-3.30078,0-6,2.69922-6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078-2.69922,-6-6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266-1.77734,4-4,4c-2.22266,0-4,-1.77734-4,-4c0,-2.22266 1.77734,-4 4,-4z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </button>

                    <button
                        class="p-2 bg-gray-200 rounded-lg transition-transform duration-200 transform hover:bg-blue-400 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30"
                            class="fill-white">
                            <path
                                d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                            </path>
                        </svg>
                    </button>
                </div>

                <div class="flex gap-2 justify-center">
                    <button
                        class="p-2 bg-gray-200 rounded-lg transition-transform duration-200 transform hover:bg-gray-800 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30"
                            class="fill-white">
                            <path
                                d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962C14.6,19.334,12.693,17.346,12.693,14.647c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z">
                            </path>
                        </svg>
                    </button>

                    <button
                        class="p-2 bg-gray-200  rounded-lg transition-transform duration-200 transform hover:bg-blue-600 hover:scale-110">
                        <svg height="30" width="30" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"
                            class="fill-white">
                            <path
                                d="M40 12H35C33.7 12 32.5 12.7 32 13.8L24 28L16 13.8C15.5 12.7 14.3 12 13 12H8C6.9 12 6 12.9 6 14V36C6 37.1 6.9 38 8 38H13C14.1 38 15 37.1 15 36V26H17.2L23 36C23.5 37.1 24.6 38 26 38C27.4 38 28.5 37.2 29 36L34.8 26H37V36C37 37.1 37.9 38 39 38H44C45.1 38 46 37.1 46 36V14C46 12.9 45.1 12 44 12H40Z" />
                        </svg>
                    </button>
                </div>
            </div>
            
        </footer>
    </div>
</template>



<script>
export default {
    name: "SocialIcons",
};
</script>