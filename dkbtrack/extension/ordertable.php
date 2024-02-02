
<?php
                                
    $name  = $_SESSION['username'];

    if($_SESSION['usertype'] == 'admin'){
    $sql = "SELECT order_po, order_name, order_link, order_description, order_request_from FROM order_request";
    }else{
    $sql = "SELECT order_po, order_name, order_link, order_description FROM order_request WHERE order_request_from LIKE '$name'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        
        echo "
        <table class='table align-items-center mb-0' id='example' style='width:100%'>
            <thead>
                <tr>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3'>PO</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>Barcode</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>Material Name</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2'>Assigned To</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>Status</th>
                <th class='text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2'>More Info</th>
                </tr>
            </thead>
            <tbody>
        ";
    while($row = $result->fetch_assoc()) {

        $item_po_name = $row['item_po_name'];

        $sql = "SELECT po_pm_one FROM purchase_order WHERE po_name = '$item_po_name'";
        $result_po_pm = $conn->query($sql);

        while ($row1 = $result_po_pm->fetch_assoc()) {
            $item_pm = strtoupper($row1['po_pm_one']);
        }

        if($row['item_order_date'] != ""){
            if($row['item_arriving_date'] != "" ){
                if($row['item_arrived_date'] != "" ){
                    if($row['item_picked_up_pm_date'] != "" ){
                        if($row['item_delivered_customer_date'] != "" ){
                            $status = $row['item_delivered_customer_date'] . "<br><b>Delivered to Customer</b>";
                            $is_done = true;
                            $pickup = false;
                        }else{
                            $status = $row['item_picked_up_pm_date'] . "<br><b>Picked Up By PM</b>";
                            $is_done = false;
                            $pickup = false;
                        }
                    }else{
                        $status = "Ready to Pick Up ";
                        $is_done = false;
                        $pickup = true;
                    }
                }else{
                    $status = $row['item_arriving_date'] . "<br><b>Expected</b>";
                    $is_done = false;
                    $pickup = false;
                }
            }else{
                $status = "<b>Ordered But No Estimate Date</b>";
                $is_done = false;
                $pickup = false;
            }
        }else{
            $status = "<b>Has Not Been Ordered</b>";
            $is_done = false;
            $pickup = false;
        }

        echo "
        <tr>
        <td>
            <div class='d-flex px-2 py-1'>
                <h6 class='mb-0 text-m'>" . $row['item_po_name'] . "</h6>
            </div>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['item_barcode'] . "</h6>
        </td>
        <td>
            <h6 class='mb-0 text-m'>" . $row['item_name'] . "</h6>
        </td>
        <td class='align-middle text-sm'>
            <h6 class='mb-0 text-l'><b>" .  $item_pm ."</b></h6>
        </td>
        <td class='align-center text-center'>
        "; 
        if($pickup == true){
            echo "<a class='btn btn-outline-success btn-sm mb-0 me-3' href='?item_barcode=" . $row['item_barcode'] . "&pickup=true'>Pickup Item</a>";
        }else{
            echo "<span class='text-s font-weight-bold'>" . $status . "</span>";
        };
        echo "
        </td>
        <td class='align-center text-center'>
            <a class='btn btn-outline-primary btn-sm mb-0 me-3' href='?item_barcode=" . $row['item_barcode'] . "'>Info</a>
        </td>

    </tr>";
    }
    echo "
    </tbody>
    </table>
    ";
    }
?>
