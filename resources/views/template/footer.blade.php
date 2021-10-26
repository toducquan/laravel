<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,400&display=swap" rel="stylesheet" />

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
    }

    footer {
        position: absolute;
        width: 100%;
        bottom: 0;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    ul li {
        list-style: none;
    }

    #contact a {
        color: #a683e3;
        margin: 10px;
    }

    #contact {
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
        background-color: #353538;
    }

    #icon {
        background-color: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: transform 1s, box-shadow 0.5s;
        box-shadow: 0 2px 3px rgb(0 0 0 / 12%), 0 2px 2px rgb(0 0 0 / 24%);
    }

    #icon-container {
        display: flex;
        justify-content: center;
    }

    #icon:hover {
        transform: translateY(-3px);
        box-shadow: 0 3px 5px 5px rgb(0 0 0 / 12%), 0 3px 5px rgb(0 0 0 / 24%);
    }

    #contact p {
        font-size: 14px;
    }

    @media screen and (max-width: 426px) {
        #icon {
            width: 30px;
            height: 30px;
        }

        ul li {
            font-size: 12px;
        }

        #contact p {
            font-size: 10px;
        }
    }

    @media screen and (min-width: 2560px) {
        #icon {
            width: 50px;
            height: 50px;
        }

        ul li {
            font-size: 20px;
        }

        #contact p {
            font-size: 16px;
        }
    }

</style>

<footer id="contact">
    <ul>
        <div id="icon-container">
            <a href="#">
                <div id="icon">
                    <li><i class="fab fa-twitter"></i></li>
                </div>
            </a>
            <a href="#">
                <div id="icon">
                    <li><i class="fab fa-instagram"></i></li>
                </div>
            </a>
            <a href="#">
                <div id="icon">
                    <li><i class="fab fa-facebook-f"></i></li>
                </div>
            </a>
            <a href="#">
                <div id="icon">
                    <li><i class="far fa-envelope"></i></li>
                </div>
            </a>
            <a href="#">
                <div id="icon">
                    <li><i class="fab fa-free-code-camp"></i></li>
                </div>
        </div></a>
    </ul>
</footer>
