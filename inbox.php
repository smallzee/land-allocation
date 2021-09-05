<?php
require_once 'inc/php.php';
if(!login()){
    header("location:login.php");
    exit();
}

$page_title = "Contact Message -  Land Information";
include_once 'head.php';
include_once 'sidebar.php';
?>

<style type="text/css">
    h4{
        color: #990000;
        margin-bottom: 20px;
        border-bottom: #333 dotted 1px;
    }
</style>

<div>
    <fieldset>
        <legend>
            <h3><?php echo $page_title; ?></h3>
        </legend>
    </fieldset>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SN</th>
                <th>Sender Name</th>
                <th>Sender Email Address</th>
                <th>Message</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>SN</th>
                <th>Sender Name</th>
                <th>Sender Email Address</th>
                <th>Message</th>
            </tr>
            </tfoot>
            <tbody>
            <?php
                $sn =1;
                $sql = $db->query("SELECT * FROM inbox ORDER BY id");
                while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= $rs['name'] ?></td>
                        <td><?= $rs['email'] ?></td>
                        <td><?= $rs['message'] ?></td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>

</div>

<?php include_once 'foot.php'; ?>
</body>
</html>