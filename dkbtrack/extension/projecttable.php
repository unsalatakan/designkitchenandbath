
<?php
                                
    $name  = $_SESSION['username'];

    if($_SESSION['usertype'] == 'admin'){
    $sql = "SELECT po_name, po_pm_one, po_start_date,po_id FROM purchase_order";
    }else{
    $sql = "SELECT po_name, po_pm_one, po_start_date,po_id FROM purchase_order WHERE po_pm_one = '$name'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0){

        echo "
        <table class='table align-items-center mb-0' id='example' style='width:100%'>
            <thead>
                <tr>
                    <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3'>
                        Project Name</th>
                    <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>
                        Project Manager</th>
                    <th class='text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7'>
                        JOB START DATE</th>
                    <th class='text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7'></th>
                </tr>
            </thead> 
            <tbody>
        ";
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>
            <div class='d-flex px-2 py-1'>
                <div class='d-flex flex-column justify-content-center'>
                    <h6 class='mb-0 text-m'>" . $row['po_name'] . "</h6>
                </div>
            </div>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['po_pm_one'] . "</h6>
        </td>
        <td class='align-center text-center'>
            <div class='progress-wrapper w-75 mx-auto'>
                <div class='progress-info'>
                    <div class='progress-percentage'>
                        <span class='text-s font-weight-bold'>" . $row['po_start_date'] . "</span>
                    </div>
                </div>
            </div>
        </td>
        <td class='align-center text-center'>
            <a class='btn btn-outline-primary btn-sm mb-0 me-3' href='" . $row['po_id'] . "'>Info</a>"; ?> 
            <a class='btn btn-outline-danger btn-sm mb-0 me-3' onclick="deleteJob('<?php echo $row['po_id']; ?>', '<?php echo $row['po_name']; ?>')">Delete</a>
            <?php echo "
        </td>
    </tr>";
    }
    echo "
    </tbody>
    </table>
    ";
    }
?>
