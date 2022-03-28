<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header('location:login.php');
}
include '../layout/header.php';
?>

<div class="text-center">
    <h2><i class="fa-solid fa-globe mx-2"></i>Panel</h2>
</div>

<?php
include '../config/config.php';
$query = new Config();
$sensor = $query->get_role('sensor');
$control = $query->get_role('control');
?>

<div class="card my-5">
    <div class="card-header text-center bg-warning">
        <h3><i class="fa-solid fa-microchip mx-2"></i>Sensor</h3>
    </div>
    <div class="card-body">
        <div class="card-deck">

            <?php foreach ($sensor as $item) { ?>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center my-2">
                            <i class="<?php echo $item['icon'] ?> fa-2x"></i>
                        </div>
                        <div class="card-title text-center">
                            <h5><?php echo $item['name_device'] ?></h5>
                        </div>
                        <div class="card-text text-center">
                            <h1><?php echo $item['value'] . " " . $item['satuan'] ?> </h1>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php
include '../layout/footer.php';
?>