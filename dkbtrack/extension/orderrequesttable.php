
<?php
                                
    $name  = $_SESSION['username'];

    if($_SESSION['usertype'] == 'admin'){
    $sql = "SELECT order_request_id, order_po, order_name, order_link, order_quantity, order_requested_date, order_request_created_date, order_description, order_reason, order_request_from, order_assigned_to, order_status FROM order_request";
    }else{
    $sql = "SELECT order_request_id, order_po, order_name, order_link, order_quantity, order_requested_date, order_request_created_date, order_description, order_reason, order_request_from, order_assigned_to, order_status  FROM order_request WHERE order_requested_from = '$name' ";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        
        echo "
        <style>
            tbody tr:nth-child(even) {
                background-color: #f2f2f2 !important;
            }
        </style>

        <table class='table align-items-center mb-0' id='example' style='width:100%'>
            <thead>
                <tr>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3'>ID</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3'>PO</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>Name</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>Link</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>QTY</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Requested Date</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Created Date</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Description</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Reason</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Request From</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Assigned To</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Status</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Due</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'></th>
                </tr>
            </thead>
            <tbody>
            
        ";
    while($row = $result->fetch_assoc()) {

        echo "
        <tr>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_request_id'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_po'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_name'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'><a href=" . $row['order_link'] . " target='_blank'>" . $row['order_link'] . "</a></h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_quantity'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_requested_date'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_request_created_date'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_description'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_reason'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_request_from'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_assigned_to'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['order_status'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>123</h6>
        </td>
        <td class='align-center text-center'>"; ?> 
            <a class='btn btn-outline-primary btn-sm mb-0 me-3' onclick="complete('<?php echo $row['order_request_id']; ?>', '<?php echo $row['order_request_id']; ?>')">COMPLETE</a>
            <a class='btn btn-outline-danger btn-sm mb-0 me-3' onclick="deleteRequest('<?php echo $row['order_request_id']; ?>')">Delete</a>
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
