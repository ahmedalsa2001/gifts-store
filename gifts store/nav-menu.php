<a class="logo">
    <img src="loogo.png-removebg-preview.png" width="250" hight="250" alt="Jasmine Boutique logo">
</a>
<div class="menu">
    <ul>
        <li class="menu-item"><a href="index.php"> Home <i class="fas fa-home "></i> </li> </a>
        <li class="menu-item">
            <a> Products <i class="fas fa-gifts "></i> </a>
            <ul class="down">
                
                <li class="menu-item"><a href="choco.php">Box of chocolates<i class="fas fa-candy-cane"></i> </a></li>
                <li class="menu-item"><a href="flower.php">flowers <i class="fas fa-seedling"></i> </a></li>
                <li class="menu-item"><a href="babe.php">newborn gifts <i class="fas fa-baby-carriage"></i> </a></li>
                <li class="menu-item"><a href="ballon.php">balloons <i class="fas fa-parachute-box"></i> </a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="shopping-cart.php"> shopping cart (<?php echo isLoggedIn() ? getNumberOfOrders(currentCustomerId()) : 0 ?>) <i class="fas fa-shopping-basket "></i></a>
        </li>
        <li class="menu-item">
            <a href="ordershistory.php"> Orders history (<?php echo isLoggedIn() ? getNumberOfPurchasedOrders(currentCustomerId()) : 0 ?>) </i></a>
        </li>

        <?php
        if (isLoggedIn()) {
            echo '<li class="menu-item"><form action="logout.php" method="post"><button type="submit" name="logout" class="btnSign">Sign out <i class="far fa-user "></i></button></form> </li>';
        } else {
            echo '<li class="menu-item"><a href="sign-in.php"><button class="btnSign">Sign in <i class="far fa-user "></i></button></a> </li>';
        }
        ?>
    </ul>
</div>