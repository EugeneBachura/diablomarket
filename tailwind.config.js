import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#3b3d3b",
                secondary: "#212323",
                tertiary: "#f3f4f6",
		    red: "#a50905",
                button: "#a50905",
                "hover-button": "#dd0707",
                "button-text": "#f3f4f6",
		    button2: "#212323",
                "hover-button2": "#3b4040",
                "button-text2": "#f3f4f6",
            },
            fontSize: {
                xs: ".75rem", // 12px
                sm: ".875rem", // 14px
                tiny: ".875rem", // 14px
                base: "1rem", // 16px
                lg: "1.125rem", // 18px
                xl: "1.25rem", // 20px
                "2xl": "1.5rem", // 24px
                "3xl": "1.875rem", // 30px
                "4xl": "2.25rem", // 36px
                "5xl": "3rem", // 48px
                "6xl": "4rem", // 64px
                "7xl": "5rem", // 80px
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                "diablo-light": ["Diablo Light", "sans-serif"],
                "diablo-heavy": ["Diablo Heavy", "sans-serif"],
                alegreya: ["Alegreya Sans", "sans-serif"],
                "old-fenris": ["Old Fenris", "sans-serif"],
            },
            fontWeight: {
                300: 300,
                400: 400,
                500: 500,
                700: 700,
            },
            minHeight: {
                36: "36px",
                93: "93px",
            },
            height: {
                93: "93px",
            },
            backgroundImage: {
                "black-radial-gradient":
                    "radial-gradient(circle, #3b3d3b, #000000 100%)",
            },
            backgroundColor: {
                "transparency-10": "rgb(214 214 214 / 12%)",
            },
            textShadow: {
                'medium': '3px 5px 5px rgba(0, 0, 0, 0.5)',
            },
            backdropBlur: {
                xs: "2px",
            },
        },
    },

    plugins: [forms],
};
