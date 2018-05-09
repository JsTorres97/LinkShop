<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Dunkers
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
  <?php include("../formatos/style.html")
  ?>

    <!-- theme stylesheet -->

    <!-- your stylesheet with modifications -->
    <?php include("../formatos/style2.html");
    ?>

    <link rel="shortcut icon" href="../favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <?php
    include("../formatos/topbar.html");
    ?>
    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->
    <?php
    include("../formatos/navbar.html");
    ?>
   
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="../img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="../img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="../img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="../img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="">Los mejores modelos</a></h3>
                                <p>Encuentra los más recientes modelos, además de ediciones especiales y modelos de jugador.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">El mejor precio</a></h3>
                                <p>Sabemos que quieres tener lo mejor de lo mejor, por eso tenemos los mejores precios en el mercado, para que no te quedes sin tu par.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">Encontramos lo que quieres</a></h3>
                                <p>¿Quieres un modelo en especial?. Solo tienes que decirnos y estamos 99% seguros que lo encontrarémos para tí</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Lo más vendido</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            
                                                <img src="../img/product1.jpg" alt="" class="img-responsive">
                                            
                                        </div>
                                        <div class="back">
                                            
                                                <img src="../img/product1_2.jpg" alt="" class="img-responsive">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                    <img src="../img/product1.jpg" alt="" class="img-responsive">
                                
                                <div class="text">
                                    <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="16">
                                     <button type="submit" class="btn-link" align="center"><h3>LeBron XV "Multi-Color"</h3></button>
                                    <p class="price">$3,999.00</p>
                                    </form>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="17">
                                     <button type="submit" class="btn-link" align="center"><h3>Jordan Fly Unlimited</h3></button>
                                     <p class="price"><del>$3,200.00</del> $2,299.00</p>
                                </form>
                                    
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">OFERTA</div>
                                    <div class="ribbon-background"></div>
                                </div>
                               
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="18">
                                     <button type="submit" class="btn-link" align="center"><h3>Air Jordan XXXII "Free Throw Line"</h3></button>
                                     <p class="price">$3,699.00</p>
                                </form>
                                    
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product4_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product4.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="19">
                                     <button type="submit" class="btn-link" align="center"><h3>Jordan DNA</h3></button>
                                     <p class="price">$2,099.00</p>
                                </form>
                                    
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product5.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product5_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product5.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="20">
                                     <button type="submit" class="btn-link" align="center"><h3>PG 2 "March Madness"</</h3></button>
                                     <p class="price">$2,099.00</p>
                                </form>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">LO MÁS NUEVO</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product6.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product6_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product6.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="21">
                                     <button type="submit" class="btn-link" align="center"><h3>LeBron Witness II</h3></button>
                                     <p class="price">$2,099.00</p>
                                </form>
                                  
                                </div>
                                <!-- /.text -->

                                <div class="ribbon gift">
                                    <div class="theribbon">CLÁSICO</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product7.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product7_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product7.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="14">
                                     <button type="submit" class="btn-link" align="center"><h3>Kyrie 4 “City of Guardians”</h3></button>
                                     <p class="price"><del>$2,800.00</del> $2,499.00</p>
                                </form>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">OFERTA</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">LO MÁS NUEVO</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="../img/product8.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="../img/product8_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="../img/product8.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <form action="detail.php" method="GET">
                                    <input name="id" type="hidden" value="23">
                                     <button type="submit" class="btn-link" align="center"><h3>Jordan Trainer 2 Flyknit</h3></button>
                                     <p class="price">$2,899.00</p>
                                </form>
                                    
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

          
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php
        include("./../formatos/footer.html");
        ?>        
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->



</body>

</html>