<?php

class Template {

    public static function start() {
        $q = $_REQUEST['q'];
        $className = $q."Page";
        $page = new $className;        

        $page->handlePost($page);

        self::render($page);
    }

    private static function handlePost($page) {
        $page->handlePost();
    }

    private static function render($page) {
        self::Head();
        self::Header();
        self::Navigation();
        $page->render();
        self::Footer();
    }

    public static function Head() {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title></title>
                <link rel="stylesheet" href="/css/reset.css" type="text/css">
                <link rel="stylesheet" href="/js/jquery-ui-1.10.1.custom/css/smoothness/jquery-ui-1.10.1.custom.min.css" type="text/css">
                <link rel="stylesheet" href="/css/main.css" type="text/css">
                <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                <script src="/js/jquery-ui-1.10.1.custom/js/jquery-ui-1.10.1.custom.min.js"></script>
            </head>

            <?php
        }

        public static function Header() {
            ?>
            <header>
                <h1><a href = "#">Lan Party <strong>Organizer!</strong></a></h1>
            </header>
            <?php
        }

        public static function Navigation() {
            ?>
            <nav>
                <ul>
                    <li><a href = "#">Home<a/></li>
                    <li><a href = "#">Parties<a/></li>
                    <li><a href = "#">Account<a/></li>
                    <li><a href = "#">Logout<a/></li>
                </ul>
            </nav>

            <?php
        }

        public static function Footer() {
            ?>
            <footer>
                Footer here.
            </footer>
        </body>
        </html>

        <?php
    }

}

