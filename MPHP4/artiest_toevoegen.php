
<?php
    require 'config.php';
    require 'navbar.php';

    $query = "SELECT `user_ID`,`naam` FROM `gamers`";

    $resultaat = mysqli_query($verbinding, $query);

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Toevoegen</title>

        <style>
            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }

            input[type=submit] {
                background-color: #006c6c;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
            }

            input[type=submit]:hover {
                background-color: #17a2b8;
            }

            div {


                height: 620px;
                width: 50%;
                margin-left: 26%;
                margin-top: 30px;

            }

            @media screen and (max-width: 1300px) {
                input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
            }

            .active {
                background-color: #cb0100;
            }

            .divstyle {
                background: rgba(255, 255, 255, 0.46);
                border: 5px solid black;
                margin-top: 60px;
                margin-left: 30%;
                width: 40%;
                height: 850px;
            }

            .divstyle2 {
                background: rgba(255, 255, 255, 0.46);
                border: 5px solid black;
                margin-left: 30%;
                width: 40%;
                height: 14%;
            }

            .divstylecenter {
                text-align: center;
            }

        </style>
    </head>
    <body>

    <div class="divstyle">
        <h2 style="padding-left: 280px">Voeg een Gamer toe...</h2>
            <div class="content">
                <div class="form">
                    <form action="artiest_toevoegen_verwerken.php" method="post">
                        <label>Gamer-Tag:</label>
                        <input required type="text" name="gamertag"><br><br>

                        <label>Naam:</label>
                        <input required type="text" name="naam"><br><br>

                        <label>Achternaam:</label>
                        <input required type="text" name="achternaam"><br><br>

                        <label>Wachtwoord:</label>
                        <input required type="text" name="wachtwoord"><br><br>

                </select><br><br>

                <input type="submit" name="submit" value="Opslaan">

            </form><br><br>

                </div>
                    <div class="divstyle2">
                        <div class="divstylecenter">
                            <a href="artiest_toon.php">Ga naar het overzicht</a>
                        </div>
                    </div>

                </div>
            </div>
         </div>
    </body>
    </html>