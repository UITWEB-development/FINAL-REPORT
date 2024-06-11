import plugin from "tailwindcss/plugin";
import defaultTheme from "tailwindcss/defaultTheme";

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
                autofillBg: "#FADAA3",
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                    950: "#172554",
                },
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ["autofill"],
            textColor: ["autofill"],
            boxShadow: ["autofill"],
        },
    },
    plugins: [
        aspectRatio,
        forms,
        typography,
        plugin(function ({ addVariant, e }) {
            addVariant("autofill", ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(
                        `autofill${separator}${className}`
                    )}:-webkit-autofill`;
                });
            });
            addVariant("autofill-hover", ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(
                        `autofill-hover${separator}${className}`
                    )}:-webkit-autofill:hover`;
                });
            });
            addVariant("autofill-focus", ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(
                        `autofill-focus${separator}${className}`
                    )}:-webkit-autofill:focus`;
                });
            });
        }),
    ],
    safelist: [
        "shadow-md",
        "rounded-lg",
        "bg-blue-200",
        "shadow-blue-300",
        "text-blue-500",
        "rounded-full",
        "font-bold",
        "text-sm",
        "bg-red-200",
        "shadow-red-300",
        "text-red-500",
        "bg-yellow-200",
        "shadow-yellow-400",
        "text-yellow-600",
        "bg-green-200",
        "shadow-green-300",
        "text-green-600",
        {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ["sm", "md", "lg", "xl", "2xl"],
        },
    ],
};
