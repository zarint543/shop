<?php
ob_start();
include('./Template/header.php');


?>


<body>

<main id="main-site">
    <?php
    include('./Template/banner.php');



    include ('./Template/top-sale.php');

    include('./Template/special price.php');


    include('./Template/advertisement.php');

    include('./Template/new phone.php');

    include('./Template/latest news.php');
    ?>


</main>

<?php include('./Template/footer.php');
?>
