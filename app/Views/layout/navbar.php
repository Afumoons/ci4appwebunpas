<style>
    @import'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap';

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    .navbar {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        height: 8vh;
        background-color: #5b78c7;
        font-family: Poppins, sans-serif
    }

    .logo {
        color: white;
        text-transform: uppercase;
        letter-spacing: 5px;
        letter-spacing: .3125rem;
        font-size: 20px;
        font-size: 1.25rem
    }

    .nav-links {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        width: 40%;
        list-style: none
    }

    .nav-links li a {
        color: aliceblue;
        text-decoration: none;
        letter-spacing: 1.6px;
        letter-spacing: .1rem;
        font-weight: 700;
        font-size: 14px;
        font-size: .875rem
    }

    .burger {
        display: none
    }

    .burger div {
        width: 1.875em;
        height: .1875em;
        background-color: white;
        margin: .3125em;
        -webkit-transition: .3s ease;
        transition: .3s ease
    }

    @media screen and (max-width:870px) {
        .nav-links {
            width: 60%
        }
    }

    @media screen and (max-width:700px) {
        body {
            overflow-x: hidden
        }

        .navbar {
            position: relative
        }

        .nav-links {
            position: fixed;
            background-color: #5b78c7;
            top: 0;
            height: 100vh;
            width: 100vw;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -ms-grid-row-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            clip-path: circle(10px at 90% -10%);
            -webkit-clip-path: circle(10px at 90% -10%);
            -webkit-transition: all 1s ease-out;
            transition: all 1s ease-out;
            pointer-events: none
        }

        .nav-links.nav-active {
            clip-path: circle(1500px at 90% -10%);
            -webkit-clip-path: circle(1500px at 90% -10%);
            pointer-events: all
        }

        .burger {
            display: block;
            cursor: pointer;
            z-index: 2
        }

        .nav-links li {
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"
        }

        .nav-links li a {
            font-size: 1.5625rem
        }
    }

    .toggle-burger .line1 {
        -webkit-animation: line1animation 1s forwards cubic-bezier(.68, -.55, .265, 1.55);
        animation: line1animation 1s forwards cubic-bezier(.68, -.55, .265, 1.55)
    }

    .toggle2 .line1 {
        -webkit-animation: line1animation2 1s forwards cubic-bezier(.68, -.55, .265, 1.55);
        animation: line1animation2 1s forwards cubic-bezier(.68, -.55, .265, 1.55)
    }

    .toggle-burger .line2 {
        -webkit-transform: translateX(100px);
        transform: translateX(100px);
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"
    }

    .toggle-burger .line3 {
        -webkit-animation: line3animation 1.5s forwards cubic-bezier(.77, 0, .175, 1);
        animation: line3animation 1.5s forwards cubic-bezier(.77, 0, .175, 1)
    }

    @-webkit-keyframes line1animation {
        0% {
            -webkit-transform: rotate(0deg) translate(0, 0);
            transform: rotate(0deg) translate(0, 0)
        }

        100% {
            -webkit-transform: rotate(-405deg) translate(-5px, 6px);
            transform: rotate(-405deg) translate(-5px, 6px)
        }
    }

    @keyframes line1animation {
        0% {
            -webkit-transform: rotate(0deg) translate(0, 0);
            transform: rotate(0deg) translate(0, 0)
        }

        100% {
            -webkit-transform: rotate(-405deg) translate(-5px, 6px);
            transform: rotate(-405deg) translate(-5px, 6px)
        }
    }

    @-webkit-keyframes line1animation2 {
        0% {
            -webkit-transform: rotate(-405deg) translate(-5px, 6px);
            transform: rotate(-405deg) translate(-5px, 6px)
        }

        100% {
            -webkit-transform: rotate(0deg) translate(0, 0);
            transform: rotate(0deg) translate(0, 0)
        }
    }

    @keyframes line1animation2 {
        0% {
            -webkit-transform: rotate(-405deg) translate(-5px, 6px);
            transform: rotate(-405deg) translate(-5px, 6px)
        }

        100% {
            -webkit-transform: rotate(0deg) translate(0, 0);
            transform: rotate(0deg) translate(0, 0)
        }
    }

    @-webkit-keyframes line3animation {
        0% {
            width: 1.875em
        }

        30% {
            width: .3125em;
            -webkit-transform: rotate(20deg) translateX(50px);
            transform: rotate(20deg) translateX(50px)
        }

        100% {
            width: 1.875em;
            -webkit-transform: rotate(45deg) translate(-5px, -6px);
            transform: rotate(45deg) translate(-5px, -6px)
        }
    }

    @keyframes line3animation {
        0% {
            width: 1.875em
        }

        30% {
            width: .3125em;
            -webkit-transform: rotate(20deg) translateX(50px);
            transform: rotate(20deg) translateX(50px)
        }

        100% {
            width: 1.875em;
            -webkit-transform: rotate(45deg) translate(-5px, -6px);
            transform: rotate(45deg) translate(-5px, -6px)
        }
    }

    @-webkit-keyframes navLinkFade {
        from {
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            -webkit-transform: translatey(50px);
            transform: translatey(50px)
        }

        to {
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
            -webkit-transform: translatey(0);
            transform: translatey(0)
        }
    }

    @keyframes navLinkFade {
        from {
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            -webkit-transform: translatey(50px);
            transform: translatey(50px)
        }

        to {
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
            -webkit-transform: translatey(0);
            transform: translatey(0)
        }
    }
</style>
<nav class="navbar">
    <div class="logo">
        <h4>The nav</h4>
    </div>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/pages/about">About</a></li>
        <li><a href="/pages/contact">Contact</a></li>
        <li><a href="/komik">Komik</a></li>

    </ul>
</nav>
<script>
    const navSlide = () => {
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav-links');
        const navLinks = document.querySelectorAll('.nav-links li');
        burger.addEventListener('click', () => {
            // Toggle Nav
            nav.classList.toggle('nav-active')
            // Animate Links
            navLinks.forEach((link, index) => {
                if (link.style.animation) {
                    link.style.animation = '';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
                }
            });
            // Burger animation
            burger.classList.toggle('toggle-burger');
        });
    }
    navSlide();
</script>