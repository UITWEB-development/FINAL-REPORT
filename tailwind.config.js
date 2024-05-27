import plugin from "tailwindcss/plugin";
import defaultTheme from "tailwindcss/defaultTheme";
import colors from "tailwindcss/colors";

import aspectRatio from "@tailwindcss/aspect-ratio";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/wire-elements/modal/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./vendor/masmerise/livewire-toaster/resources/views/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                "roboto-slab": ["Roboto Slab", "serif"],
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                autofillBg: '#FADAA3', // Custom background color for autofill
            },
        },
    },
<<<<<<< HEAD
    plugins: [aspectRatio, forms, typography],
    safelist: [
        {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ["sm", "md", "lg", "xl", "2xl"],
        },
=======
    variants: {
        extend: {
            backgroundColor: ['autofill'],
            textColor: ['autofill'],
            boxShadow: ['autofill'],
        },
    },
    plugins: [
        aspectRatio,
        forms,
        typography,
        plugin(function({ addVariant, e }) {
            addVariant('autofill', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(`autofill${separator}${className}`)}:-webkit-autofill`
                });
            });
            addVariant('autofill-hover', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(`autofill-hover${separator}${className}`)}:-webkit-autofill:hover`
                });
            });
            addVariant('autofill-focus', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(`autofill-focus${separator}${className}`)}:-webkit-autofill:focus`
                });
            });
        }),
>>>>>>> 9e9b29f (Style_remove input background color for Chrome autocomplete)
    ],
};
