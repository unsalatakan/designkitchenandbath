
function deleteJob(po_id, po_name) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        if (result.isConfirmed) {
          window.location = "../actions/deleteproject.php?po_id=" + po_id + "&po_name=" + po_name;
        }
      }
    });
  }

  function deleteRequest(request_id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        if (result.isConfirmed) {
          window.location = "../actions/deleteRequest.php?request_id=" + request_id;
        }
      }
    });
  }
  