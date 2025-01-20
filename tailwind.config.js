import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "",

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        colors: {
            charcoal: '#333333',
            dimGray: '#696969',
            grayishGreen: '#A9A9A9',
            SkyBlue: '#87CEEB',
            FireBrick: '#B22222',
            LightBlue: '#F4F6F8'

          },
        extend: {}
    },
    plugins: [
        require("flowbite/plugin")({
            datatables: true,
        }),
    ],
};
