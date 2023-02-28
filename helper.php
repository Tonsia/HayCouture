Swal.fire({
    position: 'top-end',
    icon: 'error',
    title: 'Some error occured! Please try later',
    showConfirmButton: false,
    timer: 1500
    }).then((result) => {
        location.href='../auth/signin.php';
    })