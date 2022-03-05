<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header('location:login.php');
}
include '../layout/header.php';
?>

<div class="text-center">
    <h2><i class="fa-solid fa-globe mx-2"></i>Panel IOT</h2>
</div>

<?php
include '../config/config.php';
$query = new Config();
$sensor = $query->get_role('sensor');
$control = $query->get_role('control');
?>

<div class="card my-5">
    <div class="card-header text-center bg-success text-light">
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
                            <h5><?php echo $item['name'] ?></h5>
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

<div class="card my-5">
    <div class="card-header text-center bg-info text-light">
        <h3><i class="fa-solid fa-toggle-on mx-2"></i>Control</h3>
    </div>
    <div class="card-body">
        <div class="card-deck">

            <?php
            foreach ($control as $item2) {
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center my-2">
                            <i class="<?php echo $item2['icon'] ?> fa-2x"></i>
                        </div>
                        <div class="card-title text-center">
                            <h5><?php echo $item2['name'] ?></h5>
                        </div>
                        <div class="card-text text-center">
                            <form method="post"><input type="hidden" name="id" value="<?php echo $item2['id'] ?>">
                                <?php
                                if ($item2['value'] == 0) {
                                    echo '<input type="submit" name="off" class="btn btn-success" value="ON">';
                                } else if ($item2['value'] == 1) {
                                    echo '<input type="submit" name="on" class="btn btn-danger" value="OFF">';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            error_reporting(0);
            if (isset($_POST['on'])) {
                $query->tombolControl($_POST['id'], 0);
            } else if (isset($_POST['off'])) {
                $query->tombolControl($_POST['id'], 1);
            }
            ?>

        </div>

    </div>
</div>


<?php
include '../layout/footer.php';
?>