<script setup>
import { defineProps, ref, computed, onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { gsap } from "gsap";
import { MotionPathPlugin } from "gsap/MotionPathPlugin";
import { Head } from '@inertiajs/vue3';


// Define props

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});

// Define form
const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const isPasswordVisible = ref(false);
const logoClicked = ref(false);

// Refs for animations
const logoRef = ref(null);
const formRef = ref(null);
const inputRefs = ref([]);
const gesparkingOutsideRef = ref(null);  // Ref para el texto "GESPARKING" fuera del formulario
const logoImgRef = ref(null); // Logo fuera
const letraGesImgRef = ref(null);
const bienvenidosRef = ref(null);     // Ref para el texto "¡¡¡BIENVENIDOS!!!"
const letraARef = ref(null); // Ref para el texto "A"
const gesparkingTextRef = ref(null);  // Ref para el texto "GESPARKING" dentro del formulario

// Toggle password visibility
const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
};

// Password type computed property
const passwordType = computed(() => {
    return isPasswordVisible.value ? 'text' : 'password';
});

// Submit form
const submit = () => {
    form.post(route('login'), {
        onSuccess: () => {
            logoClicked.value = true;
            setTimeout(() => logoClicked.value = false, 1000);
            form.reset('password');
        },
    });
};
// Establecer el título en el ciclo de vida 'created'

// GSAP animation on mounted
onMounted(() => {
    gsap.registerPlugin(MotionPathPlugin);

    // Animación para el texto "¡¡¡BIENVENIDOS!!!"
    gsap.fromTo(bienvenidosRef.value,
        { opacity: 0, y: -50 },
        { opacity: 1, y: 0, duration: 1, ease: "power2.out", delay: 0.1 }
    );

    // Animación para el texto "A"
    gsap.fromTo(letraARef.value,
        { opacity: 0, y: -50 },
        { opacity: 1, y: 0, duration: 1, ease: "power2.out", delay: 0.1 }
    );

    // Mostrar el formulario desde el principio con animación de entrada
    gsap.fromTo(formRef.value,
        { y: 200, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, ease: "power2.out", delay: 0.2 }
    );

    // Animar cada input individualmente
    gsap.fromTo(inputRefs.value,
        { y: 50, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: "power2.out", delay: 1 }
    );

    // Animar el logo dentro del formulario
    gsap.fromTo(logoRef.value, 
        { opacity: 0, scale: 0.8 },
        { opacity: 1, scale: 2, duration: 1, ease: "power2.out", delay: 1 }
    );

    // Delay para desaparecer los textos de "BIENVENIDOS" y "A"
    setTimeout(() => {
        // Desaparecer ambos textos al mismo tiempo
        gsap.to([bienvenidosRef.value, letraARef.value], {
            opacity: 0,
            duration: 1,
            ease: "power2.out",
            onComplete: () => {
                // Mostrar el resto del contenido
                gsap.fromTo(gesparkingOutsideRef.value,
                    { opacity: 0 },
                    { opacity: 1, duration: 1, ease: "power2.out", delay: 0.5 }
                );
                gsap.fromTo(logoImgRef.value,
                    { opacity: 0, y: -100 },
                    { opacity: 1, y: 0, duration: 1.5, ease: "power2.out", delay: 0.6 }
                );
                gsap.fromTo(letraGesImgRef.value,
                    { opacity: 0, y: 100 },
                    { opacity: 1, y: 0, duration: 1.5, ease: "power2.out", delay: 1 }
                );
            }
        });
    }, 3000);  // Tiempo antes de que desaparezcan los textos
});
// Función para animar letra por letra

</script>



<template>
    <Head title="Pacific Parking"  />


    <div class="relative min-h-screen overflow-hidden">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('https://www.blintech.com.co/wp-content/uploads/2018/01/1.parking-1200x600.jpg');">
            <!-- Texto BIENVENIDOS y A -->
            <h2 ref="bienvenidosRef"
                class="absolute top-[30%] left-[38%] transform -translate-x-1/2 text-6xl font-semibold text-white text-center z-20">
                BIENVENIDOS
            </h2>
            <h2 ref="letraARef"
                class="absolute top-[40%] left-[38%] transform -translate-x-1/2 text-6xl font-semibold text-white text-center z-20">
                A
            </h2>

            <!-- Animación de entrada para el texto "GESPARKING" fuera del formulario -->
            <h2 ref="gesparkingOutsideRef"
                class="absolute top-[40%] left-[26%] text-6xl font-semibold text-white text-center z-20"
                style="opacity: 0;">
                GESPARKING
            </h2>

            <!-- Imagenes de logo y texto fuera del formulario -->
            <img ref="logoImgRef" src="../../../app/images/logo-cua-removebg-preview.png" alt="Logo"
                class="absolute top-[38%] left-[4%] w-[300px] md:w-[400px] lg:w-[500px] object-contain z-20"
                style="opacity: 0;" />

            <!-- Animación de entrada para la imagen con texto "letra_gespar" -->
            <img ref="letraGesImgRef" src="../../../app/images/letra_gespar-removebg-preview.png" alt="Texto Gesparking"
                class="absolute top-[44%] left-[20%] w-[300px] md:w-[400px] lg:w-[500px] object-contain z-20"
                style="opacity: 0;" />
        </div>

        <!-- Capa semitransparente -->
        <div class="absolute inset-0 bg-black opacity-80 z-10"></div>

        <!-- Formulario -->
        <div ref="formRef"
            class="absolute right-0 top-0 bottom-0 my-8 mr-8 w-full max-w-sm md:max-w-md lg:w-1/3 bg-white rounded-xl shadow-xl p-8 z-30 h-[calc(100vh-4rem)]">
            <div class="w-full flex flex-col justify-between h-full">
                <!-- Logo y Texto GESPARKING dentro del formulario -->
                <div class="flex flex-col items-center mb-4">
                    <img ref="logoRef" src="../../../app/images/LOGOPACI-removebg-preview.png" alt="Logo"
                        class="w-28 object-contain rounded-full bg-transparent mb-1">
                    <h2 ref="gesparkingTextRef" class="text-lg font-semibold text-black text-center "></h2>
                </div>

                <!-- Formulario -->
                <h2 class="text-1xl font-semibold text-black h-8">User</h2>
                <form @submit.prevent="submit" class="w-full flex flex-col items-center space-y-4 mb-64">
                    <div ref="el => inputRefs.value[0] = el" class="w-full">
                        <input type="email" v-model="form.email"
                            class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                            placeholder="Email address" required>
                    </div>
                    <div ref="el => inputRefs.value[1] = el" class="w-full relative">
                        <h2 class="text-1xl font-semibold text-black">Contraseña</h2>
                        <input :type="passwordType" v-model="form.password"
                            class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2 pr-10"
                            placeholder="Password" required>
                        <button type="button" @click="togglePasswordVisibility"
                            class="absolute right-3 top-11 transform -translate-y-1/2 text-gray-600">
                            <span v-if="isPasswordVisible">🙉</span>
                            <span v-else>🙈</span>
                        </button>
                    </div>

                    <button ref="el => inputRefs.value[2] = el"
                        class="w-full bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        Iniciar Sesión
                    </button>
                    <a ref="el => inputRefs.value[3] = el" href="#"
                        class="text-blue-500 hover:underline flex justify-center mt-4">
                        Olvidaste Tu Contraseña
                    </a>
                    <h2 class="justify-center ">Acepto los  <a class="text-blue-500"> términos y condiciones </a> de gesparking.</h2>
                    <h2 class="justify-center">Todos los derechos reservados <a class="text-blue-500" href="https://droi.com.co/"target="_blank" rel="noopener noreferrer"> DROI</a> ©</h2>
                </form>

                <div>
                    <span v-if="canResetPassword">
                        <a href="#" class="text-sm text-green-500 hover:text-green-700">¿Olvidaste tu contraseña?</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LoginForm",

    data() {
        return {
            isPasswordVisible: false,
            fullText: "GESPARKING",
            animatedText: "",
            index: 0,
        };
    },
    computed: {
        passwordType() {
            return this.isPasswordVisible ? 'text' : 'password';
        }
    },
    methods: {
        togglePasswordVisibility() {
            this.isPasswordVisible = !this.isPasswordVisible;
        }
    },

    mounted() {
        this.writeText();
    },
    methods: {
        writeText() {
            if (this.index < this.fullText.length) {
                this.animatedText += this.fullText.charAt(this.index);
                this.index++;
                setTimeout(this.writeText, 200); // Ajusta la velocidad aquí
            }
        },
    },
};

gsap.registerPlugin(MotionPathPlugin);



</script>
