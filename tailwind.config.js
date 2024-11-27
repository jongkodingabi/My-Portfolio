import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/home.blade.php", // lokasi file blade halaman home
    ],

    darkMode: "class",

    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                primary: "#42b883",
                secondary: "#64748b",
                dark: "#020617",
                youngGreen: "#34d399",
            },
            screens: {
                "2xl": "1320px",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
