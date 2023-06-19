<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("adminpanel/connect.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="The Art Of  Waffle , eşsiz donut , dondurma , waffle'ın tek adresi">

    <title>The Art Of Waffle-Siparişlerim</title>
    <meta name="robots" content="index,follow" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5f120640c7.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- ICONFINDER -->
    <link rel="shortcut icon" href="favico.ico">

    <style>
        @media only screen and (max-width:959px) {
            #game-board {
                margin: auto;
                margin-top: 10vw;
                margin-bottom: 10vw;
                width: 90vw;
                height: 50vh;
                border-radius: 15px;
                border: 1px solid black;
                position: relative;
                background-color: #347C17;
            }

            .snake {
                background-color: green;
                border: 1px solid black;
                height: 2.5vw;
                position: absolute;
                width: 2.5vw;
            }

            .food {
                background-color: red;
                border: 1px solid black;
                height: 2.5vw;
                position: absolute;
                width: 2.5vw;
            }

            #play-button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 5vw 10vw;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 4vw;
                margin: 5vw;
                cursor: pointer;
            }

            #score {
                font-size: 6vw;
                font-weight: bold;
                margin: 5vw;
            }
        }

        #game-board {
            display: block;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 50px;
            width: 600px;
            height: 400px;
            border-radius: 15px;
            border: 1px solid black;
            position: relative;
            background-color: #347C17;
        }

        .snake {
            background-color: green;
            border: 1px solid black;
            height: 10px;
            position: absolute;
            width: 10px;
        }

        .food {
            background-color: red;
            border: 1px solid black;
            height: 10px;
            position: absolute;
            width: 10px;
        }

        #play-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }

        #score {
            font-size: 20px;
            font-weight: bold;
            margin: 10px;
        }
    </style>

</head>

<body>

    <?php
    include("navbar.php");

    
    if (isset($_SESSION['giris'])) {

$urunkategorisecme = $baglan->prepare("SELECT * from siparisonay where kullaniciid = '$kullaniciid'");
                    $urunkategorisecme->execute();
                   $kontrol = $urunkategorisecme->fetch(PDO::FETCH_ASSOC);

        if ($kullaniciid == $kontrol["kullaniciid"] ) {
    

    ?>

        <div style="text-align: center;">
            <h1 style="color: #E80F88;">Siparişin Alındı</h1>
            <h3>Aşşağıdan sipariş durumunu takip edebilirsiniz.</h3>
        </div>








        <div class="col-md-8" style="display: block; margin: auto;">
            <table class="table  table-hover table-bordered table-striped">
                <thead>
                    <th class="text-center"> <strong> Ürün Resmi </strong></th>
                    <th class="text-center"> <strong> Ürünü Adı </strong></th>
                    <th class="text-center"> <strong> Fiyatı </strong></th>
                    <th class="text-center"> <strong> Adet </strong></th>
                    <th class="text-center"> <strong> seçenekler </strong></th>
                </thead>
                <tbody>

                    <?php $urunkategorisecme = $baglan->prepare("SELECT * from siparisonay where kullaniciid = '$kullaniciid'");
                    $urunkategorisecme->execute();
                    while ($row = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {


                        $sepeturunid = $row['urunid'];
                        $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$sepeturunid}' ");
                        $urunbilgi->execute();
                        if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
                            $urunid  = $urun['id'];
                            $urunadi = $urun['urun'];
                            $waffle  = $urun["urunwaffle"];
                            $urunfoto = $urun['urunfoto'];
                            $urunfiyat = $urun['urunfiyat'];
                        }


                    ?>
                        <tr>
                            <td class="text-center" width="150">
                                <img src="<?php echo $urunfoto ?>" width="50" alt="">
                            </td>
                            <td class="text-center">
                                <?php echo $urunadi ?> </td>
                            <td class="text-center">
                                <?php echo $row["toplamfiyat"] ?>₺
                            </td>
                            <td class="text-center">
                                <a href="" style="color: #db0000;"><?php echo $row["urunadet"] ?></a>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($waffle == 1) { ?>
                                    <a class="silmeislemi" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row["id"] ?>" style="color: #db0000;" href=""> göster</a>



                                    <div class="modal fade" id="exampleModal<?php echo $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $urunadi ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Seçtiğiniz Seçenekler</h4>
                                                    <h5>çikolatalar</h5>
                                                    <p><?php echo $row["cikolatalar"] ?></p> <br>
                                                    <h4>Meyveler</h4>
                                                    <p><?php echo  $row["meyveler"] ?></p> <br>
                                                    <h4>Şekerlemeler</h4>
                                                    <p><?php echo  $row["sekerlemeler"] ?></p> <br>
                                                    <h4>Süslemeler</h4>
                                                    <p><?php echo $row["suslemeler"] ?></p> <br>
                                                    <h4>Kuru Yemişler</h4>
                                                    <p><?php echo  $row["yemisler"] ?></p> <br>
                                                    <h4>Soslar</h4>
                                                    <p><?php echo $row["soslar"] ?></p><br>
                                                </div>

                                                <?php
                                                
                                                ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else { ?>


                                <?php
                                }
                                ?>


                            </td>

                        </tr>
                    <?php }

                    $urunkategorisecme = $baglan->prepare("SELECT * from siparisonay where kullaniciid = '$kullaniciid'");
                    $urunkategorisecme->execute();
                    $raw = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)


                    ?>



                </tbody>
                <tfoot>
                    <th colspan="2" class="text-center"><?php if ($raw["siparisdurumu"] == 0) { ?>
                            Sipariş durumu : <span class="color-danger"> Hazırlanıyor... </span>
                        <?php    # code...
                                                        } elseif ($raw["siparisdurumu"] == 1) {
                        ?>
                            Sipariş durumu : <span class="color-danger"> Yola Çıktı... </span>
                        <?php    # code...
                                                        } elseif ($raw["siparisdurumu"] == 2) {
                        ?>
                            Sipariş durumu : <span class="color-danger"> Teslim Edildi... </span>
                        <?php    # code..
                                                        } ?>

                    </th>
                    <th colspan="2" class="text-center">
                        <?php ?>
                        Ödeme Yöntemi : <span class="color-danger"> <?php echo $raw["odeme_yontemi"] ?> </span>

                    </th>
                    <th colspan="2" class="text-center">
                                                        <?php
                                                        if ($raw["iptal"] == 0) { ?>
                                                       <?php
                                                        }else { 
                                                            
                                                            $se = $raw['iptal'];
                                                            $urunbilgi = $baglan->prepare("SELECT * FROM iptalsebepleri where id = '{$se}' ");
                                                            $urunbilgi->execute();
                                                            $urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)
                                                            ?>

                                                            
                                                            Siparişiniz iptal edildi : <span class="color-danger"> <?php echo $urun["sebep"] ?> </span>     
                                                            <?php
                                                        }
                                                        ?>
                    </th>
                </tfoot>
            </table>
        </div>

        <?php }else { ?>
            <div style="text-align: center;">
            <h1 style="color: #E80F88;">Şuanda Aktif Bir Siparişiniz Bulunmuyor </h1></div>
            <?php
        }?>








        <div style="text-align: center; margin-top: 150px;">
            <h2 style="color: #E80F88;">Siparişini beklerken oyun oynamak istemezmisin ?</h2>
            <h3>Aşşağıdan oynayabilirsin.</h3>
        </div>



























        <div style="display: block; margin: auto; width:px; height: 750px;">
            <div style="margin-left:200px;" id="play-button">Play</div>
            <div style="margin-left:200px;" id="score">Score: 0</div>
            <div id="game-board"></div>
        </div>
        <script>
            // set up the game board
            var gameBoard = document.getElementById("game-board");
            var width = gameBoard.offsetWidth;
            var height = gameBoard.offsetHeight;
            var columns = width / 10;
            var rows = height / 10;

            // set up the initial snake and food positions
            var snake = [{
                x: Math.floor(columns / 2),
                y: Math.floor(rows / 2)
            }];
            var food = {
                x: Math.floor(Math.random() * columns),
                y: Math.floor(Math.random() * rows)
            };
            var direction = "right";
            var score = 0;

            // draw the game board, snake, and food
            function draw() {
                // clear the game board
                gameBoard.innerHTML = "";

                // update the score
                var scoreElement = document.getElementById("score");
                scoreElement.innerHTML = "Score: " + score;

                // draw the snake
                for (var i = 0; i < snake.length; i++) {
                    var snakeElement = document.createElement("div");
                    snakeElement.className = "snake";
                    snakeElement.style.left = snake[i].x * 10 + "px";
                    snakeElement.style.top = snake[i].y * 10 + "px";
                    gameBoard.appendChild(snakeElement);
                }

                // draw the food
                var foodElement = document.createElement("div");
                foodElement.className = "food";
                foodElement.style.left = food.x * 10 + "px";
                foodElement.style.top = food.y * 10 + "px";
                gameBoard.appendChild(foodElement);
            }

            // move the snake
            function move() {
                // get the new head position based on the direction
                var newHead = {
                    x: snake[0].x,
                    y: snake[0].y
                };
                if (direction == "left") {
                    newHead.x -= 1;
                } else if (direction == "right") {
                    newHead.x += 1;
                } else if (direction == "up") {
                    newHead.y -= 1;
                } else if (direction == "down") {
                    newHead.y += 1;
                }

                // check if the snake has collided with the walls or itself
                if (newHead.x < 0 || newHead.x >= columns || newHead.y < 0 || newHead.y >= rows) {
                    alert("Game over!");
                    return;
                }
                for (var i = 1; i < snake.length; i++) {
                    if (newHead.x == snake[i].x && newHead.y == snake[i].y) {
                        alert("Oyun Bitti!");
                        return;
                    }
                }

                // check if the snake has eaten the food
                if (newHead.x == food.x && newHead.y == food.y) {
                    // increase the score
                    score += 10;

                    // generate a new food position
                    food = {
                        x: Math.floor(Math.random() * columns),
                        y: Math.floor(Math.random() * rows)
                    };
                } else {
                    // remove the tail segment
                    snake.pop();
                }

                // add the new head segment
                snake.unshift(newHead);

                // draw the updated game board
                draw();
            }
            // handle key press events
            document.addEventListener("keydown", function(event) {
                if (event.keyCode == 65 && direction != "right") {
                    direction = "left";
                } else if (event.keyCode == 87 && direction != "down") {
                    direction = "up";
                } else if (event.keyCode == 68 && direction != "left") {
                    direction = "right";
                } else if (event.keyCode == 83 && direction != "up") {
                    direction = "down";
                }
            });


            // start the game when the play button is clicked
            var playButton = document.getElementById("play-button");
            playButton.addEventListener("click", function() {
                setInterval(move, 100);
            });
        </script>









    <?php  } else {
    ?>


        <h1 style="text-align: center;">Lütfen Giriş Yapınız</h1>

    <?php

    }

    include("footer.php");

    ?>

    <script src="sepet.js"></script>


</body>

</html>