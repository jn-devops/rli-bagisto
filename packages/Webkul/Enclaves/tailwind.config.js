/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/Resources/**/*.blade.php", "./src/Resources/**/*.js"],

    theme: {
        container: {
            center: true,

            screens: {
                "2xl": "1752px",
            },

            padding: {
                DEFAULT: "90px",
            },
        },

        screens: {
            sm: '525px',
            md: '768px',
            lg: '1024px',
            xl: '1200px',
            '1920': '1920px',
            '2xl': '1572px',
            '1280': '1280px',
            '1180': '1180px',
            '1100': '1100px',
            '1024': '1024px',
            '991': '991px',
            '868': '868px',
            '768': '768px',
            '668': '668px',
            '425': '425px',
            '385': '385px',
            '1366': '1366px',
        },

        extend: {
            colors: {
                'navyBlue': '#060C3B',
                'lightOrange': '#F6F2EB',
                'light-black': '#7D7D7D',
                'nero': '#fff',
                'dark': '#000',
                'primary': '#CC035C',
                'secondary': '#FCB115',
                'text-gray': '#6E6E6E',
            },

            fontFamily: {
                poppins: ["Poppins"],
                dmserif: ["DM Serif Display"],
                montserrate: ['Montserrat'],
                icon: ['icomoon'],
                'dm-sans': ['DM Sans'],
            },
        },
        keyframes: {
            skeleton: {
                '0%': { 'background-position': '-1250px 0' },
                '100%': { 'background-position': '1250px 0' },
            }
        },
    },

    plugins: [],

    safelist: [
        {
            pattern: /icon-/,
        }
    ]
};
