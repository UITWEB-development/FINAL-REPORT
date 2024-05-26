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
        "./resources/**/*.vue",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                "roboto-slab": ["Roboto Slab", "serif"],
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [aspectRatio, forms, typography],
};
