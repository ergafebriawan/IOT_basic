<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header('location:login.php');
}
include '../layout/header.php';
?>

<div class="text-center">
    <h2><i class="fa-solid fa-globe mx-2"></i>Report</h2>
</div>

<?php
include '../config/config.php';
$query = new Config();
$report = $query->showReport();
// var_dump($report);
$num = 1;
?>

<div class="card my-5">
    <div class="card-header text-center bg-warning">
        <h3><i class="fa-solid fa-microchip mx-2"></i>Data Report</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">MLX19640</th>
                    <th scope="col">LM35</th>
                    <th scope="col">Image</th>
                    <th scope="col">Deteksi</th>
                    <th scope="col">Update At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report as $item) { ?>
                    <tr>
                        <th scope="row"><?php echo $num; ?></th>
                        <td><?php echo $item['mlx19640']; ?> C</td>
                        <td><?php echo $item['lm35']; ?> C</td>
                        <td><img src="../assets/<?php echo $item['image']; ?>" style="width: 100px; height: 100px;" alt="<?php echo $item['image']; ?>"></td>
                        <td><?php echo $item['deteksi']; ?></td>
                        <td><?php echo $item['created_at']; ?></td>
                    </tr>
                <?php $num = $num+1;
            } ?>
            </tbody>
        </table>
    </div>
</div>




<?php
include '../layout/footer.php';
?>